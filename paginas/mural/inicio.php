<center style=' margin-left: 140px;'>

<body style='background: #f0f2f8;'>
<style>
        #liMural{
            background: #009b63;
            border-right: 6px solid #F47920;
            color: #ffffff;
        }       

        #liMural b{
            color: #F47920;
        }

</style>


<?php

include("../../classes/conexao_bd.php");

//include para acessar as confguracoes definidas
include("../../config/config.php");

// include da classe mural
include("../../classes/mural/mural.class.php");

// $i = new mural();
global $pdo;



$sql = "SELECT * FROM mural WHERE ativo = 1 and excluido = 0 and fim >= CURDATE() or ativo = 1 and excluido = 0 and fim = '0000-00-00' ORDER BY id DESC";
$consulta = $pdo->query($sql);

$cont = 0;
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

    $cont++;

}

if($cont > 0){


 
    $consulta = $pdo->query($sql);
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        if($linha['ativo'] == 1 && $linha['excluido'] == 0){
            if((($linha['inicio'] <= date('Y-m-d') || $linha['inicio'] == '0000-00-00' || $linha['inicio'] == null) && ($linha['fim'] >= date('Y-m-d') || $linha['fim'] == '0000-00-00' || $linha['fim'] == null))){

            echo "<div class='mural' style='margin-top: 20px;'>";
            
            echo "<center>";  
            echo "<table class='tableMural' style='box-shadow: 10px; background-color: #ffffff;  border-top-left-radius: 40px; border-top-right-radius: 40px; border-bottom-left-radius: 40px; ' table-layout:fixed;  max-width: 900px; word-wrap: break-word; !important;'>";
        
            $linha['dataCadastro'] = gmdate("d/m/y á\s\ H:i", $linha['dataCadastro']);

            echo "<tr>";
            echo "<td style='border: none; max-width: 500px;'><br><center><b><p style='float: left; margin-left: -300px; color: #F47920;'>Publicado em: {$linha['dataCadastro']}</p></b></center><br><br><center><h3 style='color: #009b63; word-wrap: break-word; max-width: 1000px;'> {$linha['titulo']}</h3></center> </td>";
            echo "</tr>";

            echo "<tr>";
            
            echo nl2br("<td style='border: none;'><p style='word-wrap: break-word; max-width: 1000px; padding: 15px; margin-left: 50px; color: black !important;'>{$linha['texto']}</p></td>");

            echo "</tr>";
            echo "<tr>";
                echo "<td>";
                    echo "<center>";
                        echo "<a href='" . $linha['imagem'] ."' target='_blank'><img onMouseOver='aumenta(this)' onMouseOut='diminui(this)' class='imagem' style='max-width: 800px; ' src='" . $linha['imagem'] ."'></img></a>";
                        echo"<br>";

                        // sera exibido o link para download apenas se houver uma imagem na variavel
                        if(isset($linha['imagem'])){

                            echo "<a id='linkImagem' href='../../" . $linha['imagem'] ."' download>Baixar Imagem</a>";

                        }
                        
                        echo"<div class='row' style='height: 100px;'></div>";
                    echo "</center>";

                    // esse echo define o espacamento do mural dentro do mural de fundo branco
                    echo"<div class='row' style='height: 50px;'></div>";

                echo "</td>";
                echo "</tr>";

                echo"</div>";

                echo"<div class='print' style='border-bottom: 1px dotted black; margin: 20px;'></div>";
            
                echo"</table>";
            // esse echo define o espacamento entre os murais
            echo"<div class='row' ></div>";
                    }

        }

    }
}
else{

    echo"<style>";
        echo "body{";

            echo "background: #ffffff !important;";

        echo "}";
    echo "</style>";

  
    echo "<h4 style='margin-top: 10%;'>Não há mural cadastrado ou ativo com a data vigente para serem<br>exibidos</h4>";
    echo "<br>";
    
    if($_SESSION['permissao'] == 3){
        echo "<a href='/paginas/admin/main.php?pagina=../../paginas/cadastros/cadastrar_mural'>Para cadastrar um novo mural, clique aqui!</a>";

    };



}

?>


<script>
    // essas funcoes sao para aumentar e diminuir as imagens do mural ao passar, no caso la na tag <img> sao chamadas pelo evento (mouseOver) e (MouseOut)
    // function aumenta(obj){
    //     // recebemos primeiro as dimensoes originais para depois voltar elas, (nao adianta dividir por 2 depois que multiplicar pois as imagens perdem sua proporcao original)
    //     obj.heightOriginal = obj.height;
    //     obj.widthOriginal = obj.width;


    //     obj.height=obj.height*2;
    // 	obj.width=obj.width*2;
    // }

    // function diminui(obj){
    // 	obj.height=obj.heightOriginal
    // 	obj.width=obj.widthOriginal
    // }
</script>

    <div class='row' style='height: 100px;'></div>

</body>

</center>