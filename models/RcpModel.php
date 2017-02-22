<?php
/**
 * RcpModel
 * 
 * Modelo de Tabla Rcp
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

    class RcpModel extends Model{

        protected $fields = array(
             "rcprcp" => array("type"=>"key" , "isnull"=>false ,"value"=>"","label"=>"Clave")
            ,"rcpnom" => array("type"=>"text"    , "isnull"=>true  ,"value"=>"","label"=>"Descripcion de venta")
            ,"rcpcli" => array("type"=>"linked"  , "isnull"=>true  ,"value"=>"", "label"=>"ID del cliente",
                                    "references"=>array(
                                         "fk_tbl"=>"cli"
                                        ,"fk_ide"=>"clicli"
                                        ,"fk_des"=>"clinom"
                                        ,"fk_label"=>"Cliente"
                            ))

            ,"rcpfec" => array("label" => "Fecha de venta")
            ,"rcpnum" => array("label" => "Folio Interno")
            ,"rcpus1" => array("type"=>"linked", "label"=>"ID Usuario",
                                    "references"=>array(
                                         "fk_tbl"=>"usu"
                                        ,"fk_ide"=>"usuusu"
                                        ,"fk_des"=>"usunom"
                                        ,"fk_label"=>"Usuario asignado a la venta"
                            ))
            ,"rcpsub" => array("label" => "Sub Total")
            ,"rcpiva" => array("label" => "Impuestos")
            ,"rcpdsc" => array("label" => "Descuento")
            ,"rcptot" => array("label" => "Total")
            ,"rcpmon" => array("label" => "TipoMoneda")
            ,"rcptxt" => array("label" => "Comentarios")
            ,"rcprqf" => array("type"=>"select", "label"=>"Requiere factura", 
                                    "options"=>array(
                                         "S"=>"Si"
                                        ,"N"=>"No"
                            ))
            ,"rcpfac" => array("type"=>"select", "label"=>"Facturado", 
                                    "options"=>array(
                                         "S"=>"Si"
                                        ,"N"=>"No"
                            ))
            ,"rcppag" => array("type"=>"linked"  , "isnull"=>true  ,"value"=>"", "label"=>"ID forma de pago",
                                    "references"=>array(
                                         "fk_tbl"=>"fdp"
                                        ,"fk_ide"=>"fdpfdp"
                                        ,"fk_des"=>"fdpnom"
                                        ,"fk_label"=>"Forma de pago"
                            ))
            ,"rcpact" => array("type"=>"select"  , "isnull"=>true  ,"value"=>"","label"=>"Pagada", 
                                    "options"=>array(
                                         "S"=>"Si"
                                        ,"N"=>"No"
                            ))

        );
        protected $views = array(
            "rcd" => array(
                     'fk_tbl'=>'rcd'
                    ,'fk_ide'=>'rcdrcp'
                    ,'fk_label'=>'Detalle de venta'
                )
        );

        public function __construct(){
            parent::__construct();
            $this->tableName = "rcp";
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

    function getRcpTable(){
        return ( RcpModel::myself() );
    }

}
?>