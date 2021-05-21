<?php

  
        //requer classe de conexao do banco
        require("../conexao_bd.php");

        //requer o informativo.class onde o comando para gravar no banco ja esta pronto
        require("acesso.class.php");

        // configuracoes, nesse caso o fuso horario
        require("../../config/config.php");


        //aqui instanciamos a classe
        $ac = new Acesso();

        $nome = addslashes($_POST["nome"]);
        $link = addslashes($_POST["link"]);
        $ativo = addslashes($_POST["ativo"]);

        //se a funcao da classe tiver as variaveis, sera gravado no banco, se nao 
        $ac->gravar($nome, $link, $ativo);

        echo "<script>alert('Acesso cadastrado com sucesso!');</script>";
        $url = '/paginas/admin/main.php?pagina=../../classes/acesso/visualizar_acesso';
        echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

    
?>