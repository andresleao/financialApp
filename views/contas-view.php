<?php  
session_start();
require_once '../db_connections/ContaBancariaConn.php';
$conn = new ContaBancariaConn();
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
				<img src="../assets/imagens/Logo.png" alt="">
				<h2>Financial Biza</h2>
			</div>
			<div class="barra">
				<h4>Usuário</h4>
				<a href="../index.php"><button type="button" class="btn btn-outline-warning">Sair</button></a>
			</div>
		</header>
	    
		<nav class="menu">
			<nav class="navbar navbar-expand-lg navbar-light" style="background: #e3f2fd;">
	  			<span class="navbar-brand">Contas Bancárias |</span>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"	 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>

	  			<div class="collapse navbar-collapse" id="navbarSupportedContent">
	    			<ul  class="nav nav-tabs" role="tablist">
					    <li role="presentation" class="active">
					    	<a href="#incluir" aria-controls="incluir" role="tab" data-toggle="tab">Incluir</a>
					    </li>
					    <li role="presentation">
					    	<a href="#remover" aria-controls="remover" role="tab" data-toggle="tab">Alterar & Remover</a><li>
					    <li role="presefieldErrorntation">
					    	<a href="#consultar" aria-controls="consultar" role="tab" data-toggle="tab">Consultar</a>
					    </li>
					</ul>
				</div>	
			</nav>
		</nav>

	 	<span><a class="main-icon-menu" href="principal.php"><i class="fas fa-arrow-circle-left"></i></a></span>

	 	<!-- Tab para inclusão de Conta Bancária -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane" id="incluir">
				<form method="POST" action="../processar_incluir/inserir_validacaoConta.php" class="incluir-form">
					<div class="tab-titulo">
						<h3>Incluir Conta</h3>
					</div>
					<div class="form-row">
						<div class="col-md-4 mb-1">
							<label for="descricao">Descrição da Conta</label>
							<input type="text" class="form-control" id="descricao" name="descricao" placeholder="Ex: Santander Poupança...">
							<div class="descricaoError" style="margin-left: 29px;"></div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-4 mb-1">
							<label for="saldoInicial">Saldo Inicial</label>
							<input type="text" class="form-control" id="saldoInicial" name="saldoInicial" placeholder="R$...">
							<div class="saldoError" style="margin-left: 29px;"></div>
						</div> 
					</div>  
					<button class="btn btn-primary" type="submit">Incluir</button>
				</form>
			</div>

			<!-- Tab para listar, alterar e remover Contas Bancárias -->
			<div role="tabpanel" class="tab-pane" id="remover">
				
				<div class="container tabela">
	        		<div class="lista">
						<h3>Contas Disponíveis</h3>
					</div>

	        		<table class="table table-bordered">
		        		<thead class="thead-dark">
				            <tr>
				               <th scope="col">ALTERAR</th>
								<th scope="col">REMOVER</th>
				               <th scope="col">ID</th>
				               <th scope="col">DESCRIÇÃO</th>
				               <th scope="col">SALDO INICIAL</th>
				            </tr>
				        </thead>
				        <tbody>
				            <?php
				                foreach ($conn->listarContas() as $conta) { ?>
				                   	<tr>
					               	    <td style="width: 8px;"><a href="alterar_form.php?id=<?= $conta['id']; ?>"><img src="../assets/imagens/edit-icon.jpg" alt=""></a></td>
					               	    <td style="width: 8px;"><a href="../processar_incluir/remover_validacaoConta.php?id=<?= $conta['id'];?>"><img src="../assets/imagens/delete.png" alt=""></a></td>
					               	    <td><?= $conta['id']; ?></td>
					               	    <td><?= $conta['descricao']; ?></td>
					               	    <td><?= $conta['saldoInicial']; ?></td>
				               	    </tr>
				                <?php } ?>
				        </tbody>
				    </table>
	    		</div>

			</div>
	 
	 		<!-- Tab para consultar uma Conta Bancária específica -->
			<div role="tabpanel" class="tab-pane" id="consultar">
				 <form method="POST" action="consulta.php">
					<div class="tab-titulo">
						<h3>Consultar Conta</h3>
					</div>
						<div class="form-row">
							<div class="col-md-4 mb-1">
								<label for="id">Id da Conta</label>
								<input type="text" class="form-control" name="id" id="id" placeholder="Id...">
							</div>
						</div>
					<button class="btn btn-primary" type="submit">Procurar</button>
				</form>
			</div>

		</div>

		<!-- Mensagens de sucesso ou erro nas transações com o banco de dados -->
		<?php if(isset($_SESSION['sucesso_conta'])) { ?>
			<div class="alert alert-success" role="alert">
			  <span><?php echo $_SESSION['sucesso_conta']; ?></span> <a href="../processar_incluir/excluir_sessao.php" style="float: right;">x</a>
			</div>
		<?php } ?>

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