<?php

    require '../Controller.php';
    if (!isset($_SESSION)) { session_start();}
    
    if($_SESSION['login'] == null){
        unset($_SESSION);
                
        header("location:login.php");
    }

    $controller = new Controller();
    $inmobiliarias = $controller->getallInmobiliarias();



    $usuario = $controller->getUserDetail($_SESSION['login_id']);
    
    $agentes = $controller->getAgentesbyInmobiliaria($usuario[0][11]);
    
    $estados = $controller->getEstados();
    //$estados = $controller->getEstadosByInmobiliaria($usuario[0][11]);

    $municipios = $controller->getMunicipios($estados[0][0]);

    require 'config.php';
    require 'views/agregar-propiedad.view.php';

?>