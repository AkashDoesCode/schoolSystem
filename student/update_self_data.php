<!--

Whatever data student have changed, need to update in the database

-->

<?php
session_start();
include "../database/dbconnect.php";
if (isset($_POST['update'])) {
    $oldid=$_SESSION['curr_student_id'];
    $id=$_POST['student_id'];
    $name = $_POST['name'];
    $dob =$_POST['dob'];
    $gender= $_POST['gender'];
    $email = $_POST['email'];
    $dept = $_POST['dept'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    if($oldid!=$id)
    {
        echo "<script>alert('You can not change your ID.');location.href='update_self.php';</script>";
    }
    $sql = "UPDATE student SET name='$name', dob = '$dob', gender='$gender', email ='$email', dept='$dept', phone= '$phone' ,address='$address' WHERE id =$oldid";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Your records have been updated successfully.');location.href='dashboard.php';</script>";
    }
 }

?>