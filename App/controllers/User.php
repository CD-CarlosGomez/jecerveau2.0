<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date 5 de Marzo del 2016
// | @Version 1.0
// +-----------------------------------------------
#16.3.22 Agregar validación del lado del servidor
namespace App\Controllers;
defined("APPPATH") OR die("Access denied");

use \Core\View;
use \Core\Controller;
use \App\Config\Globales as Globales;
use \App\Models\Users as Users;
use \App\Models\CurrentUser as CU;
use \App\Models\Profiles as Profiles;
use \App\web\lib\Mailer\PHPMailer;

	
	session_start();
		if (isset($_SESSION['loggedin']) & $_SESSION['loggedin'] == true){}
		else{
				echo "Esta pagina es solo para usuarios registrados.<br>";
			echo "<a href='http://localhost:8012/ibrain2.0'>Login Here!</a>";
			exit;
		}
		$now = time(); 
		if($now > $_SESSION['expire']){
		session_destroy();
		echo "Su sesion a terminado, <a href='http://localhost:8012/ibrain2.0'>
			  Necesita Hacer Login</a>";
		exit;
		}

	
class User extends Controller{
//CONSTANTES#########################################
//ATRIBUTOS##########################################
private $_sesionUsuario;
private $_sesionpkiBUser;
//PROPIEDADES########################################
//MÉTODOS ABSTRACTOS#################################
//MÉTODOS PÚBLICOS###################################
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
		$cu=new CU();
	#get main Variables
		$url= Globales::$absoluteURL;
		$currentMainMenu=$cu->getMainMenu2($this->_sesionpkiBUser);
	#set main variables
		View::set("url", $url);
		View::set("currentMainMenu", $currentMainMenu);	
	#get data variables
		$dsCompanyGrid=Users::selectKanbanUser($this->_sesionpkiBUser);
		while ($row =$dsCompanyGrid->fetch( \PDO::FETCH_ASSOC )){$dt_Company[] = $row;}
	#set data variables
		View::set("dt_Company",$dt_Company);
        View::set("title", "Grupo Empresarial");
	#Renderizar
		View::render("showUser");	
	}
	public function showProfile(){		
		#get main variables
		$url= Globales::$absoluteURL;
		
		#set main variables
		View::set("url", $url);
		View::set("title", "Users");
		#get data variables
		$currentMainMenu=CU::getMainMenu2($this->_sesionpkiBUser);
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
	#get main variables
		$url= Globales::$absoluteURL;
		$currentMainMenu=CU::getMainMenu2($this->_sesionpkiBUser);
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
		View::render("AddUser");       
	}
	public function addProfile(){
	#get main variables
		$url= Globales::$absoluteURL;
		$currentMainMenu=CU::getMainMenu2($this->_pkiBUser);
	#set main variables
		View::set("url", $url);
		View::set("currentMainMenu", $currentMainMenu);
		View::set("title", "Nuevo Perfil");
    #get data variables
		$dsGFunction=Profiles::getSelectibfunctiongroup12();
		$dsUser=Users::getParcialSelect();
	#set data variables
		View::set("drowsF",$dsGFunction);
		View::set("drowsU",$dsUser);
	#Renderizar Vista
		View::render("addProfile");
	}
}
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
//MAIN###############################################
	switch(@$_POST['hdn_toDo_h']){
		case "AddProfile_1":
			CreateProfile();
		break;
		case "AddUser":
			CreateUser();
		break;
		case "Eliminar":
			Delete();
		break;
 	}
	switch(@$_POST['btn_toDo_h']){
		case "assignProfileToUser":
			assignProfileToUser();
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
		$u->setDefaultF("null");
		$u->setActive("2");
		$u->setCreated('null');
		$u->setCreatedBy('null');
		$u->setModified('null');
		$u->setModifiedBy('null');
		if ($u->insertData('ibuser')){
			$destinatario=$u->getEmail();
			$asunto="Bienvenido a iBrain 2.0";
			$cuerpo = "";
			
			//include_once "../App/web/lib/Mailer/PHPMailerAutoload.php";
			include_once "../App/views/htmlTemplates/BienvenidoUsuario.php";
			$micorreo="cgomez@consultoriadual.com";
			$nombreFrom="iBrain info";
			$nombreadmin="";
			$asunto="Bienvenida a usuario";
			//$sucorreo=$u->getEmail();
//////////////////////////////////////////////DATOS DE EMAIL DE confirmacion////////////////////////////////////
			date_default_timezone_set('Etc/UTC');
			$mail= new PHPMailer(false);
			$mail->IsSMTP();
			$mail->SMTPDebug = 0;
			$mail->Debugoutput = 'html';
			$mail->Host       = "smtp.gmail.com";
			$mail->Port       = 587;
			$mail->SMTPSecure = "tls";  
			$mail->SMTPAuth = true;
			$mail->Username = 'santi.notificaciones@gmail.com';
			$mail->Password = 'envios2015';
			$mail->setFrom($micorreo,"Carlos Gómez");
			//$mail->AddReplyTo($micorreo,"Carlos Gómez 2");
			$mail->AddAddress ("$destinatario","andres@consultoriadual");
			$mail->Subject = "$asunto";
			$mail->MsgHTML($bodyMessage);
			$mail->AltBody='This is a plain-text message body';
			$mail->isHTML(true);
			$mail->SMTPOptions = array(
				'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true));
			
			if(!$mail->Send()){
				$msg='Mailer Error: '.$mail->ErrorInfo;
			}
			else{
				$msg="<p>Tu informacion se recibio correctamente <br> Se ha enviado una confirmacion al correo <b>correo</b></p>";
			}
			header("Location:http://localhost:8012/iBrain2.0/private/user");
		}	
		else
			echo "Error,no se puede enviar el correo electrónico ";
	}
	function CreateProfile(){
		
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
		$r=(empty($_POST['chk__deliveredToClient_h']))		?' <input type="checkbox" name=""/>':' <input type="checkbox" checked  name=""/>';
		$s=(empty($_POST['chk__cancelled_h']))				?' <input type="checkbox" name=""/>':' <input type="checkbox" checked  name=""/>';
		
		@$functionGroup=$_POST['slt_pkiBFunctionGroup_h'];
		$p=new Profiles;
		$nextId=$p->getNextId("pkiBUserProfile","ibuserprofile");
		$p->setpkiBUserProfile($nextId);
		$p->setProfileName($_POST['txt_profileName_h']);
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
		if($p-> insertData("ibuserprofile")){
			if(!empty($_POST['slt_pkiBUsers_h'])){
				Users::updateProfile($nextId,$_POST['slt_pkiBUsers_h']);
			}
			foreach ($functionGroup as $modules){
				$value[]=$modules;
			}
			$values=implode(',',$value);
			$bindParam="(".$values.")";
			Users::insertProfileHasFunction($nextId,$bindParam);
				
		}
		header("Location:http://localhost:8012/iBrain2.0/private/User/showProfile");
		//header("Location:http://localhost/www/iBrain2.0/private/User/showProfile");
	}
	function assignProfileToUser(){
		Users::updateProfile($_POST['slt_pkiBUsersProfile_h'],$_POST['slt_pkiBUsers_h']);		
	}
?>
