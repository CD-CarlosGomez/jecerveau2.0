<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date 5 de Marzo del 2016
// | @Version 1.0
// +-----------------------------------------------
#16.3.22 Agregar validación del lado del servidor
#16.3.27 Arreglar problemas de sesión, condición: si no ha iniciado sesión, que la inicie, de lo contrario que no...

namespace App\Controllers;
defined("APPPATH") OR die("Access denied");

use \Core\View;
use \Core\Controller;
use \App\Config\Globales as Globales;
use \App\Models\Companies as MA;
use \App\Models\enterpriseGroup\Subcompanies as SC;
use \App\Models\BranchOffices as BO;
use \App\Models\CurrentUser as CU;
use \App\data\DataGridView as DGB;

	if (strlen(session_id()) < 1){session_start();}
		$_SESSION["nombreUsuario"];
		$_SESSION['pkiBUser_p'];
	if (isset($_SESSION['loggedin']) & $_SESSION['loggedin'] == true){}
		else{
				echo "Esta pagina es solo para usuarios registrados.<br>";
			echo "<a href='" . Globales::$absoluteURL. "'>Login Here!</a>";
			exit;
		}
		$now = time(); 
		if($now > $_SESSION['expire']){
		session_destroy();
		echo "Su sesion a terminado, <a href='" . Globales::$absoluteURL . "'>
			  Necesita Hacer Login</a>";
		exit;
		}
