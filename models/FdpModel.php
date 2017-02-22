<?php
/**
 * FdpModel
 * 
 * Modelo de Tabla Fdp
 * 
 * ESTE CÓDIGO E INFORMACIÓN SE PROPORCIONAN "TAL CUAL" SIN GARANTÍA DE NINGÚN
 * CLASE, BIEN EXPRESA O IMPLÍCITA, INCLUYENDO PERO NO LIMITADO A LA GARANTÍAS
 * DE COMERCIALIZACIÓN Y / O ADECUACIÓN A UN PROPÓSITO PARTICULAR.
 * 
 * @version 2017.01.10
 * @package models
 * @author Ing. Jorge Aníbal Padilla Hernández
 * 
 */

if (!class_exists( basename(__FILE__,".php") ) ){

    class FdpModel extends Model{

        protected $fields = array(
             "fdpfdp" => array("type"=>"key" , "isnull"=>false ,"value"=>"","label"=>"Clave")
            ,"fdpnom" => array("type"=>"text"    , "isnull"=>true  ,"value"=>"","label"=>"Forma de pago")
        );

        public function __construct(){
            parent::__construct();
            $this->tableName = "fdp";
            $this->tableDescription = "Formas de pago";
        }

        private static $instance = null;
        public static function myself(){
            if( self::$instance == null )
            {
                self::$instance = new self();
            }
            return self::$instance;
        }

    }

    function getFdpTable(){
        return ( FdpModel::myself() );
    }

}
?>