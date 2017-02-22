<?php
/**
 * ClcModel
 * 
 * Modelo de Tabla CATEGORIAS DE CLIENTES
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

    class ClcModel extends Model{

        protected $fields = array(
             "clcclc" => array("type"=>"key" , "isnull"=>false ,"value"=>"","label"=>"Clave")
            ,"clcnom" => array("type"=>"text"    , "isnull"=>true  ,"value"=>"","label"=>"Nombre")
            ,"clcval" => array("type"=>"percent"    , "isnull"=>true  ,"value"=>"","label"=>"Porcentaje de margen de ganancia")
            ,"clcact" => array("type"=>"select"  , "isnull"=>true  ,"value"=>"","label"=>"Activo", 
                                    "options"=>array(
                                         "S"=>"Si"
                                        ,"N"=>"No"
                            ))
        );

        public function __construct(){
            parent::__construct();
            $this->tableName = "clc";
            $this->tableDescription = "Categoria de clientes";
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

    function getClcTable(){
        return ( ClcModel::myself() );
    }

}
?>