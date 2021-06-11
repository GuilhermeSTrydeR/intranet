<center style='margin: 15px;'>

    <?php

        include("../../classes/conexao_bd.php");

        //include para acessar as confguracoes definidas
        include("../../config/config.php");

        global $pdo;

        $sql = 'SELECT * FROM informativo ORDER BY id DESC;';
        $consulta = $pdo->query($sql);
 
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

            // if((($linha['inicio'] <= date('Y-m-d') && $linha['fim'] >= date('Y-m-d')) || $linha['inicio'] <= '0000-00-00' && $linha['fim'] == '0000-00-00' || $linha['fim'] == null) || $linha['inicio'] <= date('Y-m-d')){

            if($linha['ativo'] == 1 && $linha['excluido'] == 0){
                if((($linha['inicio'] <= date('Y-m-d') || $linha['inicio'] == '0000-00-00' || $linha['inicio'] == null) && ($linha['fim'] >= date('Y-m-d') || $linha['fim'] == '0000-00-00' || $linha['fim'] == null))){

                echo"<br>";
                echo"<br>";
                echo"<br>";
                echo "<div class='mural'>";
                
                echo "<center>";  
                
                echo "<table class='tableMural' style='background-color: #ffffff;  border-top-left-radius: 40px; border-top-right-radius: 40px; border-bottom-left-radius: 40px; ' table-layout:fixed;  max-width: 900px; word-wrap: break-word; !important;'>";
            
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
                            // esse echo define o espacamento do informativo dentro do mural de fundo branco
                            echo"<div class='row' style='height: 50px;'></div>";
                        echo "</center>";
                    echo "</td>";
                echo "</tr>";

                echo"</div>";
    
                echo"<div class='print' style='border-bottom: 1px dotted black; margin: 20px;'></div>";


                echo"</table>";
                echo"<div class='row' style='height: 20px;'></div>";
            }
 
            }
            
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
<div style='height: 140px;'>

</div>

</center>

<?php  


global $pdo;

// essa variavel recebe o mes atual
$mesAtual = date('m');

// essa consultaeh apenas feita para verificar se ha registros que satisfaçam as condicoes, pois se nao houver, o modal nao ira aparecer
$consulta = $pdo->query("SELECT nome, setor, ativo, excluido, nasc FROM usuarios WHERE Month(nasc) = '$mesAtual' AND ativo = 1 AND excluido = 0 ORDER BY Day(nasc)");

// o contador eh iniciado com zero
$cont = 0;

// para cada registro no banco a variavel $cont recebera 1 incremento
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
   
    $cont++;
  
}


// caso cont for maior que zero, ou seja se ha pelo menos um registro no banco que satisfaca a condicao acima, sera mostrado o modal
if($cont > 0){

    echo "<div id='modalInicio' style='z-index: 2147483648; height: auto; width: 90%; background: #ffffff 0% 0% no-repeat padding-box; box-shadow: 5px 5px 15px #000000; border-top-left-radius: 20px; border-top-right-radius: 20px; border-bottom-left-radius: 20px; position: fixed; bottom: 30px; left: 50%; transform: translate(-50%, 0); '>";


    ?>


        <div class='row'>
            <div class="col-2" style='background: ffffff; '>
            <center style='margin-left: 20px;'>
                <p style='color: #009b63; float: left; margin-bottom: 5px;'>
                <img src="../../imagens/modal/cake.png" style='margin-top: 5px;' alt="aniversariantes">
                <br>
                    <b>Aniversariantes</b>
                </p>
                </center>
        
            </div>   
   
            <div class='col-9' style='background: #ffffff; float: left; '>
            <?php

                global $pdo;
                $mesAtual = date('m');
        
                $consulta = $pdo->query("SELECT nome, setor, ativo, excluido, nasc FROM usuarios WHERE Month(nasc) = '$mesAtual' ORDER BY Day(nasc)");
                echo "<table style='margin-top: 15px;'>";
                

                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    if($linha['ativo'] == 1 && $linha['excluido'] == 0){
                        $linha['nasc'] = date('d/m', strtotime($linha['nasc']));
                             
                                echo "<td>";
                        
                                echo "<div style='margin-left: 35px;'><h5 style='color: #00995D;'>{$linha['nome']}</h5><center><h4  style='color: #F47920 !important;'>{$linha['nasc']}</h4></center></div>";
                  
                                echo "</td>";
                                
            
                    }
                }
          
                echo"</table>";
                ?>

            </div>
        

            <div class='col-1'>
    
                <input style='float: right; border-top-right-radius: 20px; 'id="botao" type="button" class='btn btn-danger' value="Fechar" onclick="fecharModal()"/>
        
            </div>


    </div>

<!-- aqui fecha o IF do modal de aniversarios (PHP com HTML mesclado) -->
<?php
    }
?>


</div>



<script>
    // essa funcao ira ser chamada no botao para fechar o modal, ou seja ela fecha o modal
    function fecharModal(){
        const texto = document.getElementById( 'modalInicio' ).style.display = 'none';
        // const texto = document.getElementById( 'sombraInicio' ).style.display = 'none';
    }

</script>  





