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
$studentId = "";
$username = "";
$email = "";
$dept = "";
$gender = "";
$age = "";
$phoneno = "";
$address = "";
$err = false;
if (isset($_POST['add'])) {
    $studentId = $_POST['student_id'];
    $username = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $dept = $_POST['dept'];
    $gender = $_POST['gender'];
    $phoneno = $_POST['phone'];
    $address = $_POST['address'];

    //checking entered id against some condition
    if (empty($studentId)) {
        $_SESSION['userIdError2'] = "Student's Id can't be empty.";
        $err = true;
    } elseif (!preg_match("/^[0-9]{7}$/", $studentId)) {
        $_SESSION['userIdError2'] = "Id should be numeric 7 character long.";
        $err = true;
    }
    


    //checking entered name against some condition
    if (empty($username)) {
        $_SESSION['userError2'] = "Username can't be empty.";
        $err = true;
    } elseif (!preg_match("/^[a-zA-Z0-9_ ].{6,}$/", $username)) {
        $_SESSION['userError2'] = "Invaid username.";
        $err = true;
    }
    


    //checking entered department against some condition
    if ($dept == "default") {
        $_SESSION['deptError2'] = "Select the correct option.";
        $err = true;
    }
    


    //checking entered date of birth against some condition
    if (empty($dob)) {
        $_SESSION['dobError2'] = "Date of birth can't be empty.";
        $err = true;
    } elseif (strtotime($dob) > strtotime('now')) {
        $_SESSION['dobError2'] = "Invalid date of birth";
        $err = true;
    }
   



    //checking entered email against some condition
    if (empty($email)) {
        $_SESSION['emailError2'] = "Email can't be empty.";
        $err = true;
    }
     elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['emailError2'] = "Invalid email ID.";
        $err = true;
    } 
   

    //checking entered phone no against some condition
    if (empty($phoneno)) {
        $_SESSION['phoneError2'] = "Phone no can't be empty.";
        $err = true;
    } elseif (!preg_match("/^[0-9]{10}$/", $phoneno)) {
        $_SESSION['phoneError2'] = "Phone must be numeric and 10 characters long.";
        $err = true;
    }
   

    //checking entered address against some condition
    if (empty($address)) {
        $_SESSION['addressError2'] = "Address can't be empty";
        $err = true;
    }
    // else
    // {
    //     $_SESSION['addressError2'] ="";
    //     $err = false;
    //     $_SESSION['addressVal2'] = $address;
    // }

    /*

        if any input field doesn't fulfill the criteria then redirect to the index.php 
        page with error statement else insert the data into the database

    */
    if ($err) {
        header('Location:addstudent.php');
    } else {
        $Sql = "SELECT * FROM student WHERE id=$studentId";
        $result1 = mysqli_query($conn, $Sql);
        $result1 = mysqli_num_rows($result1);
        //checking if the student already present in the database or not if present redirect to dashboard.php else insert the details in database
        if ($result1 > 0) {
            echo "<script> alert('Student already exist.');
                        window.location='dashboard.php';
                </script>";
        } else {
            $sql = "INSERT INTO student(id, name, dob, gender, email, dept, phone, address) VALUES ('$studentId','$username','$dob','$gender','$email','$dept','$phoneno','$address')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script> alert('New student\'s record has been added.');
                    window.location='dashboard.php';
                    </script>";
            }
            //header('Location:display.php');
        }
    }
}
