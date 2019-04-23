<?php
 $servername ="localhost";
 $dbname ="ehealth";
 $username ="root";
 $password ="";

 date_default_timezone_set('Africa/Nairobi');
 try{

 $conn= new PDO("mysql:host={$servername};dbname={$dbname}",$username,$password);
 $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

 }
 catch(PDOExeption $e){
     echo "Error in connection".$e->getMessage();
 }



?>