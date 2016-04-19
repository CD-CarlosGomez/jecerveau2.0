<?php
namespace App\Models\ServiceOrders;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\Interfaces\iCrud;

class ServiceOrders implements iCrud{
	private $_pkSorder_p;
	private $_SONumber_p;
	private $_fkBranchOffice_p;
	private $_SODate_p;
	private $_fkCustomercontact_p;
	private $_fkCollectMethod_p;
	private $_fkSOrderType_p;
	private $_SODeviceCondition_p;
	private $_SOTechDetail_p;
		
	public function __construct(){
	
	}
	
	public function setpkSorder($valor){
		$this->_pkSorder_p=$valor;
	}
	public function getpkSorder(){
		return $this->_pkSorder_p;
	}
	public function setSONumber($valor){
		$this->_SONumber_p=$valor;
	}
	public function getSONumber(){
		return $this->_SONumber_p;
	}
	public function setBranchOffice($valor){
		$this->_fkBranchOffice_p=$valor;}
	public function getBranchOffice(){
		return $this->_fkBranchOffice_p;
	}
	public function setSODate($valor){
		$this->_SODate_p=$valor;
	}
	public function getSODate(){
		return $this->_SODate_p;
	}
	public function setfkCustomerContact($valor){
		$this->_fkCustomercontact_p=$valor;
	}
	public function getfkCustomerContact()	{
		return $this->_fkCustomercontact_p;
	}
	public function setfkCollectMethod($valor){
		$this->_fkCollectMethod_p=$valor;
	}
	public function getfkCollectMethod() {
		return $this->_fkCollectMethod_p;
	}
	public function setfkOrderType($valor){
		$this->_fkSOrderType_p=$valor;
	}
	public function getfkOrderType()	{
		return $this->_fkSOrderType_p;
	}
	public function setSODeviceCondition($valor){
		$this->_SODeviceCondition_p=$valor;
	}
	public function getSODeviceCondition(){
		return $this->_SODeviceCondition_p;
	}
	public function setSOTechDetail($valor){
		$this->_SOTechDetail_p=$valor;
	}
	public function getSOTechDetail(){
		return $this->_SOTechDetail_p;
	}
		
	public  function getAll(){
        try {
			$PDOcnn = Database::instance();
			$PDOQuery = "SELECT * from sorder";
			$PDOResultSet = $PDOcnn->query($PDOQuery);
			return $PDOResultSet;
		}
        catch(\PDOException $e)
        {
			print "Error!: " . $e->getMessage();
		}
    }
    public  function getById($id) {
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
    public  function getNextId($column,$table){
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
    		echo 'Incidencia al generar nuevo c�digo ',  $e->getMessage(), ".\n";
		}
	}
	public  function getSelectIbSO189A1(){
		 try {
			$PDOcnn = Database::instance();
			$PDOQuery="SELECT 
												pkSOrder,
												SONumber,
												SODate
						FROM `sorder`;";
			$PDOResultSet = $PDOcnn->query($PDOQuery);
			return $PDOResultSet;
		}
        catch(\PDOException $e)
        {
			print "Error!: " . $e->getMessage();
		}
	}
	public  function insertData($table){
		try {
            $connection = Database::instance();
            $sql = "INSERT INTO $table VALUES (?,?,?,?,?,?,?,?,?)";
            $query = $connection->prepare($sql);
            $query->bindParam(1, $this->_pkSorder_p, \PDO::PARAM_INT);
			$query->bindParam(2, $this->_SONumber_p, \PDO::PARAM_STR);
			$query->bindParam(3, $this->_fkBranchOffice_p, \PDO::PARAM_INT);
			$query->bindParam(4, $this->_SODate_p, \PDO::PARAM_STR);
			$query->bindParam(5, $this->_fkCustomercontact_p, \PDO::PARAM_INT);
			$query->bindParam(6, $this->_fkCollectMethod_p, \PDO::PARAM_INT);
			$query->bindParam(7, $this->_fkSOrderType_p, \PDO::PARAM_INT);
			$query->bindParam(8, $this->_SODeviceCondition_p, \PDO::PARAM_STR);
			$query->bindParam(9, $this->_SOTechDetail_p, \PDO::PARAM_STR);
            $query->execute();
            return $query->fetch();
        }
        catch(\PDOException $e){
            print "Error!: " . $e->getMessage();
        }
    }
	public  function insertIbSO189A1($a,$b,$c,$d,$e){
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
    public  function updateById($id){
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
    public  function deleteById($id){
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
	
}
