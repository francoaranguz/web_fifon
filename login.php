<?php

session_start();
if (isset($_SESSION['user_id'])) {
  header('Location: /web_fifon/admin/index.php');
}

require 'database.php';

$usuario = $_POST['user_name'];
$pass = $_POST['pass'];



if(!empty($usuario) && !empty($pass)) {
	$query = "SELECT idUser, user_name, pass FROM usuarios WHERE user_name = '$usuario' and pass = '$pass' LIMIT 1";
	$results = mysqli_query($conn, $query);
	$message = '';

	while ($row = mysqli_fetch_row($results)){

		$valida_user = $row[1];
		$valida_pass = $row[2];
		$valida_id = $row[0];

	}
}
    if (!empty($valida_id) && $usuario = $valida_user && $pass = $valida_pass ) {
		$_SESSION['user_id'] = $valida_id;
		header("Location: /web_fifon/admin/index.php");
	  } else {
		$message = 'Lo sentimos, esas credenciales no coinciden';
	  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login - FIF ON</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images_login/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor_login/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts_login/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts_login/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor_login/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor_login/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor_login/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor_login/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor_login/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css_login/util.css">
	<link rel="stylesheet" type="text/css" href="css_login/main.css">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter"> 
		<div class="container-login100" style="background-image: url('images_login/bg-01.jpg');">
			<div class="wrap-login100">
				<?php if(!empty($message)): ?>
      				<p> <?= $message ?></p>
				<?php endif; ?>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" action="login.php" class="login100-form validate-form" method="POST">
					<span class="login100-form-title p-b-34 p-t-27">
						Ingresa
					</span>	
					<div class="wrap-input100 validate-input" data-validate = "Ingresar el usuario">
						<input class="input100" type="text" name="user_name" placeholder="Usuario">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingresa la contraseña">
						<input class="input100" type="password" name="pass" placeholder="Contraseña">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn"  >
						<p class="login100-form-btn"><input type="submit" value="">Iniciar Sesión</p>
					</div>


				</form>


			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor_login/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor_login/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor_login/bootstrap/js/popper.js"></script>
	<script src="vendor_login/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor_login/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor_login/daterangepicker/moment.min.js"></script>
	<script src="vendor_login/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor_login/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js_login/main.js"></script>

</body>
</html>