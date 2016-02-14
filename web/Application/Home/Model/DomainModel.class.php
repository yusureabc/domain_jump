<?php
namespace Home\Model;
use Think\Model;

class DomainModel extends Model
{

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
}