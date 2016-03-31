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
$pkiBCurrentUser="";
//CONSTANTES#########################################
//ATRIBUTOS##########################################
//PROPIEDADES########################################
//MÉTODOS ABSTRACTOS#################################
//MÉTODOS PÚBLICOS###################################
echo $_POST['txt_usuario_h']." ".$_POST['txt_contrasena_h'];
	function Acceder(){
		global $pkiBCurrentUser;
		$logStatus="";
		$login=new Login();
		$login->setNombreUsuario(trim($_POST['txt_usuario_h']));
		$login->setContrasenaUsuario(trim($_POST['txt_contrasena_h']));
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
switch($_POST['btn_Acceder_h']){
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
			$_SESSION["nombreUsuario"]=Acceder();
			$_SESSION['loggedin'] = true;
			$_SESSION['start'] = time();
			$_SESSION['expire'] = $_SESSION['start'] + (20 * 6000) ;
			header("Location:../../private/home");
			}
		else header("Location:../../index.php");
	break; 
	}
?>