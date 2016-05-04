<?php
namespace App\View;
defined("APPPATH") OR die("Access denied");
use \Core\View;
use \Core\Controller;
use \App\Config\Globales;

if (strlen(session_id()) < 1){
   session_start();
}
error_reporting(E_ALL);
@ini_set('display_errors', '1');
if(isset($_SESSION['accessories']))
$accessories=$_SESSION['accessories'];else $accessories=false;

if($_POST){
	extract($_POST);
	$accessoriesid=count($accessories);
	if ($accessoriesid=null || $accessoriesid="" || $accessoriesid=0){
		$accessoriesid=0;
	}
	else{
		$accessoriesid++;
	}
	
	
	if(isset($_SESSION['accessories'])){
		$accessories=$_SESSION['accessories'];
		$accessoriesid=count($accessories);
		$accessoriesid++;
		$accessories[$accessoriesid]=array(
									   'id'=>$accessoriesid,
									   'desc'=>$txt_AccessoryDesc_h,
									   'brand'=>$txt_AccessoryBrand_h,
									   'model'=>$txt_AccessoryModel_h,
									   'PN'=>$txt_AccessoryPN_h,
									   'SN'=>$txt_AccessorySN_h
									   );
	}
	else{
		$accessories[0]=array(
									   'id'=>$accessoriesid,
									   'desc'=>$txt_AccessoryDesc_h,
									   'brand'=>$txt_AccessoryBrand_h,
									   'model'=>$txt_AccessoryModel_h,
									   'PN'=>$txt_AccessoryPN_h,
									   'SN'=>$txt_AccessorySN_h
									   );
	}
	
	$_SESSION['accessories']=$accessories;
}

function recorro($matriz){
        foreach($matriz as $key=>$value){
            if (is_array($value)){
                //si es un array sigo recorriendo
              echo 'key:'. $key;
              echo '<br>';
             recorro($value);
        }
		else{  
             //si es un elemento lo muestro
             echo $key.': '.$value ;
             echo '<br>';
        }
	}
} 

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
									<h5>Agregar un accesorios</h5>
									<!--div class="ibox-tools">
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
									</div-->
								</div>
								<div class="ibox-content" >
									<fieldset>
											<form id="frm_newAccessory_h" class="form-horizontal" action="<?php echo Globales::$absoluteURL; ?>private/ServiceOrder/addAccessory" method="POST" role="form" name="frm_newAccessory_h">
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
					<?php 
						if($accessories){
					?>
					<div class="row">
						<div class="col-md-6">
							<div class="ibox float-e-margins">
								<div class="ibox-title">
									<h5>Lista de accesorios</h5>
									<!--div class="ibox-tools">
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
									</div-->
								</div>
								<div class="ibox-content" >
									<table class="table table-striped table-bordered table-hover">
										<tr>
											<th>Descripci&oacute;n</th>
											<th>Marca</th>
											<th>Modelo</th>
											<th>No. Parte</th>
											<th>No. Serie</th>
										</tr>
										<tbody>
											
										<?php
										foreach($accessories as $k =>$v) {
										?>
										<tr>
											<td>
												<?php echo $v['desc'] ?>
											</td>
											<td>
												<?php echo $v['brand'] ?>
											</td>
											<td>
												<?php echo $v['model'] ?>
											</td>
											<td>
												<?php echo $v['PN'] ?>
											</td>
											<td>
												<?php echo $v['SN'] ?>
												
											</td>
										</tr>	
										<?php
										}
										 ?>
										</tbody>
									</table>
									<div align="center"><span class="prod">
										Total de Accesorios <?php echo count($accessories); ?></span> 
									</div>
								</div>
							</div>
                        </div>
                    </div>
					<?php
					}
					?>
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
   <script>
	  $(document).ready(
		 function() {
			
            $("#btn_command_h").on('click',function(){
				  document.forms['frm_newAccessory_h'].submit();
				  window.opener.reloadTable();
			   }
			);
         }
	  );
   </script>

</body>

</html>
