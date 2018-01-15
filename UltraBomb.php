<?php
/**
 * Created by PhpStorm.
 * User: hony
 * Date: 2018/1/15
 * Time: 14:44
 */
namespace Ioc;
use Ioc\SuperModuleInterface;
class UltraBomb implements SuperModuleInterface{
    public function activate(array $target)
    {
        echo "UltraBomb";
        // 这只是个例子。。具体自行脑补
    }
}