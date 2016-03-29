<?php
namespace App\Models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\Interfaces\iCrud;

class Users implements iCrud{
	
	private static $_pkibuser;
	private static $_fkiBUserProfile;
	private static $_username;
	private static $_pwd;
	private static $_pwdtmp;
	private static $_realname;
	private static $_email;
	private static $_active;
	private static $_defaultFunction;
	private static $_Created;
	private static $_CreatedBy;
	private static $_Modified;
	private static $_ModifiedBy;
		
	public function __construct(){
	$_pkibuser=0;
	$_fkiBUserProfile=0;
	$_username="";
	$_pwd="";
	$_pwdtmp="";
	$_realname="";
	$_email="";
	$_active="2";
	$_defaultFunction="#";
	$_Created="";
	$_CreatedBy="";
	$_Modified="";
	$_ModifiedBy="";
	}
	
	public static function setpkiBUser($valor){self::$_pkibuser=$valor;}
	public static function getpkiBUser() {return self::$_pkibuser;}
	
	public static function setfkiBUserProfile($valor){self::$_fkiBUserProfile=$valor;}
	public static function getfkiBUserProfile() {return self::$_fkiBUserProfile;}
	
	public static function setUserName($valor){self::$_username=$valor;}
	public static function getNombre(){return self::$_username;}
	
	public static function setPWD($valor){self::$_pwd=$valor;}
	public static function getPWD()	{return self::$_pwd;}
	
	public static function setPWDTmp($valor){self::$_pwdtmp=$valor;}
	public static function getPWDTmp()	{return self::$_pwdtmp;}
	
	public static function setRealName($valor){self::$_realname=$valor;}
	public static function getRealName()	{return self::$_realname;}
	
	public static function setEmail($valor){self::$_email=$valor;}
	public static function getEmail()	{return self::$_email;}
	
	public static function setActive($valor){self::$_active=$valor;}
	public static function getActive(){return self::$_active;}
	
	public static function setDefaultF($valor){self::$_defaultFunction=$valor;}
	public static function getDefaultF(){return self::$_defaultFunction;}
	
	public static function setCreated($valor){self::$_Created=$valor;}
	public static function getCreated()	{return self::$_Created;}

	public static function setCreatedBy($valor){self::$_CreatedBy=$valor;}
	public static function getCreatedBy()	{return self::$_CreatedBy;}
	
	public static function setModified($valor){self::$_Modified=$valor;}
	public static function getModified()	{return self::$_modified;}
	
	public static function setModifiedBy($valor){self::$_ModifiedBy=$valor;}
	public static function getModifiedBy()	{return self::$_modifiedBy;}
	
    public static function getAll(){
        try {
			$connection = Database::instance();
			$sql = "SELECT * from ibuser";
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
    public static function insertData($data){
		try {
            $connection = Database::instance();
			//self::setpkiBUser(self::getNextId("pkiBUser","ibuser"));
            $sql = "INSERT INTO $data VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);";
            $query = $connection->prepare($sql);
            $query->bindParam(1, self::$_pkibuser, \PDO::PARAM_INT);
			$query->bindParam(2, self::$_fkiBUserProfile, \PDO::PARAM_INT);
			$query->bindParam(3, self::$_username, \PDO::PARAM_STR);
			$query->bindParam(4, self::$_pwd, \PDO::PARAM_STR);
            $query->bindParam(5, self::$_pwdtmp, \PDO::PARAM_STR);
			$query->bindParam(6, self::$_realname, \PDO::PARAM_STR);
			$query->bindParam(7, self::$_email, \PDO::PARAM_STR);
			$query->bindParam(8, self::$_active, \PDO::PARAM_STR);
            $query->bindParam(9, self::$_defaultFunction, \PDO::PARAM_STR);
			$query->bindParam(10, self::$_Created, \PDO::PARAM_STR);
			$query->bindParam(11, self::$_CreatedBy, \PDO::PARAM_STR);
			$query->bindParam(12, self::$_Modified, \PDO::PARAM_STR);
			$query->bindParam(13, self::$_ModifiedBy, \PDO::PARAM_STR);
            $query->execute();
            return true;
        }
        catch(\PDOException $e){
            print "Error!: " . $e->getMessage();
        }
    }
	public static function insertProfileHasFunction($pkiBUserProfile,$pkiBFunctionGroup){
		try {
            $connection = Database::instance();
			$sql = "INSERT INTO ibuserprofile_has_ibfunction VALUES (?,?);";
            $query = $connection->prepare($sql);
            $query->bindParam(1, $pkiBUserProfile, \PDO::PARAM_INT);
			$query->bindParam(2, $pkiBFunctionGroup, \PDO::PARAM_INT);
			$query->execute();
            return true;
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
	public static function updateProfile($pkiBUserProfile,$pkiBUser){
		try {
            $connection = Database::instance();
            $sql = "
						UPDATE `ibuser` 
							SET `fkiBUserProfile` = ? 
						WHERE `ibuser`.`pkiBUser` = ?;";
            
			$query = $connection->prepare($sql);
            
			$query->bindParam(1, $pkiBUserProfile, \PDO::PARAM_INT);
			$query->bindParam(2, $pkiBUser, \PDO::PARAM_INT);
			
            $query->execute();
            return true;//$query->fetch();
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
	public static function getParcialSelect(){
		 try {
			$PDOcnn = Database::instance();
			$PDOQuery="SELECT 
							`pkiBUser`,
							pkiBUserProfile,
							`fkiBUserProfile`, 
							`username`, 
							`realname`,
							`email`,
							profileName
						FROM `ibuser` 
							INNER JOIN ibuserprofile
								ON fkiBUserProfile=pkiBUserProfile
						WHERE Active=1 or Active=2;";
			$PDOResultSet = $PDOcnn->query($PDOQuery);
			return $PDOResultSet;
		}
        catch(\PDOException $e)
        {
			print "Error!: " . $e->getMessage();
		}
	}
	
}
?>