<?php
namespace App\Models\ServiceOrders;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\Interfaces\iCrud;

class SOAccessories implements iCrud{
	private static $_SOAccessories=Null;
	private static $_fkSorder=Null;
	private static $_SOAccessoryDesc=Null;
	private static $_SOAccessoryBrand=Null;
	private static $_SOAccessoryModel=Null;
	private static $_SOAccessoryPartNumber=Null;
	private static $_SOAccessorySerialNumber=Null;
//PROPIEDADES########################################
	public static function getPKSOAccessories(){
		return $this->_SOAccessories;
	}
	public static function setPKSOAccessories($value){
		$this->_SOAccessories=$value;
	}
	public static function getFKSorder(){
		return $this->_fkSorder;
	}
	public static function setFKSorder($value){
		$this->_fkSorder=$value;
	}
	public static function setAccessoryDesc($valor){
		$this->_SOAccessoryDesc=$valor;
	}
	public static function getAccessoryDesc()	{
		return $this->_SOAccessoryDesc;
	}
	public static function setCreatedBy($valor){
		$this->_CreatedBy=$valor;
	}
	public static function getCreatedBy(){
		return $this->_CreatedBy;}
	public static function setModified($valor){
		$this->_Modified=$valor;}
	public static function getModified(){
		return $this->_Modified;
	}
	public static function setModifiedBy($valor){
		$this->_ModifiedBy=$valor;
	}
	public static function getModifiedBy(){
		return $this->_ModifiedBy;
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
	public static function insertData($user){
		try {
            $connection = Database::instance();
            $sql = "INSERT INTO collectMethod () VALUES (?,?,?,?,?,?)";
            $query = $connection->prepare($sql);
            $query->bindParam(1, $this->_pkibuser, \PDO::PARAM_INT);
			$query->bindParam(2, $this->_username, \PDO::PARAM_STR);
			$query->bindParam(3, $this->_pwd, \PDO::PARAM_STR);
			$query->bindParam(4, $this->_active, \PDO::PARAM_STR);
            $query->execute();
            return $query->fetch();
        }
        catch(\PDOException $e){
            print "Error!: " . $e->getMessage();
        }
    }
	public static function insertIbSO189A1($a,$b,$c,$d,$e){
		try {
            $connection = Database::instance();
            $sql = "INSERT INTO sorder (
															pkibSOrder,
															ibSOrderName,
															ibSOrderDesc,
															ibSOrderGSX,
															ibSOrderObs
														) 
						VALUES (?,?,?,?,?)";
            $query = $connection->prepare($sql);
            $query->bindParam(1, $a, \PDO::PARAM_INT);
			$query->bindParam(2, $b, \PDO::PARAM_STR);
			$query->bindParam(3, $c, \PDO::PARAM_STR);
			$query->bindParam(4, $d, \PDO::PARAM_STR);
			$query->bindParam(5, $e, \PDO::PARAM_STR);
            $query->execute();
            return $query->fetch();
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
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
}
