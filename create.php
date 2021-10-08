<?php
include 'utils.php';

if (!isset($_SESSION)) { session_start();}

if($_SESSION['login'] == null){
    unset($_SESSION);
            
    header("location:login.php");
}


$controller = new Controller();


$inmobiliarias = $controller->getallInmobiliarias();



$usuario = $controller->getUserDetail($_SESSION['login_id']);

$agentes = $controller->getAgentesbyInmobiliaria($usuario[0][11]);

$estados = $controller->getEstadosByInmobiliaria($usuario[0][11]);

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
                                    <li><a href="#">Crear</a></li>
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
                                <h2>Nueva propiedad</h2>
                                <!-- Breadcrumbs -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="container">
                <!-- Display response messages -->
            <?php if(isset($_SESSION['Error'])) {?>
            <div class="alert alert-danger">
              <?php echo $_SESSION['Error']?>
            </div>
            <?php
            unset($_SESSION['Error']);
            }?>
                <?php if(isset($_SESSION['success'])) {?>
            <div class="alert alert-success">
              <?php echo $_SESSION['success']?>
            </div>
            <?php
            unset($_SESSION['success']);
            }?>
                <div class="row"> 	
                    <!-- Submit Page -->
                    <div class="col-md-9">
                        <form method="post" action="utils.php" autocomplete="off">
                        <div class="submit-page">
                            <!-- Section -->
                            <div class="utf-submit-page-inner-box">
                                <h3>Información basica</h3>
                                <div class="content with-padding">             
                                    <div class="col-md-12">
                                        <h5>Titulo de le propiedad</h5>
                                        <input class="search-field" placeholder="Titulo de le propiedad" type="text" name="title" required autocomplete="off"/>				  
                                    </div>

                                    <div class="col-md-6">
                                        <h5>Estatus</h5>
                                        <select class="utf-chosen-select-single-item" name="estatus">
                                            <option label="blank"></option>
                                            <option value="Venta">Venta</option>
                                            <option value="Renta">Renta</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <h5>Tipo</h5>
                                        <select class="utf-chosen-select-single-item" name="tipo">
                                            <option label="blank"></option>
                                            <option>Departamento</option>
                                            <option>Casa</option>
                                            <option>Comercial</option>
                                            <option>Terreno/Lote</option>
                                            <option>Oficina</option>
                                            <option>Casa en condominio</option>
                                            <option>Bodega</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <h5>Precio</h5>
                                        <div class="select-input disabled-first-option">
                                            <input type="text" placeholder="00000" data-unit="MXN" name="precio" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <h5>Superficie construcción</h5>
                                        <div class="select-input disabled-first-option">
                                            <input type="text" placeholder="00000" data-unit="" name="superficie" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <h5>Superficie total</h5>
                                        <div class="select-input disabled-first-option">
                                            <input type="text" placeholder="00000" data-unit="" name="superficie_total" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <h5>Garages</h5>
                                        <select class="utf-chosen-select-single-item" name="cuartos">
                                            <option label="blank"></option>
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>Mas de 5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Section / End --> 

                            <!-- Section 
                                    <div class="utf-submit-page-inner-box">
                                            <h3>Property Gallery</h3>
                                            <div class="content with-padding">   
                                                    <div class="col-md-12 submit-section">
                                                          <form action="file-upload" class="dropzone"></form>
                                                    </div>
                                            </div>
                                    </div>
                            <!-- Section / End --> 

                            <!-- Section -->
                            <div class="utf-submit-page-inner-box">
                                <h3>Ubicación</h3>
                                <div class="content with-padding">  
                                    <div class="col-md-6">
                                        <h5>Estado</h5>
                                        <select class="utf-chosen-select-single-item" name="estado" id="estado">
                                            <option label="blank"></option>
                                            <?php
                                            foreach ($estados as $estado) {
                                                print '<option value="'.$estado[0].'">'.$estado[1].'</option>';
                                             }
                                             ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Código postal</h5>
                                        <input type="text" placeholder="000000" name="codigopostal" required autocomplete="off">
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Calle</h5>
                                        <input type="text" placeholder="Dirección" name="calle" required autocomplete="off">
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Municipio</h5>
                                        <select name="municipio" id="municipio">
                                        </select>    
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Código postal</h5>
                                        <input type="text" placeholder="000000" name="codigopostal" required autocomplete="off">
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Latitud</h5>
                                        <input type="text" placeholder="lat" name="lat" required autocomplete="off">
                                    </div>

                                    <div class="col-md-6">
                                        <h5>Longitud</h5>
                                        <input type="text" placeholder="long" name="lang" required autocomplete="off">
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- Section / End --> 

                            <!-- Section -->
                            <div class="utf-submit-page-inner-box">
                                <h3>Información</h3>
                                <div class="content with-padding">             
                                    <div class="col-md-12">
                                        <h5>Descripción</h5>
                                        <textarea name="descripcion" cols="20" rows="2" id="summary" required></textarea>
                                    </div>


                                    <div class="col-md-4">
                                        <h5>Recamaras</h5>
                                        <select class="utf-chosen-select-single-item" name="recamaras">
                                            <option label="blank"></option>
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <h5>Baños</h5>
                                        <select class="utf-chosen-select-single-item" name="banos">
                                            <option label="blank"></option>
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div> 
                                </div>
                            </div>  
                            <!-- Section / End --> 

                            <!-- Section -->
                            <div class="utf-submit-page-inner-box">
                                <h3>Contacto</h3>
                                <div class="content with-padding">             
                                    <div class="col-md-4">
                                        <h5>Agente</h5>
                                        <select class="utf-chosen-select-single-item" name="agente">
                                            <option label="blank"></option>
                                            <?php
                                            foreach ($agentes as $field) {
                                            
                                                print '<option value="'.$field[0].'">'.$field[1].' '.$field[2].'</option>';
                                             }
                                             ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <h5>Inmobiliaria</h5>
                                        <select class="utf-chosen-select-single-item" name="inmobiliaria">
                                            <option label="blank"></option>
                                            <?php
                                            foreach ($inmobiliarias as $field) {
                                                if($usuario[0][11] == $field[0]){
                                                    print '<option value="'.$field[0].'">'.$field[1].'</option>';
                                                }
                                                
                                             }
                                             ?>
                                        </select>
                                    </div>
                                </div>
                            </div>		
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <input type="submit" class="button full-width border margin-top-10" name="submit" value="Crear" />
                                </div>	
                            </div>
                        </div>
                            </form>
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
        <script type="text/javascript">
        
          $("#estado").change(function() {
            //$("#municipio").load("getter.php?choice=" + $("#estado").val());
            $('option', '#municipio').remove();
                $.ajax({
                type: "GET",
                url: "getter.php?choice=" + $("#estado").val(),
                //data: { 'carId': carId  },
                success: function(data){
                    // Parse the returned json data
                    var opts = $.parseJSON(data);
                    // Use jQuery's each to iterate over the opts value
                    $.each(opts, function(i, d) {
                        console.log('<option value="' + d.id + '">' + d.nombre + '</option>');
                        
                        // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                        $('#municipio').append('<option value="' + d.id + '">' + d.nombre + '</option>');
                    });
                }
                });
          });
        
        </script>
        <script>
            $(".dropzone").dropzone({
                dictDefaultMessage: "<i class='sl sl-icon-cloud-upload'></i> Drag & Drop Files Here",
            });
        </script> 
    </body>
</html>