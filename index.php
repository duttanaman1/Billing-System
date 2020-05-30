<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project 5</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" />
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" />

    <script src="js/main.js"></script>
    <script src="js/typewriter.js"></script>

    <script src="https://use.fontawesome.com/05113e75b1.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <style>
        body {
            background: rgb(8, 1, 25);
            background: -moz-linear-gradient(top, rgb(8, 1, 25) 0%, rgb(5, 62, 73) 100%);
            background: -webkit-linear-gradient(top, rgb(8, 1, 25) 0%, rgb(5, 62, 73) 100%);
            background: linear-gradient(to bottom, rgb(8, 1, 25) 0%, rgb(5, 62, 73) 100%);
            margin: 0;
            background-repeat: no-repeat;
        }

        nav {
            border-bottom: 4px solid #240575;
            border-radius: 0 0 0.25rem 0.25rem;
            background: rgb(60, 8, 139);
            background: -moz-linear-gradient(45deg, rgb(60, 8, 139) 0%, rgb(117, 5, 5) 100%);
            background: -webkit-linear-gradient(45deg, rgb(60, 8, 139) 0%, rgb(117, 5, 5) 100%);
            background: linear-gradient(45deg, rgb(60, 8, 139) 0%, rgb(117, 5, 5) 100%);
        }

        .card-header {
            background: #0FB6C9;
            background: -moz-linear-gradient(left, #0FB6C9 0%, #0BCBC4 32%, #0C89E5 100%);
            background: -webkit-linear-gradient(left, #0FB6C9 0%, #0BCBC4 32%, #0C89E5 100%);
            background: linear-gradient(to right, #0FB6C9 0%, #0BCBC4 32%, #0C89E5 100%);
        }

        .card-body {
            border-bottom: 4px solid #00CED1;
            border-radius: 0 0 0.25rem 0.25rem;
        }

        a {
            color: inherit;
            text-decoration: inherit;
            background-color: transparent;
            font-family: 'Raleway', sans-serif;
            outline: 0;
        }

        p {
            font-family: 'Raleway', sans-serif;
            width: 80%;
            text-align: justify;
            display: inline-block;
        }

        footer {
            padding: 16px 0px 16px 0;
            border-top: 4px solid #240575;
            border-radius: 0 0 0.25rem 0.25rem;
            width: 100%;
            background-color: black;
            z-index: 1;
            display: flex;
            align-items: center;
            text-align: left;
        }

        .foot-links-container {
            text-align: right;
            align-items: center;
            display: flex;
            width: 20%;
            padding-right: 16px;
        }

        .foot-link {
            width: 100%;
            align-items: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark position: sticky;">
        <a class="navbar-brand" href="index.php">LOGO</a>
        <ul class="navbar-nav  ml-auto">
            <li class="nav-item ">
                <a class="nav-link" href="nav-links/home.php"> <i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
        </ul>
    </nav>
    <div class="container my-5">
        <div class="card w-75">
            <div class="card-header">
                <h4>Login</h4>
            </div>

            <div class="card-body">

                <form action="sqllogin.php" method="post">
                    <div class="row">

                        <div class="col-md-4 my-2">USERNAME</div>
                        <div class="col-md-6 my-2"><input type="text" name="username" id="" class="form-control" placeholder="username"></div>
                        <div class="col-md-4 my-2">password</div>
                        <div class="col-md-6 my-2"><input type="password" name="password" id="" class="form-control" placeholder="password"></div>
                        <div class="col-md-4 my-2"></div>
                        <div class="col-md-2 my-2"><input type="submit" value="Submit" name="submit" class="btn btn-success"></div>
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