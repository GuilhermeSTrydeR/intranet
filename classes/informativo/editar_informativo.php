<?php

        //requer classe de conexao do banco
        require("../conexao_bd.php");

        //requer o informativo.class onde o comando para gravar no banco ja esta pronto
        require("informativo.class.php");

        // configuracoes, nesse caso o fuso horario
        require("../../config/config.php");


        //aqui instanciamos a classe
        $i = new Informativo();

        $id = $_POST['id'];


    // verificar se ha algum informacao na variaval da imagem, pois sem validar isso, quando editar e nao selecionar nenhuma imagem, a imagem anterior sera perdida
    if($_FILES["Arquivo"]["size"] > 0){
        /*
        
        *$dir é o caminho da pasta onde você deseja que os arquivos sejam salvos. 
        *Neste exemplo, supondo que esta pagina esteja em public_html/upload/ 
        *os arquivos serão salvos em public_html/upload/imagens/ 
        *Obs.: Esta pasta de destino dos arquivos deve estar com as permissões de escrita habilitadas. 
        */ 
        $dir = "../../uploads/"; 

        // recebendo o arquivo multipart 
        $file = $_FILES["Arquivo"];

        // Move o arquivo da pasta temporaria de upload para a pasta de destino e se isso ocorrer a variavel $imagem ira receber o path completo da imagem(isso evita na hora de mostrar a imagem na tela, ficar aquele icone de mensagem nao encontrada)
        if(move_uploaded_file($file["tmp_name"], "$dir/".$file["name"])){

            // aqui concatenaremos o endereco da imagem para salvar no banco somente se a condição acima for satisfeita, pois se tiver qualquer coisa dentro dessa variavel, na tela inicial no mural em baixo do texto vai fia ruma imagem de erro informando que a imagem nao foi encontrada pois sem essa condicao a variavel $imagem ficara com a string: (../../uploads/) dentro da tag <img>
            $imagem = ($dir . $file['name']);

        }


        //aqui sera gravado no banco a funcao gravar do informativo.class que no caso eh referenciada abaixo no require
        $dataCadastro = (time() + $fusoHorario);
        
        //aqui adicionamos um nivel basico de seguranca
        $titulo = addslashes($_POST["titulo"]);
        $texto = addslashes($_POST["texto"]);
        $ativo = addslashes($_POST["ativo"]);

    

        //se a funcao da classe tiver as variaveis, sera gravado no banco, se nao 
        $i->editar($id, $titulo, $texto, $ativo, $dataCadastro, $imagem);

        echo "<script>alert('Informativo alterado com sucesso!');</script>";
        $url = '/paginas/admin/main.php?pagina=../../classes/informativo/visualizar_informativo';
        echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

    
    }

    else{


        //aqui sera gravado no banco a funcao gravar do informativo.class que no caso eh referenciada abaixo no require
        $dataCadastro = (time() + $fusoHorario);
        
        //aqui adicionamos um nivel basico de seguranca
        $titulo = addslashes($_POST["titulo"]);
        $texto = addslashes($_POST["texto"]);
        $ativo = addslashes($_POST["ativo"]);

        $imagem = $i->retornaImagem($id);

        //se a funcao da classe tiver as variaveis, sera gravado no banco, se nao 
        $i->editar($id, $titulo, $texto, $ativo, $dataCadastro, $imagem);

        echo "<script>alert('Informativo alterado com sucesso!');</script>";
        $url = '/paginas/admin/main.php?pagina=../../classes/informativo/visualizar_informativo';
        echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

    }

?>