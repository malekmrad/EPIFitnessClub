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
<div class="card-body">
<?php
if($_GET['key'] && $_GET['token'])
{
include "db.php";
$email = $_GET['key'];
$token = $_GET['token'];
$query = mysqli_query($conn,
"SELECT * FROM `signup` WHERE `reset_link_token`='".$token."' and `email`='".$email."';"
);
$curDate = date("Y-m-d H:i:s");
if (mysqli_num_rows($query) > 0) {
$row= mysqli_fetch_array($query);
if($row['exp_date'] >= $curDate){ ?>
<form action="update-forget-password.php" method="post">
<input type="hidden" name="email" value="<?php echo $email;?>">
<input type="hidden" name="reset_link_token" value="<?php echo $token;?>">
<div class="form-group">
<label for="exampleInputEmail1">Password</label>
<input type="password" name='password' class="form-control">
</div>                
<div class="form-group">
<label for="exampleInputEmail1">Confirm Password</label>
<input type="password" name='cpassword' class="form-control">
</div>
<input type="submit" name="new-password" class="btn btn-primary">
</form>
<?php } } else{
echo" This forget password link has been expired ";
}
}
?>
</div>
</div>
</div>
</body>
</html>