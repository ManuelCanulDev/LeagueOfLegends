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
		<a class="btn btn-info" href="<?php echo base_url('/'); ?>" role="button"><i class="fas fa-arrow-left fa-fw"></i></a>
			<!-- Portfolio Section Heading-->
			<div id="nameChampion"></div>
			<!-- Icon Divider-->
			<div class="divider-custom">
				<div class="divider-custom-line"></div>
				<div class="divider-custom-icon"><i class="fas fa-star"></i></div>
				<div class="divider-custom-line"></div>
			</div>
			<!-- Portfolio Grid Items-->
			<div class="row justify-content-center">
				<div class="col-md-12 text-center">
					<div id="imgChampion"></div>
					<br>
					<div id="titleChampion"></div>
				</div>
			</div>
			<br>
			<div class="row justify-content-center">
				<div class="col-md-12 text-center">
					<div id="loreChampion"></div>
					<br>
					<h5>Habilidades</h5>
					<div id="habilitiesChampion"></div>
					<br>
					<h5>Stats</h5>
					<div id="statsChampion"></div>
					<br>
					<h5>Tips</h5>
					<div id="tipsChampion"></div>
					<br>
					<h5>Tags</h5>
					<div id="tagsChampion"></div>
					<br>
					<h5>Icon</h5>
					<div id="iconChampion"></div>
				</div>
			</div>
		</div>
	</section>

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
			url: '<?php echo base_url(); ?>api/v1/champions/get/id/<?php echo $id_champion; ?>',
			async: false,
			dataType: 'json',
			success: function (data) {
				var srcImage = data.data[0].image;
				$('#imgChampion').append($('<img class="img-responsive" />').attr('src', srcImage));

				$('#nameChampion').html('<h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">' + data.data[0].name + '</h2>');
				$('#loreChampion').html('<p class="mb-4">' + data.data[0].lore + '</p>');
				$('#titleChampion').html('<h5 class="text-secondary text-uppercase">' + data.data[0].title +
					'</h5>');

				html = '';

				html += '<p class="mb-4">';
				var v;
				for (v = 0; v < data.data[0].habilities.length; v++) {
					html +=
						'<img data-placement="top" data-toggle="tooltip" class="img-fluid rounded m-1 jiji" src="<?php echo base_url('resources/'); ?>' + data.data[0].habilities[v].image + '" alt="' + data.data[0].habilities[v].name + '" title="' + data.data[0].habilities[v].name + '"/>';
				}
				html += '</p>';

				$('#habilitiesChampion').html(html);

				html = '<p class="mb-4">';
					html += '<table class="table table-striped">';
					html += '<thead>';
					html += '<tr>';
					var b;
					for (b = 0; b < data.data[0].stats.length; b++) {
						html += '<th scope="col">' + data.data[0].stats[b].name + '</th>';
					}
					html += '</tr>';
					html += '</thead>';
					html += '<tbody>';
					html += '<tr>';
					var b;
					for (a = 0; a < data.data[0].stats.length; a++) {
						html += '<th scope="col">' + data.data[0].stats[a].value + '</th>';
					}
					html += '</tr>';
					html += '<tr>';
					var n;
					for (n = 0; n < data.data[0].stats.length; n++) {
						html += '<th scope="col">' + data.data[0].stats[n].modifier_per_level + '</th>';
					}
					html += '</tr>';
					html += '</tbody>';
					html += '</table>';
					html += '</p>';

					$('#statsChampion').html(html);


					html = '<p class="mb-4">';
					html += '<table class="table table-striped">';
					html += '<thead>';
					html += '<tr>';
					var b;
					for (b = 0; b < data.data[0].tips.length; b++) {
						var idjiji = b + 1;
						html += '<th scope="col">' + idjiji + '</th>';
					}
					html += '</tr>';
					html += '</thead>';
					html += '<tbody>';
					html += '<tr>';
					var t;
					for (t = 0; t < data.data[0].tips.length; t++) {
						html += '<th scope="col">' + data.data[0].tips[t].tip + '</th>';
					}
					html += '</tr>';
					html += '</tbody>';
					html += '</table>';
					html += '</p>';

					$('#tipsChampion').html(html);

					$('#tagsChampion').html('<p class="mb-4">' + data.data[0].tags + '</p>');

					$('#iconChampion').append($('<img class="img-responsive" />').attr('src', data.data[0].icon));
			}
		});
	</script>
</body>

</html>