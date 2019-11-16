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
        $isInsert = $employee->insert();
        require_once 'views/employees/add.php';
    }

    public function detail()
    {
        $id = $_GET['id'];
        if (!is_numeric($id)){
            header('Location: index.php');
            exit();
        }
        $employee = new Employee();
        $isDetail = $employee->detail($id);
        require_once 'views/employees/detail.php';
    }

    public function update()
    {
        $id = $_GET['id'];
        if (!is_numeric($id)) {
            header('Location: index.php');
            exit();
        }
        $employee = new Employee();
        $isUpdate = $employee->update($id);
        require_once 'views/employees/edit.php';
    }

    public function delete()
    {
        $id = $_GET['id'];
        if (!is_numeric($id)) {
            header('Location: index.php');
            exit();
        }
        $employee = new Employee();
        $employee->delete($id);
    }
}