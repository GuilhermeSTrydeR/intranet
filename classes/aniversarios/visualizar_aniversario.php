<?php
session_start();
?>
<center style="margin-left: 100px; margin-top: 100px !important; position: relative !important;">
        <style>

        .hiddenBtnXUsuarios{
            display: inline-block !important;
        }
        .hiddenPrint{
            display: inline-block !important;
        }

        </style>


        <?php

        //include para acessar o banco
        include("../../classes/conexao_bd.php");

        //include para acessar as confguracoes definidas
        include("../../config/config.php");

        // include da classe informativo
        include("Aniversario.class.php");

        $a = new Aniversario();

        global $pdo;

        ?>

        <table class='tableInformativo table table-striped table-bordered table-condensed table-hover' style='margin-left: 200px; table-layout:fixed; border: 2px solid ##00995D; word-wrap: break-word; max-width: 900px;' id='table'>
        <thead>
        <tr>
        <div class='thead'>
        <!-- <th style='width: 50px;' scope='col'>ID</th> -->
        <th style='width: 140px;' scope='col'>Nome</th>
        <th style='width: 100px;' scope='col'>Aniversario</th>
        </div>
        </tr>
        </thead>


        <?php

        $consulta = $pdo->query("SELECT * FROM aniversarios ORDER BY nasc");

        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            if($linha['excluido'] == 0){
            
                if($linha['ativo'] == 0){
                    $linha['ativo'] = "<p style='color: red';>Não</p>";
                }

                elseif($linha['ativo'] == 1){
                    $linha['ativo'] = "<p style='color: green;'>Sim</p>";
                }

                else{
                    $linha['ativo'] = 'Erro';
                }
            
            echo"<tr>";
            
            // $linha['nasc'] = str_replace("-", "", $linha['nasc']);
            
            $linha['nasc'] = date('d/m/Y', strtotime($linha['nasc']));

       

            echo " <td> {$linha['nome']} </td>  <td> {$linha['nasc']}  </td>";
            ?>

           
      

            <?php
            echo "</td></tr>";

            }
            
        }
        


        echo"</table>";
        
        ?>



     

    </div>

    <div class='row' style='height: 100px;'></div>
</center>
