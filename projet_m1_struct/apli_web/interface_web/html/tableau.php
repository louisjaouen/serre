<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Adminisatration de la Serre de Goarem An Abat</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
	<script src="../js/miseajourcapteurlive.js"></script>

  
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
                <a class="navbar-brand" href="tableau.php">Adminisatration de la Serre de Goarem An Abat</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <li><div id="status">
                </div></li>
                <li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                </li>
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="tableau.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="flot.php"><i class="fa fa-bar-chart-o fa-fw"></i> Charts</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
            <div class="center">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
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
                
                
                
                <div class="row">
                    
                    <div class="col-lg-12">
                        <h1 class="page-header">See Also</h1>
                    </div>
                    <div class="col-lg-12">
                    
                    <!-- /.panel -->
                    
                    <!-- /.panel -->
                    <div class="chat-panel panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-comments fa-fw"></i> Chat
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu slidedown">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-refresh fa-fw"></i> Refresh
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-check-circle fa-fw"></i> Available
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-times fa-fw"></i> Busy
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-clock-o fa-fw"></i> Away
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-sign-out fa-fw"></i> Sign Out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="chat">
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                        <?php
                                          require_once("../../bdd/connexion_bdd/connexion.php");
                                          $reponse = $bdd->query('select * from tchat');//lecture
                                          $donnees = $reponse->fetch();//ligne par ligne
                                          //$donnees = $reponse->fetch();
                                          //echo $donnees['messages'];//sortir les donn

                                        ?>
                                            <strong class="primary-font"><?php echo $donnees['users']?></strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i><?php echo $donnees['date']?>
                                            </small>
                                        </div>
                                        <p>
                                            <?php echo $donnees['messages']?>
                                        </p><?php $donnees = $reponse->fetch(); ?>
                                    </div>
                                </li>
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                        
                                            <strong class="primary-font"><?php echo $donnees['users']?></strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i><?php echo $donnees['date']?>
                                            </small>
                                        </div>
                                        <p>
                                            <?php echo $donnees['messages']?>
                                        </p>
                                        <?php $donnees = $reponse->fetch(); ?>
                                    </div>
                                </li>
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                        
                                            <strong class="primary-font"><?php echo $donnees['users']?></strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i><?php echo $donnees['date']?>
                                            </small>
                                        </div>
                                        <p>
                                            <?php echo $donnees['messages']?>
                                        </p><?php $donnees = $reponse->fetch(); ?>
                                    </div>
                                </li>
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                        
                                            <strong class="primary-font"><?php echo $donnees['users']?></strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i><?php echo $donnees['date']?>
                                            </small>
                                        </div>
                                        <p>
                                            <?php echo $donnees['messages']?>
                                        </p><?php $donnees = $reponse->fetch(); ?>
                                    </div>
                                </li>
                                
                            </ul>
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <div class="input-group">
                                <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                                <span class="input-group-btn">
                                    <button class="btn btn-warning btn-sm" id="btn-chat">
                                        Send
                                    </button>
                                </span>
                            </div>
                        </div>
                        <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel .chat-panel -->
                </div>
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
            
                        </div>
                        <!-- /.panel-heading -->
                       
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

  

    <!-- Custom Theme JavaScript -->
    <script src="../js/sb-admin-2.js"></script>

    <!-- Custom script -->
    


</body>

</html>
