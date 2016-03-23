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
use \App\Models\Users as User;
use \App\Models\Companies as Company;
use \App\Models\BranchOffices as BO;
use \Core\Controller;
use \App\web\lib\Mailer\PHPMailer;
	
class EnterpriseGroup extends Controller{
//CONSTANTES#########################################
//ATRIBUTOS##########################################
private $_sesionUsuario;
private $_sesionpkiBUser;
private $_sesionMenu;
//PROPIEDADES########################################
//MÉTODOS ABSTRACTOS#################################
//MÉTODOS PÚBLICOS###################################
	public function __construct(){
		//session_start();
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
		//$currentUser=new CurrentUser;
		$currentMainMenu=$this->_sesionMenu;
		//View::set("currentMainMenu", $currentMainMenu);
		View::set("currentMainMenu", $currentMainMenu);
        View::set("title", "Custom MVC");
        View::render("EnterpriseGroup");
	}
	/**
     * [index]
    */
    public function index(){
	//$layout=new WithSiteMap(new WithTemplate(new WithMenu(new LayoutCSS())));
	//$layout= Layouts::render();
	}
}
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
//MAIN###############################################
		session_start();
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
		}
		
	switch(@$_POST['hdn_toDo_h']){
		case "AddCompany":
			CreateCompany();
		break;
			case "AddBO":
			CreateBO();
		break;
		case "AddUser":
			CreateUser();
		break;
		case "Eliminar":
			Delete();
		break;
 	}
	function CreateCompany(){
	$c=new Company;
	$c->setpkCompany($c->getNextId("pkCompany","Company"));
	$c->setLegalName($_POST['txt_legalName_h']);
	$c->setCommercialName($_POST["txt_commercialName_h"]);
	$c->setTaxId("No definido");
	$c-> setLogoFile("No definido");
	$c->setStreet($_POST["txt_street_h"]);
	$c->setExtNumber($_POST["txt_extNumber_h"]);
	$c->setIntNumber($_POST["txt_intNumber_h"]);
	$c->setRegion($_POST["txt_region_h"]);
	$c->setZone($_POST["txt_zone_h"]);
	$c->setProvince($_POST["txt_province_h"]);
	$c->setZipCode($_POST["txt_zipCode_h"]);
	$c->setCreated("null");
	$c->setCreatedBy("1");
	$c->setModified("null");
	$c->setModifiedBy("null");
	$c->setActive("1");
	$c->insertData("Company");
	
	
	}
	function CreateBO(){
	$bo=new BO;
	$bo->setpkBO($bo->getNextId("pkBranchOffice","BranchOffice"));
	$bo->setfkCompany(1);
	$bo->setBOName($_POST["txt_BOName_h"]);
	$bo->setBOStreet($_POST["txt_BOStreet_h"]);
	$bo->setBOExtNumber($_POST["txt_BOExtNumber_h"]);
	$bo->setBOIntNumber($_POST["txt_BOIntNumber_h"]);
	$bo->setBORegion($_POST["txt_BORegion_h"]);
	$bo->setBOZone($_POST["txt_BOZone_h"]);
	$bo->setBOProvince($_POST["txt_BOProvince_h"]);
	$bo->setBOZipCode($_POST["txt_BOZipCode_h"]);
	$bo->setCreated("null");
	$bo->setCreatedBy("1");
	$bo->setModified("null");
	$bo->setModifiedBy("null");
	$bo->setActive("1");
	$bo->insertData("branchoffice");
	}
	
	function CreateUser(){
		$u=new User;
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
		$u->setCreated($_SESSION['pkiBUser_p']);
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
?>
