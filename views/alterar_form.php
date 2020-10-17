<?php
require_once '../db_connections/ContaBancariaConn.php';
$conn = new ContaBancariaConn();

 if(isset($_GET['id'])){
 	$id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
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

	        		<!-- table -->
	        		<table class="table table-bordered">
		        		<thead class="thead-dark">
				            <tr>
				               <th scope="col">ID</th>
								<th scope="col">DESCRICAO</th>
				               <th scope="col">SALDO INICIAL</th>
				            </tr>
				        </thead>
				         <tbody>
		                   	<tr>
		               	       	<td><?= $conta['id']; ?></td>
		               	       	<td><?= $conta['descricao']; ?></td>
		               	       	<td><?= $conta['saldoInicial']; ?></td>  	
		               	    </tr>   
				        </tbody> 
				    </table>
	    		</div>
			</div>

				<div class="alterar-campos">
					<div class="tab-pane">
						<form method="POST" action="../processar_incluir/alterar_validacaoConta.php" class="alterar-form">
							<div class="tab-titulo">
								<h3>Alterar</h3>
							</div>

							<input type="hidden" name="id" value="<?php echo $conta['id']; ?>">
							<div class="form-row">
								<div class="col-md-4 mb-1">
									<label for="descricao">Descrição da Conta</label>
									<input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo $conta['descricao']; ?>">
									<div class="alterarDescricaoError" style="margin-left: 29px;"></div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-4 mb-1">
									<label for="saldoInicial">Saldo Inicial</label>
									<input type="text" class="form-control" id="saldoInicial" name="saldoInicial" value="<?php echo $conta['saldoInicial']; ?>">
									<div class="alterarSaldoError" style="margin-left: 29px;"></div>
								</div> 
							</div>  
							<button class="btn btn-primary" type="submit">Salvar</button>
						</form>
					</div>
				</div>
		
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js"></script>
	    <script src="../assets/js/app.js"></script>
	</body>
</html>  