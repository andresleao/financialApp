<?php
session_start();
require_once '../db_connections/MovFinanceiraConn.php';

$url = 'http://localhost/FinanceiroBiza/views/movimentacao-view.php';
$mov = new MovFinanceiraConn();

if(isset($_GET['id'])){
	$id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
	$id = (int)$id;
  	$mov->removerMovFinanceira($id);
  	$_SESSION['sucesso'] = "Movimentação excluída com sucesso.";
  	header("Location: {$url}");	 	
} 