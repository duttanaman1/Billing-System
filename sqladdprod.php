<?php
include('connect.php');
if ($_POST['submit'] != null) {
    $name = $_POST['prodname'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $discount = $_POST['discount'];
    if (mysqli_query($con, "INSERT INTO product VALUES(null,'$name','$price','$stock','$discount')")) {
        header("location:http://localhost/internship_project5/viewadimn-prod.php");
    } else
        echo "ERROR";
}
