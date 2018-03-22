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
$formValidation->addField("orden", true, "numeric", "int", "", "", "");
$formValidation->addField("fecha", true, "date", "date", "", "", "");
$formValidation->addField("nombre_es", true, "text", "", "", "", "");
$formValidation->addField("introduccion_es", true, "text", "", "", "", "");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_Default_ManyToMany trigger
//remove this line if you want to edit the code by hand 
function Trigger_Default_ManyToMany(&$tNG) {
  $mtm = new tNG_ManyToMany($tNG);
  $mtm->setTable("rel_prods_cats");
  $mtm->setPkName("id_producto");
  $mtm->setFkName("id_categoria");
  $mtm->setFkReference("mtm");
  return $mtm->Execute();
}
//end Trigger_Default_ManyToMany trigger

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

//start Trigger_DeleteDetail trigger
//remove this line if you want to edit the code by hand
function Trigger_DeleteDetail(&$tNG) {
  $tblDelObj = new tNG_DeleteDetailRec($tNG);
  $tblDelObj->setTable("rel_prods_cats");
  $tblDelObj->setFieldName("id_producto");
  return $tblDelObj->Execute();
}
//end Trigger_DeleteDetail trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../uploaded/mod_productos/");
  $deleteObj->setDbFieldName("imagen");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("imagen");
  $uploadObj->setDbFieldName("imagen");
  $uploadObj->setFolder("../../uploaded/mod_productos/");
  $uploadObj->setResize("true", 860, 860);
  $uploadObj->setMaxSize(2048);
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
$query_Recordset1 = "SELECT id_categoria, superior, orden, nombre_es FROM tbl_productos_categorias ORDER BY orden ASC";
$Recordset1 = mysql_query($query_Recordset1, $conne10) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_conne10, $conne10);
$query_rstbl_productos_categorias = "SELECT tbl_productos_categorias.id_categoria, tbl_productos_categorias.nombre_es, tbl_productos_categorias.superior, rel_prods_cats.id_producto FROM tbl_productos_categorias LEFT JOIN rel_prods_cats ON (rel_prods_cats.id_categoria=tbl_productos_categorias.id_categoria AND rel_prods_cats.id_producto=0123456789) ORDER BY tbl_productos_categorias.orden ASC";
$rstbl_productos_categorias = mysql_query($query_rstbl_productos_categorias, $conne10) or die(mysql_error());
$row_rstbl_productos_categorias = mysql_fetch_assoc($rstbl_productos_categorias);
$totalRows_rstbl_productos_categorias = mysql_num_rows($rstbl_productos_categorias);

mysql_select_db($database_conne10, $conne10);
$query_rscat = "SELECT * FROM tbl_productos_categorias";
$rscat = mysql_query($query_rscat, $conne10) or die(mysql_error());
$row_rscat = mysql_fetch_assoc($rscat);
$totalRows_rscat = mysql_num_rows($rscat);

mysql_select_db($database_conne10, $conne10);
$query_Recordset2 = "SELECT nombre_es, id_categoria FROM tbl_productos_categorias ORDER BY nombre_es";
$Recordset2 = mysql_query($query_Recordset2, $conne10) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

