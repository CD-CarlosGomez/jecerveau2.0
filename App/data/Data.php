<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date Miércoles 5 de diciembre de 2012
// |  * @Version 1.0, esta clase crea los queries automáticamente
// +-----------------------------------------------
namespace App\data;
defined("APPPATH") OR die("Access denied");

//use \Core\Database as DB;
use \data\DatabaseExtended as DBE;

Class Data{
//CONSTANTES#########################################
//ATRIBUTOS##########################################
	private $_PDOcnn=null;
    private $_DataSource=array();
	
	Protected $mSQLRead;
    Protected $mlDataTabla;
	Protected $_mySQLiDataset=array();
	Protected $_mySQLiDataGridView;
    Protected $mSQLquery= "";
    Protected $mlCampos= "";
    Protected $mlWhere= "";
    Protected $mlCadena= "";
    Protected $i=0, $j=0, $n=0, $m=0, $swKey=0, $swCampo=0;

//PROPIEDADES##################################################################################
//CONSTRUCTORES Y DESTRUCTORES##############################################################

	public function __construct(){
		$this->_PDOcnn=DBE::getPDOcnn();
	}
//MÉTODOS MÁGICOS##############################################################################
//MÉTODOS PÚBLICOS##############################################################################
	public function fillDataSource($resultSet=array()){
		while ($resultSet){
			$this->_DataSource[]=$resultSet;
		}
		return $this->_DataSource;
	}
	public function getEscapedParam($param){
		$result="";
		if(is_string($param)){
			$devolver="'%";
			//$devolver.=$this->_mySQLiConexion->real_escape_string($parametros);
			$devolver.=$param;
			$devolver.="%'";
		}
		if(is_integer($param)){
			$devolver.="'%";
			$devolver.=$param;
			$devolver.="%'";
		}
		return $result;
	}
	public function getParamEscapedInArray($param){
		$result = "";
		if(is_array($param)){
				foreach($param as &$par){
					if($result == ''){
						$result .= self::getEscapedParam($par);
				}
				else{
						$result.= ','.self::getEscapedParam($par);
				}
			}
		}
		else if($param == NULL){
		return 'NULL';
		}
		unset($par);
		return $result;
	}
	public Function getSelectLike($Campos=array(),$ltabla="",$lWhereCampo=array(),$lWhereParametro=array()){
		$retorno= "";
		$lWhere="";
        $n = count($lCampos);
		$m=count($lWhereCampo);
        $swKey = 0;
        for ($i = 0;isset($lCampos[$i]);$i++){
            if ($i == 0){
				$lCampo = $lCampos[$i];
			}
            Else{
				$lCampo .= ", " .$lCampos[$i];
			} 
        }   
		for ($j = 0;isset($lWhereCampo[$j]);$j++){
            if ($j == 0){
				$lWhere = " WHERE " . $lWhereCampo[$j] . " like " . self::getEscapedParam($lWhereParametro[$j]);
			}
            Else{
				$lWhere .= " AND " .  $lWhereCampo[$j] . " like " . self::getEscapedParam($lWhereParametro[$j]);
			} 
        }    
        $retorno = "SELECT " . $lCampo . " FROM " . $ltabla . $lWhere .";" ;
		Return $retorno;
	}
	private function getInsertQueryWithNewId($clase){
		$retorno="";
		$vlnewCodigo=0;
		$n=$clase->tablaTamaño;
		$swKey=0;
		for($i=0;$i<=$n;$i++){
			//que cuando sea un campo cadena le agregue las ''
			If ($clase->tablaCampos->obtenerTipo($i) = TipoDato::CADENA) 
                $this->mlCadena = "'";
            Else
                $this->mlCadena = "";
            //Validamos que el campo sea key y sea numérico buscamos el último número y le asignamos el valor + 1
            If ($clase->tablaCampos->obtenerAI($i) = Incrementable::SI && $clase->TablaCampos->obtenerTipo($i) = TipoDato::NUMERO){
                If ($swKey = 0) {
                    $vlNewCodigo = GetQueryNuevoCodigo($clase->tablaNombre, $clase->tablaCampos->obtenerNombre($i));
                    $clase->tablaCampos->ponerValor($i, $vlNewCodigo);
                    $swKey = 1;
                }
            }
            If ($i == 0){
                If ($swKey == 1)
                    $lCampos = $lCadena.$vlNewCodigo.$lCadena;
                Else
                    $lCampos = $lCadena.$clase->tablaCampos->obtenerValor($i).$lCadena;
            }
            Else{
                If ($swKey == 1)
                    $lCampos = $lCampos.",".$lCadena.$vlNewCodigo.$lCadena;
                Else
                    $lCampos = $lCampos.",".$lCadena.$clase->tablaCampos->obtenerValor($i).$lCadena;
			}
			If ($swKey == 1) $swKey++;
            $retorno = "INSERT into ".$clase->tablaNombre." values(".$lCampos.")";
        return $retorno;
		}
	}
//MÉTODOS PRIVADOS##############################################################################
	private function getNextId($column,$table){
		try {
				$cnn=Database::instance();
				$PDOQuery = "SELECT MAX($column) AS Maximo FROM $table;";
				$dso=$cnn->query($PDOQuery);
				$ultimo=$dso->fetch();
				$plusid=$ultimo['Maximo'];
				if ($plusid=="") {
					$plusid=1;
				}
				else{
					$plusid++;
				}
				return $plusid;
        	}
        catch (\PDOException $e) {
    		echo 'Incidencia al generar nuevo código ',  $e->getMessage(), ".\n";
		}		
	}
}

	/*public function LLenarDataGridViewer($datasource=array(),$noMostrarColumna){
		$this->_mySQLiDataGridView->getInstance($datasource);
		$this->_mySQLiDataGridView->setGridAttributes(array('cellspacing' => '1', 'cellpadding' => '5', 'border' => '0'));
		$this->_mySQLiDataGridView->enableSorting(true);
		$this->_mySQLiDataGridView->removeColumn('$noMostrarColumna');
		return $this->_mySQLiDataGridView->render();
		//return $this-_mySQLDataGridView;
		/*try{
			$SQLquery=GetSQLQuery($clase);
			$this->ldatatabla=$mconexion->GetDatatable($SQLquery);
			$dgwGrid->datasource=$lDatatabla;
		}
		catch(Exception $ex){
			echo '$ex';
			
		}
	}*/
