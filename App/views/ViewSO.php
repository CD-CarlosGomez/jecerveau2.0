<?php
#Agregar los select de las llaves for�neas
#16.3.26 mensaje modal de confirmaci�n de movimiento CRUD
#16.3.29 incluir en la sesi�n el BO
namespace App\View;
defined("APPPATH") OR die("Access denied");

use \Core\View;
use \Core\Controller;
use \App\data\DataGridView as DGV;
		
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
		
		foreach($currentST as $dr_sos){ $currentSTName=$dr_sos['SOstatusName'];}
		
		if (is_string($currentAssignTo)){
			$currentAssignToName = $currentAssignTo;
		}
		else{
			foreach($currentAssignTo as $dr_user){ $currentAssignToName = $dr_user['realname'];}
		}
		
		$outputTableProducts = DGV::getInstance($ds_products)
		->setGridAttributes(array('class' => 'table table-striped table-bordered table-hover dataTables-example'))
		->enableSorting(false)
		->removeColumn('pkProduct')
		->removeColumn('ProductCategory_pkProductCategory')
		->removeColumn('ProductType_pkProductType')
		->removeColumn('PODetail_pkPODetail')
		->removeColumn('created')
		->removeColumn('createdBy')
		->removeColumn('modified')
		->removeColumn('modifiedBy')
		->removeColumn('active')
		->removeColumn('pkProductSoldSorder')
		->removeColumn('fkSorder')
		->removeColumn('fkProduct')
		->removeColumn('fkModificationCode')
		->removeColumn('fkSymtomArea')
		->removeColumn('fkSymtomCode')
		->setup(array(
			'productDesc' => array('header' => 'Descripci&oacute;n de la parte'),
			'productPartNumber' => array('header' => 'No. de parte'),
			'productSerialNumber' => array('header' => 'No. de serie'),
			'productBrand' => array('header' => 'Marca')			
		))
		/*->addColumnAfter('actions', 
									'<a href="'.$url.'private/ServiceOrder/ViewSO/$pkSOrder$">Ver ASP\'s</a>',
									'Actions', array('align' => 'center'))*/
		//->addColumnBefore('counter', '%counter%.', 'Counter', array('align' => 'right'))
		//->setStartingCounter(1)
		//->setRowClass('')
		->setAlterRowClass('alterRow');
		
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
	<!-- iCheck -->
    <link href="<?php echo $url; ?>App/web/css/plugins/iCheck/custom.css" rel="stylesheet">
	<!-- Steps -->
    <link href="<?php echo $url; ?>App/web/css/plugins/steps/jquery.steps.css" rel="stylesheet">
	<!-- DatePicker -->
	<link href="<?php echo $url; ?>App/web/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
	<!-- JQGrid -->
	<link href="<?php echo $url; ?>App/web/css/plugins/jqGrid/ui.jqgrid.css" rel="stylesheet">
	<!-- JQuery-UI -->
	<link href="<?php echo $url; ?>App/web/css/plugins/jQueryUI/jquery-ui-1.10.4.custom.min.css">
	<!-- Select 2 -->
	<link href="<?php echo $url; ?>App/web/css/plugins/select2/select2.min.css" rel="stylesheet">
	<!-- Toastr style -->
    <link href="<?php echo $url; ?>App/web/css/plugins/toastr/toastr.min.css" rel="stylesheet">
	<!-- Sweet Alert -->
    <link href="<?php echo $url; ?>App/web/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
	<!-- dataTable CSS-->
    <link href="<?php echo $url; ?>/App/web/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
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
									<a href="<?php echo $url; ?>private/logout">Salir</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
				<div class="row wrapper border-bottom white-bg page-heading">
						<div class="col-sm-6 pull-right">
								<h2>Orden de servicio No. <?php foreach($ds_so as $dr_so){ echo $dr_so["SONumber"];} ?></h2>
							<div class="pull-right">	
								<h3>Estatus actual: <?php echo $currentSTName;  ?></h3>
								<h3>Asignado a: <?php echo($currentAssignToName);?></h3>
							</div>
						</div>
						<div class="col-sm-4">
							<h2>&nbsp;</h2>
							<ol class="breadcrumb">
								<li>
									<a href="<?php echo $url; ?>private/home">Inicio</a>
								</li>
								<li>
									<a href="<?php echo $url; ?>private/ServiceOrder/showSO">Orden de servicio</a>
								</li>
								<li class="active">
									<strong>Nueva Orden de servicio</strong>
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
													<div class="col-lg-6">
														<fieldset class="form-group grouper"><leyend><h3>Informaci&oacute;n del dispositivo</h3></leyend>
															<div class="form-group">
																<label class="col-md-4 control-label">Serie:*</label>
																<div class="col-lg-8">
																	<input type="text" id="txt_gsxSerialNumber_h" class="form-control required" value="<?php foreach($ds_so as $dr_so){ echo $dr_so["deviceSerialNumber"];} ?>" readonly="readonly" name="txt_gsxSerialNumber_h"/>
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-4 control-label">Modelo:*</label>
																<div class="col-lg-8">
																	<input type="text" id="txt_gsxModel_h" class="form-control required" value="<?php foreach($ds_so as $dr_so){ echo $dr_so["deviceModel"];} ?>" readonly="readonly" name="txt_gsxModel_h"/>
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-4 control-label">Configuraci&oacute;n:*</label>
																<div class="col-md-8">
																	<input type="text" id="txt_gsxConfigDesc_h" class="form-control required" value="<?php foreach($ds_so as $dr_so){ echo $dr_so["deviceFeatures"];} ?>" readonly="readonly" name="txt_gsxConfigDesc_h" />
																</div>
															</div>
														</fieldset>
													</div>
													<div class="col-md-6">
														<fieldset class="form-group grouper"><leyend><h3>Informaci&oacute;n de la cobertura</h3></leyend>
															<div class="form-group">
																<label class="col-md-4 control-label">Estado de la cobertura:*</label>
																<div class="col-md-8">
																	<input  type="text" id="txt_gsxWarrantyST_h" class="form-control required" value="<?php foreach($ds_so as $dr_so){ echo $dr_so["warrantyStatus"];} ?>" readonly="readonly" name="txt_gsxWarrantyST_h"/>
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-4 control-label">Fecha de compra:*</label>
																<div class="col-md-8">
																	<input  type="text" id="txt_gsxPurchaseDate_h" class="form-control required" value="<?php foreach($ds_so as $dr_so){ echo $dr_so["purchaseDate"];}?>" readonly="readonly" name="txt_gsxPurchaseDate_h"/>
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-4 control-label">Comprado en:*</label>
																<div class="col-md-8">
																	<input type="text" id="txt_gsxPurchaseCountry_h" class="form-control required" value="<?php foreach($ds_so as $dr_so){ echo $dr_so["purchasePlace"];} ?>" readonly="readonly" name="txt_gsxPurchaseCountry_h"/>
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-4 control-label">Extensi&oacute;n de la cobertura:</label>
																<div class="col-md-8 input-group">
																	<input type="text" id="txt_contractStartDate_h" class="form-control" readonly="readonly" name="txt_contractStartDate_h">
																	<span class="input-group-addon">a</span>
																	<input type="text" id="txt_contractEndDate_h" class="form-control" readonly="readonly" name="txt_contractEndDate_h"/>
																</div>
															</div>
														</fieldset>
													</div>
													
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
									<h5>Orden de servicio</h5>
								</div>
								<div class="ibox-content">
										<ul class="nav nav-tabs">
												<li id="navli1" class=""><a data-toggle="tab" href="#tab1"><h3>Informaci&oacute;n de la orden</h3></a></li>
												<li id="navli2" class=""><a data-toggle="tab" href="#tab2" ><h3>Diagn&oacute;stico t&eacute;cnico</h3></a></li>
												<li id="navli3" class=""><a data-toggle="tab" href="#tab3" ><h3>Seguimiento de la orden</h3></a></li>
												<li id="navli4" class=""><a data-toggle="tab" href="#tab4" ><h3>&Oacute;rdenes relacionadas</h3></a></li>
										</ul>
										<div class="tab-content">
												<div id="tab1" class="tab-pane active">
														<div class="panel-body">
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
														</div>
												</div>
												<div id="tab2" class="tab-pane"> 
													<div class="panel-body">
														<form id="frm_SO_h" class="form-horizontal" action="<?php echo $url; ?>private/ServiceOrder"   method="POST" name="frm_SO_h">
																<fieldset class="form-group grouper"><leyend><h3>Asignaci&oacute;n de la orden</h3></leyend>
																		<div class="col-md-6">																				
																				<div class="form-group">
																						<?php foreach($ds_so as $dr_so){	$currentUserAssigned=$dr_so["fkiBUser"];}?>
																						<label class="col-lg-4 control-label">Asignar:</label>
																						<div class="input-group col-lg-8">
																								<select id="slt_pkEmployee_h" class="selectSearch required" style="width:310px;" name="slt_pkEmployee_h">
																										 <option></option>
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
														<hr>
														<div class="row">
														<form id="frm_SOAt_h" class="form-horizontal" action="<?php echo $url; ?>private/ServiceOrder"   accept-charset="utf-8" enctype="multipart/form-data"  method="POST" name="frm_SOAt_h">
															<input type="hidden" id="" value="<?php echo $currentSO ?>" name="hdn_currentSO_h">
															<fieldset class="form-group grouper"><leyend><h3>Diagn&oacute;stico t&eacute;cnico</h3></leyend>
																	<div class="col-md-6">
																		<div class="form-group">
																			<label class="col-lg-4 control-label">Dian&oacute;stico:</label>
																			<div class="col-lg-8">
																				<textarea id="tta_SODDesc_h" class="form-control required" data-provide="markdown" rows="5" cols="80" name="tta_SODDesc_h"><?php 
																					if ($tabActive==2 and !empty($ds_sod)){
																						foreach($ds_sod as $dr_sod){	 
																							if(isset($dr_sod["SODetailDesc"])){
																								echo trim($dr_sod["SODetailDesc"]);
																							}
																						}
																					}
																				?></textarea>
																			</div>
																		</div>
																		<div class="form-group">
																				<label class="col-lg-4 control-label">&nbsp;</label>
																				<div class="col-lg-8">
																					<button id="btn_showdanoincidental_h" type="button" class='btn btn-default'>Da&ntilde;o incidental </button>
																				</div>
																		</div>
																		<fieldset id="danoincidental" class="">
																			<div class="form-group">
																					<label class="col-lg-4 control-label">Descripci&oacute;n del da&ntilde;o:</label>
																					<div class="col-lg-8">
																						<textarea id="tta_SODObs_h" class="form-control required " data-provide="markdown" rows="5" name="tta_SODObs_h"><?php 
																							if ($tabActive==2 and !empty($ds_sod)){
																								foreach($ds_sod as $dr_sod){	 echo trim(@$dr_sod["SODetailObs"]);}
																							}
																						?></textarea>
																					</div>
																				</div>
																		</fieldset>
																			<div class="form-group">
																					<label class="col-lg-4 control-label">&nbsp;</label>
																					<div class="col-lg-8">
																						<button id="btn_showSpares_h" type="button" class='btn btn-default'>Partes</button>
																					</div>
																			</div>
																	</div>
																	<div class="col-md-6">
																		<div class="col-md-4 pull-right">
																			<div class="form-group">
																				<button type="submit" id="btn_command_h" class="btn btn-primary btn-md btn-block" value="CMDDiagnose" name="btn_command_h">Diagnosticar</button>
																			</div>
																		</div>
																	</div>
															</fieldset>
														</form>
														</div>
														<div class="row">
															<form id="frm_SOSpares_h" class="form-horizontal upd" action="<?php echo $url; ?>private/ServiceOrder/ctrlSaveSpare"   accept-charset="utf-8" method="POST" name="frm_SOSpares_h">
																<input type="hidden" id="" value="<?php echo $currentSO ?>" name="hdn_currentSO_h">
																<fieldset id="spares" class="form-group grouper"><leyend><h3>Partes</h3></leyend>
																	<div class="col-md-6">
																			<div class="form-group">
																				<label class="col-md-4 control-label">Descripci&oacuten de la parte*:</label>
																				<div class="col-md-8">
																					<input type="text" id="txt_productDesc_h" class="form-control" value="" name="txt_productDesc_h" />
																				</div>
																			</div>
																			<div class="form-group">
																					<label class="col-lg-4 control-label">No. de parte:</label>
																					<div class="col-lg-8">
																						<input type="text" id="txt_productPartNumber_h" class="form-control" value="" name="txt_productPartNumber_h"/>
																					</div>
																			</div>
																			<div class="form-group">
																				<label class="col-md-4 control-label">No. de serie:</label>
																				<div class="col-md-8">
																					<div class="input-group m-b">
																						<span class="input-group-addon"> 
																							<input type="checkbox" id="chk_ifSerialNumber_h" class="" name="chk_ifSerialNumber_h"> 
																						</span> 
																						<input type="text" id="txt_productSerialNumber_h" class="form-control" name="txt_productSerialNumber_h">
																					</div>
																				</div>
																			</div>
																			<div class="form-group">
																					<label class="col-lg-4 control-label">Garant&iacute;a:</label>
																					<div class="col-lg-8">
																						<select id="slt_warrantySt_h" class="required" style="width:312px;" name="slt_warrantySt_h">
																							<option value=""></option>
																							<option value="Aceptada">Aceptada</option>
																							<option value="En revisi&oacute;n">En revisi&oacute;n</option>
																							<option value="Declinada">Declinada</option>
																						</select>
																					</div>
																			</div>
																			<div class="form-group">
																					<label class="col-lg-4 control-label">C&oacute;digo modificador:</label>
																					<div class="col-lg-8">
																						<select id="slt_pkModificationCode_h" class="required" style="width:312px;" name="slt_pkModificationCode_h">
																							<option></option>
																							<?php  foreach($ds_modificationCodes as $dr_modcodes){?>
																								<option value="<?php echo $dr_modcodes['pkModificationCode'] ?>"><?php echo $dr_modcodes['modificationCodeDesc'] ?></option>
																							<?php }	?>
																						</select>
																					</div>
																			</div>
																			<div class="form-group">
																					<label class="col-lg-4 control-label">&Aacute;rea del s&iacute;ntoma:</label>
																					<div class="col-lg-8">
																						<select id="slt_pkSymptomArea_h" class="required" style="width:312px;" name="slt_pkSymptomArea_h">
																							<option value=""></option>
																							<?php  foreach($ds_symptomAreas as $dr_symarea){?>
																								<option value="<?php echo $dr_symarea['pkSymptomArea'] ?>"><?php echo $dr_symarea['symptomAreaDesc'] ?></option>
																							<?php }	?>
																						</select>
																					</div>
																			</div>
																			<div class="form-group">
																					<label class="col-lg-4 control-label">C&oacute;digo del s&iacute;ntoma:</label>
																					<div class="col-lg-8">
																						<select id="slt_pkSymptomCode_h" class="required" style="width:312px;" name="slt_pkSymptomCode_h">
																							<option value=""></option>
																						</select>
																					</div>
																			</div>
																	</div>
																	<div class="col-md-6">
																		<div class="col-md-4 pull-right">
																			<div class="form-group">
																				<button type="submit" id="btn_command_h" class="btn btn-primary btn-md btn-block" data-ajax="true" value="CMDSaveSpare" name="btn_command_h">Guardar</button>
																			</div>
																		</div>
																	</div>
																</fieldset>
															</form>
														</div>
														<div class="row">
															<div class="col-lg-12">
																<div class="table-responsive">
																	<?php $outputTableProducts->render();?>
																</div>
															</div>
														</div>
														<hr>
														<div id="" class="row">
																	<div class="col-md-7">
																	<fieldset class="form-group grouper"><h3>Adjuntar archivos</h3></leyend>
																		<div class="form-group">
																			<label class="col-md-4 control-label">Tipo de archivo:</label>
																			<div class="col-md-8">
																				<select id="slt_kindFormat_h" class="form-control m-b" name="slt_kindFormat_h">
																					<option value="">Selecciona un tipo de documento...</option>
																					<option value="Documento">Documento</option>
																					<option value="Factura">Factura</option>
																					<option value="Ticket">Ticket</option>
																					<option value="Fotografia">Fotograf&iacute;a</option>
																					<option value="FDI">Fotograf&iacute;a da&ntilde;o incidental</option>
																					<option value="RU">Resultado de utiler&iacute;a</option>
																					<option value="Video">Video</option>
																				</select>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-md-4 control-label">Nombre del archivo:</label>
																				<div class="col-md-8">
																						<input type="text" id="txt_SOAttachDRename_h"  class="file-loading fileInput" name="txt_SOAttachDRename_h">
																				</div>
																		</div>
																		<div class="form-group">
																			<label class="col-md-4 control-label">Cargar archivo:</label>
																			<div class="col-md-8">
																				<input type="file" id="ofd_SOAttachment_h"  class="file-loading fileInput" name="ofd_SOAttachment_h">
																			</div>
																		</div>
																		<div class="form-group">
																			<div class="col-md-4 pull-right">
																				<button type="button" id="btn_uploadFile_h" class='btn btn-success'>Cargar</button>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-md-4 control-label">&nbsp;</label>
																			<div class="col-md-8">
																				<progress id="barra_de_progreso" value="0" max="100"></progress>
																			</div>
																		</div>
																	</fieldset>
																	</div>
																	<div class="col-md-5">
																		<fieldset class="form-group grouper"><h3>Historial de archivos adjuntados</h3></leyend>
																			<div id="respuesta" class="alert"></div>
																			<div id="archivos_subidos"></div>
																		</fieldset>
																	</div>
														</div>
													</div>
												</div>
												<div id="tab3" class="tab-pane">
													 <div class="panel-body">
														<p><h3>Estatus actual: <?php echo $nextSTLabel; ?></h3></p>
															<form id="frm_SOAt_h" class="form-horizontal" action="<?php echo $url; ?>private/ServiceOrder"   accept-charset="utf-8" enctype="multipart/form-data"  method="POST" name="frm_SOAt_h">
																<input type="hidden" id="" value="<?php echo $currentSO; ?>" name="hdn_currentSO_h">
																<input type="hidden" id="" value="<?php echo $nextPKOSstatus; ?>" name="hdn_nextPkSt_h">
																	<fieldset>
																		<div class="row">	
																			<div class="col-md-6">
																				<div class="form-group">
																					<label class="col-lg-4 control-label">Seguimiento:</label>
																					<div class="col-lg-8">
																						<textarea id="tta_SODDesc_h" class="form-control required" data-provide="markdown" rows="5" cols="80" name="tta_SODDesc_h"></textarea>
																					</div>
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="form-group">
																					<label class="col-lg-4 control-label">Modificar estatus a:</label>
																					<div class="col-md-4 pull-right">
																						<button type="submit" id="btn_command_h" class="btn btn-primary btn-md btn-block" value="CMDupdateStatus" name="btn_command_h"><?php echo $nextST;?></button>
																					</div>
																				</div>
																			</div>
																		</div>
																	</fieldset>
															</form>
														<hr>
														<p><h3>Historial de la orden</h3></p>
															<ul class="sortable-list connectList agile-list" id="inprogress">
																<?php foreach ($SOHistory as $dr_SOH){ ?>
																	
																<li class="success-element" id="task9">
																	<?php echo '<strong>' . $dr_SOH['realname'] . '</strong>&nbsp; Seguimiento : ' .  $dr_SOH['SODetailDesc']; ?>  
																	<div class="agile-detail">
																		<a href="#" class="pull-right btn btn-xs btn-white"><?php echo $dr_SOH['SOstatusName']; ?></a>
																	<i class="fa fa-clock-o"></i><?php 
																										$dateSOH= new \DateTime ($dr_SOH['SOlogDate']);
																										echo $dateSOH->format('d-m-Y');
																								?>
																	</div>
																</li>
																<?php } ?>
															</ul>
													</div>
												</div>
												<div id="tab4" class="tab-pane">
													 <div class="panel-body">
													 </div>
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
   <!-- Ajax uploadFile -->
    <script src="<?php echo $url; ?>App/web/ajax/upload.js"></script>
	<!-- Ajax carga Symtomp -->
    <script src="<?php echo $url; ?>App/web/ajax/slt_symptomArea_h.js"></script>
	<!-- Ajax submit -->
    <script src="<?php echo $url; ?>App/web/ajax/submit.ini.js"></script>
	<!-- jquery forms -->
    <script src="<?php echo $url; ?>App/web/js/jquery.form.js"></script>
	<!-- Sweet alert -->
    <script src="<?php echo $url; ?>App/web/js/plugins/sweetalert/sweetalert.min.js"></script>
	<!-- dataTables-->
	<script src="<?php echo $url; ?>/App/web/js/plugins/dataTables/datatables.min.js"></script>
	<script src="<?php echo $url; ?>/App/web/js/plugins/jeditable/jquery.jeditable.js"></script>
    <script type="text/javascript">
	//////Set defaults settings
		$.validator.setDefaults({
			submitHandler: function(form) {
				form.submit();
		}
		/*debug:true,
		success:"valid"*/
		});
	///DOM already loaded	
		$(document).ready(function(){
			//Ocultamos los inputs del daño incidental
				var flag_incidentalDamage_j="<?php if(isset($ds_sod)){foreach($ds_sod as $dr_sod){	 echo trim($dr_sod["SODetailObs"]);}}?>";
				
				if(!flag_incidentalDamage_j){
					$("#danoincidental").hide();
				}
				else{
					$("#danoincidental").show();
				}
			//Ocultamos los inputs de los spares
			$("#spares").hide();
    		//Habilitamos e inhabilitamos los inputs según si son visibles o no
				var initial;
				$('#danoincidental').is(":visible")? initial = true :	initial =false;
				var fls_danoincidental_j = $("#fls_danoincidental_h");
				var fls_danoincidentalInputs_j=fls_danoincidental_j.find("input").attr("disabled",initial);
				$("#tta_SODObs_h").attr("disabled",initial);
			//Habilitamos e inhabilitamos el input de serial number si es necesario
				var ifSNApplies = $('#chk_ifSerialNumber_h');
				ifSNInitial = ifSNApplies.is(":checked");
				$("#txt_productSerialNumber_h").attr("disabled",!ifSNInitial);
				ifSNApplies.click(function(){
					$("#txt_productSerialNumber_h").attr("disabled",!this.checked);
				});
				
			//cargamos los usuarios en el select2
				$(".selectSearch").select2({	
					placeholder: "Asignar a...",
					allowClear: true,
					language : "es"
				});
			//cargamos las garantías en el select2
				$("#slt_warrantySt_h").select2({	
					placeholder: "Selecciona ...",
					allowClear: true,
					language : "es"
				});
			//cargamos los modificationsCodes en el select2
				$("#slt_pkModificationCode_h").select2({	
					placeholder: "Selecciona...",
					allowClear: true,
					language : "es"
					
				});
			//cargamos los symptomAreas en el select2
				$("#slt_pkSymptomArea_h").select2({	
					placeholder: "Selecciona...",
					allowClear: true,
					language : "es"
				});
			//cargamos los symptomAreas en el select2
				$("#slt_pkSymptomCode_h").select2({	
					placeholder: "Selecciona...",
					allowClear: true,
					language : "es"
				});
			//Mostrar y ocultar fielset daño incidental
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
			//Mostrar y ocultar fielset spares
					$("#btn_showSpares_h").on(
						'click',function(){
							if($('#spares').is(":visible")){
								$("#spares").hide("slow");
							}else{
								$("#spares").show("slow");		
							}
						}
					);
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
			//Habilitamos y dehabilitamos tabs
				/*$('#navli3').not('.active').addClass('disabled');
				$('#navli3').not('.active').find('a').removeAttr("data-toggle");
				
				$('#tab3').click(function(event){
					if ($('#navli3').hasClass('disabled')) {
						$('#navli3').removeClass('disabled');
						$('#navli3').find('a').attr('data-toggle','tab');
					}
				});
				
				 $('button').click(function(){
					//enable next tab//
					$('.nav li.active').next('li').removeClass('disabled');
					$('.nav li.active').next('li').find('a').attr("data-toggle","tab")
				});*/
			//Upload files ajax
			mostrarArchivos();
			$("#btn_uploadFile_h").on('click', function() {
                subirArchivos();
            });
			$("#archivos_subidos").on('click', '.eliminar_archivo', function() {
                    var archivo = $(this).parents('.row').eq(0).find('span').text();
                    archivo = $.trim(archivo);
                    eliminarArchivos(archivo);
            });
			//Validar formulario de diagnóstico
				$("#frm_SOAt_h").validate({
					rules:{
						tta_SODDesc_h:{
							required : true,
							minlength : 2
						},
						/*'ofd_SOAttachment_h[]' : {
							required : true
						},*/
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
						/*'ofd_SOAttachment_h[]' :  "Favor de seleccionar un archivo para subir.",*/
						tta_SODObs_h:{
							required : "Usted ha seleccionado que el equipo presenta un da&ntilde;o incidental, favor de describirlo.",
							minlength : "Por favor, escriba una verdadera descripci&oacute;n de da&ntilde;o incidental."
						},
						'ofd_SOAttachDanoI_h[]' :  "Favor de seleccionar un archivo para subir."
					}
				}		
				);
			//Validar el formulario de la SO.	
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
		//Funciones
		function subirArchivos() {
            $("#ofd_SOAttachment_h").upload('<?php echo $url; ?>/private/ServiceOrder/uploadAttachment',
			{
                nombre_archivo : $("#txt_SOAttachDRename_h").val(),
				tipo_archivo   : $("#slt_kindFormat_h").val(),
				SOactual	   : <?php echo $currentSO ?>
            },
            function(respuesta) {
            //Subida finalizada.
            $("#barra_de_progreso").val(0);
                if (respuesta === 1) {
                    mostrarRespuesta('El archivo ha sido subido correctamente.', true);
					$("#txt_SOAttachDRename_h, #ofd_SOAttachment_h").val('');
                } else {
                    mostrarRespuesta('El archivo NO se ha podido subir.', false);
                }
				mostrarArchivos();
            }, 
			function(progreso, valor) {
                //Barra de progreso.
                 $("#barra_de_progreso").val(valor);
            });
            }
        function eliminarArchivos(archivo) {
                $.ajax({
                    url: '<?php echo $url; ?>/private/ServiceOrder/deleteAttachment',
                    type: 'POST',
                    timeout: 10000,
                    data: { 
						archivo: archivo,
						SOactual : <?php echo $currentSO ?>
					},
                    error: function() {
                        mostrarRespuesta('Error al intentar eliminar el archivo.', false);
                    },
                    success: function(respuesta) {
                        if (respuesta == 1) {
                            mostrarRespuesta('El archivo ha sido eliminado.', true);
                        } else {
                            mostrarRespuesta('Error al intentar eliminar el archivo.', false);                            
                        }
                        mostrarArchivos();
                    }
                });
            }
        function mostrarArchivos() {
                $.ajax({
                    url: '<?php echo $url; ?>/private/ServiceOrder/showAttachment',
                    dataType: 'JSON',
					type: 'POST',
					data : {
						SOactual : <?php echo $currentSO ?>
					}, 
                    success: function(respuesta) {
                        if (respuesta) {
                            var html = '';
                            for (var i = 0; i < respuesta.length; i++) {
                                if (respuesta[i] != undefined) {
                                    html += '<div class="row"> <span class="col-md-8"><a href=" <?php echo $url; ?>App/web/media/upload/files/<?php echo $currentSO; ?>/' + respuesta[i] + '" target="_blank">' + respuesta[i] + '</a> </span> <div class="col-md-4"> <a class="eliminar_archivo btn btn-danger" href="javascript:void(0);"> Eliminar </a> </div> </div> <hr />';
                                }
                            }
                            $("#archivos_subidos").html(html);
                        }
                    }
                });
            }
        function mostrarRespuesta(mensaje, ok){
                $("#respuesta").removeClass('alert-success').removeClass('alert-danger').html(mensaje);
                if(ok){
                    $("#respuesta").addClass('alert-success');
                }else{
                    $("#respuesta").addClass('alert-danger');
                }
            }
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