<?php
if(!isset($_SESSION['logado']) && $_SESSION['permissao'] == '1'){

    header("Location: /");
    
}
?>
<center>

<form action="../../classes/institucional/gravar_institucional.php" method="POST" enctype="multipart/form-data" style='max-width: 500px; margin-top: 50px;'>
  <div class="form-group">
    <label for="titulo">Titulo</label>
    <input type="text" class="form-control" id="title" name="titulo" required>
 
  <br>
 
        <label for="texto">Texto</label>
        <textarea maxlength ="10000" class="form-control" id="text" rows="8"  name="texto" required ></textarea>
        <br>
        <div class="row">
          <div class="col-sm">
            <label for="inico">Inicio</label>
            <input type="date" class="form-control" id="title" name="inicio">
          </div>
          <div class="col-sm">
            <label for="fim">Fim</label>
            <input type="date" class="form-control" id="title" name="fim">
          </div>
        </div>
        <div class="col-sm-12">
        <br>
          <input type="file" class="form-control" name="Arquivo" id="Arquivo">
          <br>
          <div class='col' style='float: left;'>
          <label class="form-check-label" for="ativo" >
            Exibir no institucional
          </label>
          <input class="form-check-input" type="checkbox" name='ativo' value= '1' checked>
          <div id="actions" class="col" style='float: right; margin-right: -305px;'>
            <div class="col-md-12"> <button type="submit" class="btn btn-success">Salvar</button> 
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