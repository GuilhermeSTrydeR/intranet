

<?php
// desligar todos os erros e notices nessa pagina
error_reporting(0);


if(!isset($_SESSION['logado']) || $_SESSION['permissao'] != '3'){

    header("Location: /");

}



?>


<center style="margin-left: 100px; margin-top: 30px !important; position: relative !important;">
        <style>

        .hiddenBtnXUsuarios{
            display: inline-block !important;
        }
        .hiddenPrint{
            display: inline-block !important;
        }

        a{text-decoration: none;}


        #liInstitucional{
            background: #009b63;
            border-right: 6px solid #F47920;
            color: #ffffff;
        }

        #liInstitucional b{
            color: #F47920;
        }

        </style>
        
        <h4>Institucional</h4>
        
        <div class='print'><?php
            
            echo gmdate('d/m/y \á\s\ H:i:s', time() + $fusoHorario);
          
        ?>
        
        
        </div>
        <br><br>

        
        <?php
  
        //include para acessar o banco
        include("../../classes/conexao_bd.php");

        //include para acessar as confguracoes definidas
        include("../../config/config.php");

        // include da classe mural
        include("institucional.class.php");

        $i = new institucional();

        global $pdo;

        if($_POST['sentido'] == 0){
            $_SESSION['sentidodaLista'] = 'SELECT * FROM institucional WHERE excluido = 0 ORDER BY id DESC';
            $nomeBotao = 'Ordenar Sentido Horario';
            
        }

        else{
            $_SESSION['sentidodaLista']  = 'SELECT * FROM institucional WHERE excluido = 0';
            $nomeBotao = 'Ordenar Sentido Anti-Horario';
        }   


        $consulta = $pdo->query($_SESSION['sentidodaLista'] );


        $cont = 0;
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

            $cont++;

        }
        
        if($cont > 0){
            ?>
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
        
                <div class="row" style='float: left; margin-left: 600px; position: absolute;'>
                    <!-- <div class="col">
                        <a href="../../classes/mural/apagarTodosmurals.php">
                            <img src="../../imagens/navbar/x.png" alt='botao-apagar-mural' title="Apagar todos os murals">
                        </a>
                    </div> -->
                    <div class="col">
                        <a href="?pagina=../../paginas/mural/inicio">
                            <img src="../../imagens/sidebar/timeline.png" height="50" alt='botao-desativar-mural' title="Visualizar o mural">
                        </a>
                    </div>
                    <div class="col">
                        <a href="../../classes/institucional/desabilitarTodosInstitucionais.php">
                            <img src="../../imagens/navbar/off.png" alt='botao-desativar-mural' title="Desativar todos os murais">
                        </a>
                    </div>
                    <div class="col">
                        <a href="../../classes/institucional/habilitarTodosInstitucionais.php">
                            <img src="../../imagens/navbar/on.png" alt='botao-ativar-mural' title="Ativar todos os murais">
                        </a>
                    </div>
                    <div class="col">
                        <a href="?pagina=../../paginas/cadastros/cadastrar_institucional">
                            <img src="../../imagens/navbar/plus.png" alt='botao-ativar-mural' title="Novo institucional">
                        </a>
                    </div>
                    <div class="col">
                        <button type="submit" style='border: none; background: #ffffff;'>
                            <img src="../../imagens/navbar/updown.png" alt='botao-inverter-lista' title="Inverter Sentido da Lista">
                        </button> 
                    </div>
                    <div class="col">
                        <a href="../usuarios/main.php"><?$_SESSION['nome']?></a>
                        <img src="/imagens/navbar/printer.png" class="hiddenPrint" onClick="window.print()" width="50"  height="50" class="row" alt="imprimir" title="Imprimir">
                    </div>
                </div>
            </form>
            <br>
            <br>
            <br>
            <table class='tablemural table table-striped table-bordered table-condensed table-hover' style='margin-left: 120px; table-layout:fixed; border: 2px solid ##00995D; word-wrap: break-word; max-width: 1000px;' id='table'>
            <thead>
                <tr>
                    <div class='thead'>
                        <th style='width: 30px;' scope='col'>ID</th>
                        <th style='width: 60px;' scope='col'>Data</th>
                        <th style='width: 140px;' scope='col'>Titulo</th>
                        <th style='width: 200px;' scope='col'>Texto</th>
                        <th style='width: 50px;' scope='col'>Ativo?</th>
                        <th style='width: 70px;' scope='col'>Periodo</th>
                        <th style='width: 80px;' scope='col' class='noprint'>Opções</th>
                    </div>
                </tr>
            </thead>
            <?php

                $consulta = $pdo->query($_SESSION['sentidodaLista'] );

                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                
                    if($linha['ativo'] == 0){
                        $linha['ativo'] = "<p style='color: red';>Não</p>";
                    }

                    elseif($linha['ativo'] == 1){
                        $linha['ativo'] = "<p style='color: green;'>Sim</p>";
                    }

                    else{
                        $linha['ativo'] = 'Erro';
                    }
                    
                    // converte a data de timestamp linux para padrao brasileiro
                    $linha['dataCadastro'] = gmdate("d/m/y á\s\ H:i:s", ($linha['dataCadastro']));

            
                    if($linha['inicio'] > '0000-00-00'){

                        $inicio = date('d/m/Y',  strtotime($linha['inicio']));
                        
                    }
                    else{

                        $inicio = "Sem Inicio";

                    }
            
                    if($linha['fim'] > '0000-00-00'){

                        $fim = date('d/m/Y',  strtotime($linha['fim']));
                    }

                    else{

                        $fim = "Sem Fim";

                    }
            
                    if($linha['inicio'] == '0000-00-00' && $linha['fim'] == '0000-00-00'){

                        $periodo = 'Permanente';
                    }

                    else{

                        $periodo = ($inicio . " - " . $fim);
                    }

            
                    echo"<tr>";
                    echo "<td> {$linha['id']} </td> <td> {$linha['dataCadastro']} </td>  <td> {$linha['titulo']}  </td> <td class='td-table'> {$linha['texto']} </td> <td> {$linha['ativo']} </td><td> $periodo </td> <td class='noprint'>";
                ?>

                <a href="/paginas/admin/main.php?pagina=../cadastros/editar_institucional&id=<?php echo $linha['id']?>"><button type='button' class='btn btn-success' style='width: 100px;'>Editar</button></a>
                
                <br>
                <br>

                <?php
                    if($i->retornaAtivo($linha['id']) == 1){
                ?>

                <a href="../../classes/institucional/desabilitarInstitucional.php?id=<?php echo $linha['id']; ?>"><button type='button' class='btn btn-danger' style='width: 100px;'>Desativar</button></a>
                
                <?php
                    }
                    else{
                ?>

                <a href="../../classes/institucional/habilitarInstitucional.php?id=<?php echo $linha['id']; ?>"><button type='button' class='btn btn-danger' style='width: 100px;'>Ativar</button></a>
                
                <?php
                    }
                ?>

           
                <br>
                <br>
            <a href="?pagina=../../classes/mural/visualizarmuralUnico&id=<?php echo $linha['id']; ?>"><button type='button' class='btn btn-primary' style='width: 100px;'>Visualizar</button></a>
            

            <?php

            echo "</td></tr>";

        }
      
        echo"</table>";
    }
    else{

        echo "<h4>Não há nenhum aviso ou documento institucional cadastrado</h4>";
        echo "<br>";
        echo "<a href='/paginas/admin/main.php?pagina=../../paginas/cadastros/cadastrar_institucional'>Para cadastrar um novo mural, clique aqui!</a>";

    }

        ?>

        <!-- funcao para pegar o id do mural clicado na table -->

        <!-- optei por usar botoes nas TD -->

        <!-- <script>

        $(document).ready(function(){
            $('td').click(function(){
                var id = $(this).parent().find(".td").text();
                alert(id); 
                return false;
            });
        
        });
        
        </script> -->


    </div>



    <div class='row' style='height: 100px;'></div>

    
</center>
