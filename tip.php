<?php require_once('Connections/conne10.php'); ?>
<?php
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
$query_rscategorias = "SELECT id_categoria, nombre_es FROM tbl_productos_categorias WHERE estatus = 1 ORDER BY orden ASC";
$rscategorias = mysql_query($query_rscategorias, $conne10) or die(mysql_error());
$row_rscategorias = mysql_fetch_assoc($rscategorias);
$totalRows_rscategorias = mysql_num_rows($rscategorias);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/kaprichos01.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Tips - Floristeria Kaprichos</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<meta name="Description" content="descripcion" />
<meta name="Keywords" content="keywords" />
<link type='text/css' href='css/osx.css' rel='stylesheet' media='screen' />
<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style2 {color: #000000}
-->
</style>
<!-- InstanceEndEditable -->
<meta name="language" content="es" />
<meta name="author" content="Rodolfo Semsch - www.wboxinteractive.com" />
<meta name="robots" content="INDEX, FOLLOW" />
<meta name="revisit-after" content="15 days" />
<meta name="Reply-to" content="rodolfo@wboxinteractive.com" />
<meta name="document-rights" content="Copyrighted Work" />
<meta name="document-type" content="Web Page" />
<meta name="document-rating" content="General" />
<meta name="document-distribution" content="Global" />
<meta name="document-state" content="Dynamic" />
<meta name="cache-control" content="Public" />
<link href="css/layoutcss.css" rel="stylesheet" type="text/css" />
<link href="css/globalcss.css" rel="stylesheet" type="text/css" />
<link href="css/lytebox.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="Scripts/lytebox.js"></script>
<style type="text/css">
<!--
#logotipo {
	position:absolute;
	width:222px;
	height:112px;
	z-index:1;
	left: 10px;
	top: 10px;
}
#Facebook {
	position:absolute;
	width:120px;
	height:28px;
	z-index:2;
	left: 550px;
	top: 19px;
}
#facebooktxt {
	position:absolute;
	width:111px;
	height:53px;
	z-index:3;
	left: 555px;
	top: 53px;
}
#buscador {
	position:absolute;
	width:186px;
	height:26px;
	z-index:1;
	left: 786px;
	top: 6px;
}
#buscatxt {
	position:absolute;
	width:55px;
	height:21px;
	z-index:2;
	left: 731px;
	top: 9px;
}
#contactoheader {
	position:absolute;
	width:252px;
	height:97px;
	z-index:4;
	left: 281px;
	top: 17px;
}
-->
</style>
</head>

