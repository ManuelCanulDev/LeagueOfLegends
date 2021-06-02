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
			<a class="btn btn-success" href="<?php echo base_url('add-champion'); ?>" role="button">Agregar <i
					class="fas fa-plus fa-fw"></i></a>
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
			url: '<?php echo base_url(); ?>api/v1/champions/get_all',
			async: false,
			dataType: 'json',
			success: function (data) {
				var i;
				var html = '';

				for (i = 0; i < data.data.length; i++) {

					html += '<div class="col-md-6 col-lg-3 mb-5 mb-md-0 text-center">';
					html +=
						'<div class="portfolio-item mx-auto mb-5" data-bs-toggle="modal" data-bs-target="#portfolioModal' +
						data.data[i].id + '">';
					html +=
						'<div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">';
					html +=
						'<div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-eye fa-3x"></i> <br> ' +
						data.data[i].name + '</div>';
					html += '</div>';
					html += '<img class="img-fluid" src="<?php echo base_url('resources/'); ?>' + data.data[i].image + '" alt="' + data.data[i].name + '" />';
					html += '</div>';
					html += '</div> ';
				}

				$('#championList').html(html);
			}
		});

		$.ajax({
			type: 'ajax',
			url: '<?php echo base_url(); ?>api/v1/champions/get_all',
			async: false,
			dataType: 'json',
			success: function (data) {
				var i;
				var html = '';

				for (i = 0; i < data.data.length; i++) {

					html += '<div class="portfolio-modal modal fade" id="portfolioModal' + data.data[i].id +
						'" tabindex="-1" aria-labelledby="portfolioModal' + data.data[i].id +
						'" aria-hidden="true">';
					html += '<div class="modal-dialog modal-xl">';
					html += '<div class="modal-content">';
					html +=
						'<div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>';
					html += '<div class="modal-body text-center pb-5">';
					html += '<div class="container">';
					html += '<div class="row justify-content-center">';
					html += '<div class="col-lg-8">';
					html += '<h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">' + data.data[i]
						.name + '</h2>';
					html += '<div class="divider-custom">';
					html += '<div class="divider-custom-line"></div>';
					html += '<div class="divider-custom-icon"><i class="fas fa-star"></i></div>';
					html += '<div class="divider-custom-line"></div>';
					html += '</div>';

					html += '<img class="img-fluid rounded mb-2" src="<?php echo base_url('resources/'); ?>' + data.data[i].icon + '" alt="' + data.data[i].name +
						'" /> <br> <h5 class="text-secondary text-uppercase">' + data.data[i].title + '</h5>';
					html += '<p class="mb-4">' + data.data[i].lore + '</p>';
					html += '<p class="mb-4">';
					html += '<p> Habilidades </p>';
					var v;
					for (v = 0; v < data.data[i].habilities.length; v++) {
						html +=
							'<img data-placement="top" data-toggle="tooltip" class="img-fluid rounded m-1 jiji" src="<?php echo base_url('resources/'); ?>' + data.data[i].habilities[v].image + '" alt="' + data.data[i]
							.habilities[v].name + '" title="' + data.data[i].habilities[v].name + '"/>';
					}
					html += '</p>';

					html += '<p class="mb-4">';
					html += '<p> Estadisticas </p>';
					html += '<table class="table table-striped">';
					html += '<thead>';
					html += '<tr>';
					var b;
					for (b = 0; b < data.data[i].stats.length; b++) {
						html += '<th scope="col">' + data.data[i].stats[b].name + '</th>';
					}
					html += '</tr>';
					html += '</thead>';
					html += '<tbody>';
					html += '<tr>';
					var b;
					for (a = 0; a < data.data[i].stats.length; a++) {
						html += '<th scope="col">' + data.data[i].stats[a].value + '</th>';
					}
					html += '</tr>';
					html += '<tr>';
					var n;
					for (n = 0; n < data.data[i].stats.length; n++) {
						html += '<th scope="col">' + data.data[i].stats[n].modifier_per_level + '</th>';
					}
					html += '</tr>';
					html += '</tbody>';
					html += '</table>';
					html += '</p>';

					html += '<p class="mb-4">';
					html += '<p> Tips </p>';
					html += '<table class="table table-striped">';
					html += '<thead>';
					html += '<tr>';
					var b;
					for (b = 0; b < data.data[i].tips.length; b++) {
						var idjiji = b + 1;
						html += '<th scope="col">' + idjiji + '</th>';
					}
					html += '</tr>';
					html += '</thead>';
					html += '<tbody>';
					html += '<tr>';
					var t;
					for (t = 0; t < data.data[i].tips.length; t++) {
						html += '<th scope="col">' + data.data[i].tips[t].tip + '</th>';
					}
					html += '</tr>';
					html += '</tbody>';
					html += '</table>';
					html += '</p>';
					html +=
						'<button class="btn btn-warning" href="#!" data-bs-dismiss="modal"> <i class="fas fa-pen fa-fw"></i></button> <a id="championDelete' + data.data[i].id + '" class="btn btn-danger" href="#" role="button"><i class="fas fa-trash fa-fw"></i></a> <a class="btn btn-info" href="<?php echo base_url('view-champion'); ?>/' + data.data[i].id +
						'" role="button"><i class="fas fa-eye fa-fw"></i></a>';
					html += '</div></div></div></div></div></div></div>';
				}

				$('#championModals').html(html);
			}
		});

		$("a").click(function () {
			var str = this.id;
			var matches = str.match(/(\d+)/);
			console.log(matches);
			var n = str.includes("championDelete");
			if(n){
				$.ajax({
					type: 'ajax',
					url: '<?php echo base_url(); ?>api/v1/champions/delete/id_champion/'+matches[0],
					async: false,
					dataType: 'json',
					success: function (data) {
						if(data['message'] == 'OK'){
							alert('ELIMINADO');
							location.reload();
						}
					}
				});
			}
		});
	</script>
</body>

</html>