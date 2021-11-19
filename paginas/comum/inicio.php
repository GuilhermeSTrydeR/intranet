<center style="margin-left: 30px; ">

    
    <?php

        if(!isset($_SESSION['logado']) || $_SESSION['permissao'] != '1'){
        
            header("Location: /");
        
        }
        
        $dataCadastro = gmdate("YmdHis", time());

    ?>

<center style="margin-left: 100px; margin-top: 50px !important; position: relative !important;">
    <style>

        a{text-decoration: none;}

        #liInicio{
            background: #009b63;
            border-right: 6px solid #F47920;
            color: #ffffff;

        }

        #liInicio b{
            color: #F47920;
        }
        

    </style>

    <?php


        $consulta = $pdo->query("SELECT * FROM acesso_grupo WHERE excluido = 0 AND ativo = 1 AND permissao = 1");
            
        // o contador eh iniciado com zero
        $cont = 0;
            
        // para cada registro no banco a variavel $cont recebera 1 incremento
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
               
            $cont++;
        }
            // caso cont for maior que zero, ou seja se ha pelo menos um registro no banco que satisfaca a condicao acima, sera mostrado o modal
            if($cont > 0){

                // echo "<div id='root'></div>";
 
                $consulta = $pdo->query("SELECT * FROM acesso WHERE excluido = 0 AND ativo = 1 AND permissao = 1");
                
                $numItensLinha = 4;

                $i = 0;
                echo "<div class='row' style='background: #dfe3ee; border-top-right-radius: 35px; border-top-left-radius: 35px; border-bottom-left-radius: 35px; max-width: 95%'>";
                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                        if($linha['ativo'] == 1){

                            echo "<div style='float: left;' id={$linha['nome']} class='boxItens'>";
                                echo "<a href=?pagina=../../classes/acesso/visualizar_acesso_grupo_selecionado&id=" .$linha['id'] . "&nome=" . $linha['nome'] . " ><i class='active'></i><center><p style='white-space: pre-line;
                                width: 100%;
                                overflow: hidden !important;             
                                text-overflow: ellipsis; max-height: 100px;'>{$linha['nome']}</p></center></a>";
                            echo "</div>";
                            
                            $i++;
                        }
                }
                echo "</div>";

  
                 
   


            }
            
            else{

                echo "<h4 style='margin-top: 20%;'>Não há Acessos cadastrados</h4>";
               
            }
            

            
            
        

    ?>
<?php

global $pdo;

// essa variavel recebe o mes atual
$mesAtual = date('m');

// essa consulta eh apenas feita para verificar se ha registros que satisfaçam as condicoes, pois se nao houver, o modal nao ira aparecer
$consulta = $pdo->query("SELECT nome, setor, ativo, excluido, nasc FROM contato WHERE Month(nasc) = '$mesAtual' AND ativo = 1 AND excluido = 0 ORDER BY Day(nasc)");

// o contador eh iniciado com zero
$cont = 0;

// para cada registro no banco a variavel $cont recebera 1 incremento
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
   
    $cont++;
  
}


// caso cont for maior que zero, ou seja se ha pelo menos um registro no banco que satisfaca a condicao acima, sera mostrado o modal
if($cont > 0){


    echo "<div id='modalInicio' style='z-index: 2147483648; height: auto; width: 97%; background: #ffffff 0% 0% no-repeat padding-box; box-shadow: 1px 1px 15px 1px #000000;  border-top-left-radius: 20px; border-top-right-radius: 20px; border-bottom-left-radius: 20px; position: fixed; bottom: 30px; left: 50%; transform: translate(-50%, 0); '>";

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
                $consulta = $pdo->query("SELECT nome, setor, ativo, excluido, nasc FROM contato WHERE Month(nasc) = '$mesAtual' ORDER BY Day(nasc)");
                echo "<table style='margin-top: 15px;'>";

                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    if($linha['ativo'] == 1 && $linha['excluido'] == 0){
                        $linha['nasc'] = date('d/m', strtotime($linha['nasc']));

                                //nessa parte o retorno do banco que retorna o nome completo do usuario logado, vai dividir o nome completo em um array onde cada nome ficara num indice, o fator definido para a divisao eh o espaco (' ')
                                $nome = $linha['nome'];
                                $nome = explode(" ", $nome);
                        
                                //esse bloco condicional ira exibir o nome do usuario com os seguintes temros, caso o usuario tenha cadastrado apenas 1 nome, ele ira entrar na condicao verdadeira e sera exibido o indice 0 (primeiro indice) do array, pois se nao houver essa condicao e tiver apenas 1 nome cadastrado o mesmo iria se repetir, e caso ele tenha cadastrado mais de um nome, sera exibido o primeiro e o ultimo
                                if(count($nome) == 1){
                        
                                    $linha['nome'] = $nome[0];
                            
                                }
                                else{
                                    
                                    $linha['nome'] = $nome[0] . ' ' . end($nome);
                                
                                }

                                switch($linha['setor']) {
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
                                        $linha['setor'] = 'Tecnologia da informação';
                                        break;
                                    case 6:
                                        $linha['setor'] = 'Contabilidade';
                                        break;
                                    case 7:
                                        $linha['setor'] = 'Intercambio / Auditoria';
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

                                echo "<td>";
                                    echo "<div style='margin-left: 35px;'><h5 style='color: #00995D; margin-bottom: -5px;'>{$linha['nome']}</h5><center><text style='color: grey; font-size: 16px;'>{$linha['setor']}</text><h4 style='color: #F47920 !important; margin-top: -5px;'>{$linha['nasc']}</h4></center></div>";
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
<script type="text/javascript" src="../../js/script.js"></script>