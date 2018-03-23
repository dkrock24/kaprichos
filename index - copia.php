<?php require_once('Connections/conne10.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_conne10, $conne10);
$query_rscategorias1 = "SELECT id_categoria, nombre_es FROM tbl_productos_categorias WHERE superior = 0 AND estatus = 1 ORDER BY orden ASC";
$rscategorias1 = mysql_query($query_rscategorias1, $conne10) or die(mysql_error());
$row_rscategorias1 = mysql_fetch_assoc($rscategorias1);
$totalRows_rscategorias1 = mysql_num_rows($rscategorias1);

mysql_select_db($database_conne10, $conne10);
$query_rsrandomcat = "SELECT id_categoria, nombre_es, imagen, contenido_es FROM tbl_productos_categorias WHERE estatus = 1 ORDER BY rand()";
$rsrandomcat = mysql_query($query_rsrandomcat, $conne10) or die(mysql_error());
$row_rsrandomcat = mysql_fetch_assoc($rsrandomcat);
$totalRows_rsrandomcat = mysql_num_rows($rsrandomcat);

$colname_rsrandomcat2 = $row_rsrandomcat['id_categoria'];

mysql_select_db($database_conne10, $conne10);
$query_rsrandomcat2 = sprintf("SELECT id_categoria, nombre_es, imagen, contenido_es FROM tbl_productos_categorias WHERE estatus = 1 AND id_categoria != %s ORDER BY rand()", GetSQLValueString($colname_rsrandomcat2, "int"));
$rsrandomcat2 = mysql_query($query_rsrandomcat2, $conne10) or die(mysql_error());
$row_rsrandomcat2 = mysql_fetch_assoc($rsrandomcat2);
$totalRows_rsrandomcat2 = mysql_num_rows($rsrandomcat2);

$colname_rsrandomcat3 = $row_rsrandomcat2['id_categoria'];

mysql_select_db($database_conne10, $conne10);
$query_rsrandomcat3 = sprintf("SELECT id_categoria, nombre_es, imagen, contenido_es FROM tbl_productos_categorias WHERE estatus = 1 AND id_categoria != %s AND id_categoria!='".$row_rsrandomcat['id_categoria']."' ORDER BY rand()", GetSQLValueString($colname_rsrandomcat3, "int"));
$rsrandomcat3 = mysql_query($query_rsrandomcat3, $conne10) or die(mysql_error());
$row_rsrandomcat3 = mysql_fetch_assoc($rsrandomcat3);
$totalRows_rsrandomcat3 = mysql_num_rows($rsrandomcat3);

mysql_select_db($database_conne10, $conne10);
$query_rsrandomprod1 = "SELECT id_producto, nombre_es, imagen, numerico1, numerico2 FROM tbl_productos WHERE estatus = 1 ORDER BY rand()";
$rsrandomprod1 = mysql_query($query_rsrandomprod1, $conne10) or die(mysql_error());
$row_rsrandomprod1 = mysql_fetch_assoc($rsrandomprod1);
$totalRows_rsrandomprod1 = mysql_num_rows($rsrandomprod1);

$colname_rsrandomprod2 = $row_rsrandomprod1['id_producto'];

mysql_select_db($database_conne10, $conne10);
$query_rsrandomprod2 = sprintf("SELECT id_producto, nombre_es, imagen, numerico1, numerico2 FROM tbl_productos WHERE estatus = 1 AND id_producto != %s ORDER BY rand()", GetSQLValueString($colname_rsrandomprod2, "int"));
$rsrandomprod2 = mysql_query($query_rsrandomprod2, $conne10) or die(mysql_error());
$row_rsrandomprod2 = mysql_fetch_assoc($rsrandomprod2);
$totalRows_rsrandomprod2 = mysql_num_rows($rsrandomprod2);

mysql_select_db($database_conne10, $conne10);
$query_rspublicidad = "SELECT archivo, enlace FROM tbl_publicidad WHERE estatus = 1 ORDER BY rand()";
$rspublicidad = mysql_query($query_rspublicidad, $conne10) or die(mysql_error());
$row_rspublicidad = mysql_fetch_assoc($rspublicidad);
$totalRows_rspublicidad = mysql_num_rows($rspublicidad);

mysql_select_db($database_conne10, $conne10);
$query_rsarreglos1 = "SELECT * FROM tbl_productos WHERE tbl_productos.estatus=1 and categoria<>10 ORDER BY rand()  LIMIT 0,5";
$rsarreglos1 = mysql_query($query_rsarreglos1, $conne10) or die(mysql_error());
$row_rsarreglos1 = mysql_fetch_assoc($rsarreglos1);
$totalRows_rsarreglos1 = mysql_num_rows($rsarreglos1);


// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("uploaded/mod_productos/");
$objDynamicThumb1->setRenameRule("{rsrandomcat.imagen}");
$objDynamicThumb1->setResize(215, 200, true);
$objDynamicThumb1->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb2 = new tNG_DynamicThumbnail("", "KT_thumbnail2");
$objDynamicThumb2->setFolder("uploaded/mod_productos/");
$objDynamicThumb2->setRenameRule("{rsrandomcat3.imagen}");
$objDynamicThumb2->setResize(215, 200, true);
$objDynamicThumb2->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb3 = new tNG_DynamicThumbnail("", "KT_thumbnail3");
$objDynamicThumb3->setFolder("uploaded/mod_productos/");
$objDynamicThumb3->setRenameRule("{rsrandomcat3.imagen}");
$objDynamicThumb3->setResize(200,0, true);
$objDynamicThumb3->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb4 = new tNG_DynamicThumbnail("", "KT_thumbnail4");
$objDynamicThumb4->setFolder("uploaded/mod_productos/");
$objDynamicThumb4->setRenameRule("{rsarreglos1.imagen}");
$objDynamicThumb4->setResize(250,0, true);
$objDynamicThumb4->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb5 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb5->setFolder("uploaded/mod_productos/");
$objDynamicThumb5->setRenameRule("{rsarreglos1.imagen}");
$objDynamicThumb5->setResize(200, 140, true);
$objDynamicThumb5->setWatermark(false);



mysql_select_db($database_conne10, $conne10);
$query_rscategorias = "SELECT id_categoria, nombre_es FROM tbl_productos_categorias WHERE estatus = 1 ORDER BY orden ASC";
$rscategorias = mysql_query($query_rscategorias, $conne10) or die(mysql_error());
$row_rscategorias = mysql_fetch_assoc($rscategorias);
$totalRows_rscategorias = mysql_num_rows($rscategorias);

mysql_select_db($database_conne10, $conne10);
$query_rspromociones = "SELECT * FROM tbl_promociones WHERE tbl_promociones.estatus='1' ORDER BY rand()";
$rspromociones = mysql_query($query_rspromociones, $conne10) or die(mysql_error());
$row_rspromociones = mysql_fetch_assoc($rspromociones);
$totalRows_rspromociones = mysql_num_rows($rspromociones);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/kaprichos01.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Inicio-Floristeria Kaprichos</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<meta name="Description" content="descripcion" />
<meta name="Keywords" content="keywords" />
<link rel="stylesheet" href="css/jd.gallery.css" type="text/css" media="screen" charset="utf-8" />
		<script src="Scripts/mootools-1.2.1-core-yc.js" type="text/javascript"></script>
		<script src="Scripts/mootools-1.2-more.js" type="text/javascript"></script>
		<script src="Scripts/jd.gallery.js" type="text/javascript"></script>
<style type="text/css">
<!--
#homebox01 {
	height: 450px;
	width: 540px;
	overflow: hidden;
}

