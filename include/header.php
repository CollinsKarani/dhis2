<?php

  require_once('../config/dbconnect.php');
$name=$_SERVER['HTTP_HOST'];

define('PAGE_URL', 'http://'.$name.'/DHIS2/');
function Page_Url() {
        echo PAGE_URL;
}
?>

<?php
 session_start();
    $role=  $_SESSION['role_session'];
if(!isset($_SESSION['admin'])  && $role!=1)
{
        header("Location:../index");
}
else{

    $session_id= $_SESSION['admin'];
    $stmt = $conn->prepare("SELECT * FROM tblusers WHERE email='$session_id' ");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

}
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="shortcut icon" type="image/png" href="/imgs/favicon.png" /> -->
        <title>eHEALTH APP- Dashboard</title>

        <!-- inject:css -->
        <link rel="stylesheet" href="<?php Page_Url() ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php Page_Url() ?>bower_components/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php Page_Url() ?>bower_components/simple-line-icons/css/simple-line-icons.css">
        <link rel="stylesheet" href="<?php Page_Url() ?>bower_components/weather-icons/css/weather-icons.min.css">
        <link rel="stylesheet" href="<?php Page_Url() ?>bower_components/themify-icons/css/themify-icons.css">
        <!-- endinject -->

         <!--Data Table-->
        <link href="<?php Page_Url() ?>bower_components/datatables/media/css/jquery.dataTables.css" rel="stylesheet">
        <link href="<?php Page_Url() ?>bower_components/datatables-tabletools/css/dataTables.tableTools.css" rel="stylesheet">
        <link href="<?php Page_Url() ?>bower_components/datatables-colvis/css/dataTables.colVis.css" rel="stylesheet">
        <link href="<?php Page_Url() ?>bower_components/datatables-responsive/css/responsive.dataTables.scss" rel="stylesheet">
        <link href="<?php Page_Url() ?>bower_components/datatables-scroller/css/scroller.dataTables.scss" rel="stylesheet">

            <!-- Bootstrap Date Range Picker Dependencies -->
                <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">

                <!-- Bootstrap DatePicker Dependencies -->
                <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css">

                <!-- Bootstrap TimePicker Dependencies -->
                <link rel="stylesheet" href="../bower_components/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
                    <!--Morris Chart Depencencies -->
                <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
        <!-- Main Style  -->
        <link rel="stylesheet" href="<?php Page_Url() ?>dist/css/main.css">

        <!--horizontal-timeline-->
        <link rel="stylesheet" href="<?php Page_Url() ?>assets/js/horizontal-timeline/css/style.css">


        <script src="<?php Page_Url() ?>assets/js/modernizr-custom.js"></script>
    </head>
    <body>

        <div id="ui" class="ui">
            <!--header start-->
            <header id="header" class="ui-header ui-header--blue text-white">

                <div class="navbar-header">
                    <!--logo start-->
                    <a href="<?php Page_Url() ?>dashboard" class="navbar-brand">
                        <span class="logo">eHEALTH</span>
                        <span class="logo-compact">eHEALTH</span>
                    </a>
                    <!--logo end-->
                </div>


                <div class="navbar-collapse nav-responsive-disabled">

                    <!--toggle buttons start-->
                    <ul class="nav navbar-nav">
                        <li>
                            <a class="toggle-btn" data-toggle="ui-nav" href="">
                                <i class="fa fa-bars"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- toggle buttons end -->

                    <!--search start-->
                    <form class="search-content hidden-xs">
                           <h4>KAKAMEGA ANALYSIS</h4>

                    </form>
                    <!--search end-->

                    <!--notification start-->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell-o"></i>
                                <span class="badge">0</span>
                            </a>
                            <!--dropdown -->
                            <ul class="dropdown-menu dropdown-menu--responsive">
                                <div class="dropdown-header">Notifications</div>
                                <ul class="Notification-list Notification-list--small niceScroll list-group">
                                </ul>
                                <div class="dropdown-footer"><a href="">View more</a></div>
                            </ul>
                            <!--/ dropdown -->
                        </li>

                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge">0</span>
                            </a>
                            <!--dropdown -->
                            <ul class="dropdown-menu dropdown-menu--responsive">
                                <div class="dropdown-header">Messages</div>
                                <ul class="Message-list niceScroll list-group">
                                </ul>
                                <div class="dropdown-footer"><a href="">View more</a></div>
                            </ul>
                            <!--/ dropdown -->
                        </li>

                        <li class="dropdown dropdown-usermenu">
                            <a href="#" class=" dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <div class="user-avatar"><img src="imgs/a0.jpg" alt="..."></div>
                                <span class="hidden-sm hidden-xs"><?php echo $row['username'];  ?></span>
                                <!--<i class="fa fa-angle-down"></i>-->
                                <span class="caret hidden-sm hidden-xs"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                                <li><a href="#"><i class="fa fa-cogs"></i>  Settings</a></li>
                                <li><a href="#"><i class="fa fa-user"></i>  Profile</a></li>
                                <li><a href="#"><i class="fa fa-commenting-o"></i>  Feedback</a></li>
                                <li><a href="#"><i class="fa fa-life-ring"></i>  Help</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo Page_Url() ?>logout"><i class="fa fa-sign-out"></i> Log Out</a></li>
                            </ul>
                        </li>

                        <li>
                            <a data-toggle="ui-aside-right" href=""><i class="glyphicon glyphicon-option-vertical"></i></a>
                        </li>
                    </ul>
                    <!--notification end-->

                </div>

            </header>
            <!--header end-->