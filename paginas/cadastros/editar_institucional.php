<?php
  if(!isset($_SESSION['logado']) && $_SESSION['permissao'] == '1'){

    header("Location: /");
      
  }

  // OBS: aqui vai ser recebido apenas o id do institucional por GET poi o texto nao pode ser recebido por esse meio, pois existe uma limiticao de caracteres enviados por GET

  // pega o id vindo por GET
  $id = $_GET['id'];


  //requer classe de conexao do banco
  require("../../classes/conexao_bd.php");

  //requer o institucional.class onde o comando para gravar no banco ja esta pronto
  require("../../classes/institucional/institucional.class.php");

  // configuracoes, nesse caso o fuso horario
  require("../../config/config.php");

  $i = new institucional();

  global $pdo;

  $sql = "SELECT * FROM institucional WHERE id = $id;";

  $consulta = $pdo->query($sql);
  
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  
    $titulo = $linha['titulo'];
    $texto = $linha['texto'];
    $imagem = $linha['imagem']; 
    $ativo = $linha['ativo']; 
    $inicio = $linha['inicio']; 
    $fim = $linha['fim']; 

  }

?>

<center>
<form action="../../classes/institucional/editar_institucional.php" method="POST" enctype="multipart/form-data" style='max-width: 500px; margin-top: 50px;'>
  <input type="text" name='id' value="<?php echo $id; ?>" style='display: none;'>
  <div class="form-group">
    <label for="titulo">Titulo</label>
    <input type="text" class="form-control" id="title" name="titulo" value="<?php echo $titulo; ?>" required>
 
  <br>
        <!-- obs: <textarea> nao suprta o atributo (value) -->
        <label for="texto">Texto</label>
        <textarea maxlength ="10000" class="form-control" id="text" rows="8"  name="texto" ><?php echo $texto;?></textarea>
        <br>
        <div class="col-sm-12">
        <div class="row">
          <div class="col-sm">
            <label for="inico">Inicio</label>
            <input type="date" class="form-control" id="title" name="inicio" value=<?php echo $inicio; ?>>
          </div>
          <div class="col-sm">
            <label for="fim">Fim</label>
            <input type="date" class="form-control" id="title" name="fim" value=<?php echo $fim; ?>>
          </div>
        </div>
<br>
          <input type="file" class="form-control" name="Arquivo" id="Arquivo" value="<?php echo $imagem; ?>" ?>
          <br>
          <div class='col' style='float: left;'>
          <label class="form-check-label" for="ativo" >
            Exibir no institucional
          </label>
          <!-- nesse input sera checado se o institucional esta ativo, se o mesmo estiver ativo, sera escrito no html o atributo (checked) fazendo assim o input ficar marcado -->
          <input class="form-check-input" type="checkbox" name='ativo' value= '1' <?php 

            if($i->retornaAtivo($id) == 1){
              echo "checked";
            }
          
          
          ?>>
          <div id="actions" class="col" style='float: right; margin-right: -375px;'>
            
        
          <div class=row>
            <div class="col" style='margin-right: 65px !important;'> 
            <a href="?pagina=../confirmaExcluir/institucional&id=<?php echo $id; ?>"><button type='button' class='btn btn-danger-red'>Excluir</button></a> 
            </div> 

            <div class="col"> 
            <button type="submit" class="btn btn-success">Salvar</button> 
            </div>

            <div class="col"> 
            <a style='color: white !important' href="/paginas/admin/main.php?pagina=../../classes/institucional/visualizar_institucional" class="btn btn-danger">Cancelar</a> 
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