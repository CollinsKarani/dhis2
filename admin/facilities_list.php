<?php require_once('../include/header.php'); ?>
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
                                        Facilities List
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
                                           <th>Sub County</th>
                                           <th>Facility Name</th>
                                           </tr>
                                           </thead>
                                           <tbody>
                                              <?php
                                                $fac = $conn->prepare("SELECT subcounty.sub_county_name
    , facilities.facility_name FROM    facilities INNER JOIN subcounty  ON (facilities.sub_id = subcounty.sub_id)");
                                                $fac->execute();
                                                $count=1;
                                                while($row=$fac->fetch(PDO::FETCH_ASSOC)){
                                                    ?>
                                                      <tr>
                                                          <td><?php echo $count;  ?></td>
                                                          <td><?php echo $row['sub_county_name'];  ?></td>
                                                          <td><?php echo $row['facility_name'];  ?></td>
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