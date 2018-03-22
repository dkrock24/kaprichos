<?php require_once('../../Connections/conne10.php'); ?>
<?php
// Load the common classes
require_once('../../includes/common/KT_common.php');

// Load the required classes
require_once('../../includes/tfi/TFI.php');
require_once('../../includes/tso/TSO.php');
require_once('../../includes/nav/NAV.php');

// Make unified connection variable
$conn_conne10 = new KT_connection($conne10, $database_conne10);

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

// Filter
$tfi_listrel_doc_contenidos2 = new TFI_TableFilter($conn_conne10, "tfi_listrel_doc_contenidos2");
$tfi_listrel_doc_contenidos2->addColumn("tbl_documentos.id_documento", "NUMERIC_TYPE", "id_documento", "=");
$tfi_listrel_doc_contenidos2->addColumn("rel_doc_contenidos.fecha", "DATE_TYPE", "fecha", "=");
$tfi_listrel_doc_contenidos2->addColumn("estatus.id_estatus", "NUMERIC_TYPE", "estatus", "=");
$tfi_listrel_doc_contenidos2->addColumn("tbl_secciones.id_seccion", "NUMERIC_TYPE", "id_seccion", "=");
$tfi_listrel_doc_contenidos2->addColumn("tbl_secciones_categorias.id_categoria", "NUMERIC_TYPE", "id_categoria", "=");
$tfi_listrel_doc_contenidos2->addColumn("tbl_secciones_contenido.id_contenido", "NUMERIC_TYPE", "id_contenido", "=");
$tfi_listrel_doc_contenidos2->addColumn("tbl_noticias.id_noticia", "NUMERIC_TYPE", "id_noticia", "=");
$tfi_listrel_doc_contenidos2->Execute();

// Sorter
$tso_listrel_doc_contenidos2 = new TSO_TableSorter("rsrel_doc_contenidos1", "tso_listrel_doc_contenidos2");
$tso_listrel_doc_contenidos2->addColumn("tbl_documentos.nombre_es");
$tso_listrel_doc_contenidos2->addColumn("rel_doc_contenidos.fecha");
$tso_listrel_doc_contenidos2->addColumn("estatus.estatus");
$tso_listrel_doc_contenidos2->addColumn("tbl_secciones.nombre_es");
$tso_listrel_doc_contenidos2->addColumn("tbl_secciones_categorias.nombre_es");
$tso_listrel_doc_contenidos2->addColumn("tbl_secciones_contenido.nombre_es");
$tso_listrel_doc_contenidos2->addColumn("tbl_noticias.titulo_es");
$tso_listrel_doc_contenidos2->setDefault("rel_doc_contenidos.fecha DESC");
$tso_listrel_doc_contenidos2->Execute();

// Navigation
$nav_listrel_doc_contenidos2 = new NAV_Regular("nav_listrel_doc_contenidos2", "rsrel_doc_contenidos1", "../../", $_SERVER['PHP_SELF'], 15);

mysql_select_db($database_conne10, $conne10);
$query_Recordset1 = "SELECT nombre_es, id_documento FROM tbl_documentos ORDER BY nombre_es";
$Recordset1 = mysql_query($query_Recordset1, $conne10) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_conne10, $conne10);
$query_Recordset2 = "SELECT estatus, id_estatus FROM estatus ORDER BY estatus";
$Recordset2 = mysql_query($query_Recordset2, $conne10) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

mysql_select_db($database_conne10, $conne10);
$query_Recordset4 = "SELECT nombre_es, id_seccion FROM tbl_secciones ORDER BY nombre_es";
$Recordset4 = mysql_query($query_Recordset4, $conne10) or die(mysql_error());
$row_Recordset4 = mysql_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysql_num_rows($Recordset4);

mysql_select_db($database_conne10, $conne10);
$query_Recordset6 = "SELECT nombre_es, id_categoria FROM tbl_secciones_categorias ORDER BY nombre_es";
$Recordset6 = mysql_query($query_Recordset6, $conne10) or die(mysql_error());
$row_Recordset6 = mysql_fetch_assoc($Recordset6);
$totalRows_Recordset6 = mysql_num_rows($Recordset6);

