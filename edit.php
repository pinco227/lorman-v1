<?php
require_once('config.php');
include('header.php');

if(!isset($_SESSION['logat'])) $_SESSION['logat'] = 'Nu';

if($_SESSION['logat'] == 'Da')
{
	if(isset($_POST['edit']))
	{
		$_SESSION['nume'] = $_POST['nume'];
		$_SESSION['descriere'] = $_POST['descriere'];
		$_SESSION['culori'] = $_POST['culori'];
		$_SESSION['pret'] = $_POST['pret'];
		$_SESSION['cat'] = $_POST['cat'];
		$_SESSION['subcat'] = $_POST['subcat'];
		$_SESSION['imp'] = $_POST['imp'];
		
		if(($_SESSION['nume'] == '') || ($_SESSION['descriere'] == '') || ($_SESSION['culori'] == '') || ($_SESSION['pret'] == ''))
		{
				echo '<font color="red"><center><b>ERROR !</b><br><br>';
				if($_SESSION['nume'] == '') echo 'Introdu te rog numele produsului !<br>';
				if($_SESSION['descriere'] == '') echo 'Introdu te rog descrierea produsului !<br>';
				if($_SESSION['culori'] == '') echo 'Introdu te rog culorile disponibile acestui produs !<br>';
				if($_SESSION['pret'] == '') echo 'Introdu te rog pretul produsului !<br>';
				echo '</center></font>';
		} else 
		{	
		echo '<br><br><br><center><font color="blue"><b>Se modifica !</b></font></center>';
		
		$cerereSQL = "UPDATE `produse` SET `nume`='".htmlentities($_SESSION['nume'], ENT_QUOTES)."', `descriere`='".htmlentities($_SESSION['descriere'], ENT_QUOTES)."', `culoare`='".htmlentities($_SESSION['culori'], ENT_QUOTES)."', `pret`='".htmlentities($_SESSION['pret'], ENT_QUOTES)."', `cat`='".htmlentities($_SESSION['cat'], ENT_QUOTES)."', `subcat`='".htmlentities($_SESSION['subcat'], ENT_QUOTES)."', `imp`='".htmlentities($_SESSION['imp'], ENT_QUOTES)."' WHERE `id`='".$_GET['id']."'";
		mysqli_query($conexiune, $cerereSQL);
		
		$_SESSION['nume'] = '';
		$_SESSION['descriere'] = '';
		$_SESSION['culori'] = '';
		$_SESSION['pret'] = '';
		$_SESSION['cat'] = '';
		$_SESSION['subcat'] = '';
		$_SESSION['imp'] = '';
		
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=admin.php">';
		}
	} else {
	echo '<center><font color="blue"><b>Editeaza produsul !</b></font></center>';
	}
	$cerereSQL = "SELECT * FROM `produse` WHERE `id`='".$_GET['id']."'"; 
   	$rezultat = mysqli_query($conexiune, $cerereSQL);
   	while($rand = mysqli_fetch_array($rezultat))
   	{
		echo '<form name="edit" action="'.$_SERVER['PHP_SELF'].'?id='.$_GET['id'].'" method="post">
			<table border="0" align="center">
			<tr>
			<td align="right"><b>Nume:</b></td>
			<td><input type="text" size="30" name="nume" value="'.$rand['nume'].'"></td>   
			</tr><tr>
			<td align="right"><b>Descriere:</b></td>
			<td><textarea cols="23" rows="3" name="descriere">'.$rand['descriere'].'</textarea></td>   
			</tr><tr>
			<td align="right"><b>Culori:</b></td>
			<td><input type="text" size="30" name="culori" value="'.$rand['culoare'].'"></td>   
			</tr><tr>
			<td align="right"><b>Pret:</b></td>
			<td><input type="text" size="30" name="pret" value="'.$rand['pret'].'"> RON<br>
			<input type="hidden" name="cat2" value="'.$rand['cat'].'"><input type="hidden" name="subcat2" value="'.$rand['subcat'].'"></td>   
			</tr><tr>
			<td align="right"><b>Colectii:</b></td>
			<td>
			<select name="cat" size="1" onChange="redirect(this.options.selectedIndex)">
				<option value="'.$rand['cat'].'">'.$rand['cat'].'</option>
				<option value="Femei">Femei</option>
				<option value="Barbati">Barbati</option>
				<option value="Bussines">Bussines</option>
			</select>
			<select name="subcat" size="1">
				<option value="'.$rand['subcat'].'">'.$rand['subcat'].'</option>
			</select>
			<script>
			
				var groups=document.edit.cat.options.length
				var group=new Array(groups)
				for (i=0; i<groups; i++)
				group[i]=new Array()
			
				group[0][0]=new Option("'.$rand['subcat'].'","'.$rand['subcat'].'")
				
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

				var temp=document.edit.subcat

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
					<option value="'.$rand['imp'].'">'.$rand['imp'].'</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
			</td>
  			</tr><tr>
			<td align="center" colspan="2"><input name="edit" type="submit" value="Editeaza" id="edit"></td>
			</tr>
			</table></form><br><br></center><br><br><br>';		
	}
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
  			while($rand = mysqli_fetch_array($rezultat))
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
include('footer.php');
