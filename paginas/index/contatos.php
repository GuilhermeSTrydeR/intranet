<?php
    require ('classes/contato/Contato.class.php');
    $c = new Contato();

    $consulta = $pdo->query("SELECT * FROM contato WHERE excluido = 0 AND ativo = 1");
    
    $cont = 0;
    
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
       
        $cont++;
    }

    // caso cont for maior que zero, ou seja se ha pelo menos um registro no banco que satisfaca a condicao acima, sera mostrado o cabecalho, caso contrario, nem o cabecalho sera exibido
    if($cont > 0){

        $consulta = $pdo->query("SELECT * FROM contato WHERE excluido = 0 AND ativo = 1 order by nome");

        
        
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

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
            
        
                //nessa parte o retorno da funcao 'nome' que retorna o nome completo do usuario logado, vai dividir o nome completo em um array onde cada nome ficara num indice, o fator definido para a divisao eh o espaco (' ')
                $nome = $linha['nome'];
                $nome = explode(" ", $nome);
        
                //esse bloco condicional ira exibir o nome do usuario com os seguintes temros, caso o usuario tenha cadastrado apenas 1 nome, ele ira entrar na condicao verdadeira e sera exibido o indice 0 (primeiro indice) do array, pois se nao houver essa condicao e tiver apenas 1 nome cadastrado o mesmo iria se repetir, e caso ele tenha cadastrado mais de um nome, sera exibido o primeiro e o ultimo
                if(count($nome) == 1){
                    ?>
                    <a style='color: white !important; ' href="?pagina=../cadastros/editar_configuracoes"> <?php $linha['nome'] = $nome[0]?></a>
                    <?php
                }
                else{
                    ?>
                        <a style='color: white !important; ' href="?pagina=../cadastros/editar_configuracoes"> <?php $linha['nome'] = $nome[0] . ' ' . end($nome) ?></a>
                    <?php
                }
                
                
            echo "<center style='margin-left: 50px; margin-top: 50px;'>";
                    
            echo "<div style='float: left;' class='boxItensContato'>";
            
            echo "<i class='active'></i><p style='white-space: pre-line;
            width: 100%;
            overflow: hidden !important;             
            word-break: break-word; max-height: 100px;'><b>{$linha['nome']}</b></p>";
            
            echo "<i class='active'></i><p style='white-space: pre-line;
            width: 100%;
            overflow: hidden !important;             
            text-overflow: ellipsis; max-height: 100px;'>{$linha['setor']}</p>";

            echo "<i class='active'></i><p style='white-space: pre-line;
            width: 100%;
            overflow: hidden !important;             
            word-break: break-all; max-height: 100px;'>{$linha['telefone']}</p>";

            echo "<i class='active'></i><p style='white-space: pre-line;
            width: 100%;
            overflow: hidden !important;             
            word-break: break-all; max-height: 100px;'>{$linha['email']}</p>";

            echo "</div>";

            echo "</center>";
        }
        
    }
    else{


    }


    
?>