mysql_select_db($database_conne10, $conne10);
$query_Recordset8 = "SELECT nombre_es, id_contenido FROM tbl_secciones_contenido ORDER BY nombre_es";
$Recordset8 = mysql_query($query_Recordset8, $conne10) or die(mysql_error());
$row_Recordset8 = mysql_fetch_assoc($Recordset8);
$totalRows_Recordset8 = mysql_num_rows($Recordset8);

mysql_select_db($database_conne10, $conne10);
$query_Recordset10 = "SELECT titulo_es, id_noticia FROM tbl_noticias ORDER BY titulo_es";
$Recordset10 = mysql_query($query_Recordset10, $conne10) or die(mysql_error());
$row_Recordset10 = mysql_fetch_assoc($Recordset10);
$totalRows_Recordset10 = mysql_num_rows($Recordset10);

//NeXTenesio3 Special List Recordset
$maxRows_rsrel_doc_contenidos1 = $_SESSION['max_rows_nav_listrel_doc_contenidos2'];
$pageNum_rsrel_doc_contenidos1 = 0;
if (isset($_GET['pageNum_rsrel_doc_contenidos1'])) {
  $pageNum_rsrel_doc_contenidos1 = $_GET['pageNum_rsrel_doc_contenidos1'];
}
$startRow_rsrel_doc_contenidos1 = $pageNum_rsrel_doc_contenidos1 * $maxRows_rsrel_doc_contenidos1;

// Defining List Recordset variable
$NXTFilter_rsrel_doc_contenidos1 = "1=1";
if (isset($_SESSION['filter_tfi_listrel_doc_contenidos2'])) {
  $NXTFilter_rsrel_doc_contenidos1 = $_SESSION['filter_tfi_listrel_doc_contenidos2'];
}
// Defining List Recordset variable
$NXTSort_rsrel_doc_contenidos1 = "rel_doc_contenidos.fecha DESC";
if (isset($_SESSION['sorter_tso_listrel_doc_contenidos2'])) {
  $NXTSort_rsrel_doc_contenidos1 = $_SESSION['sorter_tso_listrel_doc_contenidos2'];
}
mysql_select_db($database_conne10, $conne10);

$query_rsrel_doc_contenidos1 = "SELECT tbl_documentos.nombre_es AS id_documento, rel_doc_contenidos.fecha, estatus.estatus AS estatus, tbl_secciones.nombre_es AS id_seccion, tbl_secciones_categorias.nombre_es AS id_categoria, tbl_secciones_contenido.nombre_es AS id_contenido, tbl_noticias.titulo_es AS id_noticia, rel_doc_contenidos.id_relacion FROM (((((rel_doc_contenidos LEFT JOIN tbl_documentos ON rel_doc_contenidos.id_documento = tbl_documentos.id_documento) LEFT JOIN estatus ON rel_doc_contenidos.estatus = estatus.id_estatus) LEFT JOIN tbl_secciones ON rel_doc_contenidos.id_seccion = tbl_secciones.id_seccion) LEFT JOIN tbl_secciones_categorias ON rel_doc_contenidos.id_categoria = tbl_secciones_categorias.id_categoria) LEFT JOIN tbl_secciones_contenido ON rel_doc_contenidos.id_contenido = tbl_secciones_contenido.id_contenido) LEFT JOIN tbl_noticias ON rel_doc_contenidos.id_noticia = tbl_noticias.id_noticia WHERE {$NXTFilter_rsrel_doc_contenidos1} ORDER BY {$NXTSort_rsrel_doc_contenidos1}";
$query_limit_rsrel_doc_contenidos1 = sprintf("%s LIMIT %d, %d", $query_rsrel_doc_contenidos1, $startRow_rsrel_doc_contenidos1, $maxRows_rsrel_doc_contenidos1);
$rsrel_doc_contenidos1 = mysql_query($query_limit_rsrel_doc_contenidos1, $conne10) or die(mysql_error());
$row_rsrel_doc_contenidos1 = mysql_fetch_assoc($rsrel_doc_contenidos1);

