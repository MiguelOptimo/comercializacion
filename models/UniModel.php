<?php
/**
 * UniModel
 * 
 * Modelo de Tabla Uni
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

    class UniModel extends Model{

        protected $fields = array(
             "uniuni" => array("type"=>"key" , "isnull"=>false ,"value"=>"","label"=>"Clave")
            ,"uninom" => array("type"=>"text"    , "isnull"=>true  ,"value"=>"","label"=>"Nombre")
            ,"uniabr" => array("type"=>"text"    , "isnull"=>true  ,"value"=>"","label"=>"Abreviacion")
        );

        public function __construct(){
            parent::__construct();
            $this->tableName = "uni";
            $this->tableDescription = "";
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

    function getUniTable(){
        return ( UniModel::myself() );
    }

}
?>