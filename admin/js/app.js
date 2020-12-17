
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

 });
