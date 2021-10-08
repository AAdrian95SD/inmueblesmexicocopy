<?php 
include './Controller.php';
session_start();

$controller = new Controller();

$respuesta = $controller->getLastPropiedades();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="author" content="">
        <meta name="description" content="">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Copoya INMOBILIARIA</title>

        <!--  Favicon -->
        <link rel="shortcut icon" href="images/copoya_inmobiliaria_blanco4.png">

        <!-- CSS -->
        <link rel="stylesheet" href="css/stylesheet.css">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&display=swap" rel="stylesheet">
    </head>

    <body oncontextmenu="return false">
        <!--Loader-->
        <div class="vfx-loader">
            <div class="loader-wrapper">
                <div class="loader-content">
                    <div class="loader-dot dot-1"></div>
                    <div class="loader-dot dot-2"></div>
                    <div class="loader-dot dot-3"></div>
                    <div class="loader-dot dot-4"></div>
                    <div class="loader-dot dot-5"></div>
                    <div class="loader-dot dot-6"></div>
                    <div class="loader-dot dot-7"></div>
                    <div class="loader-dot dot-8"></div>
                    <div class="loader-dot dot-center"></div>
                </div>
            </div>
        </div>
        <!-- Loader end -->

        <!-- Wrapper -->
        <div id="wrapper"> 


            <!-- Header Container -->
            <header id="header-container"> 
                <!-- Header -->
                <div id="header">
                    <div class="container"> 
                        <!-- Left Side Content -->
                        <div class="left-side"> 
                            <div id="logo"> <a href="index.php"><img src="images/copoya_inmobiliaria_blanco4.png" alt=""></a> </div>
                            <div class="mmenu-trigger">
                                <button class="hamburger hamburger--collapse" type="button"> <span class="hamburger-box"> <span class="hamburger-inner"></span> </span> </button>
                            </div>
                            <!-- Main Navigation -->
                            <nav id="navigation" class="style-1">
                                <ul id="responsive">
                                    <li><a class="current" href="#">Inicio</a></li>
                                    <li><a href="conocenos.php">Conócenos</a></li>
                                    <li><a href="#footer">Contacto</a></li>
                                </ul>
                            </nav>
                            <div class="clearfix"></div>
                        </div>
                        <!-- Left Side Content / End --> 

                    </div>
                </div>
                <!-- Header / End --> 
            </header>
            <div class="clearfix"></div>
            <!-- Header Container / End --> 

            <!-- Banner -->
            <div class="parallax" data-background="images/copoya_02.jpg" data-color="#36383e" data-color-opacity="0.65" data-img-width="2500" data-img-height="1600">
                <div class="utf-parallax-content-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="utf-main-search-container-area">
                                    <h2>Copoya INMOBILIARIA</h2>

                                    <div class="announce">ASEGURAMOS TU BIENESTAR CON NUESTRA EXPERIENCIA</div>
                                    <form class="utf-main-search-form-item">
                                        <div class="utf-search-type-block-area">
                                            <div class="search-type">
                                                <label class="active">
                                                    <input class="first-tab" name="venta" checked="checked" type="radio" value="1">Venta</label>
                                                <label>
                                                    <input name="venta" type="radio" value="2">Renta</label>
                                            </div>
                                        </div>
                                        <div class="utf-main-search-box-area"> 
                                            <div class="row with-forms"> 
                                                <div class="col-md-8">
                                                    <select id="estado" data-placeholder="Select Area" title="Select Area" class="utf-chosen-select-single-item">
                                                        <option>Selecciona un estado</option>
                                                        <option value="1">Morelos</option>
                                                        <option value="2">Jailsco</option>
                                                        <option value="3">Chiapas</option>                    
                                                    </select>
                                                </div>

                                                <div class="col-md-4">
                                                    <a onclick="valores()" class="button utf-search-btn-item"><i class="fa fa-search"></i>Buscar inmuebles</a> 
                                                </div>

                                            </div>

                                            <div class="utf-more-search-options-area">
                                                <div class="utf-more-search-options-area-container"> 
                                                    <div class="row with-forms">
                                                        <div class="col-md-4">

                                                        </div>        
                                                    </div>

                                                </div>
                                            </div>                  
                                        </div>                
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <section class="fullwidth" data-background-color="#ffffff">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12"> 
                            <div class="utf-section-headline-item centered margin-bottom-30 margin-top-0">
                                <h3 class="headline"><span>Propiedades recientes</span></h3>
                                <div class="utf-headline-display-inner-item">Inmuebles</div>
                                <p class="utf-slogan-text"></p>
                            </div>  
                        </div>
                        <div class="col-md-12">
                            <div class="carousel"> 
                                <?php
                                    foreach ($respuesta as $elemento) {
                                        $imagenes = $controller->getfotos($elemento[0]);
                                        print '<div class="utf-carousel-item-area">';
                                        print '<div class="utf-listing-item">';
                                        print '<a href="detail.php?item='.$elemento[0].'" class="utf-smt-listing-img-container">';
                                        print '<div class="utf-listing-badges-item">';
                                        if($elemento[2] == 'Renta'){
                                            print '<span class="for-rent">Renta</span>';    
                                        }else{
                                            print '<span class="for-sale">Venta</span>';    
                                        }
                                        
                                        print '</div>';
                                        print '<div class="utf-listing-img-content-item">';
                                            print '<img class="utf-user-picture" src="'.$elemento[23].'" alt="user_1" />';
                                        print '</div>';
                                        print '<div class="utf-listing-carousel-item">';
                                        
                                        foreach ($imagenes as $foto) {
                                            
                                            print '<div><img src="'.$foto[1].'" alt=""></div>';
                                        }
                                        print '</div>';
                                        print '</a>';
                                        print '<div class="utf-listing-content">';       
                                        print '<div class="utf-listing-title">';
                                        print '<span class="utf-listing-price">'.$elemento[4].' MXN</span>';                 
                                        print '<h4><a href="detail.php?item='.$elemento[0].'">'.$elemento[1].'</a></h4>';
                                        print '<span class="utf-listing-address"><i class="icon-material-outline-location-on"></i>'.$elemento[7].' '.$elemento[28].'</span>';                        
                                        print '</div> ';       
                                        print '<ul class="utf-listing-features">';
                                        print '<li><i class="fa fa-bed"></i><span>'.$elemento[12].'</span></li>';
                                        print '<li><i class="fa fa-car"></i><span>'.$elemento[6].'</span></li>';                       
                                        print '<li><i class="fa fa-bath"></i><span>'.$elemento[13].'</span></li>';
                                        print '<br>';                     
                                        print '<br>';                     
                                        print '<br>';                     
                                        print '</ul>'; 
                                        print '<ul class="utf-listing-features">';
                                        print '<li><i class="icon-line-awesome-arrows"></i><span>'.$elemento[5].'</span> Construcción</li>';
                                        print '<li><i class="icon-line-awesome-arrows"></i><span>'.$elemento[15].'  </span> Terreno</li>';          
                                        print '</ul>'; 
                                        print '<div class="utf-listing-user-info"><a target="_blank" href="https://api.whatsapp.com/send?phone=521'.$elemento[22].'&text=Hola"><i class="icon-line-awesome-user"></i>'.$elemento[18].' '.$elemento[19].'</a> <span>'.$elemento[22].'</span></div>';   
                                        print '</div>';
                                        print '</div>';
                                        print '</div>';
                                     }
                                  ?>
                               

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="fullwidth" data-background-color="#ffffff">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12"> 
                            <div class="utf-section-headline-item centered margin-bottom-30 margin-top-0">
                                <h3 class="headline"><span></span>Viviendas en</h3>
                                <div class="utf-headline-display-inner-item">Nuestras ciudades</div>
                                <p class="utf-slogan-text"></p>
                            </div>  
                        </div>
                        <div class="col-md-4 col-sm-6"> 
                            <a href="propiedades.php?tab=1&type=0" class="img-box">

                                <img src="img_dir/cuernavaca.jfif" alt="" />
                                <div class="utf-cat-img-box-content visible">
                                    <h4>Inmuebles en Morelos</h4>
                                    <span>Ver propiedades</span> 
                                </div>
                            </a> 
                        </div>
                        <div class="col-md-3 col-sm-6"> 
                            <a href="propiedades.php?tab=2&type=0" class="img-box">
                                <img src="img_dir/jalisco.jpg" alt="" />
                                <div class="utf-cat-img-box-content visible">
                                    <h4>Inmuebles en Jalisco</h4>
                                    <span>Ver propiedades</span> 
                                </div>
                            </a> 
                        </div>
                        <div class="col-md-5 col-sm-6"> 
                            <a href="propiedades.php?tab=3&type=0" class="img-box">

                                <img src="img_dir/chiapas.jpg" alt="" />
                                <div class="utf-cat-img-box-content visible">
                                    <h4>Inmuebles en Chiapas</h4>
                                    <span>Ver propiedades</span> 
                                </div>
                            </a> 
                        </div>
                        
                        
                    </div>
                    <div class="utf-centered-button margin-top-10">
                        <a href="propiedades.php?tab=0&type=0" class="button">Ver todos los inmuebles</a> 
                    </div>
                </div>
            </section>

            <!-- Footer -->
  <div class="margin-top-65"></div>
  <div id="footer"> 
    <div class="container">
      <div class="row">
      <div class="col-md-4 col-sm-12 col-xs-12"> 
          <a><img class="footer-logo" src="images/copoya_inmobiliaria_blanco4.png" alt=""></a>
          <ul class="utf-footer-links-item">
            <li><a> Tulipán portugués #19, entre Tulipán Italiano e Ingles, Col. Tulipanes, C.P. 62388, Cuernavaca Morelos.</a></li>
          </ul>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-8">
          <h4>Datos de contacto</h4>
          <ul class="utf-footer-links-item">
            <li><a>asesorinmobiliario.copoya@gmail.com</a></li>
            <li><a>inmobiliaria.copoya@gmail.com</a></li>
            <li><a>Inmobiliaria.copoyagdl@gmail.com</a></li>
          </ul>
        </div>
        <div class="col-md-2 col-sm-3 col-xs-6">
          <h4>Whatsapp</h4>
          <ul class="utf-footer-links-item">
            <li><a href="https://api.whatsapp.com/send?phone=5219621760701&text=Hola" target="_blank">962-176-0701</a></li>
            <li><a href="https://api.whatsapp.com/send?phone=5219621551307&text=Hola" target="_blank">962-155-1307</a></li>
            <li><a href="https://api.whatsapp.com/send?phone=5217771987223&text=Hola" target="_blank">777-198-7223</a></li>            
          </ul>
        </div>
    <div class="col-md-2 col-sm-3 col-xs-6">
          <h4>Social</h4>
          <ul class="utf-footer-links-item">
            <li><a href="https://www.facebook.com/copoyainmobiliaria" target="_blank">Facebook</a></li>
          </ul>
        </div>  
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="copyrights">Powered by : INTEGRACION DE HABILIDADES S.A DE C.V</div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer / End --> 
            <!-- Back To Top Button -->
            <div id="backtotop"><a href="#"></a></div>
        </div>  
        
        <script>
        
        function valores(){
            var estado = $( "#estado" ).val();
            var radioValue = $("input[name='venta']:checked").val();
            console.log(estado);
            if(estado === 'Selecciona un estado'){
                alert('Selecciona un estado')
            }else{
                window.location.href = 'propiedades.php?tab='+estado+'&type='+radioValue;
            }
            
        }
        
        </script>
      

        <!-- Scripts --> 
        <script src="scripts/jquery-3.3.1.min.js"></script> 
        <script src="scripts/chosen.min.js"></script> 
        <script src="scripts/magnific-popup.min.js"></script> 
        <script src="scripts/owl.carousel.min.js"></script> 
        <script src="scripts/rangeSlider.js"></script> 
        <script src="scripts/sticky-kit.min.js"></script> 
        <script src="scripts/slick.min.js"></script> 
        <script src="scripts/masonry.min.js"></script> 
        <script src="scripts/mmenu.min.js"></script> 
        <script src="scripts/tooltips.min.js"></script> 
        <script src="scripts/custom_jquery.js"></script> 
    </body>
</html>