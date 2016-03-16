<?php 
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date Miércoles 5 de Marzo de 2016
// | *@Version 1.0
// +-----------------------------------------------
namespace App\Views\Layout;
include_once "LayoutHTML.class.php";

use App\Interfaces\iLayout,
	App\Views\Layout;

Class LayoutCSS extends LayoutHTML{
//CONSTANTES#########################################
//ATRIBUTOS##########################################
	public $ptitle="iBrain 2.0";
	public $pdescription="I' am iBrain";
	public $pviewport="width=device-width, initial-scale=1";
	public $pkeys="";
	public $pauthor="";
	public $poutputHeader="";
	public $poutputBody="";
	public $poutputFooter="";
//PROPIEDADES########################################
//MÉTODOS ABSTRACTOS#################################
//MÉTODOS PÚBLICOS###################################
	public function __construct(){
		self::getDebugHeader();
		self::getDebugBody();
		self::getDebugHeader();
	}
	public function getDebugHeader(){
		$this->poutputHeader.="<!DOCTYPE html>\n";
        $this->poutputHeader .="<html lang=\"en\">\n";
        $this->poutputHeader .="<head>\n";
		$this->poutputHeader .="<meta charset=\"UTF-8\">\n";
		$this->poutputHeader .="<meta name=\"viewport\" content=\"$this->pviewport\"/>\n";
        $this->poutputHeader .="<title>$this->ptitle</title>\n";
        
        $this->poutputHeader .="<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">";
        $this->poutputHeader .="<meta name=\"description\" content=\"$this->pdescription\"/>\n";
        $this->poutputHeader .="<meta name=\"keywords\" content=\"$this->pkeys\"/>\n";
        $this->poutputHeader .="<meta name=\"author\" content=\"$this->pauthor\"/>\n";
                
		$this->poutputHeader .="<!--[if lt IE 9]><script src=\"http://html5shiv.googlecode.com/svn/trunk/html5.js\"></script><![endif]-->";
        
		$this->poutputHeader .="<!--JQUERY--><script src=\"//code.jquery.com/jquery-1.10.2.js\"></script>";
		$this->poutputHeader .="<!--JQUERY-UI--><script src=\"//code.jquery.com/ui/1.11.4/jquery-ui.js\"></script>";
		$this->poutputHeader .="<!--JQUERY-UI--><link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css\">";
		
		$this->poutputHeader .="<!--BOOTSTRAP--><script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\" integrity=\"sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS\" crossorigin=\"anonymous\"></script>";
        $this->poutputHeader .="<!--BOOTSTRAP validator--><script src=\"//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js\"></script>";
		$this->poutputHeader .="<!--BOOTSTRAP--><link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\" integrity=\"sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7\" crossorigin=\"anonymous\">";
		$this->poutputHeader .="<!--BOOTSTRAP--><link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css\" integrity=\"sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r\" crossorigin=\"anonymous\">";
		$this->poutputHeader .="<!--BOOTSTRAP validator--><link href=\"//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css\" rel=\"stylesheet\"></link>";
        $this->poutputHeader .="<!--BOOTSTRAP--><script src=\"js/jquery.bootstrap.wizard.js\"></script>";
		$this->poutputHeader .="<!--BOOTSTRAP validator--><script src=\"js/jquery.bootstrap.validator.js\"></script>";
		$this->poutputHeader .="<!--BOOTSTRAP Componentes varios--><script src=\"js/jquery.bootstrap.components.js\"></script>";
		
		$this->poutputHeader .="<link rel=\"stylesheet\" href=\"estilohtml5.css\" type=\"text/css\" media=\"screen\" />\n";
        $this->poutputHeader .="<meta name=\"robots\" content=\"index,follow,noarchive\"/>\n";
        $this->poutputHeader .="</head>";
        return $this->poutputHeader ;	
	}
	public function getDebugBody(){
        $this->poutputBody="<body>\n";
		$this->poutputBody="<div id='base_head'>\n";
		$this->poutputBody="<div id='menustop'></div>\n";
		$this->poutputBody="<a href=\"#top-of-page\" id=\"top-of-page\" class=\"sr-only\">Top of page</a>\n";
		$this->poutputBody .="<div id=\"contenido\" class=\"container\">\n";
		$this->poutputBody .="<section>\n";
        $this->poutputBody .="Hello World\n";
        //$this->poutputBody .=$this->nav();
		$this->poutputBody .="</section>\n";
        $this->poutputBody .="";
		return $this->poutputBody;
    }
	public function getDebugFooter(){
		 $this->poutputFooter  ="<div class=\"row\"";
        $this->poutputFooter .="<div class=\"col-md-12\"></div>\n";
        $this->poutputFooter .="<center>&copy; Copyright 2016 2020 All Rights Reserved.</center>	</div>";
        $this->poutputFooter .="</div>\n";
        $this->poutputFooter .="</div><!-- END CONTAINER -->\n";		
        $this->poutputFooter .="</body>\n";
        $this->poutputFooter .="</html>\n";
		return $this->poutputFooter;
	}
	public function render(){
		printf($this->poutputHeader);
		printf($this->poutputBody);
		printf($this->poutputFooter);		
	}
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
//MAIN###############################################






	
	
	
}
?>