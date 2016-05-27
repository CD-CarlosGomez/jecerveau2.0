<?php
namespace App\Models\ServiceOrders;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\Interfaces\iCrud;

class SOAttachment implements iCrud{
	
	private static $_pkSOAttach=Null;
	private static $_fkSorder=Null;
	private static $_SOAttachLink=Null;
	private static $_SOAttachType=Null;
//PROPIEDADES########################################
	public static function getPKSOAttach(){
		return self::$_pkSOAttach;
	}
	public static function setPKSOAttach($value){
		self::$_pkSOAttach=$value;
	}
	public static function getFKSorder(){
		return self::$_fkSorder;
	}
	public static function setFKSorder($value){
		self::$_fkSorder=$value;
	}
	public static function setSOAttachLink($valor){
		self::$_SOAttachLink=$valor;
	}
	public static function getSOAttachLink()	{
		return self::$_SOAttachLink;
	}
	public static function getSOAttachType() {
		return self::$_SOAttachType;
	}
	public static function setSOAttachType($valor){
		self::$_SOAttachType=$valor;
	} 
//MÉTODOS ABSTRACTOS#################################
//CONSTRUCTORES Y DESTRUCTORES#######################
	public function __construct(){}
//MÉTODOS MÁGICOS####################################
//MÉTODOS PÚBLICOS###################################
	public static function getAll(){
        try {
			$PDOcnn = Database::instance();
			$PDOQuery = "SELECT * from sorderattachment";
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
            $query->bindParam(1, self::$_pkSOAttach, \PDO::PARAM_INT);
			$query->bindParam(2, self::$_fkSorder, \PDO::PARAM_INT);
			$query->bindParam(3, self::$_SOAttachLink, \PDO::PARAM_STR);
			$query->bindParam(4, self::$_SOAttachType, \PDO::PARAM_STR);
			
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
	public static function deleteByName($name){
			try {
            $connection = Database::instance();
            $sql = "DELETE FROM sorderattachment WHERE SOAttachLink = ?";
            $query = $connection->prepare($sql);
         	$query->bindParam(1, $name, \PDO::PARAM_STR);
            $query->execute();
            return true;
        }
        catch(\PDOException $e){
            print "Error!: " . $e->getMessage();
        }
	}
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
}