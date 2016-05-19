<?php
#16.3.26 mensaje modal de confirmación de movimiento CRUD
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
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>iBrain2.0</title>
		
	<!-- Mainly CSS -->
	<link href="<?php echo $url; ?>App/web/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $url; ?>App/web/font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="<?php echo $url; ?>App/web/css/animate.css" rel="stylesheet">
    <link href="<?php echo $url; ?>App/web/css/style.css" rel="stylesheet">
	<!-- iCheck CSS -->
	<link href="<?php echo $url; ?>App/web/css/plugins/iCheck/custom.css" rel="stylesheet">
	<!-- steps CSS -->
	<link href="<?php echo $url; ?>App/web/css/plugins/steps/jquery.steps.css" rel="stylesheet">
	<!-- Select2 -->
	<link href="<?php echo $url; ?>App/web/css/plugins/select2/select2.min.css" rel="stylesheet">

</head>
<body class="top-navigation">
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
			<div class="row border-bottom white-bg">
				<nav class="navbar navbar-static-top  " role="navigation">
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
                    <h2>AASPs</h2>
                    <ol class="breadcrumb">
                        <li>
							<a href="<?php echo $url; ?>private/home">Inicio</a>
						</li>
						<li>
							<a href="<?php echo $url; ?>private/EnterpriseGroup/ShowCompany">Cuenta maestra</a>
						</li>
						<li class="active">
							<a href="<?php echo $url; ?>private/EnterpriseGroup/showSubcompany">Subcompa&ntilde;&iacute;as</a>
						</li>
						<li>
							<a href="<?php echo $url; ?>private/EnterpriseGroup/showBranchOffice">AASP</a>
						</li>
						<li class="active">
							<strong>Nuevo AASP</strong>
						</li>
                    </ol>
                </div>
            </div>
            <div class="wrapper wrapper-content">
				<div class="container">
                    <div class="row">
						<div class="col-lg-12">
							<div class="ibox float-e-margins">
								<div class="ibox-title">
									<h5>Nueva sucursal </h5>
								</div>
								<div class="ibox-content" >
									<fieldset>
											<form id="frm_BO_h" class="form-horizontal" action="<?php echo $url; ?>private/EnterpriseGroup" method="POST">
												<div class="col-lg-6">
													<fieldset class="form-group grouper"><leyend class="grouper"><h3>Datos de facturaci&oacute;n</h3></leyend>
													<hr>
													<div class="form-group">
															<label class="col-md-4 control-label">Sucursal:*</label>
															<div class="col-lg-8">
																<input id="txt_BOName_h" class="form-control required" name="txt_BOName_h" type="text">
															</div>
														</div>
													<div class="form-group">
														<label class="col-md-4 control-label">Calle:*</label>
														<div class="col-md-8">
															<input id="txt_BOStreet_h" class="form-control required" name="txt_BOStreet_h" type="text">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-4 control-label">N&uacute;mero exterior:*</label>
														<div class="col-md-8">
															<input id="txt_BOExtNumber_h" class="form-control required" name="txt_BOExtNumber_h" type="text">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-4 control-label">N&uacute;mero interior:*</label>
														<div class="col-md-8">
															<input id="txt_BOIntNumber_h" class="form-control required" name="txt_BOIntNumber_h" type="text">
														</div>
													</div>
													<div class="form-group">
															<label class="col-md-4 control-label">C&oacute;digo postal:*</label>
															<div class="col-md-8">
																<input  id="txt_BOZipCode_h" class="form-control required" name="txt_BOZipCode_h" type="text">
															</div>
													</div>
													<div class="form-group">
															<label class="col-md-4 control-label">Estado:*</label>
															<div class="col-md-8">
																<input  id="txt_BOProvince_h" class="form-control required" name="txt_BOProvince_h" type="text">
															</div>
													</div>
													<div class="form-group">
														<label class="col-md-4 control-label">Regi&oacute;n:*</label>
														<div class="col-md-8">
															<input id="txt_BORegion_h" class="form-control required" name="txt_BORegion_h" type="text">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-4 control-label">Zona:*</label>
															<div class="col-md-8">
																<input id="txt_BOZone_h" class="form-control required" name="txt_BOZone_h" type="text">
															</div>
													</div>
													<div class="form-group">
														<label class="col-md-4 control-label">Pa&iacute;s:*</label>
															<div class="col-md-8">
																<select id="slt_pkCountry_h" class="selectSearch required" style="width:310px;" name="slt_pkCountry_h">
																	<option></option>
																</select>
															</div>
													</div>
													</fieldset>
												</div>
												<div class="col-md-6">
													<fieldset class="form-group grouper"><leyend class="grouper"><h3>Datos de atenci&oacute;n</h3></leyend>
														<hr>
														<div class="form-group">
															<label class="col-md-4 control-label">Gerente:</label>
															<div class="col-md-8">
																<input id="txt_serviceManager_h" class="form-control required" name="txt_serviceManager_h" type="text">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Direcci&oacute;n de atenci&oacute;n</label>
															<div class="col-md-8">
																<input id="txt_serviceAddress_h" class="form-control required" name="txt_serviceAddress_h" type="text">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Tel&eacute;lefono de atenci&oacute;n:</label>
															<div class="col-md-8">
																<input id="txt_servicePhone_h" class="form-control required" name="txt_servicePhone_h" type="text">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Correo electr&oacute;nico de atenci&oacute;n:</label>
															<div class="col-md-8">
																<input id="txt_serviceEmail_h" class="form-control required" name="txt_serviceEmail_h" type="text">
															</div>
														</div>													
														<div class="form-group">
															<label class="col-md-4 control-label">Horario de atenci&oacute;n:</label>
															<div class="col-md-8">
																<input id="txt_officeHour_h" class="form-control required" name="txt_officeHour_h" type="text">
															</div>
														</div>
													</fieldset>
													<fieldset class="form-group grouper"><leyend class="grouper"><h3>Datos de configuraci&oacute;n</h3></leyend>
														<hr>
														<div class="form-group">
															<label class="col-md-4 control-label">SoldTo:</label>
															<div class="col-md-8">
																<input type="text" id="txt_soldTo_h" class="form-control required" name="txt_soldTo_h">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">ShipTo:</label>
															<div class="col-md-8">
																<input type="text" id="txt_shipTo_h" class="form-control required" name="txt_shipTo_h">
															</div>
														</div>
													</fieldset>	
													<div class="form-group">
														<div class="col-md-4 pull-right">
														<div class="form-group">
															<button type="" id="btn_command_h" class="btn btn-primary btn-md btn-block" value="AddAll" name="btn_command_h">Guardar</button>
														</div>
														</div>
													</div>
												</div>
											</form>
										</fieldset>								
								</div>
							</div>
                        </div>
                    </div>
				</div>
			</div>
			<div class="footer">
				<div>
					<strong>IBrain &#174; 2.0 </strong>
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
	 <!-- Select2 -->
    <script src="<?php echo $url; ?>App/web/js/plugins/select2/select2.full.min.js"></script>
	<script>
	$(document).ready(function(){
	//cargamos los usuarios en el select2
		$(".selectSearch").select2({	
			placeholder: "Selecciona un pa&iacute;s a...",
			allowClear: true
		});
	//Validamos el formulario
		$("#frm_BO_h").validate(
			{
				rules: {
					slt_fkSubCompany_h: {
					  required: true,
					  min: 0
					}
				},
				messages:{
				slt_fkSubCompany_h:"Por favor, Tienes que seleccionar una subcompa&ntilde;&iacute;a."
				}
			}
		);	
	});
	</script>

</body>

</html>
