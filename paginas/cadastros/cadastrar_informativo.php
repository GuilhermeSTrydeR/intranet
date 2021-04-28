<?php
if(!isset($_SESSION['logado']) && $_SESSION['permissao'] == '1'){

    header("Location: /");
    
}
?>
<center>

<form action="../../classes/informativo/gravar_informativo.php" method="POST" style='max-width: 500px; margin-top: 50px;'>
  <div class="form-group">
    <label for="titulo">Titulo</label>
    <input type="text" class="form-control" id="title" name="titulo" required>
 
  <br>
 
    <label for="texto">Texto</label>
        <textarea maxlength ="1000" class="form-control" id="text" rows="15"  name="texto" required ></textarea>
        <br>
        <div class="col-sm-12">
          <input class="form-check-input" type="checkbox" name='ativo' value= '1' checked>
          <label class="form-check-label" for="ativo" >
            Exibir no mural
          </label>
          <br>
          <br>
  <div id="actions" class="row">
    <div class="col-md-12"> <button type="submit" class="btn btn-success">Salvar</button> 
    <a style='color: white !important' href="?pagina=inicio" class="btn btn-danger">Cancelar</a> 
    </div>
  </div>
        </div>  
  </div>
 

</form>
</center>