<?php 

	ob_start();

	if (($_SESSION['adm'] == "")) {
		$_SESSION['secury'] = "Error: Faça o login corretamente";
		header("Location: ../index.php");
	}
?>