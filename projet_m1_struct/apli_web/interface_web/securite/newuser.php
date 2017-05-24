<?php

// On prolonge la session
//session_start();
// On teste si la variable de session existe et contient une valeur



$message='aaaa';
echo $message;
if (isset(var)($_POST['nom']) && isset($_POST['prenom'])&& isset($_POST['email'])&& isset($_POST['motdepasse'])&& isset($_POST['telephone']) ) //Oublie d'un champ
{
    $message = 'variable recu';
}
else //On check le mot de passe
{
    $message = 'variable non recu';
}
echo $message;


?>