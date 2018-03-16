<?php
	session_start();

	include_once('conexao.php');

	$email = $_POST['email'];
	$senha = $_POST['senha'];

	$consulta = "SELECT * FROM formulario_digitalnativa WHERE email = '$email' AND senha = '$senha' LIMIT 1";

	$con = mysqli_query($conexao,$consulta);

	$result = $con->fetch_assoc();

	if($email=='adm@adm.com' and $senha=='123'){
		$_SESSION['adm'] = $email; // Só para ter um valor válido.
		header('Location: processa_adm.php');
	}elseif(empty($result)){
		$_SESSION['errorlogin'] = "Erro ao Logar: Usuário ou senha invalidos!";
		header('Location: ../index.php');
	}else{
		$_SESSION['codigo'] = $result['codigo'];
		header('Location: processa_usu.php');
	}

 ?>