<?php


    // desligar todos os erros e notices nessa pagina
    error_reporting(0);


    if(isset($_POST["titulo"]) && !empty($_POST["titulo"]) && isset($_POST["texto"]) && !empty($_POST["texto"])){
        

        //requer classe de conexao do banco
        require("../conexao_bd.php");

        //requer o mural.class onde o comando para gravar no banco ja esta pronto
        require("institucional.class.php");

        // configuracoes, nesse caso o fuso horario
        require("../../config/config.php");


        //aqui instanciamos a classe
        $i = new institucional();


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


        
        

        //aqui sera gravado no banco a funcao gravar do mural.class que no caso eh referenciada abaixo no require
        $dataCadastro = (time() + $fusoHorario);
        
        //aqui adicionamos um nivel basico de seguranca
        $titulo = addslashes($_POST["titulo"]);
        $texto = addslashes($_POST["texto"]);
        $ativo = addslashes($_POST["ativo"]);
        $inicio = addslashes($_POST["inicio"]);
        $fim = addslashes($_POST["fim"]);

    

        //se a funcao da classe tiver as variaveis, sera gravado no banco, se nao 
        $i->gravar($titulo, $texto, $ativo, $dataCadastro, $imagem, $inicio, $fim);

        echo "<script>alert('Institucional cadastrado com sucesso!');</script>";
        $url = '/paginas/admin/main.php?pagina=../../classes/institucional/visualizar_institucional';
        echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

    }
    else{
        echo "<script>alert('algo deu errado!, por favor tente novamente');</script>";
        $url = '/paginas/admin/main.php?pagina=../../classes/institucional/visualizar_institucional';
        echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

    }


?>