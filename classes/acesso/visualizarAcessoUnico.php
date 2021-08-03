<!-- tag para centralizar os elementos que estao dentro dela -->
<center style="margin-left: 100px; margin-top: 30px !important; position: relative !important;">

    <style>

        a{
            text-decoration: none;
        }
    
    </style>

    <?php

        //include para acessar o banco
        include("../../classes/conexao_bd.php");

        //include para acessar as confguracoes definidas
        include("../../config/config.php");

        //include para acessar as confguracoes definidas
        include("acesso.class.php");

        $ac = new Acesso();

        $id = $_GET['id'];

        $grupo = $ac->retornaNome($id);

        global $pdo;

        $consulta = $pdo->query("SELECT * FROM acesso WHERE grupo = '$id' AND excluido = 0");
            
        // o contador eh iniciado com zero
        $cont = 0;
            
        // para cada registro no banco a variavel $cont recebera 1 incremento
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
               
            $cont++;
            $nomeGrupo = $ac->retornaNome($linha['grupo']);
            

        }

        
        if($ac->retornaPermissao($id) == 1){
            $permissaoString = '<blue style="color:blue;">Publico</blue>';
        }
        elseif($ac->retornaPermissao($id) == 2){
            $permissaoString = '<red style="color:red;">Restrito</red>';
        }

      

        // caso cont for maior que zero, ou seja se ha pelo menos um registro no banco que satisfaca a condicao acima, sera mostrado o modal
        if($cont > 0){
   
            // nome do grupo, permissao e os botoes de criar um novo acesso nesse grupo e botao de voltar
            echo "<h4>Grupo: ". $nomeGrupo . "</h4>";
            echo "<h4>Permissão de Acesso: ". $permissaoString . "</h4> <br><br><br>";
            echo "<div class='row' style='float: left; margin-left: 700px; margin-top: -50px; position: absolute;'>";

            echo "<div class='col'>";

            echo "<a href='?pagina=../../classes/acesso/visualizar_grupo_acesso'>";
            echo "<img src='../../imagens/navbar/back.png' alt='botao-novo-informativo' width='40' title='Novo Acesso'>";
            echo "</a>";
            
            echo "<a style='margin-left: 100px;' href='?pagina=../../paginas/cadastros/cadastrar_acesso_unico&id=$id'>";
            echo "<img src='../../imagens/navbar/plus.png' alt='botao-novo-informativo' title='Novo Acesso'>";
            echo "</a>";

            // echo "<a href='?pagina=../../paginas/cadastros/cadastrar_grupo_acesso'>";
            // echo "<img src='../../imagens/navbar/plusplus.png' alt='botao-novo-grupo-informativo' title='Novo Grupo de Acessos' width='40' style='margin-left: 40px;'>";
            // echo "</a>";
            echo "</div>";
            echo "</div>";
            echo "<br>";
            echo "<table class='tableInformativo table table-striped table-bordered table-condensed table-hover' style='position: relative;  table-layout:fixed; border: 2px solid ##00995D; word-wrap: break-word; max-width: 1000px;' id='table'>";
            
                echo "<thead>";
                    echo "<tr>";
                        echo "<div class='thead'>";
                            echo "<th style='width: 30px;' scope='col'>Id</th>";
                            echo "<th style='width: 120px;' scope='col'>Nome</th>";
                            echo "<th style='width: 80px;' scope='col'>Permissão</th>";
                            echo "<th style='width: 120px;' scope='col'>Link</th>";
                            echo "<th style='width: 100px;' scope='col'>Grupo</th>";
                            echo "<th style='width: 90px;' scope='col'>Ativo</th>";
                            echo "<th style='width: 90px;' scope='col'>Interno?</th>";
                            echo "<th style='width: 210px;' scope='col'>Opções</th>";
                        echo "</div>";
                    echo "</tr>";
                echo "</thead>";
        
                $consulta = $pdo->query("SELECT * FROM acesso WHERE grupo = '$id' AND excluido = 0");
        
                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

                    if($linha['interno'] == 0){

                        $internoString = "Não";
            
                    }
                    elseif($linha['interno'] == 1){
            
                        $internoString = "Sim";
            
                    }
            


                    $linha['grupo'] = $ac->retornaNome($linha['grupo']);

                    if($linha['ativo'] == 0){
                        $linha['ativo'] = "<p style='color: red';>Não</p>";
                    }

                    elseif($linha['ativo'] == 1){
                        $linha['ativo'] = "<p style='color: green;'>Sim</p>";
                    }

                    else{
                        $linha['ativo'] = 'Erro';
                    }

                    if($linha['permissao'] == 1){

                        $linha['permissao'] = "Publico";
    
                    }
    
                    elseif($linha['permissao'] == 2 ){
    
                        $linha['permissao'] = "Restrito";
    
                    }
    
                    else{
    
                        $linha['permissao'] = "Sem permissão";
    
                    }


                    echo"<tr>";
                    echo "<td> {$linha['id']} </td> <td> {$linha['nome']} </td> <td> {$linha['permissao']} </td> <td> {$linha['link']} </td> <td> {$linha['grupo']} </td>  <td> {$linha['ativo']}</td> <td> {$internoString}</td>";

                    ?>

                    <td class='noprint'>
                
                        <a href="/paginas/admin/main.php?pagina=../cadastros/editar_acesso&idGrupo=<?php echo $id; ?>&id=<?php echo $linha['id']?>"><button type='button' class='btn btn-success' style='width: 100px;'>Editar</button></a>

                        <a href="<?php echo $linha['link']?>" target='_blank'><button type='button' class='btn btn-primary' style='width: 100px;'>Visualizar</button></a>

                        <br><br>

                        <a href="../../classes/acesso/apagarAcesso.php?id=<?php echo $linha['id']; ?>&idGrupo=<?php echo $id;?>"><button type='button' class='btn btn-danger-red' style='width: 100px;'>Excluir</button></a>

                        <?php
                            if($ac->retornaAtivo($linha['id']) == 1){
                        ?>
                                    <a href="../../classes/acesso/desabilitarAcessoUnico.php?id=<?php echo $linha['id']; ?>&idGrupo=<?php echo $id;?>" ><button type='button' class='btn btn-danger' style='width: 100px;'>Desativar</button></a>
                        <?php
                            }
                            else{
                        ?>
                                    <a href="../../classes/acesso/habilitarAcessoUnico.php?id=<?php echo $linha['id']; ?>&idGrupo=<?php echo $id;?>"><button type='button' class='btn btn-danger' style='width: 100px;'>Ativar</button></a>
                        <?php
                            }
                        ?> 

                    </td>
            
                

                <?php


                echo"</tr>";

            
                    

                
                }
        
                
            
            echo"</table>";

        }
        else{

            echo "<h4>Não há acessos cadastrados nesse grupo.</h4>";
            echo "<br>";
            echo "<a href='/paginas/admin/main.php?pagina=../../paginas/cadastros/cadastrar_acesso_unico&id=$id'>Para cadastrar um novo acesso no grupo <b>$grupo</b>, clique aqui!</a>";
        }
   
            

    ?>
</center>
