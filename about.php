<?php
session_start();
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>à propos</title>
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
		  <a class="nav-link active" href="about.php">à propos de nous</a>
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
			<a class="nav-link  " href="boutique.php">Boutique</a>
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
		<div id="hero">
			<img src="images/fitabout.jpg" alt="grpsport">
		</div>
		<main>
				<div class="container">
					<div class="row">
						<div class="col-sm">
			<article>
				<h3>Musculation</h3>
				<img src="images/weight.jpg" alt="masse" class="cours">
				<p><p>Notre installation comprend une zone de musculation avec plusieurs options de poids. Développez des muscles maigres avec des poids et améliorez votre tronc avec la musculation.</p>
				<ul>
					<li>Haltères</li>
					<li>Cloches de bouilloire</li>
					<li>Barres</li>
				</ul>	
			</article>
						</div>
						<div class="col-sm">
			<article>
				<h3>Cardio</h3>
				<img src="images/cardio.jpg" alt="cardio" class="cours">
				<p>Brûlez les graisses grâce à des entraînements cardio. Les experts recommandent 150 minutes de cardio chaque semaine. Nous avons plusieurs choix d'équipements pour votre entraînement</p>
				<ul>
					<li>Tapis de course</li>
					<li>Machines elliptiques</li>
					<li>Exercises Vélos</li>
				</ul>
			</article>
						</div>
						<div class="col-sm">
			<article>
				<h3>Formation personnelle</h3>
				<img src="images/trainer.webp" alt="trainer" class="cours">
				<p>Nos entraîneurs personnels certifiés travaillent avec vous pour vous aider à atteindre vos objectifs de mise en forme et à suivre vos progrès. La formation personnelle a de nombreux avantages.</p>
			<ul>
				<li>Responsabilité</li>
				<li>Programme personnalisé</li>
				<li>Soutien et motivation constants</li>
			</ul>
			
			</article>
						</div>
					</div>
				</div>
		
		
		</main>

	
	</div>
	
	
</body>
</html>