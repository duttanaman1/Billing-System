<?php
include('connect.php');
if ($_POST['submit'] != null) {
    $usr = $_POST['username'];
    $pass = $_POST['password'];

    if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM loginemp where empname='$usr' and password='$pass'"))) {
        header("location:http://localhost/internship_project5/viewemp.php");
    }
    if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM loginadmin where adminname='$usr' and password='$pass'"))) {
        header("location:http://localhost/internship_project5/viewadmin.php");
    }
    if ($usr == "superadmin" && $pass = "superadmin") {
        header("location:http://localhost/internship_project5/viewsuperadmin.php");
    }
    echo "ERROR";
}
