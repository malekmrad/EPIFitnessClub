<?php
// Start the session and check if the user is logged in
session_start();
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

include "resetpass/db.php";

// $id_produit = $_GET['id'];
// var_dump($id_produit);
if (isset($_POST['nom_produit']) && isset($_POST['wasef']) && isset($_POST['prix_uni']) && isset($_POST['qte'])) {
    $id_produit = $_POST['id'];
  $nom_produit = $_POST['nom_produit'];
  $wasef = $_POST['wasef'];
  $prix_uni = $_POST['prix_uni'];
  $qte = $_POST['qte'];
  
  $sql = "UPDATE produits SET nom_produit='$nom_produit', wasef='$wasef', prix_uni='$prix_uni', qte='$qte' WHERE id_produit='$id_produit'";
  if (mysqli_query($conn, $sql)) {
      $message = "Article modifié avec succès!";
      header('Refresh: 2; dashboard.php');
      echo  $message;
  } else {
      $message = "Erreur lors de la modification de l'article: " . mysqli_error($conn);
  }
}
?>