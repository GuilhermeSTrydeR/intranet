<center style="margin-left: 100px; margin-top: 100px !important; position: relative !important;">
        <style>

        .hiddenBtnXUsuarios{
            display: inline-block !important;
        }
        .hiddenPrint{
            display: inline-block !important;
        }

        </style>


        <?php

        //include para acessar o banco
        include("../../classes/conexao_bd.php");

        //include para acessar as confguracoes definidas
        include("../../config/config.php");

        // include da classe informativo
        include("informativo.class.php");

        $i = new Informativo();

        global $pdo;

        if($_POST['sentido'] == 0){
            $sentidoDaLista = 'SELECT * FROM informativo ORDER BY id DESC;';
            $nomeBotao = 'Ordenar Sentido Horario';
            
        }

        else{
            $sentidoDaLista = 'SELECT * FROM informativo;';
            $nomeBotao = 'Ordenar Sentido Anti-Horario';
        }   


        $consulta = $pdo->query($sentidoDaLista);

        // aqui devera receber em vez de 'true' o retorno de uma funcao para verificar se ha linhas na tabela 'informativo'pois se nao houver, o elemento continua escondido
        

        if(isset($consulta)){
            ?>
                <style>
                    .hidden{
                        display: block !important;
                    }
                </style>
            <?php
            
        }
        else{
            ?>
            <h4>Não há nenhum registro.</h4>
            <?php
        }

        ?>

        <div class='hidden'>

        <form method="POST" action="<?php echo $PHP_SELF; ?>">
            <?php
                if($_POST['sentido'] == 1){
                    $botaoSentido = 0;
                
                }
                else{
                    $botaoSentido = 1;
                  
                }
            ?>
            <div class="col-sm-12">
                <input name='sentido' value=<?php echo $botaoSentido;?> style='display: none;'>
            </div> 
        
                <div class="row" style='float: left; margin-left: 400px; position: absolute;'>
                    <div class="col">
                        <a href="../../classes/informativo/apagarTodosInformativos.php">
                            <img src="../../imagens/navbar/x.png" alt='botao-apagar-informativo' title="Apagar todos os informativos">
                        </a>
                    </div>
            
                    <div class="col">
                        <a href="../../classes/informativo/desabilitarTodosInformativos.php">
                            <img src="../../imagens/navbar/off.png" alt='botao-desativar-informativo' title="Desativar todos os informativos">
                        </a>
                    </div>
                    <div class="col">
                        <a href="../../classes/informativo/habilitarTodosInformativos.php">
                            <img src="../../imagens/navbar/on.png" alt='botao-ativar-informativo' title="Ativar todos os informativos">
                        </a>
                    </div>
              
                    <div class="col">
                        <a href="?pagina=../../paginas/cadastros/cadastrar_informativo">
                            <img src="../../imagens/navbar/plus.png" alt='botao-ativar-informativo' title="Novo Informativo">
                            </a>
                    </div>
         
                    <div class="col">
                        <button type="submit" style='border: none; background: #ffffff;'>
                            <img src="../../imagens/navbar/updown.png" alt='botao-inverter-lista' title="Inverter Sentido da Lista">
                        </button> 
                    </div>
                    <div class="col">
                        <a href="../usuarios/main.php"><?$_SESSION['nome']?></a>
                        <img src="/imagens/navbar/printer.png" class="hiddenPrint" onClick="window.print()" width="40"  height="40" class="row" alt="imprimir" title="Imprimir">
                    </div>
                </div>
            </form>

        <br>
        <br>
        <table class='table table-striped table-bordered table-condensed table-hover' style='margin-left: 200px; table-layout:fixed; border: 2px solid ##00995D; max-width: 900px; word-wrap: break-word; !important;' id='table'>
        <thead>
        <tr>
        <div class='thead'>
        <th style='width: 70px;' scope='col'>ID</th>
        <th style='width: 90px;' scope='col'>Data</th>
        <th style='width: 150px;' scope='col'>Titulo</th>
        <th style='width: 520px;' scope='col'>Texto</th>
        <th style='width: 70px;' scope='col'>Ativo?</th>
        </div>
        </tr>
        </thead>
        <?php
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            if($linha['excluido'] == 0){
            
                if($linha['ativo'] == 0){
                    $linha['ativo'] = "<p style='color: red';>Não</p>";
                }

                elseif($linha['ativo'] == 1){
                    $linha['ativo'] = "<p style='color: green;'>Sim</p>";
                }

                else{
                    $linha['ativo'] = 'Erro';
                }
            

            $linha['dataCadastro'] = gmdate("d/m/y á\s\ H:i:s", ($linha['dataCadastro']));

            echo"<tr>";
            echo "<td class='td'> {$linha['id']} </td> <td> {$linha['dataCadastro']} </td>  <td> {$linha['titulo']}  </td> <td> {$linha['texto']} </td> <td> {$linha['ativo']} </td>";
            echo"</tr>";

            }
            
        }
        
        echo"</table>";
        
        ?>

        <script>
 
        $(document).ready(function(){
            $('td').click(function(){
                var id = $(this).parent().find(".td").text();
                alert(id); 
                return false;
            });
        
        });
        
        </script>


    </div>

    <div class='row' style='height: 100px;'></div>
</center>
