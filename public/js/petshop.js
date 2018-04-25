$(document).ready(function(){
    $('#calendar').fullCalendar({
        defaultView: 'listDay',
        noEventsMessage: 'Nada marcado para este dia',
        events: [
          	{
				title  : 'BANHO | YORKSHIRE | R$ 15,00',
				start  : '2018-04-18T15:30:00',
				allDay : false 
          	},
          	{
				title  : 'BANHO | PINSCHER | R$ 15,00',
				start  : '2018-04-18T12:30:00',
				allDay : false 
          	},
          	{
				title  : 'TOSA | PITBULL | R$ 15,00',
				start  : '2018-04-18T12:00:00',
				allDay : false 
          	}
        ]
	});
	
	$('section.petshop-servicos-selecionar label.btn:first').addClass('active');

	//Estava com problemas na hora de buscar o id do servico dentro do método, por isso peguei ele fora do método e o enviei como argumento (nos dois eventos abaixo).
	$('section.petshop-servicos-selecionar').on('change', '#raca', function(){
		var servico_id = $('label.btn.active').find("input").val();
		buscarPreco(servico_id);
	});

	$('section.petshop-servicos-selecionar').on('click', 'label.btn', function(){
		var servico_id = $(this).find("input").val();
		buscarPreco(servico_id);
	});

	buscarPreco( $('label.btn.active').find("input").val() ); //id do serviço como argumento.
});

function buscarPreco(servico_id){

	$("#btn-marcarHorario").attr('disabled', true);

	var petshop_id = $('#petshop_id').val();
	var raca_id = $('#raca').val();

	var dados = {
		petshop_id	: petshop_id,
		raca_id		: raca_id,
		servico_id	: servico_id
	}

	$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
	$.ajax({
		url: "/petshopservicoraca/"+petshop_id+"/buscarPreco",
		method: "GET",
		data: dados,
		success: function(data) {

			//verifica se preço é null
			if(data.preco && data.preco != 0){
				$("h4.preco span").text("R$ "+ data.preco);
				$("h4.preco span").removeClass('indisponivel');
				$("h4.preco span").addClass('preco');

				//Desbloqueia o botão
				$("#btn-marcarHorario").attr('disabled', false);
				$("#btn-marcarHorario").text('Marcar horário');
				$("#btn-marcarHorario").removeClass('btn-danger');
				$("#btn-marcarHorario").addClass('btn-primary');
			} else {
				$("h4.preco span").text("Não definido");
				$("h4.preco span").removeClass('preco');
				$("h4.preco span").addClass('indisponivel');

				//Bloqueia o botão
				$("#btn-marcarHorario").attr('disabled', true);
				$("#btn-marcarHorario").text('Este serviço não é oferecido para a raça escolhida!');
				$("#btn-marcarHorario").removeClass('btn-primary');
				$("#btn-marcarHorario").addClass('btn-danger');
			}			
		}
	});
}