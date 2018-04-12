<?php session_start(); ?>
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

  <!-- banner -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="banner">
                <div id="kb" class="carousel kb_elastic animate_text kb_wrapper" data-ride="carousel"   data-interval="6000" data-pause="hover">
                <!-- Wrapper-for-Slides -->
                    <div class="carousel-inner" role="listbox">  
                        <div class="item active"><!-- First-Slide -->
                            <img src="assets/images/portadapagina 2.jpg" alt="" class="img-responsive" />
                            <div class="carousel-caption kb_caption kb_caption_right" style="float: left; display: inline-block; position: absolute;left:8%">
                                <h3 data-animation="animated flipInX" class="abc">Entregamos <span>Tus</span> Sentimientos</h3>  
                                <h4 data-animation="animated flipInX" class="abc" style="color: black;">Compra hoy</h4>                              
                            </div>
                        </div>  
                        <div class="item"> <!-- Second-Slide -->
                            <img src="assets/images/portadapagina 3.jpg" alt="" class="img-responsive" />
                            <div class="carousel-caption kb_caption kb_caption_left" style="float: left; display: inline-block; position: absolute;left:60%" >
                                <h3 data-animation="animated fadeInDown" class="abc">Promociones Hoy</h3>
                                <h4 data-animation="animated fadeInUp" class="abc">Compra hoy</h4>
                            </div>
                        </div> 
                        <!--
                        <div class="item">
                            <img src="assets/images/san-valentin-2018-1220x400.jpg" alt="" class="img-responsive"/>
                            <div class="carousel-caption kb_caption kb_caption_left" style="float: left; display: inline-block; position: absolute;left:8%">
                                <h3 data-animation="animated fadeInLeft" class="abc">Las Mejores Flores</h3>
                                <h4 data-animation="animated flipInX" class="abc">Compra hoy</h4>
                            </div>
                        </div> -->

                    </div> 
                <!-- Left-Button -->
                    <a class="left carousel-control kb_control_left" href="#kb" role="button" data-slide="prev">
                        <span class="fa fa-angle-left kb_icons" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a> 
                    <!-- Right-Button -->
                    <a class="right carousel-control kb_control_right" href="#kb" role="button" data-slide="next">
                        <span class="fa fa-angle-right kb_icons" aria-hidden="true"></span>
                        <span class="sr-only">Siguiente</span>
                    </a> 
                </div>
                <script src="assets/js/custom.js"></script>
            </div>
            </div>
        </div>

    </div>  
  <!-- //banner -->  

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 focus-grid" style="width: 100%;">
                        <a href="https://www.facebook.com/kaprichosfloristeria/" target="_blank" class="wthree-btn wthree1"> 
                            <div class="focus-image"><i class="fa fa-facebook"></i></div>
                            <h4 class="clrchg">Facebook</h4> 
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 focus-grid" style="width: 100%;"> 
                        <a href="https://www.instagram.com/kaprichosfloristeria/" target="_blank" class="wthree-btn wthree2"> 
                            <div class="focus-image"><i class="fa fa-instagram"></i></div>
                            <h4 class="clrchg">Instragram</h4> 
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 focus-grid" style="width: 100%;"> 
                        <a href="products.html" class="wthree-btn wthree3"> 
                            <div class="focus-image"><i class="fa fa-pinterest"></i></div>
                            <h4 class="clrchg">Pinteres</h4> 
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-8 col-lg-8">
                <br>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6 focus-grid">
                        <a href="products.html" class=""> 
                            <img src="assets/demo/temporada-banner-786x710.jpg" class="box1">
                        </a>
                     
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 focus-grid">        
                        <a href="products.html" class=""> 
                        <img src="assets/demo/evelyn-events-design-786x710.jpg" class="box1">      
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>


    <!-- banner-bottom -->
    <div class="banner-bottom">
        <div class="container">
            <div class="clearfix"> </div>
          <h3 class="abc" style="background: #D82787; color: white; width: 300px; text-align: center; padding: 1%; font-size: 50px;"><?php echo $messages['Destacados']; ?></h3><hr>
            <div class="product-one">
                <div class="col-md-2 product-left"> 
                    <div class="p-one simpleCart_shelfItem jwe">                            
                            <a href="detalle.php?id=7">
                                <img src="uploaded/mod_productos/IMM03.jpg" alt="" class="img-responsive" />
                                <div class="mask">
                                    <span><?php echo $messages['QuickView']; ?></span>
                                </div>
                            </a>
                        <div class="product-left-cart">
                            <h3 class=" item_price">$100.00</h3>
                            <div class="">
                                <a href="detalle.php?id=7" class="btn btn-default" style="width: 100%;">Agregar</a>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 product-left"> 
                    <div class="p-one simpleCart_shelfItem jwe">
                        <a href="detalle.php?id=6">
                                <img src="uploaded/mod_productos/IMM02.jpg" alt="" class="img-responsive" />
                                <div class="mask">
                                    <span><?php echo $messages['QuickView']; ?></span>
                                </div>
                        </a>
                       <div class="product-left-cart">
                            <h3 class=" item_price">$100</h3>
                            <div class="">
                                <a href="detalle.php?id=6" class="btn btn-default" style="width: 100%;">Agregar</a>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 product-left"> 
                    <div class="p-one simpleCart_shelfItem jwe">
                        <a href="detalle.php?id=200">
                                <img src="uploaded/mod_productos/IMM09 SIN FONDO Y CON LOGO.jpg" alt="" class="img-responsive" />
                                <div class="mask">
                                    <span><?php echo $messages['QuickView']; ?></span>
                                </div>
                        </a>
                        <div class="product-left-cart">
                            <h3 class=" item_price">$50.00</h3>
                            <div class="">
                                <a href="detalle.php?id=200" class="btn btn-default" style="width: 100%;">Agregar</a>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 product-left"> 
                    <div class="p-one simpleCart_shelfItem jwe">
                        <a href="detalle.php?id=471">
                                <img src="uploaded/mod_productos/IMSV05.jpg" alt="" class="img-responsive" />
                                <div class="mask">
                                    <span><?php echo $messages['QuickView']; ?></span>
                                </div>
                        </a>
                        <div class="product-left-cart">
                            <h3 class=" item_price">$50.00</h3>
                            <div class="">
                                <a href="detalle.php?id=471" class="btn btn-default" style="width: 100%;">Agregar</a>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 product-left"> 
                    <div class="p-one simpleCart_shelfItem jwe">                            
                            <a href="detalle.php?id=266">
                                <img src="uploaded/mod_productos/IMM11 SIN FONDO CON LOGO.jpg" alt="" class="img-responsive" />
                                <div class="mask">
                                    <span><?php echo $messages['QuickView']; ?></span>
                                </div>
                            </a>
                        <div class="product-left-cart">
                            <h3 class=" item_price">$125.00</h3>
                            <div class="">
                                <a href="detalle.php?id=266" class="btn btn-default" style="width: 100%;">Agregar</a>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 product-left"> 
                    <div class="p-one simpleCart_shelfItem jwe">
                        <a href="detalle.php?id=153">
                                <img src="uploaded/mod_productos/IMM07 SIN FONDO Y CON LOGO.jpg" alt="" class="img-responsive" />
                                <div class="mask">
                                    <span><?php echo $messages['QuickView']; ?></span>
                                </div>
                        </a>
                        <div class="product-left-cart">
                            <h3 class=" item_price">$100.00</h3>
                            <div class="">
                                <a href="detalle.php?id=153" class="btn btn-default" style="width: 100%;">Agregar</a>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
