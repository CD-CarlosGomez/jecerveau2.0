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
		for($i=0;$i<count($firstLevels);$i++){
			for($k=0;$k<count($firstLevels[$i]);$k++){
				
				$this->pMainMenu .="<li>";
				$this->pMainMenu .=		"<a href='#'>"; 
				$this->pMainMenu .=			"<span class='nav-label'>".$firstLevels[0][$k][1]."</span>";
				$this->pMainMenu .=			"<span class='fa arrow'></span></a>";
				$this->pMainMenu .="		<ul class='nav nav-second-level collapse'>";
				$secondLevels[]=$this->getSecondLevelMenu($pkiBUser,$firstLevels[0][$k][0]);
				for($l=0;$l<count($secondLevels);$l++){
					for($m=0;$m<count($secondLevels[$l]);$m++){
						$thirdLevels[]=$this->getThirdLevelMenu($pkiBUser,$secondLevels[0][$m][0]);
						$this->pMainMenu .=		"<li>";
						$this->pMainMenu .="		<a href='http://localhost:8012/ibrain2.0/".$secondLevels[0][$m][2] ."'>".$secondLevels[0][$m][1]."<span class='fa arrow'></span></a>";
						$this->pMainMenu .="		<ul class='nav nav-third-level'>";
						for($n=0;$n<count($thirdLevels);$n++){
							for($o=0;$o<count($thirdLevels[$n]);$o++){
								$this->pMainMenu .=			"<li>";
								$this->pMainMenu .=				"<a href='http://localhost:8012/ibrain2.0/".$thirdLevels[0][$o][1] ."'>".$thirdLevels[0][$o][0]."</a>";
								$this->pMainMenu .=			"</li>";
							}
						}
						$this->pMainMenu .=			"</ul>";	
						$this->pMainMenu .=		"</li>";
					}
				}
			}
		}
					$this->pMainMenu .=		"</ul>";	
					$this->pMainMenu .="</li>";	
					$this->pMainMenu .="<li>";
					$this->pMainMenu .="<a href='http://localhost:8012/ibrain2.0//App/controllers/logout.php'>";
					$this->pMainMenu .="<span class='nav-label'>Logout</span></span></a>";
					$this->pMainMenu .="</li>";
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
			//$retorno=array();
            $PDOcnn = Database::instance();
            $PDOQuery = "SELECT DISTINCT
							pkiBFunctionGroup,
							ibFunctionGroupModulo,
							iBFunctionGroupLink
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
			//$PDOResultSet=$PDOquery->fetch();
            while ($PDOResultSet=$PDOquery->fetch(\PDO::FETCH_NUM)){
				$retorno[]=$PDOResultSet;
			}
			return $retorno;
        }
        catch(\PDOException $e){
            print "Error!: " . $e->getMessage();
        }
    }
    public function getSecondLevelMenu($pkiBUser_p,$firstLevel_p){
		 try {
			$retorno=array();
            $PDOcnn = Database::instance();
            $PDOQuery = "SELECT 
							pkiBFunction,
							iBFunctionName,
							iBFunctionLink
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
			//$PDOResultSet=$PDOquery->fetchAll();
            while($PDOResultSet=$PDOquery->fetch(\PDO::FETCH_NUM)){
				$retorno[]=$PDOResultSet;
			}
			return $retorno;
        }
        catch(\PDOException $e){
            print "Error!: " . $e->getMessage();
        }
    }
    public function getThirdLevelMenu($pkiBUser_p,$secondLevel_p){
		try {
			$retorno=array();
            $PDOcnn = Database::instance();
            $PDOQuery = "SELECT 
							iBFunctionDetailName,
							iBFunctionDetailLink
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
			//$PDOResultSet=$PDOquery->fetchAll();
            while($PDOResultSet=$PDOquery->fetch(\PDO::FETCH_NUM)){
				$retorno[]=$PDOResultSet;
			}
			return $retorno;
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
