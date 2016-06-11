<?php
#Agregar los select de las llaves for�neas

namespace App\View\EnterpriseGroup;
defined("APPPATH") OR die("Access denied");

use \App\data\DataGridView as DGV;
		
		if (isset($_SESSION['loggedin']) & $_SESSION['loggedin'] == true){}
		else{
				echo "Esta pagina es solo para usuarios registrados.<br>";
			echo "<a href='" . $url . "'>Login Here!</a>";
			exit;
		}
		$now = time(); 
		if($now > $_SESSION['expire']){
		session_destroy();
		echo "Su sesion a terminado, <a href='".$url."'>
			  Necesita Hacer Login</a>";
		exit;
		}		
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title><?php echo $title ?></title>

		<link href="<?php echo $url; ?>App/web/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo $url; ?>App/web/font-awesome/css/font-awesome.css" rel="stylesheet">
		<link href="<?php echo $url; ?>App/web/css/animate.css" rel="stylesheet">
		<link href="<?php echo $url; ?>App/web/css/style.css" rel="stylesheet">
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
								<a href="<?php echo $url; ?>private/User/showUser">Listado de usuarios</a>
							</li>
							<li class="active">
								<strong>Importar usuario</strong>
							</li>
						</ol>
					</div>
				</div>	
				<div class="wrapper wrapper-content">
					<div class="row">
						<div class="col-lg-3">
							<div class="ibox float-e-margins">
								<div class="ibox-content">
									<div class="file-manager">
										<h5>Importar usuarios</h5>
										<div class="hr-line-dashed"></div>
										<form id="" class="" method="post" action='<?php echo $url;?>User/businessUser' enctype="multipart/form-data">
											<input type="file" class="btn btn-primary btn-block"/>
											<input type="submit" id="" class="" value="importar" name="importarUsuario"/>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="ibox float-e-margins">
								<div class="ibox-content">
									<div class="file-manager">
										<h5>Importar perfiles</h5>
										<div class="hr-line-dashed"></div>
										<input type="file" class="btn btn-primary btn-block"/>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
				<div class="footer">
					<div class="pull-right">
						&nbsp;
					</div>
					<div>
						<strong>iBrain&#174;</strong> 2.0
					</div>
				</div>

			</div>
        </div>


    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.file-box').each(function() {
                animationHover(this, 'pulse');
            });
        });
    </script>
</body>

</html>
