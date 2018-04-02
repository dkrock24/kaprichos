<?php
require_once('Connections/conne10.php');

if( true ){

	mysql_select_db($database_conne10, $conne10);

	$pass = sha1( $_POST['passwd'] );
	$username = $_POST['username'] ;
	
	$query_rUser = "SELECT * FROM tbl_users as U where U.username='". $username ."' && U.password='". $pass ."'";
	
	$rsusers = mysql_query($query_rUser, $conne10) or die(mysql_error());
	
	$row_rsusers = mysql_fetch_assoc($rsusers);
	if($row_rsusers!= null){

		$_SESSION['idUser'] = $row_rsusers['id_user'];
		$_SESSION['username'] = $row_rsusers['username'];
		$newURL = 'index.php';

		header('Location: '.$newURL);
	}
	else
	{

		$newURL = 'index.php';
		header('Location: '.$newURL);
	}
}else
{
	echo 55;
}

?>