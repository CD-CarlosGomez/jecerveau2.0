<?php
class PresetacionDatos{
	public $tablaCampos=new Campos;
	public $tablaNombre="";
	public $tablaTama�o=0;
	
	public function setTablaNombre($nombreTabla){
		$this->tablaNombre=$nombreTabla;
	}
	public function setTablaTama�o($tama�oTabla){
		$this->tablaTama�o=$tama�oTabla;
	}
	public function getTablaNombre(){
		return $this->tablaNombre;
	}
	Public function getTablaTama�o(){
		return $this->tablaTama�o;
	}
}
?>