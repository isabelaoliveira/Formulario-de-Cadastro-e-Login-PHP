<?php
		include_once("conexao.php");

		$nome = $_POST['nome'];
		$telefone = $_POST['telefone'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $numero = $_POST['numero'];
    $cidade = $_POST['cidade'];
    $cep = $_POST['cep'];
    $complemento = $_POST['complemento'];
    $codigo = $_POST['codigo'];

    $area = "";

    if(isset($_POST['sexo'])){
      $sexo = $_POST['sexo'];
    } else{
      $sexo = "n";
    }

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
      $area = $area . "Economia. ";
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
      $area = $area . "Outros. ";
    } else{ 
      $outros = " ";
    }

    $sql = "UPDATE formulario_digitalnativa SET nome='$nome', telefone='$telefone', email='$email', senha='$senha', sexo='$sexo', area='$area', endereco='$endereco', bairro='$bairro', numero='$numero', cidade='$cidade', cep='$cep', complemento='$complemento' WHERE codigo = '$codigo'";

    $sql_check = "UPDATE interesse SET informatica='$informatica', esporte='$esporte', economia='$economia', carros='$carros', cinema='$cinema', outros='$outros' WHERE codigo_usu = '$codigo'";

    $atualizar = mysqli_query($conexao, $sql) or die ("Erro no Banco formulario_digitalnativa");

		$linhas = mysqli_affected_rows($conexao);

    $atualizar_check = mysqli_query($conexao2, $sql_check) or die ("Erro no Banco interesse");

		mysqli_close($conexao);
 
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Conf. de Alteração</title>
    
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../estilo.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    
  </head>
  <body>

  	<div class="container">
  		<div class="page-header">
  			<h1>Confirmação de Alteração</h1>
  		</div>

      <?php 

  			if ($linhas == 1) {	?>	

          <!-- Modal -->
  				<div class="modal fade" id="janela">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title">Alteração Realizado com Sucesso!</h3>
                </div>
                <div class="modal-body">                 
                  <?php echo "Usuário <b>$nome</b> Alterado" ?>                 
                </div>
                <div class="modal-footer">                 
                  <a href="processa_adm.php" class="btn btn-primary">OK</a>
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
                  <h3 class="modal-title">Erro ao Alterar Usuário!</h3>
                </div>
                <div class="modal-body">                 
                  <?php echo 'Erro no Banco de Dados!' ?>                 
                </div>
                <div class="modal-footer">                 
                  <a href="processa_adm.php" class="btn btn-danger">OK</a>
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
  			<a class="btn btn-primary" href="processa_adm.php">Voltar</a>
  		</div>

  	</div><!-- Conteiner -->

  </body>
</html>