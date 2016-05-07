<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date Miércoles 5 de diciembre de 2012
// | @Version 1.0
// +-----------------------------------------------
// +---------------------------Comentarios de versión
namespace App\Models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\data\Data as Da;
use \App\Interfaces\iCrud;

class Business implements iCrud{
//REQUEST############################################
//CONSTANTES#########################################
//ATRIBUTOS##########################################
//PROPIEDADES########################################
//MÉTODOS ABSTRACTOS#################################
//CONSTRUCTORES Y DESTRUCTORES#######################
	public function __construct(){
		$obj_Data_p=new Da();
	}
	public function Business(DatabaseExtended $cnn){
		$PDOcnn=$cnn;
	}
//MÉTODOS MÁGICOS####################################
//MÉTODOS PÚBLICOS###################################
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
	public static function selectKanbanCompany($pkiBUser){
		try{
			$PDOcnn=Database::instance();
			$PDOQuery=
			"
			SELECT * FROM `v_kanbancompany`;
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
            $sql = "INSERT INTO $data VALUES (?,?,?,?,?,?,?,?);";
            $query = $connection->prepare($sql);
            $query->bindParam(1, self::$_pkCompany_p, \PDO::PARAM_INT);
			$query->bindParam(2, self::$_legalName_p, \PDO::PARAM_STR);
			$query->bindParam(3, self::$_commercialName_p, \PDO::PARAM_STR);
			$query->bindParam(4, self::$_active_p, \PDO::PARAM_STR);
			$query->bindParam(5, self::$_created_p, \PDO::PARAM_STR);
			$query->bindParam(6, self::$_createdBy_p, \PDO::PARAM_STR);
			$query->bindParam(7, self::$_modified_p, \PDO::PARAM_STR);
			$query->bindParam(8, self::$_modifiedBy_p, \PDO::PARAM_STR);
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

