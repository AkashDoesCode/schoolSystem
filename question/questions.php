<!--

All the questions are displayed here.
Have the options to add,update,delete and download the questions in a doc file.

-->

<?php
include "../database/dbconnect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "../links/links.php"; ?>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body class="bg-warning">
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card box">
                    <div class="card-header">
                        <h2>Questions
                            <div class="float-end">
                                <a href="add_question.php" class="btn btn-warning">Add question</a>
                                <a href="../downloads/download_question.php" class="btn btn-info">Download questions</a>
                                <a href="../teacher/dashboard.php" class="btn btn-danger">Back</a>
                            </div>
                        </h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <?php
                            $sql = "SELECT * FROM question";
                            $res = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($res) > 0) {
                                $i = 1;
                                while ($row = mysqli_fetch_array($res)) {
                            ?>
                                    <tr>
                                        <td><?= $i . ' . ' . $row['question_name'] ?>
                                            <div class="float-end">
                                                <a href="update_question.php?id=<?= $row['question_id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                <a href="delete_question.php?id=<?= $row['question_id']; ?>" onclick="return confirm('Are you sure you want to delete the question?');" class="btn btn-danger btn-sm">Delete</a>
                            
                                            </div>
                                        </td>
                                    </tr>
                            <?php
                                    $i++;
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>