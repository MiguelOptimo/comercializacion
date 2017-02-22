<?php
/**
 * PedModel
 * 
 * Modelo de Tabla Ped
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

    class PedModel extends Model{

        protected $fields = array(
             "pedped" => array("type"=>"key" , "isnull"=>false ,"value"=>"","label"=>"Clave")
            ,"pedprv" => array("type"=>"linked"  , "isnull"=>true  ,"value"=>"", "label"=>"Clave de Proveedor",
                                    "references"=>array(
                                         "fk_tbl"=>"prv"
                                        ,"fk_ide"=>"prvprv"
                                        ,"fk_des"=>"prvnom"
                                        ,"fk_label"=>"Proveedor"
                            ))
            ,"peddes" => array("type"=>"text"    , "isnull"=>true  ,"value"=>"","label"=>"Descripci&oacute;n del pedido")
            ,"pednof" => array("type"=>"text"    , "isnull"=>true  ,"value"=>"","label"=>"No factura")
            ,"pedfec" => array("type"=>"text"    , "isnull"=>true  ,"value"=>"","label"=>"Fecha")
            ,"pedfer" => array("type"=>"text"    , "isnull"=>true  ,"value"=>"","label"=>"Fecha recibida")
            ,"pedtot" => array("type"=>"money"    , "isnull"=>true  ,"value"=>"","label"=>"Total")
        );

        protected $views = array(
            "pdd" => array(
                     'fk_tbl'=>'pdd'
                    ,'fk_ide'=>'pddped'
                    ,'fk_label'=>'Detalle de pedido'
                )
        );


        public function __construct(){
            parent::__construct();
            $this->tableName = "ped";
            $this->tableDescription = "Pedidos";
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

    function getPedTable(){
        return ( PedModel::myself() );
    }

}
?>