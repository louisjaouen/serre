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



?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bassin <?php echo $_SESSION['bassin'];?></title>

    <!-- Bootstrap Core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <script src="../affichage_donnee/js/miseajourcapteurlive.js"></script>

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
                <a class="navbar-brand">vue live: Bassin <?php echo $_SESSION['bassin'];?></a>
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
                                <li>
                                    <a href="tableau.php"><i class="fa  fa-fw"></i> Bassin 2</a>
                                </li>
                                <li>
                                    <a href="tableau.php"><i class="fa  fa-fw"></i> Bassin 3</a>
                                </li> 
                                <li>
                                    <a href="tableau.php"><i class="fa  fa-fw"></i> Bassin 4</a>
                                </li>      
                            </ul>
                        </li>
                        <li>
                            <a href="flot.php"><i class="fa fa-bar-chart-o fa-fw"></i> Graphique</a>
                            <ul>
                                <li>
                                    <a href="flot.php"><i class="fa  fa-fw"></i> Bassin 1</a>
                                </li>
                                <li>
                                    <a href="flot.php"><i class="fa  fa-fw"></i> Bassin 2</a>
                                </li> 
                                <li>
                                    <a href="flot.php"><i class="fa  fa-fw"></i> Bassin 3</a>
                                </li> 
                                <li>
                                    <a href="flot.php"><i class="fa  fa-fw"></i> Bassin 4</a>
                                </li>        
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <?php if($_SESSION['bassin']==1){

        }?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bassin <?php echo $_SESSION['bassin'];?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">

                <?php
                  include_once("../image_capteur/waterlvl.php")
                ?>
                <?php
                  include_once("../image_capteur/phlvl.php")
                ?>
                <?php
                  include_once("../image_capteur/luminositelvl.php")
                ?>
                <?php
                  include_once("../image_capteur/watertemplvl.php")
                ?>
                <?php
                  include_once("../image_capteur/airtemplvl.php")
                ?>
                <?php
                  include_once("../image_capteur/humilvl.php")
                ?>
                <?php
                  include_once("../image_capteur/salilvl.php")
                ?>
                
            </div>
            
           
        </div>
        <!-- /#page-wrapper -->
        <?php else{}?>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../vendor/metisMenu/metisMenu.min.js"></script>



    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>

</body>

</html>
