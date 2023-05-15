<?php
session_start();
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/nav.css">
	<link rel="stylesheet" href="css/formulaire.css">
	<link rel="shortcut icon" href="images/epiptit.jpg">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<script
  src="https://js.hcaptcha.com/1/api.js?hl=es&onload=myFunction&render=explicit"
  async
  defer
></script>
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
				<?php else: ?>
                <li><a class="nav-link active" href="login.php">Login</a></li>
            <?php endif; ?>
	  </ul>
  </div>
</nav></div>
		<main>
		
		<div id="form">
		
			<h2>Connexion</h2>
		
		<form class="form-grid" method="post" action="auth.php">
		
			<fieldset>
				<legend>Remplissez les champs</legend>
				<label for="uName">Username:</label>
				<input type="uName" name="uName" id="uName" required>
				<br></br>
				<label for="password">Mot de passe:</label>
				<input type="password" id="password" name="password" required>
			</fieldset>
			<div class="h-captcha" data-sitekey="c1729eeb-b0d3-49c8-af4d-b9c74427dc53" data-theme="dark"></div>
			<input type="submit" id="submit" value="Se connecter" class="btn">
			<p>Nouvel utilisateur ? <a href="creecompte.php"> S'inscrire.</a></p>
			<p><a href="resetpass/forget-password.php"> Oublier mot de passe ? </a></p>
		</main>
	
	</div>
	
</body>
</html>