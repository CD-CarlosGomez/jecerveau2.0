<?php
namespace App\Models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\Interfaces\iCrud;

class BranchOffices implements iCrud{

	private static $_pkBranchOffice_p;
	private static $_fkCompany_p;
	private static $_BOName_p;
	private static $_BOstreet_p;
	private static $_BOextNumber_p;
	private static $_BOintNumber_p;
	private static $_BOregion_p;
	private static $_BOzone_p;
	private static $_BOprovince_p;
	private static $_BOzipCode_p;
	private static $_created;
	private static $_createdBy;
	private static $_modified;
	private static $_modifiedBy;
	private static $_active_p;
	
	public static function setpkBO($valor){self::$_pkBranchOffice_p=$valor;}
	public static function getpkBO() {return self::$_pkBranchOffice_p;}

	public static function setBOName($valor){self::$_BOName_p=$valor;}
	public static function getBOName(){return self::$_BOName_p;}
	
	public static function setTaxId($valor){self::$_taxId_p=$valor;}
	public static function getTaxId()	{return self::$_taxId_p;}
	
	public static function setLogoFile($valor){self::$_logoFile_p=$valor;}
	public static function getLogoFile()	{return self::$_logoFile_p;}

	public static function setBOStreet($valor){self::$_BOstreet_p=$valor;}
	public static function getBOStreet(){return self::$_BOstreet_p;}
	
	public static function setBOExtNumber($valor){self::$_BOextNumber_p=$valor;}
	public static function getBOExtnumber() {return self::$_BOextNumber_p;}
	
	public static function setBOIntNumber($valor){self::$_BOintNumber_p=$valor;}
	public static function getBOIntNumber(){return self::$_BOintNumber_p;}
	
	public static function setBORegion($valor){self::$_BOregion_p=$valor;}
	public static function getBORegion(){return self::$_BOregion_p;}

	public static function setBOZone($valor){self::$_zone_p=$valor;}
	public static function getBOZone(){return self::$_zone_p;}

	public static function setBOProvince($valor){self::$_province_p=$valor;}
	public static function getBOProvince(){return self::$_province_p;}

	public static function setBOZipCode($valor){self::$_zipCode_p=$valor;}
	public static function getBOZipCode(){return self::$_zipCode_p;}

	public static function setCreated($valor){self::$_created_p=$valor;}
	public static function getCreated()	{return self::$_created_p;}

	public static function setCreatedBy($valor){self::$_createdBy_p=$valor;}
	public static function getCreatedBy()	{return self::$_createdBy_p;}
	
	public static function setModified($valor){self::$_modified_p=$valor;}
	public static function getModified()	{return self::$_modified_p;}
	
	public static function setModifiedBy($valor){self::$_modifiedBy_p=$valor;}
	public static function getModifiedBy()	{return self::$_modifiedBy_p;}
	
	public static function setActive($valor){self::$_active_p=$valor;}
	public static function getActive()	{return self::$_active_p;}
	
	public static function setfkCompany($valor){self::$_fkCompany_p=$valor;}
	public static function getCompany()	{return self::$_fkCompany_p;}
	
	
	public function __construct(){
	//Inicializar los atributos
	}
    public static function getAll(){
        try {
			$connection = Database::instance();
			$sql = "SELECT * from BranchOffice";
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
            $sql = "SELECT * from BranchOffice WHERE pkBranchOffice = ?";
            $query = $connection->prepare($sql);
            $query->bindParam(1, $id, \PDO::PARAM_INT);
            $query->execute();
            return $query->fetch();
        }
        catch(\PDOException $e){
            print "Error!: " . $e->getMessage();
        }
    }
    public static function insertData($data){
		try {
            $connection = Database::instance();
			//self::setpkiBUser(self::getNextId("pkiBUser","ibuser"));
            $sql = "INSERT INTO $data VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
            $query = $connection->prepare($sql);
            $query->bindParam(1, self::$_pkBranchOffice_p, \PDO::PARAM_INT);
            $query->bindParam(2, self::$_fkCompany_p, \PDO::PARAM_INT);
			$query->bindParam(3, self::$_BOName_p, \PDO::PARAM_STR);
			$query->bindParam(4, self::$_BOstreet_p, \PDO::PARAM_STR);
			$query->bindParam(5, self::$_BOextNumber_p, \PDO::PARAM_STR);
			$query->bindParam(6, self::$_BOintNumber_p, \PDO::PARAM_STR);
            $query->bindParam(7, self::$_BOregion_p, \PDO::PARAM_INT);
			$query->bindParam(8, self::$_BOzone_p, \PDO::PARAM_STR);
			$query->bindParam(9, self::$_BOprovince_p, \PDO::PARAM_STR);
			$query->bindParam(10, self::$_BOzipCode_p, \PDO::PARAM_STR);
			$query->bindParam(11, self::$_created_p, \PDO::PARAM_STR);
			$query->bindParam(12, self::$_createdBy_p, \PDO::PARAM_STR);
			$query->bindParam(13, self::$_modified_p, \PDO::PARAM_STR);
			$query->bindParam(14, self::$_modifiedBy_p, \PDO::PARAM_STR);
            $query->bindParam(15, self::$_active_p, \PDO::PARAM_STR);
			$query->execute();
            return $query->fetch();
        }
        catch(\PDOException $e){
            print "Error!: " . $e->getMessage();
        }
    }
    }
    public static function updateById($user){
    }
    public static function deleteById($id){
		try {
            $connection = Database::instance();
            $sql = "UPDATE company SET Active=0 WHERE pkCompany=?";
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
				//$dso=$cnn->prepare($PDOQuery);
				//$dso->bindParam(1,$column,\PDO::PARAM_INT);
				//$dso->bindParam(2,$table,\PDO::PARAM_INT);
				//$dso->execute();
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

