<?php
include_once 'Conexion.php';
//include_once 'DataGridView.php'; Se quita la clase del datagrid porque es inestable.
Class Datos {
//#Declaración de variables
	Protected $_mySQLiConecta ="";
	Protected $_mySQLiConectando="";		  
	protected $_mySQLiConexion="";
	Protected $_mySQLiConectado="";
    Protected $mSQLRead;
    Protected $mlDataTabla;
	Protected $_mySQLiDataSource="";
    Protected $_mySQLiDataset=array();
	Protected $_mySQLiDataGridView;
    Protected $mSQLquery= "";
    Protected $mlCampos= "";
    Protected $mlWhere= "";
    Protected $mlCadena= "";
    Protected $i=0, $j=0, $n=0, $m=0, $swKey=0, $swCampo=0;
    Protected $_transaccion=TRUE;
    Protected $_transaccionEstado= FALSE;
    Protected $mTranasaccionError= FALSE;
//##########################################################

	
	public function __construct(){
	}
	public function MySQLiComando($query){
		$result=$this->_mySQLiConexion->SQLComand($query);
		return $result;
	}
	public function getStatusDeLaConexion(){
		$this->_mySQLiConexion->getStatusDeLaConexion();
	}
	public function LLenarDataSource($mySQLiResult=array()){
		while ($mySQLiResult){
			$this->_mySQLiDataSource[]=$mySQLiResult;
		}
	}
	public function getQueryNuevoCodigo($nombreTabla="", $nombreCampos=""){
		$retorno = 0;
        $mySQLiQuery = "";
        try {
				$mySQLiQuery = "SELECT MAX( ".$nombreCampos." ) AS Maximo FROM ".$nombreTabla. " ";
				$dso=self::MySQLiComando($mySQLiQuery);
				$ultimo=$dso->fetch_row();
				$plusid=$ultimo[0];
				if ($plusid=="") {
					$plusid=1;
				}
				else{
					$plusid++;
				}
        	}
        catch (Exception $e) {
    		echo 'Incidencia al generar nuevo código ',  $e->getMessage(), ".\n";
		}
		return $plusid;
	}
	public function MySQLiComandoParametrizado($Query="",$bindParam="",$parametros=array()){
		$result=$this->_mySQLiConexion->mySQLiComandoParametrizado($Query="",$bindParam="",$parametros=array());
		return $result;
	}
	public function getParametroEscapado($parametro){
		$devolver="";
		if(is_string($parametro)){
			$devolver="'%";
			//$devolver.=$this->_mySQLiConexion->real_escape_string($parametros);
			$devolver.=$parametro;
			$devolver.="%'";
		}
		if(is_integer($parametro)){
			$devolver.="'%";
			$devolver.=$parametro;
			$devolver.="%'";
		}
		return $devolver;
	}
	public function getParametrosEnArray($parametro){
		$devolver = "";
		if(is_array($parametro)){
				foreach($parametro as &$par){
					if($devolver == ''){
						$devolver .= self::prepararParametro($par);
				}
				else{
						$devolver .= ','.self::prepararParametro($par);
				}
				}
		}
		else if($parametro == NULL){
		return 'NULL';
		}
		unset($par);
		return $devolver;
	}
	public Function getSQLQuerySelectLike($lCampos=array(),$ltabla="",$lWhereCampo=array(),$lWhereParametro=array()){
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
				$lWhere = " WHERE " . $lWhereCampo[$j] . " like " . self::getParametroEscapado($lWhereParametro[$j]);
			}
            Else{
				$lWhere .= " AND " .  $lWhereCampo[$j] . " like " . self::getParametroEscapado($lWhereParametro[$j]);
			} 
        }    
        $retorno = "SELECT " . $lCampo . " FROM " . $ltabla . $lWhere .";" ;
		Return $retorno;
	}

}

//Transacciones
	/*public function transaction(){
		return $_transaccion;
	}
	public function transaccionIniciar(){
		mconexion.TransaccionIniciar(mTranasaccion);
		mTranasaccionEstado=TRUE;
		mTranasaccionError=FALSE;
	}
	public function transaccionTerminar(){
		if (mTranasaccionError==TRUE){
			if (mTranasaccionEstado==TRUE){
				mTranasaccion->Rollback();
				mTranasaccionEstado=FALSE;
			}
		}
		else{
			if(mTranasaccionEstado==TRUE){
				mTranasaccion->Commit();
			}
		}
	}*/
//Getters and setters conexión
	/*public function getConexion(){
		return $this->mconexion;
	}
	public function getTransaccionEstado(){
		return $this->mTranasaccionEstado;
	}
	public function setTransaccionEstado($value){
		$this->mTranasaccionEstado=$value;
	}
	public function getTransaccion(){
		return $mTranasaccion;
	} 
	public function setTransaccion($value){
		$this->mTranasaccion=$value;
	}
	public function getTransaccionError(){
		return $this->mTranasaccionError;
	}
	public function setTransaccionError($value){
		return $this->mTranasaccionError=$value;
	}*/
//Retornar un objeto de la clase Conexion
	//public function SQLQueryCerrar(){
		//$this->mconexion->CerrarLectorDatos();
	//}
//Crear sqlcomand de modelos
	/*private function getQueryINSERTgenerarCodigo($clase){
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