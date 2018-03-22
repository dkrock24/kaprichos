<?php require_once('../../Connections/conne10.php'); ?>
<?php
//MX Widgets3 include
require_once('../../includes/wdg/WDG.php');

// Load the common classes
require_once('../../includes/common/KT_common.php');

// Load the tNG classes
require_once('../../includes/tng/tNG.inc.php');

// Load the KT_back class
require_once('../../includes/nxt/KT_back.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../../");

// Make unified connection variable
$conn_conne10 = new KT_connection($conne10, $database_conne10);

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("id_documento", true, "numeric", "int", "", "", "");
$formValidation->addField("fecha", true, "date", "date", "", "", "");
$tNGs->prepareValidation($formValidation);
// End trigger

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
$query_Recordset1 = "SELECT nombre_es, id_documento FROM tbl_documentos ORDER BY nombre_es";
$Recordset1 = mysql_query($query_Recordset1, $conne10) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_conne10, $conne10);
$query_Recordset4 = "SELECT nombre_es, id_seccion FROM tbl_secciones ORDER BY nombre_es";
$Recordset4 = mysql_query($query_Recordset4, $conne10) or die(mysql_error());
$row_Recordset4 = mysql_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysql_num_rows($Recordset4);

mysql_select_db($database_conne10, $conne10);
$query_Recordset6 = "SELECT nombre_es, seccion, id_categoria FROM tbl_secciones_categorias ORDER BY nombre_es";
$Recordset6 = mysql_query($query_Recordset6, $conne10) or die(mysql_error());
$row_Recordset6 = mysql_fetch_assoc($Recordset6);
$totalRows_Recordset6 = mysql_num_rows($Recordset6);

mysql_select_db($database_conne10, $conne10);
$query_Recordset8 = "SELECT nombre_es, seccion, categoria, id_contenido FROM tbl_secciones_contenido ORDER BY nombre_es";
$Recordset8 = mysql_query($query_Recordset8, $conne10) or die(mysql_error());
$row_Recordset8 = mysql_fetch_assoc($Recordset8);
$totalRows_Recordset8 = mysql_num_rows($Recordset8);

mysql_select_db($database_conne10, $conne10);
$query_Recordset10 = "SELECT titulo_es, id_noticia FROM tbl_noticias ORDER BY titulo_es";
$Recordset10 = mysql_query($query_Recordset10, $conne10) or die(mysql_error());
$row_Recordset10 = mysql_fetch_assoc($Recordset10);
$totalRows_Recordset10 = mysql_num_rows($Recordset10);

