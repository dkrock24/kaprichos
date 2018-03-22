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

mysql_select_db($database_conne10, $conne10);
$query_rsnoticiappal = "SELECT * FROM tbl_noticias WHERE estatus = 1 ORDER BY fecha DESC, orden ASC LIMIT 1";
$rsnoticiappal = mysql_query($query_rsnoticiappal, $conne10) or die(mysql_error());
$row_rsnoticiappal = mysql_fetch_assoc($rsnoticiappal);
$totalRows_rsnoticiappal = mysql_num_rows($rsnoticiappal);

$colprimeran_rsnoticias = "-1";
if (isset($row_rsnoticiappal['id_noticia'])) {
  $colprimeran_rsnoticias = $row_rsnoticiappal['id_noticia'];
}
mysql_select_db($database_conne10, $conne10);
$query_rsnoticias = sprintf("SELECT * FROM tbl_noticias WHERE estatus = 1 AND id_noticia != %s ORDER BY fecha DESC, orden ASC", GetSQLValueString($colprimeran_rsnoticias, "int"));
$rsnoticias = mysql_query($query_rsnoticias, $conne10) or die(mysql_error());
$row_rsnoticias = mysql_fetch_assoc($rsnoticias);
$totalRows_rsnoticias = mysql_num_rows($rsnoticias);

$colname_rslanoticia = "-1";
if (isset($_GET['noticia'])) {
  $colname_rslanoticia = $_GET['noticia'];
}
mysql_select_db($database_conne10, $conne10);
$query_rslanoticia = sprintf("SELECT * FROM tbl_noticias WHERE id_noticia = %s", GetSQLValueString($colname_rslanoticia, "int"));
$rslanoticia = mysql_query($query_rslanoticia, $conne10) or die(mysql_error());
$row_rslanoticia = mysql_fetch_assoc($rslanoticia);
$totalRows_rslanoticia = mysql_num_rows($rslanoticia);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("uploaded/mod_noticias/");
$objDynamicThumb1->setRenameRule("{rsnoticiappal.imagen}");
$objDynamicThumb1->setResize(300, 0, true);
$objDynamicThumb1->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb2 = new tNG_DynamicThumbnail("", "KT_thumbnail2");
$objDynamicThumb2->setFolder("uploaded/mod_noticias/");
$objDynamicThumb2->setRenameRule("{rsnoticias.imagen}");
$objDynamicThumb2->setResize(120, 0, true);
$objDynamicThumb2->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb3 = new tNG_DynamicThumbnail("", "KT_thumbnail3");
$objDynamicThumb3->setFolder("uploaded/mod_noticias/");
$objDynamicThumb3->setRenameRule("{rslanoticia.imagen}");
$objDynamicThumb3->setResize(350, 200, true);
$objDynamicThumb3->setWatermark(false);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../css/globalcss.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="navbar"><a href="/">Inicio</a> &gt; <a href="noticias.php">Noticias</a><?php if(isset($_GET['noticia']) && $_GET['noticia']!="") { ?> &gt; <a href="?noticia=<?php echo $row_rslanoticia['id_noticia']; ?>&amp;titular=<?php echo $row_rslanoticia['titulo']; ?>"><?php echo $row_rslanoticia['titulo']; ?></a>
<?php } ?></div>

<?php if(isset($_GET['noticia']) && $_GET['noticia']!="") { ?>

<div id="contenidoppal">
  <h1><?php echo $row_rslanoticia['titulo']; ?></h1>
  <table width="100%" border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td width="100" valign="top"><img src="<?php echo $objDynamicThumb3->Execute(); ?>" border="0" /></td>
      <td valign="top"><?php echo $row_rslanoticia['introduccion']; ?></td>
    </tr>
  </table>
  <?php echo $row_rslanoticia['contenido']; ?>
</div>

<?php } else { ?>

<div id="contenidoppal">
  <table width="100%" border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td width="250" valign="top"><a href="?noticia=<?php echo $row_rsnoticiappal['id_noticia']; ?>&amp;titular=<?php echo $row_rsnoticiappal['titulo']; ?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" alt="<?php echo $row_rsnoticiappal['titulo']; ?>" title="<?php echo $row_rsnoticiappal['titulo']; ?>" border="0" /></a></td>
      <td valign="top"><h1><?php echo $row_rsnoticiappal['titulo']; ?></h1>
        <?php echo $row_rsnoticiappal['introduccion']; ?> <a href="?noticia=<?php echo $row_rsnoticiappal['id_noticia']; ?>&amp;titular=<?php echo $row_rsnoticiappal['titulo']; ?>">[Leer más]</a></td>
    </tr>
  </table>
</div>

<table width="100%" border="0" cellpadding="10" cellspacing="0">
  <tr>
    <?php
  do { // horizontal looper version 3
?>
      <td width="50%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td width="120" valign="top"><a href="?noticia=<?php echo $row_rsnoticias['id_noticia']; ?>&amp;titular=<?php echo $row_rsnoticias['titulo']; ?>"><img src="<?php echo $objDynamicThumb2->Execute(); ?>" alt="<?php echo $row_rsnoticias['titulo']; ?>" title="<?php echo $row_rsnoticias['titulo']; ?>" border="0" /></a></td>
            <td valign="top"><h2><?php echo $row_rsnoticias['titulo']; ?></h2>
            <?php echo $row_rsnoticias['introduccion']; ?> <a href="?noticia=<?php echo $row_rsnoticias['id_noticia']; ?>&amp;titular=<?php echo $row_rsnoticias['titulo']; ?>">[Leer más]</a></td>
          </tr>
      </table></td>
      <?php
    $row_rsnoticias = mysql_fetch_assoc($rsnoticias);
    if (!isset($nested_rsnoticias)) {
      $nested_rsnoticias= 1;
    }
    if (isset($row_rsnoticias) && is_array($row_rsnoticias) && $nested_rsnoticias++ % 2==0) {
      echo "</tr><tr>";
    }
  } while ($row_rsnoticias); //end horizontal looper version 3
?>
</tr>
</table>

<?php } ?>
</body>
</html>
<?php
mysql_free_result($rsnoticiappal);

mysql_free_result($rsnoticias);

mysql_free_result($rslanoticia);
?>
