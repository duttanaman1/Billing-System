<?php
include('connect.php');

if ($_POST['submit'] != null) {
    $custpay = $_POST['custpay'];
    $tot = $_POST['tot'];
    $billno = $_POST['billno'];
    $custrefund = abs($tot - $custpay);
    $date = date("Y/m/d");
    echo $date;
    if (mysqli_query($con, "INSERT INTO trans VALUES (null,$billno,$tot,$custpay,$custrefund,'$date')")) {
        $bill = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM bill"));
        $billno = $bill['billno'] + 1;
        $bill = mysqli_query($con, "UPDATE bill SET billno=$billno");
        header("location:http://localhost/internship_project5/viewemp.php");
    } else
        echo "error";
}
