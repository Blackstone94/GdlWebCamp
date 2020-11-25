
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
 });
