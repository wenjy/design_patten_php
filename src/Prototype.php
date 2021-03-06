<?php
/**
 * 原型模式
 *
 * 用原型实例指定创建对象的种类，并且通过拷贝这些原型创建新的对象
 *
 * 从一个对象再创建另一个可定制的对象，而且不需要知道任何创建的细节
 *
 * @author: jiangyi
 * @date: 下午10:29 2018/11/12
 */

abstract class Prototype
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public abstract function cloneOne();
}

class ConcretePrototype extends Prototype
{
    public function __construct($id)
    {
        parent::__construct($id);
    }

    public function cloneOne()
    {
        return clone $this;
    }
}

$p1 = new ConcretePrototype('a');
$p1->setId('p1');
$c1 = $p1->cloneOne();
//var_dump($p1 === $c1);
$c1->setId('c1');
echo $p1->getId() . PHP_EOL;
echo $c1->getId() . PHP_EOL;
