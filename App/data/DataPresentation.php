<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date 5 de Marzo de 2016
// | @Version 1.0
// +-----------------------------------------------
namespace App\Data;
defined("APPPATH") OR die("Access denied");

use \App\Data\Fields as Fi;

class DataPresentation{
	
	public $tableFields=new Fi(0);
	public $tableName=null;
	public $tableSize=0;
	
	/*public static function __construct($size,$table){
		$this->tableFields=new Fi($size);
		$this->tableName=$table;
		$this->tableSize=$size;	
	}
	public static function DataPresentation(Fi $Fi=null){
		if (is_null($Fi)){
			$this->tableFields=new Fi($this->tableSize);
		}
		else{
			$this->tableFields=$Fi;
		}
	}*/
	public function setTableFields(Fi $Fi){
		$this->tableFields=$Fi;
	}
	public function getTableFields(){
		return $this->tableFields;
	}	
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