<script src="../../js/jquery/jquery.js"></script>
<script src="../../js/jquery/jquery.mask.js"></script>
<?php
error_reporting(0);

if(!isset($_SESSION['logado']) || $_SESSION['permissao'] == '1'){

    header("Location: /");

}

  // OBS: aqui vai ser recebido apenas o id do mural por GET poi o texto nao pode ser recebido por esse meio, pois existe uma limiticao de caracteres enviados por GET

  // pega o id vindo por GET
  $id = $_GET['id'];



  $u = new Usuario();
  
  //caso o usuario logado, tenha um nivel de permissao menor que 3, algumas partes não estarao disponiveis para edicao
  if($u->permissaoXId($id) != 3){
    $classePermissao = 'hidden';
  }
  
  
  global $pdo;

  $sql = "SELECT * FROM usuarios WHERE id = '$id';";

  $consulta = $pdo->query($sql);
  
  //   essa variavel recebendo '0' indica que o post veio do 'editar_usuario'
  $_SESSION['configOuEdit'] = 0;

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
    $nasc = $linha['nasc'];


    if($ativo == 0){
        $ativo = "Não";
        $corBG = "Red";
        $corFonte = "white";
     
    }

    elseif($ativo == 1){
        $ativo = "Sim";
        $corBG = "Green";
        $corFonte = "white";
     
    }

    else{
        $ativo = 'Erro';
        $corBG = "Yellow";
        $corFonte = "black";
      
    }

  }
?>
<center style=" margin-top: 100px !important;">
    <h2>Editar Usuario</h2>
    
    <form action="../../classes/usuario/editar_usuario.php" method="POST" style="margin-left: 220px;">
        <!-- area de campos do form -->
        <hr />


        <div class="row">
      
            <div <?php echo $classePermissao; ?> class="form-group col-md-1"> <label for="nome">ID</label> <input READONLY type="text" class="form-control" name="id"  value="<?php echo $id ?>"  size="60"> </div>

            <div <?php echo $classePermissao; ?> class="form-group col-md-1"> <label for="nome">Ativo?</label> <input READONLY type="text" class="form-control" name="ativo" style='color: <?php echo $corFonte; ?>; background-color: <?php echo $corBG; ?>' value="<?php echo $ativo ?>"  size="60"> </div>

            <div class="form-group col-md-6"> <label for="nome">Nome Completo</label> <input type="text" class="form-control" name="nome" value="<?php echo $nome ?>"  size="60" REQUIRED> </div>

            <div class="form-group col-md-3"> <label for="campo2">Usuário</label> <input READONLY type="text" class="form-control" name="user" value="<?php echo $user ?>"  autocomplete="off" REQUIRED> </div>
        </div>

        <div class="row">
            <div class="form-group col-md-5"> <label for="campo1">E-mail</label> <input type="email" class="form-control" name="email" value="<?php echo $email ?>" REQUIRED> </div>

            <div class="form-group col-md-3"> <label for="nome">Telefone</label> <input type="text" class="form-control" id='telefone' name="telefone" value="<?php echo $telefone ?>"  size="15" REQUIRED> </div>

            <!-- NAO ME LEMBRO PRA QUE USEI ISSO -->
            <!-- <?php     echo gettype($nivelPermissao); ?> -->

            <div <?php echo $classePermissao; ?> class="form-group col-md-3">
            <label for="permissao">Permissão</label>
            <select class="form-select" name="permissao" REQUIRED>

            <?php
          
                switch ($permissao) {
                    case 1:
                        $permissaoString = "Comum";
                        break;
                    case 2:
                        $permissaoString = "Supervisor";
                        break;
                    case 3:
                        $permissaoString = "Administrador";
                        break;
                }
              
            
            ?>

                <option selected value="<?php echo $permissao;?>"> <?php echo "Atual: " . $permissaoString; ?> </option>
                <option value="1">Comum</option>
                <option value="2">Supervisor</option>
                <option value="3">Administrador</option>
            </select>
        </div> 
        <br>
        <div class="row"> 
        <div <?php echo $classePermissao; ?> class="form-group col-md-4">
        <label for="setor">Setor</label>
        <select class="form-select" aria-label="setor" name="setor" REQUIRED>

            <?php
                switch ($setor) {
                    case 1:
                        $setorString = "Comercial";
                        break;
                    case 2:
                        $setorString = "Cadastro";
                        break;
                    case 3:
                        $setorString = "Recepção";
                        break;
                    case 4:
                        $setorString = "Faturamento";
                        break;
                    case 5:
                        $setorString = "Tecnologia da Informação";
                        break;
                    case 6:
                        $setorString = "Contabilidade";
                        break;
                    case 7:
                        $setorString = "Interc./Audit.";
                        break;
                    case 8:
                        $setorString = "Diretoria";
                        break;
                    case 9:
                        $setorString = "Financeiro";
                        break;
                    case 10:
                        $setorString = "Gerência";
                        break;
                    case 11:
                        $setorString = "ANS";
                        break;
                    case 12:
                        $setorString = "GED";
                        break;
                    case 13:
                        $setorString = "Outros";
                        break; 
                }
            ?>

            <option selected value="<?php echo $setor;?>"> <?php echo "Atual: " . $setorString; ?> 
            <option value="1">Comercial</option>
            <option value="2">Cadastro</option>
            <option value="3">Recepção</option>
            <option value="4">Faturamento</option>
            <option value="5">Tecnologia da Informação</option>
            <option value="6">Contabilidade</option>
            <option value="7">Interc./Audit.</option>
            <option value="8">Diretoria</option>
            <option value="9">Financeiro</option>
            <option value="10">Gerência</option>
            <option value="11">ANS</option>
            <option value="12">GED</option>
            <option value="13">Outros</option>
        </select>
</div>
        <div class="form-group col-md-3"> 
            <label for="campo2">Data de Nascimento</label> <input value=<?php echo $nasc;?> type="date" class="form-control" name="nasc" required autocomplete="off" REQUIRED> 
        </div>

            <div class="form-group col-md-3"> <label for="campo2">Senha</label> <input type="password" class="form-control" name="pass" placeholder="••••••••••••••••••••••••••" autocomplete="off" > 
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

                

                <div <?php echo $classePermissao; ?> class="col">
                <a href="?pagina=../confirmaExcluir/usuario&id=<?php echo $id; ?>"><button type='button' class='btn btn-danger-red' style='float: left;'>Excluir</button></a> 


                    <?php
                        if($u->retornaAtivo($id) == 1){
                    ?>
                         <a href="../../classes/usuario/desabilitarUsuario.php?id=<?php echo $id; ?>"><button type='button' class='btn btn-danger' style='width: 100px;'>Desativar</button></a>
                    <?php
                        }
                        else{
                    ?>
                        <a  href="../../classes/usuario/habilitarUsuario.php?id=<?php echo $id; ?>"><button  type='button' class='btn btn-success' style='width: 100px;'>Ativar</button></a>
                     <?php
                        }
                    ?>

              

                </div>
               
    

                <div class="col"> <button type="submit" class="btn btn-success">Salvar</button> 
                <a style='color: white !important' href="/paginas/admin/main.php?pagina=../../classes/usuario/visualizar_usuario" class="btn btn-danger">Cancelar</a> </div>


        </div>
    </form>

    <!-- mascara para o telefone, nesse caso ele pega o id telefone e aplica essa mascara -->
    <script type="text/javascript">
        $("#telefone").mask("(00) 0000-0000");
    </script>   
</center>