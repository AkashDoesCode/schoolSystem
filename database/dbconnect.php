<!--

connecting to the database

-->

<?php

$hostname="localhost";
$username="root";
$password ="";
$dbname ="school";


$conn = mysqli_connect($hostname,$username,$password,$dbname);

if(!$conn)
{
    echo "Messge : ". mysqli_connect_error();
}


?>