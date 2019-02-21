<?php
/**
 * 备忘录模式
 *
 * 在不破坏封装性的前提下，捕获一个对象的内部状态，并在该对象之外保存这个状态。
 * 这样以后就可以将该对象恢复都原先保存的状态。
 *
 * 备忘录模式比较适用于功能比较复杂的，但需要维护或记录属性历史的类，或者需要保存的属性
 * 只是众多属性中的一小部分时， Originator 可以根据保存的 Memento 信息还原到前一状态。
 *
 * 如果在某个系统中使用命令模式时，需要实现命令的撤销功能，那么命令模式可以使用备忘录模式来存储
 * 可撤销操作的状态。
 *
 * 当角色的状态改变的时候，有可能这个状态无效，这时候就可以使用暂时储存起来的备忘录将状态复原
 *
 */

/**
 * 负责创建一个备忘录 Memento 用以记录当前时刻它的内部状态，并可以使用备忘录恢复内部状态
 *
 * Class Originator
 */
class Originator
{
    private $state;

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    public function createMemento()
    {
        return (new Memento($this->state));
    }

    public function setMemento(Memento $memento)
    {
        $this->state = $memento->getState();
    }

    public function show()
    {
        echo 'State:' . $this->state . PHP_EOL;
    }
}

/**
 * 负责存储 Originator 对象的内部状态，并可以防止 Originator 以外的其他对象访问备忘录 Memento
 *
 * Class Memento
 */
class Memento
{
    private $state;

    /**
     * Memento constructor.
     * @param $state
     */
    public function __construct($state)
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

}

/**
 * 负责保存备忘录 Memento
 *
 * Class Caretaker
 */
class Caretaker
{
    private $memento;

    /**
     * @return mixed
     */
    public function getMemento()
    {
        return $this->memento;
    }

    /**
     * @param mixed $memento
     */
    public function setMemento($memento)
    {
        $this->memento = $memento;
    }

}

// 初始状态
$o = new Originator();
$o->setState('on');
$o->show();

// 保存备忘录
$c = new Caretaker();
$c->setMemento($o->createMemento());

// 结束状态
$o->setState('off');
$o->show();

// 还原状态
$o->setMemento($c->getMemento());
$o->show();
