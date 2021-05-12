<?php
if(!isset($_SESSION['logado']) && $_SESSION['permissao'] == '1'){

    header("Location: /");
    
}



?>
<center>

<form action="../../classes/informativo/gravar_informativo.php" method="GET" enctype="multipart/form-data" style='max-width: 500px; margin-top: 50px;'>
  <div class="form-group">
    <label for="titulo">Titulo</label>
    <input type="text" class="form-control" id="title" name="titulo" value="<?php echo $_GET['titulo']; ?>" required>
 
  <br>
        <!-- obs: <textarea> nao suprta o atributo (value) -->
        <label for="texto">Texto</label>
        <textarea maxlength ="10000" class="form-control" id="text" rows="15"  name="texto" ><?php echo $_GET['texto'];?></textarea>
        <br>
        <div class="col-sm-12">
          <input type="file" class="form-control" name="Arquivo" id="Arquivo" ?>
          <br>
          <div class='col' style='float: left;'>
          <label class="form-check-label" for="ativo" >
            Exibir no mural
          </label>
          <input class="form-check-input" type="checkbox" name='ativo' value= '1' checked>
          <div id="actions" class="col" style='float: right; margin-right: -375px;'>
            <div class="col-md-12"> <button type="submit" class="btn btn-success">Salvar</button> 
            <a style='color: white !important' href="?pagina=inicio" class="btn btn-danger">Cancelar</a> 
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