<body>
<div id="layout_wrapper">
  <div id="layout_header">
    <div id="logotipo"><a href="index.php"><img src="images/flores-para-el-salvador.png" width="222" height="112" alt="Kapricho's Floristería - Flores para El Salvador" border="0" /></a></div>
    <div id="Facebook"><a href="http://www.facebook.com/pages/Kaprichos-Floristeria/151224814917493" target="_blank"><img src="images/boton-facebook.png" width="120" height="28" alt="Visítenos en Facebook" border="0"/></a></div>
    <div id="facebooktxt"><a href="http://www.facebook.com/pages/Kaprichos-Floristeria/151224814917493" target="_blank">Siguenos en Facebook y encuentra promociones y precios exclusivos para nuestros fans</a></div>
    <div id="contactoheader"><img src="images/numero.png" border="0"><br />
       <a href="mailto:info@kaprichosfloristeria.com" style="font-size:14px; color:#5E6332;; line-height:18px;"><strong>info@kaprichosfloristeria.com</strong></a><br />
    <span style="color:#D82686; font-size: 12px; line-height:22px;"><strong>Entregas a domicilio en todo El Salvador</strong></span></div>
  </div>
  <div id="layout_menu">
    <div id="buscador">
      <form id="formbuscar" name="formbuscar" method="post" action="resultados.php">
          <div id="inputkeyword">
            <input type="text" name="eltermino" id="eltermino" style="border:none; width:145px" />
          </div>
          <div id="botonbuscar">
            <input type="image" name="clicktosearch" id="clicktosearch" src="images/buscar-flores-el-salvador.png" />
          </div>
      </form>
    </div>
    <div id="buscatxt">Buscar:</div>
    <ul class="menuppal">
      <li><a href="catalogo.php">Catálogo</a></li>
      <li><a href="ofertas.php">Ofertas</a></li>
      <li><a href="preguntas.php">Preguntas</a></li>
      <li><a href="pago.php">¿Cómo pagar?</a></li>
      <li><a href="servicios.php">Servicios</a></li>
      <li><a href="tip.php">Tips</a></li>
      <li><a href="contacto.php">Contáctenos</a></li>
      <li><a href="videos.php">Videos</a></li>
    </ul>
  </div>
  <div id="layout_content">
    <table width="100%" border="0" cellspacing="10" cellpadding="0">
      <tr>
        <td width="170" valign="top"><div id="subcategorias">
          <h1>Arreglos florales para<br/> El Salvador</h1>
          <ul id="categorias">
            <?php do { ?>
              <li><a href="categoria.php?c=<?php echo $row_rscategorias['id_categoria']; ?>"><?php echo $row_rscategorias['nombre_es']; ?></a></li>
              <?php } while ($row_rscategorias = mysql_fetch_assoc($rscategorias)); ?>
          </ul>
        </div></td>
        <td valign="top"><!-- InstanceBeginEditable name="MAIN" -->
		<h1>Tips</h1>
<div id="textoimg">
       <div id="tipimagen">
       <img src="images/flor.gif" width="150" height="142" /></div>
      <strong>Cuidado de las Flores</strong>
       <p>Las  flores deben ser mantenidas en un ambiente fresco y lejos de la luz directa del  sol. Evita colocarlas cerca de fuentes que emitan calor y protégelas de los  cambios bruscos de temperatura y de las corrientes de aire.</p>
               <p> Con una tijera de jardinería corta cerca de dos centímetros y medio del extremo  de cada tallo. El corte se debe hacer diagonalmente. En el caso de que el tallo  tenga uniones (codos), como por ejemplo el clavel, el corte debe hacerse sobre  o bajo la unión. Es ideal que el corte se haga bajo agua. Una vez efectuado el  corte y que la flor tenga la temperatura ambiente, colócalas en un recipiente  con agua.
         El cambio de agua del recipiente debe ser  diario, cortando del tallo las hojas que estén en contacto con el agua, para  evitar que estas se pudran.</p>
         <p>Tanto  el agua como las flores pueden tener una vida útil más larga de lo esperado,  algunos de estos cuidados son:<br />
         En  época de verano se colocan en el florero cubos de hielo, para que la flor dure  más tiempo fresca.</p>
        <div id="textoimg2">
       <div id="tipimagen2">
       <img src="images/color.jpg" width="130" height="84" /></div>
      <strong>Significado del color de las flores</strong><div align="right"></div>
           <ul>
           <li><span class="style2"><strong>Blanco:</strong></span> Pureza, inocencia, la perfección, la esperanza.</li>
           <li><span class="style2"><strong>Rojo:</strong></span> Amor, pasión,  deseo,  romance.</li>
           <li><strong>Blanco y Rojo:</strong> Unión, amor eterno.</li>
           <li><span class="style2"><strong>Rosado:</strong></span> Romance, dulzura, alegría, representan la ingenuidad, bondad,  ternura, buen sentimiento y ausencia de todo mal.</li>
          <li> <span class="style2"><strong>Amarillo:</strong></span> Amistad, alegría, felicidad. Es el color de la luz.</li>
          <li> <strong>Amarillo y Rojo:</strong> Enamoramiento, el inicio de un nuevo romance. El  amarillo simboliza su amistad actual y el rojo indica que deseas avanzar hacia  una nueva relación.</li>
          <li> <strong>Naranja:</strong> Fascinación, calor y felicidad.</li>
          <li> <strong>Melocotón salmón:</strong> Sabiduría, gratitud y  reconocimiento.</li>
           <li><strong>Verde:</strong> Armonía, la fecundidad, la riqueza, esperanza, deseo, descanso  y  equilibrio.</li>
          <li> <strong>Azul:</strong> La estabilidad, la confianza, tranquilidad, confianza, reserva,  armonía, afecto, amistad, fidelidad y amor.</li>
           <li><strong>Morado:</strong> Calma, autocontrol, dignidad, aristocracia, nobleza. Un color  perfecto para un amor de mucho tiempo.</li>
        
         </ul> 
       
      </div>
           <p><strong>Significado de las Flores </strong></p>
          
      <div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0">A</li>
    <li class="TabbedPanelsTab" tabindex="0">B</li>
    <li class="TabbedPanelsTab" tabindex="0">C</li>
    <li class="TabbedPanelsTab" tabindex="0">D</li>
    <li class="TabbedPanelsTab" tabindex="0">E</li>
    <li class="TabbedPanelsTab" tabindex="0">F</li>
    <li class="TabbedPanelsTab" tabindex="0">G</li>
    <li class="TabbedPanelsTab" tabindex="0">H</li>
    <li class="TabbedPanelsTab" tabindex="0">I</li>
    <li class="TabbedPanelsTab" tabindex="0">J</li>
    <li class="TabbedPanelsTab" tabindex="0">L</li>
    <li class="TabbedPanelsTab" tabindex="0">M</li>
    <li class="TabbedPanelsTab" tabindex="0">N</li>
    <li class="TabbedPanelsTab" tabindex="0">O</li>
    <li class="TabbedPanelsTab" tabindex="0">P</li>
    <li class="TabbedPanelsTab" tabindex="0">R</li>
    <li class="TabbedPanelsTab" tabindex="0">S</li>
    <li class="TabbedPanelsTab" tabindex="0">T</li>
    <li class="TabbedPanelsTab" tabindex="0">V</li>
    <li class="TabbedPanelsTab" tabindex="0">Z</li>
   </ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent">
