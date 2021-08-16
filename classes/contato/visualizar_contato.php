<center style="margin-left: 50px; margin-top: 50px; !important; position: relative !important;">
        <style>

        .hiddenBtnXUsuarios{
            display: inline-block !important;
        }
        .hiddenPrint{
            display: inline-block !important;
        }

        #licontato{
            background: #009b63;
            border-right: 6px solid #F47920;
            color: #ffffff;
        }       

        #licontato b{
            color: #F47920;
        }

        </style>

        <h4>Contatos</h4>
        <div class="col" style='margin-left: 600px;'>
            <a href="?pagina=../../paginas/cadastros/cadastrar_aniversario">
                <img src="../../imagens/navbar/plus.png" alt='botao-ativar-mural' title="Novo Usuario">
            </a>
        </div>

        <?php

        //include para acessar o banco
        include("../../classes/conexao_bd.php");

        //include para acessar as confguracoes definidas
        include("../../config/config.php");

        // include da classe mural
        include("Contato.class.php");


        $c = new Contato();

        global $pdo;


            $consulta = $pdo->query("SELECT * FROM contato WHERE excluido = 0");
            
            // o contador eh iniciado com zero
            $cont = 0;
                
            // para cada registro no banco a variavel $cont recebera 1 incremento
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                   
                $cont++;
    
            }
    
            // caso cont for maior que zero, ou seja se ha pelo menos um registro no banco que satisfaca a condicao acima, sera mostrado o modal
            if($cont > 0){
                


                echo "<table class='tablemural table table-striped table-bordered table-condensed table-hover' style='position: relative; table-layout:fixed; border: 2px solid ##00995D; word-wrap: break-word; max-width: 1000px; margin-top: -480px;' id='table'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<div class='thead'>";
                    echo "<th style='width: 80px;' scope='col'>Nome</th>";
                    echo "<th style='width: 40px;' scope='col'>Setor</th>";
                    echo "<th style='width: 50px;' scope='col'>Telefone</th>";
                    echo "<th style='width: 60px;' scope='col'>E-mail</th>";
                    echo "<th style='width: 30px;' scope='col' class='noprint'>Opções</th>";
                    echo "</div>";
                    echo "</tr>";
                    echo "</thead>";
                    $consulta = $pdo->query("SELECT * FROM contato WHERE excluido = 0");

                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    echo"<tr>";
                    echo "<td> {$linha['nome']} </td> <td> {$linha['setor']} </td>  <td> {$linha['telefone']} </td><td> {$linha['email']} </td> <td class='noprint'><a href='/paginas/admin/main.php?pagina=../cadastros/editar_aniversario&id=".$linha['id']."'><button type='button' class='btn btn-success' style='width: 100px;'>Editar</button></a></td>";
                             
                    echo "</tr>";
                    }
            }
            else{

                echo "<h4>Não há contatos cadastrados.</h4>";
                echo "<br>";
                echo "<a href='/paginas/admin/main.php?pagina=../../paginas/cadastros/cadastrar_contato'>Para cadastrar um novo contato, clique aqui!</a>";

            }



?>





 


</center>
<div style='height: 500px;'>



</div>