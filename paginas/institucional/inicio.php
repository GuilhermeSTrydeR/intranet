
<style>

body{

    background: #f0f2f8;
}

</style>

<?php

include("../../classes/conexao_bd.php");

//include para acessar as confguracoes definidas
include("../../config/config.php");

// include da classe mural
include("../../classes/institucional/institucional.class.php");

// $i = new mural();
global $pdo;

$ins = new institucional();

$sql = 'SELECT * FROM institucional ORDER BY id DESC;';
$consulta = $pdo->query($sql);

// aqui pegamos a id do usuario logado, para enviar via post para classe responsavel por salvar o clique do botao de confirmacao de leitura
$idUsuario = $_SESSION['id'];



// condicao estatica para resolver o problema de exibir as bordas da div sem ter informacoes dentro(porem ainda precisar integrar essa funcao a saida real) 
if(isset($consulta)){
    ?>
    <style>
        .hidden{
            display: block !important;
        }
    </style>
    <?php

}
?>
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
        echo "<div style='margin-left: 100px;'>";
            echo "<div class='row' style= border-top-right-radius: 35px; border-top-left-radius: 35px; border-bottom-left-radius: 35px; max-width: 95%'>";
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    // aqui pegamos o ID do institucional exibido na tela como uma lista
                    $idInstitucional = $linha['id'];

                    if($ins->retornaInstitucionalLido($idInstitucional) == True){
                        $classe = 'boxItensInstitucionalPequenoVerde';
                        $texto = 'Lido';
                        $texto = "<p style=color: white !important;><b>Lido</b></p>";
                    }
                    else{
                        $classe = 'boxItensInstitucionalPequenoVermelho';
                        $texto = '<center>Não Lido</center>';
                        $texto = "<p style=color: white;><b>Não Lido!</b></p>";
                    }


                    // echo "<div class='col'>";
                    //             echo "<div class='".$classe."'>";
                    //                 echo "<p>".$texto."</p>";
                    //             echo "</div>";
                    //         echo "</div>";

                    if($linha['ativo'] == 1){
                   
                        echo "<div class='row'>";
                            echo "<div class='col'>";
                                echo "<div style='float: left;' id={$linha['id']} class='boxItensInstitucional'>";
                                    echo "<a href=?pagina=../../classes/institucional/visualizarInstitucionalUnico&id=" .$linha['id'] . "&nome=" . $linha['titulo'] . " ><i class='active'></i><center><p style='white-space: pre-line;
                                    width: 100%;
                                    overflow: hidden !important;             
                                    text-overflow: ellipsis; max-height: 100px;'>{$linha['titulo']}</p></center></a>";
                                echo "</div>";
                            echo "</div>";
                            echo "<div class='col'>";
                                echo "<center><div class='".$classe."'>";
                                    echo "<p>$texto</p>";
                                echo "</div></center>";
                        echo "</div>";
                        $i++;
                }


                
        echo "</div>";
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
