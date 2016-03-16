<?php 
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date 5 de Marzo de 2016
// | @Version 1.0
// +-----------------------------------------------
namespace App\Views\Layout;


use App\Interfaces\iLayout,
	App\Views\Layout;

class LayoutHTML implements iLayout{
//CONSTANTES#########################################
//ATRIBUTOS##########################################
//PROPIEDADES########################################
	protected $_title="Ibrain 2.0";     
    protected $_description="This is a Web Page from consultoria Dual";
    protected $_keys="";
    protected $_viewport="";
    protected $_author="Carlos Gómez";
    protected $_url="";
    protected $_browser=array();
    protected $_foot=array();
	protected $_outputHeader ="";
	protected $_outputBody="";
	protected $_outputBanner="";
	protected $_outputFooter="";
//MÉTODOS ABSTRACTOS#################################
//MÉTODOS PÚBLICOS###################################
	public function render(){
        printf($this->_outputHeader);
		printf($this->_outputBody);
		printf($this->_outputFooter);
    }
	public function getDebugHeader(){
		$this->outputHeader.="<!DOCTYPE html>\n";
        $this->outputHeader .="<html lang=\"en\">\n";
        $this->outputHeader .="<head>\n";
        $this->outputHeader .="<title>$this->title</title>\n";
        $this->outputHeader .="<meta charset=\"UTF-8\">\n";
        $this->outputHeader .="<meta name=\"description\" content=\"$this->description\"/>\n";
        $this->outputHeader .="<meta name=\"keywords\" content=\"$this->keys\"/>\n";
        $this->outputHeader .="<meta name=\"author\" content=\"$this->author\"/>\n";
        $this->outputHeader .="<link rel=\"stylesheet\" href=\"estilohtml5.css\" type=\"text/css\" media=\"screen\" />\n";
        $this->outputHeader .="<meta name=\"robots\" content=\"index,follow,noarchive\"/>\n";
        $this->outputHeader .="</head>";
        return $this->_outputHeader ;
		}
	public function getDebugBody(){
        $this->outputBody="<body>\n";
        $this->outputBody .="<section>\n";
        $this->outputBody .="Hello World iBrain 2.0\n";
		$this->outputBody .="</section>\n";
        $this->outputBody .="";
		return $this->_outputBody;
    }
    public function getDeBugFooter(){
        $this->outputFooter  ="";
        $this->outputFooter .="<ul></ul>\n";
        $this->outputFooter .="</body>\n";
        $this->outputFooter .="</html>\n";
		return $this->_outputFooter;
        }        
    public function getMainNavigation($tipo,$lista){
        $resultado="<$tipo>\n";
        foreach ($lista as $elemento)
            $resultado.="<li>$elemento</li>\n";
        $resultado.="</$tipo>\n";
        return $resultado;
        }
    public function Banner(){
        $this->outputBanner="<header>";
        $this->outputBanner .="<h1><a href=\"$this->url\">$this->titulo</a></h1>";
        $this->outputBanner .="</header>";
        }
    public function Template($cuerpo){}
    /*function nav(){
        $aux=array();
        foreach ($this->navegador as $url=>$texto)
            $aux[]="<a href=\"$url\">$texto</a>";
        return $this->lista("ul",$aux);
        }*/
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
//MAIN###############################################
	
    
}

?>