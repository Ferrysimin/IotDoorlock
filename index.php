<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
}
include 'konfig/function.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sistem Security Door Lock System Laboratorium MTs N 3 Tegal</title>
    <!--favicon-->
    <link rel="icon" href="assets/images/logo-icon1.png" type="image/x-icon" />
    <!-- Vector CSS -->
    <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- simplebar CSS-->
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--Data Tables -->
    <link href="assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <!-- animate CSS-->
    <link href="assets/css/animate.css" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <!-- Sidebar CSS-->
    <link href="assets/css/sidebar-menu.css" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="assets/css/app-style.css" rel="stylesheet" />
    <!-- skins CSS-->
    <link href="assets/css/skins.css" rel="stylesheet" />

    <!--Select Plugins-->
    <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <!--inputtags-->
    <link href="assets/plugins/inputtags/css/bootstrap-tagsinput.css" rel="stylesheet" />
    <!--multi select-->
    <link href="assets/plugins/jquery-multi-select/multi-select.css" rel="stylesheet" type="text/css">
    <!--Touchspin-->
    <link href="assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css">


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

        <!--Start sidebar-wrapper-->
        <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
            <div class="brand-logo">
                <a href="index.html">
                    <img src="assets/images/logo-icon1.png" class="logo-icon" alt="logo icon">
                    <h5 class="logo-text">Website TA</h5>
                </a>
            </div>
            <ul class="sidebar-menu">
                <li class="sidebar-header">MAIN NAVIGATION</li>
                <li>
                    <a href="./index.php?page=dashboard" class="waves-effect">
                        <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javaScript:void();" class="waves-effect">
                        <i class="zmdi zmdi-cast-connected"></i>
                        <span>Log</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="./index.php?page=accept"><i class="zmdi zmdi-dot-circle-alt"></i> Accepted</a></li>
                        <li><a href="./index.php?page=reject"><i class="zmdi zmdi-dot-circle-alt"></i> Rejected</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();" class="waves-effect">
                        <i class="zmdi zmdi-accounts-list-alt"></i>
                        <span>Management</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="./index.php?page=user"><i class="zmdi zmdi-dot-circle-alt"></i> User</a></li>
                        <li><a href="./index.php?page=admin"><i class="zmdi zmdi-dot-circle-alt"></i> Admin</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();" class="waves-effect">
                        <i class="zmdi zmdi-settings"></i>
                        <span>Settings</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="./index.php?page=block"><i class="zmdi zmdi-dot-circle-alt"></i> User Block</a></li>
                        <li><a href="./index.php?page=settings"><i class="zmdi zmdi-dot-circle-alt"></i> Controller</a></li>
                    </ul>
                </li>

        </div>
        <!--End sidebar-wrapper-->

        <!--Start topbar header-->
        <header class="topbar-nav">
            <nav id="header-setting" class="navbar navbar-expand fixed-top">
                <ul class="navbar-nav mr-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link toggle-menu" href="javascript:void();">
                            <i class="icon-menu menu-icon"></i>
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav align-items-center right-nav-link">

                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
                            <span class="user-profile"><img src="assets/images/user.png" class="img-circle" alt="user avatar"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item user-details">
                                <a href="javaScript:void();">
                                    <div class="media">
                                        <div class="avatar"><img class="align-self-start mr-3" src="assets/images/user.png" alt="user avatar"></div>
                                        <div class="media-body">
                                            <h6 class="mt-2 user-title">Hello, <?php echo $_SESSION['username'] ?></h6>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li class="dropdown-divider"></li>
                            <a class="dropdown-item" onclick="logout()"><i class="icon-power mr-2"></i> Logout</a>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>
        <!--End topbar header-->

        <div class="clearfix"></div>

        <div class="content-wrapper">
            <div class="container-fluid">
                <?php
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                    switch ($page) {
                        case 'dashboard':
                            include "pages/dashboard.php";
                            break;
                        case 'accept':
                            include "pages/log-accept.php";
                            break;
                        case 'reject':
                            include "pages/log-reject.php";
                            break;
                        case 'user':
                            include "pages/management-user.php";
                            break;
                        case 'add-user':
                            include "pages/add-user.php";
                            break;
                        case 'block':
                            include "pages/user-block.php";
                            break;
                        case 'access':
                            include "pages/accessUser.php";
                            break;
                        case 'settings':
                            include "pages/settings.php";
                            break;
                        case 'admin':
                            include "pages/management-admin.php";
                            break;
                        case 'sketch':
                                include "pages/generate_sketch.php";
                                break;
                        default:
                            include "index.php?page=dashboard";
                            break;
                    }
                } else {
                    echo "<h4 class='page-title mt-4'>Blank Page</h4>";
                }
                ?>
            </div>
            <!-- End container-fluid-->

        </div>
        <!--End content-wrapper-->
        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->

        <!--Start footer-->
        <footer class="footer" style="position: fixed;">
            <div class="container">
                <div class="text-center">
                    Copyright © 2022 Peliteknik Harapan Bersama <a href='https://www.instagram.com/ferrysimin/' target='_blank'>Ferry Prasetyo</a>
                </div>
            </div>
        </footer>
        <!--End footer-->


    </div>
    <!--End wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- simplebar js -->
    <script src="assets/plugins/simplebar/js/simplebar.js"></script>
    <!-- sidebar-menu js -->
    <script src="assets/js/sidebar-menu.js"></script>

    <!-- Custom scripts -->
    <script src="assets/js/app-script.js"></script>

    <!--Data Tables js-->
    <script src="assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/plugins/bootstrap-datatable/js/jszip.min.js"></script>
    <script src="assets/plugins/bootstrap-datatable/js/pdfmake.min.js"></script>
    <script src="assets/plugins/bootstrap-datatable/js/vfs_fonts.js"></script>
    <script src="assets/plugins/bootstrap-datatable/js/buttons.html5.min.js"></script>
    <script src="assets/plugins/bootstrap-datatable/js/buttons.print.min.js"></script>
    <script src="assets/plugins/bootstrap-datatable/js/buttons.colVis.min.js"></script>

    <!--Sweet Alerts -->
    <script src="assets/plugins/alerts-boxes/js/sweetalert.min.js"></script>
    <script src="assets/plugins/alerts-boxes/js/sweet-alert-script.js"></script>

    <!--Bootstrap Touchspin Js-->
    <script src="assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js"></script>
    <script src="assets/plugins/bootstrap-touchspin/js/bootstrap-touchspin-script.js"></script>

    <!--Select Plugins Js-->
    <script src="assets/plugins/select2/js/select2.min.js"></script>
    <!--Inputtags Js-->
    <script src="assets/plugins/inputtags/js/bootstrap-tagsinput.js"></script>

    <!--Multi Select Js-->
    <script src="assets/plugins/jquery-multi-select/jquery.multi-select.js"></script>
    <script src="assets/plugins/jquery-multi-select/jquery.quicksearch.js"></script>



    <!-- data tables -->
    <script>
        $(document).ready(function() {
            //Default data table
            $('#default-datatable').DataTable();


            var table = $('#example').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
            });
            table.destroy();
            var table = $('#example').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print', ]
            });

            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');

            //multi selection
            $('.multiple-select').select2();

            //end multi selection

        });
    </script>



</body>

</html>