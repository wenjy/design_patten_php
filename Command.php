<?php
/**
 * 命令模式
 *
 * 将一个请求封装为一个对象，从而使你可以用不同的请求对客户进行参数化；
 * 对请求排队或记录请求日志，以及支持可撤销的操作
 *
 * 第一，它能较容易地设计一个命令队列；
 * 第二，在需要的情况下，可以较容易的将命令计入日志；
 * 第三，允许接收请求的一方决定是否要否决请求；
 * 第四，可以容易的实现对请求的撤销和重做；
 * 第五，由于加进新的具体命令不能影响其他的类，因此增加新的具体命令很容易
 *
 * 命令模式把请求一个操作的对象与知道怎么执行一个操作的对象分隔开
 *
 * 敏捷开发原则告诉我们，不要为代码添加基于猜测的、实际不需要的功能。
 * 如果不清楚一个系统是否需要命令模式，就不要急着去实现它，事实上，在需要的时候通过重构实现这个模式
 * 并不困难，只有在真正需要如撤销/恢复操作等功能时，把原来的代码重构为命令模式才有意义。
 */

/**
 * 用来声明执行操作的接口
 */
abstract class Command
{
    /**
     * @var Receiver
     */
    protected $receiver;

    /**
     * Command constructor.
     * @param $receiver
     */
    public function __construct(Receiver $receiver)
    {
        $this->receiver = $receiver;
    }

    /**
     * 抽象执行命令接口
     *
     * @return mixed
     * @author jiangyi
     */
    abstract public function execute();

}

/**
 * 将一个接受者对象绑定于一个动作，调用接受者相应的操作，以实现 execute
 *
 * Class ConcreteCommand
 */
class ConcreteCommand extends Command
{
    /**
     * ConcreteCommand constructor.
     */
    public function __construct(Receiver $receiver)
    {
        parent::__construct($receiver);
    }

    public function execute()
    {
        $this->receiver->action();
    }
}

/**
 * 要求该命令执行这个请求
 *
 * Class Invoker
 */
class Invoker
{
    /**
     * @var Command
     */
    private $command;

    /**
     * @param mixed $command
     */
    public function setCommand($command)
    {
        $this->command = $command;
    }

    public function executeCommand()
    {
        $this->command->execute();
    }
}

/**
 * 具体的命令执行者，知道如何实施与执行一个请求相关的操作，任何类都可能作为一个接受者
 * 命令执行者知道所有的命令执行
 * 或者这里可以定义一个抽象接口，实现不同的命令执行者执行不同的命令，这样更利于扩展
 *
 * Class Receiver
 */
abstract class Receiver
{
    public function action()
    {
        echo '执行请求' . PHP_EOL;
    }

    public function action1()
    {
        echo '执行请求2' . PHP_EOL;
    }

    abstract function absAction();
}

class ReceiverA extends Receiver
{
    function absAction()
    {
        echo 'A执行请求' . PHP_EOL;
    }
}

class ReceiverB extends Receiver
{
    function absAction()
    {
        echo 'B执行请求' . PHP_EOL;
    }
}

// 实例化执行者
$r = new ReceiverA();
// 指定该命令的执行者
$c = new ConcreteCommand($r);

// 要求指定的执行者执行命令
$i = new Invoker();
$i->setCommand($c);
$i->executeCommand();
