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
$tfi_listtbl_enlaces1 = new TFI_TableFilter($conn_conne10, "tfi_listtbl_enlaces1");
$tfi_listtbl_enlaces1->addColumn("estatus.id_estatus", "NUMERIC_TYPE", "estatus", "=");
$tfi_listtbl_enlaces1->addColumn("tbl_enlaces_cats.id_categoria", "NUMERIC_TYPE", "categoria", "=");
$tfi_listtbl_enlaces1->addColumn("tbl_enlaces.nombre_es", "STRING_TYPE", "nombre_es", "%");
$tfi_listtbl_enlaces1->addColumn("tbl_enlaces.enlace", "STRING_TYPE", "enlace", "%");
$tfi_listtbl_enlaces1->Execute();

// Sorter
$tso_listtbl_enlaces1 = new TSO_TableSorter("rstbl_enlaces1", "tso_listtbl_enlaces1");
$tso_listtbl_enlaces1->addColumn("estatus.estatus");
$tso_listtbl_enlaces1->addColumn("tbl_enlaces_cats.categoria_es");
$tso_listtbl_enlaces1->addColumn("tbl_enlaces.nombre_es");
$tso_listtbl_enlaces1->addColumn("tbl_enlaces.enlace");
$tso_listtbl_enlaces1->setDefault("tbl_enlaces.categoria");
$tso_listtbl_enlaces1->Execute();

// Navigation
$nav_listtbl_enlaces1 = new NAV_Regular("nav_listtbl_enlaces1", "rstbl_enlaces1", "../../", $_SERVER['PHP_SELF'], 15);

mysql_select_db($database_conne10, $conne10);
$query_Recordset1 = "SELECT estatus, id_estatus FROM estatus ORDER BY estatus";
$Recordset1 = mysql_query($query_Recordset1, $conne10) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_conne10, $conne10);
$query_Recordset2 = "SELECT categoria_es, id_categoria FROM tbl_enlaces_cats ORDER BY categoria_es";
$Recordset2 = mysql_query($query_Recordset2, $conne10) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

//NeXTenesio3 Special List Recordset
$maxRows_rstbl_enlaces1 = $_SESSION['max_rows_nav_listtbl_enlaces1'];
$pageNum_rstbl_enlaces1 = 0;
if (isset($_GET['pageNum_rstbl_enlaces1'])) {
  $pageNum_rstbl_enlaces1 = $_GET['pageNum_rstbl_enlaces1'];
}
$startRow_rstbl_enlaces1 = $pageNum_rstbl_enlaces1 * $maxRows_rstbl_enlaces1;

// Defining List Recordset variable
$NXTFilter_rstbl_enlaces1 = "1=1";
if (isset($_SESSION['filter_tfi_listtbl_enlaces1'])) {
  $NXTFilter_rstbl_enlaces1 = $_SESSION['filter_tfi_listtbl_enlaces1'];
}
// Defining List Recordset variable
$NXTSort_rstbl_enlaces1 = "tbl_enlaces.categoria";
if (isset($_SESSION['sorter_tso_listtbl_enlaces1'])) {
  $NXTSort_rstbl_enlaces1 = $_SESSION['sorter_tso_listtbl_enlaces1'];
}
mysql_select_db($database_conne10, $conne10);

$query_rstbl_enlaces1 = "SELECT estatus.estatus AS estatus, tbl_enlaces_cats.categoria_es AS categoria, tbl_enlaces.nombre_es, tbl_enlaces.enlace, tbl_enlaces.id_enlace FROM (tbl_enlaces LEFT JOIN estatus ON tbl_enlaces.estatus = estatus.id_estatus) LEFT JOIN tbl_enlaces_cats ON tbl_enlaces.categoria = tbl_enlaces_cats.id_categoria WHERE {$NXTFilter_rstbl_enlaces1} ORDER BY {$NXTSort_rstbl_enlaces1}";
$query_limit_rstbl_enlaces1 = sprintf("%s LIMIT %d, %d", $query_rstbl_enlaces1, $startRow_rstbl_enlaces1, $maxRows_rstbl_enlaces1);
$rstbl_enlaces1 = mysql_query($query_limit_rstbl_enlaces1, $conne10) or die(mysql_error());
$row_rstbl_enlaces1 = mysql_fetch_assoc($rstbl_enlaces1);

