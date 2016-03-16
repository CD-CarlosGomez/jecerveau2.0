<?php
include_once "LayoutDecorator.classabs.php";
class WithTemplate extends LayoutDecorator{
	public $pTemplate="";
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
}
?>