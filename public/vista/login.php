<?php 
//require_once 'App/controllers/Home.php';//C:\xampp\htdocs\iBrain2.0\App\controllers
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>iBrain2.0| Login</title>

    <link href="App/web/css/bootstrap.min.css" rel="stylesheet">
    <link href="App/web/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="App/web/css/animate.css" rel="stylesheet">
    <link href="App/web/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <h1 class="logo-name">iB2.0</h1>
        </div>
		<div>
            <h3>Welcome</h3>
			<form class="m-t" role="form"  method="post" action="public/controlador/login.neg.php" >
                <div class="form-group">
                    <input type="email" id="txt_usuario_h" class="form-control" placeholder="Username" required="" name="txt_usuario_h">
                </div>
				<div id="show1" class="form-group hidden1">
					<select id="slt_AASP_h" class="form-control" required="" name="slt_AASP_h">
						<option value=-1>Seleccion un AASP</option>
					</select>
				</div>
				<div id="show2" class="form-group hidden1">
					<div class="form-group">
						<input type="password" id="txt_contrasena_h" class="form-control" placeholder="Password" required="" name="txt_contrasena_h">
					</div>
                </div>
				<div id="show3" class="form-group hidden1">
					<button type="submit" id="btn_Acceder_h" class="btn btn-primary block full-width m-b" value="Acceder" name="btn_Acceder_h">Login</button>
                </div>
				<!--a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a-->
            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="App/web/js/jquery-2.1.1.js"></script>
    <script src="App/web/js/bootstrap.min.js"></script>
	<script>
	$(document).ready(
		function(){
			var slt_AASP_j=$("#slt_AASP_h");
			var txt_usuario_j=$("#txt_usuario_h");
			var divSltAASP=$(".hidden1");
			
			divSltAASP.hide();
			
			txt_usuario_j.on("change",
				function(){
					$("#show1").show("slow");
					
					if($(this).val()!=''){
						$.ajax({
							url:'public/controlador/login.neg.php',
							type: 'post',
							data:{
								cmd_getAASP_ajx:'getData',
								username: username.val()
							},
							dataType: 'json',
							success: function(data){
								if (data.success){
									$.each(data,function(index,record){
										if($.isNumeric(index)){
											slt_AASP_j.append('<option value="' + record.pkBranchOffice + '">' + record.BOName + '</option>' );
										}
									})
								}
								$('table').dataTable({
									"bJQueryUI":true,
									"sPaginationType":"full_numbers"
								})
							},
							error: function(){
								alert('Ocurrio un error con el servidor ..');
								slt_AASP_j.prop('disabled', false);
							}
						});
					}
				}				
			);
			slt_AASP_j.on("change",
				function(){
					$("#show2").show("slow");
					$("#show3").show("slow");
				}				
			);
		}
	);
	</script>
</body>

</html>
