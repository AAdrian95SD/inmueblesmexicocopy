<?php
include './Controller.php';
if (!isset($_SESSION)) { session_start();}



if($_SESSION['login'] == null){
    unset($_SESSION);
            
    header("location:login.php");
}

$controller = new Controller();

$respuesta = $controller->getAgentes();

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
                <li><a method="post" href="utils.php?submit=exit"><i class="sl sl-icon-power"></i> Log Out</a></li>
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
                print '<h4><a>'.$elemento[1].' '.$elemento[2].' '.$elemento[3].'</a></h4>';
                
                print '</td>';
                print '<td class="action"><a href="agent-edit.php?propiedad='.$elemento[0].'" class="delete tooltip left" title="agregar fotos">'
                        . '<i class="icon-material-outline-add"></i></a></td>';
                print '<td class="action"><a href="agent-edit.php?agent='.$elemento[0].'" class="delete tooltip left" title="editar">'
                        . '<i class="icon-feather-edit-2"></i></a></td>';
                print '</tr>';
             }
          ?>
        </table>
      </div>
    </div>
  </div>
  
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
<script src="scripts/masonry.min.js"></script> 
<script src="scripts/mmenu.min.js"></script> 
<script src="scripts/tooltips.min.js"></script> 
<script src="scripts/custom_jquery.js"></script> 
</body>
</html>