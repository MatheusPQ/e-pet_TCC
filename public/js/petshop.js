
//Usadas no evento change do input de data
var valorData;
var dataFormatada;

$(document).ready(function(){
	bloquearBotaoDeMarcarHorario('Selecione uma data!');
	$('.starrr').starrr();

	var petshop_id = $('#petshop_id').val();
    var dataDeHoje = moment(new Date());

	$('input[name="data"]').daterangepicker({
        "minDate": dataDeHoje,
		"singleDatePicker": true,
		"showDropdowns": true,
	});

	$('input[name="data"]').val('');

	$('.starrr').on('starrr:change', function(e, value){		
		dados = {
			petshop_id: $('#petshop_id').val(),
			avaliacao: value
		}

		$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
		$.ajax({
			url: '/petshop/salvarAvaliacao',
			method: "POST",
			data: dados,
			success: function(data){				
				$('h5.pull-right').html('<i class="icon-star" style="color: #FFD119;"></i> '+ data.media_avaliacoes +' <small class="text-muted">/ 5</small>');
				$('small#total_avaliacoes').text('Total de avaliações: '+ data.total_avaliacoes);
			},
			error: function(){				
			}
		});		
	});

	$('#data').change(function(){

		//Formata a data para ano-mes-dia
		valorData = $('#data').val();
		dataFormatada = moment(valorData, 'DD/MM/YYYY').format('YYYY-MM-DD');

		bloquearBotaoDeMarcarHorario('Selecione uma data e horário!');
		buscarHorariosDisponiveis(petshop_id);
    });

	$('#btn-marcarHorario').click(function(event){
		var dados = {
			data            : dataFormatada,
			hora			: $('#tabela_horarios input[name="radio"]:checked').data('hora'),
			funcionario_id	: $('#tabela_horarios input[name="radio"]:checked').data('funcionario'),
			user_id			: $('#user_id').val(),
			petshop_id		: petshop_id,
			raca_id			: $('#raca').val(),
			servico_id		: $('label.btn.active').find("input").val()
		}		
		
		$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
		$.ajax({
			url: "/petshop/"+petshop_id+"/marcarHorario",
			method: "POST",
			data: dados,
			success: function(data) {
				// $('#tabela_horarios').html(data);
				// preencherTabelaComHorariosDisponiveis(data);

				bloquearBotaoDeMarcarHorario('Selecione uma data e horário!');
				buscarHorariosDisponiveis(petshop_id);
			}, error: function(){
				alert('Houve algum erro ao marcar o horário. Tente novamente!');
			}
		});
		event.preventDefault();
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

	// $('table#tabela_marcarHorario').on('change', 'input[name="radio"]', function(){
	$('#tabela_horarios').on('change', 'input[name="radio"]', function(){
		if($('h4.preco span').text() == "Não definido"){
			bloquearBotaoDeMarcarHorario('Este serviço não é oferecido para a raça escolhida!');
		} else {
			desbloquearBotaoDeMarcarHorario();
		}
	});
	
    $('body').on('click', '.pagination a', function(e) {
		e.preventDefault();
		bloquearBotaoDeMarcarHorario('Selecione uma data e horário!');
		
        // $('#load a').css('color', '#dfecf6');
        // $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');

        var url = $(this).attr('href');  
        buscarHorariosDeOutraPagina(url, petshop_id);
    });

	buscarPreco( $('label.btn.active').find("input").val() ); //id do serviço como argumento.
	buscarAvaliacao();
	
});

function buscarHorariosDeOutraPagina(url, petshop_id) {

	// var valorData = $('#data').val();
	// var dataFormatada = moment(valorData, 'DD/MM/YYYY').format('YYYY-MM-DD');

    var dados = {
		// data            : $('#data').val(),
		data            : dataFormatada,
		petshop_id		: petshop_id
    }

    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
	$.ajax({
		url : url,
		data: dados,
		method: "GET"
	}).done(function (data) {
		$('#tabela_horarios').html(data);  
	}).fail(function () {
		alert('Não foi possível carregar os horários.');
	});
}

function buscarHorariosDisponiveis(petshop_id){

	// var valorData = $('#data').val();
	// var dataFormatada = moment(valorData, 'DD/MM/YYYY').format('YYYY-MM-DD');

    var dados = {
		// data            : $('#data').val(),
		data            : dataFormatada,
		petshop_id		: petshop_id
    }

    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    $.ajax({
        url: "/petshop/"+petshop_id+"/buscarHorarios",
        method: "GET",
        data: dados,
        success: function(data) {
            $('#tabela_horarios').html(data);
            // preencherTabelaComHorariosDisponiveis(data);
        }, error: function(){
			alert('Não foi possível carregar os horários.');
		}
    });
}

function buscarAvaliacao(){
	
	dados = {
		petshop_id: $('#petshop_id').val(),
		user_id: $('#user_id').val()
	}	

	$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
	$.ajax({
		url: '/petshop/buscarAvaliacao',
		method: "GET",
		data: dados,
		success: function(data){			
			$('.starrr').starrr('setRating', data.avaliacao);			
		}
	});
}

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

			//verifica se preço é null ou 0
			if(data.preco && data.preco != 0){
				$("h4.preco span").text("R$ "+ data.preco);
				$("h4.preco span").removeClass('indisponivel');
				$("h4.preco span").addClass('preco');

				//Condição para desbloquear o botão de 'Marcar Horário'.
				verificarSeHorarioFoiSelecionado();
			} else {
				$("h4.preco span").text("Não definido");
				$("h4.preco span").removeClass('preco');
				$("h4.preco span").addClass('indisponivel');

				bloquearBotaoDeMarcarHorario('Este serviço não é oferecido para a raça escolhida!');
			}			
		}
	});
}

//Verifica se algum horário foi selecionado na tabela (botões radio na tabela)
function verificarSeHorarioFoiSelecionado(){
	if($('table#tabela_marcarHorario input[name="radio"]').is(':checked')){
		desbloquearBotaoDeMarcarHorario();
	} else {
		bloquearBotaoDeMarcarHorario('Selecione uma data e horário!');
	}
}

//Desbloqueia o botão de marcar horário, permitindo que o usuário... marque o horário!
function desbloquearBotaoDeMarcarHorario(){
	$("#btn-marcarHorario").attr('disabled', false);
	$("#btn-marcarHorario").text('Marcar horário');
	$("#btn-marcarHorario").removeClass('btn-danger');
	$("#btn-marcarHorario").addClass('btn-primary');
}

//Bloqueia o botão de marcar horário, impedindo o usuário de marcar um horário com o petshop.
//Pode ser porque ele selecionou um serviço inválido, ou porque ele não selecionou uma data ou horário.
function bloquearBotaoDeMarcarHorario(mensagem){
	$("#btn-marcarHorario").attr('disabled', true);
	$("#btn-marcarHorario").text(mensagem);
	$("#btn-marcarHorario").removeClass('btn-primary');
	$("#btn-marcarHorario").addClass('btn-danger');
}