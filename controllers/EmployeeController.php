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
                $employee = new Employee();
                $employeeArr = [
                    'name' => $name,
                    'description' => $description,
                    'gender' => $gender,
                    'salary' => $salary,
                    'birthday' => $birthday
                ];
                $isInsert = $employee->insert($employeeArr);
                if ($isInsert) {
                    $_SESSION['success'] = 'Thêm mới nhân viên thành công';
                } else {
                    $_SESSION['error'] = 'Thêm mới thất bại';
                }
                header('Location: index.php');
                exit();
            }
        }
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
        $employee = $employee->getEmployeeById($id);
        require_once 'views/employees/detail.php';
    }

    public function update()
    {
        $id = $_GET['id'];
        if (!isset($id)) {
            $_SESSION['error'] = 'Tham số không hợp lệ';
            header('Location: index.php');
            return;
        }
        if (!is_numeric($id)) {
            $_SESSION['error'] = 'Id phải là số';
            header('Location: index.php');
            return;
        }
        $employeeModel = new Employee();
        $employee = $employeeModel->getEmployeeById($id);
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
                $employeeModel = new Employee();
                $employeeArr = [
                    'id' => $id,
                    'name' => $name,
                    'description' => $description,
                    'gender' => $gender,
                    'salary' => $salary,
                    'birthday' => $birthday
                ];
                $isUpdate = $employeeModel->update($employeeArr);
                if ($isUpdate) {
                    $_SESSION['success'] = 'Cập nhật nhân viên thành công';
                } else {
                    $_SESSION['error'] = 'Cập nhật nhân viên thất bại';
                }
                header('Location: index.php');
                exit();
            }
        }
        require_once 'views/employees/edit.php';
    }

    public function delete()
    {
        $id = $_GET['id'];
        if (!is_numeric($id)) {
            $_SESSION['error'] = 'Id phải là số';
            header('Location: index.php');
            exit();
        }
        $employee = new Employee();
        $isDelete = $employee->delete($id);
        if ($isDelete) {
            $_SESSION['success'] = "Xóa bản ghi #$id thành công";
        } else {
            $_SESSION['error'] = "Xóa bản ghi #$id thất bại";
        }
        header('Location: index.php');
        exit();
    }
}