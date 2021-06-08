<?php
$title = 'LorMan Di Mano - Comanda produsele / Buy';
$desc = 'LorMan Di Mano - Comanda produsele / cele mai frumoase haine din piele facute cu cea mai noua tehnologie. Jachete, geci, sacouri, pantaloni, fuste din piele naturala';
require_once('config.php');
include('header.php');
error_reporting(0);

if ($_POST['nume'] != '') {
	if (($_POST['nume'] == '') || ($_POST['prenume'] == '') || ($_POST['tel'] == '') || (!is_numeric($_POST['tel'])) || ($_POST['adresa'] == '')) {
		echo '<center><font color="red"><b>ERROR !</b><br>';
		if ($_POST['nume'] == '') echo 'Introduceti va rog numele d-voastra !<br>';
		if ($_POST['prenume'] == '') echo 'Introduceti va rog prenumele d-voastra !<br>';
		if ($_POST['tel'] == '') echo 'Introduceti va rog numarul d-voastra de telefon !<br>';
		if (!is_numeric($_POST['tel'])) echo 'Numarul de telefon nu este valid !<br>';
		if ($_POST['adresa'] == '') echo 'Introduceti va rog adresa d-voastra !<br>';
		else echo '';
		echo '</font></center>';
	} else {

		$table = getUserIpAddr();
		$table = str_replace('.', '_', $table);

		$catre = 'p4ul.gg@gmail.com';
		$data_trimitere = date('d-m-Y H:i:s');
		$subiect = 'Comanda ' . $data_trimitere . '';

		$cerereSQL = 'SELECT * FROM `' . $table . '` ORDER BY `id`';
		$rezultat = mysqli_query($conexiune, $cerereSQL);
		$afis = '';

		while ($rand = mysqli_fetch_assoc($rezultat)) {
			$afis .= '
				<tr bgcolor="#E4E4E4">
					<td align="center">' . $rand['nume'] . '</td>
					<td align="center">' . $rand['cantitate'] . '</td>
					<td align="center">' . $rand['culoare'] . '</td>
					<td align="center">' . $rand['marime'] . '</td>
					<td align="center">' . $rand['gat'] . '</td>
					<td align="center">' . $rand['bust'] . '</td>
					<td align="center">' . $rand['sub_bust'] . '</td>
					<td align="center">' . $rand['talie'] . '</td>
					<td align="center">' . $rand['solduri'] . '</td>
					<td align="center">' . $rand['umar'] . '</td>
					<td align="center">' . $rand['maneca'] . '</td>
					<td align="center">' . $rand['coapsa'] . '</td>
					<td align="center">' . $rand['terminatie'] . '</td>
					<td align="center">' . $rand['interior'] . '</td>
					<td align="center">' . $rand['lungime'] . '</td>
					<td align="center">' . $rand['pret'] . '</td>
				</tr>';
		}
		$cerereSUM = mysqli_query($conexiune, 'SELECT SUM(`pret`) AS pret_total FROM `' . $table . '`');
		$randP = mysqli_fetch_object($cerereSUM);
		$pret_total = $randP->pret_total;
		$mesaj = '
		<html>
		<head>
		<title>Comanda noua !</title>
		</head>
		<body>
		Data trimiterii : ' . $data_trimitere . ' <br>
		Nume : <b>' . $_POST['nume'] . '</b> <br>
		Prenume : <b>' . $_POST['prenume'] . '</b><br>
		Tel : <b>' . $_POST['tel'] . '</b><br>
		Adresa : <b>' . $_POST['adresa'] . '</b><br>
		<table width="100%" border="1" cellspacing="0" cellpadding="0" border="1" bordercolor="#FFFFFF" align="center">
			<tr bgcolor="#CCCCCC">
				<td align="center">Nume</td>
				<td align="center">Cantitate</td>
				<td align="center">Culoare</td>
				<td align="center">Marime</td>
				<td align="center">Gat</td>
				<td align="center">Bust</td>
				<td align="center">Sub bust</td>
				<td align="center">Talie</td>
				<td align="center">Solduri</td>
				<td align="center">Umar</td>
				<td align="center">Maneca</td>
				<td align="center">Coapsa</td>
				<td align="center">Terminatie</td>
				<td align="center">Interior</td>
				<td align="center">Lungime</td>
				<td align="center">Pret</td>
			</tr>
			' . $afis . '
			<tr bgcolor="#E4E4E4">
				<td align="center" colspan="15"><b>TOTAL</b></td>
				<td align="center"><font color="red"><b>' . $pret_total . '</b></font></td>
			</tr>
		</table>
		</body></html>';
		$headere = "MIME-Version: 1.0\r\n";
		$headere .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headere .= "From: " . $_POST['nume'] . " " . $_POST['prenume'] . " <LorMan di Mano>\r\n";

		// mail($catre, $subiect, $mesaj, $headere);

		echo '<center><br><br><b><font color="green">Comanda a fost efectuata cu succes !<br>Veti fi contactat telefonic in maxim 24 de ore pentru confirmare !</font></b><br><br></center>';

		$table = getUserIpAddr();
		$table = str_replace('.', '_', $table);
		$stergeSQL = 'DROP TABLE `' . $table . '`;';
		mysqli_query($conexiune, $stergeSQL);
	}
}

$table = getUserIpAddr();
$table = str_replace('.', '_', $table);
$cerere = mysqli_query($conexiune, 'SELECT * FROM `' . $table . '`');

if ($cerere) {
	$intrari_totale = mysqli_num_rows($cerere);

	if ($intrari_totale == 0) {
		echo '<br><center><font color="darkred"><b>Nu ai nici un produs in cos !</b></font></center>';
	} else {
		echo '
		<form name="comanda" method="post" action="' . $_SERVER['PHP_SELF'] . '">
		<table border="0" cellspacing="2" cellpadding="2" width="500" align="center">
			<tr>
				<td width="200" align="right">Nume :</td>
				<td width="300" align="left"><input type="text" name="nume" size="25"></td>
			</tr>
			<tr>
				<td width="200" align="right">Prenume :</td>
				<td width="300" align="left"><input type="text" name="prenume" size="25"></td>
			</tr>
			<tr>
				<td width="200" align="right">Nr. de telefon</td>
				<td width="300" align="left"><input type="text" name="tel" size="25"></td>
			</tr>
			<tr>
				<td width="200" align="right">Adresa :</td>
				<td width="300" align="left"><textarea name="adresa" cols="19" rows="3"></textarea></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="image" src="images/trimite.gif" name="comanda" value="Comanda!" style="width: 150px; height: 40px;"></td>
			</tr>
		</table>
		</form>';
	}
} else {
	echo '<br><center><font color="darkred"><b>Nu exista inca nici un produs adaugat in cos !</b></font></center>';
}

include('footer.php');
