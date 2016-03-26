<?php
namespace App\views;
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
					<meta name="viewport" content="<? echo $this->pviewport?>">
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
											<a href="<?php echo $url; ?>App/controllers/logout.php">Salir</a>
										</li>
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
						</div>	
						<div class="wrapper wrapper-content">
							<div class="col-lg-12">
								<div class="middle-box text-center animated fadeInRightBig">
									<h3 class="font-bold">This is page content</h3>
									<div class="error-desc">
										You can create here any grid layout you want. And any variation layout you imagine:) Check out
										main dashboard and other site. It use many different layout.
										<br/><a href="index.html" class="btn btn-primary m-t">Dashboard</a>
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


					<script>
						$(document).ready(function() {
							/*setTimeout(function() {
								toastr.options = {
									closeButton: true,
									progressBar: true,
									showMethod: 'slideDown',
									timeOut: 4000
								};
								toastr.success('Responsive Admin Theme', 'Welcome to INSPINIA');
							}, 1300);*/


							var data1 = [
								[0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
							];
							var data2 = [
								[0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
							];
							$("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
								data1, data2
							],
									{
										series: {
											lines: {
												show: false,
												fill: true
											},
											splines: {
												show: true,
												tension: 0.4,
												lineWidth: 1,
												fill: 0.4
											},
											points: {
												radius: 0,
												show: true
											},
											shadowSize: 2
										},
										grid: {
											hoverable: true,
											clickable: true,
											tickColor: "#d5d5d5",
											borderWidth: 1,
											color: '#d5d5d5'
										},
										colors: ["#1ab394", "#1C84C6"],
										xaxis:{
										},
										yaxis: {
											ticks: 4
										},
										tooltip: false
									}
							);

							var doughnutData = [
								{
									value: 300,
									color: "#a3e1d4",
									highlight: "#1ab394",
									label: "App"
								},
								{
									value: 50,
									color: "#dedede",
									highlight: "#1ab394",
									label: "Software"
								},
								{
									value: 100,
									color: "#A4CEE8",
									highlight: "#1ab394",
									label: "Laptop"
								}
							];

							var doughnutOptions = {
								segmentShowStroke: true,
								segmentStrokeColor: "#fff",
								segmentStrokeWidth: 2,
								percentageInnerCutout: 45, // This is 0 for Pie charts
								animationSteps: 100,
								animationEasing: "easeOutBounce",
								animateRotate: true,
								animateScale: false
							};

							var ctx = document.getElementById("doughnutChart").getContext("2d");
							var DoughnutChart = new Chart(ctx).Doughnut(doughnutData, doughnutOptions);

							var polarData = [
								{
									value: 300,
									color: "#a3e1d4",
									highlight: "#1ab394",
									label: "App"
								},
								{
									value: 140,
									color: "#dedede",
									highlight: "#1ab394",
									label: "Software"
								},
								{
									value: 200,
									color: "#A4CEE8",
									highlight: "#1ab394",
									label: "Laptop"
								}
							];

							var polarOptions = {
								scaleShowLabelBackdrop: true,
								scaleBackdropColor: "rgba(255,255,255,0.75)",
								scaleBeginAtZero: true,
								scaleBackdropPaddingY: 1,
								scaleBackdropPaddingX: 1,
								scaleShowLine: true,
								segmentShowStroke: true,
								segmentStrokeColor: "#fff",
								segmentStrokeWidth: 2,
								animationSteps: 100,
								animationEasing: "easeOutBounce",
								animateRotate: true,
								animateScale: false
							};
							var ctx = document.getElementById("polarChart").getContext("2d");
							var Polarchart = new Chart(ctx).PolarArea(polarData, polarOptions);

						});
					</script>
			</body>
		</html>