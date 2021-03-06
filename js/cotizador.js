document.addEventListener('DOMContentLoaded',function(){
  if(filename()=="registro.php" || filename()=="crear-registrados.php"
  || filename().includes("editar-registrados.php")){
    console.log("entro");
    // variable usuario
     var nombre=document.getElementById("nombre");
     var apellido=document.getElementById("apellido");
     var email=document.getElementById("email");

     //campos pases
     var pase_dia=document.getElementById("pase_dia");
     var pase_completo=document.getElementById("pase_completo");
     var pase_dosDias=document.getElementById("pase_dosDias");

     //botones y divs
     var calcular=document.getElementById("calcular");
     var errorDiv=document.getElementById("error");
     var botonRegistro=document.getElementById("btnRegistro");
     var lista_productos=document.getElementById("lista-productos");
     var suma=document.getElementById("suma-total");

     botonRegistro.disabled=true;
     //extras
     var camisas=document.getElementById('camisa_evento');
     var etiquetas=document.getElementById('etiquetas');

     calcular.addEventListener('click',calcularMontos);
     pase_dia.addEventListener('blur',mostrarDias);
     pase_completo.addEventListener('blur',mostrarDias);
     pase_dosDias.addEventListener('blur',mostrarDias);

     var formularioEditar=document.getElementsByClassName("editar-registrados");
     if(formularioEditar.length>0){
      if(pase_dia.value || pase_completo.value || pase_dosDias.value){
        console.log("condicion ok ");
        mostrarDias();
      }
     }

     nombre.addEventListener('blur',validarCampos);
     apellido.addEventListener('blur',validarCampos);
     email.addEventListener('blur',validarCampos);
     email.addEventListener('blur',validarMail);

     function validarCampos(){
      if(this.value==''){
          errorDiv.style.display='block';
          errorDiv.innerHTML="este campo es obligatorio";
          this.style.border='1px solid red';
          errorDiv.style.border='1px solid red';
      }else{
          errorDiv.style.display='none';
          this.style.border='1px solid #cccccc'
      }
     }
     function validarMail(){
         if(this.value.indexOf('@')>-1){
             errorDiv.style.display='none';
             errorDiv.style.border='1px solid #cccccc';
         }else{
          errorDiv.style.display='block';
          errorDiv.innerHTML="El correo debe de tener  un @";
          this.style.border='1px solid red';
          errorDiv.style.border='1px solid red';
         }
     }
     function calcularMontos(event){
          event.preventDefault();
          if(regalo.value==''){
              alert("Debes elegir un regalo");
              regalo.focus();
          }else{
              var boletosDia=parseInt(pase_dia.value,10) || 0 ,
              boletos2Dias=parseInt(pase_dosDias.value,10) || 0 ,
              boletosCompleto=parseInt(pase_completo.value,10) || 0 ,
              cantCamisas=parseInt(camisas.value,10) || 0 ,
              cantEtiquetas=parseInt(etiquetas.value,10) || 0 ;

              var totalApagar=(boletosDia*30)+(boletos2Dias*45)+(boletosCompleto*50)+
              ((cantCamisas*10)*.93)+(cantEtiquetas*10);
              console.log("total "+totalApagar);

              var listadoProductos=[];
              if(boletosDia>0){
                  listadoProductos.push(boletosDia+" Boletos por dia");
              }
              if(boletos2Dias>0){
                  listadoProductos.push(boletos2Dias+" Boletos dos dias");
              }
              if(boletosCompleto>0){
                  listadoProductos.push(boletosCompleto+" Boletos compeltos");
              }
              if(cantCamisas>0){
                  listadoProductos.push(cantCamisas+" Camisas");
              }
              if(cantEtiquetas>0){
                  listadoProductos.push(cantEtiquetas+" Etiquetas");
              }
              console.log(listadoProductos);

              lista_productos.innerHTML='';
              lista_productos.style.display="block";
              for(var i=0; i<listadoProductos.length;i++){
                  lista_productos.innerHTML+=listadoProductos[i]+'<br>'
              }
              suma.innerHTML= "$ "+totalApagar.toFixed(2);
              botonRegistro.disabled=false;
              document.getElementById('total_pedido').value = totalApagar;

          }//elegir regalo
     }//calcular montos

     function mostrarDias(){
      var boletoDia=parseInt(pase_dia.value,10) || 0 ,
      boleto2Dias=parseInt(pase_dosDias.value,10) || 0 ,
      boletoCompleto=parseInt(pase_completo.value,10) || 0;

         var diasElegidos=[];
         if(boletoDia>0){
             diasElegidos.push('viernes');
         }
         if(boleto2Dias>0){
             diasElegidos.push('viernes','sabado');
         }
         if(boletoCompleto>0){
              diasElegidos.push('viernes','sabado','domingo');
         }
         for(var i=0;i<diasElegidos.length;i++){
             document.getElementById(diasElegidos[i]).style.display='block';
         }
     }

    }
});

function filename(){//nombre del archivo actual
  var rutaAbsoluta = self.location.href;
  var posicionUltimaBarra = rutaAbsoluta.lastIndexOf("/");
  var rutaRelativa = rutaAbsoluta.substring( posicionUltimaBarra + "/".length , rutaAbsoluta.length );
  return rutaRelativa;
}
