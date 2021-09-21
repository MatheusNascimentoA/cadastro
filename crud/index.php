<?php
//sessão
session_start();
// Conexão
include_once '../php_action/db_connect.php';
// header
include_once '../includes/header.php';
?>


<div class="container-fluid">
	<div class="row">
		<nav class="navbar navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand">
					<h3 class="mt-3">CLIENTES</h3>
				</a>
				<form class="d-flex">
					<input class="form-control me-2" type="search" id="search" placeholder="Search" aria-label="Search" autocomplete="off">
					<button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
				</form>
			</div>
		</nav>

	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12 mt-2 text-center">
			<table class="table table-striped table-dark table align-middle">
				<thead>
					<tr>
						<th>Nome:</th>
						<th>Sobrenome:</th>
						<th>Email:</th>
						<th>Idade:</th>
						<th>EDITAR</th>
						<th>EXCLUIR</th>
					</tr>
				</thead>

				<tbody>
					<?php
					$sql = "SELECT * FROM cliente";
					$resultado = mysqli_query($connect, $sql);
					if (mysqli_num_rows($resultado) > 0) {

						while ($dados = mysqli_fetch_array($resultado)) {
					?>
							<tr>
								<td><?php echo $dados['nome']; ?></td>
								<td><?php echo $dados['sobrenome']; ?></td>
								<td><?php echo $dados['email']; ?></td>
								<td><?php echo $dados['idade']; ?></td>
								<td><a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn btn-success rounded-circle"><i class="fas fa-pencil-alt"></i></a></td>
								<td><a href="" data-bs-toggle="modal" data-bs-target="#modalexcluir<?php echo $dados['id']; ?>" class="btn btn-danger rounded-circle"><i class="fas fa-trash-alt"></i></a></td>
								<!-- Modal -->
								<div class="modal fade" id="modalexcluir<?php echo $dados['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">EXCLUIR USUARIO</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<h5>
													Tem certeza que deseja excluir o usuario(a):
													<h3>
														<?php echo $dados['nome']; ?>
													</h3>
												</h5>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-primary" data-bs-dismiss="modal">CANCELAR</button>
												<form action="../php_action/deletar.php" method="POST">
													<input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
													<button type="submit" name="btn-deletar" class="btn btn-secondary">EXCLUIR</button>
												</form>
											</div>
										</div>
									</div>
								</div>
								<!-- Modal -->
							</tr>
						<?php
						}
					} else { ?>
						<tr>
							<td>-</td>
							<td>-</td>
							<td>-</td>
							<td>-</td>
							<td>-</td>
							<td>-</td>
						</tr>

					<?php	} ?>

				</tbody>
			</table>
		</div>
		<br>
		<div class="col-md-6">
			<a href="adicionar.php" class="btn btn-info border-dark">
				<h6>ADICIONAR CLIENTE</h6>
			</a>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Cadastro do Cliente</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<p><?php echo $_SESSION['mensagem']; ?></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
				
			</div>
		</div>
	</div>
</div>


<!--
<?php
echo "<script>$('#sucesso').modal('show')</script>";
?>
-->
<?php
include_once '../includes/footer.php';
?>