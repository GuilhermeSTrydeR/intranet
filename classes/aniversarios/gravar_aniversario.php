<?php

        //requer classe de conexao do banco
        require("../conexao_bd.php");

        //requer o informativo.class onde o comando para gravar no banco ja esta pronto
        require("aniversario.class.php");

        // configuracoes, nesse caso o fuso horario
        require("../../config/config.php");

        //aqui instanciamos a classe
        $an = new Aniversario();

     
        $nome = addslashes($_POST["nome"]);
        $setor = addslashes($_POST["setor"]);
        $nasc = addslashes($_POST["nasc"]);


        //se a funcao da classe tiver as variaveis, sera gravado no banco, se nao 
        $an->gravar($nome, $setor, $nasc);

        echo "<script>alert('Aniversario cadastrado com sucesso!');</script>";
        $url = '/paginas/admin/main.php?pagina=../../classes/aniversarios/visualizar_aniversario';
        echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

    
?>