<ul><li>ABEDUL Docilidad</li>
<li>ABETO Fortuna</li>
<li>ACACIA BLANCA O ROSADA Elegancia y amistad</li>
<li>ACACIA AMARILLA Amor secreto</li>
<li>ACANTO Artes</li>
<li>ACEDERA Paciencia</li> 
<li>ACONITO Buscas mi muerte</li>
<li>ADELFA Seducción </li>
<li>ADONIS Recuerdos amorosos</li>
<li>ADORMIDERA Consuelo</li> 
<li>AGUILEÑA Adolescencia </li>
<li>ALAMO Lamentación</li>
<li>ALBAHACA Aborrecimiento</li>
<li>ALHELI AMARILLO Fidelidad en la adversidad</li>
<li>ALHELI ENCARNADO Belleza duradera</li>
<li>ALMENDRO Indiscreción</li>
<li>ALMIZCLE Debilidad</li> 
<li>ALTRAMUZ Veracidad</li>
<li>AMAPOLA ROJA Consuelo</li>
<li>AMAPOLA BLANCA Sueño</li>
<li>AMARILIS Coquetería. Belleza espléndida</li>
<li>AMBROSIA La vuelta del amor</li>
<li>ANEMONA Abandono</li>
<li>ANEMONA SILVESTRE Hastío</li>
<li>ANTHURIUM Sexualidad ardiente y exotismo</li>
<li>AQUILEA Tiranía</li> 
<li>ARCE Reserva </li>
<li>ARO MANCHADO Ardor</li>
<li>ASTER Aceptar sentimientos, variedad</li>
<li>AVELLANO Reconciliación </li>
<li>AZAFRAN Conocimiento del exceso</li>
<li>AZAHAR Orgullo, pureza, perdurabilidad</li>
<li>AZALEA Templanza</li>
<li>AZUCENA Corazón inocente</li></ul>
</div>
    <div class="TabbedPanelsContent"><ul><li>BEGONIA Cordialidad</li>