if (isset($_GET['totalRows_rsrel_doc_contenidos1'])) {
  $totalRows_rsrel_doc_contenidos1 = $_GET['totalRows_rsrel_doc_contenidos1'];
} else {
  $all_rsrel_doc_contenidos1 = mysql_query($query_rsrel_doc_contenidos1);
  $totalRows_rsrel_doc_contenidos1 = mysql_num_rows($all_rsrel_doc_contenidos1);
}
$totalPages_rsrel_doc_contenidos1 = ceil($totalRows_rsrel_doc_contenidos1/$maxRows_rsrel_doc_contenidos1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listrel_doc_contenidos2->checkBoundries();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/wbcms01-submenu.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Gestor de Contenidos WB/CMS. Por WebBox Interactive</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEditableHeadTag -->
<link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../includes/skins/style.js" type="text/javascript"></script>
<script src="../../includes/nxt/scripts/list.js" type="text/javascript"></script>
<script src="../../includes/nxt/scripts/list.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_LIST_SETTINGS = {
  duplicate_buttons: true,
  duplicate_navigation: true,
  row_effects: true,
  show_as_buttons: true,
  record_counter: true
}
</script>
<style type="text/css">
  /* Dynamic List row settings */
  .KT_col_id_documento {width:140px; overflow:hidden;}
  .KT_col_fecha {width:70px; overflow:hidden;}
  .KT_col_estatus {width:56px; overflow:hidden;}
  .KT_col_id_seccion {width:105px; overflow:hidden;}
  .KT_col_id_categoria {width:105px; overflow:hidden;}
  .KT_col_id_contenido {width:105px; overflow:hidden;}
  .KT_col_id_noticia {width:105px; overflow:hidden;}
</style>
<!-- InstanceEndEditable -->
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
<link href="../css/lytebox.css" rel="stylesheet" type="text/css" />
<link href="../css/wbcmscss01.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../ed/ckeditor.js"></script>
<script type="text/javascript" src="../css/curvycorners.js"></script>
<script type="text/javascript" src="../Scripts/lytebox.js"></script>
<script type="text/JavaScript">
addEvent(window, 'load', initCorners);
function initCorners() {
var setting = {
tl: { radius: 10 },
tr: { radius: 10 },
bl: { radius: 10 },
br: { radius: 10 },
antiAlias: true
}
curvyCorners(setting, ".submenu");
}
</script>
</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" background="../images/headerbg.jpg" id="header">
  <tr>
    <td height="50"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="bottom" style="padding-left: 15px;"><img src="../images/wbcms.png" alt="WB/CMS" width="133" height="36" /></td>
        <td align="right" valign="bottom" style="padding-right: 15px;"><a href="http://www.wboxinteractive.com" target="_blank"><img src="../images/developeby.png" alt="Desarrollado por WebBox Interactive" width="222" height="11" border="0" /></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="35"><ul>
      <li><a href="../index.php">INICIO</a></li>
     <!--<li><a href="../wbcms/mod_contenido/index.php">CONTENIDO</a></li>-->
      <li><a href="../modulos.php">MÓDULOS</a></li>
      <li><a href="../accesos.php">ACCESOS Y HERRAMIENTAS</a></li>
      <li><a href="../soporte.php">SOPORTE</a></li>
    </ul></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td width="150" valign="top">
      <div id="submenu"><!-- InstanceBeginEditable name="SUBMENU" -->
        <?php include("submenu.php"); ?>
    <!-- InstanceEndEditable --></div>
    </td>
    <td valign="top"><!-- InstanceBeginEditable name="WBCMSMAIN" -->
    <div class="KT_tng" id="listrel_doc_contenidos2">
      <h1> Relaciones
        <?php
  $nav_listrel_doc_contenidos2->Prepare();
  require("../../includes/nav/NAV_Text_Statistics.inc.php");
?>
      </h1>
      <div class="KT_tnglist">
        <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
          <div class="KT_options"> <a href="<?php echo $nav_listrel_doc_contenidos2->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listrel_doc_contenidos2'] == 1) {
