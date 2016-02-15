<?php

/**
 * 高亮正在操作的一级分类
 * @author Yusure  http://yusure.cn
 * @date   2016-02-09
 * @param  [param]
 * @param  [type]     $controller_name [控制器名称]
 * @return [type]     current          [返回高亮class样式]
 */
function current_controller( $controller_name )
{
    echo CONTROLLER_NAME == $controller_name ? 'current' : '';
}

/**
 * 高亮正在操作的二级分类
 * @author Yusure  http://yusure.cn
 * @date   2016-02-09
 * @param  [param]
 * @param  [type]     $controller_name [控制器名称]
 * @param  [type]     $action_name     [方法名]
 * @return [type]     current          [返回高亮class样式]
 */
function current_action( $controller_name, $action_name )
{
    echo CONTROLLER_NAME == $controller_name && ACTION_NAME == $action_name ? 'current' : '';
}

/**
 * 记录用户 操作日志
 * @author Yusure  http://yusure.cn
 * @date   2016-02-15
 * @param  [param]
 */
function add_log( $msg )
{
    $log_model = M( 'Log' );
    $data['add_time']  = time();
    $data['user_id']   = session('user_info.user_id');
    $data['user_name'] = session('user_info.user_name');
    $data['log_msg']   = $msg;
    $log_model->add( $data );
}