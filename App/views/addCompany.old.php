<?php
#Agregar los select de las llaves foráneas
#16.3.26 mensaje modal de confirmación de movimiento CRUD
namespace App\View;
defined("APPPATH") OR die("Access denied");

use \Core\View;
use \Core\Controller;
		/*
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

		}*/
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
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Configuraci&oacute;n Inicial</h5>
                        </div>
                        <div class="ibox-content">
							<div id="Wzd_Customazing">
								<h3>Nueva Cuenta maestra</h3>
								<section>
									<p>
										<fieldset>
											<form id="formCompany" class="form-horizontal" action="<?php echo $url; ?>private/EnterpriseGroup" method="POST" class="">
												<div class="col-lg-10">
													<div class="form-group">
														<label class="col-lg-3 control-label">Raz&oacute;n social:*</label>
														<div class="col-lg-8">
															<input id="txt_legalName_h" class="form-control required" name="txt_legalName_h" type="text">
															<input id="" name="hdn_toDo_h" class="" value="AddCompany" type="hidden">
														</div>
													</div>
													<div class="form-group">
														<label class="col-lg-3 control-label">Nombre Comercial*</label>
														<div class="col-lg-8">
															<input id="txt_commercialName_h" class="form-control required" name="txt_commercialName_h" type="text">
														</div>
													</div>
													<div class="form-group">
														<label class="col-lg-3 control-label">Calle*</label>
														<div class="col-lg-8">
															<input id="txt_street_h" class="form-control required" name="txt_street_h" type="text">
														</div>
													</div>
													<div class="form-group">
														<label class="col-lg-3 control-label">N&uacute;mero exterior:*</label>
														<div class="col-lg-8">
															<input id="txt_extNumber_h" class="form-control required" name="txt_extNumber_h" type="text">
														</div>
													</div>
													<div class="form-group">
														<label class="col-lg-3 control-label">N&uacute;mero interior:*</label>
															<div class="col-lg-8">
																<input id="txt_intNumber_h" class="form-control required" name="txt_intNumber_h" type="text">
															</div>
													</div>					
													<div class="form-group">
													<label class="col-lg-3 control-label">Regi&oacute;n:*</label>
														<div class="col-lg-8">
															<input id="txt_region_h" class="form-control required" name="txt_region_h" type="text">
														</div>
													</div>
													<div class="form-group">
														<label class="col-lg-3 control-label">Zona:*</label>
														<div class="col-lg-8">
															<input id="txt_zone_h" class="form-control required" name="txt_zone_h" type="text">
														</div>
													</div>
													<div class="form-group">
														<label class="col-lg-3 control-label">Provincia:*</label>
														<div class="col-lg-8">
															<input  id="txt_province_h" class="form-control required" name="txt_province_h" type="text">
														</div>
													</div>
													<div class="form-group">
													<label class="col-lg-3 control-label">C&oacute;digo postal:*</label>
														<div class="col-lg-8">
															<input  id="txt_zipCode_h" class="form-control required" name="txt_zipCode_h" type="text">
													</div>
													</div>
												</div>
												<div class="col-lg-2">
													<div class="form-group">
														<button type="submit" id="" class="btn btn-primary btn-lg btn-block" name="btn_AddCompany">Agregar C.M.</button>
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
                <strong>Copyright</strong> iBrain &#169; 2014-2015
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
		});
    </script>
</body>

</html>