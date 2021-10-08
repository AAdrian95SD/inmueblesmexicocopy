<?php

    require '../Controller.php';
    if (!isset($_SESSION)) { session_start();}
    
    if($_SESSION['login'] == null){
        unset($_SESSION);
                
        header("location:login.php");
    }

    $controller = new Controller();
    $respuesta = $controller->getAgentes();

    require 'config.php';
    require 'views/agentes.view.php';

?>