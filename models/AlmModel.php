<?php
/**
 * AlmModel
 * 
 * Modelo de Tabla Alm
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

    class AlmModel extends Model{

        protected $fields = array(
             "almalm" => array("type"=>"key" , "isnull"=>false ,"value"=>"","label"=>"Clave")
            ,"almnom" => array("type"=>"text"    , "isnull"=>true  ,"value"=>"","label"=>"Nombre")
            ,"almcen" => array("type"=>"linked"  , "isnull"=>true  ,"value"=>"", "label"=>"Clave de Desarrollo",
                                    "references"=>array(
                                         "fk_tbl"=>"cen"
                                        ,"fk_ide"=>"cencen"
                                        ,"fk_des"=>"cennom"
                                        ,"fk_label"=>"Sucursal"
                            ))

        );

        public function __construct(){
            parent::__construct();
            $this->tableName = "alm";
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

    function getAlmTable(){
        return ( AlmModel::myself() );
    }

}
?>