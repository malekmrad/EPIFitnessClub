<?php
session_start();
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Contactez nous</title>
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
			<a class="nav-link active" href="contacteznous.php">Contactez-nous</a>
		</li>
		
				
		<?php if(isset($username)): ?>
                
				<?php if($username == "admin"): ?>
    <li><a class="nav-link " href="dashboard.php">Dashboard admin</a></li>
  <?php endif; ?>
  <li class="nav-item">
			<a class="nav-link " href="boutique.php">Boutique</a>
		</li>
				<li><a class="nav-link" href="logout.php">Logout</a></li>
				<li><a class="nav-link " href="#">Welcome, <?php echo $username; ?></a></li>
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
			<img src="images/contacteznous.jpg" alt="contacteznous" width=100%>
		</div>
		<main>
		
		<div id="contact">
		
			<h2>Prêt à commencer? Contactez-nous aujourd'hui.</h2>
			<h4 class="tel-num">Numéro: 73 296 060 - 53 975 455</h4>
			<h4>Email : <a href="mailto:epifitnessclub@episousse.com.tn" class="contact-email">epifitnessclub@episousse.com.tn</a></h4>
			<h4>Rendez-nous visite à : Route de Ceinture, Sahloul Sousse 4021.</h4>
			<iframe width="683" height="504" src="https://maps.google.com/maps?q=Route%20de%20Ceinture,%20Sahloul%20Sousse%204021.&t=&z=13&ie=UTF8&iwloc=&output=embed" ></iframe>
		</div>
		
		<div id="form">
		
			<h2>Remplissez le formulaire ci-dessous pour commencer votre essai gratuit.</h2>
		
		<form class="form-grid" method="post" action="cntc.php">
		
			<fieldset>
				<legend>Informations client</legend>
				<label for="fName">Prénom:</label>
				<input type="text" name="fName" id="fName" required >
				<br></br>
				<label for="fName">Nom:</label>
				<input type="text" name="lName" id="lName" required>
				<br></br>
				<label for="email">Email:</label>
				<input type="email" name="email" id="email" required>
				<br></br>
				<label for="phone">TEL:</label>
				<input type="tel" id="phone" name="phone" required>
			</fieldset>
			
			<fieldset>
				<legend>Informations Complémentaires</legend>
				<p>Je voudrais plus d'informations sur:</p>
				
				<label for="grpfit"><input type="checkbox" name="interest" id="grpfit" value="Group Fitness">Musculation</label>
				
				<label for="prtrain"><input type="checkbox" name="interest" id="prtrain" value="Personal Training">Cardio</label>
				
				<label for="nutr"><input type="checkbox" name="interest" id="nutr" value="Nutrition">Formation personnelle</label>
			</fieldset>
			
			<fieldset>
				<legend>Source de référence</legend>
				<label for="reference">Comment nous avez-vous trouvé?</label>
				<select name="reference" id="reference">
					<option value="ad">Publicité</option>
					<option value="friend">Ami</option>
					<option value="google">Google</option>
					<option value="social">Média Sociaux</option>
					<option value="other">Autres</option>
				</select>
				<br></br>
				<label for="questions">Questions?</label>
				<br></br>
				<textarea id="questions" name="questions" rows="5" cols="35"></textarea>
				
		
			</fieldset>
			
			<input type="submit" id="submit" value="Envoyer" class="btn">
			
		</main>

	
	</div>
	
</body>
</html>