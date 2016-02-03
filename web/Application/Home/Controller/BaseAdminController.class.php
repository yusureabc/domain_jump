<?php
namespace Home\Controller;
use Think\Controller;

/**
 * 总后台管理基类
 */
class BaseAdminController extends Controller
{
    public function _initialize()
    {
        // 检查登陆
        if ( ! session('?user_info') )
        {
            $this->error( '请登录！', U( 'Login/login' ) );
        }
    }
}