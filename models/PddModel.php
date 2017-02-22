<?php
/**
 * PddModel
 * 
 * Modelo de Tabla DETALLE DE PEDIDO
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

    class PddModel extends Model{

        protected $fields = array(
             "pddpdd" => array("type"=>"key" , "isnull"=>false ,"value"=>"","label"=>"Clave")
            ,"pddped" => array("type"=>"linked"  , "isnull"=>true  ,"value"=>"", "label"=>"Clave de pedido",
                                    "references"=>array(
                                         "fk_tbl"=>"ped"
                                        ,"fk_ide"=>"pedped"
                                        ,"fk_des"=>"peddes"
                                        ,"fk_label"=>"Pedido"
                            ))
            ,"pddprd" => array("type"=>"linked"  , "isnull"=>true  ,"value"=>"", "label"=>"Clave de producto",
                                    "references"=>array(
                                         "fk_tbl"=>"prd"
                                        ,"fk_ide"=>"prdprd"
                                        ,"fk_des"=>"prdnom"
                                        ,"fk_label"=>"Producto"
                            ))
            ,"pddcan" => array("type"=>"text"    , "isnull"=>true  ,"value"=>"","label"=>"Cantidad")
            ,"pdduni" => array("type"=>"linked"  , "isnull"=>true  ,"value"=>"", "label"=>"Clave de unidad",
                                    "references"=>array(
                                         "fk_tbl"=>"uni"
                                        ,"fk_ide"=>"uniuni"
                                        ,"fk_des"=>"uninom"
                                        ,"fk_label"=>"Unidad"
                            ))
            ,"pddpdc" => array("type"=>"text"    , "isnull"=>true  ,"value"=>"","label"=>"Precio de compra")
            ,"pddpdv" => array("type"=>"text"    , "isnull"=>true  ,"value"=>"","label"=>"Precio de venta")
            ,"pddcad" => array("type"=>"text"    , "isnull"=>true  ,"value"=>"","label"=>"Caducidad")
            ,"pddlot" => array("type"=>"text"    , "isnull"=>true  ,"value"=>"","label"=>"Lote")
            ,"pddsur" => array("type"=>"select"  , "isnull"=>true  ,"value"=>"","label"=>"Surtido", 
                                    "options"=>array(
                                         "S"=>"Si"
                                        ,"N"=>"No"
                            ))
        );

        public function __construct(){
            parent::__construct();
            $this->tableName = "pdd";
            $this->tableDescription = "Detalle de pedido";
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

    function getPddTable(){
        return ( PddModel::myself() );
    }

}
?>