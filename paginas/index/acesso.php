<?php
    session_start();
?>
<center style="margin-left: 40px; margin-top: 50px !important; position: relative !important;">
    <style>

        a{text-decoration: none;}
    
    </style>

    <?php

        //include para acessar o banco
        include("../../classes/conexao_bd.php");

        //include para acessar as confguracoes definidas
        include("../../config/config.php");

        global $pdo;

        $consulta = $pdo->query("SELECT * FROM acesso WHERE excluido = 0 AND ativo = 1");
            
        // o contador eh iniciado com zero
        $cont = 0;
            
        // para cada registro no banco a variavel $cont recebera 1 incremento
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
               
            $cont++;
        }
            // caso cont for maior que zero, ou seja se ha pelo menos um registro no banco que satisfaca a condicao acima, sera mostrado o modal
            if($cont > 0){


             


                
                echo"<div class='container'>";
        
                $consulta = $pdo->query("SELECT * FROM acesso WHERE excluido = 0 AND ativo = 1");
                
                $numItensLinha = 4;

                $i = 0;
                echo "<div class='row'>";
                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

                        echo "<div style='float: left' id={$linha['nome']} class='boxItens'>";
                            echo "<a href={$linha['link']} target='_blank'><i class='active'></i><center><p>{$linha['nome']}</p></center></a>";
                        echo "</div>";
                        
                        $i++;

              
         
                }
                echo "</div>";

            }
            
            else{

                echo "<h4>Não há Acessos cadastrados</h4>";
               
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