<?php require_once "App/config/general.conf.php"; ?>





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
                    <input type="email" class="form-control" placeholder="Username" required="" name="usuario">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required="" name="contrasena">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b" value="Acceder" name="btn">Login</button>
                <!--a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a-->
            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="App/web/js/jquery-2.1.1.js"></script>
    <script src="App/web/js/bootstrap.min.js"></script>

</body>

</html>
