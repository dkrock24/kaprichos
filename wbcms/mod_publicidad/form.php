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
$formValidation->addField("id_ubicacion", true, "numeric", "int", "", "", "");
$formValidation->addField("idioma", true, "numeric", "int", "", "", "");
$formValidation->addField("referencia", true, "text", "", "", "", "");
$formValidation->addField("tipo", true, "text", "", "", "", "");
$formValidation->addField("desde", false, "date", "date", "", "", "");
$formValidation->addField("hasta", false, "date", "date", "", "", "");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../uploaded/mod_publicidad/");
  $deleteObj->setDbFieldName("archivo");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_FileUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileUpload(&$tNG) {
  $uploadObj = new tNG_FileUpload($tNG);
  $uploadObj->setFormFieldName("archivo");
  $uploadObj->setDbFieldName("archivo");
  $uploadObj->setFolder("../../uploaded/mod_publicidad/");
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("jpg, jpeg, gif, swf");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_FileUpload trigger

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
$query_Recordset1 = "SELECT referencia, id_ubicacion FROM dat_ubicaciones ORDER BY referencia";
$Recordset1 = mysql_query($query_Recordset1, $conne10) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_conne10, $conne10);
$query_Recordset2 = "SELECT idioma, id_idioma FROM dat_idiomas ORDER BY idioma";
$Recordset2 = mysql_query($query_Recordset2, $conne10) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

