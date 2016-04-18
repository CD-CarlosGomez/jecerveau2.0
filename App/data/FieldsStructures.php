<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date 5 de Marzo de 2016
// | @Version 1.0
// +-----------------------------------------------
namespace App\data;
defined("APPPATH") OR die("Access denied");

use \App\Interfaces\iAutoIncrementable;
use \App\Interfaces\iPrimaryKey;
use \App\Interfaces\iDataType;

Class FieldsStructures implements iDataType,iPrimaryKey,iAutoIncrementable{
	public $Value="";
	public $Name="";
	public $Type=DT;
	public $Key=PK;
	public $AI=AI;
}
?>