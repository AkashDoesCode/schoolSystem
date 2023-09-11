<!--

validating teacher's entered email and password against some conditions

-->

<?php
    session_start();
    include "../database/dbconnect.php";
    $email = "";
    $password = "";
    $err = false;
    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];


        //checking email is empty or not
        if(empty($email))
        {
            $_SESSION['emailError1'] = "Email can't be empty.";
            $err =true;
        }
        else{
            $_SESSION['emailError1'] = "";
            $err=false;
            $_SESSION['email'] = $email;
        }
        
        //checking password is empty or not
        if(empty($password))
        {
            $_SESSION['pwdError1'] = "Password can't be empty.";
            $err =true;
        }
        else
        {
            $_SESSION['pwdError1'] = "";
            $err=false;
        }


        /*
        if any input field doesn't fulfill the criteria then redirect to the login.php 
        page with error statement else check if user's data is present in the database
        if present then login else redirect to register page
        */
        if($err)
        {
            header('Location:login.php');
        }
        else
        {   
            $password = md5($password);
            $name="SELECT id,name,email FROM teacher WHERE email LIKE '$email' AND password = '$password'";
            $result1=mysqli_query($conn,$name);
            $row = mysqli_fetch_array($result1);
            $result2 = mysqli_num_rows($result1);
            $_SESSION['currid']=$row['id'];
            if($result2>0)
            {   
                header('Location:dashboard.php');
            }
            else{
                echo "<script>alert('There is no such record present in the database. Register first.');
                location.href='registration.php';
                </script>";
            }
           
        }
    }
?>