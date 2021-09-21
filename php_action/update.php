<?php
//sessão
session_start();
// conexão
require_once 'db_connect.php';

if(isset($_POST['btn-editar'])) {
	$nome = mysqli_escape_string($connect, $_POST['nome']);
	$sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
	$email = mysqli_escape_string($connect, $_POST['email']);
	$idade = mysqli_escape_string($connect, $_POST['idade']);
	$id = mysqli_escape_string($connect, $_POST['id']);

	$sql = "UPDATE cliente SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', idade = '$idade' WHERE id = '$id'";

	if(mysqli_query($connect, $sql)) {
		$_SESSION['mensagem'] = "Cadastro atualizado com sucesso";
		header('Location: ../crud/index.php');
	} else {
		$_SESSION['mensagem'] = "Erro ao atualizar cadastro";
		header('Location: ../crud/index.php');
	}
}
?>
