<?php

/**
 * Created by PhpStorm.
 * User: Thanh Tuấn
 * Date: 11/15/2019
 * Time: 4:51 PM
 */
session_start();

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

        $querySelect = "Select * from employees";
        $result = mysqli_query($connection, $querySelect);
        $employees = [];

        if (mysqli_num_rows($result) > 0) {
            $employees = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }

        $this->closeDB($connection);
        return $employees;
    }

    public function insert($name = null, $description = null, $gender = null, $salary = null, $birthday = null)
    {
        $connection = $this->connectDB();
        $error = '';
        if (isset($_POST['save'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $gender = $_POST['gender'];
            $salary = $_POST['salary'];
            $birthday = $_POST['birthday'];

            if (empty($name)) {
                $error = 'Name không được để trống';
            } else {
                $sqlInsert = "Insert into employees(`name`,`description`,`gender`,`salary`,`birthday`) 
                values ('$name','$description',$gender,$salary,'$birthday')";
                $isInsert = mysqli_query($connection, $sqlInsert);
                if ($isInsert) {
                    $_SESSION['success'] = 'Thêm mới nhân viên thành công';
                    header('Location: index.php');
                    exit();
                } else {
                    $_SESSION['error'] = 'Thêm mới thất bại';
                    header('Location: index.php');
                    exit();
                }
            }
        }
        $this->closeDB($connection);
    }

    public function update()
    {

    }

    public function delete()
    {

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