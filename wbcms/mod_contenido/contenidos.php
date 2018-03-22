<?php include_once("../config.php"); ?>
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

// Filter
$tfi_listtbl_secciones_contenido1 = new TFI_TableFilter($conn_conne10, "tfi_listtbl_secciones_contenido1");
$tfi_listtbl_secciones_contenido1->addColumn("tbl_secciones.id_seccion", "NUMERIC_TYPE", "seccion", "=");
$tfi_listtbl_secciones_contenido1->addColumn("tbl_secciones_categorias.id_categoria", "NUMERIC_TYPE", "categoria", "=");
$tfi_listtbl_secciones_contenido1->addColumn("estatus.id_estatus", "NUMERIC_TYPE", "estatus", "=");
$tfi_listtbl_secciones_contenido1->addColumn("tbl_secciones_contenido.orden", "NUMERIC_TYPE", "orden", "=");
$tfi_listtbl_secciones_contenido1->addColumn("tbl_secciones_contenido.fecha", "DATE_TYPE", "fecha", "=");
$tfi_listtbl_secciones_contenido1->addColumn("tbl_secciones_contenido.nombre_es", "STRING_TYPE", "nombre_es", "%");
$tfi_listtbl_secciones_contenido1->Execute();

// Sorter
$tso_listtbl_secciones_contenido1 = new TSO_TableSorter("rstbl_secciones_contenido1", "tso_listtbl_secciones_contenido1");
$tso_listtbl_secciones_contenido1->addColumn("tbl_secciones.nombre_es");
$tso_listtbl_secciones_contenido1->addColumn("tbl_secciones_categorias.nombre_es");
$tso_listtbl_secciones_contenido1->addColumn("estatus.estatus");
$tso_listtbl_secciones_contenido1->addColumn("tbl_secciones_contenido.orden");
$tso_listtbl_secciones_contenido1->addColumn("tbl_secciones_contenido.fecha");
$tso_listtbl_secciones_contenido1->addColumn("tbl_secciones_contenido.nombre_es");
$tso_listtbl_secciones_contenido1->setDefault("tbl_secciones_contenido.seccion");
$tso_listtbl_secciones_contenido1->Execute();

// Navigation
$nav_listtbl_secciones_contenido1 = new NAV_Regular("nav_listtbl_secciones_contenido1", "rstbl_secciones_contenido1", "../../", $_SERVER['PHP_SELF'], 10);

mysql_select_db($database_conne10, $conne10);
$query_Recordset1 = "SELECT nombre_es, id_seccion FROM tbl_secciones ORDER BY nombre_es";
$Recordset1 = mysql_query($query_Recordset1, $conne10) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_conne10, $conne10);
$query_Recordset2 = "SELECT nombre_es, id_categoria FROM tbl_secciones_categorias ORDER BY nombre_es";
$Recordset2 = mysql_query($query_Recordset2, $conne10) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

mysql_select_db($database_conne10, $conne10);
$query_Recordset3 = "SELECT estatus, id_estatus FROM estatus ORDER BY estatus";
$Recordset3 = mysql_query($query_Recordset3, $conne10) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);

//NeXTenesio3 Special List Recordset
$maxRows_rstbl_secciones_contenido1 = $_SESSION['max_rows_nav_listtbl_secciones_contenido1'];
$pageNum_rstbl_secciones_contenido1 = 0;
if (isset($_GET['pageNum_rstbl_secciones_contenido1'])) {
  $pageNum_rstbl_secciones_contenido1 = $_GET['pageNum_rstbl_secciones_contenido1'];
}
$startRow_rstbl_secciones_contenido1 = $pageNum_rstbl_secciones_contenido1 * $maxRows_rstbl_secciones_contenido1;

// Defining List Recordset variable
$NXTFilter_rstbl_secciones_contenido1 = "1=1";
if (isset($_SESSION['filter_tfi_listtbl_secciones_contenido1'])) {
  $NXTFilter_rstbl_secciones_contenido1 = $_SESSION['filter_tfi_listtbl_secciones_contenido1'];
}
// Defining List Recordset variable
$NXTSort_rstbl_secciones_contenido1 = "tbl_secciones_contenido.seccion";
if (isset($_SESSION['sorter_tso_listtbl_secciones_contenido1'])) {
  $NXTSort_rstbl_secciones_contenido1 = $_SESSION['sorter_tso_listtbl_secciones_contenido1'];
}
mysql_select_db($database_conne10, $conne10);

