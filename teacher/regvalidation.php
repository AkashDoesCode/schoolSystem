<!--

After javascript validation all the data are coming here in post method for
server side validation. Again i am checking the data against some condtion.
if the condtion is not matched with data then i am printing the reasons/error
in the form page. Here i am using session to store the error messege and printing 
them in the registration.php page.

-->

<?php
session_start();
include '../database/dbconnect.php';
$username = "";
$email = "";
$dept = "";
$gender = "";
$age = "";
$phoneno = "";
$password = "";
$checkpassword = "";
$err = false;
if (isset($_POST['register'])) {
    $username = $_POST['name'];
    $email = $_POST['email'];
    $dept = $_POST['dept'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $phoneno = $_POST['phone'];
    $password = $_POST['password'];
    $checkpassword = $_POST['checkpassword'];

    //checking entered name against some condition
    if (empty($username)) {
        $_SESSION['userError'] = "Username can't be empty.";
        $err = true;
    } elseif (!preg_match("/^[A-Za-z ]{6,}$/", $username)) {
        $_SESSION['userError'] = "Invaid username.";
        $err = true;
    } else {
        $_SESSION['userError'] = "";
        $err = false;
        $_SESSION['userVal'] = $username;
    }


    //checking entered email against some condition
    if (empty($email)) {
        $_SESSION['emailError'] = "Email can't be empty.";
        $err = true;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['emailError'] = "Invalid email ID.";
        $err = true;
    } else {
        $_SESSION['emailError'] = "";
        $err = false;
        $_SESSION['emailVal'] = $email;
    }


    //checking entered dept against some condition
    if ($dept == "default") {
        $_SESSION['deptError'] = "Select the correct option.";
        $err = true;
    } else {
        $_SESSION['deptError'] = "";
        $err = false;
        $_SESSION['deptVal'] = $dept;
    }


    //checking entered age against some condition
    if (empty($age)) {
        $_SESSION['ageError'] = "Age can't be empty.";
        $err = true;
    } elseif (!preg_match("/^[0-9]+$/", $age)) {
        $_SESSION['ageError'] = "Age should be numeric value.";
        $err = true;
    } else {
        $_SESSION['ageError'] = "";
        $err = false;
        $_SESSION['ageVal'] = $age;
    }


    //checking entered phone against some condition
    if (empty($phoneno)) {
        $_SESSION['phoneError'] = "Phone no can't be empty.";
        $err = true;
    } elseif (!preg_match("/^[0-9]{10}$/", $phoneno)) {
        $_SESSION['phoneError'] = "Phone must be numeric and 10 characters long.";
        $err = true;
    } else {
        $_SESSION['phoneError'] = "";
        $err = false;
        $_SESSION['phoneVal'] = $phoneno;
    }


    //checking entered phone no against some condition
    if (empty($password)) {
        $_SESSION['pwdError'] = "Password can't be empty.";
        $err = true;
    } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$/", $password)) {
        $_SESSION['pwdError'] = "Password doesn't match validation criteria. Need atleast 1 uppercase,1 lowercase,1 special character,1 digit and length more than 8.";
        $err = true;
    }


    //rechecking the check password
    if (empty($checkpassword)) {
        $_SESSION['checkpwdError'] = "Password can't be empty";
        $err = true;
    } elseif ($password != $checkpassword) {
        $_SESSION['checkpwdError'] = "Password does't match";
        $err = true;
    }


    /*
        if any input field doesn't fulfill the criteria then redirect to the index.php 
        page with error statement else insert the data into the database
    */

    if ($err) {
        header('Location:registration.php');
    } else {
        $emailSql = "SELECT * FROM teacher WHERE email LIKE '$email'";
        $result1 = mysqli_query($conn, $emailSql);
        $result1 = mysqli_num_rows($result1);

        /*checking if email already present or not if present then not 
        inserting data redirecting to login.php else inserting data into
        database
        */
        if ($result1 > 0) {
            echo "<script> alert('Email already exist.');
                        window.location='login.php';
                </script>";
        } else {
            $password = md5($password);
            $sql = "INSERT INTO teacher(name, email, dept, gender, age, phone, password) VALUES ('$username','$email','$dept','$gender','$age','$phoneno','$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script> alert('Registered successful.');
                    window.location='login.php';
                    </script>";
            }
        }
    }
}
