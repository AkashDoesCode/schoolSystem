<?php
session_start();
include "../database/dbconnect.php";
if (isset($_POST['submit'])) {
    $question = "SELECT * FROM question";
    $res = mysqli_query($conn, $question);
   
    while ($row= mysqli_fetch_array($res)) 
    {
        $id = 'answer' . $row['question_id'];
        $answer = $_POST[$id];
        $question_id = $row['question_id'];
        $student_id = $_SESSION['curr_student_id'];
        $insert = "INSERT INTO answer(student_id,question_id,answer) VALUES('$student_id','$question_id','$answer')";
        mysqli_query($conn, $insert);
    }

    //inserting questions and answer into the file, after this teacher can download the doc file

    $student_id = $_SESSION['curr_student_id'];
    $answer_file = "SELECT question.question_name,answer.answer FROM question INNER JOIN answer ON question.question_id=answer.question_id AND answer.student_id = $student_id";
    $answer_res = mysqli_query($conn, $answer_file);
    $student_id = $_SESSION['curr_student_id'];

    $myfile = fopen("../files/answer_" . $student_id . ".doc", "a");
    $file_path = addslashes(realpath("../files/answer_" . $student_id . ".doc"));
    $question_no = 1;
    while ($file_row = mysqli_fetch_array($answer_res)) {
        $question_insert_into_file = $question_no . ". " . $file_row['question_name'] . "\n";
        $answer_insert_into_file = "Ans:-" . $file_row['answer'] . "\n\n";
        fwrite($myfile, $question_insert_into_file);
        fwrite($myfile, $answer_insert_into_file);
        $question_no++;
    }
    fwrite($myfile,'File path:-'.realpath("../files/answer_" . $student_id . ".doc"));
    fclose($myfile);
    
    //insert file path into the database

    $insert_file_path = "INSERT INTO file(student_id,file_path) VALUES('$student_id','$file_path')";
    $insert_file_path_query = mysqli_query($conn,$insert_file_path);
    header('Location:dashboard.php');
}