$query_rstbl_secciones_contenido1 = "SELECT tbl_secciones.nombre_es AS seccion, tbl_secciones_categorias.nombre_es AS categoria, estatus.estatus AS estatus, tbl_secciones_contenido.orden, tbl_secciones_contenido.fecha, tbl_secciones_contenido.nombre_es, tbl_secciones_contenido.id_contenido FROM ((tbl_secciones_contenido LEFT JOIN tbl_secciones ON tbl_secciones_contenido.seccion = tbl_secciones.id_seccion) LEFT JOIN tbl_secciones_categorias ON tbl_secciones_contenido.categoria = tbl_secciones_categorias.id_categoria) LEFT JOIN estatus ON tbl_secciones_contenido.estatus = estatus.id_estatus WHERE {$NXTFilter_rstbl_secciones_contenido1} ORDER BY {$NXTSort_rstbl_secciones_contenido1}";
$query_limit_rstbl_secciones_contenido1 = sprintf("%s LIMIT %d, %d", $query_rstbl_secciones_contenido1, $startRow_rstbl_secciones_contenido1, $maxRows_rstbl_secciones_contenido1);
$rstbl_secciones_contenido1 = mysql_query($query_limit_rstbl_secciones_contenido1, $conne10) or die(mysql_error());
$row_rstbl_secciones_contenido1 = mysql_fetch_assoc($rstbl_secciones_contenido1);

