<?php
/*
Plugin Name: Pseudonymize Plugin
Plugin URI: http://github.com/ubicoo/yourls-pseudonymize
Description: Pseudonymize IP addresses.
Version: 0.1
Author: Ubicoo
Author URI: http://www.ubicoo.com
*/

 
yourls_add_filter( 'get_IP', 'ubicoo_pseudonymize_IP' );
 
function ubicoo_pseudonymize_IP( $value ) {
	//TODO change last segment to 0 (if not already)[can this happen?]
	return $value;
}

