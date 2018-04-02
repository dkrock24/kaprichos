<?php require_once('Connections/conne10.php'); ?>
<?php
//Queries Menu
mysql_select_db($database_conne10, $conne10);
$query_rscategorias = "SELECT id_categoria, nombre_es FROM tbl_productos_categorias WHERE estatus = 1 ORDER BY orden ASC";
$rscategorias = mysql_query($query_rscategorias, $conne10) or die(mysql_error());
$row_rscategorias = mysql_fetch_assoc($rscategorias);
$totalRows_rscategorias = mysql_num_rows($rscategorias);

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

<div class="header">
    <div class="container">
      <div class="row">
        <div class="w3ls-header"><!--header-one--> 
        <div class="col-md-4">
          
          <div class="w3ls-header-left">
            <p> <span style="font-size:16px;">+503 <i class="fa fa-phone" aria-hidden="true"></i> ( 2532 - 1561 )  ( 2223 - 3515 ) </span></p>
          </div>

        </div>
        <div class="col-md-8">
            
        <div class="w3ls-header-right" style="color:black;">
            <ul>
          
          <li class="dropdown head-dpdn">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> <?php echo $messages['cart']; ?><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="offers.html"><?php echo $messages['myCart']; ?></a></li> 
              <li><a href="offers.html"><?php echo $messages['myOrders']; ?></a></li>
            </ul> 
          </li> 
          <li class="dropdown head-dpdn">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-gift" aria-hidden="true"></i> <?php echo $messages['paynow']; ?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="offers.html"><?php echo $messages['catalogL']; ?></a></li> 
              <li><a href="offers.html"><?php echo $messages['ofertL']; ?></a></li>
              <li><a href="#" data-toggle="modal" data-target="#question"><?php echo $messages['questionL']; ?></a></li> 
              <li><a href="#" data-toggle="modal" data-target="#whopay"><?php echo $messages['whopayL']; ?></a></li> 
              <li><a href="offers.html"><?php echo $messages['servicesL']; ?></a></li> 
              <li><a href="offers.html"><?php echo $messages['tipsL']; ?></a></li>   
              <li><a href="contacto.php"><?php echo $messages['contactusL']; ?></a></li>             
              <li><a href="offers.html"><?php echo $messages['videosL']; ?></a></li> 
            </ul> 
          </li> 
          <li class="dropdown head-dpdn">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $messages['login']; ?><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#" data-toggle="modal" data-target="#myModal"><?php echo $messages['login']; ?> </a></li> 
              <li><a href="signup.html"><?php echo $messages['signup']; ?></a></li> 
               <li><a href="signup.html"><?php echo $messages['Salir']; ?></a></li> 
            </ul> 
          </li> 
          <li class="dropdown head-dpdn">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-language" aria-hidden="true"></i> <?php echo $messages['language']; ?><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo $_SERVER['REQUEST_URI'] ?>&&lan=es">Spanish</a></li> 
              <li><a href="<?php echo $_SERVER['REQUEST_URI'] ?>&&lan=en">English</a></li>
              
            </ul> 
          </li> 
            </ul>
        </div>
        <div class="clearfix"> </div> 
        </div>
      </div>
      </div>

              <div class="container">
            <div class="row">
                <div class="col-ms-3">
                    <div class="header-search">
                        <form action="#" method="post">
                            <button type="submit" class="btn btn-default" aria-label="Left Align">
                            <i class="fa fa-search" aria-hidden="true" style="color:black;"> </i>
                            </button>
                            <input type="search" name="Search" placeholder="<?php echo $messages['search']; ?>" required="">
                        </form>
                    </div>
                </div>
                
                <div class="col-ms-3">
                    <div class="header-logo">
                        <img src="images/flores-para-el-salvador.png"/>
                    </div> 
                </div>

                <div class="col-ms-3">
                    <!--
                    <div class="header-cart"> 
                        <div class="my-account">
                            <i class="fa fa-money" style="font-size: 16px;" aria-hidden="true"></i><span id="totalabc"></span>
                        </div>
                        
                        <div class="cart"> 
                            <span id="total_items"></span>
                            <form action="#" method="post" class="last"> 
                            <input type="hidden" name="cmd" value="_cart" />
                            <input type="hidden" name="display" value="1" />
                            <button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
                            </form>  
                        </div>
                    <div class="clearfix"> </div> 
                    </div> 
                        -->
                </div>
            </div>
            <div class="clearfix"> </div>
        </div> 
    </div>


    

    


    <div class="header-two"><!-- header-two -->
   

      <div class="header-three"><!-- header-three -->
      <div class="container">
        <div class="row">

          <div class="col-md-3">
              <div class="move-text">
                <div class="marquee"><a href="index.php"> <?php echo $messages['home']; ?></a></div>
              </div>
          </div>

          <div class="col-md-3">
              <div class="move-text">
                <div class="marquee"><a href="offers.html"> <?php echo $messages['event']; ?></a></div>
              </div>
          </div>

          <div class="col-md-3">
            <div class="menu">
                <div class="cd-dropdown-wrapper">
                  <a class="cd-dropdown-trigger" href="#0"><?php echo $messages['buy']; ?></a>
                  <nav class="cd-dropdown"> 
                    <a href="#0" class="cd-close">Close</a>
                    <ul class="cd-dropdown-content"> 
                      <?php do { ?>
                        <li><a href="categoria.php?c=<?php echo $row_rscategorias['id_categoria']; ?>"><?php echo $row_rscategorias['nombre_es']; ?></a></li>
                      <?php } while ($row_rscategorias = mysql_fetch_assoc($rscategorias)); ?>                      
                    </ul> <!-- .cd-dropdown-content -->
                  </nav> <!-- .cd-dropdown -->
                </div> <!-- .cd-dropdown-wrapper -->   
            </div>
          </div>

          
       
          <div class="col-md-3">
            <div class="move-text">
              <div class="marquee"><a href="contacto.php"> <?php echo $messages['contactus']; ?></a></div>
            </div>
          </div>
        
        </div>
      </div>
    </div>
    </div><!-- //header-two -->
    
  </div>
  <!-- //header --> 



  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form role="form" action="authentication.php" method="post">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        
        <h1 style="text-align: center"><i class="fa fa-user"></i></h1>
        <h4 class="modal-title" id="myModalLabel" style="text-align: center"><?php echo $messages['login']; ?></h4>
      </div> <!-- /.modal-header -->

      <div class="modal-body">
        
          <div class="form-group">
            <div class="input-group">
              <input type="text" class="form-control" id="uLogin" name="username" placeholder="Email">
              <label for="uLogin" class="input-group-addon glyphicon glyphicon-user"></label>
            </div>
          </div> <!-- /.form-group -->

          <div class="form-group">
            <div class="input-group">
              <input type="password" class="form-control" id="uPassword" name="passwd" placeholder="Password">
              <label for="uPassword" class="input-group-addon glyphicon glyphicon-lock"></label>
            </div> <!-- /.input-group -->
          </div> <!-- /.form-group -->
      </div> <!-- /.modal-body -->

      <div class="modal-footer">
        <button class="form-control btn btn-primary"><?php echo $messages['Ingresar']; ?></button>

        <div class="progress">
            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="100" style="width: 0%;">
            <span class="sr-only">progress</span>
            </div>
        </div>
      </div> <!-- /.modal-footer -->

    </div><!-- /.modal-content -->
    </form>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



  <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        
        <h1 style="text-align: center"><img src="images/flores-para-el-salvador.png"/></h1>
        <h4 class="modal-title" id="myModalLabel" style="text-align: center"><?php echo $messages['aboutus']; ?></h4>
      </div> <!-- /.modal-header -->

      <div class="modal-body">
        <p>
          <?php echo $messages['nosotrosDescripcion']; ?>
        </p>
      </div> <!-- /.modal-body -->

      <div class="modal-footer">
        

      </div> <!-- /.modal-footer -->

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

  <div class="modal fade" id="politicas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        
        <h1 style="text-align: center"><img src="images/flores-para-el-salvador.png"/></h1>
        <h4 class="modal-title" id="myModalLabel" style="text-align: center"><?php echo $messages['politicas2']; ?></h4>
      </div> <!-- /.modal-header -->

      <div class="modal-body">
        <ul>
          <li><i class="fa fa-info-circle"></i> <?php echo $messages['politicaCompleta1']; ?></li>
          <li><i class="fa fa-info-circle"></i> <?php echo $messages['politicaCompleta2']; ?></li>
          <li><i class="fa fa-info-circle"></i> <?php echo $messages['politicaCompleta3']; ?></li>
          <li><i class="fa fa-info-circle"></i> <?php echo $messages['politicaCompleta4']; ?></li>
          <li><i class="fa fa-info-circle"></i> <?php echo $messages['politicaCompleta5']; ?></li>
          <li><i class="fa fa-info-circle"></i> <?php echo $messages['politicaCompleta6']; ?></li>
        </ul>
      </div> <!-- /.modal-body -->

      <div class="modal-footer">
        

      </div> <!-- /.modal-footer -->

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="whopay" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        
            <h1 style="text-align: center"><img src="images/flores-para-el-salvador.png"/></h1>
            <h4 class="modal-title" id="myModalLabel" style="text-align: center">Formas de pago<?php //echo $messages['politicas2']; ?></h4>
        </div> <!-- /.modal-header -->

        <div class="modal-body">
            <ul class="list-group">
                <li class="list-group-item">1. Contra entrega</li>
                <li class="list-group-item">2. Se aceptan pagos mediante tarjete de crédito o débito: Visa, MasterCard, Discover, American Express, Diners Club, JCB y tarjetas de débito con el logotipo de Visa y MasterCard. Los clientes también podrán pagar por sus compras usando PayPal® y PayPal Pay Later®. Por favor, tome en cuenta que las opciones de pago con PayPal® y PayPal Pay Later® no se encuentran disponibles en todas las monedas. Para realizar un pedido de demostración, diríjase a la siguiente dirección: http://www.acmeonlinebooks.com</li>
                <li class="" style="text-align: center;list-style-type:none">
                    <img src="images/cards.png" width="150" />
                </li>
            </ul>
        </div> <!-- /.modal-body -->

    <div class="modal-footer">
        

      </div> <!-- /.modal-footer -->

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Question -->
<div class="modal fade" id="question" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        
        <h1 style="text-align: center"><img src="images/flores-para-el-salvador.png"/></h1>
        <h4 class="modal-title" id="myModalLabel" style="text-align: center">Sección de Preguntas<?php //echo $messages['politicas2']; ?></h4>
      </div> <!-- /.modal-header -->

    <div class="modal-body">

            <div class="row">
                <div class="col-ms-3 col-md-12 col-lg-12">
                    <table class="table">
                        <tr>
                            <td><b>¿Cuál es la cobertura del servicio?</b></td>
                            <td><a class="btn btn-primary" data-toggle="collapse" href="#cobertura" role="button" aria-expanded="false" aria-controls="collapseExample">Leer</a></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="collapse" id="cobertura">
                                    <div class="card card-body">
                                        Los costos de envío son gratis para la ciudad capital. También hacemos entregas a nivel nacional haciendo el pedido con 48 horas de anticipación en caso contrario la Floristería se reserva el derecho de entregarlo al día siguiente (Solo se realizan entregas en las cabeceras departamentales).
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><b>¿Con cuánto tiempo de anticipación debo hacer mi pedido?</b></td>
                            <td><a class="btn btn-primary" data-toggle="collapse" href="#anticipacion" role="button" aria-expanded="false" aria-controls="collapseExample">Leer</a></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="collapse" id="anticipacion">
                                    <div class="card card-body">
                                        Para entregas dentro de la ciudad de San Salvador aceptamos ordenes dentro del mismo día, sin embargo se estima prudente ordenarlas con 24 hrs. de anticipación. Para envíos a otros departamentos ordenarlos con 3 días de anticipación para hacer su pedido. En días especiales como 14 de Febrero, 10 de Mayo, 26 de Abril y 2 de Noviembre los pedidos tienen que hacerse con un mínimo de 3 días de anticipación (los costos varían por la temporada).
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><b>¿Que datos son necesarios para poder hacer exitosa la entrega de mi pedido?</b></td>
                            <td><a class="btn btn-primary" data-toggle="collapse" href="#datos" role="button" aria-expanded="false" aria-controls="collapseExample">leer</a></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="collapse" id="datos">
                                    <div class="card card-body">
                                        <ul>
                                            <li>Nombre completo de la persona a la que va dirigido el arreglo.</li>
                                            <li>Dirección exacta y puntos de referencia.</li>
                                            <li>Teléfonos.</li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><b>¿Si quiero hacer modificaciones en mi pedido de cuanto tiempo dispongo para hacerlo?</b></td>
                            <td><a class="btn btn-primary" data-toggle="collapse" href="#modificacion" role="button" aria-expanded="false" aria-controls="collapseExample">leer</a></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="collapse" id="modificacion">
                                    <div class="card card-body">
                                        Para modificaciones de pedidos como cambio de dirección, modificación en el texto de la tarjeta, cambio de fecha, etc. Tengo 8 horas de anticipación para hacerlo.
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><b>¿Puedo ordenar por teléfono y cuál es su horario de atención?</b></td>
                            <td><a class="btn btn-primary" data-toggle="collapse" href="#telefono" role="button" aria-expanded="false" aria-controls="collapseExample">leer</a></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="collapse" id="telefono">
                                    <div class="card card-body">
                                        Puedes efectuar tus pedidos llamándonos al (503) 2223-3515 y (503) 2223-3516 Nuestros horarios de atención son de lunes a viernes de 7:00 a.m. a 6:00 p.m. los días sábados de 8:00 a.m. a 4:00 p.m. En horas no hábiles puede hacer sus pedidos al (503) 71016356.
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><b>¿Qué días hacen entregas?</b></td>
                            <td><a class="btn btn-primary" data-toggle="collapse" href="#dias" role="button" aria-expanded="false" aria-controls="collapseExample">leer</a></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="collapse" id="dias">
                                    <div class="card card-body">
                                        Realizamos entregas todos los días del año. Días festivos como 14 de febrero o día de la madre ordénelos con la suficiente anticipación.
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><b>¿El servicio está garantizado?</b></td>
                            <td><a class="btn btn-primary" data-toggle="collapse" href="#garantia" role="button" aria-expanded="false" aria-controls="collapseExample">leer</a></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="collapse" id="garantia">
                                    <div class="card card-body">
                                        Sí de alguna forma no se encuentra conforme con nuestro servicio al momento de la entrega, por favor contáctanos al teléfono (503) 2223-3515 / (503) 2223-3516 o a nuestro email info@kaprichosfloristeria.com
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><b>¿La información que proporcione estará segura?</b></td>
                            <td><a class="btn btn-primary" data-toggle="collapse" href="#informacion" role="button" aria-expanded="false" aria-controls="collapseExample">leer</a></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="collapse" id="informacion">
                                    <div class="card card-body">
                                        Nuestros clientes son muy valiosos para nosotros, nos esforzamos por ofrecer el mejor servicio y seguridad. No compartimos la información de nuestros clientes.
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

    </div> <!-- /.modal-body -->

      <div class="modal-footer">
        

      </div> <!-- /.modal-footer -->

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- EndQuestion -->