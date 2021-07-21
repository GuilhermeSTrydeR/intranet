
<center style="margin-left: 150px; margin-top: 20px; !important; position: relative !important;">
    <style>

        a{
            text-decoration: none;
        }
    
    </style>

    <?php


        //include para acessar as confguracoes definidas
        include("acesso.class.php");

        $ac = new Acesso();
        $id = $_GET['id'];
        $nome = $_GET['nome'];

        global $pdo;

        $consulta = $pdo->query("SELECT * FROM acesso WHERE grupo = '$id' AND ativo = 1 AND excluido = 0");
            
        // o contador eh iniciado com zero
        $cont = 0;

        echo "<h4>Grupo: $nome</h4>";
        echo "<a href='/'>";
        echo "<img src='../../imagens/navbar/back.png' alt='botao-voltar' width='40' title='Voltar''>";
        echo "</a>";
        echo "<br><br>";

        echo "<p style='float: left;'>Interno</p>";
        echo "<br>";
        echo "<hr>";


        echo "<div class='row'  style='background: #dfe3ee; max-width: 95%; margin-left: -80px; border-top-right-radius: 35px; border-top-left-radius: 35px; border-bottom-left-radius: 35px;'>";
 
 

        echo "<br>";
        echo "<br>";
        echo "<br>";


            
        // para cada registro no banco a variavel $cont recebera 1 incremento
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
               
            $cont++;
            
        }
  
        if($cont > 0){

            

            $consulta = $pdo->query("SELECT * FROM acesso WHERE grupo = '$id' AND ativo = 1 AND excluido = 0 AND interno = 1");
          
                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        
                    echo "<div style='float: left;' id={$linha['nome']} class='boxItens'>";
                        echo "<a href={$linha['link']} target='_blank'><i class='active'></i><center><p style='white-space: pre-line;
                        width: 100%;
                        overflow: hidden !important;             
                        text-overflow: ellipsis; max-height: 100px;'>{$linha['nome']}</p></center></a>";
                        
                    echo "</div>";
                        
                }
                
                echo "</div>";
            }
            echo "<br>";
            echo "<br>";
            echo "<br>";


            echo "<p style='float: left;'>Externo</p>";
            echo "<br>";
            echo "<hr>";
    
    
            echo "<div class='row'  style='background: #dfe3ee; max-width: 95%; margin-left: -80px; border-top-right-radius: 35px; border-top-left-radius: 35px; border-bottom-left-radius: 35px;'>";
     
     
    
            echo "<br>";
    
    
            echo "<br>";
            echo "<br>";
            echo "<br>";
    
    
                
            // para cada registro no banco a variavel $cont recebera 1 incremento
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                   
                $cont++;
                
            }
      
            if($cont > 0){
    
                
    
                $consulta = $pdo->query("SELECT * FROM acesso WHERE grupo = '$id' AND ativo = 1 AND excluido = 0 AND interno = 0");
              
                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            
                        echo "<div style='float: left;' id={$linha['nome']} class='boxItens'>";
                            echo "<a href={$linha['link']} target='_blank'><i class='active'></i><center><p style='white-space: pre-line;
                            width: 100%;
                            overflow: hidden !important;             
                            text-overflow: ellipsis; max-height: 100px;'>{$linha['nome']}</p></center></a>";
                            
                        echo "</div>";
                            
                    }
                    
                    echo "</div>";
                }
        
        else{

            echo "<br><br><br><br>";
            echo "<h4>Não há acessos cadastrados nesse grupo.</h4>";
            echo "<br>";
            echo "<a href='/paginas/admin/main.php?pagina=../../paginas/cadastros/cadastrar_acesso_unico&id=$id'>Para cadastrar um novo acesso no grupo <b>$nome</b>, clique aqui!</a>";
        
        }  

    ?>
</center>
