<?php    
    session_start();
    header('location=ok');
    if(isset( $_GET['lan'] ))
    {
        $_SESSION['lan'] = $_GET['lan'];
        
    }
    else
    {
        if(!isset($_SESSION['lan']))
        {        
            echo $_SESSION['lan'] = 'es';
        }
        
    }
    require("lan/".$_SESSION['lan'].'.php');
    //session_destroy();
?>
<?php
require_once('Connections/conne10.php');
mysql_select_db($database_conne10, $conne10);
$query_rscategoriasd = "SELECT c.id_categoria, c.nombre_es, COUNT(p.id_producto) as totalP
FROM tbl_productos_categorias as c
left join tbl_productos as p ON c.id_categoria=p.categoria
WHERE c.estatus = 1
group by p.categoria
ORDER BY c.orden ASC";
$rscategoriasd = mysql_query($query_rscategoriasd, $conne10) or die(mysql_error());
$row_rscategoriasd = mysql_fetch_assoc($rscategoriasd);
$totalRows_rscategoriasd = mysql_num_rows($rscategoriasd);
?>
<?php
require_once('includes/tng/tNG.inc.php');
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


$colname_rsthiscat = "-1";
if (isset($_GET['c'])) {
  $colname_rsthiscat = $_GET['c'];
}
mysql_select_db($database_conne10, $conne10);
$query_rsthiscat = sprintf("SELECT nombre_es FROM tbl_productos_categorias WHERE estatus='1' AND id_categoria = %s", GetSQLValueString($colname_rsthiscat, "int"));
$rsthiscat = mysql_query($query_rsthiscat, $conne10) or die(mysql_error());
$row_rsthiscat = mysql_fetch_assoc($rsthiscat);
$totalRows_rsthiscat = mysql_num_rows($rsthiscat);

$maxRows_rsarreglos1 = 16;
$pageNum_rsarreglos1 = 0;
if (isset($_GET['pageNum_rsarreglos1'])) {
  $pageNum_rsarreglos1 = $_GET['pageNum_rsarreglos1'];
}
$startRow_rsarreglos1 = $pageNum_rsarreglos1 * $maxRows_rsarreglos1;

mysql_select_db($database_conne10, $conne10);
$query_rsarreglos1 = "SELECT * FROM tbl_productos WHERE  estatus='1' AND tbl_productos.categoria='".$colname_rsthiscat."' ORDER BY tbl_productos.orden ASC";
$query_limit_rsarreglos1 = sprintf("%s LIMIT %d, %d", $query_rsarreglos1, $startRow_rsarreglos1, $maxRows_rsarreglos1);
$rsarreglos1 = mysql_query($query_limit_rsarreglos1, $conne10) or die(mysql_error());
$row_rsarreglos1 = mysql_fetch_assoc($rsarreglos1);
if (isset($_GET['totalRows_rsarreglos1'])) {
  $totalRows_rsarreglos1 = $_GET['totalRows_rsarreglos1'];
} else {
  $all_rsarreglos1 = mysql_query($query_rsarreglos1);
  $totalRows_rsarreglos1 = mysql_num_rows($all_rsarreglos1);
}
$totalPages_rsarreglos1 = ceil($totalRows_rsarreglos1/$maxRows_rsarreglos1)-1;

