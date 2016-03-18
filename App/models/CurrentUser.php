<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date 17/03/2016
// | @Version 1.0
// +----------------------------------------------
// +---------------------------Comentarios de versión
#El logout está siendo invocado desde un archivo externo
#sería óptimo llamar la función logout de este mismo archivo
namespace App\Models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;

class CurrentUser {
//CONSTANTES#########################################
//ATRIBUTOS##########################################
	public $pMainMenu="";
	public $ppkiBUser_p="1";
//PROPIEDADES########################################
	public function setppkiBUser_p($value){
		$this->ppkiBUser_p=$value;
	}
	public function &getppkIBUser_p(){
		return $this->ppkiBUser_p;
	}
	
	public function getMainMenu($pkiBUser){
		$firstLevels[]=$this->getFirstLevelMenu($pkiBUser);
		foreach($firstLevels as $firstLevel){
			$this->pMainMenu .="<li class='active'>";
			$this->pMainMenu .=		"<a href='#'>"; 
			$this->pMainMenu .=			"<span class='nav-label'>".$firstLevel["ibFunctionGroupModulo"]."</span>";
			$this->pMainMenu .=			"<span class='fa arrow'></span></a>";
			$this->pMainMenu .="		<ul class='nav nav-second-level collapse'>";
				$secondlevels[]=$this->getSecondLevelMenu($pkiBUser,$firstLevel['pkiBFunctionGroup']);
				foreach($secondlevels as $secondlevel){
					$this->pMainMenu .=		"<li>";
					$this->pMainMenu .="		<a href='#'>".$secondlevel['iBFunctionName']."<span class='fa arrow'></span></a>";
					$this->pMainMenu .="		<ul class='nav nav-third-level'>";
					$thirdLevels[]=$this->getThirdLevelMenu($pkiBUser,$secondlevel['pkiBFunction']);
					foreach($thirdLevels as $thirdLevel){
						$this->pMainMenu .=			"<li>";
						$this->pMainMenu .=				"<a href='#'>".$thirdLevel['iBFunctionDetailName']."</a>";
						$this->pMainMenu .=			"</li>";
					}	
					$this->pMainMenu .=			"</ul>";	
					$this->pMainMenu .=		"</li>";		
				}
				$this->pMainMenu .=		"</ul>";	
				$this->pMainMenu .="</li>";	
				$this->pMainMenu .="<li>";
				$this->pMainMenu .="<a href='http://localhost:8012/iBrain2.0/App/controllers/logout.php'>";
				$this->pMainMenu .="<span class='nav-label'>Logout</span></span></a>";
				$this->pMainMenu .="</li>";
		}
		return $this->pMainMenu;
	}
//MÉTODOS ABSTRACTOS#################################
//MÉTODOS PÚBLICOS###################################
	public function setLogout(){
		session_start();
		session_destroy();
		header("Location:../../private/home");
	}
	public function getFirstLevelMenu($pkibuser_p) {
        try {
            $PDOcnn = Database::instance();
            $PDOQuery = "SELECT DISTINCT
							pkiBFunctionGroup,ibFunctionGroupModulo 
						FROM ibuser ib
							inner join ibuserprofile 
								on fkibuserprofile=pkiBUserProfile 
							inner join ibuserprofile_has_ibfunction ibfg 
								on pkiBUserProfile=ibuserprofile_pkibuserprofile 
							inner join ibfunctiongroup 
								ON ibfg.ibfunctiongroup_pkibfunctiongroup=pkibfunctiongroup 
							inner join ibfunction ibf 
								on pkibfunctiongroup= ibf.iBFunctionGroup_pkiBFunctionGroup 
						where pkiBUser=? and Active=1;";
            $PDOquery = $PDOcnn->prepare($PDOQuery);
            $PDOquery->bindParam(1, $pkibuser_p, \PDO::PARAM_INT);
            $PDOquery->execute();
            return $PDOquery->fetch();
        }
        catch(\PDOException $e){
            print "Error!: " . $e->getMessage();
        }
    }
    public function getSecondLevelMenu($pkiBUser_p,$firstLevel_p){
		 try {
            $PDOcnn = Database::instance();
            $PDOQuery = "SELECT 
							pkiBFunction,
							iBFunctionName 
						FROM ibuser ib 
							inner join ibuserprofile 
								on fkibuserprofile=pkiBUserProfile 
							inner join ibuserprofile_has_ibfunction ibfg 
								on pkiBUserProfile=ibuserprofile_pkibuserprofile 
							inner join ibfunctiongroup 
								ON ibfg.ibfunctiongroup_pkibfunctiongroup=pkibfunctiongroup 
							inner join ibfunction ibf 
								on pkibfunctiongroup= ibf.iBFunctionGroup_pkiBFunctionGroup 
						WHERE pkiBuser=? and Active=1 and pkiBFunctionGroup=?;";
            $PDOquery = $PDOcnn->prepare($PDOQuery);
            $PDOquery->bindParam(1, $pkiBUser_p, \PDO::PARAM_INT);
            $PDOquery->bindParam(2, $firstLevel_p, \PDO::PARAM_INT);
            $PDOquery->execute();
            return $PDOquery->fetch();
        }
        catch(\PDOException $e){
            print "Error!: " . $e->getMessage();
        }
    }
    public function getThirdLevelMenu($pkiBUser_p,$secondLevel_p){
		try {
            $PDOcnn = Database::instance();
            $PDOQuery = "SELECT 
							iBFunctionDetailName
						FROM ibuser ib 
							inner join ibuserprofile 
								on fkibuserprofile=pkiBUserProfile 
							inner join ibuserprofile_has_ibfunction ibfg 
								on pkiBUserProfile=ibuserprofile_pkibuserprofile 
							inner join ibfunctiongroup 
								on ibfg.ibfunctiongroup_pkibfunctiongroup=pkibfunctiongroup 
							inner join ibfunction ibf 
								on pkibfunctiongroup= ibf.iBFunctionGroup_pkiBFunctionGroup
							inner join ibfunctiondetail ibd 
								on ibd.iBFunction_pkiBFunction=ibf.pkiBFunction
						where pkiBuser=? and Active=1 and pkiBFunction=?;";
            $PDOquery = $PDOcnn->prepare($PDOQuery);
            $PDOquery->bindParam(1, $pkiBUser_p, \PDO::PARAM_INT);
            $PDOquery->bindParam(2, $secondLevel_p, \PDO::PARAM_INT);
            $PDOquery->execute();
            return $PDOquery->fetch();
        }
        catch(\PDOException $e){
            print "Error!: " . $e->getMessage();
        }
	}
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
//MAIN###############################################
}
