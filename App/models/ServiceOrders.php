<?php
namespace App\Models\Users;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\Interfaces\iCrud;

class ServiceOrders implements iCrud{
	private $_pkibSorder;
	private $_fkBranchOffice;
	private $_fkCustomercontact;
	private $_fkDevice;
	private $_fkCollectMethod;
	private $_fkOSstatus;
	private $_fkSOrderType;
	private $_SOrderDesc;
	private $_SorderhasIncidentalDano;
	private $_SorderIncidentalDanoObs;
	private $_SorderAppliedWarranty;
	private $_SorderWarrantytype;
	private $_SorderWarrantyFactura;
	private $_SorderWarrantySupplier;
	
	
	public function __construct(){
		$this->_pkibSorder=0;
		$this->_fkBranchOffice=0;
		$this->_fkCustomercontact=0;
		$this->_fkDevice=0;
		$this->_fkCollectMethod=0;
		$this->_fkOSstatus=0;
		$this->_fkSOrderType=0;
		$this->_SOrderDesc="";
		$this->_SorderhasIncidentalDano="";
		$this->_SorderIncidentalDanoObs="";
		$this->_SorderAppliedWarranty="";
		$this->_SorderWarrantytype="";
		$this->_SorderWarrantyFactura="";
		$this->_SorderWarrantySupplier="";
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
	public static function setOrderDesc($valor){$this->_SOrderDesc=$valor;}
	public static function getOrderDesc(){return $this->_SOrderDesc;}
	public static function setSorderhasIncidentalDano($valor){$this->_SorderhasIncidentalDano=$valor;}
	public static function getSorderhasIncidentalDano() {return $this->_SorderhasIncidentalDano;}
	public static function setSorderIncidentalDanoObs($valor){$this->_SorderIncidentalDanoObs=$valor;}
	public static function getSorderIncidentalDanoObs(){return $this->_SorderIncidentalDanoObs;}
	public static function setSorderAppliedWarranty($valor){$this->_SorderAppliedWarranty=$valor;}
	public static function getSorderAppliedWarranty()	{return $this->_SorderAppliedWarranty;}
	public static function setSorderWarrantytype($valor){$this->_SorderWarrantytype=$valor;}
	public static function getSorderWarrantytype(){return $this->_SorderWarrantytype;}
	public static function setSorderWarrantyFactura($valor){$this->_SorderWarrantyFactura=$valor;}
	public static function getSorderWarrantyFactura() {return $this->_SorderWarrantyFactura;}
	public static function setSorderWarrantySupplier($valor){$this->_SorderWarrantySupplier=$valor;}
	public static function getSorderWarrantySupplier(){return $this->_SorderWarrantySupplier;}
	
	public static function getAll(){
        try {
			$connection = Database::instance();
			$sql = "SELECT * from ibsorder";
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
}
