<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);


function getIP() {
    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
		$ip = getenv_("HTTP_CLIENT_IP");
    else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"),"unknown"))
		$ip = getenv('REMOTE_ADDR');
		
///////////
	else if (getenv("HTTP_X_FORWARDED") && strcasecmp(getenv("HTTP_X_FORWARDED"), "unknown"))
		$ip = getenv("HTTP_X_FORWARDED");

		
	else if (getenv("HTTP_FORWARDED_FOR") && strcasecmp(getenv("HTTP_FORWARDED_FOR"), "unknown"))
		$ip = getenv("HTTP_FORWARDED_FOR");
		
	
	else if (getenv("HTTP_FORWARDED") && strcasecmp(getenv("HTTP_FORWARDED"), "unknown"))
		$ip = getenv("HTTP_FORWARDED");
		
	else if (getenv("HTTP_X_CLUSTER_CLIENT_IP") && strcasecmp(getenv("HTTP_X_CLUSTER_CLIENT_IP"), "unknown"))
	$ip = getenv("HTTP_X_CLUSTER_CLIENT_IP");	
///////////
		
		
	else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
	    $ip = $_SERVER['REMOTE_ADDR'];
	else $ip = "unknown";
// 在多级反向代理中,可能会将链路中的所有代理1P都带上
// 获取最前面一个1P,即客户端真实IP
    return explode(',', $ip)[0];
}
echo getIP();

die();

/** Loads the WordPress Environment and Template */


require( dirname( __FILE__ ) . '/wp-blog-header.php' );
