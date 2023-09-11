<!--

Deleting student details from database

-->

<?php

include "../database/dbconnect.php";

$id = $_GET['id'];

$sql = "DELETE FROM student WHERE id = $id";

$res = mysqli_query($conn,$sql);

if($res)
{
    echo"<script>alert('Student\'s record has been deleted');
    location.href='dashboard.php';
    </script>";
}


?>