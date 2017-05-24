<?php

// On prolonge la session
session_start();
// On teste si la variable de session existe et contient une valeur

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



	$message='';
    if (isset(var)($_POST['nom']) && isset($_POST['prenom'])&& isset($_POST['email'])&& isset($_POST['motdepasse'])&& isset($_POST['telephone']) ) //Oublie d'un champ
    {
        $message = 'variable recu';
    }
    else //On check le mot de passe
    {
        $message = 'variable non recu';
    }
    echo $message;




	
	$bdd=null;
?>