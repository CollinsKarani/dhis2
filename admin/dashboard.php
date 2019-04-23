<?php require_once('../include/header.php'); ?>
<!--sidebar start-->
<?php

$query =$conn->prepare("SELECT * FROM datavalue WHERE indicator_id=1");
$query->execute();
$chart_data = '';
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
 $chart_data .= "".$row["recorded_value"].", ";
}
$chart_data = substr($chart_data, 0, -2);
?>
         <?php require_once('include/sidebar.php'); ?>
            <!--sidebar end-->

            <!--main content start-->
            <div id="content" class="ui-content ui-content-aside-overlay">
                <div class="ui-content-body">

                    <div class="ui-container">

                        <!--page title and breadcrumb start -->
                        <div class="row">
                            <div class="col-md-8">
                                <h1 class="page-title">Welcome eHEALTH SYSTEM

                                </h1>
                            </div>
                            <div class="col-md-4">
                                <ul class="breadcrumb pull-right">
                                    <li>Home</li>
                                    <li><a href="#" class="active">Dashboard</a></li>
                                </ul>
                            </div>
                        </div>
                        <!--page title and breadcrumb end -->

                        <!--states start-->
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <div class="panel short-states bg-danger">
                                    <div class="pull-right state-icon">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <div class="panel-body">
                                        <h1 class="light-txt"><?php
                                    $subcount=$conn->prepare("SELECT COUNT(*) AS Total_counties FROM subcounty");
                                    $subcount->execute();
                                    $row= $subcount->fetch(PDO::FETCH_ASSOC);
                                        echo $row['Total_counties'];

                            ?></h1>

                                        <strong class="text-uppercase">TOTAL SUB COUNTIES</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="panel short-states bg-info">
                                    <div class="pull-right state-icon">
                                        <i class="fa fa-users"></i>
                                    </div>
                                    <div class="panel-body">
                                        <h1 class="light-txt"><?php
                                    $Ucount=$conn->prepare("SELECT COUNT(*) AS Total_Users FROM tblusers");
                                    $Ucount->execute();
                                    $row= $Ucount->fetch(PDO::FETCH_ASSOC);
                                        echo $row['Total_Users'];

                            ?></h1>

                                        <strong class="text-uppercase">Registered Users</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="panel short-states bg-warning">
                                    <div class="pull-right state-icon">
                                        <i class="fa fa-laptop"></i>
                                    </div>
                                    <div class="panel-body">
                                        <h1 class="light-txt"><?php
                                    $Icount=$conn->prepare("SELECT COUNT(*) AS Total_Indicators FROM indicators");
                                    $Icount->execute();
                                    $row= $Icount->fetch(PDO::FETCH_ASSOC);
                                        echo $row['Total_Indicators'];

                            ?></h1>
                                        <strong class="text-uppercase">Total Indicatord</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="panel short-states bg-primary">
                                    <div class="pull-right state-icon">
                                        <i class="fa fa-pie-chart"></i>
                                    </div>
                                    <div class="panel-body">
                                        <h1 class="light-txt"><?php
                                    $Fcount=$conn->prepare("SELECT COUNT(*) AS Total_Facilities FROM facilities");
                                    $Fcount->execute();
                                    $row= $Fcount->fetch(PDO::FETCH_ASSOC);
                                        echo $row['Total_Facilities'];

                            ?></h1>

                                        <strong class="text-uppercase">Number Facilities</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--states end-->


                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" />
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                </div>
                        </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <header class="panel-heading">
                                        Indicators Analysis for the last Financial Year
                                        <span class="tools pull-right">
                                            <a class="close-box fa fa-times" href="javascript:;"></a>
                                        </span>
                                    </header>
                                    <div class="panel-body">

                                        <div id="container2"></div>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>


                </div>
            </div>
            <!--main content end-->

<?php require_once('../include/footer.php'); ?>