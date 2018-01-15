<?php
/**
 * Created by PhpStorm.
 * User: hony
 * Date: 2018/1/15
 * Time: 16:11
 */
class Loader
{
    /* 路径映射 */
    public static $vendorMap = array(
        'Ioc' => __DIR__  ,
//        'Ioc' => __DIR__ . DIRECTORY_SEPARATOR . 'simple_ioc',
    );

    /**
     * 自动加载器
     */
    public static function autoload($class)
    {
//        var_dump($class);die;
//        var_dump(__DIR__ . DIRECTORY_SEPARATOR);die;
        $file = self::findFile($class);
        if (file_exists($file)) {
            self::includeFile($file);
        }
    }

    /**
     * 解析文件路径
     */
    private static function findFile($class)
    {
        $vendor = substr($class, 0, strpos($class, '\\')); // 顶级命名空间
        $vendorDir = self::$vendorMap[$vendor]; // 文件基目录
        $filePath = substr($class, strlen($vendor)) . '.php'; // 文件相对路径
//        var_dump(strtr($vendorDir . $filePath, '\\', DIRECTORY_SEPARATOR));die;
        return strtr($vendorDir . $filePath, '\\', DIRECTORY_SEPARATOR); // 文件标准路径
    }

    /**
     * 引入文件
     */
    private static function includeFile($file)
    {
        if (is_file($file)) {
//            var_dump($file);die;
            include $file;
        }
    }
}