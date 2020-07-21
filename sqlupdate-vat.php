<?php
include('connect.php');
if ($_POST['submit'] != null) {
    $vat = $_POST['vat'];
    if (mysqli_query($con, "UPDATE vat_tbl SET vat_amount=$vat")) {
        header("location:http://localhost/internship_project5/viewadimn-prod.php");
    }
}
