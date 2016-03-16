<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date 5 de Marzo de 2016
// | @Version 1.0
// +-----------------------------------------------
namespace App\Interfaces;
defined("APPPATH") OR die("Access denied");
interface iCrud{
//CONSTANTES#########################################
//ATRIBUTOS##########################################
//PROPIEDADES########################################
//MÉTODOS ABSTRACTOS#################################	
	public static function getAll();
    public static function getById($id);
    public static function insertData($data);
    public static function updateById($data);
    public static function deleteById($id);
//MÉTODOS PÚBLICOS###################################
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
//MAIN###############################################



    
}
