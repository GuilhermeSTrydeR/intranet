<?php
if(!isset($_SESSION['logado']) && $_SESSION['permissao'] == '1'){

    header("Location: /");
    
}


  //requer classe de conexao do banco
  require("../../classes/conexao_bd.php");

  //requer o informativo.class onde o comando para gravar no banco ja esta pronto
  require("../../classes/acesso/acesso.class.php");

  // configuracoes, nesse caso o fuso horario
  require("../../config/config.php");

  $ac = new Acesso();

  global $pdo;

  // $sql = "SELECT * FROM acesso WHERE id = $id;";

  $consulta = $pdo->query($sql);
  
  // while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {


  // }

  $id = $_GET['id'];

  $nomeGrupo = $ac->retornaNome($id);

?>

<center>

<form action="../../classes/acesso/gravar_acesso.php" method="POST" enctype="multipart/form-data" style='max-width: 500px; margin-top: 50px;'>
  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" required>
 
  <br>
 
    <label for="link">link</label>
    <input type="text" class="form-control" id="link" name="link" required>
  <br>
    <label for="grupo">Grupo</label>
    <select disabled class="form-select" aria-label="Permissao" name="grupo" >
      <option selected  value="<?php echo $id;?>"> <?php echo $nomeGrupo; ?> </option>
    </select>
    <input type="text" class='hidden' readonly value=<?php echo $id; ?> class="form-control" id="link" name="grupo" required>
      <br>
        <div class="col-sm-12">
        <br>
          <div class='col' style='float: left;'>
          <label class="form-check-label" for="ativo" >
            Exibir nos Acessos
          </label>
          <input class="form-check-input" type="checkbox" name='ativo' value= '1' checked>
          <div class='col' style='float: left;'>
          <div id="actions" class="col" style='float: right; margin-right: -375px;'>
            <div class="col-md-12"> <button type="submit" class="btn btn-success">Salvar</button> 
            <a style='color: white !important' href="/paginas/admin/main.php?pagina=../../classes/acesso/visualizarAcessoUnico&id=<?php echo $id; ?>" class="btn btn-danger">Cancelar</a> 
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