<li>BELLADONA Sinceridad</li>
<li>BETONICA Sorpresa</li>
<li>BOCA DE DRAGON Presunción</li></ul>
</div>
   <div class="TabbedPanelsContent"><ul><li>CALENDULA Inquietud, calmaré tus penas</li>
<li>CAMPANILLA DE INVIERNO Esperanza</li>
<li>CAMPANULA Coquetería</li>
<li>CAPUCHINA Obediencia</li>
<li>CAPILLO BLANCO DE ROSA Inocente en amor</li>
<li>CAPULLO ROJO DE ROSA Pureza</li>
<li>CLAVEL AMARILLO Desdén</li>
<li>CLAVEL ESTRIADO Rechazo</li>
<li>CLAVEL ROJO Corazónq ue suspira</li>
<li>CALAVEL DEL POETA Galantería</li>
<li>CARDO LANUDO Desquite</li>
<li>CENTAUREA Felicidad</li>
<li>CICLAMEN Desconfianza</li>
<li>CINCOENRAMA Afecto maternal</li>
<li>CLAVEL SILVESTRE Amor de mujer</li>
<li>CLEMATIDE Belleza de alma</li>
<li>CORREHUELA Humildad</li>
<li>CORREHUELA MAYOR Insinuación</li>
<li>CRISANTEMO AMARILLO Amor desdeñado</li>
<li>CRISANTEMO BLANCO Sinceridad</li>
<li>CRISANTEMO ROJO Te quiero</li></ul>
</div>
   <div class="TabbedPanelsContent"><ul><li>DALIA Inestabilidad</li>
<li>DIOMORPHOTECA Celo, cuidado</li>
<li>DONDIEGO Esperanzas perdidas</li></ul>
</div>
    <div class="TabbedPanelsContent"><ul><li>EBANO FALSO Abandonado</li>
<li>EGLANTINA Quien te quiere te hará llorar</li>
<li>ENEBRO Afecto duradero</li>
<li>ESCABIOSA Viudez</li>
<li>ESPLIEGO Fervor</li>
<li>EUPATORIO Gratitud</li></ul>
</div>
    <div class="TabbedPanelsContent"><ul><li>FARFARA Ha de hacerse justicia</li>
<li>PAROLILLO Agradecimiento</li>
<li>FLOR DE AZAHAR Castidad</li>
<li>FLOR DE CIRUELO Mantén tu promesa</li>
<li>FLOR DE CUCLILLO Ingenio</li>
<li>FLOR DE LIS Llama</li>
<li>FLOR DE MANZANO Preferencia</li>
<li>FRITILLARIA Majestad</li>
<li>FUCSIA Gusto</li></ul>
</div>
    <div class="TabbedPanelsContent"><ul><li>GENCIANA Eres injusta</li>
<li>GERANIO ESCARLATA Consuelo</li>
<li>GERANIO OSCURO Melancolía</li>
<li>GERANIO TRAPADOR Favor de la novia</li>
<li>GERANIO ROSA Preferencia</li>
<li>GIRASOL Adoración</li>
<li>GLICINIA Me aferro a ti</li>
<li>GLADIOLO De genio vio, cita amorosa</li>
<li>GUISANTE DE OLOR Partida</li></ul>
</div>
    <div class="TabbedPanelsContent"><ul><li>HELENIO Lágrimas</li>
<li>HELIOTROPO Devoción. Deseo de amistad</li>
<li>HIERBA CENTELLA Deseo de riqueza</li>
<li>HIERBA DE SAN ANTONIO Pretensión</li>
<li>HIEDRA Fidelidad matrimonio</li>
<li>HINOJO Fuerza</li>
<li>HIPERICO Animosidad</li>
<li>HISOPO Limpieza</li>
<li>HOJA DE LAUREL Cambiaré, pero después de muerto</li>
<li>HORTENSIA Capricho</li></ul>
</div>
    <div class="TabbedPanelsContent"><ul><li>IMPATIENS Impaciencia</li>
