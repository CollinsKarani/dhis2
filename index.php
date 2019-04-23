<?php

$name=$_SERVER['HTTP_HOST'];

define('PAGE_URL', 'http://'.$name.'/DHIS2/');
function Page_Url() {
echo PAGE_URL;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="shortcut icon" type="image/png" href="/imgs/favicon.png" /> -->
        <title>eHEALTH || LOGIN</title>

        <!-- inject:css -->
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="bower_components/simple-line-icons/css/simple-line-icons.css">
        <link rel="stylesheet" href="bower_components/weather-icons/css/weather-icons.min.css">
        <link rel="stylesheet" href="bower_components/themify-icons/css/themify-icons.css">
        <!-- endinject -->

        <!-- Main Style  -->
        <link rel="stylesheet" href="dist/css/main.css">

        <script src="assets/js/modernizr-custom.js"></script>
    </head>
    <body style="background-image: url(dist/images/bg-2.jpg);">

        <div class="sign-in-wrapper">
            <div class="sign-container">
                <div class="text-center">
                    <h2 class="logo">eHEALTH SYSTEM</h2>
                    <h4>Login to Admin</h4>
                </div>
                             <?php
      session_start();

       require_once('config/dbconnect.php');
        if(isset($_POST['login'])){
          $username= trim($_POST['email']);
          $password = trim($_POST['password']);

          $sql=$conn->prepare("SELECT * FROM tblusers WHERE email='$username' AND password='$password'");
          $sql->execute();
          $row=$sql->fetch(PDO::FETCH_ASSOC);
          $count= $sql->rowCount();
          if($count>0){
               if($row['role_id']==1){
             $_SESSION['admin']= $username;
             $_SESSION['role_session']= $row['role_id'];
             header("Location: admin/dashboard");
     }
     else if($row['role_id']==2){
         echo "ok1";
         $_SESSION['user_session']= $username;
         $_SESSION['role_session']= $row['role_id'];
         header("Location: facility/dashboard");
            }
          }
          else{
              echo '<div class="alert alert-danger"><strong>Opps!!!</strong>Wrong login creditials</div>';
          }
        }


      ?>
                <form class="sign-in-form" role="form" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="User name" required="required">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" required="">
                    </div>
                    <div class="form-group text-center">
                        <label class="i-checks">
                            <input type="checkbox">
                            <i></i>
                        </label>
                        Remember me
                    </div>
                    <button type="submit" name="login" class="btn btn-info btn-block">Login</button>
                    <div class="text-center help-block">
                        <a href="forgot-password.html"><small>Forgot password?</small></a>

                    </div>

                </form>
                <div class="text-center copyright-txt">
                    <small>eHEALTH - Copyright © <?php echo date('Y'); ?></small>
                </div>
            </div>
        </div>

        <!-- inject:js -->
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="bower_components/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
        <script src="bower_components/autosize/dist/autosize.min.js"></script>
        <!-- endinject -->

        <!-- Common Script   -->
        <script src="dist/js/main.js"></script>

    </body>
</html>