.homebox3 .vermas a {
	font-weight: bold;
	color: #FFF;
	text-decoration: none;
}
.homebox3 {
	height: 215px;
	width: 200px;
	overflow: hidden;
	border: 1px solid #CCC;
	position: relative;
	background-repeat: no-repeat;
	background-position: center center;
	padding:0px;
	margin-right:30px;
    }
.homebox3 .texto {
	height: 25px;
	width: 200px;
	position: absolute;
	bottom: 0px;
	right: 0px;
	background-image: url(images/nombre.png);
	background-repeat: no-repeat;
	background-position: center center;
	overflow: hidden;
	padding-top: 10px;
	padding-right: 0px;
	padding-bottom: 0px;
	color:#FFFFFF;
	font-weight:bold;
}
.homebox3 .vermas {
    position: absolute;
	right: 9px;
	bottom: 9px;
	overflow: hidden;
	height: 18px;
	width: 52px;
	color: #FFF;
	text-decoration: none;
	text-align: center;
	font-weight: bold;
}

-->
</style>
<!-- InstanceEndEditable -->
<meta name="language" content="es" />
<meta name="author" content="Rodolfo Semsch - www.wboxinteractive.com" />
<meta name="robots" content="INDEX, FOLLOW" />
<meta name="revisit-after" content="15 days" />
<meta name="Reply-to" content="rodolfo@wboxinteractive.com" />
<meta name="document-rights" content="Copyrighted Work" />
<meta name="document-type" content="Web Page" />
<meta name="document-rating" content="General" />
<meta name="document-distribution" content="Global" />
<meta name="document-state" content="Dynamic" />
<meta name="cache-control" content="Public" />
<link href="css/layoutcss.css" rel="stylesheet" type="text/css" />
<link href="css/globalcss.css" rel="stylesheet" type="text/css" />
<link href="css/lytebox.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="Scripts/lytebox.js"></script>
<style type="text/css">
<!--
#logotipo {
	position:absolute;
	width:222px;
	height:112px;
	z-index:1;
	left: 10px;
	top: 10px;
}
#Facebook {
	position:absolute;
	width:120px;
	height:28px;
	z-index:2;
	left: 550px;
	top: 19px;
}
#facebooktxt {
	position:absolute;
	width:111px;
	height:53px;
	z-index:3;
	left: 555px;
	top: 53px;
}
#buscador {
	position:absolute;
	width:186px;
	height:26px;
	z-index:1;
	left: 786px;
	top: 6px;
}
#buscatxt {
	position:absolute;
	width:55px;
	height:21px;
	z-index:2;
	left: 731px;
	top: 9px;
}
#contactoheader {
	position:absolute;
	width:252px;
	height:97px;
	z-index:4;
	left: 281px;
	top: 17px;
}
-->
</style>
</head>

