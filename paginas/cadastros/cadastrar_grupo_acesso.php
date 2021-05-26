<?php
if(!isset($_SESSION['logado']) && $_SESSION['permissao'] == '1'){

    header("Location: /");
    
}
?>
<center>

<form action="../../classes/acesso/gravar_grupo_acesso.php" method="POST" enctype="multipart/form-data" style='max-width: 500px; margin-top: 50px;'>
  <div class="form-group">
    <label for="nome">Nome do grupo de acesso</label>
    <br><br>
    <input type="text" class="form-control" id="nome" name="nome" required>
    <br>
<br>
    <label for="permissao">Permissão</label>
    <br><br>
    <select class="form-select" aria-label="Permissao" name="permissao" >
      <!-- <option selected value="<?php echo $permissao;?>"> <?php echo "Atual: " . $permissaoString; ?> </option> -->
      <option selected value="1">Publico (qualquer um pode ver)</option>
      <option value="2">Restrito (somente usuarios logados podem ver)</option>
    </select>
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
            <a style='color: white !important' href="/paginas/admin/main.php?pagina=../../classes/acesso/visualizar_grupo_acesso" class="btn btn-danger">Cancelar</a> 
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