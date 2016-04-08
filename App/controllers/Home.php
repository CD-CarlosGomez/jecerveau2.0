<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date 5 de Marzo del 2016
// | @Version 1.0
// +-----------------------------------------------

namespace App\Controllers;
defined("APPPATH") OR die("Access denied");
use \Core\View;
use \Core\Database;
use \App\Models\CurrentUser as CU;
use \App\Config\Globales as Globales;
use \Core\Controller;
	
class Home extends Controller{
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
		#Objetos e Instancias
		$currentUser=CU::getInstance();
		#get main variables
		$directoryPath= Globales::$absoluteURL;
		#set main variables
		View::set("url",$directoryPath);
		View::set("title","Home");
		#get data variables
		$currentMainMenu=	$currentUser->getMainMenu2($this->_sesionpkiBUser);
		$realname=			$currentUser->getCurrentRealName($this->_sesionpkiBUser);
		$currentBO=			$currentUser->getCurrentBO($this->_sesionpkiBUser);
		
		#set data variables
		View::set("currentMainMenu", $currentMainMenu);
		View::set("pkiBUser", $this->_sesionpkiBUser);
		View::set("realname",$realname);
		View::set("currentBO",$currentBO);
		#Renderizar
		View::render("home");
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
	public function user($id = 1){
        $user = Users::getById($id);
        print_r($user);
    }
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
	
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
}
//MAIN###############################################



