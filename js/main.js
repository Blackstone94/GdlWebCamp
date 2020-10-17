(function(){
    "use strict";
    document.addEventListener('DOMContentLoaded',function(){

      var mymap = L.map('mapid').setView([20.613784, -103.345776], 15);

      L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
          maxZoom: 18
      }).addTo(mymap);

      $('body.conferencia .navegacion-principal a:contains("Conferencia")').addClass('activo');
      $('body.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
      $('body.invitados .navegacion-principal a:contains("Invitados")').addClass('activo');


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

       //extras
       var camisas=document.getElementById('camisa_evento');
       var etiquetas=document.getElementById('etiquetas');

       calcular.addEventListener('click',calcularMontos);
       pase_dia.addEventListener('blur',mostrarDias);
       pase_completo.addEventListener('blur',mostrarDias);
       pase_dosDias.addEventListener('blur',mostrarDias);

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


    });//Dom cargado
})();

$(function(){

  /*Lettering*/
  $('.nombre-sitio').lettering();

  //Menu fijo
  var windowHeight=$(window).height();
  var barraAltura=$('.barra').innerHeight();
  $(window).scroll(function(){
    var scroll=$(window).scrollTop();
    if(scroll > windowHeight){
      $('.barra').addClass('fixed');
      $('body').css({'margin-top':barraAltura+'px'});
    }else{
      $('.barra').removeClass('fixed');
      $('body').css({'margin-top':'0px'});
    }
  });

  /*talleres*/
  $('div.ocultar').hide();
  $('.programa-evento .info-curso:first').show();
  $('.menu-programa a:first').addClass('activo');

  $('.menu-programa a').on('click',function(){
    $('.menu-programa a').removeClass('activo');
    $('.ocultar').hide();
    var enlacePrecionado=$(this).attr("href");
    $(this).addClass('activo');
    $(enlacePrecionado).fadeIn(1000);
      return false;
  });

  /**Animaciones numeros*/
  $('.resumen-evento li:nth-child(1) p').animateNumber({number: 6},1000);
  $('.resumen-evento li:nth-child(2) p').animateNumber({number: 15},1200);
  $('.resumen-evento li:nth-child(3) p').animateNumber({number: 3},1500);
  $('.resumen-evento li:nth-child(4) p').animateNumber({number: 9},1200);

  /**Cuenta regresiva*/
  $('.cuenta-regresiva').countdown('2020/09/04 00:08:00',function(event){
      $('#dias').html(event.strftime('%D'));
      $('#horas').html(event.strftime('%H'));
      $('#minutos').html(event.strftime('%M'));
      $('#segundos').html(event.strftime('%S'));
  });

  /**ColorBox **/
  $('.invitado-info').colorbox({inline:true,width:"50%"});
});