<body>
<div id="layout_wrapper">
  <div id="layout_header">
    <div id="logotipo"><a href="index.php"><img src="images/flores-para-el-salvador.png" width="222" height="112" alt="Kapricho's Floristería - Flores para El Salvador" border="0" /></a></div>
    <div id="Facebook"><a href="http://www.facebook.com/pages/Kaprichos-Floristeria/151224814917493" target="_blank"><img src="images/boton-facebook.png" width="120" height="28" alt="Visítenos en Facebook" border="0"/></a></div>
    <div id="facebooktxt"><a href="http://www.facebook.com/pages/Kaprichos-Floristeria/151224814917493" target="_blank">Siguenos en Facebook y encuentra promociones y precios exclusivos para nuestros fans</a></div>
    <div id="contactoheader"><img src="images/numero.png" border="0"><br />
       <a href="mailto:info@kaprichosfloristeria.com" style="font-size:14px; color:#5E6332;; line-height:18px;"><strong>info@kaprichosfloristeria.com</strong></a><br />
    <span style="color:#D82686; font-size: 12px; line-height:22px;"><strong>Entregas a domicilio en todo El Salvador</strong></span></div>
  </div>
  <div id="layout_menu">
    <div id="buscador">
      <form id="formbuscar" name="formbuscar" method="post" action="resultados.php">
          <div id="inputkeyword">
            <input type="text" name="eltermino" id="eltermino" style="border:none; width:145px" />
          </div>
          <div id="botonbuscar">
            <input type="image" name="clicktosearch" id="clicktosearch" src="images/buscar-flores-el-salvador.png" />
          </div>
      </form>
    </div>
    <div id="buscatxt">Buscar:</div>
    <ul class="menuppal">
      <li><a href="catalogo.php">Catálogo</a></li>
      <li><a href="ofertas.php">Ofertas</a></li>
      <li><a href="preguntas.php">Preguntas</a></li>
      <li><a href="pago.php">¿Cómo pagar?</a></li>
      <li><a href="servicios.php">Servicios</a></li>
      <li><a href="tip.php">Tips</a></li>
      <li><a href="contacto.php">Contáctenos</a></li>
      <li><a href="videos.php">Videos</a></li>
    </ul>
  </div>
  <div id="layout_content">
    <table width="100%" border="0" cellspacing="10" cellpadding="0">
      <tr>
        <td width="170" valign="top"><div id="subcategorias">
          <h1>Arreglos florales para<br/> El Salvador</h1>
          <ul id="categorias">
            <?php do { ?>
              <li><a href="categoria.php?c=<?php echo $row_rscategorias['id_categoria']; ?>"><?php echo $row_rscategorias['nombre_es']; ?></a></li>
              <?php } while ($row_rscategorias = mysql_fetch_assoc($rscategorias)); ?>
          </ul>
        </div></td>
        <td valign="top"><!-- InstanceBeginEditable name="MAIN" -->
 <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
            <td height="450" valign="top" width="500px" style="margin-left:5px;">
            <div id="homebox01">
            <script type="text/javascript">
			function startGallery() {
				var myGallery = new gallery($('myGallery'), {
					timed: true
				});
			}
			window.addEvent('domready',startGallery);
		</script>
			<div id="myGallery">
				  <?php do{?>
			  <div class="imageElement">
				<h3><?php echo $row_rspromociones['nombre']; ?></h3>
					<p><?php echo $row_rspromociones['descripcion']; ?></p>
					<a href="
                    <?php if($row_rspromociones['enlace']!=""){?>                   
                    <?php echo $row_rspromociones['enlace'];?>
                     <?php } else {?>#
                    <?php }?>" title="<?php echo $row_rspromociones['nombre']; ?>" class="open"></a>
				<img border="0" src="uploaded/mod_promociones/<?php echo $row_rspromociones['imagen']; ?>" class="full"/>
					<img border="0" src="uploaded/mod_promociones/<?php echo $row_rspromociones['imagen']; ?>" class="thumbnail" /></div>
                    <?php } while($row_rspromociones = mysql_fetch_assoc($rspromociones));?>
			
                </div>
           </div></td>
         
            <td width="200" height="450" valign="top" align="center">
            <div class="homebox3" ><a href="categoria.php?c=<?php echo $row_rsrandomcat['id_categoria']?>">
           <img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0"  />
 <div class="texto"><?php echo $row_rsrandomcat['nombre_es']; ?></div></a>
              </div><br/>
