<?php require_once('../Connections/conne10.php'); ?>
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

$colcontenido_Recordset1 = "-1";
if (isset($_GET['contenido'])) {
  $colcontenido_Recordset1 = $_GET['contenido'];
}
mysql_select_db($database_conne10, $conne10);
$query_Recordset1 = sprintf("SELECT tbl_secciones.nombre AS seccion_nombre, tbl_secciones_contenido.*, tbl_secciones_categorias.id_categoria AS categoria_id, tbl_secciones_categorias.nombre AS categoria_nombre, tbl_secciones.id_seccion AS seccion_id FROM ((tbl_secciones_contenido LEFT JOIN tbl_secciones_categorias ON tbl_secciones_categorias.id_categoria=tbl_secciones_contenido.categoria) LEFT JOIN tbl_secciones ON tbl_secciones.id_seccion=tbl_secciones_categorias.seccion)  WHERE id_contenido = %s", GetSQLValueString($colcontenido_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $conne10) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../css/globalcss.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="navbar"><a href="/">Inicio</a> &gt; <a href="seccion.php?seccion=<?php echo $row_Recordset1['seccion_id']; ?>&amp;nombre=<?php echo $row_Recordset1['seccion_nombre']; ?>"><?php echo $row_Recordset1['seccion_nombre']; ?></a> &gt; <a href="categoria.php?categoria=<?php echo $row_Recordset1['categoria_id']; ?>&amp;nombre=<?php echo $row_Recordset1['categoria_nombre']; ?>"><?php echo $row_Recordset1['categoria_nombre']; ?></a> &gt; <a href="contenido.php?contenido=<?php echo $row_Recordset1['id_contenido']; ?>&amp;nombre=<?php echo $row_Recordset1['nombre']; ?>"><?php echo $row_Recordset1['nombre']; ?></a></div>
<div id="contenidoppal">
  <h1><?php echo $row_Recordset1['nombre']; ?></h1>
  <?php echo $row_Recordset1['contenido']; ?></div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
