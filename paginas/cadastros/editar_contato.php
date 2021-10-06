
<script src="../../js/jquery/jquery.js"></script>
<script src="../../js/jquery/jquery.mask.js"></script>
<?php

//nenhum erro sera exibido nessa pagina
error_reporting(0);



$id = $_GET['id'];

require("../../classes/contato/Contato.class.php");

$c = new Contato();

$consulta = $pdo->query("SELECT * FROM contato WHERE excluido = 0 AND id = '$id';");

while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $nome = $linha['nome'];
        $telefone = $linha['telefone'];
        $email = $linha['email'];
        $setor = $linha['setor'];
        $nasc = $linha['nasc'];
        $ativo = $linha['ativo'];
        $ip = $linha['ip'];


        //nessa variavel eh cortado os 3 ultimos digitos do ip, poderia ser utilizado a prorpia variavel $ip porem optei por organizar assim, caso ele tenha apenas 1 ou 2 digitos, nessa variavel sera incluido independente por isso eh acertado abaixo
        $ipUltimosdigitos = substr($ip, -3, strlen($ip));




        // se caso tem apenas 1 numero de ip nas ultimas 3 casas, sera mostrado apenas ele excluindo '.' ou '0'
        if($ipUltimosdigitos[0] == '0' || $ipUltimosdigitos[0] == '.' && $ipUltimosdigitos[1] == '0' || $ipUltimosdigitos[1] == '.' ){

            $ipUltimosdigitos = substr($ipUltimosdigitos, -1, strlen($ipUltimosdigitos));
        }
        //se caso o ip tem apenas 2 digitos nas ultimas 3 casas, sera mostrado apenas os dois excluindo '.' ou '0'
        elseif($ipUltimosdigitos[0] == '0' || $ipUltimosdigitos[0] == '.'){
            $ipUltimosdigitos = substr($ipUltimosdigitos, -2, strlen($ipUltimosdigitos));
        }
    

        if($ipUltimosdigitos == '.'){

            $ipUltimosdigitos = Null;

        }
        
        
    
      
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


switch ($setor) {
    case 1:
        $setorString = 'Comercial';
        break;
    case 2:
        $setorString = 'Cadastro';
        break;
    case 3:
        $setorString = 'Recepção';
        break;
    case 4:
        $setorString = 'Faturamento';
        break;
    case 5:
        $setorString = 'Tecnologia da Informação';
        break;
    case 6:
        $setorString = 'Contabilidade';
        break;
    case 7:
        $setorString = 'Interc./Audit.';
        break;
    case 8:
        $setorString = 'Diretoria';
        break;
    case 9:
        $setorString = 'Financeiro';
        break;
    case 10:
        $setorString = 'Gerência';
        break;
    case 11:
        $setorString = 'ANS';
        break;
    case 12:
        $setorString = 'GED';
            break; 
    case 13:
        $setorString = 'Outros';
            break; 
}




?>
<center style="margin-left: 60px; margin-top: 100px !important;">
    <h2>Editar Contato</h2>
    <form action="../../classes/contato/editar_contato.php" autocomplete="off" method="POST" style="margin-left: 120px;">

        <input type="text" name='id' READONLY class='hidden' value='<?php echo $id;?>'>

        <div class="row">
            <div class="form-group col-md-1"> <label for="nome">ID</label> <input READONLY type="text" class="form-control" name="id"  value="<?php echo $id ?>"  size="60"> </div>

            <div class="form-group col-md-1"> <label for="nome">Ativo?</label> <input READONLY type="text" class="form-control" name="ativo" style='color: <?php echo $corFonte; ?>; background-color: <?php echo $corBG; ?>' value="<?php echo $ativo ?>"  size="60"> </div>
        </div>
        <!-- area de campos do form -->
        <hr />
        <div class="row">
            <div class="form-group col-md-6"> <label for="nome">Nome Completo</label> <input type="text" class="form-control" value="<?php echo $nome?>" name="nome"  size="60"> </div>

            <div class="form-group col-md-2"> <label for="nome">Telefone</label> <input type="text" class="form-control" id="telefone" value="<?php echo $telefone; ?>" name="telefone"  size="15"> </div>

            <div class="form-group col-md-3"> 
                <label for="campo2">Data de Nascimento</label> 
                <input type="date" class="form-control" value="<?php echo $nasc; ?>" name="nasc"  autocomplete="off" > 
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-5"> <label for="campo1">E-mail</label> <input type="email" class="form-control" value="<?php echo $email; ?>" name="email" > </div>

       
        <div class="form-group col-md-4">
        <label for="setor">Setor</label>
        <select class="form-select" aria-label="setor" name="setor" >
            <option selected value="<?php echo $setor; ?>"><?php echo $setorString; ?></option>
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


            

            <!-- <div class="form-group col-md-3">
            <label for="permissao">Permissão</label>
            <select class="form-select" aria-label="Permissao" name="permissao" required>
                <option selected></option>
                <option value="1">Comum</option>
                <option value="2">Supervisor</option>
                <option value="3">Administrador</option>
            </select> -->
        </div>


    
        <div class="row">
            <br>
         
                192.168.0.
                
                <div class="form-group col-md-1"><label for="ip">IP</label> <br><input type="text" class="form-control" name="ip" id="ip" value="<?php echo $ipUltimosdigitos?>" MAXLENGTH=3></div>

                <label for=""><?php echo $ipUltimosdigitos ?></label>

            
        </div>

        <br>
        
        <br><br>
                <!-- <div class="form-group col-md-2">
                    <label for="status">Status</label>
                <select class="form-select" aria-label="status" name="status" required>
                    <option selected></option>
                    <option value="1">Ativo</option>
                    <option value="2">Temporario</option>
                    <option value="3">Desativado</option>
                    </select>
                </div> -->

        <!-- ao selecionar a opcao de usuario temporario esse campo abaixo 'tempo' devera aparecer para colocar quantas horas esse usuario ficara ativo no sistema, a logica de se criar usuarios temporarios deve-se ao fato da possibilidade de usuarios que nao vao usar o sistema por muito tempo tais como: auditorias internas e externas, visitantes entre outros. -->
        <!-- <div class="form-group col-md-2"> <label for="campo2">Tempo em Horas</label> <input type="number" class="form-control" name="tempo" required autocomplete="off"> </div>
            </div>
        </div> -->
   <br>
        <div id="actions" class="row">
            <div class="col-md-5">
                <a style='color: white !important' href="/paginas/admin/main.php?pagina=../../classes/contato/apagar_contato&id=<?php echo $id;?>>" class="btn btn-danger-red">Excluir</a> 
            </div>
        

            <div class="col-md-1">
            <?php
                        if($c->retornaAtivo($id) == 1){
                    ?>
                         <a href="../../classes/contato/desabilitarContato.php?id=<?php echo $id; ?>"><button type='button' class='btn btn-danger' style='width: 100px;'>Desativar</button></a>
                    <?php
                        }
                        else{
                    ?>
                        <a href="../../classes/contato/habilitarContato.php?id=<?php echo $id; ?>"><button type='button' class='btn btn-success' style='width: 100px;'>Ativar</button></a>
                     <?php
                        }
                    ?>

</div>


            <div class="col-md-4"> 
                <button type="submit" class="btn btn-success">Salvar</button> 
                <a style='color: white !important' href="/paginas/admin/main.php?pagina=../../classes/contato/visualizar_contato" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </form>

    <!-- mascara para o telefone, nesse caso ele pega o id telefone e aplica essa mascara -->
    <script type="text/javascript">
    $("#telefone").mask("(00) 0000-0000");
    </script>   
</center>