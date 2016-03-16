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
	public $pMenu="";
//PROPIEDADES########################################
//MÉTODOS ABSTRACTOS#################################
//MÉTODOS PÚBLICOS###################################
	public function render(){
		printf(self::getDebugHeader());
		printf(self::getDebugBody());
		printf(self::getDebugFooter());
	}
	public function getDebugHeader(){
		return $this->_layout->getDebugHeader();
	}
	public function getDebugBody(){ ?>
    <body>
		<div id="wrapper">
				<? self::getMainNavigation();?>
			<div id="page-wrapper" class="gray-bg dashbard-1">
			<div class="row border-bottom">
				<? self::getMinorNavigation();?>
			</div>
				<? self::getTitleTemplate(); ?>
			<div class="row">
				<div class="col-lg-12">
					<div class="wrapper wrapper-content">
				<? self::getMainTemplate();?> 
					</div>
			<?php
    }
	}
	public function getDebugFooter(){
		return $this->_layout->getDebugFooter();
	}
	public function getMainNavigation(){
		
	}
	public function getMinorNavigation(){
		
	}
	public function getTitleTemplate(){
		
	}
	public function getMainTemplate(){
		
	}
	
	
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
//MAIN###############################################
}
?>