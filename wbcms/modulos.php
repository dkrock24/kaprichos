<?php include_once("config.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/wbcms01.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Gestor de Contenidos WB/CMS. Por WebBox Interactive</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
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
<link href="css/lytebox.css" rel="stylesheet" type="text/css" />
<link href="css/wbcmscss01.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="ed/ckeditor.js"></script>
<script type="text/javascript" src="Scripts/lytebox.js"></script>
</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" background="images/headerbg.jpg" id="header">
  <tr>
    <td height="50"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="bottom" style="padding-left: 15px;"><img src="images/wbcms.png" alt="WB/CMS" width="133" height="36" /></td>
        <td align="right" valign="bottom" style="padding-right: 15px;"><a href="http://www.wboxinteractive.com" target="_blank"><img src="images/developeby.png" alt="Desarrollado por WebBox Interactive" width="222" height="11" border="0" /></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="35"><ul>
      <li><a href="index.php">INICIO</a></li>
      <!--<li><a href="../wbcms/mod_contenido/index.php">CONTENIDO</a></li>-->
      <li><a href="modulos.php">MÓDULOS</a></li>
      <li><a href="accesos.php">ACCESOS Y HERRAMIENTAS</a></li>
      <li><a href="soporte.php">SOPORTE</a></li>
    </ul></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td><!-- InstanceBeginEditable name="WBCMSMAIN" -->
      <?php if($mod_noticias == 1) { ?>
      <div class="modaccess" onclick="location.href='mod_noticias/index.php'">
        <table width="100%" border="0" cellspacing="0" cellpadding="3">
          <tr>
            <td height="75" align="center" valign="middle"><img src="images/icons/knewsticker.png" width="60" height="60" /></td>
          </tr>
          <tr>
            <td align="center" valign="top">Noticias</td>
          </tr>
        </table>
      </div>
      <?php } ?>
      <?php if($mod_directorio == 1) { ?>
      <div class="modaccess" onclick="location.href='mod_directorio/index.php'">
        <table width="100%" border="0" cellspacing="0" cellpadding="3">
          <tr>
            <td height="75" align="center" valign="middle"><img src="images/icons/directorio.png" width="60" height="60" /></td>
          </tr>
          <tr>
            <td align="center" valign="top">Directorio</td>
          </tr>
        </table>
      </div>
      <?php } ?>
      <?php if($mod_calendario == 1) { ?>
      <div class="modaccess" onclick="location.href='mod_calendario/index.php'">
        <table width="100%" border="0" cellspacing="0" cellpadding="3">
          <tr>
            <td height="75" align="center" valign="middle"><img src="images/icons/calendar.png" width="60" height="60" /></td>
          </tr>
          <tr>
            <td align="center" valign="top">Calendario</td>
          </tr>
        </table>
      </div>
      <?php } ?>
      <?php if($mod_documentos == 1) { ?>
      <div class="modaccess" onclick="location.href='mod_documentos/index.php'">
        <table width="100%" border="0" cellspacing="0" cellpadding="3">
          <tr>
            <td height="75" align="center" valign="middle"><img src="images/icons/documentos.png" width="60" height="60" /></td>
          </tr>
          <tr>
            <td align="center" valign="top">Documentos</td>
          </tr>
        </table>
      </div>
      <?php } ?>
      <?php if($mod_videos == 1) { ?>
      <div class="modaccess" onclick="location.href='mod_videos/index.php'">
        <table width="100%" border="0" cellspacing="0" cellpadding="3">
          <tr>
            <td height="75" align="center" valign="middle"><img src="images/icons/videos.png" width="60" height="60" /></td>
          </tr>
          <tr>
            <td align="center" valign="top">Videos</td>
          </tr>
        </table>
      </div>
      <?php } ?>
      <?php if($mod_audios == 1) { ?>
      <div class="modaccess" onclick="location.href='mod_audios/index.php'">
        <table width="100%" border="0" cellspacing="0" cellpadding="3">
          <tr>
            <td height="75" align="center" valign="middle"><img src="images/icons/audios.png" width="60" height="60" /></td>
          </tr>
          <tr>
            <td align="center" valign="top">Audios</td>
          </tr>
        </table>
      </div>
      <?php } ?>
      <?php if($mod_galeria == 1) { ?>
      <div class="modaccess" onclick="location.href='mod_galeria/index.php'">
        <table width="100%" border="0" cellspacing="0" cellpadding="3">
          <tr>
            <td height="75" align="center" valign="middle"><img src="images/icons/kview.png" width="60" height="60" /></td>
          </tr>
          <tr>
            <td align="center" valign="top">Galerías</td>
          </tr>
        </table>
      </div>
      <?php } ?>
      <?php if($mod_productos == 1) { ?>
      <div class="modaccess" onclick="location.href='mod_productos/index.php'">
        <table width="100%" border="0" cellspacing="0" cellpadding="3">
          <tr>
            <td height="75" align="center" valign="middle"><img src="images/icons/blocks.png" width="60" height="60" /></td>
          </tr>
          <tr>
            <td align="center" valign="top">Productos</td>
          </tr>
        </table>
      </div>
      <?php } ?>
       <?php if($mod_promociones == 1) { ?>
      <div class="modaccess" onclick="location.href='mod_promociones/index.php'">
        <table width="100%" border="0" cellspacing="0" cellpadding="3">
          <tr>
            <td height="75" align="center" valign="middle"><img src="images/icons/warehause.png" width="60" height="60" /></td>
          </tr>
          <tr>
            <td align="center" valign="top">Promociones</td>
          </tr>
        </table>
      </div>
      <?php } ?>
      <?php if($mod_usuarios == 1) { ?>
      <div class="modaccess" onclick="location.href='mod_usuarios/index.php'">
        <table width="100%" border="0" cellspacing="0" cellpadding="3">
          <tr>
            <td height="75" align="center" valign="middle"><img src="images/icons/usuarios.png" width="60" height="60" /></td>
          </tr>
          <tr>
            <td align="center" valign="top">Usuarios</td>
          </tr>
        </table>
      </div>
      <?php } ?>
      <?php if($mod_enlaces == 1) { ?>
      <div class="modaccess" onclick="location.href='mod_enlaces/index.php'">
        <table width="100%" border="0" cellspacing="0" cellpadding="3">
          <tr>
            <td height="75" align="center" valign="middle"><img src="images/icons/enlaces.png" width="60" height="60" /></td>
          </tr>
          <tr>
            <td align="center" valign="top">Enlaces</td>
          </tr>
        </table>
      </div>
      <?php } ?>
      <?php if($mod_publicidad == 1) { ?>
      <div class="modaccess" onclick="location.href='mod_publicidad/index.php'">
        <table width="100%" border="0" cellspacing="0" cellpadding="3">
          <tr>
            <td height="75" align="center" valign="middle"><img src="images/icons/publicidad.png" width="60" height="60" /></td>
          </tr>
          <tr>
            <td align="center" valign="top">Publicidad</td>
          </tr>
        </table>
      </div>
      <?php } ?>
      <!-- InstanceEndEditable --></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
