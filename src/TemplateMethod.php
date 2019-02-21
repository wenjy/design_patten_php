<?php

/**
 * 模板方法模式
 *
 * 定义一个操作中的算法的骨架，而将一些步骤延迟到子类中。
 * 模板方法使得子类可以不改变一个算法的结构即可重新定义该算法的某些特定步骤
 *
 * 当我们要完成在某一细节层次一致的一个过程或一系列步骤，
 * 但其个别步骤在更详细的层次上的实现可能不同时，我们通常考虑使用模板方法模式处理。
 *
 * 模板方法模式是通过把不变的行为搬移到父类，去除子类中的重复代码来体现它的优势。
 * 模板方法模式提供了一个很好的代码复用平台
 * 当不变的和可变的行为在方法的子类实现中混合在一起时，不变的行为就会在子类中重复出现。
 * 我们通过模板方法模式把这些行为搬移到单一对多地方，这样就帮助子类摆脱重复的不变行为的纠缠。
 *
 */

/**
 * 实现了一个模板方法，定义了算法的骨架，具体子类将重定义抽象方法以实现一个算法的步骤
 *
 * Class AbstractClass
 */
abstract class AbstractClass
{
    public abstract function operation1();

    public abstract function operation2();

    public function templateMethod()
    {
        $this->operation1();
        $this->operation2();
    }
}

/**
 * 子类实现具体的算法
 *
 * Class ClassA
 */
class ClassA extends AbstractClass
{
    public function operation1()
    {
        echo '具体类A 方法1 实现' . PHP_EOL;
    }

    public function operation2()
    {
        echo '具体类A 方法2 实现' . PHP_EOL;
    }
}

class ClassB extends AbstractClass
{
    public function operation1()
    {
        echo '具体类B 方法1 实现' . PHP_EOL;
    }

    public function operation2()
    {
        echo '具体类B 方法2 实现' . PHP_EOL;
    }
}

$c = new ClassA();
$c->templateMethod();

$c = new ClassB();
$c->templateMethod();
