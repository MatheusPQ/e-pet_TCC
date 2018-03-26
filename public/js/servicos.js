$(document).ready(function(){
    $('input[type="checkbox"]').change(function(){
        // var label = $(this);
        var label = $(this).closest('label');
        if(label.hasClass('btn-success')){
            label.removeClass('btn-success').addClass('btn-secondary');
        } else {
            label.removeClass('btn-secondary').addClass('btn-success');
        }
    });

    $('input[name="servico"]').click(function(){

        var petshop_id = $(this).data('petshopid');
        var servico_id = $(this).val();
        // console.log(servico_id);
        
        
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $.ajax({
            url: "/admin/"+petshop_id+"/servicos",
            method: "POST",
            data: {
                servico_id: servico_id
            },
            success: function(data) {
            }
        });

    });


});