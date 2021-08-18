<?php
        session_start();
        //requer classe de conexao do banco
        require("../conexao_bd.php");

        //requer o contato.class onde o comando para gravar no banco ja esta pronto
        require("aniversario.class.php");

        //configuracoes basicas, nesse caso, configuracoes de fuso horario
        require("../../config/config.php");

        //aqui instanciamos a classe
        $an = new Aniversario();

        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $setor = $_POST["setor"];
        $nasc = $_POST["nasc"];
        

        $an->editar($id, $nome, $setor, $nasc);
                
   ?>