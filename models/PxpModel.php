<?php
/**
 * PxpModel
 * 
 * Modelo de Tabla PRECIOS DE PRODUCTO POR PROVEEDOR
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

    class PxpModel extends Model{

        protected $fields = array(
             "pxppxp" => array("type"=>"key" , "isnull"=>false ,"value"=>"","label"=>"Clave")
            ,"pxpprv" => array("type"=>"linked"  , "isnull"=>true  ,"value"=>"", "label"=>"Clave de proveedor",
                                    "references"=>array(
                                         "fk_tbl"=>"prv"
                                        ,"fk_ide"=>"prvprv"
                                        ,"fk_des"=>"prvnom"
                                        ,"fk_label"=>"Proveedor"
                            ))
            ,"pxpnom" => array("type"=>"money"    , "isnull"=>true  ,"value"=>"","label"=>"Precio")
        );

        public function __construct(){
            parent::__construct();
            $this->tableName = "pxp";
            $this->tableDescription = "Precio de producto por proveedor";
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

    function getPxpTable(){
        return ( PxpModel::myself() );
    }

}
?>