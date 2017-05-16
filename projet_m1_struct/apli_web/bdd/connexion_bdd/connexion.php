<?php
	

	try{
		// Sous MAMP (Mac)
		$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', 'Louloudu29');
		}
	catch (Exception $e)
	{
	    die('Erreur : ' . $e->getMessage());
	}
?>