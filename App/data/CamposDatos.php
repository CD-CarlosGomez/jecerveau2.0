<?php
Class CamposDatos{
	Private $mValor="";
	Private $mNombre="";
    Private $mTipo="";
    
    function __construct(){
    	$this->mValor="";
    	$this->mNombre="";
    	$this->mTipo="";
    }
    function setValor($valor){
    	$this->mValor=$valor;
    }
    function getValor(){
    	return $this->mValor;
    }
    function setNombre($nombre){
    	$this->mNombre=$nombre;
    }
	function getNombre(){
		return $this->mNombre;
	}
	function setTipo($tipo){
		$this->mTipo=$tipo;
	}
	function getTipo(){
		return $this->mTipo;
	}
}
interface  TipoDato{
	const NUMERO=0;
	const CADENA=1;
}
interface PrimaryKey{
	const SI=0;
	const NO=1;
}
interface Incrementable{
	const SI=0;
	const NO=1;
}
Class structureCampos implements TipoDato, PrimaryKey, Incrementable{
	public $Valor="";
	public $Nombre="";
	public $Tipo=TipoDato;
	public $PK=PrimaryKey;
	public $AI=Incrementable;
}
Class Campos{
	private $mCampos=array();
	private $mMaximo=0;
	//constructor de la claseCampos y redimenciona el array al tamaño que nosotros le especifiquemos
	public function __construct($cantidadCampos){
		array_pad($this->mCampos, $cantidadCampos, null);
		$this->mMaximo=$cantidadCampos;
		for ($i = 0; $i < mMaximo; $i++){
			$this->mCampos[$i]=new structureCampos();
		}
	}
	//getters
	public function obtenerValor($campo){
		return $this->mCampos[$campo]->Valor;
	}
	public function obtenerNombre($campo){
		return $this->mCampos[$campo]->Nombre;	
	}
	public function obtenerTipo($campo){
		return $this->mCampos[$campo]->Tipo;
	}
	public function obtenerKey($campo){
		return $this->mCampos[$campo]->PK;
	}
	public function obtenerAI($campo){
		return $this->mCampos[$campo]->AI;
	}
	//setters
	public function ponerValor($campo,$Valor){
		$this->mCampos[$campo]->Valor=$Valor;
	}
	public function ponerNombre($campo,$Nombre){
		$this->mCampos[$campo]->Nombre=$Nombre;
	}
	public function ponerTipo($campo,$Tipo){
		$this->mCampos[$campo]->Tipo=$Tipo;
	}
	public function ponerKey($campo,$Key){
		$this->mCampos[$campo]->PK=$Key;
	}
	public function ponerAI($campo,$AI){
		$this->mCampos[$campo]->AI=$AI;
	}
	
}
?>