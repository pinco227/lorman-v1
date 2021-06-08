<?php
$title = 'Produs LorMan Di Mano - din piele / ::Magazin Virtual:: Jachete Sacouri Geci Pantaloni Fuste Imbracaminte din Piele Naturala';
$desc = 'LorMan Di Mano - Produse din piele / ::Magazin Virtual:: Jachete Sacouri Geci Pantaloni Fuste Imbracaminte din Piele Naturala';
require_once('config.php');
include('header.php');

	if($_POST['cantitate'] != '')
	{
		$_SESSION['nume'] = $_POST['nume'];
		$_SESSION['pret'] = $_POST['pret'];
		$_SESSION['cantitate'] = $_POST['cantitate'];
		$_SESSION['culoare'] = $_POST['culoare'];
		$_SESSION['marime'] = $_POST['marime'];
		$_SESSION['gat'] = $_POST['gat'];
		$_SESSION['bust'] = $_POST['bust'];
		$_SESSION['sub_bust'] = $_POST['sub_bust'];
		$_SESSION['talie'] = $_POST['talie'];
		$_SESSION['solduri'] = $_POST['solduri'];
		$_SESSION['umar'] = $_POST['umar'];
		$_SESSION['maneca'] = $_POST['maneca'];
		$_SESSION['coapsa'] = $_POST['coapsa'];
		$_SESSION['terminatie'] = $_POST['terminatie'];
		$_SESSION['interior'] = $_POST['interior'];
		$_SESSION['lungime'] = $_POST['lungime'];
	
		if(($_SESSION['culoare'] == '') || ($_SESSION['cantitate'] == ''))
		{
			echo '<center><font color="red"><b>ERROR !</b>';
			if($_SESSION['culoare'] == '') echo 'Introdu culoarea dorita !';
			if($_SESSION['cantitate'] == '') echo 'Introdu cantitatea produsa !';
			echo '</font></center>';
		}
		else
		{		
			$table = getenv('REMOTE_ADDR');
			$table = str_replace('.','_', $table);
			
			$pret = $_SESSION['pret'];
			$nr_produse = $_SESSION['cantitate'];
			$pret2 = $pret * $nr_produse;
			
				$adaugaSQL1 = 'CREATE TABLE IF NOT EXISTS `'.$table.'` (
								`id` int(11) auto_increment,
								`nume` char(60),
								`pret` char(11),
								`cantitate` char(11),
								`culoare` char(20),
								`marime` char(20),
								`gat` char(11),
								`bust` char(11),
								`sub_bust` char(11),
								`talie` char(11),
								`solduri` char(11),
								`umar` char(11),
								`maneca` char(11),
								`coapsa` char(11),
								`terminatie` char(11),
								`interior` char(11),
								`lungime` char(11),
								PRIMARY KEY  (`id`));';
				mysqli_query($conexiune, $adaugaSQL1);
				
				$adaugaSQL2 = 'INSERT INTO `'.$table.'` (`nume`, `pret`, `cantitate`, `culoare`, `marime`, `gat`, `bust`, `sub_bust`, `talie`, `solduri`, `umar`, `maneca`, `coapsa`, `terminatie`, `interior`, `lungime`) 
                   			   VALUES ( 
							   "'.$_SESSION['nume'].'",
							   "'.$pret2.'",
							   "'.$_SESSION['cantitate'].'",
							   "'.$_SESSION['culoare'].'",
							   "'.$_SESSION['marime'].'",
							   "'.$_SESSION['gat'].'",
							   "'.$_SESSION['bust'].'",
							   "'.$_SESSION['sub_bust'].'",
							   "'.$_SESSION['talie'].'",
							   "'.$_SESSION['solduri'].'",
							   "'.$_SESSION['umar'].'",
							   "'.$_SESSION['maneca'].'",
							   "'.$_SESSION['coapsa'].'",
							   "'.$_SESSION['terminatie'].'",
							   "'.$_SESSION['interior'].'",
							   "'.$_SESSION['lungime'].'"
							   );';
				mysqli_query($conexiune, $adaugaSQL2);
				
				echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=vezi_cos.php">';
				
			$_SESSION['nume'] = '';
			$_SESSION['pret'] = '';
			$_SESSION['cantitate'] = '';
			$_SESSION['culoare'] = '';
			$_SESSION['marime'] = '';
			$_SESSION['gat'] = '';
			$_SESSION['bust'] = '';
			$_SESSION['sub_bust'] = '';
			$_SESSION['talie'] = '';
			$_SESSION['solduri'] = '';
			$_SESSION['umar'] = '';
			$_SESSION['maneca'] = '';
			$_SESSION['coapsa'] = '';
			$_SESSION['terminatie'] = '';
			$_SESSION['interior'] = '';
			$_SESSION['lungime'] = '';
		}
	}
	else
	{
		echo '<br>';
	}

	$cerereSQL = 'SELECT * FROM `produse` WHERE `id`="'.$_GET['id'].'"';
	$rezultat = mysqli_query($conexiune, $cerereSQL);
   
	while($rand = mysqli_fetch_assoc($rezultat)) 
	{
		if($rand['subcat'] == 'Pantaloni')
		{
			$_SESSION['pret'] = $rand['pret'];
			
			$string = $rand['culoare'];
			$exploded = explode (",", $string);
			
			$start = 0;
			$finish = count($exploded);
			$euro = round($rand['pret']/3);
			echo '<form action="'.$_SERVER['PHP_SELF'].'?id='.$_GET['id'].'" method="post" name="adauga_cos">
					<table border="0" cellpadding="0" cellspacing="0" align="center">
						<tr>
							<td colspan="2" align="center">
								<table border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
									<tr>
										<td width="9"><img src="images/a_22.gif" width="9" height="22" alt=""></td>
									    <td width="100%" align="center" valign="middle" class="other1" style="background-image:url(images/a_23.gif);">
											'.$rand['nume'].'
											<input type="hidden" name="nume" value="'.$rand['nume'].'">
										</td>
									    <td width="9" align="right"><img src="images/a_24.gif" width="9" height="22" alt=""></td>
									</tr>
								</table>
								</td>
						</tr>
						<tr>
						  	<td colspan="2" align="center" style="color: #E5C780; background-color: #766851; border-left-color: #412F13; border-left: solid; border-left-width: 1px; border-right-color: #412F13; border-right: solid; border-right-width: 1px; padding: 3px 3px 3px 3px;">
						  		'.$rand['descriere'].'
																										</td>
					  </tr>
						<tr>
						  	<td colspan="2" align="center" class="other">
								<font color="red">'.$rand['pret'].' RON / '.$euro.' &euro;</font>
																										</td>
					  </tr>
						<tr>
							<td colspan="2" align="center" class="other">
								<img src="images/'.$rand['poza'].'" border="1">							</td>
						</tr>
						<tr>
							<td align="right" style="border-left-color: #412F13; border-left: solid; border-left-width: 1px;">
								Culori disponibile :							</td>
							<td style="border-right-color: #412F13; border-right: solid; border-right-width: 1px;"><select name="culoare">';
								while ( $start < $finish )
								{
									echo '<option value="' . $exploded[$start] . '">' . $exploded[$start] . '</option>';
									$start = $start + 1;
								}
					  echo '</select></td>
						</tr>
						</tr class="other">
						<tr>
							<td align="right" style="border-left-color: #412F13; border-left: solid; border-left-width: 1px;">
								Cantitate :							</td>
							<td style="border-right-color: #412F13; border-right: solid; border-right-width: 1px;">
								<input type="text" name="cantitate" size="5" value="1">							</td>
						</tr>
						<tr class="other">
							<td align="right" style="border-left-color: #412F13; border-left: solid; border-left-width: 1px;">
								Marime :							</td>
							<td style="border-right-color: #412F13; border-right: solid; border-right-width: 1px;">
								<script type="text/javascript">
									function hideshow(which){
									if (!document.getElementById)
									return
									if (which.style.display=="none")
									which.style.display="block"
									else
									which.style.display="none"
									}
								</script>
		
								<select name="marime" size="1">
									<option selected="selected" value=""></option>
									<option value="28">28</option>
									<option value="30">30</option>
									<option value="32">32</option>
									<option value="34">34</option>
									<option value="36">36</option>
									<option value="38">38</option>
									<option value="40">40</option>
								</select>							</td>
						</tr>
						<tr class="other">
							<td colspan="2" class="other">
							<center>SAU TRECE-TI DIMENSIUNILE TALE</center>
							</td>
						</tr>
						<tr class="other">
							<td style="border-left-color: #412F13; border-left: solid; border-left-width: 1px;">
								<table>
									<tr><td>Lungime :</td>
										<td><input type="text" name="lungime" size="10" value="-" maxlength="4"> cm</td>
									</tr>
									<tr><td>Talie :</td>
										<td><input type="text" name="talie" size="10" value="-" maxlength="4"> cm</td>
									</tr>
									<tr><td>Solduri :</td>
										<td><input type="text" name="solduri" size="10" value="-" maxlength="4"> cm</td>
									</tr>
									<tr><td>Coapsa :</td>
										<td><input type="text" name="coapsa" size="10" value="-" maxlength="4"> cm</td>
									</tr>
									<tr><td>Terminatie :</td>
										<td>
											<select name="terminatie">
												<option value="-">-</option>
												<option value="evazat">Evazat</option>
												<option value="drept">Drept</option>
												<option value="pana">Pana</option>
											</select>										</td>
									</tr>
									<tr><td>Interior :</td>
										<td><input type="text" name="interior" size="10" value="-" maxlength="4"> cm</td>
									</tr>
								</table>							</td>
							<td style="border-right-color: #412F13; border-right: solid; border-right-width: 1px;">
								<img src="images/pantalon.jpg">							</td>
						</tr>
						<tr class="other">
							<td colspan="2" align="center" class="other">
								<input type="hidden" name="pret" value="'.$rand['pret'].'">
								<input type="hidden" name="maneca" value="-">
								<input type="hidden" name="umar" value="-">
								<input type="hidden" name="gat" value="-">
								<input type="hidden" name="bust" value="-">
								<input type="hidden" name="sub_bust" value="-">
								<input type="image" src="images/adauga.gif" name="adauga" value="Adauga in cos !" style="width: 150px; height: 40px;">							</td>
						</tr>
						<tr>
							<td colspan="2">
								<table width="100%" cellpadding="0" cellspacing="0" border="0">
									<tr>
										<td width="9" height="9"><img src="images/a_26.gif" width="9" height="9" alt=""></td>
										<td height="9" style="background-image:url(images/a_27.gif);" width="100%"></td>
										<td width="9" height="9"><img src="images/a_28.gif" width="9" height="9" alt=""></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
</form>';
		}
		elseif($rand['subcat'] == 'Corsete')
		{
			$_SESSION['pret'] = $rand['pret'];
		
			$string = $rand['culoare'];
			$exploded = explode (",", $string);
			
			$start = 0;
			$finish = count($exploded);
			$euro = round($rand['pret']/3);
			echo '<form action="'.$_SERVER['PHP_SELF'].'?id='.$_GET['id'].'" method="post" name="adauga_cos">
					<table border="0" cellpadding="0" cellspacing="0" align="center">
						<tr>
							<td colspan="2" align="center">
								<table border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
									<tr>
										<td width="9"><img src="images/a_22.gif" width="9" height="22" alt=""></td>
									    <td width="100%" align="center" valign="middle" class="other1" style="background-image:url(images/a_23.gif);">
											'.$rand['nume'].'
											<input type="hidden" name="nume" value="'.$rand['nume'].'">
										</td>
									    <td width="9" align="right"><img src="images/a_24.gif" width="9" height="22" alt=""></td>
									</tr>
								</table>
								</td>
						</tr>
						<tr>
						  	<td colspan="2" align="center" style="background-color: #766851;" class="other">
						  		'.$rand['descriere'].'
						  </td>
					  </tr>
						<tr>
						  	<td colspan="2" align="center" class="other">
								<font color="red">'.$rand['pret'].' RON / '.$euro.' &euro;</font>
						  </td>
					  </tr>
						<tr>
							<td colspan="2" align="center" class="other">
								<img src="images/'.$rand['poza'].'" border="1">							</td>
						</tr>
						<tr>
							<td align="right" style="border-left-color: #412F13; border-left: solid; border-left-width: 1px;">
								Culori disponibile :							</td>
							<td style="border-right-color: #412F13; border-right: solid; border-right-width: 1px;"><select name="culoare">';
								while ( $start < $finish )
								{
									echo '<option value="' . $exploded[$start] . '">' . $exploded[$start] . '</option>';
									$start = $start + 1;
								}
					  echo '</select></td>
						</tr>
						</tr class="other">
						<tr>
							<td align="right" style="border-left-color: #412F13; border-left: solid; border-left-width: 1px;">
								Cantitate :							</td>
							<td style="border-right-color: #412F13; border-right: solid; border-right-width: 1px;">
								<input type="text" name="cantitate" size="25" value="1">							</td>
						</tr>
						<tr class="other">
							<td align="right" style="border-left-color: #412F13; border-left: solid; border-left-width: 1px;">
								Marime :							</td>
							<td style="border-right-color: #412F13; border-right: solid; border-right-width: 1px;">
								<script type="text/javascript">
									function hideshow(which){
									if (!document.getElementById)
									return
									if (which.style.display=="none")
									which.style.display="block"
									else
									which.style.display="none"
									}
								</script>
		
								<select name="marime" size="1">
									<option selected="selected" value=""></option>
									<option value="XS">XS</option>
									<option value="S">S</option>
									<option value="M">M</option>
									<option value="L">L</option>
									<option value="XL">XL</option>
									<option value="XXL">XXL</option>
								</select>							</td>
						</tr>
						<tr class="other">
							<td colspan="2" class="other">
							<center>SAU TRECE-TI DIMENSIUNILE TALE</center>
							</td>
						</tr>
						<tr class="other">
							<td style="border-left-color: #412F13; border-left: solid; border-left-width: 1px;">
								<table>
									<tr><td>Lungime :</td>
										<td><input type="text" name="lungime" size="10" value="-" maxlength="4"> cm</td>
									</tr>
									<tr><td>Gat :</td>
										<td><input type="text" name="gat" size="10" value="-" maxlength="4"> cm</td>
									</tr>
									<tr><td>Bust :</td>
										<td><input type="text" name="bust" size="10" value="-" maxlength="4"> cm</td>
									</tr>
									<tr><td>Sub bust :</td>
										<td><input type="text" name="sub_bust" size="10" value="-" maxlength="4"> cm</td>
									</tr>
								</table>							</td>
							<td style="border-right-color: #412F13; border-right: solid; border-right-width: 1px;">
								<img src="images/corset.jpg">							</td>
						</tr>
						<tr class="other">
							<td colspan="2" align="center" class="other">
								<input type="hidden" name="pret" value="'.$rand['pret'].'">
								<input type="hidden" name="maneca" value="-">
								<input type="hidden" name="umar" value="-">
								<input type="hidden" name="talie" value="-">
								<input type="hidden" name="coapsa" value="-">
								<input type="hidden" name="terminatie" value="-">
								<input type="hidden" name="interior" value="-">
								<input type="hidden" name="solduri" value="-">
								<input type="image" src="images/adauga.gif" name="adauga" value="Adauga in cos !" style="width: 150px; height: 40px;">							</td>
						</tr>
						<tr>
							<td colspan="2">
								<table width="100%" cellpadding="0" cellspacing="0" border="0">
									<tr>
										<td width="9" height="9"><img src="images/a_26.gif" width="9" height="9" alt=""></td>
										<td height="9" style="background-image:url(images/a_27.gif);" width="100%"></td>
										<td width="9" height="9"><img src="images/a_28.gif" width="9" height="9" alt=""></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
</form>';
		}
		elseif($rand['subcat'] == 'Pantaloni scurti')
		{
			$_SESSION['pret'] = $rand['pret'];
		
			$string = $rand['culoare'];
			$exploded = explode (",", $string);
			
			$start = 0;
			$finish = count($exploded);
			$euro = round($rand['pret']/3);
			echo '<form action="'.$_SERVER['PHP_SELF'].'?id='.$_GET['id'].'" method="post" name="adauga_cos">
					<table border="0" cellpadding="0" cellspacing="0" align="center">
						<tr>
							<td colspan="2" align="center">
								<table border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
									<tr>
										<td width="9"><img src="images/a_22.gif" width="9" height="22" alt=""></td>
									    <td width="100%" align="center" valign="middle" class="other1" style="background-image:url(images/a_23.gif);">
											'.$rand['nume'].'
											<input type="hidden" name="nume" value="'.$rand['nume'].'">
										</td>
									    <td width="9" align="right"><img src="images/a_24.gif" width="9" height="22" alt=""></td>
									</tr>
								</table>
								</td>
						</tr>
						<tr>
						  	<td colspan="2" align="center" style="background-color: #766851;" class="other">
						  		'.$rand['descriere'].'
						  </td>
					  </tr>
						<tr>
						  	<td colspan="2" align="center" class="other">
								<font color="red">'.$rand['pret'].' RON / '.$euro.' &euro;</font>
						  </td>
					  </tr>
						<tr>
							<td colspan="2" align="center" class="other">
								<img src="images/'.$rand['poza'].'" border="1">							</td>
						</tr>
						<tr>
							<td align="right" style="border-left-color: #412F13; border-left: solid; border-left-width: 1px;">
								Culori disponibile :							</td>
							<td style="border-right-color: #412F13; border-right: solid; border-right-width: 1px;"><select name="culoare">';
								while ( $start < $finish )
								{
									echo '<option value="' . $exploded[$start] . '">' . $exploded[$start] . '</option>';
									$start = $start + 1;
								}
					  echo '</select></td>
						</tr>
						</tr class="other">
						<tr>
							<td align="right" style="border-left-color: #412F13; border-left: solid; border-left-width: 1px;">
								Cantitate :							</td>
							<td style="border-right-color: #412F13; border-right: solid; border-right-width: 1px;">
								<input type="text" name="cantitate" size="25" value="1">							</td>
						</tr>
						<tr class="other">
							<td align="right" style="border-left-color: #412F13; border-left: solid; border-left-width: 1px;">
								Marime :							</td>
							<td style="border-right-color: #412F13; border-right: solid; border-right-width: 1px;">
								<script type="text/javascript">
									function hideshow(which){
									if (!document.getElementById)
									return
									if (which.style.display=="none")
									which.style.display="block"
									else
									which.style.display="none"
									}
								</script>
		
								<select name="marime" size="1">
									<option selected="selected" value=""></option>
									<option value="0">0</option>
									<option value="2">2</option>
									<option value="4">4</option>
									<option value="6">6</option>
									<option value="8">8</option>
									<option value="10">10</option>
									<option value="12">12</option>
									<option value="14">14</option>
									<option value="16">16</option>
								</select>							</td>
						</tr>
						<tr class="other">
							<td colspan="2" class="other">
							<center>SAU TRECE-TI DIMENSIUNILE TALE</center>
							</td>
						</tr>
						<tr class="other">
							<td style="border-left-color: #412F13; border-left: solid; border-left-width: 1px;">
								<table>
									<tr><td>Lungime :</td>
										<td><input type="text" name="lungime" size="10" value="-" maxlength="4"> cm</td>
									</tr>
									<tr><td>Talie :</td>
										<td><input type="text" name="talie" size="10" value="-" maxlength="4"> cm</td>
									</tr>
									<tr><td>Solduri :</td>
										<td><input type="text" name="solduri" size="10" value="-" maxlength="4"> cm</td>
									</tr>
									<tr><td>Coapsa :</td>
										<td><input type="text" name="coapsa" size="10" value="-" maxlength="4"> cm</td>
									</tr>
								</table>							</td>
							<td style="border-right-color: #412F13; border-right: solid; border-right-width: 1px;">
								<img src="images/sort.jpg">							</td>
						</tr>
						<tr class="other">
							<td colspan="2" align="center" class="other">
								<input type="hidden" name="pret" value="'.$rand['pret'].'">
								<input type="hidden" name="maneca" value="-">
								<input type="hidden" name="umar" value="-">
								<input type="hidden" name="bust" value="-">
								<input type="hidden" name="sub_bust" value="-">
								<input type="hidden" name="terminatie" value="-">
								<input type="hidden" name="interior" value="-">
								<input type="hidden" name="gat" value="-">
								<input type="image" src="images/adauga.gif" name="adauga" value="Adauga in cos !" style="width: 150px; height: 40px;">							</td>
						</tr>
						<tr>
							<td colspan="2">
								<table width="100%" cellpadding="0" cellspacing="0" border="0">
									<tr>
										<td width="9" height="9"><img src="images/a_26.gif" width="9" height="9" alt=""></td>
										<td height="9" style="background-image:url(images/a_27.gif);" width="100%"></td>
										<td width="9" height="9"><img src="images/a_28.gif" width="9" height="9" alt=""></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
</form>';
		}
		elseif($rand['subcat'] == 'Fuste')
		{
			$_SESSION['pret'] = $rand['pret'];
		
			$string = $rand['culoare'];
			$exploded = explode (",", $string);
			
			$start = 0;
			$finish = count($exploded);
			$euro = round($rand['pret']/3);
			echo '<form action="'.$_SERVER['PHP_SELF'].'?id='.$_GET['id'].'" method="post" name="adauga_cos">
					<table border="0" cellpadding="0" cellspacing="0" align="center">
						<tr>
							<td colspan="2" align="center">
								<table border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
									<tr>
										<td width="9"><img src="images/a_22.gif" width="9" height="22" alt=""></td>
									    <td width="100%" align="center" valign="middle" class="other1" style="background-image:url(images/a_23.gif);">
											'.$rand['nume'].'
											<input type="hidden" name="nume" value="'.$rand['nume'].'">
										</td>
									    <td width="9" align="right"><img src="images/a_24.gif" width="9" height="22" alt=""></td>
									</tr>
								</table>
								</td>
						</tr>
						<tr>
						  	<td colspan="2" align="center" style="background-color: #766851;" class="other">
						  		'.$rand['descriere'].'
						  </td>
					  </tr>
						<tr>
						  	<td colspan="2" align="center" class="other">
								<font color="red">'.$rand['pret'].' RON / '.$euro.' &euro;</font>
						  </td>
					  </tr>
						<tr>
							<td colspan="2" align="center" class="other">
								<img src="images/'.$rand['poza'].'" border="1">							</td>
						</tr>
						<tr>
							<td align="right" style="border-left-color: #412F13; border-left: solid; border-left-width: 1px;">
								Culori disponibile :							</td>
							<td style="border-right-color: #412F13; border-right: solid; border-right-width: 1px;"><select name="culoare">';
								while ( $start < $finish )
								{
									echo '<option value="' . $exploded[$start] . '">' . $exploded[$start] . '</option>';
									$start = $start + 1;
								}
					  echo '</select></td>
						</tr>
						</tr class="other">
						<tr>
							<td align="right" style="border-left-color: #412F13; border-left: solid; border-left-width: 1px;">
								Cantitate :							</td>
							<td style="border-right-color: #412F13; border-right: solid; border-right-width: 1px;">
								<input type="text" name="cantitate" size="25" value="1">							</td>
						</tr>
						<tr class="other">
							<td align="right" style="border-left-color: #412F13; border-left: solid; border-left-width: 1px;">
								Marime :							</td>
							<td style="border-right-color: #412F13; border-right: solid; border-right-width: 1px;">
								<script type="text/javascript">
									function hideshow(which){
									if (!document.getElementById)
									return
									if (which.style.display=="none")
									which.style.display="block"
									else
									which.style.display="none"
									}
								</script>
		
								<select name="marime" size="1">
									<option selected="selected" value=""></option>
									<option value="36">36</option>
									<option value="38">38</option>
									<option value="40">40</option>
									<option value="42">42</option>
									<option value="44">44</option>
									<option value="46">46</option>
								</select>							</td>
						</tr>
						<tr class="other">
							<td colspan="2" class="other">
							<center>SAU TRECE-TI DIMENSIUNILE TALE</center>
							</td>
						</tr>
						<tr class="other">
							<td style="border-left-color: #412F13; border-left: solid; border-left-width: 1px;">
								<table>
									<tr><td>Lungime :</td>
										<td><input type="text" name="lungime" size="10" value="-" maxlength="4"> cm</td>
									</tr>
									<tr><td>Talie :</td>
										<td><input type="text" name="talie" size="10" value="-" maxlength="4"> cm</td>
									</tr>
									<tr><td>Solduri :</td>
										<td><input type="text" name="solduri" size="10" value="-" maxlength="4"> cm</td>
									</tr>
								</table>							</td>
							<td style="border-right-color: #412F13; border-right: solid; border-right-width: 1px;">
								&nbsp;							</td>
						</tr>
						<tr class="other">
							<td colspan="2" align="center" class="other">
								<input type="hidden" name="pret" value="'.$rand['pret'].'">
								<input type="hidden" name="maneca" value="-">
								<input type="hidden" name="umar" value="-">
								<input type="hidden" name="coapsa" value="-">
								<input type="hidden" name="terminatie" value="-">
								<input type="hidden" name="interior" value="-">
								<input type="hidden" name="gat" value="-">
								<input type="hidden" name="bust" value="-">
								<input type="hidden" name="sub_bust" value="-">
								<input type="image" src="images/adauga.gif" name="adauga" value="Adauga in cos !" style="width: 150px; height: 40px;">							</td>
						</tr>
						<tr>
							<td colspan="2">
								<table width="100%" cellpadding="0" cellspacing="0" border="0">
									<tr>
										<td width="9" height="9"><img src="images/a_26.gif" width="9" height="9" alt=""></td>
										<td height="9" style="background-image:url(images/a_27.gif);" width="100%"></td>
										<td width="9" height="9"><img src="images/a_28.gif" width="9" height="9" alt=""></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
</form>';
		}
		else
		{
			$_SESSION['pret'] = $rand['pret'];
		
			$string = $rand['culoare'];
			$exploded = explode (",", $string);
			
			$start = 0;
			$finish = count($exploded);
			$euro = round($rand['pret']/3);
			echo '<form action="'.$_SERVER['PHP_SELF'].'?id='.$_GET['id'].'" method="post" name="adauga_cos">
					<table border="0" cellpadding="0" cellspacing="0" align="center">
						<tr>
							<td colspan="2" align="center">
								<table border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
									<tr>
										<td width="9"><img src="images/a_22.gif" width="9" height="22" alt=""></td>
									    <td width="100%" align="center" valign="middle" class="other1" style="background-image:url(images/a_23.gif);">
											'.$rand['nume'].'
											<input type="hidden" name="nume" value="'.$rand['nume'].'">
										</td>
									    <td width="9" align="right"><img src="images/a_24.gif" width="9" height="22" alt=""></td>
									</tr>
								</table>
								</td>
						</tr>
						<tr>
						  	<td colspan="2" align="center" style="background-color: #766851;" class="other">
						  		'.$rand['descriere'].'
						  </td>
					  </tr>
						<tr>
						  	<td colspan="2" align="center" class="other">
								<font color="red">'.$rand['pret'].' RON / '.$euro.' &euro;</font>
						  </td>
					  </tr>
						<tr>
							<td colspan="2" align="center" class="other">
								<img src="images/'.$rand['poza'].'" border="1">							</td>
						</tr>
						<tr>
							<td align="right" style="border-left-color: #412F13; border-left: solid; border-left-width: 1px;">
								Culori disponibile :							</td>
							<td style="border-right-color: #412F13; border-right: solid; border-right-width: 1px;"><select name="culoare">';
								while ( $start < $finish )
								{
									echo '<option value="' . $exploded[$start] . '">' . $exploded[$start] . '</option>';
									$start = $start + 1;
								}
					  echo '</select></td>
						</tr>
						</tr class="other">
						<tr>
							<td align="right" style="border-left-color: #412F13; border-left: solid; border-left-width: 1px;">
								Cantitate :							</td>
							<td style="border-right-color: #412F13; border-right: solid; border-right-width: 1px;">
								<input type="text" name="cantitate" size="25" value="1">							</td>
						</tr>
						<tr class="other">
							<td align="right" style="border-left-color: #412F13; border-left: solid; border-left-width: 1px;">
								Marime :							</td>
							<td style="border-right-color: #412F13; border-right: solid; border-right-width: 1px;">
								<script type="text/javascript">
									function hideshow(which){
									if (!document.getElementById)
									return
									if (which.style.display=="none")
									which.style.display="block"
									else
									which.style.display="none"
									}
								</script>
		
								<select name="marime" size="1">
									<option selected="selected" value=""></option>
									<option value="XS">XS</option>
									<option value="S">S</option>
									<option value="M">M</option>
									<option value="L">L</option>
									<option value="XL">XL</option>
									<option value="XXL">XXL</option>
								</select>							</td>
						</tr>
						<tr class="other">
							<td colspan="2" class="other">
							<center>SAU TRECE-TI DIMENSIUNILE TALE</center>
							</td>
						</tr>
						<tr class="other">
							<td style="border-left-color: #412F13; border-left: solid; border-left-width: 1px;">
								<table>
									<tr><td>Lungime :</td>
										<td><input type="text" name="lungime" size="10" value="-" maxlength="4"> cm</td>
									</tr>
									<tr><td>Umar :</td>
										<td><input type="text" name="umar" size="10" value="-" maxlength="4"> cm</td>
									</tr>
									<tr><td>Gat :</td>
										<td><input type="text" name="gat" size="10" value="-" maxlength="4"> cm</td>
									</tr>
									<tr><td>Bust :</td>
										<td><input type="text" name="bust" size="10" value="-" maxlength="4"> cm</td>
									</tr>
									<tr><td>Talie :</td>
										<td><input type="text" name="talie" size="10" value="-" maxlength="4"> cm</td>
									</tr>
									<tr><td>Solduri :</td>
										<td><input type="text" name="solduri" size="10" value="-" maxlength="4"> cm</td>
									</tr>
									<tr><td>Maneca :</td>
										<td><input type="text" name="maneca" size="10" value="-" maxlength="4"> cm</td>
									</tr>
								</table>							</td>
							<td style="border-right-color: #412F13; border-right: solid; border-right-width: 1px;">
								<img src="images/geaca.jpg">							</td>
						</tr>
						<tr class="other">
							<td colspan="2" align="center" class="other">
								<input type="hidden" name="pret" value="'.$rand['pret'].'">
								<input type="hidden" name="coapsa" value="-">
								<input type="hidden" name="terminatie" value="-">
								<input type="hidden" name="interior" value="-">
								<input type="hidden" name="sub_bust" value="-">
								<input type="image" src="images/adauga.gif" name="adauga" value="Adauga in cos !" style="width: 150px; height: 40px;">							</td>
						</tr>
						<tr>
							<td colspan="2">
								<table width="100%" cellpadding="0" cellspacing="0" border="0">
									<tr>
										<td width="9" height="9"><img src="images/a_26.gif" width="9" height="9" alt=""></td>
										<td height="9" style="background-image:url(images/a_27.gif);" width="100%"></td>
										<td width="9" height="9"><img src="images/a_28.gif" width="9" height="9" alt=""></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
</form>';
		}
	}
	
require('footer.php');
