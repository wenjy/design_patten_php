<?php
/**
 * 观察者模式
 *
 * 定义了一种一对多的依赖关系，让多个观察者对象同时监听一个主题对象。
 * 这个主题对象在状态发生变化时，会通知所有观察者对象，使它们能够自动更新自己。
 *
 * Subject 类，它把所有对观察者对象的引用保存在一个聚集里，每个主题都可以有任何数量的观察者，
 * 抽象主题提供一个接口，可以增加和删除观察对象
 *
 * 将一个系统分割成一系列相互协作的类有一个很不好的副作用，那就是需要维护相关对象间的一致性。
 * 而我们不希望为了维持一致性而使各类紧密耦合，这样会给维护、扩展和重用带来不便。
 *
 * 当一个对象改变需要同时改变其他对象的时候，而且他不知道具体有多少对象有待改变时，应该考虑使用此模式。
 *
 * 当一个抽象模型有两个方面，其中一方面依赖另一方面，这时用观察者模式可以将这两者封装在独立地对象中
 * 使它们各自独立地改变和复用。
 *
 * 观察者模式所做得工作其实就是在解除耦合，让耦合的双方都能依赖于抽象。而不是依赖具体
 * 从而使得各自的变化都不会影响另一边的变化。
 *
 */

/**
 * 它把所有对观察者对象的引用保存在一个聚集里，每个主题都可以有任何数量的观察者。
 * 抽象主题提供一个接口，可以增加和删除观察者对象
 *
 * Class MySubject
 */
abstract class MySubject
{
    private $list = [];

    public function attach($observer)
    {
        $this->list[] = $observer;
    }

    public function detach($observer)
    {
        $key = array_search($observer, $this->list);
        if ($key !== false && array_key_exists($key, $this->list)) {
            unset($this->list[$key]);
        }
    }

    public function notify()
    {
        foreach ($this->list as $observer) {
            $observer->update();
        }
    }
}

/**
 * Observer 类，抽象观察者，为所有的具体观察者对象定义一个接口，在得到主题的通知时更新自己
 *
 * Class Observer
 */
abstract class Observer
{
    abstract public function update();
}

/**
 * 具体主题，将有关状态存入具体观察者对象，在具体主题的内部状态改变时，给所有登记过的观察者发出通知
 *
 * Class ConcreteSubject
 */
class ConcreteSubject extends MySubject
{
    /**
     * 具体被观察者状态
     */
    private $subjectState;

    /**
     * @return mixed
     */
    public function getSubjectState()
    {
        return $this->subjectState;
    }

    /**
     * @param mixed $subjectState
     */
    public function setSubjectState($subjectState)
    {
        $this->subjectState = $subjectState;
    }

}

/**
 * 具体观察者，实现抽象观察者角色所要求的更新接口，以便使本身的状态与主题的状态相协调
 *
 * Class ConcreteObserver
 */
class ConcreteObserver extends Observer
{
    private $name;
    private $observerState;

    /**
     * @var ConcreteSubject
     */
    private $subject;

    /**
     * ConcreteObserver constructor.
     * @param $name
     */
    public function __construct(ConcreteSubject $subject, $name)
    {
        $this->subject = $subject;
        $this->name = $name;
    }

    public function update()
    {
        $this->observerState = $this->subject->getSubjectState();
        echo '观察者' . $this->name . '的新状态是' . $this->observerState . PHP_EOL;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

}

// 实例化主题
$s = new ConcreteSubject();
// 给主题添加观察者
$s->attach(new ConcreteObserver($s, 'X'));
$s->attach(new ConcreteObserver($s, 'Y'));
$s->attach(new ConcreteObserver($s, 'Z'));

// 设置主题状态
$s->setSubjectState('ABC');
// 通知所有观察者
$s->notify();
