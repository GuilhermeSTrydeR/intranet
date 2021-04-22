<?php

    //aqui sera gravado no banco a funcao gravar do informativo.class que no caso eh referenciada abaixo no require
    if(isset($_POST["titulo"]) && !empty($_POST["titulo"]) && isset($_POST["texto"]) && !empty($_POST["texto"]) ){
        
        
        //requer classe de conexao do banco
        require("../conexao_bd.php");

        //requer o contato.class onde o comando para gravar no banco ja esta pronto
        require("informativo.class.php");

        //configuracoes basicas, nesse caso, configuracoes de fuso horario
        require("../../config/config.php");


        //aqui instanciamos a classe
        $i = new Informativo();


        
        //aqui adicionamos um nivel basico de seguranca
        $titulo = addslashes($_POST["titulo"]);
        $texto = addslashes($_POST["texto"]);
        

        
        $i->gravar($titulo, $texto);




        }

    
    }
    else{
        echo "<script>alert('Algo deu errado!, por favor tente novamente.');</script>";
        $url = '../../paginas/admin/main.php?pagina=cadastrar_usuario';
        echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

    }
?>