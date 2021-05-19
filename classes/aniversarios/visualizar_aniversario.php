<?php
session_start();
?>
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

        //include para acessar o banco
        include("../../classes/conexao_bd.php");

        //include para acessar as confguracoes definidas
        include("../../config/config.php");

        // include da classe informativo
        include("Aniversario.class.php");

        $a = new Aniversario();

        global $pdo;
          
        // nessa variavel eh atribuido o mes atual para ser exibido apenas os aniversariantes do mes ativos e nao excluidos
        $mesAtual = date('m');

        switch($mesAtual) {
            case 1:
                $mesAtualSting = 'Janeiro';
                break;
            case 2:
                $mesAtualSting = 'Fevereiro';
                break;
            case 3:
                $mesAtualSting = 'Março';
                break;
            case 4:
                $mesAtualSting = 'Abril';
                break;
            case 5:
                $mesAtualSting = 'Maio';
                break;
            case 6:
                $mesAtualSting = 'Junho';
                break;
            case 7:
                $mesAtualSting = 'Julho';
                break;
            case 8:
                $mesAtualSting = 'Agosto';
                break;
            case 9:
                $mesAtualSting = 'Setembro';
                break;
            case 10:
                $mesAtualSting = 'Outubro';
                break;
            case 11:
                $mesAtualSting = 'Novembro';
                break;
            case 12:
                $mesAtualSting = 'Dezembro';
                break;
          
            }

        ?>
        <h4>Aniversariantes do Mês de <?php echo $mesAtualSting; ?></h4>
        <br>
        <table class='tableInformativo table table-striped table-bordered table-condensed table-hover' style='margin-left: 15%; table-layout:fixed; border: 2px solid ##00995D; word-wrap: break-word; max-width: 900px;' id='table'>
        <thead>
        <tr>
        <div class='thead'>
        <!-- <th style='width: 50px;' scope='col'>ID</th> -->
        <th style='width: 180px;' scope='col'>Nome</th>
        <th style='width: 70px;' scope='col'>Setor</th>
        <th style='width: 50px;' scope='col'>Aniversario</th>
        </div>
        </tr>
        </thead>


        <?php
      
        $consulta = $pdo->query("SELECT nome, setor, ativo, excluido, nasc FROM usuarios WHERE Month(nasc) = '$mesAtual' ORDER BY Day(nasc)");
   

        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            if($linha['excluido'] == 0){
            
                if($linha['ativo'] == 1 && isset($linha['nasc']) ){
                    
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
                        case 12:
                            $linha['setor'] = 'Outros';
                            break;
                    
           
                        }

                    $linha['ativo'] = "<p style='color: green;'>Sim</p>";
                    echo"<tr>";
            

                    // nessa parte alem de converter o formato de data do sql pro padrao brasileiro, ainda eh escondido o ano pois nao eh relevante saer o ano de um aniversario
                    $linha['nasc'] = date('d/m', strtotime($linha['nasc']));
        
                    echo " <td> {$linha['nome']} </td> <td> {$linha['setor']} </td>  <td> {$linha['nasc']}  </td>";
                    ?>
        
                    <?php
                    echo "</td></tr>";
                }

   



            
       

            }
        }
        
        echo"</table>";
        
        ?>
      
        <h4 style='margin-top: 275px;'>Proximos Aniversarios</h4>
        <br>
        <table class='tableInformativo table table-striped table-bordered table-condensed table-hover' style='margin-left: 15%; table-layout:fixed; border: 2px solid ##00995D; word-wrap: break-word; max-width: 900px;' id='table'>
        <thead>
        <tr>
        <div class='thead'>
        <!-- <th style='width: 50px;' scope='col'>ID</th> -->
        <th style='width: 180px;' scope='col'>Nome</th>
        <th style='width: 70px;' scope='col'>Setor</th>
        <th style='width: 50px;' scope='col'>Aniversario</th>
        </div>
        </tr>
        </thead>


        <?php
        

        // essa condicao determina o mes posterior incrementando a variavel do mes, caso for dezembro(nao ha mes 13) entao o mes recebe janeiro(01)

        // se mes atual menor ou igual a 11, eh incrementado em 1
        if($mesAtual <= 11){

            $mesAtual++;

        }
        // caso o mes for 12, eh resetado para 1
        else{

            $mesAtual = 1;
            
        }


        $consulta = $pdo->query("SELECT nome, setor, ativo, excluido, nasc FROM usuarios WHERE Month(nasc) = '$mesAtual' ORDER BY Day(nasc)");
   

        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            if($linha['excluido'] == 0){
            
                if($linha['ativo'] == 1 && isset($linha['nasc']) ){
                    
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
                        case 12:
                            $linha['setor'] = 'Outros';
                            break;
                    
           
                        }

                    $linha['ativo'] = "<p style='color: green;'>Sim</p>";
                    echo"<tr>";
            

                    // nessa parte alem de converter o formato de data do sql pro padrao brasileiro, ainda eh escondido o ano pois nao eh relevante saer o ano de um aniversario
                    $linha['nasc'] = date('d/m', strtotime($linha['nasc']));
        
                    echo " <td> {$linha['nome']} </td> <td> {$linha['setor']} </td>  <td> {$linha['nasc']}  </td>";
                    ?>
        
                    <?php
                    echo "</td></tr>";
                }

            }
        }
        
        echo"</table>";

     
?>

    <h4 style='margin-top: 175px; '>Todos os Aniversarios</h4>
        <br>
        <table class='tableInformativo table table-striped table-bordered table-condensed table-hover' style='margin-left: 15%;  table-layout:fixed; border: 2px solid ##00995D; word-wrap: break-word; max-width: 900px;' id='table'>
        <thead>
        <tr>
        <div class='thead'>
        <!-- <th style='width: 50px;' scope='col'>ID</th> -->
        <th style='width: 180px;' scope='col'>Nome</th>
        <th style='width: 70px;' scope='col'>Setor</th>
        <th style='width: 50px;' scope='col'>Aniversario</th>
        </div>
        </tr>
        </thead>


        <?php
        
    
  
        // a consulta atual sera realizada em todos os aniversarios ordenados por mes e respectivamente o dia 
        $consulta = $pdo->query("SELECT nome, setor, ativo, excluido, nasc FROM usuarios ORDER BY Month(nasc), Day(nasc)");
   

        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            if($linha['excluido'] == 0){
            
                if($linha['ativo'] == 1 && isset($linha['nasc']) ){
                    
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
                        case 12:
                            $linha['setor'] = 'Outros';
                            break;
                    
           
                    }

                    $linha['ativo'] = "<p style='color: green;'>Sim</p>";
                    echo"<tr>";
            

                    // nessa parte alem de converter o formato de data do sql pro padrao brasileiro, ainda eh escondido o ano pois nao eh relevante saer o ano de um aniversario
                    $linha['nasc'] = date('d/m', strtotime($linha['nasc']));
        
                    echo " <td> {$linha['nome']} </td> <td> {$linha['setor']} </td>  <td> {$linha['nasc']}  </td>";
                
   
                    
                    echo "</td></tr>";
                 
                    
                }

                

               
            
       

            }

           
        }

        
        echo"</table>";

    

       

     
?>





 


</center>
<div style='height: 500px;'>



</div>