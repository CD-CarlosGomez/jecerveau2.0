<?php
#Agregar los select de las llaves foráneas
namespace App\View\EnterpriseGroup;
defined("APPPATH") OR die("Access denied");
use \Core\View;
use \App\Models\CurrentUser as CurrentUser;
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

    <link href="http://localhost:8012/iBrain2.0/App/web/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost:8012/iBrain2.0/App/web/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="http://localhost:8012/iBrain2.0/App/web/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="http://localhost:8012/iBrain2.0/App/web/css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="http://localhost:8012/iBrain2.0/App/web/css/animate.css" rel="stylesheet">
    <link href="http://localhost:8012/iBrain2.0/App/web/css/style.css" rel="stylesheet">
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
					<a href="#" class="navbar-brand">Inicio</a>
					</div>
					<div class="navbar-collapse collapse" id="navbar">
					<ul class="nav navbar-nav">
						<?php print_r($currentMainMenu);?>
					</ul>
					<ul class="nav navbar-top-links navbar-right">
						<li>
							<a href="login.html">Log out</a>
						</li>
					</ul>
				</div>
			</nav>
			</div>
		<div class="row wrapper border-bottom white-bg page-heading">
			<div class="col-sm-4">
				<h2>This is main title</h2>
				<ol class="breadcrumb">
					<li>
						<a href="index.html">This is</a>
					</li>
					<li class="active">
						<strong>Breadcrumb</strong>
					</li>
				</ol>
			</div>
		</div>	
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Customazing</h5>
                        </div>
                        <div class="ibox-content">
							<div id="Wzd_Customazing">
								<h3>Master Account</h3>
								<section>
									<p>
										<fieldset>
											<form id="formCompany" action="http://localhost:8012/iBrain2.0/private/enterpriseGroup" method="POST" class="">
												<div class="row"></div>
												<div class="row">
													<div class="col-lg-6">
														<div class="form-group">
															<label>Legal Name*</label>
															<input id="txt_legalName_h" class="form-control required" name="txt_legalName_h" type="text">
															<input id="" name="hdn_toDo_h" class="" value="AddCompany" type="hidden">
														</div>
														<div class="form-group">
															<label>Commercial Name*</label>
															<input id="txt_commercialName_h" class="form-control required" name="txt_commercialName_h" type="text">
														</div>
														<div class="form-group">
															<label>Street*</label>
															<input id="txt_street_h" class="form-control required" name="txt_street_h" type="text">
														</div>
														<div class="form-group">
															<label>Ext Number*</label>
															<input id="txt_extNumber_h" class="form-control required" name="txt_extNumber_h" type="text">
														</div>
														<div class="form-group">
															<label>Int Number*</label>
															<input id="txt_intNumber_h" class="form-control required" name="txt_intNumber_h" type="text">
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label>Region*</label>
															<input id="txt_region_h" class="form-control required" name="txt_region_h" type="text">
															<input id="" name="btn_toDo_h" class="" value="AddCompany" type="hidden">
														</div>
														<div class="form-group">
															<label>Zone*</label>
															<input id="txt_zone_h" class="form-control required" name="txt_zone_h" type="text">
														</div>
														<div class="form-group">
															<label>Province*</label>
															<input  id="txt_province_h" class="form-control required" name="txt_province_h" type="text">
														</div>
														<div class="form-group">
															<label>Zip Code*</label>
															<input  id="txt_zipCode_h" class="form-control required" name="txt_zipCode_h" type="text">
														</div>
														<div class="form-group">
															<button type="submit" id="" class="btn btn-primary" name="btn-AddCompany">Add Company</button>
														</div>
													</div>
												</div>
											</form>
										</fieldset>
									</p>
									<p>(*) Mandatory</p>
								</section>
								<h3>Branch Office</h3>
								<section>
									<p>
										<fieldset>
											<form id="formBO" action="http://localhost:8012/iBrain2.0/private/enterpriseGroup" method="POST" class="">
													<div class="row"></div>
												<div class="row">
													<div class="col-lg-6">
														<div class="form-group">
															<label>Branch Office Name*</label>
															<input id="txt_BOName_h" class="form-control required" name="txt_BOName_h" type="text">
															<input id="" name="hdn_toDo_h" class="" value="AddBO" type="hidden">
														</div>
														<div class="form-group">
															<label>Branch Office Street*</label>
															<input id="txt_BOStreet_h" class="form-control required" name="txt_BOStreet_h" type="text">
														</div>
														<div class="form-group">
															<label>Branch Office Ext Number*</label>
															<input id="txt_BOExtNumber_h" class="form-control required" name="txt_BOExtNumber_h" type="text">
														</div>
														<div class="form-group">
															<label>Branch Office Int Number*</label>
															<input id="txt_BOIntNumber_h" class="form-control required" name="txt_BOIntNumber_h" type="text">
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label>Region*</label>
															<input id="txt_BORegion_h" class="form-control required" name="txt_BORegion_h" type="text">
															<input id="" name="btn_toDo_h" class="" value="AddCompany" type="hidden">
														</div>
														<div class="form-group">
															<label>Zone*</label>
															<input id="txt_BOZone_h" class="form-control required" name="txt_BOZone_h" type="text">
														</div>
														<div class="form-group">
															<label>Province*</label>
															<input  id="txt_BOProvince_h" class="form-control required" name="txt_BOProvince_h" type="text">
														</div>
														<div class="form-group">
															<label>Zip Code*</label>
															<input  id="txt_BOZipCode_h" class="form-control required" name="txt_BOZipCode_h" type="text">
														</div>
														<div class="form-group">
															<button type="submit" id="" class="btn btn-primary" name="btn-AddBO">Add Branch Office</button>
														</div>
													</div>
												</div>
											</form>
										</fieldset>
									</p>
									<p>(*) Mandatory</p>
								</section>
								<h3>Users</h3>
								<section>
									<p>
										<fieldset>
											<form id="formUser" action="http://localhost:8012/iBrain2.0/private/enterpriseGroup" method="POST" class="">
												<div class="row"></div>
												<div class="row">
													<div class="col-lg-6">
														<div class="form-group">
															<label>User Name*</label>
															<input id="txt_userName_h" class="form-control required" name="txt_userName_h" type="text">
															<input id="" name="hdn_toDo_h" class="" value="AddUser" type="hidden">
														</div>
														<div class="form-group">
															<label>Real Name*</label>
															<input id="txt_realName_h" class="form-control required" name="txt_realName_h" type="text">
														</div>
														<div class="form-group">
															<label>E-mail</label>
															<input id="txt_email_h" class="form-control required" name="txt_email_h" type="text">
														</div>
														<div class="form-group">
															<label>Pasword*</label>
															<input id="txt_password_h" class="form-control required" name="txt_password_h" type="text">
														</div>
														<div class="form-group">
																<label>Profile*</label>
																<input id="txt_fkiUserPRofile_h" class="form-control required" name="txt_fkiUserPRofile_h" type="text">
															</div>
														<div class="form-group">
																<label>Start Page*</label>
																<input id="txt_defaultFunction_h" class="form-control required" name="txt_defaultFunction_h" type="text">
															</div>
														</div>
														<div class="form-group">
															<button type="submit" id="" class="btn btn-primary" name="btn-AddBO">Add User</button>
														</div>
													<div class="col-lg-6">
														
													</div>
												</div>
											</form>
										</fieldset>
									</p>
									<p>(*)Mandatory
									</p>
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
    <script src="http://localhost:8012/iBrain2.0/App/web/js/jquery-2.1.1.js"></script>
    <script src="http://localhost:8012/iBrain2.0/App/web/js/bootstrap.min.js"></script>
    <script src="http://localhost:8012/iBrain2.0/App/web/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="http://localhost:8012/iBrain2.0/App/web/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="http://localhost:8012/iBrain2.0/App/web/js/inspinia.js"></script>
    <script src="http://localhost:8012/iBrain2.0/App/web/js/plugins/pace/pace.min.js"></script>

    <!-- Steps -->
    <script src="http://localhost:8012/iBrain2.0/App/web/js/plugins/staps/jquery.steps.min.js"></script>

    <!-- Jquery Validate -->
    <script src="http://localhost:8012/iBrain2.0/App/web/js/plugins/validate/jquery.validate.min.js"></script>


    <script>
        $(document).ready(function(){
            $("#Wzd_Customazing").steps({
				headerTag: "h3",
				bodyTag: "section",
				enableAllSteps: true,
				enablePagination: false,
				transitionEffect: "slideLeft",
				stepsOrientation: "vertical"
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