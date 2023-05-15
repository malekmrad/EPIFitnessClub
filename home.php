<?php
session_start();
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Acceuil</title>
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
		  <a class="nav-link active" href="home.php">Acceuil</a>
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
				<li><a class="nav-link active " href="#">Welcome, <?php echo $username; ?></a></li>
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
		<div class="MM">
			<img src="images/groupfit.jpg" alt="groupfit">
		</div>
		<main>
		
		<div class="MM">
		
			<p>Bienvenue au club Fitness EPI. Notre mission est d'aider nos clients à atteindre leurs objectifs de fitness et de nutrition..</p>
			
			<p>Si vous avez du mal à retrouver la santé et que vous avez besoin de motivation et de ressources pour adopter un mode de vie sain, contactez-nous dès aujourd'hui. Notre établissement comprend un équipement à la fine pointe de la technologie, des cours de formation de groupe pratiques, ainsi que des conseils et des informations sur la nutrition pour vous garder en bonne santé..</p>
			
			<p>Nous offrons un abonnement GRATUIT d'une semaine afin que vous puissiez profiter des avantages de notre équipement et de nos installations. Cet essai d'une semaine vous donne un accès complet à notre équipement, à nos cours d'entraînement et à notre planification nutritionnelle. Contactez-nous dès aujourd'hui pour commencer votre essai gratuit !<span class="action">commencer votre essai gratuit!</span></p>
			<h3>Abonnement de quatre semaines GRATUIT !</h3>
			<p>Appelez-nous aujourd'hui pour commencer</p>
			<p class="tel"><a href="tel:73654111">Numéro: 73 296 060 - 53 975 455</a></p>
			<h4>Horaires:</h4>
			<ul class="heures">
				<li>Lun-Jeu: 6:00-18:00</li>
				<li>Vendredi: 6:00-16:00</li>
				<li>Samedi: 8:00am-18:00</li>
				<li>Dimanche: Fermé</li>
			</ul>
		</div>
		</main>
	</div>
</body>
</html>