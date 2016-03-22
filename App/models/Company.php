<?php
namespace App\Models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\Interfaces\iCrud;

class Companies implements iCrud{

	private static $_pkCompany_p;
	private static $_legalName_p;
	private static $_commercialName_p;
	private static $_taxId_p;
	private static $_logoFile_p;//Agregar Método
	private static $_street_p;
	private static $_extNumber_p;
	private static $_intNumber_p;
	private static $_region_p;
	private static $_zone_p;
	private static $_province_p;
	private static $_zipCode_p;
	private static $_created;
	private static $_createdBy;
	private static $_modified;
	private static $_modifiedBy;
	private static $_active_p;
	private static $_fkEnterpriseGroup_p;
	
	public static function setpkCompany($valor){self::$_pkCompany_p=$valor;}
	public static function getpkCompany() {return self::$_pkCompany_p;}

	public static function setfkiBUserProfile($valor){self::$_legalName_p=$valor;}
	public static function getfkiBUserProfile() {return self::$_legalName_p;}

	public static function setCommercialName($valor){self::$_commercialName_p=$valor;}
	public static function getCommercialName(){return self::$_commercialName_p;}
	
	public static function setTaxId($valor){self::$_taxId_p=$valor;}
	public static function getTaxId()	{return self::$_taxId_p;}
	
	public static function setLogoFile($valor){self::$_logoFile_p=$valor;}
	public static function getLogoFile()	{return self::$_logoFile_p;}

	public static function setStreet($valor){self::$_street_p=$valor;}
	public static function getStreet(){return self::$_street_p;}
	
	public static function setExtNumber($valor){self::$_extNumber_p=$valor;}
	public static function getExtnumber() {return self::$_extNumber_p;}
	
	public static function setIntNumber($valor){self::$_intNumber_p=$valor;}
	public static function getIntNumber(){return self::$_intNumber_p;}
	
	public static function setRegion($valor){self::$_region_p=$valor;}
	public static function getRegion(){return self::$_region_p;}

	public static function setZone($valor){self::$_zone_p=$valor;}
	public static function getZone(){return self::$_zone_p;}

	public static function setProvince($valor){self::$_province_p=$valor;}
	public static function getProvince(){return self::$_province_p;}

	public static function setZipCode($valor){self::$_zipCode_p=$valor;}
	public static function getZipCode(){return self::$_zipCode_p;}

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
	
	public static function setfkEnterpriseGroup($valor){self::$_fkEnterpriseGroup_p=$valor;}
	public static function getEnterpriseGroup()	{return self::$_fkEnterpriseGroup_p;}
	
	public function __construct(){
	//Inicializar los atributos
	}
    public static function getAll(){
        try {
			$connection = Database::instance();
			$sql = "SELECT * from Company";
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
            $sql = "SELECT * from company WHERE pkCompany = ?";
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
            $sql = "INSERT INTO $data VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
            $query = $connection->prepare($sql);
            $query->bindParam(1, self::$_pkCompany_p, \PDO::PARAM_INT);
			$query->bindParam(2, self::$_legalName_p, \PDO::PARAM_INT);
			$query->bindParam(3, self::$_commercialName_p, \PDO::PARAM_STR);
			$query->bindParam(4, self::$_taxId_p, \PDO::PARAM_STR);
            $query->bindParam(5, self::$_logoFile_p, \PDO::PARAM_INT);
			$query->bindParam(6, self::$_street_p, \PDO::PARAM_STR);
			$query->bindParam(7, self::$_extNumber_p, \PDO::PARAM_STR);
			$query->bindParam(8, self::$_intNumber_p, \PDO::PARAM_STR);
            $query->bindParam(9, self::$_region_p, \PDO::PARAM_INT);
			$query->bindParam(10, self::$_zone_p, \PDO::PARAM_STR);
			$query->bindParam(11, self::$_province_p, \PDO::PARAM_STR);
			$query->bindParam(12, self::$_zipCode_p, \PDO::PARAM_STR);
			$query->bindParam(13, self::$_created_p, \PDO::PARAM_STR);
			$query->bindParam(14, self::$_createdBy_p, \PDO::PARAM_STR);
			$query->bindParam(15, self::$_modified_p, \PDO::PARAM_STR);
			$query->bindParam(16, self::$_modifiedBy_p, \PDO::PARAM_STR);
            $query->bindParam(17, self::$_active_p, \PDO::PARAM_STR);
			$query->bindParam(18, self::$_fkEnterpriseGroup_p, \PDO::PARAM_INT);
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

