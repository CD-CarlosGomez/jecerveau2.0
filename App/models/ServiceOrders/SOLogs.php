<?php
namespace App\Models\ServiceOrders;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\Interfaces\iCrud;

class SOLogs implements iCrud{
	private static $_pkSOlog=Null;
	private static $_fkSODetail=Null;
	private static $_SOLogDate=Null;
	private static $_fkiBUser=Null;
//PROPIEDADES########################################
	public static function getPKSOLog(){
		return self::$_pkSOlog;
	}
	public static function setPKSOLog($value){
		self::$_pkSOlog=$value;
	}
	public static function getFKSODetail(){
		return self::$_fkSODetail;
	}
	public static function setFKSODetail($value){
		self::$_fkSODetail=$value;
	}
	public static function setLogDate($valor){
		self::$_SOLogDate=$valor;
	}
	public static function getLogDate()	{
		return self::$_SOLogDate;
	}
	public static function setFKiBUser($valor){
		self::$_fkiBUser=$valor;
	}
	public static function getFKiBUser(){
		return self::$_fkiBUser;
	}
//MÉTODOS ABSTRACTOS#################################
//CONSTRUCTORES Y DESTRUCTORES#######################
	public function __construct(){
		self::$_SOLogDate=date("Y-m-d H-m-s");
	}
//MÉTODOS MÁGICOS####################################
//MÉTODOS PÚBLICOS###################################
	public static function getAll(){
        try {
			$PDOcnn = Database::instance();
			$PDOQuery = "SELECT * from sodetail";
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
            $sql = "INSERT INTO $table VALUES (?,?,?,?)";
            $query = $connection->prepare($sql);
            $query->bindParam(1, self::$_pkSOlog, \PDO::PARAM_INT);
			$query->bindParam(2, self::$_fkSODetail, \PDO::PARAM_INT);
			$query->bindParam(3, self::$_SOLogDate, \PDO::PARAM_STR);
			$query->bindParam(4, self::$_fkiBUser, \PDO::PARAM_INT);
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