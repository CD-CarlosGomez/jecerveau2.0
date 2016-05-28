<?php 
 /*************************************************************************************************************** 
 * @author William F. Leite                                                                                     *  
 * Data: 20/06/2014                                                                                             *
 * T�tulo: CRUD gen�rico                                                                                        *  
 * Descri��o: A Classe de CRUD gen�rico foi elaborada com o objetivo de auxlilar nas opera��es CRUDs em diversos* 
 * SGBDS, possui funcionalidades para construir instru��es de INSERT, UPDATE E DELETE onde as mesmas podem ser  *
 * executadas nos principais SGBDs, exemplo SQL Server, MySQL e Firebird. Instru��es SELECT s�o recebidas       *
 * integralmente via par�metro.                                                                                 *  
 *************************************************************************************************************/  
 // +---------------------------Comentarios de versi�n
namespace App\data;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
header('Content-Type: text/html; charset=utf-8');  

class Crud{ 
/*******************************************************************************
*                                                                              *
*                           ##########REQUEST##########                        *
*                                                                              *
*******************************************************************************/
/*******************************************************************************
*                                                                              *
*                        ##########CONSTANTES##########                        *
*                                                                              *
*******************************************************************************/
/*******************************************************************************
*                                                                              *
*                         ##########ATRIBUTOS##########                        *
*                                                                              *
*******************************************************************************/
	/*  
	* Atributo que guarda la conexi�n PDO 
	*/   
   private $PDOcnn = null;
	/*  
	*Atributo est�tico que cont�m uma inst�ncia da pr�pria classe 
	*/   
   private static $crud = null; 
/*******************************************************************************
*                                                                              *
*                       ##########PROPIEDADES##########                        *
*                                                                              *
*******************************************************************************/
	public function __set_($var, $valor) {  
     if (property_exists(__CLASS__, $var)) {  
       $this->$var = $valor;  
     } else {  
       echo "No existe el atributo $var.";  
     }  
   }  
   public function __get_($var) {  
     if (property_exists(__CLASS__, $var)) {  
       return $this->$var;  
     }  
     return NULL;  
   }
/*******************************************************************************
*                                                                              *
*                  ##########M�TODOS ABSTRACTOS##########                      *
*                                                                              *
*******************************************************************************/
/*******************************************************************************
*                                                                              *
*                  ######CONSTRUCTORES Y DESTRUCTORES####                      *
*                                                                              *
*******************************************************************************/
	/* 
	* M�todo privado construtor da classe trae la conexi�n a la base de datos
	*/   
   private function __construct(){   
    $this->PDOcnn = Database::instance(); 
   }
   	/*    
   * M�todo p�blico est�tico que retorna uma inst�ncia da classe Crud    
   * @param $conexao = Conex�o PDO configurada   
   * @param $tabla = Nome da tabla   
   * @return Atributo contendo inst�ncia da classe Crud   
   */   
   public static function getInstance(){   
     // Verifica se existe uma inst�ncia da classe   
     if(!isset(self::$crud)):   
        try {   
          self::$crud = new Crud();   
        } catch (Exception $e) {   
          echo "Erro " . $e->getMessage();   
        }   
     endif;     
     return self::$crud;   
	}
/*******************************************************************************
*                                                                              *
*                  ##########M�TODOS M�GICOS##########                         *
*                                                                              *
*******************************************************************************/
/*******************************************************************************
*                                                                              *
*                  ##########M�TODOS P�BLICOS##########                        *
*                                                                              *
*******************************************************************************/
   /*   
   * M�todo p�blico para generar el siguiente PK  
   * @param string $column = Nombre del field a sacar el valor   
   * @param string $table = Nombre de la tabla a la que se le sacar� el valor
   * @return  int $plusid el siguiente PK     
   */    
	public static function getNextId($field,$table){
		try {
				$cnn=Database::instance();
				$PDOQuery = "SELECT MAX($field) AS Maximo FROM $table;";
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
    		echo 'Incidencia al generar nuevo c?digo ',  $e->getMessage(), ".\n";
		}
	}
	public static function getAll($table){
        try {
			$PDOcnn = Database::instance();
			$PDOQuery = "SELECT * from $table";
			$PDOResultSet = $PDOcnn->query($PDOQuery);
			return $PDOResultSet;
		}
        catch(\PDOException $e)
        {
			print "Error!: " . $e->getMessage();
		}
    }
	
	
	
