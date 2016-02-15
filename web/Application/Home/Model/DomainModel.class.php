<?php
namespace Home\Model;
use Think\Model;

class DomainModel extends Model
{

    /**
     * 获取列表数据
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
     * 获取单条记录
     * @author Yusure  http://yusure.cn
     * @date   2016-02-14
     * @param  [param]
     * @return [type]     [description]
     */
    public function get_one( $condition, $field = '*' )
    {
        return $this->where( $condition )->field( $field )->find();
    }

    /**
     * 获取总数
     * @author Yusure  http://yusure.cn
     * @date   2016-02-15
     * @param  [param]
     * @return [type]     [description]
     */
    public function get_count( $condition )
    {
        return $this->where( $condition )->count();
    }

    /**
     * 更新数据
     * @author Yusure  http://yusure.cn
     * @date   2016-02-15
     */
    public function update( $condition, $data )
    {
        return $this->where( $condition )->save( $data );
    }
}