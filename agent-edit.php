<?php

include 'utils.php';

if (!isset($_SESSION)) { session_start();}

if($_SESSION['login'] == null){
    unset($_SESSION);
            
    header("location:login.php");
}

$controller = new Controller();

$inmobiliarias = $controller->getInmobiliarias();

$agente = $controller->getagenteDetail($_GET['agent']);


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
                            <div id="logo"> <a href="index.php"><img src="images/copoya_inmobiliaria_blanco4.png" alt=""></a> </div>
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
                                <h2>Nuevo agente</h2>
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
                                <input type="hidden" id="custId" name="id" value="<?php echo $_GET['agent']; ?>">
                                <div class="content with-padding">             
                                    <div class="col-md-12">
                                        <h5>Nombre</h5>
                                        <input class="search-field" placeholder="Nombre" type="text" name="nombre" required autocomplete="off" 
                                               value="<?php echo $agente[0][1]; ?>"/>				  
                                    </div>
                                    <div class="col-md-4">
                                        <h5>Paterno</h5>
                                            <input class="search-field" placeholder="Paterno" type="text" name="paterno" required autocomplete="off"
                                                    value="<?php echo $agente[0][2]; ?>"/>				  
                                    </div>

                                    <div class="col-md-4">
                                        <h5>Materno</h5>
                                            <input class="search-field" placeholder="Materno" type="text" name="materno" required autocomplete="off" 
                                                   value="<?php echo $agente[0][3]; ?>"/>				  
                                    </div>
                                    <div class="col-md-4">
                                        <h5>E-mail</h5>
                                            <input class="search-field" placeholder="alias@example.com" type="text" name="email" required autocomplete="off"
                                                    value="<?php echo $agente[0][4]; ?>"/>				  
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <h5>Teléfono</h5>
                                            <input class="search-field" placeholder="0000000000" type="text" name="telefono" required autocomplete="off" 
                                                   value="<?php echo $agente[0][5]; ?>"/>				  
                                    </div>

                                    <div class="col-md-6">
                                        <h5>Inmobiliaria</h5>
                                        <select class="utf-chosen-select-single-item" name="inmobiliaria">
                                            <option label="blank"></option>
                                            <?php
                                            foreach ($inmobiliarias as $field) {
                                                $selected = '';
                                                if($agente[0][7] == $field[0]){$selected = 'Selected';}
                                                print '<option '.$selected.' value="'.$field[0].'">'.$field[1].'</option>';
                                             }
                                             ?>
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

                            		
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <input type="submit" class="button full-width border margin-top-10" name="submit" value="Editar agente" />
                                </div>	
                            </div>
                        </div>
                            </form>
                    </div>
                </div>
            </div>
            
              <div class="container mt-5">
                  <form action="file-agent.php" method="post" enctype="multipart/form-data" class="mb-3">
      
      <input id="propiedad" name="agente" type="hidden" value="<?php echo $agente[0][0]?>">
      <input id="propiedad" name="oldurl" type="hidden" value="<?php echo $agente[0][6]?>">
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
    <?php if(!empty($resMessage)) {?>
    <div class="alert <?php echo $resMessage['status']?>">
      <?php echo $resMessage['message']?>
    </div>
    <?php }?>
  </div>

            <!-- Footer -->
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