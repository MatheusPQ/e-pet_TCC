$(document).ready(function(){

    $('#minha_agenda').on('click', 'a[name="btn-desmarcarHorario"]', function(){        
        
        var dados = {
            funcionario_id  : $(this).data('funcionario'),
            data            : $(this).data('dia'),
            hora            : $(this).data('hora')
        }

        var linhaTabela = $(this);

        if(confirm("Quer mesmo desmarcar o horário selecionado?" +
            "\nDIA: " + moment(dados.data).format('DD/MM/YYYY') + 
            "\nHORA: " + dados.hora)) {
        
            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
            $.ajax({
                url: "/agenda/desmarcarHorario",
                method: "POST",
                data: dados,
                success: function(data) {
                    // linhaTabela.closest('tr').remove();
                    $('#minha_agenda').html(data);
                }
            });

        }

    });
});