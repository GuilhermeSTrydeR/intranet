<?php

  
        //requer classe de conexao do banco
        require("../conexao_bd.php");

        //requer o mural.class onde o comando para gravar no banco ja esta pronto
        require("acesso.class.php");

        // configuracoes, nesse caso o fuso horario
        require("../../config/config.php");


        //aqui instanciamos a classe
        $ac = new Acesso();

        $nome = addslashes($_POST["nome"]);
        $ativo = addslashes($_POST["ativo"]);
        $permissao = addslashes($_POST["permissao"]);

        //se a funcao da classe tiver as variaveis, sera gravado no banco, se nao 
        $ac->gravarGrupoAcesso($nome, $ativo, $permissao);

        echo "<script>alert('Grupo de acesso cadastrado com sucesso!');</script>";
        $url = '/paginas/admin/main.php?pagina=../../classes/acesso/visualizar_grupo_acesso';
        echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

    
?>