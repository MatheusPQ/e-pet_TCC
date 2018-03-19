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
});