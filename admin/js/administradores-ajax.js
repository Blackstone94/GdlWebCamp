$(document).ready(function(){//termino de cargar el html
  $('#modelo-admin').on('submit',function(e){
    console.log("hiciste click");
     e.preventDefault();
     var datos=$(this).serializeArray();

     console.log($(this).serializeArray());

     $.ajax({
        type: $(this).attr('method'),
        data: datos,
        url: $(this).attr('action'),
        dataType: 'json',
        success:function(data){
          var resultado=data;
          if(resultado.respuesta=='correcto'){
            swal(
              'Operacion satisfactoria!',
              'Se agrego correctamente el administrador: ',
              'success'
            );
            setTimeout(function(){
              window.location.href='lista-admin.php';
            },2000);
          }else{
            swal({
              icon: 'error',
              title: 'Error',
              text: 'Ocurrio un error',
            })
          }
          console.log(data);
        }
     })
  });
//borrar registros
$('.borrarRegistro').on('click',function(e){
  e.preventDefault();

  var id=$(this).attr('data-id');
  var tipo=$(this).attr('data-tipo');

  swal({
    title: "Estas seguro?",
    text: "Quieres eliminar este administrador",
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
            jQuery('[data-id="'+result.id_admin+'"]').parents('tr').remove();
            swal(
              'Operacion satisfactoria!',
              'Se elimino correctamente el administrador: ',
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

});
