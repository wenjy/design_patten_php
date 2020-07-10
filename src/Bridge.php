<?php
/**
 * 桥接模式
 *
 * 将抽象部分与它的实现部分分离，使它们都可以独立地变化
 *
 * 什么叫抽象与它的实现分离，这并不是说，让抽象类与其派生类分离，因为这没有任何意义
 * 实现指的是抽象类和它的派生类用来实现自己的对象
 * 手机可以按品牌分类，也可以按照功能分类，这样可以把手机品牌和软件分别抽象出来，手机品牌聚合软件
 * 由于实现的方式有多种，桥接模式的核心意图就是把这些实现独立出来，让它们各自的变化。
 * 这使得每种实现的变化不会影响其它的实现，从而达到应对变化的目的
 *
 * 实现系统可能有多角度分类，每一种分类都有可能变化，那么就把这种多角度分离出来让它们独立变化，减少它们之间的耦合
 *
 */

/**
 * 定义具体实现类的抽象接口
 *
 * Class Implementor
 */
abstract class Implementor
{
    abstract public function operation();
}

/**
 * 具体实现类A，实现接口
 *
 * Class ConcreteImplementorA
 */
class ConcreteImplementorA extends Implementor
{
    public function operation()
    {
        echo '具体实现A的方法执行' . PHP_EOL;
    }
}

/**
 * 具体实现类B，实现接口
 *
 * Class ConcreteImplementorB
 */
class ConcreteImplementorB extends Implementor
{
    public function operation()
    {
        echo '具体实现B的方法执行' . PHP_EOL;
    }
}

/**
 * 负责保存实现者，并调用实现者的实现接口
 *
 * Class Abstraction
 */
class Abstraction
{
    /**
     * @var Implementor
     */
    protected $implementor;

    public function setImplementor(Implementor $implementor)
    {
        $this->implementor = $implementor;
    }

    /**
     * 这里调用具体的实现者
     * @author jiangyi
     */
    public function operation()
    {
        $this->implementor->operation();
    }
}

/**
 * 具体的抽象
 * Class RefinedAbstraction
 */
class RefinedAbstraction extends Abstraction
{
    public function operation()
    {
        $this->implementor->operation();
    }
}

$ab = new RefinedAbstraction();

$ab->setImplementor(new ConcreteImplementorA());
$ab->operation();

$ab->setImplementor(new ConcreteImplementorB());
$ab->operation();
