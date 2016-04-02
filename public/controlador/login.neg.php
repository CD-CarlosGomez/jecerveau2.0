<?php
require_once('../model/login.php');
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
	function renderBOOptions(){
		$login=new Login();
		$login->SBuscarBO();
	}
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################




//CONTROLES##########################################
	if(!isset($vstr_username_p))	$vstr_username_p=$_POST['vstr_username_j'];
	
	if( isset($vstr_username_p)) {
			$AASPs = array();
			$mySQLiQuery = "SELECT 
								pkBranchOffice, 
								BOName 
							FROM branchoffice BO 
								INNER JOIN ibuserprofile UP 
									ON BO.pkBranchOffice=UP.BranchOffice_pkBranchOffice 
								INNER JOIN ibuser U 
									ON UP.iBUser_pkiBUser=U.pkiBUser 
							WHERE U.username='$vstr_username_p';"; 
			$db = new dal();
			$db->conectar();
			
			$result = $db->ejecutar($mySQLiQuery);
			while($row = $result->fetch_assoc()){
				$AASP = new AASP($row['pkBranchOffice'], $row['BOName']);
				array_push($AASPs, $AASP);
			}

			$db->cerrarConexion($db, $result);

			echo json_encode($AASPs);
		}
		
	class AASP {
			public $id;
			public $nombre;

			function __construct($id, $nombre) {
				$this->id = $id;
				$this->nombre = $nombre;
		}
	}


//MAIN###############################################
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