<?php 
  
  session_start();

  include_once("secury.php");
  include_once("conexao.php");

  $codigo = $_SESSION['codigo'];

  $consulta = "SELECT * FROM formulario_digitalnativa WHERE codigo = '$codigo'";
  $con = mysqli_query($conexao,$consulta) or die(mysqli_error());



?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuário Logado</title>
    
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
            <h1>Acesso do Usuário</h1>
          </div>
        </div>
      </div>

       <!-- RELATÓTIO -->
      <h3>Dados do Usuário</h3>

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
              <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $dado["nome"];?>" data-whatevertelefone="<?php echo $dado["telefone"];?>" data-whateveremail="<?php echo $dado["email"];?>" data-whateversenha="<?php echo $dado["senha"];?>" data-whateverendereco="<?php echo $dado["endereco"];?>" data-whateverbairro="<?php echo $dado["bairro"];?>" data-whatevernumero="<?php echo $dado["numero"];?>" data-whatevercidade="<?php echo $dado["cidade"];?>" data-whateverestado="<?php echo $dado["estado"];?>" data-whatevercep="<?php echo $dado["cep"];?>" data-whatevercomplemento="<?php echo $dado["complemento"];?>" data-whatevercodigo="<?php echo $dado["codigo"];?>">Editar</a> | 
            
              <a href="" data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger" data-whatever="<?php echo $dado["nome"]; ?>" data-whatevercodigo="<?php echo $dado["codigo"]; ?>">Excluir</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table><!--// RELATÓTIO -->

      <!-- MODAL EDITAR -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h3 class="modal-title" id="exampleModalLabel"></h3>
            </div><!--// Header -->

            <!-- Body -->
            <div class="modal-body">
              <form method="POST" action="processa_editar.php">

                <div class="form-group">
                  <label for="recipient-name" class="control-label">Nome:</label>
                  <div class="row">
                    <div class="col-md-10">
                      <input type="text" name="nome" class="form-control" id="recipient-name">
                    </div><!--// col -->
                  </div><!--// row -->
                </div>

                <div class="form-group">
                  <label for="recipient-telefone" class="control-label">Telefone:</label>
                  <div class="row">
                    <div class="col-md-4">
                      <input type="text" name="telefone" class="form-control" id="recipient-telefone">
                    </div><!--// col -->
                  </div><!--// row -->
                </div>

                <div class="form-group">
                  <label for="recipient-email" class="control-label">E-Mail:</label>
                  <div class="row">
                    <div class="col-md-9">
                      <input type="text" name="email" class="form-control" id="recipient-email">
                    </div><!--// col -->
                  </div><!--// row -->
                </div>

                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="recipient-senha" class="control-label">Senha:</label>
                    <input type="text" name="senha" class="form-control" id="recipient-senha">
                  </div><!--// col -->

                  <div class="col-md-6">
                    <label for="sexo">Sexo:</label><br>
                    <label class="radio-inline">
                      <input type="radio" name="sexo" value="Masculio">Masculio
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="sexo" value="Feminino">Feminino
                    </label>
                  </div><!--// col -->
                </div><!--// row -->

                <div class="form-group">
                  <label for="area">*Áreas de Interesse:</label><br>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="area" value="Informática">Informática
                  </label>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="area" value="Esporte">Esporte
                  </label>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="area" value="Economia">Economia
                  </label>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="area" value="Carros" >Carros
                  </label>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="area" value="Cinema">Cinema
                  </label>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="area" value="Outros">Outros
                  </label>
                </div>

                
                <div class="form-group row">
                  <div class="col-md-8">
                    <label for="recipient-endereco" class="control-label">Endereço:</label>
                    <input type="text" name="endereco" class="form-control" id="recipient-endereco">
                  </div><!--// col -->

                  <div class="col-md-4">
                    <label for="recipient-numero" class="control-label">Número:</label>
                    <input type="number" name="numero" class="form-control" id="recipient-numero">
                  </div><!--// col -->
                </div><!--// row -->

                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="recipient-bairro" class="control-label">Bairro:</label>
                    <input type="text" name="bairro" class="form-control" id="recipient-bairro">
                  </div><!--// col -->
 
                  <div class="col-md-6">
                    <label for="recipient-cidade" class="control-label">Cidade:</label>
                    <input type="text" name="cidade" class="form-control" id="recipient-cidade">
                  </div><!--// col -->
                </div><!--// row -->

                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="recipient-estado" class="control-label">Estado:</label>
                    <input type="text" name="estado" class="form-control" id="recipient-estado">
                  </div><!--// col -->

                  <div class="col-md-3">
                    <label for="recipient-cep" class="control-label">CEP:</label>
                    <input type="text" name="cep" class="form-control" id="recipient-cep">
                  </div><!--// col -->
                </div><!--// row -->

                <div class="form-group">
                  <label for="recipient-complemento" class="control-label">Complemento:</label>
                  <div class="row">
                    <div class="col-md-10">
                      <input type="text" name="complemento" class="form-control" id="recipient-complemento">
                    </div><!--// col -->
                  </div><!--// row -->
                </div>

                <input type="hidden" name="codigo" id="recipient-codigo">

                <!-- Footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Alterar</button>
                </div><!--// Footer -->

              </form>
            </div><!--// Body -->

          </div><!--// Modal-Content -->
        </div>
      </div><!--// MODAL EDITAR -->

      <!-- MODAL EXCLUIR -->
      <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h3 class="modal-title-excluir" id="exampleModalLabel"></h3>
            </div><!--// Header -->

            <form method="POST" action="processa_excluir.php" enctype="multipart/form-data">
              <input type="hidden" name="codigo" id="recipient-codigo-exc-">

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

    <!-- Modal Editar -->
    <script type="text/javascript">
      $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var recipient = button.data('whatever')
        var recipientidade = button.data('whatevertelefone')
        var recipientemail = button.data('whateveremail')
        var recipientsenha = button.data('whateversenha')
        var recipientendereco = button.data('whateverendereco')
        var recipientbairro = button.data('whateverbairro')
        var recipientnumero = button.data('whatevernumero')
        var recipientcidade = button.data('whatevercidade')
        var recipientestado = button.data('whateverestado')
        var recipientcep = button.data('whatevercep')
        var recipientcomplemento = button.data('whatevercomplemento')
        var recipientcodigo = button.data('whatevercodigo')
        var modal = $(this)
        modal.find('.modal-title').text('Editar Usuário #' + recipientcodigo + ' ' + recipient)
        modal.find('#recipient-name').val(recipient)
        modal.find('#recipient-telefone').val(recipientidade)
        modal.find('#recipient-email').val(recipientemail)
        modal.find('#recipient-senha').val(recipientsenha)
        modal.find('#recipient-endereco').val(recipientendereco)
        modal.find('#recipient-bairro').val(recipientbairro)
        modal.find('#recipient-numero').val(recipientnumero)
        modal.find('#recipient-cidade').val(recipientcidade)
        modal.find('#recipient-estado').val(recipientestado)
        modal.find('#recipient-cep').val(recipientcep)
        modal.find('#recipient-complemento').val(recipientcomplemento)
        modal.find('#recipient-codigo').val(recipientcodigo)
      })
    </script><!--// Modal Editar -->

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

  </body>
</html>