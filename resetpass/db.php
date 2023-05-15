<?php
    $servername='localhost';
    $user='root';
    $password='';
    $dbname = "efc";
    $conn=mysqli_connect($servername,$user,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>