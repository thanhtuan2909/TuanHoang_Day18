<?php
/**
 * Created by PhpStorm.
 * User: Thanh Tuấn
 * Date: 11/15/2019
 * Time: 4:51 PM
 */
require_once 'models/Employee.php';

class EmployeeController
{
    public function index()
    {
        $employee = new Employee();
        $employees = $employee->index();
        require_once 'views/employees/index.php';
    }

    public function insert()
    {
        $employee = new Employee();
        $employees = $employee->insert();
        require_once 'views/employees/add.php';
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}