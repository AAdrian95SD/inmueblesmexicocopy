<?php 
class M_pdf {   
    
    public function load($param=NULL){
        //require_once APPPATH.'./../recursos_portal/vendor/autoload.php';
        //..\recursos_portal\vendor\autoload.php
        require('vendor/autoload.php');
        return new \Mpdf\Mpdf([
            'margin_left'       =>  '0',
            'margin_right'      =>  '0',
            'mode'              =>  'utf-8',     //Codepage Values OR Codepage Values
            'format'            =>  'Demy',        //A4, Letter, Legal, Executive, Folio, Demy, Royal, etc
            'orientation'       =>  'P'          //"L" for Landscape orientation, "P" for Portrait orientation
        ]);
    }
}  
?>