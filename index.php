<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

      .loader-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #fff; /* Couleur de fond par défaut */
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        animation: changeBackground 2s infinite alternate; /* Animation de changement de fond */
      }

      @keyframes changeBackground {
        0% {
          background-color: #CCFFFF; 
        }
        20% {
          background-color: #99FFFF; 
        }
        40% {
          background-color: #66FFFF; 
        }
        50% {
          background-color: #33FFFF; 
        }
        80% {
          background-color: #00FFFF; 
        }
        100% {
          background-color: #00CCCC; 
        }
      }


        .loader {
            border: 16px solid #f3f3f3;
            border-top: 16px solid #3498db;
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .content {
            display: none;
        }
      h1 {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 72%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
      }
    </style>
    <title>Accueil</title>
</head>
<body>
    <div class="loader-wrapper">
      <h1>
        Chargement en cours...
      </h1>
        <div class="loader"></div>
    </div>

    <div class="content">
        <!-- Le contenu de votre page va ici -->
<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
<head>
	<title>le site d'axel !</title>
	<style>
		body {
			background-color: #ffffff;
		}
	</style>
	
	<script src="https://cdn.onesignal.com/sdks/web/v16/OneSignalSDK.page.js" defer></script>
<script>
  window.OneSignalDeferred = window.OneSignalDeferred || [];
  OneSignalDeferred.push(function(OneSignal) {
    OneSignal.init({
      appId: "07458f56-5a49-42fc-81c8-883f48ed2821",
    });
  });
</script>
</head>
<body id="page">
<style>
      .page{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: 100%
      }
      html, body {
      height: 100%;
      margin: 0;
      }

   </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://www.buymeacoffee.com/stream-alert/page/Lechat?user_key=71027f1900fe17b550f5ea721ff29c37" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script data-name="BMC-Widget" data-cfasync="false" src="https://cdnjs.buymeacoffee.com/1.0.0/widget.prod.min.js" data-id="Lechat" data-description="Support me on Buy me a coffee!" data-message="Clique ici ---> !" data-color="#5F7FFF" data-position="Right" data-x_margin="18" data-y_margin="18"></script>

<?php
include('navbar.php');
?>

<style type="text/css">
		.navbar {
			background-color: black;
			color: white;
			padding: 10px;
			display: flex;
			justify-content: space-between;
		}

		#visitors {
			font-size: 20px;
			margin-right: 10px;
		}
	</style>


<!-- Button trigger modal -->
<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Paramètres
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Paramètres de la page</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <form method="POST">
		<input type="color" name="couleur" id="couleur" class="btn btn-secondary" >
		<input type="submit" class="btn btn-success" value="Changer la couleur">
	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler et fermer</button>
      </div>
    </div>
  </div>
</div>


<!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal2">
  Envoyer un message
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Envoyer un message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label for="email">Envoyer le message à :</label>
		<input type="email" id="email" name="email" required>
		<label for="count">Nombre d'envois :</label>
		<input type="number" id="count" name="count" value="1" min="1" max="50">
		<label for="message">Contenu du message :</label>
		<textarea id="message" name="message" rows="5" cols="30" required></textarea>
		<label for="size">Taille de police :</label>
		<select id="size" name="size">
            <option value="16" disabled selected>Choisir une taille</option>
            <option disabled>---Petites tailles---</option>
            <option value="1">1</option>
            <option value="10">10</option>
            <option value="11">11</option>
			<option value="12">12</option>
            <option value="13">13</option>
            <option disabled>---Tailles moyennes---</option>
			<option value="14">14</option>
            <option value="15">15</option>
			<option value="16">16</option>
            <option value="17">17</option>
			<option value="18">18</option>
            <option value="19">19</option>
			<option value="20">20</option>
            <option color="grey" disabled>---Grandes tailles---</option>
            <option value="80">80</option>
            <option value="100">100</option>
            <option value="500">500</option>
            <option value="999">999</option>
          
		</select>
		  
		<button class="btn btn-success" type="submit" name="submit">Envoyer</button>
	</form>
</div>
      </div>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
    </div>
  </div>




<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
  Menu
