<?php
// +-----------------------------------------------
// | @author Carlos M. G�mez
// | @date 5 de Marzo del 2016
// | @Version 1.0
// +-----------------------------------------------
#16.3.22 Agregar validaci�n del lado del servidor
namespace App\Controllers;
defined("APPPATH") OR die("Access denied");

use \Core\View;
use \Core\Controller;
use \App\Config\Globales as Globales;
use \App\Models\CurrentUser as CU;
use \App\Models\Users\Users as Users;
use \App\Models\Users\Profiles as Profiles;
use \App\Models\EnterpriseGroup\BranchOffices as BO;
use \App\web\API\Mailer\PHPMailer as PHPMailer;
use \App\web\API\Mailer\smtp;
use \App\data\Crud as Crud;
	
	session_start();
		if (isset($_SESSION['loggedin']) & $_SESSION['loggedin'] == true){}
		else{
				echo "Esta pagina es solo para usuarios registrados.<br>";
			echo "<a href='" . $url ."'>Login Here!</a>";
			exit;
		}
		$now = time(); 
		if($now > $_SESSION['expire']){
		session_destroy();
		echo "Su sesion a terminado, <a href='". $url ."'>
			  Necesita Hacer Login</a>";
		exit;
		}

	
class User extends Controller{
//CONSTANTES#########################################
//ATRIBUTOS##########################################
private $_sesionUsuario;
private $_sesionpkiBUser;
//PROPIEDADES########################################
//M�TODOS ABSTRACTOS#################################
//M�TODOS P�BLICOS###################################
	public function __construct(){
		$this->_sesionUsuario=$_SESSION["nombreUsuario"];
		$this->_sesionpkiBUser=$_SESSION['pkiBUser_p'];		
	}
	/**
     * [index]
    */
    public function index(){
		//$layout=new WithSiteMap(new WithTemplate(new WithMenu(new LayoutCSS())));
		//$layout= Layouts::render();
		self::showUser();
		//View::set("foo",true);
		//View::render("z_testPost");
	}
	public function showUser(){
	#Objetos_e_instancias
		$cu=CU::getInstance();
	#get main Variables
		$url= Globales::$absoluteURL;
		$currentMainMenu=$cu->getMainMenu2($this->_sesionpkiBUser);
	#set main variables
		View::set("url", $url);
		View::set("currentMainMenu", $currentMainMenu);	
	#get data variables
		$dsCompanyGrid=Users::getAll();
		while ($row =$dsCompanyGrid->fetch( \PDO::FETCH_ASSOC )){$dt_Company[] = $row;}
	#set data variables
		View::set("dt_Company",$dt_Company);
        View::set("title", "Grupo Empresarial");
	#Renderizar
		View::render("showUser");	
	}
	public function showProfile(){
		#Objetos_e_instancias
		$cu=CU::getInstance();
		#get main variables
		$url= Globales::$absoluteURL;
		
		#set main variables
		View::set("url", $url);
		View::set("title", "Users");
		#get data variables
		$currentMainMenu=$cu->getMainMenu2($this->_sesionpkiBUser);
		$dsCompanyGrid=Profiles::selectKanbanProfile($this->_sesionpkiBUser);
		while ($row =$dsCompanyGrid->fetch( \PDO::FETCH_ASSOC )){
			$dt_Company[] = $row;
		}
		
		#set data variables
		View::set("dt_Company",$dt_Company);
		View::set("currentMainMenu", $currentMainMenu);
		
		#render
		View::render("showProfile");   
	}
	public function addUser(){
	#Objetos_e_instancias
		$cu=CU::getInstance();
	#get main variables
		$url= Globales::$absoluteURL;
		$currentMainMenu=$cu->getMainMenu2($this->_sesionpkiBUser);
	#set main variables
		View::set("url", $url);
		View::set("currentMainMenu", $currentMainMenu);
		View::set("title", "Nuevo Usuario");
	#get data variables
		$dsProfile=Profiles::getAllIbUserProfile();
		$dsUser=Users::getParcialSelect();
	#set data variables
		View::set("drowsP",$dsProfile);
		View::set("drowsU",$dsUser);
	#Renderizar
		View::render("addUser");       
	}
	public function addProfile(){
	#Objetos_e_instancias
	$cu=CU::getInstance();
	#get main variables
		$url= Globales::$absoluteURL;
		;
	#set main variables
		View::set("url", $url);
		
		View::set("title", "Nuevo Perfil");
    #get data variables
		$currentMainMenu=$cu->getMainMenu2($this->_sesionpkiBUser);
		$dsGFunction=Profiles::getSelectibfunctionDetail();
		$ds_BO=BO::getAll();
		$dsUser=Users::getParcialSelect();
	#set data variables
		View::set("currentMainMenu", $currentMainMenu);
		View::set("drowsF",$dsGFunction);
		View::set("drowsU",$dsUser);
		View::set("ds_BO", $ds_BO);
	#Renderizar Vista
		View::render("addProfile");
	}
}
//M�TODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
//MAIN###############################################
	switch(@$_POST['btn_toDo_h']){
		case "addProfile":
			CreateProfile();
		break;
		case "AddUser":
			CreateUser();
		break;
		case "Eliminar":
			Delete();
		break;
 	}
	function CreateUser(){
		$u=new Users;
		$u->setUserName($_POST['txt_userName_h']);
		$u->setPWD($_POST['txt_password_h']);
		$u->setPwdTmp($_POST['txt_password_h']);
		$u->setRealName($_POST['txt_realName_h']);
		$u->setEmail($_POST['txt_email_h']);
		$u->setDefaultF($_POST['txt_defaultFunction_h']);//
		$u->setActive("2");
		$u->setCreated(date("Y-m-d"));
		$u->setCreatedBy($_SESSION['pkiBUser_p']);
		$u->setModified('null');
		$u->setModifiedBy('null');
		if ($u->insertData('ibuser')){
			$destinatario=$u->getEmail();
			$asunto="Bienvenido a iBrain 2.0";
			
			if(file_exists("../App/views/htmlTemplates/BienvenidoUsuario.php")){
				include_once "../App/views/htmlTemplates/BienvenidoUsuario.php";
				//include_once APPPATH . "/web/API/Mailer/PHPMailerAutoload.php";
				//include_once "../App/views/htmlTemplates/BienvenidoUsuario.php";
				$micorreo="cgomez@consultoriadual.com";
				$nombreFrom="iBrain info";
				$nombreadmin="";
				$asunto="Bienvenida a usuario";
				//$sucorreo=$u->getEmail();
	//////////////////////////////////////////////DATOS DE EMAIL DE confirmacion////////////////////////////////////
				date_default_timezone_set('Etc/UTC');
				$mail= new PHPMailer;
				$mail->IsSMTP();
				$mail->SMTPDebug = 0;
				$mail->Debugoutput = 'html';
				$mail->Host       = "smtp.gmail.com";
				$mail->Port       = 587;
				$mail->SMTPSecure = "tls";  
				$mail->SMTPAuth = true;
				$mail->Username = 'santi.notificaciones@gmail.com';
				$mail->Password = 'envios2015';
				$mail->setFrom($micorreo,"iBrain info");
				//$mail->AddReplyTo($micorreo,"G&oacute;mez 2");
				$mail->AddAddress ("$destinatario","cgomez@consultoriadual");
				$mail->Subject = "$asunto";
				$mail->MsgHTML($bodyMessage);
				$mail->AltBody='This is a plain-text message body';
				$mail->isHTML(true);
				$mail->SMTPOptions = array(
					'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true)
				);
				
				if(!$mail->Send()){
					$msg='Mailer Error: '.$mail->ErrorInfo;
				}
				else{
					$msg="<p>Tu informacion se recibio correctamente <br> Se ha enviado una confirmacion al correo <b>correo</b></p>";
					header("Location:" . Globales::$absoluteURL . "/private/user");
				}
			}
			else{
				include APPPATH . "/views/errors/404.php";
				exit;
			}
		}	
		else
			echo "Error,no se puede enviar el correo electr�nico ";
	}
	function CreateProfile(){
		
		$up['pkiBUserProfile'] = Crud::getNextId('pkiBUserProfile','ibuserprofile');
		$up['Name']=$_POST['txt_profileName_h'];
		
		if($PDOCommand1=Crud::insert($up,'ibuserprofile')){
			$bohup['ibuser_pkiBUser']=$_POST['slt_pkiBUsers_h'];
			$bohup['branchoffice_pkBranchOffice']=$_POST['slt_pkBO_h'];
			$bohup['ibuserprofile_pkiBUserProfile']=$up['pkiBUserProfile'];
			
			if($PDOCommand2=Crud::insert($bohup,'branchoffice_has_ibuserprofile')){
				$b=(empty($_POST['chk_toBecollected_h']))			?' <input type="checkbox" name=""/>':' <input type="checkbox" checked  name=""/>';
				$c=(empty($_POST['chk_toBeAssigned_h']))			?' <input type="checkbox" name=""/>':' <input type="checkbox" checked  name=""/>';
				$d=(empty($_POST['chk_toBeDiagnosed_h']))			?' <input type="checkbox" name=""/>':' <input type="checkbox" checked  name=""/>';
				$f=(empty($_POST['chk_diagnosisToBeAuthorized_h']))	?' <input type="checkbox" name=""/>':' <input type="checkbox" checked  name=""/>';
				$g=(empty($_POST['chk_toNotifyTheClient_h']))		?' <input type="checkbox" name=""/>':' <input type="checkbox" checked  name=""/>';
				$h=(empty($_POST['chk_toBeAuthorizedByClient_h']))	?' <input type="checkbox" name=""/>':' <input type="checkbox" checked  name=""/>';
				$l=(empty($_POST['chk_inRepairProcess_h']))			?' <input type="checkbox" name=""/>':' <input type="checkbox" checked  name=""/>';
				$m=(empty($_POST['chk_repaired_h']))				?' <input type="checkbox" name=""/>':' <input type="checkbox" checked  name=""/>';
				$n=(empty($_POST['chk_toDelivery_h']))				?' <input type="checkbox" name=""/>':' <input type="checkbox" checked  name=""/>';
				$q=(empty($_POST['chk_toBeCharged_h']))				?' <input type="checkbox" name=""/>':' <input type="checkbox" checked  name=""/>';
				$r=(empty($_POST['chk_deliveredToClient_h']))		?' <input type="checkbox" name=""/>':' <input type="checkbox" checked  name=""/>';
				$s=(empty($_POST['chk_cancelled_h']))				?' <input type="checkbox" name=""/>':' <input type="checkbox" checked  name=""/>';
				
				$p=new Profiles;
				$nextId=$p->getNextId("pkiBUserProfile","ibuserprofile");
				$p->setpkiBUserProfile($nextId);
				$p->setToBeCollected($b);
				$p->setToBeAssigned($c);
				$p->setToBeDiagnosed($d);
				$p->setDiagnosisToBeAuthorized($f);
				$p->setToNotifyTheClient($g);
				$p->setToBeAuthorizedByClient($h);
				$p->setInRepairProcess($l);
				$p->setRepaired($m);
				$p->setToDelivery($n);
				$p->setToBeCharged($q);
				$p->setDeliveredToClient($r);
				$p->setCancelled($s);
				
				if($p-> insertData("osworkflow")){
					$wfhup['OSworkflow_pkOSworkflow']=$p->getpkiBUserProfile();
					$wfhup['iBUserProfile_pkiBUserProfile']=$up['pkiBUserProfile'];
					
					Crud::insert($wfhup,'osworkflow_has_ibuserprofile');
				}

				@$functionDetails=$_POST['slt_pkiBFunctionDetail_h'];
				
				foreach ($functionDetails as $fd){
					/*$uphfd['iBUserProfile_pkiBUserProfile'] = $_POST['slt_pkiBUsers_h'];
					$uphfd['ibFunctionDetail_pkibFunctionDetail'] = $fd;*/
					$valor = "('" . $up['pkiBUserProfile'] . "','" . $fd . "')";
					$parameters[] = $valor;
				}
				
				$valores = implode(', ',$parameters);
				
				$insert_uphfd = "INSERT INTO ibuserprofile_has_ibfunctiondetail VALUES " . $valores . ";";
				
				if(Crud::multiQuery($insert_uphfd)){
					header("Location:" . Globales::$absoluteURL . "/private/User/showProfile");
				}				
				
			}
			
				
		}
	}

?>
