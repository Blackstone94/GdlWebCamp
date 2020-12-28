
 $(document).ready(function(){
    //$('.sidebar-menu').tree();
    $('#registros').DataTable({
      "paging": true,
      "pageLength":10,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "language":{//modificar etiquetas en la tabla
          paginate: {
            next: 'Siguiente',
            previous: 'Anterior',
            last: 'Último',
            firs: 'Primero'
          },
          info: 'Mostrando _START_ a _END_ de _TOTAL_ resultados',
          emptyTable: 'No hay resultados',
          infoEmpty: '0 registros',
          search: 'Buscar'
        }
    });
    $('#crear-registro-admin').attr('disabled',true);

    $('#repetirPassword').on('blur',function(){
      var passwordNuevo=$('#password').val();
      if($(this).val()==passwordNuevo){
        $('#resultadoPassword').text('Correcto');
        $('#resultadoPassword').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('#crear-registro-admin').attr('disabled',false);
      }else{
        $('#resultadoPassword').text('No son iguales');
        $('#resultadoPassword').parents('.form-group').addClass('has-error').removeClass('has-success');
        $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
        $('#crear-registro-admin').attr('disabled',true);
      }
    });

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
        //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    $('#icono').iconpicker();


  $.getJSON('servicio-registrados.php', function(data){
    console.log(data);

    var fecha_registro=[];
    var cantidad_registro=[];

    for(var i=0; i< data.length; i++){
        fecha_registro[i]=data[i].fecha_registro;
        cantidad_registro[i]=data[i].resultado;
    }

    console.log(fecha_registro);

    console.log(cantidad_registro);

    var areaChartData = {
      labels  : fecha_registro,
      datasets: [
        {
          label               : 'Registrados',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : true,
          pointColor          : '#FFFFFF',
          pointStrokeColor    : '#FFFFFF',
          pointRadius         : '3',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#FFFFFF',
          data                : cantidad_registro
        }
      ]
    }

  var areaChartOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: true
    },
    scales: {
      xAxes: [{
        gridLines : {
          display : false,
        }
      }],
      yAxes: [{
        gridLines : {
          display : true,
        }
      }]
    }
  }

    var lineChartCanvas = $('#lineChart').get(0).getContext('2d');
    var lineChartOptions = jQuery.extend(true, {}, areaChartOptions);
    var lineChartData = jQuery.extend(true, {}, areaChartData);
    lineChartData.datasets[0].fill = false;
    /* lineChartData.datasets[1].fill = false; */
    lineChartOptions.datasetFill = false;

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    });

  });

 });
