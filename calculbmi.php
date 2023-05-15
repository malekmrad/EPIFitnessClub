<!DOCTYPE html>
<html>
<head>
	<title>EPI Fitness Club - Information nutritionnelle </title>
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
			<a class="nav-link active" href="nutrition.php">Retour</a>
		</li>
  </div>
</nav>
		<script type="text/javascript">
          
            function calculerbmi() {
                var taille = Number(document.getElementById("taille").value);
                var masse = Number(document.getElementById("masse").value);
        
                var BMI = Math.round(masse / Math.pow(taille, 2) * 10000);
        

                document.getElementById("output").innerText = Math.round(BMI * 100) / 100;
        
                var output = Math.round(BMI * 100) / 100
                if (output < 18.5)
                    document.getElementById("comment").innerText = "Maigre";
                else if (output >= 18.5 && output <= 25)
                    document.getElementById("comment").innerText = "Normale";
                else if (output >= 25 && output <= 30)
                    document.getElementById("comment").innerText = "Obèse";
                else if (output > 30)
                    document.getElementById("comment").innerText = "En surpoids";

            }
			</script>
			<main>
				<h1>Calculateur d'indice de masse corporelle</h1>
				<div class="input-group mb-3 input-group-lg">
					<span class="input-group-text">Entrer votre taille: </span>
					<input type="text" id="taille"/>
				</div>	
				<div class="input-group mb-3 input-group-lg">
					<span class="input-group-text">Entrer votre masse: </span>
					<input type="text" id="masse"/>
				</div>
				<input type="submit" value="Calculer" onclick="calculerbmi();">
				<h1>Ton indice de masse corpelle est: <span id="output">?</span></h1>
				<h2>Cela signifie que vous êtes: <span id="comment"> ?</span> </h2>
			</main>
	
	</div>
	
</body>
</html>