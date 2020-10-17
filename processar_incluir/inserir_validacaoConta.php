<?php
session_start();

require_once '../db_connections/ContaBancariaConn.php';

$url = 'http://localhost/FinanceiroBiza/views/contas-view.php';
$contaConn = new ContaBancariaConn();
$descricao = trim($_POST['descricao']);
$saldoInicial = trim($_POST['saldoInicial']);

if(isset($descricao)){
	if(!empty($descricao)){
		$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
	}
}

if(isset($saldoInicial)){
	if(!empty($saldoInicial) || !$saldoInicial <= 0){
		$saldoInicial = filter_input(INPUT_POST, 'saldoInicial', FILTER_SANITIZE_NUMBER_FLOAT);
	}
}
 
if(isset($descricao) && !empty($descricao)){
	if($saldoInicial <= 0){
		$_SESSION['error_conta'] = "Valor inválido. Cadastro cancelado.";
		header("Location: {$url}");
	}else {
		$contaConn->incluir($descricao, $saldoInicial);
		$_SESSION['sucesso_conta'] = "Conta cadastrada com sucesso.";
		header("Location: {$url}");
	}
 } 






