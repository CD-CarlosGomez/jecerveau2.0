<?php
$bodyMessage= "
<!DOCTYPE html>	
<head>
		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
		<title>Demystifying Email Design</title>
		<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>
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
			background:#ffffff;
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
        /*table td
        {
        	padding:15px 0px 0px 20px;
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
         }*/
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
	<body style=\"margin: 0; padding: 0;\"> 
		<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
			<tr>
				<td style=\"padding: 20px 0 30px 0;\">
								<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"900px\" style=\"border-collapse: collapse;\">
									<tr>
										<td style=\"height: 5px; background:#ececec; border-radius: 20px;\">&nbsp;</td>
									</tr>
									<tr>
										<td align=\"center\" bgcolor=\"#ffffff\" style=\"padding: 40px 0 30px 0;\">
											<img src=\"https://4.bp.blogspot.com/-TiJF72bggyI/Vw0qqXRVaRI/AAAAAAAAAAM/PprdxwVDmVUvAhZd35t1CGfZsfO3I2MCQCLcB/s1600/img_jc2_logo.jpg\" alt=\"Creating Email Magic\" style=\"display: block;\" />
											<h1>¡Bienvenido!</h1>
										</td>
									</tr>
									<tr>
										<td style=\"height: 5px; background:#ececec; border-radius: 20px;\">&nbsp;</td>
									</tr>
									<tr>
										<td bgcolor=\"#ffffff\" style=\"padding: 40px 30px 40px 30px;\">
											<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
												<tr>
													<td>
														&nbsp;
													</td>
												</tr>
												<tr>
													<td>
														<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
															<tr>
																<td width=\"260\" valign=\"top\">
																	<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"padding: 10px 0px 0px 15px;\">
																		<tr>
																			<td>
																	            <h1>
																					Bienvenido " . $u->getRealName() . "
																				</h1>
																			</td>
																		</tr>
																		<tr>
																			<td style=\"padding: 25px 0 0 0;\">
																				 <p>
																					¡Felicidades!<br/><br/>
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
																			</td>
																		</tr>
																		<tr>
																			<td width=\"260\" valign=\"top\">
																				<p>
																					<h2>
																						IBRAIN TAMBIÉN TIENE UN SITIO WEB
																					</h2>
																				</p>
																			   <p>
																					Ingresa a: <a href=\"https://www.ibrain.mx/\">https://www.ibrain.mx</a> y conoce todas nuestras herramientas adicionales.
																			   </p>
																			</td>
																		</tr>																
																	</table>
																</td>
																<td style=\"font-size: 0; line-height: 0; height: 5px; background:#517ebb; border-radius: 20px;\" width=\"5px\" >
																	&nbsp;
																</td>
																<td width=\"260\" valign=\"top\">
																	<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"padding: 10px 0px 0px 15px;\">
																		<tr>
																			<td>
																				<h2>
																				INFORMACIÓN DE TU NUEVA CUENTA
																				</h2>
																			</td>
																		</tr>
																		<tr>
																			<td style=\"padding: 25px 0 0 0;\">
																						<p>Aquí tienes los datos de acceso a tu portal:<br/><b><a href=\"https://www.ibrain.mx/tuportal/app\">https://www.ibrain.mx/tuportal/app</a></b></p>
																							<table cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#ececec\" style=\"border-radius: 10px; \">
																								<tr>
																									<td>
																									 <span
																									 style=\"
																									 font-family:\"Arial Narrow\", Arial, sans-serif;
																										text-align:center;
																										font-size:30px;
																									 \" >Usuario</span>
																									</td>
																									<td>
																									<span 
																									style=\"
																										font-family:'Arial Narrow', Arial, sans-serif;
																										font-size:22px;
																										color:#535353;
																										background:#fff;
																										border-radius: 10px;
																									\">" . $u->getUserName() . "</span>
																									</td>
																								</tr>
																								<tr>
																									<td>
																									<span>Contraseña</span>
																									</td>
																									<td>
																									<span 
																									style=\"
																										font-family:'Arial Narrow', Arial, sans-serif;
																										font-size:22px;
																										color:#535353;
																										background:#fff;
																										border-radius: 10px;
																									\">" . $u->getPwdTmp() . "</span>
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
																			</td>
																		</tr>
																		<tr>
																			<td width=\"260\" valign=\"top\">
																				 <p>
																					<h2>SOPORTE: </h2> 
																				</p>
																				<p> (998) 206 1968 <br /> 
																					(998) 206 2117 
																				</p>
																				<p>
																					<a href=\"mailto:soporte@consultoriadual.com\" >soporte@consultoriadual.com </a>
																				</p>
																			</td>
																		</tr>																		
																	</table>
																</td>
															</tr>
														</table>											
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td style=\"height: 5px; background:#517ebb; border-radius: 20px;\">&nbsp;</td>
									</tr>
									<tr>
										<td bgcolor=\"#fff\" style=\"padding: 30px 30px 30px 30px;\">
											<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
												<tr>
													<td>
														<p>
															Este correo se generó de forma automática, no es necesario  responder. Si tienes alguna duda, por favor contáctenos en:  <a href=\"mailto:soporte@consultoriadual.com\" >soporte@consultoriadual.com </a> 
														</p>
													</td>													
												</tr>
											</table>
										</td>
									</tr>
								</table>
											
				</td>
			</tr>
		</table>
	</body>
</html>"
?>





