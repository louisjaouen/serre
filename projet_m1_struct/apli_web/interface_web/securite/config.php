<?php

/**
 * HybridAuth
 * http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
 * (c) 2009-2015, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
 */
// ----------------------------------------------------------------------------------------
// HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

return array(
    "base_url" => "http://localhost/hybridauth-git/hybridauth/",
    "providers" => array(
        // openid providers
        "OpenID" => array(
            "enabled" => false,
        ),
        "Yahoo" => array(
            "enabled" => false,
            "keys" => array("id" => "", "secret" => ""),
        ),
        "AOL" => array(
            "enabled" => false,
        ),
        "Google" => array(
            "enabled" => true,
            "keys" => array("id" => "465233672387-jbdsr1eunamue0fq0pq1cl3db8l87o8i.apps.googleusercontent.com", "secret" => "73g-V1tsJSaoqSbn0Wd_FV_k"),
        ),
        "Facebook" => array(
            "enabled" => true,
            "keys" => array("id" => "446272929039156", "secret" => "0ec9951958695a404f7ea0b458ab5f83"),
            "trustForwarded" => false,
        ),
        "Twitter" => array(
            "enabled" => true,
            "keys" => array("key" => "37abLfW5JBtP5JIDswT134tSB", "secret" => "EfpiVpLxxsHAnX156VnE5OWZxl4vjLiJHLRt4ex0aaU54iPxE6"),
            "includeEmail" => false,
        ),
        // windows live
        "Live" => array(
            "enabled" => false,
            "keys" => array("id" => "", "secret" => ""),
        ),
        "LinkedIn" => array(
            "enabled" => false,
            "keys" => array("id" => "", "secret" => ""),
            "fields" => array(),
        ),
        "Foursquare" => array(
            "enabled" => false,
            "keys" => array("id" => "", "secret" => ""),
        ),
    ),
    // If you want to enable logging, set 'debug_mode' to true.
    // You can also set it to
    // - "error" To log only error messages. Useful in production
    // - "info" To log info and error messages (ignore debug messages)
    "debug_mode" => error,
    // Path to file writable by the web server. Required if 'debug_mode' is not false
    "debug_file" => "debug.log",
);