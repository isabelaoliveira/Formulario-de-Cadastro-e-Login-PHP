<?php

    session_start();

		include_once("conexao.php");


		$nome = $_POST['nome'];
		$telefone = $_POST['telefone'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
    $sexo = $_POST['sexo'];
    //$area = $_POST['area'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $numero = $_POST['numero'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    $complemento = $_POST['complemento'];

    $area = "";

    // Áreas de Interesses
    if(isset($_POST['area1'])){
      $informatica = $_POST['area1'];
      $area = "Informatica. ";
    } else{ 
      $informatica = " ";
    }
        
    if(isset($_POST['area2'])){
      $esporte = $_POST['area2'];
      $area = $area . "Esporte. ";
    } else{ 
      $esporte = " ";
    }

    if(isset($_POST['area3'])){
      $economia = $_POST['area3'];
      $area = $area . "Economida. ";
    } else{ 
      $economia = " ";
    }

    if(isset($_POST['area4'])){
      $carros = $_POST['area4'];
      $area = $area . "Carros. ";
    } else{ 
      $carros = " ";
    }
    
    if(isset($_POST['area5'])){
      $cinema = $_POST['area5'];
      $area = $area . "Cinema. ";
    } else{ 
      $cinema = " ";
    }

     if(isset($_POST['area6'])){
      $outros = $_POST['area6'];
      $area = $area . "Outros.";
    } else{ 
      $outros = " ";
    }

    $sql = "INSERT INTO formulario_digitalnativa (nome,telefone,email,senha,sexo,area,endereco,bairro,numero,cidade,estado,cep,complemento) VALUES ('$nome', '$telefone', '$email', '$senha', '$sexo', '$area', '$endereco', '$bairro', '$numero', '$cidade', '$estado', '$cep', '$complemento')";

    $sql2 = "INSERT INTO interesse (codigo_usu,informatica,esporte,economia,carros,cinema,outros) VALUES ((select LAST_INSERT_ID()),'$informatica', '$esporte', '$economia', '$carros', '$cinema', '$outros')";
    
		mysqli_query($conexao, $sql) or die ("Erro no Banco formulario_digitalnativa");

    mysqli_query($conexao2, $sql2) or die ("Erro no Banco interesse");

		$linhas = mysqli_affected_rows($conexao);

		mysqli_close($conexao);
 
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Conf. de Cadastro</title>
    
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../estilo.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    
  </head>
  <body>

  	<div class="container">
  		<div class="page-header">
  			<h1>Confirmação de Cadastro</h1>
  		</div>

      <?php 

  			if ($linhas == 1) {	?>	

          <!-- Modal -->
  				<div class="modal fade" id="janela">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title">Cadastro Realizado com Sucesso!</h3>
                </div>
                <div class="modal-body">                 
                  <?php echo "Usuário <b>$nome</b> Cadastrado" ?>                
                </div>
                <div class="modal-footer">                 
                  <a href="../index.php" class="btn btn-primary">OK</a>
                </div>
              </div>
            </div>
          </div><!--// Modal -->
          <script>
            $(document).ready(function () {
              $('#janela').modal('show');
            });
          </script>
  			
       <?php }else{ ?>

  				<!-- Modal -->
          <div class="modal fade" id="janela">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title">Erro ao Cadastrar Usuário!</h3>
                </div>
                <div class="modal-body">                 
                  <?php echo 'Já Exixte Alguem Cadastrado com Este E-mail<br> Ou Erro no Banco de Dados!' ?>            
                </div>
                <div class="modal-footer">                 
                  <a href="../index.php" class="btn btn-danger">OK</a>
                </div>
              </div>
            </div>
          </div><!--// Modal -->

          <!-- Show Modal -->
          <script>
            $(document).ready(function () {
              $('#janela').modal('show');
            });
          </script><!--// Show Modal -->

  			<?php } ?>

  		<div>
  			<a class="btn btn-primary" href="../index.php">Voltar</a>
  		</div>

  	</div><!-- Conteiner -->

  </body>
</html>