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

function unix_timestamp($date)
{
	$date = str_replace(array(' ', ':'), '-', $date);
	$c    = explode('-', $date);
	$c    = array_pad($c, 6, 0);
	array_walk($c, 'intval');
 
	return mktime($c[3], $c[4], $c[5], $c[1], $c[2], $c[0]);
}

	header('Content-Type: text/html; charset: UTF-8');


	 header('Content-Type: text/html; charset: UTF-8');
	try{
	        // Sous MAMP (Mac)
	        $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', 'Louloudu29');
	        }
	catch (Exception $e)
	{
	    die('Erreur : ' . $e->getMessage());
	}

	$rep = $bdd->query('SELECT * FROM valeur WHERE id_capteur = 1 ORDER BY date_valeur  DESC LIMIT 0,100 ');


	$str="";
	$str .= '{';
	$str .= '"';
	$str .= 'niveau';
	$str .= '":{label:"niveau eau",data :[';
	


	while($donnees= $rep->fetch()){
	
		$str .= '[';
		$a = unix_timestamp($donnees['date_valeur']);
	    $str .= unix_timestamp($donnees['date_valeur']);
	    $str .= '000, ';
	    $b = $donnees['value'];
	    $str .= $donnees['value'];
	    $str .= ']';
	    $str .= ', ';
	}
	$str .= '[';
    $str .= $a;
    $str .= '000, ';
    $str .= $b;
    $str .= ']';
    $str .= ']';

    $str .= '},';
	$str .= '{';
	$str .= '"';
	$str .= 'ph';
	$str .= '":{label:"niveau pH",data :[';
	$rep = $bdd->query('SELECT * FROM valeur WHERE id_capteur = 2 ORDER BY date_valeur  DESC LIMIT 0,100 ');
	while($donnees= $rep->fetch()){
	
		$str .= '[';
		$a = unix_timestamp($donnees['date_valeur']);
	    $str .= unix_timestamp($donnees['date_valeur']);
	    $str .= '000, ';
	    $b = $donnees['value'];
	    $str .= $donnees['value'];
	    $str .= ']';
	    $str .= ', ';
	}
	$str .= '[';
    $str .= $a;
    $str .= '000, ';
    $str .= $b;
    $str .= ']';
    $str .= ']';


    $str .= '},';
	$str .= '{';
	$str .= '"';
	$str .= 'luminosite';
	$str .= '":{label:"luminosite en Lux",data :[';
	$rep = $bdd->query('SELECT * FROM valeur WHERE id_capteur = 3 ORDER BY date_valeur  DESC LIMIT 0,100 ');
	while($donnees= $rep->fetch()){
	
		$str .= '[';
		$a = unix_timestamp($donnees['date_valeur']);
	    $str .= unix_timestamp($donnees['date_valeur']);
	    $str .= '000, ';
	    $b = $donnees['value'];
	    $str .= $donnees['value'];
	    $str .= ']';
	    $str .= ', ';
	}
	$str .= '[';
    $str .= $a;
    $str .= '000, ';
    $str .= $b;
    $str .= ']';
    $str .= ']';


    $str .= '},';
	$str .= '{';
	$str .= '"';
	$str .= 'eau';
	$str .= '":{label:"temperature eau",data :[';
	$rep = $bdd->query('SELECT * FROM valeur WHERE id_capteur = 4 ORDER BY date_valeur  DESC LIMIT 0,100 ');
	while($donnees= $rep->fetch()){
	
		$str .= '[';
		$a = unix_timestamp($donnees['date_valeur']);
	    $str .= unix_timestamp($donnees['date_valeur']);
	    $str .= '000, ';
	    $b = $donnees['value'];
	    $str .= $donnees['value'];
	    $str .= ']';
	    $str .= ', ';
	}
	$str .= '[';
    $str .= $a;
    $str .= '000, ';
    $str .= $b;
    $str .= ']';
    $str .= ']';


    $str .= '},';
	$str .= '{';
	$str .= '"';
	$str .= 'air';
	$str .= '":{label:"temperature air",data :[';
	$rep = $bdd->query('SELECT * FROM valeur WHERE id_capteur = 5 ORDER BY date_valeur  DESC LIMIT 0,100 ');
	while($donnees= $rep->fetch()){
	
		$str .= '[';
		$a = unix_timestamp($donnees['date_valeur']);
	    $str .= unix_timestamp($donnees['date_valeur']);
	    $str .= '000, ';
	    $b = $donnees['value'];
	    $str .= $donnees['value'];
	    $str .= ']';
	    $str .= ', ';
	}
	$str .= '[';
    $str .= $a;
    $str .= '000, ';
    $str .= $b;
    $str .= ']';
    $str .= ']';

    $str .= '},';
	$str .= '{';
	$str .= '"';
	$str .= 'humi';
	$str .= '":{label:"humidité en %",data :[';
	$rep = $bdd->query('SELECT * FROM valeur WHERE id_capteur = 6 ORDER BY date_valeur  DESC LIMIT 0,100 ');
	while($donnees= $rep->fetch()){
	
		$str .= '[';
		$a = unix_timestamp($donnees['date_valeur']);
	    $str .= unix_timestamp($donnees['date_valeur']);
	    $str .= '000, ';
	    $b = $donnees['value'];
	    $str .= $donnees['value'];
	    $str .= ']';
	    $str .= ', ';
	}
	$str .= '[';
    $str .= $a;
    $str .= '000, ';
    $str .= $b;
    $str .= ']';
    $str .= ']';


    $str .= '},';
	$str .= '{';
	$str .= '"';
	$str .= 'sali';
	$str .= '":{label:"salinité",data :[';
	$rep = $bdd->query('SELECT * FROM valeur WHERE id_capteur = 7 ORDER BY date_valeur  DESC LIMIT 0,100 ');
	while($donnees= $rep->fetch()){
	
		$str .= '[';
		$a = unix_timestamp($donnees['date_valeur']);
	    $str .= unix_timestamp($donnees['date_valeur']);
	    $str .= '000, ';
	    $b = $donnees['value'];
	    $str .= $donnees['value'];
	    $str .= ']';
	    $str .= ', ';
	}
	$str .= '[';
    $str .= $a;
    $str .= '000, ';
    $str .= $b;
    $str .= ']';
    $str .= ']';
    $str .= '}}';
	
	echo $str;


	$rep->closeCursor();
	$bdd=null;





	




?>
