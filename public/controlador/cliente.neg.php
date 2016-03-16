<?php
//Capa negocio - Cliente
require('../model/cliente.php');

	switch($_POST['btn']){
	case "Guardar":
		guardar();
	break;
	case "Modificar":
		modificar();
	break;
	case "Eliminar":
		eliminar();
	break;
	case "Buscar":
		buscar();
	break; 
	}

	function guardar(){
	$c=new cliente();
	$c->setNombre($_POST['txtnombre']);
	$c->setApellidos($_POST['txtapellidos']);
	$c->setTelefono($_POST['txttelefono']);
	if($c->guardar())
	  echo "Registro Guardado";
	else
	  echo "Error,no se puede guardar"; 
	}
	 
	function modificar(){
	$c=new cliente();
	$c->setCodCli($_POST['txtcodcli']);
	$c->setNombre($_POST['txtnombre']);
	$c->setApellidos($_POST['txtapellidos']);
	$c->setTelefono($_POST['txttelefono']);
	if($c->modificar())
	  echo "Registro Modificado";
	else
	  echo "Error,no se puede modificar"; 
	}
	 
	function eliminar()	{
	$c=new cliente();
	$c->setCodCli($_POST['txtcodcli']);
	if($c->eliminar())
	  echo "Registro eliminado";
	else
	  echo "Error,no se puedeeliminar"; 
	}
	 
	function mostrarclientes($registro)	{
	echo"<table border = '2'";
	echo"<tr><td>CODIGO</td>";
	echo"<td>NOMBRES</td>";
	echo"<td>PELLIDOS</td>";
	echo"<td>TELEFONK</td>";
	echo"</tr>";
	while($fila=mysqli_fetch_object($registro))
	{
	echo"<tr>";
	echo"<td> $fila->codigo </td>";
	echo"<td> $fila->nombre </td>";
	echo"<td> $fila->apellidos </td>";
	echo"<td> $fila->telefono </td>";
	echo"</tr>";
	}
	echo"</table>";
	}
	 
	function buscar()	{
	$c= new cliente();
	switch($_POST[grupo]){
	case 1:{ $registro=$c->buscar_nombre($_POST['txtbuscar']);
			 mostrarclientes($registro);
		   } break;
	case 2:{ $registro=$c->buscar_apellidos($_POST['txtbuscar']);
			 mostrar_registros($registro);
		   } break;
	 
	}
	}
	
	
?>