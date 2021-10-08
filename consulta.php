<?php
include './Controller.php';
if (!isset($_SESSION)) { session_start();}



if($_SESSION['login'] == null){
    unset($_SESSION);
            
    header("location:login.php");
}


$controller = new Controller();
$usuario = $controller->getUserDetail($_SESSION['login_id']);

$respuesta = $controller->getPropiedadesByInmobiliaria($usuario[0][11]);

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
  <div class="parallax titlebar" data-background="images/copoya_02.jpg" data-color="rgba(48, 48, 48, 1)" data-color-opacity="0.8" data-img-width="800" data-img-height="505">
    <div id="titlebar">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
           
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Content -->
  <div class="container">
    <div class="row"> 
      <!-- Widget -->
      <div class="col-md-3">
		
        <div class="sidebar margin-top-20">
          <div class="user-smt-account-menu-container">
            <ul class="user-account-nav-menu">
                <li><a href="create.php"><i class="icon-material-outline-add"></i>Crear nueva</a></li>
                <?php if($usuario[0][10] == 1){print '<li><a href="empresas.php"><i class="icon-feather-eye"></i>Ver empresas</a></li>';}?>
                <li><a method="post" href="utils.php?submit=exit"><i class="sl sl-icon-power"></i>Salir</a></li>
            </ul>
          </div>
        </div>
		
      </div>
      <div class="col-md-9">
        <table class="manage-table bookmarks-table responsive-table">
          <tr>
            <th>Lista de propiedades</th>
            <th></th>
          </tr>
          <!-- Item #1 -->
          <?php
            foreach ($respuesta as $elemento) {
                print '<tr>';
                print '<td class="utf-title-container">';
                print '<div class="title">';
                print '<h4><a>'.$elemento[1].'</a></h4>';
                print '<span>'.$elemento[7].' '.$elemento[8].'</span> <span class="table-property-rent">'.$elemento[2].'</span> 
			  </div>';
                print '</td>';
                print '<td class="action"><a href="editar.php?propiedad='.$elemento[0].'" class="delete tooltip left" title="agregar fotos">'
                        . '<i class="icon-material-outline-add"></i></a></td>';
                print '<td class="action"><a href="update.php?propiedad='.$elemento[0].'" class="delete tooltip left" title="editar">'
                        . '<i class="icon-feather-edit-2"></i></a></td>';
                print '<td class="action"><a href="actions.php?action=21&propiedad='.$elemento[0].'" class="delete tooltip left" title="Eliminar">'
                        . '<i class="icon-material-outline-add"></i></a></td>';
                print '</tr>';
             }
          ?>
        </table>
      </div>
    </div>
  </div>
  
     <!-- Footer -->
  <div class="margin-top-65"></div>
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
  
  <!-- Back To Top Button -->
  <div id="backtotop"><a href="#"></a></div>

</div>
<!-- Wrapper / End -->

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