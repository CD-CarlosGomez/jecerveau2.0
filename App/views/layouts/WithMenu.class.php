<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date 5 de Marzo del 2016
// | * Index.php@Version 1.0
// +-----------------------------------------------
namespace App\Views\Layout;

include_once "LayoutDecorator.classabs.php";

use App\Views\Layout;

class WithMenu extends LayoutDecorator{
//CONSTANTES#########################################
//ATRIBUTOS##########################################
	public $poutputHeader="";
	public $poutputBody="";
	public $poutputFooter="";
	public $pMenu=
	"<ul>
		<li>1</li>
		<li>2</li>
		<li>3</li>
	</ul>";
//PROPIEDADES########################################
//MÉTODOS ABSTRACTOS#################################
//MÉTODOS PÚBLICOS###################################
	public function getMenu(){
		return $this->pMenu;
	}
	public function render(){
		printf(self::getDebugHeader());
		printf(self::getDebugBody());
		printf(self::getDebugFooter());
	}
	public function getDebugHeader(){
		return $this->_layout->getDebugHeader();
	}
	public function getDebugBody(){
		
        $this->poutputBody .="<body>\n";
		$this->poutputBody .="<div id='base_head'>\n";
		$this->poutputBody .="<div id='menustop'>".self::getMenu()."</div>\n";
		$this->poutputBody .="<a href=\"#top-of-page\" id=\"top-of-page\" class=\"sr-only\">Top of page</a>\n";
		$this->poutputBody .="<div id=\"contenido\" class=\"container\">\n";
		$this->poutputBody .="<section>\n";
        $this->poutputBody .="Hello World\n";
		$this->poutputBody .=self::getMenu();
		$this->poutputBody .="</section>\n";
        $this->poutputBody .="";
		return $this->poutputBody;
		//return $this->_layout->getDebugBody();
	}
	public function getDebugFooter(){
		return $this->_layout->getDebugFooter();
	}
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
//MAIN###############################################
}
?>