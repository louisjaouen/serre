<?php
	$config_file_path = 'config.php';
	 
	require_once( "../../../vendor/hybridauth/hybridauth/Hybrid/Auth.php" );
	 
	$hybridauth = new Hybrid_Auth( $config_file_path );