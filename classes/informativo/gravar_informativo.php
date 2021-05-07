<?php


    /*  
    *$dir é o caminho da pasta onde você deseja que os arquivos sejam salvos. 
    *Neste exemplo, supondo que esta pagina esteja em public_html/upload/ 
    *os arquivos serão salvos em public_html/upload/imagens/ 
    *Obs.: Esta pasta de destino dos arquivos deve estar com as permissões de escrita habilitadas. 
    */ 

    $dir = "../../uploads/"; 
    // recebendo o arquivo multipart 
    $file = $_FILES["Arquivo"]; 
    // Move o arquivo da pasta temporaria de upload para a pasta de destino 
    move_uploaded_file($file["tmp_name"], "$dir/".$file["name"]);

    //aqui sera gravado no banco a funcao gravar do informativo.class que no caso eh referenciada abaixo no require
    if(isset($_POST["titulo"]) && !empty($_POST["titulo"]) && isset($_POST["texto"]) && !empty($_POST["texto"])){
        

        //requer classe de conexao do banco
        require("../conexao_bd.php");

        //requer o informativo.class onde o comando para gravar no banco ja esta pronto
        require("informativo.class.php");

        // configuracoes, nesse caso o fuso horario
        require("../../config/config.php");


        //aqui instanciamos a classe
        $i = new Informativo();

     

        $dataCadastro = (time() + $fusoHorario);
        
        //aqui adicionamos um nivel basico de seguranca
        $titulo = addslashes($_POST["titulo"]);
        $texto = addslashes($_POST["texto"]);
        $ativo = addslashes($_POST["ativo"]);

        //se a funcao da classe tiver as variaveis, sera gravado no banco, se nao 
        $i->gravar($titulo, $texto, $ativo, $dataCadastro);

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