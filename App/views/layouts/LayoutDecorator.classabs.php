<?php

// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date 5 de Marzo del 2016
// | @Version 1.0
// +-----------------------------------------------
namespace App\Views\Layout;

use App\Interfaces\iLayout,
	App\Views\Layout;


abstract class LayoutDecorator implements iLayout{
//CONSTANTES#########################################
//ATRIBUTOS##########################################
	protected $_layout="";
	protected $_outputHeader ="";
	protected $_outputBody="";
	protected $_outputBanner="";
	protected $_outputFooter="";
//PROPIEDADES########################################
//MÉTODOS ABSTRACTOS#################################
	public function getDebugHeader(){		
	}
	public function getDebugBody(){		
	}
	public function getDebugFooter(){		
	}
//MÉTODOS PÚBLICOS###################################
	public function __construct(iLayout $Layout){
		$this->_layout=$Layout;
	}
	public function render(){
		printf($this->_outputHeader);
		printf($this->_outputBody);
		printf($this->_outputFooter);
	}
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
//MAIN###############################################



	
	
	
	
	
	
}
?>