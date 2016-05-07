<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date 5 de Marzo de 2016
// | @Version 1.0
// +-----------------------------------------------
namespace App\Data;
defined("APPPATH") OR die("Access denied");

use \App\Data\FieldsStructures as FS;

Class Fields{
	private $_fields=array();
	private $_max=0;
	//constructor de la claseCampos y redimenciona el array al tamaño que nosotros le especifiquemos
	public function __construct($cantidadCampos){
		array_pad($this->_fields, $cantidadCampos, null);
		$this->_max=$cantidadCampos;
		for ($i=0;$i<_max;$i++){
			$this->_fields[$i]=new FS();
		}
	}
	//getters
	public function getValue($field){
		return $this->_fields[$field]->Value;
	}
	public function getName($field){
		return $this->_fields[$field]->Name;	
	}
	public function getType($field){
		return $this->_fields[$field]->Type;
	}
	public function getKey($field){
		return $this->_fields[$field]->Key;
	}
	public function getAI($field){
		return $this->_fields[$field]->AI;
	}
	//setters
	public function setValue($field,$value){
		$this->_fields[$field]->Valor=$value;
	}
	public function setName($field,$name){
		$this->_fields[$field]->Name=$name;
	}
	public function setType($field,$type){
		$this->_fields[$field]->Type=$type;
	}
	public function setKey($field,$key){
		$this->_fields[$field]->Key=$key;
	}
	public function setAI($field,$ai){
		$this->_fields[$field]->AI=$ai;
	}
	
}
?>