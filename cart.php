<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com
*/
session_start();

if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["code"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'>
		Vous avez effacé un produit!</div>";
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; 
    }
}
  	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Panier</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/nav.css">
	<link rel="shortcut icon" href="images/epiptit.jpg">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .product-container {
        display: inline-block;
        width: 400px;
        margin-right: 20px;
    }
</style>
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
        <a class="nav-link active" href="cart.php">Panier <span><?php echo $cart_count; ?> </span><img src="iconcart.png" /></a>
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

</body>
</html>



<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	
<table class="table">
<tbody>
<tr>
<td></td>
<td>Nom de Produit</td>
<td>Quantité</td>
<td>Prix Unitaire</td>
<td>Total des produits</td>
</tr>	
<?php		
$product_names = array();
foreach ($_SESSION["shopping_cart"] as $product){
	$product_names[] = $product["name"];
	$nom = implode(", ", $product_names);
?>
<tr>
<td><img src='images/<?php echo $product["image"]; ?>' width="50" height="40" /></td>
<td><?php echo $product["name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Effacer le produit</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onchange="this.form.submit()">
<option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
<option <?php if($product["quantity"]==6) echo "selected";?> value="6">6</option>
<option <?php if($product["quantity"]==7) echo "selected";?> value="7">7</option>
<option <?php if($product["quantity"]==8) echo "selected";?> value="5">8</option>
</select>
</form>
</td>
<td><?php echo "".$product["price"]." TND"; ?></td>
<td><?php echo "".$product["price"]*$product["quantity"] ." TND"; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);

}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "".$total_price." TND"; ?></strong>
</td>
</tr>
</tbody>
</table>

<form method='post' action='payer.php'>
    <input type='hidden' name='prixtt' value="<?php echo $total_price; ?>" />
    <?php foreach ($_SESSION["shopping_cart"] as $product) { ?>
        <input type='hidden' name='quantity[]' value="<?php echo $product["quantity"]; ?>" />
        <input type='hidden' name='nom[]' value="<?php echo $product["name"]; ?>" />
    <?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <?php echo "<button type='submit' class='btn btn-secondary'> Acheter </button>"; ?>
            </div>
        </div>
    </div>
</form>

</div>
  </div>
</div>	
  <?php
}else{
	echo "<h3>Votre Panier est Vide!!</h3>";
	}
?>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
</div>
</body>
</html>