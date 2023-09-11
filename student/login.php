<!--

student's login page.
After submitting the login button, checking if the student's 
record is present in the database or not, if present then 
redirect to dashboard else alerting a message and redirect 
to login

-->
<?php
session_start();
include "../database/dbconnect.php";
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $id = $_POST['student_id'];
    $sql = "SELECT id,email FROM student where email LIKE '$email' and id='$id'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);
    $res = mysqli_num_rows($query);
    if ($res > 0) {
        $_SESSION['curr_student_id']=$row['id'];
        header("Location:dashboard.php");
    } else {
        echo "<script>alert('No such record present in the database');
        loaction.href='login.php';
        </script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "../links/links.php"; ?>
    <link rel="stylesheet" href="../css/regstyle.css">
</head>

<body>
    <div class="container box w-25">
        <h2 class="text-center text-warning my-3">Student Login</h2>
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="mb-3">
                <label class="form-label">Student ID</label>
                <input type="text" name="student_id" placeholder="Enter student's ID" class="form-control" aria-describedby="emailHelp">
                <div name="idError" class="form-text text-danger fw-bold"></div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" placeholder="abc@gmail.com" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" name="emailError1" class="form-text text-danger fw-bold"></div>
            </div>
            <div class="form-check d-flex justify-content-start mb-4">
                <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                <label class="form-check-label" for="form1Example3"> Remember Me </label>
            </div>
            <input class="btn btn-warning btn-sm w-100 mb-3" type="submit" name='submit' value="Login">
        </form>
    </div>
</body>

</html>