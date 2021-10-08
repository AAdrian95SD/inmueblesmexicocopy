<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConexionBdd
 * Clase para conectarse a la base de datos MYSQL en PHP
 *
 * @author Armando
 * @author-email armandotejedaperez@gmail.com
 * @version 1.0
 */
class ConexionBdd extends PDO {

   /* private $tipo_de_base = 'mysql';
    private $host = '173.201.177.198';
    private $nombre_de_base = 'copoya';
    private $usuario = 'copoya_app';
    private $contrasena = 'zswSXnft*nZ7';*/

    private $tipo_de_base = 'mysql';
    private $host = '127.0.0.1';
    private $nombre_de_base = 'bd_inmuebles';
    private $usuario = 'root';
    private $contrasena = '';

    
    public function __construct() {
        //Sobreescribo el método constructor de la clase PDO.
        try {
            parent::__construct($this->tipo_de_base . ':host=' . $this->host . ';dbname=' . $this->nombre_de_base, $this->usuario, $this->contrasena, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            //echo 'Conexion exitosa';
            //$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo '<h1>Estamos trabajando en una actualización</h1>';
            //echo 'Ha surgido un error y no se puede conectar a la base de datos. ' . $e->getMessage();
            exit;
        }
    }

}
