<?php
session_start();

require_once '../db_connections/ContaBancariaConn.php';

$url = 'http://localhost/FinanceiroBiza/views/contas-view.php';
$conn = new ContaBancariaConn();

if(isset($_GET['id'])){
	$id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
	$id = (int)$id;
    $resultado = $conn->remover($id);
    $_SESSION['sucesso_conta'] = "Conta excluída com sucesso.";
  	header("Location: {$url}");	 	
}















