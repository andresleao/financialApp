<?php
session_start();
require_once '../db_connections/ContaBancariaConn.php';
$url = 'http://localhost/FinanceiroBiza/views/contas-view.php';
$contaConn = new ContaBancariaConn();

if(isset($_POST['id'])) {
	
	$descricao = filter_input(INPUT_POST, 'descricao', FILTER_DEFAULT);
	$saldoInicial = filter_input(INPUT_POST, 'saldoInicial', FILTER_DEFAULT);
	$id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
	$id = (int)$id;
    
    if($saldoInicial <= 0) {
    	$_SESSION['error_conta'] = "Saldo inválido. Alteração não concluída.";
        header("Location: {$url}");
    } else {
        $contaConn->alterarConta($id, $descricao, $saldoInicial);
  	    $_SESSION['sucesso_conta'] = "Alteração realizada com sucesso.";
        header("Location: {$url}");	
    } 	
}
