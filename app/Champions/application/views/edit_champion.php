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
			<a class="btn btn-info" href="<?php echo base_url('/'); ?>" role="button"><i
					class="fas fa-arrow-left fa-fw"></i></a>
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
				<div class="col-md-3 text-center">
					<h4>Info Champion</h4>
					<form method="post" id="upload_form" enctype="multipart/form-data">
						<input value="<?php echo $id_champion; ?>" type="hidden" name="id_champion">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name" id="name" class="form-control" placeholder="Name">
						</div>
						<br>
						<div class="form-group">
							<label for="title">Title</label>
							<input type="text" name="title" id="title" class="form-control" placeholder="Title">
						</div>
						<br>
						<div class="form-group">
							<label for="lore">Lore</label>
							<textarea class="form-control" name="lore" id="lore" rows="3" placeholder="Lore"></textarea>
						</div>
						<br>
						<div class="form-group">
							<label for="tags">Tags <small>Separed by ','</small></label>
							<input type="text" name="tags" id="tags" class="form-control" placeholder="Tags">
						</div>
						<br>
						<div id="imgChampion"></div>
						<div class="form-group">
							<label for="image">Image</label>
							<input type="file" name="image" id="image" class="form-control"
								onchange="ValidateJPG(this);">
						</div>
						<br>
						<div id="iconChampion"></div>
						<div class="form-group">
							<label for="icon">Icon</label>
							<input type="file" name="icon" id="icon" class="form-control" onchange="ValidateJPG(this);">
						</div>
						<br>
						<div class="form-group text-center">
							<button name="enviarChamp" class="btn btn-success" id="btn_upload"
								type="submit">Editar</button>
						</div>
					</form>
				</div>
				<div class="col-md-3 text-center">
					<h4>Habilities Champion</h4>
					<div id="habilitiesChampion"></div>
				</div>
				<div class="col-md-3 text-center">
					<h4>Stats Champion</h4>
					<div id="statsChampion"></div>
				</div>
				<div class="col-md-3 text-center">
					<h4>Tips Champion</h4>
					<div id="tipsChampion"></div>
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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script>
		$(document).ready(function () {
			$('#upload_form').on('submit', function (e) {
				e.preventDefault();
				if ($('#title').val() == '' || $('#name').val() == '' || $('#lore').val() == '' || $('#tags')
					.val() == '') {
					alert("Faltan parametros");
				} else {
					$.ajax({
						url: "<?php echo base_url(); ?>api/v1/champions/update",
						//base_url() = http://localhost/tutorial/codeigniter  
						method: "POST",
						data: new FormData(this),
						contentType: false,
						cache: false,
						processData: false,
						success: function (data) {
							if (data['message'] == 'OK') {
								alert('Info Champion Actualizado.');
								location.reload();
							}
						}
					});
				}
			});

			// actualizar tip
			$(".editarTip").focusout(function () {
				var id = this.id;
				var split_id = id.split("_");
				var field_name = split_id[0];
				var edit_id = split_id[1];
				var value = $(this).text();

				$.ajax({
					url: '<?php echo base_url(); ?>api/v1/tips/update',
					type: 'post',
					data: {
						field: field_name,
						value: value,
						id: edit_id
					},
					success: function (response) {
						if (response['message'] == 'OK') {
							console.log('ACTUALIZADO.');
						} else {
							console.log("NO ACTUALIZADO.");
						}
					}
				});

			});

			// actualizar stat
			$(".editarStat").focusout(function () {
				var id = this.id;
				var split_id = id.split("_");
				var field_name = split_id[0];
				var edit_id = split_id[1];
				var value = $(this).text();

				if(field_name == 'modifier'){
					field_name = 'modifier_per_level';
				}

				$.ajax({
					url: '<?php echo base_url(); ?>api/v1/stats/update',
					type: 'post',
					data: {
						field: field_name,
						value: value,
						id: edit_id
					},
					success: function (response) {
						if (response['message'] == 'OK') {
							console.log('ACTUALIZADO STAT.');
						} else {
							console.log("NO ACTUALIZADO.");
						}
					}
				});

			});
		});

		var _validFileExtensions = [".jpg"];

		function ValidateJPG(oInput) {
			if (oInput.type == "file") {
				var sFileName = oInput.value;
				if (sFileName.length > 0) {
					var blnValid = false;
					for (var j = 0; j < _validFileExtensions.length; j++) {
						var sCurExtension = _validFileExtensions[j];
						if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length)
							.toLowerCase() == sCurExtension.toLowerCase()) {
							blnValid = true;
							break;
						}
					}

					if (!blnValid) {
						alert("Sorry, solo son validas las extensiones: " + _validFileExtensions.join(", "));
						oInput.value = "";
						return false;
					}
				}
			}
			return true;
		}

		$.ajax({
			type: 'ajax',
			url: '<?php echo base_url(); ?>api/v1/champions/get/id/<?php echo $id_champion; ?>',
			async: false,
			dataType: 'json',
			success: function (data) {
				$('#imgChampion').append($('<img class="img-responsive" width="70" />').attr('src', data.data[0]
					.image));

				document.getElementById("name").value = data.data[0].name;

				document.getElementById("lore").value = data.data[0].lore;

				document.getElementById("title").value = data.data[0].title;

				document.getElementById("tags").value = data.data[0].tags;

				$('#iconChampion').append($('<img class="img-responsive" width="70" />').attr('src', data.data[0].icon));

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
				html += '<th scope="col">ID</th>';
				html += '<th scope="col">Name</th>';
				html += '<th scope="col">Value</th>';
				html += '<th scope="col">Modifie per Level</th>';
				html += '</tr>';
				html += '</thead>';
				html += '<tbody>';
				html += '<tr>';
				var b;
				for (a = 0; a < data.data[0].stats.length; a++) {
					html += '<tr>';
					html += '<td scope="col">' + data.data[0].stats[a].id + '</td>';
					html += '<td scope="col"><div contentEditable="true" class="editarStat" id="name_' + data.data[0].stats[a].id +'">' + data.data[0].stats[a].name + '</div></td>';
					html += '<td scope="col"><div contentEditable="true" class="editarStat" id="value_' + data.data[0].stats[a].id +'">' + data.data[0].stats[a].value + '</div></td>';
					html += '<td scope="col"><div contentEditable="true" class="editarStat" id="modifier_' + data.data[0].stats[a].id +'">' + data.data[0].stats[a].modifier_per_level + '</div></td>';
					html += '</tr>';
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
				html += '<th scope="col">ID</th>';
				html += '<th scope="col">Tip</th>';
				html += '</tr>';
				html += '</thead>';
				html += '<tbody>';
				
				var t;
				for (t = 0; t < data.data[0].tips.length; t++) {
					html += '<tr>';
					html += '<td scope="col">' + data.data[0].tips[t].id + '</td>';
					html += '<td scope="col"><div contentEditable="true" class="editarTip" id="tip_' + data.data[0].tips[t].id +'">' + data.data[0].tips[t].tip + '</div></td>';
					html += '</tr>';
				}
				
				html += '</tbody>';
				html += '</table>';
				html += '</p>';

				$('#tipsChampion').html(html);
			}
		});
	</script>
</body>

</html>