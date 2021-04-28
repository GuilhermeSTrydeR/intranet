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
        include("usuario.class.php");

        $c = new Usuario();

        //include para acessar o banco
        include("../../classes/conexao_bd.php");

        //include para acessar as confguracoes definidas
        include("../../config/config.php");

        global $pdo;

      
        if($_POST['sentido'] == 1){
            $sentidoDaLista = 'SELECT * FROM usuarios ORDER BY id DESC;';
            $nomeBotao = 'Ordenar Sentido Horario';
            
        }

        else{
            $sentidoDaLista = 'SELECT * FROM usuarios;';
            $nomeBotao = 'Ordenar Sentido Anti-Horario';
        }   


        $consulta = $pdo->query($sentidoDaLista);

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
        else{
            ?>
            <h4>Não há nenhum registro.</h4>
            <?php
        }

        ?>

        <div class='hidden'>

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
                <div class="row" style='float: right; margin-right: 100px;'>
                    <div class="col">
                        <button type="submit" style='border: none; background: #ffffff;'>
                            <img src="../../imagens/navbar/updown.png" alt='botao-inverter-lista' title="Inverter Lista">
                        </button> 
                    </div>
   
                    <div class="col">
                        <a href="../usuarios/main.php"><?$_SESSION['nome']?></a>
                        <img src="/imagens/navbar/printer.png" class="hiddenPrint" onClick="window.print()" width="40"  height="40" class="row" alt="imprimir" title="Imprimir">
                    </div>

                </div>
        </form>
        <br>
        <br>
        <table class='table table-striped table-bordered table-condensed table-hover' style='margin-left: 200px; table-layout:fixed; border: 2px solid ##00995D; max-width: 900px; word-wrap: break-word; !important; position: absolute;'>
        <thead>
        <tr>
        <div class='thead'>
        <th style='width: 70px;' scope='col'>ID</th>
        <th style='width: 220px;' scope='col'>Nome</th>
        <th style='width: 200px;' scope='col'>Usuário</th>
        <th style='width: 200px;' scope='col'>Permissão</th>
        <th style='width: 200px;' scope='col'>Setor</th>
        </div>
        </tr>
        </thead>
        <?php
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

            if($linha['excluido'] == 0){
                echo"<tr>";
                echo  " <td> {$linha['id']} </td>  <td> {$linha['nome']}  </td> <td> {$linha['user']} </td> <td> {$linha['permissao']} </td> <td>". $linha['setor'] ."</td>";
                echo"</tr>";
            }
        }
        
        echo"</table>";
        

    ?>
    </div>
</center>
