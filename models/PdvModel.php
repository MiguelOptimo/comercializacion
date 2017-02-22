<?php
/**
 * PdvModel
 * 
 * Modelo de Tabla Pdv
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

    class PdvModel extends Model{

        protected $fields = array(
             "pdvpdv" => array("type"=>"key" , "isnull"=>false ,"value"=>"","label"=>"Clave")
            ,"pdvprd" => array("type"=>"linked"  , "isnull"=>true  ,"value"=>"", "label"=>"Clave de Producto",
                                    "references"=>array(
                                         "fk_tbl"=>"prd"
                                        ,"fk_ide"=>"prdprd"
                                        ,"fk_des"=>"prdnom"
                                        ,"fk_label"=>"Producto"
                            ))
            ,"pdvuni" => array("type"=>"linked"  , "isnull"=>true  ,"value"=>"", "label"=>"Clave de Unidad",
                                    "references"=>array(
                                         "fk_tbl"=>"uni"
                                        ,"fk_ide"=>"uniuni"
                                        ,"fk_des"=>"uninom"
                                        ,"fk_label"=>"Unidad"
                            ))
            ,"pdvpre" => array("type"=>"money",  "label"=>"")
            ,"pdvmon" => array("type"=>"text",  "label"=>"")
            ,"pdvfun" => array("type"=>"text",  "label"=>"Factor de unidad")
            ,"pdvfca" => array("type"=>"text",  "label"=>"Factor de cambio")

        );

        public function __construct(){
            parent::__construct();
            $this->tableName = "pdv";
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

    function getPdvTable(){
        return ( PdvModel::myself() );
    }

}
?>