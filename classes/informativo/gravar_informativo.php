<?php
    
    //aqui sera gravado no banco a funcao gravar do informativo.class que no caso eh referenciada abaixo no require

    if(isset($_POST["titulo"]) && !empty($_POST["titulo"]) && isset($_POST["texto"]) && !empty($_POST["texto"])){
        

        //requer classe de conexao do banco
        require("../conexao_bd.php");

        //requer o informativo.class onde o comando para gravar no banco ja esta pronto
        require("informativo.class.php");

        //aqui instanciamos a classe
        $i = new Informativo();
        
        //aqui adicionamos um nivel basico de seguranca
        $titulo = addslashes($_POST["titulo"]);
        $texto = addslashes($_POST["texto"]);
        $ativo = addslashes($_POST["ativo"]);

        //se a funcao da classe tiver as variaveis, sera gravado no banco, se nao 
        $i->gravar($titulo, $texto, $ativo);

        echo "<script>alert('Informativo cadastrado com sucesso!');</script>";
        $url = '/';
        echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';



    
    }
    else{
        echo "<script>alert('algo deu errado!, por favor tente novamente');</script>";
        $url = '/';
        echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

    }


?>