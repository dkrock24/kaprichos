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

mysql_select_db($database_conne10, $conne10);
$query_accesos = "SELECT * FROM accesos ORDER BY orden ASC";
$accesos = mysql_query($query_accesos, $conne10) or die(mysql_error());
$row_accesos = mysql_fetch_assoc($accesos);
$totalRows_accesos = mysql_num_rows($accesos);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/wbcms01.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Gestor de Contenidos WB/CMS. Por WebBox Interactive</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
<meta name="language" content="es" />
<meta name="author" content="Rodolfo Semsch - www.wboxinteractive.com" />
<meta name="copyright" content="WebBox Interactive, S.A. de C.V." />
<meta name="robots" content="NOINDEX, NOFOLLOW" />
<meta name="Reply-to" content="rodolfo@wboxinteractive.com" />
<meta name="document-rights" content="Private" />
<meta name="document-type" content="Private" />
<meta name="document-distribution" content="IU" />
<meta name="cache-control" content="no-cache" />
<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<link href="css/lytebox.css" rel="stylesheet" type="text/css" />
<link href="css/wbcmscss01.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="ed/ckeditor.js"></script>
<script type="text/javascript" src="Scripts/lytebox.js"></script>
</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" background="images/headerbg.jpg" id="header">
  <tr>
    <td height="50"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="bottom" style="padding-left: 15px;"><img src="images/wbcms.png" alt="WB/CMS" width="133" height="36" /></td>
        <td align="right" valign="bottom" style="padding-right: 15px;"><a href="http://www.wboxinteractive.com" target="_blank"><img src="images/developeby.png" alt="Desarrollado por WebBox Interactive" width="222" height="11" border="0" /></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="35"><ul>
      <li><a href="index.php">INICIO</a></li>
      <!--<li><a href="../wbcms/mod_contenido/index.php">CONTENIDO</a></li>-->
      <li><a href="modulos.php">MÓDULOS</a></li>
      <li><a href="accesos.php">ACCESOS Y HERRAMIENTAS</a></li>
      <li><a href="soporte.php">SOPORTE</a></li>
    </ul></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td><!-- InstanceBeginEditable name="WBCMSMAIN" -->
      <table width="100%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td width="25" valign="top">&nbsp;</td>
          <td width="250" valign="top"><strong>Nombre</strong></td>
          <td valign="top"><strong>Referencia</strong></td>
        </tr>
        <?php do { ?>
          <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor=''">
            <td valign="top"><a href="<?php echo $row_accesos['enlace']; ?>" target="_blank"><img src="images/icons/access.png" alt="Ingresar" width="20" height="20" border="0" /></a></td>
            <td valign="top"><strong><a href="<?php echo $row_accesos['enlace']; ?>" target="_blank"><?php echo $row_accesos['nombre']; ?></a></strong></td>
            <td valign="top"><?php echo $row_accesos['descripcion']; ?></td>
          </tr>
          <?php } while ($row_accesos = mysql_fetch_assoc($accesos)); ?>
      </table>
    <!-- InstanceEndEditable --></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($accesos);
?>
