<center class="visInstitucional" style="margin-left: 50px; margin-top: 50px; !important; position: relative !important;">
    <style>

        .hiddenBtnXUsuarios{
            display: inline-block !important;
        }

        .hiddenPrint{
            display: inline-block !important;
        }

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

        //include para acessar o banco
        include("../../classes/conexao_bd.php");

        //include para acessar as confguracoes definidas
        include("../../config/config.php");

        // include da classe
        include("Institucional.class.php");


        $i = new Institucional();

        global $pdo;


            $consulta = $pdo->query("SELECT * FROM institucional WHERE excluido = 0");
            
            // o contador eh iniciado com zero
            $cont = 0;
                
            // para cada registro no banco a variavel $cont recebera 1 incremento
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                   
                $cont++;
    
            }
    
            // caso cont for maior que zero, ou seja se ha pelo menos um registro no banco que satisfaca a condicao acima, sera mostrado o modal
            if($cont > 0){
                ?>
                    <h4>Institucional</h4>
                        <div class='row'>
                            <div class="col" style='margin-left: 600px;'>
                
                                <a style='margin-left: 100px;' href="?pagina=../../paginas/cadastros/cadastrar_contato">
                                    <img src="../../imagens/navbar/plus.png" alt='botao-ativar-mural' title="Novo Usuario">
                                </a>

                            </div>
                        </div>
                <?php
                echo "<table class='tablemural table table-striped table-bordered table-condensed table-hover' style='position: relative; table-layout:fixed; border: 2px solid ##00995D; word-wrap: break-word; max-width: 1000px; margin-top: 10px;' id='table'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<div class='thead'>";
                    echo "<th style='width: 40px;' scope='col'>ID</th>";
                    echo "<th  style='width: 100px;' scope='col'>Nome</th>";
                    echo "<th  style='width: 120px;' scope='col'>Texto</th>";
         
      
                    echo "<th style='width: 40px;' scope='col' class='noprint'>Data</th>";
                    echo "<th style='width: 40px;'scope='col' class='noprint'>Ativo?</th>";
                    echo "<th style='width: 50px;' scope='col' class='noprint'>Opções</th>";
                    echo "</div>";
                    echo "</tr>";
                    echo "</thead>";
                    $consulta = $pdo->query("SELECT * FROM institucional WHERE excluido = 0 order by nome");
               
                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                        
                        if($linha['ativo'] == 0){
                            $linha['ativo'] = "<p style='color: red';>Não</p>";
                        }
        
                        elseif($linha['ativo'] == 1){
                            $linha['ativo'] = "<p style='color: green;'>Sim</p>";
                        }
        
                        else{
                            $linha['ativo'] = 'Erro';
                        }

                        // switch ($linha['setor']) {
                        //     case 1:
                        //         $linha['setor'] = 'Comercial';
                        //         break;
                        //     case 2:
                        //         $linha['setor'] = 'Cadastro';
                        //         break;
                        //     case 3:
                        //         $linha['setor'] = 'Recepção';
                        //         break;
                        //     case 4:
                        //         $linha['setor'] = 'Faturamento';
                        //         break;
                        //     case 5:
                        //         $linha['setor'] = 'Tecnologia da Informação';
                        //         break;
                        //     case 6:
                        //         $linha['setor'] = 'Contabilidade';
                        //         break;
                        //     case 7:
                        //         $linha['setor'] = 'Interc./Audit.';
                        //         break;
                        //     case 8:
                        //         $linha['setor'] = 'Diretoria';
                        //         break;
                        //     case 9:
                        //         $linha['setor'] = 'Financeiro';
                        //         break;
                        //     case 10:
                        //         $linha['setor'] = 'Gerência';
                        //         break;
                        //     case 11:
                        //         $linha['setor'] = 'ANS';
                        //         break;
                        //     case 12:
                        //         $linha['setor'] = 'GED';
                        //             break; 
                        //     case 13:
                        //         $linha['setor'] = 'Outros';
                        //             break; 
                        // }


                    // nessa sera convertifo o formato de data do sql pro padrao brasileiro
                    $linha['data'] = date('d/m/Y', strtotime($linha['data']));

                    echo"<tr>";
                    echo "<td> {$linha['id']} </td> <td> {$linha['nome']} </td>  <td> {$linha['texto']} </td> <td>{$linha['data']}</td> <td>{$linha['ativo']}</td><td class='noprint'><a href='/paginas/admin/main.php?pagina=../cadastros/editar_contato&id=".$linha['id']."'><button type='button' class='btn btn-success' style='width: 100px;'>Editar</button></a></td>";
                             
                    echo "</tr>";
                    }
            }
            else{

                echo "<h4 style='margin-top: 100px;'>Não há nenhum aviso ou documento Institucional cadastrados.</h4>";
                echo "<br>";
                if($_SESSION['permissao'] == 3){

                    echo "<a href='/paginas/admin/main.php?pagina=../../paginas/cadastros/cadastrar_institucional'>Para cadastrar um novo institucional, clique aqui!</a>";

                }
             

            }
?>
</div>
</center>