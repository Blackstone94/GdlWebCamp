(function(){
    "use strict";
    document.addEventListener('DOMContentLoaded',function(){
      if(filename()=="index.php"){
      var mymap = L.map('mapid').setView([20.613784, -103.345776], 15);

      L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
          maxZoom: 18
      }).addTo(mymap);
    }
      $('body.conferencia .navegacion-principal a:contains("Conferencia")').addClass('activo');
      $('body.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
      $('body.invitados .navegacion-principal a:contains("Invitados")').addClass('activo');


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
  if(filename()=="invitados.php"){
    /**ColorBox **/
    $('.invitado-info').colorbox({inline:true,width:"50%"});
  }
});
