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
       var lista_productos=document.getElementById("lista-productos");
       var suma=document.getElementById("suma-total");
       
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

       }
    });//Dom cargado
})();