<?php
if(!isset($_SESSION['logado']) && $_SESSION['permissao'] == '1'){

    header("Location: /");
    
}
?>
<center>

<form action="../../classes/aniversarios/gravar_aniversario.php" method="POST" enctype="multipart/form-data" style='max-width: 700px; margin-top: 50px; margin-left: 400px;'>
  <div class="form-group">
    <div class="row">
      <div class="form-group col-md-6"> 
        <label for="nome">Nome do Colaborador</label> 
        <input = type="text" class="form-control" name="nome" size="60"> 
      </div> 
    </div>
    <br>
    <div class="row">
      <div class="form-group col-md-6"> 
      <label for="setor">Setor</label>
        <select class="form-select" aria-label="setor" name="setor" required>
            <option selected></option>
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
        <input type="date" class="form-control" name="nasc"  autocomplete="off" required> 
      </div>
    </div>
    <br>
    <br>
    <div class='row'>
      <div id="actions" class="col">
       
          <button type="submit" class="btn btn-success">
            Salvar
          </button> 

          <a style='color: white !important; margin-right: 200px;' href="/paginas/admin/main.php?pagina=../../classes/aniversarios/visualizar_aniversario" class="btn btn-danger">Cancelar</a> 
       
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