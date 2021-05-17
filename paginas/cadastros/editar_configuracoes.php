<?php

if(!isset($_SESSION['logado']) || $_SESSION['permissao'] == '1'){

    header("Location: /");

}

  // OBS: aqui vai ser recebido apenas o id do informativo por GET poi o texto nao pode ser recebido por esse meio, pois existe uma limiticao de caracteres enviados por GET

  // pega o id vindo por GET
  $id = $_GET['id'];

  $u = new Usuario();

  global $pdo;

  $sql = "SELECT * FROM usuarios WHERE id = $id;";

  $consulta = $pdo->query($sql);
  
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

  
    $nome = $linha['nome'];
    $email = $linha['email'];
    $user = $linha['user']; 
    $pass = $linha['pass'];
    $permissao = $linha['permissao'];
    $telefone = $linha['telefone'];
    $dataCadastro = $linha['dataCadastro']; 
    $dataCadastroUnix = $linha['dataCadastroUnix']; 
    $idAdm = $linha['idAdm']; 
    $excluido = $linha['excluido']; 
    $ativo = $linha['ativo']; 
    $setor = $linha['setor']; 


  

  }
?>
<center style=" margin-top: 100px !important;">
    <h2>Editar Configurações</h2>
    <form action="../../classes/usuario/editar_usuario.php" method="POST" style="margin-left: 220px;">
        <!-- area de campos do form -->
        <hr />

  
        <div class="row">
            <div class="form-group col-md-1"> <label for="nome">ID</label> <input READONLY type="text" class="form-control" name="id"  value="<?php echo $id ?>"  size="60"> </div>

            <div class="form-group col-md-6"> <label for="nome">Nome Completo</label> <input type="text" class="form-control" name="nome" value="<?php echo $nome ?>"  size="60"> </div>

            <div class="form-group col-md-3"> <label for="campo2">Usuário</label> <input READONLY type="text" class="form-control" name="user" value="<?php echo $user ?>"  autocomplete="off"> </div>
        </div>

        <div class="row">
            <div class="form-group col-md-5"> <label for="campo1">E-mail</label> <input type="email" class="form-control" name="email" value="<?php echo $email ?>" > </div>

            <div class="form-group col-md-3"> <label for="nome">Telefone</label> <input type="text" class="form-control" name="telefone" value="<?php echo $telefone ?>"  size="15"> </div>
  
        </div>
        <div class="row">

            
        <div class="form-group col-md-3"> <label for="campo2">Senha</label> <input type="password" class="form-control" name="pass" placeholder="••••••••••••••••••••••••••" autocomplete="off"> 

        </div>

        <br><br>
                <!-- <div class="form-group col-md-2">
                    <label for="status">Status</label>
                <select class="form-select" aria-label="status" name="status" required>
                    <option selected></option>
                    <option value="1">Ativo</option>
                    <option value="2">Temporario</option>
                    <option value="3">Desativado</option>
                    </select>
                </div> -->

        <!-- ao selecionar a opcao de usuario temporario esse campo abaixo 'tempo' devera aparecer para colocar quantas horas esse usuario ficara ativo no sistema, a logica de se criar usuarios temporarios deve-se ao fato da possibilidade de usuarios que nao vao usar o sistema por muito tempo tais como: auditorias internas e externas, visitantes entre outros. -->
        <!-- <div class="form-group col-md-2"> <label for="campo2">Tempo em Horas</label> <input type="number" class="form-control" name="tempo" required autocomplete="off"> </div>
            </div>
        </div> -->
        <br>
        <br>
        <div id="actions" class="row">

                

                <div class="col">
                  

              

                </div>
               
    

                <div class="col"> <button type="submit" class="btn btn-success">Salvar</button> 
                <a style='color: white !important' href="/paginas/admin/main.php" class="btn btn-danger">Cancelar</a> </div>


        </div>
    </form>
</center>