</button>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h1 class="offcanvas-title" id="offcanvasExampleLabel">Les chats</h1>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div>
      Ici c'est le menu !
    </div>

    <div class="card">
      <div class="card-body">
        Les chats sont trop mignons !
      </div>
    </div>

    <div class="card" style="width: 18rem;">
      <img src="/public_html/chat.jpeg" class="card-img-top" alt="">
      <div class="card-body">
        <h5 class="card-title">Miaou !!!</h5>
      </div>
    </div>
    <button class="btn btn-primary" type="button" id="chat" disabled>
      <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
      Chargement des chats ...
    </button>
  </div>

  <script>
    setTimeout(function() {
      var button = document.getElementById("chat");
      button.removeAttribute("disabled");
      var spinner = document.querySelector('.spinner-border');
      spinner.style.display = 'none';
      var buttonText = button.querySelector('span:last-child');
      buttonText.innerHTML = "Cliquez ici";
      button.addEventListener('click', function() {
        window.location.href = "test.php";
      });
    }, 5000);
  </script>

  <div class="modal-body">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">Les</div>
        <div class="col-md-4 ms-auto">chats</div>
      </div>
      <div class="row">
        <div class="col-md-3 ms-auto">sont</div>
        <div class="col-md-2 ms-auto">super</div>
      </div>
      <div class="row">
        <div class="col-md-6 ms-auto">mignons</div>
      </div>
      <div class="row">
        <div class="col-sm-9">
          et
          <div class="row">
            <div class="col-8 col-sm-6">
              affectieux
            </div>
            <div class="col-4 col-sm-6">
              miaou !
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  

</div>


<button class="btn btn-success" onclick="showPopup()">Cliquez ici</button>

<div id="popup" style="display:none; position:fixed; top:10px; right:10px; padding:10px; background-color:rgb(0, 247, 255); border:5px solid rgb(0, 0, 255);">
  Miaou ! C'est le chat qui vous parle !
  <div id="progress-bar" style="width: 100%; height: 5px; background-color: rgb(255, 255, 255); margin-top: 20px;">
    <div id="progress" style="width: 0%; height: 5px; background-color: #000000;"></div>
  </div>
</div>

<script>
  function showPopup() {
    let mia = prompt("Combien de temps ?")
    var popup = document.getElementById("popup");
    var progressBar = document.getElementById("progress");
    popup.style.display = "block";
    progressBar.style.width = "100%";
    var duration = mia; // durée de la fenêtre contextuelle en secondes
    var interval = 10; // intervalle de mise à jour de la barre de progression en millisecondes
    var step = 100 / (duration * 1000 / interval); // étape de progression de la barre de progression
    var timer = setInterval(function() {
      progressBar.style.width = (parseFloat(progressBar.style.width) - step) + "%";
      if (parseFloat(progressBar.style.width) <= 0) {
        clearInterval(timer);
        popup.style.display = "none";
      }
    }, interval);
  }
</script>

<script>
		function showError() {
			alert("L'envoi de messages a échoué. Veuillez réessayer.");
		}

		function showSuccess() {
			alert("Les messages ont été envoyés avec succès.");
		}
	</script>


	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
		$email = $_POST["email"];
		$count = $_POST["count"];
		$message = $_POST["message"];
		$size = $_POST["size"];
		$success = true;
		for ($i = 1; $i <= $count; $i++) {
			$headers = "From: webmaster@example.com\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=utf-8\r\n";
			$message_formatted = "<html><body style='font-size: {$size}px;'>{$message}</body></html>";
			if (!mail($email, "Message #" . $i, $message_formatted, $headers)) {
				$success = false;
				break;
			}
		}
		if ($success) {
			echo "<script>showSuccess();</script>";
			$last_email = $email;
			$last_count = $count;
			$last_message = $message;
			$last_size = $size;
		} else {
			echo "<script>showError();</script>";
		}
	}
	?>



  <style>
		.reset-button {
			background-color: red;
			color: white;
			border: none;
			padding: 5px 10px;
			border-radius: 5px;
			cursor: pointer;
			margin-left: 10px;
		}

		textarea, button {
			cursor: crosshair;
		}
	</style>

</html>


<?php
if (isset($_POST['couleur'])) {
	$couleur = $_POST['couleur'];
	echo "<style>body { background-color: $couleur; }</style>";
}
?>

<style>
        #canvas {
            width: 10000px;
            height: 10000px;
            border: 5px solid black;
        }
    </style>

<!-- Button trigger modal -->
<button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal3">
  Dessiner
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dessiner</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <canvas id="canvas"></canvas>
    <br>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.3.0/fabric.min.js"></script>
    <script>
        var canvas = new fabric.Canvas('canvas');
        var rect = new fabric.Rect({
            left: 0,
            top: 0,
            width: canvas.width,
            height: canvas.height,
            fill: '#fff'
        });
        canvas.add(rect);
        var isDrawing = false;
        var lastX, lastY;
        canvas.on('mouse:down', function(options) {
            isDrawing = true;
            var pointer = canvas.getPointer(options.e);
            lastX = pointer.x;
            lastY = pointer.y;
        });
        canvas.on('mouse:move', function(options) {
            if (!isDrawing) return;
            var pointer = canvas.getPointer(options.e);
            var currentX = pointer.x;
            var currentY = pointer.y;

            var line = new fabric.Line([lastX, lastY, currentX, currentY], {
                strokeWidth: 5,
                fill: 'black',
                stroke: 'black'
            });
            canvas.add(line);

            lastX = currentX;
            lastY = currentY;
            canvas.renderAll();
        });
        canvas.on('mouse:up', function(options) {
            isDrawing = false;
        });

        $('#saveBtn').click(function() {
            var imageData = canvas.toDataURL();
            $.ajax({
                type: 'POST',
                url: '<?php echo $_SERVER["PHP_SELF"]; ?>',
                data: { imageData: imageData },
                success: function(response) {
                    alert(response);
                },
                error: function() {
                    alert('Erreur lors de l\'enregistrement du dessin.');
                }
            });
        });
        
    </script>

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['imageData'])) {
                $imgData = str_replace('data:image/png;base64,', '', $_POST['imageData']);
                $imgData = str_replace(' ', '+', $imgData);
                $data = base64_decode($imgData);
                $fileName = 'dessin.png';
                file_put_contents($fileName, $data);
                echo 'Dessin enregistré sous le nom ' . $fileName;
            }
        }
    ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>


