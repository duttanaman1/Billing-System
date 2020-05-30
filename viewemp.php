<?php include('header.php');
include('connect.php');
$bill = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM bill"));
$billid = $bill['billno'];

?>
<div class="navbar navbar-expand-sm bg-dark navbar-dark position: sticky;">

    <ul class="navbar-nav  mx-auto">
        <li class="nav-item ">
            <a class="nav-link" href="viewemp.php"></i> Bill</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="viewemp-list.php"></i>Transation list</a>
        </li>
    </ul>
</div>
<div class="container my-5">
    <div class="card">
        <div class="card-header" style="color:white">
            <div class="row">
                <div class="col-md-12 my-2">
                    <center>
                        <h2>Billing System</h2>
                    </center>
                </div>
                <div class="col-md-4">Bill number:<?php echo $billid; ?></div>
                <div class="col-md-6"></div>
                <div class="col-md-2">Date: <?php echo date("Y/m/d"); ?></div>
            </div>
        </div>
        <div class="card-body">
            <form action="sqlcheckin.php" method="post">
                <div class="row">
                    <div class="col-md-2 my-2"> product id:</div>
                    <div class="col-md-4 my-2">
                        <input type="text" name="id" id="" class="form-control" placeholder="product ID">
                        <input type="hidden" name="billno" value="<?php echo $billid; ?>">

                    </div>
                    <div class="col-md-2 my-2"> product quantity</div>
                    <div class="col-md-1 my-2"><input type="number" name="quant" id="" class="form-control" placeholder="0"></div>
                    <div class="col-md-2 my-2"></div>
                    <div class="col-md-1 my-2"> <input type="submit" name="submit" value="ADD" class="btn btn-success"></div>
                </div>
            </form>
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
                    $sqlcheck = mysqli_query($con, "SELECT * FROM checkin where billno=$billid");
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
                                    $stock = $prod['stock'] - $check['quant'];
                                    mysqli_query($con, "UPDATE product SET stock=$stock where prodid= $prodid");
                                    echo $check['quant'];
                                    ?>
                                </td>
                                <td><?php echo $prod['discount']; ?></td>
                                <td><?php
                                    $amt = ($prod['price'] * $check['quant']) - (0.01 * $prod['discount'] * $prod['price'] * $check['quant']);
                                    $tot = $tot + $amt;
                                    echo $amt;
                                    ?></td>
                                <td class="table-borderless">
                                    <form action="sqldelete-check.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $check['checkid']; ?>">
                                        <input type="hidden" name="quant" value="<?php echo $check['quant'] + $stock; ?>">
                                        <input type="submit" name="submit" value="X" class="btn btn-danger btn-outline-warning">
                                    </form>
                                </td>

                            </tr>
                    <?php
                        }
                    }
                    ?>
                    <tr style="border-top:3px solid black;">
                        <td colspan="5">total</td>
                        <td><?php echo $tot; ?></td>
                    </tr>
                    <tr style="border-top:3px solid black;">
                        <td colspan="5">Customer pay</td>
                        <td>
                            <form action="sqlpay.php" method="post">
                                <input type="number" name="custpay" id="" class="form-control mb-2">
                                <input type="hidden" name="billno" value="<?php echo $billid; ?>">
                                <input type="hidden" name="tot" value="<?php echo $tot; ?>">
                                <input type="submit" value="Pay" name="submit" class="btn btn-primary">
                            </form>
                        </td>
                    </tr>

                </tbody>
            </table>

        </div>
    </div>
</div>
<div style="height:10em" class="container"></div>
<footer>
    <p class="copyright">&copy; 2020 Billing System.</p>
    <div class="foot-links-container">
        <div class="foot-link">
            <a href="" class=" mx-2"> <i class=" fa fa-linkedin fa-2x" aria-hidden="true" style="color:white;"></i></a>
            <a href="" class=" mx-2"> <i class=" fa fa-twitter fa-2x" aria-hidden="true" style="color:white;"></i></a>
            <a href="" class=" mx-2"> <i class=" fa fa-envelope-square fa-2x" aria-hidden="true" style="color:white;"></i></a>
        </div>

    </div>
</footer>