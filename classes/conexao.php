<?php

	$conexao = mysqli_connect("localhost", "root", "", "cadastro");

	$conexao2 = mysqli_connect("localhost", "root", "", "cadastro");
   
	  if(!$conexao){
	    die ('Não foi possível conectar-se ao banco de dados');
	  }

	  if(!$conexao2){
	    die ('Não foi possível conectar-se ao banco de dados');
	  }
   
?>