<?php
	session_start();
	echo $usuarioId=$_SESSION["nombreUsuario"];
	if (isset($_SESSION['loggedin']) & $_SESSION['loggedin'] == true){}
	else{
	echo "Esta pagina es solo para usuarios registrados.<br>";
	echo "<a href='main_login.html'>Login Here!</a>";
	exit;
	}
	$now = time(); // checking the time now when home page starts
	if($now > $_SESSION['expire']){
	session_destroy();
	echo "Su sesion a terminado, <a href='main_login.html'>
	      Necesita Hacer Login</a>";
	exit;
	}



//$S_emp="SELECT * FROM participantes2 where idEvento=2;";
//$exe_Semp=mysql_query($S_emp);
//if($exe_Semp)
 //$row=mysql_fetch_array($exe_Semp);
//else echo "<script language='javascript'>alert('No se han encontrado registros en la base de datos.'); </script>";

//$row5=mysql_fetch_array(mysql_query("SELECT * FROM informacionadicional where idDatos=5;"),MYSQL_NUM);

$cn='
	<table width="50%" height="50%" class="info">
			<tr>
				<th width="15%"><div align="center">No.</div></th>
				<th width="15%"><div align="center">Nombre</div></th>
				<th width="15%"><div align="center">Sexo</div></th>
				<th width="15%"><div align="center">Entidad Federativa</div></th>
				<th width="15%"><div align="center">Municipio</div></th>
				<th width="15%"><div align="center">Direcci&oacute;n</div></th>
				<th width="15%"><div align="center">Colonia</div></th>
				<th width="15%"><div align="center">C.P.</div></th>
				<th width="15%"><div align="center">Tel&eacute;fono</div></th>
				<th width="15%"><div align="center">Correo electr&oacute;nico</div></th>
				<th width="15%"><div align="center">Instituci&oacute;n de procedencia</div></th>
			</tr>
	';
$contador=0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Inicio</title>
		<link rel="stylesheet" href="../blueprint/screen.css" type="text/css">
	</head>
	<body>
<!--<body onload="abreVentana()">-->
		<div class="container">
		<div align="center"><img src="../imagenes/pyme.jpg" /></div>
		<div align="center">
		<div align="center">
<?php
/*while ($row = mysql_fetch_array($exe_Semp)){ 
  $cn.="<tr>";
  $row3=mysql_fetch_array(mysql_query("SELECT valor FROM informacionadicional where idDatos=3 and idUsuario=$row[0];"),MYSQL_NUM);
  $row4=mysql_fetch_array(mysql_query("SELECT valor FROM informacionadicional where idDatos=4 and idUsuario=$row[0];"),MYSQL_NUM);
  $row5=mysql_fetch_array(mysql_query("SELECT valor FROM informacionadicional where idDatos=5 and idUsuario=$row[0];"),MYSQL_NUM);

   $cn.="<td width='5%'><div align='center'>".++$contador."</div></td>";
  $cn.="<td width='20%'><div align='left'>".htmlentities($row[3].' '.$row[4].' '.$row[5])."</div></td>";
  $cn.="<td width='5%'><div align='center'>".htmlentities($row[17])."</div></td>";
  $cn.="<td width='15%'><div align='center'>".htmlentities($row[8])."</div></td>";
  $cn.="<td width='15%'><div align='center'>".$row3[0]."</div></td>";
  $cn.="<td width='11%'><div align='left'>".$row[15]."</div></td>";
  $cn.="<td width='15%'><div align='center'>".$row4[0]."</div></td>";
  $cn.="<td width= '5%'><div align='center'>".$row[14]."</div></td>";
  $cn.="<td>".$row[10]."</td>";
  $cn.="<td width='11%'><a href='mailto:".$row[6]."'>".$row[6]."</a></td>";
  $cn.="<td width='15%'><div align='center'>".htmlentities($row5[0])."</div></td>";
  $cn.="</tr>";
  //$contador++;
    }//fin del While*/
$cn.="</table>";
echo $cn;
//echo "Paginas ".$paging->fetchNavegacion();

?>
<a href="../controlador/logout.neg.php">Salir</a>
</div>

</div>
</div>
</body>
</html>
