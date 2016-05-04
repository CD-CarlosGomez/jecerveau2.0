<?php
$bodyMessageMail= "
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
		.strongwhite{
			color:#fff;
        	font-weight:bold;
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
														<h1>Orden de servicio folio: " . $so->getSONumber() . " </h1>
													</td>
													<td>
														&nbsp;
													</td>
												</tr>
												<tr>
													<td colspan=\"2\">
														Estimado(a) " . $c->getContactName() . "</br>
														Hemos registrado la presente orden de servicio.</br>
														Adjunto en este correo se encuentra una copia de su orden en formato PDF.</br></br></br>
													</td>
												</tr>
												<tr>
													<td>
														<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
															<tr>
																<td colspan=\"3\" style=\"height: 5px; background:#517ebb; border-radius: 20px;\" >
																	<span class=\"strongwhite\"><center><strong>Datos de la orden de servicio</strong></center></span>
																</td>
															</tr>
															<tr>
																<td width=\"260\" valign=\"top\" style=\"border-bottom:#ececec solid 2px; width:60%;\" >
																	&Oacute;rden de servicio:
																</td>
																<td width=\"260\" valign=\"top\" style=\"border-bottom:#ececec solid 2px; width:60%;\">
																   " . $so->getSONumber() . "
																</td>
															</tr>
															<tr>
																<td width=\"260\" valign=\"top\" style=\"border-bottom:#ececec solid 2px; width:60%;\">
																	Tipo de servicio:
																</td>
																<td width=\"260\" valign=\"top\" style=\"border-bottom:#ececec solid 2px; width:60%;\">
																   Garant&iacute;a
																</td>
															</tr>
															<tr>
																<td width=\"260\" valign=\"top\" style=\"border-bottom:#ececec solid 2px; width:60%;\">
																	Estatus:
																</td>
																<td width=\"260\" valign=\"top\" style=\"border-bottom:#ececec solid 2px; width:60%;\">
																   Creada
																</td>
															</tr>
															<tr>
																<td width=\"260\" valign=\"top\" style=\"border-bottom:#ececec solid 2px; width:60%;\">
																	Solicita:
																</td>
																<td width=\"260\" valign=\"top\" style=\"border-bottom:#ececec solid 2px; width:60%;\">
																   " . $c->getContactName() . "
																</td>
															</tr>
															<tr>
																<td width=\"260\" valign=\"top\" style=\"border-bottom:#ececec solid 2px; width:60%;\">
																	N&uacute;mero de serie:
																</td>
																<td width=\"260\" valign=\"top\" style=\"border-bottom:#ececec solid 2px; width:60%;\">
																   C02L71R9FFT1
																</td>
															</tr>
															<tr>
																<td width=\"260\" valign=\"top\" style=\"border-bottom:#ececec solid 2px; width:60%;\">
																	Modelo:
																</td>
																<td width=\"260\" valign=\"top\" style=\"border-bottom:#ececec solid 2px; width:60%;\">
																   MacBook Pro (Retina, 15-inch,Early 2013)
																</td>
															</tr>
															<tr>
																<td width=\"260\" valign=\"top\" style=\"border-bottom:#ececec solid 2px; width:60%;\">
																	Especificaciones:
																</td>
																<td width=\"260\" valign=\"top\" style=\"border-bottom:#ececec solid 2px; width:60%;\">
																   MBP 15.4 RETINA,2.7GHZ,16GB,512GB FLASH
																</td>
															</tr>
															<tr>
																<td width=\"260\" valign=\"top\" style=\"border-bottom:#ececec solid 2px; width:60%;\">
																	Sucursal:
																</td>
																<td width=\"260\" valign=\"top\" style=\"border-bottom:#ececec solid 2px; width:60%;\">
                                                                    &nbsp;
																</td>
															</tr>
															<tr>
																<td width=\"260\" valign=\"top\" style=\"border-bottom:#ececec solid 2px; width:60%;\">
																	Direcci&oacute;n.
																</td>
																<td width=\"260\" valign=\"top\" style=\"border-bottom:#ececec solid 2px; width:60%;\">
																   " . $c->getContactAddress() . "
																</td>
															</tr>
															<tr>
																<td width=\"260\" valign=\"top\" style=\"border-bottom:#ececec solid 2px; width:60%;\">
																	Datos del reporte:
																</td>
																<td width=\"260\" valign=\"top\" style=\"border-bottom:#ececec solid 2px; width:60%;\">
																   " . $so-> getSOTechDetail() . "
																</td>
															</tr>
															<tr>
																<td width=\"260\" valign=\"top\" style=\"border-bottom:#ececec solid 2px; width:60%;\">
																	Estado del equipo:
																</td>
																<td width=\"260\" valign=\"top\" style=\"border-bottom:#ececec solid 2px; width:60%;\">
																   " . $so->getSODeviceCondition() . "
																</td>
															</tr>";
                                                
                        if(isset($dr_accessories)){
										$bodyMessageMail .="<tr>
																<td colspan=\"2\" width=\"260\" valign=\"top\" style=\"border-bottom:#ececec solid 2px; width:60%;\">
																	Accesorios:
																	<br />
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
                                                                        ";
                                                                     
                                                                           foreach($dr_accessories as $v){
                                                                            $bodyMessageMail .= "<tr>
                                                                                                    <td>";
																			$bodyMessageMail .= $v['SOAccessoryDesc'];
																			$bodyMessageMail .=	"</td>
                                                                                                    <td>";
																			$bodyMessageMail .=$v['SOAccessoryBrand'];
																			$bodyMessageMail .="</td>
                                                                                                    <td>";
																			$bodyMessageMail .=$v['SOAccessoryModel'];
																			$bodyMessageMail .="</td>
                                                                                                    <td>";
																			$bodyMessageMail .=$v['SOAccessoryPartNumber'];
                                                                            $bodyMessageMail .="</td>
                                                                                                    <td>";
																			$bodyMessageMail .=$v['SOAccessorySerialNumber'];
																			$bodyMessageMail .="</td>
                                                                                                </tr>";
                                                                            }
                                                $bodyMessageMail .= "</table>
																</td>
															</tr>";
                        }
                        else{
                            $bodyMessageMail .= "<tr>
																<td colspan=\"2\" width=\"260\" valign=\"top\" style=\"border-bottom:#ececec solid 2px; width:60%;\">
																	Accesorios: No se registraron accessorios.
                                                                </td>
                                                </tr>";
                        }
							$bodyMessageMail .= "</table>											
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
</html>";
?>