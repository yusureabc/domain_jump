<?php
namespace Home\Controller;
use Think\Controller;

/**
 * 域名管理
 */
class DomainController extends Controller
{
    const page_size = 10;
    /**
     * 跳转域名列表
     * @author Yusure  http://yusure.cn
     * @date   2016-02-09
     * @param  [param]
     * @return [type]     [description]
     */
    public function domain_list()
    {
        $domain_model = D( 'Domain' );
        $page = I( 'get.p', 1, 'intval' );
        $page .= ','.self::page_size;

        /* 条件搜索 Start */
        $condition = array();
        if ( I( 'get.name', '', 'trim' ) != '' )
        {
            $condition['name'] = array( 'like', '%'. I( 'get.name', '', 'trim' ) .'%' );
        }
        if ( I( 'get.domain', '', 'trim' ) != '' )
        {
            $condition['domain'] = I( 'get.domain', '', 'trim' );
        }
        /* 条件搜索 End */


        $domain_list = $domain_model->get_list( $condition, '*', $page );
        $domain_num  = $domain_model->get_count( $condition );

        $Page       = new \Think\Page( $domain_num, self::page_size );// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        $this->assign( 'page', $show );// 赋值分页输出
        $this->assign( 'domain_list', $domain_list );
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
                /* 记录日志 */
                add_log( '添加域名'.$data['domain'] );
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
        $domain_id = I( 'domain_id', '', 'intval' ) or $this->error( 'ID获取失败！' );
        $domain_model = D( 'Domain' );
        $condition = array();
        $condition['domain_id'] = $domain_id;
        if ( IS_POST )
        {
            $this->_checkData();
            $data['name']        = I( 'post.name', '', 'trim' );
            $data['jump_domain'] = I( 'post.jump_domain', '', 'trim' );
            $data['end_time']    = I( 'post.end_time', '', 'strtotime' );
            $data['edit_time']   = time();
            $result = $domain_model->update( $condition, $data );
            if ( $result !== false )
            {
                add_log( '编辑域名'.I('post.domain') );
                $this->success( '操作成功！', U( 'Domain/domain_list' ) );
            }
            else
            {
                $this->error( '操作失败！' );
            }
        }
        else
        {            
            $domain_info = $domain_model->get_one( $condition );
            $this->assign( 'domain_info', $domain_info );
            $this->display();
        }
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

    /**
     * AJAX检查域名是否重复
     * @author Yusure  http://yusure.cn
     * @date   2016-02-14
     * @param  [param]
     * @return [type]     [description]
     */
    public function checkOnceAjax()
    {
        $domain_model = D( 'Domain' );
        $domain = I( 'post.param', '', 'trim' ) or $this->error( '请填写域名' ) ;
        $condition = array();
        $condition['domain'] = $domain;
        $res = $domain_model->get_one( $condition, 'domain_id' );
        if ( $res ) 
        {
            $this->error( '域名已存在' );
        }
        else 
        {
            $succ_data = array();
            $succ_data['status'] = 'y';
            $succ_data['info']   = '通过信息验证！';
            exit( json_encode( $succ_data ) );
        }
    }
}