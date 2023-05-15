<?php
session_start();
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>EPI Fitness Paiement</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/styles.css">
	<link rel="stylesheet" href="../css/formulaire.css">
	<link rel="stylesheet" href="../css/nav.css">
	<link rel="shortcut icon" href="../images/epiptit.jpg">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<div id="container">
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  	<div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="../images/epips.png" alt="epi logo" style="width: 200px;" class="rounded-pill"> 
    </a>
	<ul class="navbar-nav">
		<li class="nav-item">
		  <a class="nav-link" href="../home.php">Acceuil</a>
		</li>
	   <li class="nav-item">
		  <a class="nav-link" href="../about.php">à propos de nous</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link" href="../cours.php">Cours</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="../nutrition.php">informations nutritionnelle</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="../contacteznous.php">Contactez-nous</a>
		</li>
		
		<?php if(isset($username)): ?>
                
				<?php if($username == "admin"): ?>
    <li><a class="nav-link" href="../articleadd.php">Ajouter un Article</a></li>
    <li><a class="nav-link" href="../articlemodif.php">Modifier un Article</a></li>
  <?php endif; ?>
				<li class="nav-item">
			<a class="nav-link " href="../boutique.php">Boutique</a>
		</li>
		
				<li><a class="nav-link" href="../logout.php">Logout</a></li>
				<li><a class="nav-link active" href="#">Welcome, <?php echo $username; ?></a></li>
				<?php else: ?>
                <li><a class="nav-link" href="../login.php">Login</a></li>
            <?php endif; ?>
	  </ul>
  </div>
</nav>
   <body>
            <div class="card-header text-center">
              Oublier mot de passe
            </div>
            <div class="form-grid">
              <form action="../mailsend.php" method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                  <small id="emailHelp" class="form-text text-muted">Vos Donnés sont sécurisé .</small>
                </div>
                <input type="submit" name="password-reset-token" class="btn btn-primary">
              </form>
            </div>
 
   </body>
</html>