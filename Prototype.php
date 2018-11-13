<?php
/**
 * 原型模式
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
$c1 = $p1->cloneOne();
var_dump($p1, $c1);
