<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date 5 de Marzo de 2016
// | @Version 1.0
// +-----------------------------------------------
namespace App\data;
defined("APPPATH") OR die("Access denied");

use \App\data\Fields as Fi;

class DataPresentation{
	public $tableFields=new Fi();
	public $tableName="";
	public $tableSize=0;
	
	public function setTableName($tableName){
		$this->tableName=$tableName;
	}
	public function setTableSize($tableSize){
		$this->tableSize=$tableSize;
	}
	public function getTableName(){
		return $this->tableName;
	}
	Public function getTableSize(){
		return $this->tableSize;
	}
}
?>