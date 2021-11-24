<?php

    // aqui recebemos o id do usuario que leu e o institucional q ele leu
    $idUsuario = $_POST['idUsuario'];
    $idInstitucional = $_POST['idInstitucional'];

    //requer classe de conexao do banco
    require("../conexao_bd.php");

    //requer o contato.class onde o comando para gravar no banco ja esta pronto
    require("institucional.class.php");

    //aqui instanciamos a classe
    $i = new institucional();

    $lido = 1;

    $i->gravarInstitucionalUsuario($idInstitucional, $idUsuario, $lido);


    $url = '/paginas/comum/main.php?pagina=../../paginas/institucional/inicio';
    echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';


    

?>