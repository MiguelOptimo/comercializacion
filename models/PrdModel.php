<?php
/**
 * PrdModel
 * 
 * Modelo de Tabla Prd
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

    class PrdModel extends Model{

        protected $fields = array(
             "prdprd" => array( "type"=>"key" , "isnull"=>false ,"value"=>"","label"=>"Clave")
            ,"prdimg" => array( "type"=>"image", "label" => "URL Imágen del producto")
            ,"prdcod" => array( "label" => "C&oacute;digo de barras")
            ,"prdnom" => array( "label" => "Nombre")
            ,"prddes" => array( "type"=>"blob" ,"label" => "Descripción del producto")
            ,"prdcat" => array("type"=>"linked"  , "isnull"=>true  ,"value"=>"", "label"=>"Clave de Categor&iacute;a",
                                    "references"=>array(
                                         "fk_tbl"=>"cat"
                                        ,"fk_ide"=>"catcat"
                                        ,"fk_des"=>"catnom"
                                        ,"fk_label"=>"Categor&iacute;a"
                            ))
            ,"prdfec" => array( "label" => "Fecha de publicación")
            ,"prdprv" => array("type"=>"linked"  , "isnull"=>true  ,"value"=>"", "label"=>"Clave de Proveedor",
                                    "references"=>array(
                                         "fk_tbl"=>"prv"
                                        ,"fk_ide"=>"prvprv"
                                        ,"fk_des"=>"prvnom"
                                        ,"fk_label"=>"Proveedor preferido"
                            ))
            ,"prdiva" => array( "type"=>"select"  , "isnull"=>true  ,"value"=>"","label"=>"Calcular Iva", 
                                    "options"=>array(
                                         "S"=>"Si"
                                        ,"N"=>"No"
                            ))
            ,"prdinm" => array( "label" => "Inventario m&iacute;nimo")
            ,"prdpre" => array( "label" => "Precio de venta")

        );

        protected $views = array(
            //  
            "pxp" => array(
                     'fk_tbl'=>'pxp'
                    ,'fk_ide'=>'pxpprv'
                    ,'fk_label'=>'Precios por proveedor'
                )
        );

        public function __construct(){
            parent::__construct();
            $this->tableName = "prd";
            $this->tableDescription = "Productos";
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

    function getPrdTable(){
        return ( PrdModel::myself() );
    }

}
?>