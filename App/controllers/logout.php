<?php
// +-----------------------------------------------
// | @author Carlos M. Gómez
// | @date Miércoles 5 de diciembre de 2012
// | @Version 1.0 
// +-----------------------------------------------
// +-----------------------------------------------
#	Ahora el login lo hace de manera brusca llamando
#al fichero, pero es necesario hacer un método y que
#se pueda invocar desde la clase \Model\CurrentUser
//CONSTANTES#########################################
//ATRIBUTOS##########################################
//PROPIEDADES########################################
//MÉTODOS ABSTRACTOS#################################
//MÉTODOS PÚBLICOS###################################
//MÉTODOS PRIVADOS###################################
//EVENTOS############################################
//CONTROLES##########################################
//MAIN###############################################
session_start();
// Borramos toda la sesion
session_destroy();
echo "Aquí vamos a reenviar";
header("Location:http://localhost:8012/ibrain2.0/");
?>
