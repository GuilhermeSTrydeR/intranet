<?php   
    //requer classe de conexao do banco
    require("../../classes/conexao_bd.php");


  

    $id = $_GET['id'];

    $nome = $u->retornaNome($id);
    
?>  



<center>
    <div style="background: #f0f2f8; padding: 10px; width: 70%; margin-left: 50px; margin-top: 10%; border-top-left-radius: 20px;  border-top-right-radius: 20px;  border-bottom-left-radius: 20px;">
        <h2>
            Tem certeza que deseja excluir o usuario selecionado? 
            
        </h2>
<br><br>
        <h4>
          Nome: <?php echo $nome; ?> 
        </h4>
        <br><br>
        <h4 style='color: red !important;'>
            Após excluido, não será possivel recupera-lo.
        </h4>
        <br><br>
        <a href="?pagina=../../classes/usuario/visualizar_usuario"><button type='button' class='btn btn-primary' style='width: 100px;'>Não</button></a>

        <a href="../../../classes/usuario/apagarUsuario.php?id=<?php echo $id; ?>"><button type='button' class='btn btn-danger' style='margin-left: 50px; width: 100px;'>Sim</button></a>
    </div>
</center>