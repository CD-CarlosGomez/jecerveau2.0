<?php

namespace mySQLi;

include(dirname(__FILE__).'/auxiliar_classes.php');

/**
 * Extended MySQLi Parametrized DB Class
 *
 * dbmysqli.php, a MySQLi database access wrapper
 * Original idea from Mertol Kasanan, http://www.phpclasses.org/browse/package/5191.html
 * Optimized, tuned and fixed by unreal4u (Camilo Sperberg)
 * Adapted By Carlos Gómez
 * @package dbmysqli
 * @version 5.0.0
 * @author Camilo Sperberg, http://unreal4u.com/
 * @author Mertol Kasanan
 * @license BSD License
 * @copyright 2009 - 2014 Camilo Sperberg
 *
 * @method int num_rows() num_rows() Returns the number of results from the query
 * @method mixed[] insert_id() insert_id($query, $args) Returns the insert id of the query
 * @method mixed[] query() query($query, $args) Returns false if query could not be executed, resultset otherwise
 */
class dbmysqli {
   

    /**
     * Contains the actual DB connection instance
     * @var object
     */
    private $db = null;

    /**
     * Contains the prepared statement
     * @var object
     */
    private $stmt = null;

   

   

    /**
     * Saves the last known error. Can be boolean false or string with error otherwise. Defaults to false
     * @var mixed[]
     */
    private $error = false;

    

   
 

   

    /**
     * Maintains statistics exclusively from the errors in SQL
     * @var array
     */
    public $dbErrors = array();

  

    

   



   

    

   

    

   

   



    




 