if (isset($_GET['totalRows_rstbl_secciones_contenido1'])) {
  $totalRows_rstbl_secciones_contenido1 = $_GET['totalRows_rstbl_secciones_contenido1'];
} else {
  $all_rstbl_secciones_contenido1 = mysql_query($query_rstbl_secciones_contenido1);
  $totalRows_rstbl_secciones_contenido1 = mysql_num_rows($all_rstbl_secciones_contenido1);
}
$totalPages_rstbl_secciones_contenido1 = ceil($totalRows_rstbl_secciones_contenido1/$maxRows_rstbl_secciones_contenido1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listtbl_secciones_contenido1->checkBoundries();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/wbcms01-submenu.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Gestor de Contenidos WB/CMS. Por WebBox Interactive</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" --><!-- InstanceEditableHeadTag --><link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" /><script src="../../includes/common/js/base.js" type="text/javascript"></script><script src="../../includes/common/js/utility.js" type="text/javascript"></script><script src="../../includes/skins/style.js" type="text/javascript"></script><script src="../../includes/nxt/scripts/list.js" type="text/javascript"></script><script src="../../includes/nxt/scripts/list.js.php" type="text/javascript"></script><script type="text/javascript">
$NXT_LIST_SETTINGS = {
  duplicate_buttons: true,
  duplicate_navigation: true,
  row_effects: true,
  show_as_buttons: true,
  record_counter: true
}
</script><style type="text/css">
  /* Dynamic List row settings */
  .KT_col_seccion {width:140px; overflow:hidden;}
  .KT_col_categoria {width:140px; overflow:hidden;}
  .KT_col_estatus {width:70px; overflow:hidden;}
  .KT_col_orden {width:35px; overflow:hidden;}
  .KT_col_fecha {width:140px; overflow:hidden;}
  .KT_col_nombre_es {width:210px; overflow:hidden;}
</style><!-- InstanceEndEditable -->
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
<div class="KT_tng" id="listtbl_secciones_contenido1">
  <h1> Seccione » Categoría » Contenido
    <?php
  $nav_listtbl_secciones_contenido1->Prepare();
  require("../../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listtbl_secciones_contenido1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listtbl_secciones_contenido1'] == 1) {
?>
            <?php echo $_SESSION['default_max_rows_nav_listtbl_secciones_contenido1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listtbl_secciones_contenido1'] == 1) {
?>
                            <a href="<?php echo $tfi_listtbl_secciones_contenido1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                            <?php 
  // else Conditional region2
  } else { ?>
                            <a href="<?php echo $tfi_listtbl_secciones_contenido1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                            <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="seccion" class="KT_sorter KT_col_seccion <?php echo $tso_listtbl_secciones_contenido1->getSortIcon('tbl_secciones.nombre_es'); ?>"> <a href="<?php echo $tso_listtbl_secciones_contenido1->getSortLink('tbl_secciones.nombre_es'); ?>">Seccion</a> </th>
            <th id="categoria" class="KT_sorter KT_col_categoria <?php echo $tso_listtbl_secciones_contenido1->getSortIcon('tbl_secciones_categorias.nombre_es'); ?>"> <a href="<?php echo $tso_listtbl_secciones_contenido1->getSortLink('tbl_secciones_categorias.nombre_es'); ?>">Categoria</a> </th>
            <th id="estatus" class="KT_sorter KT_col_estatus <?php echo $tso_listtbl_secciones_contenido1->getSortIcon('estatus.estatus'); ?>"> <a href="<?php echo $tso_listtbl_secciones_contenido1->getSortLink('estatus.estatus'); ?>">Estatus</a> </th>
            <th id="orden" class="KT_sorter KT_col_orden <?php echo $tso_listtbl_secciones_contenido1->getSortIcon('tbl_secciones_contenido.orden'); ?>"> <a href="<?php echo $tso_listtbl_secciones_contenido1->getSortLink('tbl_secciones_contenido.orden'); ?>">Orden</a> </th>
            <th id="fecha" class="KT_sorter KT_col_fecha <?php echo $tso_listtbl_secciones_contenido1->getSortIcon('tbl_secciones_contenido.fecha'); ?>"> <a href="<?php echo $tso_listtbl_secciones_contenido1->getSortLink('tbl_secciones_contenido.fecha'); ?>">Fecha</a> </th>
            <th id="nombre_es" class="KT_sorter KT_col_nombre_es <?php echo $tso_listtbl_secciones_contenido1->getSortIcon('tbl_secciones_contenido.nombre_es'); ?>"> <a href="<?php echo $tso_listtbl_secciones_contenido1->getSortLink('tbl_secciones_contenido.nombre_es'); ?>">Nombre</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listtbl_secciones_contenido1'] == 1) {
?>
          <tr class="KT_row_filter">
            <td>&nbsp;</td>
            <td><select name="tfi_listtbl_secciones_contenido1_seccion" id="tfi_listtbl_secciones_contenido1_seccion">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listtbl_secciones_contenido1_seccion']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset1['id_seccion']?>"<?php if (!(strcmp($row_Recordset1['id_seccion'], @$_SESSION['tfi_listtbl_secciones_contenido1_seccion']))) {echo "SELECTED";} ?>><?php echo $row_Recordset1['nombre_es']?></option>
              <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
            </select>
            </td>
            <td><select name="tfi_listtbl_secciones_contenido1_categoria" id="tfi_listtbl_secciones_contenido1_categoria">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listtbl_secciones_contenido1_categoria']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset2['id_categoria']?>"<?php if (!(strcmp($row_Recordset2['id_categoria'], @$_SESSION['tfi_listtbl_secciones_contenido1_categoria']))) {echo "SELECTED";} ?>><?php echo $row_Recordset2['nombre_es']?></option>
              <?php
} while ($row_Recordset2 = mysql_fetch_assoc($Recordset2));
  $rows = mysql_num_rows($Recordset2);
  if($rows > 0) {
      mysql_data_seek($Recordset2, 0);
	  $row_Recordset2 = mysql_fetch_assoc($Recordset2);
  }
?>
            </select>
            </td>
            <td><select name="tfi_listtbl_secciones_contenido1_estatus" id="tfi_listtbl_secciones_contenido1_estatus">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listtbl_secciones_contenido1_estatus']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset3['id_estatus']?>"<?php if (!(strcmp($row_Recordset3['id_estatus'], @$_SESSION['tfi_listtbl_secciones_contenido1_estatus']))) {echo "SELECTED";} ?>><?php echo $row_Recordset3['estatus']?></option>
              <?php
} while ($row_Recordset3 = mysql_fetch_assoc($Recordset3));
  $rows = mysql_num_rows($Recordset3);
  if($rows > 0) {
      mysql_data_seek($Recordset3, 0);
	  $row_Recordset3 = mysql_fetch_assoc($Recordset3);
  }
