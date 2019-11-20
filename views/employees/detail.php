<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Record</title>
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/js/jquery-3.4.1.min.js">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <div class="form-view">
        <form action="" method="post">
            <div class="content-form">
                <div class="title-form">
                    <h2 class="title">
                        View Record
                    </h2>
                    <hr>
                </div>
                <div class="main-form">
                    <div class="form-group">
                        <label>ID <span>*</span></label>
                        <input type="text" name="id" value="<?php echo $employee['id']; ?>" id="" class="form-control"
                               disabled>
                    </div>
                    <div class="form-group">
                        <label>Name <span>*</span></label>
                        <input type="text" name="name" value="<?php echo $employee['name']; ?>" id=""
                               class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="" cols="30" rows="5" class="form-control"
                                  disabled><?php echo $employee['description']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <?php
                        $salary = number_format($employee['salary'], 0, ',', '.') . " VNĐ";
                        ?>
                        <label>Salary</label>
                        <input type="text" name="salary" value="<?php echo $salary; ?>" id="" class="form-control"
                               disabled>
                    </div>
                    <div class="form-group">
                        <?php
                        $checkedMale = 'checked';
                        $checkedFemale = '';
                        switch ($employee['gender']) {
                            case 0:
                                $checkedMale = 'checked';
                                break;
                            case 1:
                                $checkedFemale = 'checked';
                                break;
                        }
                        ?>
                        <label>Gender</label> <br>
                        <input type="radio" name="gender" value="0" id="" <?php echo $checkedMale; ?> disabled> Male &nbsp;
                        <input type="radio" name="gender" value="1" id="" <?php echo $checkedFemale; ?> disabled> Female
                    </div>
                    <div class="form-group">
                        <?php
                        $birthday = date('d-m-Y', strtotime($employee['birthday']));
                        ?>
                        <label>Birthday</label>
                        <input type="text" name="birthday" value="<?php echo $birthday; ?>" id=""
                               class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <?php
                        $created_at = date('d-m-Y H:i:s', strtotime($employee['created_at']));
                        ?>
                        <label>Created at</label>
                        <input type="text" name="created_at" value="<?php echo $created_at; ?>" id=""
                               class="form-control" disabled>
                    </div>
                </div>
                <div class="submit">
                    <div class="form-group text-center">
                        <a href="index.php" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<!--    js file-->
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>