<?php
include('connect.php');
if ($_POST['submit'] != null) {
    $prodid = $_POST['id'];
    $billno = $_POST['billno'];
    $quant = $_POST['quant'];

    $prod = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM product"));

    if ($prod['stock'] > 0) {
        if (mysqli_query($con, "INSERT INTO checkin VALUES(null,$billno,$prodid,$quant)")) {
            header("location:http://localhost/internship_project5/viewemp.php");
        } else echo "ERROR";
    } else
        echo "Out of Stock";
}
