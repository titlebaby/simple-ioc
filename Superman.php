<?php
/**
 * Created by PhpStorm.
 * User: hony
 * Date: 2018/1/15
 * Time: 14:45
 */

use Ioc\Container;
use Ioc\SuperModuleInterface;
use Ioc\UltraBomb;
use Ioc\XPower;

class Superman{
    protected $module;
    public function __construct(SuperModuleInterface $module)
    {
        $this->module = $module;
        $this->module->activate([]);
    }
}
//实现自动加载
include 'Loader.php'; // 引入加载器
spl_autoload_register('Loader::autoload'); // 注册自动加载
//$superModule = new XPower;
// 初始化一个超人，并注入一个超能力模组依赖 必须符合契约
//$superMan = new Superman($superModule);


//==============都说是手动的 还需要优化 IOC，工厂模式的升华 —— IoC 容器
// 创建一个容器（后面称作超级工厂）
$container = new Container;

// 向该 超级工厂 添加 超人 的生产脚本
$container->bind('superman',function($container,$moduleName){
    return new  Superman($container->make($moduleName));

});
// 向该 超级工厂 添加 超能力模组 的生产脚本
$container->bind('xpower',function(){
    return new XPower;
});
// 同上
$container->bind('ultrabomb', function($container) {
    return new UltraBomb;
});

// ******************  华丽丽的分割线  **********************
// 开始启动生产
/*
 * 们彻底的解除了 超人 与 超能力模组 的依赖关系，更重要的是，容器类也丝毫没有和他们产生任何依赖！
 * 我们通过注册、绑定的方式向容器中添加一段可以被执行的回调（可以是匿名函数、非匿名函数、类的方法）作为生产一个类的实例的 脚本 ，
 * 只有在真正的 生产（make） 操作被调用执行时，才会触发=====这里是重点。
 * */
$superman_1 = $container->make('superman', ['xpower']);
$superman_2 = $container->make('superman', ['ultrabomb']);
//var_dump($superman_2->activate([]));