?>
              <?php echo $_SESSION['default_max_rows_nav_listrel_doc_contenidos2']; ?>
              <?php 
  // else Conditional region1
  } else { ?>
              <?php echo NXT_getResource("all"); ?>
              <?php } 
  // endif Conditional region1
?>
<?php echo NXT_getResource("records"); ?></a> &nbsp;
            &nbsp;
            <?php 
  // Show IF Conditional region2
  if (@$_SESSION['has_filter_tfi_listrel_doc_contenidos2'] == 1) {
?>
              <a href="<?php echo $tfi_listrel_doc_contenidos2->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
              <?php 
  // else Conditional region2
  } else { ?>
              <a href="<?php echo $tfi_listrel_doc_contenidos2->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
              <?php } 
  // endif Conditional region2
?>
          </div>
          <table cellpadding="2" cellspacing="0" class="KT_tngtable">
            <thead>
              <tr class="KT_row_order">
                <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
                </th>
                <th id="id_documento" class="KT_sorter KT_col_id_documento <?php echo $tso_listrel_doc_contenidos2->getSortIcon('tbl_documentos.nombre_es'); ?>"> <a href="<?php echo $tso_listrel_doc_contenidos2->getSortLink('tbl_documentos.nombre_es'); ?>">Documento</a></th>
                <th id="fecha" class="KT_sorter KT_col_fecha <?php echo $tso_listrel_doc_contenidos2->getSortIcon('rel_doc_contenidos.fecha'); ?>"> <a href="<?php echo $tso_listrel_doc_contenidos2->getSortLink('rel_doc_contenidos.fecha'); ?>">Fecha</a></th>
                <th id="estatus" class="KT_sorter KT_col_estatus <?php echo $tso_listrel_doc_contenidos2->getSortIcon('estatus.estatus'); ?>"> <a href="<?php echo $tso_listrel_doc_contenidos2->getSortLink('estatus.estatus'); ?>">Estatus</a></th>
                <th id="id_seccion" class="KT_sorter KT_col_id_seccion <?php echo $tso_listrel_doc_contenidos2->getSortIcon('tbl_secciones.nombre_es'); ?>"> <a href="<?php echo $tso_listrel_doc_contenidos2->getSortLink('tbl_secciones.nombre_es'); ?>">Sección</a></th>
                <th id="id_categoria" class="KT_sorter KT_col_id_categoria <?php echo $tso_listrel_doc_contenidos2->getSortIcon('tbl_secciones_categorias.nombre_es'); ?>"> <a href="<?php echo $tso_listrel_doc_contenidos2->getSortLink('tbl_secciones_categorias.nombre_es'); ?>">Categoría</a></th>
                <th id="id_contenido" class="KT_sorter KT_col_id_contenido <?php echo $tso_listrel_doc_contenidos2->getSortIcon('tbl_secciones_contenido.nombre_es'); ?>"> <a href="<?php echo $tso_listrel_doc_contenidos2->getSortLink('tbl_secciones_contenido.nombre_es'); ?>">Contenido</a></th>
                <th id="id_noticia" class="KT_sorter KT_col_id_noticia <?php echo $tso_listrel_doc_contenidos2->getSortIcon('tbl_noticias.titulo_es'); ?>"> <a href="<?php echo $tso_listrel_doc_contenidos2->getSortLink('tbl_noticias.titulo_es'); ?>">Noticia</a></th>
                <th>&nbsp;</th>
              </tr>
              <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listrel_doc_contenidos2'] == 1) {
