<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date 17/03/2016
// | @Version 1.0
// +----------------------------------------------
// +---------------------------Comentarios de versión
#El logout está siendo invocado desde un archivo externo
#sería óptimo llamar la función logout de este mismo archivo
namespace App\Models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\Config\Globales as Globales;

class CurrentUser {
//REQUEST############################################
//CONSTANTES#########################################
//ATRIBUTOS##########################################
	public $pMainMenu;
	public static $ppkiBUser_p;
	public static $currenBO;
	private static $_instancia;
	
//PROPIEDADES########################################
	public function setppkiBUser_p($value){
		$this->ppkiBUser_p=$value;
	}
	public function &getppkIBUser_p(){
		return $this->ppkiBUser_p;
	}
	public static function _set_($atrib, $value){
        if (property_exists(__CLASS__,$atrib)){
			$this->$atrib=$value;
		}
        else{
			echo $atrib . "No existe en la clase" . __CLASS__;
		}
		
    }
	public static function _get_($atrib){
        if(property_exists(__CLASS__,$atrib)){
			return $this->$atrib;
		}
		else{
			echo $atrib . "No existe en la clase" . __CLASS__;
		}
    }
	public function getMainMenu2($pkiBUser){
		$this->pMainMenu="";
		$PDOcnn = Database::instance();
		$sql = 
		"
		SELECT 
				pkBranchOffice, 
				pkiBuser,
				pkiBFunctionGroup,
				ibFunctionGroupName, 
				iBFunctionGroupLink 
		FROM branchoffice bo
			inner join branchoffice_has_ibuserprofile bohup
				on bo.pkBranchOffice=bohup.branchoffice_pkBranchOffice
			inner join ibuser u 
				on bohup.ibuser_pkiBUser=u.pkiBUser
			inner join ibuserprofile up 
				on bohup.ibuserprofile_pkiBUserProfile=up.pkiBUserProfile
			inner join ibuserprofile_has_ibfunctiondetail uphfd 
				on up.pkiBUserProfile=uphfd.iBUserProfile_pkiBUserProfile 
			inner join ibfunctiondetail fd 
				on uphfd.ibFunctionDetail_pkibFunctionDetail=fd.pkibFunctionDetail 
			inner join ibfunction f 
				on fd.fkiBFunction=f.pkiBFunction 
			inner join ibfunctiongroup fg 
				on f.fkiBFunctionGroup=fg.pkiBFunctionGroup 
		WHERE pkiBUser='$pkiBUser' 
			AND u.Active='1'
			AND fg.Active='1'
		GROUP BY ibFunctionGroupName
		";
		foreach ($PDOcnn->query($sql) as $firstLevels) {
				$this->pMainMenu .="<li class=\"dropdown\">";
				$this->pMainMenu .="<a aria-expanded=\"false\" role=\"button\" href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">";
				$this->pMainMenu .="".	$firstLevels['ibFunctionGroupName']."<span class=\"caret\"></span>";
				$this->pMainMenu .="</a>";
				$this->pMainMenu .="";
				$this->pMainMenu .="	<ul class='dropdown-menu multi-level' role=\"menu\" aria-labelledby=\"dropdownMenu\">";
				
				$PDOcnn = Database::instance();
				$PDOQuery = 
				"
				SELECT 	
					pkBranchOffice, 
					pkiBuser,
					pkiBFunction,
					iBFunctionName,
					iBFunctionLink
				FROM branchoffice bo
					inner join branchoffice_has_ibuserprofile bohup
						on bo.pkBranchOffice=bohup.branchoffice_pkBranchOffice
					inner join ibuserprofile up 
						on bohup.ibuserprofile_pkiBUserProfile=up.pkiBUserProfile
					inner join ibuser u 
						on bohup.ibuser_pkiBUser=u.pkiBUser
					inner join ibuserprofile_has_ibfunctiondetail uphfd 
						on up.pkiBUserProfile=uphfd.iBUserProfile_pkiBUserProfile 
					inner join ibfunctiondetail fd 
						on uphfd.ibFunctionDetail_pkibFunctionDetail=fd.pkibFunctionDetail 
					inner join ibfunction f 
						on fd.fkiBFunction=f.pkiBFunction 
					inner join ibfunctiongroup fg 
						on f.fkiBFunctionGroup=fg.pkiBFunctionGroup 
				WHERE pkiBUser= '$pkiBUser'
					AND u.Active='1'
					AND f.Active='1'
					AND fg.pkiBFunctionGroup=".$firstLevels['pkiBFunctionGroup']."
				GROUP BY f.ibfunctionName;
				";
			foreach($PDOcnn->query($PDOQuery) as $secondLevel){
					$directoryPath= Globales::$absoluteURL;
					$PDOcnn = Database::instance();
					$this->pMainMenu .=		"<li class=\"dropdown-submenu\">";
					$this->pMainMenu .="		<a tabindex=\"-1\" href='$directoryPath".$secondLevel['iBFunctionLink']."'>".$secondLevel['iBFunctionName']."</a>";
					$this->pMainMenu .="		<ul class='dropdown-menu'>";
					
					$PDOQuery = 
					"
					SELECT 	
							pkBranchOffice, 
							pkiBuser,
							iBFunctionDetailName,
							iBFunctionDetailLink
					FROM branchoffice bo 
						inner join branchoffice_has_ibuserprofile bohup
							on bo.pkBranchOffice=bohup.branchoffice_pkBranchOffice
						inner join ibuserprofile up 
							on bohup.ibuserprofile_pkiBUserProfile=up.pkiBUserProfile
						inner join ibuser u 
							on bohup.ibuser_pkiBUser=u.pkiBUser
						inner join ibuserprofile_has_ibfunctiondetail uphfd 
							on up.pkiBUserProfile=uphfd.iBUserProfile_pkiBUserProfile 
						inner join ibfunctiondetail fd 
							on uphfd.ibFunctionDetail_pkibFunctionDetail=fd.pkibFunctionDetail 
						inner join ibfunction f 
							on fd.fkiBFunction=f.pkiBFunction 
						inner join ibfunctiongroup fg 
							on f.fkiBFunctionGroup=fg.pkiBFunctionGroup 
					WHERE pkiBUser='$pkiBUser'
						AND u.Active='1'
						AND fd.Active='1'
						AND f.pkiBFunction=".$secondLevel['pkiBFunction']."
					GROUP BY fd.ibfunctionDetailName	
						;
					";
				foreach($PDOcnn->query($PDOQuery) as $thirdLevels){
					$this->pMainMenu .=			"<li>";
					$this->pMainMenu .=				"<a href='$directoryPath"."private/".$thirdLevels['iBFunctionDetailLink'] ."'>".$thirdLevels['iBFunctionDetailName']."</a>";
					$this->pMainMenu .=			"</li>";
				}
					$this->pMainMenu .="		</ul>";	
					$this->pMainMenu .="</li>";
			}
				$this->pMainMenu .=			"</ul>";
				$this->pMainMenu .="</li>";
		}
		return $this->pMainMenu;
	}
//MÉTODOS ABSTRACTOS#################################
//CONSTRUCTORES Y DESTRUCTORES#######################
	public function __construct(){
	}
	public static function getInstance(){
		if(!isset(self::$_instancia)){
			$class=__CLASS__;
			self::$_instancia= new $class;
		}
		return self::$_instancia;
	}
//MÉTODOS MÁGICOS####################################
	/**
     * [__clone Evita que el objeto se pueda clonar]
     * @return [type] [message]
     */
    public function __clone(){
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }
//MÉTODOS PÚBLICOS###################################
	public function Logout(){
		session_start();
		session_destroy();
		header("Location:../../private/home");
	}
	public function getCurrentRealName($pkiBUser){
		$PDOcnn = Database::instance();
        $PDOQuery = "SELECT realname FROM ibuser Where pkiBUser=$pkiBUser;";
		foreach ($PDOcnn->query($PDOQuery) as $resultSet) {
			$realname=$resultSet['realname'];
		}
		return $realname;
	}
	public function getCurrentBO($pkiBUser){
		try{
			$PDOcnn = Database::instance();
			$PDOQuery = 
			"
			SELECT 
				pkBranchOffice, 
				BOName,
				Name
			FROM ibuser u
				LEFT JOIN branchoffice_has_ibuserprofile bohup 
					ON u.pkiBUser=bohup.ibuser_pkiBUser
				LEFT JOIN branchoffice bo
					ON bohup.branchoffice_pkBranchOffice=bo.pkBranchOffice
				LEFT JOIN ibuserprofile up
					ON bohup.ibuserprofile_pkiBUserProfile=up.pkiBUserProfile
			WHERE u.pkiBUser=$pkiBUser
				AND bo.Active=1;
			";
			
			foreach ($PDOcnn->query($PDOQuery) as $resultSet) {
				$output  ="<li>";
				$output .=	"<a href='#'>";
				$output .= 		$resultSet['BOName'];
				$output .= 	"</a>";
				$output .="</li>";
				
			}
			return $output;
			
		}
		catch(\PDOException $e){
            print "Error!: " . $e->getMessage();
        }
		
			
	}
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
//MAIN###############################################
}