<div class="homebox3" >
            <a href="categoria.php?c=<?php echo $row_rsrandomcat3['id_categoria']?>">
             <img src="<?php echo $objDynamicThumb2->Execute(); ?>" border="0"  />
              <div class="texto"><?php echo $row_rsrandomcat3['nombre_es']; ?></div></a>
              </div>              
              </td>
            </tr>
        </table>
    <div style="margin-top:20px;">
            <?php 
			$buscar = array(" ", "(", ")");
	  		$reempla = array("%20", "%28", "%29");
			do { ?>
              <div class="boxarreglo" style="margin-right:0px;" >
                <div class="foto" style="background: url(<?php echo str_replace($buscar, $reempla, $objDynamicThumb5->Execute()); ?>) no-repeat center center;"><a href="arreglos-ver.php?id=<?php echo $row_rsarreglos1['id_producto']; ?>">
               <img src="images/blank.gif" alt="<?php echo $row_rsarreglos1['nombre_es']; ?>" width="30" height="180" border="0" /></a></div>
                <div class="texto"><a href="arreglos-ver.php?id=<?php echo $row_rsarreglos1['id_producto']; ?>"><?php echo $row_rsarreglos1['nombre_es']; ?><br/>
                $<?php echo number_format($row_rsarreglos1['numerico1'],2); ?></a><br/>
                <a href="uploaded/mod_productos/<?php echo $row_rsarreglos1['imagen'];?>" rel="lytebox[galera]" title="<?php echo $row_rsarreglos1['nombre_es']; ?>"><img src="images/venta.png" border="0"></a>
               <a href="arreglos-ver.php?id=<?php echo $row_rsarreglos1['id_producto']; ?>"><img src="images/buy.png" border="0"></a>
                </div>
              </div>
<?php } while ($row_rsarreglos1 = mysql_fetch_assoc($rsarreglos1)); ?>
    </div>
		<!-- InstanceEndEditable --></td>
      </tr>
    </table>
  </div>
  <div id="layout_footer">
    <table width="100%" border="0" cellspacing="0" cellpadding="10">
      <tr>
        <td width="222"><img src="images/logo-kaprichos-footer.png" width="222" height="112" alt="Kapricho's Floristería en El Salvador" /></td>
        <td><h2>Arreglos Florales a domicilio en El Salvador</h2>
        <p>Kapricho´s  Floristería nació con el objetivo de   brindar arreglos florales innovadores, especializándonos en actualizar  constantemente todos aquellos detalles que hacen su arreglo diferente. En  Kapricho´s Floristería nos esmeramos porque sus sentimientos sean expresados  con especial cuidado y garantizamos cubrir las expectativas.<br/>
