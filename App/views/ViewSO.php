<?php
#Agregar los select de las llaves for�neas
#16.3.26 mensaje modal de confirmaci�n de movimiento CRUD
#16.3.29 incluir en la sesi�n el BO
namespace App\View;
defined("APPPATH") OR die("Access denied");
use \Core\View;
use \Core\Controller;
		
		$_SESSION["nombreUsuario"];
		$_SESSION['pkiBUser_p'];
		if (isset($_SESSION['loggedin']) & $_SESSION['loggedin'] == true){}
		else{
				echo "Esta pagina es solo para usuarios registrados.<br>";
			echo "<a href='http://localhost:8012/ibrain2.0'>Login Here!</a>";
			exit;
		}
		$now = time(); 
		if($now > $_SESSION['expire']){
		session_destroy();
		echo "Su sesion a terminado, <a href='http://localhost:8012/ibrain2.0'>
			  Necesita Hacer Login</a>";
		exit;
		}
		
		$obj_gsx_p=json_decode($jsn_gsx_p);
		//foreach($ds_so as $dr_so){ echo $dr_so["SODate"];}
		
		
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>iBrain 2.0</title>

    <link href="<?php echo $url; ?>App/web/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $url; ?>App/web/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo $url; ?>App/web/css/animate.css" rel="stylesheet">
    <link href="<?php echo $url; ?>App/web/css/style.css" rel="stylesheet">
	
    <link href="<?php echo $url; ?>App/web/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo $url; ?>App/web/css/plugins/steps/jquery.steps.css" rel="stylesheet">
   
	<link href="<?php echo $url; ?>App/web/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
	<link href="<?php echo $url; ?>App/web/css/plugins/jqGrid/ui.jqgrid.css" rel="stylesheet">
	
	<link href="<?php echo $url; ?>App/web/css/plugins/jQueryUI/jquery-ui-1.10.4.custom.min.css">
	
	<link href="<?php echo $url; ?>App/web/css/plugins/select2/select2.min.css" rel="stylesheet">
	
	
    <style>
        #alertmod_table_accessory{
            top: 900px !important;
        }
    </style>

