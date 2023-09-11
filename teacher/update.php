<!--

updating student's details here(except id)

-->

<?php
include "../database/dbconnect.php";
$getId = $_GET['id']; // fetching current student id through url(get method)

if (isset($_POST['update'])) {
    $oldid=$_GET['id'];
    $name = $_POST['name'];
    $dob =$_POST['dob'];
    $gender= $_POST['gender'];
    $email = $_POST['email'];
    $dept = $_POST['dept'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $sql = "UPDATE student SET name='$name', dob = '$dob', gender='$gender', email ='$email', dept='$dept', phone= '$phone' ,address='$address' WHERE id =$oldid";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        //$_SESSION['name'] = $username;
        echo "<script>alert('Updated successfully.');location.href='dashboard.php';</script>";
    }
 }



$sql = "SELECT * FROM student WHERE id=$getId";
$row = mysqli_fetch_array(mysqli_query($conn, $sql));





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "../links/links.php" ?>
    <link rel="stylesheet" href="../css/regstyle.css">
</head>

<body>
    <div class="container box w-50">
        <h3 class="text-warning my-2">Update Details
            <a href="dashboard.php" class="btn btn-danger btn-sm float-end">Back</a>
        </h3>
        <form action="update.php?id=<?=$getId;?>" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Student ID</label>
                        <input type="text" name="student_id" value="<?= $row['id']; ?>" placeholder="Enter student's ID" class="form-control" aria-describedby="emailHelp">
                        <div name="idError" class="form-text text-danger fw-bold"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" value="<?= $row['name']; ?>" placeholder="Enter student's name" class="form-control" aria-describedby="emailHelp">
                        <div name="nameError" class="form-text text-danger fw-bold"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" name="dob" value="<?= $row['dob']; ?>" placeholder="Enter dob" class="form-control" aria-describedby="emailHelp">
                        <div name="dobError" class="form-text text-danger fw-bold"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label><br>
                        <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male" checked>
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" value="<?= $row['email']; ?>" placeholder="abc@gmail.com" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" name="emailError" class="form-text text-danger fw-bold"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Department</label>
                        <select class="form-select" name="dept" aria-label="Default select example">
                            <option selected value="default">Select your department</option>
                            <option value="CSE" <?php if ($row['dept'] == "CSE") {
                                                    echo 'selected="selected"';
                                                } ?>>Computer Science and Engineering </option>
                            <option value="IT" <?php if ($row['dept'] == "IT") {
                                                    echo 'selected="selected"';
                                                } ?>>Information Technology</option>
                            <option value="ECE" <?php if ($row['dept'] == "ECE") {
                                                    echo 'selected="selected"';
                                                } ?>>Electronics and Communication Engineering</option>
                            <option value="EE" <?php if ($row['dept'] == "EE") {
                                                    echo 'selected="selected"';
                                                } ?>>Electrical Engineering</option>
                            <option value="ME" <?php if ($row['dept'] == "ME") {
                                                    echo 'selected="selected"';
                                                } ?>>Mechanical Engineering </option>
                            <option value="CE" <?php if ($row['dept'] == "CE") {
                                                    echo 'selected="selected"';
                                                } ?>>Civil Engineering </option>
                        </select>
                        <div id="deptHelp" name="deptError2" class="form-text text-danger fw-bold"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleInputPhone1" class="form-label">Phone No</label>
                        <input type="tel" value="<?= $row['phone']; ?>" name="phone" placeholder="### ### ####" class="form-control" id="exampleInputPhone1" aria-describedby="emailHelp">
                        <div id="nameHelp" name="phoneError" class="form-text text-danger fw-bold"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <textarea class="form-control" name="address" rows="1" placeholder="Enter address"><?= $row['address']; ?></textarea>
                        <div id="nameHelp" name="addressError" class="form-text text-danger fw-bold"></div>
                    </div>
                </div>
            </div>
            <input type="submit" value="Update" name="update" class="btn btn-warning w-25 mb-3">
        </form>
    </div>
</body>

</html>