<center class="visContato" style="margin-left: 50px; margin-top: 50px; !important; position: relative !important;">
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
                ?>
                    <h4>Contatos</h4>
                        <div class='row'>
                            <div class="col" style='margin-left: 600px;'>
                                <img src="/imagens/navbar/printer.png" class="noprint" onClick="window.print()" width="50"  height="50" class="row" alt="imprimir" title="Imprimir">
                
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
                    echo "<th class='visContatoNome'style='width: 70px;' scope='col'>Nome</th>";
                    echo "<th class='visContatoSetor' style='width: 35px;' scope='col'>Setor</th>";
                    echo "<th class='visContatoTelefone' style='width: 30px;' scope='col'>Telefone</th>";
                    echo "<th class='visContatoNasc' style='width: 30px;' scope='col'>Nascimento</th>";
                    echo "<th class='visContatoEmail' style='width: 60px;' scope='col'>E-mail</th>";
                    echo "<th class='visContatoIp' style='width: 35px;' scope='col'>IP</th>";
                    echo "<th style='width: 17px;' scope='col' class='noprint'>Ativo?</th>";
                    echo "<th style='width: 40px;' scope='col' class='noprint'>Opções</th>";
                    echo "</div>";
                    echo "</tr>";
                    echo "</thead>";
                    $consulta = $pdo->query("SELECT * FROM contato WHERE excluido = 0 order by setor");
               
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

                        switch ($linha['setor']) {
                            case 1:
                                $linha['setor'] = 'Comercial';
                                break;
                            case 2:
                                $linha['setor'] = 'Cadastro';
                                break;
                            case 3:
                                $linha['setor'] = 'Recepção';
                                break;
                            case 4:
                                $linha['setor'] = 'Faturamento';
                                break;
                            case 5:
                                $linha['setor'] = 'Tecnologia da Informação';
                                break;
                            case 6:
                                $linha['setor'] = 'Contabilidade';
                                break;
                            case 7:
                                $linha['setor'] = 'Interc./Audit.';
                                break;
                            case 8:
                                $linha['setor'] = 'Diretoria';
                                break;
                            case 9:
                                $linha['setor'] = 'Financeiro';
                                break;
                            case 10:
                                $linha['setor'] = 'Gerência';
                                break;
                            case 11:
                                $linha['setor'] = 'ANS';
                                break;
                            case 12:
                                $linha['setor'] = 'GED';
                                    break; 
                            case 13:
                                $linha['setor'] = 'Outros';
                                    break; 
                        }


                    // nessa sera convertifo o formato de data do sql pro padrao brasileiro
                    $linha['nasc'] = date('d/m/Y', strtotime($linha['nasc']));

                    echo"<tr>";
                    echo "<td> {$linha['nome']} </td> <td> {$linha['setor']} </td>  <td> {$linha['telefone']} </td> <td> {$linha['nasc']} </td>  <td> {$linha['email']} </td><td> {$linha['ip']} </td><td class='noprint'>{$linha['ativo']}</td> <td class='noprint'><a href='/paginas/admin/main.php?pagina=../cadastros/editar_contato&id=".$linha['id']."'><button type='button' class='btn btn-success' style='width: 100px;'>Editar</button></a></td>";
                             
                    echo "</tr>";
                    }
            }
            else{

                echo "<h4 style='margin-top: 100px;'>Não há contatos cadastrados.</h4>";
                echo "<br>";
                echo "<a href='/paginas/admin/main.php?pagina=../../paginas/cadastros/cadastrar_contato'>Para cadastrar um novo contato, clique aqui!</a>";

            }
?>
</div>
</center>