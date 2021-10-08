<?php

    require '../Controller.php';
    if (!isset($_SESSION)) { session_start();}
    
    if($_SESSION['login'] == null){
        unset($_SESSION);
                
        header("location:login.php");
    }

    $controller = new Controller();
    $usuario = $controller->getUserDetail($_SESSION['login_id']);

    $respuesta = $controller->getPropiedadesByInmobiliaria($usuario[0][11]);

    require 'config.php';
    require 'views/propiedades.view.php';

?>