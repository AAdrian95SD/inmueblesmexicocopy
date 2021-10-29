<?php 
    include './Controller.php'; 
    $controller = new Controller();
    $respuesta = null; 
    $rs="d"; 
    $respuesta = $controller->getinmobiliarias($rs);  
    echo json_encode($respuesta); 
?>