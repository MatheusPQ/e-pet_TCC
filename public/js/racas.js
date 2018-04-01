$(document).ready(function(){
    
    var petshop_id = $('#petshop_id').val();
    
    $('input[name^="preco"]').mask('000.000.000.000.000,00', { placeholder: '0,00'});

    $('.input-group').on('click', 'a.btn-salvarPreco', function(event){
        // console.log('CLICOU');
        event.preventDefault();

        //var petshop_id = $('#petshop_id').val();
        var servico_id = $(this).data('servicoid');
        var raca_id = $('#raca').val();
        var preco = $('input#'+servico_id).val();
        
        var dados = {
            petshop_id : petshop_id,
            servico_id : servico_id,
            raca_id    : raca_id,
            preco      : preco
        }
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $.ajax({
            url: "/admin/"+petshop_id+"/animais",
            method: "POST",
            data: dados,
            success: function() {
                console.log('SALVOU!!!');
            }
        });
        
    });

    buscarPrecos(petshop_id);

    $('#raca').change(() =>{
        buscarPrecos(petshop_id);
    });
});

function buscarPrecos(petshop_id){
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    $.ajax({
        url: "/admin/"+petshop_id+"/buscarPrecos",
        method: "GET",
        success: (data) => {
            console.log(data);
            $(data).each( (index) => {
                $('#'+data[index].servico_id).val(data[index].preco);                
            });
            
        }
    });
}