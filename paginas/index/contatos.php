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

        $consulta = $pdo->query("SELECT * FROM contato WHERE excluido = 0 AND ativo = 1 order by setor");

        
        
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