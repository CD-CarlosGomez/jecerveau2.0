<?php
namespace App\Views;
defined("APPPATH") OR die("Access denied");

		$_SESSION["nombreUsuario"];
		$_SESSION['pkiBUser_p'];
		if (isset($_SESSION['loggedin']) & $_SESSION['loggedin'] == true){}
		else{
				echo "Esta pagina es solo para usuarios registrados.<br>";
			echo "<a href='$url'>Login Here!</a>";
			exit;
		}
		$now = time(); 
		if($now > $_SESSION['expire']){
		session_destroy();
		echo "Su sesion a terminado, <a href='$url'>
			  Necesita Hacer Login</a>";
		exit;
		}
?>
<!DOCTYPE html>
		<html>
			<head>
					<meta charset="utf-8">
					<meta name="viewport" content="width=device-width, initial-scale=1.0">
					<meta http-equiv="X-UA-Compatible" content="IE=edge">
					<title><?php echo $title ?></title>
					<link href="<?php echo $url; ?>App/web/css/bootstrap.min.css" rel="stylesheet">
					<link href="<?php echo $url; ?>App/web/font-awesome/css/font-awesome.css" rel="stylesheet">
					<!-- Toastr style -->
					<link href="<?php echo $url; ?>App/web/css/plugins/toastr/toastr.min.css" rel="stylesheet">
					<!-- Gritter -->
					<link href="<?php echo $url; ?>App/web/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
					<link href="<?php echo $url; ?>App/web/css/animate.css" rel="stylesheet">
					<link href="<?php echo $url; ?>App/web/css/style.css" rel="stylesheet">
			</head>
			<body class="top-navigation">
				<div id="wrapper">
					<div id="page-wrapper" class="gray-bg">
						<div class="row border-bottom white-bg">						
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
										<!--li>
											<a data-toggle="dropdown" class="dropdown-toggle" href="#">
												<span class="clear"> 
													<span class="block m-t-xs"> 
														<strong class="font-bold"><?php echo $realname;?></strong>
													</span>
													<span class="text-muted text-xs block">Cuenta<b class="caret"></b>
													</span> 
												</span> 
											</a>
												<ul class="dropdown-menu animated fadeInRight m-t-xs">
													<li><a href="<?php echo $url; ?>App/controllers/logout.php">Salir</a></li>
												</ul>
										</li-->
									</ul>
								</div>
							</nav>
						</div>
						 <div class="row wrapper border-bottom white-bg page-heading">
							<div class="col-sm-4">
								<h2>Inicio</h2>
								<ol class="breadcrumb">
									<li>
										<a href="<?php echo $url; ?>private/home">Inicio</a>
									</li>
								</ol>
							</div>
							<div class="pull-right">
								<div id="" class="form-group">
									<select id="slt_AASP_h" class="form-control" required="" name="slt_AASP_h">
										<option value=-1>Seleccion un AASP...</option>
											<?php print_r($currentBO);?>
									</select>
								</div>
							</div>
						</div>	
						<div class="wrapper wrapper-content">
							<div class="col-lg-12">
								<div class="middle-box text-center animated fadeInRightBig">
									<div>
										<h3>Bienvenidos a iBrain</h3>
									</div>
								</div>
							</div>
							<div class="footer">
								<div class="pull-right">
										Usuario: su@consultoriadual.com | Sucursal: Consultoria Dual | Hora: <?php echo date('Y-m-d h:s'); ?>
								</div>
								<div>
								
									<strong>iBrain&#174;</strong> 2.0
								</div>
							</div>
						</div>
					</div>
				</div>
					<!-- Mainly scripts -->
					<script src="<?php echo $url; ?>App/web/js/jquery-2.1.1.js"></script>
					<script src="<?php echo $url; ?>App/web/js/bootstrap.min.js"></script>
					<script src="<?php echo $url; ?>App/web/js/plugins/metisMenu/jquery.metisMenu.js"></script>
					<script src="<?php echo $url; ?>App/web/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

					<!-- Flot -->
					<script src="<?php echo $url; ?>App/web/js/plugins/flot/jquery.flot.js"></script>
					<script src="<?php echo $url; ?>App/web/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
					<script src="<?php echo $url; ?>App/web/js/plugins/flot/jquery.flot.spline.js"></script>
					<script src="<?php echo $url; ?>App/web/js/plugins/flot/jquery.flot.resize.js"></script>
					<script src="<?php echo $url; ?>App/web/js/plugins/flot/jquery.flot.pie.js"></script>
					<!-- Peity -->
					<script src="<?php echo $url; ?>App/web/js/plugins/peity/jquery.peity.min.js"></script>
					<script src="<?php echo $url; ?>App/web/js/demo/peity-demo.js"></script>
					<!-- Custom and plugin javascript -->
					<script src="<?php echo $url; ?>App/web/js/inspinia.js"></script>
					<script src="<?php echo $url; ?>App/web/js/plugins/pace/pace.min.js"></script>
					<!-- jQuery UI -->
					<script src="<?php echo $url; ?>App/web/js/plugins/jquery-ui/jquery-ui.min.js"></script>
					<!-- GITTER -->
					<script src="<?php echo $url; ?>App/web/js/plugins/gritter/jquery.gritter.min.js"></script>
					<!-- Sparkline -->
					<script src="<?php echo $url; ?>App/web/js/plugins/sparkline/jquery.sparkline.min.js"></script>

					<!-- Sparkline demo data  -->
					<script src="<?php echo $url; ?>App/web/js/demo/sparkline-demo.js"></script>

					<!-- ChartJS-->
					<script src="<?php echo $url; ?>App/web/js/plugins/chartJs/Chart.min.js"></script>

					<!-- Toastr -->
					<script src="<?php echo $url; ?>App/web/js/plugins/toastr/toastr.min.js"></script>
			</body>
		</html>