?>
                <tr class="KT_row_filter">
                  <td>&nbsp;</td>
                  <td><select name="tfi_listrel_doc_contenidos2_id_documento" id="tfi_listrel_doc_contenidos2_id_documento">
                    <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listrel_doc_contenidos2_id_documento']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_Recordset1['id_documento']?>"<?php if (!(strcmp($row_Recordset1['id_documento'], @$_SESSION['tfi_listrel_doc_contenidos2_id_documento']))) {echo "SELECTED";} ?>><?php echo $row_Recordset1['nombre_es']?></option>
                    <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
                  </select></td>
                  <td><input type="text" name="tfi_listrel_doc_contenidos2_fecha" id="tfi_listrel_doc_contenidos2_fecha" value="<?php echo @$_SESSION['tfi_listrel_doc_contenidos2_fecha']; ?>" size="10" maxlength="22" /></td>
                  <td><select name="tfi_listrel_doc_contenidos2_estatus" id="tfi_listrel_doc_contenidos2_estatus">
                    <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listrel_doc_contenidos2_estatus']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_Recordset2['id_estatus']?>"<?php if (!(strcmp($row_Recordset2['id_estatus'], @$_SESSION['tfi_listrel_doc_contenidos2_estatus']))) {echo "SELECTED";} ?>><?php echo $row_Recordset2['estatus']?></option>
                    <?php
} while ($row_Recordset2 = mysql_fetch_assoc($Recordset2));
  $rows = mysql_num_rows($Recordset2);
  if($rows > 0) {
      mysql_data_seek($Recordset2, 0);
	  $row_Recordset2 = mysql_fetch_assoc($Recordset2);
  }
?>
                  </select></td>
                  <td><select name="tfi_listrel_doc_contenidos2_id_seccion" id="tfi_listrel_doc_contenidos2_id_seccion">
                    <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listrel_doc_contenidos2_id_seccion']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_Recordset4['id_seccion']?>"<?php if (!(strcmp($row_Recordset4['id_seccion'], @$_SESSION['tfi_listrel_doc_contenidos2_id_seccion']))) {echo "SELECTED";} ?>><?php echo $row_Recordset4['nombre_es']?></option>
                    <?php
} while ($row_Recordset4 = mysql_fetch_assoc($Recordset4));
  $rows = mysql_num_rows($Recordset4);
  if($rows > 0) {
      mysql_data_seek($Recordset4, 0);
	  $row_Recordset4 = mysql_fetch_assoc($Recordset4);
  }
?>
                  </select></td>
                  <td><select name="tfi_listrel_doc_contenidos2_id_categoria" id="tfi_listrel_doc_contenidos2_id_categoria">
                    <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listrel_doc_contenidos2_id_categoria']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_Recordset6['id_categoria']?>"<?php if (!(strcmp($row_Recordset6['id_categoria'], @$_SESSION['tfi_listrel_doc_contenidos2_id_categoria']))) {echo "SELECTED";} ?>><?php echo $row_Recordset6['nombre_es']?></option>
                    <?php
} while ($row_Recordset6 = mysql_fetch_assoc($Recordset6));
  $rows = mysql_num_rows($Recordset6);
  if($rows > 0) {
      mysql_data_seek($Recordset6, 0);
	  $row_Recordset6 = mysql_fetch_assoc($Recordset6);
  }
?>
                  </select></td>
                  <td><select name="tfi_listrel_doc_contenidos2_id_contenido" id="tfi_listrel_doc_contenidos2_id_contenido">
                    <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listrel_doc_contenidos2_id_contenido']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_Recordset8['id_contenido']?>"<?php if (!(strcmp($row_Recordset8['id_contenido'], @$_SESSION['tfi_listrel_doc_contenidos2_id_contenido']))) {echo "SELECTED";} ?>><?php echo $row_Recordset8['nombre_es']?></option>
                    <?php
} while ($row_Recordset8 = mysql_fetch_assoc($Recordset8));
  $rows = mysql_num_rows($Recordset8);
  if($rows > 0) {
      mysql_data_seek($Recordset8, 0);
	  $row_Recordset8 = mysql_fetch_assoc($Recordset8);
  }
?>
                  </select></td>
                  <td><select name="tfi_listrel_doc_contenidos2_id_noticia" id="tfi_listrel_doc_contenidos2_id_noticia">
                    <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listrel_doc_contenidos2_id_noticia']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_Recordset10['id_noticia']?>"<?php if (!(strcmp($row_Recordset10['id_noticia'], @$_SESSION['tfi_listrel_doc_contenidos2_id_noticia']))) {echo "SELECTED";} ?>><?php echo $row_Recordset10['titulo_es']?></option>
                    <?php
} while ($row_Recordset10 = mysql_fetch_assoc($Recordset10));
  $rows = mysql_num_rows($Recordset10);
  if($rows > 0) {
      mysql_data_seek($Recordset10, 0);
	  $row_Recordset10 = mysql_fetch_assoc($Recordset10);
  }
