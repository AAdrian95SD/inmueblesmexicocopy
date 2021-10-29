<?php
require 'config.php';
require '../Controller.php';
    if (!isset($_SESSION)) { session_start();}

    if($_SESSION['login'] == null){
        unset($_SESSION); 
        header("location:login.php");
    } 
    $controller = new Controller();
    $inmobiliarias = $controller->getallInmobiliarias(); 
    $usuario = $controller->getUserDetail($_SESSION['login_id']);
    require 'suscripcion/index.php';
?>