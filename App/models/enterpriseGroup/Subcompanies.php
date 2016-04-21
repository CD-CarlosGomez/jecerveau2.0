<?php
// +-----------------------------------------------
// | @author Carlos M. G�mez
// | @date Mi�rcoles 5 de diciembre de 2012
// | @Version 1.0
// +-----------------------------------------------
// +---------------------------Comentarios de versi�n
namespace App\Models\EnterpriseGroup;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\Interfaces\iCrud;

class Subcompanies implements iCrud{
//REQUEST############################################
//CONSTANTES#########################################
//ATRIBUTOS##########################################
	private static $_pkSubCompany_p;
	private static $_company_pkCompany_p;
	private static $_subCompanyName_p;
	private static $_active_p;
	private static $_created_p;
	private static $_createdBy_p;
	private static $_modified_p;//Agregar m�todo
	private static $_modifiedBy_p;//Agregar m�todo

//PROPIEDADES########################################
	public static function setPkSubCompany($valor){self::$_pkSubCompany_p=$valor;}
	public static function getPkSubCompany() {return self::$_pkSubCompany_p;}

	public static function setCompany_pkCompany($valor){self::$_company_pkCompany_p=$valor;}
	public static function getCompany_pkCompany(){return self::$_company_pkCompany_p;}
	
	public static function setSubCompanyName($valor){self::$_subCompanyName_p=$valor;}
	public static function getSubCompanyName(){return self::$_subCompanyName_p;}
	
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
	

//M�TODOS ABSTRACTOS#################################
//CONSTRUCTORES Y DESTRUCTORES#######################
	public function __construct(){
	//Inicializar los atributos
	}
//M�TODOS M�GICOS####################################
//M�TODOS P�BLICOS###################################
	public static function getAll(){
        try {
			$connection = Database::instance();
			$sql = "SELECT * from subCompanyName";
			$query = $connection->prepare($sql);
			$query->execute();
			return $query->fetchAll();
		}
        catch(\PDOException $e)
        {
			print "Error!: " . $e->getMessage();
		}
    }
	public static function selectKanbanSubcompany(){
		try{
			$PDOcnn=Database::instance();
			$PDOQuery=
			"
			SELECT * FROM `v_kanbansubcompany`
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
			SELECT * FROM `v_kanbansubcompany` WHERE pkcompany=$pk;
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
			
			//$pkTable=self::getNextId("pkSubCompany","subcompany");
            $sql = "INSERT INTO $data VALUES (?,?,?,?,?,?,?,?);";
            $query = $connection->prepare($sql);
            $query->bindParam(1, self::$_pkSubCompany_p, \PDO::PARAM_INT);
			$query->bindParam(2, self::$_company_pkCompany_p, \PDO::PARAM_INT);
			$query->bindParam(3, self::$_subCompanyName_p, \PDO::PARAM_STR);
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
			$PDOQuery=
			"
				SELECT 
					`pkSubCompany`, 
					`subCompanyName`
				FROM `subcompany` WHERE `active`='1'
			";
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
    		echo 'Incidencia al generar nuevo c�digo ',  $e->getMessage(), ".\n";
		}
		
	}
//M�TODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
//MAIN###############################################
}
