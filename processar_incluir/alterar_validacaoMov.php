<?php
session_start();
require_once '../db_connections/MovFinanceiraConn.php';
$url = 'http://localhost/FinanceiroBiza/views/movimentacao-view.php';
$contaConn = new MovFinanceiraConn();

if(isset($_POST['id'])) {
	
	$tipo = filter_input(INPUT_POST, 'tipo', FILTER_DEFAULT);
	$valor = filter_input(INPUT_POST, 'valor', FILTER_DEFAULT);
    $valor = (float)$valor;
	$id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
	$id = (int)$id;

    if($valor <= 0) {
    	$_SESSION['error'] = "Valor inválido. Alteração não concluída.";
        header("Location: {$url}");
    } else {
        $contaConn->alterarMovFinanceira($id, $tipo, $valor);
  	    $_SESSION['sucesso'] = "Alteração realizada com sucesso.";
        header("Location: {$url}");	
    } 	
}