// Make an insert transaction instance
$ins_rel_doc_contenidos = new tNG_multipleInsert($conn_conne10);
$tNGs->addTransaction($ins_rel_doc_contenidos);
// Register triggers
$ins_rel_doc_contenidos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_rel_doc_contenidos->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_rel_doc_contenidos->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$ins_rel_doc_contenidos->setTable("rel_doc_contenidos");
$ins_rel_doc_contenidos->addColumn("id_documento", "NUMERIC_TYPE", "POST", "id_documento");
$ins_rel_doc_contenidos->addColumn("fecha", "DATE_TYPE", "POST", "fecha", date('Y-m-d'));
$ins_rel_doc_contenidos->addColumn("estatus", "CHECKBOX_1_0_TYPE", "POST", "estatus", "1");
$ins_rel_doc_contenidos->addColumn("aseccion", "CHECKBOX_1_0_TYPE", "POST", "aseccion", "0");
$ins_rel_doc_contenidos->addColumn("id_seccion", "NUMERIC_TYPE", "POST", "id_seccion");
$ins_rel_doc_contenidos->addColumn("acategoria", "CHECKBOX_1_0_TYPE", "POST", "acategoria", "0");
$ins_rel_doc_contenidos->addColumn("id_categoria", "NUMERIC_TYPE", "POST", "id_categoria");
$ins_rel_doc_contenidos->addColumn("acontenido", "CHECKBOX_1_0_TYPE", "POST", "acontenido", "0");
$ins_rel_doc_contenidos->addColumn("id_contenido", "NUMERIC_TYPE", "POST", "id_contenido");
$ins_rel_doc_contenidos->addColumn("anoticia", "CHECKBOX_1_0_TYPE", "POST", "anoticia", "0");
$ins_rel_doc_contenidos->addColumn("id_noticia", "NUMERIC_TYPE", "POST", "id_noticia");
$ins_rel_doc_contenidos->setPrimaryKey("id_relacion", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_rel_doc_contenidos = new tNG_multipleUpdate($conn_conne10);
$tNGs->addTransaction($upd_rel_doc_contenidos);
// Register triggers
$upd_rel_doc_contenidos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_rel_doc_contenidos->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_rel_doc_contenidos->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$upd_rel_doc_contenidos->setTable("rel_doc_contenidos");
$upd_rel_doc_contenidos->addColumn("id_documento", "NUMERIC_TYPE", "POST", "id_documento");
$upd_rel_doc_contenidos->addColumn("fecha", "DATE_TYPE", "POST", "fecha");
$upd_rel_doc_contenidos->addColumn("estatus", "CHECKBOX_1_0_TYPE", "POST", "estatus");
$upd_rel_doc_contenidos->addColumn("aseccion", "CHECKBOX_1_0_TYPE", "POST", "aseccion");
$upd_rel_doc_contenidos->addColumn("id_seccion", "NUMERIC_TYPE", "POST", "id_seccion");
$upd_rel_doc_contenidos->addColumn("acategoria", "CHECKBOX_1_0_TYPE", "POST", "acategoria");
$upd_rel_doc_contenidos->addColumn("id_categoria", "NUMERIC_TYPE", "POST", "id_categoria");
$upd_rel_doc_contenidos->addColumn("acontenido", "CHECKBOX_1_0_TYPE", "POST", "acontenido");
$upd_rel_doc_contenidos->addColumn("id_contenido", "NUMERIC_TYPE", "POST", "id_contenido");
$upd_rel_doc_contenidos->addColumn("anoticia", "CHECKBOX_1_0_TYPE", "POST", "anoticia");
$upd_rel_doc_contenidos->addColumn("id_noticia", "NUMERIC_TYPE", "POST", "id_noticia");
$upd_rel_doc_contenidos->setPrimaryKey("id_relacion", "NUMERIC_TYPE", "GET", "id_relacion");

// Make an instance of the transaction object
$del_rel_doc_contenidos = new tNG_multipleDelete($conn_conne10);
$tNGs->addTransaction($del_rel_doc_contenidos);
// Register triggers
$del_rel_doc_contenidos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_rel_doc_contenidos->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$del_rel_doc_contenidos->setTable("rel_doc_contenidos");
$del_rel_doc_contenidos->setPrimaryKey("id_relacion", "NUMERIC_TYPE", "GET", "id_relacion");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsrel_doc_contenidos = $tNGs->getRecordset("rel_doc_contenidos");
$row_rsrel_doc_contenidos = mysql_fetch_assoc($rsrel_doc_contenidos);
$totalRows_rsrel_doc_contenidos = mysql_num_rows($rsrel_doc_contenidos);
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
<script type="text/javascript" src="../../includes/common/js/sigslot_core.js"></script>
<script type="text/javascript" src="../../includes/wdg/classes/MXWidgets.js"></script>
<script type="text/javascript" src="../../includes/wdg/classes/MXWidgets.js.php"></script>
<script type="text/javascript" src="../../includes/wdg/classes/JSRecordset.js"></script>
<script type="text/javascript" src="../../includes/wdg/classes/DependentDropdown.js"></script>
<?php
//begin JSRecordset
$jsObject_Recordset6 = new WDG_JsRecordset("Recordset6");
echo $jsObject_Recordset6->getOutput();
//end JSRecordset
?>
<script type="text/javascript" src="../../includes/wdg/classes/Calendar.js"></script>
<script type="text/javascript" src="../../includes/wdg/classes/SmartDate.js"></script>
<script type="text/javascript" src="../../includes/wdg/calendar/calendar_stripped.js"></script>
<script type="text/javascript" src="../../includes/wdg/calendar/calendar-setup_stripped.js"></script>
<script src="../../includes/resources/calendar.js"></script>
<?php
//begin JSRecordset
$jsObject_Recordset8 = new WDG_JsRecordset("Recordset8");
echo $jsObject_Recordset8->getOutput();
//end JSRecordset
?>
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
      <div id="submenu"><!-- InstanceBeginEditable name="SUBMENU" --><?php echo $tNGs->displayValidationRules();?>
          <script src="../../includes/nxt/scripts/form.js" type="text/javascript"></script>
          <script src="../../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
          <script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: true,
  show_as_grid: true,
  merge_down_value: true
}
          </script>
        <?php include("submenu.php"); ?>
    <!-- InstanceEndEditable --></div>
    </td>
    <td valign="top"><!-- InstanceBeginEditable name="WBCMSMAIN" -->
    <?php
	echo $tNGs->getErrorMsg();
