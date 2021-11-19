<?php 
    require '../Controller.php';
    if (!isset($_SESSION)) { session_start();} 
    if($_SESSION['login'] == null){
        unset($_SESSION); 
        header("location:login.php");
    } 
    $controller = new Controller();
    $usuario = $controller->getUserDetail($_SESSION['login_id']);
    $resul =  $controller->getPlanesByid_agente($usuario[0][12]);
    if($usuario[0][11] == 0){
        $respuesta = $controller->getPropiedadesByIdUserReal($usuario[0][12]);
    }else{ 
        $respuesta = $controller->getPropiedadesByInmobiliaria($usuario[0][11]);
    }
    
    if($_SESSION['success']){
        $result = "Hay resultado";
    }else{
        $result = "No Hay resultado";
    }
    require 'config.php';
    require 'views/propiedades.view.php';

?>