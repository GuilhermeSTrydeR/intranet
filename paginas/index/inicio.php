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
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

            echo"<br>";


            echo"<div id='mural' class='hidden'>";
            
            echo "<center>";  
            echo "<table  class='table' style='border: none; table-layout:fixed; max-width: 100%; word-wrap: break-word; !important;'>";
        
            
            if($linha['ativo'] == 0){
                $temInformacao = false;
            }

            elseif($linha['ativo'] == 1){
                // echo "<tr>";
                // echo "<td style='border: none;'><center><b>Informativo nº: <h1>{$linha['id']}</h1></b></center> </td>";
                // echo "</tr>";

                echo "<tr>";
                echo "<td style='border: none;'><center><h1> {$linha['titulo']}</h1></center></td>";
                echo "</tr>";

                
                echo "<tr>";
                echo nl2br("<td style='border: none;'><h4 style='width:100%;  color: black !important;'>{$linha['texto']}</h4></td>");
                echo "</tr>";
                
            }

            echo"</table>";
            echo"</div>";
         
        }
        

    ?>

    

</center>