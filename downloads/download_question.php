<?php
session_start();
include "../database/dbconnect.php";

$fetch_question="SELECT * FROM question";
$query = mysqli_query($conn,$fetch_question);

//checking if there is any question or not

if(mysqli_num_rows($query)==0)
{
    echo "<script>alert('Don\'t have any questions in the database. Add some questions first.');
    location.href='../question/questions.php';
    </script>";
}
else{

    //writing the questions in the file

    $curr_teacher_id = $_SESSION['currid'];
    $myfile = fopen("../files/questions_".$curr_teacher_id.".doc","w");
    $question_no = 1;
    while($row = mysqli_fetch_array($query))
    {
        $question_insert_into_file = $question_no.". ".$row['question_name']."\n";
        fwrite($myfile,$question_insert_into_file);
        $question_no++;
    }
    fclose($myfile);

    //download the question file

    $file = '../files/questions_' . $curr_teacher_id . '.doc';
    header('Content-Type: application/doc');
    header('Content-Disposition: attachment; filename="downloaded_qst_"' . $curr_teacher_id . '".doc"');
    readfile($file);
}


?>