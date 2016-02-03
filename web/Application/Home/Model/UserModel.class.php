<?php
namespace Home\Model;
use Think\Model;

/**
 * 账户Model
 */
class UserModel extends Model
{

    /**
     * 获取单条用户记录
     * @author Yusure  http://yusure.cn
     * @date   2016-02-03
     * @param  [param]
     * @return [type]     [description]
     */
    public function get_info( $condition, $field = '*' )
    {
        return $this->where( $condition )->field( $field )->find();
    }
}