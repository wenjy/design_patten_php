<?php
/**
 * 职责链模式
 *
 * 使多个对象都有机会处理请求，从而避免请求的发送者和接收者之间的耦合关系
 * 将这个对象连成一条链，并沿着这条链传递该请求，直到有一个对象处理它为止。
 *
 * 当客户提交一个请求时，请求时沿链传递直至有一个 Handler 对象负责处理它。
 *
 * 接受者和发送者都没有对方的明确信息，且链中的对象自己也并不知道链的结构。
 * 结果是职责链可简化对象的相互连接，它们仅需要保证一个指向其后继者的引用，而不需要保持它所有的候选者的引用。
 *
 * 可以随时地增加或修改处理一个请求的结构，增强了给对象指派职责的灵活性
 *
 * 一个请求极有可能到了链末都得不到处理，或者因为没有正确配置而得不到处理。需要事先考虑清楚
 */

/**
 * 定义一个处理请示的接口
 */
abstract class Handler
{
    /**
     * 下一级的处理者
     * @var static
     */
    protected $successor;

    public function setSuccessor(Handler $successor)
    {
        $this->successor = $successor;
    }

    /**
     * 抽象处理请求接口
     *
     * @param $request
     * @return mixed
     * @author jiangyi
     */
    abstract public function handleRequest($request);
}

class ConcreteHandler1 extends Handler
{
    public function handleRequest($request)
    {
        if ($request >= 0 && $request < 10) {
            echo get_class($this) . '处理请求' . $request . PHP_EOL;
        } elseif ($this->successor != null) {
            $this->successor->handleRequest($request);
        }
    }
}

class ConcreteHandler2 extends Handler
{
    public function handleRequest($request)
    {
        if ($request >= 10 && $request < 20) {
            echo get_class($this) . '处理请求' . $request . PHP_EOL;
        } elseif ($this->successor != null) {
            $this->successor->handleRequest($request);
        }
    }
}

class ConcreteHandler3 extends Handler
{
    public function handleRequest($request)
    {
        if ($request >= 20 && $request < 30) {
            echo get_class($this) . '处理请求' . $request . PHP_EOL;
        } elseif ($this->successor != null) {
            $this->successor->handleRequest($request);
        }
    }
}

$h1 = new ConcreteHandler1();
$h2 = new ConcreteHandler2();
$h3 = new ConcreteHandler3();

// 设置下一级
$h1->setSuccessor($h2);
$h2->setSuccessor($h3);

// 31 无人处理
$requests = [1, 3, 15, 18, 22, 25, 14, 2, 16, 27, 31];

foreach ($requests as $v) {
    $h1->handleRequest($v);
}

// 我曾经在一个商城的订单活动使用过类似这个模式，循环把订单交给每个活动处理，直到所有的活动都过一遍
// laravel框架的request中间件也是类似，把request对象给所有的中间件来处理
