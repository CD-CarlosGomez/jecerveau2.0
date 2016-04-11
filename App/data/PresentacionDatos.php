<?php
class PresetacionDatos{
	public $tablaCampos=new Campos;
	public $tablaNombre="";
	public $tablaTamaño=0;
	
	public function setTablaNombre($nombreTabla){
		$this->tablaNombre=$nombreTabla;
	}
	public function setTablaTamaño($tamañoTabla){
		$this->tablaTamaño=$tamañoTabla;
	}
	public function getTablaNombre(){
		return $this->tablaNombre;
	}
	Public function getTablaTamaño(){
		return $this->tablaTamaño;
	}
}
?>