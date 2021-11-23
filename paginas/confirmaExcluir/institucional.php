<?php   
        //requer classe de conexao do banco
        require("../../classes/conexao_bd.php");
        require("../../classes/institucional/institucional.class.php");

        $id = $_GET['id'];
        
        //aqui instanciamos a classe
        $i = new institucional();
        $tituloInstitucional = $i->retornaTitulo($id);
        $dataInstitucional = $i->retornaData($id);
        // $dataInstitucional = gmdate("d/m/y \á\s\ H:i:s", ($dataInstitucional));
        
?>  
<center>
    <div style="background: #f0f2f8; padding: 10px; width: 70%; margin-left: 50px; margin-top: 10%; border-top-left-radius: 20px;  border-top-right-radius: 20px;  border-bottom-left-radius: 20px;">
        <h2>
            Tem certeza que deseja excluir o mural selecionado? 
    
        </h2>
<br><br>
        <h4>
          Titulo: <?php echo $tituloInstitucional; ?> 
          <br>
          Data: <?php echo $dataInstitucional
; ?> 
        </h4>
        <br><br>
        <h4 style='color: red !important;'>
            Após excluido, não será possivel recupera-lo.
        </h4>
        <br><br>
        <a href="?pagina=../../classes/institucional/visualizar_institucional"><button type='button' class='btn btn-primary' style='width: 100px;'>Não</button></a>

        <a href="../../../classes/institucional/apagarInstitucional.php?id=<?php echo $id; ?>"><button type='button' class='btn btn-danger' style='margin-left: 50px; width: 100px;'>Sim</button></a>
    </div>
</center>
