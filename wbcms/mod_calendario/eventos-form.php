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
$formValidation->addField("tipo", true, "numeric", "int", "", "", "");
$formValidation->addField("evento_es", true, "text", "", "", "", "");
$formValidation->addField("evento_en", true, "text", "", "", "", "");
$formValidation->addField("fecha_inicio", true, "date", "date", "", "", "");
$formValidation->addField("fecha_fin", false, "date", "date", "", "", "");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete1 trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete1(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../uploaded/mod_calendario/");
  $deleteObj->setDbFieldName("imagen_en");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete1 trigger

//start Trigger_ImageUpload1 trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload1(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("imagen_en");
  $uploadObj->setDbFieldName("imagen_en");
  $uploadObj->setFolder("../../uploaded/mod_calendario/");
  $uploadObj->setResize("true", 900, 900);
  $uploadObj->setMaxSize(5120);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload1 trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../uploaded/mod_calendario/");
  $deleteObj->setDbFieldName("imagen_es");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("imagen_es");
  $uploadObj->setDbFieldName("imagen_es");
  $uploadObj->setFolder("../../uploaded/mod_calendario/");
  $uploadObj->setResize("true", 900, 900);
  $uploadObj->setMaxSize(5120);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

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
$query_Recordset2 = "SELECT categoria_es, id_categoria FROM tbl_calendario_categorias ORDER BY categoria_es";
$Recordset2 = mysql_query($query_Recordset2, $conne10) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

mysql_select_db($database_conne10, $conne10);
$query_Recordset3 = "SELECT tipo_es, id_tipo FROM tbl_calendario_tipos ORDER BY tipo_es";
$Recordset3 = mysql_query($query_Recordset3, $conne10) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);

