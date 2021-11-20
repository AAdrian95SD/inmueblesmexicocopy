<?php
require 'config.php';
require '../Controller.php';
    if (!isset($_SESSION)) { session_start();} 
    if($_SESSION['login'] == null){
        unset($_SESSION); 
        header("location:login.php");
    } 
    $id_pla =  $_SESSION["codigoPlan"];
    $controller = new Controller();
    $inmobiliarias = $controller->getallInmobiliarias(); 
    $usuario = $controller->getUserDetail($_SESSION['login_id']);
    $agente = $controller->getagenteDetail($usuario[0][12]);
    $Planes = $controller->getPlanesByid_agente($usuario[0][12]);
    if($usuario[0][11] == 0){
        $respuesta = $controller->getPropiedadesByIdUserReal($usuario[0][12]);
    }else{ 
        $respuesta = $controller->getPropiedadesByInmobiliaria($usuario[0][11]);
    }
    require 'views/EstadoSub.view.php'; 
?>