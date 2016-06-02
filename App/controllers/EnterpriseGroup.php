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
use \App\Models\EnterpriseGroup\Companies as MA;
use \App\Models\EnterpriseGroup\Subcompanies as SC;
use \App\Models\EnterpriseGroup\BranchOffices as BO;
use \App\Models\Users\Users as Us;
use \App\Models\CurrentUser as CU;
use \App\data\DataGridView as DGB;
use \App\data\Crud as Crud;


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
		View::set("title", "Listado de cuentas maestras");
		View::set("url", $directoryPath);
		#get data variables
		$currentMainMenu=$cu->getMainMenu2($this->_sesionpkiBUser);
		$dsSlcCompany=MA::getpknaSelect();
		$dsKanBanCompanies=MA::selectKanbanCompany($this->_sesionpkiBUser);
		while ($row =$dsKanBanCompanies->fetch(\PDO::FETCH_BOTH)){
			$dt_Company[] = $row;
		}
		#set data variables
		View::set("currentMainMenu", $currentMainMenu);
		View::set("drows_Company",$dsSlcCompany);
		View::set("dt_Company",$dt_Company);
		#Render
		View::render("showCompany");        
	}
	public function showSubcompanyCompany($pk){
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
		$dsKanBanCompanies=SC::SelectKanbanCompanyNumber($pk);
		while ($row =$dsKanBanCompanies->fetch(\PDO::FETCH_BOTH)){
			$dt_Company[] = $row;
		}
		#set data variables
		View::set("currentMainMenu", $currentMainMenu);
		View::set("drows_Company",$dsSlcCompany);
		View::set("dt_Company",@$dt_Company);
		#Render
		View::render("showSubcompanyCompany");        
	}
	public function showBranchOfficeCompany($pk) {
		#Objetos e instancias
		$cu=New CU();
		#get main variables
		$url= Globales::$absoluteURL;
		#set main variables
		View::set("url", $url);
		View::set("title", "AASP");
		#get data variables
		$dsGrid=BO::SelectKanbanCompanyNumber($pk);
		$currentMainMenu=$cu->getMainMenu2($this->_sesionpkiBUser);
		while ($row =$dsGrid->fetch( \PDO::FETCH_ASSOC )){
			$dt_Company[] = $row;
		}
		#set data variables
		View::set("currentMainMenu", $currentMainMenu);
		View::set("dt_Company",$dt_Company);
		#render
		View::render("showBranchOfficeCompany");
	}
	public function showUserCompany($pk){
	#Objetos_e_instancias
		$cu=new CU();
	#get main Variables
		$url= Globales::$absoluteURL;
		$currentMainMenu=$cu->getMainMenu2($this->_sesionpkiBUser);
	#set main variables
		View::set("url", $url);
		View::set("currentMainMenu", $currentMainMenu);	
	#get data variables
		$dsCompanyGrid=Us::SelectKanbanCompanyNumber($pk);
		while ($row =$dsCompanyGrid->fetch( \PDO::FETCH_ASSOC )){$dt_Company[] = $row;}
	#set data variables
		View::set("dt_Company",@$dt_Company);
        View::set("title", "Grupo Empresarial");
	#Renderizar
		View::render("showUserCompany");	
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
		$dsKanBanCompanies=SC::selectKanbanSubcompany();
		while ($row =$dsKanBanCompanies->fetch(\PDO::FETCH_BOTH)){
			$dt_Company[] = $row;
		}
		#set data variables
		View::set("currentMainMenu", $currentMainMenu);
		View::set("drows_Company",$dsSlcCompany);
		View::set("dt_Company",$dt_Company);
		#Render
		View::render("showSubcompany");        
	}
	public function showBranchOfficeSubcompany($pk) {
		#Objetos e instancias
		$cu=New CU();
		#get main variables
		$url= Globales::$absoluteURL;
		#set main variables
		View::set("url", $url);
		View::set("title", "AASP");
		#get data variables
		$dsGrid=BO::SelectKanbanSubcompanyNumber($pk);
		$currentMainMenu=$cu->getMainMenu2($this->_sesionpkiBUser);
		while ($row =$dsGrid->fetch( \PDO::FETCH_BOTH )){
			$dt_Company[] = $row;
		}
		#set data variables
		View::set("currentMainMenu", $currentMainMenu);
		View::set("dt_Company",@$dt_Company);
		#render
		View::render("showBranchOfficeSubcompany");
	}
	public function showUserSubcompany($pk){
	#Objetos_e_instancias
		$cu=new CU();
	#get main Variables
		$url= Globales::$absoluteURL;
		$currentMainMenu=$cu->getMainMenu2($this->_sesionpkiBUser);
	#set main variables
		View::set("url", $url);
		View::set("currentMainMenu", $currentMainMenu);	
	#get data variables
		$dsCompanyGrid=Us::SelectKanbanSubcompanyNumber($pk);
		while ($row =$dsCompanyGrid->fetch( \PDO::FETCH_ASSOC )){$dt_Company[] = $row;}
	#set data variables
		View::set("dt_Company",@$dt_Company);
        View::set("title", "Grupo Empresarial");
	#Renderizar
		View::render("showUserSubcompany");	
	}
	public function showBranchOffice() {
		#Objetos e instancias
		$cu=New CU();
		#get main variables
		$url= Globales::$absoluteURL;
		
		#set main variables
		View::set("url", $url);
		View::set("title", "AASP");
		#get data variables
		$dsGrid=BO::selectKanbanBO();
		$currentMainMenu=$cu->getMainMenu2($this->_sesionpkiBUser);
		while ($row =$dsGrid->fetch( \PDO::FETCH_BOTH )){
			$dt_Company[] = $row;
		}
		#set data variables
		View::set("currentMainMenu", $currentMainMenu);
		View::set("dt_Company",$dt_Company);
		#render
		View::render("showBO");
	}
	public function showUserBranchOffice($pk){
	#Objetos_e_instancias
		$cu=new CU();
	#get main Variables
		$url= Globales::$absoluteURL;
		$currentMainMenu=$cu->getMainMenu2($this->_sesionpkiBUser);
	#set main variables
		View::set("url", $url);
		View::set("currentMainMenu", $currentMainMenu);	
	#get data variables
		$dsCompanyGrid=Us::SelectKanbanBONumber($pk);
		while ($row =$dsCompanyGrid->fetch( \PDO::FETCH_ASSOC )){$dt_Company[] = $row;}
	#set data variables
		View::set("dt_Company",@$dt_Company);
        View::set("title", "Grupo Empresarial");
	#Renderizar
		View::render("showUserBranchOffice");	
	}
	public function addEnterpriseGroup(){
		#Objetos e instancias
		$cu=CU::getInstance();
		#get main variables
		$url= Globales::$absoluteURL;
		$timezone=Globales::timezone_list();
		
		#set main variables
		View::set("url", $url);
		View::set("title", "AddCompany");
		View::set("dt_timezone",$timezone);
		#get data variables
		$currentMainMenu=$cu->getMainMenu2($this->_sesionpkiBUser);
		$dsSlcCompany=MA::getpknaSelect();
		$dsCompanyGrid=MA::getParcialSelect();
		while ($row =$dsCompanyGrid->fetch( \PDO::FETCH_ASSOC )){
			$dt_Company[] = $row;
		}
		$ds_country=Crud::getAll("country");
		#set data variables
		View::set("currentMainMenu", $currentMainMenu);
		View::set("drows_Company",$dsSlcCompany);
		View::set("dt_Company",$dt_Company);
		View::set("dt_country",$ds_country);
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
		$currentMainMenu=$cu->getMainMenu2($this->_sesionpkiBUser);
		#set data variables
		View::set("currentMainMenu", $currentMainMenu);
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
		$currentMainMenu=$cu->getMainMenu2($this->_sesionpkiBUser);
		$dsSlcCompany=MA::getParcialSelect();
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
		$timezone=Globales::timezone_list();
		#set_main_variables
		View::set("url", $url);
		View::set("title", "AddCompany");
		View::set("dt_timezone",$timezone);
		#get_data_variables
		$currentMainMenu=$cu->getMainMenu2($this->_sesionpkiBUser);
		$dsSlcSubCompany=SC::getpknaSelect();
		$ds_country=Crud::getAll("country");
		//$ds_timezone=Crud::getAll("timezone");
		#set_data_variables
		View::set("drows_Subcompany",$dsSlcSubCompany);
		View::set("currentMainMenu", $currentMainMenu);
		View::set("dt_country",$ds_country);
		
		#render
		View::render("addBO");
	}
	public function editCompany($pkCO){
		#Objetos e instancias
		$cu=CU::getInstance();
		#get main variables
		$url= Globales::$absoluteURL;
		View::set("title", "Editar cuenta maestra");
		#set main variables
		View::set("url",$url);
		View::set("pkCO",$pkCO);
		#get data variables
		$currentMainMenu=$cu->getMainMenu2($this->_sesionpkiBUser);
		$dsCompany = Crud::getById('company','pkCompany',$pkCO);
		while ($row =$dsCompany->fetch( \PDO::FETCH_ASSOC )){
			$dt_Company[] = $row;
		}
		#set data variables
		View::set("currentMainMenu", $currentMainMenu);
		View::set("dt_Company",$dt_Company);
		#render
		View::render("viewCompany");        
	}
	public function editSubcompany($pkSC){
		#Objetos e instancias
		$cu=CU::getInstance();
		#get main variables
		$url= Globales::$absoluteURL;
		View::set("title", "Editar Sub cuenta");
		#set main variables
		View::set("url", $url);
		View::set("pkSC", $pkSC);
		#get data variables
		$currentMainMenu=$cu->getMainMenu2($this->_sesionpkiBUser);
		$dsSlcCompany=MA::getParcialSelect();
		$ds_subCompany = Crud::getById('subcompany','pkSubCompany',$pkSC);
		while ($row =$ds_subCompany->fetch( \PDO::FETCH_ASSOC )){ $dt_subCompany[] = $row;}
		#set data variables
		View::set("currentMainMenu", $currentMainMenu);
		View::set("drows_Company",$dsSlcCompany);
		View::set("dt_subCompany",$dt_subCompany);
		#render
		View::render("viewSubcompany");        
	}
	public function editBranchOffice($pkBO){
		#Objetos_e_instancias
		$cu=CU::getInstance();
		#get_main_variables
		$url= Globales::$absoluteURL;
		$timezone=Globales::timezone_list();
		#set_main_variables
		View::set("url", $url);
		View::set("title", "AddCompany");
		View::set("dt_timezone",$timezone);
		View::set("pkBO",$pkBO);
		#get_data_variables
		$currentMainMenu=$cu->getMainMenu2($this->_sesionpkiBUser);
		$dsSlcSubCompany=SC::getpknaSelect();
		//Obtenemos los países
		$ds_country=Crud::getAll("country");
		//Obtenemos los datos del branchoffice
		$ds_BO=Crud::getById('branchoffice','pkBranchOffice',$pkBO);
		while ($row =$ds_BO->fetch( \PDO::FETCH_ASSOC )){ $dt_BO[] = $row;}
		//Obtenemos los datos del BranchOfficeSetting
		$ds_BOS=Crud::getById('branchofficesetting','BranchOffice_pkBranchOffice',$pkBO);
		while ($row =$ds_BOS->fetch( \PDO::FETCH_ASSOC )){ $dt_BOS[] = $row;}
		#set_data_variables
		View::set("drows_Subcompany",$dsSlcSubCompany);
		View::set("currentMainMenu", $currentMainMenu);
		View::set("dt_country",$ds_country);
		View::set("dt_BO",$dt_BO);
		View::set("dt_BOS",@$dt_BOS);
		#render
		View::render("viewBO");
	}
	public function cmdUpdateCompany(){
		View::set("currentUser",$this->_sesionpkiBUser);
		View::render("updateCompany");
	}
	public function cmdUpdateSubcompany(){
		View::set("currentUser",$this->_sesionpkiBUser);
		View::render("updateSubcompany");
	}
	public function cmdUpdateBO(){
		View::set("currentUser",$this->_sesionpkiBUser);
		View::render("updateBO");
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
		case "AddAll":
			CreateEnterpriceGroup();
		break;
 	}
	function CreateEnterpriceGroup(){
		#Podemos utilizar el PDO::lastInsertID para mejorar el código
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
		if($c->insertData("company")){
		
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
			if ($sc->insertData("subcompany")){
			
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
			
				if ($bo->insertData("branchoffice")){
					$bos['pkBranchOfficeSetting']=Crud::getNextId('pkBranchOfficeSetting','branchofficesetting');
					$bos['BranchOffice_pkBranchOffice']=$nextPKBO;
					$bos['Currency_pkCurrency']=0;
					$bos['fktimeZone']=$_POST['slt_timeZone_h'];
					$bos['fkLanguage']="";
					$bos['fkCountry']=$_POST['slt_pkCountry_h'];
					$bos['fkAASPType']=$_POST['slt_aaspType_h'];
					$bos['shipTo']=$_POST['txt_shipTo_h'];
					$bos['soldTo']=$_POST['txt_soldTo_h'];
					$bos['folioStart']=$_POST['txt_folioStart_h'];
					$bos['folioSerie']=$_POST['txt_folioSerie_h'];
					
					$buildQueryInsert=Crud::insert($bos,'branchofficesetting');
				}
			}
		}
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
	$c->insertData("company");
	
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
	
	if ($bo->insertData("branchoffice")){
		$bos['pkBranchOfficeSetting']=Crud::getNextId('pkBranchOfficeSetting','branchofficesetting');
		$bos['BranchOffice_pkBranchOffice']=$nextPKBO;
		$bos['Currency_pkCurrency']=0;
		$bos['fktimeZone']=$_POST['slt_timeZone_h'];
		$bos['fkLanguage']="";
		$bos['fkCountry']=$_POST['slt_pkCountry_h'];
		$bos['fkAASPType']=$_POST['slt_aaspType_h'];
		$bos['shipTo']=$_POST['txt_shipTo_h'];
		$bos['soldTo']=$_POST['txt_soldTo_h'];
		$bos['folioStart']=$_POST['txt_folioStart_h'];
		$bos['folioSerie']=$_POST['txt_folioSerie_h'];
		
		$buildQueryInsert=Crud::insert($bos,'branchofficesetting');
	}
	header("Location:" . Globales::$absoluteURL . "/private/EnterpriseGroup/showBranchOffice");
	}
	
?>
