<?php
//MX Widgets3 include
require_once('includes/wdg/WDG.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wdg="http://ns.adobe.com/addt">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kapricho's Floristería</title>
<style type="text/css">
<!--
body,td,th {
	font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #666;
}
body {
	margin-left: 10px;
	margin-top: 10px;
	margin-right: 10px;
	margin-bottom: 10px;
}
#nombre_destinatario, #nombre_remitente, #fecha_entrega, #direccion_entrega, #dedicatoria {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #666;
	background-color: #EEEEEE;
	padding: 4px;
	border: 1px solid #CCC;
	-moz-border-radius: 6px;
	-webkit-border-radius: 6px;
	border-radius: 6px;
	width: 250px;
}
h1 {
	font-size: 24px;
	font-weight: normal;
	color: #C60;
}
-->
</style>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="includes/common/js/sigslot_core.js"></script>
<script src="includes/common/js/base.js" type="text/javascript"></script>
<script src="includes/common/js/utility.js" type="text/javascript"></script>
<script type="text/javascript" src="includes/wdg/classes/MXWidgets.js"></script>
<script type="text/javascript" src="includes/wdg/classes/MXWidgets.js.php"></script>
<script type="text/javascript" src="includes/wdg/classes/Calendar.js"></script>
<script type="text/javascript" src="includes/wdg/classes/SmartDate.js"></script>
<script type="text/javascript" src="includes/wdg/calendar/calendar_stripped.js"></script>
<script type="text/javascript" src="includes/wdg/calendar/calendar-setup_stripped.js"></script>
<script src="includes/resources/calendar.js"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
<form action="https://sandbox.2checkout.com/checkout/purchase" method="post" name="form-comprar" target="_blank" id="form-comprar">

  <table width="100%" border="0" cellspacing="0" cellpadding="5" class="">
    <tr>  
      <td colspan="2">
        <h1 style="text-align: center"><img src="images/flores-para-el-salvador.png" width="30%" /></h1>
      </td>
    </tr>
    <tr>
      <td colspan="2"><h1 style="text-align: center">Compra de arreglo <?php echo $_GET['productname']; ?></h1></td>
    </tr>
    <tr>
      <td colspan="2"><h5 style="text-align: center; color:red;">Pedido Para El Pais de 
        <?php if($_SESSION['country'] == '$'){ echo "El Salvador"; }else{ echo "Guatemala"; }  ?></h5></td>
    </tr>
    <tr>
      <td width="140" style="text-align: right;">Para quién va el arreglo </td>
      <td><span id="sprytextfield1">
        <input type="text" name="nombre_destinatario" id="nombre_destinatario" class="form-control" />
      <span class="textfieldRequiredMsg">Campo requerido.</span></span></td>
    </tr>
    <tr>
      <td style="text-align: right;">Quién envía el arreglo</td>
      <td><span id="sprytextfield2">
        <input type="text" name="nombre_remitente" id="nombre_remitente" />
      <span class="textfieldRequiredMsg">Campo requerido.</span></span></td>
    </tr>
    <tr>
      <td style="text-align: right;">Fecha de entrega</td>
      <td><input name="fecha_entrega" id="fecha_entrega" style="width: 100px;" value="" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:mondayfirst="true" wdg:type="widget" wdg:singleclick="true" wdg:restricttomask="yes" /></td>
    </tr>
    <tr>
      <td style="text-align: right;">Dirección</td>
      <td><span id="sprytextarea1">
        <textarea name="direccion_entrega" id="direccion_entrega" cols="45" rows="4"></textarea>
      <span class="textareaRequiredMsg">Campo requerido.</span></span></td>
    </tr>
    <tr>
      <td style="text-align: right;">Dedicatoria</td>
      <td><span id="sprytextarea2">
      <textarea name="dedicatoria" id="dedicatoria" cols="45" rows="4"></textarea>
      <span class="textareaRequiredMsg">Campo requerido.</span><span class="textareaMaxCharsMsg">Excede los 200 caracteres.</span></span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
            <input type='hidden' name='sid' value='901379331'>
            <input type='hidden' name='quantity' value='1'>
            <input type='hidden' name='product_id' value='2'>
            <?php
              if($_SESSION['country'] == '$')
              {                  
                ?><input type='hidden' name='currency_code' value='USD'><?php
              }
              else
              {
                ?><input type='hidden' name='currency_code' value='GTQ'><?php
              }
            ?>
            <input type='hidden' name='lang' value='es_la'>            
            <input name='submit' type='submit' value='Comprar' >
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><span style="font-size: 10px;">2CheckOut.com Inc.  is an authorized retailer for goods and services provided by Kapricho's Floristeria.</span></td>
    </tr>
  </table>
</form>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {hint:"Nombre del destinatario"});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {hint:"Nombre del remitente"});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {hint:"Direcci\xF3n donde se entregar\xE1"});
var sprytextarea2 = new Spry.Widget.ValidationTextarea("sprytextarea2", {hint:"No mayor a 200 caracteres", maxChars:200});
//-->
</script>
</body>
</html>


