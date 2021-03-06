<?php
  if(!isset($_SESSION['logado']) && $_SESSION['permissao'] == '1'){

    header("Location: /");
      
  }

  // OBS: aqui vai ser recebido apenas o id do mural por GET poi o texto nao pode ser recebido por esse meio, pois existe uma limiticao de caracteres enviados por GET

  // pega o id vindo por GET
  $id = $_GET['id'];
  $idGrupo = $_GET['idGrupo'];


  //requer classe de conexao do banco
  require("../../classes/conexao_bd.php");

  //requer o mural.class onde o comando para gravar no banco ja esta pronto
  require("../../classes/acesso/acesso.class.php");

  // configuracoes, nesse caso o fuso horario
  require("../../config/config.php");

  $ac = new Acesso();
  $permissaoGrupo = $ac->retornaPermissao($idGrupo);
  $permissaoAcesso = $ac->retornaPermissaoAcesso($id);

  global $pdo;

  $sql = "SELECT * FROM acesso WHERE id = $id;";

  $consulta = $pdo->query($sql);
  
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

    $nome = $linha['nome'];
    $link = $linha['link']; 
    $permissao = $linha['permissao']; 
    $grupo = $linha['grupo'];
    $interno = $linha['interno'];

  }

  if($interno == 0){

    $internoString = "Externo";

  }

  elseif($interno == 1){

    $internoString = "Interno";

  }

  if($permissao == 1){

    $permissaoString = "Publico";

  }

  elseif($permissao == 2){

    $permissaoString = "Restrito";

  }

  if($permissaoAcesso == 1){

    $permissaoAcessoString = "Publico";

  }

  elseif($permissaoAcesso == 2){

    $permissaoAcessoString = "Restrito";

  }

?>

<center>
<form action="../../classes/acesso/editar_acesso.php" method="POST" style='max-width: 500px; margin-top: 50px;'>
  <input type="text" name='id' value="<?php echo $id; ?>" style='display: none;'>
  <div class="form-group">
    <label for="titulo">Nome</label>
    <input type="text" class="form-control" id="title" name="nome" value="<?php echo $nome; ?>" required>
    <br>
    <label for="titulo">Link</label>
    <input type="text" class="form-control" id="title" name="link" value="<?php echo $link; ?>" required>
    <input type="text" class='hidden' name="idGrupo" value="<?php echo $idGrupo; ?>">
  <br>
  <?php 
  if($permissaoGrupo == 1){
    ?>
      <label for="link">Permiss??o</label>
      <select class="form-select" aria-label="Permissao" name="permissao">
        <option SELECTED value=<?php echo $permissaoAcesso; ?>><?php echo "Atual: " . $permissaoAcessoString;?></option>
        <option value="1">Publico (qualquer um pode ver se o grupo tambem for publico)</option>
        <option value="2">Restrito (somente usuarios logados podem ver)</option>
      </select>
    <?php
  }elseif($permissaoGrupo == 2){
    ?>
    <label for="permissao">Permiss??o</label>
    <select disabled class="form-select" aria-label="Permissao" name="grupo" >
      <option selected  value="2">Restrito (somente usuarios logados podem ver) </option>
    </select>
    <input type="text" class='hidden' readonly value="2" class="form-control" id="link" name="permissao" required>
    <?php
  }
    ?>
  <br>

  <?php
  
    $grupoString = $ac->retornaNome($grupo);
  
  ?>

  <label for="grupo">Grupo</label>
  <select class="form-select" aria-label="Grupo" name="grupo">
  <option selected value="<?php echo $grupo;?>"> <?php echo "Atual: " . $grupoString; ?> </option> 
  <?php

    $sql = "SELECT * FROM acesso_grupo WHERE excluido = 0";  
    $consulta = $pdo->query($sql);
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {


      echo "<option value=" . $linha['id'] . ">" . $linha['nome'] . "</option>";

    }
?>

        </select>

        <br>


        
        <label for="interno">Interno / Externo</label>
          <select class="form-select" aria-label="Permissao" name="interno" >
            <option selected value=<?php echo $interno?>> <?php echo "Atual: " . $internoString ?> </option> 
            <option value="0">Externo</option>
            <option value="1">Interno</option>
          </select>

        <div class="col-sm-12">
        
          <br>
          <div class='col' style='float: left;'>
          <label class="form-check-label" for="ativo" >
            Exibir nos Acessos
          </label>

          <!-- nesse input sera checado se o mural esta ativo, se o mesmo estiver ativo, sera escrito no html o atributo (checked) fazendo assim o input ficar marcado -->
          <input class="form-check-input" type="checkbox" name='ativo' value= '1' <?php 

            if($ac->retornaAtivo($id) == 1){
              echo "checked";
            }


          ?>>

          <div id="actions" class="col" style='float: right; margin-right: -375px;'>
          <div class=row>
            <div class="col" style='margin-right: 65px !important;'> 
            <a href="../../classes/acesso/apagarAcesso.php?id=<?php echo $id; ?>&idGrupo=<?php echo $idGrupo; ?>"><button type='button' class='btn btn-danger-red'>Excluir</button></a> 
            </div> 

            <div class="col"> 
            <button type="submit" class="btn btn-success">Salvar</button> 
            </div>

            <div class="col"> 
            <a style='color: white !important' href="/paginas/admin/main.php?pagina=../../classes/acesso/visualizarAcessoUnico&id=<?php echo $idGrupo; ?>" class="btn btn-danger">Cancelar</a> 
            </div>
            
            </div>
            </div>
           
          <br>
          <br>
        </div>

        </div>  
  </div>
 
  <div class='row' style='height: 100px;'></div>
</form>
</center>