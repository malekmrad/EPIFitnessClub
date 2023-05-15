<?php
session_start();
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
if(isset($_SESSION['username']) && $_SESSION['username'] == "admin") {
    $ajouterBtn = "<button align='center'> <a href='articleadd.php'>Ajouter</a> </button>";
} else {
    $ajouterBtn = "";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>EPI Fitness CLub Boutique</title>
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
		  <a class="nav-link" href="about.php">à propos de nous</a>
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
    <li><a class="nav-link" href="articleadd.php">Ajouter un Article</a></li>
  <?php endif; ?>
                <li class="nav-item">
			<a class="nav-link active" href="boutique.php">Boutique</a>
		</li>
    
				<li><a class="nav-link" href="logout.php">Logout</a></li>
        <li><a class="nav-link active" href="#">Welcome, <?php echo $username; ?></a></li>
				<?php else: ?>
                <li><a class="nav-link" href="login.php">Login</a></li>
            <?php endif; ?>
	  </ul>
  </div>
</nav>
<?php 
    include "resetpass/db.php";
        if(isset($_GET['id'])&& isset($_GET['action']) && !empty($_GET['action']) && !empty($_GET['id'])){
            $id=$_GET['id'];
            if($_GET['action']=='supprimer'){
                $req2="DELETE FROM produit WHERE id=$id";
                if($conn->query($req2)===true){
                    
                    echo "<script> alert('Suppression reussi !!!'); </script> ";
                    
                }
                else { 
                    echo "<script> alert('Echec de la suppression'); </script> ";
                }

            }

            if($_GET['action']=='modifier'){
                header('location: articlemodif.php?id='.$_GET['id']);
            }
            
        }

        $req="SELECT * FROM produits ORDER BY id_produit ASC ";
        $res=$conn->query($req);
        if($res->num_rows > 0){
            echo " <br> <br> ".$ajouterBtn;
            echo "<table border='1' align='center' style= 'width: 70%; '> <tr align='center'>  <td>Designation</td> <td>Prix</td> <td>Image</td>   </tr> ";
            while($row= $res->fetch_assoc()){
                $action1='supprimer';
                $action2='modifier';
                $lien= "images/".$row['taswira'];
                echo "<br>";
                echo "<tr align='center'> <td>".$row['wasef']."</td> <td>".$row['prix_uni']."</td>
                <td><img src='$lien' alt='Image' style= 'height: 100px; width: 100px;' ></td> "; 
                echo "<td> <a href=\"?id=".$row['id_produit']."&action=".$action1."\" onclick=\"return confirm('Voullez-vous vraiment supprimer?')\" >Supprimer </a> </td>
                <td><a href=\"?id=".$row['id_produit']."&action=".$action2."\" onclick=\"return confirm('Voullez-vous vraiment modifier?')\" >Modifier </a></td> </tr> ";
                
            }
            echo "</table>";
            
        }
        else{echo "Error"; }
        $conn->close();

        ?>