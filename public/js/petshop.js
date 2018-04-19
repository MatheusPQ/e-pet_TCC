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
	
	// $('section.petshop-servicos-selecionar').on('click', 'input[name*="servicos"]', function(){
	// 	$('div#racas_horarios').slideDown('fast');
	// });

	$('section.petshop-servicos-selecionar label.btn:first').addClass('active');
});