<li>IRIS AZUL Noticias placenteras</li>
<li>IRIS BLANCO Esperanza</li></ul>
</div>
    <div class="TabbedPanelsContent"><ul><li>JACINTO Constancia</li>
<li>JAZMIN BLANCO Amabilidad, apego</li>
<li>JUNQUILLO OLOROSO Deseo de que vuelva el afecto</li></ul>
</div>
      <div class="TabbedPanelsContent"><ul><li>LAGRIMA Agitación</li>
<li>LAUREL Gloria</li>
<li>LILA Humildad</li>
<li>LIRIO Saludos</li>
<li>LIRIO DEL VALLE Vuelta de la felicidad</li>
<li>LOTO Elocuencia</li>
<li>LUNARIA Sinceridad</li></ul>
</div>
    <div class="TabbedPanelsContent"><ul><li>MADRESELVA Lazos de amor</li>
<li>MAGNOLIA Amor a la naturaleza, simpatía</li>
<li>MALVA REAL Ambición</li>
<li>MALVA SILVESTRE Apacibilidad</li>
<li>MARGARITA ¿Me amas?</li>
<li>MENBRILLO Tentación</li>
<li>MENTA Virtud</li>
<li>MIMOSA Alegría juvenil</li>
<li>MIRTO Verdadero amor</li>
<li>MUERDAGO Supero mis dificultades</li></ul>
</div>
   <div class="TabbedPanelsContent"><ul><li>NARCISO Egoísm</li>o
<li>NEGUILLA Gentileza</li>
<li>NENUFAR Pureza de corazón</li>
<li>NOMEOLVIDES No me olvides</li></ul>
</div>
   <div class="TabbedPanelsContent"><ul><li>OLIVO Paz</li>
<li>ORNITHOGALUM Inspiración</li> 
<li>ORQUIDEA Una belleza</li>
<li>ORTIGA Eres cruel</li></ul>
</div>
    <div class="TabbedPanelsContent"><ul><li>PAJA ROTA Compromiso roto</li>
<li>PAJA SIN ROMPER Unión</li>
<li>PENSAMIENTO Recuerdo</li>
<li>PEONIA Veracidad</li>
<li>PETUNIA Me alivias</li>
<li>PHLOX Unanimidad</li>
<li>POLYANTHUS Confianza</li>
<li>PRIMAVERA Gracia</li>
<li>PULSATILA No puedes pretender nada</li></ul>
</div>
    <div class="TabbedPanelsContent"><ul><li>RANUNCULO Ingratitud</li>
<li>RODODENDRO Peligro</li>
<li>ROMERO Recuerdo</li>
<li>ROSA Amor</li>
<li>ROSA AMARILLA Debilitamiento del amor, celos</li>
<li>ROSA BLANCA Soy digno de ti</li>
<li>ROSA BLANCA Y ROJA Mezcla de sentimiento</li>
<li>ROSA CANINA Gozo y dolor</li>
<li>ROSA DE NAVIDAD Alivia mi ansiedad</li>
<li>ROSA ROJA Belleza</li>
<li>ROSA SIN ESPINAS Sin miedo</li>
<li>ROSA SOLA Inocencia</li></ul>
</div>
    <div class="TabbedPanelsContent"><ul><li>SABINA Socorro</li>
<li>SALVIA Virtud doméstica</li>
<li>SAUCE RASTRERO Amor no correspondido</li>
<li>SAUCE LLORON Aflicción</li>
<li>SAUCO Fervor</li>
<li>SILENE GALLICA Amor joven</li></ul>
</div>
    <div class="TabbedPanelsContent"><ul><li>TALLO DE TRIGO ENTERO Acuerdo</li>
