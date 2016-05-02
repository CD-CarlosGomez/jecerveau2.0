<?php
#Agregar los select de las llaves foráneas
#16.3.26 mensaje modal de confirmación de movimiento CRUD
#16.3.29 incluir en la sesión el BO
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
    <link href="<?php echo $url; ?>App/web/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo $url; ?>App/web/css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="<?php echo $url; ?>App/web/css/animate.css" rel="stylesheet">
    <link href="<?php echo $url; ?>App/web/css/style.css" rel="stylesheet">
	<link href="<?php echo $url; ?>App/web/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
	<link href="<?php echo $url; ?>App/web/css/plugins/jqGrid/ui.jqgrid.css" rel="stylesheet">
	<link href="<?php echo $url; ?>App/web/css/plugins/jQueryUI/jquery-ui-1.10.4.custom.min.css">
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
									<a href="<?php echo $url; ?>App/controllers/logout.php">Log out</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
				<div class="row wrapper border-bottom white-bg page-heading">
					<div class="col-sm-4">
						<h2>Orden de servicio</h2>
						</br>
						<h3><?php foreach($ds_so as $dr_so){ echo $dr_so["SONumber"];} ?></h3>
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
									<div class="ibox-tools">
										<a class="collapse-link">
											<i class="fa fa-chevron-up"></i>
										</a>
										<a class="dropdown-toggle" data-toggle="dropdown" href="#">
											<i class="fa fa-wrench"></i>
										</a>
										<ul class="dropdown-menu dropdown-user">
											<li><a href="#">Config option 1</a>
											</li>
											<li><a href="#">Config option 2</a>
											</li>
										</ul>
										<a class="close-link">
											<i class="fa fa-times"></i>
										</a>
									</div>
								</div>
								<div class="ibox-content" >
									<fieldset>
											<form id="formUser" class="form-horizontal" action="<?php echo $url; ?>private/User" method="POST" role="form">
													<div class="col-lg-6 form-group-dark">
														<div class="form-group">&nbsp;</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Serie:*</label>
															<div class="col-lg-8">
																<input type="text" id="txt_gsxSerialNumber_h" class="form-control required" value="<?php echo $obj_gsx_p->{'serialNumber'}; ?>" name="txt_gsxSerialNumber_h"/>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Modelo:*</label>
															<div class="col-lg-8">
																<input type="text" id="txt_gsxModel_h" class="form-control required" value="<?php echo $obj_gsx_p->{'productDescription'};?>" name="txt_gsxModel_h"/>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Configuraci&oacute;n:*</label>
															<div class="col-md-8">
																<input type="text" id="txt_gsxConfigDesc_h" class="form-control required" value="<?php echo $obj_gsx_p->{'configDescription'};?>" name="txt_gsxConfigDesc_h" />
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Estado de la cobertura:*</label>
															<div class="col-md-8">
																<input  type="text" id="txt_gsxWarrantyST_h" class="form-control required" value="<?php echo $obj_gsx_p->{'warrantyStatus'};?>" name="txt_gsxWarrantyST_h"/>
															</div>
														</div>
													</div>
													<div class="col-md-6 form-group-dark">
														<div class="form-group">&nbsp;</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Fecha de compra:*</label>
															<div class="col-md-8">
																<input  type="text" id="txt_gsxPurchaseDate_h" class="form-control required" value="<?php echo $obj_gsx_p->{'estimatedPurchaseDate'};?>" name="txt_gsxPurchaseDate_h"/>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Comprado en:*</label>
															<div class="col-md-8">
																<input type="text" id="txt_gsxPurchaseCountry_h" class="form-control required" value="<?php echo $obj_gsx_p->{'purchaseCountry'};?>" name="txt_gsxPurchaseCountry_h"/>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Sin Cobertura desde hace:*</label>
															<div class="col-md-8">
																<input id="txt_fkiUserPRofile_h" class="form-control required" name="txt_fkiUserPRofile_h" type="text">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Fecha de cobertura:*</label>
															<div class="col-md-8">
																<input id="txt_defaultFunction_h" class="form-control required" name="txt_defaultFunction_h" type="text">
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
									<h5>Nueva Orden de servicio</h5>
								</div>
								<div class="ibox-content">
									<form id="frm_SO_h" class="form-horizontal" action="<?php echo $url; ?>private/ServiceOrder"   method="POST" name="frm_SO_h">
										<fieldset>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label">Recolecci&oacute;n:*</label>
														<div class="col-md-8">
															<select id="slt_fkCollectMethod_h" class="form-control m-b" name="slt_fkCollectMethod_h">
																<option value="-1">Seleccionar ...</option>
																<?php foreach ($ds_cm as $datarow) {?>
																<option value="<?php echo $datarow['pkCollectMethod'] ?>" selected="selected"><?php echo $datarow['collectMethodName'] ?></option>
																<?php } ?>
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
														<div class="col-md-8">
															<div class="pull-right">
																<button type="button" id="btn_newAccessory_h" class="btn btn-primary btn-md btn-block" value="" name="btn_newAccessory_h">Nuevo Accesorio</button>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-1 control-label">&nbsp;</label>
														<div class="col-md-11">
															<!--table class="table table-striped table-bordered table-hover">
																<tr>
																	<th>Descripci&oacute;n</th>
																	<th>Marca</th>
																	<th>Modelo</th>
																	<th>No. Parte</th>
																	<th>No. Serie</th>
																</tr>
																<tbody>
																<tr>
																	<td>Descripci&oacute;n</td>
																	<td>Marca</td>
																	<td>Modelo</td>
																	<td>No. Parte</td>
																	<td>No. Serie</td>
																</tr>
																<tr>
																	<td>Descripci&oacute;n</td>
																	<td>Marca</td>
																	<td>Modelo</td>
																	<td>No. Parte</td>
																	<td>No. Serie</td>
																</tr>
																<tr>
																	<td>Descripci&oacute;n</td>
																	<td>Marca</td>
																	<td>Modelo</td>
																	<td>No. Parte</td>
																	<td>No. Serie</td>
																</tr>
																</tbody>
															</table-->
															<div class="jqGrid_wrapper">
																<table id="table_list_accessory"></table>
																<div id="pager_list_accessory"></div>
															</div>
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
													<div class="col-md-4 pull-right">
															<div class="form-group">
																<button type="submit" id="btn_command_h" class="btn btn-primary btn-md btn-block" value="AddSO" name="btn_command_h">Guardar</button>
																<input type="hidden" id="hdn_devices_h" class="" value="" name="hdn_devices_h"/>
															</div>
													</div>
												</div>
											</div>
										</fieldset>
									</form>
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
					<strong>Copyright</strong> Example Company © 2014-2015
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
    <script type="text/javascript">
		$.validator.setDefaults({
		/*submitHandler: function() {
			alert("submitted!");
		}*/
		debug:true,
		success:"valid"
	});
        $(document).ready(function(){
			var frm_accessory_j = 	"<div style='margin-left:15px;'>";
			frm_accessory_j 	+=	"<div> Descripci&oacute:<sup>*</sup>:</div><div> {desc} </div>";
			frm_accessory_j 	+= 	"<div> Marca: </div><div>{brand} </div>";
			frm_accessory_j 	+= 	"<div> Modelo: </div><div>{model} </div>";
			frm_accessory_j 	+= 	"<div> N&uacute;mero de parte: </div><div>{PN} </div>";
			frm_accessory_j 	+= 	"<div> N&uacute;mero de serie: </div><div> {SN} </div>";
			frm_accessory_j 	+= 	"<hr style='width:100%;'/>";
			frm_accessory_j 	+= 	"<div> {sData} {cData}  </div></div>";
						
			var lastSel,mydata =new Object();
			var accesories="";//new Array();
				/*{id:"1", desc: "Cargador", 	brand: "Apple", model: "X-1", 	PN: "note", SN: "10.00"},
                {id:"2", desc: "Cargador", 	brand: "Apple", model: "X-1", 	PN: "note", SN: "10.00"},
                {id:"3", desc: "Funda", 	brand: "", 		model: "", 		PN: "", SN: ""}, 
                {id:"4", desc: "Funda", 	brand: "", 		model: "", 		PN: "", SN: ""} 
            ];*/
			
			var grid=$("#table_list_accessory");
			
			
			
			var onclickSubmitLocal = function(options,postdata) {
				var grid_p = grid[0].p,
					idname = grid_p.prmNames.id,
					grid_id = grid[0].id,
					id_in_postdata = grid_id + "_id",
					rowid = postdata[id_in_postdata],
					addMode = rowid === "_empty",
					//addMode=oper,
					oldValueOfSortColumn;
				// postdata has row id property with another name. we fix it:
				if (addMode) {
					// generate new id
					var new_id = grid_p.records + 1;
					while ($("#"+new_id).length !== 0) {
						new_id++;
					}
					postdata[idname] = String(new_id);
				} else if (typeof(postdata[idname]) === "undefined") {
					// set id property only if the property not exist
					postdata[idname] = rowid;
				}
				
				delete postdata[id_in_postdata];
				
				// prepare postdata for tree grid
				if(grid_p.treeGrid === true) {
					if(addMode) {
						var tr_par_id = grid_p.treeGridModel === 'adjacency' ? grid_p.treeReader.parent_id_field : 'parent_id';
						postdata[tr_par_id] = grid_p.selrow;
					}
					$.each(grid_p.treeReader, function (i){
						if(postdata.hasOwnProperty(this)) {
							delete postdata[this];
						}
					});
				}
				// decode data if there encoded with autoencode
				if(grid_p.autoencode) {
					$.each(postdata,function(n,v){
						postdata[n] = $.jgrid.htmlDecode(v); // TODO: some columns could be skipped
					});
				}
				// save old value from the sorted column
				oldValueOfSortColumn = grid_p.sortname === "" ? undefined: grid.jqGrid('getCell',rowid,grid_p.sortname);
				// save the data in the grid
				if (grid_p.treeGrid === true) {
					if (addMode) {
						grid.jqGrid("addChildNode",rowid,grid_p.selrow,postdata);
					} else {
						grid.jqGrid("setTreeRow",rowid,postdata);
					}
				} else {
					if (addMode) {
					grid.jqGrid("addRowData",rowid,postdata,options.addedrow);

					} else {
						grid.jqGrid("setRowData",rowid,postdata);
					}
				}
				if ((addMode && options.closeAfterAdd) || (!addMode && options.closeAfterEdit)) {
					// close the edit/add dialog
					$.jgrid.hideModal("#editmod" + grid_id,
					{gb:"#gbox_"+grid_id,jqm:options.jqModal,onClose:options.onClose});
				}
				if (postdata[grid_p.sortname] !== oldValueOfSortColumn) {
					// if the data are changed in the column by which are currently sorted
					// we need resort the grid
					setTimeout(function() {
						grid.trigger("reloadGrid", [{current:true}]);
					},100);
				}
				// !!! the most important step: skip ajax request to the server
				this.processing = true;
				return {};
			},
			editSettings = {
				recreateForm:true,
				jqModal:true,
				reloadAfterSubmit:false,
				closeOnEscape:true,
				closeAfterEdit:true,
				onclickSubmit:onclickSubmitLocal
			},
			addSettings = {
				recreateForm:true,
				jqModal:true,
				reloadAfterSubmit:true,
				closeOnEscape:true,
				closeAfterAdd:true,
				template: frm_accessory_j,
				errorTextFormat: function (data) {
					return 'Error: ' + data.responseText
				},
				onclickSubmit:onclickSubmitLocal
			},
			delSettings = {
				// because I use "local" data I don't want to send the changes to the server
				// so I use "processing:true" setting and delete the row manually in onclickSubmit
				onclickSubmit: function(options, rowid) {
					var grid_id = grid[0].id,
						grid_p = grid[0].p,
						newPage = grid[0].p.page;
					// delete the row
					grid.delRowData(rowid);
					$.jgrid.hideModal("#delmod"+grid_id,
										{gb:"#gbox_"+grid_id,jqm:options.jqModal,onClose:options.onClose});
					if (grid_p.lastpage > 1) {// on the multipage grid reload the grid
						if (grid_p.reccount === 0 && newPage === grid_p.lastpage) {
							// if after deliting there are no rows on the current page
							// which is the last page of the grid
							newPage--; // go to the previous page
						}
						// reload grid to make the row from the next page visable.
						grid.trigger("reloadGrid", [{page:newPage}]);
					}
					return true;
				},
				processing:true
			},
			initDateEdit = function(elem) {
				setTimeout(function() {
					$(elem).datepicker({
						dateFormat: 'dd-M-yy',
						autoSize: true,
						showOn: 'button', // it dosn't work in searching dialog
						changeYear: true,
						changeMonth: true,
						showButtonPanel: true,
						showWeek: true
					});
					//$(elem).focus();
				},100);
			},
			initDateSearch = function(elem) {
				setTimeout(function() {
					$(elem).datepicker({
						dateFormat: 'dd-M-yy',
						autoSize: true,
						//showOn: 'button', // it dosn't work in searching dialog
						changeYear: true,
						changeMonth: true,
						showButtonPanel: true,
						showWeek: true
					});
					//$(elem).focus();
				},100);
			};
            
			$('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
			 });
			$("#btn_newAccessory_h").on('click',function(){
				$("#table_list_accessory").jqGrid("editGridRow","new",addSettings);
			});
			grid.jqGrid({
				datatype: "local",
				data: mydata,
				colNames:['Descripci&oacute;n','Marca', 'Modelo', 'No. Parte','No. Serie','Acci&oacute;n'],
                colModel:[
                    //{name:'id',		index:'id', 	editable: true, width:60, sorttype:"int",search:false},
                    {name:'desc',	index:'desc',	editable: true, width:100},
                    {name:'brand',	index:'brand', 	editable: true, width:80,align:"right"},
                    {name:'model',	index:'model', 	editable: true, width:80, align:"right"},
                    {name:'PN',		index:'PN', 	editable: true, width:80, align:"right"},
                    {name:'SN',		index:'SN', 	editable: true, width:80, align:"right"},
					{name:'action',	index:'action',	sortable:false, formatter: displayButtons}
                ],
				rowNum: 10,
				rowList: [5, 10],
				//pager: "#pager_list_accessory",
				gridview:true,
				autoencode:true,
				ignoreCase:true,
				sortname: 'id',
				viewrecords: true,
				sortorder:'desc',
				caption: "Accesorios",
				editurl:'<?php echo $url; ?>/private/ServiceOrder/addSO',
				autowidth: true,
                shrinkToFit: true,
				ondblClickRow: function(rowid, ri, ci) {
					var p = grid[0].p;
					if (p.selrow !== rowid) {
						// prevent the row from be unselected on double-click
						// the implementation is for "multiselect:false" which we use,
						// but one can easy modify the code for "multiselect:true"
						grid.jqGrid('setSelection', rowid);
					}
					grid.jqGrid('editGridRow', rowid, editSettings);
				},
				onSelectRow: function(id) {
					if (id && id !== lastSel) {
						// cancel editing of the previous selected row if it was in editing state.
						// jqGrid hold intern savedRow array inside of jqGrid object,
						// so it is safe to call restoreRow method with any id parameter
						// if jqGrid not in editing state
						if (typeof lastSel !== "undefined") {
							grid.jqGrid('restoreRow',lastSel);
						}
						lastSel = id;
					}
				}
                /*add: true,
                edit: true,
                addtext: 'Add',
                edittext: 'Edit',
                hidegrid: false,*/			
			});
			// Add responsive to jqGrid
            
			
			$(window).bind('resize', function () {
                var width = $('.jqGrid_wrapper').width();
                $('#table_list_accessory').setGridWidth(width);
            });
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
								maxlength:10
						    },
							txt_contactMovil_h:{
								required:true,
								number:true,
								minlength:10,
								maxlength:10
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
		$("#hdn_devices_h").attr("value",function(){
				mydata={};
				var idToDataIndex = grid.getGridParam("records");
				for(i = 1;i <= idToDataIndex; i++ ){
					var rowId 	= grid.getRowData(i);
					mydata.id	= rowId['id'];
					mydata.desc = rowId['desc'];
					mydata.brand= rowId['brand'];
					mydata.model= rowId['model'];
					mydata.PN	= rowId['PN'];
					mydata.SN	= rowId['SN'];
				}
				return ObjJ2ObjP(mydata);
			}				
			);
		});	
	function displayButtons(cellvalue, options, rowObject){
        var edit= "<input class='btn btn-primary btn-xs btn-block' type='button' value='Editar' onclick=\"jQuery('#table_list_accessory').editRow('" + options.rowId + "');\"  />", 
            save = "<input class='btn btn-primary btn-xs btn-block' type='button' value='Guardar' onclick=\"jQuery('#table_list_accessory').saveRow('" + options.rowId + "');\"  />", 
            delite = "<input class='btn btn-primary btn-xs btn-block' type='button' value='Eliminar' onclick=\"jQuery('#table_list_accessory').restoreRow('" + options.rowId + "');\" />";
        return edit+save+delite;
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