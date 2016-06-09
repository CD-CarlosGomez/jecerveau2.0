<?php
namespace App\Models\ServiceOrders;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\Interfaces\iCrud;

class ServiceOrders implements iCrud{
	private static $_pkSorder_p;
	private static $_SONumber_p;
	private static $_fkBranchOffice_p;
	private static $_SODate_p;
	private static $_fkCustomercontact_p;
	private static $_fkCollectMethod_p;
	private static $_fkSOrderType_p;
	private static $_SODeviceCondition_p;
	private static $_SOTechDetail_p;
		
	public function __construct(){
	
	}
	
	public function setpkSorder($valor){
		self::$_pkSorder_p=$valor;
	}
	public function getpkSorder(){
		return self::$_pkSorder_p;
	}
	public function setSONumber($valor){
		self::$_SONumber_p=$valor;
	}
	public function getSONumber(){
		return self::$_SONumber_p;
	}
	public function setBranchOffice($valor){
		self::$_fkBranchOffice_p=$valor;}
	public function getBranchOffice(){
		return self::$_fkBranchOffice_p;
	}
	public function setSODate($valor){
		self::$_SODate_p=$valor;
	}
	public function getSODate(){
		return self::$_SODate_p;
	}
	public function setfkCustomerContact($valor){
		self::$_fkCustomercontact_p=$valor;
	}
	public function getfkCustomerContact()	{
		return self::$_fkCustomercontact_p;
	}
	public function setfkCollectMethod($valor){
		self::$_fkCollectMethod_p=$valor;
	}
	public function getfkCollectMethod() {
		return self::$_fkCollectMethod_p;
	}
	public function setfkOrderType($valor){
		self::$_fkSOrderType_p=$valor;
	}
	public function getfkOrderType()	{
		return self::$_fkSOrderType_p;
	}
	public function setSODeviceCondition($valor){
		self::$_SODeviceCondition_p=$valor;
	}
	public function getSODeviceCondition(){
		return self::$_SODeviceCondition_p;
	}
	public function setSOTechDetail($valor){
		self::$_SOTechDetail_p=$valor;
	}
	public function getSOTechDetail(){
		return self::$_SOTechDetail_p;
	}
	public static function getAll(){
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
	public static function getoxcc($pkso){
        try {
			$PDOcnn = Database::instance();
			$PDOQuery =
			"
			SELECT * FROM sorder so
				INNER JOIN customercontact cc
					ON so.CustomerContact_pkCustomerContact=cc.pkCustomerContact
				LEFT JOIN sodetail sod 
					ON so.pkSorder=sod.fkSorder
				LEFT JOIN device de
					ON so.pkSorder=de.sorder_pkSorder
				LEFT JOIN gsx
					ON de.pkDevice=gsx.fkDevice
			WHERE pkSorder=$pkso
			ORDER BY sod.fkOSstatus DESC LIMIT 1;
			";
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
    		echo 'Incidencia al generar nuevo c&oacute;digo ',  $e->getMessage(), ".\n";
		}
	}
	public static function getKanbanSO(){
		 try {
			$PDOcnn = Database::instance();
			$PDOQuery=
			"
			SELECT 
					sod2.lastst,
					so.pkSOrder,
					so.SONumber,
					cc.contactName,
					de.deviceDesc,
					so.SODate,
					u.realname
			FROM sorder so
				LEFT JOIN ( customercontact cc 
					CROSS JOIN sodetail sod 
					CROSS JOIN ibuser u 
					CROSS JOIN device de )
						ON ( so.CustomerContact_pkCustomerContact=cc.pkCustomerContact
							AND so.pkSorder=sod.fkSorder
							AND so.pkSorder=de.sorder_pkSorder
							AND sod.fkiBUser=u.pkiBUser)
					JOIN (	SELECT 
							pkSOrder, 
							MAX(sod.fkOSstatus) as lastst
						FROM sodetail sod 
			                LEFT JOIN sorder so 
			                    ON pkSorder=sod.fkSorder
			            GROUP BY pkSorder) sod2 ON so.pkSorder=sod2.pkSorder
						GROUP BY so.pkSorder 
						ORDER BY so.SODate DESC
			";
			$PDOResultSet = $PDOcnn->query($PDOQuery);
			return $PDOResultSet;
		}
        catch(\PDOException $e)
        {
			print "Error!: " . $e->getMessage();
		}
	}
	public static function getLastOSperBO($id){
		try {
            $PDOcnn = Database::instance();
            $sql = 
			"
			SELECT 
				so.pkSorder, 
				so.BranchOffice_pkBranchOffice,
				so.SONumber FROM sorder so 
			WHERE 
				so.BranchOffice_pkBranchOffice=$id
			ORDER BY 
				so.pkSorder 
			DESC LIMIT 1;
			";
            $resultSet=$PDOcnn->query($sql);
            return $resultSet;
        }
        catch(\PDOException $e){
            print "Error!: " . $e->getMessage();
        }
		
	}
	public static function getOrderHistory($id){
		try {
            $PDOcnn = Database::instance();
            $sql = 
			"
			SELECT 
				pkSODetail,
				fkSorder,
				SODetailDesc,
				fkOSstatus,
				SOstatusName,
				SOlogDate,
				fkiBUser,
				realname 
			FROM `sodetail` 
				INNER JOIN solog 
					ON pkSODetail=SOrderDetail_pkSOrderDetail 
				INNER JOIN sostatus
					ON fkOSstatus=pkOSstatus
				LEFT JOIN ibuser
					ON fkiBUser=pkiBUser
			WHERE fkSorder=$id GROUP BY fkOSstatus
			ORDER BY fkOSstatus DESC
			";
            $resultSet=$PDOcnn->query($sql);
            return $resultSet;
        }
        catch(\PDOException $e){
            print "Error!: " . $e->getMessage();
        }
		
	}
	public static function insertData($table){
		try {
            $connection = Database::instance();
            $sql = "INSERT INTO $table VALUES (?,?,?,?,?,?,?,?,?)";
            $query = $connection->prepare($sql);
            $query->bindParam(1, self::$_pkSorder_p, \PDO::PARAM_INT);
			$query->bindParam(2, self::$_SONumber_p, \PDO::PARAM_STR);
			$query->bindParam(3, self::$_fkBranchOffice_p, \PDO::PARAM_INT);
			$query->bindParam(4, self::$_SODate_p, \PDO::PARAM_STR);
			$query->bindParam(5, self::$_fkCustomercontact_p, \PDO::PARAM_INT);
			$query->bindParam(6, self::$_fkCollectMethod_p, \PDO::PARAM_INT);
			$query->bindParam(7, self::$_fkSOrderType_p, \PDO::PARAM_INT);
			$query->bindParam(8, self::$_SODeviceCondition_p, \PDO::PARAM_STR);
			$query->bindParam(9, self::$_SOTechDetail_p, \PDO::PARAM_STR);
            $query->execute();
            return true;
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
	
}