class EnterpriseGroup extends Controller{
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
		self::showCompany();
		//View::set("foo",true);
		//View::render("z_testPost");
	}
    public function showCompany(){
		#Objetos e instancias
		$cu=CU::getInstance();
		
		#get main variables
		$directoryPath= Globales::$absoluteURL;
		#set main variables
		View::set("title", "Companies");
		View::set("url", $directoryPath);
		#get data variables
		$currentMainMenu=$cu->getMainMenu2($this->_sesionpkiBUser);
		$dsSlcCompany=MA::getpknaSelect();
		$dsKanBanCompanies=MA::selectKanbanCompany($this->_sesionpkiBUser);
		while ($row =$dsKanBanCompanies->fetch(\PDO::FETCH_ASSOC)){
			$dt_Company[] = $row;
		}
		#set data variables
		View::set("currentMainMenu", $currentMainMenu);
		View::set("drows_Company",$dsSlcCompany);
		View::set("dt_Company",$dt_Company);
		#Render
		View::render("showCompany");        
	}
	public function showSubcompany(){
		#Objetos e instancias
		$cu=CU::getInstance();
		
		#get main variables
		$directoryPath= Globales::$absoluteURL;
		#set main variables
		View::set("title", "Subcompanies");
		View::set("url", $directoryPath);
		#get data variables
		$currentMainMenu=$cu->getMainMenu2($this->_sesionpkiBUser);
		$dsSlcCompany=SC::getpknaSelect();
		$dsKanBanCompanies=SC::selectKanbanSubcompany($this->_sesionpkiBUser);
		while ($row =$dsKanBanCompanies->fetch(\PDO::FETCH_ASSOC)){
			$dt_Company[] = $row;
		}
		#set data variables
		View::set("currentMainMenu", $currentMainMenu);
		View::set("drows_Company",$dsSlcCompany);
		View::set("dt_Company",$dt_Company);
		#Render
		View::render("showSubcompany");        
	}
	public function showBranchOffice() {
	
		#Objetos e instancias
		
		#get main variables
		$url= Globales::$absoluteURL;
		
		#set main variables
		View::set("url", $url);
		View::set("title", "AASP");
		#get data variables
		$dsGrid=BO::selectKanbanBO($this->_sesionpkiBUser);
		$currentMainMenu=CU::getMainMenu2($this->_sesionpkiBUser);
		while ($row =$dsGrid->fetch( \PDO::FETCH_ASSOC )){
			$dt_Company[] = $row;
		}
		#set data variables
		View::set("currentMainMenu", $currentMainMenu);
		View::set("dt_Company",$dt_Company);
		#render
		View::render("showBO");
	}
	public function addEnterpriseGroup(){
		#Objetos e instancias
		$cu=CU::getInstance();
		#get main variables
		$url= Globales::$absoluteURL;
		View::set("title", "AddCompany");
		#set main variables
		View::set("url", $url);
		
		#get data variables
		$currentMainMenu=CU::getMainMenu2($this->_sesionpkiBUser);
		$dsSlcCompany=MA::getpknaSelect();
		$dsCompanyGrid=MA::getParcialSelect();
		while ($row =$dsCompanyGrid->fetch( \PDO::FETCH_ASSOC )){
			$dt_Company[] = $row;
		}
		#set data variables
		View::set("currentMainMenu", $currentMainMenu);
		View::set("drows_Company",$dsSlcCompany);
		View::set("dt_Company",$dt_Company);
		#render
		View::render("addEnterpriseGroup");        
	}
	public function addCompany(){
		#Objetos e instancias
		$cu=CU::getInstance();
		#get main variables
		$url= Globales::$absoluteURL;
		View::set("title", "AddCompany");
		#set main variables
		View::set("url", $url);
		
		#get data variables
		$currentMainMenu=CU::getMainMenu2($this->_sesionpkiBUser);
		$dsSlcCompany=MA::getpknaSelect();
		$dsCompanyGrid=MA::getParcialSelect();
		while ($row =$dsCompanyGrid->fetch( \PDO::FETCH_ASSOC )){
			$dt_Company[] = $row;
		}
		#set data variables
		View::set("currentMainMenu", $currentMainMenu);
		View::set("drows_Company",$dsSlcCompany);
		View::set("dt_Company",$dt_Company);
		#render
		View::render("addCompany");        
	}
	public function addSubcompany(){
		#Objetos e instancias
		$cu=CU::getInstance();
		#get main variables
		$url= Globales::$absoluteURL;
		View::set("title", "AddCompany");
		#set main variables
		View::set("url", $url);
		
		#get data variables
		$currentMainMenu=CU::getMainMenu2($this->_sesionpkiBUser);
		$dsSlcCompany=MA::getpknaSelect();
		/*$dsCompanyGrid=MA::getParcialSelect();
		while ($row =$dsCompanyGrid->fetch( \PDO::FETCH_ASSOC )){
			$dt_Company[] = $row;
		}*/
		#set data variables
		View::set("currentMainMenu", $currentMainMenu);
		View::set("drows_Company",$dsSlcCompany);
		//View::set("dt_Company",$dt_Company);
		#render
		View::render("addSubcompany");        
	}
	public function addBranchOffice(){
		#Objetos_e_instancias
		$cu=CU::getInstance();
		#get_main_variables
		$url= Globales::$absoluteURL;
		#set_main_variables
		View::set("url", $url);
		View::set("title", "AddCompany");
		#get_data_variables
		$currentMainMenu=CU::getMainMenu2($this->_sesionpkiBUser);
		$dsSlcSubCompany=SC::getpknaSelect();
		#set_data_variables
		View::set("drows_Subcompany",$dsSlcSubCompany);
		View::set("currentMainMenu", $currentMainMenu);
		#render
		View::render("addBO");
	}
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
}
//MAIN###############################################	
	switch(@$_POST['btn_command_h']){
		case "AddCompany":
			CreateCompany();
		break;
			case "AddBO":
			CreateBO();
		break;
		case "AddSubCompany":
			CreateSubCompany();
		break;
		case "addAll":
			CreateEnterpriceGroup();
		break;
 	}
	function CreateEnterpriceGroup(){
		$c=new MA;
		$nextPKCompany=$c->getNextId("pkCompany","company");
		$c->setpkCompany($nextPKCompany);
		$c->setLegalName($_POST['txt_legalName_h']);
		$c->setCommercialName($_POST["txt_commercialName_h"]);
		$c->setActive("1");
		$c->setCreated(date("Y-m-d"));
		$c->setCreatedBy($_SESSION['pkiBUser_p']);
		$c->setModified("null");
		$c->setModifiedBy("null");
		$c->insertData("Company");
		
		$sc=new SC;
		$nextPKSubcompany=$sc->getNextId("pkSubCompany","subcompany");
		$sc->setPkSubCompany($nextPKSubcompany);
		$sc->setCompany_pkCompany($nextPKCompany);
		$sc->setSubCompanyName($_POST["txt_subCompanyName_h"]);
		$sc->setActive("1");
		$sc->setCreated(date("Y-m-d"));
		$sc->setCreatedBy($_SESSION['pkiBUser_p']);
		$sc->setModified("null");
		$sc->setModifiedBy("null");
		$sc->insertData("subcompany");
		
		$bo=new BO;
		$nextPKBO=$bo->getNextId("pkBranchOffice","branchoffice");
		$bo->setpkBO($nextPKBO);
		$bo->setpkSC($nextPKSubcompany);
		$bo->setBOName($_POST["txt_BOName_h"]);
		$bo->setBOStreet($_POST["txt_BOStreet_h"]);
		$bo->setBOExtNumber($_POST["txt_BOExtNumber_h"]);
		$bo->setBOIntNumber($_POST["txt_BOIntNumber_h"]);
		$bo->setBORegion($_POST["txt_BORegion_h"]);
		$bo->setBOZone($_POST["txt_BOZone_h"]);
		$bo->setBOProvince($_POST["txt_BOProvince_h"]);
		$bo->setBOZipCode($_POST["txt_BOZipCode_h"]);
		$bo->setServiceAddress($_POST['txt_serviceAddress_h']);
		$bo->setServiceManager($_POST['txt_serviceManager_h']);
		$bo->setServiceEmail($_POST['txt_serviceEmail_h']);
		$bo->setLogoFile('null');
		$bo->setOfficeHour($_POST['txt_officeHour_h']);
		$bo->setServicePhone($_POST['txt_servicePhone_h']);
		$bo->setActive("1");
		$bo->setCreated(date("Y-m-d"));
		$bo->setCreatedBy($_SESSION['pkiBUser_p']);
		$bo->setModified("null");
		$bo->setModifiedBy("null");
		$bo->insertData("branchoffice");	
		
	}
	function CreateCompany(){
	$c=new MA;
	$nextPKCompany=$c->getNextId("pkCompany","company");
	$c->setpkCompany($nextPKCompany);
	$c->setLegalName($_POST['txt_legalName_h']);
	$c->setCommercialName($_POST["txt_commercialName_h"]);
	$c->setActive("1");
	$c->setCreated(date("Y-m-d"));
	$c->setCreatedBy($_SESSION['pkiBUser_p']);
	$c->setModified("null");
	$c->setModifiedBy("null");
	$c->insertData("Company");
	
	}
	function CreateSubCompany(){
	$sc=new SC;
	$nextPKSubcompany=$sc->getNextId("pkSubCompany","subcompany");
	$sc->setPkSubCompany($nextPKSubcompany);
	$sc->setCompany_pkCompany($_POST["slt_fkCompany_h"]);
	$sc->setSubCompanyName($_POST["txt_subCompanyName_h"]);
	$sc->setActive("1");
	$sc->setCreated(date("Y-m-d"));
	$sc->setCreatedBy($_SESSION['pkiBUser_p']);
	$sc->setModified("null");
	$sc->setModifiedBy("null");
	$sc->insertData("subcompany");
	}
	function CreateBO(){
	$bo=new BO;
	$nextPKBO=$bo->getNextId("pkBranchOffice","branchoffice");
	$bo->setpkBO($nextPKBO);
	$bo->setpkSC($_POST['slt_fkSubCompany_h']);
	$bo->setBOName($_POST["txt_BOName_h"]);
	$bo->setBOStreet($_POST["txt_BOStreet_h"]);
	$bo->setBOExtNumber($_POST["txt_BOExtNumber_h"]);
	$bo->setBOIntNumber($_POST["txt_BOIntNumber_h"]);
	$bo->setBORegion($_POST["txt_BORegion_h"]);
	$bo->setBOZone($_POST["txt_BOZone_h"]);
	$bo->setBOProvince($_POST["txt_BOProvince_h"]);
	$bo->setBOZipCode($_POST["txt_BOZipCode_h"]);
	$bo->setServiceAddress($_POST['txt_serviceAddress_h']);
	$bo->setServiceManager($_POST['txt_serviceManager_h']);
	$bo->setServiceEmail($_POST['txt_serviceEmail_h']);
	$bo->setLogoFile('null');
	$bo->setOfficeHour($_POST['txt_officeHour_h']);
	$bo->setServicePhone($_POST['txt_servicePhone_h']);
	$bo->setActive("1");
	$bo->setCreated(date("Y-m-d"));
	$bo->setCreatedBy($_SESSION['pkiBUser_p']);
	$bo->setModified("null");
	$bo->setModifiedBy("null");
	$bo->insertData("branchoffice");
	//header("Location:http://localhost:8012/iBrain2.0/private/EnterpriseGroup/showBranchOffice");
	}
?>
