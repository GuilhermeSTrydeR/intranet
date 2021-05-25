<center style="margin-left: 100px; margin-top: 100px !important; position: relative !important;">
        <style>

        .hiddenBtnXUsuarios{
            display: inline-block !important;
        }
        .hiddenPrint{
            display: inline-block !important;
        }

        </style>

        <h4>Usuarios</h4>
        <?php

        global $pdo;

      
        if($_POST['sentido'] == 0){
            $sentidoDaLista = 'SELECT * FROM usuarios WHERE excluido = 0 ORDER BY id DESC';
            $nomeBotao = 'Ordenar Sentido Horario';
        }

        else{
            $sentidoDaLista = 'SELECT * FROM usuarios WHERE excluido = 0';
            $nomeBotao = 'Ordenar Sentido Anti-Horario';
        }   

    

        $consulta = $pdo->query($sentidoDaLista);
 
        $cont = 0;
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){

            $cont++;

        }

        if($cont > 0){
            ?>

            <!-- esse form serve apenas para inverter a lista -->
            <form method="POST" action="<?php echo $PHP_SELF; ?>">
                <?php
                    if($_POST['sentido'] == 1){
                        $botaoSentido = 0;
                    }
                    else{
                        $botaoSentido = 1;
                    }
                ?>
                    <div class="col-sm-12">
                        <input name='sentido' value=<?php echo $botaoSentido;?> style='display: none;'>
                    </div> 
                    <div class="row" style='float: left; margin-left: 700px; position: absolute;'>
                        <div class="col">
                            <a href="?pagina=../../paginas/cadastros/cadastrar_usuario">
                                <img src="../../imagens/navbar/plus.png" alt='botao-ativar-informativo' title="Novo Usuario">
                                </a>
                        </div>
                        <div class="col">
                            <button type="submit" style='border: none; background: #ffffff;'>
                                <img src="../../imagens/navbar/updown.png" alt='botao-inverter-lista' title="Inverter Sentido da Lista">
                            </button> 
                        </div>
                        <div class="col">
                            <a href="../usuarios/main.php"><?$_SESSION['nome']?></a>
                            <img src="/imagens/navbar/printer.png" class="hiddenPrint" onClick="window.print()" width="50"  height="50" class="row" alt="imprimir" title="Imprimir">
                        </div>
                    </div>
                    
                    <!-- <div class="row" style='float: left; margin-left: 700px; position: fixed;'>
                        <div class="col">
                            <button type="submit" style='border: none; background: #ffffff; '>
                                <img src="../../imagens/navbar/updown.png" alt='botao-inverter-lista' title="Inverter Sentido da Lista">
                            </button> 
                        </div>
                        <div class="col" style='margin-left: 200px'>
                            <a href="../usuarios/main.php"><?$_SESSION['nome']?></a>
                            <img src="/imagens/navbar/printer.png" class="hiddenPrint" onClick="window.print()" width="50"  height="50" class="row" alt="imprimir" title="Imprimir">
                        </div>
                    </div> -->
            </form>
            <br>
            <br>
            <br>
            <table class='table tableInformativo table-striped table-bordered table-condensed table-hover' style='margin-left: 200px; table-layout:fixed; border: 2px solid ##00995D; max-width: 900px; word-wrap: break-word; !important;'>
            <thead>
            <tr>
            <div class='thead'>
            <th style='width: 50px;' scope='col'>ID</th>
            <th style='width: 200px;' scope='col'>Nome</th>
            <th style='width: 150px;' scope='col'>Usuário</th>
            <th style='width: 100px;' scope='col'>Permissão</th>
            <th style='width: 120px;' scope='col'>Setor</th>
            <th style='width: 120px;' scope='col'>Ativo?</th>
            <th class='noprint' style='width: 120px;' scope='col'>Opções</th>
            </div>
            </tr>
            </thead>
            <?php
    
        
            $consulta = $pdo->query($sentidoDaLista);
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                
                //nessa parte verificamos se o status do usuario é diferente de 2, ou seja ele não é temporario
                if($linha['status'] != 2){
                    //caso nao for temporario eh atrelado 'sem limite' mostrando que ele tem acesso vitalicio(sem limite de tempo)
                    $linha['tempo'] = "Sem Limite";
    
                }
                else{
    
                    //caso for temporario, eh somado o tempo atual ao tempo que foi registrado a ele no banco.
                    $linha['tempo'] = (($linha['tempo'] - time()));
    
                    //aqui sao retirados os dias restantes e sao convertidos para inteiro
                    $dias = ($linha['tempo'] / 86400 % 86400);
                    $dias = intval($dias);
    
                    //aqui sao retirados as horas restantes e sao convertidos para inteiro
                    $horas = ($linha['tempo'] / 3600 % 24);
                    $horas = intval($horas);
    
                    //aqui sao retirados os minutos restantes e sao convertidos para inteiro
                    $minutos = ($linha['tempo'] /60 %60);
                    $minutos = intval($minutos);
    
                    //aqui sao retirados os restos da divisao por 60, ou seja, os segundos e convertido para inteiro
                    $segundos = ($linha['tempo'] % 60);
                    $segundos = intval($segundos);
    
                    $diaFinal = ($linha['tempo'] + time());
                    $diaFinal = gmdate("d/m/y á\s\ H:i:s", ($diaFinal + $fusoHorario));
                    
                    //caso o tempo acabe, eh atrelado "tempo esgotado" mostrando que o usuario nao pode mais logar no sistema
                    if($linha['tempo'] <= 0){
    
                        $linha['tempo'] = "Tempo Esgotado";
    
                    }
                    //caso nao tenha acabado o tempo, eh mostrado na tela no formato (M:S) o tempo restante
                    else{
    
                        $linha['tempo'] = ("Tempo restante: " .$dias." dias, ". $horas . ":" . $minutos . ":" . $segundos . " Acesso Garantido até: " . $diaFinal);
    
                    }
                }
    
                //estrutura 'switch case' para printar ao usuario se a conta esta ativa, desativada ou se eh temporaria
                switch ($linha['status']) {
                    case 1:
                        $linha['status'] = 'Ativo';
                        break;
                    case 2:
                        $linha['status'] = 'Temporario';
                        break;
                    case 3:
                        $linha['status'] = 'Desativado';
                        break;
                }
    
                //estrutura 'switch case' para printar ao usuario se a conta eh comum, supervisor ou administrador
                switch ($linha['permissao']) {
                    case 1:
                        $linha['permissao'] = 'Comum';
                        break;
                    case 2:
                        $linha['permissao'] = 'Supervisor';
                        break;
                    case 3:
                        $linha['permissao'] = 'Administrador';
                        break;
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
                    case 12:
                        $linha['setor'] = 'Outros';
                        break;
                }
    
                
                    if($linha['ativo'] == 0){
                        $linha['ativo'] = "<p style='color: red';>Não</p>";
                    }
    
                    elseif($linha['ativo'] == 1){
                        $linha['ativo'] = "<p style='color: green;'>Sim</p>";
                    }
    
                    else{
                        $linha['ativo'] = 'Erro';
                    }
    
              
                    echo  "<td> {$linha['id']} </td>  <td> {$linha['nome']}  </td> <td> {$linha['user']} </td> <td> {$linha['permissao']} </td>  <td>". $linha['setor'] ."</td> <td>". $linha['ativo'] ."</td>";
    
                    ?>
    
                    <td class='noprint'>
                    <a href="/paginas/admin/main.php?pagina=../cadastros/editar_usuario&id=<?php echo $linha['id']?>"><button type='button' class='btn btn-success' style='width: 100px;'>Editar</button></a>
    
                    <br><br>
    
                    
                    </td>
                    <?php
                    echo"</tr>";
                
            }
            
            echo"</table>";

        }
        else{

            echo "<h4>Não há usuarios cadastrados.</h4>";
            echo "<br>";
            echo "<a href='/paginas/admin/main.php?pagina=../../paginas/cadastros/cadastrar_usuario'>Para cadastrar um novo usuario, clique aqui!</a>";
        }
   

    ?>
    </div>
    <div class='row' style='height: 100px;'></div>
</center>
