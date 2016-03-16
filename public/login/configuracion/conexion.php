<?php
$con = new mysqli ("localhost","root","", "test");
				if ($con->connect_error) {
					die("Conexión fallida Error x00erno1001: %s\n" . $this->_mysqli->connect_errno . $this->_mysqli->connect_error );
				}
				else{
					return $con;
				}
	
?>