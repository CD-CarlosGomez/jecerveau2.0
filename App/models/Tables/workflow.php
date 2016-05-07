<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date Miércoles 5 de diciembre de 2012
// | @Version 1.0
// +-----------------------------------------------
// +---------------------------Comentarios de versión
namespace App\Models\Tables;
defined("APPPATH") OR die("Access denied");

use \App\Data\DataPresentation as DP;
//use \App\Data\Fields as Fi;

class WorkFlow extends DP{
/*******************************************************************************
*                                                                              *
*                           ##########REQUEST##########                        *
*                                                                              *
*******************************************************************************/
/*******************************************************************************
*                                                                              *
*                        ##########CONSTANTES##########                        *
*                                                                              *
*******************************************************************************/
/*******************************************************************************
*                                                                              *
*                         ##########ATRIBUTOS##########                        *
*                                                                              *
*******************************************************************************/
	//private static $_pkiBUserProfile;
	//private static $_profileName;
	private static $_pkWorkFlow;
	private static $_toBeCollected;
	private static $_toBeAssigned;
	private static $_toBeDiagnosed;
	private static $_diagnosisToBeAuthorized;
	private static $_toNotifyTheClient;
	private static $_toBeAuthorizedByClient;
	private static $_inRepairProcess;
	private static $_repaired;
	private static $_toDelivery;
	private static $_toBeCharged;
	private static $_deliveredToClient;
	private static $_cancelled;
/*******************************************************************************
*                                                                              *
*                       ##########PROPIEDADES##########                        *
*                                                                              *
*******************************************************************************/
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
	//public static function setpkiBUserProfile($valor){self::$_pkiBUserProfile=$valor;}
	//public static function getpkiBUserProfile() {return self::$_pkiBUserProfile;}
	//public static function setProfileName($valor){self::$_profileName=$valor;}
	//public static function getProfileName() {return self::$_profileName;}
	public static function setToBeCollected($valor){self::$_toBeCollected=$valor;}
	public static function getToBeCollected(){return self::$_toBeCollected;}
	public static function setToBeAssigned($valor){self::$_toBeAssigned=$valor;}
	public static function getToBeAssigned()	{return self::$_toBeAssigned;}
	public static function setToBeDiagnosed($valor){self::$_toBeDiagnosed=$valor;}
	public static function getToBeDiagnosed()	{return self::$_toBeDiagnosed;}
	public static function setDiagnosisToBeAuthorized($valor){self::$_diagnosisToBeAuthorized=$valor;}
	public static function getDiagnosisToBeAuthorized()	{return self::$_diagnosisToBeAuthorized;}
	public static function setToNotifyTheClient($valor){self::$_toNotifyTheClient=$valor;}
	public static function getToNotifyTheClient()	{return self::$_toNotifyTheClient;}
	public static function setToBeAuthorizedByClient($valor){self::$_toBeAuthorizedByClient=$valor;}
	public static function getToBeAuthorizedByClient(){return self::$_toBeAuthorizedByClient;}
	public static function setInRepairProcess($valor){self::$_inRepairProcess=$valor;}
	public static function getInRepairProcess(){return self::$_inRepairProcess;}
	public static function setRepaired($valor){self::$_repaired=$valor;}
	public static function getRepaired(){return self::$_repaired;}
	public static function setToDelivery($valor){self::$_toDelivery=$valor;}
	public static function getToDelivery()	{return self::$_toDelivery;}
	public static function setToBeCharged($valor){self::$_toBeCharged=$valor;}
	public static function getToBeCharged()	{return self::$_toBeCharged;}
	public static function setDeliveredToClient($valor){self::$_deliveredToClient=$valor;}
	public static function getDeliveredToClient()	{return self::$_deliveredToClient;}
	public static function setCancelled($valor){self::$_cancelled=$valor;}
	public static function getCancelled()	{return self::$_cancelled;}
/*******************************************************************************
*                                                                              *
*                  ##########MÉTODOS ABSTRACTOS##########                      *
*                                                                              *
*******************************************************************************/
/*******************************************************************************
*                                                                              *
*                  ######CONSTRUCTORES Y DESTRUCTORES####                      *
*                                                                              *
*******************************************************************************/
	public function __construct(){
		self::Profiles();
	}
/*******************************************************************************
*                                                                              *
*                  ##########MÉTODOS MÁGICOS##########                         *
*                                                                              *
*******************************************************************************/
/*******************************************************************************
*                                                                              *
*                  ##########MÉTODOS PÚBLICOS##########                        *
*                                                                              *
*******************************************************************************/
	public static function Profiles(){
		$this->tableSize=12;
		$this->tableName="osworkflow";
		$this->tableFields=new Fi($this->tableSize);
		
		$this->tableFields->setValue(0,'0');
		$this->tableFields->setName(0,'pkOSworkflow');
		$this->tableFields->setType(0,DT['STRING']);
		$this->tableFields->setKey(0,PK['SI']);
		$this->tableFields->setAI(0,AI['SI']);
		
		$this->tableFields->setValue(1,'');
		$this->tableFields->setName(1,'Sworkflow');
		$this->tableFields->setType(1,DT['STRING']);
		$this->tableFields->setKey(1,PK['SI']);
		$this->tableFields->setAI(1,AI['SI']);
		
		$this->tableFields->setValue(0,'0');
		$this->tableFields->setName(0,'pkOSworkflow');
		$this->tableFields->setType(0,DT['STRING']);
		$this->tableFields->setKey(0,PK['SI']);
		$this->tableFields->setAI(0,AI['SI']);
		
		$this->tableFields->setValue(0,'0');
		$this->tableFields->setName(0,'pkOSworkflow');
		$this->tableFields->setType(0,DT['STRING']);
		$this->tableFields->setKey(0,PK['SI']);
		$this->tableFields->setAI(0,AI['SI']);
	}
	
