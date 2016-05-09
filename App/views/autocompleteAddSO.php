<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date Miércoles 5 de diciembre de 2012
// | @Version 1.0
// +-----------------------------------------------
// +---------------------------Comentarios de 

namespace App\web\ajax;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\Models\Contacts\Contacts as Co;

class autocompleteAddSO {
/*******************************************************************************
*                                                                              *
*                           ##########REQUEST##########                        *
*                                                                              *
*******************************************************************************/
//if($_GET['type'] == 'phone'){$param='contactPhone';}// para usarse con clases
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
/*******************************************************************************
*                                                                              *
*                       ##########PROPIEDADES##########                        *
*                                                                              *
*******************************************************************************/
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
/*******************************************************************************
*                                                                              *
*                  ##########MÉTODOS MÁGICOS##########                         *
*                                                                              *
*******************************************************************************/
/*******************************************************************************
*                                                                              *
*                  ##########MÉTODOS PÚBLICOS##########                        *
*                                                                              *
*******************************************************************************/
	public static function findPhoneCtrl($table,$column,&$param){
		$resultSet = Co::getAutocompleteCommand('customercontact','contactPhone',$param);	
		$data = array();
		while ($row = $resultSet->fetch(\PDO::FETCH_ASSOC)) {
			array_push($data, $row['contactPhone']);	
		}	
		echo json_encode($data);
	
	}
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
if(@$_GET['type'] == 'phone'){
			$PDOcnn=Database::instance();
			$row_num = $_GET['row_num'];
			$PDOQuery = ("SELECT DISTINCT * FROM customercontact where contactPhone LIKE '".strtoupper($_GET['name_startsWith'])."%'" . "GROUP BY contactPhone;");	
			$resultSet=$PDOcnn->query($PDOQuery);
			$rowcount=$resultSet->rowCount();
			$data = array();
			
			if ($rowcount>0){
				while ($row = $resultSet->fetch(\PDO::FETCH_ASSOC)) {
					$contact =
						 $row['contactName']
					.'|'.$row['contactEmail']
					.'|'.$row['contactPhone']
					.'|'.$row['contactMovil']
					.'|'.$row['contactAddress']
					.'|'.$row['contactLocation']
					.'|'.$row['contactCounty']
					.'|'.$row['contactProvince']
					.'|'.$row['contactZipCode']
					.'|'.$row['contactObs']
					.'|'.$row_num;
					array_push($data, $contact);	
				}	
			}
			else{
					$row=array();
					$row['contactName']="";
					$row['contactEmail']="";
					$row['contactPhone']="No se encontraron resultados...";
					$row['contactMovil']="";
					$row['contactAddress']="";
					$row['contactLocation']="";
					$row['contactCounty']="";
					$row['contactProvince']="";
					$row['contactZipCode']="";
					$row['contactObs']="";
					
				$contact =
						 $row['contactName']
					.'|'.$row['contactEmail']
					.'|'.$row['contactPhone']
					.'|'.$row['contactMovil']
					.'|'.$row['contactAddress']
					.'|'.$row['contactLocation']
					.'|'.$row['contactCounty']
					.'|'.$row['contactProvince']
					.'|'.$row['contactZipCode']
					.'|'.$row['contactObs']
					.'|'.$row_num;			
				array_push($data, $contact);
			}
			
			
				echo json_encode($data);
}
if(@$_GET['type'] == 'movil'){
			$PDOcnn=Database::instance();
			$row_num = $_GET['row_num'];
			$PDOQuery = ("SELECT DISTINCT * FROM customercontact where contactMovil LIKE '".strtoupper($_GET['name_startsWith'])."%'" . "GROUP BY contactMovil;");	
			$resultSet=$PDOcnn->query($PDOQuery);
			$rowcount=$resultSet->rowCount();
			$data = array();
			
			if ($rowcount>0){
				while ($row = $resultSet->fetch(\PDO::FETCH_ASSOC)) {
					$contact =
						 $row['contactName']
					.'|'.$row['contactEmail']
					.'|'.$row['contactPhone']
					.'|'.$row['contactMovil']
					.'|'.$row['contactAddress']
					.'|'.$row['contactLocation']
					.'|'.$row['contactCounty']
					.'|'.$row['contactProvince']
					.'|'.$row['contactZipCode']
					.'|'.$row['contactObs']
					.'|'.$row_num;
					array_push($data, $contact);
					
				}
			}
			else{
				$row=array();
					$row['contactName']="";
					$row['contactEmail']="";
					$row['contactPhone']="";
					$row['contactMovil']="No se encontraron resultados...";
					$row['contactAddress']="";
					$row['contactLocation']="";
					$row['contactCounty']="";
					$row['contactProvince']="";
					$row['contactZipCode']="";
					$row['contactObs']="";
					
				$contact =
						 $row['contactName']
					.'|'.$row['contactEmail']
					.'|'.$row['contactPhone']
					.'|'.$row['contactMovil']
					.'|'.$row['contactAddress']
					.'|'.$row['contactLocation']
					.'|'.$row['contactCounty']
					.'|'.$row['contactProvince']
					.'|'.$row['contactZipCode']
					.'|'.$row['contactObs']
					.'|'.$row_num;			
				array_push($data, $contact);
			}
		echo json_encode($data);
}
if(@$_GET['type'] == 'name'){
			$PDOcnn=Database::instance();
			$row_num = $_GET['row_num'];
			$PDOQuery = ("SELECT DISTINCT * FROM customercontact where contactName LIKE '".strtoupper($_GET['name_startsWith'])."%'" . "GROUP BY contactName;");	
			$resultSet=$PDOcnn->query($PDOQuery);
			$data = array();
			$rowcount=$resultSet->rowCount();
			
			if ($rowcount>0){
				while ($row = $resultSet->fetch(\PDO::FETCH_ASSOC)) {
					$contact =
						 $row['contactName']
					.'|'.$row['contactEmail']
					.'|'.$row['contactPhone']
					.'|'.$row['contactMovil']
					.'|'.$row['contactAddress']
					.'|'.$row['contactLocation']
					.'|'.$row['contactCounty']
					.'|'.$row['contactProvince']
					.'|'.$row['contactZipCode']
					.'|'.$row['contactObs']
					.'|'.$row_num;
					array_push($data, $contact);
					//array_push($data, $row['contactName']);	
				}
			}
			else{
				$row=array();
					$row['contactName']="No se encontraron resultados...";
					$row['contactEmail']="";
					$row['contactPhone']="";
					$row['contactMovil']="";
					$row['contactAddress']="";
					$row['contactLocation']="";
					$row['contactCounty']="";
					$row['contactProvince']="";
					$row['contactZipCode']="";
					$row['contactObs']="";
					
				$contact =
						 $row['contactName']
					.'|'.$row['contactEmail']
					.'|'.$row['contactPhone']
					.'|'.$row['contactMovil']
					.'|'.$row['contactAddress']
					.'|'.$row['contactLocation']
					.'|'.$row['contactCounty']
					.'|'.$row['contactProvince']
					.'|'.$row['contactZipCode']
					.'|'.$row['contactObs']
					.'|'.$row_num;			
				array_push($data, $contact);
			}
			
				echo json_encode($data);
}
if(@$_GET['type'] == 'email'){
			$PDOcnn=Database::instance();
			$row_num = $_GET['row_num'];
			$PDOQuery = ("SELECT DISTINCT * FROM customercontact where contactEmail LIKE '".strtoupper($_GET['name_startsWith'])."%'" . "GROUP BY contactEmail;");	
			$resultSet=$PDOcnn->query($PDOQuery);
			$data = array();
			$rowcount=$resultSet->rowCount();
			
			if ($rowcount>0){
				while ($row = $resultSet->fetch(\PDO::FETCH_ASSOC)) {
					$contact =
						 $row['contactName']
					.'|'.$row['contactEmail']
					.'|'.$row['contactPhone']
					.'|'.$row['contactMovil']
					.'|'.$row['contactAddress']
					.'|'.$row['contactLocation']
					.'|'.$row['contactCounty']
					.'|'.$row['contactProvince']
					.'|'.$row['contactZipCode']
					.'|'.$row['contactObs']
					.'|'.$row_num;
					array_push($data, $contact);
					//array_push($data, $row['contactEmail']);	
				}	
			}
			else{
				$row=array();
					$row['contactName']="";
					$row['contactEmail']="No se encontraron resultados...";
					$row['contactPhone']="";
					$row['contactMovil']="";
					$row['contactAddress']="";
					$row['contactLocation']="";
					$row['contactCounty']="";
					$row['contactProvince']="";
					$row['contactZipCode']="";
					$row['contactObs']="";
					
				$contact =
						 $row['contactName']
					.'|'.$row['contactEmail']
					.'|'.$row['contactPhone']
					.'|'.$row['contactMovil']
					.'|'.$row['contactAddress']
					.'|'.$row['contactLocation']
					.'|'.$row['contactCounty']
					.'|'.$row['contactProvince']
					.'|'.$row['contactZipCode']
					.'|'.$row['contactObs']
					.'|'.$row_num;			
				array_push($data, $contact);
			}
	echo json_encode($data);
}
?>




