<!--

Here teacher enter his/her email and password for login
and data will be submitted in loginvalidate.php for verification,redirection

-->

<?php
    session_start();
    $emailError1 = isset($_SESSION['emailError1'])?$_SESSION['emailError1']:'';
    $passwordError1 = isset($_SESSION['pwdError1'])?$_SESSION['pwdError1']:'';

    $emailVal= isset($_SESSION['email'])?$_SESSION['email']:'';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <?php include "../links/links.php"; ?>
    <link rel="stylesheet" href="../css/regstyle.css">
</head>

<body>
    <div class="container box w-25">
        <h2 class="text-center text-warning my-3">Teacher Login</h2>
        <form action="loginvalidate.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" value="<?=$emailVal; ?>" placeholder="abc@gmail.com" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" name="emailError1" class="form-text text-danger fw-bold"><?=$emailError1?></div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" placeholder="**********" class="form-control" id="exampleInputName1" aria-describedby="passwordHelp">
                <div id="passwordHelp" name="passwordError" class="form-text text-danger fw-bold"><?=$passwordError1?></div>
            </div>
            <div class="form-check d-flex justify-content-start mb-4">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
              <label class="form-check-label" for="form1Example3"> Remember password </label>
            </div>
            <input class="btn btn-warning btn-lg w-100" type="submit" name='submit' value="Login">
            <p class="text-center text-muted mt-3 mb-2">Don't have any account? <a href="registration.php" class="fw-bold text-body"><u>Register here</u></a></p>
            <?php session_destroy(); ?>        
        </form>
    </div>
</body>

</html>