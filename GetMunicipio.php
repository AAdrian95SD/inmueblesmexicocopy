<?php 
    include './Controller.php'; 
    $controller = new Controller();
    $respuesta = null; 
    @$data1 = $_GET['Id'];
    $respuesta = $controller->getMunicipiosId($data1);  
    echo json_encode($respuesta); 
?>