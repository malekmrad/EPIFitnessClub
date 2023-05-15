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
$uName=$_POST["uName"];



//  echo("Les infos $Nom $email $psw");
$T1="INSERT INTO signup (prenom, nom, email, username) VALUES ('$fName','$lName','$email','$uName') ";
if($conn->query($T1)){
    header("Location: email_verification.php?fName=".$fName."&email=".$email);


exit();

}
else {
    echo("ERREUR");
}

?>