	public static function showAttribInfo($var){
		$varinfo=var_dump($var);
		return $varinfo;
		//print_r ('<script>alert("$varinfo");</script>');
		//redirect('orderManagement/index');
	}
	public static function testAttrb(){
		
	}
    public static function getAll(){
        try {
			$connection = Database::instance();
			$sql = "SELECT * from ibuserprofile;";
			$query = $connection->prepare($sql);
			$query->execute();
			return $query->fetchAll();
		}
        catch(\PDOException $e)
        {
			print "Error!: " . $e->getMessage();
		}
    }
	public static function getAllIbUserProfile(){
		try {
			$PDOcnn = Database::instance();
			$PDOQuery="SELECT * FROM `ibuserprofile`";
			$PDOResultSet = $PDOcnn->query($PDOQuery);
			return $PDOResultSet;
		}
        catch(\PDOException $e)
        {
			print "Error!: " . $e->getMessage();
		}
	}
    public static function getById($id) {
        try {
            $connection = Database::instance();
            $sql = "SELECT * from ibuser WHERE pkibuser = ?";
            $query = $connection->prepare($sql);
            $query->bindParam(1, $id, \PDO::PARAM_INT);
            $query->execute();
            return $query->fetch();
        }
        catch(\PDOException $e){
            print "Error!: " . $e->getMessage();
        }
    }
	public static function selectKanbanProfile($pkiBUser){
		try{
			$PDOcnn=Database::instance();
			$PDOQuery=
			"
			SELECT 
				pkBranchOffice, 
				BOName,
				Name,
				wf.*
			FROM ibuser u
				LEFT JOIN branchoffice_has_ibuserprofile bohup 
					ON u.pkiBUser=bohup.ibuser_pkiBUser
				LEFT JOIN branchoffice bo
					ON bohup.branchoffice_pkBranchOffice=bo.pkBranchOffice
				LEFT JOIN ibuserprofile up
					ON bohup.ibuserprofile_pkiBUserProfile=up.pkiBUserProfile
				LEFT JOIN osworkflow_has_ibuserprofile wfhup
					ON up.pkiBUserProfile=wfhup.iBUserProfile_pkiBUserProfile
				LEFT JOIN osworkflow wf
					ON wfhup.OSworkflow_pkOSworkflow=wf.pkOSworkflow
			WHERE U.pkiBUser=$pkiBUser
				AND bo.Active=1
			GROUP BY bo.pkBranchOffice
			";
		
			$resultSet=$PDOcnn->query($PDOQuery);
			return $resultSet;
		}
		catch(\PDOException $e){
			print "Error!: " . $e->getMessage();
		}
	}
    public static function insertData($data){
		try {
            $connection = Database::instance();
			$sql = "INSERT INTO $data VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
            $query = $connection->prepare($sql);
            $query->bindParam(1, self::$_pkiBUserProfile, \PDO::PARAM_INT);
			$query->bindParam(2, self::$_profileName, \PDO::PARAM_STR);
			$query->bindParam(3, self::$_toBeCollected, \PDO::PARAM_STR);
			$query->bindParam(4, self::$_toBeAssigned, \PDO::PARAM_STR);
            $query->bindParam(5, self::$_toBeDiagnosed, \PDO::PARAM_STR);
			$query->bindParam(6, self::$_diagnosisToBeAuthorized, \PDO::PARAM_STR);
			$query->bindParam(7, self::$_toNotifyTheClient, \PDO::PARAM_STR);
			$query->bindParam(8, self::$_toBeAuthorizedByClient, \PDO::PARAM_STR);
            $query->bindParam(9, self::$_inRepairProcess, \PDO::PARAM_STR);
			$query->bindParam(10, self::$_repaired, \PDO::PARAM_STR);
			$query->bindParam(11, self::$_toDelivery, \PDO::PARAM_STR);
			$query->bindParam(12, self::$_toBeCharged, \PDO::PARAM_INT);
			$query->bindParam(13, self::$_deliveredToClient, \PDO::PARAM_STR);
			$query->bindParam(14, self::$_cancelled, \PDO::PARAM_STR);
            $query->execute();
            return true;
        }
        catch(\PDOException $e){
            print "Error!: " . $e->getMessage();
        }
    }
    public static function updateById($id){
		try {
            $connection = Database::instance();
            $sql = "UPDATE ibuser SET pkibuser=?,username=?,pwd=? WHERE pkibuser=?";
            $query = $connection->prepare($sql);
            $query->bindParam(1, $this->_pkibuser, \PDO::PARAM_INT);
			$query->bindParam(2, $this->_username, \PDO::PARAM_STR);
			$query->bindParam(3, $this->_pwd, \PDO::PARAM_STR);
			$query->bindParam(4, $id, \PDO::PARAM_INT);
            $query->execute();
            return $query->fetch();
        }
        catch(\PDOException $e){
            print "Error!: " . $e->getMessage();
        }
    }
    public static function deleteById($id){
			try {
            $connection = Database::instance();
            $sql = "UPDATE ibuser SET Active=0 WHERE pkibuser=?";
            $query = $connection->prepare($sql);
         	$query->bindParam(1, $id, \PDO::PARAM_INT);
            $query->execute();
            return $query->fetch();
        }
        catch(\PDOException $e){
            print "Error!: " . $e->getMessage();
        }
	}
	public static function getNextId($column,$table){
		try {
				$cnn=Database::instance();
				$PDOQuery = "SELECT MAX($column) AS Maximo FROM $table;";
				$dso=$cnn->query($PDOQuery);
				$ultimo=$dso->fetch();
				$plusid=$ultimo['Maximo'];
				if ($plusid=="") {
					$plusid=1;
				}
				else{
					$plusid++;
				}
				return $plusid;
        	}
        catch (\PDOException $e) {
    		echo 'Incidencia al generar nuevo código ',  $e->getMessage(), ".\n";
		}
	}
	public static function getSelectibfunctiongroup12(){
		 try {
			$PDOcnn = Database::instance();
			$PDOQuery="	SELECT 
							pkiBFunctionGroup,
							iBFunctionGroupName
						FROM ibfunctiongroup;";
			$PDOResultSet = $PDOcnn->query($PDOQuery);
			return $PDOResultSet;
		}
        catch(\PDOException $e)
        {
			print "Error!: " . $e->getMessage();
		}
	}
/*******************************************************************************
*                                                                              *
*                  ##########MÉTODOS PRIVADOS##########                        *
*                                                                              *
*******************************************************************************/
/*******************************************************************************
*                                                                              *
*                  ##########EVENTOS##########                                 *
*                                                                              *
*******************************************************************************/
/*******************************************************************************
*                                                                              *
*                  ##########CONTROLES##########                               *
*                                                                              *
*******************************************************************************/
}
/*******************************************************************************
*                                                                              *
*                  ##########MAIN##########                                    *
*                                                                              *
*******************************************************************************/
?>