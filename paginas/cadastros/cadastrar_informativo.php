<?php
if(!isset($_SESSION['logado']) && $_SESSION['permissao'] == '1'){

    header("Location: /");

}
?>
<center>

<form action="../../classes/informativo/gravar_informativo.php" method="POST" style='max-width: 500px; margin-top: 50px;'>
  <div class="form-group">
    <label for="titulo">Titulo</label>
    <input type="text" class="form-control" id="titulo" name="titulo">
  </div>
  <br>
  <div class="form-group">
    <label for="texto">Texto</label>
    <textarea class="form-control" id="texto" rows="10" name="texto"></textarea>
  </div>
  <br>
  <div id="actions" class="row">
    <div class="col-md-12"> <button type="submit" class="btn btn-success">Salvar</button> 
    <a style='color: white !important' href="?pagina=inicio" class="btn btn-danger">Cancelar</a> </div>
  </div>
</form>
</center>