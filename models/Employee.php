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
        if (isset($_POST['save'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $gender = $_POST['gender'];
            $salary = $_POST['salary'];
            $birthday = $_POST['birthday'];

            if (empty($name)) {
                $_SESSION['error'] = 'Name không được để trống';
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

    public function detail($id = null)
    {
        $connection = $this->connectDB();
        $sqlSelect = "Select * From employees where id = {$id}";
        $result = mysqli_query($connection, $sqlSelect);
        $employee = [];
        if (mysqli_num_rows($result) > 0) {
            $employee = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $employee = $employee[0];
        }
        $this->closeDB($connection);
        return $employee;
    }

    public function update($id = null, $name = null, $description = null, $gender = null, $salary = null, $birthday = null)
    {
        $connection = $this->connectDB();
        $sqlSelect = "Select * From employees Where id = {$id}";
        $result = mysqli_query($connection, $sqlSelect);
        $employee = [];
        if (mysqli_num_rows($result) > 0) {
            $employee = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $employee = $employee[0];
        }

        if (isset($_POST['save'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $gender = $_POST['gender'];
            $salary = $_POST['salary'];
            $birthday = $_POST['birthday'];

            if (empty($name)) {
                $_SESSION['error'] = 'Name không được để trống';
            } else {
                $sqlUpdate = "UPDATE employees SET `name` = '$name', `description` = '$description', `salary` = $salary, `gender` = $gender, `birthday` = '$birthday' WHERE id = {$employee['id']}";
                $isUpdate = mysqli_query($connection, $sqlUpdate);
                if ($isUpdate) {
                    $_SESSION['success'] = 'Cập nhật nhân viên thành công';
                    header('Location: index.php');
                    exit();
                } else {
                    $_SESSION['error'] = 'Cập nhật nhân viên thất bại';
                    header('Location: index.php');
                    exit();
                }
            }
        }
        $this->closeDB($connection);
        return $employee;
    }

    public function delete($id = null)
    {
        $connection = $this->connectDB();
        $sqlDelete = "Delete from employees where id = {$id}";
        $isDelete = mysqli_query($connection, $sqlDelete);
        if ($isDelete) {
            $_SESSION['success'] = 'Xóa nhân viên thành công';
            header('Location: index.php');
            exit();
        } else {
            $_SESSION['error'] = 'Xóa nhân viên thất bại';
            header('Location: index.php');
            exit();
        }
        $this->closeDB($connection);
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