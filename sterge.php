<?php
require_once('config.php');

	$table = getenv('REMOTE_ADDR');
	$table = str_replace('.','_', $table);
	
	$cerereSQL = "DELETE FROM `".$table."` WHERE `id`='".htmlentities($_GET['id'], ENT_QUOTES)."'";
	mysqli_query($conexiune, $cerereSQL);
	echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=vezi_cos.php">';
