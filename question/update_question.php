<!--

updating the question here

-->

<?php
include "../database/dbconnect.php";

if(isset($_POST['update']))
{
    $newId=$_GET['id'];
    $question=$_POST['question'];
    $sql ="UPDATE question SET question_name='$question' WHERE question_id='$newId'";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        echo "<script>alert('Question has been upadated successfully');
        location.href='questions.php';
        </script>";
    }
}
$questionId=$_GET['id'];
$getquestion="SELECT * FROM question WHERE question_id='$questionId'";
$row = mysqli_fetch_array(mysqli_query($conn, $getquestion));
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
    <div class="container box w-50">
        <h2 class="text-center text-warning my-3">Update Question</h2>
        <form action="update_question.php?id=<?=$questionId;?>" method="post">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Enter the updated question</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="question" rows="3"><?= $row['question_name']; ?></textarea>
            </div>
            <input class="btn btn-warning btn-sm w-25 mx-auto my-3" type="submit" name='update' value="update">
        </form>
    </div>
</body>

</html>