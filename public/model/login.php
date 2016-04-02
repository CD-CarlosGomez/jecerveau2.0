<?php 
require_once('../data/dal.php');
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
	private $_pkiBUser;
	private $_loggedin;
//PROPIEDADES########################################
	public function __set($var,$value){
		if(property_exists(__CLASS__,$var))
			$this->$var=$value;
		else
			echo "Atributo no existe".$var;
	}
	public function __get($var){
		if(property_exists(__CLASS__,$var))
			return $this->$var;
		else
			return NULL;
	}
	public function setNombreUsuario($valor)
	{$this->_nombreUsuario=$valor;}

	public function getNombreUsuario()
	{return $this->_nombreUsuario;}
	 
	public function setContrasenaUsuario($valor)
	{$this->_contrasenaUsuario=$valor;}
	
	public function getContrasenaUsuario()
	{return $this->_contrasenaUsuario;}
	 
	public function setpkiBUser($valor)
	{$this->_pkiBUser=$valor;}
	
	public function getpkiBUser()
	{return $this->_pkiBUser;}
//MÉTODOS ABSTRACTOS#################################
//MÉTODOS PÚBLICOS###################################
	public function __construct(){
	parent:: dal();
	$this->_nombreUsuario="";
	$this->_contrasenaUsuario="";
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
		$mySQLiQuery="SELECT pkiBUser,username,pwd FROM ibuser WHERE username='".$this->_nombreUsuario."';";
		$mySQLiResultSet=parent::ejecutar($mySQLiQuery);
		if($row = $mySQLiResultSet->fetch_array()){
			if($row["pwd"] === $this->_contrasenaUsuario){
				$this->_pkiBUser=$row["pkiBUser"];
				return $this->_pkiBUser;
			}else{
				return NULL;
			}
		}else{
		return false; 
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
	public function SBuscarBO(){
		$MySqliQuery=
		"SELECT 
			pkBranchOffice, 
			BOName 
		FROM branchoffice BO 
			INNER JOIN ibuserprofile UP 
				ON BO.pkBranchOffice=UP.BranchOffice_pkBranchOffice 
			INNER JOIN ibuser U 
				ON UP.iBUser_pkiBUser=U.pkiBUser 
		WHERE U.username='$BOName';
		";
		return(parent::ejecutar($MySqliQuery));
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