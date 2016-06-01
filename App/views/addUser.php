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
			echo "<a href='" . $url. "'>Login Here!</a>";
			exit;
		}
		$now = time(); 
		if($now > $_SESSION['expire']){
		session_destroy();
		echo "Su sesion a terminado, <a href='<a href='" . $url. "'>Login Here!</a>'>
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
		<link href="<?php echo $url; ?>App/web/css/plugins/iCheck/custom.css" rel="stylesheet">
		<link href="<?php echo $url; ?>App/web/css/plugins/steps/jquery.steps.css" rel="stylesheet">
		<link href="<?php echo $url; ?>App/web/css/animate.css" rel="stylesheet">
		<link href="<?php echo $url; ?>App/web/css/style.css" rel="stylesheet">
		<!-- chosen CSS -->
		<link href="<?php echo $url; ?>App/web/css/plugins/chosen/chosen.css" rel="stylesheet">
		<!-- Select CSS -->
		<link href="<?php echo $url; ?>App/web/css/plugins/select2/select2.min.css" rel="stylesheet">
		<!-- Check CSS -->
		<link href="<?php echo $url; ?>App/web/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

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
							<strong>Nuevo usuario</strong>
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
									<h5>Nuevo usuario</h5>
								</div>
								<div class="ibox-content" >
									<fieldset>
											<form id="frm_user_h" class="form-horizontal" action="<?php echo $url; ?>private/User" method="POST" role="form">
													<div class="col-lg-6">
														
														<div class="form-group">
															<label class="col-md-4 control-label">Usuario:*</label>
															<div class="col-lg-8">
																<input type="text" id="txt_userName_h" class="form-control required" name="txt_userName_h" >
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Nombre completo:*</label>
															<div class="col-lg-8">
																<input type="text" id="txt_realName_h" class="form-control required" name="txt_realName_h" >
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Correo electr&oacute;nico:*</label>
															<div class="col-md-8">
																<input type="text" id="txt_newEmail_h" class="form-control required"  value="" name="txt_newEmail_h" >
															</div>
														</div>
													</div>
													<div class="col-md-6">
														
														<div class="form-group">
															<label class="col-md-4 control-label">Contrase&ntilde;a:*</label>
															<div class="col-md-8">
																<input type="password" id="txt_newPassword_h" class="form-control required" value="" name="txt_newPassword_h" >
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">P&aacute;gina de inicio:</label>
															<div class="col-md-8">
																<input type="text" id="txt_defaultFunction_h" class="form-control " name="txt_defaultFunction_h">
															</div>
														</div>
														<div class="col-md-4 pull-right">
															<div class="form-group">
																<button type="submit" id="" class="btn btn-primary btn-md btn-block" value="AddUser" name="btn_toDo_h">Guardar</button>
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
					<strong>iBrain&#174;</strong> 2.0
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
		$.validator.setDefaults({
		submitHandler: function(form) {
			form.submit();
		}
		});
		
		$.validator.addMethod('regex', function (value,element) { 
    	return  this.optional(element)|| /^[A-Za-zñÑ0-9\-\s\.áéíóúÁÉÍÓÚ]*$/g.test(value); 
		}, 'Por favor, introduzca s&oacute;lo n&uacute;meros y letras.');
	
        $(document).ready(function(){
			$("#frm_user_h").validate(
			{
				rules: {
					txt_userName_h : {
						required : true,
						email : true
					},
					txt_realName_h : {
						required : true,
						regex : true
					},
					txt_newEmail_h : {
						required : true,
						email:true
					},
					txt_newPassword_h : {
						required : true,
						//regex : true
					}
				},
				messages : {
					txt_userName_h : {
						required : "Favor de escribir el nombre del usuario.",
						email : "Por favor, introduzca un email v&aacute;lido."
					},
					txt_realName_h : {
						required : "Favor de escribir nombre completo del usuario."
					},
					txt_newEmail_h : {
						required : "Favor de escribir el correo electr&oacute;nico del usuario.",
						email : "Por favor, introduzca un email v&aacute;lido."
					},
					txt_newPassword_h : {
						required : "Favor de asignarle una contraseña al usuario."
					}
				}
			}
		);	
		});
    </script>

</body>

</html>
