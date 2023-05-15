<?php
session_start();
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
include 'resetpass/db.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Paiement</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/nav.css">
	<link rel="stylesheet" href="css/formulaire.css">
	<link rel="shortcut icon" href="images/epiptit.jpg">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<div id="container">
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  	<div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="images/epips.png" alt="epi logo" style="width: 200px;" class="rounded-pill"> 
    </a>
	<ul class="navbar-nav">
  
		<li class="nav-item">
		  <a class="nav-link" href="home.php">Acceuil</a>
		</li>
	   <li class="nav-item">
		  <a class="nav-link " href="about.php">à propos de nous</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link" href="cours.php">Cours</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="nutrition.php">informations nutritionnelle</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="contacteznous.php">Contactez-nous</a>
		</li>
		
			
		<?php if(isset($username)): ?>
                
				<?php if($username == "admin"): ?>
    <li><a class="nav-link " href="dashboard.php">Dashboard admin</a></li>
  <?php endif; ?>
  <li class="nav-item">
			<a class="nav-link " href="boutique.php">Boutique</a>
		</li>
				<li><a class="nav-link" href="logout.php">Logout</a></li>
				<li><a class="nav-link active" href="#">Welcome, <?php echo $username; ?></a></li>
				<?php
if(!empty($_SESSION["shopping_cart"])) {
    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<li class="nav-item">
    <div class="cart_div">
        <a class="nav-link " href="cart.php">Panier <span><?php echo $cart_count; ?> </span><img src="iconcart.png" /></a>
    </div>
</li>
<?php } ?>
				<?php else: ?>
                <li><a class="nav-link" href="login.php">Login</a></li>
            <?php endif; ?>
	  </ul>
  </div>
</nav>
		<main>
		<?php
		
		if(isset($_POST['nom']) && isset($_POST['prixtt']) && isset($_POST['quantity'])) {
			$noms = $_POST['nom'];
			$prixtt = $_POST['prixtt'];
			$quantities = $_POST['quantity'];
		
			// Loop through the quantities and names
			
		
			// Perform other actions based on the received data
			// ...
		
		
		

    // Perform other actions based on the received data
    // ...

		
		
		?>
		<div id="form">
		<h2> Votre paiement contient: </h2>

		<?php 
		for($i = 0; $i < count($quantities); $i++) {
			$quantity = $quantities[$i];
			$nom = $noms[$i];
	
			// Perform actions using each quantity and name
			// For example, you can insert them into a database or perform calculations
			// Here, we are just printing them as an example
			echo "<h6>Produit: " . $nom . " | Quantité: " . $quantity . "</h6> <br>";
		}
		?>
			
			<?php
			echo "<h2>Transaction en cours.. Votre prix total est ".$prixtt." </h2>"; 
			
			?>
		<?php 
		}
		?>
		
		<form class="form-grid" method='post' action='pay.php'>
		<?php
    // Loop through the quantities and product names
    for ($i = 0; $i < count($quantities); $i++) {
        $quantity = $quantities[$i];
        $nom = $noms[$i];
        ?>
        <input type="hidden" name="quantity[]" value="<?php echo $quantity; ?>" />
        <input type="hidden" name="nom[]" value="<?php echo $nom; ?>" />
    <?php
    }
    ?>
            <fieldset>
                <legend>Votre identité</legend>
            
                <label for="fName">Prénom:</label>
				<input type="text" name="fName" id="fName" required>
			
				<label for="fName">Nom:</label>
				<input type="text" name="lName" id="lName" required>
				<br></br>
              </fieldset>
            
              <fieldset>
                <legend>Adresse de livraison</legend>
                <label for="Adresse ">Adresse :</label>
				<input type="text" name="adresse" id="Adresse " required>
				<br></br>
				<label for="Code postal">Code postal:</label>
				<input type="text" name="Code_postal" id="Code_postal" required>
				<br></br>
                <label for="Pays">Pays:</label>
				<input type="text" name="Pays" id="Pays" required>
                </fieldset>
              <fieldset>
                <legend>Informations Carte Bancaire</legend>
               
                    <fieldset>
                      <legend>Type de carte bancaire</legend>
                      
                          <input id=visa name=type_de_carte type=radio>
                          <label for=visa>VISA</label>
                      
                    
                        
                          <input id=mastercard name=type_de_carte type=radio>
                          <label for=mastercard>Mastercard</label>
                       
                     
                    </fieldset>
                  
					<label for="numc">Numéro de la carte:</label>
					<input type="text" name="numc" id="numc" required>
					<br></br>
					<label for="cs">Code de sécurité:</label>
					<input type="text" name="cs" id="cs" required>
					<br></br>
					<label for="nomp">Nom de porteur de la carte:</label>
					<input type="text" name="nomp" id="nomp" required>
					<br></br>
					<input type="hidden" name="prixtt" value="<?php echo $prixtt; ?>">
					
        
              </fieldset>
            
              <fieldset>
			  <input type="submit" id="submit" value="J'achete" onclick="myFunction()" class="btn">
              </fieldset>
            </form>
		</main>
	</div>
	
</body>
</html>
<script>
function myFunction() {
  document.getElementById("achat").innerHTML = "Félicitation ";
}
</script>