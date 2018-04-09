<?php
require_once('Connections/conne10.php');
mysql_select_db($database_conne10, $conne10);
ini_set("SMTP","smtp.gmail.com");



//if($_POST['recuperar']){
if(1==1){

	$_email = 'rafa_fer_tejada@hotmail.com'; //$_POST['recuperar'];

	$sql = "SELECT * FROM tbl_users WHERE email='". $_email ."'";
	$rsUser = mysql_query($sql, $conne10) or die(mysql_error());
	$row_rsusers = mysql_fetch_assoc($rsUser);

	if(1==1){
		//mail($row_rsusers['email'],"Recuperar Credenciales","Gracias por Contactarnos");
		//mail($row_rsusers['email'],"Recuperar Credenciales","Gracias por Contactarnos","demo","parameters");
		$header = "From: Contacto Web <rgutierreztejada@gmail.com> \r\n"; 
	    $header .= "Mime-Version: 1.0 \r\n"; 
	    $header .= "Content-type: text/html\r\n"; 
	    $mensaje = "<h3>Contacto Sitio Web </h3>"; 
	    $mensaje .="<br />Nombre: Rafael <br />"; 
	    $mensaje .="Email: dfdfdf <br />"; 
	    $mensaje .="Asunto: sdsds <br />"; 
	    $mensaje .="Mensaje:  sdsdsd <br />"; 
	         
	    $para = "rafa_fer_tejada@hotmail.com"; 
	    $asunto = 'Contacto Sitio Web '; 

	    mail($para, $asunto, utf8_decode($mensaje), $header);  
	}
}
?>