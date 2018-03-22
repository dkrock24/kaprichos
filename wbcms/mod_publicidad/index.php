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
$tfi_listtbl_publicidad2 = new TFI_TableFilter($conn_conne10, "tfi_listtbl_publicidad2");
$tfi_listtbl_publicidad2->addColumn("dat_ubicaciones.id_ubicacion", "NUMERIC_TYPE", "id_ubicacion", "=");
$tfi_listtbl_publicidad2->addColumn("dat_idiomas.id_idioma", "NUMERIC_TYPE", "idioma", "=");
$tfi_listtbl_publicidad2->addColumn("estatus.id_estatus", "NUMERIC_TYPE", "estatus", "=");
$tfi_listtbl_publicidad2->addColumn("tbl_publicidad.orden", "NUMERIC_TYPE", "orden", "=");
$tfi_listtbl_publicidad2->addColumn("tbl_publicidad.referencia", "STRING_TYPE", "referencia", "%");
$tfi_listtbl_publicidad2->addColumn("tbl_publicidad.desde", "DATE_TYPE", "desde", "=");
$tfi_listtbl_publicidad2->addColumn("tbl_publicidad.hasta", "DATE_TYPE", "hasta", "=");
$tfi_listtbl_publicidad2->addColumn("tbl_publicidad.actualizado", "DATE_TYPE", "actualizado", "=");
$tfi_listtbl_publicidad2->Execute();

// Sorter
$tso_listtbl_publicidad2 = new TSO_TableSorter("rstbl_publicidad1", "tso_listtbl_publicidad2");
$tso_listtbl_publicidad2->addColumn("dat_ubicaciones.referencia");
$tso_listtbl_publicidad2->addColumn("dat_idiomas.idioma");
$tso_listtbl_publicidad2->addColumn("estatus.estatus");
$tso_listtbl_publicidad2->addColumn("tbl_publicidad.orden");
$tso_listtbl_publicidad2->addColumn("tbl_publicidad.referencia");
$tso_listtbl_publicidad2->addColumn("tbl_publicidad.desde");
$tso_listtbl_publicidad2->addColumn("tbl_publicidad.hasta");
$tso_listtbl_publicidad2->addColumn("tbl_publicidad.actualizado");
$tso_listtbl_publicidad2->setDefault("tbl_publicidad.actualizado DESC");
$tso_listtbl_publicidad2->Execute();

// Navigation
$nav_listtbl_publicidad2 = new NAV_Regular("nav_listtbl_publicidad2", "rstbl_publicidad1", "../../", $_SERVER['PHP_SELF'], 15);

mysql_select_db($database_conne10, $conne10);
$query_Recordset1 = "SELECT referencia, id_ubicacion FROM dat_ubicaciones ORDER BY referencia";
$Recordset1 = mysql_query($query_Recordset1, $conne10) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_conne10, $conne10);
$query_Recordset2 = "SELECT idioma, id_idioma FROM dat_idiomas ORDER BY idioma";
$Recordset2 = mysql_query($query_Recordset2, $conne10) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

mysql_select_db($database_conne10, $conne10);
$query_Recordset3 = "SELECT estatus, id_estatus FROM estatus ORDER BY estatus";
$Recordset3 = mysql_query($query_Recordset3, $conne10) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);

//NeXTenesio3 Special List Recordset
$maxRows_rstbl_publicidad1 = $_SESSION['max_rows_nav_listtbl_publicidad2'];
$pageNum_rstbl_publicidad1 = 0;
if (isset($_GET['pageNum_rstbl_publicidad1'])) {
  $pageNum_rstbl_publicidad1 = $_GET['pageNum_rstbl_publicidad1'];
}
$startRow_rstbl_publicidad1 = $pageNum_rstbl_publicidad1 * $maxRows_rstbl_publicidad1;

// Defining List Recordset variable
$NXTFilter_rstbl_publicidad1 = "1=1";
if (isset($_SESSION['filter_tfi_listtbl_publicidad2'])) {
  $NXTFilter_rstbl_publicidad1 = $_SESSION['filter_tfi_listtbl_publicidad2'];
}
// Defining List Recordset variable
$NXTSort_rstbl_publicidad1 = "tbl_publicidad.actualizado DESC";
if (isset($_SESSION['sorter_tso_listtbl_publicidad2'])) {
  $NXTSort_rstbl_publicidad1 = $_SESSION['sorter_tso_listtbl_publicidad2'];
}
mysql_select_db($database_conne10, $conne10);

$query_rstbl_publicidad1 = "SELECT dat_ubicaciones.referencia AS id_ubicacion, dat_idiomas.idioma AS idioma, estatus.estatus AS estatus, tbl_publicidad.orden, tbl_publicidad.referencia, tbl_publicidad.desde, tbl_publicidad.hasta, tbl_publicidad.actualizado, tbl_publicidad.id_publicidad FROM ((tbl_publicidad LEFT JOIN dat_ubicaciones ON tbl_publicidad.id_ubicacion = dat_ubicaciones.id_ubicacion) LEFT JOIN dat_idiomas ON tbl_publicidad.idioma = dat_idiomas.id_idioma) LEFT JOIN estatus ON tbl_publicidad.estatus = estatus.id_estatus WHERE {$NXTFilter_rstbl_publicidad1} ORDER BY {$NXTSort_rstbl_publicidad1}";
$query_limit_rstbl_publicidad1 = sprintf("%s LIMIT %d, %d", $query_rstbl_publicidad1, $startRow_rstbl_publicidad1, $maxRows_rstbl_publicidad1);
$rstbl_publicidad1 = mysql_query($query_limit_rstbl_publicidad1, $conne10) or die(mysql_error());
$row_rstbl_publicidad1 = mysql_fetch_assoc($rstbl_publicidad1);

