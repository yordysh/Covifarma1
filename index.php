<?php
require_once "mantenedor/DataBaseA.php";
require_once "mantenedor/registrar.php";

$conexion = new DataBase();
$dats = $conexion->Conectar();

$mostrar = new m_almacen();
$datos = $mostrar->MostrarAlmacenMuestra();

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
	<meta charset="utf-8">

	<!--====== Title ======-->
	<title>Covifarma</title>

	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--====== Favicon Icon ======-->
	<link rel="shortcut icon" href="assets/images/icon/covifarma-ico.ico" type="image/png">

	<!--====== Animate CSS ======-->
	<!-- <link rel="stylesheet" href="assets/css/animate.css"> -->

	<!--====== Line Icons CSS ======-->
	<link rel="stylesheet" href="assets/css/LineIcons.2.0.css">

	<!--====== Bootstrap CSS ======-->
	<link rel="stylesheet" href="assets/css/bootstrap-5.0.5-alpha.min.css">

	<!--====== Style CSS ======-->
	<link rel="stylesheet" href="assets/css/style.css">

	<!--==== Iconos ICOMOON =====-->
	<link rel="stylesheet" href="assets/icons/style.css" />
	<script src="assets/js/bootstrap.bundle.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="assets/js/jquery-tabledit/jquery.tabledit.js"></script>

	<!--==== Estilos de SWEETALERT2 =====-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
</head>

