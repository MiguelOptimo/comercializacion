<?php
/**
 * CliModel
 * 
 * Modelo de Tabla Cli
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

    class CliModel extends Model{

        protected $fields = array(
             "clicli" => array("type"=>"key" , "isnull"=>false ,"value"=>"","label"=>"Clave")

            ,"clinom" => array( "label" => "Razon Social")
            ,"clirfc" => array( "label" => "RFC")
            ,"cliclc" => array("type"=>"linked"  , "isnull"=>true  ,"value"=>"", "label"=>"Clave de categoria de cliente",
                                    "references"=>array(
                                         "fk_tbl"=>"clc"
                                        ,"fk_ide"=>"clcclc"
                                        ,"fk_des"=>"clcnom"
                                        ,"fk_label"=>"Categor&iacute;a de cliente"
                            ))
            ,"cliven" => array("type"=>"linked"  , "isnull"=>true  ,"value"=>"", "label"=>"Clave de vendedor",
                                    "references"=>array(
                                         "fk_tbl"=>"ven"
                                        ,"fk_ide"=>"venven"
                                        ,"fk_des"=>"vennom"
                                        ,"fk_label"=>"Vendedor asignado"
                            ))
            ,"clidir" => array( "type"=> "textarea", "label" => "Dirección fiscal")
            ,"clid01" => array( "label" => "Dirección fiscal. Calle")
            ,"clid02" => array( "label" => "Dirección fiscal. No Exterior")
            ,"clid03" => array( "label" => "Dirección fiscal. No Interior")
            ,"clid04" => array( "label" => "Dirección fiscal. Colonia")
            ,"clid05" => array( "label" => "Dirección fiscal. Municipio")
            ,"clid06" => array( "label" => "Dirección fiscal. Estado")
            ,"clid07" => array( "label" => "Dirección fiscal. Pais")
            ,"clid08" => array( "label" => "Dirección fiscal. CP")
            ,"clicon" => array( "label" => "Contacto principal")
            ,"cliem1" => array( "label" => "Correo electrónico")
            ,"clite1" => array( "label" => "Telefono")
            ,"clifa1" => array( "label" => "Fax")
            ,"cliex1" => array( "label" => "Extensión")
            ,"clis01" => array( "label" => "Contacto. Nombre")
            ,"clis02" => array( "label" => "Contacto. Apellidos")
            ,"clifdp" => array( "label" => "Forma de pago")
            ,"clidi1" => array( "label" => "Días de crédito")
            ,"cligir" => array( "label" => "Giro comercial")
            ,"clitie" => array( "label" => "Tiempo promedio de entrega")
            ,"clifec" => array( "label" => "Fecha de creación")


        );

        public function __construct(){
            parent::__construct();
            $this->tableName = "cli";
            $this->tableDescription = "Clientes";
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

    function getCliTable(){
        return ( CliModel::myself() );
    }

}
?>