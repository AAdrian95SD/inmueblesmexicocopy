<?php

    require '../Controller.php';
    if (!isset($_SESSION)) { session_start();}
    
    if($_SESSION['login'] == null){
        unset($_SESSION);
                
        header("location:login.php");
    }

    $controller = new Controller();
    $usuario = $controller->getUserDetail($_SESSION['login_id']);
    

    require 'config.php';
    require 'views/usuario.view.php';

?>