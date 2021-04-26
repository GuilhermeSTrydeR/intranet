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

        include("../../classes/conexao_bd.php");
        include("informativo.class.php");

        $i = new Informativo();

        //include para acessar o banco
        include("../../classes/conexao_bd.php");

        //include para acessar as confguracoes definidas
        include("../../config/config.php");

        global $pdo;
        $consulta = $pdo->query("SELECT * FROM informativo;");

        // aqui devera receber em vez de 'true' o retorno de uma funcao para verificar se ha linhas na tabela 'informativo'pois se nao houver, o elemento continua escondido
        $temInformacao = true;

        if($temInformacao == true){
            ?>
                <style>
                    .hidden{
                        display: block !important;
                    }
                </style>
            <?php
            
        }

        ?>

        <div class='hidden'>
        <table class='table table-striped table-bordered table-condensed table-hover' style='margin-left: 200px; table-layout:fixed; border: 2px solid ##00995D; max-width: 900px; word-wrap: break-word; !important; position: absolute;' id='tabela_informativo'>
        <thead>
        <tr>
        <div class='thead'>
        <th style='width: 70px;' scope='col'>ID</th>
        <th style='width: 220px;' scope='col'>Titulo</th>
        <th style='width: 200px;' scope='col'>Texto</th>
        </div>
        </tr>
        </thead>
        <?php
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            

                echo"<tr>";
                echo  " <td> {$linha['id']} </td>  <td> {$linha['titulo']}  </td> <td> {$linha['texto']}";
                echo"</tr>";
            
        }
        
        echo"</table>";
        

    ?>
    </div>
</center>
