<?php
  if(!isset($_SESSION['logado']) && $_SESSION['permissao'] == '1'){

    header("Location: /");
      
  }

  // OBS: aqui vai ser recebido apenas o id do informativo por GET poi o texto nao pode ser recebido por esse meio, pois existe uma limiticao de caracteres enviados por GET

  // pega o id vindo por GET
  $id = $_GET['id'];
  $idGrupo = $_GET['idGrupo'];


  //requer classe de conexao do banco
  require("../../classes/conexao_bd.php");

  //requer o informativo.class onde o comando para gravar no banco ja esta pronto
  require("../../classes/acesso/acesso.class.php");

  // configuracoes, nesse caso o fuso horario
  require("../../config/config.php");

  $ac = new Acesso();

  global $pdo;

  $sql = "SELECT * FROM acesso WHERE id = $id;";

  $consulta = $pdo->query($sql);
  
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

  
 
    $nome = $linha['nome'];
    $link = $linha['link']; 


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
 
  <br>

        <br>
        <div class="col-sm-12">
        
          <br>
          <div class='col' style='float: left;'>
          <label class="form-check-label" for="ativo" >
            Exibir nos Acessos
          </label>

          <!-- nesse input sera checado se o informativo esta ativo, se o mesmo estiver ativo, sera escrito no html o atributo (checked) fazendo assim o input ficar marcado -->
          <input class="form-check-input" type="checkbox" name='ativo' value= '1' <?php 

            if($ac->retornaAtivo($id) == 1){
              echo "checked";
            }


          ?>>

          <div id="actions" class="col" style='float: right; margin-right: -375px;'>
          <div class=row>
            <div class="col" style='margin-right: 65px !important;'> 
            <a href="../../classes/acesso/apagarAcesso.php?id=<?php echo $id; ?>"><button type='button' class='btn btn-danger-red'>Excluir</button></a> 
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