</head>
<body class="top-navigation">
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
			<div class="row border-bottom white-bg">
				<div class="row wrapper border-bottom white-bg">
					<nav class="navbar navbar-static-top" role="navigation">
						<div class="navbar-header">
							<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
							<i class="fa fa-reorder"></i>
							</button>
							<a href="<?php echo $url; ?>private/home" class="navbar-brand">Inicio</a>
						</div>
						<div class="navbar-collapse collapse" id="navbar">
							<ul class="nav navbar-nav">
								<?php print_r($currentMainMenu);?>
							</ul>
							<ul class="nav navbar-top-links navbar-right">
								<li>
									<a href="<?php echo $url; ?>App/controllers/logout.php">Salir</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
				<div class="row wrapper border-bottom white-bg page-heading">
						<div class="col-sm-6 pull-right">
								<h2>&Oacute;rden de servicio No. <?php foreach($ds_so as $dr_so){ echo $dr_so["SONumber"];} ?></h2>
						</div>
						<div class="col-sm-4">
							<h2>&nbsp;</h2>
							<ol class="breadcrumb">
								<li>
									<a href="<?php echo $url; ?>private/home">Inicio</a>
								</li>
								<li>
									<a href="<?php echo $url; ?>private/ServiceOrder/showSO">&Oacute;rden de servicio</a>
								</li>
								<li class="active">
									<strong>Nueva &Oacute;rden de servicio</strong>
								</li>
							</ol>
						</div>
				</div>	
			</div>	
			<div class="wrapper wrapper-content">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="ibox float-e-margins">
								<div class="ibox-title">
									<h5>GSX</h5>
								</div>
								<div class="ibox-content" >
									<fieldset>
											<form id="formUser" class="form-horizontal" action="<?php echo $url; ?>private/User" method="POST" role="form">
													<div class="col-lg-6 form-group-dark">
														<div class="form-group">&nbsp;</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Serie:*</label>
															<div class="col-lg-8">
																<input type="text" id="txt_gsxSerialNumber_h" class="form-control required" value="<?php echo $obj_gsx_p->{'serialNumber'}; ?>" readonly="readonly" name="txt_gsxSerialNumber_h"/>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Modelo:*</label>
															<div class="col-lg-8">
																<input type="text" id="txt_gsxModel_h" class="form-control required" value="<?php echo $obj_gsx_p->{'productDescription'};?>" readonly="readonly" name="txt_gsxModel_h"/>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Configuraci&oacute;n:*</label>
															<div class="col-md-8">
																<input type="text" id="txt_gsxConfigDesc_h" class="form-control required" value="<?php echo $obj_gsx_p->{'configDescription'};?>" readonly="readonly" name="txt_gsxConfigDesc_h" />
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Estado de la cobertura:*</label>
															<div class="col-md-8">
																<input  type="text" id="txt_gsxWarrantyST_h" class="form-control required" value="<?php echo $obj_gsx_p->{'warrantyStatus'};?>" readonly="readonly" name="txt_gsxWarrantyST_h"/>
															</div>
														</div>
													</div>
													<div class="col-md-6 form-group-dark">
														<div class="form-group">&nbsp;</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Fecha de compra:*</label>
															<div class="col-md-8">
																<input  type="text" id="txt_gsxPurchaseDate_h" class="form-control required" value="<?php echo $obj_gsx_p->{'estimatedPurchaseDate'};?>" readonly="readonly" name="txt_gsxPurchaseDate_h"/>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Comprado en:*</label>
															<div class="col-md-8">
																<input type="text" id="txt_gsxPurchaseCountry_h" class="form-control required" value="<?php echo $obj_gsx_p->{'purchaseCountry'};?>" readonly="readonly" name="txt_gsxPurchaseCountry_h"/>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Sin Cobertura desde hace:*</label>
															<div class="col-md-8">
																<input type="text" id="txt_fkiUserPRofile_h" class="form-control required" readonly="readonly" name="txt_fkiUserPRofile_h">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Fecha de cobertura:*</label>
															<div class="col-md-8">
																<input type="text" id="txt_defaultFunction_h" class="form-control required" readonly="readonly" name="txt_defaultFunction_h">
															</div>
														</div>
													</div>
													<div class="form-group">&nbsp;</div>
											</form>
										</fieldset>
								</div>
							</div>
                        </div>
                    </div>
					<div class="row">
						<div class="col-lg-12">
							<div class="ibox">
								<div class="ibox-title">
									<h5>&Oacute;rden de servicio</h5>
								</div>
								<div class="ibox-content">
										<ul class="nav nav-tabs">
												<li class="active"><a data-toggle="tab" href="#tab1"><h3>Informaci&oacute;n de la &oacute;rden</h3></a></li>
												<li><a data-toggle="tab" href="#tab2"><h3>Seguimiento de la &oacute;rden</h3></a></li>
										</ul>
										<div class="tab-content">
												<div id="tab1" class="tab-pane fade in active">
														<p>
																<form id="frm_SO_h" class="form-horizontal" action="<?php echo $url; ?>private/ServiceOrder"   method="POST" name="frm_SO_h">
																	<fieldset>
																		<div class="row">
																			<div class="col-md-6">
																				<div class="form-group">
																					<label class="col-md-4 control-label">Recolecci&oacute;n:*</label>
																					<div class="col-md-8">
																						<select id="slt_fkCollectMethod_h" class="form-control m-b" name="slt_fkCollectMethod_h">
																								
																							<option value="-1">Seleccionar ...</option>
																							<?php
																							foreach($ds_so as $dr_so){
																								$collectMethod=$dr_so["CollectMethod_pkCollectMethod"];
																								}
																							foreach ($ds_cm as $datarow) {
																								if($datarow['pkCollectMethod']==$collectMethod ){
																							?>
																								<option value="<?php echo $datarow['pkCollectMethod']; ?>" selected="Selected"><?php echo $datarow['collectMethodName'] ?></option>
																							<?php
																								}
																								else{
																						     ?>
																							 <option value="<?php echo $datarow['pkCollectMethod']; ?>"><?php echo $datarow['collectMethodName'] ?></option>
																							 <?php
																								}
																							}
																							 ?>
																						</select>
																					</div>
																				</div>
																				<div class="form-group">
																					<label class="col-md-4 control-label">Fecha de entrada:</label>
																					<div class="col-md-8">
																						<input type="text" id="txt_SODate_h" class="form-control" value="<?php foreach($ds_so as $dr_so){ echo $dr_so["SODate"];} ?>" readonly="readonly" name="txt_SODate_h"/>
																					</div>
																				</div>
																				<div class="form-group">
																					<label class="col-lg-4 control-label">Estado del equipo:</label>
																					<div class="col-lg-8">
																						<textarea id="tta_SODeviceCondition_h" class="form-control required" data-provide="markdown" rows="5" name="tta_SODeviceCondition_h"><?php foreach($ds_so as $dr_so){ echo $dr_so["SODeviceCondition"];} ?></textarea>
																					</div>
																				</div>
																				<div class="form-group">
																					<label class="col-md-4 control-label">Accesorios:</label>
																					<!-- div class="col-md-8">
																						<div class="pull-right">
																							<button type="button" id="btn_newAccessory_h" class="btn btn-primary btn-md btn-block" value="" name="btn_newAccessory_h">Nuevo Accesorio</button>
																						</div>
																					</div-->
																				</div>
																				<div class="form-group">
																					<label class="col-md-1 control-label">&nbsp;</label>
																					<div class="col-md-11">
																						<table class="table table-striped table-bordered table-hover">
																							<tr>
																								<th>Descripci&oacute;n</th>
																								<th>Marca</th>
																								<th>Modelo</th>
																								<th>No. Parte</th>
																								<th>No. Serie</th>
																							</tr>
																							<tbody>
																							
																							<?php
																							if(isset($ds_soa)){
																									foreach ($ds_soa as $dr_soa) {
																							
																							 ?>
																							<tr>
																								<td><?php echo $dr_soa["SOAccessoryDesc"]; ?></td>
																								<td><?php echo $dr_soa["SOAccessoryBrand"]; ?></td>
																								<td><?php echo $dr_soa["SOAccessoryModel"]; ?></td>
																								<td><?php echo $dr_soa["SOAccessoryPartNumber"]; ?></td>
																								<td><?php echo $dr_soa["SOAccessorySerialNumber"]; ?></td>
																							</tr>
																							<?php }
																							}?>
																							</tbody>
																						</table>
																						
																					</div>
																				</div>
																				<div class="form-group">
																					<label class="col-lg-4 control-label">Detalle T&eacute;cnico:</label>
																					<div class="col-lg-8">
																						<textarea id="tta_SOTechDetail_h" class="form-control required" data-provide="markdown" rows="5" name="tta_SOTechDetail_h"><?php foreach($ds_so as $dr_so){ echo $dr_so["SOTechDetail"];} ?></textarea>
																					</div>
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="form-group">
																					<label class="col-lg-4 control-label">Tel&eacute;fono:</label>
																					<div class="input-group col-lg-7">
																						<input type="tel" id="txt_contactPhone_h" class="form-control" value="<?php foreach($ds_so as $dr_so){ echo $dr_so["contactPhone"];} ?>" value="" name="txt_contactPhone_h"/>
																						<span class="input-group-addon"><i class="fa fa-search"></i></span>
																					</div>
																				</div>
																				<div class="form-group">
																					<label class="col-lg-4 control-label">M&oacute;vil:</label>
																					<div class="input-group col-lg-7">
																						<input type="tel" id="txt_contactMovil_h" class="form-control" value="<?php foreach($ds_so as $dr_so){ echo $dr_so["contactMovil"];} ?>" name="txt_contactMovil_h"/>
																						<span class="input-group-addon"><i class="fa fa-search"></i></span>
																					</div>
																				</div>
																				<div class="form-group">
																					<label class="col-lg-4 control-label">Contacto:</label>
																					<div class="input-group col-lg-7">
																						<input type="text" id="txt_contactName_h" class="form-control" value="<?php foreach($ds_so as $dr_so){ echo $dr_so["contactName"];} ?>" name="txt_contactName_h"/>
																						<span class="input-group-addon"><i class="fa fa-search"></i></span>
																					</div>
																				</div>
																				<div class="form-group">
																					<label class="col-lg-4 control-label">Correo electr&oacute;nico:</label>
																					<div class="input-group col-lg-7">
																						<input type="email" id="txt_contactEmail_h" class="form-control" value="<?php foreach($ds_so as $dr_so){ echo $dr_so["contactEmail"];} ?>" name="txt_contactEmail_h"/>
																						<span class="input-group-addon"><i class="fa fa-search"></i></span>
																					</div>
																				</div>
																				<div class="form-group">
																					<label class="col-lg-4 control-label">Direcci&oacute;n:*</label>
																					<div class="col-lg-8">
																						<input type="text" id="txt_contactAddress_h" class="form-control required" value="<?php foreach($ds_so as $dr_so){ echo $dr_so["contactAddress"];} ?>" name="txt_contactAddress_h">
																					</div>
																				</div>
																				<div class="form-group">
																					<label class="col-lg-4 control-label">Colonia:*</label>
																					<div class="col-lg-8">
																						<input type="text" id="txt_contactLocation_h" class="form-control required" value="<?php foreach($ds_so as $dr_so){ echo $dr_so["contactLocation"];} ?>" name="txt_contactLocation_h">
																					</div>
																				</div>
																				<div class="form-group">
																					<label class="col-lg-4 control-label">Delegaci&oacute;n o municipio:*</label>
																					<div class="col-lg-8">
																						<input type="text" id="txt_contactCounty_h" class="form-control required" value="<?php foreach($ds_so as $dr_so){ echo $dr_so["contactCounty"];} ?>" name="txt_contactCounty_h">
																					</div>
																				</div>
																				<div class="form-group">
																					<label class="col-lg-4 control-label">C.P.:*</label>
																					<div class="col-lg-8">
																						<input type="text" id="txt_contactZipCode_h" class="form-control required" value="<?php foreach($ds_so as $dr_so){ echo $dr_so["contactZipCode"];} ?>" name="txt_contactZipCode_h">
																					</div>
																				</div>
																				<div class="form-group">
																					<label class="col-lg-4 control-label">Provincia:*</label>
																					<div class="col-lg-8">
																						<input type="text" id="txt_contactProvince_h" class="form-control required" value="<?php foreach($ds_so as $dr_so){ echo $dr_so["contactProvince"];} ?>" name="txt_contactProvince_h">
																					</div>
																				</div>
																				<div class="form-group">
																					<label class="col-lg-4 control-label">Notas:</label>
																					<div class="col-lg-8">
																						<textarea id="tta_contactObs_h" class="form-control" data-provide="markdown" rows="5" name="tta_contactObs_h"><?php foreach($ds_so as $dr_so){ echo $dr_so["contactObs"];} ?></textarea>
																					</div>
																				</div>
																				<!-- div class="col-md-4 pull-right">
																						<div class="form-group">
																							<button type="submit" id="btn_command_h" class="btn btn-primary btn-md btn-block" value="AddSO" name="btn_command_h">Guardar</button>
																						</div>
																				</div-->
																			</div>
																		</div>
																	</fieldset>
																</form>
														</p>
												</div>
												<div id="tab2" class="tab-pane fade">
														<h3>Asignaci&oacute;n de la &Oacute;rden</h3>
														<p>
														<form id="frm_SO_h" class="form-horizontal" action="<?php echo $url; ?>private/ServiceOrder"   method="POST" name="frm_SO_h">
																<fieldset>
																		<div class="col-md-6">																				
																				<div class="form-group">
																						<?php foreach($ds_so as $dr_so){	$currentUserAssigned=$dr_so["fkiBUser"];}?>
																						<label class="col-lg-4 control-label">Asignar:</label>
																						<div class="input-group col-lg-8">
																								<select id="slt_pkEmployee_h" class="selectSearch required" style="width:350px;" name="slt_pkEmployee_h">
																										<?php
																										foreach ($dt_Us as $datarow) {
																											if($datarow['pkiBUser']==$currentUserAssigned){
																										?>
																												<option value="<?php echo $datarow['pkiBUser'] ?>" selected="selected"><?php echo $datarow['realname'] ?></option>
																										<?php
																												}
																												else{
																										?>
																												<option value="<?php echo $datarow['pkiBUser'] ?>"><?php echo $datarow['realname'] ?></option>
																										<?php 
																												}
																										}
																										?>
																								</select>
																								<input type="hidden" id="" value="<?php echo $currentSO ?>" name="hdn_currentSO_h">
																						</div>
																				</div>
																		</div>
																		<div class="col-md-6">
																				<div class="col-md-4 pull-right">
																						<div class="form-group">
																							<button type="submit" id="btn_command_h" class="btn btn-primary btn-md btn-block" value="CMDassign" name="btn_command_h">Asignar</button>
																						</div>
																				</div>
																		</div>
																</fieldset>
														</form>
														</p>
														<hr>
														<p><h3>Diagn&oacute;stico t&eacute;cnico</h3></p>
														<p>
																<form id="frm_SOAt_h" class="form-horizontal" action="<?php echo $url; ?>private/ServiceOrder"   accept-charset="utf-8" enctype="multipart/form-data"  method="POST" name="frm_SOAt_h">
																		<input type="hidden" id="" value="<?php echo $currentSO ?>" name="hdn_currentSO_h">
																		<fieldset>
																			<div class="row">	
																				<div class="col-md-6">
																						<div class="form-group">
																								<label class="col-lg-4 control-label">Dian&oacute;stico:</label>
																								<div class="col-lg-8">
																										<textarea id="tta_SODDesc_h" class="form-control required" data-provide="markdown" rows="5" name="tta_SODDesc_h"></textarea>
																								</div>
																						</div>
																						<div class="form-group">
																							<label class="col-lg-4 control-label">&nbsp;</label>
																								<div class="col-lg-8">
																									<button id="btn_showdanoincidental_h" type="button" class='btn btn-success'>Da&ntilde;o incidental </button>
																							   	</div>
																						</div>
																				</div>
																				<div class="col-md-6">
																					<table class="tableAttach table-bordered">
																							  <tr>
																							    <th>Seleccionar archivo
																							    		<button type="button" class='btn btn-success addmore'>Agregar </button>
																							   			<button type="button" class='btn btn-danger delete'>Eliminar</button>	
																							    </th>
																							  </tr>
																							  <tr>
																							    <td>
																							    	<input type="file" id="ofd_SOAttachment_h"  class="file-loading required fileInput" name="ofd_SOAttachment_h[]">
																							    </td>
																							  </tr>
																					</table>
																					<br>	
																					<table class="tableAttach table-bordered">
																							  <tr>
																							    <th>Archivos actualmente adjuntados</th>
																							  </tr>
																							  <?php 
																							  	$dir = "../App/web/media/upload/files/$currentSO/";
																							  	if (is_dir($dir)) { 
																								    if ($gd = opendir($dir)) { 
																								        while (($archivo = readdir($gd)) !== false) { 
																								            if (($archivo != ".") && ($archivo != "..")){ 
																								?>
																							  <tr>
																							    <td>
																							    	<?php echo $archivo; ?>
																							    </td>
																							  </tr>
																							  <?php 
																							  				}
																							  			}
																							  			closedir($gd);
																							  		}
																							  	}
																							   ?>
																					</table>																						
																				</div>
																			</div>
																			<div id="danoincidental" class="row">
																				<fieldset id="fls_danoincidental_h">	
																				<div class="col-md-6">
																						<div class="form-group">
																								<label class="col-lg-4 control-label">Descripci&oacute;n del da&ntilde;o:</label>
																								<div class="col-lg-8">
																										<textarea id="tta_SODObs_h" class="form-control required " data-provide="markdown" rows="5" name="tta_SODObs_h"></textarea>
																								</div>
																						</div>
																				</div>
																				<div class="col-md-6">
																					<table class="tableDanoI table-bordered">
																							  <tr>
																							    <th>Seleccionar archivo
																							    		<button type="button" class='btn btn-success addmoreDI'>Agregar </button>
																							   			<button type="button" class='btn btn-danger deleteDI'>Eliminar</button>	
																							    </th>
																							  </tr>
																							  <tr>
																							    <td>
																							    	<input type="file" id="ofd_SOAttachDanoI_h"  class="file-loading required fileInput" name="ofd_SOAttachDanoI_h[]">
																							    </td>
																							  </tr>
																					</table>																																											
																				</div>
																				</fieldset>
																			</div>
																			<div class="row">
																				<div class="col-md-6">
																				</div>
																				<div class="col-md-6">
																					<div class="col-md-4 pull-right">
																							<div class="form-group">
																								<button type="submit" id="btn_command_h" class="btn btn-primary btn-md btn-block" value="CMDDiagnose" name="btn_command_h">Diagnosticar</button>
																							</div>
																					</div>
																				</div>
																			</div>
																		</fieldset>
																</form>
														</p>
														</p>
												</div>
										</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<div class="footer">
				<div class="pull-right">
				</div>
				<div>
					<strong>iBrain&#174; 2.0</strong>
				</div>
			</div>
		</div>
	</div>
    <!-- Mainly scripts -->
    <script src="<?php echo $url; ?>App/web/js/jquery-2.1.1.js"></script>
    <script src="<?php echo $url; ?>App/web/js/bootstrap.min.js"></script>
    <script src="<?php echo $url; ?>App/web/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo $url; ?>App/web/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo $url; ?>App/web/js/inspinia.js"></script>
    <script src="<?php echo $url; ?>App/web/js/plugins/pace/pace.min.js"></script>

    <!-- Steps -->
    <script src="<?php echo $url; ?>App/web/js/plugins/staps/jquery.steps.min.js"></script>

    <!-- Jquery Validate -->
    <script src="<?php echo $url; ?>App/web/js/plugins/validate/jquery.validate.min.js"></script>
	  <!-- Data picker -->
	<script src="<?php echo $url; ?>App/web/js/plugins/datapicker/bootstrap-datepicker.js"></script>
	<!-- jqGrid -->
    <script src="<?php echo $url; ?>App/web/js/plugins/jqGrid/i18n/grid.locale-en.js"></script>
    <script src="<?php echo $url; ?>App/web/js/plugins/jqGrid/jquery.jqGrid.min.js"></script>
	    <!-- Peity -->
    <script src="<?php echo $url; ?>App/web/js/plugins/peity/jquery.peity.min.js"></script>
	 <!-- Select2 -->
    <script src="<?php echo $url; ?>App/web/js/plugins/select2/select2.full.min.js"></script>
   
    <script type="text/javascript">
		$.validator.setDefaults({
		submitHandler: function(form) {
			form.submit();
		}
		/*debug:true,
		success:"valid"*/
		});
		
		
		$(document).ready(function(){
			
			//Obtenemos el valor total de filas contenidas actualmente en la tabla.
        		var i=$('table tr').length;
			//Ocultamos los inputs del daño incidental
    			$("#danoincidental").hide();
    		//Habilitamos e inhabilitamos los inputs según si son visibles o no
				var initial;
				$('#danoincidental').is(":visible")? initial = true :	initial =false;
				var fls_danoincidental_j = $("#fls_danoincidental_h");
				var fls_danoincidentalInputs_j=fls_danoincidental_j.find("input").attr("disabled",initial);
				$("#tta_SODObs_h").attr("disabled",initial);
			//cargamos los usuarios en el select2
				$(".selectSearch").select2({	
					placeholder: "Asignar a...",
					allowClear: true
				});
			//Agregar fila a la tabla para el file input
				$(".addmore").on('click',function(){
					count=$('.tableAttach tr').length;
					
				    var data = "<tr>";
				    	data += '<td><input type="file" id="ofd_SOAttachment_h_' + i + '" class="file-loading required fileInput" name="ofd_SOAttachment_h[]"></td>';
				    	data += "</tr>";
					$('.tableAttach').append(data);
					row = i ;
					i++;
				});
				$(".addmoreDI").on('click',function(){
					count=$('.tableDanoI tr').length;
				    var data="<tr>";
			    	data += '<td><input type="file" id="ofd_SOAttachDanoI_h_' + i + '" class="file-loading required fileInput" name="ofd_SOAttachDanoI_h[]"></td>';
			    	data += "</tr>";
					$('.tableDanoI').append(data);
					row = i ;
					i++;
				});
			//Elimiar última fila
				$(".delete").on('click', function() {
					//Obtenemos el total de columnas de la tabla
					var trs=$(".tableAttach tr").length;
					if (trs>1){
						$(".tableAttach tr:last").remove();
					}
				/*$('.case:checkbox:checked').parents("tr").remove();
			    $('.check_all').prop("checked", false); 
				check();*/
				});
				$(".deleteDI").on('click', function() {
					//Obtenemos el total de columnas de la tabla
					var trs=$(".tableDanoI tr").length;
					if (trs>1){
						$(".tableDanoI tr:last").remove();
					}
					/*$('.case:checkbox:checked').parents("tr").remove();
			    	$('.check_all').prop("checked", false); 
					check();*/
				});
			//Mostrar y ocultar div daño incidental
				$(function(){
					$("#btn_showdanoincidental_h").on(
						'click',function(){
							if($('#danoincidental').is(":visible")){
								$("#danoincidental").hide("slow");
							}else{
								$("#danoincidental").show("slow");		
							}
						}
					);
				});
			//Mostramos los files input
			
			//Validar formulario de diagnóstico
				$("#frm_SOAt_h").validate(
				{
					rules:{
						tta_SODDesc_h:{
							required : true,
							minlength : 2
						},
						'ofd_SOAttachment_h[]' : {
							required : true
						},
						tta_SODObs_h:{
							required : "#danoincidental:visible",
							minlength : 2
						},
						'ofd_SOAttachDanoI_h[]' : {
							required : "#danoincidental:visible"
						}
					},
					messages :{
						tta_SODDesc_h : {
							required : "Por favor, introduzca el diagn&oacute;stico t&eacute;cnico del dispositivo.",
							minlength : "Por favor, escriba un verdadero diagn&oacute;stico t&eacute;cnico."					
						},
						'ofd_SOAttachment_h[]' :  "Favor de seleccionar un archivo para subir.",
						tta_SODObs_h:{
							required : "Usted ha seleccionado que el equipo presenta un da&ntilde;o incidental, favor de describirlo.",
							minlength : "Por favor, escriba una verdadera descripci&oacute;n de da&ntilde;o incidental."
						},
						'ofd_SOAttachDanoI_h[]' :  "Favor de seleccionar un archivo para subir."
					}
				}		
				);
			
			
						
			$("#frm_SO_h").validate({
			      rules: {
						slt_fkCollectMethod_h:	{
							required:true,
							min:0
						},
						tta_SODeviceCondition_h: {
							required:true
						},
						tta_SOTechDetail_h:{
							required:true
						},
						txt_contactPhone_h:{
							required:true,
							number:true,
							minlength:10,
							maxlength:15
					    },
						txt_contactMovil_h:{
							required:true,
							number:true,
							minlength:10,
							maxlength:15
						},
						txt_contactName_h:{
							required:true,
							minlength: 2
						},
						txt_contactEmail_h:{
							required:true,
							email:true
						},
						txt_contactAddress_h:{
							required:true
						},
						txt_contactLocation_h:{
							required:true
						},
						txt_contactCounty_h:{
							required:true
						},
						txt_contactZipCode_h:{
							required:true,
							number:true,
							minlength:5,
							maxlength:6
						},
						txt_contactProvince_h:{
							required:true
						}
                  },
					messages:{
						slt_fkCollectMethod_h: "Por favor, selecciona un m&eacute;todo de recollecci&oacute;n.",
						tta_SODeviceCondition_h: "Por favor, especifique la condici&oacute;n actual del equipo.",
						tta_SOTechDetail_h:"Por favor, especifique la condici&oacute;n t&eacute;cnica del equipo.",
						txt_contactPhone_h:{
							required:"Por favor, introduzca un n&uacute;mero de tel&eacute;fono.",
							number:"Por favor, introduzca s&oacute;lo n&uacute;meros.",
							minlength:"Debe de contener al menos diez d&iacute;gitos.",
							maxlength:"Debe contener m&aacute;ximo diez d&iacute;gitos."
						},
						txt_contactMovil_h:{
							required:"Por favor, introduzca un n&uacute;mero de tel&eacute;fono.",
							matches:"Por favor, introduzca s&oacute;lo n&uacute;meros.",
							minlength:"Debe de contener al menos diez d&iacute;gitos.",
							maxlength:"Debe contener m&aacute;ximo diez d&iacute;gitos."
						},
						txt_contactName_h:{
							required:"Por favor, introduzca el nombre del contacto.",
							minlength:"Por favor, escriba un verdadero nombre."
					    },
						txt_contactEmail_h:"Por favor, introduzca un email v&aacute;lido.",
						txt_contactAddress_h:"Por favor, introduzca un direcci&oacute;n v&aacute;lida.",
						txt_contactLocation_h:"Por favor, introduzca una Colonia.",
						txt_contactCounty_h:"Por favor, introduzca un municipio o delegaci&oacute;n.",
						txt_contactZipCode_h:{
							required:"Por favor, introduzca un c&oacute;digo postal v&aacute;lido.",
							number:"Por favor, introduzca s&oacute;lo n&uacute;meros.",
							minlength:"Debe de contener al menos cinco d&iacute;gitos.",
							maxlength:"Debe contener m&aacute;ximo seis d&iacute;gitos."
							},
						txt_contactProvince_h:"Por favor, introduzca una Provincia o Estado."
					}
		});
		});	
	
		function ObjJ2ObjP(object){
		var json="{";
		for (property in object){
			var valor=object[property];
			if(typeof(valor)=="string"){
				json += '"' + property + '":"' + valor + '",'
			}
			else{
				if(!valor[0]){
					json += '"' + property + '":[' + ObjJ2ObjP(valor) + ',';
				}
				else{
					json += '"' + property + '":[';
					for(prop in valor) json += '"' + valor[prop] + '",';
					json=json.substr(0,json.length-1) + '],';
				}
			}
		}
		return json.substr(0,json.length-1) + '}';
	}
	</script>




</body>

</html>