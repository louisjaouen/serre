<?php
// On prolonge la session
session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['login'])) 
{
  // Si inexistante ou nulle, on redirige vers le formulaire de login
  header('Location: '/*ajouter l'adresse de votre site ici*/'/serre/projet_m1_struct/apli_web/interface_web/securite/connexion.php');
  exit();
} 
if(empty($_SESSION['bassin']) || empty($_SESSION['capteur']) || empty($_SESSION['nombre_de_valeur'])) 
{
  $_SESSION['bassin']=1;
  $_SESSION['capteur']=1;
  $_SESSION['nombre_de_valeur']=100;
}

 header('Content-Type: text/html; charset: UTF-8');
try{
        // Sous MAMP (Mac)
        $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '**motdepasse**');
        }
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

$rep = $bdd->query('SELECT * FROM valeur WHERE id_capteur=2 ORDER BY id_valeur DESC LIMIT 0,1 ');


$str="";
$str .= '[';
$str .= '{"valeur": "';

while($donnees= $rep->fetch()){
    $str .= $donnees['value'];
    $str .= '"},';
    $str .= '{"valeur": "';
}
$str .= 666;
$str .= '"}';
$str.=']';
echo $str;


$rep->closeCursor();
$bdd=null;



?>
