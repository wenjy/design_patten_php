<?php

/**
 * 代理模式
 *
 * 为其他对象提供一种代理以控制对这个对象的访问
 *
 * 远程代理：也就是为一个对象在不同的地址空间提供局部代表，这样可以隐藏一个对象纯在于不同地址空间的事实
 *
 * 虚拟代理：是根据需要创建开销很大的对象，通过它来存放实例化需要很长时间的真实对象
 * html里面的图片路径
 *
 * 安全代理：用来控制真实对象访问时的权限
 *
 * 智能指引：是指当调用真实对象时，代理处理另外一些事
 *
 * 代理模式其实就是在访问对象时引入一定程度的间接性，因为这种间接性，可以附加多种用途。
 *
 */

/**
 * Subject 类，定义了 RealSubject 和 Proxy 的共同接口，
 * 这样就在任何使用 RealSubject 的地方都可以使用 Proxy
 *
 * Interface Subject
 */
interface Subject
{
    public function request();
}

/**
 * 定义 Proxy 所代表的真实实体
 *
 * Class RealSubject
 */
class RealSubject implements Subject
{
    public function request()
    {
        echo '真实的请求';
    }
}

/**
 * 保存一个引用使得代理可以访问实体，并提供一个与 Subject 的接口相同的接口，
 * 这样代理就可以用来代替实体
 *
 * Class Proxy
 */
class Proxy implements Subject
{
    /**
     * @var Subject
     */
    public $realSubject;

    public function Request()
    {
        if ($this->realSubject == null) {
            $this->realSubject = new RealSubject();
        }
        $this->realSubject->request();
    }
}

$proxy = new Proxy();
$proxy->request();
