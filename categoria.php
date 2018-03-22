<?php require_once('Connections/conne10.php'); ?>
<?php
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
$query_rscategorias = "SELECT * FROM tbl_productos_categorias WHERE estatus = 1 ORDER BY orden ASC";
$rscategorias = mysql_query($query_rscategorias, $conne10) or die(mysql_error());
$row_rscategorias = mysql_fetch_assoc($rscategorias);
$totalRows_rscategorias = mysql_num_rows($rscategorias);

$colname_rsthiscat = "-1";
if (isset($_GET['c'])) {
  $colname_rsthiscat = $_GET['c'];
}
mysql_select_db($database_conne10, $conne10);
$query_rsthiscat = sprintf("SELECT nombre_es FROM tbl_productos_categorias WHERE estatus='1' AND id_categoria = %s", GetSQLValueString($colname_rsthiscat, "int"));
$rsthiscat = mysql_query($query_rsthiscat, $conne10) or die(mysql_error());
$row_rsthiscat = mysql_fetch_assoc($rsthiscat);
$totalRows_rsthiscat = mysql_num_rows($rsthiscat);

$maxRows_rsarreglos1 = 16;
$pageNum_rsarreglos1 = 0;
if (isset($_GET['pageNum_rsarreglos1'])) {
  $pageNum_rsarreglos1 = $_GET['pageNum_rsarreglos1'];
}
$startRow_rsarreglos1 = $pageNum_rsarreglos1 * $maxRows_rsarreglos1;

mysql_select_db($database_conne10, $conne10);
$query_rsarreglos1 = "SELECT * FROM tbl_productos WHERE  estatus='1' AND tbl_productos.categoria='".$colname_rsthiscat."' ORDER BY tbl_productos.orden ASC";
$query_limit_rsarreglos1 = sprintf("%s LIMIT %d, %d", $query_rsarreglos1, $startRow_rsarreglos1, $maxRows_rsarreglos1);
$rsarreglos1 = mysql_query($query_limit_rsarreglos1, $conne10) or die(mysql_error());
$row_rsarreglos1 = mysql_fetch_assoc($rsarreglos1);
if (isset($_GET['totalRows_rsarreglos1'])) {
  $totalRows_rsarreglos1 = $_GET['totalRows_rsarreglos1'];
} else {
  $all_rsarreglos1 = mysql_query($query_rsarreglos1);
  $totalRows_rsarreglos1 = mysql_num_rows($all_rsarreglos1);
}
$totalPages_rsarreglos1 = ceil($totalRows_rsarreglos1/$maxRows_rsarreglos1)-1;

