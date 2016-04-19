<?php
namespace App\Models\ServiceOrders;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\Interfaces\iCrud;

class CollectMethod implements iCrud{
	private $_pkCollectMethod=Null;
	private $_collectMethodName=Null;
	private $_Created=Null;
	private $_CreatedBy=Null;
	private $_Modified=Null;
	private $_ModifiedBy=Null;
//PROPIEDADES########################################
	public function getPKCollectMethod(){
		return $this->pkCollectMethod;
	}
	public function setPKCollectMethod($value){
		$this->_pkCollectMethod=$value;
	}
	public function getCollectMethodName(){
		return $this->_collectMethodName;
	}
	public function setCollectMethodName($value){
		$this->_collectMethodName=$value;
	}
	public function setCreated($valor){
		$this->_Created=$valor;
	}
	public function getCreated()	{
		return $this->_Created;
	}
	public function setCreatedBy($valor){
		$this->_CreatedBy=$valor;
	}
	public function getCreatedBy(){
		return $this->_CreatedBy;}
	public function setModified($valor){
		$this->_Modified=$valor;}
	public function getModified(){
		return $this->_Modified;
	}
	public function setModifiedBy($valor){
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
