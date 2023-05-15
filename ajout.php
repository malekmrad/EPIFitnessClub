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
$nom_produit=$_POST["nom_produit"];
$wasef=$_POST["wasef"];
$prix_uni=$_POST["prix_uni"];
$qte=$_POST["qte"];
$taswira=$_POST["taswira"];
$code=$_POST["code"];


//  echo("Les infos $Nom $email $psw");
$ajt="INSERT INTO produits (nom_produit, wasef, prix_uni, code, qte, taswira) VALUES ('$nom_produit','$wasef','$prix_uni','$code','$qte','$taswira') ";
if($conn->query($ajt)){
    echo "ajout done";
    header('Refresh: 2; dashboard.php');
exit();

}
else {
    echo("ERREUR");
}

?>