// Make an insert transaction instance
$ins_tbl_productos = new tNG_multipleInsert($conn_conne10);
$tNGs->addTransaction($ins_tbl_productos);
// Register triggers
$ins_tbl_productos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_tbl_productos->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_tbl_productos->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$ins_tbl_productos->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$ins_tbl_productos->registerTrigger("AFTER", "Trigger_Default_ManyToMany", 50);
// Add columns
$ins_tbl_productos->setTable("tbl_productos");
$ins_tbl_productos->addColumn("customnum", "NUMERIC_TYPE", "POST", "customnum");
$ins_tbl_productos->addColumn("estatus", "CHECKBOX_1_0_TYPE", "POST", "estatus", "1");
$ins_tbl_productos->addColumn("categoria", "NUMERIC_TYPE", "POST", "categoria");
$ins_tbl_productos->addColumn("orden", "NUMERIC_TYPE", "POST", "orden", "99");
$ins_tbl_productos->addColumn("fecha", "DATE_TYPE", "POST", "fecha", "date('Y-m-d')");
$ins_tbl_productos->addColumn("nombre_es", "STRING_TYPE", "POST", "nombre_es");
$ins_tbl_productos->addColumn("introduccion_es", "STRING_TYPE", "POST", "introduccion_es");
$ins_tbl_productos->addColumn("contenido1_es", "STRING_TYPE", "POST", "contenido1_es");
$ins_tbl_productos->addColumn("keywords_es", "STRING_TYPE", "POST", "keywords_es");
$ins_tbl_productos->addColumn("description_es", "STRING_TYPE", "POST", "description_es");
$ins_tbl_productos->addColumn("imagen", "FILE_TYPE", "FILES", "imagen");
$ins_tbl_productos->addColumn("numerico1", "DOUBLE_TYPE", "POST", "numerico1");
$ins_tbl_productos->addColumn("numerico2", "DOUBLE_TYPE", "POST", "numerico2");
$ins_tbl_productos->setPrimaryKey("id_producto", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_tbl_productos = new tNG_multipleUpdate($conn_conne10);
$tNGs->addTransaction($upd_tbl_productos);
// Register triggers
$upd_tbl_productos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_tbl_productos->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_tbl_productos->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$upd_tbl_productos->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$upd_tbl_productos->registerTrigger("AFTER", "Trigger_Default_ManyToMany", 50);
// Add columns
$upd_tbl_productos->setTable("tbl_productos");
$upd_tbl_productos->addColumn("customnum", "NUMERIC_TYPE", "POST", "customnum");
$upd_tbl_productos->addColumn("estatus", "CHECKBOX_1_0_TYPE", "POST", "estatus");
$upd_tbl_productos->addColumn("categoria", "NUMERIC_TYPE", "POST", "categoria");
$upd_tbl_productos->addColumn("orden", "NUMERIC_TYPE", "POST", "orden");
$upd_tbl_productos->addColumn("fecha", "DATE_TYPE", "POST", "fecha");
$upd_tbl_productos->addColumn("nombre_es", "STRING_TYPE", "POST", "nombre_es");
$upd_tbl_productos->addColumn("introduccion_es", "STRING_TYPE", "POST", "introduccion_es");
$upd_tbl_productos->addColumn("contenido1_es", "STRING_TYPE", "POST", "contenido1_es");
$upd_tbl_productos->addColumn("keywords_es", "STRING_TYPE", "POST", "keywords_es");
$upd_tbl_productos->addColumn("description_es", "STRING_TYPE", "POST", "description_es");
$upd_tbl_productos->addColumn("imagen", "FILE_TYPE", "FILES", "imagen");
$upd_tbl_productos->addColumn("numerico1", "DOUBLE_TYPE", "POST", "numerico1");
$upd_tbl_productos->addColumn("numerico2", "DOUBLE_TYPE", "POST", "numerico2");
$upd_tbl_productos->setPrimaryKey("id_producto", "NUMERIC_TYPE", "GET", "id_producto");

// Make an instance of the transaction object
$del_tbl_productos = new tNG_multipleDelete($conn_conne10);
$tNGs->addTransaction($del_tbl_productos);
// Register triggers
$del_tbl_productos->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_tbl_productos->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$del_tbl_productos->registerTrigger("AFTER", "Trigger_FileDelete", 98);
$del_tbl_productos->registerTrigger("BEFORE", "Trigger_DeleteDetail", 99);
// Add columns
$del_tbl_productos->setTable("tbl_productos");
$del_tbl_productos->setPrimaryKey("id_producto", "NUMERIC_TYPE", "GET", "id_producto");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rstbl_productos = $tNGs->getRecordset("tbl_productos");
$row_rstbl_productos = mysql_fetch_assoc($rstbl_productos);
$totalRows_rstbl_productos = mysql_num_rows($rstbl_productos);
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
  show_as_grid: true,
  merge_down_value: true
}
          </script>
        <?php include("submenu.php"); ?><!-- InstanceEndEditable --></div>
    </td>
    <td valign="top"><!-- InstanceBeginEditable name="WBCMSMAIN" -->
    <?php
	echo $tNGs->getErrorMsg();
?>
    <div class="KT_tng">
      <h1>
        <?php 
