<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #333333;
}
body {
	margin-left: 10px;
	margin-top: 10px;
	margin-right: 10px;
	margin-bottom: 10px;
	background-color: #FFFFFF;
}
input {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
}
h1 {
	font-family: "Arial Narrow", Arial, Verdana;
	font-size: 18px;
	color: #006699;
}
-->
</style>
</head>

<body>
<?php
$idir = "../../userfiles/imagenes/";   // Path To Images Directory
$tdir = "../../userfiles/imagenes/";   // Path To Thumbnails Directory
$twidth = $_POST['eltamanio'];   // Maximum Width For Thumbnail Images
$theight = $_POST['eltamanio'];   // Maximum Height For Thumbnail Images

if (!isset($_GET['subpage'])) {   // Image Upload Form Below   ?>
<form method="post" action="simple_upload.php?subpage=upload" enctype="multipart/form-data">
<table width="300" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td colspan="2" align="center"><h1>Subir y Optimizar Imagen</h1></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><label><strong>Por favor seleccione la imágen a subir:</strong><br />
      <input type="file" name="imagefile">
      </label>    </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><strong>Medida Deseada:</strong>
      <label></label>
      <label></label>
      [<a href="../images/tablamedidas.gif" target="_blank">Ver muestra</a>]
      <br />    </td>
  </tr>
  <tr>
    <td width="50%" valign="top"><label>
      <input type="radio" name="eltamanio" value="15" id="eltamanio_0" />
Icono (15px)</label>
      <br />
      <label>
      <input type="radio" name="eltamanio" value="120" id="eltamanio_1" />
Mini (120px)</label>
      <br />
      <label>
      <input type="radio" name="eltamanio" value="250" id="eltamanio_2" />
Pequeña (250px)</label></td>
    <td width="50%" valign="top"><label>
      <input type="radio" name="eltamanio" value="500" id="eltamanio_3" />
Mediana (500px)</label>
      <br />
      <label>
      <input type="radio" name="eltamanio" value="800" id="eltamanio_4" />
Grande (800px)</label></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input name="submit" type="submit" value="Subir imagen y optimizar" class="form"></td>
  </tr>
</table>
</form>
<? } else  if (isset($_GET['subpage']) && $_GET['subpage'] == 'upload') {   // Uploading/Resizing Script
  $url = $_FILES['imagefile']['name'];   // Set $url To Equal The Filename For Later Use
  if ($_FILES['imagefile']['type'] == "image/jpg" || $_FILES['imagefile']['type'] == "image/jpeg" || $_FILES['imagefile']['type'] == "image/pjpeg" || $_FILES['imagefile']['type'] == "image/pjpg") {
    $file_ext = strrchr($_FILES['imagefile']['name'], '.');   // Get The File Extention In The Format Of , For Instance, .jpg, .gif or .php
    $copy = copy($_FILES['imagefile']['tmp_name'], "$idir" . $_FILES['imagefile']['name']);   // Move Image From Temporary Location To Permanent Location
    if ($copy) {   // If The Script Was Able To Copy The Image To It's Permanent Location
      print 'La imagen se subio con éxito.<br />';   // Was Able To Successfully Upload Image
      $simg = imagecreatefromjpeg("$idir" . $url);   // Make A New Temporary Image To Create The Thumbanil From
      $currwidth = imagesx($simg);   // Current Image Width
      $currheight = imagesy($simg);   // Current Image Height
      if ($currheight > $currwidth) {   // If Height Is Greater Than Width
         $zoom = $twidth / $currheight;   // Length Ratio For Width
         $newheight = $theight;   // Height Is Equal To Max Height
         $newwidth = $currwidth * $zoom;   // Creates The New Width
      } else {    // Otherwise, Assume Width Is Greater Than Height (Will Produce Same Result If Width Is Equal To Height)
        $zoom = $twidth / $currwidth;   // Length Ratio For Height
        $newwidth = $twidth;   // Width Is Equal To Max Width
        $newheight = $currheight * $zoom;   // Creates The New Height
      }
      $dimg = imagecreate($newwidth, $newheight);   // Make New Image For Thumbnail
      imagetruecolortopalette($simg, false, 256);   // Create New Color Pallete
      $palsize = ImageColorsTotal($simg);
      for ($i = 0; $i < $palsize; $i++) {   // Counting Colors In The Image
       $colors = ImageColorsForIndex($simg, $i);   // Number Of Colors Used
       ImageColorAllocate($dimg, $colors['red'], $colors['green'], $colors['blue']);   // Tell The Server What Colors This Image Will Use
      }
      imagecopyresized($dimg, $simg, 0, 0, 0, 0, $newwidth, $newheight, $currwidth, $currheight);   // Copy Resized Image To The New Image (So We Can Save It)
      imagejpeg($dimg, "$tdir" . $url);   // Saving The Image
      imagedestroy($simg);   // Destroying The Temporary Image
      imagedestroy($dimg);   // Destroying The Other Temporary Image
      print 'Imagen optimizada. Ahora puede cerrar esta ventana o <a href="javascript:history.back();">Ingresar una nueva</a>';   // Resize successful
    } else {
      print '<font color="#FF0000">ERROR: Unable to upload image.</font>';   // Error Message If Upload Failed
    }
  } else {
    print '<font color="#FF0000">ERROR: Wrong filetype (has to be a .jpg or .jpeg. Yours is ';   // Error Message If Filetype Is Wrong
    print $file_ext;   // Show The Invalid File's Extention
    print '.</font>';
  }
} ?>

</body>
</html>
