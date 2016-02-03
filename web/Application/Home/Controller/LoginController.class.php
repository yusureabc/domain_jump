<?php
namespace Home\Controller;
use Think\Controller;

/**
 * 登陆管理
 */
class LoginController extends Controller
{

    public function login()
    {
        /* 登录成功就跳转后台 */
        if ( session('?user_info') )
        {
            $this->redirect( 'Index/index' );
        }
        /* 登陆提交 */
        if ( IS_POST )
        {
            /* 检查登陆提交 */
            $this->_checkLoginPost();
            /* TODO 登陆 */
            $this->_LoginPost();
        }
        else
        {
            $this->display();
        }
    }

    /**
     * 退出操作
     * @author Yusure  http://yusure.cn
     * @date   2016-02-03
     * @param  [param]
     * @return [type]     [description]
     */
    public function logout()
    {
        session( null ); // 清空当前的session
        $this->success( '退出成功！', U('Login/login') );
    }

    /**
     * 检查登陆提交
     * @author Yusure  http://yusure.cn
     * @date   2016-02-03
     * @param  [param]
     * @return [type]     [description]
     */
    private function _checkLoginPost()
    {
        import('Org.Util.Validate');    
        $obj_validate = new \Validate(); 
        $obj_validate->validateparam = array( 
            array('input'=>$_POST['user_name'],'require'=>'true','message'=>'用户名不能为空'), 
            array('input'=>$_POST['user_passwd'],'require'=>'true','message'=>'密码不能为空'), 
            array('input'=>$_POST['user_name'],  'require'=>'true','validator'=>'length','min'=>'1','max'=>'32','message'=>'用户名太长'), 
            array('input'=>$_POST['user_passwd'],  'require'=>'true','validator'=>'length','min'=>'1','max'=>'32','message'=>'密码太长'), 
        ); 
        $error = $obj_validate->validate(); 
        if ( $error != '' )
        { 
            $this->error( $error ); 
        }
    }

    /**
     * 执行登陆产生SESSION
     * @author Yusure  http://yusure.cn
     * @date   2016-02-03
     * @param  [param]
     * @return [type]     [description]
     */
    private function _LoginPost()
    {
        $user_model = D( 'User' );
        $condition = array();
        $condition['user_name'] = I( 'post.user_name', '', 'trim' );
        $user_info = $user_model->get_info( $condition );
        $user_passwd = I( 'post.user_passwd', '', 'md5' );
        if ( $user_passwd != $user_info['user_passwd'] )
        {
            $this->error( '密码错误！' );
        }
        else
        {
            session( 'user_info', $user_info );
            $this->success( '登陆成功！', U('Index/index') );
        }
        
    }
}