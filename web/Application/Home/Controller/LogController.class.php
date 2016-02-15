<?php
namespace Home\Controller;
use Think\Controller;

/**
 * 用户操作日志
 */
class LogController extends Controller
{
    /**
     * 日志列表
     * @author Yusure  http://yusure.cn
     * @date   2016-02-15
     * @param  [param]
     * @return [type]     [description]
     */
    public function index()
    {
        $log_model = D( 'Log' );
        $page = I( 'get.p', 1, 'intval' );
        $page .= ',10';
        $log_list = $log_model->get_list( $condition, '*', $page );
        $log_count = $log_model->get_count( $condition );
        $Page       = new \Think\Page( $log_count, 10 );// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        $this->assign( 'page', $show );// 赋值分页输出
        $this->assign( 'log_list', $log_list );
        $this->display();
    }
}