<!-- 

This is teacher registration page.Here teacher insert his/her personal
information in several form field then this data will be sent to regvalidation.php file.
But before that validating(client side) all the inserted data using javascript in js/validate_teacher.js file.
If the entered data is valid then it will go to regvalidation.php for server side validation.


-->


<?php
session_start();
$userError = isset($_SESSION['userError'])?$_SESSION['userError']:'';
$emailError = isset($_SESSION['emailError'])?$_SESSION['emailError']:'';
$pwdError = isset($_SESSION['pwdError'])?$_SESSION['pwdError']:'';
$checkpwdError = isset($_SESSION['checkpwdError'])?$_SESSION['checkpwdError']:'';
$phoneError=  isset($_SESSION['phoneError'])?$_SESSION['phoneError']:'';
$ageError=  isset($_SESSION['ageError'])?$_SESSION['ageError']:'';
$deptError=  isset($_SESSION['deptError'])?$_SESSION['deptError']:'';



$userVal = isset($_SESSION['userVal'])?$_SESSION['userVal']:'';
$deptVal = isset($_SESSION['deptVal'])?$_SESSION['deptVal']:'';
$emailVal=  isset($_SESSION['emailVal'])?$_SESSION['emailVal']:'';
$ageVal=  isset($_SESSION['ageVal'])?$_SESSION['ageVal']:'';
$phoneVal=  isset($_SESSION['phoneVal'])?$_SESSION['phoneVal']:'';



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <?php include "../links/links.php" ?>
    <link rel="stylesheet" href="../css/regstyle.css">
    <script src="../javascript/validate_teacher.js"></script>
</head>

<body>
    <div class="container box w-50">
        <h2 class="text-start text-warning my-3">Teacher Registration</h2>
        <form action="regvalidation.php" method="post" onsubmit="return validate();">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleInputName1" class="form-label">Name</label>
                        <input type="text" name="name" id="name" value="<?=$userVal?>" placeholder="Enter your name" class="form-control" id="exampleInputName1" aria-describedby="emailHelp">
                        <div id="nameError" name="nameError" class="form-text text-danger fw-bold"><?=$userError?></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" id="email" value="<?=$emailVal?>" placeholder="abc@gmail.com" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailError" name="emailError" class="form-text text-danger fw-bold"><?=$emailError?></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Department</label>
                        <select class="form-select" name="dept" id="dept" aria-label="Default select example">
                            <option selected value="default">Select your department</option>
                            <option value="CSE" <?php if($deptVal=="CSE"){echo 'selected="selected"';} ?>>Computer Science and Engineering </option>
                            <option value="IT"  <?php if($deptVal=="IT"){echo 'selected="selected"';} ?>>Information Technology</option>
                            <option value="ECE" <?php if($deptVal=="ECE"){echo 'selected="selected"';} ?>>Electronics and Communication Engineering</option>
                            <option value="EE"  <?php if($deptVal=="EE"){echo 'selected="selected"';} ?>>Electrical Engineering</option>
                            <option value="ME"  <?php if($deptVal=="ME"){echo 'selected="selected"';} ?>>Mechanical Engineering </option>
                            <option value="CE"  <?php if($deptVal=="CE"){echo 'selected="selected"';} ?>>Civil Engineering </option>
                        </select>
                        <div id="deptError" name="deptError" class="form-text text-danger fw-bold"><?=$deptError?></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label><br>
                        <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male" checked>
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
                        <label for="exampleInputAge1" class="form-label">Age</label>
                        <input type="number" name="age" id="age" value="<?=$ageVal?>" placeholder="Enter your age" class="form-control" id="exampleInputAge1" aria-describedby="emailHelp">
                        <div id="ageError" name="ageError" class="form-text text-danger fw-bold"><?=$ageError?></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleInputPhone1" class="form-label">Phone No</label>
                        <input type="tel" name="phone" id="phone" value="<?=$phoneVal?>" placeholder="### ### ####" class="form-control" id="exampleInputPhone1" aria-describedby="emailHelp">
                        <div id="phoneError" name="phoneError" class="form-text text-danger fw-bold"><?=$phoneError ?></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" id="password" placeholder="**********" class="form-control" id="exampleInputName1" aria-describedby="passwordHelp">
                        <div id="passwordError" name="passwordError" class="form-text text-danger fw-bold"><?=$pwdError?></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleInputcheckpassword1" class="form-label">Check Password</label>
                        <input type="password" name="checkpassword" id="checkpassword" placeholder="**********" class="form-control" id="exampleInputcheckpassword1" aria-describedby="checkpasswordHelp">
                        <div id="checkpasswordError" name="checkpasswordError" class="form-text text-danger fw-bold"><?=$checkpwdError?></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="d-flex justify-content-center">
                    <input type="submit" name="register" class="btn btn-warning btn-block btn-lg text-body"></input>
                </div>
                <p class="text-center text-muted mt-3 mb-2">Have already an account? <a href="login.php" class="fw-bold text-body"><u>Login here</u></a></p>
            </div>
            <?php session_destroy() ?>
        </form>
    </div>
</body>

</html>