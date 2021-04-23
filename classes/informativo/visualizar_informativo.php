<center style="margin-left: 100px; margin-top: 100px !important; position: relative !important;">
        <style>

        .hiddenBtnXUsuarios{
            display: inline-block !important;
        }
        .hidden{
            display: inline-block !important;
        }

        </style>


        <?php

        include("../../classes/conexao_bd.php");
        include("informativo.class.php");

        $i = new Informativo();

        //include para acessar o banco
        include("../../classes/conexao_bd.php");

        //include para acessar as confguracoes definidas
        include("../../config/config.php");

        global $pdo;
        $consulta = $pdo->query("SELECT * FROM informativo;");

        echo "<table class='table table-striped table-bordered table-condensed table-hover' style='margin-left: 200px; table-layout:fixed; max-width: 900px; word-wrap: break-word; !important; position: absolute;'>";
        echo "<thead>";
        echo "<tr>";
        echo "<div class='thead'>";
        echo "<th scope='col' style='width: 70px;'>ID</th>";
        echo "<th scope='col' style='width: 200px;' >Titulo</th>";
        echo "<th scope='col'>Texto</th>";
        echo "</div>";
        echo "</tr>";
        echo "</thead>";
        
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            
         


            if($linha['id'] >= 1){
                echo "<tr>";
                echo  " <td> {$linha['id']} </td>  <td> {$linha['titulo']}  </td> <td> {$linha['texto']} </td>";
                echo "</tr>";
            }
        }
        
        echo "</table>";


    ?>
</center>
