<?php

    require '../Controller.php';
    if (!isset($_SESSION)) { session_start();}
    
    if($_SESSION['login'] == null){
        unset($_SESSION);
                
        header("location:login.php");
    }
    //
    $controller = new Controller();
    //$respuesta = $controller->getAgentes();
    $usuario = $controller->getUserDetail($_SESSION['login_id']);
    $respuesta = $controller->getAgentesbyInmobiliaria($usuario[0][11]);
    require 'config.php';
    require 'views/agentes.view.php';

?>