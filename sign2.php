<?php
include "resetpass/db.php";
$fName=$_POST['fName'];
$psw=$_POST['psw'];
$result = mysqli_query($conn,"SELECT * FROM signup WHERE prenom='" . $fName . "'");
 
$row= mysqli_fetch_array($result);
if($row)
  {
$update = mysqli_query($conn,"UPDATE signup set  psw='" . $psw . "' WHERE prenom='" . $fName . "'");
  }
?>