?>
    <div class="KT_tng">
      <h1>
        <?php 
// Show IF Conditional region1 
if (@$_GET['id_relacion'] == "") {
?>
          <?php echo NXT_getResource("Insert_FH"); ?>
          <?php 
// else Conditional region1
} else { ?>
          <?php echo NXT_getResource("Update_FH"); ?>
          <?php } 
// endif Conditional region1
?>
        Relaciones </h1>
      <div class="KT_tngform">
        <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
          <?php $cnt1 = 0; ?>
          <?php do { ?>
            <?php $cnt1++; ?>
            <?php 
// Show IF Conditional region1 
if (@$totalRows_rsrel_doc_contenidos > 1) {
?>
              <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
              <?php } 
// endif Conditional region1
?>
            <table cellpadding="2" cellspacing="0" class="KT_tngtable">
              <tr>
                <td class="KT_th"><label for="id_documento_<?php echo $cnt1; ?>">Documento:</label></td>
                <td><select name="id_documento_<?php echo $cnt1; ?>" id="id_documento_<?php echo $cnt1; ?>">
                  <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
                  <?php 
do {  
?>
                  <option value="<?php echo $row_Recordset1['id_documento']?>"<?php if (!(strcmp($row_Recordset1['id_documento'], $row_rsrel_doc_contenidos['id_documento']))) {echo "SELECTED";} ?>><?php echo $row_Recordset1['nombre_es']?></option>
                  <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
                </select>
                  <?php echo $tNGs->displayFieldError("rel_doc_contenidos", "id_documento", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="fecha_<?php echo $cnt1; ?>">Fecha:</label></td>
                <td><input name="fecha_<?php echo $cnt1; ?>" id="fecha_<?php echo $cnt1; ?>" value="<?php echo KT_formatDate($row_rsrel_doc_contenidos['fecha']); ?>" size="10" maxlength="22" wdg:mondayfirst="true" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:type="widget" wdg:singleclick="true" wdg:restricttomask="yes" />
                  <?php echo $tNGs->displayFieldHint("fecha");?> <?php echo $tNGs->displayFieldError("rel_doc_contenidos", "fecha", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="estatus_<?php echo $cnt1; ?>">Estatus:</label></td>
                <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rsrel_doc_contenidos['estatus']),"1"))) {echo "checked";} ?> type="checkbox" name="estatus_<?php echo $cnt1; ?>" id="estatus_<?php echo $cnt1; ?>" value="1" />
                  <?php echo $tNGs->displayFieldError("rel_doc_contenidos", "estatus", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="id_seccion_<?php echo $cnt1; ?>">
                Sección:</label></td>
                <td><span class="KT_th">
                  <input  <?php if (!(strcmp(KT_escapeAttribute($row_rsrel_doc_contenidos['aseccion']),"1"))) {echo "checked";} ?> type="checkbox" name="aseccion_<?php echo $cnt1; ?>" id="aseccion_<?php echo $cnt1; ?>" value="1" />
                </span>
                  <select name="id_seccion_<?php echo $cnt1; ?>" id="id_seccion_<?php echo $cnt1; ?>">
                  <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
                  <?php 
do {  
?>
                  <option value="<?php echo $row_Recordset4['id_seccion']?>"<?php if (!(strcmp($row_Recordset4['id_seccion'], $row_rsrel_doc_contenidos['id_seccion']))) {echo "SELECTED";} ?>><?php echo $row_Recordset4['nombre_es']?></option>
                  <?php
} while ($row_Recordset4 = mysql_fetch_assoc($Recordset4));
  $rows = mysql_num_rows($Recordset4);
  if($rows > 0) {
      mysql_data_seek($Recordset4, 0);
	  $row_Recordset4 = mysql_fetch_assoc($Recordset4);
  }
?>
                  </select>
                  <?php echo $tNGs->displayFieldError("rel_doc_contenidos", "id_seccion", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="id_categoria_<?php echo $cnt1; ?>">
                Categoría:</label></td>
                <td><span class="KT_th">
                  <input  <?php if (!(strcmp(KT_escapeAttribute($row_rsrel_doc_contenidos['acategoria']),"1"))) {echo "checked";} ?> type="checkbox" name="acategoria_<?php echo $cnt1; ?>" id="acategoria_<?php echo $cnt1; ?>" value="1" />
                </span>
                  <select name="id_categoria_<?php echo $cnt1; ?>" id="id_categoria_<?php echo $cnt1; ?>" wdg:subtype="DependentDropdown" wdg:type="widget" wdg:recordset="Recordset6" wdg:displayfield="nombre_es" wdg:valuefield="id_categoria" wdg:fkey="seccion" wdg:triggerobject="id_seccion_<?php echo $cnt1; ?>" wdg:selected="<?php echo $row_rsrel_doc_contenidos['id_categoria'] ?>">
                  <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
                </select>
                  <?php echo $tNGs->displayFieldError("rel_doc_contenidos", "id_categoria", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="id_contenido_<?php echo $cnt1; ?>">
                Contenido:</label></td>
                <td><span class="KT_th">
                  <input  <?php if (!(strcmp(KT_escapeAttribute($row_rsrel_doc_contenidos['acontenido']),"1"))) {echo "checked";} ?> type="checkbox" name="acontenido_<?php echo $cnt1; ?>" id="acontenido_<?php echo $cnt1; ?>" value="1" />
                </span>
                  <select name="id_contenido_<?php echo $cnt1; ?>" id="id_contenido_<?php echo $cnt1; ?>" wdg:subtype="DependentDropdown" wdg:type="widget" wdg:recordset="Recordset8" wdg:displayfield="nombre_es" wdg:valuefield="id_contenido" wdg:fkey="categoria" wdg:triggerobject="id_categoria_<?php echo $cnt1; ?>" wdg:selected="<?php echo $row_rsrel_doc_contenidos['id_contenido'] ?>">
                  <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
                </select>
                  <?php echo $tNGs->displayFieldError("rel_doc_contenidos", "id_contenido", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="id_noticia_<?php echo $cnt1; ?>">
                Noticia:</label></td>
                <td><span class="KT_th">
                  <input  <?php if (!(strcmp(KT_escapeAttribute($row_rsrel_doc_contenidos['anoticia']),"1"))) {echo "checked";} ?> type="checkbox" name="anoticia_<?php echo $cnt1; ?>" id="anoticia_<?php echo $cnt1; ?>" value="1" />
                </span>
                  <select name="id_noticia_<?php echo $cnt1; ?>" id="id_noticia_<?php echo $cnt1; ?>">
                  <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
                  <?php 
do {  
?>
                  <option value="<?php echo $row_Recordset10['id_noticia']?>"<?php if (!(strcmp($row_Recordset10['id_noticia'], $row_rsrel_doc_contenidos['id_noticia']))) {echo "SELECTED";} ?>><?php echo $row_Recordset10['titulo_es']?></option>
                  <?php
} while ($row_Recordset10 = mysql_fetch_assoc($Recordset10));
  $rows = mysql_num_rows($Recordset10);
  if($rows > 0) {
      mysql_data_seek($Recordset10, 0);
	  $row_Recordset10 = mysql_fetch_assoc($Recordset10);
  }
?>
                  </select>
                  <?php echo $tNGs->displayFieldError("rel_doc_contenidos", "id_noticia", $cnt1); ?></td>
              </tr>
            </table>
            <input type="hidden" name="kt_pk_rel_doc_contenidos_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsrel_doc_contenidos['kt_pk_rel_doc_contenidos']); ?>" />
            <?php } while ($row_rsrel_doc_contenidos = mysql_fetch_assoc($rsrel_doc_contenidos)); ?>
          <div class="KT_bottombuttons">
            <div>
              <?php 
      // Show IF Conditional region1
      if (@$_GET['id_relacion'] == "") {
      ?>
                <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
                <?php 
      // else Conditional region1
      } else { ?>
                <div class="KT_operations">
                  <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'id_relacion')" />
                </div>
                <input type="submit" name="KT_Update1" value="<?php echo NXT_getResource("Update_FB"); ?>" />
                <input type="submit" name="KT_Delete1" value="<?php echo NXT_getResource("Delete_FB"); ?>" onclick="return confirm('<?php echo NXT_getResource("Are you sure?"); ?>');" />
                <?php }
      // endif Conditional region1
      ?>
              <input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onclick="return UNI_navigateCancel(event, '../../includes/nxt/back.php')" />
            </div>
          </div>
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

mysql_free_result($Recordset4);

mysql_free_result($Recordset6);

mysql_free_result($Recordset8);

mysql_free_result($Recordset10);
?>
