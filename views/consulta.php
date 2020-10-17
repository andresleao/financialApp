<?php
session_start();
require_once '../db_connections/ContaBancariaConn.php';
$conn = new ContaBancariaConn();

 if(isset($_POST['id'])){
 	$id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
 	$id = (int)$id;
    $conta = $conn->listarConta($id);
 } 
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link rel="icon" href="../assets/imagens/logoFlat.png">
		<title>Financial Biza</title>
	</head>
	<body>
	 <div class="container">
		<header>
			<div class="cabecalho">
				<img src="../assets/imagens/Logo.png" alt="Logo">
				<h2>Financial Biza</h2>
			</div>
			<div class="barra">
				<h4>Usuário</h4>
				<a href="../index.php"><button type="button" class="btn btn-outline-warning">Sair</button></a>
			</div>
			<div class="edit-div">
				<span><a class="main-icon-menu" href="principal.php"><i class="fas fa-arrow-circle-left back-arrow-edit"></i></a></span>
			</div>
		</header>

	    	<div class="tab-pane alterar-campos">
				
				<div class="container tabela">
	        		<div class="lista">
						<h3>Conta</h3>
					</div>

	        		<table class="table table-bordered">
		        		<thead class="thead-dark">
				            <tr>
				               <th scope="col">ID</th>
								<th scope="col">DESCRICAO</th>
				               <th scope="col">SALDO INICIAL</th>
				            </tr>
				        </thead>
				         <tbody>
				         	<?php if($conta == true && isset($conta['id']) > 0 || isset($conta['id']) != '') { ?>
			                   	<tr>
				                   	<td><?= $conta['id']; ?></td>
				                   	<td><?= $conta['descricao']; ?></td>
				                   	<td><?= $conta['saldoInicial']; ?></td>
		                   		</tr>
		                   	<?php } else {
		                    	$_SESSION['error_conta'] = "Conta inexistente."; 
		                    } ?>
				        </tbody> 
				    </table>
	    		</div>

			</div>

			<!-- Mensagens de sucesso ou erro na consulta com o banco de dados -->
			<?php if(isset($_SESSION['error_conta'])) { ?>
					<div class="alert alert-danger" role="alert">
			  			<span><?php echo $_SESSION['error_conta']; ?></span> <a href="../processar_incluir/excluir_sessao.php" style="float: right;">x</a>
					</div>
			<?php } ?>

		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js"></script>
	    <script src="../assets/js/app.js"></script>
	</body>
</html>  