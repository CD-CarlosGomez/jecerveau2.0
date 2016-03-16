<?php
session_start();
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Congreso Internacional de Administraci&oacute;n 2012</title>

<link href="../css/style.css" rel="stylesheet" type="text/css"/>

<link href='http://fonts.googleapis.com/css?family=Tangerine:bold' rel='stylesheet' type='text/css'>

<!--[if IE]>
    <link type="text/css" rel="stylesheet" media="all" href="../css/ie.css"/>
<![endif]-->


<!--[if lte IE 7]>
    <link type="text/css" rel="stylesheet" media="all" href="../css/ie7.css"/>
<![endif]-->




<script type="text/javascript" src="../js/jquery-1.6.2.js"></script>

<script type="text/javascript" src="../js/script.js"></script>

</head>

<body>
	
	
	<div id="header">
		<!-- jQuery handles to place the header background images -->
		<div id="headerimgs">
			<div id="headerimg1" class="headerimg"></div>
			<div id="headerimg2" class="headerimg"></div>
		</div>
		
	</div>
	

	<div id="top">
		
		<div id="top-inner">
		
			<div id="menuSup">
			    <ul id="mainNav">
			        
			        <li id="actual" ><a href="#" >Inicio</a></li>
			        <li><a href="programa.html">Programa</a></li>
			        <li><a href="hospedaje.html">Hospedaje</a></li>
			        <li><a href="concurso.html">Concurso Labsag</a></li>
			        <li><a href="exposicion.html">Exposici&oacute;n de Proyectos</a></li>
			        <li><a href="inscripcion.php">Inscripci&oacute;n</a></li>
			        <li><a href="contacto.html">Contacto</a></li>
			        <li><a href="actividades.html">Actividades Alternas</a></li>
			        
			    </ul>
		</div>
		
		</div>
		
	
	</div>

	
	


	<div id="right">
		<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FCongreso-Internacional-de-Administraci%25C3%25B3n-Canc%25C3%25BAn-2012%2F277113582303905%23%21%2Fpages%2FCongreso-Internacional-de-Administraci%25C3%25B3n-Canc%25C3%25BAn-2012%2F277113582303905&amp;width=180&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=true&amp;header=true&amp;height=427" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100%; height:427px;" allowTransparency="true"></iframe>
	</div>


	
	
	<div class="wrapper">
		
		<div id="logo" >
			<div class="izq"> <img src="imagenes/escudoQRoo.png" width="114" height="88" class="trans"/> </div>
			<img src="imagenes/UTCongreso2.png" width="308" height="167" class="trans"/>
			<div class="der"> <img src="imagenes/logo-utc.png" width="114" height="88" class="trans"/> </div>
		</div>
		
		
		
		<p>&nbsp;</p>
		
		<div class="cuadrocolor" style="width:100%">
		
		<?php
		echo 'Bienvenido, ';
		if (isset($_SESSION['k_username'])) {
			echo '<b>'.$_SESSION['k_username'].'</b>.';
			echo '<p><a href="logout.php">Logout</a></p>';
		}else{
			echo '<p><a href="login.php">Login</a></p>
			 <p><a href="registrar.php">Registrar</a></p>';
		}
		?>
		</div>
		
		
	</div>

	<div class="wrapper">
	
		
			
			
			
			
		
	
	</div>
	
	

	
</body>
</html>