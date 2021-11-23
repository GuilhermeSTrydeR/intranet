<style>

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
<?php


$consulta = $pdo->query("SELECT * FROM institucional WHERE ativo = 1 and excluido = 0 and fim >= CURDATE() or ativo = 1 and excluido = 0 and fim = '0000-00-00' ORDER BY id DESC");
    
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
        $consulta = $pdo->query("SELECT * FROM institucional WHERE ativo = 1 and excluido = 0 and fim >= CURDATE() or ativo = 1 and excluido = 0 and fim = '0000-00-00' ORDER BY id DESC");
        
        $numItensLinha = 4;

        $i = 0;
        echo "<div class='row' style= border-top-right-radius: 35px; border-top-left-radius: 35px; border-bottom-left-radius: 35px; max-width: 95%'>";
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                if($linha['ativo'] == 1){

                    echo "<div style='float: left;' id={$linha['id']} class='boxItensInstitucional'>";
                        echo "<a href=?pagina=../../classes/institucional/visualizarInstitucionalUnico&id=" .$linha['id'] . "&nome=" . $linha['titulo'] . " ><i class='active'></i><center><p style='white-space: pre-line;
                        width: 100%;
                        overflow: hidden !important;             
                        text-overflow: ellipsis; max-height: 100px;'>{$linha['titulo']}</p></center></a>";
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

        echo "<h4 style='margin-left: 30%; margin-top: 12%'>Não há nenhum institucional ou documento cadastrado</h4>";
       
    }
    

    
    


?>

