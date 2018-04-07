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


$maxRows_rsvideos = 25;
$pageNum_rsvideos = 0;
if (isset($_GET['pageNum_rsvideos'])) {
  $pageNum_rsvideos = $_GET['pageNum_rsvideos'];
}
$startRow_rsvideos = $pageNum_rsvideos * $maxRows_rsvideos;

$colname_rsvideos = "-1";
if (isset($_GET['categoria'])) {
  $colname_rsvideos = $_GET['categoria'];
}
mysql_select_db($database_conne10, $conne10);
$query_rsvideos ="SELECT * FROM tbl_videos ";
$query_limit_rsvideos = sprintf("%s LIMIT %d, %d", $query_rsvideos, $startRow_rsvideos, $maxRows_rsvideos);
$rsvideos = mysql_query($query_limit_rsvideos, $conne10) or die(mysql_error());
$row_rsvideos = mysql_fetch_assoc($rsvideos);

if (isset($_GET['totalRows_rsvideos'])) {
  $totalRows_rsvideos = $_GET['totalRows_rsvideos'];
} else {
  $all_rsvideos = mysql_query($query_rsvideos);
  $totalRows_rsvideos = mysql_num_rows($all_rsvideos);
}
$totalPages_rsvideos = ceil($totalRows_rsvideos/$maxRows_rsvideos)-1;

$colname_rslacategoria = "-1";
if (isset($_GET['categoria'])) {
  $colname_rslacategoria = $_GET['categoria'];
}
mysql_select_db($database_conne10, $conne10);
$query_rslacategoria = "SELECT * FROM tbl_videos_cats";
$rslacategoria = mysql_query($query_rslacategoria, $conne10) or die(mysql_error());
$row_rslacategoria = mysql_fetch_assoc($rslacategoria);
$totalRows_rslacategoria = mysql_num_rows($rslacategoria);

$colname_rselvideo = "-1";
if (isset($_GET['video'])) {
  $colname_rselvideo = $_GET['video'];
}
mysql_select_db($database_conne10, $conne10);
$query_rselvideo = sprintf("SELECT * FROM tbl_videos WHERE id_video = %s", GetSQLValueString($colname_rselvideo, "int"));
$rselvideo = mysql_query($query_rselvideo, $conne10) or die(mysql_error());
$row_rselvideo = mysql_fetch_assoc($rselvideo);
$totalRows_rselvideo = mysql_num_rows($rselvideo);

