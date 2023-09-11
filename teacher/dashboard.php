<!--

dashboard for the teacher.
A profile box is present here where teacher can his/her details and can log out.
Also all student data is displayed in the tabular format here in another box.
clicking add student button teacher can add student data.
clicking questions button teacher can perform several opertaion on questions like add,delete,update questions.


teacher can edit(except id), delete profile of the student and download answer script of every student.

-->

<?php
session_start();
include "../database/dbconnect.php";
$teacherID = $_SESSION['currid'];
$teacher = "SELECT * FROM teacher WHERE id=$teacherID";
$teacherRes = mysqli_query($conn, $teacher);
$teacherRow = mysqli_fetch_array($teacherRes);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
                        <h5 class="card-title"><?= $teacherRow['name'] ?></h5>
                        <p class="my-0">Teacher Details :</p>
                        <p class="card-text my-0"><?= $teacherRow['dept'] ?></p>
                        <p class="card-text my-0"><?= $teacherRow['email'] ?></p>
                        <p class="card-text my-0"><?= $teacherRow['phone'] ?></p>
                        <a href="logout.php" Class="btn btn-primary btn-sm">Log out</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card box mb-5">
                    <div class="card-header">
                        <h4>Students Details
                            <div class="float-end">
                                <a href="addstudent.php" class="btn btn-warning ">Add students</a>
                                <a href="../question/questions.php" class="btn btn-primary ">Questions</a>
                            </div>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Date of Birth</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                    <th>Course</th>
                                    <th>Phone No</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM student";
                                $query = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($query) > 0) {
                                    while ($row = mysqli_fetch_array($query)) {
                                ?>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= $row['name'] ?></td>
                                            <td><?= $row['dob'] ?></td>
                                            <td><?= $row['gender'] ?></td>
                                            <td><?= $row['email'] ?></td>
                                            <td><?= $row['dept'] ?></td>
                                            <td><?= $row['phone'] ?></td>
                                            <td><?= $row['address'] ?></td>
                                            <td>
                                                <a href="update.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Are You sure you want to remove data permanantly ?')" class="btn btn-danger btn-sm">Delete</a>
                                                <a href="../downloads/download_ans.php?id=<?= $row['id']; ?>" onclick="return confirm('Are You sure you want to download ?')" class="btn btn-info btn-sm">Download Answer</a>
                                            </td>
                                        </tr>
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