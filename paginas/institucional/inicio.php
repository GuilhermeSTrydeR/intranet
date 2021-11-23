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

        // echo "<div id='root'></div>";
        echo"<div class='container'>";
        echo "<br><br>";
        $consulta = $pdo->query("SELECT * FROM acesso_grupo WHERE excluido = 0 AND ativo = 1 AND interno = 1");
        
        $numItensLinha = 4;

        $i = 0;
        echo "<div class='row' style= border-top-right-radius: 35px; border-top-left-radius: 35px; border-bottom-left-radius: 35px; max-width: 95%'>";
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                if($linha['ativo'] == 1){

                    echo "<div style='float: left;' id={$linha['nome']} class='boxItensInstitucional'>";
                        echo "<a href=?pagina=../../classes/acesso/visualizar_acesso_grupo_selecionado&id=" .$linha['id'] . "&nome=" . $linha['nome'] . " ><i class='active'></i><center><p style='white-space: pre-line;
                        width: 100%;
                        overflow: hidden !important;             
                        text-overflow: ellipsis; max-height: 100px;'>{$linha['nome']}</p></center></a>";
                    echo "</div>";
    
                    $i++;
                }
                echo "<br>";
        }
        echo "</div>";

        echo "<br>";
        echo "<br>";
        echo "<br>";
         
        
        echo "</div>";


    }
    
    else{

        echo "<h4 style='margin-top: 20%;'>Não há Acessos cadastrados</h4>";
       
    }
    

    
    


?>

