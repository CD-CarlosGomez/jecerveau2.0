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
	//Obtenemos el $id que se asignó en el extract($_POST);
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
			//Obtenemos el status actual usuario para cambiarlo al contrario: Activo-Inactivo-Activo
			$ds_currentST = Crud::getByQuery("SELECT Active FROM company WHERE pkCompany=$id");
			foreach($ds_currentST as $dt_currentST){ $dr_currentST = $dt_currentST['Active']; }
			//Asignamos el valor al active para alternarlo, si ibuser.Active=1 (activo), entonces le asigna 0 para inactivarlo, y si es viceversa, asigna 1 para activarlo.
			$set['Active'] = (1 == $dr_currentST)? 0 : 1 ;
		
			$set['Modified'] = date('Y-m-d');
			$set['ModifiedBy'] = $currentUser;
			//El valor del $id lo asignamos a un array asociativo para poder hacer el UPDATE del Crud.
			$where['pkCompany'] = $id;
			$ctrlUpdate = Crud::update($set,$where,'company');
			
			if ($ctrlUpdate){
				$response = array(
					'response' => true,
					'message'  => 'El estatus de la cuenta maestra se cambió correctamente.',
					'href'     => 'self',
					'function' => null //'string'
					);
					echo json_encode($response);
				}
				else{
					$response = array(
					'response' => false,
					'message'  => 'El estatus de la cuenta maestra no se cambió.',
					'href'     => 'self',
					'function' => null //'string'
					);
					echo json_encode($response);	
				}		
		break;
		case "DeleteBO":
			//Obtenemos el status actual usuario para cambiarlo al contrario: Activo-Inactivo-Activo
			$ds_currentST = Crud::getByQuery("SELECT Active FROM subcompany WHERE pkSubCompany=$id");
			foreach($ds_currentST as $dt_currentST){ $dr_currentST = $dt_currentST['Active']; }
			//Asignamos el valor al active para alternarlo, si ibuser.Active=1 (activo), entonces le asigna 0 para inactivarlo, y si es viceversa, asigna 1 para activarlo.
			$set['Active'] = (1 == $dr_currentST)? 0 : 1 ;
			
			$set['Modified'] = date('Y-m-d');
			$set['ModifiedBy'] = $currentUser;
			$where['pkBranchOffice'] = $id;
			$ctrlUpdate = Crud::update($set,$where,'branchoffice');
			
			if ($ctrlUpdate){
				$response = array(
					'response' => true,
					'message'  => 'El estatus del AASP se cambió correctamente.',
					'href'     => 'self',
					'function' => null //'string'
					);
					echo json_encode($response);
				}
				else{
					$response = array(
					'response' => false,
					'message'  => 'EL estatus del AASP no se cambió.',
					'href'     => 'self',
					'function' => null //'string'
					);
					echo json_encode($response);	
				}		
		break;
		case "DeleteSubcompany":
			//Obtenemos el status actual usuario para cambiarlo al contrario: Activo-Inactivo-Activo
			$ds_currentST = Crud::getByQuery("SELECT active FROM subcompany WHERE pkSubCompany=$id");
			foreach($ds_currentST as $dt_currentST){ $dr_currentST = $dt_currentST['active']; }
			//Asignamos el valor al active para alternarlo, si ibuser.Active=1 (activo), entonces le asigna 0 para inactivarlo, y si es viceversa, asigna 1 para activarlo.
			$set['active'] = (1 == $dr_currentST)? 0 : 1 ;
			
			$set['modified'] = date('Y-m-d');
			$set['modifiedBy'] = $currentUser;
			$where['pkSubCompany'] = $id;
			$ctrlUpdate = Crud::update($set,$where,'subcompany');
			
			if ($ctrlUpdate){
				$response = array(
					'response' => true,
					'message'  => 'El estatus de la subcuenta se cambió correctamente.',
					'href'     => 'self',
					'function' => null //'string'
					);
					echo json_encode($response);
				}
				else{
					$response = array(
					'response' => false,
					'message'  => 'El estatus de la subcuenta no se cambió.',
					'href'     => 'self',
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