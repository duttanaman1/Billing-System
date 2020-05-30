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
      <div class="card w-75 my-2">
          <div class="card-header">
              <h4>Register Employee</h4>
          </div>
          <div class="card-body">

              <form action="sqlreg.php" method="post">
                  <div class="row">

                      <div class="col-md-4 my-2">USERNAME</div>
                      <div class="col-md-6 my-2"><input type="text" name="username" id="" class="form-control" placeholder="username"></div>
                      <div class="col-md-4 my-2">password</div>
                      <div class="col-md-6 my-2"><input type="password" name="password" id="" class="form-control" placeholder="password"></div>
                      <div class="col-md-4 my-2"></div>
                      <div class="col-md-2 my-2"><input type="submit" value="Register" name="submit" class="btn btn-success"></div>
                      <div class="col-md-2 my-2"><input type="reset" value="Reset" class="btn btn-warning"></div>
                      <div class="col-md-4 my-2"></div>

                  </div>
              </form>

          </div>
      </div>
      <div class="card my-3">

          <div class="card-body">
              <table class="table table-borderless table-hover ">
                  <caption>List of Employees</caption>
                  <thead class="thead-dark">
                      <tr>
                          <th scope="col">EMP iD</th>
                          <th scope="col">Name</th>
                          <th scope="col">password</th>


                      </tr>
                  </thead>
                  <tbody>
                      <?php
                        $sqlemp = mysqli_query($con, "SELECT * FROM loginemp");
                        if (mysqli_num_rows($sqlemp) > 0) {
                            while ($emp = mysqli_fetch_assoc($sqlemp)) {
                        ?>
                              <tr>
                                  <th scope="row"><?php echo $emp['empid']; ?></th>
                                  <td><?php echo $emp['empname']; ?></td>
                                  <td><?php echo $emp['password']; ?></td>
                                  <td class="table-borderless">
                                      <form action="sqldelete-emp.php" method="post">
                                          <input type="hidden" name="empid" value="<?php echo $emp['empid']; ?>">
                                          <input type="submit" name="submit" value="X" class="btn btn-danger btn-outline-warning">
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