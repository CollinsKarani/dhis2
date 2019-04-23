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
                                    Financial Year Setup
                                        <span class="tools pull-right">
                                            <a class="refresh-box fa fa-repeat" href="javascript:;"></a>
                                            <a class="collapse-box fa fa-chevron-down" href="javascript:;"></a>
                                            <a class="close-box fa fa-times" href="javascript:;"></a>
                                        </span>
                                    </header>
                                   <div class="panel-body">
                                        <?php
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

                                        ?>

                                       <form method="post">
                                       <div class="row">
                                       <div class="col-md-4">
                                           <label for="" class="control-label">Start Date:</label>
                                          <div class="input-group date" data-provide="datepicker">
                            	    <input type="text" class="form-control" name="startdate">
                            	    <span class="glyphicon glyphicon-calendar input-group-addon"></span>
                            	</div>
                                       </div>

                                        <div class="col-md-4">
                                           <label for="" class="control-label">End Date:</label>
                                          <div class="input-group date" data-provide="datepicker">
                            	    <input type="text" class="form-control" name="enddate">
                            	    <span class="glyphicon glyphicon-calendar input-group-addon"></span>
                            	</div>
                                       </div>
                                       </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                         <button class="btn btn-info" type="submit" name="year-add">Get Graphical Data</button>
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