<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date 5 de Marzo del 2016
// | @Version 1.0
// +-----------------------------------------------
namespace Core;
defined("APPPATH") OR die("Access denied");

class View{
//CONSTANTES#########################################
    /**
     * @var
     */
    const VIEWS_PATH = "../App/views/";
    /**
     * @var
     */
    const EXTENSION_TEMPLATES = "php";
//ATRIBUTOS##########################################
	/**
     * @var
     */
    protected static $data;
//PROPIEDADES########################################
//MÉTODOS ABSTRACTOS#################################
//MÉTODOS PÚBLICOS###################################
   /**
     * [render views with data]
     * @param  [String]  [template name]
     * @return [html]    [render html]
     */
    public static function render($template){
        if(!file_exists(self::VIEWS_PATH . $template . "." . self::EXTENSION_TEMPLATES)){
            throw new \Exception("Error: El archivo " . self::VIEWS_PATH . $template . "." . self::EXTENSION_TEMPLATES . " no existe", 1);
        }
        ob_start();
        extract(self::$data);
        include(self::VIEWS_PATH . $template . "." . self::EXTENSION_TEMPLATES);
        $str = ob_get_contents();
        ob_end_clean();
        echo $str;
    }
    /**
     * [set Set Data form views]
     * @param [string] $name  [key]
     * @param [mixed] $value [value]
     */
    public static function set($name, $value) {
        self::$data[$name] = $value;
    }
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
//MAIN###############################################
}
