<!--

student's dashboard page.
In a small box the student can see some his details and edit, log out button.
student can edit his/her profile.

Below the student's details box, the questions will displayed in a container
along with a textarea to submit the answer.

if the student already submited the answers, then the questions will not be displayed

-->
<?php
session_start();
include "../database/dbconnect.php";
$studentID = $_SESSION['curr_student_id'];
$student = "SELECT * FROM student WHERE id=$studentID";
$studentRes = mysqli_query($conn, $student);
$studentRow = mysqli_fetch_array($studentRes);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "../links/links.php" ?>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>
    <div class="container">
        <div class="row my-3">
            <div class="col">
                <div class="card box" style="width: 12rem;">
                    <img src="https://cdn.pixabay.com/photo/2021/06/07/13/45/user-6318003__480.png" class="card-img-top ms-5 w-50" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $studentRow['name'] ?></h5>
                        <p class="my-0">Student Details :</p>
                        <p class="card-text my-0"><?= $studentRow['dept'] ?></p>
                        <p class="card-text my-0"><?= $studentRow['email'] ?></p>
                        <p class="card-text my-0"><?= $studentRow['phone'] ?></p>
                        <div>
                            <a href="update_self.php" Class="btn btn-warning btn-sm">Edit</a>
                            <a href="logout_student.php" Class="btn btn-primary btn-sm">Log out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card box mb-5">
                    <div class="card-header">
                        <h4>Questions
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <?php
                                $answer_present="SELECT * FROM answer WHERE student_id=$studentID";
                                if(mysqli_num_rows(mysqli_query($conn,$answer_present)))
                                {
                                    echo "You have already submitted the answers";
                                }
                                else
                                {
                                    $sql = "SELECT * FROM question";
                                    $res = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($res) > 0) 
                                    {
                                        ?>
                                        <form action="answer.php" method="post">
                                        <?php
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($res)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlTextarea1" class="form-label"><?= $i . ' . ' . $row['question_name']; ?></label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="answer<?=$row['question_id'];?>"></textarea>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    $i++;
                                    }
                                    ?>
                                
                                    <input type="submit" class="btn btn-warning" value="Submit" name="submit">
                                </form>
                                <?php
                                }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>