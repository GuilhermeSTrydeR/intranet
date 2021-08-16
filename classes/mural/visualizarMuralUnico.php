<style>

    body{

        background: #f0f2f8;
    }

</style>
<center style='margin-left: 100px;'>

    <?php

        include("../../classes/conexao_bd.php");

        //include para acessar as confguracoes definidas
        include("../../config/config.php");

        // include da classe mural
        include("../../classes/mural/mural.class.php");

        // $i = new mural();
        global $pdo;

        $sql = 'SELECT * FROM mural ORDER BY id DESC;';
        $consulta = $pdo->query($sql);



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

    <br><br>

<div class='infoContainer' style='background-color: white; box-shadow: 10px; background-color: #ffffff;  border-top-left-radius: 40px; border-top-right-radius: 40px; border-bottom-left-radius: 40px;table-layout:fixed;  max-width: 1100px; word-wrap: break-word; !important;'>



    <div class="row" style='float: left; margin-left: 200px; position: absolute;'>
            <div class='col'>
    
            <img src="/imagens/navbar/printer.png"  onClick="window.print()" width="50"  height="50" class="row" alt="imprimir" style='margin-left: 700px; margin-top: 50px;' title="Imprimir">

            </div>

    </div>
    <div class='noprint' style='height: 50px;'></div>

            <?php

            $id = $_GET['id'];

            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                if($linha['id'] == $id){


                echo "<div class='mural' style='margin-left: -150px;'>";
                
                echo "<center style='margin-left: -150px; max-width: 100%;'>";  
                echo "<table id='tblInfUnico'>";
            
            
                $linha['dataCadastro'] = gmdate("d/m/y á\s\ H:i", $linha['dataCadastro']);

                
        
                echo "<tr>";    
                echo "<td ><br><center><b><p >Publicado em: {$linha['dataCadastro']}</p></b></center><br><br><center><h3> {$linha['titulo']}</h3><br></center> </td>";
                echo "</tr>";
                
                echo "<tr>";
        
                echo "<br>";
                echo nl2br("<td><p id='texto' style='width: 100%;'>{$linha['texto']}</p></td>");

                echo "</tr>";

                    echo "<tr>";
                    echo "<td>";
                    echo "<center>";
                    echo "<a href='" . $linha['imagem'] ."' target='_blank'><img onMouseOver='aumenta(this)' onMouseOut='diminui(this)' class='imagem' style='max-width: 800px; margin-left: 300px;' src='" . $linha['imagem'] ."'></img></a>";
                    echo "<br>";
                    echo "<div style='margin-left: 200px;' class='noprint'>";

                        // sera exibido o link para download apenas se houver uma imagem na variavel
                        if(isset($linha['imagem'])){
                            echo "<a id='linkImagem' href='../../" . $linha['imagem'] ."' download>Baixar Imagem</a>";
                        }

                    echo "</div>";
                    
                    
                    echo"<div class='row' style='height: 100px;'></div>";
                    echo "</center>";
                    echo "</td>";
                    echo "</tr>";
                    echo "</div>";
    
                    
                
                echo"</table>";
                

                }
                
            
            
            }
            

        ?>

</div>
        </div>
<div class='row' style='height: 100px;'></div>

</center>