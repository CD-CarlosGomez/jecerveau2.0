<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date 22 de febrero del 2016
// | @Version 1.0
// +-----------------------------------------------
//directorio del proyecto
//defined("APPPATH") OR die("Access denied");

//use \Core\App;

define("PROJECTPATH", dirname(__DIR__));
//directorio app
define("APPPATH", PROJECTPATH . '/App');
//CONSTANTES#########################################
//ATRIBUTOS##########################################
//PROPIEDADES########################################
//MÉTODOS ABSTRACTOS#################################
//MÉTODOS PÚBLICOS###################################
//autoload con namespaces
	function autoload_classes($class_name){
		$filename = PROJECTPATH . '/' . str_replace('\\', '/', $class_name) .'.php';
		if(is_file($filename)) {
			include_once $filename;
		}
	}
	//registramos el autoload autoload_classes
	spl_autoload_register('autoload_classes');
	//Incluimos la clase APP de forma rústica
	//require_once PROJECTPATH . "/App/controllers/Home.php";
	//instancia de la app
	$app = new \Core\App;

	//lanzamos la app
	$app->render();
	//echo PROJECTPATH . "/Core/App.php";
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
//MAIN###############################################








