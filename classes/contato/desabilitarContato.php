<?php   
        //requer classe de conexao do banco
        require("../conexao_bd.php");

        //requer o contato.class onde o comando para gravar no banco ja esta pronto
        require("Contato.class.php");

        $id = $_GET['id'];
        

        //aqui instanciamos a classe
        $c = new Contato();
        
        //aqui invocamos o metodo para marcar a coluna 'ativo' com '1' informando que esse usuario foi desativado
        $c->desabilitarContato($id);
       
        $url = '/paginas/admin/main.php?pagina=../cadastros/editar_contato&id=' . $id;
        echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
       
      
?>

    