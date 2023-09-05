<!DOCTYPE html>
<html lang="es-CO">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>WIMD</title>
	<meta name="theme-color" content="#AED6F1">
	<meta name="MobileOptimized" content="width">
	<!-- Tags SEO /desing -->
	<meta name="author" content="luz y sus lucecitas">
	<meta name="description" content="Aplicativo web WIMD">
	<meta name="keywords" content="WIMD, citas, eps, medicina, horarios, hospital, Citas, Medicina">
	
	<!-- favicon-->
	<link rel="icon" type="image/x-icon" href="http://localhost/wimd_dl/media/img/logo2.webp">
	<!-- links-->
	<link rel="stylesheet" type="text/css" href="http://localhost/wimd_dl/estilos.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/wimd_dl/assets/css/bootstrap.css">
	<link rel="stylesheet" href="https:/cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<script type="text/javascript" src="http://localhost/wimd_dl/assets/js/bootstrap.bundle.js"></script>
	<link media rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body class="body_s">
	
	<?php 
	require_once 'conn.php';
	session_start();

	if(isset($_POST['enviar'])){
		$result=$conn->prepare('SELECT * FROM usuario WHERE docu=?');

		$result->bindParam(1,$_POST['docu']);
		$result->execute();

 	//pasar datos ordenados al arreglo $data

		if($data=$result->fetch(PDO::FETCH_ASSOC)){

 		if (password_verify($_POST['contra'], $data['contra'])){ #comparacion de la pswd en la db y el reg
 			$_SESSION['adm'] = $data['idusuario'];
 			header('location: homeuser');
 		} else {
 			echo "Contraseña incorrecta";
 		}
 		
 	}else{
 		echo "Datos incorrectos";
 	}
 } 

 ?>
 <main>

 	<div class="container">

 		<div class="form_container" >
 			<a href="http://localhost/wimd_dl/" id="signup"> <i class="bi bi-x-circle form_close"> </i></a>
 			<!--login form-->
 			<div class="form login_form">
 				<form action="" method="post" enctype="">
 					<h2>Iniciar sesión</h2>

 					<div class="container_sm">
 						<div class="input_box">
 							<input type="number" placeholder="Escribe tu documento" name="docu" required/> 
 							<i class="bi bi-person-vcard number"></i>
 						</div>

 						<div class="input_box">
 							<input type="password" placeholder="Contraseña" name="contra" required/> 
 							<i class="bi bi-file-lock password"></i>
 							<i class="bi bi-eye-slash pw-hide"></i>
 						</div>

 						<div class="option_field">
 							<span class="checkbox">
 								<input type="checkbox" id="check" required>
 								<label for="check">Recuerdame</label>
 							</span>	
 							<a href="" class="forgot_pw">¿Olvidaste tu contraseña?</a>
 						</div>

 						<button type="submit" class="btn btn-outline-success" name="enviar">Enviar</button>

 						<div class="login_signup">¿No tienes una cuenta? <a href="http://localhost/wimd_dl/app/reg_usuario" id="signup">Registrate</a></div>
 					</form>

 				</div>
 			</div>
 		</div> 
 	</div>
 </main>
</body>

</html>
