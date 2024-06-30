<?php
session_start();
session_unset();
session_destroy();

// Redirige l'utilisateur vers la page de connexion après la déconnexion
header('Location: login.php');
exit();
?>
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