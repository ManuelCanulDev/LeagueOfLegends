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

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h4>Add Champion</h4>
                    <form method="post" id="upload_form" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Title">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="name">Lore</label>
                            <textarea class="form-control" name="lore" id="lore" rows="3" placeholder="Lore"></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="name">Tags <small>Separed by ','</small></label>
                            <input type="text" name="tags" id="tags" class="form-control" placeholder="Tags">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="name">Image</label>
                            <input type="file" name="image" id="image" class="form-control"
                                onchange="ValidateJPG(this);">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="name">Icon</label>
                            <input type="file" name="icon" id="icon" class="form-control" onchange="ValidateJPG(this);">
                        </div>
                        <br>
                        <div class="form-group text-center">
                            <button name="enviarChamp" class="btn btn-success" id="btn_upload"
                                type="submit">Agregar</button>
                        </div>
                    </form>
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
                if ($('#title').val() == '' || $('#name').val() == '' || $('#lore').val() == '' || $('#tags').val() == '' || $('#image').val() == '' || $('#icon').val() == '') {
                    alert("Faltan parametros");
                } else {
                    $.ajax({
                        url: "<?php echo base_url(); ?>api/v1/champions/add",
                        //base_url() = http://localhost/tutorial/codeigniter  
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data) {
                            if(data['message'] == 'OK'){
                                alert('Champion "'+data['data']['name']+'" Agregad@');
                                var id = data['data']['id'];

                                window.location.href = "<?php echo base_url('add-hability'); ?>/" + id;
                            }
                        }
                    });
                }
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
    </script>

</body>

</html>