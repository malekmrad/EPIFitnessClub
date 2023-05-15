<?php
session_start();
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Nutrition</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/nav.css">
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
			<a class="nav-link active" href="nutrition.php">informations nutritionnelle</a>
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
</div>
		<div id="hero" class="MM">
			<img src="images/hero-veggies.jpg" alt="légumes">
		</div>
		<div class="d-grid">
			<a href="calculbmi.php" class="btn btn-danger">Cliquer ici pour Calculer votre indice de masse corporelle</a>
		</div>
		<div class="container">
		<div class="row">
			<div class="col-sm">
		<div class="card" style="width:400px">
			<article>
				<h3>Nourriture pour la pensée</h3>
				<img src="images/food-thought.jpg" alt="food" class="round">
				<p>Une bonne nutrition est un mode de vie, pas un régime. Cela commence par une nouvelle façon de penser à la nourriture. Considérez votre corps comme un véhicule qui utilise la nourriture comme carburant. Remplissez votre réservoir avec le bon type de carburant.</p>
				<p>N'abordez pas votre plan nutritionnel comme un régime alimentaire, mais plutôt comme un changement de mode de vie. Si vous faites un changement permanent, vous verrez de grands résultats. La clé du succès est une concentration quotidienne sur votre objectif.</p> 
				<p>Portionnez vos repas et suivez vos calories. De nombreuses applications mobiles gratuites sont disponibles pour vous aider à suivre votre niveau d'activité et vos calories.</p>
				<p>Contrôlez les envies impulsives d'acheter de la malbouffe et autorisez-vous plutôt un repas de "triche" par semaine.</p>
			</article>
		</div>
			</div>
			<div class="col-sm">
			<div class="card" style="width:400px">
				<article>
					<h3>Ce qu'il faut manger ?</h3>
					<img src="images/fresh-food.jpg" alt="légumes frais, fruits, œufs et noix" class="round">
					<p>Utilisez ce qui suit comme ligne directrice :</p>
					<ul>
						<li>Protéines, comme les œufs, le poulet et la viande rouge maigre</li>
						<li>Légumes, mais évitez le maïs et les pois</li>
						<li>Fruits</li>
						<li>Matières grasses, comme l'huile d'olive, les noix et les graines</li>
						</ul>
					<p>Limitez la consommation de pain, de pâtes, de pommes de terre blanches et d'aliments transformés. Ces aliments sont riches en glucides.</p>
					<p>Lorsque vous faites vos courses, magasinez dans les allées extérieures et achetez des produits biologiques lorsque cela est possible. Faites le plein de légumes frais, de farine d'amande et de graines de lin.</p>
				</article>
				  <a href="login.php" class="btn btn-info"> Découvrez les protéines dans notre boutique.</a>
				</div>
			</div>
				<div class="col-sm">
				<div class="card" style="width:400px">
					<article>
						<h3>Repas de la semaine</h3>
						<img src="images/food-chicken.jpg" alt="poulet rôti aux herbes" class="round">
						<h4>Poulet rôti aux fines herbes</h4>
						<h4>Ingrédients:</h4>
						<ul>
							<li>poitrine de poulet désossée et sans peau (BIO de préférence)</li>
							<li>1 cuillère d'herbes de Provence</li>
							<li>1 cuillère de jus de citron</li>
							<li>1 cuillère d'huile d'olive</li>
							<li>1 cuillère de sel</li>
							<li>&frac14; cuillère poivre</li>
						</ul>
						<h4>Instructions:</h4>
						<p>Mélanger tous les ingrédients dans un sac en plastique et laisser mariner pendant au moins une heure. Préchauffez le four à 350 degrés. Cuire le poulet au four pendant 30 à 35 minutes ou jusqu'à ce que le jus soit clair. Faire griller à feu vif pendant deux minutes ou jusqu'à ce qu'ils soient dorés. Servir avec une petite salade fraîche.</p>
					</article>
					</div>
				</div>
				</div>
				</div>
		
		</main>
	
	</div>
	
</body>
</html>