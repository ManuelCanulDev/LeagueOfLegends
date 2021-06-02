$.ajax({
    type: 'ajax',
    url: '<?php echo base_url(); ?>api/v1/champions/get_all',
    async: false,
    dataType: 'json',
    success: function (data) {
        console.log(data.data.length);
        var i;
        var html = '';

        for (i = 0; i < data.data.length; i++) {
            
            html += '<div class="col-md-6 col-lg-3 mb-5 mb-md-0 text-center">';
            html +=
                '<div class="portfolio-item mx-auto mb-5" data-bs-toggle="modal" data-bs-target="#portfolioModal'+data.data[i].id+'">';
            html +=
                '<div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">';
            html +=
                '<div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-eye fa-3x"></i> <br> '+data.data[i].name+'</div>';
            html += '</div>';
            html += '<img class="img-fluid" src="<?php echo base_url('resources/'); ?>'+data.data[i].image+'" alt="'+data.data[i].name+'" />';
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
        console.log(data.data.length);
        var i;
        var html = '';

        for (i = 0; i < data.data.length; i++) {
            
            html += '<div class="portfolio-modal modal fade" id="portfolioModal'+data.data[i].id+'" tabindex="-1" aria-labelledby="portfolioModal'+data.data[i].id+'" aria-hidden="true">';
            html += '<div class="modal-dialog modal-xl">';
            html += '<div class="modal-content">';
            html += '<div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>';
            html += '<div class="modal-body text-center pb-5">';
            html += '<div class="container">';
            html += '<div class="row justify-content-center">';
            html += '<div class="col-lg-8">';
            html += '<h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">'+data.data[i].name+'</h2>';
            html += '<div class="divider-custom">';
            html += '<div class="divider-custom-line"></div>';
            html += '<div class="divider-custom-icon"><i class="fas fa-star"></i></div>';
            html += '<div class="divider-custom-line"></div>';
            html += '</div>';
            
            html += '<img class="img-fluid rounded mb-2" src="<?php echo base_url('resources/'); ?>'+data.data[i].icon+'" alt="'+data.data[i].name+'" /> <br> <h5 class="text-secondary text-uppercase">'+data.data[i].title+'</h5>';
            html += '<p class="mb-4">'+data.data[i].lore+'</p>';
            html += '<p class="mb-4">';
            html += '<p> Habilidades </p>';
            var v;
            for (v = 0; v < data.data[i].habilities.length; v++) {
                html += '<img data-placement="top" data-toggle="tooltip" class="img-fluid rounded m-1 jiji" src="<?php echo base_url('resources/'); ?>'+data.data[i].habilities[v].image+'" alt="'+data.data[i].habilities[v].name+'" title="'+data.data[i].habilities[v].name+'"/>';
            }
            html += '</p>';

            html += '<p class="mb-4">';
            html += '<p> Estadisticas </p>';
            html += '<table class="table table-striped">';
            html += '<thead>';
            html += '<tr>';
            var b;
            for (b = 0; b < data.data[i].stats.length; b++) {
                html += '<th scope="col">'+data.data[i].stats[b].name+'</th>';
            }
            html += '</tr>';
            html += '</thead>';
            html += '<tbody>';
            html += '<tr>';
            var b;
            for (a = 0; a < data.data[i].stats.length; a++) {
                html += '<th scope="col">'+data.data[i].stats[a].value+'</th>';
            }
            html += '</tr>';
            html += '<tr>';
            var n;
            for (n = 0; n < data.data[i].stats.length; n++) {
                html += '<th scope="col">'+data.data[i].stats[n].modifier_per_level+'</th>';
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
                var idjiji = b+1;
                html += '<th scope="col">'+idjiji+'</th>';
            }
            html += '</tr>';
            html += '</thead>';
            html += '<tbody>';
            html += '<tr>';
            var t;
            for (t = 0; t < data.data[i].tips.length; t++) {
                html += '<th scope="col">'+data.data[i].tips[t].tip+'</th>';
            }
            html += '</tr>';
            html += '</tbody>';
            html += '</table>';
            html += '</p>';
            html += '<button class="btn btn-warning" href="#!" data-bs-dismiss="modal"> <i class="fas fa-pen fa-fw"></i></button> <a class="btn btn-danger" href="#" role="button"><i class="fas fa-trash fa-fw"></i></a>';
            html += '</div></div></div></div></div></div></div>';
        }

        $('#championModals').html(html);
    }
});