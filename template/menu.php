<?php
require_once('Connections/conne10.php');
//Queries Menu
mysql_select_db($database_conne10, $conne10);
$query_rscategorias = "SELECT id_categoria, nombre_es FROM tbl_productos_categorias WHERE estatus = 1 ORDER BY orden ASC";
$rscategorias = mysql_query($query_rscategorias, $conne10) or die(mysql_error());
$row_rscategorias = mysql_fetch_assoc($rscategorias);
$totalRows_rscategorias = mysql_num_rows($rscategorias);

    if(isset( $_POST['lan'] ))
    {
        $_SESSION['lan'] = $_POST['lan'];        
    }
    else
    {
        if(!isset($_SESSION['lan']))
        {        
            $_SESSION['lan'] = 'es';
        }else{
            $_SESSION['lan'];
        }
        
    }
    require("lan/".$_SESSION['lan'].'.php');

?>
<style type="text/css">
    .demo{
        display: inline-block;
        position: relative;
        float: left;
        width: 100%;
        padding: 2px;        
    }
    .abc2{
        text-align: center;
    }
    .recuperar{
        display: none;
    }
</style>
<script type="text/javascript">
    $(document).ready(function(){
        $("#recuperar").click(function(){
            $('.recuperar').show();
            $('#ingresar').hide();
        });
    })
