<?php
session_start();
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
include '../resetpass/db.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard ADMIN</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/styles.css">
	<link rel="stylesheet" href="../css/nav.css">
	<link rel="stylesheet" href="../css/formulaire.css">
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
		  <a class="nav-link " href="../about.php">à propos de nous</a>
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
		
				<li class="nav-item">
			<a class="nav-link " href="../boutique.php">Boutique</a>
		</li>
		<?php if(isset($username)): ?>
                
				<?php if($username == "admin"): ?>
    <li><a class="nav-link " href="../dashboard.php">Dashboard admin</a></li>
  <?php endif; ?>
  <?php if($username == "root"):
         $username = "admin"?>
    <li><a class="nav-link " href="../dashboard.php">Dashboard ADMIN</a></li>
  <?php endif; ?>
				<li><a class="nav-link" href="../logout.php">Logout</a></li>
				<li><a class="nav-link active" href="#">Welcome, <?php echo $username; ?></a></li>
				<?php else: ?>
                <li><a class="nav-link" href="../login.php">Login</a></li>
            <?php endif; ?>
	  </ul>
  </div>
</nav>

    <?php if (isset($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <div id="form">
		
        <h2>Ajouter un article</h2>
    
    <form class="form-grid" method="POST" action="fourn.php">
    
        <fieldset>
        <label for="nom_fourn">Nom fournisseur:</label><br>
        <input type="text" id="nom_fourn" name="nom_fourn"><br>

        <label for="addresse">addresse:</label><br>
        <textarea id="addresse" name="addresse"></textarea><br>

        <label for="email">email:</label><br>
        <input type="email" id="email" name="email"><br>

        <label for="phone">phone:</label><br>
        <input type="phone" id="phone" name="phone"><br>
        <br>
        <input type="submit" value="Ajouter">
          </fieldset>
    
</body>
</html>

