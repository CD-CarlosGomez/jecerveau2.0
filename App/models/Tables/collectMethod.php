<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date Miércoles 5 de diciembre de 2012
// | @Version 1.0
// +-----------------------------------------------
// +---------------------------Comentarios de versión
namespace App\Models\Tables;
defined("APPPATH") OR die("Access denied");

use \App\data\DataPresentation as DP;
use \App\data\Fields as Fi;
//REQUEST############################################
Class CollectMethod extends DP {
//CONSTANTES#########################################
	const TABLE_NAME="collectMethod";
	const TABLE_SIZE=5;
//ATRIBUTOS##########################################
	public $pkCollectMethod=Null;
	public $collectMethodName=Null;
	public $Created=Null;
	public $CreatedBy=Null;
	public $Modified=Null;
	public $ModifiedBy=Null;
//PROPIEDADES########################################
	public function getPKCollectMethod(){
		$tableFields->getValue(0);
	}
	public function setPKCollectMethod($value){
		$tableFields->setValue(0,$value);
	}
	public function getCollectMethodName(){
		$tableFields->getValue(1);
	}
	public function setCollectMethodName($value){
		$tableFields->setValue(1,$value);
	}
	public function getCreated(){
		$tableFields->getValue(2);
	}
	public function setCreated($value){
		$tableFields->setValue(2,$value);
	}
	public function getCreatedBy(){
		$tableFields->getValue(3);
	}
	public function setCreatedBy($value){
		$tableFields->setValue(3,$value);
	}
	public function getModified(){
		$tableFields->getValue(4);
	}
	public function setModified($value){
		$tableFields->setValue(4,$value);
	}
	public function getModifiedBy(){
		$tableFields->getValue(5);
	}
	public function setModifiedBy($value){
		$tableFields->setValue(5,$value);
	}	
//MÉTODOS ABSTRACTOS#################################
//CONSTRUCTORES Y DESTRUCTORES#######################
	public function __construct(){
		$tableName=TABLE_NAME;
		$tableSize=TABLE_SIZE;
		$tableFields=New Fi($tableName);
	}
//MÉTODOS MÁGICOS####################################
//MÉTODOS PÚBLICOS###################################
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
	$tableFields->setValue(0,"0"); //Valor por defecto
	$tableFields->setName(0,"pkCollectMethod");//Poner el nombre del Campo
	$tableFields->setDataType(0,DT["NUMBER"]);
	$tableFields->setKey(0,PK["SI"]);
	$tableFields->setAI(0,AI["SI"]);
	
	$tableFields->setValue(1,""); //Valor por defecto
	$tableFields->setName(1,"collectMethodName");//Poner el nombre del Campo
	$tableFields->setDataType(1,DT["STRING"]);
	$tableFields->setKey(1,PK["NO"]);
	$tableFields->setAI(1,AI["NO"]);
	
	$tableFields->setValue(2,""); //Valor por defecto
	$tableFields->setName(2,"Created");//Poner el nombre del Campo
	$tableFields->setDataType(2,DT["STRING"]);
	$tableFields->setKey(2,PK["NO"]);
	$tableFields->setAI(2,AI["NO"]);
	
	$tableFields->setValue(3,""); //Valor por defecto
	$tableFields->setName(3,"CreatedBy");//Poner el nombre del Campo
	$tableFields->setDataType(3,DT["STRING"]);
	$tableFields->setKey(3,PK["NO"]);
	$tableFields->setAI(3,AI["NO"]);
	
	$tableFields->setValue(4,""); //Valor por defecto
	$tableFields->setName(4,"Modified");//Poner el nombre del Campo
	$tableFields->setDataType(4,DT["STRING"]);
	$tableFields->setKey(4,PK["NO"]);
	$tableFields->setAI(4,AI["NO"]);
	
	$tableFields->setValue(5,""); //Valor por defecto
	$tableFields->setName(5,"ModifiedBy");//Poner el nombre del Campo
	$tableFields->setDataType(5,DT["STRING"]);
	$tableFields->setKey(5,PK["NO"]);
	$tableFields->setAI(5,AI["NO"]);
	
	





}
//MAIN###############################################

?>