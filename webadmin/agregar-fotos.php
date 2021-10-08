<?php

    require '../Controller.php';
    include("../file-upload.php");
    if (!isset($_SESSION)) { session_start();}
    
    if($_SESSION['login'] == null){
        unset($_SESSION);
                
        header("location:login.php");
    }

    $controller = new Controller();
    $inmobiliarias = $controller->getallInmobiliarias();

    $fotos = $controller->getfotos($_GET['propiedad']);

    require 'config.php';
    require 'views/agregar-fotos.view.php';

?>