<!-- //banner-bottom -->



  <!-- welcome -->
  <div class="welcome"> 
    <div class="container"> 
      <div class="welcome-info">
        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">

          <div class="clearfix"> </div>
          <h3  class="abc" style="text-align: center;padding: 50px; font-size: 50px; color:grey;"><?php echo $messages['KaprichosDesign']; ?></h3>
          <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
              <div class="tabcontent-grids">  
                <div id="owl-demo" class="owl-carousel"> 
                  <div class="">
                    <div style="background: url('uploaded/mod_productos/85 para web.jpg') center no-repeat; width: 200px; height: 200px; background-size: 150%; border-radius: 50%;"> 
                      
                    </div>   
                  </div>
                  <div class="">
                    <div style="background: url('uploaded/mod_productos/DSCF5250.jpg') center no-repeat; width: 200px; height: 200px;background-size: 150%;border-radius: 50%;"> 
      
                    </div>  
                  </div>
                  <div class="" style="width: 150px;">
                    <div style="background: url('uploaded/mod_productos/DSCF5263.jpg') center no-repeat; width: 200px; height: 200px;background-size: 150%;border-radius: 50%;"> 
      
                    </div>  
                  </div>
                  <div class="" style="width: 150px;">
                    <div style="background: url('uploaded/mod_productos/DSCF5387.jpg') center no-repeat; width: 200px; height: 200px;background-size: 150%;border-radius: 50%;"> 
      
                    </div>
                  </div>
                  <div class="" style="width: 150px;">
                   <div style="background: url('uploaded/mod_productos/DSCF5447.jpg') center no-repeat; width: 200px; height: 200px;
                   background-size: 150%;border-radius: 50%;"> 
      
                    </div>  
                  </div>
                  <div class="" style="width: 150px;">
                   <div style="background: url('uploaded/mod_productos/Evento 1.jpg') center no-repeat; width: 200px; height: 200px; background-size: 150%;border-radius: 50%;"> 
      
                    </div> 
                  </div>
                  <div class="" style="width: 150px;">
                   <div style="background: url('uploaded/mod_productos/Evento11.jpg') center no-repeat; width: 200px; height: 200px;  background-size: 150%;border-radius: 50%;"> 
      
                    </div> 
                  </div>
                  <div class="" style="width: 150px;">
                   <div style="background: url('uploaded/mod_productos/Hortensias 2.jpg') center no-repeat; width: 200px; height: 200px; background-size: 150%;border-radius: 50%;"> 
      
                    </div>
                  </div>
                </div> 
              </div>
            </div>  
        </div>  
      </div>    
    </div>    
  </div> 
  <br>
  <!-- //welcome -->

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
  <!-- //menu js aim --> 
  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster --> 
</body>
</html>