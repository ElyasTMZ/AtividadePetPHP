<?php 

	session_start();

	require_once 'conexao_bd.php';

	if (isset($_POST['btn-cadastrar'])) {
		
		$nome = mysqli_escape_string($connection,$_POST['nome']);
		$especie = mysqli_escape_string($connection,$_POST['especie']);
		$raca = mysqli_escape_string($connection,$_POST['raca']);
		$idade = mysqli_escape_string($connection,$_POST['idade']);

		$sql = "INSERT INTO tbClientes(nomeCli,especieCli,racaCli,idadeCli)VALUES('$nome','$especie','$raca','$idade')";

		if(mysqli_query($connection, $sql)) {

			$_SESSION['mensagem'] = "Cadastrado com sucesso.";

			header('Location: ../index.php');
		}
		else{

			$_SESSION['mensagem'] = "Erro ao cadastrar.";

			header('Location: ../index.php');	
		}
	}
