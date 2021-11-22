<?php


$u = new Usuario();


//essa variavel vai simplesmente determinar se o post veio pelo editar_usuario ou editar_configuracoes pois ambos utilizam a mesma class


//por questoes de seguranca obvias, o id eh recebido com informarcoes do usuario logado pois se utilizarmos $_GET nessa parte, qualquer usuario (comum, supervisor ou administrador) podera alterar a id no cabecalho html e editar qualquer usuario independente de sua permissao.
  $id = $u->id($_SESSION['user']);

  global $pdo;

  $sql = "SELECT * FROM usuarios WHERE id = $id;";

  $consulta = $pdo->query($sql);
  
//   essa variavel recebendo '1' indica que o post veio do 'editar_configuracoes'
  $_SESSION['configOuEdit'] = 1;

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
    <h2>Editar Configurações do Seu Usuario</h2>
    <form action="../../classes/usuario/editar_usuario.php" method="POST" style="margin-left: 220px;">
        <!-- area de campos do form -->
        <hr />

  
        <div class="row">
            <div class="form-group col-md-1"> <label for="nome">ID</label> <input READONLY type="text" class="form-control" name="id"  value="<?php echo $id ?>"  size="60"> </div>
<!-- 
            <div class="form-group col-md-1"> <label for="nome">Ativo?</label> <input READONLY type="text" class="form-control" name="ativo" style='color: <?php echo $corFonte; ?>; background-color: <?php echo $corBG; ?>' value="<?php echo $ativo ?>"  size="60"> </div> -->

            <div class="form-group col-md-6"> <label for="nome">Nome Completo</label> <input type="text" class="form-control" name="nome" value="<?php echo $nome ?>"  size="60"> </div>

            <div class="form-group col-md-4"> <label for="campo2">Usuário</label> <input READONLY type="text" class="form-control" name="user" value="<?php echo $user ?>"  autocomplete="off"> </div>
        </div>

        <div class="row">
            <div class="form-group col-md-5"> <label for="campo1">E-mail</label> <input type="email" class="form-control" name="email" value="<?php echo $email ?>" > </div>

            <div class="form-group col-md-3"> <label for="nome">Telefone</label> <input type="text" class="form-control" name="telefone" value="<?php echo $telefone ?>"  size="15"> </div>

            <div class="form-group col-md-3">
            <label for="permissao">Permissão</label>
            <?php

                if($u->permissao($user) == 1){
                    echo"<select class='form-select' aria-label='Permissao' name='permissao' DISABLED>";
                }
                else{
                    echo"<select class='form-select' aria-label='Permissao' name='permissao'>";

                }
            
            ?>
            
            

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
        <div class="form-group col-md-4">
        <label for="setor">Setor</label>
        
        <?php

            if($u->permissao($user) == 1){
                echo"<select class='form-select' aria-label='setor' name='setor' DISABLED>";
            }
            else{
                echo"<select class='form-select' aria-label='setor' name='setor'>";

            }

        ?>

        

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
            <label for="campo2">Data de Nascimento</label> <input type="date" class="form-control" name="nasc" required autocomplete="off" value="<?php echo $nasc; ?>"> 
        </div>
           
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

                <?php

                    // se o usuario for comum nao podera visuzalizar os botoes de ativar/desativar e excluir
                    if($u->permissao($user) == 3 || $u->permissao($user) == 2){

                ?>

                <div class="col">


                    <!-- nao eh interessante exibir um botao para excluir o proprio usuario e nem para desativalo, para fazer isso va em (usuarios->editar)  -->

                    <!-- <a href="../../classes/usuario/apagarUsuario.php?id=<?php echo $id; ?>"><button type='button' class='btn btn-danger-red' style='float: left;'>Excluir</button></a>  -->
                    
                    <!-- <a href="../../classes/usuario/desabilitarUsuario.php?id=<?php echo $id; ?>"><button type='button' class='btn btn-danger' style='width: 100px;'>Desativar</button></a>

                    <?php
                        if($u->retornaAtivo($id) == 1){
                    ?>
                        -->
                    <?php
                        }
                        else{
                    ?>
                        <a href="../../classes/usuario/habilitarUsuario.php?id=<?php echo $id; ?>"><button type='button' class='btn btn-success' style='width: 100px;'>Ativar</button></a>
                     <?php
                        }
                    }
                

                    ?>

                </div>
               
                <div class="col"> <button type="submit" class="btn btn-success">Salvar</button> 
                <!-- <a style='color: white !important' href="/" class="btn btn-danger">Cancelar</a> </div> -->
        </div>
    </form>

    <br><br><br><br><br>
    <?php
        if($_SESSION['permissao'] == 3){
    ?>
            <h2>Configurações do Sistema</h2>
            <hr>
            
            <div style='float: left;' id='backup_banco' class='boxItens'>
                <a href='../../config/backupBanco.php'><i class='active'></i><center><p style='white-space: pre-line;
                width: 100%;
                overflow: hidden !important;             
                text-overflow: ellipsis; max-height: 100px;'>Fazer Backup do Banco de Dados</p></center></a>
            </div>
        
            <div style='float: left;' id='backup_banco' class='boxItens'>
                <a href='https://localhost/phpmyadmin' target="_blank"><i class='active'></i><center><p style='white-space: pre-line;
                width: 100%;
                overflow: hidden !important;             
                text-overflow: ellipsis; max-height: 100px;'>Acessar o PHP<br>MyAdmin</p></center></a>
            </div>
        
            <div style='float: left;' id='backup_banco' class='boxItens'>
                <a href='https://localhost/phpinfo.php' target="_blank"><i class='active'></i><center><p style='white-space: pre-line;
                width: 100%;
                overflow: hidden !important;             
                text-overflow: ellipsis; max-height: 100px;'>PHPInfo</p></center></a>
            </div>
        <?php
            }
        ?>
</center>
