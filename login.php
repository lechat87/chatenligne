

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Vérifie si l'utilisateur a soumis le formulaire de connexion
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Vérifie les informations de connexion de l'utilisateur
  if ($username === 'miaou' && $password === 'mia') {
    // Stocke les informations de connexion de l'utilisateur dans les variables de session
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;

    // Redirige l'utilisateur vers la page de chargement
    header('Location: ok.php');
    exit();
  } else {
    // Affiche un message d'erreur si les informations de connexion sont incorrectes
    ?>
    <div class="alert alert-danger" role="alert">
Idendifiant ou mot de passe incorrect
    </div>
    <?php
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Connexion</title>
</head>
<body>
  <?php if (isset($error)) { ?>
    <p><?php echo $error; ?></p>
  <?php } ?>
  <form method="POST">
    <div>
      <label for="username">Nom d'utilisateur :</label>
      <input type="text" name="username" id="username" required >
    </div>
    <div>
      <label for="password">Mot de passe :</label>
      <input type="password" name="password" id="password" required >
    </div>
    <button class="btn btn-success" type="submit">Se connecter</button>
  </form>
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