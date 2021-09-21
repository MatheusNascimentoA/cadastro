<?php
// conexão
include_once '../php_action/db_connect.php';
// header
include_once '../includes/header.php';
// select
if(isset($_GET['id'])) {
	// atribuindo id com filtro
	$id = mysqli_escape_string($connect, $_GET['id']);
	// consulta
	$sql = "SELECT * FROM cliente WHERE id = '$id'";
	$resultado = mysqli_query($connect, $sql);
	$dados = mysqli_fetch_array($resultado);
}
?>
<div class="container-fluid" style="background: url(); size: ">
	<div class="row">
		<nav class="navbar navbar-light bg-light">
			<div class="container-fluid">
				<a href="index.php" class="navbar-brand"><h3 class="mt-3">Editar Cliente</h3></a>
			</div>
		</nav>
	</div>
</div>
<div class="container">
	<div class="row" > 
		<form action="../php_action/update.php" method="POST">
			<div class="form-group row mt-5">
				
				<input type="hidden" name="id" value="<?php echo $dados['id'];?>">

				<div class="col-md-3">
					<label for="nome">Nome:</label>
					<input type="text" name="nome" id="nome" value="<?php echo $dados['nome'];?>" required pattern="[A-Za-zÀ-ú ']{4,}">
				</div>

				<div class="col-md-3">
					<label for="sobrenome">Sobrenome:</label>
					<input type="text" name="sobrenome" id="sobrenome" value="<?php echo $dados['sobrenome'];?>" required pattern="[A-Za-zÀ-ú ']{4,}">
				</div>

				<div class="col-md-3">
					<label for="email">Email:</label>
					<input type="email" name="email" id="email" value="<?php echo $dados['email'];?>" required>
				</div>

				<div class="col-md-3">
					<label for="idade">Idade:</label>
					<input type="text" name="idade" id="idade" value="<?php echo $dados['idade'];?>" required>
				</div>

				<div class="col-md-5 mt-5">
					<button type="submit" name="btn-editar" class="btn btn-info">Atualizar</button>
					<a href="index.php" class="btn btn-success">Lista de clientes</a>
				</div>

			</div>
		</div>
	</form>
</div>

<?php  
include_once '../includes/footer.php';
?>




