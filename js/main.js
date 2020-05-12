(function(){
    "use strict";
    document.addEventListener('DOMContentLoaded',function(){
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
       var resultado=document.getElementById("lista-productos");

    });//Dom cargado
})();