<?php
include './Controller.php';
if (!isset($_SESSION)) {
    session_start();
}

$controller = new Controller();

$fotos = $controller->getfotos($_GET['item']);
$propiedad = $controller->getdetailByID($_GET['item']);


if ($_SESSION['company'] > 0) {
    $empresa = $controller->getCompanyDetail($_SESSION['company']);
    $company = $_SESSION['company'];
    $agentes = $controller->getAgentesbyInmobiliaria($company);
}


$similares = $controller->getSimilar($propiedad[0][9]);
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
        <?php
        if ($company > 0) {
            print '<title>' . $empresa[0][1] . '</title>';
            print '<link rel="shortcut icon" href="' . $empresa[0][7] . '">';
        } else {
            print '<link rel="shortcut icon" href="img_dir/inmobiliarias/inmuebles_mexico_ico.png">';
            print '<title>Inmuebles México</title>';
        }
        ?>

        <!-- CSS -->
        <link rel="stylesheet" href="css/stylesheet.css">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&display=swap" rel="stylesheet"> 
    </head>

    <body>
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
                        <div class="left-side"> 
                            <?php
                            if ($company > 0) {
                                print '<div id="logo"> <a href="index.php"><img src="' . $empresa[0][7] . '" alt=""></a> </div>';
                            } else {
                                print '<div id="logo"> <a href="index.php"><img src="img_dir/inmobiliarias/inmuebles_mexico_ico.png" alt=""></a> </div>';
                            }
                            ?>
                            <!-- Mobile Navigation -->
                            <div class="mmenu-trigger">
                                <button class="hamburger hamburger--collapse" type="button"> <span class="hamburger-box"> <span class="hamburger-inner"></span> </span> </button>
                            </div>
                            <!-- Main Navigation -->
                            <!-- Main Navigation -->
                            <nav id="navigation" class="style-1" style="background: #18253e;">
                                <ul id="responsive">
                                    <li><a class="current" href="index.php" style="color: white">Inicio</a></li>
                                    <li><a href="conocenos.php" style="color: white">Conócenos</a></li>
                                    <li><a href="#footer" style="color: white">Contacto</a></li>
                                    <li><a target="_blank" href="https://precalificaciones.infonavit.org.mx/Precalificacion/precalif.xhtml?tipoProducto=CI" style="color: white">Precalificate</a></li>
                                </ul>
                            </nav>
                            <div class="clearfix"></div>
                            <!-- Main Navigation / End -->           
                        </div>
                        <!-- Left Side Content / End --> 

                        <!-- Right Side Content / End -->         
                    </div>
                </div>
                <!-- Header / End -->     
            </header>
            <div class="clearfix"></div>
            <!-- Header Container / End --> 

            <!-- Titlebar -->
            <div class="parallax titlebar" data-background="images/copoya_03.jpg" data-color="#36383e" data-color-opacity="0.35" data-img-width="2500" data-img-height="1600">
                <div id="titlebar">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Detalle</h2>
                                <!-- Breadcrumbs -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="container">
                <div class="row margin-bottom-50">
                    <div class="col-md-12"> 
                        <!-- Slider -->
                        <div class="property-slider default"> 
                            <?php
                            foreach ($fotos as $foto) {
                                print '<a href="' . $foto[1] . '" data-background-image="' . $foto[1] . '" class="item mfp-gallery"><img src="' . $foto[1] . '" alt=""></a> ';
                            }
                            /* print '<div class="utf-listing-carousel-item">';

                              foreach ($fotos as $foto) {

                              print '<div><img src="'.$foto[1].'" alt=""></div>';
                              }
                              print '</div>'; */
                            ?>
                            <!--
                            <a href="images/single-property-02.jpg" data-background-image="images/single-property-02.jpg" class="item mfp-gallery"></a> 
                            <a href="images/single-property-03.jpg" data-background-image="images/single-property-03.jpg" class="item mfp-gallery"></a> 
                            <a href="images/single-property-04.jpg" data-background-image="images/single-property-04.jpg" class="item mfp-gallery"></a> 
                            <a href="images/single-property-05.jpg" data-background-image="images/single-property-05.jpg" class="item mfp-gallery"></a> 
                            <a href="images/single-property-06.jpg" data-background-image="images/single-property-06.jpg" class="item mfp-gallery"></a> -->
                        </div>
                        <!-- Slider Thumbs -->
                        <div class="property-slider-nav">

                            <?php
                            foreach ($fotos as $foto) {
                                print '<div class="item"><img src="' . $foto[1] . '" alt=""></div>';
                            }
                            ?>
                            <!--
                          <div class="item"><img src="images/single-property-01.jpg" alt=""></div>
                          <div class="item"><img src="images/single-property-02.jpg" alt=""></div>
                          <div class="item"><img src="images/single-property-03.jpg" alt=""></div>
                          <div class="item"><img src="images/single-property-04.jpg" alt=""></div>
                          <div class="item"><img src="images/single-property-05.jpg" alt=""></div>
                          <div class="item"><img src="images/single-property-06.jpg" alt=""></div>-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row"> 

                    <!-- Property Description -->
                    <div class="col-lg-8 col-md-7">
                        <!-- Titlebar -->
                        <div id="titlebar-dtl-item" class="property-titlebar margin-bottom-0">
                            <div class="property-title">
                                <div class="property-pricing"><?php print $propiedad[0][4] . 'MXN'; ?></div>							
                                <h2><?php
                                    print $propiedad[0][1];
                                    if ($propiedad[0][2] == 'Renta') {
                                        print '<span class="property-badge-rent">Renta</span></h2>';
                                    } else {
                                        print '<span class="property-badge-sale">Venta</span></h2>';
                                    }
                                    ?>

                                    <span class="utf-listing-address"><i class="icon-material-outline-location-on"></i> <?php print $propiedad[0][7] . ' ' . $propiedad[0][28]; ?></span>
                                    <ul class="property-main-features">
                                        <li>Recamaras<span><?php print $propiedad[0][12]; ?></span></li>
                                        <li>Baños<span><?php print $propiedad[0][13]; ?></span></li>
                                        <li>Garages<span><?php print $propiedad[0][6]; ?></span></li>					  					 
                                        <li>Construcción<span><?php print $propiedad[0][5]; ?></span></li>
                                    </ul>
                            </div>		  
                        </div>

                        <div class="property-description"> 
                            <!-- Description -->
                            <div class="utf-desc-headline-item">
                                <h3><i class="icon-material-outline-description"></i>Descripción</h3>
                            </div>
                            <div class="show-more">
                                <p><?php echo str_replace("\n", "<br>", $propiedad[0][11]); ?></p>
                                <a href="#" class="show-more-button">Mostrar<i class="sl sl-icon-plus"></i></a> 
                            </div>

                            <!-- Details -->
                            <div class="utf-desc-headline-item">
                                <h3><i class="sl sl-icon-briefcase"></i>Detalle</h3>
                            </div>
                            <ul class="property-features margin-top-0">
                                <li>Propiedad ID: <span>IHCPY<?php print $propiedad[0][0]; ?></span></li>
                                <li>Precio: <span>$<?php print $propiedad[0][4]; ?></span></li>
                                <li>Construcción: <span><?php print $propiedad[0][5]; ?></span></li>
                                <li>Recamaras: <span><?php print $propiedad[0][12]; ?></span></li>
                                <li>Baños: <span><?php print $propiedad[0][13]; ?></span></li>
                                <li>Garages: <span><?php print $propiedad[0][6]; ?></span></li>

                                <li>Tipo: <span><?php print $propiedad[0][3]; ?></span></li>
                                <li>Estatus: <span>Para <?php print $propiedad[0][2]; ?></span></li>
                            </ul>
                            <!-- Map -->
                            <br><br>
                            <div id="map-container">
                                <div id="map"> </div>
                                <!-- Map Navigation --> 
                                <a href="#" id="scrollEnabling" title="Enable Disable Scrolling Map">Enable Scrolling</a>

                            </div>
                            <!-- Similar Listings Container -->
                            <div class="utf-desc-headline-item">
                                <h3><i class="icon-material-outline-description"></i>Otras propiedades</h3>
                            </div>

                            <!-- Layout Switcher --> 
                            <div class="utf-layout-switcher hidden"><a href="#" class="list"><i class="fa fa-th-list"></i></a></div>
                            <div class="utf-listings-container-area list-layout"> 


                                <?php
                                foreach ($similares as $item) {
                                    print '<div class="utf-listing-item"> <a class="utf-smt-listing-img-container">';
                                    if ($item[2] == 'Renta') {
                                        print '<div class="utf-listing-badges-item"> <span class="for-rent">Renta</span> </div>';
                                    } else {
                                        print '<div class="utf-listing-badges-item"> <span class="for-sale">Venta</span> </div>';
                                    }

                                    print '<div class="utf-listing-carousel-item">';
                                    $fotos = $controller->getfotos($item[0]);
                                    foreach ($fotos as $img) {
                                        print '<div><img src="' . $img[1] . '" alt=""></div>';
                                    }

                                    print '</div>';
                                    print '<img src="images/listing-01.jpg" alt=""> </a>';
                                    print '<div class="utf-listing-content">';
                                    print '<div class="utf-listing-title">';
                                    print '<span class="utf-listing-price">$' . $item[4] . ' MXN</span>';
                                    print '<h4><a href="detail.php?item=' . $item[0] . '">' . $item[1] . '</a></h4>';
                                    print '<span class="utf-listing-address"><a target="_blank" href="https://maps.google.com/?q=' . $item[30] . ',' . $item[31] . '"><i class="icon-material-outline-location-on"></i>' . $item[7] . ' ' . $item[28] . '</a></span>';
                                    print '</div>';
                                    print '<ul class="listing-details">';
                                    print '<li><i class="fa fa-bed"></i> <span>' . $item[12] . '</span></li>';
                                    print '<li><i class="icon-feather-codepen"></i> <span>' . $item[13] . '</span></li>';
                                    print '<li><i class="fa fa-car"></i> <span>' . $item[6] . '</span></li>';
                                    print '<br><br>';
                                    print '</ul>';
                                    print '<ul class="listing-details">';
                                    print '<li><i class="icon-line-awesome-arrows"></i>Terreno <span>' . $item[5] . '</span></li>';
                                    print '<li><i class="icon-line-awesome-arrows"></i>Construcción <span>' . $item[15] . '</span></li>';
                                    print '</ul>';
                                    print '<div class="utf-listing-user-info"><a target="_blank" href="https://api.whatsapp.com/send?phone=521' . $item[22] . '&text=Hola"><i class="icon-line-awesome-user"></i>' . $item[18] . ' ' . $item[19] . '</a> <span>' . $item[22] . '</span></div>';
                                    print '</div>';
                                    print '</div>';
                                }
                                ?>
                                <!-- Listing Item -->

                                <!-- Listing Item / End --> 






                            </div>
                            <!-- Similar Listings Container / End -->

                            <div class="clearfix"></div>
                            <div class="margin-top-35"></div>

                            <div class="margin-top-15"></div>

                        </div>
                    </div>
                    <!-- Property Description / End --> 

                    <!-- Sidebar -->
                    <div class="col-lg-4 col-md-5">
                        <div class="sidebar"> 

                            <!-- Widget / End --> 

                            <!-- Widget -->
                            <div class="widget utf-sidebar-widget-item">
                                <div class="agent-widget">
                                    <div class="utf-boxed-list-headline-item">
                                        <h3>Agente</h3>
                                    </div> 	
                                    <div class="agent-title">
                                        <div class="agent-photo"><img src="<?php print $propiedad[0][23]; ?>" alt="" /></div>
                                        <div class="agent-details">
                                            <h4><a><?php print $propiedad[0][18] . ' ' . $propiedad[0][19]; ?></a></h4>
                                            <span><?php print $propiedad[0][22]; ?></span>

                                            <span style="font-size: 13px;"><?php print $propiedad[0][21]; ?></span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <a href="https://api.whatsapp.com/send?phone=521<?php print $propiedad[0][22]; ?>&text=Hola"  class="button fullwidth margin-top-5">Enviar Whatsapp</a>
                                </div>
                            </div>
                            <!-- Widget / End --> 

                            <!-- Widget -->
                            <div class="widget utf-sidebar-widget-item">
                                <div class="agent-widget">
                                    <div class="utf-boxed-list-headline-item">
                                        <h3>Escribe un mensaje</h3>
                                    </div> 	
                                    <div class="agent-title">

                                        <div class="clearfix"></div>
                                    </div>
                                    <input type="text" id="name" placeholder="Nombre">
                                    <input type="text" id="email" placeholder="Email">
                                    <input type="text" id="telefono" placeholder="Teléfono">
                                    <textarea id="detail">Hola, </textarea>
                                    <button class="button fullwidth margin-top-5" onclick="sendEmail()">Enviar</button>
                                </div>
                            </div>
                            <!-- Widget / End --> 


                        </div>
                    </div>
                    <!-- Sidebar / End -->       
                </div>
            </div>

            <!-- Footer -->
            <div class="margin-top-65"></div>
            <?php
            if ($company > 0) {

                if ($company > 0) {
                    print '<div id="footer"> 
                <div class="container">
                    <div class="row">
                    <h4>Asesores</h4>';


                    foreach ($agentes as $agente) {
                        print ' <div class="col-md-3 col-sm-5 col-xs-7"> 
                       <h4></h4>
                            <a><img class="footer-logo"  alt=""></a>
                            <ul class="utf-footer-links-item">
                                <div class="widget-thumb"> <a href="blog-full-width-single-post.html"><img src="' . $agente[6] . '" alt=""></a> </div>
                                <li><h5><a>' . $agente[1] . ' ' . $agente[2] . '</a></h5></li>
                                <li><h5><a target="_blank" href="https://api.whatsapp.com/send?phone=521' . $agente[5] . '">' . $agente[5] . '</a></h5></li>
                            </ul>
                        </div>';
                    }




                    print ' 
                    </div>
                </div>
            </div>';
                }
                print '<div id="footer"> 
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-12"> 
                        <h4>Dirección</h4>
                            <a><img class="footer-logo" src="<?php print $empresa[0][7];?>" alt=""></a>
                            <ul class="utf-footer-links-item">
                                <li><a>' . $empresa[0][2] . '</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-8">
                            <h4>Datos de contacto</h4>
                            <ul class="utf-footer-links-item">';

                $correos = $controller->getCorreosCompany($empresa[0][0]);

                foreach ($correos as $elemento) {
                    print '<li><a>' . $elemento[1] . '</a></li>';
                }
                print '</ul>
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-6">
                            <h4>Whatsapp</h4>
                            <ul class="utf-footer-links-item">';


                $telefonos = $controller->getTelefonosCompany($empresa[0][0]);

                foreach ($telefonos as $elemento) {
                    print '<li><a href="https://api.whatsapp.com/send?phone=521' . $elemento[1] . '&text=Hola" target="_blank">' . $elemento[2] . '</a></li>';
                }
                print '</ul>
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-6">
                            <h4>Social</h4>
                            <ul class="utf-footer-links-item">';


                $sociales = $controller->getSocialInmobiliaria($empresa[0][0]);

                foreach ($sociales as $elemento) {
                    if ($elemento[2] == 1) {
                        print '<li><a href="' . $elemento[1] . '" target="_blank">Facebook</a></li>';
                    } else if ($elemento[2] == 2) {
                        print '<li><a href="' . $elemento[1] . '" target="_blank">Twitter</a></li>';
                    } else if ($elemento[2] == 3) {
                        print '<li><a href="' . $elemento[1] . '" target="_blank">Instagram</a></li>';
                    }
                }
                print '</ul>
                        </div>  
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyrights">Powered by : INTEGRACION DE HABILIDADES S.A DE C.V</div>
                        </div>
                    </div>
                </div>
            </div>';
            } else {
                ?>
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
                <?php
            }
            ?>


            <!-- Footer / End --> 

            <!-- Back To Top Button -->
            <div id="backtotop"><a href="#"></a></div>
        </div>
        <!-- Wrapper / End -->

        <!-- Scripts --> 
        <script src="scripts/jquery-3.3.1.min.js"></script> 
        <script src="scripts/chosen.min.js"></script> 
        <script src="scripts/magnific-popup.min.js"></script> 
        <script src="scripts/owl.carousel.min.js"></script> 
        <script src="scripts/rangeSlider.js"></script> 
        <script src="scripts/sticky-kit.min.js"></script> 
        <script src="scripts/slick.min.js"></script> 
        <script src="scripts/mmenu.min.js"></script> 
        <script src="scripts/tooltips.min.js"></script> 
        <script src="scripts/masonry.min.js"></script> 
        <script src="scripts/custom_jquery.js"></script> 

        <!-- Maps --> 



        <script src="scripts/maps.js"></script> 
        <?php
        echo '<script>let lat = ' . $propiedad[0][30] . ';let lang = ' . $propiedad[0][31] . '; </script>';
        echo '<script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAF9CqYEdb8kv13KWZaSZGgChbFH-uqrBw&callback=initMap&libraries=&v=weekly"
            defer
        ></script>';
        ?>
        <script>
                                        function initMap() {
                                            var markerIcon = {
                                                path: 'M19.9,0c-0.2,0-1.6,0-1.8,0C8.8,0.6,1.4,8.2,1.4,17.8c0,1.4,0.2,3.1,0.5,4.2c-0.1-0.1,0.5,1.9,0.8,2.6c0.4,1,0.7,2.1,1.2,3 c2,3.6,6.2,9.7,14.6,18.5c0.2,0.2,0.4,0.5,0.6,0.7c0,0,0,0,0,0c0,0,0,0,0,0c0.2-0.2,0.4-0.5,0.6-0.7c8.4-8.7,12.5-14.8,14.6-18.5 c0.5-0.9,0.9-2,1.3-3c0.3-0.7,0.9-2.6,0.8-2.5c0.3-1.1,0.5-2.7,0.5-4.1C36.7,8.4,29.3,0.6,19.9,0z M2.2,22.9 C2.2,22.9,2.2,22.9,2.2,22.9C2.2,22.9,2.2,22.9,2.2,22.9C2.2,22.9,3,25.2,2.2,22.9z M19.1,26.8c-5.2,0-9.4-4.2-9.4-9.4 s4.2-9.4,9.4-9.4c5.2,0,9.4,4.2,9.4,9.4S24.3,26.8,19.1,26.8z M36,22.9C35.2,25.2,36,22.9,36,22.9C36,22.9,36,22.9,36,22.9 C36,22.9,36,22.9,36,22.9z M13.8,17.3a5.3,5.3 0 1,0 10.6,0a5.3,5.3 0 1,0 -10.6,0',
                                                strokeOpacity: 0,
                                                strokeWeight: 1,
                                                fillColor: '#00283a',
                                                fillOpacity: 1,
                                                rotation: 0,
                                                scale: 1,
                                                anchor: new google.maps.Point(19, 50)
                                            }
                                            $(window).on('load resize', function () {
                                                var topbarHeight = $("#top-bar").height();
                                                var headerHeight = $("#header").innerHeight() + topbarHeight;
                                                $(".fs-container").css('height', '' + $(window).height() - headerHeight + 'px');
                                            });



                                            const map = new google.maps.Map(document.getElementById("map"), {
                                                zoom: 16,
                                                center: {lat: lat, lng: lang},
                                                mapTypeControl: true,
                                                mapTypeControlOptions: {
                                                    style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                                                    position: google.maps.ControlPosition.TOP_CENTER,
                                                },
                                                zoomControl: true,
                                                zoomControlOptions: {
                                                    position: google.maps.ControlPosition.LEFT_CENTER,
                                                },
                                                scaleControl: true,
                                                //streetViewControl: true,
                                                streetViewControlOptions: {
                                                    position: google.maps.ControlPosition.LEFT_TOP,
                                                },
                                                fullscreenControl: true,
                                            });

                                            new google.maps.Marker({

                                                map,
                                                position: new google.maps.LatLng(lat, lang),
                                                icon: markerIcon
                                            });
                                        }
        </script>
        <script>



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



        </script>
        <script type="text/javascript">
            function sendEmail() {
                let name = document.getElementById("name").value;
                let email = document.getElementById("email").value;
                let telefono = document.getElementById("telefono").value;
                let detail = document.getElementById("detail").value;

                if (name != '') {
                    if (email != '') {
                        if (telefono != '') {
                            if (detail != '') {
                                $.get('send.php?send=x&name=' + name + '&email=' + email + '&telefono=' + telefono + '&description=' + detail, function (data) {
                                    document.getElementById("name").value = '';
                                    document.getElementById("email").value = '';
                                    document.getElementById("telefono").value = '';
                                    document.getElementById("detail").value = '';
                                    alert("Mensaje enviado. pronto te contactaremos");
                                    // or alert(data); //in case you return data from php
                                    //document.location.reload(true);
                                });
                            } else {
                                alert("Por favor complete los datos");
                            }
                        } else {
                            alert("Por favor complete los datos");
                        }
                    } else {
                        alert("Por favor complete los datos");
                    }

                } else {
                    alert("Por favor complete los datos");
                }


            }
        </script>
    </body>
</html>