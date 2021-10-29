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
    
    $IdPropiedad =  $_GET['Id'];
    $DataPropiedad = $controller->getPropiedadesByIdUser($IdPropiedad);
    $agentes = $controller->getAgentesbyInmobiliaria($usuario[0][11]); 
    $estados = $controller->getEstadosByInmobiliaria($usuario[0][11]); 
    $AllEstados = $controller->getEstados(); 
    //$estados_ = $controller->getEstadosByUser($DataPropiedad[0][9],$DataPropiedad[0][8]); 
    //$municipios = $controller->getMunicipios($estados[0][0]); 
    if($estados == null){
        $estados = $controller->getEstadosByUser($DataPropiedad[0][9],$DataPropiedad[0][8]);  
        $municipios = $controller->getMunicipiosId($estados[0][0]);
    }

    require 'config.php';
    require 'views/editar-propiedad.view.php';

?>