<?php
namespace Home\Model;
use Think\Model;

/**
 * 操作日志 Model
 */
class LogModel extends Model
{

    /**
     * 获取列表
     * @author Yusure  http://yusure.cn
     * @date   2016-02-15
     * @param  [param]
     * @return [type]     [description]
     */
    public function get_list( $condition, $field = '*', $page = '', $order = 'add_time desc' )
    {
        return $this->where( $condition )->field( $field )->page( $page )->order( $order )->select();
    }

    /**
     * 获取总条数
     * @author Yusure  http://yusure.cn
     * @date   2016-02-15
     * @param  [param]
     * @param  [type]     $condition [description]
     * @return [type]                [description]
     */
    public function get_count( $condition )
    {
        return $this->where( $condition )->count();
    }
}