?>
                  </select></td>
                  <td><input type="submit" name="tfi_listrel_doc_contenidos2" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                </tr>
                <?php } 
  // endif Conditional region3
?>
            </thead>
            <tbody>
              <?php if ($totalRows_rsrel_doc_contenidos1 == 0) { // Show if recordset empty ?>
                <tr>
                  <td colspan="9"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                </tr>
                <?php } // Show if recordset empty ?>
              <?php if ($totalRows_rsrel_doc_contenidos1 > 0) { // Show if recordset not empty ?>
                <?php do { ?>
                  <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                    <td><input type="checkbox" name="kt_pk_rel_doc_contenidos" class="id_checkbox" value="<?php echo $row_rsrel_doc_contenidos1['id_relacion']; ?>" />
                      <input type="hidden" name="id_relacion" class="id_field" value="<?php echo $row_rsrel_doc_contenidos1['id_relacion']; ?>" /></td>
                    <td><div class="KT_col_id_documento"><?php echo KT_FormatForList($row_rsrel_doc_contenidos1['id_documento'], 20); ?></div></td>
                    <td><div class="KT_col_fecha"><?php echo KT_formatDate($row_rsrel_doc_contenidos1['fecha']); ?></div></td>
                    <td><div class="KT_col_estatus"><?php echo KT_FormatForList($row_rsrel_doc_contenidos1['estatus'], 8); ?></div></td>
                    <td><div class="KT_col_id_seccion"><?php echo KT_FormatForList($row_rsrel_doc_contenidos1['id_seccion'], 15); ?></div></td>
                    <td><div class="KT_col_id_categoria"><?php echo KT_FormatForList($row_rsrel_doc_contenidos1['id_categoria'], 15); ?></div></td>
                    <td><div class="KT_col_id_contenido"><?php echo KT_FormatForList($row_rsrel_doc_contenidos1['id_contenido'], 15); ?></div></td>
                    <td><div class="KT_col_id_noticia"><?php echo KT_FormatForList($row_rsrel_doc_contenidos1['id_noticia'], 15); ?></div></td>
                    <td><a class="KT_edit_link" href="rel-contenido-form.php?id_relacion=<?php echo $row_rsrel_doc_contenidos1['id_relacion']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a></td>
                  </tr>
                  <?php } while ($row_rsrel_doc_contenidos1 = mysql_fetch_assoc($rsrel_doc_contenidos1)); ?>
                <?php } // Show if recordset not empty ?>
            </tbody>
          </table>
          <div class="KT_bottomnav">
            <div>
              <?php
            $nav_listrel_doc_contenidos2->Prepare();
            require("../../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
            </div>
          </div>
          <div class="KT_bottombuttons">
            <div class="KT_operations"> <a class="KT_edit_op_link" href="#" onclick="nxt_list_edit_link_form(this); return false;"><?php echo NXT_getResource("edit_all"); ?></a> <a class="KT_delete_op_link" href="#" onclick="nxt_list_delete_link_form(this); return false;"><?php echo NXT_getResource("delete_all"); ?></a></div>
            <span>&nbsp;</span>
            <select name="no_new" id="no_new">
              <option value="1">1</option>
              <option value="3">3</option>
              <option value="6">6</option>
            </select>
            <a class="KT_additem_op_link" href="rel-contenido-form.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a></div>
        </form>
      </div>
      <br class="clearfixplain" />
    </div>
    <p>&nbsp;</p>
    <!-- InstanceEndEditable --></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);

mysql_free_result($Recordset4);

mysql_free_result($Recordset6);

mysql_free_result($Recordset8);

mysql_free_result($Recordset10);

mysql_free_result($rsrel_doc_contenidos1);
?>
