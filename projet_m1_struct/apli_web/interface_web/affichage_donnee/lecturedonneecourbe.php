<?php
// On prolonge la session
session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['login'])) 
{
  // Si inexistante ou nulle, on redirige vers le formulaire de login
  header('Location: http://serregoarem.ddnsking.com/serre/projet_m1_struct/apli_web/interface_web/securite/Facebook.php');
  exit();
} 
if(empty($_SESSION['bassin']) || empty($_SESSION['capteur']) || empty($_SESSION['nombre_de_valeur'])) 
{
  $_SESSION['bassin']=1;
  $_SESSION['capteur']=1;
  $_SESSION['nombre_de_valeur']=100;
}

try{
		// Sous MAMP (Mac)
	$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', 'Louloudu29');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
$req = $bdd->query('SELECT value FROM valeur WHERE id_capteur = 1   ORDER BY id_valeur DESC LIMIT 0, 50');

$str="";
$str .= '[';
while($donnees= $req->fetch()){
    
    $str .= '"{"valeur": "';
    $str .= $donnees['value'];
    $str .= '"},';
    
}
$str.=']';
$str[strlen($str)-2]=']';
$str[strlen($str)-1]=null;


$req->closeCursor();
$bdd=null;

echo $str;

?>
