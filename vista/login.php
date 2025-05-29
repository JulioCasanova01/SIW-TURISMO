<html lang="es">
<head>
	<title>Ingresar-JYS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" href="../fontawesome-free-6.7.2-web/css/all.min.css">
    <link rel="icon" href="../IMAGENES/Logotipo_sinsombrapng_Mesa de trabajo 1-02.png">
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap-icons-1.11.3/a/bootstrap-icons.min.css">
    
	<style>
		body {
			font-family: 'Arial', sans-serif;
			background-color: #f5f5f5;
			color: #333;
			margin: 0;
			padding: 0;
		}

		.cover {
			background: linear-gradient(to top, #1CB5E0, #000046);
			background-size: cover;
			background-position: center;
			height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
			padding: 30px;
			flex-direction: column;
		}

		.logInForm {
			background-color: rgba(255, 255, 255, 0.95);
			padding: 30px;
			border-radius: 10px;
			box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
			width: 100%;
			max-width: 400px;
			text-align: center;
		}
		.ashboard-contentPage{
			margin-bottom: 100px;
		}

		.dashboard-Navbar {
			background-color: #093670;

			color: white;
			padding: 10px 20px;
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
			z-index: 1000;
			display: flex;
			justify-content: center;
			align-items: center;
			/* border-bottom: 2px solid #ff4c4b; */
		}

		.dashboard-sideBar-title {
			text-align: center;
		}

		.dashboard-sideBar-title img {
			border-radius: 50%;
			width: 150px;
			height: 150px;
			display: block;
			margin: 0 auto;
			animation: bounce 2s infinite;
		}

		.dashboard-sideBar-title h1 {
			font-size: 30px;
			color: white; /* Texto blanco */
			margin-top: 10px;
			font-weight: bold;
			letter-spacing: 2px;
			text-transform: uppercase;
			text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2); /* Sombra del texto */
		}

		@keyframes bounce {
			0%, 100% {
				transform: translateX(20px);
			}
			50% {
				transform: translateX(-30px);
			}
		}

		/* Centrar campos del formulario */
		.form-group {
			margin-bottom: 20px;
			text-align: center; /* Centra el contenido */
		}

		.form-control {
			width: 100%;
			max-width: 300px; /* Limitar el ancho de los campos */
			padding: 10px;
			border: 1px solid #ddd;
			border-radius: 5px;
			box-sizing: border-box;
			font-size: 16px;
			text-align: center; /* Centrar el texto */
		}
		.logInForm{
			margin-top: 150px;
		}

		.control-label {
			font-weight: bold;
			margin-bottom: 5px;
			display: block;
		}

		.btncolor {
			background-color: #1273a8;
			color: white;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			cursor: pointer;
			width: 100%;
			font-size: 16px;
			transition: background-color 0.3s;
		}

		.btncolor:hover {
			background-color:rgb(122, 192, 230);
		}
	</style>
</head>
<body class="cover">
	<section class="ashboard-contentPage">
		<nav class="full-box dashboard-Navbar">
			<div class="full-box text-center text-titles dashboard-sideBar-title">
				<img src="../IMAGENES/Logotipo_sinsombrapng_Mesa de trabajo 1-02.png" alt="Logo">
				<h1>JYS PROMOTORES DE VIAJES Y TURISMO</h1>
			</div>
		</nav>
	</section>
	<br>
	<form class="full-box logInForm " id="formulario" action="../controlador/clientes_c.php?accion=ingresar" method="POST">
		<p class="text-center text-muted"><i class="fa fa-user-circle fa-5x"></i></p>
		<div id="grupo">
			<p class="text-center text-muted text-uppercase">Inicia sesión con tu cuenta</p>
			<div class="form-group label-floating">
				<label class="control-label" for="UserEmail">Usuario</label>
				<input class="form-control" id="UserEmail" name="email" type="text" placeholder="example@gmail.com" required>
			</div>
			<div class="form-group label-floating">
				<label class="control-label" for="UserPass">Contraseña</label>
				<input class="form-control" id="UserPass" name="clave" type="password" placeholder="Clave123*" required>
			</div>
		</div>
		<div>
			<input type="submit" value="Iniciar sesión" class="btncolor" id="btn_iniciar">
			<!-- <a href="http://localhost\SIW-TURISMO\vista\general\PaginaPrincipal.php">Ingresar sin Cuenta</a> -->
			<br>
			<a href="http://localhost\SIW-TURISMO\vista\general\crear_cuenta.php">¿No tienes Cuenta?-Crea Una</a>
			<br> <br>
			
		</div>
	</form>
	<a class="" href="http://localhost/SIW-TURISMO/vista/admin/login_admin.php" ><button class="btn btn-primary mt-1 mb-3"><li class="fas fa-user-shield"></li></button></a>

	<script src="../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
	
</body>
</html>