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
    <style>
        .wizard > .content > .body  position: relative; }
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
						<h2>Cuenta maestra</h2>
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
																<input id="txt_userName_h" class="form-control required" name="txt_userName_h" type="text">
																<input id="" name="hdn_toDo_h" class="" value="AddUser" type="hidden">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Modelo:*</label>
															<div class="col-lg-8">
																<input id="txt_realName_h" class="form-control required" name="txt_realName_h" type="text">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Configuraci&oacute;n:*</label>
															<div class="col-md-8">
																<input id="txt_email_h" class="form-control required" name="txt_email_h" type="text">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Estado de la cobertura:*</label>
															<div class="col-md-8">
																<input id="txt_email_h" class="form-control required" name="txt_email_h" type="text">
															</div>
														</div>
													</div>
													<div class="col-md-6 form-group-dark">
														<div class="form-group">&nbsp;</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Fecha de compra:*</label>
															<div class="col-md-8">
																<input id="txt_password_h" class="form-control required" name="txt_password_h" type="text">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Comprado en:*</label>
															<div class="col-md-8">
																<input id="txt_password_h" class="form-control required" name="txt_password_h" type="text">
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
									<form id="form" class="wizard-big form-horizontal" action="<?php echo $url; ?>private/ServiceOrder"   method="POST" name="frm_SO">
										<fieldset>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label">Recolecci&oacute;n:*</label>
														<div class="col-md-8">
															<select id="" class="form-control m-b" name="slt_pkCompany_h">
																<option value="-1">Seleccionar ...</option>
																<?php //foreach ($drows_Company as $companyOption) {?>
																<option value="<?php //echo $companyOption['pkCompany'] ?>"><?php //echo $companyOption['commercialName'] ?></option>
																<?php //} ?>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-4 control-label">Fecha de entrada:</label>
														<div class="col-md-8">
															<input type="text" id="" class="form-control" value="" name="dpi_ibSOrderDateIn_h"/>
														</div>
													</div>
													<div class="form-group">
														<label class="col-lg-4 control-label">Estado del equipo:</label>
														<div class="col-lg-8">
															<textarea id="tta_ibSOrderDesc_h" class="form-control required" data-provide="markdown" rows="5" name="tta_ibSOrderDesc_h"></textarea>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-4 control-label">Accesorios:</label><br/>
														<div class="col-md-8">
															<table class="table table-striped table-bordered table-hover">
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
															</table>
														</div>
													</div>
													<div class="form-group">
														<label class="col-lg-4 control-label">Detalle T&eacute;cnico:</label>
														<div class="col-lg-8">
															<textarea id="tta_ibSOrderObs_h" class="form-control required" data-provide="markdown" rows="5" name="tta_ibSOrderObs_h"></textarea>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-lg-4 control-label">Tel&eacute;fono:</label>
														<div class="input-group col-lg-7">
															<input type="text" id="" class="form-control" value="" name="dpi_ibSOrderDateIn_h"/>
															<span class="input-group-addon"><i class="fa fa-search"></i></span>
														</div>
													</div>
													<div class="form-group">
														<label class="col-lg-4 control-label">M&oacute;vil:</label>
														<div class="input-group col-lg-7">
															<input type="text" id="" class="form-control" value="" name="dpi_ibSOrderDateIn_h"/>
															<span class="input-group-addon"><i class="fa fa-search"></i></span>
														</div>
													</div>
													<div class="form-group">
														<label class="col-lg-4 control-label">Contacto:</label>
														<div class="input-group col-lg-7">
															<input type="text" id="" class="form-control" value="" name="dpi_ibSOrderDateIn_h"/>
															<span class="input-group-addon"><i class="fa fa-search"></i></span>
														</div>
													</div>
													<div class="form-group" id="data_1">
														<label class="col-lg-4 control-label">Correo electr&oacute;nico:</label>
														<div class="input-group col-lg-7">
															<input type="text" id="" class="form-control" value="" name="dpi_ibSOrderDateIn_h"/>
															<span class="input-group-addon"><i class="fa fa-search"></i></span>
														</div>
													</div>
													<div class="form-group">
														<label class="col-lg-4 control-label">Direcci&oacute;n:*</label>
														<div class="col-lg-8">
															<input id="txt_ibSOrderName_h" class="form-control required" name="txt_ibSOrderName_h" type="text">
														</div>
													</div>
													<div class="form-group">
														<label class="col-lg-4 control-label">Colonia:*</label>
														<div class="col-lg-8">
															<input id="txt_ibSOrderName_h" class="form-control required" name="txt_ibSOrderName_h" type="text">
														</div>
													</div>
													<div class="form-group">
														<label class="col-lg-4 control-label">Delegaci&oacute;n o municipio:*</label>
														<div class="col-lg-8">
															<input id="txt_ibSOrderName_h" class="form-control required" name="txt_ibSOrderName_h" type="text">
														</div>
													</div>
													<div class="form-group">
														<label class="col-lg-4 control-label">C.P.:*</label>
														<div class="col-lg-8">
															<input id="txt_ibSOrderName_h" class="form-control required" name="txt_ibSOrderName_h" type="text">
														</div>
													</div>
													<div class="form-group">
														<label class="col-lg-4 control-label">Province:*</label>
														<div class="col-lg-8">
															<input id="txt_ibSOrderName_h" class="form-control required" name="txt_ibSOrderName_h" type="text">
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

    <script>
        $(document).ready(function(){
            $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
			  });
			$("#formCompany").validate({
				errorPlacement: function (error, element)
                        {
                            element.before(error);
                        },
                        rules: {
                            confirm: {
                                equalTo: "#password"
                            }
                        }
			});
			//$("#wizard").steps();
            /*$("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            }).validate({
                        errorPlacement: function (error, element)
                        {
                            element.before(error);
                        },
                        rules: {
                            confirm: {
                                equalTo: "#password"
                            }
                        }
                    });
			*/
		});
    </script>




</body>

</html>