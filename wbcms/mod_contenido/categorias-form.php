<?php include_once("../config.php"); ?>
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
$formValidation->addField("seccion", true, "numeric", "int", "", "", "");
$formValidation->addField("orden", true, "numeric", "int", "", "", "");
$formValidation->addField("nombre_es", true, "text", "", "", "250", "");
$formValidation->addField("contenido_es", true, "text", "", "", "", "");
$formValidation->addField("keywords_es", false, "text", "", "", "200", "");
$formValidation->addField("description_es", false, "text", "", "", "200", "");
$formValidation->addField("nombre_en", true, "text", "", "", "250", "");
$formValidation->addField("contenido_en", true, "text", "", "", "", "");
$formValidation->addField("keywords_en", false, "text", "", "", "200", "");
$formValidation->addField("description_en", false, "text", "", "", "200", "");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../uploaded/mod_contenido/");
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
  $uploadObj->setFolder("../../uploaded/mod_contenido/");
  $uploadObj->setResize("true", 500, 500);
  $uploadObj->setMaxSize(5120);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

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
$query_Recordset1 = "SELECT nombre_es, id_seccion FROM tbl_secciones ORDER BY nombre_es";
$Recordset1 = mysql_query($query_Recordset1, $conne10) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_conne10, $conne10);
$query_Recordset2 = "SELECT idioma, id_idioma FROM dat_idiomas ORDER BY idioma";
$Recordset2 = mysql_query($query_Recordset2, $conne10) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

