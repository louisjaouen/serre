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

	header('Content-Type: text/html; charset: UTF-8');
	$bassin=$_GET['b'];
	$capteur=$_GET['c'];
	$nombre_de_valeur=$_GET['v'];
	try{
        // Sous MAMP (Mac)
        $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', 'Louloudu29');
        }
	catch (Exception $e)
	{
	    die('Erreur : ' . $e->getMessage());
	}
	$sql = 'SELECT *' 
		. ' FROM valeur' 
		. ' WHERE id_capteur = ?'  
		. ' ORDER BY date_valeur' 
		. ' DESC LIMIT 0,?;';
	$prep = $bdd->prepare($sql);
	$prep->bindValue(1, intval($capteur,10), PDO::PARAM_INT);
	$prep->bindValue(2, intval($nombre_de_valeur,10), PDO::PARAM_INT);
	$prep->execute();
	$str="";
	$str .= '[';
	$str .= '{"valeur": "';
	while($donnees= $prep->fetch()){
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
