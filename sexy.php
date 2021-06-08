<?php
$title = 'LorMan Di Mano - Produse piele / Magazin Virtual';
$desc = 'LorMan Di Mano - lista produse / cele mai frumoase haine din piele facute cu cea mai noua tehnologie. Jachete, geci, sacouri, pantaloni, fuste din piele naturala';
require_once('config.php');
include('header.php');

$rezultate_maxime = 14;
$intrari_totale = mysqli_num_rows(mysqli_query($conexiune, 'SELECT `id` FROM `produse` WHERE `cat`="Femei" AND (`subcat`="Fuste" OR `subcat`="Corsete" OR `subcat`="Pantaloni scurti")'));

if($intrari_totale == 0) 
{
	echo '<br><center><font color="darkred"><b>Nu exista inca nici un produs in baza de date !</b></font></center>';
}
else
{                 
    if(!isset($_GET['page'])) $pagina = 1;
	else $pagina = $_GET['page'];

	$nr=0;
	$from = (($pagina * $rezultate_maxime) - $rezultate_maxime); 
	$cerereSQL = 'SELECT * FROM `produse` WHERE `cat`="Femei" AND (`subcat`="Fuste" OR `subcat`="Corsete" OR `subcat`="Pantaloni scurti") ORDER BY `imp` DESC LIMIT '.$from.', '.$rezultate_maxime.' ';
	$rezultat = mysqli_query($conexiune, $cerereSQL);
	$pagini_totale = ceil($intrari_totale / $rezultate_maxime);
	
	if($pagina > $pagini_totale) echo 'Pagina nu exista !';
	else
	{
		if($pagini_totale > 0)
		{
	
			$title = 'Produse Sexy';
			echo '<table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td width="9"><img src="images/a_22.gif" width="9" height="22" alt=""></td>
							<td width="100%" align="center" valign="middle" class="other1" style="background-image:url(images/a_23.gif);">'.$title.'</td>
							<td width="9" align="right"><img src="images/a_24.gif" width="9" height="22" alt=""></td>
						  </tr>
						  <tr>
							<td colspan="3" class="other" align="center" style="padding:0px; margin:0px;">';
			echo '<table width="100%" border="1" cellspacing="1" cellpadding="0" border="1" bordercolor="#FFFFFF" align="center"><tr>';
			
			while($rand = mysqli_fetch_assoc($rezultat)) 
			{				$nr++;
							$desc = $rand['descriere'];
							//$desc = mb_strimwidth($desc, 0, 70, " ...");
							if (!file_exists('images/thumb_'.$rand['poza'].'')) $imgsrc = 'images/'.$rand['poza'].'';
							else $imgsrc = 'images/thumb_'.$rand['poza'].'';
							echo '<td align="center" width="50%"><table border="0" cellspacing="3"><tr><td width="100" align="center" valign="middle"><a href="vezi_produs.php?id='.$rand['id'].'"><img src="'.$imgsrc.'" width="100" alt="" class="prod"></a></td>
							<td align="left" width="170"><a href="vezi_produs.php?id='.$rand['id'].'">'.$rand['nume'].'</a><br>
							'.$desc.'<br><br>
							<b>Culori disponibile :</b> '.$rand['culoare'].'<br>
							<font color="red"><b>'.$rand['pret'].' RON</b></font></td></tr></table></td>';
							if($nr%2 == 0) echo '</tr><tr>';		
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
			
			if($pagini_totale == 1) echo '<div align=left> </div>';
			else
			{
				
				echo '<div align="center">';
				
				for($pagini = 1; $pagini <= $pagini_totale; $pagini++)
				{
					if(($pagina) == $pagini) echo '<b><font color="#B98D26" style="font-size: 14px;	font-weight: bold; font-family: Arial, Helvetica, sans-serif;">'.$pagini.'</font></b>&nbsp;';
					else echo '<a href="sexy.php?page='.$pagini.'">'.$pagini.'</a>&nbsp;';
				}
				echo '</div>';
				echo '<table width="100%"><tr>
						<td align="left">';
						if($pagina > 1)
						{
							$inapoi = ($pagina - 1);
							echo '<a href="sexy.php?page='.$inapoi.'"><img src="images/anterioara.gif" width="130" height="33"></a>';
						}
				  echo '</td>
						<td align="right">';
						if($pagina < $pagini_totale)
						{
							$inainte = ($pagina + 1);
							echo '<a href="sexy.php?page='.$inainte.'"><img src="images/urmatoare.gif" width="130" height="33"></a>';				
						}
				  echo '</td>
					  </tr></table>';
			}
		}
	}
}

include('footer.php');
