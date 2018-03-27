<?php

	session_start();
	$lan;
	if(isset($_GET['lan'])){		
		$_SESSION['lan'] =$_GET['lan'];
	}else{
		$_SESSION['lan'] = 'en';
	}
	
    require($_SESSION['lan'].'.php');

    echo($messages['hello']);
    echo($messages['signup']);
?>