    public static function getById($table,$field,$param) {
        try {
            $PDOcnn = Database::instance();
            $PDOquery = "SELECT * from $table WHERE $field = $param";
            $PDOResultSet = $PDOcnn->query($PDOquery);
			return $PDOResultSet;
        }
        catch(\PDOException $e){
            print "Error!: " . $e->getMessage();
        }
    }
	/*   
   * M�todo p�blico para inserir os dados na tabla   
   * @param $arrayDados = Array de dados contendo colunas e valores   
   * @return Retorna resultado booleano da instru��o SQL   
   */   
   public static function insert($arrayDados,$table){   
      try {   
		$PDOcnn = Database::instance();
        // Atribui a instru��o SQL construida no m�todo   
        $PDOquery = self::buildInsert($arrayDados,$table);   
		// Passa a instru��o para o PDO   
        $PDOstm = $PDOcnn->prepare($PDOquery);   
       // Loop para passar os dados como par�metro   
        $cont = 1;   
              foreach ($arrayDados as $valor):   
                    $PDOstm->bindValue($cont, $valor);   
                    $cont++;   
              endforeach;   
    
        // Executa a instru��o SQL e captura o retorno   
        $PDOResultSet = $PDOstm->execute();   
    
        return true;   
           
      }
	  catch (\PDOException $e) {   
        echo "Erro: " . $e->getMessage();   
      }   
	}   
	/*   
   * M�todo p�blico para atualizar os dados na tabla   
   * @param $arrayDados = Array de dados contendo colunas e valores   
   * @param $arrayCondicao = Array de dados contendo colunas e valores para condi��o WHERE - Exemplo array('$id='=>1)   
   * @return Retorna resultado booleano da instru��o SQL   
   */   
   public function update($arrayDados, $arrayCondicao){   
      try {   
    
        // Atribui a instru��o SQL construida no m�todo   
        $sql = $this->buildUpdate($arrayDados, $arrayCondicao);   
    
        // Passa a instru��o para o PDO   
        $stm = $this->pdo->prepare($sql);   
    
        // Loop para passar os dados como par�metro   
        $cont = 1;   
        foreach ($arrayDados as $valor):   
            $stm->bindValue($cont, $valor);   
            $cont++;   
        endforeach;   
              
        // Loop para passar os dados como par�metro cl�usula WHERE   
        foreach ($arrayCondicao as $valor):   
            $stm->bindValue($cont, $valor);   
            $cont++;   
        endforeach;   
    
        // Executa a instru��o SQL e captura o retorno   
        $retorno = $stm->execute();   
    
        return $retorno;   
           
      } catch (PDOException $e) {   
        echo "Erro: " . $e->getMessage();   
      }   
   }   
    /*   
   * M�todo p�blico para excluir os dados na tabla   
   * @param $arrayCondicao = Array de dados contendo colunas e valores para condi��o WHERE - Exemplo array('$id='=>1)   
   * @return Retorna resultado booleano da instru��o SQL   
   */   
   public function delete($arrayCondicao){   
      try {   
    
        // Atribui a instru��o SQL construida no m�todo   
        $sql = $this->buildDelete($arrayCondicao);   
    
        // Passa a instru��o para o PDO   
        $stm = $this->pdo->prepare($sql);   
    
              // Loop para passar os dados como par�metro cl�usula WHERE   
              $cont = 1;   
              foreach ($arrayCondicao as $valor):   
                $stm->bindValue($cont, $valor);   
                $cont++;   
              endforeach;   
    
        // Executa a instru��o SQL e captura o retorno   
        $retorno = $stm->execute();   
    
        return $retorno;   
           
      } catch (PDOException $e) {   
        echo "Erro: " . $e->getMessage();   
      }   
   }   
    /*  
   * M�todo gen�rico para executar instru��es de consulta independente do nome da tabla passada no _construct  
   * @param $sql = Instru��o SQL inteira contendo, nome das tablas envolvidas, JOINS, WHERE, ORDER BY, GROUP BY e LIMIT  
   * @param $arrayParam = Array contendo somente os par�metros necess�rios para cl�susla WHERE  
   * @param $fetchAll  = Valor booleano com valor default TRUE indicando que ser�o retornadas v�rias linhas, FALSE retorna apenas a primeira linha  
   * @return Retorna array de dados da consulta em forma de objetos  
   */  
   public function getSQLGeneric($sql, $arrayParams=null, $fetchAll=TRUE){  
      try {   
    
        // Passa a instru��o para o PDO   
        $stm = $this->pdo->prepare($sql);   
    
        // Verifica se existem condi��es para carregar os par�metros    
        if (!empty($arrayParams)):   
    
          // Loop para passar os dados como par�metro cl�usula WHERE   
          $cont = 1;   
          foreach ($arrayParams as $valor):   
            $stm->bindValue($cont, $valor);   
            $cont++;   
          endforeach;   
        
        endif;   
    
        // Executa a instru��o SQL    
        $stm->execute();   
    
        // Verifica se � necess�rio retornar v�rias linhas  
        if($fetchAll):   
          $dados = $stm->fetchAll(PDO::FETCH_OBJ);   
        else:  
          $dados = $stm->fetch(PDO::FETCH_OBJ);   
        endif;  
    
        return $dados;   
           
      } catch (PDOException $e) {   
        echo "Erro: " . $e->getMessage();   
      }   
   }
/*******************************************************************************
*                                                                              *
*                  ##########M�TODOS PRIVADOS##########                        *
*                                                                              *
*******************************************************************************/
 /*   
   * M�todo privado para constru��o da instru��o SQL de INSERT   
   * @param $arrayDados = Array de dados contendo colunas e valores   
   * @return String contendo instru��o SQL   
   */    
   public static function buildInsert($arrayDados,$table){   
       // Inicializa vari�veis   
       $sql = "";   
       $campos = "";   
       $valores = "";   
              
       // Loop para montar a instru��o com os campos e valores   
       foreach($arrayDados as $chave => $valor):   
          $campos .= $chave . ', ';   
          $valores .= '?, ';   
       endforeach;   
              
       // Retira v�rgula do final da string   
       $campos = (substr($campos, -2) == ', ') ? trim(substr($campos, 0, (strlen($campos) - 2))) : $campos ;    
              
       // Retira v�rgula do final da string   
       $valores = (substr($valores, -2) == ', ') ? trim(substr($valores, 0, (strlen($valores) - 2))) : $valores ;    
              
       // Concatena todas as vari�veis e finaliza a instru��o   
       $sql .= "INSERT INTO {$table} (" . $campos . ")VALUES(" . $valores . ")";   
              
       // Retorna string com instru��o SQL   
       return trim($sql);   
	}
	 /*   
   * M�todo privado para constru��o da instru��o SQL de UPDATE   
   * @param $arrayDados = Array de dados contendo colunas, operadores e valores   
   * @param $arrayCondicao = Array de dados contendo colunas e valores para condi��o WHERE   
   * @return String contendo instru��o SQL   
   */    
   private function buildUpdate($arrayDados, $arrayCondicao){   
    
       // Inicializa vari�veis   
       $sql = "";   
       $valCampos = "";   
       $valCondicao = "";   
              
       // Loop para montar a instru��o com os campos e valores   
       foreach($arrayDados as $chave => $valor):   
          $valCampos .= $chave . '=?, ';   
       endforeach;   
              
       // Loop para montar a condi��o WHERE   
       foreach($arrayCondicao as $chave => $valor):   
          $valCondicao .= $chave . '? AND ';   
       endforeach;   
              
       // Retira v�rgula do final da string   
       $valCampos = (substr($valCampos, -2) == ', ') ? trim(substr($valCampos, 0, (strlen($valCampos) - 2))) : $valCampos ;    
              
       // Retira v�rgula do final da string   
       $valCondicao = (substr($valCondicao, -4) == 'AND ') ? trim(substr($valCondicao, 0, (strlen($valCondicao) - 4))) : $valCondicao ;    
              
        // Concatena todas as vari�veis e finaliza a instru��o   
        $sql .= "UPDATE {$this->tabla} SET " . $valCampos . " WHERE " . $valCondicao;   
              
        // Retorna string com instru��o SQL   
        return trim($sql);   
	}
	 /*   
   * M�todo privado para constru��o da instru��o SQL de DELETE   
   * @param $arrayCondicao = Array de dados contendo colunas, operadores e valores para condi��o WHERE   
   * @return String contendo instru��o SQL   
   */    
   private function buildDelete($arrayCondicao){   
    
        // Inicializa vari�veis   
        $sql = "";   
        $valCampos= "";   
              
        // Loop para montar a instru��o com os campos e valores   
        foreach($arrayCondicao as $chave => $valor):   
           $valCampos .= $chave . '? AND ';   
        endforeach;   
              
        // Retira a palavra AND do final da string   
        $valCampos = (substr($valCampos, -4) == 'AND ') ? trim(substr($valCampos, 0, (strlen($valCampos) - 4))) : $valCampos ;    
              
        // Concatena todas as vari�veis e finaliza a instru��o   
        $sql .= "DELETE FROM {$this->tabla} WHERE " . $valCampos;   
              
        // Retorna string com instru��o SQL   
        return trim($sql);   
   } 
/*******************************************************************************
*                                                                              *
*                  ##########EVENTOS##########                                 *
*                                                                              *
*******************************************************************************/
/*******************************************************************************
*                                                                              *
*                  ##########CONTROLES##########                               *
*                                                                              *
*******************************************************************************/
/*******************************************************************************
*                                                                              *
*                  ##########MAIN##########                                    *
*                                                                              *
*******************************************************************************/  
 }  