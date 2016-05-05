<?php
namespace App\Models\ServiceOrders;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\Interfaces\iCrud;

class SOAccessories implements iCrud{
	private static $_pkSOAccessories=Null;
	private static $_fkSOrder=Null;
	private static $_SOAccessoryDesc=Null;
	private static $_SOAccessoryBrand=Null;
	private static $_SOAccessoryModel=Null;
	private static $_SOAccessoryPartNumber=Null;
	private static $_SOAccessorySerialNumber=Null;
//PROPIEDADES########################################
	public static function getPKSOAccessories(){
		return self::$_pkSOAccessories;
	}
	public static function setPKSOAccessories($value){
		self::$_pkSOAccessories=$value;
	}
	public static function getFKSorder(){
		return self::$_fkSOrder;
	}
	public static function setFKSorder($value){
		self::$_fkSOrder=$value;
	}
	public static function setAccessoryDesc($valor){
		self::$_SOAccessoryDesc=$valor;
	}
	public static function getAccessoryDesc()	{
		return self::$_SOAccessoryDesc;
	}
	public static function setAccessoryBrand($valor){
		self::$_SOAccessoryBrand=$valor;
	}
	public static function getAccessoryBrand(){
		return self::$_SOAccessoryBrand;
	}
	public static function setAccessoryModel($valor){
		self::$_SOAccessoryModel=$valor;
	}
	public static function getAccessoryModel(){
		return self::$_SOAccessoryModel;
	}
	public static function setAccessoryPartNumber($valor){
		self::$_SOAccessoryPartNumber=$valor;
	}
	public static function getAccessoryPartNumber(){
		return self::$_SOAccessoryPartNumber;
	}
	public static function setAccessorySerialNumber($valor){
		self::$_SOAccessorySerialNumber=$valor;
	}
	public static function getAccessorySerialNumber(){
		return self::$_SOAccessorySerialNumber;
	}
	
//MÉTODOS ABSTRACTOS#################################
//CONSTRUCTORES Y DESTRUCTORES#######################
	public function __construct(){
	
	}
//MÉTODOS MÁGICOS####################################
//MÉTODOS PÚBLICOS###################################
	public static function getAll(){
        try {
			$PDOcnn = Database::instance();
			$PDOQuery = "SELECT * from collectMethod";
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
	public static function getBySO($pkSO) {
        try {
            $PDOcnn = Database::instance();
            $PDOQuery = "SELECT * from soaccessory WHERE sorder_pkSorder = $pkSO";
            $PDOResulSet = $PDOcnn->query($PDOQuery);
			return $PDOResulSet;
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
	public static function insertData($table){
		try {
            $connection = Database::instance();
            $sql = "INSERT INTO $table VALUES (?,?,?,?,?,?,?)";
            $query = $connection->prepare($sql);
            $query->bindParam(1, self::$_pkSOAccessories, \PDO::PARAM_INT);
			$query->bindParam(2, self::$_fkSOrder, \PDO::PARAM_INT);
			$query->bindParam(3, self::$_SOAccessoryDesc, \PDO::PARAM_STR);
			$query->bindParam(4, self::$_SOAccessoryBrand, \PDO::PARAM_STR);
			$query->bindParam(5, self::$_SOAccessoryModel, \PDO::PARAM_STR);
			$query->bindParam(6, self::$_SOAccessoryPartNumber, \PDO::PARAM_STR);
			$query->bindParam(7, self::$_SOAccessorySerialNumber, \PDO::PARAM_STR);
			
			$resultSet=$query->execute();
			
			return true;//$resultSet;//Retornará True o false, dependiendo si se ejecuta la sentencia.
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
            $query->bindParam(1, self::$_pkibuser, \PDO::PARAM_INT);
			$query->bindParam(2, self::$_username, \PDO::PARAM_STR);
			$query->bindParam(3, self::$_pwd, \PDO::PARAM_STR);
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
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
}