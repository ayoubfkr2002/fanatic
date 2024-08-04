<?
// ################################
// #                                                             
// #  ======== Programming By supervirus ===========  
// #
// #    The Scripet Progeramed By super virus 
// #
// #  Copyright © 2011 super virus . All Rights Reserved. 
// #
// #  If you want any support vist this site.           
// #      https://www.facebook.com/l0ldz 
// #
// ################################
if (eregi("connect.php","$HTTP_SERVER_VARS[PHP_SELF]")) {
header("HTTP/1.0 404 Not Found");
exit();
}
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "aiaiai1";
$dbname = "v";
$prifex = "ana4is_";
define('prifex',$prifex);
mysql_connect($dbhost,$dbuser,$dbpass)or die (mysql_error());
mysql_select_db($dbname)or die (mysql_error());
$site_name = ".: script super virus of spam 2012 2013 v 1.0 :.";
$email_admin = "hakim44444@hotmail.com";
?>