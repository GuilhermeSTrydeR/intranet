<?php
  if(!isset($_SESSION['logado']) && $_SESSION['permissao'] == '1'){

    header("Location: /");
      
  }

  // OBS: aqui vai ser recebido apenas o id do informativo por GET poi o texto nao pode ser recebido por esse meio, pois existe uma limiticao de caracteres enviados por GET

  // pega o id vindo por GET
  $id = $_GET['id'];


  //requer classe de conexao do banco
  require("../../classes/conexao_bd.php");

  //requer o informativo.class onde o comando para gravar no banco ja esta pronto
  require("../../classes/acesso/acesso.class.php");

  // configuracoes, nesse caso o fuso horario
  require("../../config/config.php");

  $ac = new Acesso();

  global $pdo;

  $sql = "SELECT * FROM acesso_grupo WHERE id = $id;";

  $consulta = $pdo->query($sql);
  
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

  
    $id = $linha['id'];
    $nome = $linha['nome'];
    $ativo = $linha['ativo'];
    $permissao = $linha['permissao'];
    $interno = $linha['interno'];

    if($interno == 0){

      $internoString = "Não";

    }
    elseif($interno == 1){

      $internoString = "Sim";

    }
    


  }

?>

<center>
<form action="../../classes/acesso/editar_grupo_acesso.php" method="POST" style='max-width: 500px; margin-top: 50px;'>

    <?php 
      if($id > 1){
    ?>
      <input type="text" name='id' value="<?php echo $id; ?>" style='display: none;'>
  <div class="form-group">
    <label for="titulo">Alterar Nome Do Grupo</label>
    <br><br>
    <input type="text" class="form-control" id="title" name="nome" value="<?php echo $nome; ?>" required>
    <br><br>

    <?php


      if($permissao == 1){

        $permissaoString = "Publico";

      }
      elseif($permissao == 2){

        $permissaoString = "Restrito";

      }
    
    ?>

<label for="titulo">Alterar Permissão</label>
<br><br>


    <select class="form-select" aria-label="Permissao" name="permissao" >
      <option selected value="<?php echo $permissao;?>"> <?php echo "Atual: " . $permissaoString; ?> </option> 
      <option value="1">Publico (qualquer um pode ver)</option>
      <option value="2">Restrito (somente usuarios logados podem ver)</option>
    </select>

 
  <br>

  <label for="titulo">Interno / Externo</label>
<br><br>


    <select class="form-select" aria-label="Permissao" name="interno" >
      <option selected value="<?php echo $interno;?>"> <?php echo "Atual: " . $internoString; ?> </option> 
      <option value="0">Externo</option>
      <option value="1">Interno</option>
    </select>

 
  <br>

        <br>
        <div class="col-sm-12">
        
          <br>
          <div class='col' style='float: left;'>
          <label class="form-check-label" for="ativo">
            Exibir nos Acessos
          </label>

          <!-- nesse input sera checado se o informativo esta ativo, se o mesmo estiver ativo, sera escrito no html o atributo (checked) fazendo assim o input ficar marcado -->
          <input class="form-check-input" type="checkbox" name='ativo' value= '1' <?php 

            if($ac->retornaGrupoAtivo($id) == 1){
              echo "checked";
            }


          ?>>

          <div id="actions" class="col" style='float: right; margin-right: -375px;'>
          <div class=row>
            

              <?php
                if($id > 1){
              ?>
              <div class="col" style='margin-right: 65px !important;'> 
                <a href="../../classes/acesso/apagarGrupoAcesso.php?id=<?php echo $id; ?>"><button type='button' class='btn btn-danger-red'>Excluir</button></a> 
                </div> 
              <?php
                }
              ?>

            <div class="col"> 
            <button type="submit" class="btn btn-success">Salvar</button> 
            </div>

            <div class="col"> 
            <a style='color: white !important' href="/paginas/admin/main.php?pagina=../../classes/acesso/visualizar_grupo_acesso&id=<?php echo $id; ?>" class="btn btn-danger">Cancelar</a> 
            </div>
            
            </div>
            </div>
           
          <br>
          <br>
        </div>

        </div>  
  </div>
 

    <?php
      }
      else{
        ?>
          <input type="text" name='id' value="<?php echo $id; ?>" style='display: none;'>
  <div class="form-group">
    <label for="titulo">Alterar Nome Do Grupo</label>
    <br><br>
    <input type="text" class="form-control" id="title" name="nome" value="<?php echo $nome; ?>" required>
    <br><br>

    <?php

      if($permissao == 1){

        $permissaoString = "Publico";

      }
      elseif($permissao == 2){

        $permissaoString = "Restrito";

      }
    
    ?>

<label for="titulo">Alterar Permissão</label>
<br><br>


    <select class="form-select" aria-label="Permissao" name="permissaoDisabled" DISABLED>
      <option selected value="<?php echo $permissao;?>"> <?php echo "Atual: " . $permissaoString; ?> </option> 
      <option value="1">Publico (qualquer um pode ver)</option>
      <option value="2">Restrito (somente usuarios logados podem ver)</option>
    </select>

    <input type="text" class="hidden" name="permissao" value="<?php echo $id; ?>">
    <input type="text" class="hidden" name="ativo" value="1">

 
  <br>
  <br>

<label for="titulo">Interno / Externo</label>
<br><br>


  <select class="form-select" aria-label="Permissao" name="interno" >
    <option selected value="<?php echo $interno;?>"> <?php echo "Atual: " . $internoString; ?> </option> 
    <option value="0">Externo</option>
    <option value="1">Interno</option>
  </select>

        <br>
        <div class="col-sm-12">
        
          <br>
          <div class='col' style='float: left;'>
      


          <div id="actions" class="col" style='float: right; margin-right: -375px;'>
          <div class=row>
            

              <?php
                if($id > 1){
              ?>
              <div class="col" style='margin-right: 65px !important;'> 
                <a href="../../classes/acesso/apagarGrupoAcesso.php?id=<?php echo $id; ?>"><button type='button' class='btn btn-danger-red'>Excluir</button></a> 
                </div> 
              <?php
                }
              ?>

            <div class="col"> 
            <button type="submit" class="btn btn-success">Salvar</button> 
            </div>

            <div class="col"> 
            <a style='color: white !important' href="/paginas/admin/main.php?pagina=../../classes/acesso/visualizar_grupo_acesso&id=<?php echo $id; ?>" class="btn btn-danger">Cancelar</a> 
            </div>
            
            </div>
            </div>
           
          <br>
          <br>
        </div>

        </div>  
  </div>
 


        <?php
      }
    ?>

  
  <div class='row' style='height: 100px;'></div>
</form>
</center>