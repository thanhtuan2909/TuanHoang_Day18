<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bài 1</title>
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/js/jquery-3.4.1.min.js">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <div class="main-content">
        <div class="header">
            <div class="row">
                <div class="col-md-9 col-12">
                    <h2>Employees List</h2>
                </div>
                <div class="col-md-3 col-12 text-right">
                    <a href="index.php?controller=employee&action=insert" class="btn btn-success">
                        <i class="fas fa-plus"></i> Add New Employee
                    </a>
                </div>
            </div>
            <hr>
            <?php
            require_once 'views/commons/message.php';
            ?>
        </div>
        <div class="main">
            <table border="1" cellspacing="0" cellpadding="5">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Salary</th>
                    <th>Gender</th>
                    <th>Birthday</th>
                    <th>Created_at</th>
                    <th>Action</th>
                </tr>
                <?php if (!empty($employees)): ?>
                    <?php foreach ($employees as $employee): ?>
                        <tr>
                            <td><?php echo $employee['id']; ?></td>
                            <td><?php echo $employee['name']; ?></td>
                            <td><?php echo $employee['description']; ?></td>
                            <td>
                                <?php
                                $salary = number_format($employee['salary'], 0, ',', '.') . " VNĐ";
                                echo $salary;
                                ?>
                            </td>
                            <td>
                                <?php
                                $genderText = '';
                                switch ($employee['gender']) {
                                    case 0:
                                        $genderText = 'Nam';
                                        break;
                                    case 1:
                                        $genderText = 'Nữ';
                                        break;
                                }
                                echo $genderText;
                                ?>
                            </td>
                            <td>
                                <?php
                                $birthday = date('d-m-Y', strtotime($employee['birthday']));
                                echo $birthday;
                                ?>
                            </td>
                            <td>
                                <?php
                                $created_at = date('d-m-Y H:i:s', strtotime($employee['created_at']));
                                echo $created_at;
                                ?>
                            </td>
                            <?php
                            $urlDetail = 'index.php?controller=employee&action=detail&id=' . $employee['id'];
                            $urlUpdate = 'index.php?controller=employee&action=update&id=' . $employee['id'];
                            $urlDelete = 'index.php?controller=employee&action=delete&id=' . $employee['id'];
                            ?>
                            <td>
                                <a href="<?php echo $urlDetail; ?>"><i class="fas fa-eye"></i></a>&nbsp;&nbsp;
                                <a href="<?php echo $urlUpdate; ?>"><i class="fas fa-pen"></i></a>&nbsp;&nbsp;
                                <a href="<?php echo  $urlDelete; ?>"
                                   onclick="return confirm('Are you sure delete?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">Không có bản ghi nào</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>

<!--    js file-->
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>