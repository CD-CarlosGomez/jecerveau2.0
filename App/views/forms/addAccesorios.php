<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>iBrain2.0</title>
		
		<link href="<?php echo $url; ?>App/web/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo $url; ?>App/web/font-awesome/css/font-awesome.css" rel="stylesheet">
		<link href="<?php echo $url; ?>App/web/css/animate.css" rel="stylesheet">
		<link href="<?php echo $url; ?>App/web/css/style.css" rel="stylesheet">

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
						<a href="#" class="navbar-brand">Inspinia</a>
					</div>
					 <div class="navbar-collapse collapse" id="navbar">
					<ul class="nav navbar-nav">
						<li>&nbsp;</li>
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
				<div class="container">
                    <div class="row">
						<div class="col-lg-12">
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
												<form id="formUser" class="form-horizontal" action="<?php echo $url; ?>private/User" method="POST" role="form">
													<div class="col-lg-6 form-group-dark">
														<div class="form-group">&nbsp;</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Usuario:*</label>
															<div class="col-lg-8">
																<input id="txt_userName_h" class="form-control required" name="txt_userName_h" type="text">
																<input id="" name="hdn_toDo_h" class="" value="AddUser" type="hidden">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Nombre completo:*</label>
															<div class="col-lg-8">
																<input id="txt_realName_h" class="form-control required" name="txt_realName_h" type="text">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">E-mail:*</label>
															<div class="col-md-8">
																<input id="txt_email_h" class="form-control required" name="txt_email_h" type="text">
															</div>
														</div>
													</div>
													<div class="col-md-6 form-group-dark">
														<div class="form-group">&nbsp;</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Contrase&ntilde;a:*</label>
															<div class="col-md-8">
																<input id="txt_password_h" class="form-control required" name="txt_password_h" type="text">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Perfil:*</label>
															<div class="col-md-8">
																<input id="txt_fkiUserPRofile_h" class="form-control required" name="txt_fkiUserPRofile_h" type="text">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">P&aacute;gina de inicio:*</label>
															<div class="col-md-8">
																<input id="txt_defaultFunction_h" class="form-control required" name="txt_defaultFunction_h" type="text">
															</div>
														</div>
													</div>
													<div class="form-group">&nbsp;</div>
													<div class="col-md-4 pull-right">
														<div class="form-group">
															<button type="submit" id="" class="btn btn-primary btn-md btn-block" name="btn-AddBO">Agregar usuario</button>
														</div>
													</div>
											</form>
										</fieldset>
									
								</div>
							</div>
                        </div>
                    </div>
					<div class="row">
						<div class="col-lg-12">
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
								<div class="ibox-content">
									Texto
								</div>
							</div>
                        </div>
					</div>
					<div class="row">
						<div class="col-lg-12">
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
								<div class="ibox-content">
									Texto
								</div>
							</div>
                        </div>
					</div>
				</div>
			</div>
			<div class="footer">
				<div>
					<strong>Copyright</strong> Example Company &copy; 2014-2015
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


</body>

</html>