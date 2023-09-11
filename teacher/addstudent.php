<!--

After clicking add student teacher will redirect here.
Teacher can add student some information here like email,id,contact etc.
This page contains several form field.
All the form fields data are validated in both client side and server side.

First client side is done and it is done in js/validation_teacher.js
Then server side validation is done in addvalidate.php

-->

<?php
session_start();

//checking if session variable is set or not if set assigning the value to the varible else assigning empty value

$userIdError2 = isset($_SESSION['userIdError2'])?$_SESSION['userIdError2']:'';
$userError2 = isset($_SESSION['userError2'])?$_SESSION['userError2']:'';
$dobError2 = isset($_SESSION['dobError2'])?$_SESSION['dobError2']:'';
$emailError2 = isset($_SESSION['emailError2'])?$_SESSION['emailError2']:'';
$phoneError2=  isset($_SESSION['phoneError2'])?$_SESSION['phoneError2']:'';
$addressError2=  isset($_SESSION['addressError2'])?$_SESSION['addressError2']:'';
$deptError2=  isset($_SESSION['deptError2'])?$_SESSION['deptError2']:'';


$userIdVal2=isset($_SESSION['userIdVal2'])?$_SESSION['userIdVal2']:'';
$userVal2 = isset($_SESSION['userVal2'])?$_SESSION['userVal2']:'';
$deptVal2 = isset($_SESSION['deptVal2'])?$_SESSION['deptVal2']:'';
$dobVal2 = isset($_SESSION['dobVal2'])?$_SESSION['dobVal2']:'';
$emailVal2=  isset($_SESSION['emailVal2'])?$_SESSION['emailVal2']:'';
$phoneVal2=  isset($_SESSION['phoneVal2'])?$_SESSION['phoneVal2']:'';
$addressVal2 = isset($_SESSION['addressVal2'])?$_SESSION['addressVal2']:'';



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "../links/links.php" ?>
    <link rel="stylesheet" href="../css/regstyle.css">
    <script src="../javascript/validate_student.js"></script>
</head>

<body>
    <div class="container box w-50">
        <h3 class="text-warning my-2">Add student
            <a href="dashboard.php" class="btn btn-danger btn-sm float-end">Back</a>
        </h3>
        <form action="addvalidate.php" method="post" onsubmit="return validate()">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Student ID</label>
                        <input type="text" value="<?=$userIdVal2?>" id="student_id" name="student_id" placeholder="Enter student's ID" class="form-control" aria-describedby="emailHelp">
                        <div name="idError" id="idError" class="form-text text-danger fw-bold"><?=$userIdError2?></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" value="<?=$userVal2?>" id="name" name="name" placeholder="Enter student's name" class="form-control" aria-describedby="emailHelp">
                        <div name="nameError" id="nameError" class="form-text text-danger fw-bold"><?=$userError2?></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" name="dob" id="dob" value="<?=$dobVal2?>" placeholder="Enter dob" class="form-control" aria-describedby="emailHelp">
                        <div name="dobError" id="dobError" class="form-text text-danger fw-bold"><?=$dobError2?></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label><br>
                        <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="Male" checked>
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" id="email" value="<?=$emailVal2?>" placeholder="abc@gmail.com" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div name="emailError" id="emailError" class="form-text text-danger fw-bold"><?=$emailError2?></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Department</label>
                        <select class="form-select" name="dept" id="dept" aria-label="Default select example">
                            <option selected value="default">Select your department</option>
                            <option value="CSE" <?php if($deptVal2=="CSE"){echo 'selected="selected"';} ?>>Computer Science and Engineering </option>
                            <option value="IT"  <?php if($deptVal2=="IT"){echo 'selected="selected"';} ?>>Information Technology</option>
                            <option value="ECE" <?php if($deptVal2=="ECE"){echo 'selected="selected"';} ?>>Electronics and Communication Engineering</option>
                            <option value="EE"  <?php if($deptVal2=="EE"){echo 'selected="selected"';} ?>>Electrical Engineering</option>
                            <option value="ME"  <?php if($deptVal2=="ME"){echo 'selected="selected"';} ?>>Mechanical Engineering </option>
                            <option value="CE"  <?php if($deptVal2=="CE"){echo 'selected="selected"';} ?>>Civil Engineering </option>
                        </select>
                        <div name="deptError" id="deptError"  class="form-text text-danger fw-bold"><?=$deptError2?></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleInputPhone1" class="form-label">Phone No</label>
                        <input type="tel" name="phone" id="phone" value="<?=$phoneVal2?>" placeholder="### ### ####" class="form-control" id="exampleInputPhone1" aria-describedby="emailHelp">
                        <div name="phoneError" id="phoneError" class="form-text text-danger fw-bold"><?=$phoneError2?></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label  class="form-label">Address</label>
                        <textarea class="form-control" name="address" id="address" rows="1" placeholder="Enter address"><?=$addressVal2?></textarea>
                        <div name="addressError" id="addressError" class="form-text text-danger fw-bold"><?=$addressError2?></div>
                    </div>
                </div>
            </div>
            <input type="submit" value="Add" name="add" class="btn btn-warning w-25 mb-3">
            <?php
                unset($_SESSION['userIdVal2']);
                unset($_SESSION['userIdError2']);
                unset($_SESSION['userVal2']);
                unset($_SESSION['userError2']);
                unset($_SESSION['dobVal2']);
                unset($_SESSION['dobError2']);
                unset($_SESSION['deptVal2']);
                unset($_SESSION['deptError2']);
                unset($_SESSION['emailVal2']);
                unset($_SESSION['emailError2']);
                unset($_SESSION['phoneVal2']);
                unset($_SESSION['phoneError2']);
                unset($_SESSION['addressVal2']);
                unset($_SESSION['addressError2']);
            ?>
        </form>
    </div>
</body>

</html>