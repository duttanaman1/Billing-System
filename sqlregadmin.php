<?php
include('connect.php');
if ($_POST['submit'] != null) {
    $usr = $_POST['username'];
    $pass = $_POST['password'];

    if (mysqli_query($con, "INSERT INTO loginadmin values (null,'$usr','$pass')")) {
        header("location: http://localhost/internship_project5/viewsuperadmin.php");
    } else {
        echo "ERROR";
    }
}
