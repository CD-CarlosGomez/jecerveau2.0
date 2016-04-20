<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date 5 de Marzo del 2016
// | @Version 1.0
// +-----------------------------------------------
#16.3.22 Agregar validación del lado del servidor
#Preguntar en qué consiste el GSX exactamente...
namespace App\Controllers;
defined("APPPATH") OR die("Access denied");

use \Core\View;
use \Core\Controller;
use \App\Config\Globales as Globales;
use \App\Models\EnterpriseGroup\BranchOffices as BO;
use \App\Models\ServiceOrders\ServiceOrders as SO;
use \App\Models\ServiceOrders\CollectMethods as CM;
use \App\Models\ServiceOrders\SorderTypes as SOT;
use \App\Models\Contacts\Contacts as Co;
use \App\Models\CurrentUser as CU;

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
	
class ServiceOrder extends Controller{
//CONSTANTES#########################################
//ATRIBUTOS##########################################
private $_sesionUsuario;
private $_sesionpkiBUser;
private $_sesionMenu;
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
		self::showSO();
		//View::set("foo",true);
		//View::render("z_testPost");
	}
	public function showSO(){
		#get_main_variables
		$url= Globales::$absoluteURL;
		#set_main_variables
		View::set("url", $url);
		View::set("title", "Listado de &oacute;rdenes");
		#get_data_variables
		$currentMainMenu=CU::getMainMenu2($this->_sesionpkiBUser);
		$dsSO=SO::getSelectIbSO189A1();
		while ($row =$dsSO->fetch( \PDO::FETCH_ASSOC )){
			$dt_SO[] = $row;
		}
		#set_data_variables
		View::set("dt_SO",$dt_SO);
		View::set("currentMainMenu", $currentMainMenu);
		#render      
        View::render("showSO");
	}
	public function addSO(){
		#Objetos_e_Instancias;
			$cu=new CU();
			$cm=New CM();
			$sot=New SOT();
		#get_main_variables
			$url= Globales::$absoluteURL;
		#set_main_variables
			View::set("url", $url);
			View::set("title", "iBrain>Nueva Orden");
		#get_data_variables
			$currentMainMenu=$cu->getMainMenu2($this->_sesionpkiBUser);
			$ResultSet_cm=$cm->getAll();
			while ($row =$ResultSet_cm->fetch(\PDO::FETCH_ASSOC)){
				$ds_cm[] = $row;
			}
			$ResultSet_sot=$sot->getAll();
			while ($row =$ResultSet_sot->fetch(\PDO::FETCH_ASSOC)){
				$ds_sot[] = $row;
			}
		#set_data_variables
			View::set("ds_cm",$ds_cm);
			View::set("ds_sot",$ds_sot);
			View::set("currentMainMenu", $currentMainMenu);
		#render
			View::render("addSO");       
		
	}

}
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
//MAIN###############################################
	switch(@$_POST['btn_command_h']){
		case "AddSO":
			CreateSO();
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
	function CreateSO(){
		$c=new Co();
		$nextPKContact=$c->getNextId("pkCustomerContact","customercontact");
		$c->setpkContact($nextPKContact);
		$c->setContactName($_POST["txt_contactName_h"]);
		$c->setContactEmail($_POST["txt_contactEmail_h"]);
		$c->setContactPhone($_POST["txt_contactPhone_h"]);
		$c->setContactMovil($_POST["txt_contactMovil_h"]);
		$c->setContactAddress($_POST["txt_contactAddress_h"]);
		$c->setContactLocation($_POST["txt_contactLocation_h"]);
		$c->setContactCounty($_POST["txt_contactCounty_h"]);
		$c->setContactProvince($_POST["txt_contactProvince_h"]);
		$c->setContactZipCode($_POST["txt_contactZipCode_h"]);
		$c->setContactObs($_POST["tta_contactObs_h"]);
		
		if($c->insertData("customercontact")){
			$so = new SO;
			$bosettings=BO::getBOSById(0);
			
			$pk = $so->getNextId("pkSOrder","sorder");
			$lastsoperbos=$so->getLastOSperBO(0);
			
			$lastsoperbo=$lastsoperbos->fetch(\PDO::FETCH_ASSOC);
			$lastsosubstrim=explode("-",$lastsoperbo["SONumber"]);
			$i=$lastsosubstrim[0];
			
			$row =$bosettings->fetch( \PDO::FETCH_ASSOC );
			$a=$row["folioStart"];
			$nextFolio= 1 + $i + $a ;
			$sonumber = "$nextFolio" . "-" . $row['fkCountry'] . "-" . $row["subCompanyName"] . "-" . $row["BOName"];
			$BO = $row["pkBranchOffice"];				
				
						
			$so->setpkSorder($pk);
			$so->setSONumber($sonumber);
			$so->setBranchOffice($BO);
			$so->setSODate(date("Y-m-d H-m-s"));
			$so->setfkCustomerContact("0");
			$so->setfkCollectMethod($_POST["slt_fkCollectMethod_h"]);
			$so->setfkOrderType("2");
			$so->setSODeviceCondition($_POST["tta_SODeviceCondition_h"]);
			$so->setSOTechDetail($_POST["tta_SOTechDetail_h"]);
			
			if ($so->insertData("sorder")){
				echo "<script language='JavaScript'> 
						alert(‘Se ha guardado la O de S.’); 
					</script>";
				//<script>function abrir() { open('pagina.html','','top=300,left=300,width=300,height=300') ; } </script> 
			}
		}
	}
	
?>