if (isset($_GET['totalRows_rstbl_enlaces1'])) {
  $totalRows_rstbl_enlaces1 = $_GET['totalRows_rstbl_enlaces1'];
} else {
  $all_rstbl_enlaces1 = mysql_query($query_rstbl_enlaces1);
  $totalRows_rstbl_enlaces1 = mysql_num_rows($all_rstbl_enlaces1);
}
$totalPages_rstbl_enlaces1 = ceil($totalRows_rstbl_enlaces1/$maxRows_rstbl_enlaces1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listtbl_enlaces1->checkBoundries();
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
  .KT_col_estatus {width:56px; overflow:hidden;}
  .KT_col_categoria {width:140px; overflow:hidden;}
  .KT_col_nombre_es {width:140px; overflow:hidden;}
  .KT_col_enlace {width:140px; overflow:hidden;}
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
      <div id="submenu"><!-- InstanceBeginEditable name="SUBMENU" --><?php include("submenu.php"); ?><!-- InstanceEndEditable --></div>
    </td>
    <td valign="top"><!-- InstanceBeginEditable name="WBCMSMAIN" -->
    <div class="KT_tng" id="listtbl_enlaces1">
      <h1> Enlaces
        <?php
  $nav_listtbl_enlaces1->Prepare();
  require("../../includes/nav/NAV_Text_Statistics.inc.php");
?>
      </h1>
      <div class="KT_tnglist">
        <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
          <div class="KT_options"> <a href="<?php echo $nav_listtbl_enlaces1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listtbl_enlaces1'] == 1) {
?>
              <?php echo $_SESSION['default_max_rows_nav_listtbl_enlaces1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listtbl_enlaces1'] == 1) {
?>
              <a href="<?php echo $tfi_listtbl_enlaces1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
              <?php 
  // else Conditional region2
  } else { ?>
              <a href="<?php echo $tfi_listtbl_enlaces1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
              <?php } 
  // endif Conditional region2
?>
          </div>
          <table cellpadding="2" cellspacing="0" class="KT_tngtable">
            <thead>
              <tr class="KT_row_order">
                <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
                </th>
                <th id="estatus" class="KT_sorter KT_col_estatus <?php echo $tso_listtbl_enlaces1->getSortIcon('estatus.estatus'); ?>"> <a href="<?php echo $tso_listtbl_enlaces1->getSortLink('estatus.estatus'); ?>">Estatus</a></th>
                <th id="categoria" class="KT_sorter KT_col_categoria <?php echo $tso_listtbl_enlaces1->getSortIcon('tbl_enlaces_cats.categoria_es'); ?>"> <a href="<?php echo $tso_listtbl_enlaces1->getSortLink('tbl_enlaces_cats.categoria_es'); ?>">Categoria</a></th>
                <th id="nombre_es" class="KT_sorter KT_col_nombre_es <?php echo $tso_listtbl_enlaces1->getSortIcon('tbl_enlaces.nombre_es'); ?>"> <a href="<?php echo $tso_listtbl_enlaces1->getSortLink('tbl_enlaces.nombre_es'); ?>">Nombre</a></th>
                <th id="enlace" class="KT_sorter KT_col_enlace <?php echo $tso_listtbl_enlaces1->getSortIcon('tbl_enlaces.enlace'); ?>"> <a href="<?php echo $tso_listtbl_enlaces1->getSortLink('tbl_enlaces.enlace'); ?>">Enlace</a></th>
                <th>&nbsp;</th>
              </tr>
              <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listtbl_enlaces1'] == 1) {
