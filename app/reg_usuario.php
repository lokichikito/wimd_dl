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

	<link rel="stylesheet" type="text/css" href="http://localhost/wimd_dl/assets/css/bootstrap.css">
	<link rel="stylesheet" href="https:/cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/wimd_dl/estilos.css">
	<link media rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<script type="text/javascript" src="http://localhost/wimd_dl/assets/js/bootstrap.bundle.js"></script>
</head>
<body class="body_m">
	
	<?php 
		require_once 'conn.php'; #se reciben los datos del formulario
		$msg=null;

		if(isset($_POST['enviar'])){

			$insert=$conn->prepare('INSERT INTO usuario(tipdoc,docu,correo,nombre,apellido,contra,eps,tel) VALUES(?,?,?,?,?,?,?,?)');
			
			$insert->bindParam(1,$_POST['tipdoc']);
			$insert->bindParam(2,$_POST['docu']);
			$insert->bindParam(3,$_POST['correo']);
			$insert->bindParam(4,$_POST['nombre']);
			$insert->bindParam(5,$_POST['apellido']);
			$pass=password_hash($_POST['contra'], PASSWORD_BCRYPT);
			$insert->bindParam(6,$pass);
			$insert->bindParam(7,$_POST['eps']);
			$insert->bindParam(8,$_POST['tel']);

			if($insert->execute()){
				$msg= "Datos registrados";

			}else{
				$msg= "Datos no registrados";
			}
		}

		?>
		<main>
			<div class="container">
				<div class="container_fluid" >
					<a href="http://localhost/wimd_dl/" id="signup"> <i class="bi bi-x-circle form_close1"> </i></a>
					<h1> Registro de usuario</h1>
					<form action="" method="post" enctype="application/x-www-form-urlencode">
						<?php 
						if ($msg!=''){
							echo  "<p class=text-danger>".$msg;
						}
						?>
						<div class="container_sm">
							<div class="col_1">
								<div class="input_bo1">
									<label for=pwd class="form_label">Tipo de documento:</label>
									<input type="text" placeholder="Escribe tu tipo de documento" name="tipdoc" required/> 
								</div>

								<div class="input_bo1">
									<label for=pwd class="form_label">Documento:</label>
									<input type="number" placeholder="Escribe tu documento" name="docu" required/> 
								</div>

								<div class="input_bo1">
									<label for=pwd class="form_label">Correo:</label>
									<input type="email" placeholder="Escribe tu correo" name="correo" required/> 
								</div>

								<div class="input_bo1">
									<label for=pwd class="form_label">Nombre:</label>
									<input type="text" placeholder="Escribe tu(s) nombre(s)" name="nombre" required/> 
								</div>
							</div>

							<div class="col" >
								<div class="input_bo">
									<label for=pwd class="form_label">Apellido:</label>
									<input type="text" placeholder="Escribe tus apellidos" name="apellido" required/> 
								</div>
								
								<div class="input_bo">
									<label for=pwd class="form_label">Eps:</label>
									<input type="text" placeholder="Escribe tu eps" name="eps" required/> 
								</div>

								<div class="input_bo">
									<label for=pwd class="form_label">Telefono:</label>
									<input type="number" placeholder="Escribe tu número de telefono" name="tel" required/> 
								</div>

							<div class="input_bo">
									<label for=pwd class="form_label">Contraseña:</label>
									<input type="password" placeholder="Escribe tu número de telefono" name="contra" required/> 
								</div>
							</div>
					

							<div class="option_field1">
								<span class="checkbox">
									<input type="checkbox" id="check" required>
									<label for="check">Recuerdame</label>
								</span>	
							</div>

							<button type="submit" class="btn btn-outline-success" name="enviar">Enviar</button>

							<div class="signup">¿Ya tienes una cuenta? <a href="http://localhost/wimd_dl/app/index" id="signup">Inicia sesión</a></div>   
						</form>	
					</div>
				</div>
			</div>
		</div>
		
	</main>
</body>