<?php
/**
 * ExampleModel
 * 
 * Modelo de Tabla Example
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

    class ExampleModel extends Model{

        protected $fields = array(
             "exampleexample" => array("type"=>"key" , "isnull"=>false ,"value"=>"","label"=>"Clave")
            ,"examplenom" => array("type"=>"text"    , "isnull"=>true  ,"value"=>"","label"=>"Nombre")
            ,"exampleact" => array("type"=>"select"  , "isnull"=>true  ,"value"=>"","label"=>"Activo", 
                                    "options"=>array(
                                         "S"=>"Si"
                                        ,"N"=>"No"
                            ))
            ,"exampledes" => array("type"=>"linked"  , "isnull"=>true  ,"value"=>"", "label"=>"Clave de Desarrollo",
                                    "references"=>array(
                                         "fk_tbl"=>"des"
                                        ,"fk_ide"=>"desdes"
                                        ,"fk_des"=>"desnom"
                                        ,"fk_label"=>"Desarrollo"
                            ))
        );

        public function __construct(){
            parent::__construct();
            $this->tableName = "example";
            $this->tableDescription = "";
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

    function getExampleTable(){
        return ( ExampleModel::myself() );
    }

}
?>