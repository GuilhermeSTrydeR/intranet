
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

$ins = new institucional();

$sql = 'SELECT * FROM institucional ORDER BY id DESC;';
$consulta = $pdo->query($sql);

// aqui pegamos a id do usuario logado, para enviar via post para classe responsavel por salvar o clique do botao de confirmacao de leitura
$idUsuario = $_SESSION['id'];



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
<style>

a{text-decoration: none;}

#liInstitucional{
    background: #009b63;
    border-right: 6px solid #F47920;
    color: #ffffff;

}

#liInstitucional b{
    color: #F47920;
}


</style>
<?php


$consulta = $pdo->query("SELECT * FROM institucional WHERE ativo = 1 and excluido = 0 and fim >= CURDATE() or ativo = 1 and excluido = 0 and fim = '0000-00-00' ORDER BY id DESC");
    
// o contador eh iniciado com zero
$cont = 0;

    
// para cada registro no banco a variavel $cont recebera 1 incremento
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  
    $cont++;


}
    // caso cont for maior que zero, ou seja se ha pelo menos um registro no banco que satisfaca a condicao acima, sera mostrado o modal
    if($cont > 0){

        // echo "<div id='root'></div>";
        echo"<div class='container'>";
        echo "<br><br>";
        $consulta = $pdo->query("SELECT * FROM institucional WHERE ativo = 1 and excluido = 0 and fim >= CURDATE() or ativo = 1 and excluido = 0 and fim = '0000-00-00' ORDER BY id DESC");
    


        $i = 0;
        echo "<div>";

        

        ?>
        <center>
 
            <div class="card" style=" width: 45rem; margin-bottom: 45px; border-radius: 40px ; ">
            <div class="card-body" style='border: 2px solid green; background-color: #e6f7b2; color: black; 
                border-bottom-left-radius: 40px ; border-top-left-radius: 40px ; border-top-right-radius: 40px ;' >

            <h5 class="card-text">Institucionais Cadastrados:<b> <?php echo $cont; ?></b></h5>
            <!-- <h5 class="card-text">Institucionais não Lidos:(arrumar)<b> <?php echo $cont; ?></b></h5> -->
      
              <!-- <h5 class="card-title"><?php echo $linha['titulo'];?></h5>
              <p class="card-text">Status:<b> <?php echo $texto; ?></b></p> -->
              <!-- <a href="?pagina=../../classes/institucional/visualizarInstitucionalUnico&id=<?php echo $linha['id'];?>" class="btn btn-primary">ler institucional</a> -->
            </div>
          </div></center>
           
        <?php
           

            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    
                    // aqui pegamos o ID do institucional exibido na tela como uma lista
                    $idInstitucional = $linha['id'];

                    if($ins->retornaInstitucionalLido($idInstitucional) == True){
                   
                        $texto = "<red style='color:green;'>Lido!</red>";
                        // $cor = "#e6f7b2";
                        $fonte = "black";
                        $borda = "2px solid green";
                    }
                    else{
           
                        $texto = "<red style='color:red;'>Não Lido!</red>";
                        // $cor = "white";
                        $fonte = "black";
                        $borda = "2px solid red";
                    }

                    if($linha['ativo'] == 1){
                    ?>
                    <center>


             
                        <div class="card" style="height:10rem; width: 30rem; margin: 25px; border-radius: 40px ; ">
                            <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
                            <div class="card-body" style='color:<?php echo $fonte;?>; background-color: <?php echo $cor;?>; 
                                border-bottom-left-radius: 40px ; border-top-left-radius: 40px ; border-top-right-radius: 40px; border: <?php echo $borda;?>' >
                    
                            <h5 class="card-title"><?php echo $linha['titulo'];?></h5>
                            <p class="card-text">Status:<b> <?php echo $texto; ?></b></p>
                            <a href="?pagina=../../classes/institucional/visualizarInstitucionalUnico&id=<?php echo $linha['id'];?>" class="btn btn-primary">ler institucional</a>
                            </div>
                      </div>
                    </center>
                       
                    <?php
                  
                }
            $i++;
        echo "</div>";
                
        }
        
         
        



    }
    
    else{

        echo "<h4 style='margin-left: 30%; margin-top: 12%'>Não há nenhum institucional ou documento cadastrado</h4>";
       
    }
?>
