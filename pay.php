<?php
session_start();
include 'resetpass/db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prixtt = $_POST['prixtt'];
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $adresse = $_POST['adresse'];
    $Code_postal = $_POST['Code_postal'];
    $Pays = $_POST['Pays'];
    $type_de_carte = $_POST['type_de_carte'];
    $numc = $_POST['numc'];
    $nomp = $_POST['nomp'];
    $quantities = $_POST['quantity'];
    $noms = $_POST['nom'];

    // Insert command into the commandes table
    $T1 = "INSERT INTO commandes (prixtt, fName, lName, adresse, Code_postal, type_de_carte, numc, nomp) VALUES ('$prixtt','$fName','$lName','$adresse','$Code_postal','$type_de_carte','$numc','$nomp')";
    if ($conn->query($T1)) {
        $message = "Merci beaucoup !";
        echo $message;
    } else {
        echo("ERREUR");
    }
	$productIDs = array();
    foreach ($noms as $nom) {
        $sql = "SELECT id_produit FROM produits WHERE nom_produit = '$nom'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $productIDs[] = $row['id_produit'];
        }
    }

    // Insert the movements into the mvmnt_stock table
    $stmt = $conn->prepare("INSERT INTO mvmnt_stock (id_produit, qte, date_mvmnt) VALUES (?, ?, NOW())");
    $stmt->bind_param("ii", $id_produit, $quantity);

    // Loop through the quantities and product IDs
    for ($i = 0; $i < count($quantities); $i++) {
        $quantity = $quantities[$i];
        $id_produit = $productIDs[$i];

        // Insert the movement into the mvmnt_stock table
        $stmt->execute();
    }

    // Close the statement
    $stmt->close();
    // Update the quantities in the produits table
    foreach ($noms as $index => $nom) {
        $quantityBought = $quantities[$index];

        // Fetch the current quantity from the produits table
        $fetchStmt = $conn->prepare("SELECT qte FROM produits WHERE nom_produit = ?");
        $fetchStmt->bind_param("s", $nom);
        $fetchStmt->execute();
        $fetchStmt->bind_result($currentQuantity);
        $fetchStmt->fetch();
        $fetchStmt->close();

        // Calculate the new quantity
        $newQuantity = $currentQuantity - $quantityBought;

        // Update the quantity in the produits table
        $updateStmt = $conn->prepare("UPDATE produits SET qte = ? WHERE nom_produit = ?");
        $updateStmt->bind_param("is", $newQuantity, $nom);
        $updateStmt->execute();
        $updateStmt->close();
    }
	unset($_SESSION['shopping_cart']);

	header('Location: boutique.php');
    // Perform other actions or redirects
    // ...
	exit();
}

?>
