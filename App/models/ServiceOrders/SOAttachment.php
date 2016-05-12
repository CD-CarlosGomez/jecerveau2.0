<?php
namespace App\Models\ServiceOrders;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\Interfaces\iCrud;

class SOAttachment implements iCrud{
	private static $_pkSODetail=Null;
	private static $_fkSorder=Null;
	private static $_fkOsstatus=Null;
	private static $_SODetailDesc=Null;
	private static $_SODetailObs=Null;
	private static $_fkiBUser=Null;
//PROPIEDADES########################################
	public static function getPKSODetail(){
		return self::$_pkSODetail;
	}
	public static function setPKSODetail($value){
		self::$_pkSODetail=$value;
	}
	public static function getFKSorder(){
		return self::$_fkSorder;
	}
	public static function setFKSorder($value){
		self::$_fkSorder=$value;
	}
	public static function setOsstatus($valor){
		self::$_fkOsstatus=$valor;
	}
	public static function getOsstatus()	{
		return self::$_fkOsstatus;
	}
	public static function setSODetailDesc($valor){
		self::$_SODetailDesc=$valor;
	}
	public static function getSODetailDesc(){
		return self::$_SODetailDesc;
	}
	public static function setSODetailObs($valor){
		self::$_SODetailObs=$valor;
	}
	public static function getSODetailObs(){
		return self::$_SODetailObs;
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
            $sql = "INSERT INTO $table VALUES (?,?,?,?,?)";
            $query = $connection->prepare($sql);
            $query->bindParam(1, self::$_pkSODetail, \PDO::PARAM_INT);
			$query->bindParam(2, self::$_fkSorder, \PDO::PARAM_INT);
			$query->bindParam(3, self::$_fkOsstatus, \PDO::PARAM_INT);
			$query->bindParam(4, self::$_SODetailDesc, \PDO::PARAM_STR);
			$query->bindParam(5, self::$_SODetailObs, \PDO::PARAM_STR);
			$query->bindParam(6, self::$_fkiBUser, \PDO::PARAM_INT);
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