<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date Miércoles 5 de diciembre de 2012
// | @Version 1.0
// +-----------------------------------------------
// +---------------------------Comentarios de versión
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