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



$respuesta = $controller->getMunicipios($_GET['choice']);

foreach ($respuesta as $row) {
    //print '<option value="'.$row[0].'">'.$row[1].'</option>';
}

echo json_encode($respuesta);

?>


