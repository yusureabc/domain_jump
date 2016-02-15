<?php
namespace Home\Controller;
use Think\Controller;

/**
 * 设置 控制器
 */
class SettingController extends Controller
{

    /**
     * 修改密码
     * @author Yusure  http://yusure.cn
     * @date   2016-02-15
     * @param  [param]
     * @return [type]     [description]
     */
    public function up_passwd()
    {
        if ( IS_POST )
        {
            $user_model = D( 'User' );
            $old_res = $this->_check_oldpwd( I('post.old_pwd') );
            $old_res ? : $this->error( '旧密码错误' );
            /* 检查数据规范 */
            $this->_check_passwd_data();
            $condition['user_id'] = session( 'user_info.user_id' );
            $data['user_passwd'] = I( 'post.new_pwd', '', 'md5' );
            $up_res = $user_model->update( $condition, $data );
            if ( $up_res !== false )
            {
                add_log( '修改密码' );
                $this->success( '操作成功！', U( 'Login/logout' ) );
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
     * 检查修改密码数据
     * @author Yusure  http://yusure.cn
     * @date   2016-02-15
     * @param  [param]
     * @return [type]     [description]
     */
    private function _check_passwd_data()
    {
        import('Org.Util.Validate');    
        $obj_validate = new \Validate(); 
        $obj_validate->validateparam = array( 
            array('input'=>$_POST['old_pwd'],'require'=>'true','message'=>'旧不能为空'),
            array('input'=>$_POST['new_pwd'],'require'=>'true','message'=>'新密码不能为空'), 
            array('input'=>$_POST['new_pwd'],  'require'=>'true','validator'=>'length','min'=>'6','max'=>'16','message'=>'密码范围在6~16位之间！'), 
            array('input'=>$_POST['confirm_pwd'],'require'=>'true','message'=>'确认密码不能为空'),
            array('input'=>$_POST['new_pwd'], 'validator'=>'compare', 'operator'=>'==' ,'to'=>$_POST['confirm_pwd'],'message'=>'您两次输入的密码不一致！' ), 
        ); 
        $error = $obj_validate->validate(); 
        if ( $error != '' )
        { 
            $this->error( $error ); 
        }
    }

    /**
     * 检查旧密码
     * @author Yusure  http://yusure.cn
     * @date   2016-02-15
     * @param  [pwd]      未经过加密的密码
     * @return [type]     [description]
     */
    private function _check_oldpwd( $pwd )
    {
        $user_model = D( 'User' );
        $condition['user_id'] = session( 'user_info.user_id' );
        $user_info = $user_model->get_info( $condition, 'user_passwd' );
        if ( $user_info['user_passwd'] === md5( $pwd ) )
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * AJAX检查旧密码
     * @author Yusure  http://yusure.cn
     * @date   2016-02-15
     * @param  [param]
     * @return [type]     [description]
     */
    public function check_oldpwd_ajax()
    {
        $res = $this->_check_oldpwd( I( 'post.param' ) );
        if ( $res )
        {
            $data['status'] = 'y';
            $data['info'] = '旧密码正确！';
            exit( json_encode( $data ) );
        }
        else
        {
            $this->error( '旧密码错误' );
        }
    }
}