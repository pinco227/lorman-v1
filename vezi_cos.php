<?php
$title = 'LorMan Di Mano - cosul cu produse / Shopping Chart';
$desc = 'LorMan Di Mano - Comanda produsele / cele mai frumoase haine din piele facute cu cea mai noua tehnologie. Jachete, geci, sacouri, pantaloni, fuste din piele naturala';
require_once('config.php');
include('header.php');
error_reporting(0);

$table = getUserIpAddr();
$table = str_replace('.', '_', $table);
$cerere = mysqli_query($conexiune, 'SELECT `id` FROM `' . $table . '`');

if ($cerere) {
	$intrari_totale = mysqli_num_rows($cerere);

	if ($intrari_totale == 0) {
		echo '<br><center><font color="darkred"><b>Nu exista inca nici un produs adaugat in cos !</b></font></center>';
	} else {
		echo '<center><font color="darkred"><b>Pentru a nu se flooda baza de date , va rugam stergeti produsele din cos daca nu doriti sa le comandati !</b></font></center><table><tr><td></td></tr></table>';

		echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
				<tr>
					<td style="width:1%; border:0px;"><img src="images/a_22.gif" width="9" height="22" alt=""></td>
					<td align="center" style="border-right-color: #412F13; border-right: solid; border-right-width: 1px; background-image:url(images/a_23.gif); width:25%;"><b>Nume</b></td>
					<td align="center" style="border-right-color: #412F13; border-right: solid; border-right-width: 1px; background-image:url(images/a_23.gif); width:13%;"><b>Cantitate</b></td>
					<td align="center" style="border-right-color: #412F13; border-right: solid; border-right-width: 1px; background-image:url(images/a_23.gif); width:17%;"><b>Culoare</b></td>
					<td align="center" style="border-right-color: #412F13; border-right: solid; border-right-width: 1px; background-image:url(images/a_23.gif); width:16%;"><b>Marime</b></td>
					<td align="center" style="border-right-color: #412F13; border-right: solid; border-right-width: 1px; background-image:url(images/a_23.gif); width:16%;"><b>Pret</b></td>
					<td align="center" style="background-image:url(images/a_23.gif); width:16%;"><b>Sterge</b></td>
					<td width="9" align="right"><img src="images/a_24.gif" width="9" height="22" alt=""></td>
				</tr>';

		$cerereSQL = 'SELECT * FROM `' . $table . '` ORDER BY `id`';
		$rezultat = mysqli_query($conexiune, $cerereSQL);

		while ($rand = mysqli_fetch_assoc($rezultat)) {
			if ($rand['marime'] == '') $mar = 'Optional';
			else $mar = $rand['marime'];
			$euro = round($rand['pret'] / 3);
			echo '
				<tr>
					<td align="center" colspan="2" style="border-left-color: #412F13; border-left: solid; border-left-width: 2px; border-right-color: #412F13; border-right: solid; border-right-width: 1px; border-bottom-color: #412F13; border-bottom: solid; border-bottom-width: 1px;">' . $rand['nume'] . '</td>
					<td align="center" style="border-right-color: #412F13; border-right: solid; border-right-width: 1px; border-bottom-color: #412F13; border-bottom: solid; border-bottom-width: 1px;">' . $rand['cantitate'] . '</td>
					<td align="center" style="border-right-color: #412F13; border-right: solid; border-right-width: 1px; border-bottom-color: #412F13; border-bottom: solid; border-bottom-width: 1px;">' . $rand['culoare'] . '</td>
					<td align="center" style="border-right-color: #412F13; border-right: solid; border-right-width: 1px; border-bottom-color: #412F13; border-bottom: solid; border-bottom-width: 1px;">' . $mar . '</td>
					<td align="center" style="border-right-color: #412F13; border-right: solid; border-right-width: 1px; border-bottom-color: #412F13; border-bottom: solid; border-bottom-width: 1px;">' . $rand['pret'] . 'ron/' . $euro . '&euro;</td>
					<td align="center" colspan="2" style="margin:0px; padding:0px; border-right-color: #412F13; border-right: solid; border-right-width: 2px; border-bottom-color: #412F13; border-bottom: solid; border-bottom-width: 1px;"><a href="sterge.php?id=' . $rand['id'] . '" style="color:red;">[x]</a></td>
				</tr>';
		}
		$cerereSUM = mysqli_query($conexiune, 'SELECT SUM(`pret`) AS pret_total FROM `' . $table . '`');
		$randP = mysqli_fetch_object($cerereSUM);
		$pret_total = $randP->pret_total;
		$euro2 = round($pret_total / 3);
		echo '
				<tr>
					<td align="center" colspan="5" style="border-left-color: #412F13; border-left: solid; border-left-width: 2px; border-right-color: #412F13; border-right: solid; border-right-width: 1px;"><b>TOTAL</b></td>
					<td align="center" style="border-right-color: #412F13; border-right: solid; border-right-width: 1px;"><font color="red"><b>' . $pret_total . 'ron/' . $euro2 . '&euro;</b></font></td>
					<td style="border-right-color: #412F13; border-right: solid; border-right-width: 2px;" colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td width="9" height="9"><img src="images/a_26.gif" width="9" height="9" alt=""></td>
					<td style="border-right-color: #412F13; border-right: solid; border-right-width: 1px;" colspan="4" height="9"><img src="images/a_27.gif" width="100%" height="9"></td>
					<td style="border-right-color: #412F13; border-right: solid; border-right-width: 1px;" height="9"><img src="images/a_27.gif" width="100%" height="9"></td>
					<td style="background-image:url(images/a_27.gif);"></td>
					<td width="9" height="9"><img src="images/a_28.gif" width="9" height="9" alt=""></td>
			</tr>';
		echo '</tr></table><br>';
		echo '<center><b><a href="trimite.php"><img src="images/trimite.gif" width="150" height="40"></a></b></center>
			<table><tr><td></td></tr></table>
			<center><b><a href="index.php"><img src="images/alte_prod.gif" width="150" height="40"></a></b></center>';
	}
} else {
	echo '<br><center><font color="darkred"><b>Nu exista inca nici un produs adaugat in cos !</b></font></center>';
}

include('footer.php');