// Make an insert transaction instance
$ins_tbl_publicidad = new tNG_multipleInsert($conn_conne10);
$tNGs->addTransaction($ins_tbl_publicidad);
// Register triggers
$ins_tbl_publicidad->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_tbl_publicidad->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_tbl_publicidad->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$ins_tbl_publicidad->registerTrigger("AFTER", "Trigger_FileUpload", 97);
// Add columns
$ins_tbl_publicidad->setTable("tbl_publicidad");
$ins_tbl_publicidad->addColumn("id_ubicacion", "NUMERIC_TYPE", "POST", "id_ubicacion");
$ins_tbl_publicidad->addColumn("idioma", "NUMERIC_TYPE", "POST", "idioma");
$ins_tbl_publicidad->addColumn("estatus", "CHECKBOX_1_0_TYPE", "POST", "estatus", "1");
$ins_tbl_publicidad->addColumn("orden", "NUMERIC_TYPE", "POST", "orden", "99");
$ins_tbl_publicidad->addColumn("referencia", "STRING_TYPE", "POST", "referencia");
$ins_tbl_publicidad->addColumn("tipo", "STRING_TYPE", "POST", "tipo");
$ins_tbl_publicidad->addColumn("archivo", "FILE_TYPE", "FILES", "archivo");
$ins_tbl_publicidad->addColumn("enlace", "STRING_TYPE", "POST", "enlace");
$ins_tbl_publicidad->addColumn("clickslimit", "NUMERIC_TYPE", "POST", "clickslimit");
$ins_tbl_publicidad->addColumn("impresioneslimit", "NUMERIC_TYPE", "POST", "impresioneslimit");
$ins_tbl_publicidad->addColumn("desde", "DATE_TYPE", "POST", "desde");
$ins_tbl_publicidad->addColumn("hasta", "DATE_TYPE", "POST", "hasta");
$ins_tbl_publicidad->addColumn("ingresado", "DATE_TYPE", "POST", "ingresado", date('Y-m-d H:i:s'));
$ins_tbl_publicidad->setPrimaryKey("id_publicidad", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_tbl_publicidad = new tNG_multipleUpdate($conn_conne10);
$tNGs->addTransaction($upd_tbl_publicidad);
// Register triggers
$upd_tbl_publicidad->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_tbl_publicidad->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_tbl_publicidad->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$upd_tbl_publicidad->registerTrigger("AFTER", "Trigger_FileUpload", 97);
// Add columns
$upd_tbl_publicidad->setTable("tbl_publicidad");
$upd_tbl_publicidad->addColumn("id_ubicacion", "NUMERIC_TYPE", "POST", "id_ubicacion");
$upd_tbl_publicidad->addColumn("idioma", "NUMERIC_TYPE", "POST", "idioma");
$upd_tbl_publicidad->addColumn("estatus", "CHECKBOX_1_0_TYPE", "POST", "estatus");
$upd_tbl_publicidad->addColumn("orden", "NUMERIC_TYPE", "POST", "orden");
$upd_tbl_publicidad->addColumn("referencia", "STRING_TYPE", "POST", "referencia");
$upd_tbl_publicidad->addColumn("tipo", "STRING_TYPE", "POST", "tipo");
$upd_tbl_publicidad->addColumn("archivo", "FILE_TYPE", "FILES", "archivo");
$upd_tbl_publicidad->addColumn("enlace", "STRING_TYPE", "POST", "enlace");
$upd_tbl_publicidad->addColumn("clickslimit", "NUMERIC_TYPE", "POST", "clickslimit");
$upd_tbl_publicidad->addColumn("impresioneslimit", "NUMERIC_TYPE", "POST", "impresioneslimit");
$upd_tbl_publicidad->addColumn("desde", "DATE_TYPE", "POST", "desde");
$upd_tbl_publicidad->addColumn("hasta", "DATE_TYPE", "POST", "hasta");
$upd_tbl_publicidad->addColumn("ingresado", "DATE_TYPE", "POST", "ingresado");
$upd_tbl_publicidad->setPrimaryKey("id_publicidad", "NUMERIC_TYPE", "GET", "id_publicidad");

// Make an instance of the transaction object
$del_tbl_publicidad = new tNG_multipleDelete($conn_conne10);
$tNGs->addTransaction($del_tbl_publicidad);
// Register triggers
$del_tbl_publicidad->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_tbl_publicidad->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$del_tbl_publicidad->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_tbl_publicidad->setTable("tbl_publicidad");
$del_tbl_publicidad->setPrimaryKey("id_publicidad", "NUMERIC_TYPE", "GET", "id_publicidad");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rstbl_publicidad = $tNGs->getRecordset("tbl_publicidad");
$row_rstbl_publicidad = mysql_fetch_assoc($rstbl_publicidad);
$totalRows_rstbl_publicidad = mysql_num_rows($rstbl_publicidad);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/wbcms01.dwt.php" codeOutsideHTMLIsLocked="false" -->
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
    <?php
	echo $tNGs->getErrorMsg();
?>
    <div class="KT_tng">
      <h1>
        <?php 
// Show IF Conditional region1 
if (@$_GET['id_publicidad'] == "") {
?>
          <?php echo NXT_getResource("Insert_FH"); ?>
          <?php 
// else Conditional region1
} else { ?>
          <?php echo NXT_getResource("Update_FH"); ?>
          <?php } 
// endif Conditional region1
?>
        Publicidad </h1>
      <div class="KT_tngform">
        <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
          <?php $cnt1 = 0; ?>
          <?php do { ?>
            <?php $cnt1++; ?>
            <?php 
// Show IF Conditional region1 
if (@$totalRows_rstbl_publicidad > 1) {
?>
              <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
              <?php } 
// endif Conditional region1
?>
              <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                <tr>
                  <td class="KT_th"><label for="id_ubicacion_<?php echo $cnt1; ?>">Ubicación:</label></td>
                  <td><select name="id_ubicacion_<?php echo $cnt1; ?>" id="id_ubicacion_<?php echo $cnt1; ?>">
                      <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
                      <?php 
do {  
?>
                      <option value="<?php echo $row_Recordset1['id_ubicacion']?>"<?php if (!(strcmp($row_Recordset1['id_ubicacion'], $row_rstbl_publicidad['id_ubicacion']))) {echo "SELECTED";} ?>><?php echo $row_Recordset1['referencia']?></option>
                      <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
                    </select>
                      <?php echo $tNGs->displayFieldError("tbl_publicidad", "id_ubicacion", $cnt1); ?> </td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="idioma_<?php echo $cnt1; ?>">Idioma:</label></td>
                  <td><select name="idioma_<?php echo $cnt1; ?>" id="idioma_<?php echo $cnt1; ?>">
                      <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
                      <?php 
do {  
?>
                      <option value="<?php echo $row_Recordset2['id_idioma']?>"<?php if (!(strcmp($row_Recordset2['id_idioma'], $row_rstbl_publicidad['idioma']))) {echo "SELECTED";} ?>><?php echo $row_Recordset2['idioma']?></option>
                      <?php
} while ($row_Recordset2 = mysql_fetch_assoc($Recordset2));
  $rows = mysql_num_rows($Recordset2);
  if($rows > 0) {
      mysql_data_seek($Recordset2, 0);
	  $row_Recordset2 = mysql_fetch_assoc($Recordset2);
  }
?>
                    </select>
                      <?php echo $tNGs->displayFieldError("tbl_publicidad", "idioma", $cnt1); ?> </td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="estatus_<?php echo $cnt1; ?>">Publicar:</label></td>
                  <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rstbl_publicidad['estatus']),"1"))) {echo "checked";} ?> type="checkbox" name="estatus_<?php echo $cnt1; ?>" id="estatus_<?php echo $cnt1; ?>" value="1" />
                      <?php echo $tNGs->displayFieldError("tbl_publicidad", "estatus", $cnt1); ?> </td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="orden_<?php echo $cnt1; ?>">Orden:</label></td>
                  <td><input type="text" name="orden_<?php echo $cnt1; ?>" id="orden_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstbl_publicidad['orden']); ?>" size="7" />
                      <?php echo $tNGs->displayFieldHint("orden");?> <?php echo $tNGs->displayFieldError("tbl_publicidad", "orden", $cnt1); ?> </td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="referencia_<?php echo $cnt1; ?>">Referencia:</label></td>
                  <td><input type="text" name="referencia_<?php echo $cnt1; ?>" id="referencia_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstbl_publicidad['referencia']); ?>" size="32" maxlength="100" />
                      <?php echo $tNGs->displayFieldHint("referencia");?> <?php echo $tNGs->displayFieldError("tbl_publicidad", "referencia", $cnt1); ?> </td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="tipo_<?php echo $cnt1; ?>">Tipo:</label></td>
                  <td><select name="tipo_<?php echo $cnt1; ?>" id="tipo_<?php echo $cnt1; ?>">
                      <option value="flash" <?php if (!(strcmp("flash", KT_escapeAttribute($row_rstbl_publicidad['tipo'])))) {echo "SELECTED";} ?>>Flash</option>
                      <option value="imagen" <?php if (!(strcmp("imagen", KT_escapeAttribute($row_rstbl_publicidad['tipo'])))) {echo "SELECTED";} ?>>Imagen</option>
                    </select>
                      <?php echo $tNGs->displayFieldError("tbl_publicidad", "tipo", $cnt1); ?> </td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="archivo_<?php echo $cnt1; ?>">Archivo:</label></td>
                  <td><input type="file" name="archivo_<?php echo $cnt1; ?>" id="archivo_<?php echo $cnt1; ?>" size="32" />
                      <?php echo $tNGs->displayFieldError("tbl_publicidad", "archivo", $cnt1); ?> </td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="enlace_<?php echo $cnt1; ?>">Enlace:</label></td>
                  <td><input type="text" name="enlace_<?php echo $cnt1; ?>" id="enlace_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstbl_publicidad['enlace']); ?>" size="32" maxlength="255" />
                      <?php echo $tNGs->displayFieldHint("enlace");?> <?php echo $tNGs->displayFieldError("tbl_publicidad", "enlace", $cnt1); ?> </td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="clickslimit_<?php echo $cnt1; ?>">Clicks máximo:</label></td>
                  <td><input type="text" name="clickslimit_<?php echo $cnt1; ?>" id="clickslimit_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstbl_publicidad['clickslimit']); ?>" size="7" />
                      <?php echo $tNGs->displayFieldHint("clickslimit");?> <?php echo $tNGs->displayFieldError("tbl_publicidad", "clickslimit", $cnt1); ?> </td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="impresioneslimit_<?php echo $cnt1; ?>">Impresiones máximo:</label></td>
                  <td><input type="text" name="impresioneslimit_<?php echo $cnt1; ?>" id="impresioneslimit_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstbl_publicidad['impresioneslimit']); ?>" size="7" />
                      <?php echo $tNGs->displayFieldHint("impresioneslimit");?> <?php echo $tNGs->displayFieldError("tbl_publicidad", "impresioneslimit", $cnt1); ?> </td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="desde_<?php echo $cnt1; ?>">Desde:</label></td>
                  <td><input name="desde_<?php echo $cnt1; ?>" id="desde_<?php echo $cnt1; ?>" value="<?php echo KT_formatDate($row_rstbl_publicidad['desde']); ?>" size="10" maxlength="22" wdg:mondayfirst="true" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:type="widget" wdg:singleclick="true" wdg:restricttomask="yes" />
                      <?php echo $tNGs->displayFieldHint("desde");?> <?php echo $tNGs->displayFieldError("tbl_publicidad", "desde", $cnt1); ?> </td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="hasta_<?php echo $cnt1; ?>">Hasta:</label></td>
                  <td><input name="hasta_<?php echo $cnt1; ?>" id="hasta_<?php echo $cnt1; ?>" value="<?php echo KT_formatDate($row_rstbl_publicidad['hasta']); ?>" size="10" maxlength="22" wdg:mondayfirst="true" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:type="widget" wdg:singleclick="true" wdg:restricttomask="yes" />
                      <?php echo $tNGs->displayFieldHint("hasta");?> <?php echo $tNGs->displayFieldError("tbl_publicidad", "hasta", $cnt1); ?> </td>
                </tr>
              </table>
              <input type="hidden" name="ingresado_<?php echo $cnt1; ?>" id="ingresado_<?php echo $cnt1; ?>" value="<?php echo KT_formatDate($row_rstbl_publicidad['ingresado']); ?>" />
<input type="hidden" name="kt_pk_tbl_publicidad_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rstbl_publicidad['kt_pk_tbl_publicidad']); ?>" />
            <?php } while ($row_rstbl_publicidad = mysql_fetch_assoc($rstbl_publicidad)); ?>
          <div class="KT_bottombuttons">
            <div>
              <?php 
      // Show IF Conditional region1
      if (@$_GET['id_publicidad'] == "") {
      ?>
                <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
                <?php 
      // else Conditional region1
      } else { ?>
                <div class="KT_operations">
                  <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'id_publicidad')" />
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
    <?php echo $tNGs->displayValidationRules();?>
    <script src="../../includes/nxt/scripts/form.js" type="text/javascript"></script>
    <script src="../../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
    <script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: true,
  show_as_grid: true,
  merge_down_value: true
}
    </script>
<!-- InstanceEndEditable --></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