<a class="btn btn-info" href="login.php" role="button">Se connecter</a>
   
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.1/css/bootstrap.min.css">

  <script>
    setTimeout(function() {
      var button = document.getElementById("myButton");
      button.removeAttribute("disabled");
      var spinner = document.querySelector('.spinner-border');
      spinner.style.display = 'none';
      var buttonText = button.querySelector('span:last-child');
      buttonText.innerHTML = "Clic droit ici";
      button.addEventListener('click', function() {
        window.location.href = "#";
      });
    }, 5000);

// Sélectionne l'élément sur lequel on veut ajouter le menu contextuel
var element = document.getElementById("page");

// Ajoute un écouteur d'événement pour le clic droit sur l'élément
element.addEventListener("contextmenu", function(event) {
  // Empêche le menu contextuel par défaut de s'afficher
  event.preventDefault();

  // Crée le menu contextuel
  var menu = document.createElement("div");
  menu.style.position = "absolute";
  menu.style.backgroundColor = "#FFFFFF";
  menu.style.border = "2px solid #CCCCCC";
  menu.style.padding = "10px";

  // Ajoute des éléments au menu contextuel
  var item1 = document.createElement("div");
  item1.innerHTML = "Télécharger";
  menu.appendChild(item1);

  var item2 = document.createElement("div");
  item2.innerHTML = "Secret !";
  menu.appendChild(item2);

  // Positionne le menu contextuel à l'endroit du clic de la souris
  menu.style.left = event.clientX + "px";
  menu.style.top = event.clientY + "px";

  // Ajoute le menu contextuel à la page
  document.body.appendChild(menu);

  // Ajoute un écouteur d'événement pour le clic sur les options du menu
  item1.addEventListener("click", function() {
    // Code à exécuter lorsque l'utilisateur clique sur l'option 1
        let link = document.createElement('a');
	link.download = 'hello.txt';
    alert("Création du fichier...")
	let blob = new Blob(['Merci d\'avoir téléchargé ce fichier ! Ceci est super car c\'est le premier fichier à télécharger sur mon site ! Allez sur ce lien : arddcn.qnza1539.odns.fr/Miner_Cat_4.html J\'espère que vous aimerez !'], {type: 'text/plain'});

	link.href = URL.createObjectURL(blob);


	link.click();

	URL.revokeObjectURL(link.href);
  });

  item2.addEventListener("click", function() {
    // Code à exécuter lorsque l'utilisateur clique sur l'option 2
    let isBoss = confirm("Êtes vous l'admin ?");
if (isBoss == true) {
   window.location.href = "/espace_membres/admin.php";
} 
else if (isBoss == false){
  alert( 'Ben alors quoi ?' );
}
//alert( isBoss ); // true if OK is pressed
  });

  item3.addEventListener("click", function() {
    // Code à exécuter lorsque l'utilisateur clique sur l'option 3

  });
  // Ajoute un écouteur d'événement pour les clics sur la page, afin de fermer le menu contextuel lorsque l'utilisateur clique ailleurs
  var cla = document.getElementById("page");
  cla.addEventListener("click", function() {
    document.body.removeChild(menu);
  });
});

  </script>

<style>
      .paragraphe {
        position: absolute;
        bottom: 0;
        right: 0;
        margin-bottom: 25px;
        margin-right: 100px;
      }
    </style>
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
    <div class="conteneur">
      <p class="paragraphe2">Chatenligne.com version 0.0.1. Créé par Axel</p>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Simulez un délai de chargement (vous pouvez le remplacer par votre logique de chargement réelle)
            setTimeout(function() {
                document.querySelector(".loader-wrapper").style.display = "none";
                document.querySelector(".content").style.display = "block";
            }, 2500); // 2500 millisecondes (2.5 secondes)
        });
    </script>
</body>
</html>

