$(document).ready(function(){   

    //dataDeHoje.. utilizada no daterangepicker
    var dataDeHoje = moment(new Date()).format("DD/MM/YYYY")

    //ID do petshop.. p/ enviar nas urls das requisições ajax
    var petshop_id = $('#petshop_id').val();
    var funcionario_id;

    //Variáveis do daterangepicker. Sempre que alterar a data no daterangepicker, o 'range' ficará salvo nessas variáveis.
    var dataInicio;
    var dataFim;

    $('input[name="data"]').daterangepicker({
        "minDate": dataDeHoje,
        "locale": {
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Aplicar",
            "cancelLabel": "Cancelar",
            "fromLabel": "De",
            "toLabel": "Para",
            "customRangeLabel": "Custom",
            "weekLabel": "W",
            "daysOfWeek": [
                "Dom",
                "Seg",
                "Ter",
                "Qua",
                "Qui",
                "Sex",
                "Sáb"
            ],
            "monthNames": [
                "Janeiro",
                "Fevereiro",
                "Março",
                "Abril",
                "Maio",
                "Junho",
                "Julho",
                "Agosto",
                "Setembro",
                "Outubro",
                "Novembro",
                "Dezembro"
            ],
            "firstDay": 1
        }

    }, function(start, end, label) { //Callback do daterangepicker.. roda sempre que alterar o 'range' 
        dataInicio = start.format('DD-MM-YYYY');
        dataFim = end.format('DD-MM-YYYY');
    });

    buscarFuncionarios(petshop_id);

    $('#salvarFuncionario').submit(function(event){
    // $('#btn_salvarFuncionario').click(function(event){
        event.preventDefault();

        var dados = {
            nome : $('#nome').val()
        }

        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $.ajax({
            url: "/admin/"+petshop_id+"/funcionarios",
            method: "POST",
            data: dados,
            success: function() {
                buscarFuncionarios(petshop_id)
            }
        });
    });

    $('#btn_definirHorarios').click(function(){

        var dados = {
            start           : dataInicio,
            end             : dataFim,
            domingos        : $('#check_domingos').is(":checked") ? 1 : 0,
            funcionario_id  : $('#select_funcionario').val()
        }

        //FAZER VALIDAÇÃO SE NULO...
        
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $.ajax({
            url: "/admin/"+petshop_id+"/funcionariopetshops",
            method: "POST",
            data: dados,
            success: function(data) {
                buscarFuncionarios(petshop_id)
            }
        });
    });

    $('#data_agenda, #select_funcionario').change(function(){
        buscarAgendaDoFuncionario(petshop_id);
    });

});

function preencherTabelaComDadosDaAgenda(dados){
    //Esvazia a tabela.
    $('#tabela_agenda').find('tbody tr').remove();
    
    //Preenche a tabela.
    $.each(dados, function(index, valor){
        var nomeCliente = "";
        var raca = "";
        var preco = "";
        var servico = "";

        if(valor.user != null){            
            var nomeCliente = valor.user.name;
        }

        if(valor.raca != null){            
            var raca = valor.raca.raca;
        }

        if(valor.preco != null){            
            var preco = valor.preco;
        }

        if(valor.servico != null){            
            var servico = valor.servico;
        }

        if(valor.status == "DISPONIVEL"){
            var span = "primary";
        } else if (valor.status == "MARCADO"){
            var span = "warning";
        } else if (valor.status == "ATENDIDO"){
            var span = "success";
        } else if (valor.status == "CANCELADO"){
            var span = "danger";
        }

                

        $('#tabela_agenda tbody').append('<tr>' + 
                                        '<td>'+ valor.funcionario.nome +'</td>' +
                                        '<td>'+ valor.data +'</td>' +
                                        '<td>'+ valor.hora +'</td>' +
                                        '<td> <span class="badge badge-pill badge-'+span+'">'+ valor.status +'</span> </td>' +
                                        '<td>'+ servico +'</td>' +
                                        '<td>'+ nomeCliente +'</td>' +
                                        '<td>'+ raca +'</td>' +
                                        '<td>'+ preco +'</td>' +
                                        '</tr>');
    });

}

function buscarAgendaDoFuncionario(petshop_id){
    var dados = {
        funcionario_id  : $('#select_funcionario').val(),
        data            : $('#data_agenda').val()
    }

    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    $.ajax({
        url: "/admin/"+petshop_id+"/buscarAgenda",
        method: "GET",
        data: dados,
        success: function(data) {
            preencherTabelaComDadosDaAgenda(data);
        }
    });
}

function buscarFuncionarios(petshop_id){    

    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    $.ajax({
        url: "/admin/"+petshop_id+"/funcionarios/buscarFuncionarios",
        method: "GET",
        success: function(dadosRetornados) {
            inserirFuncionariosNoSelect(dadosRetornados);
            funcionario_id = $('#select_funcionario').val();            
        }
    });
}

function inserirFuncionariosNoSelect(dados){
    //Esvazia o select.
    $('#select_funcionario').find('option').remove();
    
    //Preenche o select.
    $.each(dados, function(index, valor){
        $('#select_funcionario').append('<option value="'+ valor.funcionario_id +'">'+valor.funcionario.nome+'</option>')
    });
}