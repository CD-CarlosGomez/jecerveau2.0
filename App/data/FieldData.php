<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date 5 de Marzo de 2016
// | @Version 1.0
// +-----------------------------------------------
namespace App\data;
defined("APPPATH") OR die("Access denied");

Class FieldData{
	Private $_Value="";
	Private $_Name="";
    Private $_Type="";
    
    function __construct(){
    	$this->_Value="";
    	$this->_Name="";
    	$this->_Type="";
    }
    function setValue($valor){
    	$this->_Value=$valor;
    }
    function getValue(){
    	return $this->_Value;
    }
    function setName($nombre){
    	$this->_Name=$nombre;
    }
	function getName(){
		return $this->_Name;
	}
	function setType($tipo){
		$this->_Type=$tipo;
	}
	function getType(){
		return $this->_Type;
	}
}
?>