$queryString_rsarreglos1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsarreglos1") == false && 
        stristr($param, "totalRows_rsarreglos1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsarreglos1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rsarreglos1 = sprintf("&totalRows_rsarreglos1=%d%s", $totalRows_rsarreglos1, $queryString_rsarreglos1);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("uploaded/mod_productos/");
$objDynamicThumb1->setRenameRule("{rsarreglos1.imagen}");
$objDynamicThumb1->setResize(180, 0, true);
$objDynamicThumb1->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb2 = new tNG_DynamicThumbnail("", "KT_thumbnail2");
$objDynamicThumb2->setFolder("uploaded/mod_productos/");
$objDynamicThumb2->setRenameRule("{rsarreglos1.imagen}");
$objDynamicThumb2->setResize(0, 200, true);
$objDynamicThumb2->setWatermark(false);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/kaprichos01.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title><?php echo $row_rsthiscat['nombre_es']; ?>-Floristeria Kaprichos</title>
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
    <div id="productos">
      <h1><?php echo $row_rsthiscat['nombre_es']; ?></h1>
      <div id="navegando">
        <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
          <tr>
            <td width="55" align="left" valign="top"><?php if ($pageNum_rsarreglos1 > 0) { // Show if not first page ?>
                <a href="<?php printf("%s?pageNum_rsarreglos1=%d%s", $currentPage, 0, $queryString_rsarreglos1); ?>" class="fakab">Inicio</a>
                <?php } // Show if not first page ?></td>
            <td width="85" align="left" valign="top"><?php if ($pageNum_rsarreglos1 > 0) { // Show if not first page ?>
                <a href="<?php printf("%s?pageNum_rsarreglos1=%d%s", $currentPage, max(0, $pageNum_rsarreglos1 - 1), $queryString_rsarreglos1); ?>" class="fakab">«Anteriores</a>
            <?php } // Show if not first page ?></td>
            <td align="center" valign="top">&nbsp;<?php echo ($startRow_rsarreglos1 + 1) ?> al <?php echo min($startRow_rsarreglos1 + $maxRows_rsarreglos1, $totalRows_rsarreglos1) ?> de <?php echo $totalRows_rsarreglos1 ?></td>
            <td width="85" align="right" valign="top"><?php if ($pageNum_rsarreglos1 < $totalPages_rsarreglos1) { // Show if not last page ?>
                <a href="<?php printf("%s?pageNum_rsarreglos1=%d%s", $currentPage, min($totalPages_rsarreglos1, $pageNum_rsarreglos1 + 1), $queryString_rsarreglos1); ?>" class="fakab">Siguientes»</a>
                <?php } // Show if not last page ?></td>
            <td width="55" align="right" valign="top"><?php if ($pageNum_rsarreglos1 < $totalPages_rsarreglos1) { // Show if not last page ?>
                <a href="<?php printf("%s?pageNum_rsarreglos1=%d%s", $currentPage, $totalPages_rsarreglos1, $queryString_rsarreglos1); ?>" class="fakab">Final</a>
                <?php } // Show if not last page ?></td>
          </tr>
        </table>
      </div>
      <?php 
	  $buscar = array(" ", "(", ")");
	  $reempla = array("%20", "%28", "%29");
	  
	  do { 
	  list($width, $height, $type, $attr) = getimagesize("uploaded/mod_productos/".str_replace($buscar, $reempla, $row_rsarreglos1['imagen']));
	  if($_GET['c']==10 OR $_GET['c']==32)
	  {	  	  ?>

      <div class="boxarreglo" style="margin-right:10px;" >
                <div class="foto" style="background: url(<?php if($width >= $height) { ?><?php echo str_replace($buscar, $reempla, $objDynamicThumb2->Execute()); ?><?php } if($width < $height) { ?><?php echo str_replace($buscar, $reempla, $objDynamicThumb1->Execute()); ?><?php } ?>) no-repeat center center;">
              <a href="uploaded/mod_productos/<?php echo $row_rsarreglos1['imagen']; ?>" rel="lytebox[galera]" title="<?php echo $row_rsarreglos1['nombre_es']; ?>"><img src="images/blank.gif" width="140" height="200" border="0" /></a></div>
                <div class="texto"><a href="arreglos-ver.php?id=<?php echo $row_rsarreglos1['id_producto']; ?>"><?php echo $row_rsarreglos1['nombre_es']; ?></a>
                              </div>
              </div>
      <?php 
	  } 
	  else {
	  ?>
       <div class="boxarreglo" style="margin-right:10px;" >
                <div class="foto" style="background: url(<?php if($width >= $height) { ?><?php echo str_replace($buscar, $reempla, $objDynamicThumb2->Execute()); ?><?php } if($width < $height) { ?><?php echo str_replace($buscar, $reempla, $objDynamicThumb1->Execute()); ?><?php } ?>) no-repeat center center;">
                <a href="arreglos-ver.php?id=<?php echo $row_rsarreglos1['id_producto']; ?>"><img src="images/blank.gif" width="140" height="200" border="0" /></a></div>
                <div class="texto"><a href="arreglos-ver.php?id=<?php echo $row_rsarreglos1['id_producto']; ?>"><?php echo $row_rsarreglos1['nombre_es']; ?><br/>
                $<?php echo number_format($row_rsarreglos1['numerico1'],2); ?></a>
                <br/>
                <a href="uploaded/mod_productos/<?php echo $row_rsarreglos1['imagen'];?>" rel="lytebox[galera]" title="<?php echo $row_rsarreglos1['nombre_es']; ?>"><img src="images/venta.png" border="0"></a>
               <a href="arreglos-ver.php?id=<?php echo $row_rsarreglos1['id_producto']; ?>"><img src="images/buy.png" border="0"></a>
                </div>
              </div>
        <?php
		}
		 } while ($row_rsarreglos1 = mysql_fetch_assoc($rsarreglos1)); ?>
      <div id="navegando">
        <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
          <tr>
            <td width="55" align="left" valign="top"><?php if ($pageNum_rsarreglos1 > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_rsarreglos1=%d%s", $currentPage, 0, $queryString_rsarreglos1); ?>" class="fakab">Inicio</a>
              <?php } // Show if not first page ?></td>
            <td width="85" align="left" valign="top"><?php if ($pageNum_rsarreglos1 > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_rsarreglos1=%d%s", $currentPage, max(0, $pageNum_rsarreglos1 - 1), $queryString_rsarreglos1); ?>" class="fakab">«Anteriores</a>
              <?php } // Show if not first page ?></td>
            <td align="center" valign="top">&nbsp;<?php echo ($startRow_rsarreglos1 + 1) ?> al <?php echo min($startRow_rsarreglos1 + $maxRows_rsarreglos1, $totalRows_rsarreglos1) ?> de <?php echo $totalRows_rsarreglos1 ?></td>
            <td width="85" align="right" valign="top"><?php if ($pageNum_rsarreglos1 < $totalPages_rsarreglos1) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_rsarreglos1=%d%s", $currentPage, min($totalPages_rsarreglos1, $pageNum_rsarreglos1 + 1), $queryString_rsarreglos1); ?>" class="fakab">Siguientes»</a>
              <?php } // Show if not last page ?></td>
            <td width="55" align="right" valign="top"><?php if ($pageNum_rsarreglos1 < $totalPages_rsarreglos1) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_rsarreglos1=%d%s", $currentPage, $totalPages_rsarreglos1, $queryString_rsarreglos1); ?>" class="fakab">Final</a>
              <?php } // Show if not last page ?></td>
          </tr>
        </table>
      </div>
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

mysql_free_result($rsarreglos1);
?>