// Make an insert transaction instance
$ins_tbl_secciones_categorias = new tNG_multipleInsert($conn_conne10);
$tNGs->addTransaction($ins_tbl_secciones_categorias);
// Register triggers
$ins_tbl_secciones_categorias->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_tbl_secciones_categorias->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_tbl_secciones_categorias->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$ins_tbl_secciones_categorias->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$ins_tbl_secciones_categorias->setTable("tbl_secciones_categorias");
$ins_tbl_secciones_categorias->addColumn("seccion", "NUMERIC_TYPE", "POST", "seccion");
$ins_tbl_secciones_categorias->addColumn("estatus", "CHECKBOX_1_0_TYPE", "POST", "estatus", "1");
$ins_tbl_secciones_categorias->addColumn("orden", "NUMERIC_TYPE", "POST", "orden", "99");
$ins_tbl_secciones_categorias->addColumn("imagen", "FILE_TYPE", "FILES", "imagen");
$ins_tbl_secciones_categorias->addColumn("nombre_es", "STRING_TYPE", "POST", "nombre_es");
$ins_tbl_secciones_categorias->addColumn("contenido_es", "STRING_TYPE", "POST", "contenido_es");
$ins_tbl_secciones_categorias->addColumn("keywords_es", "STRING_TYPE", "POST", "keywords_es");
$ins_tbl_secciones_categorias->addColumn("description_es", "STRING_TYPE", "POST", "description_es");
$ins_tbl_secciones_categorias->addColumn("nombre_en", "STRING_TYPE", "POST", "nombre_en");
$ins_tbl_secciones_categorias->addColumn("contenido_en", "STRING_TYPE", "POST", "contenido_en");
$ins_tbl_secciones_categorias->addColumn("keywords_en", "STRING_TYPE", "POST", "keywords_en");
$ins_tbl_secciones_categorias->addColumn("description_en", "STRING_TYPE", "POST", "description_en");
$ins_tbl_secciones_categorias->setPrimaryKey("id_categoria", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_tbl_secciones_categorias = new tNG_multipleUpdate($conn_conne10);
$tNGs->addTransaction($upd_tbl_secciones_categorias);
// Register triggers
$upd_tbl_secciones_categorias->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_tbl_secciones_categorias->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_tbl_secciones_categorias->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$upd_tbl_secciones_categorias->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$upd_tbl_secciones_categorias->setTable("tbl_secciones_categorias");
$upd_tbl_secciones_categorias->addColumn("seccion", "NUMERIC_TYPE", "POST", "seccion");
$upd_tbl_secciones_categorias->addColumn("estatus", "CHECKBOX_1_0_TYPE", "POST", "estatus");
$upd_tbl_secciones_categorias->addColumn("orden", "NUMERIC_TYPE", "POST", "orden");
$upd_tbl_secciones_categorias->addColumn("imagen", "FILE_TYPE", "FILES", "imagen");
$upd_tbl_secciones_categorias->addColumn("nombre_es", "STRING_TYPE", "POST", "nombre_es");
$upd_tbl_secciones_categorias->addColumn("contenido_es", "STRING_TYPE", "POST", "contenido_es");
$upd_tbl_secciones_categorias->addColumn("keywords_es", "STRING_TYPE", "POST", "keywords_es");
$upd_tbl_secciones_categorias->addColumn("description_es", "STRING_TYPE", "POST", "description_es");
$upd_tbl_secciones_categorias->addColumn("nombre_en", "STRING_TYPE", "POST", "nombre_en");
$upd_tbl_secciones_categorias->addColumn("contenido_en", "STRING_TYPE", "POST", "contenido_en");
$upd_tbl_secciones_categorias->addColumn("keywords_en", "STRING_TYPE", "POST", "keywords_en");
$upd_tbl_secciones_categorias->addColumn("description_en", "STRING_TYPE", "POST", "description_en");
$upd_tbl_secciones_categorias->setPrimaryKey("id_categoria", "NUMERIC_TYPE", "GET", "id_categoria");

// Make an instance of the transaction object
$del_tbl_secciones_categorias = new tNG_multipleDelete($conn_conne10);
$tNGs->addTransaction($del_tbl_secciones_categorias);
// Register triggers
$del_tbl_secciones_categorias->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_tbl_secciones_categorias->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$del_tbl_secciones_categorias->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_tbl_secciones_categorias->setTable("tbl_secciones_categorias");
$del_tbl_secciones_categorias->setPrimaryKey("id_categoria", "NUMERIC_TYPE", "GET", "id_categoria");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rstbl_secciones_categorias = $tNGs->getRecordset("tbl_secciones_categorias");
$row_rstbl_secciones_categorias = mysql_fetch_assoc($rstbl_secciones_categorias);
$totalRows_rstbl_secciones_categorias = mysql_num_rows($rstbl_secciones_categorias);
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
<script type="text/javascript" src="../../includes/wdg/classes/RestrictedTextArea.js"></script>
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
    <?php
	echo $tNGs->getErrorMsg();
?>
    <div class="KT_tng">
      <h1>
        <?php 
// Show IF Conditional region1 
if (@$_GET['id_categoria'] == "") {
?>
          <?php echo NXT_getResource("Insert_FH"); ?>
          <?php 
// else Conditional region1
} else { ?>
          <?php echo NXT_getResource("Update_FH"); ?>
          <?php } 
// endif Conditional region1
?>
Secciones » Categorías</h1>
      <div class="KT_tngform">
        <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" enctype="multipart/form-data" id="form1">
          <?php $cnt1 = 0; ?>
          <?php do { ?>
            <?php $cnt1++; ?>
            <?php 
// Show IF Conditional region1 
if (@$totalRows_rstbl_secciones_categorias > 1) {
?>
              <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
              <?php } 
// endif Conditional region1
?>
            <table cellpadding="2" cellspacing="0" class="KT_tngtable">
              <tr>
                <td class="KT_th"><label for="seccion_<?php echo $cnt1; ?>">Seccion:</label></td>
                <td><select name="seccion_<?php echo $cnt1; ?>" id="seccion_<?php echo $cnt1; ?>">
                  <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
                  <?php 
do {  
?>
                  <option value="<?php echo $row_Recordset1['id_seccion']?>"<?php if ($row_Recordset1['id_seccion']==$row_rstbl_secciones_categorias['seccion']) {echo "SELECTED";} ?>><?php echo $row_Recordset1['nombre_es']?></option>
                  <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
                </select>
                  <?php echo $tNGs->displayFieldError("tbl_secciones_categorias", "seccion", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="estatus_<?php echo $cnt1; ?>">Publicar:</label></td>
                <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rstbl_secciones_categorias['estatus']),"1"))) {echo "checked";} ?> type="checkbox" name="estatus_<?php echo $cnt1; ?>" id="estatus_<?php echo $cnt1; ?>" value="1" />
                  <?php echo $tNGs->displayFieldError("tbl_secciones_categorias", "estatus", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="orden_<?php echo $cnt1; ?>">Orden:</label></td>
                <td><input type="text" name="orden_<?php echo $cnt1; ?>" id="orden_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstbl_secciones_categorias['orden']); ?>" size="7" />
                  <?php echo $tNGs->displayFieldHint("orden");?> <?php echo $tNGs->displayFieldError("tbl_secciones_categorias", "orden", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="imagen_<?php echo $cnt1; ?>">Imagen:</label></td>
                <td><input type="file" name="imagen_<?php echo $cnt1; ?>" id="imagen_<?php echo $cnt1; ?>" size="32" />
                  <?php echo $tNGs->displayFieldError("tbl_secciones_categorias", "imagen", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="nombre_es_<?php echo $cnt1; ?>">Nombre:</label></td>
                <td><input type="text" name="nombre_es_<?php echo $cnt1; ?>" id="nombre_es_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstbl_secciones_categorias['nombre_es']); ?>" size="100" maxlength="250" />
                  <?php echo $tNGs->displayFieldHint("nombre_es");?> <?php echo $tNGs->displayFieldError("tbl_secciones_categorias", "nombre_es", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="contenido_es_<?php echo $cnt1; ?>">Contenido:</label></td>
                <td><textarea class="ckeditor" name="contenido_es_<?php echo $cnt1; ?>" id="contenido_es_<?php echo $cnt1; ?>" cols="100" rows="2"><?php echo KT_escapeAttribute($row_rstbl_secciones_categorias['contenido_es']); ?></textarea>
                  <script type="text/javascript">
	CKEDITOR.replace('contenido_es_<?php echo $cnt1; ?>', { filebrowserBrowseUrl: '../edfl/index.html'});
                </script>
                  <br />
                  <a href="../tool_uploadimg/simple_upload.php" target="_blank" rel="lyteframe" rev="width: 320px; height: 300px; scrolling: no;"><img src="../images/subirimagen.png" alt="Subir Imagen" width="120" height="30" border="0" /></a> <?php echo $tNGs->displayFieldHint("contenido_es");?> <?php echo $tNGs->displayFieldError("tbl_secciones_categorias", "contenido_es", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="keywords_es_<?php echo $cnt1; ?>">Keywords:</label></td>
                <td><textarea name="keywords_es_<?php echo $cnt1; ?>" cols="100" rows="2" id="keywords_es_<?php echo $cnt1; ?>" wdg:subtype="RestrictedTextArea" wdg:type="widget" wdg:maxchars="200" wdg:showcount="true" wdg:showmessage="false"><?php echo KT_escapeAttribute($row_rstbl_secciones_categorias['keywords_es']); ?></textarea>
                  <?php echo $tNGs->displayFieldHint("keywords_es");?> <?php echo $tNGs->displayFieldError("tbl_secciones_categorias", "keywords_es", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="description_es_<?php echo $cnt1; ?>">Description:</label></td>
                <td><textarea name="description_es_<?php echo $cnt1; ?>" cols="100" rows="2" id="description_es_<?php echo $cnt1; ?>" wdg:subtype="RestrictedTextArea" wdg:type="widget" wdg:maxchars="200" wdg:showcount="true" wdg:showmessage="false"><?php echo KT_escapeAttribute($row_rstbl_secciones_categorias['description_es']); ?></textarea>
                  <?php echo $tNGs->displayFieldHint("description_es");?> <?php echo $tNGs->displayFieldError("tbl_secciones_categorias", "description_es", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="nombre_en_<?php echo $cnt1; ?>">Name:</label></td>
                <td><input type="text" name="nombre_en_<?php echo $cnt1; ?>" id="nombre_en_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstbl_secciones_categorias['nombre_en']); ?>" size="100" />
                  <?php echo $tNGs->displayFieldHint("nombre_en");?> <?php echo $tNGs->displayFieldError("tbl_secciones_categorias", "nombre_en", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="contenido_en_<?php echo $cnt1; ?>">Content:</label></td>
                <td><textarea class="ckeditor" name="contenido_en_<?php echo $cnt1; ?>" id="contenido_en_<?php echo $cnt1; ?>" cols="100" rows="2"><?php echo KT_escapeAttribute($row_rstbl_secciones_categorias['contenido_en']); ?></textarea>
<script type="text/javascript">
	CKEDITOR.replace('contenido_en_<?php echo $cnt1; ?>', { filebrowserBrowseUrl: '../edfl/index.html'});
                </script>
                  <br />
                  <a href="../tool_uploadimg/simple_upload.php" target="_blank" rel="lyteframe" rev="width: 320px; height: 300px; scrolling: no;"><img src="../images/subirimagen.png" alt="Subir Imagen" width="120" height="30" border="0" /></a> <?php echo $tNGs->displayFieldHint("contenido_en");?> <?php echo $tNGs->displayFieldError("tbl_secciones_categorias", "contenido_en", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="keywords_en_<?php echo $cnt1; ?>">Keywords:</label></td>
                <td><textarea name="keywords_en_<?php echo $cnt1; ?>" cols="100" rows="2" id="keywords_en_<?php echo $cnt1; ?>" wdg:subtype="RestrictedTextArea" wdg:type="widget" wdg:maxchars="200" wdg:showcount="true" wdg:showmessage="false"><?php echo KT_escapeAttribute($row_rstbl_secciones_categorias['keywords_en']); ?></textarea>
                  <?php echo $tNGs->displayFieldHint("keywords_en");?> <?php echo $tNGs->displayFieldError("tbl_secciones_categorias", "keywords_en", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="description_en_<?php echo $cnt1; ?>">Description:</label></td>
                <td><textarea name="description_en_<?php echo $cnt1; ?>" cols="100" rows="2" id="description_en_<?php echo $cnt1; ?>" wdg:subtype="RestrictedTextArea" wdg:type="widget" wdg:maxchars="200" wdg:showcount="true" wdg:showmessage="false"><?php echo KT_escapeAttribute($row_rstbl_secciones_categorias['description_en']); ?></textarea>
                  <?php echo $tNGs->displayFieldHint("description_en");?> <?php echo $tNGs->displayFieldError("tbl_secciones_categorias", "description_en", $cnt1); ?></td>
              </tr>
            </table>
            <input type="hidden" name="kt_pk_tbl_secciones_categorias_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rstbl_secciones_categorias['kt_pk_tbl_secciones_categorias']); ?>" />
            <?php } while ($row_rstbl_secciones_categorias = mysql_fetch_assoc($rstbl_secciones_categorias)); ?>
          <div class="KT_bottombuttons">
            <div>
              <?php 
      // Show IF Conditional region1
      if (@$_GET['id_categoria'] == "") {
      ?>
                <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
                <?php 
      // else Conditional region1
      } else { ?>
                <div class="KT_operations">
                  <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'id_categoria')" />
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
  show_as_grid: false,
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