//Crear sqlcomand de modelos
	/*
	Private Function getQueryINSERTNoGenerarCodigo($Clase){
        $retorno="";
        $n = $Clase->tablaTamaño;
        For ($i = 0;$i<=$n;$i++){
            If ($Clase->tablaCampos->obtenerTipo($i) = TipoDato::CADENA) 
                $this->lCadena = "'";
            Else
                $this->lCadena = "";
            If (i == 0) 
                $lCampos = $lCadena.$Clase->tablaCampos->obtenerValor($i).$lCadena;
            Else
                $lCampos = $lCampos.",".$lCadena.$Clase->tablaCampos->obtenerValor($i).$lCadena;
            
        }
        $retorno = "INSERT INTO " .$Clase->tablaNombre." values(".$lCampos.")";
        Return $retorno;
	}
	Private Function getSQLQueryUpDate($Clase){
        $retorno= "";
        $n = $Clase->tablaTamaño;
        $swKey = 0;
        For ($i = 0;$i<=$n;$i++){
            If ($Clase->tablaCampos->obtenerTipo($i) = TipoDato::CADENA)$lCadena = "'";
            Else $lCadena = "";
            
            If (i == 0) $lCampos = $Clase->tablaCampos->obtenerNombre($i)." = ".$lCadena . $Clase->tablaCampos->obtenerValor($i).$lCadena;
            Else        $lCampos = $lCampos. "," .$Clase->tablaCampos->obtenerNombre($i)." = ". $lCadena . $Clase->tablaCampos->obtenerValor($i).$lCadena;
            
            If ($Clase->tablaCampos->obtenerKey($i) == PrimaryKey::SI){
                If ($swKey == 0){
                    $lWhere = $Clase->tablaCampos->obtenerNombre($i) . " = " . $lCadena . $Clase->tablaCampos->obtenerValor($i) . $lCadena;
                    $swKey = 1;
                }
                Else $lWhere = $lWhere . " AND " . $Clase->tablaCampos->obtenerNombre($i) . " = " . $lCadena . $Clase->tablaCampos->obtenerValor($i) . $lCadena;
            }
		}
        $retorno = "UPDATE  " . $Clase->tablaNombre ."  SET " . $lCampos . " WHERE " . $lWhere;
        Return $retorno;
	}
    
	Private Function GetSQLQueryDelete($Clase){
        $retorno = "";
        $n = $Clase->tablaTamaño;
        $swKey = 0;
        For ( $i= 0;$i<=$n;$i++){
            If ($Clase->tablaCampos->obtenerTipo($i) = TipoDato::CADENA) $lCadena = "'";
            Else $lCadena = "";
            /*If i = 0 Then
            *    lCampos = $Clase->mCamposTabla.SacarNombre(i) & " = " & lCadena & $Clase->mCamposTabla.SacarValor(i) & lCadena
            * Else
            *    lCampos = lCampos & "," & $Clase->mCamposTabla.SacarNombre(i) & " = " & lCadena & $Clase->mCamposTabla.SacarValor(i) & lCadena
            * End If--!>
            If ($Clase->tablaCampos->obtenerKey($i) = PrimaryKey::SI){
                If ($swKey == 0) {
                    $lWhere = $Clase->tablaCampos->obtenerNombre($i). " = " . $lCadena .$Clase->tablaCampos->obtenerValor($i).$lCadena;
                    $swKey = 1;
            	}            
            	Else
                    $lWhere = $lWhere." AND ".$Clase->tablaCampos->obtenerNombre($i)." = ".$lCadena.$Clase->tablaCampos->obtenerValor($i).$lCadena;
            }
        }
        $retorno = "Delete From  " . $Clase->tablaNombre . " WHERE " . $lWhere;
        Return $retorno;
	}
	Private Function GetSQLQueryListaDeCodigo($Clase){
        $retorno = "";
        $n = $Clase->tablaTamaño;
        $swKey = 0;
        For ($i = 0;$i<=$n;$i++){
            If ($Clase->tablaCampos->obtenerTipo($i) = TipoDato::CADENA) $lCadena = "'";
            Else $lCadena = "";
            
            If ($swKey == 0 And $Clase->tablaCampos->obtenerKey($i) = PrimaryKey::SI) {
                $lCampos = $Clase->tablaCampos.obtenerNombre($i);
                $swKey++;
            }
            Else{
                $swKey++;
                $lCampos = $lCampos. " , ". $Clase->tablaCampos->obtenerNombre($i);
            }
        }
        $retorno = "select " . $lCampos . "from " . $Clase->tablaNombre;
        Return $retorno;
	}*/
	/*Private Function GetSQLQuery($Clase){
        $retorno= "";
        $n = $Clase->tablaTamaño;
        $swKey = 0;
        For ($i = 0;$i<=$n;$i++){
            If ($Clase->mTablaCampos->obtenerTipo($i) = TipoDato::CADENA) $lCadena = "'";
            Else $lCadena = "";
            
            If (i == 0) $lCampos = $Clase->mTablaCampos->obtenerNombre($i);
            Else        $lCampos = $lCampos . "," . $Clase->mTablaCampos->obtenerNombre($i);
            
            /*'If ($Clase->mCamposTabla.SacarKey(i) = PrimaryKey.si) Then
            '    If (sw = 0) Then
            '        lWhere = $Clase->mCamposTabla.SacarNombre(i) & " = " & lCadena & $Clase->mCamposTabla.SacarValor(i) & lCadena
            '        sw = 1
            '    Else
            '        lWhere = lWhere & " AND " & $Clase->mCamposTabla.SacarNombre(i) & " = " & lCadena & $Clase->mCamposTabla.SacarValor(i) & lCadena
            '    End If
            'End If--!>
        }
        $retorno = "select " . lCampos . " from " . $Clase->tablaNombre;
        Return $retorno;
	}
	/*Public function RegistroAgregarNoGenerarCodigo($Clase){
        Try{
            $SQLquery = GetSQLQueryINSERTNoGenerarCodigo($Clase);
            $this->mconexion->SQLNoQuery($SQLquery,$this);
        }
        Catch (Exception $ex){
            If (TransaccionEstado())
            	$this->transaccionError = True;
            
            	MessageBox.Show($ex->getMessage());
        	}
	}
	Public function RegistroAgregarGenerarCodigo($clase){
		try{
			$SQLquery=GetSQLQueryInsertGenerarCodigo($clase);
			echo (GetSQLQueryInsertGenerarCodigo($clase));
			$mconexion->SQLNoQuery($SQLquery,$this);
			
		}
		catch(Exception $ex){
		if ($this->TransaccionError)
			echo $ex;
		}
	}
	Public function RegistroActualizar($clase){
		Try{
			$SQLquery=GetSQLQueryUpdate($clase);
			echo 'GetSQLQueryUpdate($clase)';
			$mconexion->SQLNoQuery($SQLquery,$this);
		}
		catch(Exception $ex){
			if($this->TransaccionEstado())
				$this->TransaccionError=TRUE;
		}
	}
	Public function RegistroRecuperar($clase){
		$lTabla="";
		Try{
			$i=0;
			$n=0;
			$SQLquery=GetSQLQuerySelect($clase);
			$lTable=$mconexion->GetDatatable($SQLquery);
			$n=$lTabla->Columns->$Count;
			For($i;$i=>$n;$i--){
				$clase->mTablaCampos->PonerValor($i,$lTabla->$row[0]->$Item[$i]);
				
			}
		}
		catch(Exception $ex){
			echo $ex;
		}
	}
	Public function RegistroEliminar($clase){
		Try{
			$SQLquery=GetSQLQueryDelete($clase);
			$SQLRead=$mconexion->SQLquery($SQLquery,$this);
			$SQLQueryCerrar();
		}
		catch(Exception $ex){
			echo '$ex';
		}
	}*/
