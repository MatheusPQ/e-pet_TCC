$(document).ready(function(){


    $('#btn_buscarNomePetshop').click(function(){

        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $.ajax({
            url: '/buscarPetshopPorNome',
            method: "GET",
            data: {
                nomePetshop: $('#txt_buscarPetshop').val(),
                cidade : $('#check_buscarCidadePetshop').is(":checked") ? 1 : 0,
            },
            success: function(data){
                $('#lista_petshops').html(data);
            },
            error: function(){				
            }
        });
    });


    $('#btn_buscarAvaliacaoPetshop').click(function(){

        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $.ajax({
            url: '/buscarPetshopPorAvaliacao',
            method: "GET",
            data: {
                cidade : $('#check_buscarCidadePetshop').is(":checked") ? 1 : 0,
            },
            success: function(data){
                $('#lista_petshops').html(data);
            },
            error: function(){				
            }
        });
    });


    $('.btn-group .dropdown-menu a.dropdown-item').click(function(event){
        event.preventDefault();        

        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $.ajax({
            url: '/buscarPetshopPorServico',
            method: "GET",
            data: {
                servico: $(this).attr('id'),
                cidade : $('#check_buscarCidadePetshop').is(":checked") ? 1 : 0,
            },
            success: function(data){
                $('#lista_petshops').html(data);
            },
            error: function(){				
            }
        });
    });
    $('#btn_buscarCidadePetshop').click(function(event){
        event.preventDefault();

        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $.ajax({
            url: '/buscarPetshopPorCidade',
            method: "GET",
            success: function(data){
                $('#lista_petshops').html(data);
            },
            error: function(){
            }
        });
    });        
});