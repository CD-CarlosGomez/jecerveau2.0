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
use \App\Models\BranchOffices as BO;
use \App\Models\ServiceOrders\ServiceOrders as SO;
use \App\Models\ServiceOrders\CollectMethod as CM;
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
		//self::showSO();
		View::set("foo",true);
		View::render("z_testPost");
	}
	public function showSO(){
		#get_main_variables
		$url= Globales::$absoluteURL;
		#set_main_variables
		View::set("url", $url);
		View::set("title", "Ordenes de servicio");
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
		$cm=New CM();
		#get_main_variables
		$url= Globales::$absoluteURL;
		#set_main_variables
		View::set("url", $url);
		View::set("title", "iBrain>Nueva Orden");
		#get_data_variables
		$currentMainMenu=CU::getMainMenu2($this->_sesionpkiBUser);
		$ResultSet=$cm->getAll();
		while ($row =$ResultSet->fetch( \PDO::FETCH_ASSOC)){
			$dataset[] = $row;
		}
		#set_data_variables
		View::set("dataset",$dataset);
		View::set("currentMainMenu", $currentMainMenu);
		#render
		View::render("addSO");
		
		
		
		

        
		
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
		
	/*switch(@$_POST['hdn_toDo_h']){
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
	$o=new SO;
	$a=$o->getNextId("pkibSOrder","ibsorder");
	$b=$_POST["txt_ibSOrderName_h"];
	$c=$_POST["tta_ibSOrderDesc_h"];
	$d=$_POST["tta_ibSOrderGSX_h"];
	$e=$_POST["tta_ibSOrderObs_h"];
	$o->insertIbSO189A1($a,$b,$c,$d,$e);
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
	}*/
?>
