<?php
/**
 * 访问者模式
 *
 * 表示一个作用于某对象结构中的各元素的操作，它使你可以在不改变各元素的类的前提下
 * 定义作用于这些元素的新操作
 *
 * 访问者模式适用于数据结构相对稳定的系统
 * 它把数据结构和作用于结构上的操作之间的耦合脱开，使得操作合集可以相对自由地演化
 *
 * 访问者模式的目的是要把处理从数据结构中分离出来
 * 如果系统有比较稳定的数据结构，又有易于变化的算法的话，使用访问者模式就是比较适合的，
 * 因为访问者模式使得算法操作的增加变得容易
 *
 * 访问者模式的优点就是增加新的操作很容易，因为增加新的操作就意味着增加一个新的访问者，
 * 访问者模式将有关的行为集中到一个访问者对象中
 *
 * 访问者模式的缺点其实也就是使增加新的数据结构变得困难了
 *
 */

/**
 * 为该对象结构中的 ConcreteElement 的每一个类声明一个 Visit 操作
 * Class Visitor
 */
abstract class Visitor
{
    // 总的数据
    abstract public function visitConcreteElementA(ConcreteElementA $concreteElementA);

    abstract public function visitConcreteElementB(ConcreteElementB $concreteElementB);
}

/**
 * 具体访问者，实现每个由 Visitor 声明的操作。
 * 每个操作实现算法的一部分，而该算法片段乃是对应于结构中对象的类
 *
 * Class ConcreteVisitor1
 */
class ConcreteVisitor1 extends Visitor
{
    public function visitConcreteElementA(ConcreteElementA $concreteElementA)
    {
        echo get_class($concreteElementA) . '被' . get_class($this) . '访问' . PHP_EOL;
    }

    public function visitConcreteElementB(ConcreteElementB $concreteElementB)
    {
        echo get_class($concreteElementB) . '被' . get_class($this) . '访问' . PHP_EOL;
    }
}

class ConcreteVisitor2 extends Visitor
{
    public function visitConcreteElementA(ConcreteElementA $concreteElementA)
    {
        echo get_class($concreteElementA) . '被' . get_class($this) . '访问' . PHP_EOL;
    }

    public function visitConcreteElementB(ConcreteElementB $concreteElementB)
    {
        echo get_class($concreteElementB) . '被' . get_class($this) . '访问' . PHP_EOL;
    }
}

/**
 * 定义一个 accept 操作，它以一个访问者为参数
 *
 * Class Element
 */
abstract class Element
{
    abstract public function accept(Visitor $visitor);
}

class ConcreteElementA extends Element
{
    public function accept(Visitor $visitor)
    {
        $visitor->visitConcreteElementA($this);
    }

    public function operationA()
    {

    }
}

class ConcreteElementB extends Element
{
    public function accept(Visitor $visitor)
    {
        $visitor->visitConcreteElementB($this);
    }

    public function operationB()
    {

    }
}

/**
 * 能枚举它的元素，可以提供一个高层的接口以允许访问者访问它的元素
 *
 * Class ObjectStructure
 */
class ObjectStructure
{
    /**
     * @var Element[]
     */
    private $elements;

    public function attach(Element $element)
    {
        $key = get_class($element);
        $this->elements[$key] = $element;
    }

    public function detach(Element $element)
    {
        $key = get_class($element);
        if (isset($this->elements[$key])) {
            unset($this->elements[$key]);
        }
    }

    public function accept(Visitor $visitor)
    {
        foreach ($this->elements as $v) {
            $v->accept($visitor);
        }
    }
}

$o = new ObjectStructure();

// 添加要被访问的元素
$o->attach(new ConcreteElementA());
$o->attach(new ConcreteElementB());

// 每个访问者循环访问元素
$o->accept(new ConcreteVisitor1());
$o->accept(new ConcreteVisitor2());
