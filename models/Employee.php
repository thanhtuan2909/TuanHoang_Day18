<?php

/**
 * Created by PhpStorm.
 * User: Thanh Tuấn
 * Date: 11/15/2019
 * Time: 4:51 PM
 */

class Employee
{
    public $id;
    public $name;
    public $description;
    public $gender;
    public $salary;
    public $birthday;
    public $created_at;

    public function index()
    {
        $connection = $this->connectDB();

        $querySelect = "SELECT * FROM employees";
        $result = mysqli_query($connection, $querySelect);
        $employees = [];

        if (mysqli_num_rows($result) > 0) {
            $employees = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }

        $this->closeDB($connection);
        return $employees;
    }

    public function insert($param = [])
    {
        $connection = $this->connectDB();
        $sqlInsert = "INSERT INTO employees(`name`,`description`,`gender`,`salary`,`birthday`) 
                VALUES ('{$param['name']}','{$param['description']}',{$param['gender']},{$param['salary']},'{$param['birthday']}')";
        $isInsert = mysqli_query($connection, $sqlInsert);
        $this->closeDB($connection);
        return $isInsert;
    }

    public function getEmployeeById($id = null)
    {
        $connection = $this->connectDB();
        $sqlSelect = "SELECT * FROM employees WHERE id = {$id}";
        $result = mysqli_query($connection, $sqlSelect);
        $employee = [];
        if (mysqli_num_rows($result) > 0) {
            $employee = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $employee = $employee[0];
        }
        $this->closeDB($connection);
        return $employee;
    }    

    public function update($employee = [])
    {
        $connection = $this->connectDB();
        $sqlUpdate = "UPDATE employees SET `name` = '{$employee['name']}', `description` = '{$employee['description']}', `salary` = {$employee['salary']}, `gender` = {$employee['gender']}, `birthday` = '{$employee['birthday']}' WHERE `id` = {$employee['id']}";
        $isUpdate = mysqli_query($connection, $sqlUpdate);
        $this->closeDB($connection);
        return $isUpdate;
    }

    public function delete($id = null)
    {
        $connection = $this->connectDB();
        $sqlDelete = "DELETE FROM employees WHERE id = {$id}";
        $isDelete = mysqli_query($connection, $sqlDelete);
        $this->closeDB($connection);
        return $isDelete;
    }

    public function connectDB()
    {
        require_once 'configs/database.php';
        $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, 3306);
        if (!$connection) {
            die('Kết nối CSDL thất bại. Lỗi: ' . mysqli_connect_error());
        }
        return $connection;
    }

    public function closeDB($connection = null)
    {
        mysqli_close($connection);
    }
}