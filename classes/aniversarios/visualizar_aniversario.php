<center style="margin-left: 70px; margin-top: 100px !important; position: relative !important;">
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

            $consulta = $pdo->query("SELECT * FROM aniversario WHERE excluido = 0");
            
            // o contador eh iniciado com zero
            $cont = 0;
                
            // para cada registro no banco a variavel $cont recebera 1 incremento
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                   
                $cont++;
    
            }
    
            // caso cont for maior que zero, ou seja se ha pelo menos um registro no banco que satisfaca a condicao acima, sera mostrado o modal
            if($cont > 0){
                //#################################################################################################
// bloco da table dos aniversarios do mes
//#################################################################################################           
            
            // essa consultaeh apenas feita para verificar se ha registros que satisfaçam as condicoes, pois se nao houver, o modal nao ira aparecer
            $consulta = $pdo->query("SELECT * FROM aniversario WHERE excluido = 0 AND Month(nasc) = '$mesAtual' ORDER BY Day(nasc)");
            
            // o contador eh iniciado com zero
            $cont = 0;
            ?>
            <div class="col" style='margin-left: 600px;'>
                            <a href="?pagina=../../paginas/cadastros/cadastrar_aniversario">
                                <img src="../../imagens/navbar/plus.png" alt='botao-ativar-informativo' title="Novo Usuario">
                                </a>
                        </div>
            <?php
            // para cada registro no banco a variavel $cont recebera 1 incremento
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
               
                $cont++;
            
                // caso cont for maior que zero, ou seja se ha pelo menos um registro no banco que satisfaca a condicao acima, sera mostrado o modal
                if($cont > 0){
                
                    echo "<h4>Aniversariantes do Mês de " . $mesAtualSting  . "</h4>";
                    echo "<br>";
                    echo "<table class='tableInformativo table table-striped table-bordered table-condensed table-hover' style='position: relative; table-layout:fixed; border: 2px solid ##00995D; word-wrap: break-word; max-width: 1000px;' id='table'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<div class='thead'>";
                    // echo "<th style='width: 50px;' scope='col'>ID</th>";
                    echo "<th style='width: 140px;' scope='col'>Nome</th>";
                    echo "<th style='width: 70px;' scope='col'>Setor</th>";
                    echo "<th style='width: 50px;' scope='col'>Aniversario</th>";
                    echo "<th style='width: 50px;' scope='col'>Ativo?</th>";
                    echo "<th style='width: 50px;' scope='col' class='noprint'>Opções</th>";
                    echo "</div>";
                    echo "</tr>";
                    echo "</thead>";

                    $consulta = $pdo->query("SELECT * FROM aniversario WHERE excluido = 0 AND Month(nasc) = '$mesAtual' ORDER BY Day(nasc)");
            
                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                     
                        
                            if(isset($linha['nasc']) ){
                                
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
            
                            
                                echo"<tr>";
                                
                                if($linha['ativo'] == 0){
                                    $linha['ativo'] = "<p style='color: red;'>Não</P>";
                                }
                                elseif($linha['ativo'] == 1){
                                    $linha['ativo'] = "<p style='color: green;'>Sim</P>";
                                }
            
                                // nessa parte alem de converter o formato de data do sql pro padrao brasileiro, ainda eh escondido o ano pois nao eh relevante saer o ano de um aniversario
                                $linha['nasc'] = date('d/m', strtotime($linha['nasc']));
                    
                                echo "<td> {$linha['nome']} </td> <td> {$linha['setor']} </td>  <td> {$linha['nasc']} </td><td> {$linha['ativo']} </td> <td class='noprint'><a href='/paginas/admin/main.php?pagina=../cadastros/editar_aniversario&id=".$linha['id']."'><button type='button' class='btn btn-success' style='width: 100px;'>Editar</button></a></td>";
                             
                                echo "</tr>";
                            }
    
                        
                       
                    }
                    
                    echo"</table>";

                
              
                }
            }

