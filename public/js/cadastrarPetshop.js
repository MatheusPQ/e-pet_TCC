$(document).ready(function(){
    $('input[name=cep]').mask('00000-000', { placeholder: '_____-___'});
    $('input[name=fone]').mask('(000) 0000-0000', { placeholder: "(___) ____-____" });
    $('input[name=cpf]').mask('000.000.000-00', { placeholder: "___.___.___-__" });
    $('input[name=cnpj]').mask('00.000.000/0000-00', { placeholder: "__.___.___/____-__" });

    // $('#horarioAbertura').timepicker();
});