<?php
require_once('config.php');

if(!isset($_SESSION['logat'])) $_SESSION['logat'] = 'Nu';

if($_SESSION['logat'] == 'Da')
{

	$cerereSQL = "DELETE FROM `anunturi` WHERE `id`='".htmlentities($_GET['id'], ENT_QUOTES)."'";
	$rezultat = mysqli_query($conexiune, $cerereSQL);
	echo '<br><br><br><center><font color="red"><b>Anuntul a fost sters din baza de date !</b></font></center><br><br><br>';
	echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=admin.php">';

}
else
{		  
	if(isset($_POST['login'])) 
	{
		$_SESSION['username'] = $_POST['admin'];

		$cerereSQL = "SELECT * FROM `admin` WHERE `nume`='".htmlentities($_POST['admin'])."' AND `parola`='".htmlentities($_POST['pass'])."'";
		$rezultat = mysqli_query($conexiune, $cerereSQL);
		if(mysqli_num_rows($rezultat) == 1)
		{
  			while($rand = mysqli_fetch_assoc($rezultat))
  			{
    			$_SESSION['logat'] = 'Da';
    			echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$_SERVER['PHP_SELF'].'">';
  			}
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
