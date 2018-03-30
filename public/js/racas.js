$(document).ready(function(){
    $('input[name^="preco"]').mask('000.000.000.000.000,00', {reverse: true, placeholder: '0,00'});

    // $('input[name^="preco"]').blur(function(){
    //     $(this).unmask();
    // });
});