?>
            </select>
            </td>
            <td><input type="text" name="tfi_listtbl_secciones_contenido1_orden" id="tfi_listtbl_secciones_contenido1_orden" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listtbl_secciones_contenido1_orden']); ?>" size="5" maxlength="100" /></td>
            <td><input type="text" name="tfi_listtbl_secciones_contenido1_fecha" id="tfi_listtbl_secciones_contenido1_fecha" value="<?php echo @$_SESSION['tfi_listtbl_secciones_contenido1_fecha']; ?>" size="10" maxlength="22" /></td>
            <td><input type="text" name="tfi_listtbl_secciones_contenido1_nombre_es" id="tfi_listtbl_secciones_contenido1_nombre_es" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listtbl_secciones_contenido1_nombre_es']); ?>" size="30" maxlength="250" /></td>
            <td><input type="submit" name="tfi_listtbl_secciones_contenido1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
          </tr>
          <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rstbl_secciones_contenido1 == 0) { // Show if recordset empty ?>
          <tr>
            <td colspan="8"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
          </tr>
          <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rstbl_secciones_contenido1 > 0) { // Show if recordset not empty ?>
          <?php do { ?>
          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
            <td><input type="checkbox" name="kt_pk_tbl_secciones_contenido" class="id_checkbox" value="<?php echo $row_rstbl_secciones_contenido1['id_contenido']; ?>" />
                <input type="hidden" name="id_contenido" class="id_field" value="<?php echo $row_rstbl_secciones_contenido1['id_contenido']; ?>" />
            </td>
            <td><div class="KT_col_seccion"><?php echo KT_FormatForList($row_rstbl_secciones_contenido1['seccion'], 20); ?></div></td>
            <td><div class="KT_col_categoria"><?php echo KT_FormatForList($row_rstbl_secciones_contenido1['categoria'], 20); ?></div></td>
            <td><div class="KT_col_estatus"><?php echo KT_FormatForList($row_rstbl_secciones_contenido1['estatus'], 10); ?></div></td>
            <td><div class="KT_col_orden"><?php echo KT_FormatForList($row_rstbl_secciones_contenido1['orden'], 5); ?></div></td>
            <td><div class="KT_col_fecha"><?php echo KT_formatDate($row_rstbl_secciones_contenido1['fecha']); ?></div></td>
            <td><div class="KT_col_nombre_es"><?php echo KT_FormatForList($row_rstbl_secciones_contenido1['nombre_es'], 30); ?></div></td>
            <td><a class="KT_edit_link" href="contenidos-form.php?id_contenido=<?php echo $row_rstbl_secciones_contenido1['id_contenido']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
          </tr>
          <?php } while ($row_rstbl_secciones_contenido1 = mysql_fetch_assoc($rstbl_secciones_contenido1)); ?>
          <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listtbl_secciones_contenido1->Prepare();
            require("../../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
        </div>
      </div>
      <div class="KT_bottombuttons">
        <div class="KT_operations"> <a class="KT_edit_op_link" href="#" onclick="nxt_list_edit_link_form(this); return false;"><?php echo NXT_getResource("edit_all"); ?></a> <a class="KT_delete_op_link" href="#" onclick="nxt_list_delete_link_form(this); return false;"><?php echo NXT_getResource("delete_all"); ?></a> </div>
        <span>&nbsp;</span>
        <select name="no_new" id="no_new">
          <option value="1">1</option>
          <option value="3">3</option>
          <option value="6">6</option>
        </select>
        <a class="KT_additem_op_link" href="contenidos-form.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
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

mysql_free_result($Recordset3);

mysql_free_result($rstbl_secciones_contenido1);
?>
