<?php require_once('../../Connections/conne10.php'); ?>
<?php
// Load the common classes
require_once('../../includes/common/KT_common.php');

// Load the tNG classes
require_once('../../includes/tng/tNG.inc.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../../");

// Make unified connection variable
$conn_conne10 = new KT_connection($conne10, $database_conne10);

//start Trigger_CheckPasswords trigger
//remove this line if you want to edit the code by hand
function Trigger_CheckPasswords(&$tNG) {
  $myThrowError = new tNG_ThrowError($tNG);
  $myThrowError->setErrorMsg("Passwords do not match.");
  $myThrowError->setField("password");
  $myThrowError->setFieldErrorMsg("The two passwords do not match.");
  return $myThrowError->Execute();
}
//end Trigger_CheckPasswords trigger

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("username", true, "text", "", "", "", "");
$formValidation->addField("password", true, "text", "", "", "", "");
$formValidation->addField("email", true, "text", "email", "", "", "");
$formValidation->addField("nivel", true, "numeric", "int", "", "", "");
$tNGs->prepareValidation($formValidation);
// End trigger

// Make an insert transaction instance
$userRegistration = new tNG_insert($conn_conne10);
$tNGs->addTransaction($userRegistration);
// Register triggers
$userRegistration->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$userRegistration->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$userRegistration->registerTrigger("END", "Trigger_Default_Redirect", 99, "{kt_login_redirect}");
$userRegistration->registerConditionalTrigger("{POST.password} != {POST.re_password}", "BEFORE", "Trigger_CheckPasswords", 50);
// Add columns
$userRegistration->setTable("tbl_users");
$userRegistration->addColumn("username", "STRING_TYPE", "POST", "username");
$userRegistration->addColumn("password", "STRING_TYPE", "POST", "password");
$userRegistration->addColumn("email", "STRING_TYPE", "POST", "email");
$userRegistration->addColumn("nivel", "NUMERIC_TYPE", "POST", "nivel");
$userRegistration->addColumn("pnombre", "STRING_TYPE", "POST", "pnombre");
$userRegistration->addColumn("snombre", "STRING_TYPE", "POST", "snombre");
$userRegistration->addColumn("apellidos", "STRING_TYPE", "POST", "apellidos");
$userRegistration->setPrimaryKey("id_user", "NUMERIC_TYPE");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rstbl_users = $tNGs->getRecordset("tbl_users");
$row_rstbl_users = mysql_fetch_assoc($rstbl_users);
$totalRows_rstbl_users = mysql_num_rows($rstbl_users);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
        <?php include("submenu.php"); ?>
    <!-- InstanceEndEditable --></div>
    </td>
    <td valign="top"><!-- InstanceBeginEditable name="WBCMSMAIN" -->
    <?php
	echo $tNGs->getErrorMsg();
?>
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <tr>
          <td class="KT_th"><label for="username">Username:</label></td>
          <td><input type="text" name="username" id="username" value="<?php echo KT_escapeAttribute($row_rstbl_users['username']); ?>" size="32" />
              <?php echo $tNGs->displayFieldHint("username");?> <?php echo $tNGs->displayFieldError("tbl_users", "username"); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="password">Password:</label></td>
          <td><input type="password" name="password" id="password" value="" size="32" />
              <?php echo $tNGs->displayFieldHint("password");?> <?php echo $tNGs->displayFieldError("tbl_users", "password"); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="re_password">Re-type Password:</label></td>
          <td><input type="password" name="re_password" id="re_password" value="" size="32" />
          </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="email">Email:</label></td>
          <td><input type="text" name="email" id="email" value="<?php echo KT_escapeAttribute($row_rstbl_users['email']); ?>" size="32" />
              <?php echo $tNGs->displayFieldHint("email");?> <?php echo $tNGs->displayFieldError("tbl_users", "email"); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="nivel">Nivel:</label></td>
          <td><select name="nivel" id="nivel">
              <option value="1" <?php if (!(strcmp(1, KT_escapeAttribute($row_rstbl_users['nivel'])))) {echo "SELECTED";} ?>>1</option>
              <option value="2" <?php if (!(strcmp(2, KT_escapeAttribute($row_rstbl_users['nivel'])))) {echo "SELECTED";} ?>>2</option>
              <option value="3" <?php if (!(strcmp(3, KT_escapeAttribute($row_rstbl_users['nivel'])))) {echo "SELECTED";} ?>>3</option>
            </select>
              <?php echo $tNGs->displayFieldError("tbl_users", "nivel"); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="pnombre">Primer nombre:</label></td>
          <td><input type="text" name="pnombre" id="pnombre" value="<?php echo KT_escapeAttribute($row_rstbl_users['pnombre']); ?>" size="32" />
              <?php echo $tNGs->displayFieldHint("pnombre");?> <?php echo $tNGs->displayFieldError("tbl_users", "pnombre"); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="snombre">Segundo nombre:</label></td>
          <td><input type="text" name="snombre" id="snombre" value="<?php echo KT_escapeAttribute($row_rstbl_users['snombre']); ?>" size="32" />
              <?php echo $tNGs->displayFieldHint("snombre");?> <?php echo $tNGs->displayFieldError("tbl_users", "snombre"); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="apellidos">Apellidos:</label></td>
          <td><input type="text" name="apellidos" id="apellidos" value="<?php echo KT_escapeAttribute($row_rstbl_users['apellidos']); ?>" size="32" />
              <?php echo $tNGs->displayFieldHint("apellidos");?> <?php echo $tNGs->displayFieldError("tbl_users", "apellidos"); ?> </td>
        </tr>
        <tr class="KT_buttons">
          <td colspan="2"><input type="submit" name="KT_Insert1" id="KT_Insert1" value="Register" />
          </td>
        </tr>
      </table>
    </form>
    <p>&nbsp;</p>
    <!-- InstanceEndEditable --></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
