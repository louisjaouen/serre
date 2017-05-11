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
<?php
  session_start();
  require_once( "../securite/hybridauth/Hybrid/Auth.php" );
 
$config = array(
   // "base_url" the url that point to HybridAuth Endpoint (where the index.php and config.php are found)
   "base_url" => "http://serregoaremanabat.ddns.net/serre/projet_m1_struct/apli_web/interface_web/securite/hybridauth/",
 
   "providers" => array (
       "Twitter" => array (
           "enabled" => true, "keys" => array ( "key" => "K87fmsicZlRpF17TnBvdI46IC", "secret" => "cqNDbhXeLQ2tBtbBBPMrIjqP4ouwh7zAnmXQwhmPuzulmQkE4S" )
       )
   )
);

try{
    // create an instance for Hybridauth with the configuration file path as parameter
    $ha = new Hybrid_Auth( $config );
    
    // try to authenticate the user with twitter,
    // user will be redirected to Twitter for authentication,
    // if he already did, then Hybridauth will ignore this step and return an instance of the adapter
    
  }
  catch( Exception $e ){
    // Display the recived error,
    // to know more please refer to Exceptions handling section on the userguide
    switch( $e->getCode() ){
      case 0 : echo "Unspecified error."; break;
      case 1 : echo "Hybriauth configuration error."; break;
      case 2 : echo "Provider not properly configured."; break;
      case 3 : echo "Unknown or disabled provider."; break;
      case 4 : echo "Missing provider application credentials."; break;
      case 5 : echo "Authentification failed. "
                  . "The user has canceled the authentication or the provider refused the connection.";
               break;
      case 6 : echo "User profile request failed. Most likely the user is not connected "
                  . "to the provider and he should authenticate again.";
               $twitter->logout();
               break;
      case 7 : echo "User not connected to the provider.";
               $twitter->logout();
               break;
      case 8 : echo "Provider does not support this feature."; break;
    }
 
    // well, basically your should not display this to the end user, just give him a hint and move on..
    echo "<br /><br /><b>Original error message:</b> " . $e->getMessage();
  }
   ?>     
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h2 class="title"><a href="login.html" >Log in </a></h2> <h5>Or <a href="signin.html">Sign in </a></h5>
                    </div>
                    <div class="panel-body">
                        <div id="my-signin" href="index.html"></div>
                        <div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="login_with" data-show-faces="true" data-auto-logout-link="true" data-use-continue-as="true" href="index.html"></div>
                        <div id="fb-root"></div>
                        <div id="status"></div>
                        <h2>Or</h2>
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a>
                            </fieldset>
                            
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
