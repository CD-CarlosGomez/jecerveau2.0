<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date Miércoles 5 de diciembre de 2012
// | @Version 1.0
// +-----------------------------------------------
// +---------------------------Comentarios de versión
// Que esta hoja se convierta en la hoja de negocios, de la misma manera que los
//  los controles, se creen las funciones para procesar los post
namespace App\views;
defined("APPPATH") OR die("Access denied");

use \App\data\Crud as Crud;

/*******************************************************************************
*                                                                              *
*                           ##########REQUEST##########                        *
*                                                                              *
*******************************************************************************/
//Si hubo un post 
if($_POST){
	//Extraemos los datos de lo que estamos recibiendo por post
	extract($_POST);
}

	//En este switch decide que función del bussiness se va a ejecutar.
	switch(@$cmd){
		case "DeleteUser":
			//Obtenemos el $id que se asignó en el extract($_POST);
			//El valor del $id lo asignamos a un array asociativo para poder hacer el UPDATE del Crud.
			$pkuser['pkiBUser'] =  $id;
			//Obtenemos el status actual usuario para cambiarlo al contrario: Activo-Inactivo-Activo
			$ds_currentST = Crud::getByQuery("SELECT Active FROM ibuser WHERE pkiBUser=$id");
			foreach($ds_currentST as $dt_currentST){ $dr_currentST = $dt_currentST['Active']; }
			//Asignamos el valor al active para alternarlo, si ibuser.Active=1 (activo), entonces le asigna 0 para inactivarlo, y si es viceversa, asigna 1 para activarlo.
			$user['Active'] = (1 == $dr_currentST)? 0 : 1 ;
			
			$user['Modified'] = date('Y-m-d');
			$user['ModifiedBy'] = $currentUser;
				
			$ctrlUpdateUser = Crud::update($user,$pkuser,'ibuser');
			//echo $ctrlUpdateUser = Crud::buildUpdate($user,$pkuser,'ibuser');
			if ($ctrlUpdateUser){
				$response = array(
					'response' => true,
					'message'  => 'El estatus del usuario se cambió correctamente.',
					'href'     => 'self',
					'function' => null //'string'
					);
					echo json_encode($response);
			}
			else{
					$response = array(
					'response' => false,
					'message'  => 'El estatus del usuario no se cambió.',
					'href'     => null,
					'function' => null //'string'
					);
					echo json_encode($response);	
			}		
		break;
		case "UpdateUser":
			$pkuser['pkiBUser'] = $hdn_pkuser_h;
	
			$user['username'] = $txt_userName_h;
			$user['pwd'] = $txt_newPassword_h;
			$user['pwdtmp'] = $txt_newPassword_h;
			$user['realname'] = $txt_realName_h;
			$user['email'] = $txt_newEmail_h;
			$user['ibfunctiondetail_pkibFunctionDetail'] = $slt_defaultFunction_h;
			$user['Modified'] = date('Y-m-d');
			$user['ModifiedBy'] = $currentUser;
				
			$ctrlUpdateUser = Crud::update($user,$pkuser,'ibuser');
			
			if ($ctrlUpdateUser){
				$response = array(
					'response' => true,
					'message'  => 'El usuario se guardó correctamente.',
					'href'     => null,
					'function' => null //'string'
					);
					echo json_encode($response);
				}
				else{
					$response = array(
					'response' => false,
					'message'  => 'El usuario no se guardó correctamente.',
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
?>