<?php
/**
 * 抽象工厂模式
 *
 * 提供一个创建一系列相关或相互依赖对象的接口，而无需指定它们具体的类
 *
 */

interface IDepartment
{
    public function insert(Department $department);

    public function getDepartment($id);
}

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

interface IFactory
{
    public function createDepartment();
}

class SqlServerFactory implements IFactory
{
    public function createDepartment()
    {
        return new SqlServerDepartment();
    }
}

class MySqlFactory implements IFactory
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
