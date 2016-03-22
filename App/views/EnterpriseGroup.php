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
<body class="pace-done"><div class="pace  pace-inactive"><div data-progress="99" data-progress-text="100%" style="transform: translate3d(100%, 0px, 0px);" class="pace-progress">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>
    <div id="wrapper">
		<nav class="navbar-default navbar-static-side" role="navigation">
			<div class="sidebar-collapse">
				<nav class="navbar-default navbar-static-side" role="navigation">
						<div class="sidebar-collapse">
							<ul class="nav metismenu" id="side-menu">
								<li class="nav-header">
									<div class="dropdown profile-element"> <span>
										<img alt="image" class="img-circle" src="img/profile_small.jpg">
										 </span>
										<a data-toggle="dropdown" class="dropdown-toggle" href="#">
										<span class="clear"> <span class="block m-t-xs"><strong class="font-bold"></strong>
										 </span> <span class="text-muted text-xs block">&nbsp; <b class="caret"></b></span> </span> </a>
										<ul class="dropdown-menu animated fadeInRight m-t-xs">
										</ul>
									</div>
								</li>
								<li><a href="#"><span class="nav-label">Customizing</span><span class="fa arrow"></span></a>		<ul class="nav nav-second-level collapse"><li>		<a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Enterprise Group<span class="fa arrow"></span></a>		<ul class="nav nav-third-level collapse"><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li></ul></li><li>		<a href="http://localhost:8012/ibrain2.0/#">Profiles<span class="fa arrow"></span></a>		<ul class="nav nav-third-level collapse"><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li></ul></li><li>		<a href="http://localhost:8012/ibrain2.0/#">Functions<span class="fa arrow"></span></a>		<ul class="nav nav-third-level collapse"><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li></ul></li><li><a href="#"><span class="nav-label">Service Orders</span><span class="fa arrow"></span></a>		<ul class="nav nav-second-level collapse"><li>		<a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Enterprise Group<span class="fa arrow"></span></a>		<ul class="nav nav-third-level collapse"><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li></ul></li><li>		<a href="http://localhost:8012/ibrain2.0/#">Profiles<span class="fa arrow"></span></a>		<ul class="nav nav-third-level collapse"><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li></ul></li><li>		<a href="http://localhost:8012/ibrain2.0/#">Functions<span class="fa arrow"></span></a>		<ul class="nav nav-third-level collapse"><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li></ul></li><li>		<a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Enterprise Group<span class="fa arrow"></span></a>		<ul class="nav nav-third-level collapse"><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li></ul></li><li><a href="#"><span class="nav-label">Settings</span><span class="fa arrow"></span></a>		<ul class="nav nav-second-level collapse"><li>		<a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Enterprise Group<span class="fa arrow"></span></a>		<ul class="nav nav-third-level collapse"><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li></ul></li><li>		<a href="http://localhost:8012/ibrain2.0/#">Profiles<span class="fa arrow"></span></a>		<ul class="nav nav-third-level collapse"><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li></ul></li><li>		<a href="http://localhost:8012/ibrain2.0/#">Functions<span class="fa arrow"></span></a>		<ul class="nav nav-third-level collapse"><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li></ul></li><li>		<a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Enterprise Group<span class="fa arrow"></span></a>		<ul class="nav nav-third-level collapse"><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li></ul></li><li>		<a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Enterprise Group<span class="fa arrow"></span></a>		<ul class="nav nav-third-level collapse"><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li></ul></li><li>		<a href="http://localhost:8012/ibrain2.0/#">Profiles<span class="fa arrow"></span></a>		<ul class="nav nav-third-level collapse"><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li><li><a href="http://localhost:8012/ibrain2.0/#">Master Account</a></li><li><a href="http://localhost:8012/ibrain2.0/">Branch Office</a></li><li><a href="http://localhost:8012/ibrain2.0/private/enterpriseGroup">Company</a></li></ul></li></ul></li><li><a href="http://localhost:8012/ibrain2.0//App/controllers/logout.php"><span class="nav-label">Logout</span></a></li>						</ul>
					</li></ul></li></ul></div>
				</nav>
			</div>
		</nav>

        <div style="min-height: 827px;" id="page-wrapper" class="gray-bg">
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
							<div id="Wzd_Customazing" class="wizard clearfix vertical">
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
														<label for="txt_legalName_h" class="error" id="txt_legalName_h-error">This field is required.</label><input aria-invalid="true" aria-required="true" id="txt_legalName_h" class="form-control required error" name="txt_userName_h" type="text">
														<input id="" name="btn_toDo_h" class="" value="AddCompany" type="hidden">
													</div>
													<div class="form-group">
														<label>Commercial Name*</label>
														<label for="txt_commercialName_h" class="error" id="txt_commercialName_h-error">This field is required.</label><input aria-required="true" id="txt_commercialName_h" class="form-control required error" name="txt_commercialName_h" type="text">
													</div>
													<div class="form-group">
														<label>Street*</label>
														<label for="txt_Street_h" class="error" id="txt_Street_h-error">This field is required.</label><input aria-required="true" id="txt_Street_h" class="form-control required error" name="txt_Street_h" type="text">
													</div>
													<div class="form-group">
														<label>Ext Number*</label>
														<label for="txt_ExtNumber_h" class="error" id="txt_ExtNumber_h-error">This field is required.</label><input aria-required="true" id="txt_ExtNumber_h" class="form-control required error" name="txt_ExtNumber_h" type="text">
													</div>
													<div class="form-group">
														<label>Int Number*</label>
														<label for="txt_IntNumber_h" class="error" id="txt_IntNumber_h-error">This field is required.</label><input aria-required="true" id="txt_IntNumber_h" class="form-control required error" name="txt_IntNumber_h" type="text">
													</div>
												</div>
												<div class="col-lg-6">
													<div class="form-group">
														<label>Region*</label>
														<label for="txt_Region_h" class="error" id="txt_Region_h-error">This field is required.</label><input aria-required="true" id="txt_Region_h" class="form-control required error" name="txt_Region_h" type="text">
														<input id="" name="btn_toDo_h" class="" value="AddCompany" type="hidden">
													</div>
													<div class="form-group">
														<label>Zone*</label>
														<label for="txt_Zone_h" class="error" id="txt_Zone_h-error">This field is required.</label><input aria-required="true" id="txt_Zone_h" class="form-control required error" name="txt_Zone_h" type="text">
													</div>
													<div class="form-group">
														<label>Province*</label>
														<label for="txt_Province_h" class="error" id="txt_Province_h-error">This field is required.</label><input aria-required="true" id="txt_Province_h" class="form-control required error" name="txt_Province_h" type="text">
													</div>
													<div class="form-group">
														<label>Zip Code*</label>
														<label for="txt_ZipCode_h" class="error" id="txt_ZipCode_h-error">This field is required.</label><input aria-required="true" id="txt_ZipCode_h" class="form-control required error" name="txt_ZipCode_h" type="text">
													</div>
													<div class="form-group">
														<button type="submit" id="" class="btn btn-primary" name="txt_ZipCode_h">Add Company</button>
													</div>
												</div>
											</div>
										</form>
									</fieldset>
								</p>
									
									<p>(*) Mandatory</p>
								</section>
								<h3 class="title" tabindex="-1" id="Wzd_Customazing-h-1">Branch Office</h3>
								<section aria-hidden="true" style="display: none;" class="body" aria-labelledby="Wzd_Customazing-h-1" role="tabpanel" id="Wzd_Customazing-p-1">
									<p>
										<label for="position-3">Position (zero-based) *</label><br>
										<input id="position-3" type="text"><br>
										<label for="title2-3">HTML Title *</label><br>
										<input id="title2-3" type="text"><br>
										<label for="text2-3">HTML Content *</label><br>
										<textarea id="text2-3" rows="5"></textarea>
									</p>
									<p><a href="javascript:void(0);" onclick="$('#wizard-4').steps('insert', Number($('#position-3').val()), { title: $('#title2-3').val(), content: $('#text2-3').val() });">Insert</a></p>
									<p>(*) Mandatory</p>
								</section>
								<h3 class="title" tabindex="-1" id="Wzd_Customazing-h-2">Users</h3>
								<section aria-hidden="true" style="display: none;" class="body" aria-labelledby="Wzd_Customazing-h-2" role="tabpanel" id="Wzd_Customazing-p-2">
									<p>
										<label for="position2-3">Position (zero-based) *</label><br>
										<input id="position2-3" type="text">
									</p>
									<p><a href="javascript:void(0);" onclick="$('#wizard-4').steps('remove', Number($('#position2-3').val()));">Remove</a></p>
									<p>(*) Mandatory</p>
								</section>
							</div></div>
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