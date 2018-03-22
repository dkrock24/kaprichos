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
$objDynamicThumb1->setResize(200,0, true);
$objDynamicThumb1->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb2 = new tNG_DynamicThumbnail("", "KT_thumbnail2");
$objDynamicThumb2->setFolder("uploaded/mod_productos/");
$objDynamicThumb2->setRenameRule("{rsrandomcat2.imagen}");
$objDynamicThumb2->setResize(200,0, true);
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
	height: 220px;
	width: 200px;
	overflow: hidden;
	border: 1px solid #CCC;
	position: relative;
	background-repeat: no-repeat;
	background-position: center center;
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
<body>
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
         
            <td width="200" height="450" valign="top" align="left"><div class="homebox3" ><a href="categoria.php?c=<?php echo $row_rsrandomcat['id_categoria']?>">
            <img src="resize.php?src=/uploaded/mod_productos/<?php echo $row_rsrandomcat['imagen'];?>&h=230&w=200&zc=1" border="0" alt="<?php echo $row_rsrandomcat['nombre_es'];?>" title="<?php echo $row_rsrandomcat['nombre_es'];?>" />
 <div class="texto"><?php echo $row_rsrandomcat['nombre_es']; ?></div></a>
              </div><br/><br/>
<div class="homebox3" >
            <a href="categoria.php?c=<?php echo $row_rsrandomcat3['id_categoria']?>">
            <img src="resize.php?src=/uploaded/mod_productos/<?php echo $row_rsrandomcat3['imagen'];?>&h=230&w=200&zc=1" border="0" alt="<?php echo $row_rsrandomcat3['nombre_es'];?>" title="<?php echo $row_rsrandomcat3['nombre_es'];?>" />
              <div class="texto"><?php echo $row_rsrandomcat3['nombre_es']; ?></div></a>
              </div>              
              </td>
            </tr>
           
        </table>