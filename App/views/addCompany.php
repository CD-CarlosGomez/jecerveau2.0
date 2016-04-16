<?php
#16.3.26 mensaje modal de confirmación de movimiento CRUD
namespace App\View;
defined("APPPATH") OR die("Access denied");

use \Core\View;
use \Core\Controller;

		if (strlen(session_id()) < 1){session_start();}
		$_SESSION["nombreUsuario"];
		$_SESSION['pkiBUser_p'];
		if (isset($_SESSION['loggedin']) & $_SESSION['loggedin'] == true){}
		else{
				echo "Esta pagina es solo para usuarios registrados.<br>";
			echo "<a href='" . Globales::$absoluteURL. "'>Login Here!</a>";
			exit;
		}
		$now = time(); 
		if($now > $_SESSION['expire']){
		session_destroy();
		echo "Su sesion a terminado, <a href='" . Globales::$absoluteURL . "'>
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
		<link href="<?php echo $url; ?>/App/web/css/animate.css" rel="stylesheet">
		<link href="<?php echo $url; ?>App/web/css/style.css" rel="stylesheet">
		<!-- iCheck CSS -->
		<link href="<?php echo $url; ?>App/web/css/plugins/iCheck/custom.css" rel="stylesheet">
		<!-- steps CSS -->
		<link href="<?php echo $url; ?>App/web/css/plugins/steps/jquery.steps.css" rel="stylesheet">
		<!-- Mainly scripts -->
		
		<!-- Mainly scripts -->
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
                    <h2>Cuenta maestra</h2>
                    <ol class="breadcrumb">
						<li>
							<a href="<?php echo $url; ?>private/home">Inicio</a>
						</li>
						<li>
							<a href="<?php echo $url; ?>private/EnterpriseGroup/ShowCompany">Cuenta maestra</a>
						</li>
						<li class="active">
							<strong>Nueva Cuenta maestra</strong>
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
									<h5>Nueva cuenta maestra </h5>
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
										<form id="frm_company_h" class="form-horizontal" action="<?php echo $url; ?>private/EnterpriseGroup" method="POST">
											<div class="col-md-6">
												<div class="form-group">&nbsp;</div>
												<div class="form-group">
													<label class="col-md-4 control-label">Nombre legal:*</label>
													<div class="col-md-8">
														<input id="txt_userName_h" class="form-control required" name="txt_legalName_h" type="text">
													</div>
												</div>
												
											</div>
											<div class="col-md-6">
												<div class="form-group">&nbsp;</div>
												<div class="form-group">
													<label class="col-md-4 control-label">Nombre comercial:*</label>
													<div class="col-md-8">
														<input id="txt_realName_h" class="form-control required" name="txt_commercialName_h" type="text">
													</div>
												</div>													
											</div>
													<div class="form-group">&nbsp;</div>
													<div class="col-md-4 pull-right">
														<div class="form-group">
															<button type="" id="btn_command_h" class="btn btn-primary btn-md btn-block" value="AddCompany" name="btn_command_h">Guardar</button>
														</div>
													</div>
											</form>
										</fieldset>
									
								</div>
							</div>
                        </div>
                    </div>
					<!--div class="row" id="nuevaSubcuenta">
						<div class="col-lg-12">
							<div class="ibox float-e-margins">
								<div class="ibox-title">
									<h5>Nueva Subcuenta </h5>
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
								<div class="ibox-content">
									<fieldset>
										<form id="frm_subcompany_h" class="form-horizontal" action="<?php echo $url; ?>private/EnterpriseGroup" method="POST" class="">
											<div class="col-lg-6 form-group-dark">
												<div class="form-group">&nbsp;</div>
												<div class="form-group">
													<label class="col-md-4 control-label">Subcuenta maestra:*</label>
													<div class="col-lg-8">
														<input id="txt_userName_h" class="form-control required" name="txt_legalName_h" type="text">
														<input id="" name="hdn_toDo_h" class="" value="AddUser" type="hidden">
													</div>
												</div>
												
											</div>
											<div class="col-md-6 form-group-dark">
												<div class="form-group">&nbsp;</div>
												<div class="form-group">
													<label class="col-md-4 control-label">&nbsp;</label>
													<div class="col-lg-8">
														&nbsp;
													</div>
												</div>													
											</div>
												<div class="form-group">&nbsp;</div>
											<div class="col-md-4 pull-right">
												<div class="form-group">
													<button type="" id="btn_addBO_h" class="btn btn-primary btn-md btn-block" onclick="validateSubcompanyIfIsShowed()" value="" name="btn_AddBO_h">Guardar</button>
												</div>
											</div>
										</form>
									</fieldset>
								</div>
							</div>
                        </div>
					</div-->
					<!--div class="row" id="nuevaSucursal">
						<div class="col-lg-12">
							<div class="ibox float-e-margins">
								<div class="ibox-title">
									<h5>Nueva Sucursal </h5>
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
								<div class="ibox-content">
									<fieldset>
											<form id="frm_BO_h" class="form-horizontal" action="<?php echo $url; ?>private/EnterpriseGroup" method="POST" class="">
												<div class="col-lg-6 form-group-dark">
													<div class="form-group">&nbsp;</div>
													<!--div class="form-group">
														<label class="col-md-4 control-label">Cuenta maestra:*</label>
														<div class="col-lg-8">
															<select id="" class="form-control m-b" name="slt_pkSubCompany_h">
																<option value="-1">Selecciona una cuenta maestra ...</option>
															<?php //foreach ($drows_Company as $companyOption) {?>
																	<option value="<?php //echo $companyOption['pkSubCompany'] ?>"><?php //echo $companyOption['subCompanyName'] ?></option>
															<?php //} ?>
															</select>
														</div>
													</div-->
													<!--div class="form-group">
															<label class="col-md-4 control-label">Sucursal:*</label>
															<div class="col-lg-8">
																<input id="txt_BOName_h" class="form-control required" name="txt_BOName_h" type="text">
															</div>
														</div>
													<div class="form-group">
														<label class="col-md-4 control-label">Direcci&oacute;n:*</label>
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
														<label class="col-md-4 control-label">Service Address</label>
														<div class="col-md-8">
															<input id="txt_serviceAddress_h" class="form-control required" name="txt_serviceAddress_h" type="text">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-4 control-label">Service Manager</label>
														<div class="col-md-8">
															<input id="txt_serviceManager_h" class="form-control required" name="txt_serviceManager_h" type="text">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-4 control-label">Service Email</label>
														<div class="col-md-8">
															<input id="txt_serviceEmail_h" class="form-control required" name="txt_serviceEmail_h" type="text">
														</div>
													</div>
												</div>
												<div class="col-md-6 form-group-dark">
														<div class="form-group">&nbsp;</div>
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
															<label class="col-md-4 control-label">Provincia:*</label>
															<div class="col-md-8">
																<input  id="txt_BOProvince_h" class="form-control required" name="txt_BOProvince_h" type="text">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Zip Code:*</label>
															<div class="col-md-8">
																<input  id="txt_BOZipCode_h" class="form-control required" name="txt_BOZipCode_h" type="text">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Horario de atenci&oacute;n</label>
															<div class="col-md-8">
																<input id="txt_officeHour_h" class="form-control required" name="txt_officeHour_h" type="text">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Service Phone</label>
															<div class="col-md-8">
																<input id="txt_servicePhone_h" class="form-control required" name="txt_servicePhone_h" type="text">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">&nbsp;</label>
															<div class="col-md-8">
																&nbsp;
															</div>
														</div>
												</div>
												<div class="form-group">&nbsp;</div>
												<div class="col-md-4 pull-right">
													<div class="form-group">
														<button type="" id="" class="btn btn-primary btn-md btn-block" value="AddBO" onclick="validateBOIfIsShowed()" name="btn_command_h">Guardar</button>
														</div>
												</div>
											</form>
										</fieldset>
								</div>
							</div>
                        </div>
					</div-->
				</div>
			</div>
			<div class="footer">
				<div>
					<strong>Copyright</strong> Example Company &copy; 2014-2015
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
	<!-- Jquery Validate -->
    <script src="<?php echo $url; ?>App/web/js/plugins/validate/jquery.validate.min.js"></script>
	<script>
	$(document).ready(
		function(){
			$("#frm_company_h").validate();	
    });
	</script>
</body>

</html>
