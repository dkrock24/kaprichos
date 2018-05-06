<?php
//var_dump($_REQUEST);

$hashSecretWord = 'tango'; //2Checkout Secret Word
$hashSid = 901379331; //2Checkout account number
$hashTotal = $_REQUEST['total']; //Sale total to validate against
$hashOrder = $_REQUEST['order_number']; //2Checkout Order Number
$StringToHash = strtoupper(md5($hashSecretWord . $hashSid . $hashOrder . $hashTotal));

//echo "<hr>";

//var_dump($_REQUEST['product_id']);
//echo "<hr>";
//var_dump($_REQUEST['product_id1']);
//echo "<hr>";

// Connection

$hostname_conne10 = "localhost";
$database_conne10 = "db_global_lapizzeria2";
$database_conne11 = "kapricho_wbcms";
$username_conne10 = "root";
$password_conne10 = "";

//global $conne10;
$conne10 = mysql_pconnect($hostname_conne10, $username_conne10, $password_conne10) or trigger_error(mysql_error(),E_USER_ERROR); 


mysql_select_db($database_conne10, $conne10);



$contador = 1;
$id = 0;
//echo $_REQUEST['currency_code'];
//echo "<hr>";
do{
	
	if( isset( $_REQUEST['product_id'.$contador] )  ){
		
		//echo "Prod :". $_REQUEST['product_id'.$contador]. " ID DB :" .$_REQUEST['merchant_product_id'.$contador];	
		
		//echo "<hr>";

		$product = getProduct( $_REQUEST['product_id'.$contador] );		
		$id_producto_recuperado =  $product['id_producto'];
		$id_producto_precio		=  $product['numerico1'];

		
		$sucursal = getSucursal( $id_producto_recuperado );
		$id_sucursal =  $sucursal['id_sucursal'];
		$id_nodo	= $sucursal['nodoID'];

		$id_pedido = insertPedido( $id_sucursal );

		insertDetalle( $id_pedido , $id_producto_recuperado , $id_nodo , $id_producto_precio );
						

		$contador ++;

	}else{
		if( $_REQUEST['product_id'] ){
			//echo "Prod :". $_REQUEST['product_id']. " ID DB :" .$_REQUEST['merchant_product_id'];;
			$contador = 0;
			//echo "<hr>";

			$product = getProduct( $_REQUEST['product_id'] );		
			$id_producto_recuperado =  $product['id_producto'];
			$id_producto_precio		=  $product['numerico1'];

			
			$sucursal = getSucursal( $id_producto_recuperado );
			$id_sucursal =  $sucursal['id_sucursal'];
			$id_nodo	= $sucursal['nodoID'];

			$id_pedido = insertPedido( $id_sucursal );

			insertDetalle( $id_pedido , $id_producto_recuperado , $id_nodo , $id_producto_precio );

		}else{
			$contador= 0;
			
		}		
	}

}while($contador > 0);

$newURL = "http://localhost/kaprichos/detalle.php?id=266";
header('Location: '.$newURL);

function getProduct( $id_producto ){
	// Seleccionar producto para isnertar
		
		$query_rscategoriasd = "select id_producto, numerico1 from productsv1 where customnum= '".$id_producto."'";
		$rscategoriasd = mysql_query($query_rscategoriasd, $GLOBALS['conne10']) or die(mysql_error());
		$row_rscategoriasd = mysql_fetch_array($rscategoriasd);
		return $row_rscategoriasd;
}

function getSucursal( $id_producto ){
		$query_rssucursal = "select id_sucursal, nodoID from sys_productos_sucursal as sp where sp.id_producto = '".$id_producto."'";
		$rssucursal = mysql_query($query_rssucursal, $GLOBALS['conne10']) or die(mysql_error());
		$row_rssucursal = mysql_fetch_array($rssucursal);
		return $row_rssucursal;
}

function insertPedido( $id_sucursal ){
	$query_inser_pedido = "insert into sys_pedido 
							(secuencia_orden,id_sucursal,id_usuario,flag_cancelado,cliente,email,telefono,de,para,dedicatoria,direccion,fecha_sugerida_entrega,fechahora_pedido,estado)
							values('888',$id_sucursal,1,1,'".$_REQUEST['nombre_remitente']."',
							'".$_REQUEST['email']."','".$_REQUEST['phone']."','".$_REQUEST['nombre_remitente']."','".$_REQUEST['nombre_destinatario']."',
							'".$_REQUEST['dedicatoria']."','".$_REQUEST['direccion_entrega']."','".$_REQUEST['fecha_entrega']."','".date("Y-m-d h:i:s")."',1)";
		mysql_query($query_inser_pedido, $GLOBALS['conne10']) or die(mysql_error());

		$last_id = mysql_insert_id();
		return $last_id;
}

function insertDetalle(  $id_pedido , $id_producto_recuperado , $id_nodo , $id_producto_precio ){
	$sql_pedido_detalle = 'insert into sys_pedido_detalle (id_pedido,id_producto,id_nodo,producto_elaborado,precio_grabado,precio_original,cantidad,nota_interna,pedido_estado,estado)
							values("'.$id_pedido.'","'.$id_producto_recuperado.'","'.$id_nodo.'",0,"'.$id_producto_precio.'","'.$id_producto_precio.'",1,"'.$_REQUEST['order_number'].'",1,1)';

		mysql_query($sql_pedido_detalle, $GLOBALS['conne10']) or die(mysql_error());	
}


if ($StringToHash != $_REQUEST['key']) {
	$result = 'Fail - Hash Mismatch '; 
	} else { 
	$result = 'Success - Hash Matched ';
}

//echo $result;

//echo $_REQUEST['li_0_name'];