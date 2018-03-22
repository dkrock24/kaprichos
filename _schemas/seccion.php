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

$colseccion_rsseccion = "-1";
if (isset($_GET['seccion'])) {
  $colseccion_rsseccion = $_GET['seccion'];
}
mysql_select_db($database_conne10, $conne10);
$query_rsseccion = sprintf("SELECT * FROM tbl_secciones WHERE id_seccion = %s", GetSQLValueString($colseccion_rsseccion, "int"));
$rsseccion = mysql_query($query_rsseccion, $conne10) or die(mysql_error());
$row_rsseccion = mysql_fetch_assoc($rsseccion);
$totalRows_rsseccion = mysql_num_rows($rsseccion);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../css/globalcss.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="navbar"><a href="/">Inicio</a> &gt; <a href="seccion.php?seccion=<?php echo $row_rsseccion['id_seccion']; ?>&amp;nombre=<?php echo $row_rsseccion['nombre']; ?>"><?php echo $row_rsseccion['nombre']; ?></a></div>
<div id="contenidoppal">
  <h1><?php echo $row_rsseccion['nombre']; ?></h1>
  <p><?php echo $row_rsseccion['contenido']; ?></p>
</div>
</body>
</html>
<?php
mysql_free_result($rsseccion);
?>
