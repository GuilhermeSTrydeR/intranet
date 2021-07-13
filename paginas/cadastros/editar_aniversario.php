<?php
if(!isset($_SESSION['logado']) && $_SESSION['permissao'] == '1'){

    header("Location: /");
    
}


require("../../classes/aniversarios/aniversario.class.php");


  // pega o id vindo por GET
  $id = $_GET['id'];

  $an = new Aniversario();

  global $pdo;

  $sql = "SELECT * FROM aniversario WHERE id = '$id';";

  $consulta = $pdo->query($sql);
  

  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

    $id = $linha['id'];
    $nome = $linha['nome'];
    $setor = $linha['setor'];
    $nasc = $linha['nasc'];
    $ativo = $linha['ativo'];


  }

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


?>
<center>


<form action="../../classes/aniversarios/editar_aniversario.php" method="POST" enctype="multipart/form-data" style='max-width: 700px; margin-top: 50px; margin-left: 400px;'>
  <div class="form-group">
  <div class='row'>
  <input type="text" name='id' value="<?php echo $id; ?>" style='display: none;'>
  <div class="form-group col-md-2"> <label for="ativo">Exibir Aniversario?</label> <input READONLY type="text" class="form-control" name="ativo" style='color: <?php echo $corFonte; ?>; background-color: <?php echo $corBG; ?>' value="<?php echo $ativo ?>"  size="60"> </div>
  </div>
    <br>
    <div class="row">
      <div class="form-group col-md-6"> 
        <label for="nome">Nome do Colaborador</label> 
        <input type="text" class="form-control" name="nome" size="60" value="<?php echo $nome ?>" required> 
      </div> 
    </div>
    <br>
    <div class="row">
      <div class="form-group col-md-6"> 
      <label for="setor">Setor</label>
        <select class="form-select" aria-label="setor" name="setor" required>
            <option selected value=<?php echo $setor?>>Atual: <?php echo $setorString?></option>
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
    </div>
    <br>
    <div class='row'>
      <div class="form-group col-md-6"> 
        <label for="campo2">Data de Nascimento</label> 
        <input type="date" class="form-control" name="nasc" value=<?php echo $nasc?>  autocomplete="off" required> 
      </div>
    </div>
    <br>
    <br>
    <div class='row'>
      <div id="actions" class="col" style='margin-left: -180px;'>

          <a style='color: white !important; ' href="?pagina=../../classes/aniversarios/apagarAniversario&id=<?php echo $id; ?>" class="btn btn-danger-red">Excluir</a>
          
          <?php
                        if($an->retornaAtivo($id) == 1){
                    ?>
                         <a href="../../classes/aniversarios/desabilitarAniversario.php?id=<?php echo $id; ?>"><button type='button' class='btn btn-danger' style='width: 100px;'>Desativar</button></a>
                    <?php
                        }
                        else{
                    ?>
                        <a href="../../classes/aniversarios/habilitarAniversario.php?id=<?php echo $id; ?>"><button type='button' class='btn btn-success' style='width: 100px;'>Ativar</button></a>
                     <?php
                        }
                    ?> 

          <a style='color: white !important;' href="/paginas/admin/main.php?pagina=../../classes/aniversarios/visualizar_aniversario" class="btn btn-danger">Cancelar</a> 

          <button type="submit" class="btn btn-success">
            Salvar
          </button> 
       
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