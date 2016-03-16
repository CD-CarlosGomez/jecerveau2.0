<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date 5 de Marzo de 2016
// | @Version 1.0
// +-----------------------------------------------
namespace App\Views\Layout;

include_once "LayoutDecorator.classabs.php";

use App\Views\Layout;

class WithSiteMap extends LayoutDecorator{
//CONSTANTES#########################################
//ATRIBUTOS##########################################
	public $poutputHeader="";
	public $poutputBody="";
	public $poutputFooter="";
	public $pNavigation="
	<ul>
		<li>a</li>
		<li>b</li>
		<li>c</li>
	</ul>
	";
//PROPIEDADES########################################
//MÉTODOS ABSTRACTOS#################################
//MÉTODOS PÚBLICOS###################################
	public function render(){
		printf(self::getDebugHeader());
		printf(self::getDebugBody());
		printf(self::getDebugFooter());
	}
	public function getNavigation(){
		return $this->pNavigation;
	}
	public function getDebugHeader(){
		return $this->_layout->getDebugHeader();
	}
	public function getDebugFooter(){
		return $this->_layout->getDebugFooter();
	}
	public function getDebugBody(){
        $this->poutputBody .="<body>\n";
		$this->poutputBody .="<div id='base_head'>\n";
		$this->poutputBody .="<div id='menustop'>".""."</div>\n";
		$this->poutputBody .="<a href=\"#top-of-page\" id=\"top-of-page\" class=\"sr-only\">Top of page</a>\n";
		$this->poutputBody .="<div id=\"contenido\" class=\"container\">\n";
		$this->poutputBody .="<section>\n";
        $this->poutputBody .="Hello World";
        $this->poutputBody .=self::getNavigation();
		$this->poutputBody .="</section>\n";
        $this->poutputBody .="";
		return $this->poutputBody;
	}
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
//MAIN###############################################
}
?>