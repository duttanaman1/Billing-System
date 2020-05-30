<?php
include('connect.php');

if ($_POST['submit'] != null) {
    $id = $_POST['prodid'];
    echo $id;
    if (mysqli_query($con, "DELETE FROM product where prodid='$id'")) {
        header("location:http://localhost/internship_project5/viewadimn-prod.php");
    } else
        echo "error";
}
