$(document).ready(function(){
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
	$.ajax({
		url : '/agenda/buscarEstatisticasAdmin',
		method: "GET"
	}).done(function (data) {
        $('#td_valoresMovim').html("R$ "+data.valores);
        $('#td_petshopsCadast').html(data.total_petshops);
        $('#td_numAtend').html(data.atendimentos);
        $('#td_proprietarios').html(data.proprietarios);
        $('#td_usuarios').html(data.usuarios);
        $('#td_usuariosTotal').html(data.usuarios_total);

	}).fail(function () {
		alert('Erro ao buscar as estatísticas.');
    });

    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
	$.ajax({
		url : '/agenda/buscarServicosMaisUtilizados',
		method: "GET"
	}).done(function (data) {
        
        var myChart = new Chart($("#grafServicos"), {
            type: 'bar',
            data: {
                // labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                labels: data.servicos,
                datasets: [{
                    // label: ['Serviços mais requisitados'],
                    // data: [12, 19, 3, 5, 2, 3],
                    data: data.total,
                    backgroundColor : 'rgba(0, 123, 255, 0.2)',
                    borderColor:'rgba(0, 123, 255, 1)',
                    // backgroundColor: [
                    //     // '#007bff59',
                    //     // '#007bff59',
                    //     // '#007bff59'
                    //     'rgba(0, 123, 255, 0.2)',
                    //     'rgba(0, 123, 255, 0.2)',
                    //     'rgba(0, 123, 255, 0.2)',
                    //     // 'rgba(255, 99, 132, 0.2)',
                    //     // 'rgba(54, 162, 235, 0.2)',
                    //     // 'rgba(255, 206, 86, 0.2)',
                    //     // 'rgba(75, 192, 192, 0.2)',
                    //     // 'rgba(153, 102, 255, 0.2)',
                    //     // 'rgba(255, 159, 64, 0.2)'
                    // ],
                    // borderColor: [
                    //     // '#007bff',
                    //     // '#007bff',
                    //     // '#007bff'
                    //     'rgba(0, 123, 255, 1)',
                    //     'rgba(0, 123, 255, 1)',
                    //     'rgba(0, 123, 255, 1)',
                    //     // 'rgba(255,99,132,1)',
                    //     // 'rgba(54, 162, 235, 1)',
                    //     // 'rgba(255, 206, 86, 1)',
                    //     // 'rgba(75, 192, 192, 1)',
                    //     // 'rgba(153, 102, 255, 1)',
                    //     // 'rgba(255, 159, 64, 1)'
                    // ],
                    borderWidth: 1
                }]
            },
            options: {
                legend: {
                    display:false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true,
                            stepSize: 1
                        }
                    }]
                }
            }
        });

	}).fail(function () {
		alert('Erro ao carregar os gráficos.');
    });

    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
	$.ajax({
		url : '/agenda/buscarRacasEmDestaque',
		method: "GET"
	}).done(function (data) {

        var myChart = new Chart($("#grafRacas"), {
            type: 'bar',
            data: {
                labels: data.racas,
                datasets: [{
                    data: data.total,
                    backgroundColor : 'rgba(200, 53, 69, 0.2)',
                    borderColor:'rgba(200, 53, 69, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                legend: {
                    display:false
                },
                scales: {
                    yAxes: [{
                        // gridLines: {
                        //     display: true ,
                        //     color: "rgba(245, 248, 250, 0.5)"
                        // },
                        ticks: {
                            // fontColor: "white",
                            beginAtZero:true,
                            stepSize: 1
                        }
                    }],
                    xAxes: [{
                        // gridLines: {
                        //     display: true ,
                        //     color: "rgba(245, 248, 250, 0.5)"
                        // },
                        ticks: {
                            // fontColor: "white",
                            beginAtZero:true,
                            stepSize: 1
                        }
                    }],
                }
            }
        });

	}).fail(function () {
		alert('Erro ao carregar os gráficos.');
    });


    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
	$.ajax({
		url : '/agenda/buscarNumeroPetshopsPorCidade',
		method: "GET"
	}).done(function (data) {
        console.log(data);
        
        var myChart = new Chart($("#grafRegioes"), {
            type: 'bar',
            data: {
                labels: data.cidades,
                datasets: [{
                    data: data.total,
                    backgroundColor : 'rgba(200, 53, 69, 0.2)',
                    borderColor:'rgba(200, 53, 69, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                legend: {
                    display:false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true,
                            stepSize: 1
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            beginAtZero:true,
                            stepSize: 1
                        }
                    }],
                },
                    responsive: false, 
                    maintainAspectRatio: false
            }
        });

	}).fail(function () {
		alert('Erro ao carregar os gráficos.');
    });
});


    
    // var myDoughnutChart = new Chart($("#grafStatus"), {
    //     type: 'doughnut',
    //     data: {
    //         labels: [
    //             "Atendidos",
    //             "Cancelados",
    //             "Marcados",
    //             "Disponíveis"
    //         ],
    //         datasets: [
    //             {
    //                 data: [133.3, 86.2, 52.2, 150],
    //                 backgroundColor: [
    //                     "#28a745",
    //                     "#dc3545",
    //                     "#ffc107",
    //                     "#007BFF",
    //                 ]
    //             }]

    //     },
    //     options: {
    //         legend: {
    //             position: "bottom",
    //         },
    //         responsive: false, 
    //         maintainAspectRatio: false
    //     }
    // });