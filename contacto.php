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
            $_SESSION['lan'] = 'es';
        }
        
    }
    require("lan/".$_SESSION['lan'].'.php');
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
        <div class="col-sm-12 col-md-12 col-lg-12">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center" style="background: #e4e4e4;color: black;border-color: #e4e4e4;">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <span class="badge badge-primary badge-pill">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <span style="font-size: 16px;">info@kaprichosfloristeria.com</span>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <span class="badge badge-primary badge-pill">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <span style="font-size: 16px;">kaprichosfloristeria@gmail.com</span>
                                </div>
                            </div>  
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="row">
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <span class="badge badge-primary badge-pill">
                                        <i class="fa fa-phone"></i> +503
                                    </span>
                                    <span style="font-size: 16px;">2223-3515</span>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <span class="badge badge-primary badge-pill">
                                        <i class="fa fa-phone"></i> +503
                                    </span>
                                    <span style="font-size: 16px;">2223-3516</span>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <span class="badge badge-primary badge-pill">
                                        <i class="fa fa-phone"></i> +503
                                    </span>
                                    <span style="font-size: 16px;">2532-1561</span>
                                </div>
                            </div>  
                        </div>                       
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">        
        <div class="col-sm-12 col-md-12 col-lg-6">
            <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/ms?msa=0&amp;msid=213829194681019803634.00049258fe14996871c18&amp;ie=UTF8&amp;t=m&amp;ll=13.699278,-89.223876&amp;spn=0.007297,0.006437&amp;z=16&amp;output=embed"></iframe><br /><small>Ver <a href="https://www.google.com/maps/ms?msa=0&amp;msid=213829194681019803634.00049258fe14996871c18&amp;ie=UTF8&amp;t=m&amp;ll=13.699278,-89.223876&amp;spn=0.007297,0.006437&amp;z=16&amp;source=embed" style="color:#0000FF;text-align:left">Kaprichos Floristeria</a> en un mapa ampliado</small>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6">
            <form action="" method="post" name="form1" id="form1" onsubmit="MM_validateForm('elnombre','','R','elemail','','RisEmail','elmensaje','','R');return document.MM_returnValue">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center" style="background: #e4e4e4;color: black;border-color: #e4e4e4;">                        
                    <?php echo $messages['contactusL']; ?>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center default">                        
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6"><strong><?php echo $messages['phoneC']; ?>:</strong></div>
                        <div class="col-sm-12 col-md-12 col-lg-6"><input type="text" class="form-control" name="eltelefono" id="eltelefono" style="width:100%" /></div>
                    </div>   
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center default">                        
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6"><strong><?php echo $messages['emailC']; ?>:</strong></div>
                        <div class="col-sm-12 col-md-12 col-lg-6"><input type="text" class="form-control" name="elemail" id="elemail" style="width:100%" /></div>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center default">                        
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6"><strong><?php echo $messages['messageC']; ?>:</strong></div>
                        <div class="col-sm-12 col-md-6 col-lg-6"><textarea name="elmensaje" class="form-control" cols="28" rows="6" id="elmensaje" style="width:100%"></textarea></div>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center default">                        
                <div class="row">                    
                    <div class="col-sm-12 col-md-6 col-lg-6"><strong>* <?php echo $messages['instructionC']; ?></strong></div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <input name="envio" type="hidden" id="envio" value="1" />
                        <input type="submit" name="button" class="form-control" id="button" value="<?php echo $messages['sendC']; ?>" />
                    </div>
                </div>
                </li>
            </ul>
            </form>
                
                
                
                
                
                
            
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