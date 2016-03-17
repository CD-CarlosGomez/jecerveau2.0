<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Login</title>

<link rel="stylesheet" href="../blueprint/screen.css" type="text/css">

<link href='http://fonts.googleapis.com/css?family=Tangerine:bold' rel='stylesheet' type='text/css'>

<!--[if IE]>
    <link type="text/css" rel="stylesheet" media="all" href="../css/ie.css"/>
<![endif]-->


<!--[if lte IE 7]>
    <link type="text/css" rel="stylesheet" media="all" href="../css/ie7.css"/>
<![endif]-->

</head>

<body>
	
	
	<div id="header">
		<!-- jQuery handles to place the header background images -->
		<div align="center">Logo</div>
		
	</div>
	

	<div>
		
			
		<div class="cuadrocolor" style="width:100%">
		
			<fieldset> 
				<legend>Log-In</legend> 
				<form action="public/controlador/login.neg.php" method="post">
				<table width="80%">
				<tr>
				<td class="span-7">Usuario:</td>
				<td class="span-7"><input type="text" name="usuario" size="20" class="cajaGrande"/></td>
				</tr>
				<tr>
				<td class="span-7">Contrase&ntilde;a:</td>
				<td class="span-7"><input type="password" name="contrasena" size="10" maxlength="10" class="cajaGrande" /></td>
				</tr>
				<tr>
				<td colspan="2"><div align="center"><input type="submit" value="Acceder" name="btn"/></div></td>
				</tr>
				</table>
				</form>					
			</fieldset>		

		</div>
		
		
	</div>
</body>
</html>            

