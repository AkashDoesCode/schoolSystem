<?php
include "../database/dbconnect.php";
$studentID = $_GET['id'];
$fetch_student_sql = "SELECT name FROM student WHERE id=$studentID";
$student = mysqli_fetch_array(mysqli_query($conn,$fetch_student_sql));
$studentName = $student['name'];

//checking the file which i want to download, is exist or not, if not exist alert else download the answer file

$file_exist = '../files/answer_' . $studentID . '.doc';
if (!file_exists($file_exist)) {
    echo"<script>alert('$studentName has not submitted the answers yet.');
    location.href='../teacher/dashboard.php';
    </script>";
   
}
else {
    header('Content-Type: application/doc');
    header('Content-Disposition: attachment; filename="downloaded_ans_"' . $studentID . '".doc"');
    readfile($file_exist);
}
