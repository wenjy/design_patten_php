<?php
/**
 * 外观模式
 *
 * 为子系统中的一组接口提供一个一致的界面，此模式定义了一个高层接口，
 * 这个接口使得这一子系统更加容易使用
 *
 * 首先，在设计初期阶段，应该要有意识的将不同的两个层分离，比如经典的MVC三层架构
 * 层与层之间建立外观 Facade
 *
 * 其次，在开发阶段，子系统往往因为不断的重构演化而变得越来越复杂，增加外观 Facade
 * 可以提供一个简单的接口，减少它们之间的依赖。
 *
 * 第三，在维护一个遗留的大型系统时，可能这个系统以及非常难以维护和扩展了，可以为新系统开发一个外观 Facade 类，
 * 来提供设计粗糙或高度复杂的遗留代码的比较清晰简单的接口，让新系统与 Facade 对象交互，
 * Facade 与遗留代码交互所有复杂的工作
 *
 */

class SubSystemOne
{
    public function methodOne()
    {
        echo '子系统方法一'.PHP_EOL;
    }
}

class SubSystemTwo
{
    public function methodTwo()
    {
        echo '子系统方法二'.PHP_EOL;
    }
}

class SubSystemThree
{
    public function methodThree()
    {
        echo '子系统方法三'.PHP_EOL;
    }
}

class SubSystemFour
{
    public function methodFour()
    {
        echo '子系统方法四' .PHP_EOL;
    }
}

/**
 * 外观类，知道哪些子系统负责处理请求，将客户的请求代理给适当的子系统对象
 *
 * Class Facade
 */
class Facade
{
    public $one;
    public $two;
    public $three;
    public $four;

    /**
     * Facade constructor.
     */
    public function __construct()
    {
        $this->one = new SubSystemOne();
        $this->two = new  SubSystemTwo();
        $this->three = new SubSystemThree();
        $this->four = new SubSystemFour();
    }

    public function methodA()
    {
        echo '方法组A:' . PHP_EOL;
        $this->one->methodOne();
        $this->three->methodThree();
    }

    public function methodB()
    {
        echo '方法组B:' . PHP_EOL;
        $this->four->methodFour();
        $this->two->methodTwo();
    }

}

$facade = new Facade();
$facade->methodA();
$facade->methodB();
