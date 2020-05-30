<?php
include('connect.php');

if ($_POST['submit'] != null) {
    $id = $_POST['id'];
    $quant = $_POST['quant'];
    echo $id;
    if (mysqli_query($con, "DELETE FROM checkin where checkid='$id'")) {
        mysqli_query($con, "UPDATE product SET stock=$quant");
        header("location:http://localhost/internship_project5/viewemp.php");
    } else
        echo "error";
}
