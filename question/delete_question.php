<!--

deleting the question here

-->
<?php

include "../database/dbconnect.php";

$id = $_GET['id'];

$sql = "DELETE FROM question WHERE question_id = $id";

$res = mysqli_query($conn,$sql);

if($res)
{
    echo"<script>alert('Question has been deleted');
    location.href='questions.php';
    </script>";
}


?>