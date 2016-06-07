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
use \App\Models\EnterpriseGroup\BranchOffices 	as BO;
use \App\Models\ServiceOrders\ServiceOrders 	as SO;
use \App\Models\ServiceOrders\CollectMethods 	as CM;
use \App\Models\ServiceOrders\SoTypes 			as SOT;
use \App\Models\ServiceOrders\SOAccessories 	as SOA;
use \App\Models\ServiceOrders\SOAttachment		as SOAt;
use \App\Models\ServiceOrders\SODetails 		as SOD;
use \App\Models\ServiceOrders\SOLogs			as SOL;
use \App\Models\Contacts\Contacts 				as Co;
use \App\Models\CurrentUser 					as CU;
use \App\Models\Users\Users						as Us;
use \App\Web\Lib\Multiload						as Ml;
use \App\web\API\Mailer\PHPMailer;
use \App\web\API\fpdf\fpdfExtended as fpdfExt;
use \App\data\Crud 								as Crud;

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
		#Objetos_e_Instancias
		$cu=CU::getInstance();
		#get_main_variables
		$url= Globales::$absoluteURL;
		#set_main_variables
		View::set("url", $url);
		View::set("title", "Listado de &oacute;rdenes");
		#get_data_variables
		$currentMainMenu=$cu->getMainMenu2($this->_sesionpkiBUser);
		$dsSO=SO::getKanbanSO();
		while ($row =$dsSO->fetch( \PDO::FETCH_BOTH )){
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
	public function ViewSO($pkso,$tabActive=1){
		#Objetos_e_Instancias;
			$cu=new CU();
			$cm=New CM();
			$sot=New SOT();
		#get_main_variables
			$url= Globales::$absoluteURL;
			$currentSO=$pkso;
		#set_main_variables
			View::set("url", $url);
			View::set("title", "iBrain>Orden de servicio");
			View::set("currentSO",$currentSO);
			View::set("tabActive",$tabActive);
		#get_data_variables
		//Obtiene el menú del usuario actual
			$currentMainMenu=$cu->getMainMenu2($this->_sesionpkiBUser);
		//Obtiene registros del catálogo métodos de recolección...
			$ResultSet_cm=$cm->getAll();
			while ($row =$ResultSet_cm->fetch(\PDO::FETCH_ASSOC)){ 	$ds_cm[] = $row; }
		//Obtiene el producto cartesiano de la orden por customercontact
			$ResultSet_so=SO::getoxcc($pkso);
			while ($row =$ResultSet_so->fetch(\PDO::FETCH_ASSOC)){ 	$ds_so[] = $row;}
		//Obtiene todos los accesorios incluidos en la orden especificada en el parámetro de la función 
			$ResultSet_soa=SOA::getBySO($pkso);
			while($row=$ResultSet_soa->fetch(\PDO::FETCH_ASSOC)){ $ds_soa[]=$row; }
		//Obtiene el diagnóstico técnico de la SO, el parámetro 3 = Diagnosticada
			$ResultSet_sod=SOD::getDiagnoseBySO($pkso,3);
			while($row=$ResultSet_sod->fetch(\PDO::FETCH_ASSOC)){ $ds_sod[]=$row; }
		//Obtiene a todos los usuarios para hacer un catálogo de ellos y así poder asignarles una orden
			$ds_Us=Us::getAll();
			while($row=$ds_Us->fetch(\PDO::FETCH_ASSOC)){ $dt_Us[]=$row;}
		//Obtiene el pk del estatus actual de la orden 
			foreach($ds_so as $dr_so){ $currentST=$dr_so["fkOSstatus"];}
		//Obtiene el pk del usuario actual de la orden 
			foreach($ds_so as $dr_so){ $currentAssignTo=$dr_so["fkiBUser"];}
		//Obtiene el nombre del estatus para la cabecera de la SO.
			$resultSet_sosbypk=Crud::getById('sostatus','pkOSstatus',$currentST);
		//Obtiene el nombre del usuario siempre y cuando la SO haya tenido por lo menos una asignación, de lo contrario la variable que se mandará por default es un string
			if($currentAssignTo<>null){
				$resultSet_userbypk=Crud::getById('ibuser','pkiBUser',$currentAssignTo);
			}
			else{
				$resultSet_userbypk = "No asignada.";
			}
			$ResultSet_SOHistory=SO::getOrderHistory($pkso);
		//Obtener las partes ligadas a la orden
			$SQLQuery="
				SELECT * 
					FROM product p 
						LEFT JOIN product_sold_sorder pss
							ON p.pkProduct=pss.fkproduct
					WHERE pss.fkSorder=$pkso
			";
			$RS_products = Crud::getByQuery($SQLQuery);
			while ($row =$RS_products->fetch(\PDO::FETCH_ASSOC)){ 	$ds_products[] = $row; }
			
		//Variables para el siguiente status
			switch($currentST){
				case 0:
					$nextST="Asignada";
					$nextSTLabel="Esperando a ser $nextST";
					$nextPKOSstatus=2;
					break;
				case 1:
					$nextST="Asignada";
					$nextSTLabel="Esperando a ser $nextST";
					$nextPKOSstatus=2;
						break;
				case 2:
					$nextST="Diagnosticada";
					$nextSTLabel="Esperando a ser $nextST";
					$nextPKOSstatus=3;
						break;
				case 3:
					$nextST="Diagn&oacute;stico autorizado";
					$nextSTLabel="Esperando a ser $nextST";
					$nextPKOSstatus=4;
						break;
				case 4:
					$nextST="Notificada";
					$nextSTLabel="Esperando a ser $nextST";
					$nextPKOSstatus=5;
						break;
				case 5:
					$nextST="Autorizada";
					$nextSTLabel="Esperando a ser $nextST";
					$nextPKOSstatus=6;
						break;
				case 6:
					$nextST="Reparada";
					$nextSTLabel="Esperando a ser $nextST";
					$nextPKOSstatus=7;
						break;
				case 7:
					$nextST="Entregada";
					$nextSTLabel="Esperando a ser $nextST";
					$nextPKOSstatus=8;
						break;
				case 8:
					$nextST="Saldada";
					$nextSTLabel="Esperando a ser $nextST";
					$nextPKOSstatus=9;
						break;
				case 9:
					$nextST="Cerrada";
					$nextSTLabel="Esperando a ser $nextST";
					$nextPKOSstatus=10;
						break;
			}
		//Traemos los modificationCodes
			$RS_modificationCodes = Crud::getAll('modificationcode');
			
		//Traemos los symptomsAreas
			$RS_symptomAreas = Crud::getAll('symptomarea');
			
		#set_data_variables
			View::set("ds_cm"			,	@$ds_cm);
			View::set("ds_so"			,	@$ds_so);
			View::set("ds_soa"			,	@$ds_soa);
			View::set("ds_sod"			,	@$ds_sod);
			View::set("dt_Us"			,	@$dt_Us);
			View::set("currentMainMenu"	,	@$currentMainMenu);
			View::set("currentST"		,	@$resultSet_sosbypk);
			View::set("currentAssignTo"	,	$resultSet_userbypk);
			View::set("SOHistory"		,	$ResultSet_SOHistory);
			View::set("nextST"			,	$nextST);
			View::set("nextSTLabel"		,	$nextSTLabel);
			View::set("nextPKOSstatus"	,	$nextPKOSstatus);
			View::set("ds_modificationCodes", $RS_modificationCodes);
			View::set("ds_symptomAreas" , 	$RS_symptomAreas);
			View::set("ds_products"		,	@$ds_products);
		#render
			View::render("viewSO");       
		}
	public function AddAccessory(){
		#get_main_variables
				$url= Globales::$absoluteURL;
		#set_main_variables
				View::set("url", $url);
		#render
				View::render("AddAccessory");  
	}
	public function autocomplete(){
		#get_main_variables
			$url= Globales::$absoluteURL;
		#set_main_variables
				View::set("url", $url);
		#render
				View::render("autocompleteAddSO");
	}
	public function uploadAttachment(){
		#get_main_variables
			$url= Globales::$absoluteURL;
		#set_main_variables
				View::set("url", $url);
		#render
				View::render("uploadFile");
	}
	public function showAttachment(){
		#get_main_variables
			$url= Globales::$absoluteURL;
		#set_main_variables
				View::set("url", $url);
		#render
				View::render("showFile");
	}
	public function deleteAttachment(){
		#get_main_variables
			$url= Globales::$absoluteURL;
		#set_main_variables
				View::set("url", $url);
		#render
				View::render("deleteFile");
	}
	public function fillSltSymptomCode(){
		#get_main_variables
			$url= Globales::$absoluteURL;
		#set_main_variables
				View::set("url", $url);
		#render
				View::render("slt_pkSymptomCode_h");
	}
	public function ctrlSaveSpare(){
		#get_main_variables
			$url= Globales::$absoluteURL;
		#set_main_variables
				View::set("url", $url);
		#render
				View::render("saveSpare");
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
		case "CMDassign":
			AssignOrder();
		break;
		case "CMDDiagnose":
			Diagnose();
		break;
		case "CMDupdateStatus":
			UpdateStatus();
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
			$so = new SO();
			$bosettings=BO::getBOSById(0);
			
			$pkSOrder = $so->getNextId("pkSOrder","sorder");
			$lastsoperbos=$so->getLastOSperBO(0);
			
			$lastsoperbo=$lastsoperbos->fetch(\PDO::FETCH_ASSOC);
			$lastsosubstrim=explode("-",$lastsoperbo["SONumber"]);
					
			$row =$bosettings->fetch( \PDO::FETCH_ASSOC );
			$a=$row["folioStart"];
			$i=$lastsosubstrim[0]-$a;
			
			$nextFolio= 1 + $i + $a ;
			$sonumber = "$nextFolio" . "-" . $row['fkCountry'] . "-" . $row["subCompanyName"] . "-" . $row["BOName"];
			$BO = $row["pkBranchOffice"];				
				
						
			$so->setpkSorder($pkSOrder);
			$so->setSONumber($sonumber);
			$so->setBranchOffice($BO);
			$so->setSODate(date("Y-m-d H-m-s"));
			$so->setfkCustomerContact($nextPKContact);
			$so->setfkCollectMethod($_POST["slt_fkCollectMethod_h"]);
			$so->setfkOrderType("2");
			$so->setSODeviceCondition($_POST["tta_SODeviceCondition_h"]);
			$so->setSOTechDetail($_POST["tta_SOTechDetail_h"]);
			
			if ($so->insertData("sorder")){
				if(isset($_SESSION["accessories"])){
						//var_dump($_SESSION["accessories"]);
					foreach($_SESSION["accessories"] as $k=>$v){
						$soa=new SOA();
						$nextId=$soa->getNextId("pkSOAccessories","soaccessory");
						$soa->setPKSOAccessories($nextId);
						$soa->setFKSorder($so->getpkSorder());
						$soa->setAccessoryDesc($v["desc"]);
						$soa->setAccessoryBrand($v["brand"]);
						$soa->setAccessoryModel($v["model"]);
						$soa->setAccessoryPartNumber($v["PN"]);
						$soa->setAccessorySerialNumber($v["SN"]);
						$soa->insertData("soaccessory");
						}
						unset($_SESSION['accessories']);
				}
				
				$device['pkDevice'] = Crud::getNextId('pkDevice','device');
				$device['sorder_pkSorder'] = $pkSOrder;
				$device['deviceDesc'] =  $_POST['txt_gsxModel_h'];
				$device['deviceBrand'] = 'Apple';
				$device['deviceModel'] = 'SM';
				$device['deviceSerialNumber'] = $_POST['txt_gsxSerialNumber_h'];
				$device['devicePartNumber'] = 'SN'; 
				$device['deviceFeatures'] = $_POST['txt_gsxConfigDesc_h'];
				$device['deviceSNReplacement'] = '';
				
				if ($PDOcmdDeviceC=Crud::insert($device,'device')){
					$gsx['pkgsx'] = Crud::getNextId('pkgsx','gsx');
					$gsx['fkDevice'] = $device['pkDevice'];
					$gsx['warrantyStatus'] = $_POST['txt_gsxWarrantyST_h'];
					$gsx['purchaseDate'] = $_POST['txt_gsxPurchaseDate_h'];
					$gsx['purchasePlace'] = $_POST['txt_gsxPurchaseCountry_h'];
					$gsx['registrationDate'] = '';
					$gsx['contractStartDate'] = $_POST['txt_contractStartDate_h'];
					$gsx['contractEndDate'] = $_POST['txt_contractEndDate_h'];
					
					$PDOcmdGsxC=Crud::insert($gsx,'gsx');
				}
				
				
				$sod=new SOD();
				$nextSODpk=$sod->getNextId('pkSODetail','sodetail');
				$sod->setPKSODetail($nextSODpk);
				$sod->setFKSorder($pkSOrder);
				$sod->setOsstatus(0);
				$sod->setSODetailDesc("Entrada");
				$sod->setSODetailObs("");
				$sod->setFKiBUser(null);
				
				if($sod->insertData("sodetail")){
						$sol=new SOL();
						$nextSOLpk=$sod->getNextId('pkSOlog','solog');
						$sol->setPKSOLog($nextSOLpk);
						$sol->setFKSODetail($nextSODpk);
						//$sol->setLogDate(date("Y-m-d H-m-s"));
						$sol-> setFKiBUser($_SESSION['pkiBUser_p']);
						$sol->insertData('solog');
				}
				
				
				/*echo "<script language='JavaScript'> 
						 window.open(\"http://www.w3schools.com\", \"_blank\", \"toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400\");
					</script>";*/
				//<script>function abrir() { open('pagina.html','','top=300,left=300,width=300,height=300') ; } </script> 
				/*$fpdf=new fpdfExt();
				$fpdf->SetFont('Arial','',12);
				$fpdf->AddPage();
				$fpdf->WriteHTML($bodyMessagePDF);
				$fpdf->Output();*/
			
			$rs_accessories=SOA::getBySO($pkSOrder);
			while($row=$rs_accessories->fetch( \PDO::FETCH_ASSOC )){
				$dr_accessories[]=$row;
			}
			
			
			include_once "../App/views/htmlTemplates/ServiceOrderConfirmPDF.php";
			include_once "../App/views/htmlTemplates/ServiceOrderConfirmMail.php";
			
			$micorreo="cgomez@consultoriadual.com";
			$nombreFrom="iBrain info";
			$nombreadmin="";
			$asunto="Orden de servicio";
			$destinatario=$c->getContactEmail();
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
			$mail->setFrom($micorreo,"iBrain info");
			//$mail->AddReplyTo($micorreo,"Carlos Gómez 2");
			$mail->AddAddress ("$destinatario","cgomez@consultoriadual.com");
			$mail->Subject = "$asunto";
			$mail->MsgHTML($bodyMessageMail);
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
			header("Location:" . $url= Globales::$absoluteURL . 'private/ServiceOrder/ViewSO/' . $pkSOrder );
			}

		}	
		else{
			echo "Error,no se puede enviar el correo electrónico ";
		}
	}
    function AssignOrder(){
		$sod=new SOD();
			$nextSODpk=$sod->getNextId('pkSODetail','sodetail');
			$sod->setPKSODetail($nextSODpk);
			$sod->setFKSorder($_POST['hdn_currentSO_h']);
			$sod->setOsstatus(2);
			$sod->setSODetailDesc("Órden asignada");
			$sod->setFKiBUser($_POST['slt_pkEmployee_h']);
				
			if($sod->insertData("sodetail")){
					$sol=new SOL();
					$nextSOLpk=$sod->getNextId('pkSOlog','solog');
					$sol->setPKSOLog($nextSOLpk);
					$sol->setFKSODetail($nextSODpk);
					//$sol->setLogDate(date("Y-m-d H-m-s"));
					$sol-> setFKiBUser($_SESSION['pkiBUser_p']);
					$sol->insertData('solog');
					header("Location:" . $url= Globales::$absoluteURL . 'private/ServiceOrder/ViewSO/' . $_POST['hdn_currentSO_h'] . '/2');
			}
	}
	function Diagnose(){
		$currentSO=$_POST['hdn_currentSO_h'];
		
		$sod=new SOD();
		$nextSODpk=$sod->getNextId('pkSODetail','sodetail');
		$sod->setPKSODetail($nextSODpk);
		$sod->setFKSorder($currentSO);
		$sod->setOsstatus(3);
		$sod->setSODetailDesc($_POST["tta_SODDesc_h"]);
		if($_POST["tta_SODObs_h"]){
			$sod->setSODetailObs($_POST["tta_SODObs_h"]);
		}
		else{
			$sod->setSODetailObs("");
		}
		$sod->setFKiBUser($_SESSION['pkiBUser_p']);
		
		if($sod->insertData("sodetail")){
				$sol=new SOL();
				$nextSOLpk=$sod->getNextId('pkSOlog','solog');
				$sol->setPKSOLog($nextSOLpk);
				$sol->setFKSODetail($nextSODpk);
				$sol-> setFKiBUser($_SESSION['pkiBUser_p']);
				$sol->insertData('solog');
			
			$files=$_FILES["ofd_SOAttachment_h"]["name"];
			$upload = new Ml();
			$isUpload = $upload->upFiles('ofd_SOAttachment_h','Archivo_',$currentSO,$files);
			
			if($_POST["tta_SODObs_h"]){
			$filesDI=$_FILES["ofd_SOAttachDanoI_h"]["name"];
			$upload2=new Ml();
			$isUpload = $upload2->upFiles('ofd_SOAttachDanoI_h','DanoIncidental_',$currentSO,$files);
			}
			header("Location:" . $url= Globales::$absoluteURL . 'private/ServiceOrder/ViewSO/' . $_POST['hdn_currentSO_h'] . '/2');
		}
	}
	function UpdateStatus(){
		$sod=new SOD();
			$nextSODpk=$sod->getNextId('pkSODetail','sodetail');
			$sod->setPKSODetail($nextSODpk);
			$sod->setFKSorder($_POST['hdn_currentSO_h']);
			$sod->setOsstatus($_POST['hdn_nextPkSt_h']);
			$sod->setSODetailDesc($_POST['tta_SODDesc_h']);
			$sod->setFKiBUser($_SESSION['pkiBUser_p']);
				
			if($sod->insertData("sodetail")){
					$sol=new SOL();
					$nextSOLpk=$sod->getNextId('pkSOlog','solog');
					$sol->setPKSOLog($nextSOLpk);
					$sol->setFKSODetail($nextSODpk);
					//$sol->setLogDate(date("Y-m-d H-m-s"));
					$sol-> setFKiBUser($_SESSION['pkiBUser_p']);
					$sol->insertData('solog');
					header("Location:" . $url= Globales::$absoluteURL . 'private/ServiceOrder/ViewSO/' . $_POST['hdn_currentSO_h'] . '/3');
			}
	}
?>
