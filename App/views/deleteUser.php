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
//if($_GET){
	//extract($_GET);
	
	
	$pkuser['pkiBUser'] = $pk;
	
	$user['Active'] = 0;
	$user['Modified'] = date('Y-m-d');
	$user['ModifiedBy'] = $currentUser;
		
	$ctrlUpdateUser = Crud::update($user,$pkuser,'ibuser');
	//echo $ctrlUpdateUser = Crud::buildUpdate($user,$pkuser,'ibuser');
	if ($ctrlUpdateUser){
		$response = array(
			'response' => true,
			'message'  => 'El producto se guardó correctamente.',
			'href'     => null,
			'function' => null //'string'
			);
			echo json_encode($response);
		}
		else{
			$response = array(
			'response' => false,
			'message'  => 'El producto no se guardó correctamente.',
			'href'     => null,
			'function' => null //'string'
			);
			echo json_encode($response);	
		}		
	//}
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