$queryString_rsarreglos1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsarreglos1") == false && 
        stristr($param, "totalRows_rsarreglos1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsarreglos1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rsarreglos1 = sprintf("&totalRows_rsarreglos1=%d%s", $totalRows_rsarreglos1, $queryString_rsarreglos1);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("uploaded/mod_productos/");
$objDynamicThumb1->setRenameRule("{rsarreglos1.imagen}");
$objDynamicThumb1->setResize(180, 0, true);
$objDynamicThumb1->setWatermark(false);

// Show Dynamic Thumbnail
$objDynamicThumb2 = new tNG_DynamicThumbnail("", "KT_thumbnail2");
$objDynamicThumb2->setFolder("uploaded/mod_productos/");
$objDynamicThumb2->setRenameRule("{rsarreglos1.imagen}");
$objDynamicThumb2->setResize(0, 200, true);
$objDynamicThumb2->setWatermark(false);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include"template/header.php"; ?>
<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />

</head>
<body>

  <script>
    $('#myModal88').modal('show');
  </script> 
  <!-- header -->
  <?php include"template/menu.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-3">
          <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center active">
                <?php echo $messages['categorias']; ?>
            </li>
            <?php do { ?>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="categoria.php?c=<?php echo $row_rscategoriasd['id_categoria']; ?>">
                  <?php echo $row_rscategoriasd['nombre_es']; ?>                    
                </a>
                <span class="badge badge-default badge-pill"><?php echo $row_rscategoriasd['totalP']; ?></span>
              </li>
            <?php } while ($row_rscategoriasd = mysql_fetch_assoc($rscategoriasd)); ?>    
          </ul>

        </div>
        <div class="col-sm-12 col-md-12 col-lg-9">
          <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">
              <span class="badge-pill"><h3><?php echo $messages['tipsL']; ?></h3></span>
            </a>
          </div>

            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="list-group">
                          <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                            <div class="d-flex w-100 justify-content-between">
                              <h4 class="mb-1"><?php echo $messages['cuidadoflores']; ?></h4>
                              
                            </div>                           
                            
                          </a>
                          <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                    <img src="images/flor.gif" style="text-align: right;">
                                </div>
                                <div class="col-sm-12 col-md-9 col-lg-9">
                                    <p class="mb-1"><i class="fa fa-asterisk" aria-hidden="true" style="text-align: justify;"></i> <?php echo $messages['cuidadoflores1']; ?></p>  

                                    <p class="mb-1"><i class="fa fa-asterisk" aria-hidden="true"></i> <?php echo $messages['cuidadoflores2']; ?></p>
                                     <p class="mb-1"> <i class="fa fa-asterisk" aria-hidden="true"></i> <?php echo $messages['cuidadoflores3']; ?></p> 
                                </div>
                                </div>                              
                                
                                
                            </div>                           
                            
                          </a>
                        </div>
                </div>
            </div>  


            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="list-group">
                          <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                            <div class="d-flex w-100 justify-content-between">
                              <h4 class="mb-1"><?php echo $messages['significadocolores']; ?></h4>
                              
                            </div>                           
                            
                          </a>
                          <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                    <img src="images/color.gif" style="text-align: right;">
                                </div>
                                <div class="col-sm-12 col-md-9 col-lg-9">
                                    <ul class="list-group">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <span class="style2"><strong>Blanco:</strong></span> Pureza, inocencia, la perfección, la esperanza.</li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center"><span class="style2"><strong>Rojo:</strong></span> Amor, pasión,  deseo,  romance.</li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center"><strong>Blanco y Rojo:</strong> Unión, amor eterno.</li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center"><span class="style2"><strong>Rosado:</strong></span> Romance, dulzura, alegría, representan la ingenuidad, bondad,  ternura, buen sentimiento y ausencia de todo mal.</li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center"> <span class="style2"><strong>Amarillo:</strong></span> Amistad, alegría, felicidad. Es el color de la luz.</li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center"> <strong>Amarillo y Rojo:</strong> Enamoramiento, el inicio de un nuevo romance. El  amarillo simboliza su amistad actual y el rojo indica que deseas avanzar hacia  una nueva relación.</li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center"> <strong>Naranja:</strong> Fascinación, calor y felicidad.</li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center"> <strong>Melocotón salmón:</strong> Sabiduría, gratitud y  reconocimiento.</li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center"><strong>Verde:</strong> Armonía, la fecundidad, la riqueza, esperanza, deseo, descanso  y  equilibrio.</li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center"> <strong>Azul:</strong> La estabilidad, la confianza, tranquilidad, confianza, reserva,  armonía, afecto, amistad, fidelidad y amor.</li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center"><strong>Morado:</strong> Calma, autocontrol, dignidad, aristocracia, nobleza. Un color  perfecto para un amor de mucho tiempo.</li>
                    
                                        </ul> 
                                </div>
                                </div>                              
                                
                                
                            </div>                           
                            
                          </a>
                        </div>
                </div>
            </div> 


            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="list-group">
                          <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                            <div class="d-flex w-100 justify-content-between">
                              <h4 class="mb-1">Significado de las Flores</h4>
                              
                            </div>                           
                            
                          </a>
                         
                        
                                    
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

var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");

</script> 

                                </div>
                                                            
                                
                                
                                                 
                            
                         
                        </div>
                </div>
            </div> 

       
        </div>
    </div>
</div>


<?php include "template/footer.php"; ?>
  <!-- cart-js -->
  <script src="assets/js/minicart.js"></script>
  <script>
        w3ls.render();

        w3ls.cart.on('w3sb_checkout', function (evt) {
          var items, len, i;

          if (this.subtotal() > 0) {
            items = this.items();

            for (i = 0, len = items.length; i < len; i++) {
              items[i].set('shipping', 0);
              items[i].set('shipping2', 0);
            }
          }
        });
    </script>  
  <!-- //cart-js -->  
  <!-- countdown.js --> 
  <script src="assets/js/jquery.knob.js"></script>
  <script src="assets/js/jquery.throttle.js"></script>
  <script src="assets/js/jquery.classycountdown.js"></script>
    <script>

      $(document).ready(function() {
        $('.detalleModal').click(function(){
            var imag = $(this).attr('id');
            $('.txtTitleModel').text($(this).attr('title')+" / $"+ $(this).attr('precio'));
            $("#imgModalDetalle").attr('src',imag);            
        });

        $('#countdown1').ClassyCountdown({
          end: '1388268325',
          now: '1387999995',
          labels: true,
          style: {
            element: "",
            textResponsive: .5,
            days: {
              gauge: {
                thickness: .10,
                bgColor: "rgba(0,0,0,0)",
                fgColor: "#1abc9c",
                lineCap: 'round'
              },
              textCSS: 'font-weight:300; color:#fff;'
            },
            hours: {
              gauge: {
                thickness: .10,
                bgColor: "rgba(0,0,0,0)",
                fgColor: "#05BEF6",
                lineCap: 'round'
              },
              textCSS: ' font-weight:300; color:#fff;'
            },
            minutes: {
              gauge: {
                thickness: .10,
                bgColor: "rgba(0,0,0,0)",
                fgColor: "#8e44ad",
                lineCap: 'round'
              },
              textCSS: ' font-weight:300; color:#fff;'
            },
            seconds: {
              gauge: {
                thickness: .10,
                bgColor: "rgba(0,0,0,0)",
                fgColor: "#f39c12",
                lineCap: 'round'
              },
              textCSS: ' font-weight:300; color:#fff;'
            }

          },
          onEndCallback: function() {
            console.log("Time out!");
          }
        });
      });
    </script>
  <!-- //countdown.js -->
  <!-- menu js aim -->
  <script src="assets/js/jquery.menu-aim.js"> </script>
  <script src="assets/js/main.js"></script> <!-- Resource jQuery -->

</body>

