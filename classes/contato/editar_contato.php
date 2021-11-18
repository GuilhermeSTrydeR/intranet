<?php

        //requer classe de conexao do banco
        require("../conexao_bd.php");

        //requer o mural.class onde o comando para gravar no banco ja esta pronto
        require("Contato.class.php");

        // configuracoes, nesse caso o fuso horario
        require("../../config/config.php");

        //aqui instanciamos a classe
        $c = new Contato();


        $id = addslashes($_POST["id"]);
        $nome = addslashes($_POST["nome"]);
        $setor = addslashes($_POST["setor"]);
        $email = addslashes($_POST["email"]);
        $telefone = addslashes($_POST["telefone"]);
        $nasc = addslashes($_POST["nasc"]);
        $ip = addslashes($_POST["ip"]);

        // aqui concatenamos a faixa de ip com o ip
        // $ip = "192.168.0." . $ip;


        //se a funcao da classe tiver as variaveis, sera gravado no banco, se nao 
        $c->editar($id, $nome, $setor, $email, $telefone, $nasc, $ip);


        $url = '/paginas/admin/main.php?pagina=../../classes/contato/visualizar_contato';
        echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

    
?>