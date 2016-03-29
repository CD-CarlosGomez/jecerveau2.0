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
use \App\Models\ServiceOrders as SO;


	
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
		
	}
	/**
     * [index]
    */
    public function index(){
	//$layout=new WithSiteMap(new WithTemplate(new WithMenu(new LayoutCSS())));
	//$layout= Layouts::render();
		self::showSO();
	}
	public function showSO(){
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
		$dsSO=SO::getSelectIbSO189A1();
		while ($row =$dsSO->fetch( \PDO::FETCH_ASSOC )){
			$dt_SO[] = $row;
		}
		
		$currentMainMenu=$this->_sesionMenu;
		$url= Globales::$absoluteURL;
		View::set("dt_SO",$dt_SO);
		View::set("url", $url);
		View::set("currentMainMenu", $currentMainMenu);
        View::set("title", "Grupo Empresarial");
        View::render("showSO");
	}
	public function addSO(){
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
		$dsSO=SO::getAll();
		while ($row =$dsSO->fetch( \PDO::FETCH_ASSOC )){
			$dt_SO[] = $row;
		}
		
		$currentMainMenu=$this->_sesionMenu;
		$url= Globales::$absoluteURL;
		View::set("dt_SO",$dt_SO);
		View::set("url", $url);
		View::set("currentMainMenu", $currentMainMenu);
        View::set("title", "Grupo Empresarial");
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
		
	switch(@$_POST['hdn_toDo_h']){
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
	}
?>
