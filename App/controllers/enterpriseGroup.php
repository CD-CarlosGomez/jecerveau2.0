<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date 5 de Marzo del 2016
// | @Version 1.0
// +-----------------------------------------------
namespace App\Controllers;
defined("APPPATH") OR die("Access denied");
use \Core\View;
use \App\Models\Users as User;
use \Core\Controller;
	
class EnterpriseGroup extends Controller{
//CONSTANTES#########################################
//ATRIBUTOS##########################################
private $_sesionUsuario;
private $_sesionpkiBUser;
//PROPIEDADES########################################
//MÉTODOS ABSTRACTOS#################################
//MÉTODOS PÚBLICOS###################################
	public function __construct(){
		session_start();
		$this->_sesionUsuario=$_SESSION["nombreUsuario"];
		$this->_sesionpkiBUser=$_SESSION['pkiBUser_p'];
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
		//$currentMainMenu=$currentUser->getMainMenu($this->_sesionpkiBUser);
		//View::set("currentMainMenu", $currentMainMenu);
		View::set("user", "Ing. Gómez");
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
	/**
     * [login]
	 *
     */
	public function login(){
		
	}
    /**
     * [test description]
     * @param  [type] $user [description]
     * @param  [type] $age  [description]
     * @return [type]       [description]
     */
    public function test($user, $age){
        View::set("user", $user);
        View::set("title", "Custom MVC");
        View::render("home");
    }
    public function admin($name){
        $users = Users::getAll();
        View::set("users", $users);
        View::set("title", "Custom MVC");
        View::render("admin");
    }
	//public function user($id = 1){
      //  $user = Users::getById($id);
       // print_r($user);
    //}
	public function saludo($nombre){
		$user=$nombre;
		View::set("user",$user);
		View::set("title","Custom MVC");
		View::render("home");
	}
	public function users(){//Esta clase no existe!
		$users=Users::getAll();
		print_r($users);
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
		case "Add":
			Create();
		break;
			case "Buscar":
			Read();
		break;
		case "Modificar":
			Update();
		break;
		case "Eliminar":
			Delete();
		break;
 	}
		
	function Create(){
		$u=new User;
		$u->setpkiBUser(6);
		$u->setUserName($_POST['txt_userName_h']);
		$u->setPWD($_POST['txt_password_h']);
		$u->setActive('1');
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
			echo "Error,no se puedeeliminar";
		View::render("EnterpriseGroup");
	}

