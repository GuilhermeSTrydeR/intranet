<?php

        //requer classe de conexao do banco
        require("../conexao_bd.php");

        //requer o informativo.class onde o comando para gravar no banco ja esta pronto
        require("acesso.class.php");

        // configuracoes, nesse caso o fuso horario
        require("../../config/config.php");


        //aqui instanciamos a classe
        $ac = new Acesso();

      
        
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $link = $_POST["link"];
        $ativo = $_POST["ativo"];
        $idGrupo = $_POST["idGrupo"];

        //se a funcao da classe tiver as variaveis, sera gravado no banco, se nao 
        $ac->editar($id, $nome, $link, $ativo);

        echo "<script>alert('Acesso alterado com sucesso!');</script>";
        $url = '/paginas/admin/main.php?pagina=../../classes/acesso/visualizarAcessoUnico&id=' . $idGrupo;
        echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

?>
    
