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

// Bsuqueda
$KTColParam1_rsarreglos1 = "...";
if (isset($_POST["eltermino"])) {
  $KTColParam1_rsarreglos1 = $_POST["eltermino"];
}
$KTColParam2_rsarreglos1 = "...";
if (isset($_POST["eltermino"])) {
  $KTColParam2_rsarreglos1 = $_POST["eltermino"];
}
mysql_select_db($database_conne10, $conne10);
$query_rsarreglos1 = sprintf("SELECT tbl_productos.id_producto, tbl_productos.nombre_es, tbl_productos.imagen, tbl_productos.numerico1, tbl_productos.numerico2, tbl_productos.keywords_es, tbl_productos.description_es FROM tbl_productos WHERE tbl_productos.estatus=1 AND (tbl_productos.keywords_es LIKE %s OR tbl_productos.description_es LIKE %s) ORDER BY tbl_productos.fecha DESC, tbl_productos.orden ASC ", GetSQLValueString("%" . $KTColParam1_rsarreglos1 . "%", "text"),GetSQLValueString("%" . $KTColParam2_rsarreglos1 . "%", "text"));
$rsarreglos1 = mysql_query($query_rsarreglos1, $conne10) or die(mysql_error());

//echo "/*".$query_rsarreglos1;

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
            <li class="list-group-item d-flex justify-content-between align-items-center" style="background: #D82787;color: white;font-size: 14px;">
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
            <a href="#" class="list-group-item list-group-item-action" style="background: #D82787;color:white; font-size: 14px;">
              <span class="badge-pill"><h4><?php echo $KTColParam1_rsarreglos1; ?></h4></span>
            </a>
          </div>


        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">


                <?php 
                  $buscar = array(" ", "(", ")");
                  $reempla = array("%20", "%28", "%29");

                  while($row_rsarreglos1 = mysql_fetch_array($rsarreglos1)){
                    list($width, $height, $type, $attr) = @getimagesize("uploaded/mod_productos/".str_replace($buscar, $reempla, $row_rsarreglos1['imagen']));
                    
    ?>                  
                    <div class="col-md-3 product-left"  style=""> 
                        <div class="p-one simpleCart_shelfItem jwe" style="width: 100%;margin: 0 auto;" >                         
                                <a href="#">
                                    <img src="<?php if($width >= $height) { ?><?php echo str_replace($buscar, $reempla, $objDynamicThumb2->Execute()); ?><?php } if($width < $height) { ?><?php echo str_replace($buscar, $reempla, $objDynamicThumb1->Execute()); ?><?php } ?>" alt="" class="img-responsive" style="height: 200px;" />
                                    <div class="mask">
                                        <a href="uploaded/mod_productos/<?php echo $row_rsarreglos1['imagen'];?>" rel="lytebox[galera]" class="btn btn-default btn-sm detalleModal" href="#" rel="lytebox[galera]" title="<?php echo $row_rsarreglos1['nombre_es']; ?>" precio="<?php echo number_format($row_rsarreglos1['numerico1'],2); ?>"><i class="fa fa-search"></i> <?php echo $messages['QuickView']; ?></a>
                                    </div>
                                </a>
                            <div class="product-left-cart">
                                <div class="">                                    
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <a href="arreglos-ver.php?id=<?php echo $row_rsarreglos1['id_producto']; ?>"><?php echo $row_rsarreglos1['nombre_es']; ?>
                                        </div>
                                    </div>   

                                    <div class="row" style="">
                                        <div class="col-sm-12 col-md-4">
                                            <h3>
                                              <span class="precio">
                                                <?php 
                                                  echo $_SESSION['country'];
                                                  if($_SESSION['country'] == '$'){                       
                                                      echo number_format($row_rsarreglos1['numerico1'],2);  
                                                  }else{
                                                      echo number_format($row_rsarreglos1['numerico2'],2);     
                                                  }
                                                ?>                                                  
                                              </span>                                                       
                                            </h3>
                                            
                                        </div>
                                        <div class="col-sm-12 col-md-8">
                                            <a style="width: 100%;" class="btn btn-info btn-sm" href="detalle.php?id=<?php echo $row_rsarreglos1['id_producto']; ?>"><i class="fa fa-cart-arrow-down"></i> <?php echo $messages['cAdd']; ?></a>  
                                        </div>
                                    </div>                                     
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </div>

    
                <?php
                    }
                ?>
                                
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