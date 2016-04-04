<?php
require('../model/login.php');
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date Miércoles 5 de diciembre de 2012
// | @Version 1.0
// +-----------------------------------------------
// +---------------------------Comentarios de versión
#Agregar seguridad al momento de hacer el login
session_start();


//REQUEST############################################
$pkiBCurrentUser="";
$btn_Acceder_p=$_POST['btn_Acceder_h'];
$txt_usuario_p=trim($_POST['txt_usuario_h']);
$txt_contrasena_p=trim($_POST['txt_contrasena_h']);
//CONSTANTES#########################################
//ATRIBUTOS##########################################
//PROPIEDADES########################################
//MÉTODOS ABSTRACTOS#################################
//MÉTODOS PÚBLICOS###################################
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
//MAIN###############################################
switch($btn_Acceder_p){
	case "Guardar":
		guardar();
	break;
	case "Modificar":
		modificar();
	break;
	case "Eliminar":
		eliminar();
	break;
	case "Buscar":
		buscar();
	break;
	case "Acceder":
		Acceder();
	break; 
	}	
	function Acceder(){
		global $pkiBCurrentUser;
		$logStatus="";
		$login=new Login();
		$login->setNombreUsuario($GLOBALS['txt_usuario_p']);
		$login->setContrasenaUsuario($GLOBALS['txt_contrasena_p']);
		if($login->Acceder()){
			$_SESSION['pkiBUser_p']=$login->getpkiBUser();
			$_SESSION["nombreUsuario"]=$login->getNombreUsuario();
			$_SESSION["pkBranchOffice"]=$login->getNombreUsuario();
			$_SESSION['loggedin'] = true;
			$_SESSION['start'] = time();
			$_SESSION['expire'] = $_SESSION['start'] + (20 * 6000) ;
			header("Location:../../private/home");
		}
		
		else header("Location:../../index.php");
	}
	
	function quitar($mensaje){
		$nopermitidos = array("'",'\\','<','>',"\"");
		$mensaje = str_replace($nopermitidos, "", $mensaje);
		return $mensaje;
	}
?>