//#################################################################################################
// bloco da table dos proximos aniversarios
//#################################################################################################    



    
        // essa condicao determina o mes posterior incrementando a variavel do mes, caso for dezembro(nao ha mes 13) entao o mes recebe janeiro(01)

        // se mes atual menor ou igual a 11, eh incrementado em 1
        if($mesAtual <= 11){

            $mesAtual++;

        }
        // caso o mes for 12, eh resetado para 1
        else{

            $mesAtual = 1;
            
        }

            
        $consulta = $pdo->query("SELECT * FROM aniversario WHERE excluido = 0 AND Month(nasc) = '$mesAtual' ORDER BY Day(nasc)");

        $cont = 0;
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

            $cont++;

        }
        if($cont > 0){

            
            echo "<h4 style='margin-top: 100px;'>Proximos Aniversarios</h4>";
            echo "<br>";
            echo "<table class='tableInformativo table table-striped table-bordered table-condensed table-hover' style='position: relative; table-layout:fixed; border: 2px solid ##00995D; word-wrap: break-word; max-width: 1000px;' id='table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<div class='thead'>";
            echo "<!-- <th style='width: 50px;' scope='col'>ID</th> -->";
            echo "<th style='width: 140px;' scope='col'>Nome</th>";
            echo "<th style='width: 70px;' scope='col'>Setor</th>";
            echo "<th style='width: 50px;' scope='col'>Aniversario</th>";
            echo "<th style='width: 50px;' scope='col'>Ativo?</th>";
            echo "<th style='width: 50px;' scope='col' class='noprint'>Opções</th>";
            echo "</div>";
            echo "</tr>";
            echo "</thead>";


        
            

    

            $consulta = $pdo->query("SELECT * FROM aniversario WHERE Month(nasc) = '$mesAtual' ORDER BY Day(nasc)");
    

            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                if($linha['excluido'] == 0){
                
                    if(isset($linha['nasc']) ){
                        
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

                       
                        echo"<tr>";

                        if($linha['ativo'] == 0){
                            $linha['ativo'] = "<p style='color: red;'>Não</P>";
                        }
                        elseif($linha['ativo'] == 1){
                            $linha['ativo'] = "<p style='color: green;'>Sim</P>";
                        }

                        // nessa parte alem de converter o formato de data do sql pro padrao brasileiro, ainda eh escondido o ano pois nao eh relevante saer o ano de um aniversario
                        $linha['nasc'] = date('d/m', strtotime($linha['nasc']));
            
                        echo "<td> {$linha['nome']} </td> <td> {$linha['setor']} </td>  <td> {$linha['nasc']} </td><td> {$linha['ativo']} </td> <td class='noprint'><a href='/paginas/admin/main.php?pagina=../cadastros/editar_aniversario&id=".$linha['id']."'><button type='button' class='btn btn-success' style='width: 100px;'>Editar</button></a></td>";
                    }

                }
            }
            
            echo"</table>";









        }
    
    
    


//#################################################################################################
// bloco da table de todos os aniversarios
//#################################################################################################    

    // essa consulta eh apenas feita para verificar se ha registros que satisfaçam as condicoes, pois se nao houver, o modal nao ira aparecer
    $consulta = $pdo->query("SELECT * FROM aniversario WHERE excluido = 0 ORDER BY Month(nasc), Day(nasc)");
    
    // o contador eh iniciado com zero
    $cont = 0;
    
    // para cada registro no banco a variavel $cont recebera 1 incremento
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        
        $cont++;
        
    }
    
    // caso cont for maior que zero, ou seja se ha pelo menos um registro no banco que satisfaca a condicao acima, sera mostrado o modal
    if($cont > 0){

        echo "<h4 style='margin-top: 100px; '>Todos os Aniversarios</h4>";
        echo "<br>";
        echo "<table class='tableInformativo table table-striped table-bordered table-condensed table-hover' style='position: relative;  table-layout:fixed; border: 2px solid ##00995D; word-wrap: break-word; max-width: 1000px;' id='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<div class='thead'>";
        echo "<!-- <th style='width: 50px;' scope='col'>ID</th> -->";
        echo "<th style='width: 140px;' scope='col'>Nome</th>";
        echo "<th style='width: 70px;' scope='col'>Setor</th>";
        echo "<th style='width: 50px;' scope='col'>Aniversario</th>";
        echo "<th style='width: 50px;' scope='col'>Ativo?</th>";
        echo "<th style='width: 50px;' scope='col' class='noprint'>Opções</th>";
        echo "</div>";
        echo "</tr>";
        echo "</thead>";

        // a consulta atual sera realizada em todos os aniversarios ordenados por mes e respectivamente o dia 
        $consulta = $pdo->query("SELECT * FROM aniversario ORDER BY Month(nasc), Day(nasc)");
   
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            if($linha['excluido'] == 0){
            
                if(isset($linha['nasc']) ){
                    
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

                  
                    echo"<tr>";

                    if($linha['ativo'] == 0){
                        $linha['ativo'] = "<p style='color: red;'>Não</P>";
                    }
                    elseif($linha['ativo'] == 1){
                        $linha['ativo'] = "<p style='color: green;'>Sim</P>";
                    }
            

                    // nessa parte alem de converter o formato de data do sql pro padrao brasileiro, ainda eh escondido o ano pois nao eh relevante saer o ano de um aniversario
                    $linha['nasc'] = date('d/m', strtotime($linha['nasc']));
        
                    echo "<td> {$linha['nome']} </td> <td> {$linha['setor']} </td>  <td> {$linha['nasc']} </td><td> {$linha['ativo']} </td> <td class='noprint'><a href='/paginas/admin/main.php?pagina=../cadastros/editar_aniversario&id=".$linha['id']."'><button type='button' class='btn btn-success' style='width: 100px;'>Editar</button></a></td>";
                 
                    
                }

                

               
            
       

            }

           
        }

        
        echo"</table>";

    }


        
    }//fim if
    else{

        echo "<h4>Não há aniversarios cadastrados.</h4>";
        echo "<br>";
        echo "<a href='/paginas/admin/main.php?pagina=../../paginas/cadastros/cadastrar_aniversario'>Para cadastrar um novo aniversario, clique aqui!</a>";

    }



?>





 


</center>
<div style='height: 500px;'>



</div>