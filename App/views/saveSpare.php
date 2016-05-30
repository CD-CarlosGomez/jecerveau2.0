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
	
	if(!isset($chk_ifSerialNumber_h)){
		$txt_productSerialNumber_h = "";
	}
	
	$product['pkProduct'] = Crud::getNextId('pkProduct','product');
	$product['ProductCategory_pkProductCategory'] = 0;
	$product['ProductType_pkProductType'] = 0;
	$product['PODetail_pkPODetail'] = null;
	$product['productDesc'] = $txt_productDesc_h;
	$product['productPartNumber'] = $txt_productPartNumber_h;
	$product['productSerialNumber'] = $txt_productSerialNumber_h;
	$product['productBrand'] = 'Apple';
	$product['created'] = date("Y-m-d H-m-s");
	$product['createdBy'] = 0;
	$product['modified'] = "";
	$product['modifiedBy'] = "";
	$product['active'] = 1;
	
	$cmd_insertProduct = Crud::insert($product,'product');
	
	if ($cmd_insertProduct){
		
		$psso['pkProductSoldSorder'] = Crud::getNextId('pkProductSoldSorder','product_sold_sorder');
		$psso['fkSorder'] = $hdn_currentSO_h;
		$psso['fkProduct'] = $product['pkProduct'];
		$psso['fkModificationCode'] = $slt_pkModificationCode_h;
		$psso['fkSymtomArea'] = $slt_pkSymptomArea_h;
		$psso['fkSymtomCode'] = $slt_pkSymptomCode_h;
		
		$cmd_insertPsSO = Crud::insert($psso,'product_sold_sorder');
		
		if($cmd_insertPsSO){
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