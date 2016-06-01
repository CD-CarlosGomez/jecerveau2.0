<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date 5 de Marzo del 2016
// | @Version 1.0
// +-----------------------------------------------
namespace Core;
defined("APPPATH") OR die("Access denied");
use \Core\App;

/**
 * @class Database
 */
class Database{
//CONSTANTES#########################################
	/**
	 * Define el puerto de la BD en caso de ser necesario
	 * @var int
	 */
	const DB_MYSQLI_PORT = 3306;
//ATRIBUTOS##########################################
	/**
	* @desc nombre del usuario de la base de datos
	* @var $_dbUsuario
	* @access private
	*/
	private $_dbUsuario;
	/**
	* @desc password de la base de datos
	* @var $_dbContrasena
	* @access private
	*/
	private $_dbContrasena;
	/**
	* @desc nombre del host
	* @var $_dbHost
	* @access private
	*/
	private $_dbHost;
	/**
	* @desc nombre de la base de datos
	* @var $_dbNombre
	* @access protected
	*/
	protected $_dbNombre;
	/**
	* @desc conexión a la base de datos
	* @var $_cnn
	* @access private
	*/
	private $_cnn;
    /**
    * @desc instancia de la base de datos
    * @var $_instancia
    * @access private
    */
    private static $_instancia;
//PROPIEDADES########################################
//MÉTODOS ABSTRACTOS#################################
//MÉTODOS PÚBLICOS###################################
	/**
	 * [__construct]
	 */
    private function __construct(){
       try {
		   //load from config/config.ini
		   $config = App::getConfig();
		   $this->_dbHost = $config["host"];
		   $this->_dbUsuario = $config["user"];
		   $this->_dbContrasena = $config["password"];
		   $this->_dbNombre = $config["database"];

           $this->_cnn = new \PDO('mysql:host='.$this->_dbHost.'; dbname='.$this->_dbNombre, $this->_dbUsuario, $this->_dbContrasena);
           $this->_cnn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
           $this->_cnn->exec("SET CHARACTER SET utf8");
       }
       catch (\PDOException $e)
       {
           print "Error!: " . $e->getMessage();
           die();
       }
    }
	/**
	 * [prepare]
	 * @param  [type] $sql [description]
	 * @return [type]      [description]
	 */
	public function prepare($sql) {
        return $this->_cnn->prepare($sql);
    }
	/**
	 * [instance singleton]
	 * @return [object] [class database]
	 */
    public static function instance() {
        if (!isset(self::$_instancia)) {
            $class = __CLASS__;
            self::$_instancia = new $class;
        }
        return self::$_instancia;
    }
    /**
     * [__clone Evita que el objeto se pueda clonar]
     * @return [type] [message]
     */
    public function __clone(){
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }
	/**
     * 
     * 
     */
	public function query($sql){
		return $this->_cnn->query($sql);
	}
	/**
     * 
     * 
     */
	public function fetch_assoc($query){
		return $this->_cnn->$query->fetch(\PDO::FETCH_ASSOC);
	}
	/**
     * 
     * 
     */
	public function exec($SQLQuery){
		return $this->_cnn->exec($SQLQuery);
	}
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
//MAIN###############################################


	
}
