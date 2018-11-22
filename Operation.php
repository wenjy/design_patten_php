<?php

/**
 * 简单工厂模式
 *
 * 用一个工厂来创建我们所需要的类
 *
 * Class Operation
 */
class Operation
{
    /**
     * @var int
     */
    private $numberA = 0;

    /**
     * @var int
     */
    private $numberB = 0;

    /**
     * @return int
     */
    public function getNumberA()
    {
        return $this->numberA;
    }

    /**
     * @param int $numberA
     */
    public function setNumberA($numberA)
    {
        $this->numberA = $numberA;
    }

    /**
     * @return int
     */
    public function getNumberB()
    {
        return $this->numberB;
    }

    /**
     * @param int $numberB
     */
    public function setNumberB($numberB)
    {
        $this->numberB = $numberB;
    }

    /**
     * 这是要被子类覆写的方法
     *
     * @return int
     * @author jiangyi
     */
    public function getResult()
    {
        return 0;
    }
}

/**
 * 加法实现
 *
 * Class OperationAdd
 */
class OperationAdd extends Operation
{
    public function getResult()
    {
        return $this->getNumberA() + $this->getNumberB();
    }
}

/**
 * 减法实现
 *
 * Class OperationSub
 */
class OperationSub extends Operation
{
    public function getResult()
    {
        return $this->getNumberA() - $this->getNumberB();
    }
}

/**
 * 乘法实现
 *
 * Class OperationMul
 */
class OperationMul extends Operation
{
    public function getResult()
    {
        return $this->getNumberA() * $this->getNumberB();
    }
}

/**
 * 除法实现
 *
 * Class OperationDiv
 *
 */
class OperationDiv extends Operation
{
    public function getResult()
    {
        if ($this->getNumberB() == 0) {
            throw new Exception('除数不能为0');
        }
        return $this->getNumberA() / $this->getNumberB();
    }
}

/**
 * 工厂类
 * 根据相应的运算符new出想要的对象
 *
 * Class OperationFactory
 */
class OperationFactory
{
    /**
     * @param $operate
     * @return null|OperationAdd|OperationDiv|OperationMul|OperationSub
     */
    public static function createOperate($operate)
    {
        $operateObject = null;
        switch ($operate) {
            case '+':
                $operateObject = new OperationAdd();
                break;
            case '-':
                $operateObject = new OperationSub();
                break;
            case '*':
                $operateObject = new OperationMul();
                break;
            case '/':
                $operateObject = new OperationDiv();
                break;
        }
        return $operateObject;
    }
}

$oper = OperationFactory::createOperate('+');
$oper->setNumberA(1);
$oper->setNumberB(4);
$result = $oper->getResult();
echo $result;