?>
                <tr class="KT_row_filter">
                  <td>&nbsp;</td>
                  <td><select name="tfi_listtbl_enlaces1_estatus" id="tfi_listtbl_enlaces1_estatus">
                    <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listtbl_enlaces1_estatus']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_Recordset1['id_estatus']?>"<?php if (!(strcmp($row_Recordset1['id_estatus'], @$_SESSION['tfi_listtbl_enlaces1_estatus']))) {echo "SELECTED";} ?>><?php echo $row_Recordset1['estatus']?></option>
                    <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
                  </select></td>
                  <td><select name="tfi_listtbl_enlaces1_categoria" id="tfi_listtbl_enlaces1_categoria">
                    <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listtbl_enlaces1_categoria']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_Recordset2['id_categoria']?>"<?php if (!(strcmp($row_Recordset2['id_categoria'], @$_SESSION['tfi_listtbl_enlaces1_categoria']))) {echo "SELECTED";} ?>><?php echo $row_Recordset2['categoria_es']?></option>
                    <?php
} while ($row_Recordset2 = mysql_fetch_assoc($Recordset2));
  $rows = mysql_num_rows($Recordset2);
  if($rows > 0) {
      mysql_data_seek($Recordset2, 0);
	  $row_Recordset2 = mysql_fetch_assoc($Recordset2);
  }
?>
                  </select></td>
                  <td><input type="text" name="tfi_listtbl_enlaces1_nombre_es" id="tfi_listtbl_enlaces1_nombre_es" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listtbl_enlaces1_nombre_es']); ?>" size="20" maxlength="255" /></td>
                  <td><input type="text" name="tfi_listtbl_enlaces1_enlace" id="tfi_listtbl_enlaces1_enlace" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listtbl_enlaces1_enlace']); ?>" size="20" maxlength="255" /></td>
                  <td><input type="submit" name="tfi_listtbl_enlaces1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                </tr>
                <?php } 
  // endif Conditional region3
?>
            </thead>
            <tbody>
              <?php if ($totalRows_rstbl_enlaces1 == 0) { // Show if recordset empty ?>
                <tr>
                  <td colspan="6"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                </tr>
                <?php } // Show if recordset empty ?>
              <?php if ($totalRows_rstbl_enlaces1 > 0) { // Show if recordset not empty ?>
                <?php do { ?>
                  <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                    <td><input type="checkbox" name="kt_pk_tbl_enlaces" class="id_checkbox" value="<?php echo $row_rstbl_enlaces1['id_enlace']; ?>" />
                      <input type="hidden" name="id_enlace" class="id_field" value="<?php echo $row_rstbl_enlaces1['id_enlace']; ?>" /></td>
                    <td><div class="KT_col_estatus"><?php echo KT_FormatForList($row_rstbl_enlaces1['estatus'], 8); ?></div></td>
                    <td><div class="KT_col_categoria"><?php echo KT_FormatForList($row_rstbl_enlaces1['categoria'], 20); ?></div></td>
                    <td><div class="KT_col_nombre_es"><?php echo KT_FormatForList($row_rstbl_enlaces1['nombre_es'], 20); ?></div></td>
                    <td><div class="KT_col_enlace"><?php echo KT_FormatForList($row_rstbl_enlaces1['enlace'], 20); ?></div></td>
                    <td><a class="KT_edit_link" href="enlaces-form.php?id_enlace=<?php echo $row_rstbl_enlaces1['id_enlace']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a></td>
                  </tr>
                  <?php } while ($row_rstbl_enlaces1 = mysql_fetch_assoc($rstbl_enlaces1)); ?>
                <?php } // Show if recordset not empty ?>
            </tbody>
          </table>
          <div class="KT_bottomnav">
            <div>
              <?php
            $nav_listtbl_enlaces1->Prepare();
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
            <a class="KT_additem_op_link" href="enlaces-form.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a></div>
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

mysql_free_result($rstbl_enlaces1);
?>