</script>



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
          
          <!--
          <li class="dropdown head-dpdn">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> <?php echo $messages['cart']; ?><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="offers.html"><?php echo $messages['myCart']; ?></a></li> 
              <li><a href="offers.html"><?php echo $messages['myOrders']; ?></a></li>
            </ul> 
          </li> 
        -->
          <li class="dropdown head-dpdn">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-gift" aria-hidden="true"></i> <?php echo $messages['paynow']; ?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="catalogo.php"><?php echo $messages['catalogL']; ?></a></li> 
              
              <li><a href="#" data-toggle="modal" data-target="#question"><?php echo $messages['questionL']; ?></a></li> 
              <li><a href="#" data-toggle="modal" data-target="#whopay"><?php echo $messages['whopayL']; ?></a></li> 
              <li><a href="#" data-toggle="modal" data-target="#servicios"><?php echo $messages['servicesL']; ?></a></li> 
              <li><a href="tip.php"><?php echo $messages['tipsL']; ?></a></li>   
              <li><a href="contacto.php"><?php echo $messages['contactusL']; ?></a></li>             
              <li><a href="videos.php"><?php echo $messages['videosL']; ?></a></li> 
            </ul> 
          </li> 
          <li class="dropdown head-dpdn">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-user" aria-hidden="true"></i> 
              <?php
              if(isset($_SESSION['username'])){
                echo $_SESSION['username'];
              }else
              {
                echo $messages['login']; ?><span class="caret"></span><?php
              }
              ?>
              
            </a>
            <ul class="dropdown-menu">
                <?php
                if(isset($_SESSION['username'])){
                    ?>
                    <li><a href="logout.php"><?php echo $messages['Salir']; ?></a></li> 
                    <?php
                }
                else
                {
                    ?>
                    <li><a href="#" data-toggle="modal" data-target="#myModal"><?php echo $messages['login']; ?> </a></li> 
                    <li><a href="signup.html"><?php echo $messages['signup']; ?></a></li> 
                    <?php
                }
                ?>
            </ul> 
        </li> 
        <li class="dropdown head-dpdn">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-language" aria-hidden="true"></i> <?php echo $messages['language']; ?><span class="caret"></span></a>
                <ul class="dropdown-menu abc2">
                    <li>
                        
                        <form action="" method="post" name="es" >
                            <input type="hidden" name="lan"  class="lenguage" value="es">
                            <button type="submit" class="demo btn btn-default">Español</button>           
                        </form>
                        <form action="" method="post" name="en" >
                            <input type="hidden" name="lan"  class="lenguage" value="en">
                           <button type="submit" class="demo btn btn-default">English</button></li>              
                        </form>
                    

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
                        <form id="formbuscar" name="formbuscar" method="post" action="resultados.php">
                            <button type="submit" class="btn btn-default" aria-label="Left Align">
                            <i class="fa fa-search" aria-hidden="true" style="color:black;"> </i>
                            </button>
                            <input type="search" name="eltermino" id="eltermino" placeholder="<?php echo $messages['search']; ?>" required="">
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

            <nav class="navbar navbar-inverse" style="background: #D82787; border: 0px solid;">
                <div class="container-fluid">
                   
                <ul class="nav navbar-nav" style="width: 100%;color: white; background: none;">
                    
                        <li class="" style="width: 25%;">
                        <a href="index.php" style="color: white"> <?php echo $messages['home']; ?></a>  
                        </li>
                    
                    
                    <li class="" style="width: 25%;">    
                        
                                <a href="event/index.html" style="color: white"> <?php echo $messages['event']; ?></a>  

                    </li>
                    <li class="dropdown" style="width: 25%">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: white"><?php echo $messages['buy']; ?>
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu" > 
                             <?php do { ?>
                            <li style="width: 100%;"><a href="categoria.php?c=<?php echo $row_rscategorias['id_categoria']; ?>"><?php echo $row_rscategorias['nombre_es']; ?></a></li>
                            <?php } while ($row_rscategorias = mysql_fetch_assoc($rscategorias)); ?>                      
                            </ul> <!-- .cd-dropdown-content -->
                    </li>
                    <li style="width: 25%;">
                        <a href="contacto.php" style="color: white"> <?php echo $messages['contactus']; ?></a>
                    </li>
                </ul>
                </div>
            </nav>        
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
        <div class="row">
            <div class="col-ms-6 col-md-6"></div>
            <div class="col-ms-6 col-md-6"><a href="#" id="recuperar">Olvide mi Password.</a></div>
        </div>  


        <button class="form-control btn btn-primary" id="ingresar" style="background: #e4e4e4;color: black;border-color: #e4e4e4;"><?php echo $messages['Ingresar']; ?></button>


      </div> <!-- /.modal-footer -->

    </div><!-- /.modal-content -->
    </form>
    <div class="form-group recuperar">
            <form action="recuperar.php" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" id="recuperar" name="recuperar" placeholder="Ingrese Su Correo Electronico">
                    <label for="uPassword" class="input-group-addon glyphicon glyphicon-envelope"></label>
                </div> <!-- /.input-group -->
                <div class="input-group">
                    <button class="form-control btn btn-primary" id="recuperarbtn" style="background: #e4e4e4;color: black;border-color: #e4e4e4;">Recuperar</button>
                    <label for="uPassword2" class="input-group-addon glyphicon glyphicon-send"></label>
                </div> <!-- /.input-group -->
            </form>
        </div> <!-- /.form-group -->
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
        <ul class="list-group">
          <li class="list-group-item list-group-item-danger"><i class="fa fa-info-circle"></i> <?php echo $messages['politicaCompleta1']; ?></li>
          <li class="list-group-item list-group-item-warning"><i class="fa fa-info-circle"></i> <?php echo $messages['politicaCompleta2']; ?></li>
          <li class="list-group-item list-group-item-danger"><i class="fa fa-info-circle"></i> <?php echo $messages['politicaCompleta3']; ?></li>
          <li class="list-group-item list-group-item-warning"><i class="fa fa-info-circle"></i> <?php echo $messages['politicaCompleta4']; ?></li>
          <li class="list-group-item list-group-item-danger"><i class="fa fa-info-circle"></i> <?php echo $messages['politicaCompleta5']; ?></li>
          <li class="list-group-item list-group-item-warning"><i class="fa fa-info-circle"></i> <?php echo $messages['politicaCompleta6']; ?></li>
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
            <h4 class="modal-title" id="myModalLabel" style="text-align: center"><?php echo $messages['pagos']; ?><?php //echo $messages['politicas2']; ?></h4>
        </div> <!-- /.modal-header -->

        <div class="modal-body">
            <ul class="list-group">
                <li class="list-group-item"><?php echo $messages['fp1']; ?></li>
                <li class="list-group-item"><?php echo $messages['fp2']; ?></li>
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
        <h4 class="modal-title" id="myModalLabel" style="text-align: center"><?php echo $messages['sp1']; ?></h4>
      </div> <!-- /.modal-header -->

    <div class="modal-body">

            <div class="row">
                <div class="col-ms-3 col-md-12 col-lg-12">
                    <table class="table">
                        <tr>
                            <td><b><?php echo $messages['coberturaServicio']; ?></b></td>
                            <td><a class="btn btn-primary" data-toggle="collapse" href="#cobertura" role="button" aria-expanded="false" aria-controls="collapseExample">Leer</a></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="collapse" id="cobertura">
                                    <div class="card card-body">
                                        <?php echo $messages['coberturaServicioR']; ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><b><?php echo $messages['hcerpedido']; ?></b></td>
                            <td><a class="btn btn-primary" data-toggle="collapse" href="#anticipacion" role="button" aria-expanded="false" aria-controls="collapseExample">Leer</a></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="collapse" id="anticipacion">
                                    <div class="card card-body">
                                        <?php echo $messages['hcerpedidoR']; ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><b><?php echo $messages['datosexitosaentrega']; ?></b></td>
                            <td><a class="btn btn-primary" data-toggle="collapse" href="#datos" role="button" aria-expanded="false" aria-controls="collapseExample">leer</a></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="collapse" id="datos">
                                    <div class="card card-body">
                                        <ul>
                                            <li><?php echo $messages['datosexitosaentregaR1']; ?></li>
                                            <li><?php echo $messages['datosexitosaentregaR2']; ?></li>
                                            <li><?php echo $messages['datosexitosaentregaR3']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><b><?php echo $messages['modificaionPedido']; ?></b></td>
                            <td><a class="btn btn-primary" data-toggle="collapse" href="#modificacion" role="button" aria-expanded="false" aria-controls="collapseExample">leer</a></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="collapse" id="modificacion">
                                    <div class="card card-body">
                                        <?php echo $messages['modificaionPedidoR1']; ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><b><?php echo $messages['ordenTelefono']; ?></b></td>
                            <td><a class="btn btn-primary" data-toggle="collapse" href="#telefono" role="button" aria-expanded="false" aria-controls="collapseExample">leer</a></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="collapse" id="telefono">
                                    <div class="card card-body">
                                        <?php echo $messages['ordenTelefonoR1']; ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><b><?php echo $messages['diasEntregas']; ?></b></td>
                            <td><a class="btn btn-primary" data-toggle="collapse" href="#dias" role="button" aria-expanded="false" aria-controls="collapseExample">leer</a></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="collapse" id="dias">
                                    <div class="card card-body">
                                        <?php echo $messages['diasEntregasR1']; ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><b><?php echo $messages['servicioGarantizado']; ?></b></td>
                            <td><a class="btn btn-primary" data-toggle="collapse" href="#garantia" role="button" aria-expanded="false" aria-controls="collapseExample">leer</a></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="collapse" id="garantia">
                                    <div class="card card-body">
                                        <?php echo $messages['servicioGarantizadoR1']; ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><b><?php echo $messages['infoSegura']; ?></b></td>
                            <td><a class="btn btn-primary" data-toggle="collapse" href="#informacion" role="button" aria-expanded="false" aria-controls="collapseExample">leer</a></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="collapse" id="informacion">
                                    <div class="card card-body">
                                         <?php echo $messages['infoSeguraR1']; ?>
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


