<?php
//Capa negocio - Cliente
require('../data/dal.php');
class cliente extends dal{
	private $cod_cli;
	private $nombre;
	private $apellidos;
	private $telefono;
	 
	public function cliente(){
	parent:: dal();
	$this->cod_cli=0;
	$this->nombre="";
	$this->apellidos="";
	$this->telefono="";
	}
	 
	public function setCodCli($valor)
	{$this->cod_cli=$valor;}

	public function getCodCli()
	{return $this->cod_cli;}
	 
	public function setNombre($valor)
	{$this->nombre=$valor;}
	
	public function getNombre()
	{return $this->nombre;}
	 
	public function setApellidos($valor)
	{$this->apellidos=$valor;}
	public function getApellidos()
	{return $this->apellidos;}
	 
	public function setTelefono($valor)
	{$this->telefono=$valor;}
	public function getTelefono()
	{return $this->telefono;}
	 
	//FUNCIONES
	 
	public function guardar(){
	$sql="insert into cliente(nombre,apellidos,telefono) values
		  ('$this->nombre','$this->apellidos','$this->telefono')";
	$result=parent::ejecutar($sql);
	if($result)
	   return true;
	else
	   return false; 
	  
	}
	public function modificar(){
	$sql="update cliente set cod_cli='$this->cod_cli',nombre='$this->nombre',apellidos='$this->apellidos',telefono='$this->telefono' where cod_cli=$this->cod_cli ";
	$result=parent::ejecutar($sql);
	if($result)
	   return true;
	else
	   return false; 
	 
	}
	public function eliminar(){
	$sql="delete from cliente where cod_cli=$this->cod_cli";
	$result=parent::ejecutar($sql);
	if($result)
	   return true;
	else
	   return false; 
	 
	}
	public function buscar_nombre($criterio){
	$sql="select * from cliente where nombre like '%$criterio'";
	return(parent::ejecutar($sql));
	}
	public function buscar_apellidos($criterio){
	$sql="select * from cliente where apellidos like '%$criterio'";
	return(parent::ejecutar($sql));
	}
}
?>