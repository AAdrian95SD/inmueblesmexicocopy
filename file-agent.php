<?php 
    
    // Database connection
    include './Controller.php';

    //header('Content-Type: application/json');

    $controller = new Controller();
    $respuesta = null;
    
    
    

    
    if(isset($_POST["submit"])) {
        // Set image placement folder
        $target_dir = "img_dir/agentes/";
        // Get file path
        $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
        // Get file extension
        $imageExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Allowed file types
        $allowd_file_ext = array("jpg", "jpeg", "png");
        

        if (!file_exists($_FILES["fileUpload"]["tmp_name"])) {
           $resMessage = array(
               "status" => "alert-danger",
               "message" => "Select image to upload."
           );
        } else if (!in_array($imageExt, $allowd_file_ext)) {
            $resMessage = array(
                "status" => "alert-danger",
                "message" => "Allowed file formats .jpg, .jpeg and .png."
            );            
        } else if ($_FILES["fileUpload"]["size"] > 2097152) {
            $resMessage = array(
                "status" => "alert-danger",
                "message" => "File is too large. File size should be less than 2 megabytes."
            );
        } else if (file_exists($target_file)) {
            $resMessage = array(
                "status" => "alert-danger",
                "message" => "File already exists."
            );
        } else {
            if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
                
                if (file_exists($_POST['oldurl'])) {
                    unlink($_POST['oldurl']);
                }
                
                $datosRecibidos['id'] = $_POST["agente"];
                $datosRecibidos['url'] = $target_file;
                $respuesta = $controller->addImgAgente($datosRecibidos);
                
                
               
                 if($respuesta['menssage'] == 'success'){
                    $resMessage = array(
                        "status" => "alert-success",
                        "message" => "Image uploaded successfully."
                    );                 
                    header("location:agent-all.php");
                 }else{
                     header("location:agent-edit.php?agent=".$_POST["agente"]);
                 }
            } else {
                $resMessage = array(
                    "status" => "alert-danger",
                    "message" => "Image coudn't be uploaded."
                );
            }
        }

    }

?>