<body>
	<!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

	<!--====== PRELOADER PART START ======-->

	<div class="preloader">
		<div class="loader">
			<div class="ytp-spinner">
				<div class="ytp-spinner-container">
					<div class="ytp-spinner-rotator">
						<div class="ytp-spinner-left">
							<div class="ytp-spinner-circle"></div>
						</div>
						<div class="ytp-spinner-right">
							<div class="ytp-spinner-circle"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--====== PRELOADER PART ENDS ======-->

	<!--====== HEADER PART START ======-->

	<header class="header_area">
		<div id="header_navbar" class="header_navbar">
			<div class="container position-relative">
				<div class="row align-items-center">
					<div class="col-xl-12">
						<nav class="navbar navbar-expand-lg">
							<a class="navbar-brand" href="index.php">
								<img id="logo" src="assets/images/logo/logo-covifarma.png" alt="Logo">
							</a>
							<div class="search-area">
								<div class="container">
									<div class="search-wrapper">
										<form action="" method="POST">
											<div class="row justify-content-center">
												<div class="col-lg-3 col-sm-5 col-10">
													<div class="search-input">
														<label for="category"><i class="lni lni-grid-alt theme-color"></i></label>
														<select name="category" id="category">
															<option value="none" selected disabled>Categoría</option>
															<option value="zona">Zona de areas</option>
															<option value="infra">Infraestructura, accesorios complementarios</option>
														</select>

													</div>
												</div>
												<div class="col-lg-2 col-sm-5 col-10">
													<div class="search-btn">
														<button class="main-btn btn-hover" name="Buscar" value="Buscar">Buscar <i class="lni lni-search-alt"></i></button>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>

						</nav> <!-- navbar -->
					</div>
				</div> <!-- row -->
			</div> <!-- container -->
		</div> <!-- header navbar -->
	</header>

	<!--====== HEADER PART ENDS ======-->
	<main>
		<?php
		error_reporting(E_ALL ^ E_NOTICE);

		if ($_POST['Buscar']) {
			$xlista = $_POST['category'];
			if ($xlista == "zona") { ?>
				<section>
					<div class="container g-4 mt-100 row">
						<div class="row g-4 top-div">
							<center><label class="title">ZONAS/ÁREAS</label></center>
						</div>
						<div class="main">
							<form method="post" action="mantenedor/insertarZona.php" id="formulario">

								<!-- Text input -->
								<div class="form-outline mb-4">
									<input id="id" type="hidden" class="form-control" name="id" value="<?php echo $id; ?>" />
									<input type="hidden" id="codigo" class="form-control" name="codigo" />
									<label style="display: none;" class="form-label">Código</label>
								</div>

								<!-- Text input -->
								<div class="form-outline mb-4">
									<input type="text" id="nombreArea" class="form-control" name="nombreArea" required>
									<label class="form-label">Nombre de área</label>
								</div>

								<!-- Text input fecha-->
								<!-- <div class="form-outline mb-4">
									<input type="date" id="fecha" class="form-control" name="fecha" />
									<label class="form-label">Fecha</label>
								</div> -->

								<!-- Email input version-->
								<!-- <div class="form-outline mb-4">
									<input type="text" id="version" class="form-control" name="version" />
									<label class="form-label">Version</label>
								</div> -->

								<!-- Submit button -->
								<input id="boton" type="submit" name="insert" class="btn btn-primary" value="Guardar">
							</form>
							<div id="tablaAlmacenes" class="table-responsive " style="overflow: scroll;height: 600px; margin-top:100px;">

							</div>
						</div>
					</div>
				</section>
				<?php
			} else {
				if ($xlista == "infra") { ?>
					<section>
						<div class="container g-4 mt-100 row">
							<div class="row g-4 top-div">
								<center><label class="title">INFRAESTRUCTURA, ACCESORIOS COMPLEMENTARIOS</label></center>
							</div>
							<div class="main">
								<form method="post" id="formularioInfra">

									<!-- Text input -->
									<div class="form-outline mb-4">
										<input id="id" type="hidden" class="form-control" name="id" value="<?php echo $id; ?>" />
										<input type="hidden" id="codigo" class="form-control" name="codigo" />
										<label style="display: none;" class="form-label">Código</label>
									</div>

									<!-- Text input -->
									<div class="form-outline mb-4">
										<input type="text" id="nombreAccesorio" class="form-control" name="nombreAccesorio" required>
										<label class="form-label">Nombre</label>
									</div>
									<div class="form-outline mb-4">
										<select id="selectInfra" class="form-select" aria-label="Default select example">
											<option value="none" selected disabled>Seleccione Zona/Areas</option>
											<?php foreach ($datos as $lis) { ?>
												<option value="<?php echo $lis->id; ?>" class="option"><?php echo $lis->id; ?></option>
											<?php } ?>
										</select>
										<!-- <label class="form-label">Zona/Areas</label> -->
									</div>


									<!-- Text input fecha-->
									<!-- <div class="form-outline mb-4">
									<input type="date" id="fecha" class="form-control" name="fecha" />
									<label class="form-label">Fecha</label>
								</div> -->

									<!-- Email input version-->
									<!-- <div class="form-outline mb-4">
									<input type="text" id="version" class="form-control" name="version" />
									<label class="form-label">Version</label>
								</div> -->

									<!-- Submit button -->
									<input id="boton" type="submit" name="insert" class="btn btn-primary" value="Guardar">
								</form>
								<div id="tablaInfra" class="table-responsive " style="overflow: scroll;height: 600px; margin-top:100px;">

								</div>
							</div>
						</div>
					</section>
		<?php
				}
			}
		}
		?>
	</main>

	<div class="mx-auto col-lg-9 col-xl-9 col-md-10 pt-60 mb-60">


		<!--====== BACK TOP TOP PART START ======-->
		<a href="#" class="back-to-top btn-hover"><i class="lni lni-chevron-up"></i></a>
		<!--====== BACK TOP TOP PART ENDS ======-->

		<!--====== Bootstrap js ======-->
		<script src="assets/js/bootstrap.bundle-5.0.0.alpha-min.js"></script>

		<!--====== Bootstrap js ======-->
		<script src="assets/js/main.js"></script>
		<!--====== Sombreo de fila table ======-->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<!--====== Alertas configuradas ======-->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

		<!--====== Script de mantenedor ======-->
		<script src="mantenedor/js/mantenedor.js"></script>
	</div>
</body>

</html>