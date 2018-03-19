<?php 
  session_start();

  include_once("classes/conexao.php");

  $consulta = "SELECT * FROM formulario_digitalnativa";
  $con = mysqli_query($conexao,$consulta) or die(mysqli_error());

  unset($_SESSION['codigo']);
  unset($_SESSION['adm']);

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet">
    
  </head>

  <body>

    <div class="container">

      <div class="page-header">
        <h1>Formulário</h1>
      </div>

      <!-- LOGAR USUÁRIO -->
      <div class="row">
        <div class="col-md-3"><div class="titulo_cad">Fazer Login:</div></div>
        <div class="col-md-7"></div>
        <div class="col-md-2">
          <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalcad">Logar</button>
        </div>
      </div><hr><!--// LOGAR USUÁRIO -->

      <div class="text text-center text-danger">
        <?php 

          if(isset($_SESSION['errorlogin'])){

            echo $_SESSION['errorlogin'];
            unset($_SESSION['errorlogin']);
          }

        ?>
      </div>
      <div class="text text-center text-danger">
        <?php 

          if(isset($_SESSION['secury'])){

            echo $_SESSION['secury'];
            unset($_SESSION['secury']);
          }

        ?>
      </div><br>

      <!-- CADASTRAR USUÁRIO -->
      <div class="row">
        <div class="col-md-12">

          <form method="POST" action="classes/processa.php" enctype="multipart/form-data">

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="nome">*Nome:</label>
                <input type="text" class="form-control" name="nome" placeholder="Nome.." autofocus="" required>
              </div>

              <div class="form-group col-md-6">
                <label for="telefone">Telefone:</label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone.." required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="email">*E-Mail:</label>
                <input type="email" class="form-control" name="email" placeholder="E-Mail.." required>
              </div>

              <div class="form-group col-md-6">
                <label for="senha">*Senha:</label>
                <input type="text" class="form-control" name="senha" placeholder="Senha.." required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="sexo">*Sexo:</label><br>
                <label class="radio-inline">
                  <input type="radio" name="sexo" value="Masculio">Masculio
                </label>
                <label class="radio-inline">
                  <input type="radio" name="sexo" value="Feminino">Feminino
                </label>
              </div>

              <div class="form-group col-md-6">
                <label for="interesse">*Áreas de Interesse:</label><br>
                <label class="checkbox-inline">
                  <input type="checkbox" name="area1" value="s">Informática
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" name="area2" value="s">Esporte
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" name="area3" value="s">Economia
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" name="area4" value="s">Carros
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" name="area5" value="s">Cinema
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" name="area6" value="s">Outros
                </label>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="endereco">*Endereço:</label>
                <input type="text" class="form-control" name="endereco" placeholder="Endereço.." required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="bairro">*Bairro:</label>
                <input type="text" class="form-control" name="bairro" placeholder="Bairro.." required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-2">
                <label for="numero">*Número:</label>
                <input type="number" class="form-control" name="numero" placeholder="Número.." required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-5">
                <label for="cidade">*Cidade:</label>
                <input type="text" class="form-control" name="cidade" placeholder="Cidade.." required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="estado">*Estado:</label>
                <select class="form-control" required name="estado">
                  <?php 

                    $sql = "SELECT * FROM estado";
                    $resultado = mysqli_query($conexao,$sql);
                    while($dado = mysqli_fetch_array($resultado)){
                      $estado = $dado['nome'];
                      echo "<option value='$estado'>$estado</option>";
                    }

                  ?>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="cep">*Cep:</label>
                <input type="text" class="form-control" id="cep" name="cep" placeholder="Cep.." required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="complemento">Complemento:</label>
                <input type="text" class="form-control" name="complemento" placeholder="Complemeto..">
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
                  </div>
                </div>
              </div>
              <div class="col-md-10"></div>
            </div>

          </form>

        </div>
      </div><!--// CADASTRAR USUÁRIO -->

      <!-- MODAL LOGAR -->
      <div class="modal fade" id="modalcad" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h3 class="modal-title text-center" >Logar</h3>
            </div><!--// Header -->

            <!-- Body -->
            <div class="modal-body">
              <form method="POST" id="formcad" action="classes/processa_login.php">

                <div class="form-group">
                  <label for="email" class="control-label">E-Mail:</label>
                  <div class="row">
                    <div class="col-md-9">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div><!--// col -->
                  </div><!--// row -->
                </div>

                <div class="form-group">
                  <label for="senha" class="control-label">Senha:</label>
                  <div class="row">
                    <div class="col-md-4">
                      <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
                    </div><!--// col -->
                  </div><!--// row -->
                </div>

                <!-- Footer -->
                <div class="modal-footer">
                  <button type="button" onclick="limpa()" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Logar</button>
                </div><!--// Footer -->

              </form>
            </div><!--// Body -->

          </div><!--// Modal-Content -->
        </div>
      </div><!-- MODAL LOGAR USUÁRIO --> 

    </div> <!--// Container -->
      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="src/jquery.maskedinput.js" type="text/javascript"></script>

    <script type="text/javascript">
      $(function() {
          $.mask.definitions['~'] = "[+-]";

          $("#telefone").mask("(99) 9999-9999");
          $("#cep").mask("99999-999");


          $("input").blur(function() {
              $("#info").html("Unmasked value: " + $(this).mask());
          }).dblclick(function() {
              $(this).unmask();
          });
      });

    </script>

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