<?php
include('connect.php');
if ($_POST['submit']) {
    $prodid = $_POST['prodid'];
    $prodname = $_POST['prodname'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $discount = $_POST['discount'];

    if (mysqli_query($con, "UPDATE product SET prodname='$prodname', price='$price', stock='$stock', discount='$discount' WHERE prodid=$prodid ")) {
        header("location:http://localhost/internship_project5/viewadimn-prod.php");
    } else echo "ERROR";
}
