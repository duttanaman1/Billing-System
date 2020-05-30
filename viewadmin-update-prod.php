<?php include('header.php');
include('connect.php');
if ($_POST['submit']) {
    $prodid = $_POST['prodid'];
}
?>
<div class="navbar navbar-expand-sm navbar-dark mb-2 bg-secondary text-white">

    <ul class="navbar-nav  mx-auto">

        <li class="nav-item ">
            <a class="nav-link" href="viewadimn-prod.php"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        </li>
    </ul>
</div>
<div class="container">
    <div class="card w-75">
        <div class="card-header">
            <h3>Update</h3>
        </div>
        <div class="card-body">
            <form action="sqlupdate-prod.php" method="post">
                product id: <br>
                <input type="text" name="" id="" value="<?php echo $prodid; ?>" class="form-control" disabled><br>
                <input type="hidden" name="prodid" value="<?php echo $prodid; ?>">
                product name: <br>
                <input type="text" name="prodname" id="" class="form-control"><br>
                price: <br>
                <input type="text" name="price" id="" class="form-control"><br>
                stock: <br>
                <input type="text" name="stock" id="" class="form-control"><br>
                discount: <br>
                <input type="text" name="discount" id="" class="form-control"><br>
                <br>
                <input type="submit" value="Update" name="submit" class="btn btn-warning">
            </form>
        </div>
    </div>
</div>