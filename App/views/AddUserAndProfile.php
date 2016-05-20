<?php
#Agregar los select de las llaves foráneas
#16.3.26 mensaje modal de confirmación de movimiento CRUD
#Agregar los validadores del lado del servidor
#Agregar estas clases a los botones de las tablas
#<button type="button" class="btn btn-primary btn-lg btn-block">Botón de bloque</button>
#<button type="button" class="btn btn-default btn-lg btn-block">Botón de bloque</button>
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
	<!-- CSS chosen -->
	<link href="<?php echo $url; ?>App/web/css/plugins/chosen/chosen.css" rel="stylesheet">
	<!-- CSS Select2 -->
	<link href="<?php echo $url; ?>App/web/css/plugins/select2/select2.min.css" rel="stylesheet">
	<!-- CSS Checkbox -->
	<link href="<?php echo $url; ?>App/web/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
	<style>
        .wizard > .content > .body  position: relative; }
    </style>

</head>
<body class="top-navigation">
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
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
							<a href="<?php echo $url; ?>private/logout">Log out</a>
						</li>
					</ul>
				</div>
			</nav>
			</div>
		<div class="row wrapper border-bottom white-bg page-heading">
			<div class="col-sm-4">
				<h2>Usuarios</h2>
				<ol class="breadcrumb">
					<li>
						<a href="<?php echo $url; ?>private/home">Inicio</a>
					</li>
					<li>
						<a href="<?php echo $url; ?>private/User">Usuarios</a>
					</li>
					<li class="active">
						<strong>Usuarios y permisos</strong>
					</li>
				</ol>
			</div>
		</div>	
        <div class="wrapper wrapper-content">
		<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Configuraci&oacute;n Inicial</h5>
                        </div>
                        <div class="ibox-content">
							<div id="Wzd_Customazing">
								<h3>Usuarios</h3>
								<section>
									<p>
										<fieldset>
												<form id="formUser" class="form-horizontal" action="<?php echo $url; ?>private/Company" method="POST" role="form">
													<div class="col-lg-10">
														<div class="form-group">
															<label class="col-lg-3 control-label">Usuario:*</label>
															<div class="col-lg-8">
																<input id="txt_userName_h" class="form-control required" name="txt_userName_h" type="text">
																<input id="" name="hdn_toDo_h" class="" value="AddUser" type="hidden">
															</div>
														</div>
														<div class="form-group">
															<label class="col-lg-3 control-label">Nombre completo:*</label>
															<div class="col-lg-8">
																<input id="txt_realName_h" class="form-control required" name="txt_realName_h" type="text">
															</div>
														</div>
														<div class="form-group">
															<label class="col-lg-3 control-label">E-mail:*</label>
															<div class="col-lg-8">
																<input id="txt_email_h" class="form-control required" name="txt_email_h" type="text">
															</div>
														</div>
														<div class="form-group">
															<label class="col-lg-3 control-label">Contrase&ntilde;a:*</label>
															<div class="col-lg-8">
																<input id="txt_password_h" class="form-control required" name="txt_password_h" type="text">
															</div>
														</div>
														<div class="form-group">
															<label class="col-lg-3 control-label">Perfil:*</label>
															<div class="col-lg-8">
																<input id="txt_fkiUserPRofile_h" class="form-control required" name="txt_fkiUserPRofile_h" type="text">
															</div>
														</div>
														<div class="form-group">
															<label class="col-lg-3 control-label">P&aacute;gina de inicio:*</label>
															<div class="col-lg-8">
																<input id="txt_defaultFunction_h" class="form-control required" name="txt_defaultFunction_h" type="text">
															</div>
														</div>
													</div>
													<div class="col-lg-2">
														<div class="form-group">
															<button type="submit" id="" class="btn btn-primary btn-lg btn-block" name="btn-AddBO">Agregar</button>
														</div>
													</div>
											</form>
										</fieldset>
									</p>
									<p>(*) Mandatory</p>
								</section>
								<h3>Perfiles</h3>
								<section>
									<p>
										<fieldset>
											<form id="Profiles"class="form-horizontal"  action="<?php echo $url; ?>private/Company" method="POST" class="">
												<div class="col-lg-10">
													<fieldset>
														<div class="form-group">
														<label class="col-lg-3 control-label">Usuario:*</label>
															<div class="col-lg-8">
															<select id="" class="form-control m-b" name="slt_pkCompany_h">
																<option value="-1">Selecciona un usuario ...</option>
																	<?php foreach ($drows_Company as $companyOption) {?>
																		<option value="<?php echo $companyOption['pkCompany'] ?>"><?php echo $companyOption['commercialName'] ?></option>
																	<?php } ?>
															</select>
															</div>
														</div>
														<div class="form-group">
															<label class="col-lg-3 control-label">Permiso a contenido:*</label>
																<div class="col-lg-8">
																	<select data-placeholder="Elige permisos a contenidos..." class="select2" multiple="multiple" style="width:100%;" tabindex="4" name="pkiFunctions[]">
                														<option value="0"></option>
                														<option value="1">Option 1</option>
																		<option value="2">Option 2</option>
																		<option value="3">Option 3</option>
																		<option value="4">Option 4</option>
																		<option value="5">Option 5</option>
																		<option value="6">Option 6</option>
																	</select>
																</div>
														</div>
														<div class="form-group">
															<div id="vertical-timeline" class="vertical-container light-timeline center-orientation">
																<div class="vertical-timeline-block">
																	<div class="vertical-timeline-icon navy-bg">
																		<i class="fa fa-truck"></i>
																	</div>
																	<div class="vertical-timeline-content">
																		<h2> <div class="i-checks"><label> <input type="checkbox" value="" name="permisosOperativos[]"> <i></i>Recolecci&oacute;n</label></div></h2>
																	</div>
																</div>
																<div class="vertical-timeline-block">
																	<div class="vertical-timeline-icon navy-bg">
																		<i class="fa fa-group"></i>
																	</div>
																	<div class="vertical-timeline-content">
																		<h2><div class="i-checks"><label> <input type="checkbox" value="" name="permisosOperativos[]"> <i></i>Asignaci&oacute;n</label></div></h2>
																	</div>
																</div>
																<div class="vertical-timeline-block">
																	<div class="vertical-timeline-icon navy-bg">
																		<i class="fa fa-laptop"></i>
																	</div>
																	<div class="vertical-timeline-content">
																		<h2><div class="i-checks"><label> <input type="checkbox" value="" name="permisosOperativos[]"> <i></i>Diagn&oacute;stico</label></div></h2>
																	</div>
																</div>
																<div class="vertical-timeline-block">
																	<div class="vertical-timeline-icon navy-bg">
																		<i class="fa fa-lock"></i>
																	</div>
																	<div class="vertical-timeline-content">
																		<h2><div class="i-checks"><label> <input type="checkbox" value="" name="permisosOperativos[]"> <i></i>Autorizar diagn&oacute;stico</label></div></h2>
																	</div>
																</div>
																<div class="vertical-timeline-block">
																	<div class="vertical-timeline-icon navy-bg">
																		<i class="fa fa-comments"></i>
																	</div>
																	<div class="vertical-timeline-content">
																		<h2><div class="i-checks"><label> <input type="checkbox" value="" name="permisosOperativos[]"> <i></i>Por notificar</label></div></h2>
																	</div>
																</div>
																<div class="vertical-timeline-block">
																	<div class="vertical-timeline-icon navy-bg">
																		<i class="fa fa-thumbs-up"></i>
																	</div>
																	<div class="vertical-timeline-content">
																		<h2><div class="i-checks"><label> <input type="checkbox" value="" name="permisosOperativos[]"> <i></i>Por autorizar (link)</label></div></h2>
																	</div>
																</div>
																<div class="vertical-timeline-block">
																	<div class="vertical-timeline-icon navy-bg">
																		<i class="fa fa-user-md"></i>
																	</div>
																	<div class="vertical-timeline-content">
																		<h2><div class="i-checks"><label> <input type="checkbox" value="" name="permisosOperativos[]"> <i></i>En reparaci&oacute;n</label></div></h2>
																	</div>
																</div>
																<div class="vertical-timeline-block">
																	<div class="vertical-timeline-icon navy-bg">
																		<i class="fa fa-check-square"></i>
																	</div>
																	<div class="vertical-timeline-content">
																		<h2><div class="i-checks"><label> <input type="checkbox" value="" name="permisosOperativos[]"> <i></i>Reparado</label></div></h2>
																	</div>
																</div>
																<div class="vertical-timeline-block">
																	<div class="vertical-timeline-icon navy-bg">
																		<i class="fa fa-share-square"></i>
																	</div>
																	<div class="vertical-timeline-content">
																		<h2><div class="i-checks"><label> <input type="checkbox" value="" name="permisosOperativos[]"> <i></i>Por entregar</label></div></h2>
																	</div>
																</div>
																<div class="vertical-timeline-block">
																	<div class="vertical-timeline-icon navy-bg">
																		<i class="fa fa-money"></i>
																	</div>
																	<div class="vertical-timeline-content">
																		<h2><div class="i-checks"><label> <input type="checkbox" value="" name="permisosOperativos[]"> <i></i>Por saldar</label></div></h2>
																	</div>
																</div>
																<div class="vertical-timeline-block">
																	<div class="vertical-timeline-icon navy-bg">
																		<i class="fa fa-share-square-o"></i>
																	</div>
																	<div class="vertical-timeline-content">
																		<h2><div class="i-checks"><label> <input type="checkbox" value="" name="permisosOperativos[]"> <i></i>Entregado al cliente</label></div></h2>
																	</div>
																</div>
																<div class="vertical-timeline-block">
																	<div class="vertical-timeline-icon navy-bg">
																		<i class="fa fa-thumbs-down"></i>
																	</div>
																	<div class="vertical-timeline-content">
																		<h2><div class="i-checks"><label> <input type="checkbox" value="" name="permisosOperativos[]"> <i></i>Cancelados</label></div></h2>
																	</div>
																</div>
															</div>
														</div>
													</fieldset>
												</div>
												<div class="col-lg-2">
													<div class="form-group">
														<button type="submit" id="" class="btn btn-primary btn-block" name="btn-AddBO">Agregar perfil</button>
													</div>
												</div>
											</form>
										</fieldset>
									</p>
									<p>(*) Mandatory</p>
								</section>
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
	<!-- Jquery chosen -->
	<script src="<?php echo $url; ?>App/web/js/plugins/chosen/chosen.jquery.js"></script>
	 <!-- Select2 -->
    <script src="<?php echo $url; ?>App/web/js/plugins/select2/select2.full.min.js"></script>
	<!-- Peity -->
    <script src="<?php echo $url; ?>App/web/js/plugins/peity/jquery.peity.min.js"></script>
	<script src="<?php echo $url; ?>App/web/js/demo/peity-demo.js"></script>
	<!-- iCheck -->
    <script src="<?php echo $url; ?>App/web/js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#Wzd_Customazing").steps({
				headerTag: "h3",
				bodyTag: "section",
				enableAllSteps: true,
				enablePagination: false,
				transitionEffect: "slideLeft"
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
			$(".select2").select2();
			
			$('#vertical-timeline').toggleClass('center-orientation');
			
			 $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                });
		});
		 var config = {
                '.chosen-select'           : {},
                '.chosen-select-deselect'  : {allow_single_deselect:true},
                '.chosen-select-no-single' : {disable_search_threshold:10},
                '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
                '.chosen-select-width'     : {width:"95%"}
                }
            for (var selector in config) {
                $(selector).chosen(config[selector]);
            }
    </script>




</body>

</html>