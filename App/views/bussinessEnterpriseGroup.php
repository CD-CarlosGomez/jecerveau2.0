<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date Miércoles 5 de diciembre de 2012
// | @Version 1.0
// +-----------------------------------------------
// +---------------------------Comentarios de versión
//GLOBALS para hacer la funciones del switch
namespace App\views;
defined("APPPATH") OR die("Access denied");

use \App\data\Crud as Crud;

/*******************************************************************************
*                                                                              *
*                           ##########REQUEST##########                        *
*                                                                              *
*******************************************************************************/
if($_POST){
	extract($_POST);
}
	switch(@$cmd){
		case "addProfile":
			CreateProfile();
		break;
		case "AddUser":
			CreateUser();
		break;
		case "DeleteCompany":
			//deleteCompany();
			
			
			$set['Active'] = 0;
			$set['Modified'] = date('Y-m-d');
			$set['ModifiedBy'] = $currentUser;
			$where['pkCompany'] = $id;
			$ctrlUpdate = Crud::update($set,$where,'company');
			
			if ($ctrlUpdate){
				$response = array(
					'response' => true,
					'message'  => 'La cuenta maestra se eliminó correctamente.',
					'href'     => null,
					'function' => null //'string'
					);
					echo json_encode($response);
				}
				else{
					$response = array(
					'response' => false,
					'message'  => 'La cuenta maestra no se pudo eliminar.',
					'href'     => null,
					'function' => null //'string'
					);
					echo json_encode($response);	
				}		
		break;
		case "DeleteBO":
						
			$set['Active'] = 0;
			$set['Modified'] = date('Y-m-d');
			$set['ModifiedBy'] = $currentUser;
			$where['pkBranchOffice'] = $id;
			$ctrlUpdate = Crud::update($set,$where,'branchoffice');
			
			if ($ctrlUpdate){
				$response = array(
					'response' => true,
					'message'  => 'El AASP se eliminó correctamente.',
					'href'     => 'self',
					'function' => null //'string'
					);
					echo json_encode($response);
				}
				else{
					$response = array(
					'response' => false,
					'message'  => 'EL AASP no se pudo eliminar.',
					'href'     => null,
					'function' => null //'string'
					);
					echo json_encode($response);	
				}		
		break;
		case "DeleteSubcompany":
						
			$set['active'] = 0;
			$set['modified'] = date('Y-m-d');
			$set['modifiedBy'] = $currentUser;
			$where['pkSubCompany'] = $id;
			$ctrlUpdate = Crud::update($set,$where,'subcompany');
			
			if ($ctrlUpdate){
				$response = array(
					'response' => true,
					'message'  => 'La subcuenta se eliminó correctamente.',
					'href'     => 'self',
					'function' => null //'string'
					);
					echo json_encode($response);
				}
				else{
					$response = array(
					'response' => false,
					'message'  => 'La subcuenta no se pudo eliminar.',
					'href'     => null,
					'function' => null //'string'
					);
					echo json_encode($response);	
				}		
		break;
 	}

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
/*******************************************************************************
*                                                                              *
*                  ##########MAIN##########                                    *
*                                                                              *
*******************************************************************************/
	/*function deleteCompany(){
		
		$where['pkCompany'] = $GLOBALS['id'];
	
		$set['Active'] = 0;
		$set['Modified'] = date('Y-m-d');
		$set['ModifiedBy'] = $GLOBALS['currentUser'];
		
		$ctrlUpdate = Crud::update($set,$where,'company');
		
		if ($ctrlUpdate){
			$response = array(
				'response' => true,
				'message'  => 'La cuenta maestra se eliminó correctamente.',
				'href'     => 'self',
				'function' => null //'string'
				);
				echo json_encode($response);
			}
			else{
				$response = array(
				'response' => false,
				'message'  => 'La cuenta maestra no se pudo eliminar.',
				'href'     => null,
				'function' => null //'string'
				);
				echo json_encode($response);	
			}		

	}*/

?>