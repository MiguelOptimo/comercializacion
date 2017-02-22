<?php
/**
 * CxvModel
 * 
 * Modelo de Tabla CLIENTES POR VENDEDOR
 * 
 * ESTE CÓDIGO E INFORMACIÓN SE PROPORCIONAN "TAL CUAL" SIN GARANTÍA DE NINGÚN
 * CLASE, BIEN EXPRESA O IMPLÍCITA, INCLUYENDO PERO NO LIMITADO A LA GARANTÍAS
 * DE COMERCIALIZACIÓN Y / O ADECUACIÓN A UN PROPÓSITO PARTICULAR.
 * 
 * Campos disponibles:
 *  text
 *  money
 *  date
 * 
 * @version 2017.01.10
 * @package models
 * @author Ing. Jorge Aníbal Padilla Hernández
 * 
 */

if (!class_exists( basename(__FILE__,".php") ) ){

    class CxvModel extends Model{

        protected $fields = array(
             "cxvcxv" => array("type"=>"key" , "isnull"=>false ,"value"=>"","label"=>"Clave")
            ,"cxvcli" => array("type"=>"linked"  , "isnull"=>true  ,"value"=>"", "label"=>"ID del cliente",
                                    "references"=>array(
                                         "fk_tbl"=>"cli"
                                        ,"fk_ide"=>"clicli"
                                        ,"fk_des"=>"clinom"
                                        ,"fk_label"=>"Cliente"
                            ))
            ,"cxvven" => array("type"=>"linked"  , "isnull"=>true  ,"value"=>"", "label"=>"ID del vendedor",
                                    "references"=>array(
                                         "fk_tbl"=>"ven"
                                        ,"fk_ide"=>"venven"
                                        ,"fk_des"=>"vennom"
                                        ,"fk_label"=>"Vendedor"
                            ))
        );

        public function __construct(){
            parent::__construct();
            $this->tableName = "cxv";
            $this->tableDescription = "Cartera de clientes por vendedor";
        }

        /*
        protected $views = array(
            "mks" => array(
                     'fk_tbl'=>'mks'
                    ,'fk_ide'=>'mksmkc'
                    ,'fk_label'=>'Cierre diario'
                )
            ,"cdm" => array(
                     'fk_tbl'=>'cdm'
                    ,'fk_ide'=>'cdmmkc'
                    ,'fk_label'=>'Captura diaria'
                )
        );
        */

        private static $instance = null;
        public static function myself(){
            if( self::$instance == null )
            {
                self::$instance = new self();
            }
            return self::$instance;
        }

    }

    function getCxvTable(){
        return ( CxvModel::myself() );
    }

}
?>