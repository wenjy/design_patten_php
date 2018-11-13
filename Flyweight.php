<?php
/**
 * 享元模式
 *
 * 运用共享技术有效地支持大量细粒度的对象
 *
 * 享元模式可以避免大量非常相似类的开销，在程序设计中，有时需要生成大量细粒度的类实例来展示数据。
 * 如果发现这些实例除了几个参数外基本都是相同的，有时就能够大幅度地减少需要实例化的类的数量。
 * 如果能把那些参数移到类实例外面，在方法调用时将它们传递进来，就可以通过共享大幅度地减少单个实例的数目。
 *
 * 如果一个应用程序使用了大量的对象，而大量的对象造成了很大的存储开销时，就应该考虑使用；
 * 还有就是对象大多数状态可以外部状态，如果删除对象的外部状态，那么可以使用相当较少的共享对象取代很多组对象。
 * 此时可以考虑使用享元模式。
 *
 */

class User
{
    private $name;

    /**
     * User constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

}

/**
 * 所有具体享元类的超类或接口
 *
 * Class WebSite
 */
abstract class WebSite
{
    abstract public function use1(User $user);
}

class ConcreteWebSite extends WebSite
{
    private $name = '';

    /**
     * WebSite constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function use1(User $user)
    {
        echo '网站分类：' . $this->name . '用户：' . $user->getName() . PHP_EOL;
    }
}

/**
 * 一个享元工厂，用来创建并管理 WebSite 对象。它主要是用来确保合理的共享 WebSite
 * 当用户请求一个 WebSite 对象时，提供一个已创建的实例（不存在则创建）
 *
 * Class WebSiteFactory
 */
class WebSiteFactory
{
    /**
     * @var array 保存所有的对象
     */
    private $flyweights = [];

    public function getWebSiteCategory($key)
    {
        if (!isset($this->flyweights[$key])) {
            $this->flyweights[$key] = new ConcreteWebSite($key);
            return $this->flyweights[$key];
        }
        return null;
    }

    public function getWebSiteCount()
    {
        return count($this->flyweights);
    }
}

$f = new WebSiteFactory();

$fx = $f->getWebSiteCategory('产品展示');
$fx->use1(new User('小菜'));
