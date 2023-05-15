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
$nom_fourn=$_POST["nom_fourn"];
$addresse=$_POST["addresse"];
$email=$_POST["email"];
$phone=$_POST["phone"];

//  echo("Les infos $Nom $email $psw");
$ajt="INSERT INTO fournisseurs (nom_fourn, addresse, email, phone) VALUES ('$nom_fourn','$addresse','$email','$phone') ";
if($conn->query($ajt)){
    echo "ajout done";
    header('Refresh: 2; ../dashboard.php');
exit();

}
else {
    echo("ERREUR");
}

?>