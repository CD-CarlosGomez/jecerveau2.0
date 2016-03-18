<?php
require('../model/login.php');
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date Miércoles 5 de diciembre de 2012
// | @Version 1.0
// +-----------------------------------------------
session_start();
$pkiBCurrentUser="";
//CONSTANTES#########################################
//ATRIBUTOS##########################################
//PROPIEDADES########################################
//MÉTODOS ABSTRACTOS#################################
//MÉTODOS PÚBLICOS###################################
	function Acceder(){
		global $pkiBCurrentUser;
		$logStatus="";
		$login=new Login();
		$login->setNombreUsuario(trim($_POST['usuario']));
		$login->setContrasenaUsuario(trim($_POST['contrasena']));
		if($pkiBCurrentUser=$login->Acceder()){
			return $login->getNombreUsuario();
		}
		else return false;
	}
	
	function quitar($mensaje){
		$nopermitidos = array("'",'\\','<','>',"\"");
		$mensaje = str_replace($nopermitidos, "", $mensaje);
		return $mensaje;
	}
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
//MAIN###############################################
$_POST['btn'];
switch($_POST['btn']){
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
		
		
		if ($acceso=Acceder()){
			$_SESSION['pkiBUser_p']=$GLOBALS['pkiBCurrentUser'];
			$_SESSION["nombreUsuario"]=$acceso;
			$_SESSION['loggedin'] = true;
			$_SESSION['start'] = time();
			$_SESSION['expire'] = $_SESSION['start'] + (20 * 60) ;
			header("Location:../../private/home");
			}
		else header("Location:../index.php");
	break; 
	}
?>