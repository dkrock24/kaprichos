<?php require_once('../../Connections/conne10.php'); ?>
<?php
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
$formValidation->addField("nombre_es", true, "text", "", "", "", "");
$formValidation->addField("nombre_en", true, "text", "", "", "", "");
$tNGs->prepareValidation($formValidation);
// End trigger

// Make an insert transaction instance
$ins_tbl_audios_cats = new tNG_multipleInsert($conn_conne10);
$tNGs->addTransaction($ins_tbl_audios_cats);
// Register triggers
$ins_tbl_audios_cats->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_tbl_audios_cats->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_tbl_audios_cats->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$ins_tbl_audios_cats->setTable("tbl_audios_cats");
$ins_tbl_audios_cats->addColumn("estatus", "CHECKBOX_1_0_TYPE", "POST", "estatus", "1");
$ins_tbl_audios_cats->addColumn("orden", "NUMERIC_TYPE", "POST", "orden", "99");
$ins_tbl_audios_cats->addColumn("nombre_es", "STRING_TYPE", "POST", "nombre_es");
$ins_tbl_audios_cats->addColumn("nombre_en", "STRING_TYPE", "POST", "nombre_en");
$ins_tbl_audios_cats->setPrimaryKey("id_categoria", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_tbl_audios_cats = new tNG_multipleUpdate($conn_conne10);
$tNGs->addTransaction($upd_tbl_audios_cats);
// Register triggers
$upd_tbl_audios_cats->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_tbl_audios_cats->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_tbl_audios_cats->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$upd_tbl_audios_cats->setTable("tbl_audios_cats");
$upd_tbl_audios_cats->addColumn("estatus", "CHECKBOX_1_0_TYPE", "POST", "estatus");
$upd_tbl_audios_cats->addColumn("orden", "NUMERIC_TYPE", "POST", "orden");
$upd_tbl_audios_cats->addColumn("nombre_es", "STRING_TYPE", "POST", "nombre_es");
$upd_tbl_audios_cats->addColumn("nombre_en", "STRING_TYPE", "POST", "nombre_en");
$upd_tbl_audios_cats->setPrimaryKey("id_categoria", "NUMERIC_TYPE", "GET", "id_categoria");

// Make an instance of the transaction object
$del_tbl_audios_cats = new tNG_multipleDelete($conn_conne10);
$tNGs->addTransaction($del_tbl_audios_cats);
// Register triggers
$del_tbl_audios_cats->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_tbl_audios_cats->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$del_tbl_audios_cats->setTable("tbl_audios_cats");
$del_tbl_audios_cats->setPrimaryKey("id_categoria", "NUMERIC_TYPE", "GET", "id_categoria");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rstbl_audios_cats = $tNGs->getRecordset("tbl_audios_cats");
$row_rstbl_audios_cats = mysql_fetch_assoc($rstbl_audios_cats);
$totalRows_rstbl_audios_cats = mysql_num_rows($rstbl_audios_cats);
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
        Categorías</h1>
      <div class="KT_tngform">
        <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
          <?php $cnt1 = 0; ?>
          <?php do { ?>
            <?php $cnt1++; ?>
            <?php 
// Show IF Conditional region1 
if (@$totalRows_rstbl_audios_cats > 1) {
?>
              <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
              <?php } 
// endif Conditional region1
?>
            <table cellpadding="2" cellspacing="0" class="KT_tngtable">
              <tr>
                <td class="KT_th"><label for="estatus_<?php echo $cnt1; ?>">Publicar:</label></td>
                <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rstbl_audios_cats['estatus']),"1"))) {echo "checked";} ?> type="checkbox" name="estatus_<?php echo $cnt1; ?>" id="estatus_<?php echo $cnt1; ?>" value="1" />
                  <?php echo $tNGs->displayFieldError("tbl_audios_cats", "estatus", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="orden_<?php echo $cnt1; ?>">Orden:</label></td>
                <td><input type="text" name="orden_<?php echo $cnt1; ?>" id="orden_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstbl_audios_cats['orden']); ?>" size="7" />
                  <?php echo $tNGs->displayFieldHint("orden");?> <?php echo $tNGs->displayFieldError("tbl_audios_cats", "orden", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="nombre_es_<?php echo $cnt1; ?>">Nombre:</label></td>
                <td><input type="text" name="nombre_es_<?php echo $cnt1; ?>" id="nombre_es_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstbl_audios_cats['nombre_es']); ?>" size="50" maxlength="200" />
                  <?php echo $tNGs->displayFieldHint("nombre_es");?> <?php echo $tNGs->displayFieldError("tbl_audios_cats", "nombre_es", $cnt1); ?></td>
              </tr>
              <tr>
                <td class="KT_th"><label for="nombre_en_<?php echo $cnt1; ?>">Name:</label></td>
                <td><input type="text" name="nombre_en_<?php echo $cnt1; ?>" id="nombre_en_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rstbl_audios_cats['nombre_en']); ?>" size="50" maxlength="200" />
                  <?php echo $tNGs->displayFieldHint("nombre_en");?> <?php echo $tNGs->displayFieldError("tbl_audios_cats", "nombre_en", $cnt1); ?></td>
              </tr>
            </table>
            <input type="hidden" name="kt_pk_tbl_audios_cats_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rstbl_audios_cats['kt_pk_tbl_audios_cats']); ?>" />
            <?php } while ($row_rstbl_audios_cats = mysql_fetch_assoc($rstbl_audios_cats)); ?>
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
    <!-- InstanceEndEditable --></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