<div class="modal fade" id="servicios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        
            <h1 style="text-align: center"><img src="images/flores-para-el-salvador.png"/></h1>
            <h4 class="modal-title" id="myModalLabel" style="text-align: center"><?php echo $messages['nuestrosServicios']; ?><?php //echo $messages['politicas2']; ?></h4>
        </div> <!-- /.modal-header -->

        <div class="modal-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist" style="background: #D82787;">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" style="color:white;"><?php echo $messages['serviciosGenerales']; ?></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" style="color:white;"><?php echo $messages['arreglos']; ?></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false" style="color:white;"><?php echo $messages['decoraciones']; ?></a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    
                  <div class="tab-pane fade active" id="home" role="tabpanel" aria-labelledby="home-tab">
                      
                        <ul class="list-group">
                            <li class="list-group-item " style="background: #e4e4e4;color: black;border-color: #e4e4e4;" ><?php echo $messages['serviciosGenerales']; ?></li>
                            <li class="list-group-item"><?php echo $messages['servicios1']; ?></li>
                            <li class="list-group-item"><?php echo $messages['servicios2']; ?></li>
                            <li class="list-group-item"><?php echo $messages['servicios3']; ?></li>
                            <li class="" style="text-align: center;list-style-type:none">
                                <img src="images/cards.png" width="150" />
                            </li>
                        </ul>
                  </div>
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <ul class="list-group">
                            <li class="list-group-item " style="background: #e4e4e4;color: black;border-color: #e4e4e4;"><?php echo $messages['arreglos']; ?></li>
                            <li class="list-group-item"><?php echo $messages['arreglos1']; ?></li>
                            <li class="list-group-item"><?php echo $messages['arreglos2']; ?></li>
                            <li class="list-group-item"><?php echo $messages['arreglos3']; ?></li>
                            <li class="list-group-item"><?php echo $messages['arreglos4']; ?></li>
                            <li class="list-group-item"><?php echo $messages['arreglos5']; ?></li>
                            <li class="list-group-item"><?php echo $messages['arreglos6']; ?></li>
                            <li class="list-group-item"><?php echo $messages['arreglos7']; ?></li>
                            <li class="" style="text-align: center;list-style-type:none">
                                <img src="images/prueba.jpg" width="245" height="100" />
                            </li>
                        </ul>
                  </div>
                  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                      <ul class="list-group">
                            <li class="list-group-item" style="background: #e4e4e4;color: black;border-color: #e4e4e4;"><?php echo $messages['decoraciones']; ?></li>
                            <li class="list-group-item"><?php echo $messages['decoraciones1']; ?></li>
                            <li class="list-group-item"><?php echo $messages['decoraciones2']; ?></li>
                            <li class="list-group-item"><?php echo $messages['decoraciones3']; ?></li>
                            <li class="list-group-item"><?php echo $messages['decoraciones4']; ?></li>
                            <li class="list-group-item"><?php echo $messages['decoraciones5']; ?></li>
                            <li class="list-group-item"><?php echo $messages['decoraciones6']; ?></li>
                            <li class="list-group-item"><?php echo $messages['decoraciones7']; ?></li>
                            <li class="" style="text-align: center;list-style-type:none">
                                <img src="images/evento.jpg" width="245" height="100" />
                            </li>
                        </ul>
                  </div>
                </div>
        </div> <!-- /.modal-body -->

    <div class="modal-footer">
        

      </div> <!-- /.modal-footer -->

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.servicios -->

