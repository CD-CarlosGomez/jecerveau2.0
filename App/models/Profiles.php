<?php
namespace App\Models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\Interfaces\iCrud;

class Profiles implements iCrud{
	
	private static $_pkiBUserProfile;
	private static $_profileName;
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
		
	public function __construct(){
		$_pkiBUserProfile=0;
		$_profileName="Default";
		$_toBeCollected="0";
		$_toBeAssigned="0";
		$_toBeDiagnosed="0";
		$_diagnosisToBeAuthorized="0";
		$_toNotifyTheClient="0";
		$_toBeAuthorizedByClient="0";
		$_inRepairProcess="0";
		$_repaired="0";
		$_toDelivery="0";
		$_toBeCharged="0";
		$_deliveredToClient="0";
		$_cancelled="0";
	}
	
	public static function setpkiBUserProfile($valor){self::$_pkiBUserProfile=$valor;}
	public static function getpkiBUserProfile() {return self::$_pkiBUserProfile;}
	public static function setProfileName($valor){self::$_profileName=$valor;}
	public static function getProfileName() {return self::$_profileName;}
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
	
	
	public static function showAttribInfo($var){
		$varinfo=var_dump($var);
		return $varinfo;
		//print_r ('<script>alert("$varinfo");</script>');
		//redirect('orderManagement/index');
	}
	public static function testAttrb(){}
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
	public static function getParcialSelect(){
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
	public static function getSelectibfunctiongroup12(){
		 try {
			$PDOcnn = Database::instance();
			$PDOQuery="	SELECT 
							pkiBFunctionGroup,
							iBFunctionGroupModulo
						FROM ibfunctiongroup;";
			$PDOResultSet = $PDOcnn->query($PDOQuery);
			return $PDOResultSet;
		}
        catch(\PDOException $e)
        {
			print "Error!: " . $e->getMessage();
		}
	}
}
?>