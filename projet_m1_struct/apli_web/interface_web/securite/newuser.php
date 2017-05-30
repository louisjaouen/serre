<?php

// On prolonge la session
session_start();
// On teste si la variable de session existe et contient une valeur


if (isset($_POST['nom']) && isset($_POST['prenom'])&& isset($_POST['email'])&& isset($_POST['motdepasse'])&& isset($_POST['telephone']) ) //Oublie d'un champ
{
    $message = '  variable recu';
    try{
	        
	        $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', 'Louloudu29');
	        }
	catch (Exception $e)
	{
	    die('Erreur : ' . $e->getMessage());
	}

	$req = $bdd->prepare('INSERT INTO user(nom, prenom, droits, motdepasse, telephone) VALUES(:nom, :prenom, :droits, :motdepasse, :telephone)');
	$req->execute(array(
	    'nom' => $_POST['nom'],
	    'prenom' => $_POST['prenom'],
	    'droits' => '0',
	    'motdepasse' => $_POST['motdepasse'],
	    'telephone' => $_POST['telephone']
	    ));
	$message .= '  user ajouté';
	echo $message;
	$req->closeCursor();
	$bdd=null;
	header('Location: '/*ajouter l'adresse de votre site ici*/'/serre/projet_m1_struct/apli_web/interface_web/securite/connexion.php');
  	exit();
}
else //On check le mot de passe
{
    $message = 'pb lors de l\'inscription. réessayez ou connectez vous avec Google ou Twitter.';
}


?>