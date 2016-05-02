<?php
namespace App\View;
defined("APPPATH") OR die("Access denied");
use \Core\View;
use \Core\Controller;
use \App\Config\Globales;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>iBrain2.0</title>
		
		<link href="<?php echo Globales::$absoluteURL; ?>App/web/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo Globales::$absoluteURL; ?>App/web/font-awesome/css/font-awesome.css" rel="stylesheet">
		<link href="<?php echo Globales::$absoluteURL; ?>App/web/css/animate.css" rel="stylesheet">
		<link href="<?php echo Globales::$absoluteURL; ?>App/web/css/style.css" rel="stylesheet">

	</head>
<body class="top-navigation">
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
			<div class="wrapper wrapper-content">
				<div class="container">
                    <div class="row">
						<div class="col-md-6">
							<div class="ibox float-e-margins">
								<div class="ibox-title">
									<h5>Titulo del ibox </h5>
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
											<form id="formUser" class="form-horizontal" action="http://192.168.1.47:8012/ibrain2.0/private/ServiceOrder" method="POST" role="form">
													<div class="">
														<div class="form-group">&nbsp;</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Descripci&oacute;n:*</label>
															<div class="col-lg-8">
																<input id="txt_AccessoryDesc_h" class="form-control required" name="txt_AccessoryDesc_h" type="text">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Marca:*</label>
															<div class="col-lg-8">
																<input id="txt_AccessoryBrand_h" class="form-control" name="txt_AccessoryBrand_h" type="text">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Modelo:*</label>
															<div class="col-md-8">
																<input id="txt_AccessoryModel_h" class="form-control required" name="txt_AccessoryModel_h" type="text">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">N&uacute;mero de parte:*</label>
															<div class="col-md-8">
																<input id="txt_AccessoryPN_h" class="form-control required" name="txt_AccessoryPN_h" type="text">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">N&uacute;mero de serie:*</label>
															<div class="col-md-8">
																<input id="txt_AccessorySN_h" class="form-control required" name="txt_AccessorySN_h" type="text">
															</div>
														</div>
														<div class="col-md-6 pull-right">
															<div class="form-group">
																<button type="submit" id="btn_command_h" class="btn btn-primary btn-md btn-block" value="addAccessory" name="btn_command_h">Guardar</button>
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
		</div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo Globales::$absoluteURL; ?>App/web/js/jquery-2.1.1.js"></script>
    <script src="<?php echo Globales::$absoluteURL; ?>App/web/js/bootstrap.min.js"></script>
    <script src="<?php echo Globales::$absoluteURL; ?>App/web/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo Globales::$absoluteURL; ?>App/web/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="<?php echo Globales::$absoluteURL; ?>App/web/js/inspinia.js"></script>
    <script src="<?php echo Globales::$absoluteURL; ?>App/web/js/plugins/pace/pace.min.js"></script>


</body>

</html>