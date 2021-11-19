
<?php   
    @$msg="";
    @$dat = $_GET['Fecha'];  
    @$data1 = $_GET['nombre'];  
    @$data2 = $_GET['dato'];  
    require ("../librerias/Email.php");
        $obj = new Email();        
        $num_word =  $obj->Metodo_Enviar($dat, $data1,$data2);
        $msg = $num_word; 
        if($msg == "enviado"){
            $msg = $num_word;
        }else{
            $msg  = false;
        }
    echo json_encode($msg);  
?>