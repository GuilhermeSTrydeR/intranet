<?php
    session_start();
?>
<center style="margin-left: 100px; margin-top: 150px !important; position: relative !important;">
    <style>

        a{text-decoration: none;}
    
    </style>

    <?php

        //include para acessar o banco
        include("../../classes/conexao_bd.php");

        //include para acessar as confguracoes definidas
        include("../../config/config.php");

        global $pdo;

        $consulta = $pdo->query("SELECT * FROM acesso WHERE excluido = 0 AND ativo = 1");
            
        // o contador eh iniciado com zero
        $cont = 0;
            
        // para cada registro no banco a variavel $cont recebera 1 incremento
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
               
            $cont++;
        }
            // caso cont for maior que zero, ou seja se ha pelo menos um registro no banco que satisfaca a condicao acima, sera mostrado o modal
            if($cont > 0){



                echo "<div class='row' style='float: left; margin-left: 700px; margin-top: -50px; position: absolute;'>";
 
                echo "<div class='col'>";
                echo "<a href='?pagina=../../paginas/cadastros/cadastrar_acesso'>";
                echo "<img src='../../imagens/navbar/plus.png' alt='botao-ativar-informativo' title='Novo Acesso'>";
                echo "</a>";
                echo "</div>";
                echo "</div>";
                    
             


                
                echo"<div class='container'>";
        
                    $consulta = $pdo->query("SELECT * FROM acesso WHERE excluido = 0 AND ativo = 1");
                    
                    $numItensLinha = 4;

                    $i = 0;
                    echo "<div class='row'>";
                        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

                                echo "<div style='float: left' id={$linha['nome']} class='boxItens'>";
                                    echo "<a href={$linha['link']} target='_blank'><i class='active'></i><center><p>{$linha['nome']}</p></center></a>";
                                    echo "<div class='noClass'>";
                                        echo"<a style='margin-top: -35px; max-width: 5px; margin-left: -65px;' href='../../classes/acesso/desabilitarAcesso.php?id={$linha['id']}'><button type='button' class='btn btn-danger-red' style='width: 70px;'>Excluir</button></a>";
                                    echo "</div>";
                                        
                    
                                    
                                echo "</div>";
                                echo "<br>";
                                    
                                  
                        }
                    
                    echo "</div>";
                             

                    }

        
            
            else{

                echo "<h4>Não há Acessos cadastrados</h4>";
                echo "<br>";
                echo "<a href='/paginas/admin/main.php?pagina=../../paginas/cadastros/cadastrar_acesso'>Para cadastrar um novo acesso, clique aqui!</a>";
        
            }
            

            
            
        

    ?>

