<?php
/**
 * CtaModel
 * 
 * Modelo de Tabla Cta
 * 
 * ESTE CÓDIGO E INFORMACIÓN SE PROPORCIONAN "TAL CUAL" SIN GARANTÍA DE NINGÚN
 * CLASE, BIEN EXPRESA O IMPLÍCITA, INCLUYENDO PERO NO LIMITADO A LA GARANTÍAS
 * DE COMERCIALIZACIÓN Y / O ADECUACIÓN A UN PROPÓSITO PARTICULAR.
 * 
 DROP TABLE IF EXISTS `cta`;
 CREATE TABLE `cta` (
    `ctacta` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'ID del sistema',
    `ctanom` VARCHAR(10) NULL DEFAULT '' COMMENT 'Nombre',
    `ctaact` VARCHAR(10) NULL DEFAULT '' COMMENT 'Activo',
    PRIMARY KEY (`ctacta`),
    INDEX `fk_cta_cta_idx` (`ctacta`)
);

 * @version 2017.01.10
 * @package models
 * @author Ing. Jorge Aníbal Padilla Hernández
 * 
 */

if (!class_exists( basename(__FILE__,".php") ) ){

    class CtaModel extends Model{

        protected $fields = array(
             "ctacta" => array("type"=>"key" , "isnull"=>false ,"value"=>"","label"=>"Clave")
            ,"ctanom" => array("type"=>"text"    , "isnull"=>true  ,"value"=>"","label"=>"Nombre")
            ,"ctaact" => array("type"=>"select"  , "isnull"=>true  ,"value"=>"","label"=>"Activo", 
                                    "options"=>array(
                                         "S"=>"Si"
                                        ,"N"=>"No"
                            ))
        );

        public function __construct(){
            parent::__construct();
            $this->tableName = "cta";
            $this->tableDescription = "Cuenta";
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

    function getCtaTable(){
        return ( CtaModel::myself() );
    }

}
?>