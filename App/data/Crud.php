<?php 
 /*************************************************************************************************************** 
 * @author William F. Leite                                                                                     *  
 * Data: 20/06/2014                                                                                             *
 * Título: CRUD genérico                                                                                        *  
 * Descrição: A Classe de CRUD genérico foi elaborada com o objetivo de auxlilar nas operações CRUDs em diversos* 
 * SGBDS, possui funcionalidades para construir instruções de INSERT, UPDATE E DELETE onde as mesmas podem ser  *
 * executadas nos principais SGBDs, exemplo SQL Server, MySQL e Firebird. Instruções SELECT são recebidas       *
 * integralmente via parâmetro.                                                                                 *  
 *************************************************************************************************************/  
 // +---------------------------Comentarios de versión
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
	* Atributo que guarda la conexión PDO 
	*/   
   private $PDOcnn = null;
	/*  
	*Atributo estático que contém uma instância da própria classe 
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
*                  ##########MÉTODOS ABSTRACTOS##########                      *
*                                                                              *
*******************************************************************************/
/*******************************************************************************
*                                                                              *
*                  ######CONSTRUCTORES Y DESTRUCTORES####                      *
*                                                                              *
*******************************************************************************/
	/* 
	* Método privado construtor da classe trae la conexión a la base de datos
	*/   
   private function __construct(){   
    $this->PDOcnn = Database::instance(); 
   }
   	/*    
   * Método público estático que retorna uma instância da classe Crud    
   * @param $conexao = Conexão PDO configurada   
   * @param $tabla = Nome da tabla   
   * @return Atributo contendo instância da classe Crud   
   */   
   public static function getInstance(){   
     // Verifica se existe uma instância da classe   
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
*                  ##########MÉTODOS MÁGICOS##########                         *
*                                                                              *
*******************************************************************************/
/*******************************************************************************
*                                                                              *
*                  ##########MÉTODOS PÚBLICOS##########                        *
*                                                                              *
*******************************************************************************/
   /*   
   * Método público para generar el siguiente PK  
   * @param string $column = Nombre del field a sacar el valor   
   * @param string $table = Nombre de la tabla a la que se le sacará el valor
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
   * Método público para inserir os dados na tabla   
   * @param $arrayDados = Array de dados contendo colunas e valores   
   * @return Retorna resultado booleano da instrução SQL   
   */   
   public static function insert($arrayDados,$table){   
      try {   
		$PDOcnn = Database::instance();
        // Atribui a instrução SQL construida no método   
        $PDOquery = self::buildInsert($arrayDados,$table);   
		// Passa a instrução para o PDO   
        $PDOstm = $PDOcnn->prepare($PDOquery);   
       // Loop para passar os dados como parâmetro   
        $cont = 1;   
              foreach ($arrayDados as $valor):   
                    $PDOstm->bindValue($cont, $valor);   
                    $cont++;   
              endforeach;   
    
        // Executa a instrução SQL e captura o retorno   
        $PDOResultSet = $PDOstm->execute();   
    
        return true;   
           
      }
	  catch (\PDOException $e) {   
        echo "Erro: " . $e->getMessage();   
      }   
	}   
	/*   
   * Método público para atualizar os dados na tabla   
   * @param $arrayDados = Array de dados contendo colunas e valores   
   * @param $arrayCondicao = Array de dados contendo colunas e valores para condição WHERE - Exemplo array('$id='=>1)   
   * @return Retorna resultado booleano da instrução SQL   
   */   
   public function update($arrayDados, $arrayCondicao){   
      try {   
    
        // Atribui a instrução SQL construida no método   
        $sql = $this->buildUpdate($arrayDados, $arrayCondicao);   
    
        // Passa a instrução para o PDO   
        $stm = $this->pdo->prepare($sql);   
    
        // Loop para passar os dados como parâmetro   
        $cont = 1;   
        foreach ($arrayDados as $valor):   
            $stm->bindValue($cont, $valor);   
            $cont++;   
        endforeach;   
              
        // Loop para passar os dados como parâmetro cláusula WHERE   
        foreach ($arrayCondicao as $valor):   
            $stm->bindValue($cont, $valor);   
            $cont++;   
        endforeach;   
    
        // Executa a instrução SQL e captura o retorno   
        $retorno = $stm->execute();   
    
        return $retorno;   
           
      } catch (PDOException $e) {   
        echo "Erro: " . $e->getMessage();   
      }   
   }   
    /*   
   * Método público para excluir os dados na tabla   
   * @param $arrayCondicao = Array de dados contendo colunas e valores para condição WHERE - Exemplo array('$id='=>1)   
   * @return Retorna resultado booleano da instrução SQL   
   */   
   public function delete($arrayCondicao){   
      try {   
    
        // Atribui a instrução SQL construida no método   
        $sql = $this->buildDelete($arrayCondicao);   
    
        // Passa a instrução para o PDO   
        $stm = $this->pdo->prepare($sql);   
    
              // Loop para passar os dados como parâmetro cláusula WHERE   
              $cont = 1;   
              foreach ($arrayCondicao as $valor):   
                $stm->bindValue($cont, $valor);   
                $cont++;   
              endforeach;   
    
        // Executa a instrução SQL e captura o retorno   
        $retorno = $stm->execute();   
    
        return $retorno;   
           
      } catch (PDOException $e) {   
        echo "Erro: " . $e->getMessage();   
      }   
   }   
    /*  
   * Método genérico para executar instruções de consulta independente do nome da tabla passada no _construct  
   * @param $sql = Instrução SQL inteira contendo, nome das tablas envolvidas, JOINS, WHERE, ORDER BY, GROUP BY e LIMIT  
   * @param $arrayParam = Array contendo somente os parâmetros necessários para clásusla WHERE  
   * @param $fetchAll  = Valor booleano com valor default TRUE indicando que serão retornadas várias linhas, FALSE retorna apenas a primeira linha  
   * @return Retorna array de dados da consulta em forma de objetos  
   */  
   public function getSQLGeneric($sql, $arrayParams=null, $fetchAll=TRUE){  
      try {   
    
        // Passa a instrução para o PDO   
        $stm = $this->pdo->prepare($sql);   
    
        // Verifica se existem condições para carregar os parâmetros    
        if (!empty($arrayParams)):   
    
          // Loop para passar os dados como parâmetro cláusula WHERE   
          $cont = 1;   
          foreach ($arrayParams as $valor):   
            $stm->bindValue($cont, $valor);   
            $cont++;   
          endforeach;   
        
        endif;   
    
        // Executa a instrução SQL    
        $stm->execute();   
    
        // Verifica se é necessário retornar várias linhas  
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
*                  ##########MÉTODOS PRIVADOS##########                        *
*                                                                              *
*******************************************************************************/
 /*   
   * Método privado para construção da instrução SQL de INSERT   
   * @param $arrayDados = Array de dados contendo colunas e valores   
   * @return String contendo instrução SQL   
   */    
   public static function buildInsert($arrayDados,$table){   
       // Inicializa variáveis   
       $sql = "";   
       $campos = "";   
       $valores = "";   
              
       // Loop para montar a instrução com os campos e valores   
       foreach($arrayDados as $chave => $valor):   
          $campos .= $chave . ', ';   
          $valores .= '?, ';   
       endforeach;   
              
       // Retira vírgula do final da string   
       $campos = (substr($campos, -2) == ', ') ? trim(substr($campos, 0, (strlen($campos) - 2))) : $campos ;    
              
       // Retira vírgula do final da string   
       $valores = (substr($valores, -2) == ', ') ? trim(substr($valores, 0, (strlen($valores) - 2))) : $valores ;    
              
       // Concatena todas as variáveis e finaliza a instrução   
       $sql .= "INSERT INTO {$table} (" . $campos . ")VALUES(" . $valores . ")";   
              
       // Retorna string com instrução SQL   
       return trim($sql);   
	}
	 /*   
   * Método privado para construção da instrução SQL de UPDATE   
   * @param $arrayDados = Array de dados contendo colunas, operadores e valores   
   * @param $arrayCondicao = Array de dados contendo colunas e valores para condição WHERE   
   * @return String contendo instrução SQL   
   */    
   private function buildUpdate($arrayDados, $arrayCondicao){   
    
       // Inicializa variáveis   
       $sql = "";   
       $valCampos = "";   
       $valCondicao = "";   
              
       // Loop para montar a instrução com os campos e valores   
       foreach($arrayDados as $chave => $valor):   
          $valCampos .= $chave . '=?, ';   
       endforeach;   
              
       // Loop para montar a condição WHERE   
       foreach($arrayCondicao as $chave => $valor):   
          $valCondicao .= $chave . '? AND ';   
       endforeach;   
              
       // Retira vírgula do final da string   
       $valCampos = (substr($valCampos, -2) == ', ') ? trim(substr($valCampos, 0, (strlen($valCampos) - 2))) : $valCampos ;    
              
       // Retira vírgula do final da string   
       $valCondicao = (substr($valCondicao, -4) == 'AND ') ? trim(substr($valCondicao, 0, (strlen($valCondicao) - 4))) : $valCondicao ;    
              
        // Concatena todas as variáveis e finaliza a instrução   
        $sql .= "UPDATE {$this->tabla} SET " . $valCampos . " WHERE " . $valCondicao;   
              
        // Retorna string com instrução SQL   
        return trim($sql);   
	}
	 /*   
   * Método privado para construção da instrução SQL de DELETE   
   * @param $arrayCondicao = Array de dados contendo colunas, operadores e valores para condição WHERE   
   * @return String contendo instrução SQL   
   */    
   private function buildDelete($arrayCondicao){   
    
        // Inicializa variáveis   
        $sql = "";   
        $valCampos= "";   
              
        // Loop para montar a instrução com os campos e valores   
        foreach($arrayCondicao as $chave => $valor):   
           $valCampos .= $chave . '? AND ';   
        endforeach;   
              
        // Retira a palavra AND do final da string   
        $valCampos = (substr($valCampos, -4) == 'AND ') ? trim(substr($valCampos, 0, (strlen($valCampos) - 4))) : $valCampos ;    
              
        // Concatena todas as variáveis e finaliza a instrução   
        $sql .= "DELETE FROM {$this->tabla} WHERE " . $valCampos;   
              
        // Retorna string com instrução SQL   
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