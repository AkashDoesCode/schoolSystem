<!--

adding the questions here

-->

<?php
include "../database/dbconnect.php";
if (isset($_POST['add'])) {
    $question = $_POST['question'];
    //checking if question field is empty or not if empty then alert a messege and go back to the same page else insert question into the database
    if (empty($question)) {
        echo "<script>alert('Question field can\'t be empty');
        location.href='add_question.php';
        </script>";
    } else {
        $sql = "INSERT INTO question(question_name) VALUES('$question')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Question has been added successfully');
        location.href='questions.php';
        </script>";
        }
    }
}

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
        <h2 class="text-center text-warning my-3">Add Question</h2>
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Enter the question</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="question" rows="3"></textarea>
            </div>
            <input class="btn btn-warning btn-sm w-25 mx-auto my-3" type="submit" name='add' value="add">
        </form>
    </div>
</body>

</html>