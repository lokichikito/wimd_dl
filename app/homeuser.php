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
	<!-- elements -->
	<link rel="stylesheet" type="text/css" href="http://localhost/wimd_dl/estilos.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/wimd_dl/assets/css/bootstrap.css">
	<link rel="stylesheet" href="https:/cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<script type="text/javascript" src="http://localhost/wimd_dl/assets/js/bootstrap.bundle.js"></script>
	<link media rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>

<body class="body" style="background-image: url('http://localhost/wimd_dl/media/img/s10.png');">
	<?php 
	require_once 'conn.php';
	session_start();

	if (isset($_SESSION['adm'])) {
		$search=$conn->prepare('SELECT * FROM usuario WHERE idusuario=?');
		$search->bindParam(1,$_SESSION['adm']);
		$search->execute();
		$data=$search->fetch(PDO::FETCH_ASSOC);
	}
	if (is_array($data)) {
	?>
	<header>
		<nav class="navbar navbar-expand-sm">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">
					<img src="http://localhost/wimd_dl/media/img/logo2.webp" alt="Avatar Logo" style="width:60px;" class="rounded-pill"> 
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="collapsibleNavbar">
					<ul class="navbar-nav">
						<li class="nav-item nav_1">
							<a href="logout" class="btn btn-outline-primary text-white">Cerrar sesión</a>
						</li>
						<li class="nav-item nav_1">
							<a class="nav-link text-white" href="#">Mi perfil</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

	</header>
	<main>
		<div class="container-sm text-white">
			<h2>¡Bien! ya iniciaste en WIMD, esperamos que nuestros servicios te sean de gran ayuda</h2> 
		</div>
		<div class="btn-group btn-group-lg">
			<button type="button" class="btn bg-white btn-1">Medicamentos</button>
		</div>
		<div class="btn-group btn-group-lg"> 
			<button type="button" class="btn  bg-white btn-2">Citas</button>
		</div>
		<div class="btn-group btn-group-lg">
			<button type="button" class="btn bg-white btn-3">Archivos medicos</button>
		</div>
			

	</main>
<?php 

}else{
	header('location: ./');
}
?>
</body>
</html>