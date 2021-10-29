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


if(isset($_POST["submit"])) {

switch ($_POST["submit"]){
    case "login":
        $datosRecibidos['username'] = $_POST['email'];
        $datosRecibidos['password'] = $_POST['password'];
        $respuesta = $controller->login($datosRecibidos);
        $agentes = $controller->getAgentes();
        if($respuesta['menssage'] === 'success'){
            if (!isset($_SESSION)) { session_start();}
            //$_SESSION['agentes'] = $agentes;
            $_SESSION['login'] = true;
            $_SESSION['login_id'] = $respuesta['userID'];
            header("location: webadmin/index.php");
            die();    
        }else{
            if (!isset($_SESSION)) { session_start();}
            $_SESSION['Error'] = "Usuario no encontrado";
            header("location:login.php");
            //die();
        }
    break;
    case "Crear":
        if (!isset($_SESSION)) { session_start();}
        if($_POST['estatus'] === ""){
            $_SESSION['Error'] = "Error, no selecciono un ESTATUS";
            header("location:create.php");
            die();   
        }
        if($_POST['tipo'] === ""){
            $_SESSION['Error'] = "Error, no selecciono un TIPO";
            header("location:create.php");
            die();   
        }
        if($_POST['cuartos'] === ""){
            $_SESSION['Error'] = "Error, no selecciono CUARTOS";
            header("location:create.php");
            die();   
        }
        if($_POST['estado'] === ""){
            $_SESSION['Error'] = "Error, no selecciono un ESTADO";
            header("location:create.php");
            die();   
        }
        if($_POST['recamaras'] === ""){
            $_SESSION['Error'] = "Error, no selecciono RECAMARAS";
            header("location:create.php");
            die();   
        }
        if($_POST['agente'] === ""){
            $_SESSION['Error'] = "Error, no selecciono un AGENTE";
            header("location:create.php");
            die();   
        }
        if($_POST['inmobiliaria'] === ""){
            $_SESSION['Error'] = "Error, no selecciono una inmobiliaria";
            header("location:create.php");
            die();   
        }
        $respuesta = $controller->createPropiedad($_POST);
        
        if($respuesta['menssage'] === 'success'){
            if (!isset($_SESSION)) { session_start();}
            $_SESSION['success'] = "Propiedad creada correctamente";
            header("location: webadmin/propiedades.php");
            die();    
        }else{
            if (!isset($_SESSION)) { session_start();}
            $_SESSION['Error'] = "Error al crear la propiedad";
            header("location:login.php");
            //die();
        }
    break;
    case "agente-create": 
        if (!isset($_SESSION)) { session_start();} 
        if($_POST['inmobiliaria'] === ""){
            $_SESSION['Error'] = "Error, no selecciono una inmobiliaria";
            header("location: crear-usuario.php");
            die();   
        } 
        $respuesta = $controller->createAgente($_POST); 
        
        if($respuesta['menssage'] === 'success'){
            if (!isset($_SESSION)) { session_start();}
                $_SESSION['success'] = "agente creado correctamente";
                header("location:webadmin/index.php");
            die();    
        }else{
            if (!isset($_SESSION)) { session_start();}
                $_SESSION['Error'] = "Error al crear el agente";
                 header("location: crear-usuario.php");
            //die();
        }
    break;    
    case "Editar agente":
        if (!isset($_SESSION)) { session_start();}
        if($_POST['inmobiliaria'] === ""){
            $_SESSION['Error'] = "Error, no selecciono una inmobiliaria";
            header("location:agent-all.php");
            die();   
        }
        $respuesta = $controller->editAgente($_POST);
        
        if($respuesta['menssage'] === 'success'){
            if (!isset($_SESSION)) { session_start();}
            $_SESSION['success'] = "agente editado correctamente";
            header("location:agent-all.php");
            die();    
        }else{
            if (!isset($_SESSION)) { session_start();}
            $_SESSION['Error'] = "Error al editar el agente";
            header("location:agent-all.php");
            //die();
        }  
    break;    
    case "Actualizar": 
        if (!isset($_SESSION)) { session_start();}
        if($_POST['estatus'] === ""){
            $_SESSION['Error'] = "Error, no selecciono un ESTATUS";
            header("location:update.php?propiedad=".$_POST['id']);
            die();   
        }
        if($_POST['tipo'] === ""){
            $_SESSION['Error'] = "Error, no selecciono un TIPO";
            header("location:update.php?propiedad=".$_POST['id']);
            die();   
        }
        if($_POST['cuartos'] === ""){
            $_SESSION['Error'] = "Error, no selecciono CUARTOS";
            header("location:update.php?propiedad=".$_POST['id']);
            die();   
        }
        if($_POST['estado'] === ""){
            $_SESSION['Error'] = "Error, no selecciono un ESTADO";
            header("location:update.php?propiedad=".$_POST['id']);
            die();   
        }
        if($_POST['recamaras'] === ""){
            $_SESSION['Error'] = "Error, no selecciono RECAMARAS";
            header("location:update.php?propiedad=".$_POST['id']);
            die();   
        }
        if($_POST['agente'] === ""){
            $_SESSION['Error'] = "Error, no selecciono un AGENTE";
            header("location:update.php?propiedad=".$_POST['id']);
            die();   
        } 
        $respuesta = $controller->editPropiedad($_POST);
         
        if($respuesta['menssage'] === 'success'){
            if (!isset($_SESSION)) { session_start();}
            $_SESSION['success'] = "Propiedad editada correctamente";
            header("location: webadmin/propiedades.php");
            die();    
        }else{
            if (!isset($_SESSION)) { session_start();}
            $_SESSION['Error'] = "Error al editar la propiedad";
            header("location: webadmin/index.php");
            //die();
        }  
    break;
    case "delete_pic":
            
        //$target_dir = "img_dir/";
        // Get file path
        //$target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
        //var_dump($_GET['url']);
         if (file_exists($_POST['url'])) {
             unlink($_POST['url']);
         }
        
        $respuesta = $controller->deleteFoto($_POST);
        
        
        
        
    break;
    
    case "delete_company":
        
      
        
        
        
        break;
    default :
        if (!isset($_SESSION)) { session_start();}
        unset($_SESSION);
            
            header("location:login.php");
        break;
}

//echo json_encode($respuesta);
}else{
    if(isset($_GET["submit"])) {
        if($_GET['submit'] == 'delete_company'){
              $datosRecibidos['data'] = $_GET['data'];
        
        
        
        $respuesta = $controller->deleteInmobiliaria($datosRecibidos);
        
        
        if($respuesta['menssage'] === 'success'){
            header("location:empresas.php");
            //die();
        }
        }else if($_GET['submit'] == 'exit'){
            if (!isset($_SESSION)) { session_start();}
            unset($_SESSION);
            
            header("location:login.php");
        }
         
    }
}

