$(function(){
    /* TRATAMENTO DO CALENDÁRIO */
    var data = new Date();
    var mesAtual = data.getMonth()+1;

    //Exibe o mês atual
    $('#mes_'+mesAtual).show();

    //Calcula quais meses serão exibidos (6 meses, o atual mais 5)
    function hideShow(){
        event.preventDefault();
        if(mesAtual > data.getMonth()+5 || mesAtual > 12){
            mesAtual = data.getMonth()+1;
        } else if (mesAtual <  data.getMonth()+1){
            mesAtual = data.getMonth()+5;
        }

        $('.mes').hide();
        $('#mes_'+mesAtual).show();
    }

    //Avança um mês
    $('#prox').on('click', function(event){
        event.preventDefault();
        mesAtual++;
        hideShow();
        // return false;
    });

    //Retorna um mês
    $('#ant').on('click', function(event){
        event.preventDefault();
        mesAtual--;
        hideShow();
        //return false;
    });

    //Modifica a cor de fundo dos dias selecionados no calendário
    $('.dia').on('click', function(e){
        var dia = 1;
        while(document.getElementById(dia+'-'+mesAtual) != null){
            if(!document.getElementById(dia+'-'+mesAtual).disabled){
                if(document.getElementById(dia+'-'+mesAtual).checked){
                    document.getElementById(dia+'-'+mesAtual).parentNode.style.backgroundColor = "#52a82d";
                } else{
                    document.getElementById(dia+'-'+mesAtual).parentNode.style.backgroundColor = "#ededed";
                }
            }
            dia++;
        }
    });
    /* FIM DO TRATAMENTO DO CALENDÁRIO */

    $("#other").focus(function(event){
        $("#outro").prop('disabled', false);
    });

    $("#other").focusout(function(event){
        if($("#outro").is(":focus")){
            $("#outro").prop('disabled', true);
        }
    });

    $("#outro").focusout(function(event){
        $("#outro").prop('disabled', true);
    });

    /* AUTOCOMPLETE DO FORMULÁRIO */
    //Mostra o autocomplete do código da disciplina
    $("#codDisc").click(function(event){
        event.preventDefault();
        $(".autocomplete-coddisc").css("display", "block");
    });

    //Mostra o autocomplete do nome da disciplina
    $("#nomeDisc").click(function(event){
        event.preventDefault();
        $(".autocomplete-nomedisc").css("display", "block");
    });

    //Realiza uma requisição ajax com os dados introduzidos no campo do código da disciplina
    $("#codDisc").keyup(function(event){
        event.preventDefault();
        var codDisc = $(this).val();
        $(".autocomplete-coddisc").empty();
        $.ajax({
            type: "POST",
            url: "index.php",
            data: {coddisc : codDisc, chave : "codDisc"},
            success: function(disciplina){
                var retorno = JSON.parse(disciplina);
                for(let i = 0; i < retorno.length; i++){
                    $(".autocomplete-coddisc").append($('<div class="suggest" id="'+retorno[i].codigo+'" onclick="puxaDadosCod('+retorno[i].codigo+');">'+retorno[i].codigo+'</div>'));
                }
            },
            error: function(erro){
                console.log('Erro');
            }
        })
    });

    //Realiza uma requisição ajax com os dados introduzidos no campo do nome da disciplina
    $("#nomeDisc").keyup(function(event){
        event.preventDefault();
        var nomeDisc = $(this).val();
        $(".autocomplete-nomedisc").empty();
        $.ajax({
            type: "POST",
            url: "index.php",
            data: {nomedisc : nomeDisc, chave : "nomeDisc"},
            success: function(disciplina){
                var retorno = JSON.parse(disciplina);
                for(let i = 0; i < retorno.length; i++){
                    $(".autocomplete-nomedisc").append($('<div class="suggest" id="'+retorno[i].nome.split(" ").join("")+'" onclick="puxaDadosNome('+retorno[i].nome.split(" ").join("")+');">'+retorno[i].nome+'</div>'));
                }
            },
            error: function(erro){
                console.log('Erro');
            }
        })
    });
    /* FIM DO AUTO COMPLETE DO FORMULÁRIO */
});