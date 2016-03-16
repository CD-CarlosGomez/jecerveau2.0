<?php 
require('../data/dal.php');
class Login extends dal{
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date Miércoles 5 de diciembre de 2012
// | @Version 1.0
// +-----------------------------------------------

//CONSTANTES#########################################
//ATRIBUTOS##########################################
	private $_nombreUsuario;
	private $_contrasenaUsuario;
	private $_menu;
	private $_loggedin;
//PROPIEDADES########################################
	public function setNombreUsuario($valor)
	{$this->_nombreUsuario=$valor;}

	public function getNombreUsuario()
	{return $this->_nombreUsuario;}
	 
	public function setContrasenaUsuario($valor)
	{$this->_contrasenaUsuario=$valor;}
	
	public function getContrasenaUsuario()
	{return $this->_contrasenaUsuario;}
	 
	public function setMenu($valor)
	{$this->_menu=$valor;}
	
	public function getMenu()
	{return $this->_menu;}
//MÉTODOS ABSTRACTOS#################################
//MÉTODOS PÚBLICOS###################################
	public function __construct(){
	parent:: dal();
	$this->_nombreUsuario="";
	$this->_contrasenaUsuario="";
	$this->_menu="";
	$this->_loggedin=false;
	}
	
	public function Login($menu){
	parent:: dal();
	$this->_nombreUsuario="";
	$this->_contrasenaUsuario="";
	$this->_menu=$menu;
	$this->_loggedin=false;
	}
	 
	public function Acceder(){
		$mySQLiQuery="SELECT * FROM usuarios WHERE nombre='".$this->_nombreUsuario."';";
		$mySQLiResultSet=parent::ejecutar($mySQLiQuery);
		if($row = $mySQLiResultSet->fetch_array()){
			if($row["contrasena"] === $this->_contrasenaUsuario){
				return true;
				//$Acceder="Bienvenido! " . $_SESSION['username']."Has sido logueado correctamente.";
			}else{
				return false;
				//$Acceder='Password incorrecto';
			}
		}else{
		return false; //$Acceder='Usuario no existente en la base de datos';
		}
	}
	
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
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
//MAIN###############################################





	
	
}
?>