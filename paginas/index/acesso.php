<?php


    require ('classes/acesso/acesso.class.php');
    $ac = new Acesso();
    



?>

<center style="margin-top: 20px !important; position: relative !important;">
    <style>

        a{text-decoration: none;}
    
    </style>

    <?php

//essa primeira consulta serve apenas para verificar se há registros no banco, se não houver, o cabecalho nao eh montado, isso evita mostrar um cabecalho sem informacao nenhuma 
$consulta = $pdo->query("SELECT * FROM acesso_grupo WHERE excluido = 0 AND ativo = 1 AND permissao = 1");
            
// o contador eh iniciado com zero
$cont = 0;
    
// para cada registro no banco a variavel $cont recebera 1 incremento
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
       
    $cont++;
}
    // caso cont for maior que zero, ou seja se ha pelo menos um registro no banco que satisfaca a condicao acima, sera mostrado o cabecalho, caso contrario, nem o cabecalho sera exibido
    if($cont > 0){
        
        echo"<div class='container'>";
        echo"<h4 style='float: left;'>Interno</h4>";
        echo"<br>";
        echo"<hr>";

        $consulta = $pdo->query("SELECT * FROM acesso WHERE excluido = 0 AND ativo = 1  AND permissao = 1 AND interno = 1");
        
        //teste ainda nao funcional de responsividade, tentei colocar um numerador maximo para os itens em linha
        $numItensLinha = 4;
        $i = 0;

        echo "<div class='row' style='background: #dfe3ee; border-top-right-radius: 35px; border-top-left-radius: 35px; border-bottom-left-radius: 35px;'>";
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                if($linha['ativo'] == 1){

                    echo "<div style='float: left;' id={$linha['nome']} class='boxItens'>";
                        echo "<a href=" . $linha['link'] . " target=_blank><i class='active'></i><center><p style='white-space: pre-line;
                        width: 100%;
                        overflow: hidden !important;             
                        text-overflow: ellipsis; max-height: 100px;'>{$linha['nome']}</p></center></a>";
                    echo "</div>";
                    
                    $i++;
                }
              
        }

        echo "</div>";

        echo "<br>";
        echo "<br>";
 
        echo"<h4 style='float: left;'>Externo</h4>";
        echo"<br>";
        echo"<hr>";

        //nessa parte sera listado todos os acessos publicos ordenados pelo seu grupo, ou seja serao agrupados
        $consulta = $pdo->query("SELECT * FROM acesso WHERE excluido = 0 AND ativo = 1  AND permissao = 1 AND interno = 0 ORDER BY grupo");
        
        $numItensLinha = 4;

        $i = 0;
        echo "<div class='row' style='background: #dfe3ee; border-top-right-radius: 35px; border-top-left-radius: 35px; border-bottom-left-radius: 35px;'>";
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                if($linha['ativo'] == 1){

                    echo "<div style='float: left;' id={$linha['nome']} class='boxItens'>";
                        echo "<a href=" . $linha['link'] . " target=_blank><i class='active'></i><center><p style='white-space: pre-line;
                        width: 100%;
                        overflow: hidden !important;             
                        text-overflow: ellipsis; max-height: 100px;'>{$linha['nome']}</p></center></a>";
                    echo "</div>";
                    
                    $i++;
                }
 
        }
        echo "</div>";

    }
    
    //caso aquele primeiro while nao retorne nenhum registro, essa mensagem abaixo sera exibida ao usuario
    else{

        echo "<h4 style='margin-top: 20%;'>Não há Acessos cadastrados</h4>";
       
    }
    

    
    

    ?>



























<!-- <div class='container' style='margin-left: 30px; margin-top: 30px;'>
    <div class='row'>
        <div style="float: left" id='segundaviaboleto' class='boxItens'>
            <a href="http://unimedtc.coop.br/boleto" target="_blank"><i class="active"></i><center><p>2ª Via de Boletos</p></center></a>
        </div>
        <div style="float: left" id='asc' class='boxItens'>
            <a href="?pagina=/index/asc" type="button" onclick="Mudarestado('divAsc')"><i class="active"></i><center><p>ASC</p></center></a>
        </div>
        <div style="float: left" id='hillum' class='boxItens'>
            <a href=<?php echo $local_server_web . ":8083"?> target="_blank"><i class="active"></i><center><p>Hillum</p></center></a>
        </div>
        <div style="float: left" id='relatorio' class='boxItens'>
            <a href=<?php echo $local_server_bd . "/Relatorio";?>target="_blank"><i class="active"></i><center><p>Relatorio</p></center></a>
        </div>
    <div class='row'>
        <div style="float: left" id='giu' class='boxItens'>
            <a href="https://giu.unimed.coop.br/login" target="_blank"><i class="active"></i><center><p>GIU</p></center></a>
        </div>
        <div style="float: left" id='glpi' class='boxItens'>
            <a href="https://unimedtc.coop.br/TI" target="_blank"><i class="active"></i><center><p>GLPI</p></center></a>
        </div>
        <div style="float: left" id='report_service' class='boxItens'>
            <a href=<?php echo $local_server_bd . "/Relatorio";?>  target="_blank"><i class="active"></i><center><p>Report<br>Servcice</p></center></a>
        </div>
        <div style="float: left" id='stel' class='boxItens'>
            <a href="?pagina=/index/impressoras"><i class="active"></i><center><p>Impressoras</p></center></a>
        </div>
    </div>
    <div class='row'>
        <div style="float: left" id='unimedtc' class='boxItens'>
            <a href="https://www.unimed.coop.br/web/trescoracoes" target="_blank"><i class="active"></i><center><p>Unimed Três Corações</p></center></a>
        </div>
        <div style="float: left" id='cartaquitacao' class='boxItens'>
            <a href="https://unimedtc.coop.br/cartaquitacao/index.php" target="_blank"><i class="active"></i><center><p>Carta<br>Quitação</p></center></a>
        </div>
        <div style="float: left" id='stel' class='boxItens'>
            <a href="https://stelremoto.ddns.net:23443/portal/login.php" target="_blank"><i class="active"></i><center><p>STEL</p></center></a>
        </div>
        <!-- <div style="float: left" id='stel' class='boxItens'>
            <a href="file://192.168.0.212/arquivoscardio/ArquivosCardio/Aplicativos/" target="_blank"><i class="active"></i><center><p>Arquivos</p></center></a>
        </div> 
    </div>