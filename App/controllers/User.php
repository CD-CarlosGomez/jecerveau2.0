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
use \App\Models\Profiles as Profiles;
use \App\web\lib\Mailer\PHPMailer;

	
class User extends Controller{
//CONSTANTES#########################################
//ATRIBUTOS##########################################
private $_sesionUsuario;
private $_sesionpkiBUser;
private $_sesionMenu;
//PROPIEDADES########################################
//MÉTODOS ABSTRACTOS#################################
//MÉTODOS PÚBLICOS###################################
	public function __construct(){
		
	}
	/**
     * [index]
    */
    public function index(){
		//$layout=new WithSiteMap(new WithTemplate(new WithMenu(new LayoutCSS())));
		//$layout= Layouts::render();
		//self::showUser();
		View::set("foo",true);
		View::render("z_testPost");
	}
	public function showUser(){
		session_start();
		$this->_sesionUsuario=$_SESSION["nombreUsuario"];
		$this->_sesionpkiBUser=$_SESSION['pkiBUser_p'];
		$this->_sesionMenu=$_SESSION['mainMenu'];
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
		$dsCompanyGrid=Users::getParcialSelect();
		while ($row =$dsCompanyGrid->fetch( \PDO::FETCH_ASSOC )){
			$dt_Company[] = $row;
		}
		$url= Globales::$absoluteURL;
		$currentMainMenu=$this->_sesionMenu;
		View::set("dt_Company",$dt_Company);
		View::set("url", $url);
		View::set("currentMainMenu", $currentMainMenu);
        View::set("title", "Grupo Empresarial");
        View::render("showUser");
	}
	public function showProfile(){
		session_start();
		$this->_sesionUsuario=$_SESSION["nombreUsuario"];
		$this->_sesionpkiBUser=$_SESSION['pkiBUser_p'];
		$this->_sesionMenu=$_SESSION['mainMenu'];
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
		$dsCompanyGrid=Profiles::getParcialSelect();
		while ($row =$dsCompanyGrid->fetch( \PDO::FETCH_ASSOC )){
			$dt_Company[] = $row;
		}
		$url= Globales::$absoluteURL;
		$currentMainMenu=$this->_sesionMenu;
		View::set("dt_Company",$dt_Company);
		View::set("url", $url);
		View::set("currentMainMenu", $currentMainMenu);
        View::set("title", "Grupo Empresarial");
        View::render("showProfile");
	}
	public function addUser(){
		session_start();
		$this->_sesionUsuario=$_SESSION["nombreUsuario"];
		$this->_sesionpkiBUser=$_SESSION['pkiBUser_p'];
		$this->_sesionMenu=$_SESSION['mainMenu'];
		if (isset($_SESSION['loggedin']) & $_SESSION['loggedin'] == true){}
		else{
				echo "Esta pagina es solo para usuarios registrados.<br>";
			echo "<a href='$url'>Login Here!</a>";
			exit;
		}
		$now = time(); 
		if($now > $_SESSION['expire']){
		session_destroy();
		echo "Su sesion a terminado, <a href='$url'>
			  Necesita Hacer Login</a>";
		exit;
		}
		/*$dsCompanyGrid=MA::getParcialSelect();
		while ($row =$dsCompanyGrid->fetch( \PDO::FETCH_ASSOC )){
			$dt_Company[] = $row;
		}*/
		
		$url= Globales::$absoluteURL;
		$currentMainMenu=$this->_sesionMenu;
		
		View::set("url", $url);
		View::set("currentMainMenu", $currentMainMenu);
        View::set("title", "AddCompany");
        View::render("AddUser");
	}
	public function addProfile(){
		session_start();
		$this->_sesionUsuario=$_SESSION["nombreUsuario"];
		$this->_sesionpkiBUser=$_SESSION['pkiBUser_p'];
		$this->_sesionMenu=$_SESSION['mainMenu'];
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
		
		/*$dsCompanyGrid=Users::getParcialSelect();
		while ($row =$dsCompanyGrid->fetch( \PDO::FETCH_ASSOC )){
			$dt_Company[] = $row;
		}*/
		
		$dsGFunction=Profiles::getSelectibfunctiongroup12();
		$dsUser=Users::getParcialSelect();
		$url= Globales::$absoluteURL;
		$currentMainMenu=$this->_sesionMenu;
		
		View::set("drowsU",$dsUser);
		View::set("drowsF",$dsGFunction);
		//View::set("dt_Company",$dt_Company);
		View::set("url", $url);
		View::set("currentMainMenu", $currentMainMenu);
        View::set("title", "Grupo Empresarial");
        View::render("addProfile");
	}

}
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
//MAIN###############################################
		/*session_start();
		$userName=$_SESSION["nombreUsuario"];
		$pkiBUser=$_SESSION['pkiBUser_p'];
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
		}*/
		
	switch(@$_POST['hdn_toDo_h']){
		case "AddProfile":
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
		$nextId=$u->getNextId("pkiBUser","ibuser");
		$u->setpkiBUser($nextId);
		$u->setfkiBUserProfile(1);
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
			$sucorreo="andres@consultoriadual.com";
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
			$mail->AddReplyTo($micorreo,"Carlos Gómez 2");
			$mail->AddAddress ("cgomez@consultoriadual.com","Andrés");
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
		}	
		else
			echo "Error,no se puede enviar el correo electrónico ";
		//View::render("EnterpriseGroup");
	}
	function CreateProfile(){
		$i=0;
		$functionGroup[]=$_POST['slt_pkiBFunctionGroup_h'];
		$p=new Profiles;
		$nextId=$p->getNextId("pkiBUserProfile","ibuserprofile");
		$p->setpkiBUserProfile($nextId);
		$p->setProfileName($_POST['txt_profileName_h']);
		$p->setToBeCollected($_POST['chk_toBecollected_h']);
		$p->setToBeAssigned($_POST['chk_toBeAssigned_h']);
		$p->setToBeDiagnosed($_POST['chk_toBeDiagnosed_h']);
		$p->setDiagnosisToBeAuthorized($_POST['chk_diagnosisToBeAuthorized_h']);
		$p->setToNotifyTheClient($_POST['chk_toNotifyTheClient_h']);
		$p->setToBeAuthorizedByClient($_POST['chk_toBeAuthorizedByClient_h']);
		$p->setInRepairProcess($_POST['chk_inRepairProcess_h']);
		$p->setRepaired($_POST['chk_repaired_h']);
		$p->setToDelivery($_POST['chk_toDelivery_h']);
		$p->setToBeCharged($_POST['chk_toBeCharged_h']);
		$p->setDeliveredToClient($_POST['chk__deliveredToClient_h']);
		$p->setCancelled($_POST['chk__cancelled_h']);
		$p-> insertData("ibuserprofile");
		/*{
			Users::updateProfile($nextId,$_POST['slt_pkiBUsers_h']);
			foreach (functionGroup as $modules){
				Users::insertProfileHasFunction($nextId,$modules[$i]);
				$i++;
			}
		}*/
		//header("Location:http://localhost:8012/iBrain2.0/private/EnterpriseGroup/showBranchOffice");
		header("Location:http://localhost/www/iBrain2.0/private/User/showProfile");
	}
	
?>
