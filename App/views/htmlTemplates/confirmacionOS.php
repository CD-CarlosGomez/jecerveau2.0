<?php

	$page = "<html>\n";
	$page .= "	<head>\n";
	$page .= "		<meta name=\"robots\" content=\"noindex,nofollow\" />\n";
	$page .= "		<title>iBrain> OS $num_orden version para imprimir</title>\n";
	$page .= "		<style type = \"text/css\">\n";
	$page .= "			body, td {\n";
	$page .= "				margin: 0;\n";
	$page .= "				padding: 0;\n";
	$page .= "				font-family: Verdana, \"MS Verdana\", Arial, \"MS Arial\", sans-serif;\n";
	$page .= "				font-size: 9px;\n";
	$page .= "				font-Weight : normal;\n";
	$page .= "				font-Style : normal;\n";
	$page .= "				background: #ffffff;\n";
	$page .= "			}\n";
	$page .= "			h1 { font-size: 16px; margin: 2px; padding: 2px;}\n";
	$page .= "			h2 { font-size: 14px; margin: 2px; padding: 2px;}\n";
	$page .= "			h3 { font-size: 12px; margin: 2px; padding: 2px;}\n";
	$page .= "			.txtch {\n";
	$page .= "				font-size: 8px;\n";
	$page .= "				font-weight: normal;\n";
	$page .= "				font-style: normal;\n";
	$page .= "				text-align: center;\n";
	$page .= "				align: center;\n";
	$page .= "			}\n";
	$page .= "			.txtchit {\n";
	$page .= "				font-size: 8px;\n";
	$page .= "				font-weight: bold;\n";
	$page .= "				font-style: italic;\n";
	$page .= "				text-align: center;\n";
	$page .= "				padding-top: 4px;\n";
	$page .= "				align: center;\n";
	$page .= "			}\n";
	$page .= "			.txtchbold {\n";
	$page .= "				font-size: 8px;\n";
	$page .= "				font-weight: bold;\n";
	$page .= "				text-align: center;\n";
	$page .= "				padding-top: 4px;\n";
	$page .= "				align: center;\n";
	$page .= "			}\n";
	$page .= "			.orden {\n";
	$page .= "				color: black;\n";
	$page .= "				font-size: 12px;\n";
	$page .= "				font-weight: bold;\n";
	$page .= "				text-align: left;\n";
	$page .= "				background: #ffffff;\n";
	$page .= "			}\n";
	$page .= "			.borde {\n";
	$page .= "				border: 1px solid black;\n";
	$page .= "			}\n";
	$page .= "		</style>\n";
	$page .= "	</head>\n";
	$page .= "	<body>\n";
	//$page .= "		<form action=\"ord_imprimir.html\">\n";
	$page .= "		<table width=\"600\" style=\"padding-left: 50px\">\n";
	$page .= "			<tr>\n";
	$page .= "				<td align=\"right\"><img src=\"http://".$_SERVER["SERVER_NAME"].$rel_url."/contenido/img/clientes/$cli_logo\" alt=\"\" border=\"0\" /></td>\n";
	$page .= "			</tr>\n";
	$page .= "			<tr>\n";
	$page .= "				<td valign=\"top\">\n";
	$page .= "					<table width=\"600\" style=\"border: 1px solid black\">\n";
	$page .= "						<tr>\n";
	$page .= "							<td valign=\"top\" class=\"orden\" colspan=\"2\" width=\"58%\">Orden de Servicio No. <span class=\"numorden\">$num_orden</span></td>\n";
	$page .= "							<td valign=\"top\" colspan=\"2\">Fecha y hora de entrada: ".$fecha_hora."</td>\n";
	$page .= "						</tr>\n";
	$page .= "						<tr>\n";
	$page .= "							<td></td>";
	$page .= "						</tr>\n";
	$page .= "						<tr>\n";
	$page .= "							<td valign=\"top\" width=\"140\"><input type=\"checkbox\" name=\"ord[27]\" value=\"1\"";
											if ($ord_dat["o_garantia"] == 1) { $page .= " checked=\"checked\""; }
	$page .= " /> Garant&iacute;a</td>\n";
	$page .= "							<td valign=\"top\" width=\"140\"><input type=\"checkbox\" name=\"ord[24]\" value=\"1\"";
											if ($ord_dat["o_servicio"] == 1) { $page .= " checked=\"checked\""; }
	$page .= " /> Servicio</td>\n";
	$page .= "							<td valign=\"top\" width=\"140\"><input type=\"checkbox\" name=\"ord[26]\" value=\"1\"";
											if ($ord_dat["o_venta"] == 1) { $page .= " checked=\"checked\""; }
	$page .= "	/> Venta</td>\n";
	$page .= "							<td valign=\"top\" width=\"140\"><input type=\"checkbox\" name=\"ord[22]\" value=\"1\"";
											if ($ord_dat["o_contrato"] == 1) { $page .= " checked=\"checked\""; }
	$page .= " /> Contrato No. ".htmlentities($ord_dat["o_contrato_num"])."</td>\n";
	$page .= "						</tr>\n";
	$page .= "						<tr>\n";
	$page .= "							<td></td>";
	$page .= "						</tr>\n";
	$page .= "						<tr>\n";
	$page .= "							<td valign=\"top\" colspan=\"2\">Atiende: ".htmlentities($usr_atiende)."</td>\n";
	$page .= "							<td valign=\"top\" colspan=\"2\">$email_atiende</td>\n";
	$page .= "						</tr>\n";
	$page .= "						<tr>\n";
	$page .= "							<td valign=\"top\" colspan=\"2\">".htmlentities($cli_nom)."</td>\n";
	$page .= "							<td valign=\"top\" colspan=\"2\">$cli_tels</td>\n";
	$page .= "						</tr>\n";
	$page .= "						<tr>\n";
	$page .= "							<td valign=\"top\" colspan=\"4\">".htmlentities($cli_rfc)."</td>\n";
	$page .= "						</tr>\n";
	$page .= "						<tr>\n";
	$page .= "							<td valign=\"top\" colspan=\"4\">".$cli_dir."</td>\n";
	$page .= "						</tr>\n";
	$page .= "						<tr>\n";
	$page .= "							<td valign=\"top\" colspan=\"4\">Atenci&oacute;n: ".$cli_horario."</td>\n";
	$page .= "						</tr>\n";
	$page .= "					</table>\n";
	$page .= "					<br/>\n";
	$page .= "					<h3>Datos del Cliente</h3>\n";
	$page .= "					<table width=\"600\" style=\"border: 1px solid black\">\n";
	$page .= "						<tr>\n";
	$page .= "							<td valign=\"top\">Nombre: ".htmlentities($ord_dat["o_nombre"])."</td>";
	$page .= "							<td colspan=\"2\">Tel&eacute;fonos: ".htmlentities($ord_dat["o_tel1"])." / ".htmlentities($ord_dat["o_tel2"])." / ".htmlentities($ord_dat["o_tel3"])." / ".htmlentities($ord_dat["o_tel4"])."</td>\n";
	$page .= "						</tr>\n";
	$page .= "						<tr>\n";
	$page .= "							<td valign=\"top\" colspan=\"3\">eMail: ".htmlentities($ord_dat["o_email"])."</td>\n";
	$page .= "						</tr>\n";
	$page .= "						<tr>\n";
	$page .= "							<td valign=\"top\" colspan=\"3\">Empresa: ".htmlentities($ord_dat["o_empresa"])."</td>\n";
	$page .= "						</tr>\n";
	$page .= "						<tr>\n";
	$page .= "							<td valign=\"top\">Direcci&oacute;n: ".htmlentities($ord_dat["o_dir"])."</td>";
	$page .= "							<td colspan=\"2\">Colonia: ".htmlentities($ord_dat["o_col"])."</td>\n";
	$page .= "						</tr>\n";
	$page .= "						<tr>\n";
	$page .= "							<td valign=\"top\">Delegaci&oacute;n o Municipio: ".htmlentities($ord_dat["o_del"])."</td>\n";
	$page .= "							<td valign=\"top\">Estado: ".htmlentities($ord_dat["o_estado"])."</td>\n";
	$page .= "							<td valign=\"top\">C&oacute;digo Postal: ".htmlentities($ord_dat["o_cp"])."</td>\n";
	$page .= "						</tr>\n";
	$page .= "					</table>\n";
	$page .= "					<br/>\n";
	
	$page .= "					<h3>Datos del Equipo</h3>\n";
	$page .= "						<table width=\"600\" style=\"border: 1px solid black\">\n";
	$page .= "							<tr>\n";
	$page .= "								<td valign=\"top\">Marca: ".htmlentities($ord_dat["o_marca"])."</td>\n";
	$page .= "								<td valign=\"top\">No. de serie: ".htmlentities($ord_dat["o_num_serie"])."</td>\n";
	$page .= "							</tr>\n";
	$page .= "							<tr>\n";
	$page .= "								<td valign=\"top\">Modelo: ".htmlentities($ord_dat["o_modelo"])."</td>\n";
	$page .= "								<td valign=\"top\">No. de parte comercial: ".htmlentities($ord_dat["o_parte_com"])."</td>\n";
	$page .= "							</tr>\n";
	$page .= "							<tr>\n";
	$page .= "								<td valign=\"top\" colspan=\"2\">Configuraci&oacute;n: ".htmlentities($ord_dat["o_config"])."</td>\n";
	$page .= "							</tr>\n";
	$page .= "							<tr>\n";
	$page .= "								<td valign=\"top\">Factura No. ".htmlentities($ord_dat["o_garantia_fac"])." Fecha de compra: ".$ord_dat["o_f_compra"]."</td>";
	if ($cdat['c_pais'] == 1) {
    	$page .= "								<td valign=\"top\">Proveedor: ".htmlentities($ord_dat["o_proveedor"])."</td>\n";
	} else {
    	$page .= "								<td valign=\"top\"></td>\n";
	}
	$page .= "							</tr>\n";
	$page .= "						<tr>\n";
	$page .= "							<td colspan=\"2\"></td>";
	$page .= "						</tr>\n";
	$page .= "							<tr>\n";
	$page .= "								<td valign=\"top\" colspan=\"2\"><span class=\"txtch\">";
	$page .= "						En caso de no contar con el ticket de compra o factura, acepto que se tramite la garantía de mi equipo con la fecha que proporciona Apple";
								if ($fecha_cobertura != '') {
		$page .= ", siendo esta: $fecha_cobertura";
	}
	$page .= "<br/>";
	$page .= "						Nombre y Firma:_____________________________________</span></td>\n";
	$page .= "							</tr>\n";
	$page .= "						</table>\n";
	$page .= "						<br/>\n";
	
	$page .= "					<h3>Estado de la Cobertura</h3>\n";
	$page .= "						<table width=\"600\" style=\"border: 1px solid black\">\n";
	$page .= "							<tr>\n";
	$page .= "								<td valign=\"top\">";
	$page .= "								Detalles de la cobertura: ".htmlentities($cobertura)."<br/>";
	$page .= "								Fecha de fin de cobertura: ".htmlentities($ord_dat["o_coverageEndDate"])."<br/>";
	if ($cdat['c_pais'] == 1) {
    	$page .= "								Producto comprado en: ".htmlentities(ucfirst($ord_dat["o_purchaseCountry"]))."<br/>";
	}
	$page .= "								</td>\n";
	$page .= "								<td valign=\"top\">";
	$page .= "								".htmlentities(str_replace('apple', 'Apple', ucfirst($ord_dat["o_warrantyStatus"])))."<br/>";
	$page .= "								Fecha de compra aprox.: ".htmlentities($ord_dat["o_estimatedPurchaseDate"])."<br/>";
	$page .= "								</td>\n";
	$page .= "							</tr>\n";
	$page .= "						<tr>\n";
	$page .= "							<td></td>";
	$page .= "						</tr>\n";
	$page .= "							<tr>\n";
	$page .= "								<td colspan=\"2\" valign=\"top\">";
	$page .= "								<span class=\"txtch\">La garantía del fabricante no aplica para ningún hardware o software de otras marcas, aunque estas estén embaladas o se vendan junto con el equipo aquí descrito.</span>";
	$page .= "								</td>\n";
	$page .= "							</tr>\n";
	$page .= "						</table>\n";
	$page .= "						<br/>\n";
	
	$page .= "					    <h3>Accesorios</h3>\n";
	$page .= "						<table width=\"600\" style=\"border: 1px solid black\">\n";
	$page .= "							<tr>\n";
	$page .= "								<td>Nombre:</td>\n";
	$page .= "								<td>".htmlentities($ord_dat["o_Acc1Nombre"])."</td>\n";
	$page .= "								<td>".htmlentities($ord_dat["o_Acc2Nombre"])."</td>\n";
	$page .= "								<td>".htmlentities($ord_dat["o_Acc3Nombre"])."</td>\n";
	$page .= "								<td>".htmlentities($ord_dat["o_Acc4Nombre"])."</td>";
	$page .= "								<td>".htmlentities($ord_dat["o_Acc5Nombre"])."</td>";
	$page .= "							</tr>\n";
	$page .= "							<tr>\n";
	$page .= "								<td>Marca:</td>\n";
	$page .= "								<td>".htmlentities($ord_dat["o_Acc1Marca"])."</td>\n";
	$page .= "								<td>".htmlentities($ord_dat["o_Acc2Marca"])."</td>\n";
	$page .= "								<td>".htmlentities($ord_dat["o_Acc3Marca"])."</td>\n";
	$page .= "								<td>".htmlentities($ord_dat["o_Acc4Marca"])."</td>";
	$page .= "								<td>".htmlentities($ord_dat["o_Acc5Marca"])."</td>";
	$page .= "							</tr>\n";
	$page .= "							<tr>\n";
	$page .= "								<td>Modelo:</td>\n";
	$page .= "								<td>".htmlentities($ord_dat["o_Acc1Modelo"])."</td>\n";
	$page .= "								<td>".htmlentities($ord_dat["o_Acc2Modelo"])."</td>\n";
	$page .= "								<td>".htmlentities($ord_dat["o_Acc3Modelo"])."</td>\n";
	$page .= "								<td>".htmlentities($ord_dat["o_Acc4Modelo"])."</td>\n";
	$page .= "								<td>".htmlentities($ord_dat["o_Acc5Modelo"])."</td>";
	$page .= "							</tr>\n";
	$page .= "							<tr>\n";
	$page .= "								<td>No. Parte Com.:</td>\n";
	$page .= "								<td>".htmlentities($ord_dat["o_Acc1ParteCom"])."</td>\n";
	$page .= "								<td>".htmlentities($ord_dat["o_Acc2ParteCom"])."</td>\n";
	$page .= "								<td>".htmlentities($ord_dat["o_Acc3ParteCom"])."</td>\n";
	$page .= "								<td>".htmlentities($ord_dat["o_Acc4ParteCom"])."</td>\n";
	$page .= "								<td>".htmlentities($ord_dat["o_Acc5ParteCom"])."</td>";
	$page .= "							</tr>\n";
	$page .= "							<tr>\n";
	$page .= "								<td>No. Serie:</td>\n";
	$page .= "								<td>".htmlentities($ord_dat["o_Acc1NoSerie"])."</td>\n";
	$page .= "								<td>".htmlentities($ord_dat["o_Acc2NoSerie"])."</td>\n";
	$page .= "								<td>".htmlentities($ord_dat["o_Acc3NoSerie"])."</td>\n";
	$page .= "								<td>".htmlentities($ord_dat["o_Acc4NoSerie"])."</td>\n";
	$page .= "								<td>".htmlentities($ord_dat["o_Acc5NoSerie"])."</td>";
	$page .= "							</tr>\n";
	$page .= "						</table>\n";
	$page .= "						<br/>\n";
	$page .= "						<h3>Observaciones</h3>\n";
	$page .= "						<table width=\"600\" style=\"border: 1px solid black\">\n";
	$page .= "							<tr>\n";
	$page .= "								<td valign=\"top\" align=\"left\">".nl2br(htmlentities($ord_dat["o_observacion"]))."</td>\n";
	$page .= "							</tr>\n";
	$page .= "							<tr>\n";
	$page .= "								<td valign=\"top\" align=\"left\"></td>\n";
	$page .= "							</tr>\n";
	$page .= "							<tr>\n";
	$page .= "								<td valign=\"top\"><span class=\"txtch\">Entrego de conformidad mi equipo con la estética y configuración descritas y libro de toda responsabilidad a El Prestador del servicio en caso de omitir accesorios o componentes adicionales. El Prestador del servicio se obliga a devolver el equipo en las condiciones en las que le fue entregado exceptuando las consecuencias inevitables del diagnostico ocasionados por derrame de líquidos, golpes, rayones, pantallas estrelladas, conectores dañados, cables en mal estado, etc.<br/>\n";
	$page .= "						Nombre y Firma:_____________________________________</span></td>\n";
	$page .= "							</tr>\n";
	$page .= "						</table>\n";
	$page .= "						<br/>\n";
	$page .= "						<h3>Datos del problema</h3>\n";
	$page .= "						<table width=\"600\" style=\"border: 1px solid black\">\n";
	$page .= "							<tr>\n";
	$page .= "								<td valign=\"top\" align=\"left\" width=\"100%\">".nl2br(htmlentities($ord_dat["o_problema"]))."</td>\n";
	$page .= "							</tr>\n";
	$page .= "							<tr>\n";
	$page .= "								<td valign=\"top\" align=\"left\"></td>\n";
	$page .= "							</tr>\n";
	$page .= "							<tr>\n";
	$page .= "								<td valign=\"top\"><span class=\"txtch\">Estoy de acuerdo en que el resultado del diagnostico pueda tardar tiempo en caso de que la falla se manifieste de manera intermitente u ocasional, o que se requiera de alguna refacción no disponible por parte del fabricante.
			El Prestador del servicio se obliga a enviar de manera electrónica el presupuesto por escrito en formato electrónico o fax, de lo contrario estoy de acuerdo a recogerlo en el lugar de emisión de esta orden de servicio.
			En caso de que el presupuesto no sea aceptado, El Consumidor pagará exclusivamente el costo por la revisión y diagnóstico y el El Prestador del servicio se obliga a devolver el equipo en las condiciones en las que le fue entregado, exceptuando las consecuencias inevitables del diagnóstico.
			El costo de la revisión será de $ _________________ mas IVA.<br/>\n";
	$page .= "						Nombre y Firma:_____________________________________</span></td>\n";
	$page .= "							</tr>\n";
	$page .= "						</table>\n";
	$page .= "						<br/>\n";
	$page .= "						<h3>Autorización para la utilización de información con fines mercadotécnicos o publicitarios</h3>\n";
	$page .= "						<table width=\"600\" style=\"border: 1px solid black\">\n";
	$page .= "							<tr>\n";
	$page .= "								<td valign=\"top\"><span class=\"txtch\">El Consumidor SI (  ) / NO (  ) acepta que El Prestador del servicio ceda o transmita a terceros, con fines mercadotécnicos o publicitarios, la información proporcionada por él con motivo del presente contrato y SI (  ) / NO (  ) acepta que El Prestador del servicio le envíe publicidad sobre bienes y servicios.<br/>\n";
	$page .= "						Nombre y Firma:_____________________________________</span></td>\n";
	$page .= "							</tr>\n";
	$page .= "						</table>\n";
	$page .= "						<br/>\n";
	$page .= "						<div class=\"txtchbold\">Importante: Las cláusulas del Contrato de Adhesión se describen en el anverso. Léalas cuidadosamente</div>\n";
	$page .= "					</td>\n";
	$page .= "				</tr>\n";
	$page .= "			</table>\n";
	//$page .= "		</form>\n";
	$page .= "	</body>\n";
	$page .= "</html>\n";
	
	echo $page;
	
?>
	
	