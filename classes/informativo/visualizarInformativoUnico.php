<center style='margin: 15px;'>

    <?php

        include("../../classes/conexao_bd.php");

        //include para acessar as confguracoes definidas
        include("../../config/config.php");

        // include da classe informativo
        include("../../classes/informativo/informativo.class.php");

        // $i = new Informativo();
        global $pdo;

        $sql = 'SELECT * FROM informativo ORDER BY id DESC;';
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

        <?php

        $id = $_GET['id'];

        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            if($linha['id'] == $id){

            echo"<br>";

            echo "<div class='mural'>";
            
            echo "<center>";  
            echo "<table class='table' style='background-color: #ffffff;  border-top-left-radius: 40px; border-top-right-radius: 40px; border-bottom-left-radius: 40px; ' table-layout:fixed;  max-width: 1200px; word-wrap: break-word; !important; margin-left: 200px;'>";
        
          
            $linha['dataCadastro'] = gmdate("d/m/y á\s\ H:i", $linha['dataCadastro']);

            
                
            
            echo "<tr>";
            echo "<td style='border: none; max-width: 500px;'><br><center><b><p style='float: left; margin-left: 250px; color: #F47920;'>Publicado em: {$linha['dataCadastro']}</p></b></center><br><br><center><h3 style='color: #009b63;  word-wrap: break-word; max-width: 1050px; margin-left: 200px;'> {$linha['titulo']}</h3></center> </td>";
            echo "</tr>";

            echo "<tr>";
            
            echo nl2br("<td style='border: none;'><p style='word-wrap: break-word; max-width: 1000px; padding: 15px; margin-left: 270px; color: black !important;'>{$linha['texto']}</p></td>");

            echo "</tr>";

                echo "<tr>";
                echo "<td>";
                echo "<center>";
                echo "<img onMouseOver='aumenta(this)' onMouseOut='diminui(this)' class='imagem' style='max-width: 800px; margin-left: 200px;' src='" . $linha['imagem'] ."'></img>";
                echo"<div class='row' style='height: 100px;'></div>";
                echo "</center>";
                echo "</td>";
                echo "</tr>";

            echo"</div>";
                
            
            echo"</table>";
            

            }
            
         
         
        }
        

    ?>



<div class='row' style='height: 100px;'></div>

</center>