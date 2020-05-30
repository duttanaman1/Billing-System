<?php include('header.php');
include('connect.php');
?>
<div class="navbar navbar-expand-sm navbar-dark mb-2 bg-secondary text-white">

    <ul class="navbar-nav  mx-auto">
        <li class="nav-item ">
            <a class="nav-link" href="viewadmin.php"> <i class="fa fa-users" aria-hidden="true"></i> Employee</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="viewadimn-prod.php"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> Product</a>
        </li>
    </ul>
</div>
<div class="container my-5">
    <div class="card w-75 mx-auto">
        <div class="card-header">ADD PRODUCTS</div>
        <div class="card-body">
            <form action="sqladdprod.php" method="post">
                Name:<br>
                <input type="text" name="prodname" id="" class="form-control">
                Price:<br>
                <input type="tel" name="price" id="" class="form-control">
                Stock quantity:<br>
                <input type="tel" name="stock" id="" class="form-control">
                Discount(%):<br>
                <input type="tel" name="discount" id="" class="form-control">
                <br>
                <input type="submit" name="submit" value="ADD" class="btn btn-primary btn-lg">
            </form>
        </div>
    </div>
    <div class="card my-3">

        <div class="card-body">
            <table class="table table-borderless table-hover ">
                <caption>List of products</caption>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">product ID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">stock</th>
                        <th scope="col">discount</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sqlprod = mysqli_query($con, "SELECT * FROM product");
                    if (mysqli_num_rows($sqlprod) > 0) {
                        while ($prod = mysqli_fetch_assoc($sqlprod)) {
                    ?>
                            <tr>
                                <th scope="row"><?php echo $prod['prodid']; ?></th>
                                <td><?php echo $prod['prodname']; ?></td>
                                <td><?php echo $prod['price']; ?></td>
                                <td><?php echo $prod['stock']; ?></td>
                                <td><?php echo $prod['discount']; ?> %</td>
                                <td class="table-borderless">
                                    <form action="sqldelete-prod.php" method="post">
                                        <input type="hidden" name="prodid" value="<?php echo $prod['prodid']; ?>">
                                        <input type="submit" name="submit" value="X" class="btn btn-danger btn-outline-warning">
                                    </form>
                                </td>
                                <td class="table-borderless">
                                    <form action="viewadmin-update-prod.php" method="post">
                                        <input type="hidden" name="prodid" value="<?php echo $prod['prodid']; ?>">
                                        <input type="submit" name="submit" value="Update" class="btn btn-primary">
                                    </form>
                                </td>

                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

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