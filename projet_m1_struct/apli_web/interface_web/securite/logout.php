<?php
// On prolonge la session
session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['login'])) 
{
  echo "vous n'etes pas connecte";
  // Si inexistante ou nulle, on redirige vers le formulaire de login
  header('Location: '/*ajouter l'adresse de votre site ici*/'/serre/projet_m1_struct/apli_web/interface_web/securite/connexion.php');
  exit();
}else{

   $_SESSION = array();
  // Destruction de la session
  session_destroy();
  // Destruction du tableau de session
  unset($_SESSION);
  header('Location: '/*ajouter l'adresse de votre site ici*/'/serre/projet_m1_struct/apli_web/interface_web/securite/connexion.php');
  exit();
}

 ?>

