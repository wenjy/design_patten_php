<?php

/**
 * 装饰模式
 *
 * 动态的给一个对象添加一些额外的职责，就增加功能来说，装饰模式比生成子类更为灵活
 *
 * 当系统需要新功能的时候，是向旧的类中添加新的代码。这些新加的代码通常装饰了原有类的核心职责或者主要行为；
 * 在主类中加入了新的字段、新的方法和新的逻辑，从而增加了主类的复杂度，而这些新加入的东西仅仅是为了满足
 * 一些只在某种特定情况下才会执行的特殊行为的需要。
 *
 * 为已有的功能动态地添加更多功能的一种方式
 * 把类中的装饰功能从类中搬移出去，这样可以简化原有的类，有效地把类的核心职责和装饰功能区分开，
 * 而且可以去除相关类中重复的装饰逻辑
 *
 */

/**
 * 定义一个对象接口，可以给这些对象动态的添加职责
 */
abstract class DecoratorComponent
{
    /**
     * 添加职责的操作
     * @return mixed
     */
    public abstract function operation();
}

/**
 * 定义了一个具体的对象，也可以给这个对象添加一些职责
 *
 * 如果只有一个 ConcreteComponent 类而没有抽象的 Component 类，那么 Decorator 类
 * 可以是 ConcreteComponent 的一个子类。同样的道理，如果只有一个 Decorator 类，那么就没有必要
 * 建立一个单独的 Decorator 类，而可以把 Decorator 类和 ConcreteComponent 的责任合并成一个类。
 */
class ConcreteDecoratorComponent extends DecoratorComponent
{
    public function operation()
    {
        echo '具体对象的操作' . PHP_EOL;
    }

    public function test()
    {

    }
}

/**
 * 装饰抽象类，继承了 Component ，从外类来扩展 Component 类的功能，但对于 Component 来说，
 * 是无需知道 Decorator 的存在的
 * 利用 setComponent 来对对象进行包装，每个装饰对象的实现就和如何使用这个对象分离开了，
 * 每个装饰对象只关心自己的功能，不需要关心如何被添加到对象链当中
 */
class Decorator extends DecoratorComponent
{
    /**
     * @var DecoratorComponent
     */
    protected $component;

    /**
     * 设置要装饰的对象
     *
     * @param DecoratorComponent $component
     * @author jiangyi
     */
    public function setComponent(DecoratorComponent $component)
    {
        $this->component = $component;
    }

    public function operation()
    {
        if ($this->component != null) {
            $this->component->operation();
        }
    }
}

/**
 * 具体的装饰对象，起到给 Component 添加职责的功能
 *
 * Class DecoratorA
 */
class DecoratorA extends Decorator
{
    private $addedState;

    public function operation()
    {
        parent::operation();
        $this->addedState = 'New State';
        echo '具体装饰对象A的操作' . PHP_EOL;
    }
}

class DecoratorB extends Decorator
{
    public function operation()
    {
        parent::operation();
        $this->addedBehavior();
        echo '具体装饰对象B的操作' . PHP_EOL;
    }

    private function addedBehavior()
    {

    }
}

class DecoratorC extends Decorator
{
    public function operation()
    {
        parent::operation();
        $this->addedBehavior();
        echo '具体装饰对象C的操作' . PHP_EOL;
    }

    private function addedBehavior()
    {

    }
}

$c = new ConcreteDecoratorComponent();
$d1 = new DecoratorA();
$d2 = new DecoratorB();
$d3 = new DecoratorC();

// 从最里面开始执行
// d1装饰c
$d1->setComponent($c);
// d2装饰d1
$d2->setComponent($d1);
// d3装饰d2
$d3->setComponent($d2);
//var_dump($d3);
$d3->operation();
