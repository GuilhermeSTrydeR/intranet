<?php   


        //requer classe de conexao do banco
        require("../conexao_bd.php");

        //requer o contato.class onde o comando para gravar no banco ja esta pronto
        require("acesso.class.php");

        $id = $_GET['id'];

        
        //aqui instanciamos a classe
        $ac = new Acesso();
        

        //aqui invocamos o metodo para marcar a coluna 'excluido' com '1' informando que esse usuario foi excluido
        $ac->apagarGrupoAcesso($id);
        
       

        $url = '/paginas/admin/main.php?pagina=../../classes/acesso/visualizar_grupo_acesso';
        echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
?>

    