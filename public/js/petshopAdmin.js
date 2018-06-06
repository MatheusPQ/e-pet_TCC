$(document).ready(function(){
	var petshop_id = $('#petshop_id').val();

	buscarFuncionarios(petshop_id);
	definirDataDeHoje();
	
    $('body').on('click', '.pagination a', function(event) {
		event.preventDefault();

        var url = $(this).attr('href');  
        buscarHorariosDeOutraPagina(url, petshop_id);
	});
	
	$('#select_funcionario, #data_agenda').change(function(){
		buscarHorariosMarcados(petshop_id);
	});

	$('#tabela_horarios_marcados').on('click', '#btn-atendido', function(e){
		e.preventDefault();

		var elementoClicado = $(this);
		alterarStatusDoHorario(petshop_id, elementoClicado, "ATENDIDO");
	});

	$('#tabela_horarios_marcados').on('click', '#btn-cancelado', function(e){
		e.preventDefault();

		var elementoClicado = $(this);
		alterarStatusDoHorario(petshop_id, elementoClicado, "CANCELADO");
	});

	$('#tabela_horarios_marcados').on('click', '#btn-desmarcar', function(e){
		e.preventDefault();

		var elementoClicado = $(this);
		alterarStatusDoHorario(petshop_id, elementoClicado, "DISPONIVEL");
	});
});

function alterarStatusDoHorario(petshop_id, elemento, status){

	var dados = {
		dia			: elemento.data('dia'),
		hora		: elemento.data('hora'),
		funcionario : elemento.data('funcionario'),
		status		: status
	}

	$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
	$.ajax({
		url: "/admin/"+petshop_id+"/alterarStatusHorario",
		method: "POST",
		data: dados,
		success: function(data) {
			buscarHorariosMarcados(petshop_id);
		}, error: function(){
			alert('Não foi possível alterar o status. Tente novamente.');
		}
	});
}

function buscarHorariosDeOutraPagina(url, petshop_id) {
    var dados = {
		data            : $('#data_agenda').val(),
		petshop_id		: petshop_id,
		funcionario_id	: $('#select_funcionario').val()
    }

    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
	$.ajax({
		url : url,
		data: dados,
		method: "GET"
	}).done(function (data) {
		$('#tabela_horarios_marcados').html(data);  
	}).fail(function () {
		alert('Não foi possível carregar os horários.');
	});
}

function buscarHorariosMarcados(petshop_id){
    var dados = {
		data            : $('#data_agenda').val(),
		petshop_id		: petshop_id,
		funcionario_id	: $('#select_funcionario').val()
	}	

    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    $.ajax({
        url: "/petshop/"+petshop_id+"/buscarHorariosMarcados",
        method: "GET",
        data: dados,
        success: function(data) {
			$('#tabela_horarios_marcados').html(data);
			calcularEstatisticas();
        }, error: function(){
			alert('Não foi possível carregar os horários.');
		}
    });
}

function buscarFuncionarios(petshop_id){
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    $.ajax({
        url: "/admin/"+petshop_id+"/funcionarios/buscarFuncionarios",
        method: "GET",
        success: function(dadosRetornados) {
			inserirFuncionariosNoSelect(dadosRetornados);
			buscarHorariosMarcados(petshop_id);
			
        }
    });
}

function inserirFuncionariosNoSelect(dados){
    //Esvazia o select.
    $('#select_funcionario').find('option').remove();
    
    //Preenche o select.
    $.each(dados, function(index, valor){
        $('#select_funcionario').append('<option value="'+ valor.funcionario_id +'">'+valor.funcionario.nome+'</option>')
    });
}

function definirDataDeHoje(){
	var dataHoje = moment(new Date()).format("YYYY-MM-DD");
	$('#data_agenda').val(dataHoje);
}

function calcularEstatisticas(){
	var ganhos = 0;
	var cancelamentos = 0;
	$('#tabela_marcarHorario > tbody  > tr').each(function(i, tr){
		var span = $(tr).find('td').eq(2).find('span').text();
		
		if(span == "ATENDIDO"){
			ganhos += parseFloat($(tr).find('td').eq(6).data('preco'));
		}

		if(span == "CANCELADO"){
			cancelamentos++;
		}
	});

	$('#tabela_estatisticas span.preco').text("R$ " + ganhos.toFixed(2));
	$('#tabela_estatisticas span.indisponivel').text(cancelamentos);
}