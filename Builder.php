<?php
/**
 * 建造者模式
 *
 * 将一个复杂的对象的结构与它的表示分离，使得同样的构建过程可以创建不同的表示，而不需要知道具体的建造过程
 *
 * 主要用于创建一些复杂的对象，这些对象内部构建的建造顺序通常是稳定的，但对象内部的构建通常面临复杂的变化。
 *
 * 建造者模式的好处就是使得建造代码与表示代码分离，由于建造者隐藏了该产品是如何组装的，
 * 所以若需要改变一个产品的内部表示，只需要定义一个具体的建造者就可以了。
 *
 * 建造者模式是在当创建复杂对象的算法应该独立于该对象的组成部分以及它们的装配方式时适用的模式。
 *
 */

/**
 * 产品类，由多个部件组成
 *
 * Class Product
 */
class Product
{
    /**
     * @var array 保存所有的部件
     */
    public $parts = [];

    public function add($part)
    {
        $this->parts[] = $part;
    }

    /**
     * 循环创建产品的所有部件
     *
     * @author jiangyi
     */
    public function show()
    {
        echo '产品创建' . PHP_EOL;
        foreach ($this->parts as $part) {
            echo $part . PHP_EOL;
        }
    }
}

/**
 * Builder 是为了创建一个 Product 对象的各个部分指定的抽象接口。
 * 也就是 Product 的各个部件组成，和返回 Product
 *
 * Class Builder
 */
abstract class Builder
{
    abstract public function buildPartA();

    abstract public function buildPartB();

    abstract public function getResult();
}

/**
 * 具体建造者，实现 Builder 接口，构造和装配各个部件
 *
 * Class ConcreteBuilder1
 */
class ConcreteBuilder1 extends Builder
{
    private $product;

    /**
     * ConcreteBuilder1 constructor.
     */
    public function __construct()
    {
        $this->product = new Product();
    }

    public function buildPartA()
    {
        $this->product->add('部件A');
    }

    public function buildPartB()
    {
        $this->product->add('部件B');
    }

    public function getResult()
    {
        return $this->product;
    }
}

class ConcreteBuilder2 extends Builder
{
    private $product;

    /**
     * ConcreteBuilder2 constructor.
     */
    public function __construct()
    {
        $this->product = new Product();
    }

    public function buildPartA()
    {
        $this->product->add('部件X');
    }

    public function buildPartB()
    {
        $this->product->add('部件Y');
    }

    public function getResult()
    {
        return $this->product;
    }
}

/**
 * 指挥者，构建一个使用 Builder 的对象
 *
 * Class Director
 */
class Director
{
    /**
     * 指挥者必须知道建造者的所有方法，然后调用具体的方法建造
     *
     * @param Builder $builder
     * @author jiangyi
     */
    public function construct(Builder $builder)
    {
        $builder->buildPartA();
        $builder->buildPartB();
    }
}

// 调用端不需要知道具体的建造过程

$director = new Director();
$b1 = new ConcreteBuilder1();
$b2 = new ConcreteBuilder2();

$director->construct($b1);
$p1 = $b1->getResult();
$p1->show();

$director->construct($b2);
$p2 = $b2->getResult();
$p2->show();
