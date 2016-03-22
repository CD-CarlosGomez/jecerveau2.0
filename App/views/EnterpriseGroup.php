<?php
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

    <title>INSPINIA | Wizards</title>

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

<body>
    <div id="wrapper">
		<nav class="navbar-default navbar-static-side" role="navigation">
			<div class="sidebar-collapse">
				<nav class="navbar-default navbar-static-side" role="navigation">
						<div class="sidebar-collapse">
							<ul class="nav metismenu" id="side-menu">
								<li class="nav-header">
									<div class="dropdown profile-element"> <span>
										<img alt="image" class="img-circle" src="img/profile_small.jpg" />
										 </span>
										<a data-toggle="dropdown" class="dropdown-toggle" href="#">
										<span class="clear"> <span class="block m-t-xs"><strong class="font-bold"></strong>
										 </span> <span class="text-muted text-xs block">&nbsp; <b class="caret"></b></span> </span> </a>
										<ul class="dropdown-menu animated fadeInRight m-t-xs">
										</ul>
									</div>
								</li>
								<?php print_r($currentMainMenu);?>
						</ul>
					</div>
				</nav>
			</div>
		</nav>

        <div id="page-wrapper" class="gray-bg">
			<div class="row border-bottom">
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Enterprise Group</h2>
				</div>
                <div class="col-lg-2">
                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
             <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Customazing</h5>
                        </div>
                        <div class="ibox-content">
                            <h2>
                                Enterprise Group
                            </h2>
						<form id="form" action="http://localhost:8012/iBrain2.0/private/enterpriseGroup" method="POST" class="wizard-big">
								<h1>Master Account</h1>
									<fieldset>
									<!--form id="formCompany" action="http://localhost:8012/iBrain2.0/private/enterpriseGroup" method="POST" class=""-->
										<h2>Master Account Information</h2>
											<div class="row">
											
											</div>
											<div class="row">
												<div class="col-lg-6">
													<div class="form-group">
														<label>Legal Name*</label>
														<input type="text" id="txt_legalName_h" class="form-control required" name="txt_userName_h">
														<input id="" name="btn_toDo_h" type="hidden" class="" value="AddCompany">
													</div>
													<div class="form-group">
														<label>Commercial Name*</label>
														<input type="text" id="txt_commercialName_h" class="form-control required" name="txt_commercialName_h">
													</div>
													<div class="form-group">
														<label>Street*</label>
														<input type="text" id="txt_Street_h" class="form-control required" name="txt_Street_h"/>
													</div>
													<div class="form-group">
														<label>Ext Number*</label>
														<input type="text" id="txt_ExtNumber_h" class="form-control required" name="txt_ExtNumber_h"/>
													</div>
													<div class="form-group">
														<label>Int Number*</label>
														<input type="text" id="txt_IntNumber_h" class="form-control required" name="txt_IntNumber_h"/>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="form-group">
														<label>Region*</label>
														<input type="text" id="txt_Region_h" class="form-control required" name="txt_Region_h">
														<input id="" name="btn_toDo_h" type="hidden" class="" value="AddCompany">
													</div>
													<div class="form-group">
														<label>Zone*</label>
														<input type="text" id="txt_Zone_h" class="form-control required" name="txt_Zone_h">
													</div>
													<div class="form-group">
														<label>Province*</label>
														<input type="text" id="txt_Province_h" class="form-control required" name="txt_Province_h"/>
													</div>
													<div class="form-group">
														<label>Zip Code*</label>
														<input type="text" id="txt_ZipCode_h" class="form-control required" name="txt_ZipCode_h"/>
													</div>
												</div>
											</div>
										<!--/form-->
									</fieldset>
							
							   <h1>Branch Office</h1>
								<fieldset>
								<!--form id="frmBO" action="http://localhost:8012/iBrain2.0/private/enterpriseGroup" method="POST" class=""-->
									<h2>Branch Office Information</h2>
									<div class="row"></div>
									<div class="row">
											<div class="col-lg-6">
												<div class="form-group">
													<label>First name *</label>
													<input id="name" name="name" type="text" class="form-control required">
												</div>
												<div class="form-group">
													<label>Last name *</label>
													<input id="surname" name="surname" type="text" class="form-control required">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label>Email *</label>
													<input id="email" name="email" type="text" class="form-control required email">
												</div>
												<div class="form-group">
													<label>Address *</label>
													<input id="address" name="address" type="text" class="form-control">
												</div>
											</div>
										</div>
									<!--/form-->
									</fieldset>
								
                                <h1>Users</h1>
							    <fieldset>
								<!--form id="frmUser" action="http://localhost:8012/iBrain2.0/private/enterpriseGroup" method="POST" class=""-->
								<h2>Users Information</h2>
                                 <div class="row"></div>
										<div class="row">
											<div class="col-lg-6">
												<div class="form-group">
													<label>First name *</label>
													<input id="name" name="name" type="text" class="form-control required">
												</div>
												<div class="form-group">
													<label>Last name *</label>
													<input id="surname" name="surname" type="text" class="form-control required">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label>Email *</label>
													<input id="email" name="email" type="text" class="form-control required email">
												</div>
												<div class="form-group">
													<label>Address *</label>
													<input id="address" name="address" type="text" class="form-control">
												</div>
											</div>
										</div>
                                <!--/form-->
								</fieldset>
						</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="pull-right">
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
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
            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex) {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex){
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18) {
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
					//Submit of the page
					form.submit();
                },
                onStepChanged: function (event, currentIndex, priorIndex){
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
                onFinishing: function (event, currentIndex) {
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
       });
    </script>

</body>

</html>
