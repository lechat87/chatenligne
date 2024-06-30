<!DOCTYPE html>
<html>
<head>
	<title>Page de chargement</title>
	<style>
		#loader {
		  width: 100%;
		  height: 100%;
		  position: fixed;
		  top: 0;
		  left: 0;
		  background-color: #fff;
		  z-index: 9999;
		}

		#loader .progress {
		  position: absolute;
		  top: 50%;
		  left: 50%;
		  transform: translate(-50%, -50%);
		  width: 80%;
		  height: 30px;
		  border: 1px solid #aaa;
		  border-radius: 50px;
		  overflow: hidden;
		}

		#loader .progress .bar {
		  height: 100%;
		  width: 0%;
		  background-color: #4CAF50;
		  transition: width 2s ease-in-out;
		}

		#loader h2 {
			position: absolute;
			top: 60%;
			left: 50%;
			transform: translate(-50%, -50%);
			font-size: 20px;
			color: #333;
			font-weight: normal;
			margin: 0;
			padding: 0;
			text-align: center;
		}

        .loader {
			border: 3px solid #f3f3f3;
			border-radius: 50%;
			border-top: 3px solid #3498db;
			width: 40px;
			height: 40px;
			animation: spin 1s linear infinite;
			margin: 20px auto;
		}

        @keyframes spin {
			0% { transform: rotate(0deg); }
			100% { transform: rotate(360deg); }
		}

	</style>
</head>
<body>

<div class="loader"></div>

<div id="loader">
	<div class="progress">
		<div class="bar"></div>
	</div>
	<h2></h2>
</div>

<script>
	var timeleft = 10; // temps total de chargement
	var downloadTimer = setInterval(function(){
	  timeleft--;
	  var percent = Math.abs(((timeleft/10)*100)-100); // calcul du pourcentage de chargement
	  document.querySelector("#loader .bar").style.width = percent + "%"; // mise à jour de la barre de chargement
	  if (timeleft <= 0){
	    clearInterval(downloadTimer);
	    document.querySelector("#loader h2").style.color = "#333"; // texte final
	    document.querySelector("#loader h2").innerHTML = "Redirection en cours..."; // texte final
		setTimeout(function(){
	    	window.location.href = "/espace_membres/admin.php"; // redirection après chargement complet
	    }, 2000); // délai avant la redirection
	  } else if (timeleft == 8) {
	  	document.querySelector("#loader h2").style.color = "#1e88e5"; // texte bleu foncé
	  	document.querySelector("#loader h2").innerHTML = "Récupération des données..."; // texte 1
	  } else if (timeleft == 6) {
	  	document.querySelector("#loader h2").style.color = "#0d47a1"; // texte bleu très foncé
	  	document.querySelector("#loader h2").innerHTML = "Connexion à la base de données..."; // texte 2
	  } else if (timeleft == 4) {
	  	document.querySelector("#loader h2").style.color = "#2e7d32"; // texte vert
	  	document.querySelector("#loader h2").innerHTML = "Connecté !"; // texte 4
	  } else if (timeleft == 2) {
	  	document.querySelector("#loader h2").style.color = "#1329F4"; // couleur noire
	  	document.querySelector("#loader h2").innerHTML = "Traitement de votre demande..."; // texte final
	  }
	}, 2000); // délai pour la mise à jour de la barre de chargement et des textes
</script>

</body>
</html>
<style>
      .paragraphe {
        position: absolute;
        bottom: 0;
        right: 0;
        margin-bottom: 25px;
        margin-right: 25px;
      }
    </style>
  </head>
  <body>
    <div class="conteneur">
      <p class="paragraphe">Tous droits réservés.</p>
    </div>

    <style>
      .paragraphe2 {
        position: absolute;
        bottom: 0;
        left: 0;
        margin-bottom: 25px;
        margin-left: 25px;
      }
    </style>
  </head>
  <body>
    <div class="conteneur">
      <p class="paragraphe2">Chatenligne.com version 0.0.1. Créé par Axel</p>
    </div>