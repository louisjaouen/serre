<?php
// On prolonge la session
session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['login'])) 
{
  //echo "vous n'etes pas connecte";
  // Si inexistante ou nulle, on redirige vers le formulaire de login
  
}else{
  header('Location: '/*ajouter l'adresse de votre site ici*/'/serre/projet_m1_struct/apli_web/interface_web/html/tableau.php');
  exit();
}
if(empty($_SESSION['bassin']) || empty($_SESSION['capteur']) || empty($_SESSION['nombre_de_valeur'])) 
{
  $_SESSION['bassin']=1;
  $_SESSION['capteur']=1;
  $_SESSION['nombre_de_valeur']=100;
}


 ?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
 
    <title>login</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">
</head>

<body> 
   
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h2 class="title"><a href="connexion.php" >connexion </a></h2> <h5>Si vous n'avez pas de compte, inscrivez vous <a href="signin.php">Inscription</a></h5>
                    </div>
                    <div class="panel-body">
                        <div id="my-signin" href="index.html"></div>
                        <div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="login_with" data-show-faces="true" data-auto-logout-link="true" data-use-continue-as="true" href="index.html"></div>
                        <h6>connectez vous avec :</h6>
                        <a href="/*ajouter l'adresse de votre site ici*/serre/projet_m1_struct/apli_web/interface_web/securite/login.php?provider=Google" title="Connexion Google">Google</a>
                        <a href="'/*ajouter l'adresse de votre site ici*/'/serre/projet_m1_struct/apli_web/interface_web/securite/login.php?provider=Twitter" title="Connexion Facebook">Twitter</a>
                        <h2>ou</h2>
                        <form method="post" action="login.php" role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="prenom" name="prenom" type="name" >
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="motdepasse" type="password" value="">
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                </fieldset>
                            <p><input type="submit" value="Connexion" /></p>
                        </form>
                        <!--<div id="status"></div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../vendor/metisMenu/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../js/sb-admin-2.js"></script>
    <script>
</body>
</html>
