@extends('layouts.app')

@section('content')
<div class="container">
    
    <!--começa CALCULADORA-->
    @if (Session::get('novo') == 'y')
    <div class="row">
        <div class="col">
            <center><h5>Bem vindo Sr.(a) {{ Auth::user()->name }}</h5></center>
            <center><h6>Por favor, preencha o formulário abaixo!</h6></center>
            <center><h6>Você fará isso somente uma vez!</h6></center>    
        </div>
        
    </div>
    @else
    <div id="calculadora">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Calculadora de Bordados Eletrônicos</div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                    <!--calc-->
                    @include('calc')
                    <!--fecha calc-->
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!--termina CALCULADORA-->
<hr>
<!--PARÂMETROS GLOBAIS-->
@include('parametros')
<!--FECHA GLOBAIS-->

</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
<script type="text/javascript">
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
  })
</script>

<script type="text/javascript">
    $( document ).ready(function() {
            $('#val_desenvolvimento').hide();
            document.getElementById("desenv_s").onclick = function() {desenvol()};
            document.getElementById("desenv_n").onclick = function() {desenvol2()};

            function desenvol(){
                $('#val_desenvolvimento').show();
            }

            function desenvol2(){
                $('#val_desenvolvimento').hide();
            }

            var slider = document.getElementById("nivel_l");
            var output = document.getElementById("val_l");
            output.innerHTML = slider.value; // Display the default slider value

            // Update the current slider value (each time you drag the slider handle)
            slider.oninput = function() {
              output.innerHTML = this.value;
            } 

            var slider_m = document.getElementById("nivel_m");
            var output_m = document.getElementById("val_m");
            output_m.innerHTML = slider_m.value; // Display the default slider value

            // Update the current slider value (each time you drag the slider handle)
            slider_m.oninput = function() {
              output_m.innerHTML = this.value;
            }

            var slider_c = document.getElementById("nivel_c");
            var output_c = document.getElementById("val_c");
            output_c.innerHTML = slider_c.value; // Display the defaultç slider value

            // Update the current slider value (each time you drag the slider handle)
            slider_c.oninput = function() {
              output_c.innerHTML = this.value;
            } 


            var sabe = 'y';
            $('#pts').hide();
           document.getElementById("pt").onclick = function() {imagens()};

           function imagens(){
                sabe = 'n';
                botao = document.querySelector("#pontos");
                botao.setAttribute("disabled", "disabled");
                botao.setAttribute("placeholder", "O valor será definido!");
                $('#pts').show();
           }

           document.getElementById("outro").onclick = function() {outros()};

            var cm_quadrado = 0;
           
           function outros(){
            
            var altura = $('#b1').val();
            var largura = $('#b2').val();
            var total_quadrado = altura*largura;

            var tipo = $('input[name="tipo"]:checked').val();

                if (tipo == 'l') {
                   
                    if (total_quadrado <= 30) {
                        cm_quadrado = 305,5;    
                    }else if(total_quadrado >= 31 <= 80) {
                        cm_quadrado = 194;
                    }else if (total_quadrado >= 81 <= 150){
                        cm_quadrado = 178,2;
                    }else{
                        cm_quadrado = 130,1;
                    }

                    if (slider.value == 1) {
                        reducao = 50/100;
                    } else if (slider.value == 2){
                        reducao = 40/100;
                    } else if (slider.value == 3){
                        reducao = 30/100;
                    } else if (slider.value == 4){
                        reducao = 20/100;
                    } else if (slider.value == 5){
                        reducao = 10/100;
                    } else {
                        reducao = 0;
                    }

                }

                if (tipo == 'm') {

                    if (total_quadrado <= 30) {
                        cm_quadrado = 350,5;    
                    }else if(total_quadrado >= 31 <= 80) {
                        cm_quadrado = 205;
                    }else if (total_quadrado >= 81 <= 150){
                        cm_quadrado = 196;
                    }else{
                        cm_quadrado = 142,5;
                    }

                    if (slider_m.value == 1) {
                        reducao = 50/100;
                    } else if (slider_m.value == 2){
                        reducao = 40/100;
                    } else if (slider_m.value == 3){
                        reducao = 30/100;
                    } else if (slider_m.value == 4){
                        reducao = 20/100;
                    } else if (slider_m.value == 5){
                        reducao = 10/100;
                    } else {
                        reducao = 0;
                    }

                }
                if (tipo == 'c') {
                    
                    if (total_quadrado <= 30) {
                        cm_quadrado = 389,5;    
                    }else if(total_quadrado >= 31 <= 80) {
                        cm_quadrado = 246;
                    }else if (total_quadrado >= 81 <= 150){
                        cm_quadrado = 215;
                    }else{
                        cm_quadrado = 156,5;
                    }

                    if (slider_c.value == 1) {
                        reducao = 50/100;
                    } else if (slider_c.value == 2){
                        reducao = 40/100;
                    } else if (slider_c.value == 3){
                        reducao = 30/100;
                    } else if (slider_c.value == 4){
                        reducao = 20/100;
                    } else if (slider_c.value == 5){
                        reducao = 10/100;
                    } else {
                        reducao = 0;
                    }
                }

                pontos_originais = total_quadrado*cm_quadrado;
                pontos_totais = total_quadrado*cm_quadrado;
                pontos_totais = pontos_totais - (reducao * pontos_totais);
                botao.setAttribute("placeholder", pontos_totais);
                $('#pts').hide();
                alert('Seu número de pontos para cálculo: ' + pontos_totais);

           }


        // função de arredondamento do total
        
        (function(){

            /**
             * Ajuste decimal de um número.
             *
             * @param   {String}    type    O tipo de arredondamento.
             * @param   {Number}    value   O número a arredondar.
             * @param   {Integer}   exp     O expoente (o logaritmo decimal da base pretendida).
             * @returns {Number}            O valor depois de ajustado.
             */
            function decimalAdjust(type, value, exp) {
                // Se exp é indefinido ou zero...
                if (typeof exp === 'undefined' || +exp === 0) {
                    return Math[type](value);
                }
                value = +value;
                exp = +exp;
                // Se o valor não é um número ou o exp não é inteiro...
                if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0)) {
                    return NaN;
                }
                // Transformando para string
                value = value.toString().split('e');
                value = Math[type](+(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp)));
                // Transformando de volta
                value = value.toString().split('e');
                return +(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp));
            }

            // Arredondamento decimal
            if (!Math.round10) {
                Math.round10 = function(value, exp) {
                    return decimalAdjust('round', value, exp);
                };
            }
            // Decimal arredondado para baixo
            if (!Math.floor10) {
                Math.floor10 = function(value, exp) {
                    return decimalAdjust('floor', value, exp);
                };
            }
            // Decimal arredondado para cima
            if (!Math.ceil10) {
                Math.ceil10 = function(value, exp) {
                    return decimalAdjust('ceil', value, exp);
                };
            }

        })();
        //termina arredondamento

         $('#valor').hide();
        
        // AQUI ESTÁ O CÓDIGO PARA FAZER O CÁLCULO

        //dados do banco para cálculo
        // variável $t conta o número de itens na colection que vem do controller
        
        @if ($con_parametros > 0)
            var val_mil_pontos = 0.75;
            var entretela = {{ $parametros->entretela }};
            var tnt = {{ $parametros->tnt }};
            var linha_sup = {{ $parametros->linha_sup }};
            var linha_bob = {{ $parametros->linha_bob }};
            var pontos_min = {{ $parametros->pontos_min }};
            var lucro = "6";
            
        @else {
            var val_mil_pontos = 0;
            var entretela = 0;
            var tnt = 0;
            var linha_sup = 0;
            var linha_bob = 0;
            var pontos_min = 0;
            var lucro = 0;
            }
        @endif
        // termina dados do banco

            document.getElementById("calcula").onclick = function() {myFunction()};
                
                //VALORES DIGITADOS NA CALCULADORA
                //$('#tecido').focusout(function(){
                    function myFunction(){
                        
                        if (sabe == 'n') {
                            var mil_pontos = pontos_totais;          
                        }else{
                            var mil_pontos = parseInt($('#pontos').val());
                        }
                  
                  var cores = parseInt($('#cores').val());
                  var d = $('input[name="desenvolvimento"]:checked').val();
                  var entret = $('#entret:checked').val();
                  var tn = $('#tn:checked').val();
                  var qtn = parseInt($('#qtn').val());
                  var desconto = $('#desconto').val();
                  var bast1 = parseInt($('#t1').val());
                  var bast2 = parseInt($('#t2').val());
                  var tecido = parseInt($('#tecido').val());
                  var desenv2 = $('input[name="desenvolvimento2"]:checked').val();

                  var divideMil = mil_pontos / 1000;
                  var val_final_mil_pontos = divideMil * val_mil_pontos;
                 
             
                     if (d == 'S') {
                        val_desenvolvimento = parseInt($('#val_desenvolvimento').val());
                     }else{
                        val_desenvolvimento = 0;
                     }

                  //if (desenv == 'S') {
                  //  var desenvolvimento = divideMil*1.2;
                  //} else {
                  //  var desenvolvimento = 0;
                  //}

                  //cálculo de entretela e TNT
                    var tamEntret = 100 * 140;
                    var bastidor = bast1 * bast2;

                    //valor em reais da entretela 
                    if (entret ==  'e') {
                        var valor_final_entret = (bastidor * entretela)/tamEntret;
                    } else {
                        var valor_final_entret = 0;
                    }
                    //valor em reais do tnt
                    if (tn == 't') {
                        var valor_final_tnt = (bastidor * tnt)/tamEntret;
                    } else {
                        var valor_final_tnt = 0;
                    }

                    //valor em reais da linha superior

                    var ln_s = linha_sup / 4000; //valor por metro
                    var ln_s_gasta = divideMil * 5; //METROS UTILIZADOS DE LINHA SUPERIOR
                    
                    var val_final_ln_s = ln_s * ln_s_gasta;

                    //valor em reais da linha de bobina

                    var ln_b = linha_bob / 16000; //valor por metro
                    var ln_b_gasta = divideMil * 0.5; //METROS UTILIZADOS DE LINHA de bobina
                    
                    var val_final_ln_b = ln_b * ln_b_gasta;

                    //cobrar 0,8 centavos por hora de desgaste da máquina
                    var tempo = (mil_pontos / pontos_min)*2;
                    var minutos = 0.8 / 60;
                    var desgaste = tempo * minutos;

                    //hora trabalhada
                        //levando em consideração 2000 reais por mês se 1 linha - hora trabalhada = 2.77
                    //levando em consideração 2500 reais por mês se 2 ou 3 linhas - hora trabalhada = 3.47
                    //levando em consideração 3000 reais por mês se 4 ou 8 linhas - hora trabalhada = 4.16
                    //levando em consideração 4000 reais por mês se > 8 linhas - hora trabalhada = 5.55
                    var valor_hora = (lucro / 30) / 24;

                    if (cores == 1) {
                        hora_trabalhada = (valor_hora*tempo)/60;
                    } else if (cores > 1 && cores < 4) {
                        hora_trabalhada = ((valor_hora*tempo)/60) + 0.5;
                    } else if (cores > 3 && cores < 9) {
                        hora_trabalhada = ((valor_hora*tempo)/60) + 1;
                    } else if (cores > 8) {
                        hora_trabalhada = ((valor_hora*tempo)/60) + 1.5;
                    }


                
                var val_final_tecido = qtn * tecido;

                  var total = (valor_final_entret + valor_final_tnt + val_final_ln_s + val_final_ln_b + desgaste + val_final_mil_pontos + hora_trabalhada)*qtn + val_final_tecido + val_desenvolvimento;
                  
                  if (desconto > 0){
                        var desc = desconto / 100;
                        total = total - (desc * total);
                    } 
                
                  var elemResult = document.getElementById("total");
                  var elemResult2 = document.getElementById("texto");
                  //alert(total);
                  if (desenv2 == 'D'){
                    var des = (divideMil*1)+hora_trabalhada;
                    elemResult.textContent = 'Valor a ser cobrado: R$' + Math.round10(des, -1);
                    var ele = document.getElementsByName("desenvolvimento2");
                    for(var i=0;i<ele.length;i++) 
                        ele[i].checked = false;
                    elemResult2.textContent = 'Desenvolvimento de Matriz';  
                  }else{
                    elemResult.textContent = 'Valor a ser cobrado: R$' + Math.round10(total, -1); 
                    elemResult2.textContent = 'Valor do Bordado';  
                  }
                 
                };
    });

var tipo = '{{session::get('novo')}}';

if (tipo == 'n') {
    $('.hidden').hide();
}

   $(function () {


        $('.showButton').click(function () {

            $('.hidden').show();

            $('.show').hide();

        });

        $('.hideButton').click(function () {

            $('.hidden').hide();

            $('.show').show();

        });

    });

   
   
</script> 
@endsection
