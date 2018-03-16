<?php
		include_once("conexao.php");

		$nome = $_POST['nome'];
		$telefone = $_POST['telefone'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
    $sexo = $_POST['sexo'];
    $area = $_POST['area'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $numero = $_POST['numero'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    $complemento = $_POST['complemento'];
		

		$sql = "INSERT INTO formulario_digitalnativa (nome,telefone,email,senha,sexo,area,endereco,bairro,numero,cidade,estado,cep,complemento) VALUES ('$nome', '$telefone', '$email', '$senha', '$sexo', '$area', '$endereco', '$bairro', '$numero', '$cidade', '$estado', '$cep', '$complemento')";
		$salvar = mysqli_query($conexao, $sql);

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