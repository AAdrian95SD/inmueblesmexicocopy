<?php 
error_reporting(E_PARSE); 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ 
include 'utils/ConexionBdd.php'; 
/**
 * Description of Controller
 *
 * @author arman
 */
class Controller {
    //put your code here 
    private $conexion = null; 
    private function connectBD(){
        $this->conexion = new ConexionBdd();
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    public function login($DatosRecibidos){
        //var_dump($DatosRecibidos);
        try {
            $sql = "call login(?,?,@mensaje,@userID);"; 
            $this->connectBD(); 
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            $q = $this->conexion->prepare($sql); 
            $q->bindParam(1,$DatosRecibidos['username'], PDO::PARAM_STR);
            $q->bindParam(2,$DatosRecibidos['password'], PDO::PARAM_STR); 
            $q->execute(); 
            $q->closeCursor(); 
            //$output = $this->conexion->query("select @mensaje,@userID")->fectch(PDO::FETCH_ASSOC);
            $output = $this-> conexion->  query("select @mensaje,@userID;")-> fetch(PDO::FETCH_ASSOC); 
            if($output['@mensaje']  == "Bienvenido"){
                $respuesta = ['menssage' => 'success',
                                'userID' => $output['@userID']];
            }else{
                $respuesta = ['message' => 'usuario no encontrado'];
            }
            
        } catch (PDOException $exc) {
            $exc->errorInfo;
        }
        
        return $respuesta;
            
    }
    
    public function deleteFoto($DatosRecibidos){
        //var_dump($DatosRecibidos);
        try {
            $sql = "call delete_pic(?,@mensaje);";
            
            $this->connectBD();
            
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $q = $this->conexion->prepare($sql);
            
            $q->bindParam(1,$DatosRecibidos['foto'], PDO::PARAM_STR);
            
            $q->execute();
            
            $q->closeCursor();
            
            //$output = $this->conexion->query("select @mensaje,@userID")->fectch(PDO::FETCH_ASSOC);
            $output = $this-> conexion->  query("select @mensaje;")-> fetch(PDO::FETCH_ASSOC);
            
            
            
            if($output['@mensaje']  == "true"){
                $respuesta = ['menssage' => 'success'];
            }else{
                $respuesta = ['message' => 'error'];
            }
            
        } catch (PDOException $exc) {
            $exc->errorInfo;
        }
        
        return $respuesta;
            
    }
    
     public function deleteInmobiliaria($DatosRecibidos){
        //var_dump($DatosRecibidos);
        try {
            $sql = "call delete_inmobiliaria(?,@mensaje);";
            
            $this->connectBD();
            
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $q = $this->conexion->prepare($sql);
            
            $q->bindParam(1,$DatosRecibidos['data'], PDO::PARAM_STR);
            
            $q->execute();
            
            $q->closeCursor();
            
            //$output = $this->conexion->query("select @mensaje,@userID")->fectch(PDO::FETCH_ASSOC);
            $output = $this-> conexion->  query("select @mensaje;")-> fetch(PDO::FETCH_ASSOC);
            
            
            
            if($output['@mensaje']  == "true"){
                $respuesta = ['menssage' => 'success'];
            }else{
                $respuesta = ['message' => 'error'];
            }
            
        } catch (PDOException $exc) {
            $exc->errorInfo;
        }
        
        return $respuesta;
            
    }
    
    public function deleteproperty($DatosRecibidos){
        //var_dump($DatosRecibidos);
        try {
            $sql = "call delete_property(?,@mensaje);";
            
            $this->connectBD();
            
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $q = $this->conexion->prepare($sql);
            
            $q->bindParam(1,$DatosRecibidos['data'], PDO::PARAM_STR);
            
            $q->execute();
            
            $q->closeCursor();
            
            //$output = $this->conexion->query("select @mensaje,@userID")->fectch(PDO::FETCH_ASSOC);
            $output = $this-> conexion->  query("select @mensaje;")-> fetch(PDO::FETCH_ASSOC);
            
            
            
            if($output['@mensaje']  == "true"){
                $respuesta = ['menssage' => 'success'];
            }else{
                $respuesta = ['message' => 'error'];
            }
            
        } catch (PDOException $exc) {
            $exc->errorInfo;
        }
        
        return $respuesta;
            
    }
    
    public function getAgentesbyInmobiliaria($inmobiliaria){
        try {
            $sql = "SELECT * FROM agentes where inmobiliaria_id =".$inmobiliaria;
            /* genera la conexión a la db */
            $this->connectBD();

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Manejo de errores
            $q = $this->conexion->prepare($sql);

            $q->execute();

            $datos = $q->fetchAll();
            
            $res['sts'] = 1;

            $this->conexion = null;
        } catch (PDOException $e) {
            $res['sts'] = 0;
        }
        return $datos;
    }
    
    
    public function getAgentes(){
        try {
            $sql = "SELECT * FROM agentes";
            /* genera la conexión a la db */
            $this->connectBD();

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Manejo de errores
            $q = $this->conexion->prepare($sql);

            $q->execute();

            $datos = $q->fetchAll();
            
            $res['sts'] = 1;

            $this->conexion = null;
        } catch (PDOException $e) {
            $res['sts'] = 0;
        }
        return $datos;
    }
    
    public function getagenteDetail($agente){
        try {
            $sql = "SELECT * FROM agentes where id = ".$agente;
            /* genera la conexión a la db */
            $this->connectBD();

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Manejo de errores
            $q = $this->conexion->prepare($sql);

            $q->execute();

            $datos = $q->fetchAll();
            
            $res['sts'] = 1;

            $this->conexion = null;
        } catch (PDOException $e) {
            $res['sts'] = 0;
        }
        return $datos;
    }
    
    public function createPropiedad($DatosRecibidos){
        //var_dump($DatosRecibidos);
        try {
            $sql = "call create_propiedad(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,@propiedad,@mensaje);";
            
            $this->connectBD();
            
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $q = $this->conexion->prepare($sql);
            
            $q->bindParam(1,$DatosRecibidos['title'], PDO::PARAM_STR);
            $q->bindParam(2,$DatosRecibidos['estatus'], PDO::PARAM_STR);
            $q->bindParam(3,$DatosRecibidos['tipo'], PDO::PARAM_STR);
            $q->bindParam(4,$DatosRecibidos['precio'], PDO::PARAM_STR);
            $q->bindParam(5,$DatosRecibidos['superficie'], PDO::PARAM_STR);
            $q->bindParam(6,$DatosRecibidos['cuartos'], PDO::PARAM_STR);
            $q->bindParam(7,$DatosRecibidos['calle'], PDO::PARAM_STR);
            $q->bindParam(8,$DatosRecibidos['municipio'], PDO::PARAM_STR);
            $q->bindParam(9,$DatosRecibidos['estado'], PDO::PARAM_STR);
            $q->bindParam(10,$DatosRecibidos['codigopostal'], PDO::PARAM_STR);
            
            $q->bindParam(11,str_replace("\n", "<br>", $DatosRecibidos['descripcion']), PDO::PARAM_STR);
            $q->bindParam(12,$DatosRecibidos['recamaras'], PDO::PARAM_STR);
            $q->bindParam(13,$DatosRecibidos['banos'], PDO::PARAM_STR);
            $q->bindParam(14,$DatosRecibidos['agente'], PDO::PARAM_STR);
            $q->bindParam(15,$DatosRecibidos['superficie_total'], PDO::PARAM_STR);
            $q->bindParam(16,$DatosRecibidos['lat'], PDO::PARAM_STR);
            $q->bindParam(17,$DatosRecibidos['lang'], PDO::PARAM_STR);
            $q->bindParam(18,$DatosRecibidos['inmobiliaria'], PDO::PARAM_STR);
            
            $q->execute();
            
            $q->closeCursor();
            
            //$output = $this->conexion->query("select @mensaje,@userID")->fectch(PDO::FETCH_ASSOC);
            $output = $this-> conexion->  query("select @propiedad,@mensaje;")-> fetch(PDO::FETCH_ASSOC);
            
            
            
            if($output['@mensaje']  == "true"){
                $respuesta = ['menssage' => 'success',
                                'userID' => $output['@propiedad']];
            }else{
                $respuesta = ['message' => 'Error al crear la propiedad'];
            }
            
        } catch (PDOException $exc) {
            $exc->errorInfo;
        }
        
        return $respuesta;
    }
    
    public function createAgente($DatosRecibidos){
        var_dump($DatosRecibidos); 
        echo "<br>";
        echo $DatosRecibidos['nombre'];
        echo "<br>";
        try {
            $sql = "call addagente(?,?,?,?,?,?,?,@mensaje);"; 
            $this->connectBD(); 
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            $q = $this->conexion->prepare($sql); 
            $q->bindParam(1,$DatosRecibidos['nombre'], PDO::PARAM_STR);
            $q->bindParam(2,$DatosRecibidos['paterno'], PDO::PARAM_STR);
            $q->bindParam(3,$DatosRecibidos['materno'], PDO::PARAM_STR);
            $q->bindParam(4,$DatosRecibidos['emalAcce'], PDO::PARAM_STR);
            $q->bindParam(5,$DatosRecibidos['telefono'], PDO::PARAM_STR);
            $q->bindParam(6,$DatosRecibidos['SeleInmobiliaria'], PDO::PARAM_STR);
            $q->bindParam(7,$DatosRecibidos['passw'], PDO::PARAM_STR);
            //var_dump($q);
            $q->execute(); 
            $q->closeCursor(); 
            //$output = $this->conexion->query("select @mensaje,@userID")->fectch(PDO::FETCH_ASSOC);
            $output = $this-> conexion->  query("select @mensaje;")-> fetch(PDO::FETCH_ASSOC); 
            echo $output['@mensaje']; 
            if($output['@mensaje']  == "true"){
                $respuesta = ['menssage' => 'success'];
            }else{
                $respuesta = ['message' => 'Error al crear el agente'];
            } 
        } catch (PDOException $exc) {
            $exc->errorInfo;
        } 
        return $respuesta; 
    }
    
    public function editAgente($DatosRecibidos){
        //var_dump($DatosRecibidos);
        try {
            $sql = "call editagente(?,?,?,?,?,?,?,@mensaje);";
            
            $this->connectBD();
            
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $q = $this->conexion->prepare($sql);
            
            $q->bindParam(1,$DatosRecibidos['nombre'], PDO::PARAM_STR);
            $q->bindParam(2,$DatosRecibidos['paterno'], PDO::PARAM_STR);
            $q->bindParam(3,$DatosRecibidos['materno'], PDO::PARAM_STR);
            $q->bindParam(4,$DatosRecibidos['email'], PDO::PARAM_STR);
            $q->bindParam(5,$DatosRecibidos['telefono'], PDO::PARAM_STR);
            $q->bindParam(6,$DatosRecibidos['inmobiliaria'], PDO::PARAM_STR);
            $q->bindParam(7,$DatosRecibidos['id'], PDO::PARAM_STR);
            
            $q->execute();
            
            $q->closeCursor();
            
            //$output = $this->conexion->query("select @mensaje,@userID")->fectch(PDO::FETCH_ASSOC);
            $output = $this-> conexion->  query("select @mensaje;")-> fetch(PDO::FETCH_ASSOC);
            
            
            
            if($output['@mensaje']  == "true"){
                $respuesta = ['menssage' => 'success'];
            }else{
                $respuesta = ['message' => 'Error al crear el agente'];
            }
            
        } catch (PDOException $exc) {
            $exc->errorInfo;
        }
        
        return $respuesta;
            
    }
    
    public function editPropiedad($DatosRecibidos){
        var_dump($DatosRecibidos);
        try {
            $sql = "call edit_propiedad(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,@mensaje);";  
            $this->connectBD(); 
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            $q = $this->conexion->prepare($sql); 
            $q->bindParam(1,$DatosRecibidos['title'], PDO::PARAM_STR);
            $q->bindParam(2,$DatosRecibidos['estatus'], PDO::PARAM_STR);
            $q->bindParam(3,$DatosRecibidos['tipo'], PDO::PARAM_STR);
            $q->bindParam(4,$DatosRecibidos['precio'], PDO::PARAM_STR);
            $q->bindParam(5,$DatosRecibidos['superficie'], PDO::PARAM_STR);
            $q->bindParam(6,$DatosRecibidos['cuartos'], PDO::PARAM_STR);
            $q->bindParam(7,$DatosRecibidos['calle'], PDO::PARAM_STR);
            $q->bindParam(8,$DatosRecibidos['municipio'], PDO::PARAM_STR);
            $q->bindParam(9,$DatosRecibidos['estado'], PDO::PARAM_STR);
            $q->bindParam(10,$DatosRecibidos['codigopostal'], PDO::PARAM_STR); 
            $q->bindParam(11,str_replace("\n", "<br>", $DatosRecibidos['descripcion']), PDO::PARAM_STR);
            $q->bindParam(12,$DatosRecibidos['recamaras'], PDO::PARAM_STR);
            $q->bindParam(13,$DatosRecibidos['banos'], PDO::PARAM_STR);
            $q->bindParam(14,$DatosRecibidos['agente'], PDO::PARAM_STR);
            $q->bindParam(15,$DatosRecibidos['superficie_total'], PDO::PARAM_STR);
            $q->bindParam(16,$DatosRecibidos['id'], PDO::PARAM_STR);
            $q->bindParam(17,$DatosRecibidos['lat'], PDO::PARAM_STR);
            $q->bindParam(18,$DatosRecibidos['lang'], PDO::PARAM_STR);
            $q->bindParam(19,$DatosRecibidos['inmobiliaria'], PDO::PARAM_STR); 
            $q->execute();
            
            $q->closeCursor(); 
            //$output = $this->conexion->query("select @mensaje,@userID")->fectch(PDO::FETCH_ASSOC);
            $output = $this-> conexion->  query("select @mensaje;")-> fetch(PDO::FETCH_ASSOC); 
            if($output['@mensaje']  == "true"){
                $respuesta = ['menssage' => 'success'];
            }else{
                $respuesta = ['message' => 'Error al editar la propiedad'];
            }
            
        } catch (PDOException $exc) {
            $exc->errorInfo;
        } 
        return $respuesta;  
    }
    
    public function getPropiedades(){
        try {
            $sql = "SELECT * FROM propiedades where activo=1 order by id desc";
            /* genera la conexión a la db */
            $this->connectBD();

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Manejo de errores
            $q = $this->conexion->prepare($sql);

            $q->execute();

            $datos = $q->fetchAll();
            
            $res['sts'] = 1;

            $this->conexion = null;
        } catch (PDOException $e) {
            $res['sts'] = 0;
        }
        return $datos;
    }
    public function getPropiedadesByInmobiliaria($inmobiliaria){
        try {
            $sql = "SELECT * FROM propiedades where inmobiliaria_id=".$inmobiliaria." and activo=1 order by id desc";
            /* genera la conexión a la db */
            $this->connectBD();

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Manejo de errores
            $q = $this->conexion->prepare($sql);

            $q->execute();

            $datos = $q->fetchAll();
            
            $res['sts'] = 1;

            $this->conexion = null;
        } catch (PDOException $e) {
            $res['sts'] = 0;
        }
        return $datos;
    }
    
    public function getPropiedadesByIdUser($Id){
        try {
            $sql = "SELECT * FROM propiedades where id=".$Id." and activo=1 order by id desc";
            /* genera la conexión a la db */
            $this->connectBD();

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Manejo de errores
            $q = $this->conexion->prepare($sql);

            $q->execute();

            $datos = $q->fetchAll();
            
            $res['sts'] = 1;

            $this->conexion = null;
        } catch (PDOException $e) {
            $res['sts'] = 0;
        }
        return $datos;
    }
    public function getPropiedadesByIdUserReal($Id){
        try {
            $sql = "SELECT * FROM propiedades where agente_id=".$Id." and activo=1 order by id desc";
            /* genera la conexión a la db */
            $this->connectBD();

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Manejo de errores
            $q = $this->conexion->prepare($sql);

            $q->execute();

            $datos = $q->fetchAll();
            
            $res['sts'] = 1;

            $this->conexion = null;
        } catch (PDOException $e) {
            $res['sts'] = 0;
        }
        return $datos;
    }
    public function getCompanyDetail($company){
        
        try {
            $sql = "SELECT * FROM inmobiliarias join estados on inmobiliarias.estado_id = estados.id where inmobiliarias.estatus = 1 and inmobiliarias.id=".$company;
            /* genera la conexión a la db */
            $this->connectBD();
//echo $sql;
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Manejo de errores
            $q = $this->conexion->prepare($sql);

            $q->execute();

            $datos = $q->fetchAll();
            
            $res['sts'] = 1;

            $this->conexion = null;
        } catch (PDOException $e) {
            $res['sts'] = 0;
        }
        return $datos;
    }
    
    
    public function getCorreosCompany($company){
        try {
            $sql = "SELECT * FROM correo_inmobiliaria where inmobiliaria_id=".$company;
            /* genera la conexión a la db */
            $this->connectBD();

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Manejo de errores
            $q = $this->conexion->prepare($sql);

            $q->execute();

            $datos = $q->fetchAll();
            
            $res['sts'] = 1;

            $this->conexion = null;
        } catch (PDOException $e) {
            $res['sts'] = 0;
        }
        return $datos;
    }
    
    public function getUserDetail($user){
        try {
            $sql = "SELECT * FROM users where id=".$user;
            /* genera la conexión a la db */
            $this->connectBD();

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Manejo de errores
            $q = $this->conexion->prepare($sql);

            $q->execute();

            $datos = $q->fetchAll();
            
            $res['sts'] = 1;

            $this->conexion = null;
        } catch (PDOException $e) {
            $res['sts'] = 0;
        }
        return $datos;
    }
    
    
    public function getTelefonosCompany($company){
        try {
            $sql = "SELECT * FROM telefono_inmobiliaria where inmobiliaria_id=".$company;
            /* genera la conexión a la db */
            $this->connectBD();

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Manejo de errores
            $q = $this->conexion->prepare($sql);

            $q->execute();

            $datos = $q->fetchAll();
            
            $res['sts'] = 1;

            $this->conexion = null;
        } catch (PDOException $e) {
            $res['sts'] = 0;
        }
        return $datos;
    }
    
    
    public function getEstados(){
        try {
            $sql = "SELECT * FROM estados where estatus = 1 ORDER BY nombre";
            /* genera la conexión a la db */
            $this->connectBD(); 
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Manejo de errores
            $q = $this->conexion->prepare($sql); 
            $q->execute();

            $datos = $q->fetchAll();
            
            $res['sts'] = 1;

            $this->conexion = null;
        } catch (PDOException $e) {
            $res['sts'] = 0;
        }
        return $datos;
    } 

    ///Crar controlador de obtener municipio por id de estado
    public function getMunicipios(){
        try{
            $sql = "SELECT * FROM estados_municipios where estados_id=1";

            $this->connectBD();
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //MANEJO DE ERRORES
            $q = $this->conexion->prepare($sql);
            $q->execute();

            $datos = $q->fetchall();

            $res['sts'] = 1;

            $this->conexion = null;
        }catch (PDOException $e){
            $res['sts'] = 0;
        }
        return $datos;
    }

    public function getEstadosByInmobiliaria($inmobiliaria){
        try {
            $sql = "SELECT * FROM estados join estado_inmobiliaria on estados.id = estado_inmobiliaria.estado_id where estado_inmobiliaria.estatus = 1 and inmobiliaria_id = ".$inmobiliaria;
            /* genera la conexión a la db */
            $this->connectBD();

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Manejo de errores
            $q = $this->conexion->prepare($sql);

            $q->execute();

            $datos = $q->fetchAll();
            
            $res['sts'] = 1;

            $this->conexion = null;
        } catch (PDOException $e) {
            $res['sts'] = 0;
        }
        return $datos;
    }

    public function getEstadosByUser($IdEstado,$IdMunici){
        try {
            $sql = "SELECT estados.id, estados.nombre, municipios.id, municipios.nombre FROM estados INNER JOIN estados_municipios INNER JOIN municipios WHERE estados_municipios.estados_id = estados.id AND estados_municipios.municipios_id=municipios.id AND municipios.id=$IdMunici AND estados.id=$IdEstado";
            /* genera la conexión a la db */
            $this->connectBD(); 
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Manejo de errores
            $q = $this->conexion->prepare($sql); 
            $q->execute(); 
            $datos = $q->fetchAll(); 
            $res['sts'] = 1; 
            $this->conexion = null;
        } catch (PDOException $e) {
            $res['sts'] = 0;
        }
        return $datos;
    }

    public function getSocialInmobiliaria($inmobiliaria){
        try {
            $sql = "SELECT * FROM social_inmobiliaria where inmobiliaria_id = ".$inmobiliaria;
            /* genera la conexión a la db */
            
            $this->connectBD();

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Manejo de errores
            $q = $this->conexion->prepare($sql);

            $q->execute();

            $datos = $q->fetchAll();
            
            $res['sts'] = 1;

            $this->conexion = null;
        } catch (PDOException $e) {
            $res['sts'] = 0;
        }
        return $datos;
    }
    
    public function getallInmobiliarias(){
        try {
            $sql = "SELECT * FROM inmobiliarias join estados on inmobiliarias.estado_id = estados.id where inmobiliarias.estatus = 1 order by orden";
            /* genera la conexión a la db */
            $this->connectBD();

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Manejo de errores
            $q = $this->conexion->prepare($sql);

            $q->execute();

            $datos = $q->fetchAll();
            
            $res['sts'] = 1;

            $this->conexion = null;
        } catch (PDOException $e) {
            $res['sts'] = 0;
        }
        return $datos;
    }
    
    public function getInmobiliariasbyEstado($estado){
        try {
            $sql = "SELECT * FROM inmobiliarias join estados on inmobiliarias.estado_id = estados.id where inmobiliarias.estatus = 1 and estado_id = ".$estado;
            /* genera la conexión a la db */
            $this->connectBD();

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Manejo de errores
            $q = $this->conexion->prepare($sql);

            $q->execute();

            $datos = $q->fetchAll();
            
            $res['sts'] = 1;

            $this->conexion = null;
        } catch (PDOException $e) {
            $res['sts'] = 0;
        }
        return $datos;
    }
    
    public function getInmobiliariasbyEstadov2($estado){
        try {
            $sql = "SELECT * FROM inmobiliarias join estados on inmobiliarias.estado_id = estados.id where inmobiliarias.estatus = 1 and inmobiliarias.estado_id =".$estado;
            /* genera la conexión a la db */
            $this->connectBD();
            //echo $sql;

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Manejo de errores
            $q = $this->conexion->prepare($sql);

            $q->execute();

            $datos = $q->fetchAll();
            
            $res['sts'] = 1;

            $this->conexion = null;
        } catch (PDOException $e) {
            $res['sts'] = 0;
        }
        return $datos;
    }
    
    
    public function getMunicipiosId($estado){
        try {
            $sql = "SELECT municipios.id, municipios.nombre FROM municipios INNER JOIN estados_municipios WHERE estados_municipios.municipios_id = municipios.id AND estados_municipios.estados_id=".$estado." ORDER BY nombre";
            /* genera la conexión a la db */
            $this->connectBD();

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Manejo de errores
            $q = $this->conexion->prepare($sql);

            $q->execute();

            $datos = $q->fetchAll();
            
            $res['sts'] = 1;

            $this->conexion = null;
        } catch (PDOException $e) {
            $res['sts'] = 0;
        }
        return $datos;
    }
    
    public function getinmobiliarias($estado){
        try {
            $sql = "select*from inmobiliarias where estatus = 1";
            /* genera la conexión a la db */
            $this->connectBD();

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Manejo de errores
            $q = $this->conexion->prepare($sql);

            $q->execute();

            $datos = $q->fetchAll();
            
            $res['sts'] = 1;

            $this->conexion = null;
        } catch (PDOException $e) {
            $res['sts'] = 0;
        }
        return $datos;
    }
    
    public function getLastPropiedades(){
        try {
            $sql = "SELECT p.id,p.titulo,p.estatus,p.tipo,p.precio,p.superficie,
                p.garajes, p.calle,p.municipio,p.estado,p.codigo_postal,
				p.descripcion,p.recamaras,p.banos,p.agente_id,p.superficie_total,p.activo, a.telefono,a.url_foto,
				e.id,e.nombre,e.estatus,m.id,m.nombre,m.estado_id,p.lat,p.lang 
                FROM propiedades as p join agentes as a on a.id = p.agente_id 
                                            join estados as e on e.id = estado
                                            join municipios as m on m.id = p.municipio
                                        where activo=1 GROUP BY p.id ORDER BY p.id desc limit 5";
            /* genera la conexión a la db */
            $this->connectBD();

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Manejo de errores
            $q = $this->conexion->prepare($sql);

            $q->execute();

            $datos = $q->fetchAll();
            
            $res['sts'] = 1;

            $this->conexion = null;
        } catch (PDOException $e) {
            $res['sts'] = 0;
        }
        return $datos;
    }
    
    public function getfotos($propiedad){
        try {
            $sql = "SELECT * FROM fotos where estatus=1 and propiedad_id =".$propiedad;
           
            /* genera la conexión a la db */
            $this->connectBD();

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Manejo de errores
            $q = $this->conexion->prepare($sql);

            $q->execute();

            $datos = $q->fetchAll();
            
            
            
            $res['sts'] = 1;

            $this->conexion = null;
        } catch (PDOException $e) {
            $res['sts'] = 0;
        }
        return $datos;
    }
    
    public function getPropiedadesFiltro($estatus,$estado){
        try {
            $sql = "select p.id,p.titulo,p.estatus,p.tipo,p.precio,p.superficie,p.garajes,p.calle,p.municipio,p.estado,p.codigo_postal,
				p.descripcion,p.recamaras,p.banos,p.agente_id,p.superficie_total,p.activo,
				a.id,a.nombre,a.paterno,a.materno,a.email,a.telefono,a.url_foto,
				e.id,e.nombre,e.estatus,m.id,m.nombre,m.estado_id,p.lat,p.lang 
				from propiedades as p join agentes as a on a.id = p.agente_id "
                    . "join estados as e on e.id = estado
                        join municipios as m on m.id = p.municipio
                        where activo=1 and p.estatus='".$estatus."' and p.estado=".$estado." group by p.id				";
            /* genera la conexión a la db */
            //var_dump($sql);
            $this->connectBD();

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Manejo de errores
            $q = $this->conexion->prepare($sql);

            $q->execute();

            $datos = $q->fetchAll();
            
            
            
            $res['sts'] = 1;

            $this->conexion = null;
        } catch (PDOException $e) {
            $res['sts'] = 0;
        }
        return $datos;
    }
    
    public function getdetailByID($propiedad){
        try {
            $sql = "select p.id,p.titulo,p.estatus,p.tipo,p.precio,p.superficie,
                p.garajes,p.calle,p.municipio,p.estado,p.codigo_postal,
				p.descripcion,p.recamaras,p.banos,p.agente_id,p.superficie_total,
                                p.activo,
				a.id,a.nombre,a.paterno,a.materno,a.email,a.telefono,a.url_foto,
				e.id,e.nombre,
                                e.estatus,m.id,m.nombre,m.estado_id,p.lat,p.lang,p.inmobiliaria_id 
				from propiedades as p join agentes as a on a.id = p.agente_id "
                    . "join estados as e on e.id = estado
                        join municipios as m on m.id = p.municipio
                        where activo=1 and p.id=".$propiedad;
            /* genera la conexión a la db */
            $this->connectBD();

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Manejo de errores
            $q = $this->conexion->prepare($sql);

            $q->execute();

            $datos = $q->fetchAll();
            
            
            
            $res['sts'] = 1;

            $this->conexion = null;
        } catch (PDOException $e) {
            $res['sts'] = 0;
        }
        return $datos;
    }
    
    public function getSimilar($propiedad){
        try {
            $sql = "select p.id,p.titulo,p.estatus,p.tipo,p.precio,p.superficie,p.garajes,p.calle,p.municipio,p.estado,p.codigo_postal,
				p.descripcion,p.recamaras,p.banos,p.agente_id,p.superficie_total,p.activo,
				a.id,a.nombre,a.paterno,a.materno,a.email,a.telefono,a.url_foto,
				e.id,e.nombre,e.estatus,m.id,m.nombre,m.estado_id,p.lat,p.lang 
				from propiedades as p join agentes as a on a.id = p.agente_id "
                    . "join estados as e on e.id = estado
                        join municipios as m on m.id = p.municipio
                        where activo=1 and estado=".$propiedad." group by p.id";
            /* genera la conexión a la db */
            $this->connectBD();

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Manejo de errores
            $q = $this->conexion->prepare($sql);

            $q->execute();

            $datos = $q->fetchAll();
            
            
            
            $res['sts'] = 1;

            $this->conexion = null;
        } catch (PDOException $e) {
            $res['sts'] = 0;
        }
        return $datos;
    }
    
    
    public function getPropiedadesFiltros($estado,$tipo,$estatus,$company,$text){
        $sql_estado = "";
        $sql_tipo = "";
        $sql_estatus = "";
        $sql_company = "";
        $sql_text = "";
        if($estado>0){
            $sql_estado = " and p.estado=".$estado;
        }
        if(!empty($tipo)){
            $sql_tipo = " and p.tipo='".$tipo."'";
        }
        if(!empty($estatus)){
            $sql_estatus = " and p.estatus='".$estatus."'";
        }
        if($company>0){
            $sql_company = " and p.inmobiliaria_id=".$company;
        }
        if(!empty($text)){
            $sql_text = " and p.descripcion LIKE '%".$text."%'";
        }
        
        try {
            $sql = "select p.id,p.titulo,p.estatus,p.tipo,p.precio,p.superficie,p.garajes,p.calle,p.municipio,p.estado,p.codigo_postal,
				p.descripcion,p.recamaras,p.banos,p.agente_id,p.superficie_total,p.activo,
				a.id,a.nombre,a.paterno,a.materno,a.email,a.telefono,a.url_foto,
				e.id,e.nombre,e.estatus,m.id,m.nombre,m.estado_id,p.lat,p.lang 
				from propiedades as p join agentes as a on a.id = p.agente_id "
                    . "join estados as e on e.id = estado
                        join municipios as m on m.id = p.municipio
                        where activo=1 ".$sql_estado." "
                    . "".$sql_tipo." "
                    . "".$sql_estatus." "
                    . "".$sql_company." "
                    . "".$sql_text." group by p.id";
            /* genera la conexión a la db */
            //echo $sql;
            //echo $sql;
            $this->connectBD();

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Manejo de errores
            $q = $this->conexion->prepare($sql);

            $q->execute();

            $datos = $q->fetchAll();
            
            
            
            $res['sts'] = 1;

            $this->conexion = null;
        } catch (PDOException $e) {
            $res['sts'] = 0;
        }
        return $datos;
    }
    
    
    public function getallPropiedades(){
        try {
            $sql = "select p.id,p.titulo,p.estatus,p.tipo,p.precio,
                    p.superficie,p.garajes,p.calle,p.municipio,p.estado,
                    p.codigo_postal,p.descripcion,p.recamaras,p.banos,p.agente_id,
                    p.superficie_total,p.activo,a.id,a.nombre,a.paterno,
                    a.materno,a.email,a.telefono,a.url_foto,e.id,
                    e.nombre,e.estatus,m.id,m.nombre,m.estado_id,
                    p.lat,p.lang 
				from propiedades as p join agentes as a on a.id = p.agente_id "
                    . "join estados as e on e.id = estado
                        join municipios as m on m.id = p.municipio
                        where activo=1 group by p.id";
            /* genera la conexión a la db */
            $this->connectBD();

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Manejo de errores
            $q = $this->conexion->prepare($sql);

            $q->execute();

            $datos = $q->fetchAll();
            
            
            
            $res['sts'] = 1;

            $this->conexion = null;
        } catch (PDOException $e) {
            $res['sts'] = 0;
        }
        return $datos;
    }
    
    
    
    public function addImg($DatosRecibidos){
        //var_dump($DatosRecibidos);
        try {
            $sql = "call addImagen(?,?,@mensaje);";
            
            $this->connectBD();
            
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $q = $this->conexion->prepare($sql);
            
            $q->bindParam(1,$DatosRecibidos['id'], PDO::PARAM_STR);
            $q->bindParam(2,$DatosRecibidos['url'], PDO::PARAM_STR);
            
            $q->execute();
            
            $q->closeCursor();
            
            //$output = $this->conexion->query("select @mensaje,@userID")->fectch(PDO::FETCH_ASSOC);
            $output = $this-> conexion->  query("select @mensaje;")-> fetch(PDO::FETCH_ASSOC);
            
            
            
            if($output['@mensaje']  == "true"){
                $respuesta = ['menssage' => 'success'];
            }else{
                $respuesta = ['message' => 'error al agregar imagen'];
            }
            
        } catch (PDOException $exc) {
            $exc->errorInfo;
        }
        
        return $respuesta;
            
    }
    
    public function addImgAgente($DatosRecibidos){
        //var_dump($DatosRecibidos);
        try {
            $sql = "call addImagenAgente(?,?,@mensaje);";
            
            $this->connectBD();
            
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $q = $this->conexion->prepare($sql);
            
            $q->bindParam(1,$DatosRecibidos['id'], PDO::PARAM_STR);
            $q->bindParam(2,$DatosRecibidos['url'], PDO::PARAM_STR);
            
            $q->execute();
            
            $q->closeCursor();
            
            //$output = $this->conexion->query("select @mensaje,@userID")->fectch(PDO::FETCH_ASSOC);
            $output = $this-> conexion->  query("select @mensaje;")-> fetch(PDO::FETCH_ASSOC);
            
            
            
            if($output['@mensaje']  == "true"){
                $respuesta = ['menssage' => 'success'];
            }else{
                $respuesta = ['message' => 'error al agregar imagen'];
            }
            
        } catch (PDOException $exc) {
            $exc->errorInfo;
        } 
        return $respuesta; 
    }
    
    public function getAllPlanes(){
        try {
            $sql = "SELECT * FROM planes";
            /* genera la conexión a la db */
            $this->connectBD();

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Manejo de errores
            $q = $this->conexion->prepare($sql);

            $q->execute();

            $datos = $q->fetchAll();
            
            $res['sts'] = 1;

            $this->conexion = null;
        } catch (PDOException $e) {
            $res['sts'] = 0;
        }
        return $datos;
    }

    public function getAllPlanesById($Id){
        try {
            $sql = "SELECT * FROM planes WHERE id=".$Id;
            /* genera la conexión a la db */
            $this->connectBD();

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Manejo de errores
            $q = $this->conexion->prepare($sql);

            $q->execute();

            $datos = $q->fetchAll();
            
            $res['sts'] = 1;

            $this->conexion = null;
        } catch (PDOException $e) {
            $res['sts'] = 0;
        }
        return $datos;
    }

    public function getPlanesByid_agente($Id){
        try {
            $sql = "SELECT planes.id, planes.Nombre, planes.num_propiedades, planes.costo, planes.tiempo, agente_plan.id_agente, agente_plan.fecha_subsicripcion FROM agente_plan INNER JOIN planes WHERE agente_plan.id_plan=planes.id AND agente_plan.id_agente=".$Id.";";
            /* genera la conexión a la db */
            $this->connectBD(); 
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Manejo de errores
            $q = $this->conexion->prepare($sql); 
            $q->execute(); 
            $datos = $q->fetchAll(); 
            $res['sts'] = 1; 
            $this->conexion = null;
        } catch (PDOException $e) {
            $res['sts'] = 0;
        }
        return $datos;
    }

    public function CrearComprobante($id_plan,$id_agente,$tok){
        try {
            $sql = "call agentPlan(?,?,?,@mensaje);";
            
            $this->connectBD();
            
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $q = $this->conexion->prepare($sql);
            
            $q->bindParam(1,$id_plan, PDO::PARAM_STR);
            $q->bindParam(2,$id_agente, PDO::PARAM_STR); 
            $q->bindParam(3,$tok, PDO::PARAM_STR);
            
            $q->execute();
            
            $q->closeCursor();
            
            //$output = $this->conexion->query("select @mensaje,@userID")->fectch(PDO::FETCH_ASSOC);
            $output = $this-> conexion->  query("select @mensaje;")-> fetch(PDO::FETCH_ASSOC);
            
            
            
            if($output['@mensaje']  == "true"){
                $respuesta = ['menssage' => 'success'];
            }else{
                $respuesta = ['message' => 'error al agregar imagen'];
            }
            
        } catch (PDOException $exc) {
            $exc->errorInfo;
        }
        
        return $respuesta;
    }
    
}
