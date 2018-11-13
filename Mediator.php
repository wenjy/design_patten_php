<?php
/**
 * 中介者模式
 *
 * 用一个中介对象来封装一系列的对象交互。中介者使各个对象不需要显式地相互引用，
 * 从而使其耦合松散，而且可以独立地改变它们之间的交互
 *
 * 中介者模式很容易在系统中应用，也很容易在系统中误用。当系统出现了多对多交互复杂的对象群时，
 * 不要急于使用中介者模式，而要先反思你的系统在设计上是不是合理
 *
 * 中介者模式一般应用于一组对象以定义良好但是复杂的方式进行通信的场合
 *
 */

/**
 * 抽象中介者，定义了同事对象到中介者对象的接口
 *
 * Class Mediator
 */
abstract class Mediator
{
    /**
     * 定义一个抽象方法，得到同事对象和发送消息
     * @param $message
     * @param Colleague $colleague
     * @return mixed
     */
    abstract public function send($message, Colleague $colleague);
}

/**
 * 抽象同事类
 *
 * Class Colleague
 */
abstract class Colleague
{
    /**
     * @var Mediator
     */
    protected $mediator;

    /**
     * Colleague constructor.
     * @param $mediator
     */
    public function __construct(Mediator $mediator)
    {
        $this->mediator = $mediator;
    }

}

/**
 * 具体中介者对象，实现抽象类的方法，它需要知道所有具体同事类，
 * 并从具体同事接收消息，向具体同事对象发出命令
 *
 * Class ConcreteMediator
 */
class ConcreteMediator extends Mediator
{
    /**
     * @var ConcreteColleague1
     */
    private $colleague1;

    /**
     * @var ConcreteColleague2
     */
    private $colleague2;

    /**
     * @param mixed $colleague1
     */
    public function setColleague1($colleague1)
    {
        $this->colleague1 = $colleague1;
    }

    /**
     * @param mixed $colleague2
     */
    public function setColleague2($colleague2)
    {
        $this->colleague2 = $colleague2;
    }

    public function send($message, Colleague $colleague)
    {
        if ($colleague === $this->colleague1) {
            $this->colleague2->notify($message);
        } else {
            $this->colleague1->notify($message);
        }
    }

    /**
     * @var array 保存所有 Colleague 以对象类名为键
     */
    private $colleagueList = [];

    public function setColleague(Colleague $colleague)
    {
        $this->colleagueList[get_class($colleague)] = $colleague;
    }

    public function send1($message, Colleague $colleague)
    {
        //$this->colleagueList[get_class($colleague)]->notify($message);
        $colleague->notify($message);
    }
}

/**
 * 具体同事类，每个具体同事只知道自己的行为，而不了解其它同事类的情况
 * 但他们却都认识中介者对象
 *
 * Class ConcreteColleague1
 */
class ConcreteColleague1 extends Colleague
{

    /**
     * ConcreteColleague1 constructor.
     */
    public function __construct(Mediator $mediator)
    {
        parent::__construct($mediator);
    }

    public function send($message)
    {
        $this->mediator->send1($message, $this);
    }

    public function notify($message)
    {
        echo '同事1得到消息：' . $message . PHP_EOL;
    }
}

class ConcreteColleague2 extends Colleague
{
    /**
     * ConcreteColleague2 constructor.
     */
    public function __construct(Mediator $mediator)
    {
        parent::__construct($mediator);
    }

    public function send($message)
    {
        $this->mediator->send1($message, $this);
    }

    public function notify($message)
    {
        echo '同事2得到消息：' . $message . PHP_EOL;
    }
}

$m = new ConcreteMediator();

// 让两个具体同事类认识中介者对象
$c1 = new ConcreteColleague1($m);
$c2 = new ConcreteColleague2($m);

// 让中介者认识各个具体同事类
//$m->setColleague1($c1);
//$m->setColleague2($c2);
$m->setColleague($c1);
$m->setColleague($c2);

// 具体同事类发送信息都是通过中介者转发
$c1->send('吃饭了没');
$c2->send('没有，你要请客吗');

