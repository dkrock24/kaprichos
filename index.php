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
    //session_destroy();
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

  <!-- banner -->
    <div class="container">
        <div class="row">
            <div class="banner">
                <div id="kb" class="carousel kb_elastic animate_text kb_wrapper" data-ride="carousel"   data-interval="6000" data-pause="hover">
                <!-- Wrapper-for-Slides -->
                    <div class="carousel-inner" role="listbox">  
                        <div class="item active"><!-- First-Slide -->
                            <img src="assets/images/slide-detalle-1220x440.jpg" alt="" class="img-responsive" />
                            <div class="carousel-caption kb_caption kb_caption_right">
                                <h3 data-animation="animated flipInX">Entregamos <span>Tus</span> Sentimientos</h3>
                                <h4 data-animation="animated flipInX">Compra hoy</h4>
                            </div>
                        </div>  
                        <div class="item"> <!-- Second-Slide -->
                            <img src="assets/images/slide2-1220x440.jpg" alt="" class="img-responsive" />
                            <div class="carousel-caption kb_caption kb_caption_right">
                                <h3 data-animation="animated fadeInDown">Promociones Hoy</h3>
                                <h4 data-animation="animated fadeInUp">Compra hoy</h4>
                            </div>
                        </div> 
                        <div class="item"><!-- Third-Slide -->
                            <img src="assets/images/san-valentin-2018-1220x400.jpg" alt="" class="img-responsive"/>
                            <div class="carousel-caption kb_caption kb_caption_center">
                                <h3 data-animation="animated fadeInLeft">Las Mejores Flores</h3>
                                <h4 data-animation="animated flipInX">Compra hoy</h4>
                            </div>
                        </div> 
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
  <!-- //banner -->  

    <div class="container">
        <div class="row">
            <div class="col col-sm-12 col-md-4 col-lg-4">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 focus-grid">
                        <a href="products.html" class="wthree-btn wthree1"> 
                            <div class="focus-image"><i class="fa fa-facebook"></i></div>
                            <h4 class="clrchg">Facebook</h4> 
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 focus-grid"> 
                        <a href="products.html" class="wthree-btn wthree2"> 
                            <div class="focus-image"><i class="fa fa-instagram"></i></div>
                            <h4 class="clrchg">Instragram</h4> 
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 focus-grid"> 
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
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <a href="products.html" class=""> 
                            <img src="assets/demo/temporada-banner-786x710.jpg" class="box1">
                        </a>
                     
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 focus-grid">        
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
          <h3 class="w3ls-title"><?php echo $messages['Destacados']; ?></h3>
            <div class="product-one">
                <div class="col-md-2 product-left"> 
                    <div class="p-one simpleCart_shelfItem jwe">                            
                            <a href="single.html">
                                <img src="uploaded/mod_productos/0a31fa8ab353f1cee3f8e528f257cb18.jpg" alt="" class="img-responsive" />
                                <div class="mask">
                                    <span><?php echo $messages['QuickView']; ?></span>
                                </div>
                            </a>
                        <div class="product-left-cart">
                            <div class="product-left-cart-l">
                                <p><a class="item_add" href="#"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> <span class=" item_price">$729</span></a></p>
                            </div>
                            <div class="product-left-cart-r">
                                <a href="#"> </a>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 product-left"> 
                    <div class="p-one simpleCart_shelfItem jwe">
                        <a href="single.html">
                                <img src="uploaded/mod_productos/3ca05786d0d3c8bdf15f47472d8c7850.jpg" alt="" class="img-responsive" />
                                <div class="mask">
                                    <span><?php echo $messages['QuickView']; ?></span>
                                </div>
                        </a>
                        <div class="product-left-cart">
                            <div class="product-left-cart-l">
                                <p><a class="item_add" href="#"><i></i> <span class=" item_price">$729</span></a></p>
                            </div>
                            <div class="product-left-cart-r">
                                <a href="#"> </a>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 product-left"> 
                    <div class="p-one simpleCart_shelfItem jwe">
                        <a href="single.html">
                                <img src="uploaded/mod_productos/2a1efc2f9fac7813e1f3aae4519487db.jpg" alt="" class="img-responsive" />
                                <div class="mask">
                                    <span><?php echo $messages['QuickView']; ?></span>
                                </div>
                        </a>
                        <div class="product-left-cart">
                            <div class="product-left-cart-l">
                                <p><a class="item_add" href="#"><i></i> <span class=" item_price">$729</span></a></p>
                            </div>
                            <div class="product-left-cart-r">
                                <a href="#"> </a>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 product-left"> 
                    <div class="p-one simpleCart_shelfItem jwe">
                        <a href="single.html">
                                <img src="uploaded/mod_productos/a1c928c0408cda363dd30a3ed79ccb30.jpg" alt="" class="img-responsive" />
                                <div class="mask">
                                    <span><?php echo $messages['QuickView']; ?></span>
                                </div>
                        </a>
                        <div class="product-left-cart">
                            <div class="product-left-cart-l">
                                <p><a class="item_add" href="#"><i></i> <span class=" item_price">$729</span></a></p>
                            </div>
                            <div class="product-left-cart-r">
                                <a href="#"> </a>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 product-left"> 
                    <div class="p-one simpleCart_shelfItem jwe">                            
                            <a href="single.html">
                                <img src="uploaded/mod_productos/85cc6a0282feaf7cd66adbba690d517e.jpg" alt="" class="img-responsive" />
                                <div class="mask">
                                    <span><?php echo $messages['QuickView']; ?></span>
                                </div>
                            </a>
                        <div class="product-left-cart">
                            <div class="product-left-cart-l">
                                <p><a class="item_add" href="#"><i></i> <span class=" item_price">$729</span></a></p>
                            </div>
                            <div class="product-left-cart-r">
                                <a href="#"> </a>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 product-left"> 
                    <div class="p-one simpleCart_shelfItem jwe">
                        <a href="single.html">
                                <img src="uploaded/mod_productos/a1a4b9bd25a0aadf2866819979021c79.jpg" alt="" class="img-responsive" />
                                <div class="mask">
                                    <span><?php echo $messages['QuickView']; ?></span>
                                </div>
                        </a>
                        <div class="product-left-cart">
                            <div class="product-left-cart-l">
                                <p><a class="item_add" href="#"><i></i> <span class=" item_price">$729</span></a></p>
                            </div>
                            <div class="product-left-cart-r">
                                <a href="#"> </a>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
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
          <h3 class="w3ls-title"><?php echo $messages['KaprichosDesign']; ?></h3>
          <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
              <div class="tabcontent-grids">  
                <div id="owl-demo" class="owl-carousel"> 
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <a href="products.html"><img src="uploaded/mod_productos/d9dbc275cf9993854b0d1c8acb550206.jpg" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products.html">Audio speaker</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$100</h5> 
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Audio speaker" /> 
                          <input type="hidden" name="amount" value="100.00" /> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>  
                      </div>   
                    </div>   
                  </div>
                  <div class="item">
                    <div class="glry-w3agile-grids agileits">
                      <div class="new-tag"><h6>Sale</h6></div>
                      <a href="products.html"><img src="uploaded/mod_productos/foto kaprichos 1.jpg" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products.html">Refrigerator</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p> 
                        <h5>$300</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Refrigerator" /> 
                          <input type="hidden" name="amount" value="300.00"/> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>       
                    </div>  
                  </div>
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <div class="new-tag"><h6>New</h6></div>
                      <a href="products.html"><img src="assets/images/e3.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products.html">Smart Phone</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$70</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Smart Phone" /> 
                          <input type="hidden" name="amount" value="70.00"/> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>        
                    </div>  
                  </div>
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <a href="products.html"><img src="assets/images/e4.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products.html">Digital Camera</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$80</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Digital Camera"/> 
                          <input type="hidden" name="amount" value="80.00"/>  
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>         
                    </div>  
                  </div>
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <a href="products.html"><img src="assets/images/e1.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products.html">Audio speaker</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$100</h5> 
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Audio speaker" /> 
                          <input type="hidden" name="amount" value="100.00" /> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>  
                      </div>   
                    </div>   
                  </div>
                  <div class="item">
                    <div class="glry-w3agile-grids agileits">
                      <div class="new-tag"><h6>Sale</h6></div>
                      <a href="products.html"><img src="assets/images/e2.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products.html">Refrigerator</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p> 
                        <h5>$300</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Refrigerator" /> 
                          <input type="hidden" name="amount" value="300.00"/>  
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>       
                    </div>  
                  </div>
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <div class="new-tag"><h6>New</h6></div>
                      <a href="products.html"><img src="assets/images/e3.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products.html">Smart Phone</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$70</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Smart Phone" /> 
                          <input type="hidden" name="amount" value="70.00"/>
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>        
                    </div>  
                  </div>
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <a href="products.html"><img src="assets/images/e4.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products.html">Digital Camera</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$80</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Digital Camera"/> 
                          <input type="hidden" name="amount" value="80.00"/> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>         
                    </div>  
                  </div>
                </div> 
              </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="carl" aria-labelledby="carl-tab">
              <div class="tabcontent-grids">
                <script>
                  $(document).ready(function() { 
                    $("#owl-demo1").owlCarousel({
                   
                      autoPlay: 3000, //Set AutoPlay to 3 seconds
                   
                      items :4,
                      itemsDesktop : [640,5],
                      itemsDesktopSmall : [414,4],
                      navigation : true
                   
                    });
                    
                  }); 
                </script>
                <div id="owl-demo1" class="owl-carousel"> 
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <a href="products1.html"><img src="images/f1.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products1.html">T Shirt</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$10</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="T Shirt" /> 
                          <input type="hidden" name="amount" value="10.00" /> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>        
                    </div>    
                  </div>
                  <div class="item">
                    <div class="glry-w3agile-grids agileits">
                      <div class="new-tag"><h6>20% <br> Off</h6></div>
                      <a href="products1.html"><img src="images/f2.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products1.html">Women Sandal</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$20</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Women Sandal" /> 
                          <input type="hidden" name="amount" value="20.00" /> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>        
                    </div> 
                  </div>
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <a href="products1.html"><img src="images/f3.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products1.html">Jewellery</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$60</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Jewellery" /> 
                          <input type="hidden" name="amount" value="60.00" /> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>         
                    </div> 
                  </div>
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <div class="new-tag"><h6>New</h6></div>
                      <a href="products1.html"><img src="images/f4.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products1.html">Party dress</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$15</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Party dress" /> 
                          <input type="hidden" name="amount" value="15.00" /> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>      
                    </div> 
                  </div> 
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <a href="products1.html"><img src="images/f1.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products1.html">T Shirt</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$10</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="T Shirt" /> 
                          <input type="hidden" name="amount" value="10.00" /> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>        
                    </div>    
                  </div>
                  <div class="item">
                    <div class="glry-w3agile-grids agileits">
                      <div class="new-tag"><h6>20% <br> Off</h6></div>
                      <a href="products1.html"><img src="images/f2.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products1.html">Women Sandal</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$20</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Women Sandal" /> 
                          <input type="hidden" name="amount" value="20.00" /> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>        
                    </div> 
                  </div>
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <a href="products1.html"><img src="images/f3.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products1.html">Jewellery</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$60</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Jewellery" /> 
                          <input type="hidden" name="amount" value="60.00" /> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>         
                    </div> 
                  </div>
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <div class="new-tag"><h6>New</h6></div>
                      <a href="products1.html"><img src="images/f4.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products1.html">Party dress</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$15</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Party dress" /> 
                          <input type="hidden" name="amount" value="15.00" /> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>      
                    </div> 
                  </div>   
                </div>   
              </div>
            </div> 
            <div role="tabpanel" class="tab-pane fade" id="james" aria-labelledby="james-tab">
              <div class="tabcontent-grids">
                <script>
                  $(document).ready(function() { 
                    $("#owl-demo2").owlCarousel({
                   
                      autoPlay: 3000, //Set AutoPlay to 3 seconds
                   
                      items :4,
                      itemsDesktop : [640,5],
                      itemsDesktopSmall : [414,4],
                      navigation : true
                   
                    });
                    
                  }); 
                </script>
                <div id="owl-demo2" class="owl-carousel"> 
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <div class="new-tag"><h6>New</h6></div>
                      <a href="products6.html"><img src="images/p1.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products6.html">Coffee Mug</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$14</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Coffee Mug" /> 
                          <input type="hidden" name="amount" value="14.00" /> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>         
                    </div>  
                  </div>
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <div class="new-tag"><h6>20% <br> Off</h6></div>
                      <a href="products6.html"><img src="images/p2.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products6.html">Teddy bear</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$20</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Teddy bear" /> 
                          <input type="hidden" name="amount" value="20.00" /> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>        
                    </div> 
                  </div>
                  <div class="item"> 
                    <div class="glry-w3agile-grids agileits"> 
                      <div class="new-tag"><h6>Sale</h6></div>
                      <a href="products6.html"><img src="images/p3.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products6.html">Chocolates</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$60</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Chocolates" /> 
                          <input type="hidden" name="amount" value="60.00" /> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>        
                    </div> 
                  </div>
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <a href="products6.html"><img src="images/p4.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products6.html">Gift Card</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$22</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Gift Card" /> 
                          <input type="hidden" name="amount" value="22.00" /> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>       
                    </div> 
                  </div>
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <div class="new-tag"><h6>New</h6></div>
                      <a href="products6.html"><img src="images/p1.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products6.html">Coffee Mug</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$14</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Coffee Mug" /> 
                          <input type="hidden" name="amount" value="14.00" /> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>         
                    </div>  
                  </div>
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <div class="new-tag"><h6>20% <br> Off</h6></div>
                      <a href="products6.html"><img src="images/p2.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products6.html">Teddy bear</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$20</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Teddy bear" /> 
                          <input type="hidden" name="amount" value="20.00" /> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>        
                    </div> 
                  </div>
                  <div class="item"> 
                    <div class="glry-w3agile-grids agileits"> 
                      <div class="new-tag"><h6>Sale</h6></div>
                      <a href="products6.html"><img src="images/p3.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products6.html">Chocolates</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$60</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Chocolates" /> 
                          <input type="hidden" name="amount" value="60.00" /> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>        
                    </div> 
                  </div>
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <a href="products6.html"><img src="images/p4.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products6.html">Gift Card</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$22</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Gift Card" /> 
                          <input type="hidden" name="amount" value="22.00" /> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>       
                    </div> 
                  </div> 
                </div>    
              </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="decor" aria-labelledby="decor-tab">
              <div class="tabcontent-grids">
                <script>
                  $(document).ready(function() { 
                    $("#owl-demo3").owlCarousel({
                   
                      autoPlay: 3000, //Set AutoPlay to 3 seconds
                   
                      items :4,
                      itemsDesktop : [640,5],
                      itemsDesktopSmall : [414,4],
                      navigation : true
                   
                    });
                    
                  }); 
                </script>
                <div id="owl-demo3" class="owl-carousel"> 
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <div class="new-tag"><h6>Sale</h6></div>
                      <a href="products3.html"><img src="images/h1.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products3.html">Wall Clock</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$80</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Wall Clock" /> 
                          <input type="hidden" name="amount" value="80.00" /> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>         
                    </div>  
                  </div>
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <div class="new-tag"><h6>10%<br>Off</h6></div>
                      <a href="products3.html"><img src="images/h2.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products3.html">Plants & Vases</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$40</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Plants & Vases" /> 
                          <input type="hidden" name="amount" value="40.00" /> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>         
                    </div>
                  </div>
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <a href="products3.html"><img src="images/h3.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products3.html">Queen Size Bed</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$250</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Queen Size Bed" /> 
                          <input type="hidden" name="amount" value="250.00" /> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>        
                    </div> 
                  </div>
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <a href="products3.html"><img src="images/h4.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products3.html">flower pot</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$30</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="flower pot" /> 
                          <input type="hidden" name="amount" value="30.00" /> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>        
                    </div> 
                  </div> 
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <div class="new-tag"><h6>Sale</h6></div>
                      <a href="products3.html"><img src="images/h1.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products3.html">Wall Clock</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$80</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Wall Clock" /> 
                          <input type="hidden" name="amount" value="80.00" /> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>         
                    </div>  
                  </div>
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <div class="new-tag"><h6>10%<br>Off</h6></div>
                      <a href="products3.html"><img src="images/h2.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products3.html">Plants & Vases</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$40</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Plants & Vases" /> 
                          <input type="hidden" name="amount" value="40.00" /> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>         
                    </div>
                  </div>
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <a href="products3.html"><img src="images/h3.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products3.html">Queen Size Bed</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$250</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Queen Size Bed" /> 
                          <input type="hidden" name="amount" value="250.00" /> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>        
                    </div> 
                  </div>
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <a href="products3.html"><img src="images/h4.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products3.html">flower pot</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$30</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="flower pot" /> 
                          <input type="hidden" name="amount" value="30.00" /> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>        
                    </div> 
                  </div>  
                </div>    
              </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="sports" aria-labelledby="sports-tab">
              <div class="tabcontent-grids">
                <script>
                  $(document).ready(function() { 
                    $("#owl-demo4").owlCarousel({
                   
                      autoPlay: 3000, //Set AutoPlay to 3 seconds
                   
                      items :4,
                      itemsDesktop : [640,5],
                      itemsDesktopSmall : [414,4],
                      navigation : true
                   
                    }); 
                  }); 
                </script>
                <div id="owl-demo4" class="owl-carousel"> 
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <div class="new-tag"><h6>New</h6></div>
                      <a href="products4.html"><img src="images/s1.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products4.html">Roller Skates</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$180</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Roller Skates"/> 
                          <input type="hidden" name="amount" value="180.00" /> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>         
                    </div>  
                  </div>
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <a href="products4.html"><img src="images/s2.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products4.html">Football</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$70</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Football"/> 
                          <input type="hidden" name="amount" value="70.00"/>
                          <button type="submit" class="w3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>        
                    </div> 
                  </div>
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <div class="new-tag"><h6>20% <br>Off</h6></div>
                      <a href="products4.html"><img src="images/s3.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products4.html">Nylon Shuttle</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$56</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Nylon Shuttle" /> 
                          <input type="hidden" name="amount" value="56.00"/> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>       
                    </div> 
                  </div>
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <a href="products4.html"><img src="images/s4.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products4.html">Cricket Kit</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$80</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Cricket Kit" /> 
                          <input type="hidden" name="amount" value="80.00" /> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>       
                    </div> 
                  </div>
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <div class="new-tag"><h6>New</h6></div>
                      <a href="products4.html"><img src="images/s1.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products4.html">Roller Skates</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$180</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Roller Skates"/> 
                          <input type="hidden" name="amount" value="180.00" /> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>         
                    </div>  
                  </div>
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <a href="products4.html"><img src="images/s2.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products4.html">Football</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$70</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Football"/> 
                          <input type="hidden" name="amount" value="70.00"/>
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>        
                    </div> 
                  </div>
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <div class="new-tag"><h6>20% <br>Off</h6></div>
                      <a href="products4.html"><img src="images/s3.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products4.html">Nylon Shuttle</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$56</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Nylon Shuttle" /> 
                          <input type="hidden" name="amount" value="56.00"/> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>       
                    </div> 
                  </div>
                  <div class="item">
                    <div class="glry-w3agile-grids agileits"> 
                      <a href="products4.html"><img src="images/s4.png" alt="img"></a>
                      <div class="view-caption agileits-w3layouts">           
                        <h4><a href="products4.html">Cricket Kit</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                        <h5>$80</h5>
                        <form action="#" method="post">
                          <input type="hidden" name="cmd" value="_cart" />
                          <input type="hidden" name="add" value="1" /> 
                          <input type="hidden" name="w3ls_item" value="Cricket Kit" /> 
                          <input type="hidden" name="amount" value="80.00" /> 
                          <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                        </form>
                      </div>       
                    </div> 
                  </div>
                </div>    
              </div>
            </div> 
          </div>   
        </div>  
      </div>    
    </div>    
  </div> 
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