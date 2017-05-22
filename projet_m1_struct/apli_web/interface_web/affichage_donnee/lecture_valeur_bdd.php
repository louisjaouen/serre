<?php
	header('Content-Type: text/html; charset: UTF-8');
	//$bassin=$_GET['bassin'];
	$capteur=$_GET['capteur'];
	$nombre_de_valeur=$_GET['nombre_de_valeur'];




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
