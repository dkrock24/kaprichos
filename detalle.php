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

    if( isset( $_POST['country'] ) )
    {
        
        $_SESSION['country'] = $_SESSION['moneda']; 
    }
    else
    {
        if(!isset($_SESSION['lan']))
        {        
            $_SESSION['country'] = $monedas['503'];
        }else{
            $_SESSION['country'] ;
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


$colname_rselarreglo = "-1";
if (isset($_GET['id'])) {
  $colname_rselarreglo = $_GET['id'];
}

mysql_select_db($database_conne10, $conne10);
$query_rselarreglo = sprintf("SELECT p.*, c.nombre_es as categoria2 FROM tbl_productos as p
join tbl_productos_categorias as c on p.categoria=c.id_categoria WHERE p.estatus='1' AND p.id_producto = %s", GetSQLValueString($colname_rselarreglo, "int"));
$rselarreglo = mysql_query($query_rselarreglo, $conne10) or die(mysql_error());
$row_rselarreglo = mysql_fetch_assoc($rselarreglo);
$totalRows_rselarreglo = mysql_num_rows($rselarreglo);



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
            <a href="categoria.php?c=<?php echo $row_rselarreglo['categoria']; ?>" class="list-group-item list-group-item-action" style="background: #D82787;color: white;font-size: 14px;">
                
                <span class="badge-pill"><h4><i class="fa fa-arrow-circle-left"></i> <?php echo $row_rselarreglo['categoria2']; ?> / <?php echo $row_rselarreglo['nombre_es']; ?> </h4></span>
            </a>
          </div>

          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">

            </div>
          </div>  

        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <img src="uploaded/mod_productos/<?php echo $row_rselarreglo['imagen'];?>" width="90%">
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <table class="table">                    
                    <tr>
                        <td><h4><?php echo $messages['precio']; ?></h4></td>
                        <td><h2><?php 
                                                  echo $_SESSION['country'];
                                                  if($_SESSION['country'] == '$'){                       
                                                      echo number_format($row_rselarreglo['numerico1'],2);  
                                                  }else{
                                                      echo number_format($row_rselarreglo['numerico2'],2);     
                                                  }
                                                ?> </h2><?php echo $messages['card']; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php echo $row_rselarreglo['contenido1_es'];?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p><?php echo $messages['keyword']; ?>: <?php echo $row_rselarreglo['keywords_es']; ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td><h4><?php echo $messages['descripction']; ?></h4></td>
                        <td><?php echo $row_rselarreglo['introduccion_es'];?></td>
                    </tr>
                    <tr> 
                        <td colspan="2">
                            <a class="btn btn-success" href="formcomprar.php?product_id=<?php echo $row_rselarreglo['customnum']; ?>&productname=<?php echo $row_rselarreglo['nombre_es']; ?>" rel="lyteframe" rev="width: 500px; height: 500px; scrolling: yes;" style="width: 100%;"><i class="fa fa-money"> </i> <?php echo $messages['buy']; ?></a>
                        </td>
                    </tr>

                    <!--
                    <form action="#" method="post">
                    <tr>
                        <td><h4>Descripción</h4></td>
                        <td><?php echo $row_rselarreglo['introduccion_es'];?></td>
                    </tr>
                    <tr>
                        <td><h4>Precio</h4></td>
                        <td><h2>$<?php echo $row_rselarreglo['numerico1'];?></h2></td>
                    </tr>
                    <tr>
                        <td><h4>De</h4></td>
                        <td><input type="text" name="de" class="form-control" placeholder="Remitente" required="true"></td>
                    </tr>
                    <tr>
                        <td><h4>Para</h4></td>
                        <td><input type="text" name="para" class="form-control" placeholder="Destinatario" required="true"></td>
                    </tr>
                    <tr>
                        <td><h4>Mensaje</h4></td>
                        <td><textarea class="form-control" required="true"></textarea></td>
                    </tr>
                    <tr>
                        <td><h4>Fecha de Entrega</h4></td>
                        <td><input type="date" name="fecha" required="true"></td>
                    </tr>
                    <tr>
                        <td>                            
                            <h4>Cantidad</h4>
                        </td>
                        <td>
                            <input type="number" name="cantidad" min="1" value="1"  class="form-control" width="10%">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                                <input type="hidden" name="cmd" value="_cart" />
                                <input type="hidden" name="add" value="1" /> 
                                <input type="hidden" name="w3ls_item" value="<?php echo $row_rselarreglo['nombre_es']; ?> " /> 
                                <input type="hidden" name="amount" value="<?php echo $row_rselarreglo['numerico1']; ?> " /> 
                                <button type="submit" class="btn btn-primary" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </td>
                    </tr>
                    -->
                    <tr>
                        <td colspan="2">
                            <span style="font-size: 12px;">

                                <?php echo $messages['2checkout']; ?>

                            </span>
                        </td>
                    </tr>
                    </form> 
                </table>
            </div>
        </div>        
        </div>
    </div>
</div>


<?php include "template/footer.php"; ?>
  <!-- cart-js -->
  <link href="css/lytebox.css" rel="stylesheet" type="text/css" />
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

