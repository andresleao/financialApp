$('.incluir-form').on('submit', (e) => {
	let desc = $('#descricao').val()
    let saldo = $('#saldoInicial').val()

    if(desc == '' || desc == undefined){
    	e.preventDefault()
    	$('.descricaoError').text('Descrição inválida. Digite uma descrição válida.')
    	$('.descricaoError').addClass('error')
    }else if(desc != ''){
    	$('.descricaoError').text('')
    }

    if(saldo == '' || desc == null){
    	e.preventDefault()
    	$('.saldoError').text('Saldo inválido. Digite uma saldo válido.')
    	$('.saldoError').addClass('error')
    }else if(saldo != ''){
    	$('.saldoError').text('')
    }

})

// Quando clica no (x) remove o alerta de sucesso.
$('.delete').on('click', () =>{
	$('.alert-success').remove();
})

// Quando clica no (x) remove o alerta de erro.
$('.delete').on('click', () =>{
	$('.alert-danger').remove();
})





