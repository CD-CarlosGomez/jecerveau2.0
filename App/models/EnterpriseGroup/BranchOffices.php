<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date Miércoles 5 de diciembre de 2012
// | @Version 1.0
// +-----------------------------------------------
// +---------------------------Comentarios de versión
namespace App\Models\EnterpriseGroup;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\Interfaces\iCrud;

class BranchOffices implements iCrud{
//REQUEST############################################
//CONSTANTES#########################################
//ATRIBUTOS##########################################
	private static $_pkBranchOffice_p;
	private static $_subCompany_pkSubCompany_p;
	private static $_BOName_p;
	private static $_BOstreet_p;
	private static $_BOextNumber_p;
	private static $_BOintNumber_p;
	private static $_BOregion_p;
	private static $_BOzone_p;
	private static $_BOprovince_p;
	private static $_BOzipCode_p;
	private static $_serviceAddress_p;
	private static $_serviceManager_p;
	private static $_serviceEmail_p;
	private static $_logoFile_p;
	private static $_officeHour_p;
	private static $_servicePhone_p;
	private static $_active_p;
	private static $_created_p;
	private static $_createdBy_p;
	private static $_modified_p;
	private static $_modifiedBy_p;
//PROPIEDADES########################################
	public static function setpkBO($valor){self::$_pkBranchOffice_p=$valor;}
	public static function getpkBO() {return self::$_pkBranchOffice_p;}
	public static function setpkSC($valor){self::$_subCompany_pkSubCompany_p=$valor;}
	public static function getpkSC() {return self::$_subCompany_pkSubCompany_p;}
	public static function setBOName($valor){self::$_BOName_p=$valor;}
	public static function getBOName(){return self::$_BOName_p;}
	public static function setBOStreet($valor){self::$_BOstreet_p=$valor;}
	public static function getBOStreet(){return self::$_BOstreet_p;}
	public static function setBOExtNumber($valor){self::$_BOextNumber_p=$valor;}
	public static function getBOExtnumber() {return self::$_BOextNumber_p;}
	public static function setBOIntNumber($valor){self::$_BOintNumber_p=$valor;}
	public static function getBOIntNumber(){return self::$_BOintNumber_p;}
	public static function setBORegion($valor){self::$_BOregion_p=$valor;}
	public static function getBORegion(){return self::$_BOregion_p;}
	public static function setBOZone($valor){self::$_BOzone_p=$valor;}
	public static function getBOZone(){return self::$_BOzone_p;}
	public static function setBOProvince($valor){self::$_BOprovince_p=$valor;}
	public static function getBOProvince(){return self::$_BOprovince_p;}
	public static function setBOZipCode($valor){self::$_BOzipCode_p=$valor;}
	public static function getBOZipCode()	{return self::$_BOzipCode_p;}
	public static function setServiceAddress($valor){self::$_serviceAddress_p=$valor;}
	public static function getServiceAddress()	{return self::$_serviceAddress_p;}
	public static function setServiceManager($valor){self::$_serviceManager_p=$valor;}
	public static function getServiceManager()	{return self::$_serviceManager_p;}
	public static function setServiceEmail($valor){self::$_serviceEmail_p=$valor;}
	public static function getServiceEmail()	{return self::$_serviceEmail_p;}
	public static function setLogoFile($valor){self::$_logoFile_p=$valor;}
	public static function getLogoFile()	{return self::$_logoFile_p;}
	public static function setOfficeHour($valor){self::$_officeHour_p=$valor;}
	public static function getOfficeHour()	{return self::$_officeHour_p;}
	public static function setServicePhone($valor){self::$_servicePhone_p=$valor;}
	public static function getServicePhone()	{return self::$_servicePhone_p;}
	public static function setActive($valor){self::$_active_p=$valor;}
	public static function getActive()	{return self::$_active_p;}
	public static function setCreated($valor){self::$_created_p=$valor;}
	public static function getCreated()	{return self::$_created_p;}
	public static function setCreatedBy($valor){self::$_createdBy_p=$valor;}
	public static function getCreatedBy()	{return self::$_createdBy_p;}
	public static function setModified($valor){self::$_modified_p=$valor;}
	public static function getModified()	{return self::$_modified_p;}
	public static function setModifiedBy($valor){self::$_modifiedBy_p=$valor;}
	public static function getModifiedBy()	{return self::$_modifiedBy_p;}	

//MÉTODOS ABSTRACTOS#################################
//CONSTRUCTORES Y DESTRUCTORES#######################
	public function __construct(){
	//Inicializar los atributos
	}
//MÉTODOS MÁGICOS####################################
//MÉTODOS PÚBLICOS###################################
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
	public static function selectKanbanBO(){
		try{
			$PDOcnn=Database::instance();
			$PDOQuery=
			"
			SELECT * FROM `v_kanbanbo`;
			";
		
			$resultSet=$PDOcnn->query($PDOQuery);
			return $resultSet;
		}
		catch(\PDOException $e){
			print "Error!: " . $e->getMessage();
		}
	}
	public static function SelectKanbanCompanyNumber($pk){
		try{
			$PDOcnn=Database::instance();
			$PDOQuery=
			"
			SELECT * FROM `v_kanbanbo`  WHERE pkcompany=$pk;
			";
		
			$resultSet=$PDOcnn->query($PDOQuery);
			return $resultSet;
		}
		catch(\PDOException $e){
			print "Error!: " . $e->getMessage();
		}
	}
	public static function SelectKanbanSubcompanyNumber($pk){
		try{
			$PDOcnn=Database::instance();
			$PDOQuery=
			"
			SELECT * FROM `v_kanbanbo` WHERE pkSubCompany=$pk;
			";
		
			$resultSet=$PDOcnn->query($PDOQuery);
			return $resultSet;
		}
		catch(\PDOException $e){
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
	public static function getBOSById($id) {
	    try {
            $PDOcnn = Database::instance();
            $sql = 
			"
			SELECT 
				c.commercialName,
				sc.subCompanyName,
				bo.pkBranchOffice,
				bo.BOName,
				bos.fkCountry,
				bos.folioStart,
				bos.folioSerie
			FROM branchofficesetting bos 
				INNER JOIN branchoffice bo 
					ON bos.BranchOffice_pkBranchOffice=bo.pkBranchOffice
				INNER JOIN subcompany sc
					ON bo.subcompany_pkSubCompany= sc.pkSubCompany
				INNER JOIN company c
					ON sc.pkSubCompany=c.pkCompany
			WHERE bos.BranchOffice_pkBranchOffice=$id";
            $resultSet=$PDOcnn->query($sql);
            return $resultSet;
        }
        catch(\PDOException $e){
            print "Error!: " . $e->getMessage();
        }
    }
	public static function insertData($data){
		try {
            $connection = Database::instance();
			//$pkTable=self::getNextId("pkBranchOffice","branchoffice");
            $sql = "INSERT INTO $data VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
            $query = $connection->prepare($sql);
            $query->bindParam(1, self::$_pkBranchOffice_p, \PDO::PARAM_INT);
            $query->bindParam(2, self::$_subCompany_pkSubCompany_p, \PDO::PARAM_INT);
			$query->bindParam(3, self::$_BOName_p, \PDO::PARAM_STR);
			$query->bindParam(4, self::$_BOstreet_p, \PDO::PARAM_STR);
			$query->bindParam(5, self::$_BOextNumber_p, \PDO::PARAM_STR);
			$query->bindParam(6, self::$_BOintNumber_p, \PDO::PARAM_STR);
            $query->bindParam(7, self::$_BOregion_p, \PDO::PARAM_STR);
			$query->bindParam(8, self::$_BOzone_p, \PDO::PARAM_STR);
			$query->bindParam(9, self::$_BOprovince_p, \PDO::PARAM_STR);
			$query->bindParam(10, self::$_BOzipCode_p, \PDO::PARAM_STR);
			$query->bindParam(11, self::$_serviceAddress_p, \PDO::PARAM_STR);
            $query->bindParam(12, self::$_serviceManager_p, \PDO::PARAM_STR);
            $query->bindParam(13, self::$_serviceEmail_p, \PDO::PARAM_STR);
            $query->bindParam(14, self::$_logoFile_p, \PDO::PARAM_STR);
            $query->bindParam(15, self::$_officeHour_p, \PDO::PARAM_STR);
            $query->bindParam(16, self::$_servicePhone_p, \PDO::PARAM_STR);
            $query->bindParam(17, self::$_active_p, \PDO::PARAM_STR);
			$query->bindParam(18, self::$_created_p, \PDO::PARAM_STR);
			$query->bindParam(19, self::$_createdBy_p, \PDO::PARAM_STR);
			$query->bindParam(20, self::$_modified_p, \PDO::PARAM_STR);
			$query->bindParam(21, self::$_modifiedBy_p, \PDO::PARAM_STR);
			$query->execute();
            return true;
        }
        catch(\PDOException $e){
            print "Error!: " . $e->getMessage();
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
	public static function getParcialSelect(){
		try {
			$PDOcnn = Database::instance();
			$PDOQuery="SELECT 
							`pkBranchOffice`, 
							`commercialName`, 
							`Company_pkCompany`, 
							`BOName`, 
							`BOStreet`, 
							`BOExtNumber`, 
							`BOIntNumber`, 
							`BORegion`, 
							`BOZone`, 
							`BOProvince`, 
							`BOZipCode`
					FROM `branchoffice` bo 
						INNER JOIN company 
							ON company.pkCompany=bo.Company_pkCompany 
					WHERE bo.`Active`=1 ;";
			$PDOResultSet = $PDOcnn->query($PDOQuery);
			return $PDOResultSet;
		}
        catch(\PDOException $e)
        {
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
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
}
//MAIN###############################################
