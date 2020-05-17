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
       
       //extras
       var camisas=document.getElementById('camisa_evento');
       var etiquetas=document.getElementById('etiquetas');

       calcular.addEventListener('click',calcularMontos);
       
       function calcularMontos(event){
            event.preventDefault();
            if(regalo.value==''){
                alert("Debes elegir un regalo");
                regalo.focus();
            }else{
                var boletosDia=pase_dia.value,
                boletos2Dias=pase_dosDias.value,
                boletosCompleto=pase_completo.value,
                cantCamisas=camisas.value,
                cantEtiquetas=etiquetas.value;
                
                console.log("boleto dia:"+boletosDia);
                console.log("boletodos:"+boletos2Dias );
                console.log("completo "+boletosCompleto)
                
                var totalApagar=(boletosDia*30)+(boletos2Dias*45)+(boletosCompleto*50)+
                ((cantCamisas*10)*.93)+(cantEtiquetas*10);
                console.log("total "+totalApagar);
            }

       }
    });//Dom cargado
})();