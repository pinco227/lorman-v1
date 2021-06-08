<?php
$title = 'LorMan Di Mano - pagina de administrare';
$desc = 'LorMan Di Mano - pagina de administrare / cele mai frumoase haine din piele facute cu cea mai noua tehnologie. Jachete, geci, sacouri, pantaloni, fuste din piele naturala';
require_once('config.php');
include('header.php');
if (!isset($_SESSION['logat'])) $_SESSION['logat'] = 'Nu';

if ($_SESSION['logat'] == 'Da') {

	if (isset($_POST['add'])) {
		$_SESSION['nume'] = $_POST['nume'];
		$_SESSION['descriere'] = $_POST['descriere'];
		$_SESSION['culori'] = $_POST['culori'];
		$_SESSION['pret'] = $_POST['pret'];
		$_SESSION['cat'] = $_POST['cat'];
		$_SESSION['subcat'] = $_POST['subcat'];
		$_SESSION['imp'] = $_POST['imp'];

		if (($_SESSION['nume'] == '') || ($_SESSION['descriere'] == '') || ($_SESSION['culori'] == '') || ($_SESSION['pret'] == '') || ($_SESSION['cat'] == '')) {
			echo '<font color="red"><center><b>ERROR !</b><br><br>';
			if ($_SESSION['nume'] == '') echo 'Introdu te rog numele produsului !<br>';
			if ($_SESSION['descriere'] == '') echo 'Introdu te rog descrierea produsului !<br>';
			if ($_SESSION['culori'] == '') echo 'Introdu te rog culorile disponibile acestui produs !<br>';
			if ($_SESSION['pret'] == '') echo 'Introdu te rog pretul produsului !<br>';
			if ($_SESSION['cat'] == '') echo 'Alege te rog colectia din care face parte produsul !<br>';
			echo '</center></font>';
		} else {

			$uploadpath = "images/";
			$file = $_SESSION['nume'] . '.jpg';
			$uploadpath = $uploadpath . basename($file);
			if (!move_uploaded_file($_FILES["poza"]["tmp_name"], $uploadpath))
				die("There was an error uploading the file, please try again!");

			$image_name = "images/" . $_FILES["poza"]["name"];
			$nume_nou = $_SESSION['nume'] . ".jpg";
			list($width, $height) = getimagesize($image_name);
			$new_image_name = "images/thumb_" . $_SESSION['nume'] . ".jpg";
			$ratio = ($width / 100);
			$new_width = 100;
			$new_height = ($height / $ratio);
			$image_p = imagecreatetruecolor($new_width, $new_height);
			$image = imagecreatefromjpeg($image_name);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
			imagejpeg($image_p, $new_image_name, 100);


			$cerereSQL = "INSERT INTO `produse` ( `nume`, `descriere`, `culoare`, `pret`, `poza`, `cat`, `subcat`, `imp`) 
										VALUES ( '" . htmlentities($_SESSION['nume'], ENT_QUOTES) . "', 
												 '" . htmlentities($_SESSION['descriere'], ENT_QUOTES) . "', 
												 '" . htmlentities($_SESSION['culori'], ENT_QUOTES) . "', 
												 '" . htmlentities($_SESSION['pret'], ENT_QUOTES) . "',
												 '" . htmlentities($nume_nou, ENT_QUOTES) . "',
												 '" . htmlentities($_SESSION['cat'], ENT_QUOTES) . "',
												 '" . htmlentities($_SESSION['subcat'], ENT_QUOTES) . "',
												 '" . htmlentities($_SESSION['imp'], ENT_QUOTES) . "')";
			mysqli_query($conexiune, $cerereSQL) or die("<center><b><font color='red'>Adaugarea nu a putut fi realizata !</font></b></center>");
			echo '<font color="green"><center><b>Produsul s-a adaugat cu succes !</b></center></font><br>';
		}

		$_SESSION['nume'] = '';
		$_SESSION['descriere'] = '';
		$_SESSION['culori'] = '';
		$_SESSION['pret'] = '';
		$_SESSION['cat'] = '';
		$_SESSION['subcat'] = '';
		$_SESSION['imp'] = '';
	} elseif (isset($_POST['add2'])) {
		$_SESSION['text'] = $_POST['text'];

		if ($_SESSION['text'] == '') {
			echo '<font color="red"><center><b>ERROR !</b><br>';
			echo 'Adauga textul anuntului !<br>';
			echo '</center></font>';
		} else {
			$cerereSQL = "INSERT INTO `anunturi` ( `text` ) 
										VALUES ( '" . htmlentities($_SESSION['text'], ENT_QUOTES) . "' )";
			mysqli_query($conexiune, $cerereSQL) or die("<center><b><font color='red'>Adaugarea nu a putut fi realizata !</font></b></center>");
			echo '<font color="green"><center><b>Anuntul s-a adaugat cu succes !</b></center></font><br>';
		}
		$_SESSION['text'] = '';
	} else {
		echo '<br>';
	}

	//
	//  ADAUGA PRODUS
	//

	echo '<table border="0" cellspacing="0" cellpadding="0" width="500" align="center">
				<tr height="22">
					<td width="9"><img src="images/a_22.gif" width="9" height="22" /></td>
					<td width="100%" align="center" valign="middle" background="images/a_23.gif" class="other1">Adauga produs nou ! Introdu datele cu grija !</td>
					<td width="9" align="right"><img src="images/a_24.gif" width="9" height="22" /></td>
				</tr>
				<tr><td class="other" align="center" colspan="3" width="296">';
	echo '<form name="add" action="' . $_SERVER['PHP_SELF'] . '" method="post" enctype="multipart/form-data">
			<table border="0" align="center" width="490">
			<tr>
			<td align="right" width="200"><b>Nume:</b></td>
			<td width="390" align="left"><input type="text" size="30" name="nume"></td>   
			</tr><tr>
			<td align="right"><b>Descriere:</b></td>
			<td align="left"><textarea cols="23" rows="3" name="descriere"></textarea></td>   
			</tr><tr>
			<td align="right"><b>Culori:</b></td>
			<td align="left"><input type="text" size="30" name="culori"></td>   
			</tr><tr>
			<td align="right"><b>Pret:</b></td>
			<td align="left"><input type="text" size="30" name="pret"> RON</td>   
			</tr><tr>
			<td align="right"><b>Colectii:</b></td>
			<td align="left">
			<select name="cat" size="1" onChange="redirect(this.options.selectedIndex)">
				<option value="">--Alege1--</option>
				<option value="Femei">Femei</option>
				<option value="Barbati">Barbati</option>
				<option value="Bussines">Bussines</option>
			</select>
			<select name="subcat" size="1">
				<option value="">--Alege2--</option>
			</select>
			<script>
			
				var groups=document.add.cat.options.length
				var group=new Array(groups)
				for (i=0; i<groups; i++)
				group[i]=new Array()
			
				group[0][0]=new Option("","--Alege2--")
				
				group[1][0]=new Option("Sacouri","Sacouri")
				group[1][1]=new Option("Scurte","Scurte")
				group[1][2]=new Option("Haine lungi","Haine lungi")
				group[1][3]=new Option("Jackete","Jackete")
				group[1][4]=new Option("Veste","Veste")
				group[1][5]=new Option("Biker","Biker")
				group[1][6]=new Option("Pantaloni","Pantaloni")
				group[1][7]=new Option("Rochii","Rochii")
				group[1][8]=new Option("Fuste","Fuste")
				group[1][9]=new Option("Pantaloni scurti","Pantaloni scurti")
				group[1][10]=new Option("Corsete","Corsete")
				
				group[2][0]=new Option("Sacouri","Sacouri")
				group[2][1]=new Option("Scurte","Scurte")
				group[2][2]=new Option("Haine lungi","Haine lungi")
				group[2][3]=new Option("Jackete","Jackete")
				group[2][4]=new Option("Veste","Veste")
				group[2][5]=new Option("Biker","Biker")
				group[2][6]=new Option("House","House")
				group[2][7]=new Option("Pantaloni","Pantaloni")
				
				group[3][0]=new Option("Masculin","Masculin")
				group[3][1]=new Option("Dama","Dama")

				var temp=document.add.subcat

				function redirect(x){
				for (m=temp.options.length-1;m>0;m--)
				temp.options[m]=null
				for (i=0;i<group[x].length;i++){
				temp.options[i]=new Option(group[x][i].text,group[x][i].value)
				}
				temp.options[0].selected=true
				}

			</script>
			</td>   
			</tr><tr>
    		<td align="right"><b>Importanta:</b></td>
    		<td align="left">
				<select name="imp">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
			</td>
  			</tr><tr>
    		<td align="right"><b>Imagine:</b></td>
    		<td align="left"><input name="poza" id="poza" size="17" type="file"></td>
  			</tr><tr>
			<td align="center" colspan="2"><input name="add" type="submit" value="Adauga" id="add"></td>
			</tr>
			</table></form></center></td></tr>';

	echo '<tr height="0">
					<td><img src="images/a_26.gif" width="9" height="9" /></td>
					<td background="images/a_27.gif"></td>
					<td width="9" align="right"><img src="images/a_28.gif" width="9" height="9" /></td>
				</tr>
			  </table><br><br><br>';
	//  END

	//
	//	ADAUGA ANUNT
	//

	echo '<table border="0" cellspacing="0" cellpadding="0" width="500" align="center">
				<tr height="22">
					<td width="9"><img src="images/a_22.gif" width="9" height="22" /></td>
					<td width="100%" align="center" valign="middle" background="images/a_23.gif" class="other1">Adauga anunt !</td>
					<td width="9" align="right"><img src="images/a_24.gif" width="9" height="22" /></td>
				</tr>
				<tr><td class="other" align="center" colspan="3" width="296">';

	echo '<form name="add2" action="' . $_SERVER['PHP_SELF'] . '" method="post" enctype="multipart/form-data">
				<table border="0" align="center" width="490">
					<tr>
						<td align="right" width="200"><b>Text:</b></td>
						<td align="left"><textarea cols="23" rows="3" name="text"></textarea></td>   
					</tr>
					<tr>
						<td align="center" colspan="2"><input name="add2" type="submit" value="Adauga" id="add"></td>
					</tr>
				</table></form></center></td></tr>';

	echo '<tr height="0">
					<td><img src="images/a_26.gif" width="9" height="9" /></td>
					<td background="images/a_27.gif"></td>
					<td width="9" align="right"><img src="images/a_28.gif" width="9" height="9" /></td>
				</tr>
			  </table><br><br><br>';

	//  END

	//
	//	EDITEAZA ANUNTURI
	//

	echo '<table border="0" cellspacing="0" cellpadding="0" width="610" align="center" style="margin-top: 0px;">
						<tr height="22">
							<td width="9"><img src="images/a_22.gif" width="9" height="22" /></td>
							<td width="100%" align="center" valign="middle" background="images/a_23.gif" class="other1">Lista de anunturi !</td>
							<td width="9" align="right"><img src="images/a_24.gif" width="9" height="22" /></td>
						</tr>
						<tr><td class="other" align="center" colspan="3" width="296">';
	echo '<table width="610" border="1" cellspacing="1" cellpadding="0" border="1" bordercolor="#FFFFFF" align="center"><tr>';

	$cerereSQL = 'SELECT * FROM `anunturi` ORDER BY `id`';
	$rezultat = mysqli_query($conexiune, $cerereSQL);

	while ($rand = mysqli_fetch_assoc($rezultat)) {
		echo '-<b>' . $rand['id'] . '</b>) ' . $rand['text'] . ' <a href="delete2.php?id=' . $rand['id'] . '">[STERGE]</a><br>';
	}
	echo '		</tr></table>';
	echo '		<tr height="0">
							<td><img src="images/a_26.gif" width="9" height="9" /></td>
							<td background="images/a_27.gif"></td>
							<td width="9" align="right"><img src="images/a_28.gif" width="9" height="9" /></td>
						</tr>
				 </table><br><br><br>';

	//	END

	//
	//  EDITEAZA PRODUSE
	//

	$rezultate_maxime = 14;
	$intrari_totale = mysqli_num_rows(mysqli_query($conexiune, 'SELECT `id` FROM `produse`'));
	if (!isset($_GET['page'])) $pagina = 1;
	else $pagina = $_GET['page'];
	$nr = 0;
	$from = (($pagina * $rezultate_maxime) - $rezultate_maxime);
	$cerereSQL = 'SELECT * FROM `produse` ORDER BY `id` DESC LIMIT ' . $from . ', ' . $rezultate_maxime . '';
	$rezultat = mysqli_query($conexiune, $cerereSQL);

	$pagini_totale = ceil($intrari_totale / $rezultate_maxime);

	if ($pagina > $pagini_totale) echo 'Pagina nu exista !';
	else {
		if ($pagini_totale > 0) {
			echo '<table border="0" cellspacing="0" cellpadding="0" width="610" align="center" style="margin-top: 0px;">
						<tr height="22">
							<td width="9"><img src="images/a_22.gif" width="9" height="22" /></td>
							<td width="100%" align="center" valign="middle" background="images/a_23.gif" class="other1">Lista de produse ! Editare , stergere !</td>
							<td width="9" align="right"><img src="images/a_24.gif" width="9" height="22" /></td>
						</tr>
						<tr><td class="other" align="center" colspan="3" width="296">';
			echo '<table width="610" border="1" cellspacing="1" cellpadding="0" border="1" bordercolor="#FFFFFF" align="center"><tr>';

			while ($rand = mysqli_fetch_assoc($rezultat)) {
				$nr++;
				if (!file_exists('images/thumb_' . $rand['poza'] . '')) $imgsrc = 'images/' . $rand['poza'] . '';
				else $imgsrc = 'images/thumb_' . $rand['poza'] . '';
				echo '<td style="border-top-color: #412F13; border-top: solid; border-top-width: 1px; border-bottom-color: #412F13; border-bottom: solid; border-bottom-width: 1px;" class="other" width="305"><table width="305" cellspacing="0" cellpadding="2"><tr><td width="100" align="center" valign="middle"><img src="' . $imgsrc . '" width="100" border="1"></td>
									<td width="200"><b><font color="#003366">' . $rand['nume'] . '</font></b><br>
									' . $rand['descriere'] . '<br>
									<div align="right"><font color="#0066CC"><a href="edit.php?id=' . $rand['id'] . '">EDITEAZA</a> | <a href="delete.php?id=' . $rand['id'] . '">STERGE</a></font></div><br>
									Culori disponibile : <b>' . $rand['culoare'] . '</b><br>
									<font color="red"><b>' . $rand['pret'] . ' RON</b></font><br>
									Colectia : <b>' . $rand['cat'] . ' - ' . $rand['subcat'] . '</b><br>
									Importanta : <b>' . $rand['imp'] . '</b></td></tr></table></td>';
				if ($nr % 2 == 0) echo '</tr><tr>';
			}
			echo '</tr></table>';
			echo '<tr height="0">
							<td><img src="images/a_26.gif" width="9" height="9" /></td>
							<td background="images/a_27.gif"></td>
							<td width="9" align="right"><img src="images/a_28.gif" width="9" height="9" /></td>
						</tr>
					  </table><br><br><br>';

			if ($pagini_totale == 1) echo '<div align=left> </div>';
			else {

				echo '<div align="center">';

				for ($pagini = 1; $pagini <= $pagini_totale; $pagini++) {
					if (($pagina) == $pagini) echo '<b><font color="#B98D26" style="font-size: 14px;	font-weight: bold; font-family: Arial, Helvetica, sans-serif;">' . $pagini . '</font></b>&nbsp;';
					else echo '<a href="admin.php?page=' . $pagini . '">' . $pagini . '</a>&nbsp;';
				}
				echo '</div>';
				echo '<table width="100%"><tr>
									<td align="left">';
				if ($pagina > 1) {
					$inapoi = ($pagina - 1);
					echo '<a href="admin.php?page=' . $inapoi . '"><img src="images/anterioara.gif" width="130" height="33"></a>';
				}
				echo '</td>
									<td align="right">';
				if ($pagina < $pagini_totale) {
					$inainte = ($pagina + 1);
					echo '<a href="produse.php?page=' . $inainte . '"><img src="images/urmatoare.gif" width="130" height="33"></a>';
				}
				echo '</td>
								  </tr></table>';
			}
		}
	}
} else {
	if (isset($_POST['login'])) {
		$_SESSION['username'] = $_POST['admin'];

		$cerereSQL = "SELECT * FROM `admin` WHERE `nume`='" . htmlentities($_POST['admin']) . "' AND `parola`='" . htmlentities($_POST['pass']) . "'";
		$rezultat = mysqli_query($conexiune, $cerereSQL);
		if (mysqli_num_rows($rezultat) == 1) {
			while ($rand = mysqli_fetch_assoc($rezultat)) {
				$_SESSION['logat'] = 'Da';
				echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=' . $_SERVER['PHP_SELF'] . '">';
			}
		} else {
			echo '<center><font color="red"><b>Userul si parola nu corespund ! Incercati din nou !</b></font></center>';
		}
	} else {
		echo '<center><form action="' . $_SERVER['PHP_SELF'] . '" method="post">
			  Nume:<br>
			  <input type="text" name="admin" value="" size="18"><br>
			  Parola:<br>
			  <input type="password" name="pass" value="" size="18"><br>
			  <input type="submit" name="login" value="Login" class="button">
			  </form></center>';
	}
}
include('footer.php');
