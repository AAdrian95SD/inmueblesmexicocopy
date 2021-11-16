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
    if($id_pla != 0){
        $id_agente= $usuario[0][12];
        $respuesta =  $controller->CrearComprobante($id_pla,$id_agente,'dsfggfdgfgfgdfgfdg');
        if($respuesta['menssage'] === 'success'){ 
            $_SESSION["codigoPlan"] = 0; 
            require 'views/index.view.php';
        }else{ 
            echo "<script>alert('error');</script>";
        }  
    } 
    require 'views/index.view.php';
?>