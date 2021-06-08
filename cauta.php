<?php
$title = 'LorMan Di Mano - cautare produse / Search';
$desc = 'LorMan Di Mano - cautare produse / cele mai frumoase haine din piele facute cu cea mai noua tehnologie. Jachete, geci, sacouri, pantaloni, fuste din piele naturala';
require_once('config.php');
include('header.php');

if (isset($_POST['de_cautat'])) {
	$cererecauta = 'SELECT * FROM `produse` WHERE `cat`="' . $_POST['in'] . '" AND (`nume` LIKE "%' . addentities($_POST['de_cautat']) . '%" OR `descriere` LIKE "%' . addentities($_POST['de_cautat']) . '%")';
	$rezultatcauta = mysqli_query($conexiune, $cererecauta);

	if (mysqli_num_rows($rezultatcauta) > 0) {
		$nr = 0;
		echo '	<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td width="9"><img src="images/a_22.gif" width="9" height="22" alt=""></td>
					<td width="100%" align="center" valign="middle" class="other1" style="background-image:url(images/a_23.gif);">Rezultatele cautarii</td>
					<td width="9" align="right"><img src="images/a_24.gif" width="9" height="22" alt=""></td>
				  </tr>
				  <tr>
					<td colspan="3" class="other" align="center" style="padding:0px; margin:0px;">';
		echo '<table width="100%" border="1" cellspacing="1" cellpadding="0" border="1" bordercolor="#FFFFFF" align="center"><tr>';
		while ($rand = mysqli_fetch_assoc($rezultatcauta)) {
			$nr++;
			$desc = $rand['descriere'];
			$desc = wordwrap($desc, 70, " ...");
			if (!file_exists('images/thumb_' . $rand['poza'] . '')) $imgsrc = 'images/' . $rand['poza'] . '';
			else $imgsrc = 'images/thumb_' . $rand['poza'] . '';
			echo '<td align="center" width="50%"><table border="0" cellspacing="3"><tr><td width="100" align="center" valign="middle"><a href="vezi_produs.php?id=' . $rand['id'] . '"><img src="' . $imgsrc . '" width="100" alt="" class="prod"></a></td>
					<td align="left" width="170"><a href="vezi_produs.php?id=' . $rand['id'] . '">' . $rand['nume'] . '</a><br>
					' . $desc . '<br><br>
    				<b>Culori disponibile :</b> ' . $rand['culoare'] . '<br>
					<font color="red"><b>' . $rand['pret'] . ' RON</b></font></td></tr></table></td>';
			if ($nr % 2 == 0) echo '</tr><tr>';
		}
		echo '</tr></table>';
		echo '		</td>
				  </tr>
				  <tr>
					<td width="9" height="9"><img src="images/a_26.gif" width="9" height="9" alt=""></td>
					<td height="9" style="background-image:url(images/a_27.gif);"></td>
					<td width="9" height="9"><img src="images/a_28.gif" width="9" height="9" alt=""></td>
				  </tr>
				</table>';
	} else {
		echo '<center><font color="darkred"><b>Nu s-a gasit nici un rezultat pentru cautarea d-voastra !</b></font></center>';
	}
} else {
	echo '<br>';
}

echo '<center><form action="' . $_SERVER['PHP_SELF'] . '" method="post" name="cauta" class="search">
Cauta :
<input type="text" name="de_cautat" value="">
in :
<select name="in" class="select">
	<option value="">------ Alege ------</option>
	<option value="Femei">Dama</option>
	<option value="Barbati">Barbati</option>
	<option value="Bussines">Bussines</option>
</select>
<input name="cauta" type="image" src="images/cauta.gif" align="absmiddle" style="width:80; height:26;"></form></center><br>';

include('footer.php');
