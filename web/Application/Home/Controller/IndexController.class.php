<?php
namespace Home\Controller;
use Think\Controller;

/**
 * 后台管理
 */
class IndexController extends BaseAdminController 
{
    /**
     * 后台首页
     * @author Yusure  http://yusure.cn
     * @date   2016-02-02
     * @param  [param]
     * @return [type]     [description]
     */
    public function index()
    {
        $this->display();
    }
}