<?php require_once('../Connections/conne10.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

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

$colcategoria_rscategoria = "-1";
if (isset($_GET['categoria'])) {
  $colcategoria_rscategoria = $_GET['categoria'];
}
mysql_select_db($database_conne10, $conne10);
$query_rscategoria = sprintf("SELECT tbl_secciones.nombre AS seccion_nombre, tbl_secciones_categorias.*, tbl_secciones.id_seccion AS seccion_id FROM (tbl_secciones_categorias LEFT JOIN tbl_secciones ON tbl_secciones.id_seccion=tbl_secciones_categorias.seccion)  WHERE id_categoria = %s", GetSQLValueString($colcategoria_rscategoria, "int"));
$rscategoria = mysql_query($query_rscategoria, $conne10) or die(mysql_error());
$row_rscategoria = mysql_fetch_assoc($rscategoria);
$totalRows_rscategoria = mysql_num_rows($rscategoria);

$colname_rscontenidos = "-1";
if (isset($_GET['categoria'])) {
  $colname_rscontenidos = $_GET['categoria'];
}
mysql_select_db($database_conne10, $conne10);
$query_rscontenidos = sprintf("SELECT id_contenido, nombre, imagen, introduccion FROM tbl_secciones_contenido WHERE categoria = %s ORDER BY orden ASC", GetSQLValueString($colname_rscontenidos, "int"));
$rscontenidos = mysql_query($query_rscontenidos, $conne10) or die(mysql_error());
$row_rscontenidos = mysql_fetch_assoc($rscontenidos);
$totalRows_rscontenidos = mysql_num_rows($rscontenidos);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("../", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../uploaded/mod_contenido/");
$objDynamicThumb1->setRenameRule("{rscontenidos.imagen}");
$objDynamicThumb1->setResize(100, 0, true);
$objDynamicThumb1->setWatermark(false);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../css/globalcss.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="navbar"><a href="/">Inicio</a> &gt; <a href="seccion.php?seccion=<?php echo $row_rscategoria['seccion_id']; ?>&amp;nombre=<?php echo $row_rscategoria['seccion_nombre']; ?>"><?php echo $row_rscategoria['seccion_nombre']; ?></a> &gt; <a href="categoria.php?categoria=<?php echo $row_rscategoria['id_categoria']; ?>&amp;nombre=<?php echo $row_rscategoria['nombre']; ?>"><?php echo $row_rscategoria['nombre']; ?></a></div>
<div id="contenidoppal">
  <h1><?php echo $row_rscategoria['nombre']; ?></h1>
  <?php echo $row_rscategoria['contenido']; ?> </div>
<?php if ($totalRows_rscontenidos > 0) { // Show if recordset not empty ?>
  <table width="100%" border="0" cellpadding="10" cellspacing="0">
    <tr>
      <?php
  do { // horizontal looper version 3
?>
        <td width="<?php echo number_format(100/$row_rscategoria['columnas'],0); ?>%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="5">
            <tr>
              <td width="100" valign="top"><a href="contenido.php?contenido=<?php echo $row_rscontenidos['id_contenido']; ?>&amp;nombre=<?php echo $row_rscontenidos['nombre']; ?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></a></td>
              <td valign="top"><h2><?php echo $row_rscontenidos['nombre']; ?></h2>
                <?php echo $row_rscontenidos['introduccion']; ?> <a href="contenido.php?contenido=<?php echo $row_rscontenidos['id_contenido']; ?>&amp;nombre=<?php echo $row_rscontenidos['nombre']; ?>">[Leer más]</a></td>
            </tr>
          </table></td>
        <?php
    $row_rscontenidos = mysql_fetch_assoc($rscontenidos);
    if (!isset($nested_rscontenidos)) {
      $nested_rscontenidos= 1;
    }
    if (isset($row_rscontenidos) && is_array($row_rscontenidos) && $nested_rscontenidos++ % $row_rscategoria['columnas']==0) {
      echo "</tr><tr>";
    }
  } while ($row_rscontenidos); //end horizontal looper version 3
?>
    </tr>
  </table>
  <?php } // Show if recordset not empty ?>
</body>
</html>
<?php
mysql_free_result($rscategoria);

mysql_free_result($rscontenidos);
?>
