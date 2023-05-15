<?php
// Start the session and check if the user is logged in
session_start();
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

include "resetpass/db.php";

// $id_produit = $_GET['id'];
// var_dump($id_produit);
?>

<!DOCTYPE html>
<html>
<head>
<title>Modifier un article</title>
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
  <?php if(isset($username)): ?>
                
     
		<li class="nav-item">
		  <a class="nav-link" href="home.php">Acceuil</a>
		</li>
	   <li class="nav-item">
		  <a class="nav-link" href="about.php">à propos de nous</a>
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
		
		
                <li class="nav-item">
			<a class="nav-link " href="boutique.php">Boutique</a>
		</li>
    <?php if($username == "admin"): ?>
    <li><a class="nav-link active" href="dashboard.php">Dashboard ADMIN</a></li>
  <?php endif; ?>
  <?php if($username == "root"):
         $username = "admin"?>
    <li><a class="nav-link " href="dashboard.php">Dashboard ADMIN</a></li>
  <?php endif; ?>
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

    <?php if (isset($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <div id="form">
		
        <h2>Modifier un article</h2>
    
    <form class="form-grid" method="POST" action="modify.php">
    
        <fieldset>
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <label for="nom_produit">Nom Produit:</label><br>
        <input type="text" id="nom_produit" name="nom_produit"><br>
        <label for="wasef">Description:</label><br>
        <textarea id="wasef" name="wasef"></textarea><br>
        <label for="prix_uni">Prix:</label><br>
        <input type="prix_uni" id="prix_uni" name="prix_uni"><br>
        <label for="qte">Quantité:</label><br>
        <input type="number" id="qte" name="qte"><br>
        <input type="submit" value="Modifier">
          </fieldset>
   
</body>
</html>
