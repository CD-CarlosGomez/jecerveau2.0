<?php
 echo $bodyMessage="<!DOCTYPE html \">

<head>
	<meta charset=\"utf-8\">
	<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
	<!--[if lt IE 9]> <script src=\"http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js\"></script>< ![endif]-->

    <title>Bienevenido</title>
     <style>
         p{
			font-family:\"Arial Narrow\",Arial,sans-serif;
			font-size:20px;
			color:#535353;
		 }
        body
        {
        	margin:0;
        	padding:0;
        	font-family:\"Arial Narrow\", Arial, sans-serif;
        	max-width:1338px;
			background:#fff;
        }
        h1{
        	font-size:25px;
        	color:#000;
        	font-weight:bold;
        	text-transform:uppercase;
        }
        ul li
        {
        	 margin-bottom:10px;
        	}
        table td
        {
        	padding:15px 15px 15px 55px;
        	vertical-align:top;
        }
        table th
        {
        	background:#3276B1;
        	color:#FFF;
        	padding:5px;
        }
        table table{
            background:#ececec;
            border-radius: 20px;	
            width:100%;
            margin:0 auto; 
         }
         table table td{
            border-radius: 10px;
            background:#ECECEC;
         }
         table table td span{
			font-family:\"Arial Narrow\", Arial, sans-serif;
            display:block;
            text-align:center;
			font-size:30px;
            color:#000;
         }
		.span{
			font-family:\"Arial Narrow\", Arial, sans-serif;
			font-size:30px;
			color:#535353;
			background:#fff;
			border-radius: 10px;
		}         
        a
        {
        	color:#517ebb;
        	}
        ul
        {
        	list-style-image:url('https://3.bp.blogspot.com/-fnAqlmQAWsc/Vw0riiBD7TI/AAAAAAAAAAY/kPVinjWM-x0ydy4WjsnormYaeT9QzGsHQCLcB/s1600/vineta.png');
        	margin-left:30px;
			color:#535353;
			font-family:\"Arial Narrow\", Arial, sans-serif;
        }
    </style>
</head>
<body>
<table cellspacing=\"0\" cellpadding=\"0\">
	<tr>
		
		<td style=\"width:20%; height: 5px; background:#ececec; border-radius: 10px;\" colspan=\"2\">&nbsp;</td>
		
	</tr>
    <tr>
		
        <td>
            <img src=\"https://4.bp.blogspot.com/-TiJF72bggyI/Vw0qqXRVaRI/AAAAAAAAAAM/PprdxwVDmVUvAhZd35t1CGfZsfO3I2MCQCLcB/s1600/img_jc2_logo.jpg\" />
        </td>
		<td>
            <h1>
			¡Bienvenido!
			</h1>
        </td>
		
    </tr>
	<tr>
		
		<td style=\"width:20%; background:#ececec; border-radius: 10px;\" colspan=\"2\">&nbsp;</td>
	
	</tr>
    <tr>
		
        <td style=\"border-right:#517ebb solid 4px; width:60%;\">
        <h2>
		HOLA " . '$u->getRealName()' . ".
        </h2>
        <p>
			¡Felicidades!<br/>
			Tu cuenta ha sido creada, ahora eres parte de nuestra 
			comunidad. iBrain es una nueva plataforma con la que 
			podrás realizar tus actividades con mayor facilidad y 
			conmejor control. También te servirá para mejorar la  
			comunicación de tu departamento con otros con los que 
			tus actividades están directamente relacionados.
        </p>
        <p>
			En Consultoría Dual estamos listos para ayudarte siempre 
			que lo necesites, puedes usar nuestros teléfonos de 
			contacto o escribirnos por correo electrónico y uno de 
			nuestros ingenieros te atenderá.
        </p>
		<p>
			<h2>
				IBRAIN TAMBIÉN TIENE UN SITIO WEB
			</h2>
		</p>
       <p>
			Ingresa a: <a href=\"https://www.ibrain.mx/\">https://www.ibrain.mx</a> y conoce todas nuestras herramientas adicionales.
       </p>
        </td>
        <td>
        <h2>
        INFORMACIÓN DE TU NUEVA CUENTA
        </h2>
		<p>Aquí tienes los datos de acceso a tu portal:<br/><b><a href=\"https://www.ibrain.mx/tuportal/app\">https://www.ibrain.mx/tuportal/app</a></b></p>
        <table cellspacing=\"0\" cellpadding=\"0\">
            <tr>
                <td>
                 <span>Usuario</span>
                </td>
                <td>
                <span class=\"span\">" . '$u->getUserName()' . "</span>
                </td>
            </tr>
            <tr>
                <td>
                <span>Contraseña</span>
                </td>
                <td>
                <span class=\"span\">" . '$u->getPwdTmp()' . "</span>
                </td>
            </tr>
        </table>
        <ul>
            <li>       Toma en cuenta que en tu primer acceso         deberás cambiarla por seguridad.
            </li>
             <li>
                    Tu usuario es personal, no lo compartas         con nadie.
            </li>
        </ul>
        <p>
        Para ingresar a tu portal, sólo haz  click aquí:
        </p>
        <p>
       <a href=\"http://www.santi.mx\"> https://www.santi.mx/tuportal/app </a>   
        </p>
        
        <p>
        o también puedes copiar y pegar la dirección en tu navegador. 
        </p>
        <p>
         <strong>Soporte: </strong>  <br /> (998) 206 1968 <br /> (998) 206 2117 <br /><br />  <a href=\"mailto:soporte@consultoriadual.com\" >soporte@consultoriadual.com </a> 
        </p>
        </td>
		
        </tr>
		<tr>
			
			<td style=\"width:20%; background:#517ebb; border-radius: 10px;\" colspan=\"2\">&nbsp;</td>
			
		</tr>
        <tr>
		 		 
        <td colspan=\"2\">
             <p>
       Este correo se generó de forma automática, no es necesario  responder. Si tienes alguna duda, por favor contáctenos en:  <a href=\"mailto:soporte@consultoriadual.com\" >soporte@consultoriadual.com </a> 
       </p>
        </td>
       
    </tr>
</table>
</body>
</html>";
?>