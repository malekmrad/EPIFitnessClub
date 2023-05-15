<?php
$serveurname='localhost';
$username='root';
$password='';
$dbname='efc';

$conn= new mysqli($serveurname, $username, $password, $dbname);
// if($conn->connect_error){
//     echo("error");
// }
// else{
//     echo("connexion etablie avec succes");
// }
$fName=$_POST["fName"];
$lName=$_POST["lName"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$interest=$_POST["interest"];
$reference=$_POST["reference"];
$questions=$_POST["questions"];

//  echo("Les infos $Nom $email $psw");
$T1="INSERT INTO contact (nom, prenom, email, tel, interet, ref, qst) VALUES ('$fName','$lName','$email','$phone','$interest','$reference','$questions') ";
if($conn->query($T1)){
    header("Location: contacteznous.html");
exit();

}
else {
    echo("ERREUR");
}

?>