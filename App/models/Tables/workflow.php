<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date Miércoles 5 de diciembre de 2012
// | @Version 1.0
// +-----------------------------------------------
// +---------------------------Comentarios de versión
namespace App\Models\Tables;
defined("APPPATH") OR die("Access denied");

use \App\Data\DataPresentation as DP;
//use \App\Data\Fields as Fi;

class WorkFlow extends DP{
/*******************************************************************************
*                                                                              *
*                           ##########REQUEST##########                        *
*                                                                              *
*******************************************************************************/
/*******************************************************************************
*                                                                              *
*                        ##########CONSTANTES##########                        *
*                                                                              *
*******************************************************************************/
/*******************************************************************************
*                                                                              *
*                         ##########ATRIBUTOS##########                        *
*                                                                              *
*******************************************************************************/
	//private static $_pkiBUserProfile;
	//private static $_profileName;
	private static $_pkWorkFlow;
	private static $_toBeCollected;
	private static $_toBeAssigned;
	private static $_toBeDiagnosed;
	private static $_diagnosisToBeAuthorized;
	private static $_toNotifyTheClient;
	private static $_toBeAuthorizedByClient;
	private static $_inRepairProcess;
	private static $_repaired;
	private static $_toDelivery;
	private static $_toBeCharged;
	private static $_deliveredToClient;
	private static $_cancelled;
/*******************************************************************************
*                                                                              *
*                       ##########PROPIEDADES##########                        *
*                                                                              *
*******************************************************************************/
	public static function _set_($atrib, $value){
        if (property_exists(__CLASS__,$atrib)){
			$this->$atrib=$value;
		}
        else{
			echo $atrib . "No existe en la clase" . __CLASS__;
		}
		
    }
	public static function _get_($atrib){
        if(property_exists(__CLASS__,$atrib)){
			return $this->$atrib;
		}
		else{
			echo $atrib . "No existe en la clase" . __CLASS__;
		}
    }
	//public static function setpkiBUserProfile($valor){self::$_pkiBUserProfile=$valor;}
	//public static function getpkiBUserProfile() {return self::$_pkiBUserProfile;}
	//public static function setProfileName($valor){self::$_profileName=$valor;}
	//public static function getProfileName() {return self::$_profileName;}
	public static function setToBeCollected($valor){self::$_toBeCollected=$valor;}
	public static function getToBeCollected(){return self::$_toBeCollected;}
	public static function setToBeAssigned($valor){self::$_toBeAssigned=$valor;}
	public static function getToBeAssigned()	{return self::$_toBeAssigned;}
	public static function setToBeDiagnosed($valor){self::$_toBeDiagnosed=$valor;}
	public static function getToBeDiagnosed()	{return self::$_toBeDiagnosed;}
	public static function setDiagnosisToBeAuthorized($valor){self::$_diagnosisToBeAuthorized=$valor;}
	public static function getDiagnosisToBeAuthorized()	{return self::$_diagnosisToBeAuthorized;}
	public static function setToNotifyTheClient($valor){self::$_toNotifyTheClient=$valor;}
	public static function getToNotifyTheClient()	{return self::$_toNotifyTheClient;}
	public static function setToBeAuthorizedByClient($valor){self::$_toBeAuthorizedByClient=$valor;}
	public static function getToBeAuthorizedByClient(){return self::$_toBeAuthorizedByClient;}
	public static function setInRepairProcess($valor){self::$_inRepairProcess=$valor;}
	public static function getInRepairProcess(){return self::$_inRepairProcess;}
	public static function setRepaired($valor){self::$_repaired=$valor;}
	public static function getRepaired(){return self::$_repaired;}
	public static function setToDelivery($valor){self::$_toDelivery=$valor;}
	public static function getToDelivery()	{return self::$_toDelivery;}
	public static function setToBeCharged($valor){self::$_toBeCharged=$valor;}
	public static function getToBeCharged()	{return self::$_toBeCharged;}
	public static function setDeliveredToClient($valor){self::$_deliveredToClient=$valor;}
	public static function getDeliveredToClient()	{return self::$_deliveredToClient;}
	public static function setCancelled($valor){self::$_cancelled=$valor;}
	public static function getCancelled()	{return self::$_cancelled;}
/*******************************************************************************
*                                                                              *
*                  ##########MÉTODOS ABSTRACTOS##########                      *
*                                                                              *
*******************************************************************************/
/*******************************************************************************
*                                                                              *
*                  ######CONSTRUCTORES Y DESTRUCTORES####                      *
*                                                                              *
*******************************************************************************/
	public function __construct(){
		self::Profiles();
	}
/*******************************************************************************
*                                                                              *
*                  ##########MÉTODOS MÁGICOS##########                         *
*                                                                              *
*******************************************************************************/
	public static function __getter($field){
		return $this->tableFields->getValue($field);
	}
	public static function __setter($field,$value){
		$this->tableFields->setValue($field,$value)
	}
/*******************************************************************************
*                                                                              *
*                  ##########MÉTODOS PÚBLICOS##########                        *
*                                                                              *
*******************************************************************************/
	public static function Profiles(){
		$this->tableSize=12;
		$this->tableName="osworkflow";
		$this->tableFields=new Fi($this->tableSize);
		
		$this->tableFields->setValue(0,'0');
		$this->tableFields->setName(0,'pkOSworkflow');
		$this->tableFields->setType(0,DT['STRING']);
		$this->tableFields->setKey(0,PK['SI']);
		$this->tableFields->setAI(0,AI['SI']);
		
		$this->tableFields->setValue(1,'');
		$this->tableFields->setName(1,'RE');
		$this->tableFields->setType(1,DT['STRING']);
		$this->tableFields->setKey(1,PK['NO']);
		$this->tableFields->setAI(1,AI['NO']);
		
		$this->tableFields->setValue(2,'');
		$this->tableFields->setName(2,'AS');
		$this->tableFields->setType(2,DT['STRING']);
		$this->tableFields->setKey(2,PK['NO']);
		$this->tableFields->setAI(2,AI['NO']);
		
		$this->tableFields->setValue(3,'');
		$this->tableFields->setName(3,'PD');
		$this->tableFields->setType(3,DT['STRING']);
		$this->tableFields->setKey(3,PK['NO']);
		$this->tableFields->setAI(3,AI['NO']);
		
		$this->tableFields->setValue(4,'');
		$this->tableFields->setName(4,'AD');
		$this->tableFields->setType(4,DT['STRING']);
		$this->tableFields->setKey(4,PK['NO']);
		$this->tableFields->setAI(4,AI['NO']);
		
		$this->tableFields->setValue(5,'');
		$this->tableFields->setName(5,'PN');
		$this->tableFields->setType(5,DT['STRING']);
		$this->tableFields->setKey(5,PK['NO']);
		$this->tableFields->setAI(5,AI['NO']);
		
		$this->tableFields->setValue(6,'');
		$this->tableFields->setName(6,'PA');
		$this->tableFields->setType(6,DT['STRING']);
		$this->tableFields->setKey(6,PK['NO']);
		$this->tableFields->setAI(6,AI['NO']);
		
		$this->tableFields->setValue(7,'');
		$this->tableFields->setName(7,'PR');
		$this->tableFields->setType(7,DT['STRING']);
		$this->tableFields->setKey(7,PK['NO']);
		$this->tableFields->setAI(7,AI['NO']);
		
		$this->tableFields->setValue(8,'');
		$this->tableFields->setName(8,'TE');
		$this->tableFields->setType(8,DT['STRING']);
		$this->tableFields->setKey(8,PK['NO']);
		$this->tableFields->setAI(8,AI['NO']);
		
		$this->tableFields->setValue(9,'');
		$this->tableFields->setName(9,'PS');
		$this->tableFields->setType(9,DT['STRING']);
		$this->tableFields->setKey(9,PK['NO']);
		$this->tableFields->setAI(9,AI['NO']);
		
		$this->tableFields->setValue(10,'');
		$this->tableFields->setName(10,'EC');
		$this->tableFields->setType(10,DT['STRING']);
		$this->tableFields->setKey(10,PK['NO']);
		$this->tableFields->setAI(10,AI['NO']);
		
		$this->tableFields->setValue(11,'');
		$this->tableFields->setName(11,'OK');
		$this->tableFields->setType(11,DT['STRING']);
		$this->tableFields->setKey(11,PK['NO']);
		$this->tableFields->setAI(11,AI['NO']);
		
		$this->tableFields->setValue(12,'');
		$this->tableFields->setName(12,'CA');
		$this->tableFields->setType(12,DT['STRING']);
		$this->tableFields->setKey(12,PK['NO']);
		$this->tableFields->setAI(12,AI['NO']);		
			
/*******************************************************************************
*                                                                              *
*                  ##########MÉTODOS PRIVADOS##########                        *
*                                                                              *
*******************************************************************************/
/*******************************************************************************
*                                                                              *
*                  ##########EVENTOS##########                                 *
*                                                                              *
*******************************************************************************/
/*******************************************************************************
*                                                                              *
*                  ##########CONTROLES##########                               *
*                                                                              *
*******************************************************************************/
}
/*******************************************************************************
*                                                                              *
*                  ##########MAIN##########                                    *
*                                                                              *
*******************************************************************************/
?>