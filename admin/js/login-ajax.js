//logear admin
$(document).ready(function(){
  $('#login-admin').on('submit',function(e){
    e.preventDefault();
    var datos=$(this).serializeArray();
    $.ajax({
       type: $(this).attr('method'),
       data: datos,
       url: $(this).attr('action'),
       dataType: 'json',
       success : function(data){
        var resultado=data;
         if(resultado.respuesta=='correcto'){
           swal({
            title: 'Login correcto!',
            text: 'Bienvenido: '+data.nombre,
            icon: 'success'
           });
           setTimeout(function(){
            window.location.href='admin-area.php';
          },2000);
         }else{
           swal({
             icon: 'error',
             title: 'Error',
             text: data.error,
           })
           console.log(data);
         }
        // console.log(data);
       }
    })
  });
});


