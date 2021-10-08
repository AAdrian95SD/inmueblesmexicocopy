<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './Controller.php';

//header('Content-Type: application/json');

$controller = new Controller();
$respuesta = null;




if (isset($_GET["action"])) {
    if ($_GET['action'] == '21') {

        $datosRecibidos['data'] = $_GET['propiedad'];



        $respuesta = $controller->deleteproperty($datosRecibidos);


        if ($respuesta['menssage'] === 'success') {
            header("location:consulta.php");
            //die();
        }
    }
}
?>

