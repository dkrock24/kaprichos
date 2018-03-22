<?php require_once('Connections/conne10.php'); ?>
<?php
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

$currentPage = $_SERVER["PHP_SELF"];

mysql_select_db($database_conne10, $conne10);
$query_rscategorias = "SELECT id_categoria, nombre_es FROM tbl_productos_categorias WHERE estatus = 1 ORDER BY orden ASC";
$rscategorias = mysql_query($query_rscategorias, $conne10) or die(mysql_error());
$row_rscategorias = mysql_fetch_assoc($rscategorias);
$totalRows_rscategorias = mysql_num_rows($rscategorias);

$maxRows_rsvideos = 25;
$pageNum_rsvideos = 0;
if (isset($_GET['pageNum_rsvideos'])) {
  $pageNum_rsvideos = $_GET['pageNum_rsvideos'];
}
$startRow_rsvideos = $pageNum_rsvideos * $maxRows_rsvideos;

$colname_rsvideos = "-1";
if (isset($_GET['categoria'])) {
  $colname_rsvideos = $_GET['categoria'];
}
mysql_select_db($database_conne10, $conne10);
$query_rsvideos ="SELECT * FROM tbl_videos ";
$query_limit_rsvideos = sprintf("%s LIMIT %d, %d", $query_rsvideos, $startRow_rsvideos, $maxRows_rsvideos);
$rsvideos = mysql_query($query_limit_rsvideos, $conne10) or die(mysql_error());
$row_rsvideos = mysql_fetch_assoc($rsvideos);

if (isset($_GET['totalRows_rsvideos'])) {
  $totalRows_rsvideos = $_GET['totalRows_rsvideos'];
} else {
  $all_rsvideos = mysql_query($query_rsvideos);
  $totalRows_rsvideos = mysql_num_rows($all_rsvideos);
}
$totalPages_rsvideos = ceil($totalRows_rsvideos/$maxRows_rsvideos)-1;

$colname_rslacategoria = "-1";
if (isset($_GET['categoria'])) {
  $colname_rslacategoria = $_GET['categoria'];
}
mysql_select_db($database_conne10, $conne10);
$query_rslacategoria = "SELECT * FROM tbl_videos_cats";
$rslacategoria = mysql_query($query_rslacategoria, $conne10) or die(mysql_error());
$row_rslacategoria = mysql_fetch_assoc($rslacategoria);
$totalRows_rslacategoria = mysql_num_rows($rslacategoria);

$colname_rselvideo = "-1";
if (isset($_GET['video'])) {
  $colname_rselvideo = $_GET['video'];
}
mysql_select_db($database_conne10, $conne10);
$query_rselvideo = sprintf("SELECT * FROM tbl_videos WHERE id_video = %s", GetSQLValueString($colname_rselvideo, "int"));
$rselvideo = mysql_query($query_rselvideo, $conne10) or die(mysql_error());
$row_rselvideo = mysql_fetch_assoc($rselvideo);
$totalRows_rselvideo = mysql_num_rows($rselvideo);

$queryString_rsvideos = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsvideos") == false && 
        stristr($param, "totalRows_rsvideos") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsvideos = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rsvideos = sprintf("&totalRows_rsvideos=%d%s", $totalRows_rsvideos, $queryString_rsvideos);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("uploaded/mod_videos/");
$objDynamicThumb1->setRenameRule("{rsvideos.imagen}");
$objDynamicThumb1->setResize(120, 120, true);
$objDynamicThumb1->setWatermark(false);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/kaprichos01.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Floristeria Kaprichos</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<meta name="Description" content="descripcion" />
<meta name="Keywords" content="keywords" />
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
<div id="navbar"><a href="index.php">Inicio</a> &gt; <a href="videos.php">Videos</a> &gt; <a href="?categoria=<?php echo $row_rslacategoria['id_categoria']; ?>"><?php echo $row_rslacategoria['nombre_es']; ?></a>
  <?php if(isset($_GET['video'])) { ?>
  &gt; <a href="?categoria=<?php echo $row_rselvideo['categoria']; ?>&amp;video=<?php echo $row_rselvideo['id_video']; ?>"><?php echo $row_rselvideo['nombre_es']; ?></a>
  <?php } ?>
</div>
<?php if(!isset($_GET['video'])) { ?>
<div id="v_catalogo">
  <?php do { ?>
    <div class="videobox">
      <div class="video"><a href="?categoria=<?php echo $row_rsvideos['categoria']; ?>&amp;video=<?php echo $row_rsvideos['id_video']; ?>" title="<?php echo $row_rsvideos['nombre_es']; ?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" alt="<?php echo $row_rsvideos['nombre_es']; ?>" border="0" class="boxshadow" /></a></div>
      <div class="info">
        <h2><?php echo $row_rsvideos['nombre_es']; ?></h2>
        <p><?php echo $row_rsvideos['sinopsis_es']; ?></p>
      </div>
    </div>
    <?php } while ($row_rsvideos = mysql_fetch_assoc($rsvideos)); ?>
  <div class="clear"></div>
  <table width="100%" border="0" cellpadding="5" cellspacing="0">
    <tr>
      <td width="80" align="center"><?php if ($pageNum_rsvideos > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_rsvideos=%d%s", $currentPage, 0, $queryString_rsvideos); ?>" class="navbuttongral">Inicio</a>
          <?php } // Show if not first page ?></td>
      <td width="80" align="center"><?php if ($pageNum_rsvideos > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_rsvideos=%d%s", $currentPage, max(0, $pageNum_rsvideos - 1), $queryString_rsvideos); ?>" class="navbuttongral">« Anteriores</a>
          <?php } // Show if not first page ?></td>
      <td align="center">&nbsp;<?php echo ($startRow_rsvideos + 1) ?> al <?php echo min($startRow_rsvideos + $maxRows_rsvideos, $totalRows_rsvideos) ?> de <?php echo $totalRows_rsvideos ?></td>
      <td width="80" align="center"><?php if ($pageNum_rsvideos < $totalPages_rsvideos) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_rsvideos=%d%s", $currentPage, min($totalPages_rsvideos, $pageNum_rsvideos + 1), $queryString_rsvideos); ?>" class="navbuttongral">Siguientes »</a>
          <?php } // Show if not last page ?></td>
      <td width="80" align="center"><?php if ($pageNum_rsvideos < $totalPages_rsvideos) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_rsvideos=%d%s", $currentPage, $totalPages_rsvideos, $queryString_rsvideos); ?>" class="navbuttongral">Final</a>
          <?php } // Show if not last page ?></td>
    </tr>
  </table>
<div class="clear"></div>
</div>
<div class="clear"></div>
<?php } else { ?>
<div id="v_visualizar">
  <h2><?php echo $row_rselvideo['nombre_es']; ?></h2>
  <div class="videoscreen"><?php echo $row_rselvideo['codigo']; ?></div>
  <div class="videosinopsis"><?php echo $row_rselvideo['sinopsis_es']; ?></div>
</div>
<div class="clear"></div>
<?php } ?>
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
mysql_free_result($rsvideos);

mysql_free_result($rslacategoria);

mysql_free_result($rselvideo);
?>
