<?php
// On prolonge la session
session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['login'])) 
{
  // Si inexistante ou nulle, on redirige vers le formulaire de login
  header('Location: http://serregoarem.ddnsking.com/serre/projet_m1_struct/apli_web/interface_web/securite/connexion.php');
  exit();
}else{
	header('Location: http://serregoarem.ddnsking.com/serre/projet_m1_struct/apli_web/interface_web/html/tableau.php');
	exit();
}
?>