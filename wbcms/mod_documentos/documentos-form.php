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
$formValidation->addField("categoria", true, "numeric", "int", "", "", "");
$formValidation->addField("fecha", true, "date", "date", "", "", "");
$formValidation->addField("nombre_es", true, "text", "", "", "", "");
$formValidation->addField("nombre_en", true, "text", "", "", "", "");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete3 trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete3(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../uploaded/mod_documentos/");
  $deleteObj->setDbFieldName("imagen_en");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete3 trigger

//start Trigger_ImageUpload1 trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload1(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("imagen_en");
  $uploadObj->setDbFieldName("imagen_en");
  $uploadObj->setFolder("../../uploaded/mod_documentos/");
  $uploadObj->setResize("true", 300, 300);
  $uploadObj->setMaxSize(5120);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload1 trigger

//start Trigger_FileDelete2 trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete2(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../uploaded/mod_documentos/");
  $deleteObj->setDbFieldName("imagen_es");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete2 trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("imagen_es");
  $uploadObj->setDbFieldName("imagen_es");
  $uploadObj->setFolder("../../uploaded/mod_documentos/");
  $uploadObj->setResize("true", 300, 300);
  $uploadObj->setMaxSize(5120);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

//start Trigger_FileDelete1 trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete1(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../uploaded/mod_documentos/");
  $deleteObj->setDbFieldName("documento_en");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete1 trigger

//start Trigger_FileUpload1 trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileUpload1(&$tNG) {
  $uploadObj = new tNG_FileUpload($tNG);
  $uploadObj->setFormFieldName("documento_en");
  $uploadObj->setDbFieldName("documento_en");
  $uploadObj->setFolder("../../uploaded/mod_documentos/");
  $uploadObj->setMaxSize(51200);
  $uploadObj->setAllowedExtensions("pdf, ppt, pptx, doc, docx, xls, xlsx, txt, pps, ppsx");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_FileUpload1 trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../uploaded/mod_documentos/");
  $deleteObj->setDbFieldName("documento_es");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_FileUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileUpload(&$tNG) {
  $uploadObj = new tNG_FileUpload($tNG);
  $uploadObj->setFormFieldName("documento_es");
  $uploadObj->setDbFieldName("documento_es");
  $uploadObj->setFolder("../../uploaded/mod_documentos/");
  $uploadObj->setMaxSize(51200);
  $uploadObj->setAllowedExtensions("pdf, ppt, pptx, doc, docx, xls, xlsx, txt, pps, ppsx");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_FileUpload trigger

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
$query_Recordset1 = "SELECT nombre_es, id_categoria FROM tbl_documentos_cats ORDER BY nombre_es";
$Recordset1 = mysql_query($query_Recordset1, $conne10) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

// Make an insert transaction instance
$ins_tbl_documentos = new tNG_multipleInsert($conn_conne10);
$tNGs->addTransaction($ins_tbl_documentos);
// Register triggers
$ins_tbl_documentos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_tbl_documentos->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_tbl_documentos->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$ins_tbl_documentos->registerTrigger("AFTER", "Trigger_FileUpload", 97);
$ins_tbl_documentos->registerTrigger("AFTER", "Trigger_FileUpload1", 97);
$ins_tbl_documentos->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$ins_tbl_documentos->registerTrigger("AFTER", "Trigger_ImageUpload1", 97);
// Add columns
$ins_tbl_documentos->setTable("tbl_documentos");
$ins_tbl_documentos->addColumn("categoria", "NUMERIC_TYPE", "POST", "categoria");
$ins_tbl_documentos->addColumn("estatus", "CHECKBOX_1_0_TYPE", "POST", "estatus", "1");
$ins_tbl_documentos->addColumn("fecha", "DATE_TYPE", "POST", "fecha", date('Y-m-d'));
$ins_tbl_documentos->addColumn("nombre_es", "STRING_TYPE", "POST", "nombre_es");
$ins_tbl_documentos->addColumn("documento_es", "FILE_TYPE", "FILES", "documento_es");
$ins_tbl_documentos->addColumn("imagen_es", "FILE_TYPE", "FILES", "imagen_es");
$ins_tbl_documentos->addColumn("sinopsis_es", "STRING_TYPE", "POST", "sinopsis_es");
$ins_tbl_documentos->addColumn("nombre_en", "STRING_TYPE", "POST", "nombre_en");
$ins_tbl_documentos->addColumn("documento_en", "FILE_TYPE", "FILES", "documento_en");
$ins_tbl_documentos->addColumn("imagen_en", "FILE_TYPE", "FILES", "imagen_en");
$ins_tbl_documentos->addColumn("sinopsis_en", "STRING_TYPE", "POST", "sinopsis_en");
$ins_tbl_documentos->setPrimaryKey("id_documento", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_tbl_documentos = new tNG_multipleUpdate($conn_conne10);
$tNGs->addTransaction($upd_tbl_documentos);
// Register triggers
$upd_tbl_documentos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_tbl_documentos->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_tbl_documentos->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$upd_tbl_documentos->registerTrigger("AFTER", "Trigger_FileUpload", 97);
$upd_tbl_documentos->registerTrigger("AFTER", "Trigger_FileUpload1", 97);
$upd_tbl_documentos->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$upd_tbl_documentos->registerTrigger("AFTER", "Trigger_ImageUpload1", 97);
// Add columns
$upd_tbl_documentos->setTable("tbl_documentos");
$upd_tbl_documentos->addColumn("categoria", "NUMERIC_TYPE", "POST", "categoria");
$upd_tbl_documentos->addColumn("estatus", "CHECKBOX_1_0_TYPE", "POST", "estatus");
$upd_tbl_documentos->addColumn("fecha", "DATE_TYPE", "POST", "fecha");
$upd_tbl_documentos->addColumn("nombre_es", "STRING_TYPE", "POST", "nombre_es");
$upd_tbl_documentos->addColumn("documento_es", "FILE_TYPE", "FILES", "documento_es");
$upd_tbl_documentos->addColumn("imagen_es", "FILE_TYPE", "FILES", "imagen_es");
$upd_tbl_documentos->addColumn("sinopsis_es", "STRING_TYPE", "POST", "sinopsis_es");
$upd_tbl_documentos->addColumn("nombre_en", "STRING_TYPE", "POST", "nombre_en");
$upd_tbl_documentos->addColumn("documento_en", "FILE_TYPE", "FILES", "documento_en");
$upd_tbl_documentos->addColumn("imagen_en", "FILE_TYPE", "FILES", "imagen_en");
$upd_tbl_documentos->addColumn("sinopsis_en", "STRING_TYPE", "POST", "sinopsis_en");
$upd_tbl_documentos->setPrimaryKey("id_documento", "NUMERIC_TYPE", "GET", "id_documento");

// Make an instance of the transaction object
$del_tbl_documentos = new tNG_multipleDelete($conn_conne10);
$tNGs->addTransaction($del_tbl_documentos);
// Register triggers
$del_tbl_documentos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_tbl_documentos->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$del_tbl_documentos->registerTrigger("AFTER", "Trigger_FileDelete", 98);
$del_tbl_documentos->registerTrigger("AFTER", "Trigger_FileDelete1", 98);
$del_tbl_documentos->registerTrigger("AFTER", "Trigger_FileDelete2", 98);
$del_tbl_documentos->registerTrigger("AFTER", "Trigger_FileDelete3", 98);
// Add columns
$del_tbl_documentos->setTable("tbl_documentos");
$del_tbl_documentos->setPrimaryKey("id_documento", "NUMERIC_TYPE", "GET", "id_documento");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rstbl_documentos = $tNGs->getRecordset("tbl_documentos");
$row_rstbl_documentos = mysql_fetch_assoc($rstbl_documentos);
$totalRows_rstbl_documentos = mysql_num_rows($rstbl_documentos);
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
<script type="text/javascript" src="../../includes/wdg/classes/Calendar.js"></script>
<script type="text/javascript" src="../../includes/wdg/classes/SmartDate.js"></script>
<script type="text/javascript" src="../../includes/wdg/calendar/calendar_stripped.js"></script>
<script type="text/javascript" src="../../includes/wdg/calendar/calendar-setup_stripped.js"></script>
<script src="../../includes/resources/calendar.js"></script>
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
  show_as_grid: false,
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
if (@$_GET['id_documento'] == "") {
?>
          <?php echo NXT_getResource("Insert_FH"); ?>
          <?php 
// else Conditional region1
} else { ?>
          <?php echo NXT_getResource("Update_FH"); ?>
          <?php } 
// endif Conditional region1
?>
        Documentos </h1>
      <div class="KT_tngform">
        <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
          <?php $cnt1 = 0; ?>
          <?php do { ?>
            <?php $cnt1++; ?>
            <?php 
// Show IF Conditional region1 
if (@$totalRows_rstbl_documentos > 1) {
?>
              <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
              <?php } 
// endif Conditional region1
?>
            <table cellpadding="2" cellspacing="0" class="KT_tngtable">
              <tr>
                <td class="KT_th"><label for="categoria_<?php echo $cnt1; ?>">Categoria:</label></td>
                <td><select name="categoria_<?php echo $cnt1; ?>" id="categoria_<?php echo $cnt1; ?>">
                  <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
                  <?php 
do {  
?>
                  <option value="<?php echo $row_Recordset1['id_categoria']?>"<?php if (!(strcmp($row_Recordset1['id_categoria'], $row_rstbl_documentos['categoria']))) {echo "SELECTED";} ?>><?php echo $row_Recordset1['nombre_es']?></option>
                  <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
                </select>
                  <?php echo $tNGs->displayFieldError("tbl_documentos", "categoria", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="estatus_<?php echo $cnt1; ?>">Publicar:</label></td>
                <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rstbl_documentos['estatus']),"1"))) {echo "checked";} ?> type="checkbox" name="estatus_<?php echo $cnt1; ?>" id="estatus_<?php echo $cnt1; ?>" value="1" />
                  <?php echo $tNGs->displayFieldError("tbl_documentos", "estatus", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="fecha_<?php echo $cnt1; ?>">Fecha:</label></td>
                <td><input name="fecha_<?php echo $cnt1; ?>" id="fecha_<?php echo $cnt1; ?>" value="<?php echo KT_formatDate($row_rstbl_documentos['fecha']); ?>" size="10" maxlength="22" wdg:mondayfirst="true" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:type="widget" wdg:singleclick="true" wdg:restricttomask="yes" />
                  <?php echo $tNGs->displayFieldHint("fecha");?> <?php echo $tNGs->displayFieldError("tbl_documentos", "fecha", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="nombre_es_<?php echo $cnt1; ?>">Nombre:</label></td>
                <td><input type="text" name="nombre_es_<?php echo $cnt1; ?>" id="nombre_es_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstbl_documentos['nombre_es']); ?>" size="60" maxlength="250" />
                  <?php echo $tNGs->displayFieldHint("nombre_es");?> <?php echo $tNGs->displayFieldError("tbl_documentos", "nombre_es", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="documento_es_<?php echo $cnt1; ?>">Archivo:</label></td>
                <td><input type="file" name="documento_es_<?php echo $cnt1; ?>" id="documento_es_<?php echo $cnt1; ?>" size="32" />
                  <?php echo $tNGs->displayFieldError("tbl_documentos", "documento_es", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="imagen_es_<?php echo $cnt1; ?>">Imagen:</label></td>
                <td><input type="file" name="imagen_es_<?php echo $cnt1; ?>" id="imagen_es_<?php echo $cnt1; ?>" size="32" />
                  <?php echo $tNGs->displayFieldError("tbl_documentos", "imagen_es", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="sinopsis_es_<?php echo $cnt1; ?>">Sinopsis:</label></td>
                <td><textarea name="sinopsis_es_<?php echo $cnt1; ?>" id="sinopsis_es_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rstbl_documentos['sinopsis_es']); ?></textarea>
                  <?php echo $tNGs->displayFieldHint("sinopsis_es");?> <?php echo $tNGs->displayFieldError("tbl_documentos", "sinopsis_es", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="nombre_en_<?php echo $cnt1; ?>">Name:</label></td>
                <td><input type="text" name="nombre_en_<?php echo $cnt1; ?>" id="nombre_en_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstbl_documentos['nombre_en']); ?>" size="60" maxlength="250" />
                  <?php echo $tNGs->displayFieldHint("nombre_en");?> <?php echo $tNGs->displayFieldError("tbl_documentos", "nombre_en", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="documento_en_<?php echo $cnt1; ?>">File:</label></td>
                <td><input type="file" name="documento_en_<?php echo $cnt1; ?>" id="documento_en_<?php echo $cnt1; ?>" size="32" />
                  <?php echo $tNGs->displayFieldError("tbl_documentos", "documento_en", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="imagen_en_<?php echo $cnt1; ?>">Image:</label></td>
                <td><input type="file" name="imagen_en_<?php echo $cnt1; ?>" id="imagen_en_<?php echo $cnt1; ?>" size="32" />
                  <?php echo $tNGs->displayFieldError("tbl_documentos", "imagen_en", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="sinopsis_en_<?php echo $cnt1; ?>">Synopsis:</label></td>
                <td><textarea name="sinopsis_en_<?php echo $cnt1; ?>" id="sinopsis_en_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rstbl_documentos['sinopsis_en']); ?></textarea>
                  <?php echo $tNGs->displayFieldHint("sinopsis_en");?> <?php echo $tNGs->displayFieldError("tbl_documentos", "sinopsis_en", $cnt1); ?></td>
              </tr>
            </table>
            <input type="hidden" name="kt_pk_tbl_documentos_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rstbl_documentos['kt_pk_tbl_documentos']); ?>" />
            <?php } while ($row_rstbl_documentos = mysql_fetch_assoc($rstbl_documentos)); ?>
          <div class="KT_bottombuttons">
            <div>
              <?php 
      // Show IF Conditional region1
      if (@$_GET['id_documento'] == "") {
      ?>
                <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
                <?php 
      // else Conditional region1
      } else { ?>
                <div class="KT_operations">
                  <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'id_documento')" />
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
?>
