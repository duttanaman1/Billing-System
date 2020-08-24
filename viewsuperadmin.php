  <?php include('header.php'); ?>
  <div class="container my-5">
      <div class="card w-75">
          <div class="card-header">
              <h4>Register Admin</h4>
          </div>
          <div class="card-body">

              <form action="sqlregadmin.php" method="post">
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
  </body>

  </html>