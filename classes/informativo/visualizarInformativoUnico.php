<center style='margin: 15px;'>

    <?php

        include("../../classes/conexao_bd.php");

        //include para acessar as confguracoes definidas
        include("../../config/config.php");

        // include da classe informativo
        include("../../classes/informativo/informativo.class.php");

        // $i = new Informativo();
        global $pdo;

        $sql = 'SELECT * FROM informativo ORDER BY id DESC;';
        $consulta = $pdo->query($sql);



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

<div class="row" style='float: left; margin-left: 400px; position: absolute;'>
        <div class='col'>
   
        <img src="/imagens/navbar/printer.png"  onClick="window.print()" width="50"  height="50" class="row" alt="imprimir" style='margin-left: 600px; margin-top: 50px;' title="Imprimir">

        </div>

</div>
<div class='noprint' style='height: 100px;'></div>

        <?php

        $id = $_GET['id'];

        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            if($linha['id'] == $id){


            echo "<div class='mural'>";
            
            echo "<center>";  
            echo "<table id='tblInfUnico'>";
        
          
            $linha['dataCadastro'] = gmdate("d/m/y á\s\ H:i", $linha['dataCadastro']);

            
      
            echo "<tr>";    
            echo "<td ><br><center><b><p >Publicado em: {$linha['dataCadastro']}</p></b></center><br><br><center><h3> {$linha['titulo']}</h3><br></center> </td>";
            echo "</tr>";
            
            echo "<tr>";
       
            echo "<br>";
            echo nl2br("<td><p id='texto'>{$linha['texto']}</p></td>");

            echo "</tr>";

                echo "<tr>";
                echo "<td>";
                echo "<center>";
                echo "<img id='img' onMouseOver='aumenta(this)' onMouseOut='diminui(this)' src='" . $linha['imagem'] ."'></img>";
                echo"<div class='row' style='height: 100px;'></div>";
                echo "</center>";
                echo "</td>";
                echo "</tr>";
                echo "</div>";
  
                
            
            echo"</table>";
            

            }
            
         
         
        }
        

    ?>



<div class='row' style='height: 100px;'></div>

</center>