<?php

session_start();

require_once '../db_connections/MovFinanceiraConn.php';

$url = 'http://localhost/FinanceiroBiza/views/movimentacao-view.php';
$conn = new MovFinanceiraConn();

$conta_bancaria = filter_input(INPUT_POST, 'conta_bancaria', FILTER_DEFAULT);
$conta_bancaria = (int)$conta_bancaria;
$tipo = filter_input(INPUT_POST, 'tipo', FILTER_DEFAULT);
$valor = filter_input(INPUT_POST, 'valor', FILTER_DEFAULT);

if(isset($conta_bancaria)){
	$conn->incluirMovFinanceira($tipo, $valor, $conta_bancaria);
	$_SESSION['sucesso'] = "Movimentação inserida com sucesso.";
	header("Location: {$url}");
} 





	
 
	



