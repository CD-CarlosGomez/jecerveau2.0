<?php
require('../model/login.php');
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date Miércoles 5 de diciembre de 2012
// | @Version 1.0
// +-----------------------------------------------
session_start();
//CONSTANTES#########################################
//ATRIBUTOS##########################################
//PROPIEDADES########################################
//MÉTODOS ABSTRACTOS#################################
//MÉTODOS PÚBLICOS###################################
	function Acceder(){
		$logStatus="";
		$login=new Login();
		$login->setNombreUsuario(trim($_POST['usuario']));
		$login->setContrasenaUsuario(trim($_POST['contrasena']));
		if($login->Acceder())return $login->getNombreUsuario();
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
echo $_POST['btn'];
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
			$_SESSION["nombreUsuario"]=$acceso;
			$_SESSION['loggedin'] = true;
			$_SESSION['start'] = time();
			$_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;
			header("Location:../vista/inicio.php");
			}
		else header("Location:../index.php");
	break; 
	}
	
	/*
if(trim($_POST["usuario"]) != "" && trim($_POST["password"]) != ""){
	//Puedes utilizar la funcion para eliminar algun caracter en especifico
	//$usuario = strtolower(quitar($_POST["usuario"]));
	//$password = $_POST["password"];
	// o puedes convertir los valores a su entidad HTML aplicable con htmlentities

	$usuario = htmlentities($_POST["usuario"], ENT_QUOTES);//ENT_QUOTES transforma las comillas simples como las dobles/strtolower(transforma en minuscula).
	$password = $_POST["password"];
	
	$result = "SELECT * FROM usuarios WHERE nombre='".$usuario."';";
	$exe_result = parent::->($result);
	
	if($row = $exe_result->fetch_array()){
		if($row["contrasena"] === $password){
			$_SESSION["idusuarios"] = $row['idusuarios'];
			$_SESSION["nameusuarios"]=$row["nameusuarios"];
			$_SESSION['loggedin'] = true;
			$_SESSION['username'] = $username;
			$_SESSION['start'] = time();
			$_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;
			echo "Bienvenido! " . $_SESSION['username'];
			echo 'Has sido logueado correctamente ';
			header("Location:vista/inicio.php");
			//Elimina el siguiente comentario si quieres que re-dirigir automáticamente a index.php
			/*Ingreso exitoso, ahora sera dirigido a la pagina principal.
			<SCRIPT LANGUAGE="javascript">
			location.href = "index.php";
			</SCRIPT>*/
		/*}else{
			echo 'Password incorrecto';
		}
	}else{
		echo 'Usuario no existente en la base de datos';
	}
	$exe_result->free();
}else{
	echo 'Debe especificar un usuario y password '.$result;
}*/

?>