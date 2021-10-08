<?php
include("file-upload.php");
if (!isset($_SESSION)) {
    session_start();
}

if ($_SESSION['login'] == null) {
    unset($_SESSION);

    header("location:login.php");
}

$controller = new Controller();

$fotos = $controller->getfotos($_GET['propiedad']);

//var_dump($fotos);
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
                <div id="header">
                    <div class="container"> 
                        <div class="left-side"> 
                            <div id="logo"> <a><img src="img_dir/inmobiliarias/inmuebles_mexico_ico.png" alt=""></a> </div>
                            <!-- Mobile Navigation -->
                            <div class="mmenu-trigger">
                                <button class="hamburger hamburger--collapse" type="button"> <span class="hamburger-box"> <span class="hamburger-inner"></span> </span> </button>
                            </div>
                            <!-- Main Navigation -->
                            <nav id="navigation" class="style-1">
                                <ul id="responsive">
                                    <li><a href="create.php">Crear</a></li>
                                    <li><a href="consulta.php">Consultar</a></li>
                                </ul>
                            </nav>
                            <div class="clearfix"></div>
                            <!-- Main Navigation / End -->           
                        </div>
                        <!-- Left Side Content / End --> 

                        <!-- Right Side Content / End -->
                        <div class="right-side"> 
                            <!-- Header Widget -->
                            <div class="header-widget"> 

                            </div>
                            <!-- Header Widget / End --> 
                        </div>
                        <!-- Right Side Content / End -->         
                    </div>
                </div>
                <!-- Header / End -->     
            </header>
            <div class="clearfix"></div>
            <!-- Header Container / End --> 

            <!-- Titlebar -->
            <div class="parallax titlebar" data-background="images/copoya_02.jpg" data-color="rgba(48, 48, 48, 1)" data-color-opacity="0.8" data-img-width="800" data-img-height="505">
                <div id="titlebar">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Agregar fotos</h2>
                                <!-- Breadcrumbs -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="container">
                <!-- Display response messages -->
                    <?php if (isset($_SESSION['Error'])) { ?>
                    <div class="alert alert-danger">
                    <?php echo $_SESSION['Error'] ?>
                    </div>
                    <?php
                    unset($_SESSION['Error']);
                }
                ?>
                    <?php if (isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success">
                    <?php echo $_SESSION['success'] ?>
                    </div>
                    <?php
                    unset($_SESSION['success']);
                }
                ?>
                <div class="container mt-5">
                    <form action="" method="post" enctype="multipart/form-data" class="mb-3">

                        <input id="propiedad" name="propiedad" type="hidden" value="<?php echo $_GET['propiedad'] ?>">
                        <div class="user-image mb-3 text-center">
                            <div style="width: 100px; height: 100px; overflow: hidden; background: #cccccc; margin: 0 auto">
                            </div>
                        </div>

                        <div class="custom-file">
                            <input type="file" name="fileUpload" class="custom-file-input" id="chooseFile">
                            <label class="custom-file-label" for="chooseFile">Select file</label>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                            Subir foto
                        </button>
                    </form>



                    <!-- Display response messages -->
                    <?php if (!empty($resMessage)) { ?>
                        <div class="alert <?php echo $resMessage['status'] ?>">
    <?php echo $resMessage['message'] ?>
                        </div>
<?php } ?>
                </div>
            </div>
            <div class="container">
                <div class="row margin-bottom-50">
                    <div class="col-md-12"> 
                        <!-- Slider -->
                        <div class="property-slider default"> 

                            <!--
                            <a href="images/single-property-02.jpg" data-background-image="images/single-property-02.jpg" class="item mfp-gallery"></a> 
                            <a href="images/single-property-03.jpg" data-background-image="images/single-property-03.jpg" class="item mfp-gallery"></a> 
                            <a href="images/single-property-04.jpg" data-background-image="images/single-property-04.jpg" class="item mfp-gallery"></a> 
                            <a href="images/single-property-05.jpg" data-background-image="images/single-property-05.jpg" class="item mfp-gallery"></a> 
                            <a href="images/single-property-06.jpg" data-background-image="images/single-property-06.jpg" class="item mfp-gallery"></a> -->
                        </div>
                        <!-- Slider Thumbs -->
                        <div class="">

                            <?php
                            foreach ($fotos as $foto) {
                                print '<div class=""><img width="200" height="200" src="' . $foto[1] . '" alt="">';
                                print '<button style="width:20%;" onclick="eliminarfoto(' . $foto[0] . ',\'' . $foto[1] . '\')" class="btn btn-warning btn-block mt-4">';
                                print 'Eliminar foto';
                                print '</button></div><br>';
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

            <!-- Footer -->
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
            <!-- Footer / End --> 

            <!-- Back To Top Button -->
            <div id="backtotop"><a href="#"></a></div>

        </div>
        <!-- Wrapper / End -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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

        <script src="scripts/dropzone.js"></script> 

        
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



        </script>

        
        <script type="text/javascript">
            function eliminarfoto(foto, url) {
                $.ajax({
                    type: "POST",
                    url: "utils.php",
                    data: {'submit': "delete_pic", 'foto': foto, 'url': url},
                    success: function (data) {
                        location.reload();
                    }
                });
            }
        </script>
        <script>
            $(".dropzone").dropzone({
                dictDefaultMessage: "<i class='sl sl-icon-cloud-upload'></i> Drag & Drop Files Here",
            });
        </script> 
    </body>
</html>