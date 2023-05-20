<?php
require_once "mantenedor/DataBaseA.php";
require_once "mantenedor/registrar.php";
$conexion = new DataBase();
$dats = $conexion->Conectar();

$mostrar = new m_almacen();
$data = $mostrar->MostrarAlmacenMuestra();
$contador = 0;
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

	<!--====== Tiny slider CSS ======-->
	<!-- <link rel="stylesheet" href="assets/css/tiny-slider.css"> -->

	<!--====== glightbox CSS ======-->
	<!-- <link rel="stylesheet" href="assets/css/glightbox.min.css"> -->

	<!--====== Line Icons CSS ======-->
	<link rel="stylesheet" href="assets/css/LineIcons.2.0.css">

	<!--====== Selectr CSS ======-->
	<!-- <link rel="stylesheet" href="assets/css/selectr.css"> -->

	<!--====== Nouislider CSS ======-->
	<!-- <link rel="stylesheet" href="assets/css/nouislider.css"> -->

	<!--====== Bootstrap CSS ======-->
	<link rel="stylesheet" href="assets/css/bootstrap-5.0.5-alpha.min.css">

	<!--====== Style CSS ======-->
	<link rel="stylesheet" href="assets/css/style.css">

	<!--==== Iconos ICOMOON =====-->
	<link rel="stylesheet" href="assets/icons/style.css" />
	<script src="assets/js/bootstrap.bundle.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
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
									<input type="text" id="codigo" class="form-control" name="codigo" />
									<label class="form-label">Código</label>
								</div>

								<!-- Text input -->
								<div class="form-outline mb-4">
									<input type="text" id="nombreArea" class="form-control" name="nombreArea" required>
									<label class="form-label">Nombre de área</label>
								</div>

								<!-- Text input -->
								<div class="form-outline mb-4">
									<input type="text" id="fecha" class="form-control" name="fecha" />
									<label class="form-label">Fecha</label>
								</div>

								<!-- Email input -->
								<div class="form-outline mb-4">
									<input type="text" id="version" class="form-control" name="version" />
									<label class="form-label">Version</label>
								</div>

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
				if ($xlista == "infra") {
					include 'infraestructura.php';
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

		<script>
			if (document.querySelector("#formulario")) {
				let frm = document.querySelector("#formulario");
				frm.onsubmit = function(e) {
					e.preventDefault();
					fntGuardar();
					reset();

				}

				async function fntGuardar() {
					try {
						const data = new FormData(frm);
						let res = await fetch('mantenedor/insertarZona.php', {
							method: 'POST',
							body: data
						});
						cargarTabla();

						// console.log(res);

					} catch (error) {
						console.log("Ocurrio un error " + error);
					}
				}

				function reset() {
					let frm = document.querySelector("#formulario");
					frm.reset();
				}
			}
		</script>
		<script>
			$(document).ready(function() {
				// Cargar la tabla al cargar la página
				cargarTabla();
			});
		</script>
		<script>
			function cargarTabla() {
				$.ajax({
					url: 'mantenedor/tabla.php',
					type: 'GET',
					success: function(data) {
						$("#tablaAlmacenes").html(data);
					},
					error: function(xhr, status, error) {
						console.error('Error al cargar los datos de la tabla:', error);
					}
				});
			}
		</script>


</body>

</html>