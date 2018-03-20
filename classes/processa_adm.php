<?php 
  
  session_start();

  include_once("secury_adm.php");
  include_once("conexao.php");

  $consulta = "SELECT * FROM formulario_digitalnativa";
  $con = mysqli_query($conexao,$consulta) or die(mysqli_error());

  $consulta2 = "SELECT * FROM interesse";
  $con2 = mysqli_query($conexao,$consulta2);
  $dados2 = $con2->fetch_array();
  $infomatica = $dados2['informatica'];
  $esporte = $dados2['esporte'];
  $economia = $dados2['economia'];
  $carros = $dados2['carros'];
  $cinema = $dados2['cinema'];
  $outros = $dados2['outros'];

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Relatório de Inscritos</title>
    
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../estilo.css" rel="stylesheet">
    
  </head>
  <body>

    <div class="container-fluid">

      <div class="page-header">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-8">
            <h1>Acesso do Adiministrador</h1>
          </div>
        </div>
      </div>

       <!-- RELATÓTIO -->
      <h3>Relatório de Inscritos</h3>

      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Sexo</th>
            <th>Interesses</th>
            <th>Endereço</th>
            <th>Bairro</th>
            <th>Número</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>CEP</th>
            <th>Complemento</th>
            <th colspan="2">Ação</th>
          </tr>
        </thead>
        <tbody>
          <?php while($dado = $con->fetch_array()){ ?>
          <tr>
            <td><?php echo $dado["codigo"]; ?></td>
            <td><?php echo $dado["nome"]; ?></td>
            <td><?php echo $dado["telefone"]; ?></td>
            <td><?php echo $dado["sexo"]; ?></td>
            <td><?php echo $dado["area"]; ?></td>
            <td><?php echo $dado["endereco"]; ?></td>
            <td><?php echo $dado["bairro"]; ?></td>
            <td><?php echo $dado["numero"]; ?></td>
            <td><?php echo $dado["cidade"]; ?></td>
            <td><?php echo $dado["estado"]; ?></td>
            <td><?php echo $dado["cep"]; ?></td>
            <td><?php echo $dado["complemento"]; ?></td>
            <td>
              <a class="btn btn-primary" href="<?php echo "editar.php?codigo=" . $dado['codigo']?>">Editar</a> | 
            
              <a href="" data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger" data-whatever="<?php echo $dado["nome"]; ?>" data-whatevercodigo="<?php echo $dado["codigo"]; ?>">Excluir</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table><!--// RELATÓTIO -->

      <!-- MODAL EXCLUIR -->
      <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h3 class="modal-title-excluir" id="exampleModalLabel"></h3>
            </div><!--// Header -->

            <form method="POST" action="processa_excluir.php">
              <input type="hidden" name="codigo" id="recipient-codigo-exc">

              <!-- Footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Excluir</button>
              </div><!--// Footer -->
            </form>

          </div><!--// Modal-Content -->
        </div>
      </div><!--// MODAL EXCLUIR -->

    </div> <!--// Container -->
      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../src/jquery.maskedinput.js" type="text/javascript"></script>

    <script type="text/javascript">
      $(function() {
          $.mask.definitions['~'] = "[+-]";

          $("#recipient-telefone").mask("(99) 9999-9999");
          $("#recipient-cep").mask("99999-999");


          $("input").blur(function() {
              $("#info").html("Unmasked value: " + $(this).mask());
          }).dblclick(function() {
              $(this).unmask();
          });
      });

    </script>

    <!-- Modal Excluir -->
    <script type="text/javascript">
      $('#modalExcluir').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var recipient = button.data('whatever')
        var recipientcodigo = button.data('whatevercodigo')
        var modal = $(this)
        modal.find('.modal-title-excluir').text('Excluir Usuário #' + recipientcodigo + ' ' + recipient + ' ?')
        modal.find('#recipient-name').val(recipient)
        modal.find('#recipient-codigo-exc').val(recipientcodigo)
      })
    </script><!--// Modal Excluir -->

    <!-- Limpar Formulário Logar Como Usuário -->
    <script type="text/javascript">
      function limpa() {
        if(document.getElementById('formcad').value!="") {
          document.getElementById('email').value="";
          document.getElementById('senha').value="";
      }
    }
    </script><!--// Limpar -->

  </body>
</html>