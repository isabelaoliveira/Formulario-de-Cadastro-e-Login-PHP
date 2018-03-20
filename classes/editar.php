<?php 
  
  session_start();

  include_once("conexao.php");

  $codigo = filter_input(INPUT_GET, "codigo");
  $consulta = "SELECT * FROM formulario_digitalnativa WHERE codigo = '$codigo'";
  $con = mysqli_query($conexao,$consulta) or die(mysqli_error());
  $dados = $con->fetch_array();

  $consulta2 = "SELECT * FROM interesse WHERE codigo_usu = '$codigo'";
  $con2 = mysqli_query($conexao,$consulta2);
  $dados2 = $con2->fetch_array();

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar</title>
    
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../estilo.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../src/jquery.maskedinput.js" type="text/javascript"></script>
    
  </head>
  <body>

    <div class="container">

      <div class="page-header">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-8">
            <h1>Edição do Usuário <?php echo $dados['nome'];?></h1>
          </div>
        </div>
      </div>

      <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Editar</button>

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
                      <input type="text" name="nome" class="form-control" id="recipient-name" value="<?php echo $dados['nome']; ?>">
                    </div><!--// col -->
                  </div><!--// row -->
                </div>

                <div class="form-group">
                  <label for="recipient-telefone" class="control-label">Telefone:</label>
                  <div class="row">
                    <div class="col-md-4">
                      <input type="text" name="telefone" class="form-control" id="recipient-telefone" value="<?php echo $dados['telefone']; ?>">
                    </div><!--// col -->
                  </div><!--// row -->
                </div>

                <div class="form-group">
                  <label for="recipient-email" class="control-label">E-Mail:</label>
                  <div class="row">
                    <div class="col-md-9">
                      <input type="text" name="email" class="form-control" id="recipient-email" value="<?php echo $dados['email']; ?>">
                    </div><!--// col -->
                  </div><!--// row -->
                </div>

                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="recipient-senha" class="control-label">Senha:</label>
                    <input type="text" name="senha" class="form-control" id="recipient-senha" value="<?php echo $dados['senha']; ?>">
                  </div><!--// col -->

                  <div class="col-md-6">
                    <label for="sexo">Sexo:</label><br>
                    <?php 
                      if($dados['sexo'] == "Masculino"){
                        echo "<label class='radio-inline'>
                                <input type='radio' name='sexo' value='Masculino' checked>Masculino
                              </label>";
                      } else{
                        echo "<label class='radio-inline'>
                                <input type='radio' name='sexo' value='Masculino'>Masculino
                              </label>";
                      }

                      if($dados['sexo'] == "Feminino"){
                        echo "<label class='radio-inline'>
                                  <input type='radio' name='sexo' value='Feminino' checked>Feminino
                              </label>";
                      } else{
                        echo "<label class='radio-inline'>
                                  <input type='radio' name='sexo' value='Feminino'>Feminino
                                </label>";
                      }
                      
                    ?>
                  </div><!--// col -->
                </div><!--// row -->

                <div class="form-group">
                  <label for="area">*Áreas de Interesse:</label><br>
                  <?php

                    if($dados2['informatica'] == "s"){
                      echo "
                        <label class='checkbox-inline'>
                          <input type='checkbox' name='area1' value='s' checked />Informática
                        </label>";
                    } else{
                      echo "
                        <label class='checkbox-inline'>
                          <input type='checkbox' name='area1' value='s' />Informática
                        </label>";
                    }
                    
                    if($dados2['esporte'] == "s"){
                      echo"<label class='checkbox-inline'>
                              <input type='checkbox' name='area2' value='s' checked />Esporte
                          </label>";
                    } else{
                      echo"<label class='checkbox-inline'>
                              <input type='checkbox' name='area2' value='s' />Esporte
                          </label>";
                    }
                    
                    if($dados2['economia'] == "s"){
                      echo "<label class='checkbox-inline'>
                              <input type='checkbox' name='area3' value='s' checked />Economia
                            </label>";
                    } else{
                      echo "<label class='checkbox-inline'>
                              <input type='checkbox' name='area3' value='s' />Economia
                            </label>";
                    }
                    
                    if($dados2['carros'] == "s"){
                      echo "<label class='checkbox-inline'>
                              <input type='checkbox' name='area4' value='s' checked />Carros
                            </label>";
                    } else{
                      echo "<label class='checkbox-inline'>
                              <input type='checkbox' name='area4' value='s' />Carros
                            </label>";
                    }
                    
                    if($dados2['cinema'] == "s"){
                      echo "<label class='checkbox-inline'>
                              <input type='checkbox' name='area5' value='s' checked />Cinema
                            </label>";
                    } else{
                      echo "<label class='checkbox-inline'>
                              <input type='checkbox' name='area5' value='s' />Cinema
                            </label>";
                    }

                    if($dados2['outros'] == "s"){
                      echo "<label class='checkbox-inline'>
                              <input type='checkbox' name='area6' value='s' checked />Outros
                            </label>";
                    } else{
                      echo "<label class='checkbox-inline'>
                              <input type='checkbox' name='area7' value='s' />Outros
                            </label>";
                    }

                  ?>
                </div>

                
                <div class="form-group row">
                  <div class="col-md-8">
                    <label for="recipient-endereco" class="control-label">Endereço:</label>
                    <input type="text" name="endereco" class="form-control" id="recipient-endereco" value="<?php echo $dados['endereco']; ?>">
                  </div><!--// col -->

                  <div class="col-md-4">
                    <label for="recipient-numero" class="control-label">Número:</label>
                    <input type="number" name="numero" class="form-control" id="recipient-numero" value="<?php echo $dados['numero']; ?>">
                  </div><!--// col -->
                </div><!--// row -->

                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="recipient-bairro" class="control-label">Bairro:</label>
                    <input type="text" name="bairro" class="form-control" id="recipient-bairro" value="<?php echo $dados['bairro']; ?>">
                  </div><!--// col -->
 
                  <div class="col-md-6">
                    <label for="recipient-cidade" class="control-label">Cidade:</label>
                    <input type="text" name="cidade" class="form-control" id="recipient-cidade" value="<?php echo $dados['cidade']; ?>">
                  </div><!--// col -->
                </div><!--// row -->

                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="recipient-estado" class="control-label">Estado:</label>
                    <input type="text" name="estado" class="form-control" id="recipient-estado" value="<?php echo $dados['estado']; ?>">
                  </div><!--// col -->

                  <div class="col-md-3">
                    <label for="recipient-cep" class="control-label">CEP:</label>
                    <input type="text" name="cep" class="form-control" id="recipient-cep" value="<?php echo $dados['cep']; ?>">
                  </div><!--// col -->
                </div><!--// row -->

                <div class="form-group">
                  <label for="recipient-complemento" class="control-label">Complemento:</label>
                  <div class="row">
                    <div class="col-md-10">
                      <input type="text" name="complemento" class="form-control" id="recipient-complemento" value="<?php echo $dados['complemento']; ?>">
                    </div><!--// col -->
                  </div><!--// row -->
                </div>

                <input type="hidden" name="codigo" id="recipient-codigo" value="<?php echo $dados['codigo']; ?>">

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

      <script>
        $(document).ready(function () {
          $('#exampleModal').modal('show');
        });
      </script>

    </div> <!--// Container -->

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

  </body>
</html>