$(document).ready(function(){//termino de cargar el html
  $('#modelo-admin').on('submit',function(e){
     e.preventDefault();
     var datos=$(this).serializeArray();

     console.log(datos);
     console.log($(this).attr('action'));

     $.ajax({
        type: $(this).attr('method'),
        data: datos,
        url: $(this).attr('action'),
        dataType: 'json',
        success:function(data){
          var resultado=data;
          console.log(resultado);

          if(resultado.respuesta=='correcto'){
            swal(
              'Operacion satisfactoria!',
              'Se agrego correctamente el registro: ',
              'success'
            );
        /*    setTimeout(function(){
              window.location.href='lista-admin.php';
            },2000);*/
          }else{
            swal({
              icon: 'error',
              title: 'Error',
              text: resultado.detalle
            })
          }
     //     console.log(data);
        }
     })
  });
//borrar registros
$('.borrarRegistro').on('click',function(e){
  e.preventDefault();

  var id=$(this).attr('data-id');
  var tipo=$(this).attr('data-tipo');
  console.log('modelo-'+tipo+'.php');
  swal({
    title: "Estas seguro?",
    text: "Quieres eliminar este registro",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    buttons: ["Cancelar", "Si,eliminar"]
  })
  .then((willDelete) => {
    if (willDelete) {
      $.ajax({
        type:'post',
        data:{
          'id':id,
          'registro' : 'eliminar'
        },
        url:'modelo-'+tipo+'.php',

        success : function(data){
          var result=JSON.parse(data);
          if(result.respuesta=="correcto"){
            jQuery('[data-id="'+result.id+'"]').parents('tr').remove();
            swal(
              'Operacion satisfactoria!',
              'Se elimino correctamente el registro: ',
              'success'
            );
          }
        }
      });
    } else {
      swal("Your imaginary file is safe!");
    }
  });
});

//guardar registro con imagen
  $('#guardar-registro-archivos').on('submit',function(e){
    e.preventDefault();
    var datos=new FormData(this);

    console.log($(this).serializeArray());
    console.log($(this).attr('action')+" archivos");

    $.ajax({
       type: $(this).attr('method'),
       data: datos,
       url: $(this).attr('action'),
       dataType: 'json',
       contentType:false,
       processData:false,
       async: true,
       cache:false,
       success:function(data){
         var resultado=data;
         console.log(resultado);
         if(resultado.respuesta=='correcto'){
           swal(
             'Operacion satisfactoria!',
             'Se agrego correctamente el registro: ',
             'success'
           );
         }else{
           swal({
             icon: 'error',
             title: 'Error',
             text: 'Ocurrio un error',
           })
         }
       }
    })
  });
});