// Show IF Conditional region1 
if (@$_GET['id_producto'] == "") {
?>
          <?php echo NXT_getResource("Insert_FH"); ?>
          <?php 
// else Conditional region1
} else { ?>
          <?php echo NXT_getResource("Update_FH"); ?>
          <?php } 
// endif Conditional region1
?>
        Productos </h1>
      <div class="KT_tngform">
        <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
          <?php $cnt1 = 0; ?>
          <?php do { ?>
            <?php $cnt1++; ?>
            <?php 
// Show IF Conditional region1 
if (@$totalRows_rstbl_productos > 1) {
?>
              <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
              <?php } 
// endif Conditional region1
?>
            <table cellpadding="2" cellspacing="0" class="KT_tngtable">
              <tr>
                <td class="KT_th"><label for="customnum_<?php echo $cnt1; ?>">2CO ID:</label></td>
                <td><input type="text" name="customnum_<?php echo $cnt1; ?>" id="customnum_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstbl_productos['customnum']); ?>" size="5" />
                  <?php echo $tNGs->displayFieldHint("customnum");?> <?php echo $tNGs->displayFieldError("tbl_productos", "customnum", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="estatus_<?php echo $cnt1; ?>">Publicar:</label></td>
                <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rstbl_productos['estatus']),"1"))) {echo "checked";} ?> type="checkbox" name="estatus_<?php echo $cnt1; ?>" id="estatus_<?php echo $cnt1; ?>" value="1" />
                  <?php echo $tNGs->displayFieldError("tbl_productos", "estatus", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="categoria_<?php echo $cnt1; ?>">Categoria:</label></td>
                <td><select name="categoria_<?php echo $cnt1; ?>" id="categoria_<?php echo $cnt1; ?>">
                  <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
                  <?php 
do {  
?>
                  <option value="<?php echo $row_rscat['id_categoria']?>"<?php if (!(strcmp($row_rscat['id_categoria'], $row_rstbl_productos['categoria']))) {echo "SELECTED";} ?>><?php echo $row_rscat['nombre_es']?></option>
                  <?php
} while ($row_rscat = mysql_fetch_assoc($rscat));
  $rows = mysql_num_rows($rscat);
  if($rows > 0) {
      mysql_data_seek($rscat, 0);
	  $row_rscat = mysql_fetch_assoc($rscat);
  }
?>
                </select>
                  <?php echo $tNGs->displayFieldError("tbl_productos", "categoria", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="orden_<?php echo $cnt1; ?>">Orden:</label></td>
                <td><input type="text" name="orden_<?php echo $cnt1; ?>" id="orden_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstbl_productos['orden']); ?>" size="7" />
                  <?php echo $tNGs->displayFieldHint("orden");?> <?php echo $tNGs->displayFieldError("tbl_productos", "orden", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="fecha_<?php echo $cnt1; ?>">Fecha:</label></td>
                <td><input name="fecha_<?php echo $cnt1; ?>" id="fecha_<?php echo $cnt1; ?>" value="<?php echo KT_formatDate($row_rstbl_productos['fecha']); ?>" size="10" maxlength="22" wdg:mondayfirst="true" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:type="widget" wdg:singleclick="true" wdg:restricttomask="yes" />
                  <?php echo $tNGs->displayFieldHint("fecha");?> <?php echo $tNGs->displayFieldError("tbl_productos", "fecha", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="imagen_<?php echo $cnt1; ?>">Imagen:</label></td>
                <td><input type="file" name="imagen_<?php echo $cnt1; ?>" id="imagen_<?php echo $cnt1; ?>" size="32" />
                  <?php echo $tNGs->displayFieldError("tbl_productos", "imagen", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="numerico1_<?php echo $cnt1; ?>">Precio:</label></td>
                <td>$
                  <input type="text" name="numerico1_<?php echo $cnt1; ?>" id="numerico1_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstbl_productos['numerico1']); ?>" size="7" />
                  <?php echo $tNGs->displayFieldHint("numerico1");?> <?php echo $tNGs->displayFieldError("tbl_productos", "numerico1", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="numerico2_<?php echo $cnt1; ?>">Promocion:</label></td>
                <td>$
                  <input type="text" name="numerico2_<?php echo $cnt1; ?>" id="numerico2_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstbl_productos['numerico2']); ?>" size="7" />
                  <?php echo $tNGs->displayFieldHint("numerico2");?> <?php echo $tNGs->displayFieldError("tbl_productos", "numerico2", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="nombre_es_<?php echo $cnt1; ?>">Nombre:</label></td>
                <td><input type="text" name="nombre_es_<?php echo $cnt1; ?>" id="nombre_es_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstbl_productos['nombre_es']); ?>" size="60" maxlength="250" />
                  <?php echo $tNGs->displayFieldHint("nombre_es");?> <?php echo $tNGs->displayFieldError("tbl_productos", "nombre_es", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="introduccion_es_<?php echo $cnt1; ?>">Introducción:</label></td>
                <td><textarea name="introduccion_es_<?php echo $cnt1; ?>" id="introduccion_es_<?php echo $cnt1; ?>" cols="50" rows="3"><?php echo KT_escapeAttribute($row_rstbl_productos['introduccion_es']); ?></textarea>
                  <?php echo $tNGs->displayFieldHint("introduccion_es");?> <?php echo $tNGs->displayFieldError("tbl_productos", "introduccion_es", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="contenido1_es_<?php echo $cnt1; ?>">Contenido:</label></td>
                <td><textarea class="ckeditor" name="contenido1_es_<?php echo $cnt1; ?>" id="contenido1_es_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rstbl_productos['contenido1_es']); ?></textarea>
                  <br />
                  <a href="../tool_uploadimg/simple_upload.php" target="_blank" rel="lyteframe" rev="width: 320px; height: 300px; scrolling: no;"><img src="../images/subirimagen.png" alt="Subir Imagen" width="120" height="30" border="0" /></a>
                  <script type="text/javascript">
	CKEDITOR.replace('contenido1_es_<?php echo $cnt1; ?>', { filebrowserBrowseUrl: '../edfl/index.html'});
                </script>
                  <?php echo $tNGs->displayFieldHint("contenido1_es");?> <?php echo $tNGs->displayFieldError("tbl_productos", "contenido1_es", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="keywords_es_<?php echo $cnt1; ?>">Keywords:</label></td>
                <td><textarea name="keywords_es_<?php echo $cnt1; ?>" id="keywords_es_<?php echo $cnt1; ?>" cols="100" rows="2"><?php echo KT_escapeAttribute($row_rstbl_productos['keywords_es']); ?></textarea>
                  <?php echo $tNGs->displayFieldHint("keywords_es");?> <?php echo $tNGs->displayFieldError("tbl_productos", "keywords_es", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="description_es_<?php echo $cnt1; ?>">Descripcion:</label></td>
                <td><textarea name="description_es_<?php echo $cnt1; ?>" id="description_es_<?php echo $cnt1; ?>" cols="100" rows="2"><?php echo KT_escapeAttribute($row_rstbl_productos['description_es']); ?></textarea>
                  <?php echo $tNGs->displayFieldHint("description_es");?> <?php echo $tNGs->displayFieldError("tbl_productos", "description_es", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th">&nbsp;</td>
                <td><br />
                  <a href="../tool_uploadimg/simple_upload.php" target="_blank" rel="lyteframe" rev="width: 320px; height: 300px; scrolling: no;"><img src="../images/subirimagen.png" alt="Subir Imagen" width="120" height="30" border="0" /></a>
                  <script type="text/javascript">
	CKEDITOR.replace('contenido1_en_<?php echo $cnt1; ?>', { filebrowserBrowseUrl: '../edfl/index.html'});
                  </script></td>
              </tr>
            </table>
            <input type="hidden" name="kt_pk_tbl_productos_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rstbl_productos['kt_pk_tbl_productos']); ?>" />
            <?php } while ($row_rstbl_productos = mysql_fetch_assoc($rstbl_productos)); ?>
          <div class="KT_bottombuttons">
            <div>
              <?php 
      // Show IF Conditional region1
      if (@$_GET['id_producto'] == "") {
      ?>
                <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
                <?php 
      // else Conditional region1
      } else { ?>
                <div class="KT_operations">
                  <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'id_producto')" />
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

mysql_free_result($rstbl_productos_categorias);

mysql_free_result($rscat);

mysql_free_result($Recordset2);
?>
