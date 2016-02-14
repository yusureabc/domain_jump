<?php
namespace Home\Controller;
use Think\Controller;

/**
 * 域名管理
 */
class DomainController extends Controller
{
    /**
     * 跳转域名列表
     * @author Yusure  http://yusure.cn
     * @date   2016-02-09
     * @param  [param]
     * @return [type]     [description]
     */
    public function domain_list()
    {
        $this->display();
    }

    /**
     * 添加域名跳转
     * @author Yusure  http://yusure.cn
     * @date   2016-02-09
     * @param  [param]
     */
    public function add()
    {
        if ( IS_POST )
        {
            $domain_model = D( 'Domain' );
            /* 检查数据规范 */
            $this->_checkData();
            /* 检查域名唯一性 */
            $this->_checkOnce();

            $data['name']        = I( 'post.name', '', 'trim' );
            $data['domain']      = I( 'post.domain', '', 'trim' );
            $data['jump_domain'] = I( 'post.jump_domain', '', 'trim' );
            $data['end_time']    = I( 'post.end_time', '', 'strtotime' );
            $data['add_time']    = time();

            $res = $domain_model->add( $data );
            if ( $res )
            {
                $this->success( '添加成功！', U( 'Domain/domain_list' ) );
            }
            else
            {
                $this->error( '操作失败！' );
            }

        }
        else
        {
            $this->display();
        }
    }

    /**
     * 编辑域名跳转
     * @author Yusure  http://yusure.cn
     * @date   2016-02-09
     * @param  [param]
     * @return [type]     [description]
     */
    public function edit()
    {
        $this->display();
    }

    /**
     * 检查数据合法性
     * @author Yusure  http://yusure.cn
     * @date   2016-02-10
     * @param  [param]
     * @return [type]     [description]
     */
    private function _checkData()
    {
        import('Org.Util.Validate');    
        $obj_validate = new \Validate(); 
        $obj_validate->validateparam = array( 
            array('input'=>$_POST['name'],'require'=>'true','message'=>'公司名不能为空'),
            array('input'=>$_POST['name'],  'require'=>'true','validator'=>'length','min'=>'1','max'=>'32','message'=>'公司名太长'), 
            array('input'=>$_POST['domain'],'require'=>'true','message'=>'域名不能为空'), 
            array('input'=>$_POST['jump_domain'],'require'=>'true','message'=>'跳转域名不能为空'), 
            array('input'=>$_POST['end_time'],'require'=>'true','message'=>'跳转域名结束时间不能为空'), 
        ); 
        $error = $obj_validate->validate(); 
        if ( $error != '' )
        { 
            $this->error( $error ); 
        }
    }

    /**
     * 检查域名是否重复
     * @author Yusure  http://yusure.cn
     * @date   2016-02-14
     * @param  [param]
     * @return [type]     [description]
     */
    private function _checkOnce()
    {
        $domain_model = D( 'Domain' );
        $domain = I( 'post.domain', '', 'trim' ) or $this->error( '请填写域名' ) ;
        $condition = array();
        $condition['domain'] = $domain;
        $res = $domain_model->get_one( $condition, 'domain_id' );
        if ( $res ) $this->error( '域名已存在' );
    }
}