$queryString_rsvideos = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsvideos") == false && 
        stristr($param, "totalRows_rsvideos") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsvideos = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rsvideos = sprintf("&totalRows_rsvideos=%d%s", $totalRows_rsvideos, $queryString_rsvideos);

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("uploaded/mod_videos/");
$objDynamicThumb1->setRenameRule("{rsvideos.imagen}");
$objDynamicThumb1->setResize(120, 120, true);
$objDynamicThumb1->setWatermark(false);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include"template/header.php"; ?>

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
            <table width="100%" border="0" cellspacing="10" cellpadding="0">
                <tr>

                    <td valign="top"><!-- InstanceBeginEditable name="MAIN" -->
                        <div id="navbar"><a href="index.php">Inicio</a> &gt; <a href="videos.php">Videos</a> &gt; <a href="?categoria=<?php echo $row_rslacategoria['id_categoria']; ?>"><?php echo $row_rslacategoria['nombre_es']; ?></a>
                            <?php if(isset($_GET['video'])) { ?>
                                &gt; <a href="?categoria=<?php echo $row_rselvideo['categoria']; ?>&amp;video=<?php echo $row_rselvideo['id_video']; ?>"><?php echo $row_rselvideo['nombre_es']; ?></a>
                            <?php } ?>
                        </div>
                        <?php if(!isset($_GET['video'])) { ?>
                        <div id="v_catalogo">
                        <?php do { ?>
                            <div class="videobox">
                                <div class="video"><a href="?categoria=<?php echo $row_rsvideos['categoria']; ?>&amp;video=<?php echo $row_rsvideos['id_video']; ?>" title="<?php echo $row_rsvideos['nombre_es']; ?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" alt="<?php echo $row_rsvideos['nombre_es']; ?>" border="0" class="boxshadow" /></a></div>
                                    <div class="info">
                                        <h2><?php echo $row_rsvideos['nombre_es']; ?></h2>
                                        <p><?php echo $row_rsvideos['sinopsis_es']; ?></p>
                                    </div>
                                </div>
                        <?php } while ($row_rsvideos = mysql_fetch_assoc($rsvideos)); ?>
  <div class="clear"></div>
  <table width="100%" border="0" cellpadding="5" cellspacing="0">
    <tr>
      <td width="80" align="center"><?php if ($pageNum_rsvideos > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_rsvideos=%d%s", $currentPage, 0, $queryString_rsvideos); ?>" class="navbuttongral">Inicio</a>
          <?php } // Show if not first page ?></td>
      <td width="80" align="center"><?php if ($pageNum_rsvideos > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_rsvideos=%d%s", $currentPage, max(0, $pageNum_rsvideos - 1), $queryString_rsvideos); ?>" class="navbuttongral">« Anteriores</a>
          <?php } // Show if not first page ?></td>
      <td align="center">&nbsp;<?php echo ($startRow_rsvideos + 1) ?> al <?php echo min($startRow_rsvideos + $maxRows_rsvideos, $totalRows_rsvideos) ?> de <?php echo $totalRows_rsvideos ?></td>
      <td width="80" align="center"><?php if ($pageNum_rsvideos < $totalPages_rsvideos) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_rsvideos=%d%s", $currentPage, min($totalPages_rsvideos, $pageNum_rsvideos + 1), $queryString_rsvideos); ?>" class="navbuttongral">Siguientes »</a>
          <?php } // Show if not last page ?></td>
      <td width="80" align="center"><?php if ($pageNum_rsvideos < $totalPages_rsvideos) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_rsvideos=%d%s", $currentPage, $totalPages_rsvideos, $queryString_rsvideos); ?>" class="navbuttongral">Final</a>
          <?php } // Show if not last page ?></td>
    </tr>
  </table>
  <div class="clear"></div>
</div>
<div class="clear"></div>
<?php } else { ?>
<div id="v_visualizar">
  <h2><?php echo $row_rselvideo['nombre_es']; ?></h2>
  <div class="videoscreen"><?php echo $row_rselvideo['codigo']; ?></div>
  <div class="videosinopsis"><?php echo $row_rselvideo['sinopsis_es']; ?></div>
</div>
<div class="clear"></div>
<?php } ?>
<!-- InstanceEndEditable --></td>
      </tr>
    </table>
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

<!-- /.Modal Detalle de Producto -->
  <div class="modal fade" id="detalle_producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header" style="background-color: #0480be; border-radius:3px 3px 0px 0px;">
        <button type="button" class="close" style="color:white;" data-dismiss="modal" aria-hidden="true">×</button>
        
        <h1 style="text-align: center"><img src="images/flores-para-el-salvador.png" width="20%" /></h1>
        <h4 class="modal-title" id="myModalLabel" style="text-align: center; color:white;"><span class="txtTitleModel"></span></h4>
      </div> <!-- /.modal-header -->

      <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12" style="text-align: center">
                    <img src="" id="imgModalDetalle" width="80%" />
                </div>
            </div>
                  
      </div> <!-- /.modal-body -->

    <div class="modal-footer">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-12" style="text-align: center">                
                <a class="btn btn-success btn-md" href="#"><i class="fa fa-cart-arrow-down"></i> <?php echo $messages['cAdd']; ?></a>  
            </div>
        </div>     
    </div> <!-- /.modal-footer -->

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->