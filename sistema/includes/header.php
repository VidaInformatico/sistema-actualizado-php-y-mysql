<?php
session_start();
if (empty($_SESSION['active'])) {
	header('location: ../');
}
include "includes/functions.php";
include "../conexion.php";
// datos Empresa
$dni = '';
$nombre_empresa = '';
$razonSocial = '';
$emailEmpresa = '';
$telEmpresa = '';
$dirEmpresa = '';

$query_empresa = mysqli_query($conexion, "SELECT * FROM configuracion");
$row_empresa = mysqli_num_rows($query_empresa);
if ($row_empresa > 0) {
	if ($infoEmpresa = mysqli_fetch_assoc($query_empresa)) {
		$dni = $infoEmpresa['dni'];
		$nombre_empresa = $infoEmpresa['nombre'];
		$razonSocial = $infoEmpresa['razon_social'];
		$telEmpresa = $infoEmpresa['telefono'];
		$emailEmpresa = $infoEmpresa['email'];
		$dirEmpresa = $infoEmpresa['direccion'];
	}
}
$query_data = mysqli_query($conexion, "CALL data();");
$result_data = mysqli_num_rows($query_data);
if ($result_data > 0) {
	$data = mysqli_fetch_assoc($query_data);
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sistema de Venta Básico Gratis</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="all,follow">
	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<!-- Custom Font Icons CSS-->
	<link rel="stylesheet" href="css/font.css">
	<!-- Google fonts - Muli-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
	<!-- theme stylesheet-->
	<link rel="stylesheet" href="css/style.violet.css" id="theme-stylesheet">
	<!-- Custom stylesheet - for your changes-->
	<link rel="stylesheet" href="css/custom.css">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- Tweaks for older IEs-->
	<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
	<?php
	include "../conexion.php";
	$query_data = mysqli_query($conexion, "CALL data();");
	$result_data = mysqli_num_rows($query_data);
	if ($result_data > 0) {
		$data = mysqli_fetch_assoc($query_data);
	}

	?>
	<header class="header">
		<nav class="navbar navbar-expand-lg">
			<div class="container-fluid d-flex align-items-center justify-content-between">
				<div class="navbar-header">
					<!-- Navbar Header--><a href="index.php" class="navbar-brand">
						<div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Punto</strong><strong>Venta</strong></div>
						<div class="brand-text brand-sm"><strong class="text-primary">P</strong><strong>V</strong></div>
					</a>
					<!-- Sidebar Toggle Btn-->
					<button class="sidebar-toggle"><i class="fas fa-bars"></i></button>
				</div>
				<h4><?php echo fechaPeru(); ?></h4>
				<div class="right-menu list-inline no-margin-bottom">
					<!-- Log out               -->
					<div class="list-inline-item logout"> <a id="logout" href="salir.php" class="nav-link"> <span class="d-none d-sm-inline">Cerrar sessión </span><i class="icon-logout"></i></a></div>
				</div>
			</div>
		</nav>
	</header>
	<div class="d-flex align-items-stretch">
		<!-- Sidebar Navigation-->
		<nav id="sidebar">
			<!-- Sidebar Header-->
			<div class="sidebar-header d-flex align-items-center">
				<div class="avatar"><img src="img/logo.jpg" alt="..." class="img-fluid rounded-circle"></div>
				<div class="title">
					<h1 class="h5"><?php echo $_SESSION['nombre']; ?></h1>
					<p><?php if ($_SESSION['rol'] == 1) {
							echo "Administrador";
						} else {
							echo "Vendedor";
						} ?></p>
				</div>
			</div>
			<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
				<!-- Divider -->

				<!-- Nav Item - Pages Collapse Menu -->
				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
						<i class="fas fa-fw fa-cog"></i>
						<span>Ventas</span>
						<i class="fas fa-angle-down fa-lg float-right"></i>
					</a>
					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<a class="collapse-item" href="nueva_venta.php">Nueva venta</a>
							<a class="collapse-item" href="ventas.php">Ventas</a>
						</div>
					</div>
				</li>

				<!-- Nav Item - Productos Collapse Menu -->
				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
						<i class="fas fa-fw fa-wrench"></i>
						<span>Productos</span>
						<i class="fas fa-angle-down fa-lg float-right"></i>
					</a>
					<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<a class="collapse-item" href="registro_producto.php">Nuevo Producto</a>
							<a class="collapse-item" href="lista_productos.php">Productos</a>
						</div>
					</div>
				</li>

				<!-- Nav Item - Clientes Collapse Menu -->
				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClientes" aria-expanded="true" aria-controls="collapseUtilities">
						<i class="fas fa-users"></i>
						<span>Clientes</span>
						<i class="fas fa-angle-down fa-lg float-right"></i>
					</a>
					<div id="collapseClientes" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<a class="collapse-item" href="registro_cliente.php">Nuevo Clientes</a>
							<a class="collapse-item" href="lista_cliente.php">Clientes</a>
						</div>
					</div>
				</li>
				<!-- Nav Item - Utilities Collapse Menu -->
				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProveedor" aria-expanded="true" aria-controls="collapseUtilities">
						<i class="fas fa-hospital"></i>
						<span>Proveedor</span>
						<i class="fas fa-angle-down fa-lg float-right"></i>
					</a>
					<div id="collapseProveedor" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<a class="collapse-item" href="registro_proveedor.php">Nuevo Proveedor</a>
							<a class="collapse-item" href="lista_proveedor.php">Proveedores</a>
						</div>
					</div>
				</li>
				<?php if ($_SESSION['rol'] == 1) { ?>
					<!-- Nav Item - Usuarios Collapse Menu -->
					<li class="nav-item">
						<a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUsuarios" aria-expanded="true">
							<i class="fas fa-user"></i>
							<span>Usuarios</span>
							<i class="fas fa-angle-down fa-lg float-right"></i>
						</a>
						<div id="collapseUsuarios" class="collapse">
							<div class="bg-white py-2 collapse-inner">
								<a class="collapse-item" href="registro_usuario.php">Nuevo Usuario</a>
								<a class="collapse-item" href="lista_usuarios.php">Usuarios</a>
							</div>
						</div>
					</li>
				<?php } ?>
				<li class="nav-item">
					<a class="nav-link" href="configuracion.php" aria-expanded="true">
						<i class="fas fa-tools"></i>
						<span>Configuración</span>
					</a>
				</li>

			</ul>

		</nav>
		<!-- Sidebar Navigation end-->
		<div class="page-content">
			<div class="page-header">