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
use \App\Models\ServiceOrders\SoTypes as SOT;
use \App\Models\ServiceOrders\SOAccessories as SOA;
use \App\Models\Contacts\Contacts as Co;
use \App\Models\CurrentUser as CU;
use \App\web\API\Mailer\PHPMailer;
use \App\web\API\fpdf\fpdfExtended as fpdfExt;

	if (strlen(session_id()) < 1){session_start();}
		$_SESSION["nombreUsuario"];
		$_SESSION['pkiBUser_p'];
		if(isset($_SESSION["accessories"])){
				$accessories=$_SESSION['accessories'];
		}		
		
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
		$arr_gsx_p= array(
			"serialNumber"=>"C02L71R9FFT1",
			"warrantyStatus"=>"Out Of Warranty (No Coverage)",
			"daysRemaining"=>"0",
			"estimatedPurchaseDate"=> "10/06/13" ,
			"purchaseCountry"=>"Mexico", 
			"registrationDate"=>"07/09/14",
			"imageURL"=> "", 
			"explodedViewURL"=>"",
			"manualURL"=>"", 
			"productDescription"=> "MacBook Pro (Retina, 15-inch,Early 2013)",
			"configDescription"=>"MBP 15.4 RETINA,2.7GHZ,16GB,512GB FLASH",
			"slaGroupDescription"=> "", 
			"acPlusFlag"=>"" ,
			"isLoaner"=> "N" ,
			"consumerLawInfo"=> array(
				"serviceType"=>"", 
				"popMandatory"=> "",
				"allowedPartType"=>"", 
				),
			"messages"=>"00007" ,
			"availableRepairStrategies"=> array(
				"availableRepairStrategy"=>"Return Before Replace" 
				)
			);
			
		#Objetos_e_Instancias;
			$cu=new CU();
			$cm=New CM();
			$sot=New SOT();
		#get_main_variables
			$url= Globales::$absoluteURL;
			$jsn_gsx_p=json_encode($arr_gsx_p);
		#set_main_variables
			View::set("url", $url);
			View::set("title", "iBrain>Nueva Orden");
			View::set("jsn_gsx_p",$jsn_gsx_p);
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
	

	public function ViewSO($pkso){
				$arr_gsx_p= array(
					"serialNumber"=>"C02L71R9FFT1",
					"warrantyStatus"=>"Out Of Warranty (No Coverage)",
					"daysRemaining"=>"0",
					"estimatedPurchaseDate"=> "10/06/13" ,
					"purchaseCountry"=>"Mexico", 
					"registrationDate"=>"07/09/14",
					"imageURL"=> "", 
					"explodedViewURL"=>"",
					"manualURL"=>"", 
					"productDescription"=> "MacBook Pro (Retina, 15-inch,Early 2013)",
					"configDescription"=>"MBP 15.4 RETINA,2.7GHZ,16GB,512GB FLASH",
					"slaGroupDescription"=> "", 
					"acPlusFlag"=>"" ,
					"isLoaner"=> "N" ,
					"consumerLawInfo"=> array(
						"serviceType"=>"", 
						"popMandatory"=> "",
						"allowedPartType"=>"", 
						),
					"messages"=>"00007" ,
					"availableRepairStrategies"=> array(
						"availableRepairStrategy"=>"Return Before Replace" 
						)
					);
					
				#Objetos_e_Instancias;
					$cu=new CU();
					$cm=New CM();
					$sot=New SOT();
				#get_main_variables
					$url= Globales::$absoluteURL;
					$jsn_gsx_p=json_encode($arr_gsx_p);
				#set_main_variables
					View::set("url", $url);
					View::set("title", "iBrain>Orden de servicio");
					View::set("jsn_gsx_p",$jsn_gsx_p);
				#get_data_variables
					$currentMainMenu=$cu->getMainMenu2($this->_sesionpkiBUser);
					$ResultSet_cm=$cm->getAll();
					while ($row =$ResultSet_cm->fetch(\PDO::FETCH_ASSOC)){
						$ds_cm[] = $row;
					}
					$ResultSet_so=SO::getoxcc($pkso);
					while ($row =$ResultSet_so->fetch(\PDO::FETCH_ASSOC)){
						$ds_so[] = $row;
					}
				#set_data_variables
					View::set("ds_cm",$ds_cm);
					View::set("ds_so",$ds_so);
					View::set("currentMainMenu", $currentMainMenu);
				#render
					View::render("ViewSO");       
		
	}
	public function AddAccessory(){
		#get_main_variables
				$url= Globales::$absoluteURL;
		#set_main_variables
				View::set("url", $url);
		#render
				View::render("AddAccessory");  
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
				foreach($accessories as $k=>$v){
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
				
				/*echo "<script language='JavaScript'> 
						 window.open(\"http://www.w3schools.com\", \"_blank\", \"toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400\");
					</script>";*/
				//<script>function abrir() { open('pagina.html','','top=300,left=300,width=300,height=300') ; } </script> 
				/*$fpdf=new fpdfExt();
				$fpdf->SetFont('Arial','',12);
				$fpdf->AddPage();
				$fpdf->WriteHTML($bodyMessagePDF);
				$fpdf->Output();*/
			
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
			$mail->setFrom($micorreo,"Carlos Gómez");
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
?>
