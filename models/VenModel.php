<?php
/**
 * VenModel
 * 
 * Modelo de Tabla VENDEDORES
 * 
 * ESTE CÓDIGO E INFORMACIÓN SE PROPORCIONAN "TAL CUAL" SIN GARANTÍA DE NINGÚN
 * CLASE, BIEN EXPRESA O IMPLÍCITA, INCLUYENDO PERO NO LIMITADO A LA GARANTÍAS
 * DE COMERCIALIZACIÓN Y / O ADECUACIÓN A UN PROPÓSITO PARTICULAR.
 * 
 * @version 2017.02.17
 * @package models
 * @author Ing. Jorge Aníbal Padilla Hernández
 * 
 */

if (!class_exists( basename(__FILE__,".php") ) ){

    class VenModel extends Model{

        protected $fields = array(
             "venven" => array("type"=>"key" , "isnull"=>false ,"value"=>"","label"=>"Clave")
            ,"vennom" => array("type"=>"text"    , "isnull"=>true  ,"value"=>"","label"=>"Nombre")
            ,"venusu" => array("type"=>"linked"  , "isnull"=>true  ,"value"=>"", "label"=>"Clave de usuario",
                                    "references"=>array(
                                         "fk_tbl"=>"usu"
                                        ,"fk_ide"=>"usuusu"
                                        ,"fk_des"=>"usunom"
                                        ,"fk_label"=>"Usuario vinculado para acceso al sistema"
                            ))

        );

        public function __construct(){
            parent::__construct();
            $this->tableName = "ven";
            $this->tableDescription = "Vendedores";
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

    function getVenTable(){
        return ( VenModel::myself() );
    }

}
?>