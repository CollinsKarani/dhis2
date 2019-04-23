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
                        <!--page title and breadcrumb end -->
                         <div class="row">
                            <div class="col-sm-12">
                                <section class="panel">
                                    <header class="panel-heading panel-border">
                                    Facility Annual Target Setup
                                        <span class="tools pull-right">
                                            <a class="refresh-box fa fa-repeat" href="javascript:;"></a>
                                            <a class="collapse-box fa fa-chevron-down" href="javascript:;"></a>
                                            <a class="close-box fa fa-times" href="javascript:;"></a>
                                        </span>
                                    </header>
                                   <div class="panel-body">
                                        <?php
                                        $checkyear= $conn->prepare("SELECT * FROM financial_year WHERE status=1 LIMIT 1");
                                        $checkyear->execute();
                                        $countcheck= $checkyear->rowCount();
                                        $yearrow= $checkyear->fetch(PDO::FETCH_ASSOC);
                                        if($countcheck>0){
                                           if(isset($_POST['year-add'])){
                                            $start=$_POST['startdate'];
                                            $end = $_POST['enddate'];
                                            $status=1;
                                         $financial=$conn->prepare("INSERT INTO financial_year(startdate,enddate,status) VALUES('$start','$end','$status')");
                                         if($financial->execute()){
                                             echo '<div class="alert alert-success"><strong>Success!!!</strong>Data successfully saved. </div>';
                                         }
                                         else{
                                           echo '<div class="alert alert-danger"><strong>Oppss!!!</strong>An an error occurred. </div>';
                                         }

                                        }
                                        }
                                        else{
                                          echo '<div class="alert alert-danger"><strong>Sorry!!!</strong>No Financial Year Set Yet. Keep on checking </div>';
                                        }
                                        ?>
                                       <form method="post">
                                       <div class="row">
                                       <div class="col-md-4">
                                           <label for="" class="control-label">Start Date:</label>

                            	    <input type="text" class="form-control" name="startdate" readonly="readonly" value="<?php echo $yearrow['startdate']; ?>">

                                       </div>

                                        <div class="col-md-4">
                                           <label for="" class="control-label">End Date:</label>

                            	    <input type="text" class="form-control" readonly="readonly" name="enddate" value="<?php echo $yearrow['enddate'];  ?>">

                                       </div>

                                         <div class="col-md-4">
                                           <label for="" class="control-label">Facility Name:</label>
                                             <select name="facility" id="facility" class="form-control">
                                                 <option value="">Select the facility to set</option>
                                                 <?php
                                                   $facility=$conn->prepare("SELECT * FROM facilities");
                                                   $facility->execute();
                                                   while($rowfacility=$facility->fetch(PDO::FETCH_ASSOC)){
                                                       ?>
                                                        <option value="<?php echo $rowfacility['facility_id'] ?>"> <?php echo $rowfacility['facility_name']; ?></option>
                                                       <?php
                                                   }
                                                 ?>
                                             </select>
                                       </div>

                                       </div>
                                             <br>
                                       <div class="row">
                                           <div class="col-md-4">
                                        <div class="form-group">
                                         <label for="indicator">Indicator Name:</label>
                                         <select name="indicator" id="" class="form-control">
                                             <option value="">Select the indicator</option>
                                             <?php
                                              $indicator= $conn->prepare("SELECT * FROM indicators");
                                              $indicator->execute();
                                              while($indicatorrow=$indicator->fetch(PDO::FETCH_ASSOC)){
                                                  ?>
                                               <option value="<?php $indicatorrow['indicator_id'] ?>"> <?php echo $indicatorrow['indicator_name'];  ?></option>

                                                  <?php
                                              }

                                             ?>
                                         </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                         <label for="">Set Value: </label>
                                         <input type="number" class="form-control" name="setvalue" placeholder="Set the Target Value" />

                                    </div>
                                       </div>
                                         <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                         <button class="btn btn-info" type="submit" name="year-add">Set Target</button>
                                        </div>

                                    </div>
                                </div>

                                   </form>


                                   </div>
                                </section>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <!--main content end-->

<?php require_once('../include/footer.php'); ?>