if (isset($_GET['totalRows_rstbl_publicidad1'])) {
  $totalRows_rstbl_publicidad1 = $_GET['totalRows_rstbl_publicidad1'];
} else {
  $all_rstbl_publicidad1 = mysql_query($query_rstbl_publicidad1);
  $totalRows_rstbl_publicidad1 = mysql_num_rows($all_rstbl_publicidad1);
}
$totalPages_rstbl_publicidad1 = ceil($totalRows_rstbl_publicidad1/$maxRows_rstbl_publicidad1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listtbl_publicidad2->checkBoundries();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/wbcms01.dwt.php" codeOutsideHTMLIsLocked="false" -->
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
  .KT_col_id_ubicacion {width:70px; overflow:hidden;}
  .KT_col_idioma {width:70px; overflow:hidden;}
  .KT_col_estatus {width:70px; overflow:hidden;}
  .KT_col_orden {width:35px; overflow:hidden;}
  .KT_col_referencia {width:140px; overflow:hidden;}
  .KT_col_desde {width:70px; overflow:hidden;}
  .KT_col_hasta {width:70px; overflow:hidden;}
  .KT_col_actualizado {width:140px; overflow:hidden;}
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
<script type="text/javascript" src="../Scripts/lytebox.js"></script>
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
    <td><!-- InstanceBeginEditable name="WBCMSMAIN" -->
<div class="KT_tng" id="listtbl_publicidad2">
  <h1> Publicidad
    <?php
  $nav_listtbl_publicidad2->Prepare();
  require("../../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listtbl_publicidad2->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listtbl_publicidad2'] == 1) {
?>
            <?php echo $_SESSION['default_max_rows_nav_listtbl_publicidad2']; ?>
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
  if (@$_SESSION['has_filter_tfi_listtbl_publicidad2'] == 1) {
?>
                            <a href="<?php echo $tfi_listtbl_publicidad2->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                            <?php 
  // else Conditional region2
  } else { ?>
                            <a href="<?php echo $tfi_listtbl_publicidad2->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                            <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="id_ubicacion" class="KT_sorter KT_col_id_ubicacion <?php echo $tso_listtbl_publicidad2->getSortIcon('dat_ubicaciones.referencia'); ?>"> <a href="<?php echo $tso_listtbl_publicidad2->getSortLink('dat_ubicaciones.referencia'); ?>">Ubicación</a> </th>
            <th id="idioma" class="KT_sorter KT_col_idioma <?php echo $tso_listtbl_publicidad2->getSortIcon('dat_idiomas.idioma'); ?>"> <a href="<?php echo $tso_listtbl_publicidad2->getSortLink('dat_idiomas.idioma'); ?>">Idioma</a> </th>
            <th id="estatus" class="KT_sorter KT_col_estatus <?php echo $tso_listtbl_publicidad2->getSortIcon('estatus.estatus'); ?>"> <a href="<?php echo $tso_listtbl_publicidad2->getSortLink('estatus.estatus'); ?>">Estatus</a> </th>
            <th id="orden" class="KT_sorter KT_col_orden <?php echo $tso_listtbl_publicidad2->getSortIcon('tbl_publicidad.orden'); ?>"> <a href="<?php echo $tso_listtbl_publicidad2->getSortLink('tbl_publicidad.orden'); ?>">Orden</a> </th>
            <th id="referencia" class="KT_sorter KT_col_referencia <?php echo $tso_listtbl_publicidad2->getSortIcon('tbl_publicidad.referencia'); ?>"> <a href="<?php echo $tso_listtbl_publicidad2->getSortLink('tbl_publicidad.referencia'); ?>">Referencia</a> </th>
            <th id="desde" class="KT_sorter KT_col_desde <?php echo $tso_listtbl_publicidad2->getSortIcon('tbl_publicidad.desde'); ?>"> <a href="<?php echo $tso_listtbl_publicidad2->getSortLink('tbl_publicidad.desde'); ?>">Desde</a> </th>
            <th id="hasta" class="KT_sorter KT_col_hasta <?php echo $tso_listtbl_publicidad2->getSortIcon('tbl_publicidad.hasta'); ?>"> <a href="<?php echo $tso_listtbl_publicidad2->getSortLink('tbl_publicidad.hasta'); ?>">Hasta</a> </th>
            <th id="actualizado" class="KT_sorter KT_col_actualizado <?php echo $tso_listtbl_publicidad2->getSortIcon('tbl_publicidad.actualizado'); ?>"> <a href="<?php echo $tso_listtbl_publicidad2->getSortLink('tbl_publicidad.actualizado'); ?>">Actualizado</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listtbl_publicidad2'] == 1) {
?>
          <tr class="KT_row_filter">
            <td>&nbsp;</td>
            <td><select name="tfi_listtbl_publicidad2_id_ubicacion" id="tfi_listtbl_publicidad2_id_ubicacion">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listtbl_publicidad2_id_ubicacion']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset1['id_ubicacion']?>"<?php if (!(strcmp($row_Recordset1['id_ubicacion'], @$_SESSION['tfi_listtbl_publicidad2_id_ubicacion']))) {echo "SELECTED";} ?>><?php echo $row_Recordset1['referencia']?></option>
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
            <td><select name="tfi_listtbl_publicidad2_idioma" id="tfi_listtbl_publicidad2_idioma">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listtbl_publicidad2_idioma']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset2['id_idioma']?>"<?php if (!(strcmp($row_Recordset2['id_idioma'], @$_SESSION['tfi_listtbl_publicidad2_idioma']))) {echo "SELECTED";} ?>><?php echo $row_Recordset2['idioma']?></option>
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
            <td><select name="tfi_listtbl_publicidad2_estatus" id="tfi_listtbl_publicidad2_estatus">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listtbl_publicidad2_estatus']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset3['id_estatus']?>"<?php if (!(strcmp($row_Recordset3['id_estatus'], @$_SESSION['tfi_listtbl_publicidad2_estatus']))) {echo "SELECTED";} ?>><?php echo $row_Recordset3['estatus']?></option>
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
            <td><input type="text" name="tfi_listtbl_publicidad2_orden" id="tfi_listtbl_publicidad2_orden" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listtbl_publicidad2_orden']); ?>" size="5" maxlength="100" /></td>
            <td><input type="text" name="tfi_listtbl_publicidad2_referencia" id="tfi_listtbl_publicidad2_referencia" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listtbl_publicidad2_referencia']); ?>" size="20" maxlength="100" /></td>
            <td><input type="text" name="tfi_listtbl_publicidad2_desde" id="tfi_listtbl_publicidad2_desde" value="<?php echo @$_SESSION['tfi_listtbl_publicidad2_desde']; ?>" size="10" maxlength="22" /></td>
            <td><input type="text" name="tfi_listtbl_publicidad2_hasta" id="tfi_listtbl_publicidad2_hasta" value="<?php echo @$_SESSION['tfi_listtbl_publicidad2_hasta']; ?>" size="10" maxlength="22" /></td>
            <td><input type="text" name="tfi_listtbl_publicidad2_actualizado" id="tfi_listtbl_publicidad2_actualizado" value="<?php echo @$_SESSION['tfi_listtbl_publicidad2_actualizado']; ?>" size="10" maxlength="22" /></td>
            <td><input type="submit" name="tfi_listtbl_publicidad2" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
          </tr>
          <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rstbl_publicidad1 == 0) { // Show if recordset empty ?>
          <tr>
            <td colspan="10"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
          </tr>
          <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rstbl_publicidad1 > 0) { // Show if recordset not empty ?>
          <?php do { ?>
          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
            <td><input type="checkbox" name="kt_pk_tbl_publicidad" class="id_checkbox" value="<?php echo $row_rstbl_publicidad1['id_publicidad']; ?>" />
                <input type="hidden" name="id_publicidad" class="id_field" value="<?php echo $row_rstbl_publicidad1['id_publicidad']; ?>" />
            </td>
            <td><div class="KT_col_id_ubicacion"><?php echo KT_FormatForList($row_rstbl_publicidad1['id_ubicacion'], 10); ?></div></td>
            <td><div class="KT_col_idioma"><?php echo KT_FormatForList($row_rstbl_publicidad1['idioma'], 10); ?></div></td>
            <td><div class="KT_col_estatus"><?php echo KT_FormatForList($row_rstbl_publicidad1['estatus'], 10); ?></div></td>
            <td><div class="KT_col_orden"><?php echo KT_FormatForList($row_rstbl_publicidad1['orden'], 5); ?></div></td>
            <td><div class="KT_col_referencia"><?php echo KT_FormatForList($row_rstbl_publicidad1['referencia'], 20); ?></div></td>
            <td><div class="KT_col_desde"><?php echo KT_formatDate($row_rstbl_publicidad1['desde']); ?></div></td>
            <td><div class="KT_col_hasta"><?php echo KT_formatDate($row_rstbl_publicidad1['hasta']); ?></div></td>
            <td><div class="KT_col_actualizado"><?php echo KT_formatDate($row_rstbl_publicidad1['actualizado']); ?></div></td>
            <td><a class="KT_edit_link" href="form.php?id_publicidad=<?php echo $row_rstbl_publicidad1['id_publicidad']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
          </tr>
          <?php } while ($row_rstbl_publicidad1 = mysql_fetch_assoc($rstbl_publicidad1)); ?>
          <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listtbl_publicidad2->Prepare();
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
        <a class="KT_additem_op_link" href="form.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
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

mysql_free_result($rstbl_publicidad1);
?>
