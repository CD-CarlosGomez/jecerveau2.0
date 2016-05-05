<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date Miércoles 5 de diciembre de 2012
// | @Version 1.0
// +-----------------------------------------------
// +---------------------------Comentarios de versión
namespace App\Models\Contacts;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\Interfaces\iCrud;

class Contacts implements iCrud{
//REQUEST############################################
//CONSTANTES#########################################
//ATRIBUTOS##########################################
	private static $_pkCustomerContact_p;
	private static $_contactName_p;
	private static $_contactEmail_p;
	private static $_contactPhone_p;
	private static $_contactMovil_p;
	private static $_contactAddress_p;
	private static $_contactLocation_p;
	private static $_contactCounty_p;
	private static $_contactProvince_p;
	private static $_contactZipCode_p;
	private static $_contactObs_p;
//PROPIEDADES########################################
	public static function setpkContact($valor){
		self::$_pkCustomerContact_p=$valor;
	}
	public static function getpkContact() {
		return self::$_pkCustomerContact_p;
	}
	public static function setContactName($valor){
		self::$_contactName_p=$valor;
	}
	public static function getContactName(){
		return self::$_contactName_p;
	}
	public static function setContactEmail($valor){
		self::$_contactEmail_p=$valor;
	}
	public static function getContactEmail(){
		return self::$_contactEmail_p;
	}
	public static function setContactPhone($valor){
		self::$_contactPhone_p=$valor;
	}
	public static function getcontactPhone(){
		return self::$_contactPhone_p;
	}
	public static function setContactMovil($valor){
		self::$_contactMovil_p=$valor;
	}
	public static function getContactMovil(){
		return self::$_contactMovil_p;
	}
	public static function setContactAddress($valor){
		self::$_contactAddress_p=$valor;
	}
	public static function getContactAddress(){
		return self::$_contactAddress_p;
	}
	public static function setContactLocation($valor){
		self::$_contactLocation_p=$valor;
	}
	public static function getContactLocation()	{
		return self::$_contactLocation_p;
	}
	public static function setContactCounty($valor){
		self::$_contactCounty_p=$valor;
	}
	public static function getContactCounty(){
		return self::$_contactCounty_p;
	}
	public static function setContactProvince($valor){
		self::$_contactProvince_p=$valor;
	}
	public static function getContactProvince(){
		return self::$_contactProvince_p;
	}
	public static function setContactZipCode($valor){
		self::$_contactZipCode_p=$valor;
	}
	public static function getContactZipCode(){
		return self::$_contactZipCode_p;
	}
	public static function setContactObs($valor){
		self::$_contactObs_p=$valor;
	}
	public static function getContactObs(){
		return self::$_contactObs_p;
	}
		
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
			$sql = "SELECT * from customercontact";
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
	public static function getAutocompleteCommand($table,$column,$param){
		try {
            $PDOcnn = Database::instance();
            $sql = 
			"
			SELECT 
				$column
			FROM $table
			WHERE 
				$column LIKE '" . $param ."%';
			";
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
            $sql = "INSERT INTO $data VALUES (?,?,?,?,?,?,?,?,?,?,?);";
            $query = $connection->prepare($sql);
            $query->bindParam(1, self::$_pkCustomerContact_p, \PDO::PARAM_INT);
			$query->bindParam(2, self::$_contactName_p, \PDO::PARAM_STR);
			$query->bindParam(3, self::$_contactEmail_p, \PDO::PARAM_STR);
			$query->bindParam(4, self::$_contactPhone_p, \PDO::PARAM_STR);
			$query->bindParam(5, self::$_contactMovil_p, \PDO::PARAM_STR);
			$query->bindParam(6, self::$_contactAddress_p, \PDO::PARAM_STR);
			$query->bindParam(7, self::$_contactLocation_p, \PDO::PARAM_STR);
			$query->bindParam(8, self::$_contactCounty_p, \PDO::PARAM_STR);
			$query->bindParam(9, self::$_contactProvince_p, \PDO::PARAM_STR);
			$query->bindParam(10, self::$_contactZipCode_p, \PDO::PARAM_STR);
			$query->bindParam(11, self::$_contactObs_p, \PDO::PARAM_STR);
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
						`pkCompany`, 
						`legalName`, 
						`commercialName`
					FROM `company` WHERE `Active`=1;";
			$PDOResultSet = $PDOcnn->query($PDOQuery);
			return $PDOResultSet;
		}
        catch(\PDOException $e)
        {
			print "Error!: " . $e->getMessage();
		}
	}
	public static function getpknaSelect(){
		 try {
			$PDOcnn = Database::instance();
			$PDOQuery="SELECT 
						`pkSubCompany`,  
						`subCompanyName` 
					FROM `subcompany` WHERE `Active`=1;";
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
//MAIN###############################################
}

