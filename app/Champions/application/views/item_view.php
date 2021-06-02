<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>League of Legends</title>
	<!-- Favicon-->
	<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
	<!-- Font Awesome icons (free version)-->
	<script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
	<!-- Google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
		type="text/css" />
	<!-- Core theme CSS (includes Bootstrap)-->
	<link href="<?php echo base_url('resources/assets/'); ?>css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
	<!-- Navigation-->
	<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
		<div class="container">
			<a class="navbar-brand" href="<?php echo base_url('/'); ?>">League of Legends</a>
			<button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button"
				data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
				aria-expanded="false" aria-label="Toggle navigation">
				Menu
				<i class="fas fa-bars"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ms-auto">
					<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
							href="<?php echo base_url('/'); ?>">Champions</a></li>
					<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
							href="<?php echo base_url('Items'); ?>">Items</a></li>
					<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
							href="<?php echo base_url('Runes'); ?>">Runes</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Masthead-->

	<!-- Portfolio Section-->
	<section class="page-section portfolio mt-5" id="portfolio">
		<div class="container">
			<!-- Portfolio Section Heading-->
			<h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Welcome to League of Legends
			</h2>
			<!-- Icon Divider-->
			<div class="divider-custom">
				<div class="divider-custom-line"></div>
				<div class="divider-custom-icon"><i class="fas fa-star"></i></div>
				<div class="divider-custom-line"></div>
			</div>
			<!-- Portfolio Grid Items-->
			<div class="row justify-content-center" id="championList"></div>
		</div>
	</section>

	<div id="championModals"></div>

	<!-- Copyright Section-->
	<div class="copyright py-4 text-center text-white">
		<div class="container"><small>Copyright &copy; Champions Api 2021</small></div>
	</div>
	<!-- Bootstrap core JS-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Core theme JS-->
	<script src="<?php echo base_url('resources/assets/'); ?>js/scripts.js"></script>

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

	<script>
		$.ajax({
			type: 'ajax',
			url: '<?php echo base_url(); ?>api/v1/items/get_all',
			async: false,
			dataType: 'json',
			success: function (data) {
				var i;
				var html = '';

				console.log(data.data.length);

				html = '<p class="mb-4">';
					html += '<table class="table table-striped">';
					html += '<thead>';
					html += '<tr>';
					html += '<th scope="col">Image</th>';
					html += '<th scope="col">Name</th>';
					html += '<th scope="col">Effect</th>';
					html += '</tr>';
					html += '</thead>';
					html += '<tbody>';

				var b;
					for (b = 0; b< data.data.length; b++) {
						html += '<tr>';
						html += '<th scope="col"><img class="img-fluid" src="<?php echo base_url('resources/'); ?>' + data.data[b].image + '" alt="' + data.data[b].image + '" /></th>';
						html += '<th scope="col">' + data.data[b].name + '</th>';
						html += '<th scope="col">' + data.data[b].effect + '</th>';
						html += '</tr>';
					}
					html += '</tbody>';
					html += '</table>';
					html += '</p>';
				$('#championList').html(html);
			}
		});
	</script>
</body>

</html>