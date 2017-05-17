<?php
//fb.php
require_once '../../../vendor/autoload.php';
 
$config = array(
    "base_url" => "92.92.96.14:80/serre/projet_m1_struct/interface_web/securite/hybrid.php",
    "providers" => array(
        "Facebook" => array(
            "enabled" => true,
            "keys" => array("id" => "446272929039156", "secret" => "0ec9951958695a404f7ea0b458ab5f83"),
                    "scope" => "email"
        )
    )
);
$hybridAuth = new \Hybridauth\Hybridauth($config);
$adapter = $hybridAuth->authenticate("Facebook");
$userProfile = $adapter->getUserProfile();
echo "<pre>";
print_r($adapter->getTokens());
print_r($userProfile);
echo "</pre>";
?>