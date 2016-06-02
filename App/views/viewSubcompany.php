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
			echo "<a href='" . $url . "'>Login Here!</a>";
			exit;
		}
		$now = time(); 
		if($now > $_SESSION['expire']){
		session_destroy();
		echo "Su sesion a terminado, <a href='" . $url . "'>
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
		<link href="<?php echo $url; ?>App/web/font-awesome/css/font-awesome.css" rel="stylesheet">		<link href="http://localhost:8012/iBrain2.0/App/web/css/animate.css" rel="stylesheet">
		<link href="<?php echo $url; ?>App/web/css/style.css" rel="stylesheet">
		<!-- iCheck CSS -->
		<link href="<?php echo $url; ?>App/web/css/plugins/iCheck/custom.css" rel="stylesheet">
		<!-- steps CSS -->
		<link href="<?php echo $url; ?>App/web/css/plugins/steps/jquery.steps.css" rel="stylesheet">
		<!-- Select 2 CSS -->
		<link href="<?php echo $url; ?>App/web/css/plugins/select2/select2.min.css" rel="stylesheet">
		<!-- Sweet Alert -->
		<link href="<?php echo $url; ?>App/web/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
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
								<a href="<?php echo $url; ?>private/logout">Salir</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-8">
                    <h2>Subcuenta maestra</h2>
                    <ol class="breadcrumb">
						<li>
							<a href="<?php echo $url; ?>private/home">Inicio</a>
						</li>
						<li>
							<a href="<?php echo $url; ?>private/EnterpriseGroup/ShowCompany">Cuenta maestra</a>
						</li>
						<li>
							<a href="<?php echo $url; ?>private/EnterpriseGroup/ShowSubcompany">Subcuenta maestra</a>
						</li>
						<li class="active">
							<strong>Nueva Subcuenta maestra</strong>
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
									<h5>Nueva Subcuenta maestra </h5>
								</div>
								<div class="ibox-content" >
									<fieldset>
										<form id="frm_subCompany_h" class="form-horizontal" action="<?php echo $url; ?>private/EnterpriseGroup/cmdUpdateSubcompany" method="POST">
											<input type="hidden" id="" value="<?php echo $pkSC; ?>" name="hdn_pkSC_h">
											<div class="col-lg-6">
												<div class="form-group">&nbsp;</div>
												<div class="form-group">
														<label class="col-md-4 control-label">Cuenta maestra:*</label>
														<div class="col-lg-8">
															<select id="slt_fkCompany_h" class="form-control m-b" name="slt_fkCompany_h">
																<option value="-1">Selecciona una cuenta maestra ...</option>
															<?php 
																foreach($dt_subCompany as $dr_sc){ $pkSC = $dr_sc['company_pkCompany'];}
															foreach ($drows_Company as $companyOption) {
																if($pkSC == $companyOption['pkCompany']){
															?>
																<option value="<?php echo $companyOption['pkCompany'] ?>" selected="selected"><?php echo $companyOption['legalName'] ?></option>
															<?php }
																else{
															?>
																	<option value="<?php echo $companyOption['pkCompany'] ?>"><?php echo $companyOption['legalName'] ?></option>
															<?php }
															} ?>
															</select>
														</div>
												</div>												
											</div>
											<div class="col-md-6">
												<div class="form-group">&nbsp;</div>
												<div class="form-group">
													<label class="col-md-4 control-label">Subcuenta maestra:*</label>
													<div class="col-lg-8">
														<input id="txt_subCompanyName_h" class="form-control required" value="<?php foreach($dt_subCompany as $dr_sc){echo $dr_sc['subCompanyName'];}?>"name="txt_subCompanyName_h" type="text">
													</div>
												</div>
										    <div class="form-group">&nbsp;</div>
											<div class="col-md-4 pull-right">
												<div class="form-group">
													<button type="submit" id="btn_command_h" class="btn btn-primary btn-md btn-block" value="editSubCompany" name="btn_command_h">Guardar</button>
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
					<strong>IBrain&#174; 2.0</strong>
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
	<!-- jquery forms -->
    <script src="<?php echo $url; ?>App/web/js/jquery.form.js"></script>
	<!-- Sweet alert -->
    <script src="<?php echo $url; ?>App/web/js/plugins/sweetalert/sweetalert.min.js"></script>
	<script>
	$.validator.addMethod('regex', function (value,element) { 
    	return  this.optional(element)|| /^[A-Za-zñÑ0-9\-\s\.áéíóúÁÉÍÓÚ]*$/g.test(value); 
	}, 'Por favor, introduzca s&oacute;lo n&uacute;meros y letras.');
	
	$(document).ready(
		function(){
			$("#frm_subCompany_h").validate(
			{
				rules: {
					slt_fkCompany_h : {
					  required: true,
					  min: 0
					},
					txt_subCompanyName_h : {
						required : true						
					}
				},
				messages:{
					slt_fkCompany_h : "Por favor, selecciona una cuenta maestra.",
					txt_subCompanyName_h : "Por favor, introduce el nombre de una subcuenta."
				},
				submitHandler: function(form) {
					//form.submit();
					$(form).ajaxSubmit({
					dataType: 'JSON',
					type: 'POST',
					url: $(form).attr('action'),
					success: function (r) {
						// Mostrar mensaje
						swal("Guardado",r.message,"success");
						
						// Ejecutar funciones
						if (r.function != null) {
							setTimeout(r.function, 0);
						}
						// Redireccionar
						if (r.href != null) {
							if (r.href == 'self') window.location.reload(true);
							else redirect(r.href);
						}
					}
				});
				}
			}
			);	
    });
	</script>


</body>

</html>
