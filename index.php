<?php
$title = 'Haine din Piele ::LorMan di Mano:: Jachete Sacouri Geci Pantaloni Fuste din Piele  Naturala - Iasi';
$desc = 'diMano Romania cele mai frumoase haine din piele facute cu cea mai noua tehnologie. Jachete geci sacouri pantaloni fuste din piele naturala';
require_once('config.php');
include('header.php');

echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
		<tr>
			<td width="50%" valign="top">
				<table border="0" cellspacing="0" cellpadding="0" width="314" align="center">
					<tr>
						<td width="9" height="22"><img src="images/a_22.gif" width="9" height="22" alt=""></td>
						<td width="296" align="center" valign="middle" class="other1" height="22" style="background-image:url(images/a_23.gif);">Dama</td>
						<td width="9" align="right" height="22"><img src="images/a_24.gif" width="9" height="22" alt=""></td>
					</tr>';
$intrari_totale = mysqli_num_rows(mysqli_query($conexiune, 'SELECT COUNT(*) as Num FROM `produse` WHERE `cat`="Femei"'));

if($intrari_totale == 0) 
{
			  echo '<tr><td class="other" align="center" colspan="3" width="296"><b><font color="darkred" size="-1">Nu exista inca nici un produs in baza de date la categoria "Dama" !</font></b></td></tr>';
}
else
{
	$cerereSQL = 'SELECT * FROM `produse` WHERE `cat`="Femei" ORDER BY `imp` DESC LIMIT 5';
	$rezultat = mysqli_query($conexiune, $cerereSQL);
   
	while($rand = mysqli_fetch_array($rezultat)) 
	{
					$euro = round($rand['pret']/3);
					$desc = $rand['descriere'];
					//$desc = mb_strimwidth($desc, 0, 70, " ...");
					if (!file_exists('images/thumb_'.$rand['poza'].'')) $imgsrc = 'images/'.$rand['poza'].'';
					else $imgsrc = 'images/thumb_'.$rand['poza'].'';
					echo '<tr><td class="other" align="center" colspan="3" width="296"><table width="100%" border="0" cellspacing="3"><tr><td width="100" align="center" valign="middle"><a href="vezi_produs.php?id='.$rand['id'].'"><img src="'.$imgsrc.'" width="100" class="prod" alt=""></a></td>
					<td align="left"><a href="vezi_produs.php?id='.$rand['id'].'">'.$rand['nume'].'</a><br>
					'.$desc.'<br><br>
    				<b>Culori disponibile :</b> '.$rand['culoare'].'<br>
					<font color="red"><b>'.$rand['pret'].' RON / '.$euro.' &euro;</b></font></td></tr></table></td></tr>';		
	}
}
	  	  echo '
		  			<tr>
						<td height="9"><img src="images/a_26.gif" width="9" height="9" alt=""></td>
						<td height="9" style="background-image:url(images/a_27.gif);"></td>
						<td width="9" align="right" height="9"><img src="images/a_28.gif" width="9" height="9" alt=""></td>
					</tr>
				</table>
	  		</td>
			<td width="50%" valign="top">
				<table border="0" cellspacing="0" cellpadding="0" width="314" align="center">
					<tr>
						<td width="9" height="22"><img src="images/a_22.gif" width="9" height="22" alt=""></td>
						<td width="296" align="center" valign="middle" class="other1" height="22" style="background-image:url(images/a_23.gif);">Barbati</td>
						<td width="9" align="right" height="22"><img src="images/a_24.gif" width="9" height="22" alt=""></td>
					</tr>';
$intrari_totale2 = mysqli_num_rows(mysqli_query($conexiune, 'SELECT COUNT(*) as Num FROM `produse` WHERE `cat`="Barbati"'));

if($intrari_totale2 == 0) 
{
			  echo '<tr><td align="center" colspan="3" class="other" width="296"><b><font color="darkred" size="-1">Nu exista inca nici un produs in baza de date la categoria "Barbati" !</font></b></td></tr>';
}
else
{
	$cerereSQL = 'SELECT * FROM `produse` WHERE `cat`="Barbati" ORDER BY `imp` DESC LIMIT 5';
	$rezultat = mysqli_query($conexiune, $cerereSQL);
   
	while($rand = mysqli_fetch_array($rezultat)) 
	{
					$euro = round($rand['pret']/3);
					$desc = $rand['descriere'];
					//$desc = mb_strimwidth($desc, 0, 70, " ...");
					if (!file_exists('images/thumb_'.$rand['poza'].'')) $imgsrc = 'images/'.$rand['poza'].'';
					else $imgsrc = 'images/thumb_'.$rand['poza'].'';
					echo '<tr><td align="center" colspan="3" class="other" width="296"><table width="100%" border="0" cellspacing="3"><tr><td width="100" align="center" valign="middle"><a href="vezi_produs.php?id='.$rand['id'].'"><img src="'.$imgsrc.'" width="100" class="prod" alt=""></a></td>
					<td align="left"><a href="vezi_produs.php?id='.$rand['id'].'">'.$rand['nume'].'</a><br>
    				'.$desc.'<br>
    				<b>Culori disponibile :</b> '.$rand['culoare'].'<br>
					<font color="red"><b>'.$rand['pret'].' RON / '.$euro.' &euro;</b></font></td></tr></table></td></tr>';		
	}
}
	  	  echo '
		  			<tr>
						<td height="9"><img src="images/a_26.gif" width="9" height="9" alt=""></td>
						<td height="9" style="background-image:url(images/a_27.gif);"></td>
						<td width="9" align="right" height="9"><img src="images/a_28.gif" width="9" height="9" alt=""></td>
					</tr>
				</table>
	  		</td>
		</tr>
	  </table>';
include('footer.php');
