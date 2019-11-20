<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Record</title>
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/js/jquery-3.4.1.min.js">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <div class="form-insert">
        <form action="" method="post">
            <div class="content-form">
                <div class="title-form">
                    <h2 class="title">
                        Update Record
                    </h2>
                    <hr>
                    <p>
                        Please edit the input values and submit to update the record
                    </p>
                </div>
                <div class="main-form">
                    <div class="form-group">
                        <label>Name <span>*</span></label>
                        <input type="text" name="name"
                               value="<?php echo isset($_POST['name']) ? $_POST['name'] : $employee['name']; ?>" id=""
                               class="form-control">
                        <span style="color:red;">
                        <?php echo $error; ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="" cols="30" rows="5"
                                  class="form-control"><?php echo isset($_POST['description']) ? $_POST['description'] : $employee['description']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Salary</label>
                        <input type="number" name="salary"
                               value="<?php echo isset($_POST['salary']) ? $_POST['salary'] : $employee['salary']; ?>" id=""
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <?php
                        $checkedMale = 'checked';
                        $checkedFemale = '';
                        if (isset($_POST['gender'])){
                            $gender = $_POST['gender'];
                        } else {
                            $gender = $employee['gender'];
                        }

                        switch ($gender) {
                            case 0:
                                $checkedMale = 'checked';
                                break;
                            case 1:
                                $checkedFemale = 'checked';
                                break;
                        }
                        ?>
                        <label>Gender</label> <br>
                        <input type="radio" name="gender" value="0" <?php echo $checkedMale; ?> id=""> Male
                        &nbsp;
                        <input type="radio" name="gender" value="1" <?php echo $checkedFemale; ?> id=""> Female
                    </div>
                    <div class="form-group">
                        <label>Birthday</label>
                        <input type="date" name="birthday"
                               value="<?php echo isset($_POST['birthday']) ? $_POST['birthday'] : $employee['birthday']; ?>" id=""
                               class="form-control">
                    </div>
                </div>
                <div class="submit">
                    <div class="form-group text-center">
                        <input type="submit" name="save" value="Save" class="btn btn-primary">
                        <a href="index.php" class="btn btn-outline-secondary">Cancel</a>
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