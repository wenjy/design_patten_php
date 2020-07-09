<?php
/**
 * 抽象工厂模式
 * 提供一个创建一系列相关或相互依赖对象的接口，而无需指定它们具体的类
 */

/**
 * 定义我需要插入和获取数据的接口
 */
interface IDepartment
{
    public function insert(Department $department);

    public function getDepartment($id);
}

/**
 * Class MySqlDepartment
 * 这是MySql的一种实现
 */
class MySqlDepartment implements IDepartment
{
    public function insert(Department $department)
    {
        echo 'mysql 新增记录' . PHP_EOL;
    }

    public function getDepartment($id)
    {
        echo 'mysql 查询一条记录' . PHP_EOL;
    }
}

/**
 * Class SqlServerDepartment
 * 这是SqlServer的实现
 */
class SqlServerDepartment implements IDepartment
{
    public function insert(Department $department)
    {
        echo 'sqlServer 新增记录' . PHP_EOL;
    }

    public function getDepartment($id)
    {
        echo 'sqlServer 查询一条记录' . PHP_EOL;
    }
}

/**
 * 工厂接口，定义了创建驱动的接口
 */
interface InterfaceFactory
{
    public function createDepartment();
}

class SqlServerFactory implements InterfaceFactory
{
    public function createDepartment()
    {
        return new SqlServerDepartment();
    }
}

class MySqlFactory implements InterfaceFactory
{
    public function createDepartment()
    {
        return new MySqlDepartment();
    }
}

class Department
{

}

$department = new Department();

$iDepartment = (new MySqlFactory())->createDepartment();
$iDepartment->insert($department);
$iDepartment->getDepartment(1);

$iDepartment = (new SqlServerFactory())->createDepartment();
$iDepartment->insert($department);
$iDepartment->getDepartment(1);

/**
 * Class DepartmentManager
 * 在各个框架实现，一般会定义一个类来管理这些驱动
 */
class DepartmentManager
{
    /**
     * @var string
     */
    private $drive;

    /**
     * DepartmentManager constructor.
     * @param string|null $drive
     */
    public function __construct(string $drive = null)
    {
        $this->drive = $drive;
    }

    /**
     * @return IDepartment
     */
    public function createDepartment(): IDepartment
    {
        // 只是简单的使用switch来示例
        switch ($this->drive) {
            case 'sqlserv':
                $iDepartment = new SqlServerFactory();
                break;
            case 'mysql':
            default:
                $iDepartment = new MySqlFactory();
                break;
        }
        return $iDepartment->createDepartment();
    }
}

// 使用的时候可以根据我们指定的配置实例化指定的驱动，然后使用
$manager = new DepartmentManager();
$dep = $manager->createDepartment();
$dep->insert($department);
$dep->getDepartment(1);
