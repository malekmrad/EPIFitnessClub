<?php
session_start();
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
$servername='localhost';
    $user='root';
    $password='';
    $dbname = "efc";
    $conn=mysqli_connect($servername,$user,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }

        $status="";
        if (isset($_POST['code']) && $_POST['code']!=""){
        $code = $_POST['code'];
        $result = mysqli_query($conn,"SELECT * FROM `produits` WHERE `code`='$code'");
        $row = mysqli_fetch_assoc($result);
        $name = $row['nom_produit'];
        $code = $row['code'];
        $price = $row['prix_uni'];
        $image = $row['taswira'];
        
        $cartArray = array(
          $code=>array(
          'name'=>$name,
          'code'=>$code,
          'price'=>$price,
          'quantity'=>1,
          'image'=>$image)
        );
        
        if(empty($_SESSION["shopping_cart"])) {
          $_SESSION["shopping_cart"] = $cartArray;
          $status = "<div class='box'>Product is added to your cart!</div>";
        }else{
          $array_keys = array_keys($_SESSION["shopping_cart"]);
          if(in_array($code,$array_keys)) {
            $status = "<div class='box' style='color:red;'>
            Product is already added to your cart!</div>";	
          } else {
          $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
          $status = "<div class='box'>Product is added to your cart!</div>";
          }
        
          }
        }        
?>

<!DOCTYPE html>
<html>
<head>
	<title>Boutique</title>
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
			<a class="nav-link active " href="boutique.php">Boutique</a>
		</li>
				<li><a class="nav-link" href="logout.php">Logout</a></li>
				<li><a class="nav-link active" href="#">Welcome, <?php echo $username; ?></a></li>
        <?php
if(!empty($_SESSION["shopping_cart"])) {
    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<li class="nav-item">
    <div class="cart_div">
        <a class="nav-link" href="cart.php">Panier <span><?php echo $cart_count; ?> </span><img src="iconcart.png" /></a>
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


<?php


$result = mysqli_query($conn,"SELECT * FROM `produits`");
while($row = mysqli_fetch_assoc($result)){
    echo "<div class='product-container'>";
    echo "<div class='card' style='width:400px'>";
    echo "<div class='image'><img src='images/".$row['taswira']."' /></div>";
    echo "<div class='card-body'>";
    echo"  <form method='post' action=''>";
    echo"  <input type='hidden' name='code' value=".$row['code']." />";
              
    echo"  <h4 class='card-title'>".$row['nom_produit']."</h4>";
    echo"  <p class='card-text'>".$row['wasef']."</p>";
    echo"  <h6>TND ".$row['prix_uni']."<h6>";
    echo"  <button type='submit' class='buy'>Ajouter au panier</button>";
    echo"  </div> <!-- Add this closing div tag -->";
    echo"  </form>";
    echo"  </div>";
    echo"</div>";
}
?>

