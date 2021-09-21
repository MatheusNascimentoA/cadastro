<?php
//sessão
session_start();
// header  
include_once '../includes/header.php';
?>

<div class="container-fluid">
	<div class="row">
		<nav class="navbar navbar-light bg-light">
			<div class="container-fluid">
				<a href="index.php" class="navbar-brand"><h3 class="mt-3">NOVO CLIENTE</h3></a>
			</div>
		</nav>
	</div>
</div>
<div class="container">
	<div class="row" >
		<form action="../php_action/create.php" method="POST">
			<div class="form-group row mt-5">

				<div class="col-md-3">
					<label for="nome">Nome:</label>
					<input type="text" name="nome" id="nome" required pattern="[A-Za-zÀ-ú ']{4,}">
				</div>

				<div class="col-md-3">
					<label for="sobrenome">Sobrenome:</label>
					<input type="text" name="sobrenome" id="sobrenome" required pattern="[A-Za-zÀ-ú ']{4,}">
				</div>

				<div class="col-md-3">
					<label for="email">Email:</label>
					<input type="email" name="email" id="email" required>
				</div>

				<div class="col-md-3">
					<label for="idade">Idade:</label>
					<input type="text" name="idade" id="idade" required>
				</div>
				
				<div class="col-md-5 mt-5">
					<button type="submit" name="btn-cadastrar" class="btn btn-info">Cadastrar</button>
					<a href="index.php" class="btn btn-success">Lista de clientes</a>
				</div>

			</div>
		</div>
	</form>
</div>

<?php  
include_once '../includes/footer.php';
?>