<li>TALLO DE TRIGO ROTO Disputa</li>
<li>TAMARISCO Crimen</li>
<li>TEJO Pesadumbre</li>
<li>TOMILLO Constancia</li>
<li>TRAGAPAN Miramiento, caballerosidad</li>
<li>TREBOL Venganza</li>
<li>TREBOL BLANCO Piensa en mí</li>
<li>TREBOL DE CUATRO HOJAS Sé mío</li>
<li>TREBOL ROJO Industria</li>
<li>TRINITARIA Perplegidad</li>
<li>TULIPAN AMARILLO Amor sin esperanza</li>
<li>TULIPAN ROJO Declaración de amor</li></ul>
</div>
    <div class="TabbedPanelsContent"><ul><li>VALERIANA Facilidad de adaptación</li>
<li>VARA DE ORO Animo</li>
<li>VERBENA Encanto</li>
<li>VERONICA Fidelidad</li>
<li>VIBORERA Falsedad</li>
<li>VINPERVINCA Amistad</li>
<li>VIOLETA AZUL Confianza</li>
<li>VIOLETA DE OLOR Modestia</li></ul>
</div>
    <div class="TabbedPanelsContent"><ul><li>ZINNIA Recuerdo de los amigos ausentes</li> </ul></div>

</div>
</div>
</div>
<script type="text/javascript">
<!--
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
//-->
</script> 

        <!-- InstanceEndEditable --></td>
      </tr>
    </table>
  </div>
  <div id="layout_footer">
    <table width="100%" border="0" cellspacing="0" cellpadding="10">
      <tr>
        <td width="222"><img src="images/logo-kaprichos-footer.png" width="222" height="112" alt="Kapricho's Floristería en El Salvador" /></td>
        <td><h2>Arreglos Florales a domicilio en El Salvador</h2>
        <p>Kapricho´s  Floristería nació con el objetivo de   brindar arreglos florales innovadores, especializándonos en actualizar  constantemente todos aquellos detalles que hacen su arreglo diferente. En  Kapricho´s Floristería nos esmeramos porque sus sentimientos sean expresados  con especial cuidado y garantizamos cubrir las expectativas.<br/>
Todos nuestros  arreglos son elaborados con materia prima de alta calidad, entre las clases de  arreglos que le ofrecemos, tenemos: Frutales, primaverales, tropicales,  orquídeas, globos sorpresa, chocolates, etc. Para toda ocasión, cumpleaños,  felicitaciones, amistad, recuperación.<br />
También, nos  ponemos a su disposición para cualquier tipo de evento, bodas, primera  comunión, mesas de Honor, Baby shower  decoraciones de salones, eventos de gobierno, Decoración de iglesias, etc. En  donde le ofrecemos calidad, bajos costos y un alto sentido de responsabilidad.<br/>
Ofrecemos nuestro  servicio los siete días a la semana, por lo que, nos encontramos a su  disposición en aquellos momentos inesperados y donde usted desea expresarse a  través de un lindo detalle.</p></td>
      </tr>
      <tr>
      <td colspan="2" align="center">
       <ul class="menuppal">
      <li><a href="catalogo.php">Catálogo</a></li>
      <li><a href="ofertas.php">Ofertas</a></li>
      <li><a href="preguntas.php">Preguntas</a></li>
      <li><a href="pago.php">¿Cómo pagar?</a></li>
      <li><a href="servicios.php">Servicios</a></li>
      <li><a href="tip.php">Tips</a></li>
      <li><a href="contacto.php">Contáctenos</a></li>
      <li><a href="videos.php">Videos</a></li>
      <li><a href="politicas.php">Politicas de Reembolso</a></li>
    </ul>
      </td>      
      </tr>
      <tr>
        <td colspan="2" align="center"><p><a href="http://www.2checkout.com/" target="_blank" style="color:#FFF; text-decoration:underline;">2Checkout.com</a>, Inc. is an authorized retailer of kaprichosfloristeria.com<br />
        <img src="images/2cocc05.gif" width="182" height="46" /></p></td>
      </tr>
    </table>
  </div>
</div>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($rscategorias);
?>
