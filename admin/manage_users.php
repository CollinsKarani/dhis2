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
                         <div class="row">
                            <div class="col-sm-12">
                                <section class="panel">
                                    <header class="panel-heading panel-border">
                                       Users List
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
                                           <th>Email Ad</th>
                                           <th>username</th>
                                           <th>Facility Name</th>
                                           <th>Sub county</th>
                                            <th>Actions</th>
                                           </tr>
                                           </thead>
                                           <tbody>
                                              <?php
                                              $users=$conn->prepare("SELECT tblusers.id, tblusers.username,tblusers.email, subcounty.sub_county_name
                                                    , facilities.facility_name
                                                FROM   tblusers  INNER JOIN facilities ON (tblusers.facility_id = facilities.facility_id)
                                                    INNER JOIN subcounty  ON (facilities.sub_id = subcounty.sub_id)");
                                                $users->execute();
                                                $count=1;
                                                while($row=$users->fetch(PDO::FETCH_ASSOC)){
                                                    $id= $row['id'];
                                                    ?>
                                                      <tr>
                                                          <td><?php echo $count;  ?></td>
                                                          <td><?php echo $row['email'];  ?></td>
                                                          <td><?php echo $row['username'];  ?></td>
                                                          <td><?php echo $row['facility_name'];  ?></td>
                                                          <td><?php echo $row['sub_county_name'];  ?></td>
                                                          <td>
                                                              <button class="btn btn-info" type="button" data-toggle="modal" data-target="#user<?php echo $id; ?>">Edit</button>
                                                              <button class="btn btn-danger" type="button" data-toggle="modal" data-target=".example-modal-sm">Delete</button>
                                                          </td>
                                                          <!--- Start of the update modal -->
                                                          <div id="user<?php echo $id;  ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Update Users Details</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                       <div class="row">
                                                           <div class="col-md-6">
                                                               <div class="form-group">
                                                                   <label for="">Username:</label>
                                                                   <input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>" />
                                                               </div>
                                                           </div>
                                                           <div class="col-md-6">
                                                               <div class="form-group">
                                                                   <label for="">Email:</label>
                                                                   <input type="text" class="form-control" name="username" value="<?php echo $row['email']; ?>" />
                                                               </div>
                                                           </div>
                                                       </div>

                                                       <div class="row">
                                                          <div class="col-md-6">
                                                               <div class="form-group">
                                                                   <label for="">Facility Name:</label>
                                                                   <input type="text" class="form-control" name="username" value="<?php echo $row['facility_name']; ?>" />
                                                               </div>
                                                           </div>
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                   <label for="">Sub County Name:</label>
                                                                   <input type="text" class="form-control" name="username" value="<?php echo $row['sub_county_name']; ?>" />
                                                               </div>
                                                           </div>
                                                       </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <!--- End of update Modal-->

                                          <!--- Start of the delete modal -->
                                                     <div class="modal fade example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                            <div class="modal-dialog modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="mySmallModalLabel">Delete <?php echo $row['username']; ?></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>Are you sure?</h4>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-danger">Delete Record</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  end of delete modal  --->
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