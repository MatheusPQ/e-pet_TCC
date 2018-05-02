$(document).ready(function(){
    $('#calendar').fullCalendar({
		eventSources: [

			// your event source
			{
			  url: '/evento', // use the `url` property
			  data: {
				  petshop_id: $('#petshop_id').val()
			  }
			//   color: 'yellow',    // an option!
			//   textColor: 'black'  // an option!
			}
		
			// any other sources...
		
		],
		themeSystem: 'bootstrap4',
		// bootstrapFontAwesome: false,
        defaultView: 'listDay',
		noEventsMessage: 'Nada marcado para este dia',
		// header: {
		// 	left:   'title',
		// 	center: '',
		// 	right:  'basicWeek,listDay today prev,next'
		// },
        // events: [
        //   	{
		// 		title  : 'BANHO | YORKSHIRE | R$ 15,00',
		// 		start  : '2018-04-26T15:30:00',
		// 		allDay : false,
		// 		backgroundColor: 'red'
        //   	},
        //   	{
		// 		title  : 'BANHO | PINSCHER | R$ 15,00',
		// 		start  : '2018-04-26T12:30:00',
		// 		allDay : false 
        //   	},
        //   	{
		// 		title  : 'TOSA | PITBULL | R$ 15,00',
		// 		start  : '2018-04-26T12:00:00',
		// 		allDay : false 
        //   	}
		// ]
		
	});
	// carregarCalendar();


	// ERRO AO INCREMENTAR 30 MINUTOS NO HORÁRIO... TALVEZ REMOVER O FULLCALENDAR E USAR UMA TABELA NORMAL PARA MOSTRAR EVENTOS? (tipo site gndi)
	$('#btn-marcarHorario').click(function(event){
		// var dataHoje = $('#calendar').fullCalendar('getDate');
		// console.log(dataHoje.format("DD-MM-YYYY"));
		
		var horaSelecionada = $('#hora').attr('min');
		var dataSelecionada = $('#data').val();
		var start = $.fullCalendar.moment(dataSelecionada+'T'+horaSelecionada);

		$('#start').val(dataSelecionada+' '+horaSelecionada);
		var horaIncrementada = $.fullCalendar.moment(horaSelecionada).add(30, 'minutes');
		var dataFinal = $.fullCalendar.moment(dataInicial).add(60, 'minutes');
		$('#end').val(dataSelecionada+' '+horaIncrementada);
		console.log($('#start').val(), $('#end').val());
		

		event.preventDefault();
	});

	$('#btn-teste').click(function(){
		// var moment = $('#calendar').fullCalendar('getDate');
		// var momentFormatado = moment.format("DD-MM-YYYY");
		

		// var eventosHoje = buscarEventosDeHoje(momentFormatado);
		// // console.log(eventosHoje[0].start.format('HH:mm:ss'));
		// var horarioFechamento = $('#start').attr('max');
		// var horarioAbertura = $('#start').attr('min');
		// // console.log(horarioAbertura);
		
		
		// // var horarioFechamentoFormatado = new Date("November 13, 2013 " + start_time);
		// // stt = stt.getTime();
		// // console.log(horarioFechamentoFormatado);
		// var data = new Date();
		// // console.log(data.toLocaleTimeString());
		

		// // if(eventosHoje[0].start.format('HH:mm:ss') == "17:00:00"){
		// // 	console.log('É IGUAL');
			
		// // } else {
		// // 	var event={id:1 , title: 'New event', start:  new Date()};

		// // 	$('#calendar').fullCalendar( 'renderEvent', event, true);
			
		// // 	console.log('É DIFERENTE');
		// // }

		// var dataInicial = $.fullCalendar.moment();
		// var dataFinal = $.fullCalendar.moment(dataInicial).add(60, 'minutes');
		// // var local = $.fullCalendar.moment(moment +'T08:00:00');
		// // var local = $.fullCalendar.moment('2014-05-01T12:00:00');
		// // console.log(local);
		// console.log(moment);
		

		// var calendario = $('#calendar'); 
		// calendario.fullCalendar();

		
		// var eventoTeste = {
		// title:"my new event",
		// allDay: false,
		// start: dataInicial,
		// end: dataFinal
		// };
		// calendario.fullCalendar( 'renderEvent', eventoTeste );
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

function buscarEventosDeHoje(hoje){
	var eventosHoje = $('#calendar').fullCalendar('clientEvents', function(evt){
		return evt.start.format("DD-MM-YYYY") == hoje;
	
	});

	return eventosHoje;
}

// function carregarCalendar(){
// 	var eventos = [];
// 	$.ajax({
// 		url: '/evento',
// 		type: 'GET',
// 		data: {
// 			petshop_id: $('#petshop_id').val()
// 		},
// 		success: function(data) {
// 			console.log(data);
			
// 			$('#calendar').fullCalendar('removeEvents');
// 			$(data).each(function(index, value) {
// 				eventos[index] = {
// 					id: value.id,
// 					title: value.title,
// 					start: value.start,
// 					end: value.end
// 				}
// 			});
// 		}
// 	});
// 	// console.log(eventos);
	
// 	$('#calendar').fullCalendar('addEventSource', eventos);
// 	$('#calendar').fullCalendar('rerenderEvents');
// }

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