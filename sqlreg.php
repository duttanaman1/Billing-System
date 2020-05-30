<?php
include('connect.php');
if ($_POST['submit'] != null) {
    $usr = $_POST['username'];
    $pass = $_POST['password'];

    if (mysqli_query($con, "INSERT INTO loginemp values (null,'$usr','$pass')")) {
        header("location: http://localhost/internship_project5/viewadmin.php");
    } else {
        echo "ERROR";
    }
}
