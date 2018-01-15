<?php
/**
 * Created by PhpStorm.
 * User: hony
 * Date: 2018/1/15
 * Time: 16:42
 */

namespace Ioc;


use Closure;

class Container
{
    protected $binds;

    protected $instances;

    /**
     * @param $abstract
     * @param $concrete
     */
    public function bind($abstract, $concrete)
    {
        /*
         * 判断是否是闭包
         * Closure::__construct — 用于禁止实例化的构造函数
         * Closure::bind — 复制一个闭包，绑定指定的$this对象和类作用域。
         * Closure::bindTo — 复制当前闭包对象，绑定指定的$this对象和类作用域。
         * */
        if ($concrete instanceof Closure) {
            $this->binds[$abstract] = $concrete;
        } else {
            $this->instances[$abstract] = $concrete;
        }
    }

    /**
     * @param $abstract
     * @param array $parameters
     * @return mixed
     */
    public function make($abstract, $parameters = [])
    {
        if (isset($this->instances[$abstract])) {
            return $this->instances[$abstract];
        }
        array_unshift($parameters, $this);
        return call_user_func_array($this->binds[$abstract], $parameters);
    }

}