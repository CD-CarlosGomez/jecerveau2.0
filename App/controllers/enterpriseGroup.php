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
		$_SESSION["nombreUsuario"];
		$_SESSION['pkiBUser_p'];
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
		
	switch(@$_POST['btn_toDo_h']){
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
	$c->setfkiBUserProfile(0);
	$c->setLegalName($_POST['txt_legalName_h']);
	$c->setCommercialName($_POST["txt_commercialName_h"]);
	$c->setTaxId("No definido");
	$c-> setLogoFile("No definido");
	$c->setStreet($_POST["txt_street_h"]);
	$c->setExtNumber($_POST["txt_extNumber_h"]);
	$c->setIntNumber($_POST["txt_intNumber_h"]);
	$c->setRegion($_POST["txt_region_h"]);
	$c->setZone();
	$c->setProvince();
	$c->setZipCode();
	$c->setCreated();
	$c->setCreatedBy();
	$c->setModified();
	$c->setModifiedBy();
	$c->setActive();
	$c->setfkEnterpriseGroup();
	}
	function CreateBO(){
	$bo=new BO;
	$bo->setpkBO($bo->getNextId("pkBranchOffice","BranchOffice"));
	$bo->setfkCompany();
	$bo->setBOName();
	$bo->setBOStreet();
	$bo->setBOExtNumber();
	$bo->setBOIntNumber();
	$bo->setBORegion();
	$bo->setBOZone();
	$bo->setBOProvince();
	$bo->setBOZipCode();
	$bo->setCreated();
	$bo->setCreatedBy();
	$bo->setModified();
	$bo->setModifiedBy();
	$bo->setActive();
	}
	function CreateUser(){
		$u=new User;
		$nextId=$u->getNextId("pkiBUser","ibuser");
		$u->setpkiBUser($nextId);
		$u->setfkiBUserProfile();
		$u->setUserName($_POST['txt_userName_h']);
		$u->setPWD($_POST['txt_password_h']);
		$u->setPwdTmp($_POST['txt_password_h']);
		$u->setRealName($_POST['txt_password_h']);
		$u->setEmail($_POST['txt_password_h']);
		$u->setDefaultF();
		$u->setActive('1');
		$u->setCreated('1');
		$u->setCreatedBy('1');
		$u->setModified('1');
		$u->setModifiedBy('1');
		if ($u->insertData('ibuser')){
			$destinatario=$emailint1;
			$asunto="Bienvenido a iBrain 2.0";
			$cuerpo = "";
			
			require_once "../views/lib/Mailer/PHPMailerAutoload.php";
			require_once "../views/htmlFrames/BienvenidoUsuario.php";
			$micorreo="cgomez@consultoriadual.com";
			$nombrefrom="iBrain info";
			$nombreadmin="";
			$asunto="Bienvenida a usuario";
			$sucorreo="andres@consultoriadual.com";
//////////////////////////////////////////////DATOS DE EMAIL DE confirmacion////////////////////////////////////
			$mail2= new PHPMailer ();
			$mail2->From = $micorreo;
			$mail2 ->FromName = $nombreFrom;
			$mail2-> AddAddress ($sucorreo);//aqui va el nombre del usuario que se le rep
			$mail2->AddReplyTo($micorreo);
			$mail2-> Subject = "$asunto";
			$mail2->IsSMTP();
			$mail2->SMTPSecure = "tls";                 // sets the prefix to the servier
			$mail2->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
			$mail2->Port       = 587;
			$mail2->SMTPAuth = true;
			$mail2->Username = 'cgomez@consultoriadual.com';
			$mail2->Password = 'Dual2016';
			$mail2->IsHTML(true); // El correo se enva como HTML
			$mail2->MsgHTML($bodyMessage);
			if(!$mail2->Send()){
				$msg='Error: '.$mail2->ErrorInfo;
			}
			else{
				$msg="<p>Tu informacion se recibio correctamente <br> Se ha enviado una confirmacion al correo <b>$correo</b></p>";
			}
		}	
		else
			echo "Error,no se puedeeliminar ";
		//View::render("EnterpriseGroup");
	}
?>
