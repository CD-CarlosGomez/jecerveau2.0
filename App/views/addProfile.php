<?php
#Agregar los select de las llaves foráneas
#16.3.26 mensaje modal de confirmación de movimiento CRUD
#Agregar los validadores del lado del servidor
#Agregar estas clases a los botones de las tablas
#<button type="button" class="btn btn-primary btn-lg btn-block">Botón de bloque</button>
#<button type="button" class="btn btn-default btn-lg btn-block">Botón de bloque</button>
#Validar que solo se pueda insertar 1 vez el perfil por usuario
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
	<!-- CSS multiselect -->
	<link href="<?php echo $url; ?>App/web/css/plugins/multiselect/multi-select.css" rel="stylesheet">
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
						<a href="<?php echo $url; ?>private/User">Usuario</a>
					</li>
					<li>
						<a href="<?php echo $url; ?>private/User/showProfile">Perfil</a>
					</li>
					<li class="active">
						<strong>Nuevo Perfil</strong>
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
										<fieldset>
											<form id="Profiles"class="form-horizontal"  action="<?php echo $url; ?>private/User" method="POST" class="">
												<div class="col-lg-10">
													<fieldset>
														<div class="form-group">
															<label class="col-lg-3 control-label">Usuario:*</label>
																<div class="col-lg-8">
																<select id="" class="form-control m-b" name="slt_pkiBUsers_h">
																	<option value="-1">Selecciona un usuario ...</option>
																		<?php foreach ($drowsU as $Options) {?>
																			<option value="<?php echo $Options['pkiBUser']; ?>"><?php echo $Options['realname']; ?></option>
																		<?php } ?>
																</select>
																</div>
														</div>
														<div class="form-group">
															<label class="col-lg-3 control-label">Permiso para sucursal:*</label>
																<div class="col-lg-8">
																<select id="" class="form-control m-b" name="slt_pkBO_h">
																	<option value="-1">Selecciona una sucursal ...</option>
																		<?php foreach ($ds_BO as $dr_BO) {?>
																			<option value="<?php echo $dr_BO['pkBranchOffice']; ?>"><?php echo $dr_BO['BOName'] ?></option>
																		<?php } ?>
																</select>
																</div>
														</div>
														<div class="form-group">
															<label class="col-lg-3 control-label">Descripci&oacute;n del perfil:*</label>
															<div class="col-lg-8">
																<input type="text" id="txt_profileName_h" class="form-control required" name="txt_profileName_h">
															</div>
														</div>
														<div class="form-group">
															<label class="col-lg-3 control-label">Permiso a contenido:*</label>
															<div class="col-lg-8">
																<select multiple="multiple" id="slt_pkiBFunctionDetail_h" name="slt_pkiBFunctionDetail_h[]">
																	<?php foreach ($drowsF as $options){?>
																	<option value="<?php echo $options['pkibFunctionDetail'];?>"><?php echo $options['ibfunctionDetailName']; ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
														<div class="form-group">
															<label class="col-lg-3 control-label">Permiso a flujo de operaci&oacute;n:*</label>
															<div class="col-lg-8">
															<div id="vertical-timeline" class="vertical-container light-timeline center-orientation">
																<div class="vertical-timeline-block">
																	<div class="vertical-timeline-icon navy-bg">
																		<i class="fa fa-truck"></i>
																	</div>
																	<div class="vertical-timeline-content">
																		<div class="i-checks"><label> <input type="checkbox"  value="1" name="chk_toBecollected_h"> <i></i>Recolecci&oacute;n</label></div>
																	</div>
																</div>
																<div class="vertical-timeline-block">
																	<div class="vertical-timeline-icon navy-bg">
																		<i class="fa fa-group"></i>
																	</div>
																	<div class="vertical-timeline-content">
																		<div class="i-checks"><label> <input type="checkbox" value="1" name="chk_toBeAssigned_h"> <i></i>Asignaci&oacute;n</label></div>
																	</div>
																</div>
																<div class="vertical-timeline-block">
																	<div class="vertical-timeline-icon navy-bg">
																		<i class="fa fa-laptop"></i>
																	</div>
																	<div class="vertical-timeline-content">
																		<div class="i-checks"><label> <input type="checkbox"  value="1" name="chk_toBeDiagnosed_h"> <i></i>Diagn&oacute;stico</label></div>
																	</div>
																</div>
																<div class="vertical-timeline-block">
																	<div class="vertical-timeline-icon navy-bg">
																		<i class="fa fa-lock"></i>
																	</div>
																	<div class="vertical-timeline-content">
																		<div class="i-checks"><label> <input type="checkbox"  value="1" name="chk_diagnosisToBeAuthorized_h"> <i></i>Autorizar diagn&oacute;stico</label></div>
																	</div>
																</div>
																<div class="vertical-timeline-block">
																	<div class="vertical-timeline-icon navy-bg">
																		<i class="fa fa-comments"></i>
																	</div>
																	<div class="vertical-timeline-content">
																		<div class="i-checks"><label> <input type="checkbox"  value="1" name="chk_toNotifyTheClient_h"> <i></i>Por notificar al cliente</label></div>
																	</div>
																</div>
																<div class="vertical-timeline-block">
																	<div class="vertical-timeline-icon navy-bg">
																		<i class="fa fa-thumbs-up"></i>
																	</div>
																	<div class="vertical-timeline-content">
																		<div class="i-checks"><label> <input type="checkbox"  value="1" name="chk_toBeAuthorizedByClient_h"> <i></i>Por autorizar (link)</label></div>
																	</div>
																</div>
																<div class="vertical-timeline-block">
																	<div class="vertical-timeline-icon navy-bg">
																		<i class="fa fa-user-md"></i>
																	</div>
																	<div class="vertical-timeline-content">
																		<div class="i-checks"><label> <input type="checkbox"  value="1" name="chk_inRepairProcess_h"> <i></i>En reparaci&oacute;n</label></div>
																	</div>
																</div>
																<div class="vertical-timeline-block">
																	<div class="vertical-timeline-icon navy-bg">
																		<i class="fa fa-check-square"></i>
																	</div>
																	<div class="vertical-timeline-content">
																		<div class="i-checks"><label> <input type="checkbox"  value="1" name="chk_repaired_h"> <i></i>Reparado</label></div>
																	</div>
																</div>
																<div class="vertical-timeline-block">
																	<div class="vertical-timeline-icon navy-bg">
																		<i class="fa fa-share-square"></i>
																	</div>
																	<div class="vertical-timeline-content">
																		<div class="i-checks"><label> <input type="checkbox"  value="1" name="chk_toDelivery_h"> <i></i>Por entregar</label></div>
																	</div>
																</div>
																<div class="vertical-timeline-block">
																	<div class="vertical-timeline-icon navy-bg">
																		<i class="fa fa-money"></i>
																	</div>
																	<div class="vertical-timeline-content">
																		<div class="i-checks"><label> <input type="checkbox"  value="1" name="chk_toBeCharged_h"> <i></i>Por saldar</label></div>
																	</div>
																</div>
																<div class="vertical-timeline-block">
																	<div class="vertical-timeline-icon navy-bg">
																		<i class="fa fa-share-square-o"></i>
																	</div>
																	<div class="vertical-timeline-content">
																		<div class="i-checks"><label> <input type="checkbox"  value="1" name="chk_deliveredToClient_h"> <i></i>Entregado al cliente</label></div>
																	</div>
																</div>
																<div class="vertical-timeline-block">
																	<div class="vertical-timeline-icon navy-bg">
																		<i class="fa fa-thumbs-down"></i>
																	</div>
																	<div class="vertical-timeline-content">
																		<div class="i-checks"><label> <input type="checkbox"  value="1" name="chk_cancelled_h"> <i></i>Cancelados</label></div>
																	</div>
																</div>
															</div>
															</div>
														</div>
														<div class="col-lg-2 pull-right">
															<div class="form-group">
																<button type="submit" id="btn_toDo_h" class="btn btn-primary btn-block" value="addProfile" name="btn_toDo_h">Guardar</button>
															</div>
														</div>
													</fieldset>
												</div>
												
											</form>
										</fieldset>
									</p>
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
	<!-- Jquery multiselect -->
	<script src="<?php echo $url; ?>App/web/js/plugins/multiselect/jquery.multi-select.js"></script>
    <script>
        $(document).ready(function(){
          
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
			
			$('#slt_pkiBFunctionDetail_h').multiSelect({keepOrder:true});
		});
		 
    </script>




</body>

</html>