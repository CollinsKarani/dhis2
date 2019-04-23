 <?php
  require_once('../config/dbconnect.php');
   $start = $_GET['startdate'];
   $end= $_GET['enddate'];

  if(!empty(($start) && ($end)) ){
        $data= $conn->prepare("SELECT * FROM datavalue WHERE period BETWEEN '$start' AND '$end'");
        $data->execute();
$month_data = '';
while($row = $data->fetch(PDO::FETCH_ASSOC))
{
$month_data .= "{ period:'".$row["period"]."',recorded_value:".$row["recorded_value"]."}, ";
}
$month_data = substr($month_data, 0, -2);
      }
      else{
           header('Location:monthly_computation');
      }

 ?>

<?php require_once('../include/header.php'); ?>
<!--sidebar start-->
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


                         <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <header class="panel-heading">
                                        Monthly Display
                                        <span class="tools pull-right">
                                            <a class="close-box fa fa-times" href="javascript:;"></a>
                                        </span>
                                    </header>
                                    <div class="panel-body">

                                        <div id="month1"></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                          <div class="row">
                            <div class="col-sm-12">
                                <section class="panel">
                                    <header class="panel-heading panel-border">
                                       Data For the <?php echo $start; ?> and <?php echo $end;  ?>
                                        <span class="tools pull-right">
                                            <a class="refresh-box fa fa-repeat" href="javascript:;"></a>
                                            <a class="collapse-box fa fa-chevron-down" href="javascript:;"></a>
                                            <a class="close-box fa fa-times" href="javascript:;"></a>
                                        </span>
                                    </header>
                                   <div class="panel-body table-responsive">
                                       <table class="table colvis-data-table table-striped">
                                           <thead>
                                           <tr>
                                           <th>Serial</th>
                                           <th>Period</th>
                                           <th>Recorded Data</th>
                                           </tr>
                                           </thead>
                                           <tbody>
                                                <?php
                                                 $data1= $conn->prepare("SELECT * FROM datavalue WHERE period BETWEEN '$start' AND '$end'");
                                                    $data1->execute();
                                                    $count=1;
                                                while($row1=$data1->fetch(PDO::FETCH_ASSOC)){
                                                    ?>
                                                    <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td><?php echo $row1['period']; ?></td>
                                                    <td><?php echo $row1['recorded_value']; ?></td>
                                                    </tr>
                                                    <?php
                                                    $count++;
                                                }

                                                ?>
                                           </tbody>
                                       </table>
                                   </div>
                                </section>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
            <!--main content end-->

<?php require_once('../include/footer.php'); ?>