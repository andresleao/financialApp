<?php 
session_start();
$urlConta = 'http://localhost/FinanceiroBiza/views/contas-view.php';
$urlMov = 'http://localhost/FinanceiroBiza/views/movimentacao-view.php';

//Mensagens de Sucesso e Erro para transações de Conta Bancária:
if(isset($_SESSION['sucesso_conta'])){
	unset($_SESSION['sucesso_conta']);
	header("Location: {$urlConta}");
}

if(isset($_SESSION['error_conta'])){
	unset($_SESSION['error_conta']);
	header("Location: {$urlConta}");
}

//Mensagens de Sucesso e Erro para transações de Movimentação Financeira:
if(isset($_SESSION['sucesso'])){
	unset($_SESSION['sucesso']);
	header("Location: {$urlMov}");
}

if(isset($_SESSION['error'])){
	unset($_SESSION['error']);
	header("Location: {$urlMov}");
}