<?php



//实现自动加载
use Ioc\ContainerUpgrade;

include 'Loader.php'; // 引入加载器

spl_autoload_register('Loader::autoload'); // 注册自动加载
//==================使用反射（reflection就更像laravel），使我们的IOC更加自动加载组件类，据说还可以生成文档
$app = new ContainerUpgrade();
$app->bind("Ioc\SuperModuleInterface", "Ioc\XPower");//SuperModuleInterface 为接口， Ioc\XPower 是 class XPower
$app->bind("SupermanAs", "Ioc\Superman"); //SupermanAs可以当做是Class Superman 的服务别名

//通过字符解析，或得到了Class Superman 的实例
$superman = $app->make("SupermanAs");
$superman->comActivate();

?>