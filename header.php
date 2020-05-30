<?php

?>
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
        html {
            height: 100%;
        }

        body {
            background: rgb(8, 1, 25);

            background: linear-gradient(to bottom, rgb(8, 1, 25) 0%, rgb(5, 62, 73) 100%);
            height: 100%;

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

            display: flex;
            align-items: center;
            text-align: left;
            bottom: 0;
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

<body onload="startTime()">
    <nav class=" navbar navbar-expand-sm bg-dark navbar-dark position: sticky;">
        <a class="navbar-brand">LOGO</a>


        <ul class="navbar-nav  ml-auto">
            <li class="nav-item ">
                <a class="nav-link"> <i class="fa fa-clock-o" aria-hidden="true"></i> <span id="txt"></span></a>
            </li>
            <li class="nav-item "> <a class="nav-link"></a></li>
            <li class="nav-item ">
                <a class="nav-link" href="logout.php"> <i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
            </li>
        </ul>
    </nav>
    <script>
        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('txt').innerHTML =
                h + ":" + m + ":" + s;
            var t = setTimeout(startTime, 500);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }; // add zero in front of numbers < 10
            return i;
        }
    </script>