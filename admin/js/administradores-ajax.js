$(document).ready(function(){//termino de cargar el html
  $('#crear-admin').on('submit',function(e){
     e.preventDefault();
     var datos=$(this).serializeArray();

     $.ajax({
        type: $(this).attr('method'),
        data: datos,
        url: $(this).attr('action'),
        dataType: 'json',
        success:function(data){
          var resultado=data;
          if(resultado.respuesta=='correcto'){
            Swal.fire(
              'Operacion satisfactoria!',
              'Se agrego correctamente el administrador: ',
              'success'
            );
          }else{
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'Ocurrio un error',
            })
          }
          console.log(data);
        }
     })
  });

  $('#login-admin').on('submit',function(e){
    e.preventDefault();
    var datos=$(this).serializeArray();
  //  console.log(datos);
    $.ajax({
       type: $(this).attr('method'),
       data: datos,
       url: $(this).attr('action'),
       dataType: 'json',
       success:function(data){
         console.log(data);


        var resultado=data;
         if(resultado.respuesta=='correcto'){
           Swal.fire({
            title: 'Login correcto!',
            text: 'Bienvenido: '.data.nombre,
            icon: 'success'
           })
           head('admin-area.php');
         }else{
           Swal.fire({
             icon: 'error',
             title: 'Error',
             text: data.error,
           })
         }
        // console.log(data);
       }
    })
 });
});
