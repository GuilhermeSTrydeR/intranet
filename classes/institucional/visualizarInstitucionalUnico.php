<!-- para resolver alguns problemas de visualizacao do institucional eu utilizei o sistema de grid do bootstrap -->

<style>

    body{

        background: #f0f2f8;
    }

</style>

<?php

    include("../../classes/conexao_bd.php");

    //include para acessar as confguracoes definidas
    include("../../config/config.php");

    // include da classe mural
    include("../../classes/institucional/institucional.class.php");

    // $i = new mural();
    global $pdo;

    $i = new institucional();

    $sql = 'SELECT * FROM institucional ORDER BY id DESC;';
    $consulta = $pdo->query($sql);

    // aqui pegamos a id do usuario logado, para enviar via post para classe responsavel por salvar o clique do botao de confirmacao de leitura
    $idUsuario = $_SESSION['id'];

    //aqui pegamos a id do institucional
    $id = $_GET['id'];

    // condicao estatica para resolver o problema de exibir as bordas da div sem ter informacoes dentro(porem ainda precisar integrar essa funcao a saida real) 
    if(isset($consulta)){
        ?>
        <style>
            .hidden{
                display: block !important;
            }
        </style>
        <?php
    }
        ?>


    <div class='infoContainer' style='background-color: white; box-shadow: 10px; background-color: #ffffff;  border-top-left-radius: 40px; border-top-right-radius: 40px; border-bottom-left-radius: 40px; table-layout:fixed;  max-width: 1100px; word-wrap: break-word; !important; margin-left: 150px; margin-top: 50px; padding: 20px;'>
        <!-- linha referente a data de publicacao -->
        <div class="row">
            <div class="col">
                <?php
                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                        if($linha['id'] == $id){
                            $linha['dataCadastro'] = gmdate("d/m/y á\s\ H:i", $linha['dataCadastro']);
                            echo "<td><br><b><p class='laranja'>Publicado em: {$linha['dataCadastro']}</p></b><h3>";
                ?>    
            </div>
        </div>
        <br>
        <!-- linha referente ao titulo -->
        <div class="row">
            <div class="col-md-5 offset-md-3">
                <center>
                    <?php
                        echo "<h3 class='verde'>{$linha['titulo']}</h3>";
                    ?>
                </center>
            </div>
        </div>
        <br>
        <!-- linha referente ao corpo do texto -->
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <center>
                    <?php
                        echo nl2br("<td><p id='texto' style='width: 100%;'>{$linha['texto']}</p></td>");
                    ?>
                </center>
            </div>
        </div>
        <br>
        <!-- linha referente a imagem -->
        <div class="row">
            <div class="col-md-1 offset-md-1">
                <center>
                    <?php
                        echo "<a href='" . $linha['imagem'] ."' target='_blank'><img onMouseOver='aumenta(this)' onMouseOut='diminui(this)' class='imagem' style='max-width: 800px; ' src='" . $linha['imagem'] ."'></img></a>";
                    ?>
                </center>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-8 offset-md-6">
                    <style>
                        .hidden{
                            display: none !important;
                        }
                    </style>
                    <?php
                        // aqui pegamos o id do ususario logado apartir da session e a id desse institucional para entao enviar por POST para a classe responsavel por salvar no  banco
                        $idInstitucional = $id;
                        echo "<form action='../../classes/institucional/gravarInstitucionalUsuario.php' method='POST'>";
                            echo "<input type='text' class='hidden' readonly name='idUsuario' value='$idUsuario'>";
                            
                            echo"<input type='text' class='hidden' readonly name='idInstitucional' value='$idInstitucional'>"; 
                                
                            if($i->retornaInstitucionalLido($idInstitucional) == 0){
                                echo "<div class='row'>";
                                    echo "<div class='col-md-4 offset-md-14'>";
                                        echo "<button type='submit' class='btn btn-success'>Marcar como lido</button>";
                                    echo "</div>";
                          
                            }
                     
                                echo "<div class='col-md-2 offset-md-1'>";
                                    echo "<a style='color: white !important' href='?pagina=../institucional/inicio' class='btn btn-danger'>Voltar</a>";
                                echo "</div>";

                            echo "</div>";
                        echo "</form>";
                        }
                    }
                    ?>
            </div>
        </div>
    </div>
<script>

    alert("###################################\n\nLEIA COM ATENÇÃO ESSE DOCUMENTO INSTITUCIONAL! \nassim que terminar aperte no botão 'Lido' abaixo do documento para confirmar sua ação!\n\n###################################");

</script>