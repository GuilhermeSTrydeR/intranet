<?php
    session_start();
?>

<center style="margin-left: 100px; margin-top: 100px !important; position: relative !important;">
    <style>

        a{
            text-decoration: none;
        }
    
    </style>

    <?php

        //include para acessar o banco
        include("../../classes/conexao_bd.php");

        //include para acessar as confguracoes definidas
        include("../../config/config.php");

        //include para acessar as confguracoes definidas
        include("acesso.class.php");

        $ac = new Acesso();

        $id = $_GET['id'];

        $grupo = $ac->retornaNome($id);

        global $pdo;

        $consulta = $pdo->query("SELECT * FROM acesso WHERE grupo = '$id' AND excluido = 0");
            
        // o contador eh iniciado com zero
        $cont = 0;
            
        // para cada registro no banco a variavel $cont recebera 1 incremento
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
               
            $cont++;
            $nomeGrupo = $ac->retornaNome($linha['grupo']);
            

        }

        // caso cont for maior que zero, ou seja se ha pelo menos um registro no banco que satisfaca a condicao acima, sera mostrado o modal
        if($cont > 0){

            echo "<h1>Grupo: ". $nomeGrupo . "</h1> <br><br><br>";
            echo "<div class='row' style='float: left; margin-left: 700px; margin-top: -50px; position: absolute;'>";

 
            echo "<div class='col'>";
            echo "<a href='?pagina=../../paginas/cadastros/cadastrar_acesso_unico&id=$id'>";
            echo "<img src='../../imagens/navbar/plus.png' alt='botao-novo-informativo' title='Novo Acesso'>";
            echo "</a>";

            // echo "<a href='?pagina=../../paginas/cadastros/cadastrar_grupo_acesso'>";
            // echo "<img src='../../imagens/navbar/plusplus.png' alt='botao-novo-grupo-informativo' title='Novo Grupo de Acessos' width='40' style='margin-left: 40px;'>";
            // echo "</a>";
            echo "</div>";
            echo "</div>";
            echo "<br>";
            echo "<table class='tableInformativo table table-striped table-bordered table-condensed table-hover' style='position: relative;  table-layout:fixed; border: 2px solid ##00995D; word-wrap: break-word; max-width: 900px;' id='table'>";
            
            echo "<thead>";
            echo "<tr>";
            echo "<div class='thead'>";
          
            echo "<th style='width: 50px;' scope='col'>Id</th>";
            echo "<th style='width: 250px;' scope='col'>Nome</th>";
            echo "<th style='width: 150px;' scope='col'>Grupo</th>";
            echo "<th style='width: 50px;' scope='col'>Ativo</th>";
            echo "<th style='width: 100px;' scope='col'>Opções</th>";
            echo "</div>";
            echo "</tr>";
            echo "</thead>";
    
            // a consulta atual sera realizada em todos os aniversarios ordenados por mes e respectivamente o dia 
            $consulta = $pdo->query("SELECT * FROM acesso WHERE grupo = '$id' AND excluido = 0");
       
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {


                $linha['grupo'] = $ac->retornaNome($linha['grupo']);

                if($linha['ativo'] == 0){
                    $linha['ativo'] = "<p style='color: red';>Não</p>";
                }

                elseif($linha['ativo'] == 1){
                    $linha['ativo'] = "<p style='color: green;'>Sim</p>";
                }

                else{
                    $linha['ativo'] = 'Erro';
                }


                

        
                echo"<tr>";
                echo "<td> {$linha['id']} </td> <td> {$linha['nome']} </td> <td> {$linha['grupo']} </td>  <td> {$linha['ativo']}</td>";

             

        
                
                ?>

                <td class='noprint'>
              
                    <a href="/paginas/admin/main.php?pagina=../cadastros/editar_acesso&idGrupo=<?php echo $id; ?>&id=<?php echo $linha['id']?>"><button type='button' class='btn btn-success' style='width: 100px;'>Editar</button></a>

                    <br><br>

                    <a href="../../classes/acesso/apagarAcesso.php?id=<?php echo $linha['id']; ?>&idGrupo=<?php echo $id;?>"><button type='button' class='btn btn-danger-red' style='width: 100px;'>Excluir</button></a>
           
                    <br><br>

     
                    <?php
                        if($ac->retornaAtivo($linha['id']) == 1){
                    ?>
                                <a href="../../classes/acesso/desabilitarAcessoUnico.php?id=<?php echo $linha['id']; ?>&idGrupo=<?php echo $id;?>"><button type='button' class='btn btn-danger' style='width: 100px;'>Desativar</button></a>
                    <?php
                        }
                        else{
                    ?>
                                <a href="../../classes/acesso/habilitarAcessoUnico.php?id=<?php echo $linha['id']; ?>&idGrupo=<?php echo $id;?>"><button type='button' class='btn btn-danger' style='width: 100px;'>Ativar</button></a>
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

            echo "<h4>Não há acessos cadastrados nesse grupo.</h4>";
            echo "<br>";
            echo "<a href='/paginas/admin/main.php?pagina=../../paginas/cadastros/cadastrar_acesso_unico&id=$id'>Para cadastrar um novo acesso no grupo <b>$grupo</b>, clique aqui!</a>";
        }
   
            

    ?>
</center>
