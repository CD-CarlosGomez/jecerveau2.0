<?php
namespace App\Models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\Interfaces\iCrud;

class ServiceOrders implements iCrud{
	private $_pkibSOrder;
	private $_fkBranchOffice;
	private $_fkCustomercontact;
	private $_fkDevice;
	private $_fkCollectMethod;
	private $_fkOSstatus;
	private $_fkSOrderType;
	private $_ibSOrderName;
	private $_ibSOrderDesc;
	private $_ibSOrderGSX;
	private $_ibSOrderObs;
	private $_ibSOrderhasIncidentalDano;
	private $_ibSOrderIncidentalDanoObs;
	private $_ibSOrderAppliedWarranty;
	private $_ibSOrderWarrantytype;
	private $_ibSOrderWarrantyFactura;
	private $_ibSOrderWarrantySupplier;
	
	
	public function __construct(){
		$this->_pkibSorder=0;
		$this->_fkBranchOffice=0;
		$this->_fkCustomercontact=0;
		$this->_fkDevice=0;
		$this->_fkCollectMethod=0;
		$this->_fkOSstatus=0;
		$this->_fkSOrderType=0;
		$this->_ibSOrderName="";
		$this->_ibSOrderDesc="";
		$this->_ibSOrderGSX="";
		$this->_ibSOrderObs="";
		$this->_ibSOrderhasIncidentalDano="";
		$this->_ibSOrderIncidentalDanoObs="";
		$this->_ibSOrderAppliedWarranty="";
		$this->_ibSOrderWarrantytype="";
		$this->_ibSOrderWarrantyFactura="";
		$this->_ibSOrderWarrantySupplier="";
	}
	
	public static function setpkibSorder($valor){$this->_pkibSorder=$valor;}
	public static function getpkibSorder() {return $this->_pkibSorder;}
	public static function setBranchOffice($valor){$this->_fkBranchOffice=$valor;}
	public static function getBranchOffice(){return $this->_fkBranchOffice;}
	public static function setfkCustomerContact($valor){$this->_fkCustomercontact=$valor;}
	public static function getfkCustomerContact()	{return $this->_fkCustomercontact;}
	public static function setfkDevice($valor){$this->_fkDevice=$valor;}
	public static function getfkDevice(){return $this->_fkDevice;}
	public static function setfkCollectMethod($valor){$this->_fkCollectMethod=$valor;}
	public static function getfkCollectMethod() {return $this->_fkCollectMethod;}
	public static function setfkOSstatus($valor){$this->_fkOSstatus=$valor;}
	public static function getOSstatus(){return $this->_fkOSstatus;}
	public static function setfkOrderType($valor){$this->_fkSOrderType=$valor;}
	public static function getfkOrderType()	{return $this->_fkSOrderType;}
	
	public static function setIbSOrderName($valor){$this->_ibSOrderName=$valor;}
	public static function getIbSOrderName(){return $this->_ibSOrderName;}
	public static function setIbSOrderDesc($valor){$this->_ibSOrderDesc=$valor;}
	public static function getIbSOrderDesc(){return $this->_ibSOrderDesc;}
	public static function setIbSOrderGSX($valor){$this->_ibSOrderGSX=$valor;}
	public static function getIbSOrderGSX(){return $this->_ibSOrderGSX;}
	public static function setIbSOrderObs($valor){$this->_ibSOrderObs=$valor;}
	public static function getIbSOrderObs(){return $this->_ibSOrderObs;}
	
	public static function setIbSOrderhasIncidentalDano($valor){$this->_ibSOrderhasIncidentalDano=$valor;}
	public static function getIbSOrderhasIncidentalDano() {return $this->_ibSOrderhasIncidentalDano;}
	public static function setIbSOrderIncidentalDanoObs($valor){$this->_ibSOrderIncidentalDanoObs=$valor;}
	public static function getIbSOrderIncidentalDanoObs(){return $this->_ibSOrderIncidentalDanoObs;}
	public static function setIbSOrderAppliedWarranty($valor){$this->_ibSOrderAppliedWarranty=$valor;}
	public static function getIbSOrderAppliedWarranty()	{return $this->_ibSOrderAppliedWarranty;}
	public static function setIbSOrderWarrantytype($valor){$this->_ibSOrderWarrantytype=$valor;}
	public static function getIbSOrderWarrantytype(){return $this->_ibSOrderWarrantytype;}
	public static function setIbSOrderWarrantyFactura($valor){$this->_ibSOrderWarrantyFactura=$valor;}
	public static function getIbSOrderWarrantyFactura() {return $this->_ibSOrderWarrantyFactura;}
	public static function setIbSOrderWarrantySupplier($valor){$this->_ibSOrderWarrantySupplier=$valor;}
	public static function getIbSOrderWarrantySupplier(){return $this->_ibSOrderWarrantySupplier;}
	
	public static function getAll(){
        try {
			$PDOcnn = Database::instance();
			$PDOQuery = "SELECT * from ibsorder";
			/*$query = $connection->prepare($sql);
			$query->execute();
			$resultSet=$query->fetchAll();*/
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
	public static function getSelectIbSO189A1(){
		 try {
			$PDOcnn = Database::instance();
			$PDOQuery="SELECT 
												pkibSOrder,
												ibSOrderName,
												ibSOrderDesc,
												ibSOrderGSX,
												ibSOrderObs
						FROM `ibsorder`;";
			$PDOResultSet = $PDOcnn->query($PDOQuery);
			return $PDOResultSet;
		}
        catch(\PDOException $e)
        {
			print "Error!: " . $e->getMessage();
		}
	}
	public static function insertData($user){
		try {
            $connection = Database::instance();
            $sql = "INSERT INTO ibuser (pkibuser,username,pwd,active) VALUES (?,?,?,?)";
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
            $sql = "INSERT INTO ibsorder (
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
	
}
