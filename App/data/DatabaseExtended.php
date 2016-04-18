<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date Miércoles 5 de diciembre de 2012
// |  * @Version 1.0, esta clase sólo servirá para ejecutar storeProcedures y transacciones.y otras funciones más complejas
// +-----------------------------------------------
namespace App\data;
defined("APPPATH") OR die("Access denied");

use \Core\Database;

class DatabaseExtended extends Database{
//CONSTANTES#########################################
//ATRIBUTOS##########################################
	private $_PDOcnn="";
	private $_transaccion=TRUE;
    private $_transaccionEstado= FALSE;
    private $mTranasaccionError= FALSE;
//PROPIEDADES########################################
	public static function getPDOcnn(){
		$PDOcnn=parent::instance();
		return $PDOcnn;
	}
	Public Function getStoreProcedure($pprocedimiento,$pnombreTabla,$pparametros,$pnumParam){
		$mDataAdapter=new SqlDataAdapter();
		$mcomando=new dataSet();
		$i=0;
		$sparCatID=new SQLParameter();
		Try{
			abrirConexion();
			$mcomando=new SQLcommand($pprocedimiento,getConexion());
			//$mComando->CommanndTimeout=300; Establecer un timeout de respuesta del store procedure
			//$mcomando->CommandType= CommandType.Storeprocedure Especificamos que es un storeprocedure la consulta
			/*For($i=0;$i<=$pnumParam;$i--){
				$sparCatID=new SQLParameter;
				sparCatID.ParameterName = Parametros.GetValue(i, 0).ToString()
                sparCatID.DbType = CType(Parametros.GetValue(i, 1), DbType)
                sparCatID.Value = Parametros.GetValue(i, 2)	
				$mcomando->Parameters->add($sparCatID);
			}*/
			$mDataAdapter->Fill($mDataSet,$pnombreTabla);
		}
		catch(Exception $ex){
			echo '$ex';
		}
		return $mDataSet;
	}
	//Getters and setters transaccion
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

//CONSTRUCTORES  Y DESTRUCTORES####################
//MÉTODOS MÁGICOS################################
//MÉTODOS ABSTRACTOS################################
//MÉTODOS PÚBLICOS###################################
	public function PDOQueryParam($Query="",$bindParam="",$parametros=array()){  //retorna bool
	}
	public function CerrarLector($mComando){
		$mComando->close();
	}
	public function TransactionIniciar(){
		$Transaction=$mconexion->BeginTransaction();
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
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################

	/*Public function mySQLiCommadoTransaccion($query){ //Dato es un objeto tipo ClaseDatos
			if($_dato->transaccionEstado){//se inicia en False
				$this->mysqli->begin_transaction(MYSQLI_TRANS_START_READ_ONLY);
				$this->mysqli->query($query);
				$this->_mLector=$this->mysqli->commit();
			}
			return $mLector;
		}*/
	/*Public function cerrarAdaptador(){
		$mDataAdapter->Dispose();
	}

    
//Metodos para Store Procedures	
	
}
?>