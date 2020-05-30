<?php

include('header.php');
include('connect.php');
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
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>List of Transactions</h3>
        </div>
        <div class="card-body">
            <table class="table table-borderless table-hover mt-5 ">

                <caption> Print Transactions <button class="btn btn-success" onclick="printDiv()">Print</button></caption>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Transaction ID</th>
                        <th scope="col">Date</th>
                        <th scope="col">Bill no</th>
                        <th scope="col">Total</th>
                        <th scope="col">Customer Pay</th>
                        <th scope="col">Customer Refund</th><br>
                    </tr>
                </thead>
                <tbody id="printableTable">
                    <?php
                    $tot = 0.0;
                    $sqltrans = mysqli_query($con, "SELECT * FROM trans order by 'date'");
                    if (mysqli_num_rows($sqltrans) > 0) {
                        while ($trans = mysqli_fetch_assoc($sqltrans)) {

                    ?>
                            <tr>
                                <th scope="row"><?php echo  $trans['transid']; ?></th>
                                <td><?php echo $trans['date']; ?></td>
                                <td><?php echo $trans['billno']; ?></td>
                                <td><?php echo $trans['tot']; ?></td>
                                <td><?php echo $trans['custpay']; ?></td>
                                <td><?php echo $trans['custrefund']; ?></td>

                                <td class="table-borderless">
                                    <form action="viewemp-check.php" method="post">
                                        <input type="hidden" name="billno" value="<?php echo $trans['billno']; ?>">
                                        <input type="hidden" name="date" value="<?php echo $trans['date']; ?>">
                                        <input type="submit" name="submit" value="i" class="btn btn-info">
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
        <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
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
<script>
    function printDiv() {
        window.frames["print_frame"].document.body.innerHTML = document.getElementById("printableTable").innerHTML;
        window.frames["print_frame"].window.focus();
        window.frames["print_frame"].window.print();
    }
</script>