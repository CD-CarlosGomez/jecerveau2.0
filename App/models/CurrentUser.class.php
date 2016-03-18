<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date 17/03/2016
// | @Version 1.0
// +----------------------------------------------
namespace App\Models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;

class CurrentUser {
	public $pMainMenu="";
//CONSTANTES#########################################
//ATRIBUTOS##########################################
//PROPIEDADES########################################
//MÉTODOS ABSTRACTOS#################################
//MÉTODOS PÚBLICOS###################################
	public static function getMainMenu($pkiBUser_p){
		$firstLevels=self::getFirstLevelMenu($pkiBUser_p);
		foreach($firstLevels as $firstLevel){
			$this->pMainMenu .="<li class='active>";
			$this->pMainMenu .="<a href='#'><i class='fa fa-sitemap'></i>"; 
			$this->pMainMenu .="<span class='nav-label'>$firstLevel['ibfunctiongroupModulo']</span>";
			$this->pMainMenu .="<span class='fa arrow'></span></a>";
			$this->pMainMenu .="<ul class='nav nav-second-level collapse'>";
				$secondlevels=self::getSecondLevelMenu($pkiBUser_p,$firstLevel['pkiBFunctionGroup']);
				foreach($secondlevels as $secondlevel){
					$this->pMainMenu .="<li>";
					$this->pMainMenu .="<a href='#'>Third Level <span class='fa arrow'></span></a>";
					$this->pMainMenu .="<ul class='nav nav-third-level'>";
				$thirdLevels=self::getThirdLevelMenu($pkiBUser_p);
					foreach($thirdLevels as $thirdLevel){
						$this->pMainMenu .="<li>";
						$this->pMainMenu .="<a href='#'>Third Level Item</a>";
						$this->pMainMenu .="</li>";
					}	
					$this->pMainMenu .="</ul>";	
					$this->pMainMenu .="</li>";		
				}
				$this->pMainMenu .="</ul>";	
				$this->pMainMenu .="</li>";	
		}
		return $this->pMainMenu;
	}
	public static function getFirstLevelMenu($pkibuser_p) {
        try {
            $PDOcnn = Database::instance();
            $PDOQuery = "SELECT DISTINCT
							pkiBFunctionGroup,ibfunctiongroupModulo 
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
    public static function getSecondLevelMenu($pkiBUser_p,$firstLevel_p){
		 try {
            $PDOcnn = Database::instance();
            $PDOQuery = "SELECT 
							ibfunctiongroupModulo,
							ibfunctionName 
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
    public static function getThirdLevelMenu($pkiBUser_p,$secondLevel_p){
		try {
            $PDOcnn = Database::instance();
            $PDOQuery = "SELECT 
							ibfunctiondetalledescripcion
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
						where pkiBuser=? and Active=1 and pkiBFunction=?";
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
