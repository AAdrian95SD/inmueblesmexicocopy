<?php
include './Controller.php';
if (!isset($_SESSION)) {
    session_start();
}

$controller = new Controller();


$estados = $controller->getEstados();

$estado = $_POST['tab'];
$tipo = $_POST['type'];
$estatus = $_POST['estatus'];
$company = $_POST['companie'];
$text = $_POST['text'];



if (isset($_GET["res"])) {
    if ($_GET["res"] == 1) {
        unset($_SESSION['company']);
    }
} else {

    if ($_POST['companie'] > 0) {
        $company = $_POST['companie'];
    } else {
        $company = $_GET['companie'];
    }


    if ($company > 0) {
        $empresa = $controller->getCompanyDetail($company);
        $_SESSION['company'] = $company;
        $agentes = $controller->getAgentesbyInmobiliaria($company);
    } else if ($_SESSION['company'] > 0) {
        $empresa = $controller->getCompanyDetail($_SESSION['company']);
        $company = $_SESSION['company'];
        $agentes = $controller->getAgentesbyInmobiliaria($company);
    }
}




/*
  if($_GET['type'] == 1){
  $estatus = "Venta";
  $propiedades = $controller->getPropiedadesFiltro($estatus,$estado);
  }else if($_GET['type'] == 2){
  $estatus = "Renta";
  $propiedades = $controller->getPropiedadesFiltro($estatus,$estado);
  }else{
  $propiedades = $controller->getSimilar($estado);
  }* */


$propiedades = $controller->getPropiedadesFiltros($estado, $tipo, $estatus, $company, $text);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="author" content="">
        <meta name="description" content="">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


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
            <!-- Header Container -->
            <header id="header-container"> 
                <!-- Header -->
                <div id="header" style="background: #18253e;">
                    <div class="container"> 
                        <!-- Left Side Content -->
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

                        <!-- Right Side Content / End -->         
                    </div>
                </div>
                <!-- Header / End -->     
            </header>
            <div class="clearfix"></div>
            <!-- Header Container / End --> 

            <!-- Titlebar -->
            <!-- Banner -->
            <div class="parallax" data-background="images/copoya_03.jpg" data-color="#36383e" data-color-opacity="0.1" data-img-width="2500" data-img-height="1500">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="search-container"> 
                                <form action="propiedades.php" method="post" name="post_propiedades">           
                                    <div class="row with-forms"> 
                                        <!-- Status -->
                                        <div class="col-md-2 col-sm-4">
                                            <select data-placeholder="Selecione..." title="Select City" name="tab" class="utf-chosen-select-single-item">
                                                <option label="Seleccione..."></option>
                                                <?php
                                                foreach ($estados as $estado) {
                                                    print '<option value="' . $estado[0] . '">' . $estado[1] . '</option>';
                                                }
                                                ?>                      
                                            </select>
                                        </div>

                                        <!-- Property Type -->
                                        <div class="col-md-2 col-sm-4">
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
                                        <div class="col-md-2 col-sm-4">
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

                                </form>
                                <!-- Row With Forms / End --> 
                            </div>		  
                        </div>
                    </div>
                </div>
            </div>


            <!-- Content -->
            <div class="container">
                <div class="row sticky-wrapper">
                    <div class="col-md-8"> 
                        <!-- Sorting -->
                        <div class="utf-sort-box-aera">
                            <div class="sort-by">

                                <div class="sort-by-select">

                                </div>
                            </div>
                            <div class="utf-layout-switcher"> 
                                <a href="#" class="list"><i class="sl sl-icon-list"></i></a> 
                                <a href="#" class="grid"><i class="sl sl-icon-grid"></i></a> 
                            </div>
                        </div>

                        <!-- Listings -->
                        <div class="utf-listings-container-area list-layout"> 
                            <?php
                            foreach ($propiedades as $elemento) {
                                print '<div class="utf-listing-item"> <a href="detail.php?item=' . $elemento[0] . '" class="utf-smt-listing-img-container">';
                                if ($elemento[2] == 'Renta') {
                                    print '<div class="utf-listing-badges-item"><span class="for-rent">Renta</span></div>';
                                } else {
                                    print '<div class="utf-listing-badges-item"><span class="for-sale">Venta</span></div>';
                                }

                                print '<div class="utf-listing-img-content-item">';
                                print '<img class="utf-user-picture" src="' . $elemento[23] . '" alt="user_1" />';
                                print '<span style="visibility: hidden"></span>';
                                print '</div>';
                                print '<div class="utf-listing-carousel-item">';
                                $fotos = $controller->getfotos($elemento[0]);
                                foreach ($fotos as $foto) {
                                    print '<div><img src="' . $foto[1] . '" alt=""></div>';
                                }
                                print '</div>';
                                print '</a>';
                                print '<div class="utf-listing-content">';
                                print '<div class="utf-listing-title">';
                                print '<span class="utf-listing-price">$' . $elemento[4] . ' MXN</span>';
                                print '<h4><a href="detail.php?item=' . $elemento[0] . '">' . $elemento[1] . '</a></h4>';
                                print '<span class="utf-listing-address"><a target="_blank" href="https://maps.google.com/?q=' . $elemento[30] . ',' . $elemento[31] . '"><i class="icon-material-outline-location-on"></i>' . $elemento[7] . ' ' . $elemento[28] . '</a></span>';
                                print '</div>';
                                print '<ul class="utf-listing-features">';
                                print '<li><i class="fa fa-bed"></i> <span>' . $elemento[12] . '</span></li>';
                                print '<li><i class="icon-feather-codepen"></i> <span>' . $elemento[13] . '</span></li>';
                                print '<li><i class="fa fa-car"></i> <span>' . $elemento[6] . '</span></li><br><br><br>                       ';
                                print '</ul>';
                                print '<ul class="utf-listing-features">';
                                print '<li><i class="icon-line-awesome-arrows"></i> Terreno<span>' . $elemento[5] . '</span></li>';
                                print '<li><i class="icon-line-awesome-arrows"></i> Construcción<span>' . $elemento[15] . '</span></li>';
                                print '</ul>';
                                print '<div class="utf-listing-user-info"><a target="_blank" href="https://api.whatsapp.com/send?phone=521' . $elemento[22] . '&text=Hola"><i class="icon-line-awesome-user"></i>' . $elemento[18] . ' ' . $elemento[19] . '</a> <span>' . $elemento[22] . '</span></div>';
                                print '</div>';
                                print '</div>';
                            }
                            ?>
                        </div>
                        <!-- Listings Container / End --> 


                    </div>

                    <!-- Sidebar -->
                    <div class="col-md-4">
                        <div class="sidebar"> 


                            <!-- Widget -->
                            <div class="widget utf-sidebar-widget-item">
                                <div class="utf-boxed-list-headline-item">
                                    <h3>Ciudades</h3>
                                    <div class="utf-sidebar-categorie"> 
                                        <ul>
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
                            </div>
                            <!-- Widget / End-->


                            <!-- Widget
                <div class="widget utf-sidebar-widget-item">
                              <div class="utf-boxed-list-headline-item">
                                      <h3>Social</h3>
                              </div>
                  <ul class="utf-social-icons rounded">
                    <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                    <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
                                    <li><a class="instagram" href="#"><i class="icon-instagram"></i></a></li>
                                    <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
                  </ul>
                              <div class="clearfix"></div>
                </div>
                            <!-- Widget / End-->            			
                            <div class="clearfix"></div>	
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


        <!-- Sign In Popup / End -->
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
    </body>
</html>