<center style='margin: 15px;'>

    <?php
        $cont = 0;

        global $pdo;

        $sql = "SELECT * FROM mural  WHERE ativo = 1 and excluido = 0 and fim >= CURDATE() or ativo = 1 and excluido = 0 and fim = '0000-00-00'";
        $consulta = $pdo->query($sql);

        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
   
            $cont++;
          
        }

        if($cont > 0){


            $sql = "SELECT * FROM mural ORDER BY id DESC";
            $consulta = $pdo->query($sql);
    
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

                // if((($linha['inicio'] <= date('Y-m-d') && $linha['fim'] >= date('Y-m-d')) || $linha['inicio'] <= '0000-00-00' && $linha['fim'] == '0000-00-00' || $linha['fim'] == null) || $linha['inicio'] <= date('Y-m-d')){

                if($linha['ativo'] == 1 && $linha['excluido'] == 0){
                        if((($linha['inicio'] <= date('Y-m-d') || $linha['inicio'] == '0000-00-00' ||   $linha['inicio'] == null) && ($linha['fim'] >= date('Y-m-d') || $linha['fim'] == '0000-00-00' || $linha['fim'] == null))){

                    
                        echo "<div class='mural' >";
                   
                        echo "<center>";  
                        
                        echo "<table class='tableMural' style='background-color: #ffffff;   border-top-left-radius: 40px; border-top-right-radius: 40px; border-bottom-left-radius: 40px; ' table-layout:fixed;  max-width: 900px; word-wrap: break-word; !important;'>";
                    
                        $linha['dataCadastro'] = gmdate("d/m/y á\s\ H:i", $linha['dataCadastro']);
                
                        echo "<tr>";
                        echo "<td style='border: none; max-width: 500px;'><br><center><b><p style='float: left; margin-left: -300px; color: #F47920;'>Publicado em: {$linha['dataCadastro']}</p></b></center><br><br><center><h3 style='color: #009b63; word-wrap: break-word; max-width: 1000px;'> {$linha['titulo']}</h3></center> </td>";
                        echo "</tr>";

                        echo "<tr>";
                        
                        echo nl2br("<td style='border: none;'><p style='word-wrap: break-word; max-width: 1000px; padding: 15px; margin-left: 50px; color: black !important;'>{$linha['texto']}</p></td>");

                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>";
                                echo "<center>";
                                    echo "<a href='" . $linha['imagem'] ."' target='_blank'><img onMouseOver='aumenta(this)' onMouseOut='diminui(this)' class='imagem' style='max-width: 800px; ' src='" . $linha['imagem'] ."'></img></a>";
                                    echo"<br>";

                                    // sera exibido o link para download apenas se houver uma imagem na variavel
                                    if(isset($linha['imagem'])){
                                        echo "<a id='linkImagem' href='../../" . $linha['imagem'] ."' download>Baixar Imagem</a>";
                                    }
                                    // esse echo define o espacamento do mural dentro do mural de fundo branco
                                    echo"<div class='row' style='height: 50px;'></div>";
                                echo "</center>";
                            echo "</td>";
                        echo "</tr>";

                        echo"</div>";
            
                        echo"<div class='print' style='border-bottom: 1px dotted black; margin: 20px;'></div>";


                        echo"</table>";
                        echo '<br>';
                        
                        echo"<div class='row' style='height: 50px;'></div>";

                      
                }

            

            }
                
            }
        }
        else{
            echo "<img  src='../../imagens/unimed/logo_unimed_tc.png' height='300' style='margin-top: 75px;' alt='logo_unimed'>";
        }



    ?>


<div style='height: 140px;'>

</div>

</center>



</div>