// Make an insert transaction instance
$ins_tbl_calendario_eventos = new tNG_multipleInsert($conn_conne10);
$tNGs->addTransaction($ins_tbl_calendario_eventos);
// Register triggers
$ins_tbl_calendario_eventos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_tbl_calendario_eventos->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_tbl_calendario_eventos->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$ins_tbl_calendario_eventos->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$ins_tbl_calendario_eventos->registerTrigger("AFTER", "Trigger_ImageUpload1", 97);
// Add columns
$ins_tbl_calendario_eventos->setTable("tbl_calendario_eventos");
$ins_tbl_calendario_eventos->addColumn("estatus", "CHECKBOX_1_0_TYPE", "POST", "estatus", "1");
$ins_tbl_calendario_eventos->addColumn("categoria", "NUMERIC_TYPE", "POST", "categoria");
$ins_tbl_calendario_eventos->addColumn("tipo", "NUMERIC_TYPE", "POST", "tipo");
$ins_tbl_calendario_eventos->addColumn("evento_es", "STRING_TYPE", "POST", "evento_es");
$ins_tbl_calendario_eventos->addColumn("imagen_es", "FILE_TYPE", "FILES", "imagen_es");
$ins_tbl_calendario_eventos->addColumn("descripcion_es", "STRING_TYPE", "POST", "descripcion_es");
$ins_tbl_calendario_eventos->addColumn("lugar_es", "STRING_TYPE", "POST", "lugar_es");
$ins_tbl_calendario_eventos->addColumn("evento_en", "STRING_TYPE", "POST", "evento_en");
$ins_tbl_calendario_eventos->addColumn("imagen_en", "FILE_TYPE", "FILES", "imagen_en");
$ins_tbl_calendario_eventos->addColumn("descripcion_en", "STRING_TYPE", "POST", "descripcion_en");
$ins_tbl_calendario_eventos->addColumn("lugar_en", "STRING_TYPE", "POST", "lugar_en");
$ins_tbl_calendario_eventos->addColumn("fecha_inicio", "DATE_TYPE", "POST", "fecha_inicio");
$ins_tbl_calendario_eventos->addColumn("fecha_fin", "DATE_TYPE", "POST", "fecha_fin");
$ins_tbl_calendario_eventos->addColumn("horas", "STRING_TYPE", "POST", "horas");
$ins_tbl_calendario_eventos->setPrimaryKey("id_evento", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_tbl_calendario_eventos = new tNG_multipleUpdate($conn_conne10);
$tNGs->addTransaction($upd_tbl_calendario_eventos);
// Register triggers
$upd_tbl_calendario_eventos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_tbl_calendario_eventos->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_tbl_calendario_eventos->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$upd_tbl_calendario_eventos->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$upd_tbl_calendario_eventos->registerTrigger("AFTER", "Trigger_ImageUpload1", 97);
// Add columns
$upd_tbl_calendario_eventos->setTable("tbl_calendario_eventos");
$upd_tbl_calendario_eventos->addColumn("estatus", "CHECKBOX_1_0_TYPE", "POST", "estatus");
$upd_tbl_calendario_eventos->addColumn("categoria", "NUMERIC_TYPE", "POST", "categoria");
$upd_tbl_calendario_eventos->addColumn("tipo", "NUMERIC_TYPE", "POST", "tipo");
$upd_tbl_calendario_eventos->addColumn("evento_es", "STRING_TYPE", "POST", "evento_es");
$upd_tbl_calendario_eventos->addColumn("imagen_es", "FILE_TYPE", "FILES", "imagen_es");
$upd_tbl_calendario_eventos->addColumn("descripcion_es", "STRING_TYPE", "POST", "descripcion_es");
$upd_tbl_calendario_eventos->addColumn("lugar_es", "STRING_TYPE", "POST", "lugar_es");
$upd_tbl_calendario_eventos->addColumn("evento_en", "STRING_TYPE", "POST", "evento_en");
$upd_tbl_calendario_eventos->addColumn("imagen_en", "FILE_TYPE", "FILES", "imagen_en");
$upd_tbl_calendario_eventos->addColumn("descripcion_en", "STRING_TYPE", "POST", "descripcion_en");
$upd_tbl_calendario_eventos->addColumn("lugar_en", "STRING_TYPE", "POST", "lugar_en");
$upd_tbl_calendario_eventos->addColumn("fecha_inicio", "DATE_TYPE", "POST", "fecha_inicio");
$upd_tbl_calendario_eventos->addColumn("fecha_fin", "DATE_TYPE", "POST", "fecha_fin");
$upd_tbl_calendario_eventos->addColumn("horas", "STRING_TYPE", "POST", "horas");
$upd_tbl_calendario_eventos->setPrimaryKey("id_evento", "NUMERIC_TYPE", "GET", "id_evento");

// Make an instance of the transaction object
$del_tbl_calendario_eventos = new tNG_multipleDelete($conn_conne10);
$tNGs->addTransaction($del_tbl_calendario_eventos);
// Register triggers
$del_tbl_calendario_eventos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_tbl_calendario_eventos->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$del_tbl_calendario_eventos->registerTrigger("AFTER", "Trigger_FileDelete", 98);
$del_tbl_calendario_eventos->registerTrigger("AFTER", "Trigger_FileDelete1", 98);
// Add columns
$del_tbl_calendario_eventos->setTable("tbl_calendario_eventos");
$del_tbl_calendario_eventos->setPrimaryKey("id_evento", "NUMERIC_TYPE", "GET", "id_evento");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rstbl_calendario_eventos = $tNGs->getRecordset("tbl_calendario_eventos");
$row_rstbl_calendario_eventos = mysql_fetch_assoc($rstbl_calendario_eventos);
$totalRows_rstbl_calendario_eventos = mysql_num_rows($rstbl_calendario_eventos);
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
if (@$_GET['id_evento'] == "") {
?>
          <?php echo NXT_getResource("Insert_FH"); ?>
          <?php 
// else Conditional region1
} else { ?>
          <?php echo NXT_getResource("Update_FH"); ?>
          <?php } 
// endif Conditional region1
?>
        Tbl_calendario_eventos </h1>
      <div class="KT_tngform">
        <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
          <?php $cnt1 = 0; ?>
          <?php do { ?>
            <?php $cnt1++; ?>
            <?php 
// Show IF Conditional region1 
if (@$totalRows_rstbl_calendario_eventos > 1) {
?>
              <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
              <?php } 
// endif Conditional region1
?>
            <table cellpadding="2" cellspacing="0" class="KT_tngtable">
              <tr>
                <td class="KT_th"><label for="estatus_<?php echo $cnt1; ?>">Publicar:</label></td>
                <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rstbl_calendario_eventos['estatus']),"1"))) {echo "checked";} ?> type="checkbox" name="estatus_<?php echo $cnt1; ?>" id="estatus_<?php echo $cnt1; ?>" value="1" />
                  <?php echo $tNGs->displayFieldError("tbl_calendario_eventos", "estatus", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="categoria_<?php echo $cnt1; ?>">Categoria:</label></td>
                <td><select name="categoria_<?php echo $cnt1; ?>" id="categoria_<?php echo $cnt1; ?>">
                  <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
                  <?php 
do {  
?>
                  <option value="<?php echo $row_Recordset2['id_categoria']?>"<?php if (!(strcmp($row_Recordset2['id_categoria'], $row_rstbl_calendario_eventos['categoria']))) {echo "SELECTED";} ?>><?php echo $row_Recordset2['categoria_es']?></option>
                  <?php
} while ($row_Recordset2 = mysql_fetch_assoc($Recordset2));
  $rows = mysql_num_rows($Recordset2);
  if($rows > 0) {
      mysql_data_seek($Recordset2, 0);
	  $row_Recordset2 = mysql_fetch_assoc($Recordset2);
  }
?>
                </select>
                  <?php echo $tNGs->displayFieldError("tbl_calendario_eventos", "categoria", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="tipo_<?php echo $cnt1; ?>">Tipo:</label></td>
                <td><select name="tipo_<?php echo $cnt1; ?>" id="tipo_<?php echo $cnt1; ?>">
                  <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
                  <?php 
do {  
?>
                  <option value="<?php echo $row_Recordset3['id_tipo']?>"<?php if (!(strcmp($row_Recordset3['id_tipo'], $row_rstbl_calendario_eventos['tipo']))) {echo "SELECTED";} ?>><?php echo $row_Recordset3['tipo_es']?></option>
                  <?php
} while ($row_Recordset3 = mysql_fetch_assoc($Recordset3));
  $rows = mysql_num_rows($Recordset3);
  if($rows > 0) {
      mysql_data_seek($Recordset3, 0);
	  $row_Recordset3 = mysql_fetch_assoc($Recordset3);
  }
?>
                </select>
                  <?php echo $tNGs->displayFieldError("tbl_calendario_eventos", "tipo", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="evento_es_<?php echo $cnt1; ?>">Evento:</label></td>
                <td><input type="text" name="evento_es_<?php echo $cnt1; ?>" id="evento_es_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstbl_calendario_eventos['evento_es']); ?>" size="60" maxlength="250" />
                  <?php echo $tNGs->displayFieldHint("evento_es");?> <?php echo $tNGs->displayFieldError("tbl_calendario_eventos", "evento_es", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="imagen_es_<?php echo $cnt1; ?>">Imagen:</label></td>
                <td><input type="file" name="imagen_es_<?php echo $cnt1; ?>" id="imagen_es_<?php echo $cnt1; ?>" size="32" />
                  <?php echo $tNGs->displayFieldError("tbl_calendario_eventos", "imagen_es", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="descripcion_es_<?php echo $cnt1; ?>">Descripción:</label></td>
                <td><textarea class="ckeditor" name="descripcion_es_<?php echo $cnt1; ?>" id="descripcion_es_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rstbl_calendario_eventos['descripcion_es']); ?></textarea>
				  <script type="text/javascript">CKEDITOR.replace('descripcion_es_<?php echo $cnt1; ?>', { filebrowserBrowseUrl: '../edfl/index.html'});</script><br /><a href="../tool_uploadimg/simple_upload.php" target="_blank" rel="lyteframe" rev="width: 320px; height: 300px; scrolling: no;"><img src="../images/subirimagen.png" alt="Subir Imagen" width="120" height="30" border="0" /></a>
                  <?php echo $tNGs->displayFieldHint("descripcion_es");?> <?php echo $tNGs->displayFieldError("tbl_calendario_eventos", "descripcion_es", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="lugar_es_<?php echo $cnt1; ?>">Lugar:</label></td>
                <td><input type="text" name="lugar_es_<?php echo $cnt1; ?>" id="lugar_es_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstbl_calendario_eventos['lugar_es']); ?>" size="32" maxlength="250" />
                  <?php echo $tNGs->displayFieldHint("lugar_es");?> <?php echo $tNGs->displayFieldError("tbl_calendario_eventos", "lugar_es", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="evento_en_<?php echo $cnt1; ?>">Event:</label></td>
                <td><input type="text" name="evento_en_<?php echo $cnt1; ?>" id="evento_en_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstbl_calendario_eventos['evento_en']); ?>" size="60" maxlength="250" />
                  <?php echo $tNGs->displayFieldHint("evento_en");?> <?php echo $tNGs->displayFieldError("tbl_calendario_eventos", "evento_en", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="imagen_en_<?php echo $cnt1; ?>">Image:</label></td>
                <td><input type="file" name="imagen_en_<?php echo $cnt1; ?>" id="imagen_en_<?php echo $cnt1; ?>" size="32" />
                  <?php echo $tNGs->displayFieldError("tbl_calendario_eventos", "imagen_en", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="descripcion_en_<?php echo $cnt1; ?>">Description:</label></td>
                <td><textarea class="ckeditor" name="descripcion_en_<?php echo $cnt1; ?>" id="descripcion_en_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rstbl_calendario_eventos['descripcion_en']); ?></textarea>
				  <script type="text/javascript">CKEDITOR.replace('descripcion_en_<?php echo $cnt1; ?>', { filebrowserBrowseUrl: '../edfl/index.html'});</script><br /><a href="../tool_uploadimg/simple_upload.php" target="_blank" rel="lyteframe" rev="width: 320px; height: 300px; scrolling: no;"><img src="../images/subirimagen.png" alt="Subir Imagen" width="120" height="30" border="0" /></a>
                  <?php echo $tNGs->displayFieldHint("descripcion_en");?> <?php echo $tNGs->displayFieldError("tbl_calendario_eventos", "descripcion_en", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="lugar_en_<?php echo $cnt1; ?>">Location:</label></td>
                <td><input type="text" name="lugar_en_<?php echo $cnt1; ?>" id="lugar_en_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstbl_calendario_eventos['lugar_en']); ?>" size="32" maxlength="250" />
                  <?php echo $tNGs->displayFieldHint("lugar_en");?> <?php echo $tNGs->displayFieldError("tbl_calendario_eventos", "lugar_en", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="fecha_inicio_<?php echo $cnt1; ?>">Inicia:</label></td>
                <td><input name="fecha_inicio_<?php echo $cnt1; ?>" id="fecha_inicio_<?php echo $cnt1; ?>" value="<?php echo KT_formatDate($row_rstbl_calendario_eventos['fecha_inicio']); ?>" size="10" maxlength="22" wdg:mondayfirst="true" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:type="widget" wdg:singleclick="true" wdg:restricttomask="yes" />
                  <?php echo $tNGs->displayFieldHint("fecha_inicio");?> <?php echo $tNGs->displayFieldError("tbl_calendario_eventos", "fecha_inicio", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="fecha_fin_<?php echo $cnt1; ?>">Finaliza:</label></td>
                <td><input name="fecha_fin_<?php echo $cnt1; ?>" id="fecha_fin_<?php echo $cnt1; ?>" value="<?php echo KT_formatDate($row_rstbl_calendario_eventos['fecha_fin']); ?>" size="10" maxlength="22" wdg:mondayfirst="true" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:type="widget" wdg:singleclick="true" wdg:restricttomask="yes" />
                  <?php echo $tNGs->displayFieldHint("fecha_fin");?> <?php echo $tNGs->displayFieldError("tbl_calendario_eventos", "fecha_fin", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="horas_<?php echo $cnt1; ?>">Horas:</label></td>
                <td><input type="text" name="horas_<?php echo $cnt1; ?>" id="horas_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstbl_calendario_eventos['horas']); ?>" size="32" maxlength="200" />
                  <?php echo $tNGs->displayFieldHint("horas");?> <?php echo $tNGs->displayFieldError("tbl_calendario_eventos", "horas", $cnt1); ?></td>
              </tr>
            </table>
            <input type="hidden" name="kt_pk_tbl_calendario_eventos_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rstbl_calendario_eventos['kt_pk_tbl_calendario_eventos']); ?>" />
            <?php } while ($row_rstbl_calendario_eventos = mysql_fetch_assoc($rstbl_calendario_eventos)); ?>
          <div class="KT_bottombuttons">
            <div>
              <?php 
      // Show IF Conditional region1
      if (@$_GET['id_evento'] == "") {
      ?>
                <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
                <?php 
      // else Conditional region1
      } else { ?>
                <div class="KT_operations">
                  <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'id_evento')" />
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
mysql_free_result($Recordset2);

mysql_free_result($Recordset3);
?>