Todos nuestros  arreglos son elaborados con materia prima de alta calidad, entre las clases de  arreglos que le ofrecemos, tenemos: Frutales, primaverales, tropicales,  orquídeas, globos sorpresa, chocolates, etc. Para toda ocasión, cumpleaños,  felicitaciones, amistad, recuperación.<br />
También, nos  ponemos a su disposición para cualquier tipo de evento, bodas, primera  comunión, mesas de Honor, Baby shower  decoraciones de salones, eventos de gobierno, Decoración de iglesias, etc. En  donde le ofrecemos calidad, bajos costos y un alto sentido de responsabilidad.<br/>
Ofrecemos nuestro  servicio los siete días a la semana, por lo que, nos encontramos a su  disposición en aquellos momentos inesperados y donde usted desea expresarse a  través de un lindo detalle.</p></td>
      </tr>
      <tr>
      <td colspan="2" align="center">
       <ul class="menuppal">
      <li><a href="catalogo.php">Catálogo</a></li>
      <li><a href="ofertas.php">Ofertas</a></li>
      <li><a href="preguntas.php">Preguntas</a></li>
      <li><a href="pago.php">¿Cómo pagar?</a></li>
      <li><a href="servicios.php">Servicios</a></li>
      <li><a href="tip.php">Tips</a></li>
      <li><a href="contacto.php">Contáctenos</a></li>
      <li><a href="videos.php">Videos</a></li>
      <li><a href="politicas.php">Politicas de Reembolso</a></li>
    </ul>
      </td>      
      </tr>
      <tr>
        <td colspan="2" align="center"><p><a href="http://www.2checkout.com/" target="_blank" style="color:#FFF; text-decoration:underline;">2Checkout.com</a>, Inc. is an authorized retailer of kaprichosfloristeria.com<br />
        <img src="images/2cocc05.gif" width="182" height="46" /></p></td>
      </tr>
    </table>
  </div>
</div>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($rscategorias);

mysql_free_result($rspromociones);

mysql_free_result($rscategorias1);

mysql_free_result($rsrandomcat);

mysql_free_result($rsrandomcat2);

mysql_free_result($rsrandomcat3);

mysql_free_result($rsrandomprod1);

mysql_free_result($rsrandomprod2);

mysql_free_result($rspublicidad);

mysql_free_result($rsarreglos1);

?>
