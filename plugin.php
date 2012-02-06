<?php
/*
Plugin Name: Pseudonymize Plugin
Plugin URI: http://github.com/ubicoo/yourls-pseudonymize
Description: Pseudonymize IP addresses (remove last 2 segments/bytes).
Version: 1.0
Author: Ubicoo
Author URI: http://www.ubicoo.com
 */


yourls_add_filter( 'get_IP', 'ubicoo_pseudonymize_IP' );

function ubicoo_pseudonymize_IP( $ip ) {
    if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
        $segments = explode(":", $ip);
        $segments[count($segments)-1] = 0;

        $pseudo_IP = implode(":", $segments);

        # FIXME: What about: ::ffff:127.0.0.1? It's a valid v6 as well!
    } elseif(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
        $segments = explode(".", $ip);
        $segments[3] = 0;

        $pseudo_IP = implode(".", $segments);
    } else {
        $pseudo_IP = $ip;
    }

    return $pseudo_IP;
}