//Operaciones y comprobaciones de la tabla
	/*public function RegistroExiste($clase){
		$retorno=FALSE;
		Try{
			$SQLquery=GetSQLQuerySelect($clase);
			$SQLRead=$mconexion->SQLquery($SQLquery);
			if($SQLRead->Read and $SQLRead->Hasrows=TRUE) $retorno =TRUE;
			SQLQueryCerrar();
		}
		catch(Exception $ex){
			echo '$ex';
		}
		return $retorno;
	}*/
	/*public function RegistroListaCodigos($clase){
		$retorno=new array[];
		$camposCodigo[];
		try{
			$SQLquery=GetSQLQueryListaDeCodigo($clase);
			$lDatatabla=$mconexion->GetDatatable($SQLquery);
			$n=$lDatatabla->Rows->$Count;
			$n=$lDatatabla->Columns->$Count;
			For($i=0;$i=>$n;$i--){
				For($j=0;$j=>$m;$j--){
					$camposCodigo[$j]=$ldatatabla->Rows[$i]->$item[$j];
				}
				array_push($retorno,$camposCodigo[]);
			}
			SQLQueryCerrar();
		}
		catch(Exception $ex){
			echo '$ex';
		}
		return $retorno;
	}*/
	/*public function RegistroRecuperarConjuntoDeDatos(){
		$ds="";
		Try{
			$SQLquery($clase);
			$ds=$mconexion->GetDataSet($SQLquery);			
		}
		Catch(Exception $ex){
			echo '$ex';
		}
		return $ds;
	}*/
	/*Public Function RegistroRecuperarTabla($Clase){
        $dt="";
		Try{
            $SQLquery=GetSQLQuery($clase); 
			$dt=$mconexion->GetDatatable($SQLquery);
        }
        Catch (Exception $ex){
            echo '$ex';
      	}
    }*/
//Procedimientos almacenados
	/*public function ProcedimientosAlmacenado($procedimiento,$nombreTabla,$parametros,$numParam){
		$ldataset="";
		Try{
			$ldataset=$mconexion->GetStoreProcedure($procedimiento,$nombreTabla,$parametros,$numParam);
		}
		catch(Exception $ex){
			echo '$echo';
		}*/
		

?>