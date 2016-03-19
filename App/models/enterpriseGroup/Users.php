<?php
namespace App\Models\Users;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\Interfaces\iCrud;

class Users implements iCrud{
	private $_pkibuser;
	private $_username;
	private $_pwd;
	private $_active;
	
	public function __construct(){
	$this->_pkibuser=0;
	$this->_username="";
	$this->_pwd="";
	$this->_active="1";
	}
	
	public static function setpkiBUser($valor){$this->_pkibuser=$valor;}
	public static function getpkiBUser() {return $this->_pkibuser;}
	public static function setUserName($valor){$this->_username=$valor;}
	public static function getNombre(){return $this->_username;}
	public static function setPWD($valor){$this->_pwd=$valor;}
	public static function getPWD()	{return $this->_pwd;}
	public static function setActive($valor){$this->_active=$valor;}
	public static function getActive(){return $this->_active;}
	
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
}
