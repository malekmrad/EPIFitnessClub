<?php
session_start();
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
include 'resetpass/db.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard ADMIN</title>
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
	<li><a class="nav-link active" href="dashboard.php">Dashboard ADMIN</a></li>
	<li class="nav-item">
			<a class="nav-link " href="boutique.php">Boutique</a>
		</li>
  
  <?php endif; ?>
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
<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<style>
		.grid-container {
		  display: grid;
		  grid-template-columns: auto auto auto;
		  padding: 10px;
		  font-family: Arial, Helvetica, sans-serif;
		}
		.grid-item {
		  background-color: #f1f1f1;
		  border: 1px solid #ccc;
		  padding: 20px;
		  text-align: center;
		  font-size: 18px;
		}
		table {
		  border-collapse: collapse;
		  width: 100%;
		  margin-top: 20px;
		}
		th, td {
		  padding: 8px;
		  text-align: left;
		  border-bottom: 1px solid #ddd;
		}
		th {
		  background-color: #4CAF50;
		  color: white;
		}
	</style>
</head>
<body>
	<div class="grid-container">
    
	  <div class="grid-item">
      <div class="d-grid">
			<a href="admin/addfourn.php" class="btn btn-danger">Cliquer ici pour ajouter un fournisseur</a>
		</div>
	    <h2>Liste des fournisseurs</h2>
	    <table>
	      <tr>
	        <th>Nom</th>
	        <th>Adresse</th>
	        <th>Email</th>
            <th>Télephone</th>
	      </tr>
	      <?php
	        // Retrieve supplier list from database
	        $sql = "SELECT * FROM fournisseurs";
	        $result = $conn->query($sql);
	        while ($row = $result->fetch_assoc()) {
	          echo "<tr><td>".$row["nom_fourn"]."</td><td>".$row["addresse"]."</td><td>".$row["email"]."</td><td>".$row["phone"]."</td></tr>";
	        }
	      ?>
	    </table>
	  </div>
	  <div class="grid-item">
        
	    <h2>Mouvement stock</h2>
	    <table>
	      <tr>
	        <th>ID_mouvement</th>
	        <th>ID_Produit</th>
	        <th>Quantité</th>
	        <th>Date_mouvement</th>
	      </tr>
	      <?php
	        // Retrieve stock movement list from database
	        $sql = "SELECT * FROM mvmnt_stock";
	        $result = $conn->query($sql);
	        while ($row = $result->fetch_assoc()) {
	          echo "<tr><td>".$row["id_mvmnt"]."</td><td>".$row["id_produit"]."</td><td>".$row["qte"]."</td><td>".$row["date_mvmnt"]."</td></tr>";
	        }
	      ?>
	    </table>
	  </div>
	  <div class="grid-item">
	    <h2>Liste des commandes</h2>
	    <table>
	      <tr>
	        <th>ID_commande</th>
	        <th>Adresse</th>
	        <th>Prix total</th>
	        <th>Nom Client</th>
	      </tr>
	      <?php
	        // Retrieve order list from database
	        $sql = "SELECT * FROM commandes";
	        $result = $conn->query($sql);
	        while ($row = $result->fetch_assoc()) {
	          echo "<tr><td>".$row["id_commande"]."</td><td>".$row["Adresse"]."</td><td>".$row["prixtt"]." TND</td><td>".$row["nomp"]."</td></tr>";
	        }
	      ?>
	    </table>
	  </div>
	</div>
   
</body>

</html>
<div class="d-grid">
			<a href="articleadd.php" class="btn btn-dark">Cliquer ici pour ajouter un article</a>
		</div>
<?php 
    
        if(isset($_GET['id'])&& isset($_GET['action']) && !empty($_GET['action']) && !empty($_GET['id'])){
            $id=$_GET['id'];
            if($_GET['action']=='supprimer'){
                $req2="DELETE FROM produits WHERE id_produit=$id";
                if($conn->query($req2)===true){
                    
                    echo "<script> alert('Suppression reussi !!!'); </script> ";
                    
                }
                else { 
                    echo "<script> alert('Echec de la suppression'); </script> ";
                }

            }

            if($_GET['action']=='modifier'){
                header('location: articlemodif.php?id='.$_GET['id_produit']);
            }
            
        }

        $req="SELECT * FROM produits ORDER BY id_produit ASC ";
        $res=$conn->query($req);
        if($res->num_rows > 0){
             
            echo "<table border='1' align='center' style= 'width: 70%; '> <tr align='center'> <td>ID_produit</td> <td>Designation</td> <td>Prix</td> <td>Quantité</td> <td>Image</td>   </tr> ";
            while($row= $res->fetch_assoc()){
                $action1='supprimer';
                $action2='modifier';
                $lien= "images/".$row['taswira'];
                
                echo "<tr align='center'> <td>".$row['id_produit']."</td> <td>".$row['wasef']."</td> <td>".$row['prix_uni']."</td><td>".$row['qte']."</td>
                <td><img src='$lien' alt='Image' style= 'height: 100px; width: 100px;' ></td> "; 
                echo "<td> <a href=\"?id=".$row['id_produit']."&action=".$action1."\" onclick=\"return confirm('Voullez-vous vraiment supprimer?')\" >Supprimer </a> </td>
                <td><a href=\"articlemodif.php?id=".$row['id_produit']."&action=".$action2."\"  >Modifier </a></td> </tr> ";
            }
            echo "</table>";
		//	header('Location:payer.php');
        
        }
        else{echo "Error"; }
        $conn->close();

        ?>