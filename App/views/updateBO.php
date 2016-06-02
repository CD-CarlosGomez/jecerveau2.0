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
	
	$condBO['pkBranchOffice'] = $hdn_pkBO_h;
	$condBOS['BranchOffice_pkBranchOffice'] = $hdn_pkBO_h;
	
	$bo['subcompany_pkSubCompany'] = $slt_fkSubCompany_h;
	$bo['BOName'] = $txt_BOName_h; 
	$bo['BOStreet'] = $txt_BOStreet_h; 
	$bo['BOExtNumber'] = $txt_BOExtNumber_h; 
	$bo['BOIntNumber'] = $txt_BOIntNumber_h; 
	$bo['BORegion'] = $txt_BORegion_h; 
	$bo['BOZone'] = $txt_BOZone_h; 
	$bo['BOProvince'] = $txt_BOProvince_h;
	$bo['BOZipCode'] = $txt_BOZipCode_h; 
	$bo['ServiceAddress'] = $txt_serviceAddress_h;
	$bo['ServiceManager'] = $txt_serviceManager_h; 
	$bo['ServiceEmail'] = $txt_serviceEmail_h; 
	$bo['officeHour'] = $txt_officeHour_h; 
	$bo['ServicePhone'] = $txt_servicePhone_h;
	$bo['Modified'] = date("Y-m-d");
	$bo['ModifiedBy'] = $currentUser;
	
	$bos['fktimeZone'] = $slt_timeZone_h;
	$bos['fkCountry'] = $slt_pkCountry_h;
	$bos['fkAASPType'] = $slt_aaspType_h;
	$bos['shipTo'] = $txt_shipTo_h;
	$bos['soldTo'] = $txt_soldTo_h;
	$bos['folioStart'] = $txt_folioStart_h;
	$bos['folioSerie'] = $txt_folioSerie_h;
		
	$ctrlUpdateBo  = Crud::update($bo,$condBO,'branchoffice');
	$ctrlUpdateBos = Crud::update($bos,$condBOS,'branchofficesetting');
	
	if ($ctrlUpdateBo and $ctrlUpdateBos){
		$response = array(
			'response' => true,
			'message'  => 'El AASP se guardó correctamente.',
			'href'     => null,
			'function' => null //'string'
			);
			echo json_encode($response);
		}
		else{
			$response = array(
			'response' => false,
			'message'  => 'El AASP no se guardó correctamente.',
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