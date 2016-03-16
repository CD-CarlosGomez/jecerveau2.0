<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date 5 de Marzo del 2016
// | @Version 1.0
// +-----------------------------------------------
namespace App\Views\Layout;

include_once "LayoutDecorator.classabs.php";

use App\Views\Layout;
	
class WithTemplate extends LayoutDecorator{
//CONSTANTES#########################################
//ATRIBUTOS##########################################
	public $pTemplate="";
//PROPIEDADES########################################
//MÉTODOS ABSTRACTOS#################################
//MÉTODOS PÚBLICOS###################################
	public function getTemplate(){
		return $this->pMTemplate;
	}
	public function getDebugHeader(){}
	public function getDebugFooter(){}
	public function getDebugBody(){
        $this->outputBody="<body>\n";
		$this->outputBody="<div id='base_head'>\n";
		$this->outputBody="<div id='menustop'>".""."</div>\n";
		$this->outputBody="<a href=\"#top-of-page\" id=\"top-of-page\" class=\"sr-only\">Top of page</a>\n";
		$this->outputBody .="<div id=\"contenido\" class=\"container\">\n";
		$this->outputBody .="<section>\n";
        $this->outputBody .=self::getTemplate();
        //$this->outputBody .=$this->nav();
		$this->outputBody .="</section>\n";
        $this->outputBody .="";
		return $this->poutputBody;
	}
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
//MAIN###############################################
}
?>