<?php
    session_start();
?>

<center style="margin-left: 100px; margin-top: 100px !important; position: relative !important;">
    <style>

        a{
            text-decoration: none;
        }
    
    </style>

    <h4>Grupos de Acesso</h4>
    <br><br><br>

    <?php

        //include para acessar o banco
        include("../../classes/conexao_bd.php");

        //include para acessar as confguracoes definidas
        include("../../config/config.php");

        //include para acessar as confguracoes definidas
        include("acesso.class.php");

        $ac = new Acesso();

        global $pdo;


        $consulta = $pdo->query("SELECT * FROM acesso_grupo WHERE id = 1");

        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        
            $cont++;

        }
        if($cont <= 0){

            $ac->criarGrupo();
        }





        $consulta = $pdo->query("SELECT * FROM acesso_grupo WHERE excluido = 0");
            
        // o contador eh iniciado com zero
        $cont = 0;
            
        // para cada registro no banco a variavel $cont recebera 1 incremento
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
               
            $cont++;

        }

        // caso cont for maior que zero, ou seja se ha pelo menos um registro no banco que satisfaca a condicao acima, sera mostrado o modal
        if($cont > 0){

            

            
            echo "<div class='row' style='float: left; margin-left: 800px; margin-top: -50px; position: absolute;'>";
 
            echo "<div class='col'>";
            echo "<a href='?pagina=../../paginas/cadastros/cadastrar_grupo_acesso'>";
            echo "<img src='../../imagens/navbar/plus.png' alt='botao-novo-informativo' title='Novo grupo de acesso'>";
            echo "</a>";
  
            echo "</div>";
            echo "</div>";
            echo "<br>";
            echo "<table class='tableInformativo table table-striped table-bordered table-condensed table-hover' style='position: relative;  table-layout:fixed; border: 2px solid ##00995D; word-wrap: break-word; max-width: 900px;' id='table'>";
            
            echo "<thead>";
            echo "<tr>";
            echo "<div class='thead'>";
          
            echo "<th style='width: 50px;' scope='col'>Id</th>";
            echo "<th style='width: 180px;' scope='col'>Nome do Grupo</th>";
            echo "<th style='width: 100px;' scope='col'>Permissão</th>";
            echo "<th style='width: 50px;' scope='col'>Ativo</th>";
            echo "<th style='width: 150px;' scope='col'>Opções</th>";
            echo "</div>";
            echo "</tr>";
            echo "</thead>";
    
            // a consulta atual sera realizada em todos os aniversarios ordenados por mes e respectivamente o dia 
            $consulta = $pdo->query("SELECT * FROM acesso_grupo WHERE excluido = 0");
       
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
            
                if($linha['permissao'] == 1){

                    $linha['permissao'] = "Publico";

                }

                elseif($linha['permissao'] > 1 ){

                    $linha['permissao'] = "Restrito";

                }

                else{

                    $linha['permissao'] = "Sem permissão";

                }
               

                echo"<tr>";
                echo "<td> {$linha['id']} </td> <td> {$linha['nome']} </td> <td> {$linha['permissao']} </td>  <td> {$linha['ativo']}</td>";


                ?>
                <td class='noprint'>
              
                    <a href="/paginas/admin/main.php?pagina=../cadastros/editar_grupo_acesso&id=<?php echo $linha['id']?>&idGrupo=<?php echo $id; ?>"><button type='button' class='btn btn-success' style='width: 100px;'>Editar</button></a>

                    <a href="/paginas/admin/main.php?pagina=../../classes/acesso/visualizarAcessoUnico&id=<?php echo $linha['id']?>"><button type='button' class='btn btn-primary' style='width: 100px;'>Visualizar</button></a>
                <?php
                    if($linha['id'] > 1){
                ?>

                <br><br>

                    
                <?php
                    if($ac->retornagrupoAtivo($linha['id']) == 1){
                ?>  
                    
                    <a href="../../classes/acesso/desabilitarGrupoAcesso.php?id=<?php echo $linha['id']; ?>"><button type='button' class='btn btn-danger' style='width: 100px;'>Desativar</button></a>

                <?php
                    }
                    else{
                ?>
                            <a href="../../classes/acesso/habilitarGrupoAcesso.php?id=<?php echo $linha['id']; ?>"><button type='button' class='btn btn-danger' style='width: 100px;'>Ativar</button></a>
                <?php
                    }

               
                    }
              
                
                
            
                    if($linha['id'] > 1){    
                    ?> 
                    <a href="../../classes/acesso/apagarGrupoAcesso.php?id=<?php echo $linha['id']; ?>"><button type='button' class='btn btn-danger-red' style='width: 100px;'>Excluir</button></a>
                    <br><br>
                    <?php
                    }
                    ?>


                </td>
           
            

            <?php
            

            echo"</tr>";
            
           
                

               
            }
    
            
            
            echo"</table>";
          
        }
        else{
            $ac->truncateAcesso();
            $url = '/paginas/admin/main.php?pagina=../../classes/acesso/visualizar_grupo_acesso';
            echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

        }
   
            

    ?>
</center>
