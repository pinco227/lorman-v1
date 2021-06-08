<?php
require_once('../config.php');
if(!isset($_SESSION['logat'])) $_SESSION['logat'] = 'Nu';

if($_SESSION['logat'] == 'Da')
{
		echo '<center>';
		if(isset($_POST['redim']))
				{
					if (!file_exists($_POST['poza'])) echo '<font color="red"><b>Poza nu exista !</b></font><br><br>';
					else 
					{
								$uploadpath = "";
								$uploadpath = $uploadpath.basename($_POST['poza']);
								$uploadpath = str_replace(" ", "%20", $uploadpath);
								$image_name = 'http://www.lorman.ro/images/'.$_POST['poza'];
								$image_name = str_replace(" ", "%20", $image_name);
								list($width,$height) = getimagesize($image_name);
								$new_image_name = "thumb_".$_POST['poza'];
								$ratio = ($width/100);
								$new_width = 100;
								$new_height = ($height/$ratio);
								$image_p = imagecreatetruecolor($new_width,$new_height);
								$image = imagecreatefromjpeg($image_name);
								imagecopyresampled($image_p,$image,0,0,0,0,$new_width,$new_height,$width,$height);
								imagejpeg($image_p,$new_image_name,100);
								echo '<font color="darkgreen"><b>poza '.$_POST['poza'].' a fost redimensionata cu succes !</b></font><br><img src="thumb_'.$_POST['poza'].'"><br><br>';
					}
				}
		else
				{
					echo '<br>';
				}
				
		echo '<form name="redim" action="'.$_SERVER['PHP_SELF'].'" method="post" enctype="multipart/form-data">
					<table border="0" align="center" width="490">
						<tr>
							<td align="right" width="200"><b>Numele pozei:</b></td>
							<td width="390" align="left"><input type="text" size="30" name="poza" value=".jpg"></td>
						</tr>
						<tr>
							<td align="center" colspan="2"><input name="redim" type="submit" value="Redimensioneaza" id="add"></td>
						</tr>
					</table>
			  </form>';
		echo '<br><br><br>';
		
		echo '<table border="1" align="center" width="490">
					<tr>
						<td><b>Numele pozei</b></td>
						<td><b>Thumbnail</b></td>
					</tr>';
		$cerereSQL = 'SELECT * FROM `produse` ORDER BY `id`';
		$rezultat = mysql_query($cerereSQL, $conexiune);
			
		while($rand = mysql_fetch_array($rezultat)) 
			{
				$thumb = 'thumb_'.$rand['poza'];
				if (!file_exists($thumb)) $echo = '<font color="red">Nu exista</font>';
				elseif (file_exists($thumb)) $echo = '<font color="green">Exista</font>';
				echo '
					<tr>
						<td>'.$rand['poza'].'</td>
						<td>'.$echo.'</td>
					</tr>';
			}		
		
		echo'</table>';
			  
		echo '</center>';
}
else
{		  
	if(isset($_POST['login'])) 
	{
		$_SESSION['username'] = $_POST['admin'];

		$cerereSQL = "SELECT * FROM `admin` WHERE `nume`='".htmlentities($_POST['admin'])."' AND `parola`='".htmlentities($_POST['pass'])."'";
		$rezultat = mysql_query($cerereSQL);
		if(mysql_num_rows($rezultat) == 1)
		{
  			while($rand = mysql_fetch_array($rezultat))
  			{
    			$_SESSION['logat'] = 'Da';
    			echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$_SERVER['PHP_SELF'].'">';
  			}
		}
		else
		{
			echo '<center><font color="red"><b>Userul si parola nu corespund ! Incercati din nou !</b></font></center>';
		}
	}
	else
	{
		echo '<center><form action="'.$_SERVER['PHP_SELF'].'" method="post">
			  Nume:<br>
			  <input type="text" name="admin" value="" size="18"><br>
			  Parola:<br>
			  <input type="password" name="pass" value="" size="18"><br>
			  <input type="submit" name="login" value="Login" class="button">
			  </form></center>';
	}
}
?>