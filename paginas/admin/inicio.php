<center style="margin-left: 100px; margin-top: 100px !important;">

    
    <?php

        if(!isset($_SESSION['logado']) || $_SESSION['permissao'] != '3'){
        
            header("Location: /");
        
        }
        
        $dataCadastro = gmdate("YmdHis", time());


        






    ?>

<center style="margin-left: 100px; margin-top: 50px !important; position: relative !important;">
    <style>

        a{text-decoration: none;}
    
    </style>

    <?php


        $consulta = $pdo->query("SELECT * FROM acesso_grupo WHERE excluido = 0 AND ativo = 1");
            
        // o contador eh iniciado com zero
        $cont = 0;
            
        // para cada registro no banco a variavel $cont recebera 1 incremento
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
               
            $cont++;
        }
            // caso cont for maior que zero, ou seja se ha pelo menos um registro no banco que satisfaca a condicao acima, sera mostrado o modal
            if($cont > 0){


             


                
                echo"<div class='container'>";
        
                $consulta = $pdo->query("SELECT * FROM acesso_grupo WHERE excluido = 0 AND ativo = 1");
                
                $numItensLinha = 4;

                $i = 0;
                echo "<div class='row'>";
                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                        if($linha['ativo'] == 1){

                            echo "<div style='float: left;' id={$linha['nome']} class='boxItens'>";
                                echo "<a href=?pagina=../../classes/acesso/visualizar_acesso_grupo_selecionado&id=" .$linha['id'] . "&nome=" . $linha['nome'] . " ><i class='active'></i><center><p style='white-space: pre-line;
                                width: 100%;
                                overflow: hidden !important;             
                                text-overflow: ellipsis; max-height: 100px;'>{$linha['nome']}</p></center></a>";
                            echo "</div>";
                            
                            $i++;
                        }
              
         
                }
                echo "</div>";

            }
            
            else{

                echo "<h4 style='margin-top: 20%;'>Não há Acessos cadastrados</h4>";
               
            }
            

            
            
        

    ?>

