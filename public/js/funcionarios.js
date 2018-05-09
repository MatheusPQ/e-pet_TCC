$(document).ready(function(){   

    var dataDeHoje = moment(new Date()).format("DD/MM/YYYY")
    var petshop_id = $('#petshop_id').val();

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

    }, function(start, end, label) {
        // console.log('start: '+ start.format('DD-MM-YYYY') + ' end: '+ end.format('DD-MM-YYYY') + ' label: ' + label);

        var dados = {
            start   : start.format('DD-MM-YYYY'),
            end     : end.format('DD-MM-YYYY'),
            domingos: $('#check_domingos').is(":checked") ? 1 : 0,
            nome    : $('#nome').val()
        }

        // console.log(dados);
        

        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $.ajax({
            url: "/admin/"+petshop_id+"/funcionarios",
            method: "POST",
            data: dados,
            success: function(data) {
                console.log(data);
                
            }
        });
    });

    // $('.input-group').on('click', 'a.btn-salvarPreco', function(event){
    //     event.preventDefault();
    //     var servico_id = $(this).data('servicoid');
    //     var raca_id = $('#raca').val();
    //     var preco = $('input#'+servico_id).val();
        
    //     var dados = {
    //         petshop_id : petshop_id,
    //         servico_id : servico_id,
    //         raca_id    : raca_id,
    //         preco      : preco
    //     }
    //     $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    //     $.ajax({
    //         url: "/admin/"+petshop_id+"/animais",
    //         method: "POST",
    //         data: dados,
    //         success: function() {
    //         }
    //     });
        
    // });

    // buscarPrecos(petshop_id, $('#raca').val());

    // $('#raca').change(() =>{
    //     buscarPrecos(petshop_id, $('#raca').val());
    // });
});

// function buscarPrecos(petshop_id, raca_id){

//     var dados = {
//         petshop_id: petshop_id,
//         raca_id: raca_id
//     }

//     $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
//     $.ajax({
//         url: "/admin/"+petshop_id+"/buscarPrecos",
//         data: dados,
//         method: "GET",
//         success: (data) => {
//             $('.input-group input.input-preco').each( (index, element) => {
//                 $(element).val(null);                
//             });

//             $(data).each( (index) => {
//                 var preco = data[index].preco;
//                 $('#'+data[index].servico_id).val(preco);  
//             });
            
//         }
//     });
// }