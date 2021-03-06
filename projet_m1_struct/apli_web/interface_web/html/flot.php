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




?>  


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bassin <?php echo $_SESSION['bassin'];?></title><!--ajouter numero bassin via bdd-->

    <!-- Bootstrap Core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">

  

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>



    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">vue courbes: Bassin <?php echo $_SESSION['bassin'];?></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li><a href="../securite/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout : <?php echo $_SESSION['login']; ?></a>
                </li>
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="tableau.php"><i class="fa fa-dashboard fa-fw"></i> Capteurs live</a>
                            <ul>
                                <li>
                                    <a href="tableau.php"><i class="fa  fa-fw"></i> Bassin 1</a>
                                </li>      
                            </ul>
                        </li>
                        <li>
                            <a href="flot.php"><i class="fa fa-bar-chart-o fa-fw"></i> Graphique</a>
                            <ul>
                                <li>
                                    <a href="flot.php"><i class="fa  fa-fw"></i> Bassin 1</a>
                                </li>       
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bassin 1  </h1>
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Exemple pH actualisation Live
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-line-chart"></div>

                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                
                <!-- /.col-lg-6 -->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            graphique de tous les capteurs
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div id="toggle" class="flot-chart-content" style="float:left; width:80%;"></div>
                                <p id="choices" style="float:right; width:20%;"></p>
                            </div>
                            <p>Zoom sur:
                            <button id="journee">journée</button>
                            <button id="semaine">semaine</button>
                            <button id="annee">année</button>
                            </p>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                
                
                
                
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Flot Charts JavaScript -->
    <script src="../../vendor/flot/excanvas.min.js"></script>
    <script src="../../vendor/flot/jquery.flot.js"></script>
    <script src="../../vendor/flot/jquery.flot.pie.js"></script>
    <script src="../../vendor/flot/jquery.flot.resize.js"></script>
    <script src="../../vendor/flot/jquery.flot.time.js"></script>
    <script src="../../vendor/flot-tooltip/jquery.flot.tooltip.min.js"></script>
    <script src="../affichage_donnee/js/flot-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../js/sb-admin-2.js"></script>
    

</body>

</html>
