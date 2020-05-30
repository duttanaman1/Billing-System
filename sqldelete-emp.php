<?php
include('connect.php');

if ($_POST['submit'] != null) {
    $id = $_POST['empid'];
    echo $id;
    if (mysqli_query($con, "DELETE FROM loginemp where empid='$id'")) {
        header("location:http://localhost/internship_project5/viewadmin.php");
    } else
        echo "error";
}
