<?php
/**
 * Created by PhpStorm.
 * User: hony
 * Date: 2018/1/15
 * Time: 14:43
 */
namespace Ioc;
use Ioc\SuperModuleInterface;

class XPower implements SuperModuleInterface{
//    public function  __construct()
//    {
//        echo "123";die;
//    }

    public function activate(array $target)
    {
        echo "XPower";
        // 这只是个例子。。具体自行脑补
    }
}