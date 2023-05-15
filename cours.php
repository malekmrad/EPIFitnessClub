<?php
session_start();
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>cours</title>
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
		  <a class="nav-link active" href="cours.php">Cours</a>
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
</nav></div>
		
		<div id="hero">
			<img src="images/classes.jpg" alt="classes" width=100%>
		</div>
		
		<main>
		
			<div>
			
				<h3>Cours de conditionnement physique en groupe</h3>
				<p>Cardio: 6:00 à 17:00</p>
				<p>Kickboxing: 8:00 à 19:15</p>
				<p>Yoga: 6:00 à 18:00</p>
				<p>Zumba: 9:00 à 18:00</p>
				
			</div>
			
		<div>
			<div id="flip">Cliquer ici pour voir l'horaire des cours de conditionnement physique en groupe</div>
			<div id="panel">
			<table>
				<tr>
					<th>Classes</th>
					<th>Jours</th>
					<th>Horaires</th>
					<th>Instructeur</th>
					<th>Salle</th>
				</tr>
				<tr>
					<td>Cardio</td>
					<td>Lun, Mer, Ven</td>
					<td>6:00, 18:00</td>
					<td>Skhiri</td>
					<td>B</td>
				</tr>
				
				<tr>
					<td>Kickboxing</td>
					<td>Lun, mer, ven</td>
					<td>8:00, 19:15</td>
					<td>Sghaier</td>
					<td>A</td>
				</tr>
				<tr>
					<td>Yoga</td>
					<td>Mar, Jeu</td>
					<td>6:00, 18:00</td>
					<td>Mrad</td>
					<td>B</td>
				</tr>
				<tr>
					<td>Zumba</td>
					<td>Lun, mer, ven</td>
					<td>7:00, 6:00</td>
					<td>Hosni</td>
					<td>A</td>
				</tr>
			</table>
		</div>
		</div>
		
		</main>
	
	</div>
	
</body>
</html>