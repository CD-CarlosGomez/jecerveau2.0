<?php
$bodyMessagePDF= "
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
		.txtch {
				font-size: 8px;
				font-weight: normal;
				font-style: normal;
				text-align: center;
					align: center;
		}
        a{
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
							</td>
						</tr>
						<tr>
							<td style=\"height: 5px; background:#ececec; border-radius: 20px;\">&nbsp;</td>
						</tr>
						<tr>
							<td bgcolor=\"#ffffff\" style=\"padding: 40px 30px 40px 50px;\">
								<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
									<tr>
										<td>
											<h1>Orden de servicio folio: {########}</h1>
										</td>
										<td>
											Fecha y hora de entrada:
										</td>
									</tr>
									<tr>
										<td colspan=\"2\" style=\"padding: 20px 20px 20px 10px;\">
											<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border: 1px solid black\">
												<tr>
													<td valign=\"top\" width=\"140\"><input type=\"checkbox\" name=\"ord[27]\" value=\"1\"/> Garant&iacute;a</td>\n
													<td valign=\"top\" width=\"140\"><input type=\"checkbox\" name=\"ord[24]\" value=\"1\" /> Servicio</td>\n
													<td valign=\"top\" width=\"140\"><input type=\"checkbox\" name=\"ord[26]\" value=\"1\"/> Venta</td>\n
													<td valign=\"top\" width=\"140\"><input type=\"checkbox\" name=\"ord[22]\" value=\"1\"/> Contrato No.</td>\n
												</tr>
												<tr>
													<td valign=\"top\" colspan=\"2\">Atiende: ".htmlentities('$usr_atiende')."</td>\n
														<td valign=\"top\" colspan=\"2\">email_atiende</td>\n
															</tr>
															<tr><td></td></tr>
															<tr>
																<td valign=\"top\" colspan=\"2\">".htmlentities('$cli_nom')."</td>
																<td valign=\"top\" colspan=\"2\">cli_tels</td>
															</tr>
														</table>											
													</td>
												</tr>
												<tr>
													<td colspan=\"2\"><h3>Datos del Cliente</h3>\n</td>
												</tr>
												<tr>
													<td colspan=\"2\" style=\"padding: 20px 20px 20px 10px;\">
														<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border: 1px solid black\">
															<tr>
																<td colspan=\"2\" valign=\"top\">Nombre: ".htmlentities('')."</td>
																<td colspan=\"2\">Tel&eacute;fonos: ".htmlentities('')." / ".htmlentities('')." / ".htmlentities('')." / ".htmlentities('')."</td>\n
															</tr>
															<tr>
																<td valign=\"top\" colspan=\"4\">eMail: ".htmlentities('')."</td>
															</tr>
															<tr>
																<td valign=\"top\" colspan=\"4\">Empresa: ".htmlentities('')."</td>
															</tr>
															<tr>
																<td valign=\"top\" colspan=\"4\">Direcci&oacute;n: ".htmlentities('')."</td>
																
															</tr>
															<tr>
																<td valign=\"top\">Colonia: ".htmlentities('')."</td>
																<td valign=\"top\">Delegaci&oacute;n o Municipio: ".htmlentities('')."</td>
																<td valign=\"top\">Estado: ".htmlentities('')."</td>
																<td valign=\"top\">C&oacute;digo Postal: ".htmlentities('')."</td>
															</tr>
														</table>
													</td>
												</tr>
												<tr>
													<td colspan=\"2\"><h3>Datos del equipo</h3>\n</td>
												</tr>
												<tr>
													<td colspan=\"2\" style=\"padding: 20px 20px 20px 10px;\">
														<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border: 1px solid black\">
															<tr>
																<td valign=\"top\">Marca: ".htmlentities('')."</td>
																<td valign=\"top\">No. de serie: ".htmlentities('')."</td>
															</tr>
															<tr>
																<td valign=\"top\">Modelo: ".htmlentities('')."</td>
																<td valign=\"top\">No. de parte comercial: ".htmlentities('')."</td>
															</tr>
															<tr>
																<td valign=\"top\" colspan=\"2\">Configuraci&oacute;n: ".htmlentities('')."</td>
															</tr>
															<tr>
																<td valign=\"top\">Factura No. ".htmlentities('')." Fecha de compra: ". '' ."</td>
																<td valign=\"top\">Proveedor: ".htmlentities('')."</td>
															</tr>
															<tr>
																<td valign=\"top\" colspan=\"2\">
																	<span>
																		En caso de no contar con el ticket de compra o factura, acepto que se tramite la garantía de mi equipo con la fecha que proporciona Apple
																		siendo esta: fecha_cobertura.<br/>
																		Nombre y Firma:_____________________________________
																	</span>
																</td>
															</tr>
														</table>
													</td>
												</tr>
												<tr>
													<td colspan=\"2\"><h3>Estado de la cobertura</h3>\n</td>
												</tr>
												<tr>
													<td colspan=\"2\" style=\"padding: 20px 20px 20px 10px;\">
														<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border: 1px solid black\">
															<tr>
																<td valign=\"top\">
																	Detalles de la cobertura: ".htmlentities('')."
																</td>
																<td valign=\"top\">
																	Fecha de compra aprox.: ".htmlentities('')."
																</td>
															</tr>
															<tr>
																<td valign=\"top\" colspan=\"2\">
																	Fecha de fin de cobertura: ".htmlentities('')."
																</td>
															</tr>
															<tr>
																<td valign=\"top\" colspan=\"2\">
																	<span>La garantía del fabricante no aplica para ningún hardware o software de otras marcas, aunque estas estén embaladas o se vendan junto con el equipo aquí descrito.</span>
																</td>
															</tr>
														</table>
												</tr>
												<tr>
													<td colspan=\"2\"><h3>Accesorios</h3>\n</td>
												</tr>
												<tr>
													<td colspan=\"2\" style=\"padding: 20px 20px 20px 10px;\">
														<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border: 1px solid black\">
															<tr>
																<td valign=\"top\">
																	Descripci&oacute;n
																</td>
																<td valign=\"top\">
																	Marca
																</td>
																<td valign=\"top\">
																	Modelo
																</td>
																<td valign=\"top\">
																	No. de parte com.
																</td>
																<td valign=\"top\">
																	No. serie.
																</td>
															</tr>
														</table>
													</td>
												</tr>
												<tr>
													<td colspan=\"2\"><h3>Observaciones</h3>\n</td>
												</tr>
												<tr>
													<td colspan=\"2\" style=\"padding: 20px 20px 20px 10px;\">
														<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border: 1px solid black\">
															<tr>
																<td valign=\"top\">
																	<span class=\"\">Entrego de conformidad mi equipo con la estética y configuración
																	descritas y libro de toda responsabilidad a El Prestador del servicio en caso de omitir accesorios o componentes adicionales. 
																	El Prestador del servicio se obliga a devolver el equipo en las condiciones en las que le fue entregado exceptuando
																	las consecuencias inevitables del diagnostico ocasionados por derrame de líquidos, golpes, rayones, pantallas estrelladas, conectores dañados, cables en mal estado, etc.
																	</span>
																</td>
															</tr>
														</table>
													</td>
												</tr>
												<tr>
													<td colspan=\"2\"><h3>Datos del problema</h3>\n</td>
												</tr>
												<tr>
													<td colspan=\"2\" style=\"padding: 20px 20px 20px 10px;\">
														<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border: 1px solid black\">
															<tr>
																<td valign=\"top\">
																	<span class=\"\">
																		Problema
																	</span>
																</td>
															</tr>
															<tr>
																<td valign=\"top\">
																	<span class=\"\">Estoy de acuerdo en que el resultado del diagnostico pueda tardar tiempo
																		en caso de que la falla se manifieste de manera intermitente u ocasional, o que se requiera
																		de alguna refacción no disponible por parte del fabricante.
																			El Prestador del servicio se obliga a enviar de manera electrónica el presupuesto por escrito
																			en formato electrónico o fax, de lo contrario estoy de acuerdo a recogerlo en el lugar de emisión
																			de esta orden de servicio.
																			En caso de que el presupuesto no sea aceptado, El Consumidor pagará exclusivamente el costo por la 
																			revisión y diagnóstico y el El Prestador del servicio se obliga a devolver el equipo en las condiciones
																			en las que le fue entregado, exceptuando las consecuencias inevitables del diagnóstico.
																			El costo de la revisión será de $ _________________ mas IVA.<br/>\n			Nombre y Firma:_____________________________________
																	</span>
																</td>
															</tr>
														</table>
													</td>
												</tr>
												<tr>
													<td colspan=\"2\"><h3>Autorizaci&oacute;n para la utilizaci&oacute;n de informaci&oacute; con fines mercadot&eacute;cnicos o publicitarios</h3>\n</td>
												</tr>
												<tr>
													<td colspan=\"2\" style=\"padding: 20px 20px 20px 10px;\">
														<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border: 1px solid black\">
															<tr>
																<td valign=\"top\">
																	<span class=\"\">
																		El Consumidor SI (  ) / NO (  ) acepta que El Prestador del servicio ceda o transmita a terceros, con fines mercadotécnicos o publicitarios, la información proporcionada por él con motivo del presente contrato y SI (  ) / NO (  ) acepta que El Prestador del servicio le envíe publicidad sobre bienes y servicios.<br/>
																			Nombre y Firma:_____________________________________
																	</span>
																</td>
															</tr>
														</table>
													</td>
												</tr>
												<tr>
													<td colspan=\"2\"><strong>Importante: Las cláusulas del Contrato de Adhesión se describen en el anverso. Léalas cuidadosamente</strong>\n</td>
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