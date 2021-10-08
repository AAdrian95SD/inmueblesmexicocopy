<?php
include './Controller.php';
session_start();

$controller = new Controller();

$respuesta = $controller->getLastPropiedades();

$inmobiliarias = $controller->getallInmobiliarias();


$estados = $controller->getEstados();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="author" content="">
        <meta name="description" content="">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inmuebles en México</title>

        <!--  Favicon -->
        <link rel="shortcut icon" href="img_dir/inmobiliarias/inmuebles_mexico_ico.png">

        <!-- CSS -->
        <link rel="stylesheet" href="css/stylesheet.css">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="@sweetalert2/themes/dark/dark.css">
        <script src="sweetalert2/dist/sweetalert2.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://unpkg.com/sweetalert2@7.19.3/dist/sweetalert2.all.js"></script>
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
                <div id="header" style="background: #18253e;">
                    <div class="container"> 
                        <!-- Left Side Content -->
                        <div class="left-side"> 
                            <div id="logo"> <a href="index.php"><img src="img_dir/inmobiliarias/inmuebles_mexico_ico.png" alt=""></a> </div>
                            <div class="mmenu-trigger">
                                <button class="hamburger hamburger--collapse" type="button"> <span class="hamburger-box"> <span class="hamburger-inner"></span> </span> </button>
                            </div>
                            <!-- Main Navigation -->
                            <nav id="navigation" class="style-1" style="background: #18253e;">
                                <ul id="responsive">
                                    <li><a class="current" href="#" style="color: white">Inicio</a></li>
                                    <li><a href="conocenos.php" style="color: white">Conócenos</a></li>
                                    <li><a href="#footer" style="color: white">Contacto</a></li>
                                    <li><a target="_blank" href="https://precalificaciones.infonavit.org.mx/Precalificacion/precalif.xhtml?tipoProducto=CI" style="color: white">Precalificate</a></li>
                                    <li><a href="login.php" style="color: white">Entrar</a></li>
                                    <li><a href="crear-usuario.php" style="color: white">Registrarme</a></li>
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
            <!-- Banner -->
            <div class="parallax" data-background="images/banner.jpg" data-color="#36383e" data-color-opacity="0.1" data-img-width="2500" data-img-height="1600">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="search-container"> 
                                <form action="propiedades.php" method="post" name="post_propiedades">       
                                    <h2>Encuentra tu lugar ideal</h2>
                                    <div class="announce"><p style="color: #00283a; font-weight: bold;">Aseguramos tu bienestar con nuestra experiencia.</p></div>
                                    <div class="row with-forms"> 
                                        <!-- Select City -->
                                        <div class="col-md-2">
                                            <select data-placeholder="Seleccione..." title="Seleccione..." name="tab" class="utf-chosen-select-single-item">
                                                <option label="Seleccione..."></option>
                                                <?php
                                                foreach ($estados as $estado) {
                                                    print '<option value="' . $estado[0] . '">' . $estado[1] . '</option>';
                                                }
                                                ?>                      
                                            </select>
                                        </div>

                                        <!-- Property Type -->
                                        <div class="col-md-2">
                                            <select data-placeholder="Tipo" name="type" class="utf-chosen-select-single-item">
                                                <option>Departamento</option>
                                                <option>Casa</option>
                                                <option>Comercial</option>
                                                <option>Terreno/Lote</option>
                                                <option>Oficina</option>
                                                <option>Casa en condominio</option>
                                                <option>Bodega</option>
                                            </select>
                                        </div>

                                        <!-- Status -->
                                        <div class="col-md-2">
                                            <select data-placeholder="Estatus" name="estatus" class="utf-chosen-select-single-item">
                                                <option>Venta</option>
                                                <option>Renta</option>
                                            </select>
                                        </div>

                                        <!-- Main Search Input -->
                                        <div class="col-md-6">
                                            <div class="utf-main-search-input-item">
                                                <input type="text" placeholder="escribe algo..." name="text" value=""/>


                                                <button class="button" type="submit">Buscar</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h4 class="utf-cat-home-item-list">¿Que inmueble buscas?</h4>
                                        <ul class="utf-home-iconbox">
                                            <li class="list-inline-item" onclick="myRedirect('propiedades.php', 'type', 'Casa en condominio');"><div class="icon"><span class="icon-line-awesome-building"></span><p>Condominios</p></div></li>
                                            <li class="list-inline-item" onclick="myRedirect('propiedades.php', 'type', 'Casa');"><div class="icon"><span class="icon-feather-home"></span><p>Casa</p></div></li>
                                            <li class="list-inline-item" onclick="myRedirect('propiedades.php', 'type', 'Comercial');"><div class="icon"><span class="icon-material-outline-location-city"></span><p>Comercial</p></div></li>
                                            <li class="list-inline-item" onclick="myRedirect('propiedades.php', 'type', 'Departamento');"><div class="icon"><span class="icon-material-outline-business"></span><p>Departamento</p></div></li>
                                        </ul>
                                    </div>
                                </form>
                                <!-- Row With Forms / End --> 
                            </div>		  
                        </div>
                    </div>
                </div>
            </div>


            <section class="fullwidth" data-background-color="#ffffff">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12"> 
                            <div class="utf-section-headline-item centered margin-bottom-30 margin-top-0">
                                <h3 class="headline"><span></span>Viviendas en</h3>
                                <p class="utf-slogan-text"></p>
                            </div>  
                        </div>
                        <div class="col-md-4 col-sm-6"> 
                            <a href="companies.php?tab=1&type=0" class="img-box">

                                <img src="img_dir/estados/cuernavaca.jfif" alt="" />
                                <div class="utf-cat-img-box-content visible">
                                    <h4>INMUEBLES EN MORELOS</h4>
                                    <span>Ver propiedades</span> 
                                </div>
                            </a> 
                        </div>
                        <div class="col-md-4 col-sm-6"> 
                            <a href="companies.php?tab=2&type=0" class="img-box">
                                <img src="img_dir/estados/jalisco.jpg" alt="" />
                                <div class="utf-cat-img-box-content visible">
                                    <h4>INMUEBLES EN JALISCO</h4>
                                    <span>Ver propiedades</span> 
                                </div>
                            </a> 
                        </div>
                        <div class="col-md-4 col-sm-6"> 
                            <a href="companies.php?tab=3&type=0" class="img-box">

                                <img src="img_dir/estados/chiapas.jpg" alt="" />
                                <div class="utf-cat-img-box-content visible">
                                    <h4>INMUEBLES EN CHIAPAS</h4>
                                    <span>Ver propiedades</span> 
                                </div>
                            </a> 
                        </div>
                        <div class="col-md-4 col-sm-6"> 
                            <a href="companies.php?tab=27&type=0" class="img-box">
                                <img src="img_dir/estados/san_luis.jpg" alt="" />
                                <div class="utf-cat-img-box-content visible">
                                    <h4>INMUEBLES EN SAN LUIS POTOSI</h4>
                                    <span>Ver propiedades</span> 
                                </div>
                            </a> 
                        </div>
                        <div class="col-md-4 col-sm-6"> 
                            <a href="companies.php?tab=11&type=0" class="img-box"> 
                                <div class="utf-listing-badges-item"></div>
                                <img src="img_dir/estados/chihuahua.jpg" alt="" />
                                <div class="utf-cat-img-box-content visible">
                                    <h4>INMUEBLES EN CHIHUAHUA</h4>
                                    <span>Ver propiedades</span> 
                                </div>
                            </a> 
                        </div>

                        <div class="col-md-4 col-sm-6"> 
                            <a href="companies.php?tab=16&type=0" class="img-box"> 
                                <div class="utf-listing-badges-item"></div>
                                <img src="img_dir/estados/hidalgo.jpg" alt="" />
                                <div class="utf-cat-img-box-content visible">
                                    <h4>INMUEBLES EN HIDALGO</h4>
                                    <span>Ver propiedades</span> 
                                </div>
                            </a> 
                        </div>
                        
                        <div class="col-md-4 col-sm-6"> 
                            <a href="companies.php?tab=33&type=0" class="img-box"> 
                                <div class="utf-listing-badges-item"></div>
                                <img src="img_dir/estados/veracruz.jpg" alt="" />
                                <div class="utf-cat-img-box-content visible">
                                    <h4>INMUEBLES EN VERACRUZ</h4>
                                    <span>Ver propiedades</span> 
                                </div>
                            </a> 
                        </div>
                        
                         <div class="col-md-4 col-sm-6"> 
                            <a href="companies.php?tab=24&type=0" class="img-box"> 
                                <div class="utf-listing-badges-item"></div>
                                <img src="img_dir/estados/puebla.jpg" alt="" />
                                <div class="utf-cat-img-box-content visible">
                                    <h4>INMUEBLES EN PUEBLA</h4>
                                    <span>Ver propiedades</span> 
                                </div>
                            </a> 
                        </div>
                        
                        <div class="col-md-4 col-sm-6"> 
                            <a href="companies.php?tab=18&type=0" class="img-box"> 
                                <div class="utf-listing-badges-item"></div>
                                <img src="img_dir/estados/estado_mexico.jpg" alt="" />
                                <div class="utf-cat-img-box-content visible">
                                    <h4>INMUEBLES EN ESTADO DE MÉXICO</h4>
                                    <span>Ver propiedades</span> 
                                </div>
                            </a> 
                        </div>


                    </div>
                    <div class="utf-centered-button margin-top-10">
                        <a href="propiedades.php?res=1" class="button">Ver todos los inmuebles</a> 
                    </div>
                </div>
            </section>

            <section class="fullwidth" data-background-color="#fbfbfb">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">	
                            <div class="utf-section-headline-item centered margin-bottom-30 margin-top-0">
                                <h3 class="headline"><span>Propiedades en venta recientes</span></h3>
                            </div>  
                        </div>

                        <!-- Carousel -->
                        <div class="col-md-12">
                            <div class="carousel"> 
                                <?php
                                foreach ($respuesta as $elemento) {

                                    $imagenes = $controller->getfotos($elemento[0]);
                                    print '<div class="utf-carousel-item-area">';
                                    print '<div class="utf-listing-item">';
                                    print '<a href="detail.php?item=' . $elemento[0] . '" class="utf-smt-listing-img-container">';
                                    print '<div class="utf-listing-badges-item">';
                                    if ($elemento[2] == 'Renta') {
                                        print '<span class="for-rent">Renta</span>';
                                    } else {
                                        print '<span class="for-sale">Venta</span>';
                                    }

                                    print '</div>';
                                    print '<div class="utf-listing-img-content-item">';
                                    print '<img class="utf-user-picture" src="' . $elemento[23] . '" alt="user_1" />';
                                    print '</div>';
                                    print '<div class="utf-listing-carousel-item">';

                                    foreach ($imagenes as $foto) {

                                        print '<div><img src="' . $foto[1] . '" alt=""></div>';
                                    }
                                    print '</div>';
                                    print '</a>';
                                    print '<div class="utf-listing-content">';
                                    print '<div class="utf-listing-title">';
                                    print '<span class="utf-listing-price">' . $elemento[4] . ' MXN</span>';
                                    print '<h4><a href="detail.php?item=' . $elemento[0] . '">' . $elemento[1] . '</a></h4>';
                                    print '<span class="utf-listing-address"><a target="_blank" href="https://maps.google.com/?q=' . $elemento[30] . ',' . $elemento[31] . '"> <i class="icon-material-outline-location-on"></i>' . $elemento[7] . ' ' . $elemento[28] . '</a></span>';
                                    print '</div> ';
                                    print '<ul class="utf-listing-features">';
                                    print '<li><i class="fa fa-bed"></i><span>' . $elemento[12] . '</span></li>';
                                    print '<li><i class="fa fa-car"></i><span>' . $elemento[6] . '</span></li>';
                                    print '<li><i class="fa fa-bath"></i><span>' . $elemento[13] . '</span></li>';
                                    print '<br>';
                                    print '<br>';
                                    print '<br>';
                                    print '</ul>';
                                    print '<ul class="utf-listing-features">';
                                    print '<li><i class="icon-line-awesome-arrows"></i><span>' . $elemento[5] . '</span> Construcción</li>';
                                    print '<li><i class="icon-line-awesome-arrows"></i><span>' . $elemento[15] . '  </span> Terreno</li>';
                                    print '</ul>';
                                    print '<div class="utf-listing-user-info"><a target="_blank" href="https://api.whatsapp.com/send?phone=521' . $elemento[22] . '&text=Hola"><i class="icon-line-awesome-user"></i>' . $elemento[18] . ' ' . $elemento[19] . '</a> <span>' . $elemento[22] . '</span></div>';
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
                                <h3 class="headline"><span>Propiedades en renta recientes</span></h3>
                                <p class="utf-slogan-text"></p>
                            </div>  
                        </div>

                        <!-- Carousel -->
                        <div class="col-md-12">
                            <div class="carousel"> 
                                <?php
                                foreach ($respuesta as $elemento) {
                                    $imagenes = $controller->getfotos($elemento[0]);
                                    print '<div class="utf-carousel-item-area">';
                                    print '<div class="utf-listing-item">';
                                    print '<a href="detail.php?item=' . $elemento[0] . '" class="utf-smt-listing-img-container">';
                                    print '<div class="utf-listing-badges-item">';
                                    if ($elemento[2] == 'Renta') {
                                        print '<span class="for-rent">Renta</span>';
                                    } else {
                                        print '<span class="for-sale">Venta</span>';
                                    }

                                    print '</div>';
                                    print '<div class="utf-listing-img-content-item">';
                                    print '<img class="utf-user-picture" src="' . $elemento[23] . '" alt="user_1" />';
                                    print '</div>';
                                    print '<div class="utf-listing-carousel-item">';

                                    foreach ($imagenes as $foto) {

                                        print '<div><img src="' . $foto[1] . '" alt=""></div>';
                                    }
                                    print '</div>';
                                    print '</a>';
                                    print '<div class="utf-listing-content">';
                                    print '<div class="utf-listing-title">';
                                    print '<span class="utf-listing-price">' . $elemento[4] . ' MXN</span>';
                                    print '<h4><a href="detail.php?item=' . $elemento[0] . '">' . $elemento[1] . '</a></h4>';
                                    print '<span class="utf-listing-address"><a target="_blank" href="https://maps.google.com/?q=' . $elemento[30] . ',' . $elemento[31] . '"><i class="icon-material-outline-location-on"></i>' . $elemento[7] . ' ' . $elemento[28] . '</a></span>';
                                    print '</div> ';
                                    print '<ul class="utf-listing-features">';
                                    print '<li><i class="fa fa-bed"></i><span>' . $elemento[12] . '</span></li>';
                                    print '<li><i class="fa fa-car"></i><span>' . $elemento[6] . '</span></li>';
                                    print '<li><i class="fa fa-bath"></i><span>' . $elemento[13] . '</span></li>';
                                    print '<br>';
                                    print '<br>';
                                    print '<br>';
                                    print '</ul>';
                                    print '<ul class="utf-listing-features">';
                                    print '<li><i class="icon-line-awesome-arrows"></i><span>' . $elemento[5] . '</span> Construcción</li>';
                                    print '<li><i class="icon-line-awesome-arrows"></i><span>' . $elemento[15] . '  </span> Terreno</li>';
                                    print '</ul>';
                                    print '<div class="utf-listing-user-info"><a target="_blank" href="https://api.whatsapp.com/send?phone=521' . $elemento[22] . '&text=Hola"><i class="icon-line-awesome-user"></i>' . $elemento[18] . ' ' . $elemento[19] . '</a> <span>' . $elemento[22] . '</span></div>';
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

            <div class="parallax" data-background="images/fondo_abajo.jpg" data-color="#36383e" data-color-opacity="0.1" data-img-width="2500" data-img-height="1600">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="search-container">
                            <form action="" method="post" name="post_propiedades">
                                <h2>Únete a Inmuebles en México</h2>
                                <div class="announce">
                                    <p style="color: #ffffff; font-weight: bold;">Tenemos los mejores planes para ti</p>
                                </div>
                                <div class="row with-forms">
                                </div>
                                <div class="row">
                                    <ul class="utf-home-iconbox">
                                        <button class="button" type="submit">Registrarme</button>
                                    </ul>
                                </div>
                            </form>
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
                                <h3 class="headline"><span>Nuestros socios bienes raíces</span></h3>
                                <div class="utf-headline-display-inner-item"></div>
                                <p class="utf-slogan-text"></p>
                            </div>  
                        </div>
                        <div class="col-md-12">
                            <div class="carousel"> 
                                
                                <?php
                                foreach ($inmobiliarias as $elemento) {


                                    print ' <div class="agents-profile agency">
                                            
                                    <div class="utf-agent-content">
                                    <div id="logo"> <a class=""><img src="' . $elemento[7] . '" alt=""></a> </div>
                                        <br>
                                        <br>
                                        <br>
                                      <div class="utf-agent-name">

                                        <h4><a href="#/" onclick="myRedirect_company(\'propiedades.php\', \'companie\', \'' . $elemento[0] . '\');">' . $elemento[1] . '</a></h4>
                                        <ul class="utf-agent-contact-details">
                                                        <li><i class="icon-material-outline-business"></i>' . $elemento[11] . '</li>
                                                            <li><a target="_blank" href="https://api.whatsapp.com/send?phone=521'.str_replace("-", "", $elemento[3]).'&text=Hola"><i class="icon-feather-smartphone"></i>' . $elemento[3] . '</li>
                                                            <li><i class="icon-material-outline-email"></i><a>' . $elemento[5] . '</a></li>
                                                    </ul> 
                                                    <ul class="utf-social-icons">';

                                    $social = $controller->getSocialInmobiliaria($elemento[0]);

                                    foreach ($social as $dato) {
                                        if ($dato[2] == 1) {
                                            print '<li><a class="facebook" href="' . $dato[1] . '"><i class="icon-facebook"></i></a></li>';
                                        } else if ($dato[2] == 2) {
                                            print '<li><a class="twitter" href="' . $dato[1] . '"><i class="icon-twitter"></i></a></li>';
                                        } else if ($dato[2] == 3) {
                                            print '<li><a class="instagram" href="' . $dato[1] . '"><i class="icon-instagram"></i></a></li>';
                                        }
                                    }
                                    print '
                                                    </ul>
                                                  </div>
                                                  <div class="clearfix"></div>
                                      <p></p>                      
                                    </div>
                                  </div>';
                                    /* print '<div class="utf-carousel-item-area">';
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
                                      print '</div>'; */
                                }
                                ?>


                            </div>
                        </div>
                    </div>
                </div>
            </section>


            


            <!-- Photo Section -->
            <div class="utf-photo-section-block" style="background: url(img_dir/jalisco.jpg)">
                <div class="utf-photo-text-content white-font">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-md-12 col-sm-12">
                                <h2>Inmuebles en México</h2>
                                <p>Encuentra los mejores lugares para vivir, elije una de nuestras propiedades de nuestra gran variedad de bienes raíces, no solo encontraras una casa, tambien tenemos bodegas, oficinas y terrenos. El inmueble que siempre buscaste lo encontraras aquí.</p>						
                                <ul class="utf-download-text">
                                    <li>
                                        <a href="#/" onclick="myRedirect('propiedades.php', 'type', 'Casa en condominio');" class="tooltip top" title="Ver Condominios">
                                            <i class="icon-line-awesome-building"></i>
                                            <span>Condominios</span>
                                            <p></p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#/" onclick="myRedirect('propiedades.php', 'type', 'Casa');" class="tooltip top" title="Ver Casas">
                                            <i class="icon-feather-home"></i>
                                            <span>Casa</span>
                                            <p></p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#/" onclick="myRedirect('propiedades.php', 'type', 'Comercial');" class="tooltip top" title="Ver comercial">
                                            <i class="icon-material-outline-location-city"></i>
                                            <span>Comercial</span>
                                            <p></p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#/" onclick="myRedirect('propiedades.php', 'type', 'Departamento');" class="tooltip top" title="ver departamentos">
                                            <i class="icon-material-outline-business"></i>
                                            <span>Departamento</span>
                                            <p></p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="download-img">
                                    <img src="img_dir/alisco.jpg" alt="">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
            </div>
            <!-- Photo Section / End -->       
            

            <!-- Footer -->
            <div class="margin-top-65"></div>
            <div id="footer"> 
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-12"> 
                            <h4 style="color: #ffffff">Inmuebles en México</h4>
                            <ul class="utf-footer-links-item">
                                <h5 style="color: #ffffff">Somos tu mejor opción para encontrar tu lugar ideal.</h5>
                            </ul>
                        </div>

                        <div class="col-md-2 col-sm-3 col-xs-6">
                            <h4 style="color: #ffffff">Inmuebles</h4>
                            <ul class="utf-footer-links-item">
                                <li><a href="#/" onclick="myRedirect('propiedades.php', 'type', 'Departamento');">Departamento</a></li>
                                <li><a href="#/" onclick="myRedirect('propiedades.php', 'type', 'Casa');">Casas</a></li>
                                <li><a href="#/" onclick="myRedirect('propiedades.php', 'type', 'Comercial');">Comercial</a></li>
                                <li><a href="#/" onclick="myRedirect('propiedades.php', 'type', 'Terreno/Lote');">Terreno/lote</a></li>
                                <li><a href="#/" onclick="myRedirect('propiedades.php', 'type', 'Oficina');">Oficina</a></li>
                                <li><a href="#/" onclick="myRedirect('propiedades.php', 'type', 'Casa en condominio');">Casa en condominio</a></li>
                                <li><a href="#/" onclick="myRedirect('propiedades.php', 'type', 'Bodega');">Bodega</a></li>                                
                            </ul>
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-8">
                            <h4 style="color: #ffffff">Renta</h4>
                            <ul class="utf-footer-links-item">
                                <li><a href="#/" onclick="myRedirect_vr('propiedades.php', 'type', 'Departamento', 'estatus', 'Renta');">Departamento en renta</a></li>
                                <li><a href="#/" onclick="myRedirect_vr('propiedades.php', 'type', 'Casa', 'estatus', 'Renta');">Casas en renta</a></li>
                                <li><a href="#/" onclick="myRedirect_vr('propiedades.php', 'type', 'Comercial', 'estatus', 'Renta');">Comercial en renta</a></li>
                                <li><a href="#/" onclick="myRedirect_vr('propiedades.php', 'type', 'Terreno/Lote', 'estatus', 'Renta');">Terreno/lote en renta </a></li>
                                <li><a href="#/" onclick="myRedirect_vr('propiedades.php', 'type', 'Oficina', 'estatus', 'Renta');">Oficina en renta</a></li>
                                <li><a href="#/" onclick="myRedirect_vr('propiedades.php', 'type', 'Casa en condominio', 'estatus', 'Renta');">Casa en condominio en renta</a></li>
                                <li><a href="#/" onclick="myRedirect_vr('propiedades.php', 'type', 'Bodega', 'estatus', 'Renta');">Bodega en renta</a></li>
                            </ul>
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-8">
                            <h4 style="color: #ffffff">Venta</h4>
                            <ul class="utf-footer-links-item">
                                <li><a href="#/" onclick="myRedirect_vr('propiedades.php', 'type', 'Departamento', 'estatus', 'Venta');" >Departamento en venta</a></li>
                                <li><a href="#/" onclick="myRedirect_vr('propiedades.php', 'type', 'Casa', 'estatus', 'Venta');">Casas en venta</a></li>
                                <li><a href="#/" onclick="myRedirect_vr('propiedades.php', 'type', 'Comercial', 'estatus', 'Venta');">Comercial en venta</a></li>
                                <li><a href="#/" onclick="myRedirect_vr('propiedades.php', 'type', 'Terreno/Lote', 'estatus', 'Venta');">Terreno/lote en venta </a></li>
                                <li><a href="#/" onclick="myRedirect_vr('propiedades.php', 'type', 'Oficina', 'estatus', 'Venta');">Oficina en venta</a></li>
                                <li><a href="#/" onclick="myRedirect_vr('propiedades.php', 'type', 'Casa en condominio', 'estatus', 'Venta');">Casa en condominio en venta</a></li>
                                <li><a href="#/" onclick="myRedirect_vr('propiedades.php', 'type', 'Bodega', 'estatus', 'Venta');">Bodega en venta</a></li>
                            </ul>
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-6">
                            <h4 style="color: #ffffff">Ciudades</h4>
                            <ul class="utf-footer-links-item">
                                 <li><a href="companies.php?tab=1&type=0">Morelos</a></li>
                                    <li><a target="_blank" href="companies.php?tab=2&type=0">Jalisco</a></li>
                                    <li><a target="_blank" href="companies.php?tab=3&type=0">Chiapas</a></li>
                                    <li><a target="_blank" href="companies.php?tab=11&type=0">Chihuahua</a></li>
                                    <li><a target="_blank" href="companies.php?tab=16&type=0">Hidalgo</a></li>
                                    <li><a target="_blank" href="companies.php?tab=27&type=0">San Luis Potosi</a></li>
                                    <li><a target="_blank" href="companies.php?tab=33&type=0">Veracruz</a></li>
                                    <li><a target="_blank" href="companies.php?tab=24&type=0">Puebla</a></li>
                                    <li><a target="_blank" href="companies.php?tab=18&type=0">Estado de México</a></li>
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

            function valores() {
                var estado = $("#estado").val();
                var radioValue = $("input[name='venta']:checked").val();
                console.log(estado);
                if (estado === 'Selecciona un estado') {
                    alert('Selecciona un estado')
                } else {
                    window.location.href = 'propiedades.php?tab=' + estado + '&type=' + radioValue;
                }

            }

            var myRedirect = function (redirectUrl, arg, value) {
                var form = $('<form target="_blank" action="' + redirectUrl + '" method="post">' +
                        '<input type="hidden" name="' + arg + '" value="' + value + '"></input>' + '</form>');
                $('body').append(form);
                $(form).submit();
            };

            var myRedirect_company = function (redirectUrl, arg, value) {
                var form = $('<form target="_blank" action="' + redirectUrl + '" method="post">' +
                        '<input type="hidden" name="' + arg + '" value="' + value + '"></input>' + '</form>');
                $('body').append(form);
                $(form).submit();
            };


            var myRedirect_vr = function (redirectUrl, arg, value, arg2, value2) {
                var form = $('<form target="_blank" action="' + redirectUrl + '" method="post">' +
                        '<input type="hidden" name="' + arg + '" value="' + value + '"></input>' +
                        '<input type="hidden" name="' + arg2 + '" value="' + value2 + '"></input>' + '</form>');
                $('body').append(form);
                $(form).submit();
            };
            function navigate(tab, type, estatus, companie, text) {
                $.redirect('propiedades.php', {'tab': '1', 'estatus': 'VENTA'});
                /*$.ajax({
                 type: "POST",
                 url: "propiedades.php",
                 data: { 'submit': "submit",  'tab': tab,'type': type,'estatus': estatus,'companie': companie,'text': text},
                 success: function(data){
                 
                 }
                 });*/
            }

            function show_alert() {
                Swal.fire({
                    title: '<strong>HTML <u>example</u></strong>',
                    icon: 'info',
                    html:
                            'You can use <b>bold text</b>, ' +
                            '<a href="//sweetalert2.github.io">links</a> ' +
                            'and other HTML tags',
                    showCloseButton: true,
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonText:
                            '<i class="fa fa-thumbs-up"></i> Great!',
                    confirmButtonAriaLabel: 'Thumbs up, great!',
                    cancelButtonText:
                            '<i class="fa fa-thumbs-down"></i>',
                    cancelButtonAriaLabel: 'Thumbs down'
                })
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