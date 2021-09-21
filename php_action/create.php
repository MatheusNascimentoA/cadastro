<?php
//sessão
session_start();
// conexão
require_once 'db_connect.php';

/*
// clear
function clear($input) {
	global $connect;
	//sql
	$var = mysqli_escape_string($connect, $input);
	//xss
	$var = htmlspecialchars($var);
	return $var;
}

*/

if(isset($_POST['btn-cadastrar'])) {
	$nome = mysqli_escape_string($connect, $_POST['nome']);
	$sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
	$email = mysqli_escape_string($connect, $_POST['email']);
	$idade = mysqli_escape_string($connect, $_POST['idade']);

	$sql = "INSERT INTO cliente (nome, sobrenome, email, idade) VALUES ('$nome', '$sobrenome', '$email', '$idade')";

	if(mysqli_query($connect, $sql)) {
		$_SESSION['mensagem'] = "Cadastro efetuado com sucesso";
		header('Location: ../crud/index.php');
	} else {
		$_SESSION['mensagem'] = "Erro ao efetuado cadastro";
		header('Location: ../crud/index.php');
	}
}
?>