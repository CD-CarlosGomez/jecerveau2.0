<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date 5 de Marzo del 2016
// | @Version 1.0
// +-----------------------------------------------
namespace Core;
defined("APPPATH") OR die("Access denied");

use \Core\Database;

class Controller{
//CONSTANTES#########################################
	private static $_instancia;
	private $_objeto = array();
	private $_PDOcnn;
//ATRIBUTOS##########################################
//PROPIEDADES########################################
//CONSTRUCTORES Y DESTRUCTORES#######################
public function __construct(){
	$this->_PDOcnn = Database::instance();
}
//MÉTODOS MÁGICOS####################################
public function __clone(){
	trigger_error("Operación Invalida: No puedes clonar una instancia de ". get_class($this) ." class.", E_USER_ERROR );
}	
//MÉTODOS ABSTRACTOS#################################
//MÉTODOS PÚBLICOS###################################
public static function getInstance(){
	if (!empty(self::$_instancia instanceof self)) {
            $miclase = __CLASS__;
            self::$_instancia = new $miclase;
        } 
        return self::$instancia;
}
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
	}
//MAIN###############################################





