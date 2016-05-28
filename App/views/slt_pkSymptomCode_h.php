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
}
class InstanceOfSymptomCode {
/*******************************************************************************
*                                                                              *
*                        ##########CONSTANTES##########                        *
*                                                                              *
*******************************************************************************/
	public $pkSymptomCode;
	public $fkSymptomArea;
	public $symptomCodeDesc;
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
	public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
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
	public function __construct($pk,$fk,$code) {
		$this->pkSymptomCode = $pk;
		$this->fkSymptomArea = $fk;
		$this->symptomCodeDesc =$code;
	}
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
}
/*******************************************************************************
*                                                                              *
*                  ##########MAIN##########                                    *
*                                                                              *
*******************************************************************************/
	if(isset($id)) {
		$sc = array();
		$RS_symptomCode=Crud::getById('symptomcode','fkSymptomArea',$id);
		while($row = $RS_symptomCode->fetch(\PDO::FETCH_ASSOC)){
				$SC = new InstanceOfSymptomCode($row['pkSymptomCode'], $row['fkSymptomArea'], $row['symptomCodeDesc']);
				array_push($sc, $SC);
			}
		echo json_encode($sc);
	}
?>