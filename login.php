<?php
session_start();
if (isset($_SESSION['login'])) {
    header('Location: ./index.php?page=dashboard');
}
include "konfig/function.php";
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = mysqli_real_escape_string($dbconnect, $_POST['username']);
    $password = mysqli_real_escape_string($dbconnect, $_POST['password']);
    $login = login($username, $password);
    $notice = true;
} else {
    $notice = false;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login </title>
    <!--favicon-->
    <link rel="icon" href="assets/images/logo-icon1.png" type="image/x-icon">
    <!-- Bootstrap core CSS-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="assets/css/animate.css" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <!-- Custom Style-->
    <link href="assets/css/app-style.css" rel="stylesheet" />

</head>

<body>

    <!-- start loader -->
    <div id="pageloader-overlay" class="visible incoming">
        <div class="loader-wrapper-outer">
            <div class="loader-wrapper-inner">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    <!-- end loader -->

    <!-- Start wrapper-->
    <div id="wrapper">

        <div class="loader-wrapper">
            <div class="lds-ring">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <div class="card card-authentication1 mx-auto my-5">
            <div class="card-body">
                <div class="card-content p-2">
                    <div class="text-center">
                        <img src="assets/images/logo-icon1.png" alt="logo icon">
                    </div>
                    <div class="card-title text-uppercase text-center py-3">Silahkan Login</div>

                    <?php
                    if ($notice) {
                        $login = json_decode($login, true);
                        if ($login['error'] == 500) {
                    ?>

                            <div class="alert alert-outline-warning alert-dismissible mb-0" role="alert">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <div class="alert-icon">
                                    <i class="fa fa-exclamation-triangle"></i>
                                </div>
                                <div class="alert-message">
                                    <span><strong>Failed Login !</strong></span>
                                </div>
                            </div>

                    <?php
                        }
                    }
                    ?>

                    <br>
                    <form method="POST">
                        <div class="form-group">
                            <label for="exampleInputUsername" class="sr-only">Username</label>
                            <div class="position-relative has-icon-right">
                                <input required type="text" name="username" id="exampleInputUsername" class="form-control input-shadow" placeholder="Enter Username">
                                <div class="form-control-position">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword" class="sr-only">Password</label>
                            <div class="position-relative has-icon-right">
                                <input required type="password" name="password" id="exampleInputPassword" class="form-control input-shadow" placeholder="Enter Password">
                                <div class="form-control-position">
                                    <i class="icon-lock"></i>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Login</button>


                    </form>
                </div>
            </div>
            <div class="card-footer text-center py-3">
                <p class="text-dark mb-0"></p>
            </div>
        </div>

        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->



    </div>
    <!--wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- sidebar-menu js -->
    <script src="assets/js/sidebar-menu.js"></script>

    <!-- Custom scripts -->
    <script src="assets/js/app-script.js"></script>

</body>

</html>