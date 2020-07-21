<?php
include('header.php');
include('connect.php');
if ($_POST['submit'] != null) {
    $billno = $_POST['billno'];
    $date = $_POST['date'];
?>

    <div class="navbar navbar-expand-sm bg-dark navbar-dark position: sticky;">

        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link" href="viewemp-list.php"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back</a>
            </li>
        </ul>
    </div>
    <div class="container my-3 py-2">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <h2>Company Name</h2>
                            <h5>Company details</h5>
                        </center>
                    </div>
                    <div class="col-md-3">
                        <h3>Bill Number: <?php echo $billno; ?></h3>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <h3>Date:<?php echo $date; ?></h3>
                    </div>

                </div>


            </div>
            <div class="card-body">
                <table class="table table-borderless table-hover mt-5 ">
                    <caption>Checked IN</caption>
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Product id</th>
                            <th scope="col">Product name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Amount</th>
                            <th scope="col"></th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tot = 0.0;
                        $sqlcheck = mysqli_query($con, "SELECT * FROM checkin where billno=$billno order by billno");
                        if (mysqli_num_rows($sqlcheck) > 0) {
                            while ($check = mysqli_fetch_assoc($sqlcheck)) {
                                $prodid = $check['prodid'];
                                $prod = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM product where prodid=$prodid"));
                        ?>
                                <tr>
                                    <th scope="row"><?php echo  $prodid; ?></th>
                                    <td><?php echo $prod['prodname']; ?></td>
                                    <td><?php echo $prod['price']; ?></td>
                                    <td>
                                        <?php

                                        echo $check['quant'];
                                        ?>
                                    </td>
                                    <td><?php echo $prod['discount']; ?></td>
                                    <td><?php
                                        $amt = ($prod['price'] * $check['quant']) - (0.01 * $prod['discount'] * $prod['price'] * $check['quant']);
                                        $tot = $tot + $amt;
                                        echo $amt;
                                        ?></td>


                                </tr>
                        <?php
                            }
                        }
                        ?>
                        <tr style="border-top:3px solid black;">
                            <td colspan="5">
                                <?php
                                $vat = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM vat_tbl"));
                                ?>
                                Adding VAT <?php echo $vat['vat_amount']; ?>%
                            </td>
                            <td><?php echo $tot / 100 * $vat['vat_amount']; ?></td>
                        </tr>
                        <tr style="border-top:3px solid black;">
                            <td colspan="5">total</td>
                            <td><?php $tot = $tot + $tot / 100 * $vat['vat_amount'];
                                echo $tot; ?></td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-success" onclick="window.print();">Print</button>
            </div>
        </div>
    </div>

<?php
}
