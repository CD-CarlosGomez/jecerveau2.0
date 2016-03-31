<?php
//Capa datos
class dal{
	private $servidor;
	private $usuario;
	private $password;
	private $basedatos;
	//constructor
	public function dal(){
	$this->servidor="localhost";
	$this->usuario="root";
	$this->password="";
	$this->basedatos="ibrain2";
	}
	public function conectar(){
	$bd=mysqli_connect(
		$this->servidor,
		$this->usuario,
		$this->password,
		$this->basedatos);
	if($bd)
	  return $bd;
	else
	  echo "Error al conectarse con la Base de datos"; 
	}
	public function ejecutar($sql){
	$cnn=$this->conectar();
	return mysqli_query($cnn,$sql);
	}
}
?>