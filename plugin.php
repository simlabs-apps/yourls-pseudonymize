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
 
function ubicoo_pseudonymize_IP( $value ) {
	$segments = explode(".", $value);
	$segments[2] = 0;
	$segments[3] = 0;
	$pseudo_IP = implode(".", $segments);
	return $pseudo_IP;
}

