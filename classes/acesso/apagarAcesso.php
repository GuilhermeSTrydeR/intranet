<?php   


        //requer classe de conexao do banco
        require("../conexao_bd.php");

        //requer o contato.class onde o comando para gravar no banco ja esta pronto
        require("acesso.class.php");

        //recebemos o id enviado por GET
        $id = $_GET['id'];

        //recebemos o id do grupo recebido por  GET
        $idGrupo = $_GET['idGrupo'];
        
        //aqui instanciamos a classe
        $ac = new Acesso();

        //aqui invocamos o metodo para marcar a coluna 'excluido' com '1' informando que esse usuario foi excluido
        $ac->apagarAcesso($id);
       
        //aqui eh encaminhado de volta apara a pagina para visualizar os acessos desse grupo em questao
        $url = '/paginas/admin/main.php?pagina=../../classes/acesso/visualizarAcessoUnico&id=' . $idGrupo;
        echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
?>

    