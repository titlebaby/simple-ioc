<?php
/**
 * Created by PhpStorm.
 * User: hony
 * Date: 2018/1/15
 * Time: 14:42
 */
namespace Ioc;
interface  SuperModuleInterface{
    /**
     * 超能力激活方法
     *
     * 任何一个超能力都得有该方法，并拥有一个参数
     *@param array $target 针对目标，可以是一个或多个，自己或他人
     */
    public function activate(array $target);
}