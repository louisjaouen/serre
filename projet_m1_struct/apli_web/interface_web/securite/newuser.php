<?php

// On prolonge la session
session_start();
// On teste si la variable de session existe et contient une valeur


if (isset($_POST['nom']) && isset($_POST['prenom'])&& isset($_POST['email'])&& isset($_POST['motdepasse'])&& isset($_POST['telephone']) ) //Oublie d'un champ
{
    $message = '  variable recu';
    try{
	        // Sous MAMP (Mac)
	        $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', 'Louloudu29');
	        }
	catch (Exception $e)
	{
	    die('Erreur : ' . $e->getMessage());
	}


}
else //On check le mot de passe
{
    $message = '  variable non recu';
}
echo $message;


?>