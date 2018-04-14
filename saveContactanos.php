<?php
require_once('Connections/conne10.php');

if(isset($_POST['eltelefono']) && isset($_POST['elemail']) && isset($_POST['elmensaje'])){
	
	mysql_select_db($database_conne10, $conne10);
	$insert_contactanos = "insert into tbl_contacto set telefono='". $_POST['eltelefono'] ."', correo='". $_POST['elemail'] ."', mensaje='". $_POST['elmensaje'] ."'";

	$contacto = mysql_query($insert_contactanos, $conne10) or die(mysql_error());

	if($contacto){
		$newURL = "index.php";
		header('Location: '.$newURL);
		
	}else{
		$newURL = "index.php";
		header('Location: '.$newURL);
	}
}
else{
		$newURL = "index.php";
		header('Location: '.$newURL);
	}

?>